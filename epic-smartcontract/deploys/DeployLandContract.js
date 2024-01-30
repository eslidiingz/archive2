const hardhat = require("hardhat");

async function main() {
  const BUSD = "0xed24fc36d5ee211ea25a80239fb8c4cfd80f12ee";
  const landFactory = await hardhat.ethers.getContractFactory("EpicLandV1");

  const data = {
    name: "EPIC Land",
    symbol: "LAND",
    token: BUSD,
    price: 1000000000000000,
  };
  const land = await landFactory.deploy(
    data.name,
    data.symbol,
    data.token,
    data.price
  );

  await land.deployed();
  console.log("Land deployed to:", land.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
