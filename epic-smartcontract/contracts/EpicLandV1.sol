// SPDX-License-Identifier
pragma solidity ^0.8.2;

import "@openzeppelin/contracts/token/ERC721/ERC721.sol";
import "@openzeppelin/contracts/access/AccessControl.sol";
import "@openzeppelin/contracts/utils/math/SafeMath.sol";
import "@openzeppelin/contracts/security/Pausable.sol";
import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/token/ERC721/extensions/ERC721Enumerable.sol";
import "@openzeppelin/contracts/token/ERC721/extensions/ERC721URIStorage.sol";

contract EpicLandV1 is
    ERC721,
    AccessControl,
    Pausable,
    ERC721Enumerable,
    ERC721URIStorage
{
    using SafeMath for uint256;

    string public baseURI;
    address public adminWallet;
    uint256 public landPrice;
    bytes32 public constant LOCKER_ROLE = keccak256("LOCKER_ROLE");
    bytes32 public constant WHITELIST_ROLE = keccak256("WHITELIST_ROLE");

    mapping(address => bool) public isBuyable;

    mapping(uint256 => mapping(uint256 => mapping(uint256 => mapping(uint256 => mapping(uint256 => SponsorWhitelist)))))
        public sponsorZone;

    mapping(uint256 => bool) public isLockable;

    struct SponsorWhitelist {
        address owner;
        bool status;
        bool isClaim;
    }
    modifier sponsorPosition(uint256 x, uint256 y) {
        bool isOnX = (x == 13 || x == 45);
        bool isOnY = (y == 13 || y == 45);
        require(isOnX && isOnY, "Invalid Position");
        _;
    }

    constructor(
        string memory name,
        string memory symbol,
        address token,
        uint256 price
    ) ERC721(name, symbol) ERC721Enumerable() {
        _grantRole(DEFAULT_ADMIN_ROLE, msg.sender);
        _grantRole(LOCKER_ROLE, msg.sender);
        _grantRole(WHITELIST_ROLE, msg.sender);
        isBuyable[token] = true;
        adminWallet = msg.sender;
        landPrice = price;
    }

    function setAdminWallet(address wallet)
        public
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        adminWallet = wallet;
    }

    function setTokenBuyable(address token, bool status)
        public
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        isBuyable[token] = status;
    }

    function supportsInterface(bytes4 interfaceId)
        public
        view
        virtual
        override(ERC721, ERC721Enumerable, AccessControl)
        returns (bool)
    {
        return
            interfaceId == type(IERC721).interfaceId ||
            interfaceId == type(IERC721Metadata).interfaceId ||
            super.supportsInterface(interfaceId);
    }

    function buyLand(
        uint256 continent,
        uint256 region,
        uint256 zone,
        uint256 x,
        uint256 y,
        uint256 buildingSize,
        address tokenToBuy
    ) public {
        IERC20(tokenToBuy).transferFrom(msg.sender, adminWallet, landPrice);
        uint256 tokenId = generateTokenId(
            continent,
            region,
            zone,
            x,
            y,
            buildingSize,
            false
        );
        safeMint(msg.sender, tokenId);
    }

    function isSponsorLand(uint256 x, uint256 y) private pure returns (bool) {
        bool isOnX = (x >= 13 && x <= 18) || (x >= 45 && x <= 50);
        bool isOnY = (y >= 13 && y <= 18) || (y >= 45 && y <= 50);
        return isOnX && isOnY;
    }

    function generateTokenId(
        uint256 continent,
        uint256 region,
        uint256 zone,
        uint256 x,
        uint256 y,
        uint256 buildingSize,
        bool isCallerSponsor
    ) public pure returns (uint256) {
        require(continent >= 1 && continent <= 3, "Continent is invalid");
        require(zone >= 1 && zone <= 2, "Zone is invalid");
        require(x <= 63 && y <= 63, "Coordinate is invalid");
        require(
            buildingSize >= 1 && buildingSize <= 26,
            "Building size is invalid"
        );
        if (continent == 3) {
            require(region >= 1 && region <= 7, "Region is invalid");
        } else {
            require(region >= 1 && region <= 10, "Region is invalid");
        }
        if (isCallerSponsor == false)
            require(isSponsorLand(x, y) == false, "Can't buy sponsor land");

        uint256 tokenId = 0;
        // sample 1 05 1 00 05 20
        tokenId += continent.mul(10**9);
        tokenId += region.mul(10**7);
        tokenId += zone.mul(10**6);
        tokenId += x.mul(10**4);
        tokenId += y.mul(10**2);
        tokenId += buildingSize;
        return tokenId;
    }

    function buyLandForSponsor(
        uint256 continent,
        uint256 region,
        uint256 zone,
        uint256 x,
        uint256 y
    ) public sponsorPosition(x, y) {
        SponsorWhitelist memory sponsorWhitelist = sponsorZone[continent][
            region
        ][zone][x][y];
        require(
            sponsorWhitelist.status &&
                sponsorWhitelist.owner == msg.sender &&
                sponsorWhitelist.isClaim == false,
            "Caller did not have permission"
        );
        sponsorZone[continent][region][zone][x][y].isClaim = true;
        for (uint256 i = x; i <= x + 5; i++) {
            for (uint256 j = y; j <= y + 5; j++) {
                uint256 tokenId = generateTokenId(
                    continent,
                    region,
                    zone,
                    x,
                    y,
                    1,
                    true
                );
                safeMint(msg.sender, tokenId);
            }
        }
    }

    function setIsSponsor(
        address sponsor,
        uint256 continent,
        uint256 region,
        uint256 zone,
        uint256 x,
        uint256 y
    ) public onlyRole(WHITELIST_ROLE) sponsorPosition(x, y) {
        sponsorZone[continent][region][zone][x][y] = SponsorWhitelist(
            sponsor,
            true,
            false
        );
    }

    function safeMint(address owner, uint256 tokenId) private whenNotPaused {
        _safeMint(owner, tokenId);
        _setTokenURI(
            tokenId,
            string(abi.encodePacked(baseURI, tokenId, ".json"))
        );
    }

    function pause() public onlyRole(DEFAULT_ADMIN_ROLE) {
        _pause();
    }

    function unpause() public onlyRole(DEFAULT_ADMIN_ROLE) {
        _unpause();
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

    function _beforeTokenTransfer(
        address from,
        address to,
        uint256 tokenId
    ) internal override(ERC721, ERC721Enumerable) whenNotPaused {
        require(isLockable[tokenId] == false, "Token is already locked");
        // require(tokenLock[tokenId] == false, "Avatar: Token locked");
        super._beforeTokenTransfer(from, to, tokenId);
    }
}
