const hre = require("hardhat");
const dayjs = require("dayjs");
const duration = require("dayjs/plugin/duration");
const { getAddress } = require("./00-contract-config");

dayjs.extend(duration);

const convertTime = (amount, unit) => {
  return dayjs.duration(amount, unit).asSeconds();
};

async function main() {
  const saleType = [
    {
      name: "Private Sale",
      timeLock: [
        convertTime(12, "months"),
        convertTime(13, "months"),
        convertTime(14, "months"),
        convertTime(15, "months"),
        convertTime(16, "months"),
        convertTime(17, "months"),
        convertTime(18, "months"),
        convertTime(19, "months"),
        convertTime(20, "months"),
      ],
      percentLock: [25, 10, 10, 10, 10, 10, 10, 10, 5],
    },
  ];

  const EPICLocker = await hre.ethers.getContractFactory("EPICLocker");
  const EPICToken = getAddress().token;
  const deploy = await EPICLocker.deploy(EPICToken);

  await deploy.deployed();

  console.log("EPICLocker deployed to:", deploy.address);

  for (const item of saleType) {
    const _saleType = await deploy.setSaleType(
      item.name,
      item.timeLock,
      item.percentLock
    );

    await _saleType.wait();
  }

  // try {
  //   await hre.run("verify:verify", {
  //     address: deploy.address,
  //     contract: "contracts/EPICLocker.sol:EPICLocker",
  //     constructorArguments: [EPICToken],
  //   });
  // } catch (error) {
  //   console.log(error);
  // }
}

main().catch((error) => {
  console.error(error);
  process.exitCode = 1;
});
