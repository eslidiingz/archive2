const hardhat = require("hardhat");

async function main() {
  const marketFactory = await hardhat.ethers.getContractFactory(
    "MarketplaceV1"
  );

  const whiteList = "0x412A8Cd3FAa4fcE12484fD1c5FAF4CFaA5a8EAB1";

  const Marketplace = await marketFactory.deploy(whiteList);

  await Marketplace.deployed();
  await hre.run("verify:verify", {
    address: Marketplace.address,
    constructorArguments: [
      whiteList
    ]
  });
  console.log("MarketplaceV1 deployed to:", Marketplace.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
