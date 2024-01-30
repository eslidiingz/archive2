import { useCallback, useReducer, useEffect } from "react";
import { connectProvider, modalConnect } from "../utils/connector/provider";
import Image from "next/image";
import TabList from "/components/utilities/tabs/tab-list";
import LaunchpadBuyPanel from "../pages/launchpad/buy-panel";
import LaunchpadSellPanel from "../pages/launchpad/sell-panel";
import { formatAccount } from "../utils/lib/utilities";

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

const LaunchpadPage = () => {
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

  return (
    <main className="d-flex flex-column min-vh-100">
      <div className="row pl-4 pr-2 mx-3 h-100 d-flex align-items-center ">
        <div className="epic-launhpad mx-auto">
          <div className="row">
            <div className="col-12 col-lg-6 p-4 pb-5 mb-3 mb-lg-0 order-2 order-lg-1 z-index-10">
              <div className="font-w-500 content-paper d-flex flex-column justify-content-center">
                <img
                  className="mx-auto"
                  src="Epic-token.png"
                  alt="Epic-token.png"
                  width={130}
                />

                <div className="mt-5">
                  <h3 className="text-h3 color-black">
                    $EPIC Token Private Sale Round:
                  </h3>
                  <ol className="text-desc">
                    <li>
                      Only for friends, family, founders, early members,
                      partners, advisors and early NFT adopters.
                    </li>
                    <li>1 EPIC = 0.5 BUSD</li>
                    <li>
                      1 Year vesting period. During vesting period, owners of
                      $EPIC token purchased during the private sale round CAN
                      NOT sell or trade their EPIC token.
                    </li>
                    <li>
                      25% of your EPIC token will be released at the end of
                      vesting period.
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 13
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 14
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 15
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 16
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 17
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 18
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 19
                    </li>
                    <li>
                      5% of your EPIC token will be released at the end of month
                      20
                    </li>
                  </ol>
                </div>
              </div>
            </div>
            <div className="col-12 col-lg-6 p-0 mb-3 mb-lg-0 order-1 order-lg-2">
              <div className="bg-right">
                <div className="d-xl-none">
                  {web3Provider ? (
                    <div className="mb-3">
                      <div className="d-flex justify-content-between">
                        <span className="font-s-14 font-w-700 color-white mb-2">Your Wallet Address</span>
                      </div>
                      <div className="d-flex justify-content-between input-custom">
                        <input
                          type="text"
                          className="form-control"
                          defaultValue={formatAccount(account)}
                        />
                        <div
                          className="align-self-center font-input"
                          onClick={() => disconnect()}
                        >
                          Disconnect
                        </div>
                      </div>
                      {/* <button className="btn-wallet-m">
                        <span>Your Wallet : {formatAccount(account)}</span>
                      </button> */}
                    </div>
                    
                  ) : (

                    <div className="mb-3 text-center">

                      <button className="btn-wallet" onClick={() => connect()}>
                        Connect Wallet
                      </button>
                    </div>
                  )}

                  <LaunchpadBuyPanel />
                </div>

                <div className="bg-tab d-none d-xl-block">
                  <TabList>
                    <div label="Buy" className="tab-content pd-r-50">
                      <LaunchpadBuyPanel />
                    </div>
                    <div label="Sell" className="tab-content">
                      <LaunchpadSellPanel />
                    </div>
                  </TabList>
                </div>
              </div>

              {/* <div className="bg-right">
                <div className="bg-tab">
                  <TabList>
                    <div label="Buy" className="tab-content pd-r-50">
                      <LaunchpadBuyPanel />
                    </div>
                    <div label="Sell" className="tab-content">
                      <LaunchpadSellPanel />
                    </div>
                  </TabList> 
                </div>
              </div> */}
            </div>
          </div>
        </div>
      </div>
      {/* Modal  */}
      <div
        className="modal fade"
        id="exampleModal"
        tabIndex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered">
          <div className="modal-content">
            <div className="modal-header">
              <h5 className="modal-title" id="exampleModalLabel">
                Modal title
              </h5>
              <button
                type="button"
                className="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div className="modal-body">...</div>
            <div className="modal-footer">
              <button
                type="button"
                className="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="button" className="btn btn-primary">
                Save changes
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>
  );
};
export default LaunchpadPage;
