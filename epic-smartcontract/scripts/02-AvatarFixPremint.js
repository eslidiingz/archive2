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

const smartContract = "0x6DA790680E986361eb8d86E44D496016379DC55E";
const owner = "0xE40845297c6693863Ab3E10560C97AACb32cbc6C";
const _collection = "620e12643a6128001bb35595";

const AvatarFactory = new ethers.Contract(
  smartContract,
  contractInterface,
  signer
);

const tokenId = [9, 5555, 8888, 9999];

const avatarPath = "images/Lucky13";
const metadata = "metadata";

const images = [
  "Undead_Angkorian9.png",
  "Undead_European5555.png",
  "Undead_Arabian8888.png",
  "Undead_Chinese9999.png",
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
