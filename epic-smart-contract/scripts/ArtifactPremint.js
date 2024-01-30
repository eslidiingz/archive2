require("dotenv").config();
require("@nomiclabs/hardhat-ethers");

const secret = process.env;
const contract = require("../artifacts/contracts/EPICArtifact.sol/EPICArtifact.json");
const contractInterface = contract.abi;

let provider = ethers.provider;

const privateKey = secret.privateKey1;
const wallet = new ethers.Wallet(privateKey);

wallet.provider = provider;
const signer = wallet.connect(provider);

const ArtifactFactory = new ethers.Contract(
  "0xD9D66Ba25Ec229BFd88E054B327668A37AD038D6",
  contractInterface,
  signer
);

async function main() {
  for (let index = 0; index < 10; index++) {
    const transaction = await ArtifactFactory.premint(index, `${index}.json`);

    const tx = await transaction.wait();
    const event = tx.events[0];
    const value = event.args[2];
    const token = value.toNumber(); // Getting the tokenID
    const uri = await CharacterFactory.tokenURI(token);

    console.log(uri);
  }
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
