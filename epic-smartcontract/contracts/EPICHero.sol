// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;

import "@openzeppelin/contracts/token/ERC721/ERC721.sol";
import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/utils/math/SafeMath.sol";
import "@openzeppelin/contracts/utils/Counters.sol";
import "@openzeppelin/contracts/token/ERC721/extensions/ERC721URIStorage.sol";
import "@openzeppelin/contracts/token/ERC721/extensions/ERC721Enumerable.sol";

contract EPICHero is ERC721, ERC721URIStorage, ERC721Enumerable, Ownable {
    using Counters for Counters.Counter;
    using SafeMath for uint256;

    Counters.Counter private _tokenIdCounter;

    uint256 private MAX_SUPPLY = 10000;
    uint256 private CURRENT_SUPPLY = 0;

    address immutable redeemToken;
    uint256 private PRICE;
    address private RECIPIENT;
    string private baseURI = "";

    mapping(uint256 => string) tokenURIs;

    event transferItemList(uint256[] resultRandom);

    constructor(
        address _redeemToken,
        string memory name,
        string memory symbol
    ) ERC721(name, symbol) {
        redeemToken = _redeemToken;
    }

    function supportsInterface(bytes4 interfaceId)
        public
        view
        virtual
        override(ERC721, ERC721Enumerable)
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

    function safeMint(string memory uri) public onlyOwner {
        CURRENT_SUPPLY = _tokenIdCounter.current();
        require(
            CURRENT_SUPPLY <= MAX_SUPPLY,
            "Character: Can't mint more than 10000 supplys"
        );
        uint256 tokenId = _tokenIdCounter.current();
        _tokenIdCounter.increment();
        _safeMint(address(this), tokenId);
        _setTokenURI(tokenId, uri);
    }

    function burn(uint256 tokenId) public onlyOwner {
        _burn(tokenId);
    }

    function _burn(uint256 tokenId)
        internal
        override(ERC721, ERC721URIStorage)
    {
        super._burn(tokenId);
    }

    function tokenURI(uint256 tokenId)
        public
        view
        override(ERC721, ERC721URIStorage)
        returns (string memory)
    {
        return super.tokenURI(tokenId);
    }

    function transferItem(uint256 tokenId) public {
        IERC20 token = IERC20(redeemToken);
        uint256 _price = getBasePrice();
        uint256 _totalBalance = _price.mul(1);

        require(
            token.balanceOf(msg.sender) >= _totalBalance,
            "Token: Token not enough"
        );

        require(
            token.allowance(msg.sender, address(this)) >= _totalBalance,
            "Token: Allowance isn't allocate"
        );

        token.transferFrom(msg.sender, RECIPIENT, _totalBalance);
        _setApprovalForAll(address(this), msg.sender, true);
        safeTransferFrom(address(this), msg.sender, tokenId, "0x00");
        _setApprovalForAll(address(this), msg.sender, false);
    }

    function onERC721Received(
        address,
        address,
        uint256,
        bytes memory
    ) public virtual returns (bytes4) {
        return this.onERC721Received.selector;
    }

    function _beforeTokenTransfer(
        address from,
        address to,
        uint256 tokenId
    ) internal override(ERC721, ERC721Enumerable) {
        super._beforeTokenTransfer(from, to, tokenId);
    }
}
