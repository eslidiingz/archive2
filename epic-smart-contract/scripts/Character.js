const hardhat = require("hardhat");

async function main() {
  let name = "EPIC Character";
  let symbol = "EPICC";

  const _Character = await hardhat.ethers.getContractFactory("Character");
  const character = await _Character.deploy(name, symbol);
  await character.deployed();

  console.log("Character deployed to:", character.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
