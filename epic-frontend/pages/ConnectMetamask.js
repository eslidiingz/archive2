import React from "react";
import { useMetaMask } from "metamask-react";
// import AccountModal from "../components/AccountModal";
import { getWalletAddress } from "../utils/address";

function ConnectWallet() {
  const { status, connect, account } = useMetaMask();
  // const [modalAccount, setModalAccount] = useState(false);

  console.log(status);

  const openAddress = () => {
    setModalAccount(true);
  };

  if (status === "initializing")
    return <div>Synchronisation with MetaMask ongoing...</div>;
  if (status === "unavailable") return <div>MetaMask not available :(</div>;
  if (status === "notConnected")
    return (
      <button
        className="py-1 px-3 rounded-lg border-2 cursor-pointer"
        style={{
          background: "#f7a238",
          boxShadow: "0 1px 3px rgb(32 30 30 / 50%)",
        }}
        onClick={connect}
      >
        Connect to MetaMask
      </button>
    );

  if (status === "connecting")
    return (
      <div style={{ color: "#e58419" }}>
        <i className="fas fa-spinner fa-pulse"></i>&nbsp;Connecting...
      </div>
    );

  if (status === "connected")
    return (
      <>
        <div
          className="bg-white py-1 px-3 rounded-lg border-2 cursor-pointer hover:bg-yellow-300"
          style={{
            background: "#f7a238",
            boxShadow: "0 1px 3px rgb(32 30 30 / 50%)",
          }}
          onClick={() => openAddress()}
        >
          {getWalletAddress(account)}
        </div>
        {/* {modalAccount ? (
          <AccountModal
            onClose={this.showAccountModal}
            show={this.state.showAccount}
          />
        ) : null} */}
      </>
    );

  return null;
}

export default ConnectWallet;
