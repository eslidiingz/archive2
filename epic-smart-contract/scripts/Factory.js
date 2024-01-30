const hardhat = require("hardhat");

async function main() {
  let redeemToken = "0x7955841e00cc84c91f8A76c1ad98167B14D8CC2E";
  let randomContract = "0xf00f8D162371Dd7f25b23300dEAB579eADDf6A4A";
  let characterContract = "0x8745bf7BB3607faA236a94f0212c7d2635421577";
  let artifactContract = "0xd9520C7Af71aDc501723F32479DcC431eb16BDd7";

  const _Factory = await hardhat.ethers.getContractFactory("Factory");
  const factory = await _Factory.deploy(
    redeemToken,
    randomContract,
    characterContract,
    artifactContract
  );
  await factory.deployed();

  console.log("Factory deployed to:", factory.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
