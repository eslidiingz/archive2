// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;

import "@openzeppelin/contracts/token/ERC721/ERC721.sol";
import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/utils/math/SafeMath.sol";
import "@openzeppelin/contracts/utils/Counters.sol";

contract Character is ERC721, Ownable {
    using Counters for Counters.Counter;
    using SafeMath for uint256;

    Counters.Counter private _tokenIdCounter;

    uint256 private MAX_SUPPLY = 10000;

    string private baseURI = "";

    mapping(uint256 => string) tokenURIs;

    constructor(string memory name, string memory symbol)
        ERC721(name, symbol)
    {}

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

    function safeMint(address _address, string memory _uri) public onlyOwner {
        uint256 counter = _tokenIdCounter.current();
        require(
            counter <= MAX_SUPPLY,
            "Character: Can't mint more than 10000 supplys"
        );

        uint256 tokenId = _tokenIdCounter.current();
        tokenURIs[tokenId] = _uri;

        _safeMint(_address, tokenId);
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
}
