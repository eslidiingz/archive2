const { ethers, upgrades } = require("hardhat");

async function main() {
  const name = "EPIC Gathering";
  const symbol = "EPIC";
  const seed = "0x346B622bFd12402ae80496DD722E757D11cb7342";
  const ipnsHash =
    "k51qzi5uqu5dj2cn085gvuf10uso625ebevuscve5mep4oufbkxiwef8kfbwon";
  const baseURI = `https://ipfs.epicgathering.io/ipns/${ipnsHash}/`;

  const AvatarFactory = await ethers.getContractFactory(
    "EPICGatheringAvatarV1"
  );
  const avatar = await upgrades.deployProxy(
    AvatarFactory,
    [name, symbol, seed, baseURI],
    {
      initializer: "initialize",
    }
  );

  await avatar.deployed();
  console.log(avatar.address);
}

main()
  .then(() => process.exit(0))
  .catch((error) => {
    console.error(error);
    process.exit(1);
  });
