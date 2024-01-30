require("dotenv").config();
require("@nomiclabs/hardhat-ethers");

const secret = process.env;
const contract = require("../artifacts/contracts/EPICCharacter.sol/EPICCharacter.json");
const contractInterface = contract.abi;

let provider = ethers.provider;

const privateKey = secret.privateKey1;
const wallet = new ethers.Wallet(privateKey);

wallet.provider = provider;
const signer = wallet.connect(provider);

const CharacterFactory = new ethers.Contract(
  "0xAA5D4EbDF12862741F3629fCB7909462f3DdbC1A",
  contractInterface,
  signer
);

async function main() {
  for (let index = 0; index < 10; index++) {
    const transaction = await CharacterFactory.premint(index, `${index}.json`);

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
