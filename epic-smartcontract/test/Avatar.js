const { expect } = require("chai");

describe("Avatar contract", function () {
  let avatarFactory;
  let avatarContract;
  let owner;
  let addr1;
  let addr2;
  let addrs;

  beforeEach(async function () {
    avatarFactory = await ethers.getContractFactory("EPICGatheringAvatarV1");
    [owner, addr1, addr2, ...addrs] = await ethers.getSigners();

    avatarContract = await Token.deploy();
  });

  describe("Set clan", function () {
    it("Should set the right owner", async function () {
      expect(await hardhatToken.owner()).to.equal(owner.address);
    });

    it("Should assign the total supply of tokens to the owner", async function () {
      const ownerBalance = await hardhatToken.balanceOf(owner.address);
      expect(await hardhatToken.totalSupply()).to.equal(ownerBalance);
    });
  });
});
