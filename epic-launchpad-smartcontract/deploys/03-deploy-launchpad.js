const { parseEther } = require("ethers/lib/utils");
const hre = require("hardhat");
const { getAddress } = require("./00-contract-config");

async function main() {
  const TokenRate = [
    {
      rate: 200,
      token: "0xe9e7cea3dedca5984780bafc599bd69add087d56",
    },
  ];

  const EPICLaunchpad = await hre.ethers.getContractFactory("EPICLaunchpad");
  const EPICToken = getAddress().token;
  const EPICLocker = getAddress().locker;
  const deploy = await EPICLaunchpad.deploy(EPICToken, EPICLocker);

  await deploy.deployed();

  console.log("EPICLaunchpad deployed to:", deploy.address);

  for (const item of TokenRate) {
    const _tokenRate = await deploy.setTokenRate(item.rate, item.token);

    await _tokenRate.wait();
  }

  // try {
  //   await hre.run("verify:verify", {
  //     address: deploy.address,
  //     contract: "contracts/EPICLaunchpad.sol:EPICLaunchpad",
  //     constructorArguments: [EPICToken, EPICLocker],
  //   });
  // } catch (error) {
  //   console.log(error);
  // }
}

main().catch((error) => {
  console.error(error);
  process.exitCode = 1;
});
