// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;

import "@openzeppelin/contracts/token/ERC20/ERC20.sol";
import "@openzeppelin/contracts/access/Ownable.sol";

contract EPICToken is ERC20, Ownable {
    constructor() ERC20("EPIC Token", "EPIC") {
        _mint(msg.sender, 1000000 * 10**decimals());
    }

    function mint(address to, uint256 amount) public onlyOwner {
        _mint(to, amount * 10**decimals());
    }

    function approveUnlimit(address spender) public returns (bool) {
        _approve(msg.sender, spender, 2**256 - 1);
        return true;
    }
}
