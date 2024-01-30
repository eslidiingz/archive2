const hre = require("hardhat");
const dayjs = require("dayjs");
const duration = require("dayjs/plugin/duration");
const { parseUnits } = require("ethers/lib/utils");
const { getAddress } = require("./00-contract-config");

dayjs.extend(duration);

const convertTime = (amount, unit) => {
  return dayjs.duration(amount, unit).asSeconds();
};

async function main() {
  const dayRate = [
    {
      day: convertTime(5, "minutes"),
      roi: 110,
    },
    {
      day: convertTime(10, "minutes"),
      roi: 115,
    },
    {
      day: convertTime(15, "minutes"),
      roi: 120,
    },
    {
      day: convertTime(20, "minutes"),
      roi: 135,
    },
    {
      day: convertTime(30, "minutes"),
      roi: 150,
    },
  ];

  const EPICStake = await hre.ethers.getContractFactory("EPICStake");
  const EPICToken = getAddress().token;
  const deploy = await EPICStake.deploy(EPICToken);

  await deploy.deployed();

  console.log("EPICStake deployed to:", deploy.address);

  for (const item of dayRate) {
    const _periodROI = await deploy.setPeriodROI(item.day, item.roi);

    await _periodROI.wait();
  }

  // try {
  //   await hre.run("verify:verify", {
  //     address: deploy.address,
  //     contract: "contracts/EPICStake.sol:EPICStake",
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
