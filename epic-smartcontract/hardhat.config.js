require("dotenv").config();
require("@nomiclabs/hardhat-waffle");
require("@nomiclabs/hardhat-ethers");
require("@nomiclabs/hardhat-etherscan");
require("@openzeppelin/hardhat-upgrades");
require("hardhat-gas-reporter");

// You need to export an object to set up your config
// Go to https://hardhat.org/config/ to learn more

const INFURA_API_KEY = process.env.INFURA_API_KEY;
const mnemonic = process.env.mnemonic;
const privateKey1 = process.env.privateKey1;
const privateKey2 = process.env.privateKey2;
const etherApiKey = process.env.etherApiKey;
const bscApiKey = process.env.bscApiKey;

task("accounts", "Prints the list of accounts", async () => {
  const accounts = await ethers.getSigners();

  for (const account of accounts) {
    console.log(account.address);
  }
});

module.exports = {
  etherscan: {
    apiKey: bscApiKey,
  },
  networks: {
    // rinkeby: {
    //   url: `https://rinkeby.infura.io/v3/${INFURA_API_KEY}`,
    //   accounts: [privateKey1, privateKey2],
    // },
    // kovan: {
    //   url: `https://kovan.infura.io/v3/${INFURA_API_KEY}`,
    //   accounts: [privateKey1, privateKey2],
    // },
    testnet: {
      url: "https://data-seed-prebsc-1-s1.binance.org:8545",
      chainId: 97,
      gasPrice: 200000000000,
      accounts: [privateKey1, privateKey2],
    },
    mainnet: {
      url: "https://bsc-dataseed.binance.org",
      chainId: 56,
      gasPrice: 190000000000,
      accounts: [privateKey1],
    },
  },
  gasReporter: {
    currency: "USD",
    gasPrice: 21,
  },
  solidity: {
    compilers: [
      {
        version: "0.8.4",
        settings: {
          optimizer: {
            enabled: true,
            runs: 200,
          },
        },
      },
    ],
  },
};
