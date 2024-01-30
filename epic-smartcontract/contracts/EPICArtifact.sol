// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;
import "@openzeppelin/contracts/token/ERC1155/ERC1155.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/utils/math/SafeMath.sol";
import "@openzeppelin/contracts/token/ERC20/IERC20.sol";

contract EPICArtifact is ERC1155, Ownable {
    using SafeMath for uint256;
    address immutable redeemToken;
    uint256 private decimal = 18;
    uint256 public pricePerBox = 500 * 10**decimal;

    uint256 private constant VARIANTS = 0;
    uint256 private constant MYTHICAL = 1;
    uint256 private constant LEGENDARY = 2;
    uint256 private constant RARE = 3;
    uint256 private constant UNCOMMON = 4;
    uint256 private constant COMMON = 5;

    uint256[] private _ids;
    uint256[] private _amount;
    uint256[] private _random;

    address recipentWallet = msg.sender;

    mapping(address => bool) private transferer;
    mapping(uint256 => string) private _uris;
    uint256[] public totalBox = [20, 60, 320, 1000, 3200, 900, 5000, 1500];
    uint256[] public availableBox = [20, 60, 320, 1000, 3200, 900, 5000, 1500];
    uint256 public availableBoxTotal = 12000;
    uint256[] public nftIndex = [0, 1, 2, 3, 4, 4, 5, 5];
    uint256[] public nftAmount = [1, 1, 1, 1, 1, 5, 1, 5];

    modifier onlyTransfer() {
        require(transferer[msg.sender], "Not a transferer");
        _;
    }

    event statusTransfer(bool status, uint256[] resultRandom);

    constructor(address _redeemToken) ERC1155("") {
        redeemToken = _redeemToken;
        _mint(address(this), VARIANTS, 20, "M.God"); // index box : 0
        _mint(address(this), MYTHICAL, 60, "M.Dukey"); // index box : 1
        _mint(address(this), LEGENDARY, 320, "M.Zomfalo"); // index box : 2
        _mint(address(this), RARE, 1000, "M.Phalish"); // index box : 3
        _mint(address(this), UNCOMMON, 7700, "M.Bubble"); // index box : 4,5
        _mint(address(this), COMMON, 12500, "M.Smoke"); // index box : 6,7
    }

    function uri(uint256 tokenId) public view override returns (string memory) {
        return _uris[tokenId];
    }

    function setTokenURI(uint256 tokenId, string memory _uri) public onlyOwner {
        _uris[tokenId] = _uri;
    }

    function transferItemFromBox(uint256 amount) public {
        IERC20 token = IERC20(redeemToken);
        if (amount < 1 && amount > 5) {
            revert("Amount must between 1 to 5");
        }

        uint256 total = pricePerBox.mul(amount);

        require(token.balanceOf(msg.sender) >= total, "No money");
        require(
            token.allowance(msg.sender, address(this)) >= total,
            "Allowance is not allocate"
        );
        require(availableBoxTotal >= amount, "Box Sold out");

        token.transferFrom(msg.sender, recipentWallet, total);

        _setApprovalForAll(address(this), msg.sender, true);
        for (uint256 i = 0; i < amount; i++) {
            uint256 _rand = randomOfBox();
            _ids.push(nftIndex[_rand]);
            _amount.push(nftAmount[_rand]);
            _random.push(_rand);
            availableBox[_rand] = availableBox[_rand].sub(1);
            availableBoxTotal = availableBoxTotal.sub(1);
        }
        safeBatchTransferFrom(address(this), msg.sender, _ids, _amount, "0x00");
        _setApprovalForAll(address(this), msg.sender, false);

        emit statusTransfer(true, _random);

        delete _ids;
        delete _amount;
        delete _random;
    }

    function setRecipent(address ownerWaller) public onlyOwner {
        recipentWallet = ownerWaller;
    }

    function getRecipent() public view returns (address) {
        return recipentWallet;
    }

    function randomOfBox() public view returns (uint256) {
        bool _status = true;
        uint256 _i = 0;
        uint256 _total = 0;

        uint256 _rand = uint256(
            keccak256(
                abi.encodePacked(
                    block.difficulty,
                    block.timestamp,
                    availableBoxTotal
                )
            )
        ).mod(availableBoxTotal);

        while (_status) {
            _total = _total + availableBox[_i];
            if (_rand <= _total) {
                _status = false;
            } else {
                _i = _i + 1;
            }
        }
        return _i;
    }
}
