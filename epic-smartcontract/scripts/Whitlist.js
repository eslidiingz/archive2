const hardhat = require("hardhat");

async function main() {
    const BUSD = "0xed24fc36d5ee211ea25a80239fb8c4cfd80f12ee";
    const marketFactory = await hardhat.ethers.getContractFactory(
        "Whitelist"
    );
    const Whitelist = await marketFactory.deploy(BUSD);

    await Whitelist.deployed();
    await hre.run("verify:verify", {
    address: Whitelist.address,
    constructorArguments: [
        BUSD
    ]
    });
    console.log("Whitelist deployed to:", Whitelist.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
