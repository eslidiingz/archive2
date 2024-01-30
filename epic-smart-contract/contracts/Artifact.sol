// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;

import "@openzeppelin/contracts/token/ERC1155/ERC1155.sol";
import "@openzeppelin/contracts/token/ERC1155/IERC1155Receiver.sol";
import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/utils/math/SafeMath.sol";
import "@openzeppelin/contracts/utils/Strings.sol";

contract Artifact is ERC1155, Ownable {
    using SafeMath for uint256;

    uint256 public MAX_SUPPLY = 10000;
    uint256 private CURRENT_SUPPLY = 0;

    mapping(uint256 => string) private _uris;

    constructor() ERC1155("") {}

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

    function safeMint(
        address _address,
        uint256 _tokenID,
        uint256 amount,
        bytes memory data
    ) public onlyOwner {
        require(
            CURRENT_SUPPLY <= MAX_SUPPLY,
            "Artifact: Can't mint more than 10000 supplys"
        );
        _mint(_address, _tokenID, amount, data);
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
