// SPDX-License-Identifier: MIT
pragma solidity ^0.8.4;

import "@openzeppelin/contracts/token/ERC20/utils/SafeERC20.sol";
import "@openzeppelin/contracts/utils/math/SafeMath.sol";
import "@openzeppelin/contracts/security/ReentrancyGuard.sol";
import "@openzeppelin/contracts/security/Pausable.sol";
import "@openzeppelin/contracts/access/AccessControl.sol";

import "@openzeppelin/contracts/token/ERC20/IERC20.sol";

contract EPICStake is ReentrancyGuard, Pausable, AccessControl {
    bytes32 public constant PAUSER_ROLE = keccak256("PAUSER_ROLE");

    using SafeERC20 for IERC20;
    using SafeMath for uint256;

    IERC20 token;

    struct PeriodROI {
        uint256 day;
        uint256 roi;
        bool isActive;
        bool isExist;
    }

    struct Stake {
        address owner;
        uint256 stakeId;
        uint256 month;
        uint256 roi;
        uint256 rewards;
        uint256 amounts;
        uint256 startTime;
        uint256 endTime;
        bool isLocked;
    }

    uint256[] periodROIsList;

    mapping(uint256 => PeriodROI) public periodROIs;
    mapping(address => uint256) public stakeAmounts;
    mapping(address => uint256[]) public stakeOwners;
    mapping(address => mapping(uint256 => Stake)) public stakeLists;

    constructor(address _token) {
        _grantRole(DEFAULT_ADMIN_ROLE, msg.sender);
        _grantRole(PAUSER_ROLE, msg.sender);

        token = IERC20(_token);
    }

    function pause() public onlyRole(PAUSER_ROLE) {
        _pause();
    }

    function unpause() public onlyRole(PAUSER_ROLE) {
        _unpause();
    }

    function setPeriodROI(uint256 _day, uint256 _roi)
        public
        whenNotPaused
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        require(periodROIs[_day].isExist == false, "Period: already exist");
        periodROIs[_day] = PeriodROI(_day, _roi, true, true);
        periodROIsList.push(_day);
    }

    function existPeriodROI(uint256 _day, bool _exist)
        public
        whenNotPaused
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        periodROIs[_day].isExist = _exist;
    }

    function activePeriodROI(uint256 _day, bool _active)
        public
        whenNotPaused
        onlyRole(DEFAULT_ADMIN_ROLE)
    {
        periodROIs[_day].isActive = _active;
    }

    function getPeriodROI(uint256 _day) public view returns (PeriodROI memory) {
        return periodROIs[_day];
    }

    function getAllPeriodROI() public view returns (uint256[] memory) {
        return periodROIsList;
    }

    function stake(uint256 _amount, uint256 _day)
        public
        nonReentrant
        whenNotPaused
    {
        require(_amount > 0, "Amount: non zero");
        require(token.balanceOf(msg.sender) >= _amount, "Amount: non enough");

        require(_day != 0, "Month: non zero");
        require(getPeriodROI(_day).isExist == true, "Month: isn't exist");
        require(getPeriodROI(_day).isActive == true, "Month: isn't active");

        token.safeTransferFrom(msg.sender, address(this), _amount);

        uint256 _stakeId = getStakesByOwner(msg.sender).length;
        uint256 _rewards = calculateReward(_amount, _day);
        stakeAmounts[msg.sender] = stakeAmounts[msg.sender].add(_amount);
        stakeOwners[msg.sender].push(_stakeId);
        stakeLists[msg.sender][_stakeId] = Stake(
            msg.sender,
            _stakeId,
            getPeriodROI(_day).day,
            getPeriodROI(_day).roi,
            _rewards,
            _amount,
            block.timestamp,
            calculateEndTime(_day),
            true
        );
    }

    function unstake(uint256 _stakeId) public nonReentrant whenNotPaused {
        require(
            stakeLists[msg.sender][_stakeId].isLocked == true,
            "Stake: must be locked"
        );

        require(
            block.timestamp >= stakeLists[msg.sender][_stakeId].endTime,
            "Stake: haven't reached the due"
        );

        if (_stakeId == stakeLists[msg.sender][_stakeId].stakeId) {
            uint256 _rewards = stakeLists[msg.sender][_stakeId].rewards;
            uint256 _amounts = stakeLists[msg.sender][_stakeId].amounts;
            token.safeTransfer(msg.sender, _amounts.add(_rewards));

            stakeAmounts[msg.sender] = stakeAmounts[msg.sender].sub(_amounts);

            delete stakeLists[msg.sender][_stakeId];
        }
    }

    function getStakesByOwner(address _owner)
        public
        view
        returns (Stake[] memory)
    {
        uint256[] memory _stakeOwners = stakeOwners[_owner];
        Stake[] memory _stakeLists = new Stake[](_stakeOwners.length);

        for (uint256 i = 0; i < _stakeOwners.length; i++) {
            _stakeLists[i] = stakeLists[_owner][_stakeOwners[i]];
        }

        return _stakeLists;
    }

    function calculateReward(uint256 _amount, uint256 _day)
        public
        view
        returns (uint256)
    {
        uint256 _rewards = (_amount * getPeriodROI(_day).roi).div(100);

        return _rewards;
    }

    function calculateEndTime(uint256 _day) public view returns (uint256) {
        return block.timestamp.add(getPeriodROI(_day).day);
    }
}
