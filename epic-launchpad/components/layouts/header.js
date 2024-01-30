import { useCallback, useReducer, useEffect } from "react";

import { connectProvider, modalConnect } from "../../utils/connector/provider";
import { formatAccount } from "../../utils/lib/utilities";
import { useRouter } from "next/router";
import Link from "next/link";
import { useState } from "react";
import Modal from "../utilities/modal-md.js";
import Image from "next/image";

const initialState = {
  provider: null,
  web3Provider: null,
  address: null,
  chainId: null,
};

const reducer = (state, action) => {
  switch (action.type) {
    case "SET_WEB3_PROVIDER":
      return {
        ...state,
        provider: action.provider,
        web3Provider: action.web3Provider,
        account: action.account,
        chainId: action.chainId,
      };
    case "SET_ADDRESS":
      return {
        ...state,
        account: action.account,
      };
    case "SET_CHAIN_ID":
      return {
        ...state,
        chainId: action.chainId,
      };
    case "RESET_WEB3_PROVIDER":
      return initialState;
    default:
      throw new Error();
  }
};

const Header = () => {
  const router = useRouter();
  const [state, dispatch] = useReducer(reducer, initialState);
  const { provider, web3Provider, account } = state;
  const connect = useCallback(async () => {
    const provider = await modalConnect().connect();

    const web3Provider = connectProvider();

    const signer = web3Provider.getSigner();
    const account = await signer.getAddress();
    const network = await web3Provider.getNetwork();

    dispatch({
      type: "SET_WEB3_PROVIDER",
      provider,
      web3Provider,
      account,
      chainId: network.chainId,
    });
  }, []);

  const disconnect = useCallback(
    async function () {
      await modalConnect().clearCachedProvider();
      if (provider?.disconnect && typeof provider.disconnect === "function") {
        await provider.disconnect();
      }
      dispatch({
        type: "RESET_WEB3_PROVIDER",
      });
      window.location.reload();
    },
    [provider]
  );

  useEffect(() => {
    if (modalConnect().cachedProvider) {
      connect();
    }
  }, [connect]);

  useEffect(() => {
    if (provider?.on) {
      const handleAccountsChanged = (accounts) => {
        dispatch({
          type: "SET_ADDRESS",
          account: accounts[0],
        });
        window.location.reload();
      };

      const handleChainChanged = (_hexChainId) => {
        window.location.reload();
      };

      const handleDisconnect = () => {
        disconnect();
      };

      provider.on("accountsChanged", handleAccountsChanged);
      provider.on("chainChanged", handleChainChanged);
      provider.on("disconnect", handleDisconnect);

      return () => {
        if (provider.removeListener) {
          provider.removeListener("accountsChanged", handleAccountsChanged);
          provider.removeListener("chainChanged", handleChainChanged);
          provider.removeListener("disconnect", handleDisconnect);
        }
      };
    }
  }, [provider, disconnect]);

  const [showMe, setShowMe] = useState(false);
  const [showModal, setShowModal] = useState(false);
  function toggle() {
    setShowMe(!showMe);
    setShowMenu(false);
  }

  const [showMenu, setShowMenu] = useState(false);
  function toggleMenu() {
    setShowMenu(!showMenu);
    setShowMe(false);
  }

  return (
    <>
      <header id="navbar">
        <nav className="bg-navbar">
          <div className="container position-relative d-flex pt-2">
            <ul className="navbar-nav d-flex flex-row w-100">
              <div className="me-auto">
                <li className="nav-item">
                  <Link href={"/"}>
                    <a
                      className={`nav-link font-w-500 ${
                        router.pathname == "/" ? "active" : ""
                      }`}
                    >
                      <img
                        className="header-logo"
                        src={"epic-logo.png"}
                        alt="busd"
                        width={200}
                      />
                    </a>
                  </Link>
                </li>
              </div>

              <div className="d-none d-xl-block d-xl-flex justify-content-center">
                <div className="d-flex pt-2">
                  <li className="nav-item">
                    <Link href={"/"}>
                      <a
                        className={`btn-secondary ${
                          router.pathname == "/" ? "active" : ""
                        }`}
                      >
                        Launchpad
                      </a>
                    </Link>
                  </li>
                  <li className="nav-item">
                    <Link href={"/token-lock"}>
                      <a
                        className={`btn-secondary ${
                          router.pathname == "/token-lock" ? "active" : ""
                        }`}
                      >
                        Token Locked
                      </a>
                    </Link>
                  </li>
                  <li className="nav-item">
                    {/* <Link href={"/stake"}>
                      <a
                        className={`btn-secondary ${
                          router.pathname == "/stake" ? "active" : ""
                        }`}
                      >
                        Stake
                      </a>
                    </Link> */}
                  </li>
                </div>
              </div>
              <div>
                <div className="d-none d-md-block">
                  {web3Provider ? (
                    <div className="flex align-items-center">
                      <button className="btn-wallet" onClick={toggle}>
                        <span>{formatAccount(account)}</span>
                      </button>
                    </div>
                  ) : (
                    <div className="flex align-items-center mg-l-30">
                      <button
                        className="btn-wallet"
                        type="button"
                        onClick={() => connect()}
                      >
                        Connect
                      </button>
                    </div>
                  )}
                </div>
              </div>
              {web3Provider ? (
                    <div className="d-md-none">
                      <div className="pt-2">
                        <img
                          onClick={toggle}
                          className="icon-m"
                          alt="user.png"
                          src="icon/connected.png"
                        />
                      </div>
                    </div>
                  ) : (
                    <div className="d-md-none">
                      <div className="pt-2">
                        <img
                          onClick={() => connect()}
                          className="icon-m"
                          alt="user.png"
                          src="icon/disconnected.png"
                        />
                      </div>
                    </div>
                    
              )}

              {/* <div className="d-md-none">
                <div className="pt-2">
                  <img
                    onClick={toggle}
                    className="icon-m"
                    alt="user.png"
                    src="icon/connected.png"
                  />
                </div>
              </div> */}
              <div className="d-xl-none">
                <div className="pt-2">
                  <img
                    onClick={toggleMenu}
                    className="icon-m"
                    alt="menu.png"
                    src="icon/m-menu.png"
                  />
                </div>
              </div>
            </ul>

            {/* modal profile */}
            <div>
              <div className={showMe ? "showModal" : "hideModal"}>
                <div className="modal-wallet">
                  <div className="d-xl-none">
                    {web3Provider ? (
                      <button className="btn-wallet-m" onClick={toggle}>
                        <span>Your Wallet : {formatAccount(account)}</span>
                      </button>
                    ) : (
                      <div
                        className="font-darkblue font-w-500 px-3 cursor-pointer"
                        onClick={() => connect()}
                      >
                        Connect
                      </div>
                    )}
                  </div>
                  {/* <div
                    className="font-darkblue font-w-500 px-4 mb-2 cursor-pointer"
                    onClick={() => setShowModal(true)}
                  >
                    Wallet
                  </div>
                  <Link href="#">
                    <div className="font-darkblue font-w-500 px-4 cursor-pointer">
                      Recent Transections
                    </div>
                  </Link> */}
                  {/* <hr className="line2" /> */}

                  <div
                    className="font-darkblue font-w-500 px-3 cursor-pointer"
                    onClick={() => disconnect()}
                  >
                    Disconnect
                  </div>
                </div>
              </div>
            </div>

            {/* menu mobile */}
            <div className="d-xl-none">
              <div className={showMenu ? "showModal" : "hideModal"}>
                <div className="modal-wallet">
                  <Link href={"/"}>
                    <a
                      className={`nav-link font-w-500 mg-l-30 ${
                        router.pathname == "/" ? "active" : ""
                      }`}
                    >
                      Launchpad
                    </a>
                  </Link>
                  <Link href={"/token-lock"}>
                    <a
                      className={`nav-link font-w-500 mg-l-30 ${
                        router.pathname == "/token-lock" ? "active" : ""
                      }`}
                    >
                      Token Locked
                    </a>
                  </Link>
                  {/* <Link href={"/stake"}>
                    <a
                      className={`nav-link font-w-500 mg-l-30  ${
                        router.pathname == "/stake" ? "active" : ""
                      }`}
                    >
                      Stake
                    </a>
                  </Link> */}
                </div>
              </div>
            </div>
          </div>
        </nav>
      </header>
      <Modal
        onClose={() => setShowModal(false)}
        show={showModal}
        title="Wallet"
      >
        Hello from the modal!
      </Modal>
    </>
  );
};

export default Header;
