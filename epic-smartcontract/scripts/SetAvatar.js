require("dotenv").config();
require("@nomiclabs/hardhat-ethers");
const {
  createAssetList,
  importMetadata,
  readFile,
  fetchAssetCollection,
  putAssetCollection,
  putHolderCollection,
} = require("../services/assets");

const secret = process.env;
const contract = require("../artifacts/contracts/EPICAvatar.sol/EPICAvatar.json");
const contractInterface = contract.abi;

let provider = ethers.provider;

const privateKey = secret.privateKey1;
const wallet = new ethers.Wallet(privateKey);

wallet.provider = provider;
const signer = wallet.connect(provider);

const smartContract = "0x07298b0182C944821D0DEc391B88D6733d47328c";

const AvatarFactory = new ethers.Contract(
  smartContract,
  contractInterface,
  signer
);

const tokenId = [1, 5, 8, 9, 55, 88, 99, 555, 888, 999, 5555, 8888, 9999];

const avatarPath = "images/Avatar";
const metadata = "metadata";

const images = [
  "epic-0.png",
  "epic-1.png",
  "epic-2.png",
  "epic-3.png",
  "epic-4.png",
  "epic-5.png",
  "epic-6.png",
  "epic-7.png",
  "epic-8.png",
  "epic-9.png",
  "epic-10.png",
  "epic-11.png",
  "epic-12.png",
];

async function main() {
  for (let index = 0; index < tokenId.length; index++) {
    const _image = `${avatarPath}/${images[index]}`;
    const _file = await readFile(`${metadata}/${tokenId[index]}.json`);
    var _metadata = JSON.parse(_file);

    const _import = await importMetadata(_image, _metadata);

    const transaction = await AvatarFactory.setTokenURI(
      tokenId[index],
      _import.metadata_ipfs
    );

    await transaction.wait();

    console.log("success");
  }
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
