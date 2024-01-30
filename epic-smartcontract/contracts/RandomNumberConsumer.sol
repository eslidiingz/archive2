// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;

import "@chainlink/contracts/src/v0.8/VRFConsumerBase.sol";

contract RandomNumberConsumer is VRFConsumerBase {
    bytes32 internal keyHash;
    uint256 internal fee;
    uint256 public randomResult;

    event RequestRandomness(bytes32 indexed requestId, bytes32 keyHash);
    event RequestRandomnessFulfilled(
        bytes32 indexed requestId,
        uint256 randomness
    );

    constructor(
        address _vrfCoordinator,
        address _linkToken,
        bytes32 _keyHash
    ) VRFConsumerBase(_vrfCoordinator, _linkToken) {
        keyHash = _keyHash;
        fee = 0.1 * 10**18; //0.1 LINK
    }

    function getRandomNumber() public returns (bytes32 requestId) {
        require(
            LINK.balanceOf(address(this)) > fee,
            "LINK: Not enough LINK - fill contract with faucet"
        );
        bytes32 _requestId = requestRandomness(keyHash, fee);
        emit RequestRandomness(_requestId, keyHash);
        return _requestId;
    }

    /**
     * Callback function used by VRF Coordinator
     */
    function fulfillRandomness(bytes32 requestId, uint256 randomness)
        internal
        override
    {
        randomResult = randomness;
        emit RequestRandomnessFulfilled(requestId, randomness);
    }
}
