const hardhat = require("hardhat");

async function main() {
  const addressWallet = [
    { address: "0xE40845297c6693863Ab3E10560C97AACb32cbc6C", name: "MEX" },
    { address: "0x782beb424B3B39a73f48738c19CAE82Ff9F17549", name: "ESDZ" },
    { address: "0x14eD29438789299b0C69f698e9C9ea4B40e49625", name: "SPAK" },
    { address: "0x000B112d94271A55A186F65798396F010DF03Ba6", name: "XPOP" },
    { address: "0x2d4D981813330B390EA73ffd28C587A785e44224", name: "MinusOne" },
    { address: "0x8D6fd4c22102eb51D5c5f1e1B6112AF5F4d6d9c3", name: "AOM" },
    { address: "0x0203Fb006c0D2e1466D8765F3Ce664bCde10e755", name: "Ter" },
    { address: "0x7E1494B8EcF5d853829aD0e0D710340aFd217C98", name: "Rain" },
    { address: "0xbB171F9fE7619E4bE3B0eCbbFE16F42e20E5d02a", name: "Watch" },
    { address: "0x59dBd7027d7174E4Ff9FB2f5174e5f6bD4947148", name: "Ken" },
    { address: "0x54c7bD9CbFb36BEE1Ba5594Fb6d11eE2241a52E4", name: "Nenz" },
    { address: "0x08e51B860923BEA0AB7d05ae7fe2B8d6bbd42fa8", name: "Aonie" },
    { address: "0xde632f00c9bdC770D8707e0E97B014E01AdD7406", name: "Oong" },
    { address: "0x21467932FF15Dc1d4Bec82678d4233795FFbe2Cc", name: "Stamp" },
  ];

  const Token = await hardhat.ethers.getContractFactory("EPICToken");

  const name = "EPIC";
  const symbol = "EPIC";

  const token = await Token.deploy(name, symbol);

  await token.deployed();

  console.log("Token deployed to:", token.address);

  const _decimal = 10 ** 18;
  const ethAmount = 1000000;
  const weiAmount = BigInt(ethAmount * _decimal).toString();
  for (const element of addressWallet) {
    try {
      const mint = await token.mint(element.address, weiAmount);
      await mint.wait();
      const balanceOf = await token.balanceOf(element.address);
      console.log("BalanceOf (" + element.name + ") : ", balanceOf / _decimal);
    } catch (e) {
      console.log("Error (" + element.name + ") : ", element.address);
      console.log("Error Message : ", e);
    }
  }
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
