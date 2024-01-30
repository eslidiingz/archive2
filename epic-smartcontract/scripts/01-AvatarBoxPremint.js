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

const smartContract = "0xA8359e8f162c741D3C5e7Cf8d497735418b6DFBD";
const owner = "0xA8359e8f162c741D3C5e7Cf8d497735418b6DFBD";
const hashURI =
  "https://gateway.pinata.cloud/ipfs/QmeLk6bnJyZ1dPpdLjjYJ7jHRVNhDvW1yvjAnU42zz79S3";
const _collection = "620e12643a6128001bb35595";

const AvatarFactory = new ethers.Contract(
  smartContract,
  contractInterface,
  signer
);

const tokenId = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

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
    // const _image = `${avatarPath}/${images[index]}`;
    // const _file = await readFile(`${metadata}/${[index]}.json`);
    // var _metadata = JSON.parse(_file);

    // const _import = await importMetadata(_image, _metadata);

    // const transaction = await AvatarFactory.safeMint(
    //   owner,
    //   _import.metadata_ipfs,
    //   tokenId[index]
    // );

    const transaction = await AvatarFactory.safeMint(owner, tokenId[index]);

    await transaction.wait();

    const _metadata = await fetchMetadata(`${hashURI}/${tokenId[index]}.json`);

    const data = {
      address: smartContract,
      token: tokenId[index],
      hash: `QmeLk6bnJyZ1dPpdLjjYJ7jHRVNhDvW1yvjAnU42zz79S3/${tokenId[index]}.json`,
      metadata: `${hashURI}/${tokenId[index]}.json`,
      image: _metadata.image_cdn,
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
