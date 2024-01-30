const hardhat = require("hardhat");

async function main() {
  let name = "EPIC Gathering";
  let symbol = "EPIC";

  const _Avatar = await hardhat.ethers.getContractFactory(
    "EPICGatheringAvatar"
  );
  const avatar = await _Avatar.deploy(name, symbol);
  await avatar.deployed();

  console.log("Avatar deployed to:", avatar.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
