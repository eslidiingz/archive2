const hardhat = require("hardhat");

async function main() {
  let redeemToken = "0xeAC1abBF048FBb739b149daFcb9756766Ae1Ea5a";
  // let randomContract = "0x78E9320EcC7fB6792efCA8f5C76d7ff7CAe945Be";

  const _Artifact = await hardhat.ethers.getContractFactory("EPICGatheringAvatar");
  const artifact = await _Artifact.deploy(redeemToken);
  await artifact.deployed();

  console.log("Artifact deployed to:", artifact.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
