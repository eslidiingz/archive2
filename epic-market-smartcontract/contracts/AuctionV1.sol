// SPDX-License-Identifier: https://multiverseexpert.com/
pragma solidity ^0.8.2;
import "@openzeppelin/contracts/utils/Counters.sol";
import "@openzeppelin/contracts/access/AccessControl.sol";
import "@openzeppelin/contracts/security/Pausable.sol";
interface IERC20 {
    function transferFrom(address sender, address recipient, uint256 amoun ) external;
    function balanceOf(address account) external returns (uint256);
    function approve(address spender, uint256 amount) external returns (bool);
    function transfer(address recipient, uint256 amount) external returns (bool);
}
interface IERC1155 {
    function balanceOf(address account, uint256 id) external returns (uint256);
    function safeTransferFrom(address from, address to, uint256 id, uint256 amount, bytes memory dat ) external;
    function isApprovedForAll(address account, address operator) external returns (bool);
    function supportsInterface(bytes4 interfaceId) external returns (bool);
}
interface IERC721 {
    function balanceOf(address owner) external returns (uint256);
    function ownerOf(uint256 tokenId) external returns (address);
    function safeTransferFrom( address from, address to, uint256 tokenI ) external;
    function isApprovedForAll(address account, address operator) external returns (bool);
    function supportsInterface(bytes4 interfaceId) external returns (bool);
}

interface ITOKEN {
    function getFee(uint256 price) external view returns(uint256);
    function getDepositRate(uint256 startPirce) external returns(uint256);
}
interface IITEM {
    function lockToken(uint256 _tokenId, bool status) external;
}

contract AuctionV1 is AccessControl, Pausable {
    using Counters for Counters.Counter;
    Counters.Counter public _marketId;
    address payable public _adminWallet; 
    address public _adminCloseBid;
    ITOKEN public wlToken;
    enum TokenType {
        CLOSED,
        ERC1155,
        ERC721
    }
    enum StatusType {
        BIDDING,
        WAIT_WINNER,
        REFUND_DEPOSIT,
        WINNER_ACCEPT,
        WINNER_CANCEL,
        CLOSE_AUCTION,
        SOLD
    }
    struct Bid {
        address _buyer;
        uint256 _price;
        uint256 _time;
        uint256 bidId;
        bool _isAccept;
        bool _active;
        bool _cancel;
    }
    struct RefundStruct{
        bool isBid;
        bool isRefund;
    }
    bytes4 public constant ERC1155_INTERFACE = 0xd9b67a26;
    bytes4 public constant ERC721_INTERFACE = 0x80ac58cd;
    bytes32 public constant ACTIVE_SETTER_ROLE = keccak256("ACTIVE_SETTER_ROLE");
    struct Item {
        address _item;
        address _buyer;
        address _owner;
        address _token;
        uint256 _tokenId;
        uint256 _amount;
        uint256 _price;
        uint256 _placementTime;
        uint256 _startPrice;
        uint256 _expiration;
        uint256 _acceptTime;
        uint256 _marketId;
        uint256 _terminatePrice;
        uint256 _refundPrice;
        TokenType _itemType;
        StatusType _status;
        bool _available;
    }
    Item[] items;
    mapping(uint256 => Bid[]) public bidders;
    mapping(uint256 => mapping(address => RefundStruct)) public refundStruct;
    function pause() public onlyRole(DEFAULT_ADMIN_ROLE) {
        _pause();
    }
    function unpause() public onlyRole(DEFAULT_ADMIN_ROLE) {
        _unpause();
    }
    modifier onlyExistItem(uint256 marketId) {
        (bool found, Item memory itemData) = _getItemInfo(marketId);
        require(found, "Item is not exist");
        require(itemData._available, "Item is not available");
        require(itemData._expiration >= block.timestamp, "This item has expired");
        _;
    }
    modifier onlyItemOwner(uint256 marketId) {
        (bool found, Item memory itemData) = _getItemInfo(marketId);
        require(found, "Not found token");
        bool isERC721 = IERC721(itemData._item).supportsInterface(ERC721_INTERFACE);
        bool isERC1155 = IERC1155(itemData._item).supportsInterface(ERC1155_INTERFACE);
        require(
            (isERC721 && IERC721(itemData._item).ownerOf(itemData._tokenId) == itemData._owner) || 
            (isERC1155 && IERC1155(itemData._item).balanceOf(itemData._owner, itemData._tokenId) >= itemData._amount)
            , "You are not owned this token."
        );
        _;
    }
    modifier uniqueItem(address item, uint256 tokenId, uint256 amount) {
        for(uint256 i = 0; i < items.length; i++){
            if(
                items[i]._amount == amount &&
                items[i]._item == item &&
                items[i]._tokenId == tokenId &&
                items[i]._available &&
                items[i]._owner == msg.sender && 
                items[i]._status == StatusType.BIDDING
            ) revert("This item is already created");
        }
        _;
    }
    function _getItemInfo(uint256 marketId) public view returns(bool, Item memory) {
        Item memory itemData = items[marketId];
        if(itemData._item == address(0)) return (false, itemData);
        return(true, itemData);
    }
    constructor(address tokenWhitelist) {
        address adminWallet = 0xe923EA8B926E9a4b9B3f7FadBF5dd1319a677D67;
        _grantRole(DEFAULT_ADMIN_ROLE, msg.sender);
        _grantRole(ACTIVE_SETTER_ROLE, msg.sender);
        _grantRole(ACTIVE_SETTER_ROLE, adminWallet);
        wlToken = ITOKEN(tokenWhitelist);
        _adminWallet = payable(adminWallet);
        _adminCloseBid = msg.sender;

    }
    function placeAuction (
        address item,
        uint256 tokenId,
        uint256 amount,
        uint256 price,
        uint256 expiration,
        uint256 terminatePrice,
        address token
    ) public whenNotPaused uniqueItem(item, tokenId, amount) {
        TokenType itemType = TokenType.CLOSED;
        uint256 placementFee = wlToken.getFee(price);
        require(amount >= 1 && price > 0, "Amount & price is incorrect");
        require(IERC20(token).balanceOf(msg.sender) >= placementFee, "Balance isn't enough");
        if(IERC721(item).supportsInterface(ERC721_INTERFACE)){
            itemType = TokenType.ERC721;
        } else if(IERC1155(item).supportsInterface(ERC1155_INTERFACE)){
            itemType = TokenType.ERC1155;
        }
        IERC20(token).transferFrom(msg.sender, _adminWallet, placementFee);
        IITEM(item).lockToken(tokenId, true);
        uint256 marketId = _marketId.current();
        _marketId.increment();
        items.push(
            Item(
                item,
                address(0), // buyer
                msg.sender, // owner
                token,
                tokenId,
                amount,
                price,
                block.timestamp, // placementTime
                price, // startPrice
                expiration,
                expiration + 1 days, // acceptTime
                marketId,
                terminatePrice,
                wlToken.getDepositRate(price),
                itemType,
                StatusType.BIDDING,
                true // available
            )
        );
        bidders[marketId].push(
            Bid(
                msg.sender,
                price,
                block.timestamp,
                bidders[marketId].length,
                false,
                true,
                false
            )
        );
    }
    function tranferItem(Item memory itemData) internal virtual whenNotPaused {
        IITEM(itemData._item).lockToken(itemData._tokenId, false);
        if(itemData._itemType == TokenType.ERC1155){
            IERC1155(itemData._item).safeTransferFrom(
                itemData._owner, 
                msg.sender, 
                itemData._tokenId, 
                itemData._amount, 
                ""
            );
        } else if (itemData._itemType == TokenType.ERC721){
            IERC721(itemData._item).safeTransferFrom(
                itemData._owner, 
                msg.sender, 
                itemData._tokenId
            );
        } else {
            revert("Tranfer item fail");
        }
    }
    function buyAuction(uint256 marketId) public whenNotPaused onlyExistItem(marketId){
        (, Item memory itemData) = _getItemInfo(marketId);
        require(msg.sender != itemData._owner, "You already owned this item");
        require(itemData._terminatePrice > 0, "This item available for bidding");
        require(
            itemData._status == StatusType.BIDDING
        , "Auction isn't available");
        IERC20(itemData._token).transferFrom(msg.sender, itemData._owner, itemData._terminatePrice);
        items[marketId]._available = false;
        items[marketId]._buyer = msg.sender;
        items[marketId]._acceptTime = block.timestamp;
        items[marketId]._status = StatusType.SOLD;
        tranferItem(itemData);
    }
    function refundBid(uint256 marketId) public whenNotPaused onlyExistItem(marketId) {
        (, Item memory itemData) = _getItemInfo(marketId);
        RefundStruct memory refundData = refundStruct[marketId][msg.sender];
        (Bid memory winner, ) = _getBidWinner(marketId);
        if(winner._buyer == msg.sender && itemData._status == StatusType.WAIT_WINNER){
            require(winner._isAccept, "Winner must accept first");
        }
        require(
            refundData.isBid &&
            refundData.isRefund == false &&
            itemData._owner != msg.sender,
            "You can't refund"
        );
        require(
            itemData._status != StatusType.BIDDING ||
            itemData._expiration < block.timestamp,
            "Refund isn't available"
        );
        refundStruct[marketId][msg.sender].isRefund = true;
        IERC20(itemData._token).approve(msg.sender, itemData._refundPrice);
        IERC20(itemData._token).transfer(msg.sender, itemData._refundPrice);
    }
    function withdrawCash(address token) public whenPaused onlyRole(DEFAULT_ADMIN_ROLE){
        uint256 balance = IERC20(token).balanceOf(address(this));
        IERC20(token).approve(msg.sender, balance);
        IERC20(token).transfer(msg.sender, balance);
    }
    function getAllAuction() public view returns(Item[] memory){
        return items;
    }
    function _getBidWinner(uint256 marketId) public view returns(Bid memory, uint256) {
        for(uint256 i = bidders[marketId].length - 1; i >= 0; i--){
            if(bidders[marketId][i]._active) return (bidders[marketId][i], i);
        }
        return (Bid(address(0), 0, 0, 0, false, false, false), 0);
    }
    function getAllBids(uint256 marketId) public view returns (Bid[] memory){
        return bidders[marketId];
    }
    function getSpecificBid(uint256 marketId, uint256 index) public view returns (Bid memory){
        return bidders[marketId][index];
    }
    function cancelAuction(uint256 marketId) public whenNotPaused onlyItemOwner(marketId)  {
        (, Item memory itemData) = _getItemInfo(marketId);
        require(itemData._status == StatusType.BIDDING, "Auction isn't available");
        require(msg.sender == itemData._owner, "You can't cancel this auction");
        IITEM(itemData._item).lockToken(itemData._tokenId, false);
        items[marketId]._available = false;
        items[marketId]._status = StatusType.CLOSE_AUCTION;
    }
    function cancelBid(uint256 marketId, uint256 offerId) public whenNotPaused onlyExistItem(marketId) {
        Bid memory bidData = bidders[marketId][offerId];
        require(bidData._buyer == msg.sender, "You can't cancle this bid");
        require(items[marketId]._owner != msg.sender, "Owner can't cancle bid");
        require(items[marketId]._status == StatusType.BIDDING, "Auction isn't available");
        (Bid memory bidWinner, ) = _getBidWinner(marketId);
        IERC20(items[marketId]._token).transferFrom(msg.sender, _adminWallet, wlToken.getFee(bidData._price));
        if(bidWinner._price == bidders[marketId][offerId]._price){
            for(uint256 i = offerId - 1; i >= 0; i--){
                if(bidders[marketId][i]._active && bidders[marketId][i]._cancel == false){
                    items[marketId]._price = bidders[marketId][i]._price;
                    break;
                }
            }
        }
        bidders[marketId][offerId]._active = false;
        bidders[marketId][offerId]._cancel = true;
    }
    function closeBid(uint256 marketId) public whenNotPaused onlyItemOwner(marketId){
        (, Item memory itemData) = _getItemInfo(marketId);
        require(itemData._available && itemData._expiration > block.timestamp, "This item already closed");
        require(msg.sender == itemData._owner || msg.sender == _adminCloseBId, "You can't close this auction");
        (Bid memory winner, ) = _getBidWinner(marketId);
        require(items[marketId]._status == StatusType.BIDDING, "Can't close this bid");
        items[marketId]._acceptTime = items[marketId]._expiration + 1 days;
        if(bidders[marketId].length == 1 || winner._buyer == itemData._owner){
            items[marketId]._status = StatusType.CLOSE_AUCTION;
        } else {
            items[marketId]._status = StatusType.WAIT_WINNER;
        }
    }
    function winnerAcceptBid(uint256 marketId) public whenNotPaused onlyItemOwner(marketId) {
        (Bid memory winner, uint256 bidId) = _getBidWinner(marketId);
        (bool isFound, Item memory itemData) = _getItemInfo(marketId);
        require(isFound && winner._buyer != address(0) && winner._buyer != itemData._owner, "You can't accept");
        require(itemData._status == StatusType.WAIT_WINNER || itemData._expiration >= block.timestamp, "Auction isn't available");
        require(itemData._acceptTime >= block.timestamp, "Accept time is expired");
        require(winner._buyer == msg.sender, "You can't accept this bid");
        bidders[marketId][bidId]._isAccept = true;
        bidders[marketId][bidId]._active = false;
        IITEM(itemData._item).lockToken(itemData._tokenId, false);
        tranferItem(itemData);
        IERC20(itemData._token).transferFrom(msg.sender, itemData._owner, winner._price);
        items[marketId]._available = false;
        items[marketId]._status = StatusType.WINNER_ACCEPT;
    }
    function bidItem(uint256 marketId, uint256 bidPrice) public whenNotPaused onlyExistItem(marketId) {
        (, Item memory itemData) = _getItemInfo(marketId);
        (Bid memory latestBid, ) = _getBidWinner(marketId);
        RefundStruct memory refundData = getRefundData(marketId, msg.sender);
        require(
            itemData._expiration >= block.timestamp &&
            itemData._available &&
            itemData._price < bidPrice &&
            itemData._status == StatusType.BIDDING &&
            itemData._owner != msg.sender &&
            latestBid._price < bidPrice &&
            refundData.isBid && refundData.isRefund == false,
            "Auction isn't available"    
        );
        require(IERC20(itemData._token).balanceOf(msg.sender) >= bidPrice, "Balance isn't enough");
        items[marketId]._price = bidPrice;
        bidders[marketId].push(
            Bid(
                msg.sender,
                bidPrice,
                block.timestamp,
                bidders[marketId].length,
                false,
                true,
                false
            )
        );
    }
    function depositBid(uint256 marketId) public onlyExistItem(marketId){
        RefundStruct memory refundData = refundStruct[marketId][msg.sender];
        (bool isFound, Item memory itemData) = _getItemInfo(marketId);
        require(refundData.isBid == false && refundData.isRefund == false, "You can't deposit for auction");
        require(isFound && itemData._status == StatusType.BIDDING && itemData._expiration >= block.timestamp, "Auciton isn't available");
        refundStruct[marketId][msg.sender].isBid = true;
        payable(address(this)).transfer(itemData._refundPrice);
    }
    function setAdminWallet(address wallet, address closeBid) public whenNotPaused onlyRole(DEFAULT_ADMIN_ROLE){
        require(wallet != address(0), "Address is incorrect");
        _adminWallet = payable(wallet);
        _adminCloseBid = closeBid;
    }
    function getMarketId(address item, address owner, uint256 tokenId, uint256 amount, bool isAvailable) public view returns(bool, uint256){
        for(uint i = 0; i < items.length; i++){
            if(
                items[i]._available == isAvailable && 
                items[i]._owner == owner && 
                items[i]._tokenId == tokenId && 
                items[i]._amount == amount && 
                items[i]._item == item
            ){
                return (true, items[i]._marketId);
            }
        }
        return (false, 0);
    }
    function setCloseAuction(uint256 marketId) public whenNotPaused onlyExistItem(marketId) onlyRole(ACTIVE_SETTER_ROLE){
        items[marketId]._available = false;
        items[marketId]._status = StatusType.CLOSE_AUCTION;
        IITEM(items[marketId]._item).lockToken(items[marketId]._tokenId, false);
    }
    function getRefundData(uint256 marketId, address user) public view returns(RefundStruct memory){
        return refundStruct[marketId][user];
    }
}