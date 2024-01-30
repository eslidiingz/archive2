// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;

import "@openzeppelin/contracts/access/AccessControl.sol";

contract EpicWhiteList is AccessControl {
    mapping(address => bool) whiteLists;
    uint256 public rateFee;
    constructor(){
        _grantRole(DEFAULT_ADMIN_ROLE, msg.sender);
        rateFee = 2;
        whiteLists[0xeD24FC36d5Ee211Ea25A80239Fb8C4Cfd80f12Ee] = true; // BUSD
        whiteLists[0xdCa36EBf40da42C6E24437Da33674Ce6AcDD8fD4] = true; // EPIC
    }
    function _getWhiteList(address token) public view returns (bool){
        return whiteLists[token];
    }
    function addWhiteList(address token) public payable onlyRole(DEFAULT_ADMIN_ROLE){
       whiteLists[token] = true;
    }
    function removeWhiteList(address token) public payable onlyRole(DEFAULT_ADMIN_ROLE){
        whiteLists[token] = false;
    }
    function grantRole(address user) public onlyRole(DEFAULT_ADMIN_ROLE){
        _grantRole(DEFAULT_ADMIN_ROLE, user);
    }
    function setFee(uint256 _rateFee) public payable onlyRole(DEFAULT_ADMIN_ROLE){
        require(_rateFee < 100, "Rate fee is incorrect");
        rateFee = _rateFee;
    }
    function getFee(uint256 price) public view returns (uint256) {
        return price * rateFee / 100;
    }
}
