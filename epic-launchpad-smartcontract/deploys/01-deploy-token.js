const hre = require("hardhat");

async function main() {
  const EPICToken = await hre.ethers.getContractFactory("EPICToken");
  const deploy = await EPICToken.deploy();

  await deploy.deployed();

  console.log("EPICToken deployed to:", deploy.address);

  // try {
  //   await hre.run("verify:verify", {
  //     address: deploy.address,
  //     contract: "contracts/EPICToken.sol:EPICToken",
  //   });
  // } catch (error) {
  //   console.log(error);
  // }
}

main().catch((error) => {
  console.error(error);
  process.exitCode = 1;
});
