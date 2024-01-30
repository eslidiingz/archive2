// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;

import "@openzeppelin/contracts/token/ERC1155/ERC1155.sol";
import "@openzeppelin/contracts/token/ERC1155/IERC1155Receiver.sol";
import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/utils/math/SafeMath.sol";
import "@openzeppelin/contracts/utils/Strings.sol";
import "./RandomNumberConsumer.sol";

contract EPICArtifact is ERC1155, Ownable {
    using SafeMath for uint256;

    address immutable redeemToken;
    uint256 public MAX_SUPPLY = 10000;
    uint256 private CURRENT_SUPPLY = 0;
    uint256 public PRICE;
    address private RECIPIENT;

    uint256[] private resultId;
    uint256[] private resultAmount;
    uint256[] private resultRandom;

    uint256[] public INDEX = [0, 1, 2, 3, 4, 4, 5, 5];
    uint256[] public AMOUNT = [1, 1, 1, 1, 1, 5, 1, 5];

    RandomNumberConsumer randomNumber;

    mapping(uint256 => string) private _uris;

    event transferItemList(uint256[] resultRandom);

    constructor(address _redeemToken, address _randomNumberGeneratorContract)
        ERC1155("")
    {
        redeemToken = _redeemToken;
        randomNumber = RandomNumberConsumer(_randomNumberGeneratorContract);
    }

    function supportsInterface(bytes4 interfaceId)
        public
        view
        virtual
        override(ERC1155)
        returns (bool)
    {
        return
            interfaceId == type(IERC1155).interfaceId ||
            interfaceId == type(IERC1155MetadataURI).interfaceId ||
            super.supportsInterface(interfaceId);
    }

    function setURI(string memory newuri) public {
        _setURI(newuri);
    }

    function setBasePrice(uint256 _price) public onlyOwner {
        PRICE = _price * 10**18;
    }

    function getBasePrice() public view returns (uint256) {
        return PRICE;
    }

    function setRecipient(address _wallet) public onlyOwner {
        RECIPIENT = _wallet;
    }

    function getRecipient() public view returns (address) {
        return RECIPIENT;
    }

    function safeMint(
        uint256 _tokenID,
        uint256 amount,
        bytes memory data
    ) public onlyOwner {
        require(
            CURRENT_SUPPLY <= MAX_SUPPLY,
            "Artifact: Can't mint more than 10000 supplys"
        );
        _mint(address(this), _tokenID, amount, data);
        CURRENT_SUPPLY += amount;
    }

    function uri(uint256 _tokenID)
        public
        view
        override
        returns (string memory)
    {
        return (_uris[_tokenID]);
    }

    function setTokenURI(uint256 _tokenID, string memory _uri)
        public
        onlyOwner
    {
        require(
            bytes(_uris[_tokenID]).length == 0,
            "Artifact : Can't set token uri duplicate"
        );
        _uris[_tokenID] = _uri;
    }

    function transferItem(uint256 amounts) public {
        IERC20 token = IERC20(redeemToken);
        require(amounts <= 5, "Artifact: Can't buy more than 5 boxs");
        uint256 _price = getBasePrice();
        uint256 _totalBalance = _price.mul(amounts);

        require(
            token.balanceOf(msg.sender) >= _totalBalance,
            "Token: Token not enough"
        );
        require(
            token.allowance(msg.sender, address(this)) >= _totalBalance,
            "Token: Allowance isn't allocate"
        );
        require(CURRENT_SUPPLY >= amounts, "Artifact: Artifact is sold out");

        token.transferFrom(msg.sender, RECIPIENT, _totalBalance);

        _setApprovalForAll(address(this), msg.sender, true);

        for (uint256 i = 0; i < amounts; i++) {
            bytes32 _random = randomNumber.getRandomNumber();
            uint256 _rand = uint256(_random);
            uint256 _index = _rand.mod(5);

            resultId.push(INDEX[_index]);
            resultAmount.push(AMOUNT[_index]);
            resultRandom.push(_index);
        }

        safeBatchTransferFrom(
            address(this),
            msg.sender,
            resultId,
            resultAmount,
            "0x00"
        );

        _setApprovalForAll(address(this), msg.sender, false);

        emit transferItemList(resultRandom);

        delete resultId;
        delete resultAmount;
        delete resultRandom;
    }

    function onERC1155Received(
        address,
        address,
        uint256,
        uint256,
        bytes memory
    ) public virtual returns (bytes4) {
        return this.onERC1155Received.selector;
    }
}
