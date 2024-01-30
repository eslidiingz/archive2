import React, { Component } from "react";
import Head from "next/head";
import Web3 from "web3";

import { MetaMaskProvider } from "metamask-react";
import ConnectMetamask from "./ConnectMetamask";

import Config from "./config.json";
import token from "./token.json";
import nft from "./nft.json";
import CollectionModal from "../components/CollectionModal";
import { Transition } from "@tailwindui/react";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.min.css";
import RewardModal from "../components/RewardModal";
const web3 = new Web3(Web3.givenProvider || "http://localhost:8545");

class ButtonState extends Component {
  constructor(props) {
    super(props);
  }
  render() {
    const params = this.props;

    return (
      <button
        disabled={params.loading}
        onClick={params.onFunction}
        className={`flex flex-grow items-center justify-center py-2 text-2xl uppercase ${params.style}`}
      >
        {params.loading && (
          <svg
            className="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
          >
            <circle
              className="opacity-25"
              cx="12"
              cy="12"
              r="10"
              stroke="currentColor"
              strokeWidth="4"
            ></circle>
            <path
              className="opacity-75"
              fill="currentColor"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
            ></path>
          </svg>
        )}
        {params.text}
      </button>
    );
  }
}

class ToastDisplay extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    const props = this.props;
    const btnStyle =
      props.type === "process"
        ? "text-gray-600"
        : props.type === "success"
        ? "text-green-600"
        : "text-red-600";
    return (
      <div className="md:flex md:items-center md:justify-between md:space-x-5">
        <div className="flex items-start space-x-5">
          <div className="pt-1.5">
            <h1 className={`text-md font-bold ${btnStyle}`}>{props.title}</h1>
            <p className="text-sm font-medium text-gray-500">
              {props.description}
            </p>
            {props.href ? (
              <a
                className={`text-bold text-sm ${
                  props.type === "success" ? "text-green-300" : "text-gray-300"
                } `}
                href={props.href}
                target="_blank"
              >
                View on EtherScan
              </a>
            ) : null}
          </div>
        </div>
      </div>
    );
  }
}

class Home extends Component {
  constructor(props) {
    super(props);
    this.state = {
      account: "",
      count: 1,
      balance: Config.basePrice,
      showCollection: false,
      showReward: false,
      collectionReward: [],
      approved: false,
      userState: {
        state: "not-availiable",
        text: "Not Availiable",
        loading: false,
      },
    };
  }

  showCollectionModal = (e) => {
    this.setState({
      showCollection: !this.state.showCollection,
    });
  };

  showRewardModal = (e) => {
    this.setState({
      showReward: !this.state.showReward,
    });
  };

  handleChangeInput = (event) => {
    this.setState({ balance: 0 });
    let { value, min, max } = event.target;
    value = Math.max(Number(min), Math.min(Number(max), Number(value)));
    const balance = value * Config.basePrice;
    this.setState({ count: value, balance });
  };

  async componentDidMount() {
    const nftContract = new web3.eth.Contract(nft, Config.NFTAddress);

    const totalAvailbleBox = await nftContract.methods
      .availableBoxTotal()
      .call();
    if (totalAvailbleBox > 0) {
      this.checkBalanceToken();
    } else {
      this.setState({
        userState: {
          state: "not-availiable",
          text: "Not Availiable",
          loading: false,
        },
      });
    }
  }

  async checkBalanceToken() {
    const accounts = await web3.eth.getAccounts();
    // ABI สำหรับ MultiToken
    const tokenContract = new web3.eth.Contract(token, Config.TokenAddress);

    //check balance of in wallet address
    const tokenBalance = await tokenContract.methods
      .balanceOf(accounts[0])
      .call();
    const balance = web3.utils.fromWei(tokenBalance, "ether");
    if (parseFloat(balance) < this.state.balance) {
      this.setState({
        userState: {
          text: "Not Have MTT",
          state: "not-enough",
        },
      });
    } else {
      //check allowance from wallet
      const tokenAllowance = await tokenContract.methods
        .allowance(accounts[0], Config.NFTAddress)
        .call();

      //if allowance not allocate then approve token
      if (tokenAllowance <= 0) {
        this.setState({
          userState: {
            text: "approve",
            state: "unapprove",
          },
        });
      } else {
        this.setState({
          userState: {
            text: "OPEN NOW !!!",
            state: "approve",
          },
        });
      }
    }
  }

  async approveAllowanace() {
    const accounts = await web3.eth.getAccounts();
    // ABI สำหรับ MultiToken
    const tokenContract = new web3.eth.Contract(token, Config.TokenAddress);

    await tokenContract.methods
      .approveUnlimit(Config.NFTAddress)
      .send({ from: accounts[0] })
      .on("sending", () => {
        this.setState({
          userState: {
            text: "approve",
            state: "unapprove",
            loading: true,
          },
        });
      })
      .on("receipt", () => {
        this.setState({
          userState: {
            text: "OPEN NOW !!!",
            state: "approve",
            loading: false,
          },
        });
      })
      .on("error", (error) => {
        this.setState({
          userState: {
            text: "approve",
            state: "unapprove",
            loading: false,
          },
        });
        toast(
          <ToastDisplay
            type={"error"}
            title={"Transaction rejected"}
            description={error.message}
          />
        );
      });
  }

  async transferMysteryBox() {
    const accounts = await web3.eth.getAccounts();
    // ABI สำหรับ MultiToken
    const nftContract = new web3.eth.Contract(nft, Config.NFTAddress);

    await nftContract.methods
      .transferItemFromBox([this.state.count])
      .send({ from: accounts[0] })
      .on("sending", () => {
        this.setState({
          userState: {
            text: "OPEN NOW !!!",
            state: "approve",
            loading: true,
          },
        });
        toast(
          <ToastDisplay
            type={"process"}
            title={"Waiting For Confirmation"}
            description={"Confirm this transaction in your wallet"}
          />
        );
      })
      .on("transactionHash", (res) => {
        this.setState({
          userState: {
            text: "OPEN NOW !!!",
            state: "approve",
            loading: true,
          },
        });
        toast(
          <ToastDisplay
            type={"process"}
            title={"Your Transaction"}
            description={"View on etherscan.io"}
            href={`${Config.blockExplorer}/tx/${res}`}
          />
        );
      })
      .on("receipt", (result) => {
        console.log(result);
        this.setState({
          collectionReward:
            result.events.statusTransfer.returnValues.resultRandom,
        });
        this.setState({
          userState: {
            text: "OPEN NOW !!!",
            state: "approve",
            loading: false,
          },
        });
        toast(
          <ToastDisplay
            type={"success"}
            title={"Transaction reciept"}
            description={"Open mystery box success !!!"}
            href={`${Config.blockExplorer}/tx/${result.transactionHash}`}
          />
        );
        this.showRewardModal();
      })
      .on("error", (error) => {
        this.setState({
          userState: {
            text: "OPEN NOW !!!",
            state: "approve",
            loading: false,
          },
        });
        toast(
          <ToastDisplay
            type={"error"}
            title={"Transaction rejected"}
            description={error.message}
          />
        );
      });
  }

  render() {
    const userState = this.state.userState;
    return (
      <>
        <div>
          <MetaMaskProvider>
            <Head>
              <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
                integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
                crossOrigin="anonymous"
                referrerPolicy="no-referrer"
              />
            </Head>
            <div className="flex h-screen" style={{ background: "#b9dbe1" }}>
              <div className="absolute right-0 mr-4 mt-4">
                <div className="flex">
                  <div
                    className="bg-white py-1 px-3 rounded-lg border-2 cursor-pointer hover:bg-yellow-300 mr-2"
                    style={{
                      background: "#f7a238",
                      boxShadow: "0 1px 3px rgb(32 30 30 / 50%)",
                    }}
                    onClick={(e) => this.showCollectionModal(e)}
                  >
                    <svg
                      className="flex-shrink-0 h-6 w-6"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16"
                      />
                    </svg>
                  </div>
                  <ConnectMetamask />
                </div>
              </div>

              <div className="m-auto">
                <div className="flex max-w-screen-sm relative">
                  <div style={{ width: "1024px" }}>
                    <img src="./assets/GASHA.png" />
                  </div>

                  <div
                    className="flex flex-col justify-center ml-4 absolute right-0"
                    style={{
                      width: "280px",
                      top: "30%",
                      transform: "translateY(-40%)",
                    }}
                  >
                    <div className="flex flex-col">
                      <div className="mb-4">
                        <div
                          className="bg-white p`x-4 py-2 text-black border-b-4 border-gray-600 mb-2 uppercase text-center text-4xl"
                          style={{ color: "#2F2F2F" }}
                        >
                          gashapon
                        </div>
                        <div className="relative rounded-md shadow-sm mb-2">
                          <input
                            disabled={
                              userState.loading === true ||
                              userState.state === "not-enough"
                            }
                            type="number"
                            value={this.state.count}
                            min="1"
                            max="5"
                            onChange={this.handleChangeInput}
                            className="block w-full border-0 text-gray-900 placeholder-gray-500 h-12 p-2"
                          />
                        </div>
                        <div className="flex uppercase">
                          {userState.state !== "not-availiable" && (
                            <div className="bg-white px-4 pl-0 py-2 uppercase text-center flex">
                              <div className="transform -rotate-90">
                                {Config.baseToken}
                              </div>
                              <div className="text-2xl">
                                {this.state.balance}
                              </div>
                            </div>
                          )}

                          {userState.state === "not-enough" && (
                            <ButtonState
                              text={userState.text}
                              style={"bg-red-200 text-red-600"}
                            />
                          )}

                          {userState.state === "not-availiable" && (
                            <ButtonState
                              text={userState.text}
                              style={"bg-red-200 text-red-600"}
                            />
                          )}
                          {userState.state === "unapprove" && (
                            <ButtonState
                              onFunction={() => this.approveAllowanace()}
                              text={userState.text}
                              loading={userState.loading}
                              style={"bg-gray-400 text-white"}
                            />
                          )}
                          {userState.state === "approve" && (
                            <ButtonState
                              onFunction={() => this.transferMysteryBox()}
                              text={userState.text}
                              loading={userState.loading}
                              style={"bg-yellow-400 text-red-600"}
                            />
                          )}
                        </div>
                      </div>
                    </div>

                    <div>
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                      Porro possimus blanditiis quas voluptatem! Quos provident
                      dolores est
                    </div>
                  </div>
                </div>
              </div>
              <footer>
                <div
                  className="cloud fixed bottom-0 left-0 right-0"
                  style={{
                    backgroundImage: "url('./assets/CLOUD.png')",
                    height: "196px",
                  }}
                ></div>
              </footer>
            </div>
          </MetaMaskProvider>
        </div>

        <Transition
          show={this.state.showCollection}
          enter="ease-out duration-300"
          enterFrom="opacity-0"
          enterTo="opacity-100"
          leave="ease-in duration-200"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
        >
          <CollectionModal
            onClose={this.showCollectionModal}
            show={this.state.showCollection}
          />
        </Transition>

        <Transition
          show={this.state.showReward}
          enter="ease-out duration-300"
          enterFrom="opacity-0"
          enterTo="opacity-100"
          leave="ease-in duration-200"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
        >
          <RewardModal
            onClose={this.showRewardModal}
            show={this.state.showReward}
            collection={this.state.collectionReward}
            count={this.state.count}
          />
        </Transition>

        <ToastContainer
          position="top-right"
          autoClose={5000}
          hideProgressBar={true}
          newestOnTop={false}
          closeOnClick={false}
        />
      </>
    );
  }
}

export default Home;
