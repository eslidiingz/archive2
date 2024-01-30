require("dotenv").config();
require("@nomiclabs/hardhat-ethers");
const {
  createAssetList,
  importMetadata,
  readFile,
  fetchAssetCollection,
  putAssetCollection,
  putHolderCollection,
  fetchMetadata,
} = require("../services/assets");

const secret = process.env;
const contract = require("../artifacts/contracts/EPICGatheringAvatarV1.sol/EPICGatheringAvatarV1.json");
const contractInterface = contract.abi;

let provider = ethers.provider;

const privateKey = secret.privateKey1;
const wallet = new ethers.Wallet(privateKey);

wallet.provider = provider;
const signer = wallet.connect(provider);

const smartContract = "";

const AvatarFactory = new ethers.Contract(
  smartContract,
  contractInterface,
  signer
);

async function main() {
  const setClan = await AvatarFactory.setClan(0, "Mortus");
  await setClan.wait();
  const arrToken = [];
  for (let token = 0; token < 100; token++) {
    arrToken.push(token);
  }

  const addClanToken = await AvatarFactory.addClanToken(0, arrToken);
  await addClanToken.wait();
  const setWhitelistToken = await AvatarFactory.setWhitelistToken(
    "0xe9e7cea3dedca5984780bafc599bd69add087d56",
    BigInt(220000000000000000000),
    BigInt(110000000000000000000)
  );
  await setWhitelistToken.wait();
  console.log("success");
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
