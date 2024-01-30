const hardhat = require("hardhat");

async function main() {
  const _Artifact = await hardhat.ethers.getContractFactory("Artifact");
  const artifact = await _Artifact.deploy();
  await artifact.deployed();

  console.log("Artifact deployed to:", artifact.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
