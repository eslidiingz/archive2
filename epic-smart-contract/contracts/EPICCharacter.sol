// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;

import "@openzeppelin/contracts/token/ERC721/ERC721.sol";
import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/utils/math/SafeMath.sol";
import "@openzeppelin/contracts/utils/Counters.sol";

import "./RandomNumberConsumer.sol";

contract EPICCharacter is ERC721, Ownable {
    using Counters for Counters.Counter;
    using SafeMath for uint256;

    Counters.Counter private _tokenIdCounter;

    uint256 public MAX_SUPPLY = 10000;
    uint256 private CURRENT_SUPPLY = 0;

    address immutable redeemToken;
    uint256 public PRICE;
    address private RECIPIENT;
    string public baseURI = "";

    uint256[] private resultRandom;

    mapping(uint256 => string) tokenURIs;

    RandomNumberConsumer randomNumber;

    event transferItemList(uint256[] resultRandom);

    constructor(
        address _redeemToken,
        address _randomNumberGeneratorContract,
        string memory name,
        string memory symbol
    ) ERC721(name, symbol) {
        redeemToken = _redeemToken;
        randomNumber = RandomNumberConsumer(_randomNumberGeneratorContract);
    }

    function supportsInterface(bytes4 interfaceId)
        public
        view
        virtual
        override(ERC721)
        returns (bool)
    {
        return
            interfaceId == type(IERC721).interfaceId ||
            interfaceId == type(IERC721Metadata).interfaceId ||
            super.supportsInterface(interfaceId);
    }

    function _baseURI()
        internal
        view
        virtual
        override(ERC721)
        returns (string memory)
    {
        return baseURI;
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

    function safeMint(string memory _uri) public onlyOwner {
        CURRENT_SUPPLY = _tokenIdCounter.current();
        require(
            CURRENT_SUPPLY <= MAX_SUPPLY,
            "Character: Can't mint more than 10000 supplys"
        );

        uint256 tokenId = _tokenIdCounter.current();
        tokenURIs[tokenId] = _uri;

        _safeMint(address(this), tokenId);
        _tokenIdCounter.increment();
    }

    function tokenURI(uint256 tokenId)
        public
        view
        virtual
        override(ERC721)
        returns (string memory)
    {
        require(
            _exists(tokenId),
            "ERC721Metadata: URI query for nonexistent token"
        );

        string memory _uri = _baseURI();
        return
            bytes(_uri).length > 0
                ? string(abi.encodePacked(_uri, tokenURIs[tokenId]))
                : "";
    }

    function transferItem(uint256 amounts) public {
        IERC20 token = IERC20(redeemToken);
        require(amounts <= 5, "Character: Can't buy more than 5 boxs");
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

        require(CURRENT_SUPPLY >= amounts, "Character: Character is sold out");
        token.transferFrom(msg.sender, RECIPIENT, _totalBalance);

        _setApprovalForAll(address(this), msg.sender, true);

        for (uint256 i = 0; i < amounts; i++) {
            bytes32 _random = randomNumber.getRandomNumber();
            uint256 _rand = uint256(_random);
            uint256 _index = _rand.mod(10);

            safeTransferFrom(address(this), msg.sender, _index, "0x00");

            resultRandom.push(_index);
        }

        emit transferItemList(resultRandom);

        _setApprovalForAll(address(this), msg.sender, false);
    }
}
