// const providerOptions = {
//     walletconnect: {
//         package: WalletConnectProvider,
//         options: {
//             rpc: {
//                 97: "https://data-seed-prebsc-1-s2.binance.org:8545/",
//                 56: "https://bsc-dataseed.binance.org/",
//                 80001: "https://matic-mumbai.chainstacklabs.com",
//             },
//             chainId: Config.CHAIN_ID,
//         },
//     },
// };

// const connectWallet = async () => {
//     try {
//         if (typeof window.ethereum === "undefined") {
//             Swal.fire(
//                 "Warning",
//                 "Please, Install metamark extension to connect DApp",
//                 "warning"
//             );
//             return;
//         }

//         const _wInstance = web3Modal();
//         const _wProvider = web3Provider(await _wInstance.connect());

//         console.log({ _wInstance });

//         const signer = _wProvider.getSigner();
//         const network = await _wProvider.getNetwork();
//         const _wallet = await signer.getAddress();
//         console.log(network.chainId, "LOG FRROM CONNECT WALLET");
//         await switchNetwork(Config.CHAIN_ID);
//         switchChainID();
//         // if ( network.chainId !== Config.CHAIN_ID) {

//         // }

//         const _balance = await balanceOfWallet(_wallet);

//         const _tokenSymbol = await getTokenSymbol();
//         const _usdcBalance = await getUsdcBalance(_wallet);

//         walletAction.store(_wallet);
//         walletAction.setBalance(ethers.utils.formatEther(_balance));
//         walletAction.setToken(_tokenSymbol);
//         walletAction.setUsdc(ethers.utils.formatEther(_usdcBalance));
//     } catch (e) {
//         console.log(e);
//     }
// };

function web3Modal() {
    if (typeof window.ethereum === "undefined") return null;

    return new Web3Modal({
        // network: "mainnet", // optional
        cacheProvider: true, // optional
        providerOptions, // required
    });
}

function web3Provider(_instance = null) {
    try {
        if (typeof window.ethereum === "undefined") return null;

        const instance = _instance != null ? _instance : window.ethereum;
        return new ethers.providers.Web3Provider(instance);

        // return new providers.Web3Provider(instance);
    } catch (err) {
        console.log("function web3Provider error", err);
        return err;
    }
}

const isMetaMaskConnected = async () => {
    try {
        if (await dAppChecked()) {
            const provider = new ethers.providers.Web3Provider(window.ethereum);
            const accounts = await provider.listAccounts();
            return accounts.length > 0;
        }
        return false;
    } catch {
        return false;
    }
};

const dAppChecked = async (required = false) => {
    let status = false;
    if (typeof window.ethereum === "undefined") {
        Swal.fire(
            "Warning",
            "Please, Install metamark extension to connect DApp &^*&!^*^%#!",
            "warning"
        );
        return status;
    }
    status = true;
    return status;
};

const smartContact = (_contractAddress, abi, providerType = false) => {
    let provider;
    let instantSmartContract;
    if (debug) {
        console.log(
            `%c===== SmartContract Connecting to ... [${_contractAddress}] [jsonRPC = ${providerType}] =====>`,
            "color: skyblue"
        );
    }
    // console.log({providerType})
    if (providerType === true) {
        provider = new ethers.providers.JsonRpcProvider(Config.RPC_URL);

        instantSmartContract = new ethers.Contract(
            _contractAddress,
            abi,
            provider
        );
    } else {
        provider = web3Provider();

        const signer = provider.getSigner();
        instantSmartContract = new ethers.Contract(
            _contractAddress,
            abi,
            signer
        );
        console.log(
            { provider },
            { signer },
            { instantSmartContract },
            signer.getAddress()
        );
    }

    if (debug) {
        console.log(
            `%c===== SmartContract Connected [${_contractAddress}] =====>`,
            "color: skyblue",
            instantSmartContract
        );
    }

    return instantSmartContract;
};

const getWallet = async () => {
    try {
        const provider = web3Provider();
        const signer = provider.getSigner();
        const owner = await signer.getAddress();

        return owner;
    } catch {
        return null;
    }
};

const switchNetwork = async (chainId) => {
    const currentChainId = await getNetworkId();

    if (currentChainId !== chainId) {
        try {
            const switched = await window.ethereum?.request?.({
                method: "wallet_switchEthereumChain",
                params: [
                    { chainId: ethers.utils.hexValue(chainId).toString() },
                ],
            });

            return switched || false;
        } catch (error) {
            if (error.code === 4902) {
                console.log("add chain");
            }
            return false;
        }
    }
};

const switchChainID = () => {
    try {
      window.ethereum?.on?.("chainChanged", (chain) => {
        console.log("Chain on event : ", chain)
        if (Number(chain) !== Config.CHAIN_ID) {
          switchNetwork(Config.CHAIN_ID);
        //   location.reload();
        }
      });
    } catch (error) {
      console.log(error);
    }
  };

  const getNetworkId = async () => {
    try {
      const provider = web3Provider();
      const { chainId } = await provider?.getNetwork();

      return chainId;
    } catch (error) {
      console.log(error);
    }
  };
