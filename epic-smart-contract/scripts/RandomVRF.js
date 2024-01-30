const hardhat = require("hardhat");

async function main() {
  let _vrfCoordinator = "0xa555fC018435bef5A13C6c6870a9d4C11DEC329C";
  let _linkToken = "0x84b9B910527Ad5C03A9Ca831909E21e236EA7b06";
  let _keyHash =
    "0xcaf3c3727e033261d383b315559476f48034c13b18f8cafed4d871abe5049186";
  const _Random = await hardhat.ethers.getContractFactory(
    "RandomNumberConsumer"
  );
  const random = await _Random.deploy(_vrfCoordinator, _linkToken, _keyHash);
  await random.deployed();

  console.log("Random deployed to:", random.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
