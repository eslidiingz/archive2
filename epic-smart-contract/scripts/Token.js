const hardhat = require("hardhat");

async function main() {
  const Token = await hardhat.ethers.getContractFactory("EPICToken");
  const token = await Token.deploy();

  await token.deployed();

  console.log("Token deployed to:", token.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
