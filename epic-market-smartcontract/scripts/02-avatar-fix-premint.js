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
const owner = "0x14B37528a27F7716C1e9d94297d2e6e1cC499CDd";
const _collection = "620973b895e24700286b0e58";

const AvatarFactory = new ethers.Contract(
  smartContract,
  contractInterface,
  signer
);

const tokenId = [9, 5555, 8888, 9999];

const avatarPath = "images/Lucky13";
const metadata = "metadata";

const images = [
  "Undead_Angkorian#9.png",
  "Undead_European#5555.png",
  "Undead_Arabian#8888.png",
  "Undead_Chinese#9999.png",
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
