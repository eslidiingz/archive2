// SPDX-License-Identifier: MIT
pragma solidity ^0.8.4;

import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/security/ReentrancyGuard.sol";
import "@openzeppelin/contracts/security/Pausable.sol";
import "@openzeppelin/contracts/access/AccessControl.sol";
import "@openzeppelin/contracts/token/ERC20/utils/SafeERC20.sol";
import "@openzeppelin/contracts/utils/math/SafeMath.sol";

interface IEPICLocker {
    function lock(
        address _owner,
        uint256 _amount,
        string memory _sale
    ) external;
}

contract EPICLaunchpad is ReentrancyGuard, Pausable, AccessControl {
    using SafeERC20 for IERC20;
    using SafeMath for uint256;

    bytes32 public constant PAUSER_ROLE = keccak256("PAUSER_ROLE");

    uint256 public decimal = 10**2;
    address public recipientWallet;

    IERC20 epicToken;
    IEPICLocker epicLocker;

    struct TokenRate {
        address token;
        uint256 rate;
        bool isActive;
        bool isExist;
    }

    mapping(address => TokenRate) public rateToken;

    event TransferToken(
        string transferType,
        address operator,
        uint256 amountPair,
        uint256 amountToken
    );

    constructor(address _token, address _locker) {
        _grantRole(DEFAULT_ADMIN_ROLE, msg.sender);
        _grantRole(PAUSER_ROLE, msg.sender);

        epicToken = IERC20(_token);
        epicLocker = IEPICLocker(_locker);
        recipientWallet = msg.sender;
    }

    function setDecimalRate(uint256 amount)
        public
        whenNotPaused
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        decimal = amount;
    }

    function setRecipientWallet(address wallet)
        public
        whenNotPaused
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        require(address(0) != wallet, "Non Zero Address");
        recipientWallet = wallet;
    }

    function setTokenRate(uint256 _rate, address _token)
        public
        whenNotPaused
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        require(rateToken[_token].isExist == false, "Token: already exist");
        rateToken[_token] = TokenRate(_token, _rate, true, true);
    }

    function updateTokenRate(uint256 _rate, address _token)
        public
        whenNotPaused
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        rateToken[_token] = TokenRate(_token, _rate, true, true);
    }

    function existTokenRate(address _token, bool _exist)
        public
        whenNotPaused
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        rateToken[_token].isExist = _exist;
    }

    function activeTokenRate(address _token, bool _active)
        public
        whenNotPaused
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        rateToken[_token].isActive = _active;
    }

    function getTokenRate(address _token)
        public
        view
        returns (TokenRate memory)
    {
        return rateToken[_token];
    }

    function buy(
        uint256 _amount,
        address _pairToken,
        string memory _saleType
    ) public nonReentrant whenNotPaused {
        IERC20 pairToken = IERC20(_pairToken);
        require(_amount > 0, "Amount: non zero");
        require(
            getTokenRate(_pairToken).isExist == true,
            "Rate: don't already exist"
        );
        require(
            getTokenRate(_pairToken).isActive == true,
            "Rate: isn't active"
        );

        uint256 rate = getTokenRate(_pairToken).rate.div(decimal);
        uint256 amount = _amount.mul(rate);

        require(
            epicToken.balanceOf(address(this)) >= amount,
            "Launchpad: not enough token"
        );
        require(
            pairToken.balanceOf(msg.sender) >= _amount,
            "Token: your balance not enough"
        );

        pairToken.safeTransferFrom(msg.sender, recipientWallet, _amount);

        epicLocker.lock(msg.sender, amount, _saleType);
        epicToken.safeTransfer(address(epicLocker), amount);

        emit TransferToken("buy", msg.sender, amount, _amount);
    }
}
