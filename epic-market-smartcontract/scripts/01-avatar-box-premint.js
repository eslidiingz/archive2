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
const contract = require("../artifacts/contracts/EPICAvatar.sol/EPICGatheringAvatar.json");
const contractInterface = contract.abi;

let provider = ethers.provider;

const privateKey = secret.privateKey1;
const wallet = new ethers.Wallet(privateKey);

wallet.provider = provider;
const signer = wallet.connect(provider);

const smartContract = "0x1ECE992534B60570154F509aa6B3B9eB91cbC25B";
const owner = "0x1ECE992534B60570154F509aa6B3B9eB91cbC25B";
const _collection = "620973b895e24700286b0e58";

const AvatarFactory = new ethers.Contract(
  smartContract,
  contractInterface,
  signer
);

const tokenId = [1, 5, 8, 55, 88, 99, 555, 888, 999];

const avatarPath = "images/Lucky13";
const metadata = "metadata";

const images = [
  "Undead_Angkorian#1.png",
  "Undead_Angkorian#5.png",
  "Undead_Angkorian#8.png",
  "Undead_Angkorian#55.png",
  "Undead_Angkorian#88.png",
  "Undead_Angkorian#99.png",
  "Undead_Angkorian#555.png",
  "Undead_Angkorian#888.png",
  "Undead_Angkorian#999.png",
];

async function main() {
  for (let index = 0; index < tokenId.length; index++) {
    const _image = `${avatarPath}/${images[index]}`;
    const _file = await readFile(`${metadata}/${tokenId[index]}.json`);
    var _metadata = JSON.parse(_file);

    const _import = await importMetadata(_image, _metadata);

    const transaction = await AvatarFactory.safeMint(
      owner,
      _import.metadata_ipfs,
      tokenId[index]
    );

    await transaction.wait();

    const data = {
      address: smartContract,
      token: tokenId[index],
      hash: _import.Hash,
      metadata: _import.metadata_hash_cdn,
      image: _import.image_cdn,
    };
    const _resultAsset = await createAssetList(data);

    const { assets } = await fetchAssetCollection(_collection);
    const _assetsArray = await _resultAsset.json();

    assets.push(_assetsArray._id);

    await putAssetCollection(_collection, { assets });
    await putHolderCollection(_collection, {
      holder: owner,
    });

    console.log("success");
  }
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
