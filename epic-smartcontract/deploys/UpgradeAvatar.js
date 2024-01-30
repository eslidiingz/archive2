const { ethers, upgrades } = require("hardhat");

async function main() {
  const proxyAddress = "0x1d8F90Dfd5E468226629d492c352d7C5253b3490";
  const AvatarFactoryV2 = await ethers.getContractFactory(
    "EPICGatheringAvatarV2"
  );
  const avatar = await upgrades.upgradeProxy(proxyAddress, AvatarFactoryV2);

  await avatar.deployed();
  console.log(avatar.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
