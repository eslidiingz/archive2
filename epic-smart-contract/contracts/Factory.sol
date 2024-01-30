// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;
import "@openzeppelin/contracts/utils/math/SafeMath.sol";
import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/token/ERC721/IERC721.sol";
import "@openzeppelin/contracts/token/ERC1155/IERC1155.sol";
import "./RandomNumber.sol";

contract Factory is Ownable {
    using SafeMath for uint256;
    address immutable redeemToken;
    address immutable characterAddress;
    address immutable artifactAddress;

    uint256[] private resultId;
    uint256[] private resultAmount;

    struct Result {
        string _type;
        uint256 _id;
    }

    Result[] public results;

    uint256[] public INDEX = [0, 1, 2, 3, 4, 4, 5, 5];
    uint256[] public AMOUNT = [1, 1, 1, 1, 1, 5, 1, 5];

    RandomNumberConsumer randomNumber;

    uint256 private PRICE;
    address private RECIPIENT;

    event transferItemList(Result[] results);

    constructor(
        address _redeemToken,
        address _randomNumber,
        address _character,
        address _artifact
    ) {
        redeemToken = _redeemToken;
        characterAddress = _character;
        artifactAddress = _artifact;
        randomNumber = RandomNumberConsumer(_randomNumber);
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

    function transferItem(address from, uint256 amount) public {
        IERC20 token = IERC20(redeemToken);
        IERC721 character = IERC721(characterAddress);
        IERC1155 artifact = IERC1155(artifactAddress);
        require(amount <= 5, "Box: Can't buy more than 5 boxs");
        uint256 _price = getBasePrice();
        uint256 _totalBalance = _price.mul(amount);

        require(
            token.balanceOf(msg.sender) >= _totalBalance,
            "Token: Token not enough"
        );
        require(
            token.allowance(msg.sender, address(this)) >= _totalBalance,
            "Token: Allowance isn't allocate"
        );

        token.transferFrom(msg.sender, RECIPIENT, _totalBalance);

        for (uint256 i = 0; i < amount; i++) {
            bytes32 _number = randomNumber.getRandomNumber();
            uint256 number = uint256(_number);

            uint256 _type = number.mod(2);

            if (_type == 0) {
                uint256 _index = number.mod(10);
                character.transferFrom(from, msg.sender, _index);
                results.push(Result("character", _index));
            } else {
                uint256 _index = number.mod(5);
                resultId.push(INDEX[_index]);
                resultAmount.push(AMOUNT[_index]);

                results.push(Result("artifact", _index));
            }
        }

        artifact.safeBatchTransferFrom(
            from,
            msg.sender,
            resultId,
            resultAmount,
            "0x00"
        );

        emit transferItemList(results);
    }
}
