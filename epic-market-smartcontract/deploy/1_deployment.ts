import { ethers } from "hardhat";
// yarn hardhat size-contracts
async function main() {
    const BUSD = "0xed24fc36d5ee211ea25a80239fb8c4cfd80f12ee"; // BUSD TESTNET
  //  // const BUSD = "0xe9e7cea3dedca5984780bafc599bd69add087d56"; // BUSD MAINNET
    const WhiteList = await ethers.getContractFactory("Whitelist");
    const whitelist = await WhiteList.deploy(BUSD);
    await whitelist.deployed();
    console.log("TokenWhiteList deployed to: ", whitelist.address);

  //   // let tokenWhiteList = "0x3b51c5728665066FC8159446E7da2b5B4a3a80BE";
    let tokenWhiteList = whitelist.address;
  //   // Market : 0x8056c2F9a33E6AceA6142Cf6C66b2C64bA0b9513
    const EpicMarket = await ethers.getContractFactory("EpicMarket");
    const epicMarket = await EpicMarket.deploy(tokenWhiteList);
    await epicMarket.deployed();
    console.log("EpicMarket deployed to: ", epicMarket.address);

    const EpicAuction = await ethers.getContractFactory("EpicAuction");
    const epicAuction = await EpicAuction.deploy(tokenWhiteList);
    await epicAuction.deployed();
    console.log("EpicAuction deployed to: ", epicAuction.address);

    // let name = "EPIC Gathering";
    // let symbol = "EPIC";
    // const _Avatar = await ethers.getContractFactory(
    //   "EPICGatheringAvatar"
    // );
    // const avatar = await _Avatar.deploy(name, symbol);
    // await avatar.deployed();
    // console.log("Avatar deployed to:", avatar.address);

  // const EpicSwap = await ethers.getContractFactory("EpicSwap");
  // const epicSwap = await EpicSwap.deploy(tokenAddress);
  // await epicSwap.deployed();
  // console.log("EpicSwap deployed to: ", epicSwap.address);

  // const ERC721_ITEM = await ethers.getContractFactory("ERC1155ITEM");
  // const erc721_item = await ERC721_ITEM.deploy();
  // await erc721_item.deployed();

  // const ERC1155_ITEM = await ethers.getContractFactory("ERC1155ITEM");
  // const erc1155_item = await ERC1155_ITEM.deploy();
  // await erc1155_item.deployed();

  // console.log("Minter deployed to: ", minter.address);
  // console.log("ERC1155 deployed to: ", erc1155_item.address);
  // console.log("ERC721 deployed to: ", erc721_item.address);
  // console.log("Holders1155 deployed to: ", holders1155.address);
  // console.log("Holder721 deployed to: ", holders721.address);
  // console.log("Marketplace deployed to: ", marketplace.address);
  // console.log("MarketplaceV2 deployed to: ", marketplaceV2.address);
  // console.log("BitCoin deployed to: ", bitcoin.address);
}
main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
