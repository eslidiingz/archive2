// SPDX-License-Identifier: MIT
pragma solidity ^0.8.2;
import "@openzeppelin/contracts/utils/Counters.sol";
import "@openzeppelin/contracts/access/AccessControl.sol";
import "@openzeppelin/contracts/security/Pausable.sol";
interface IERC20 {
    function mint(address to, uint256 amount) external;
    function transferFrom(address sender, address recipient, uint256 amount) external;
    function balanceOf(address account) external returns(uint256);
    function approve(address spender, uint256 amount) external returns(bool);
    function allowance(address owner, address spender) external returns(uint256);
}
interface IERC1155 {
    function balanceOf(address account, uint256 id) external returns(uint256);
    function safeTransferFrom(address from, address to, uint256 id, uint256 amount, bytes memory data) external;
    function isApprovedForAll(address account, address operator) external returns(bool);
    function supportsInterface(bytes4 interfaceId) external returns(bool);
}
interface IERC721 {
    function balanceOf(address owner) external returns(uint256);
    function ownerOf(uint256 tokenId) external returns(address);
    function safeTransferFrom(address from, address to, uint256 tokenId) external;
    function isApprovedForAll(address account, address operator) external returns(bool);
    function supportsInterface(bytes4 interfaceId) external returns(bool);
}
interface ITOKEN{
    function _getWhiteList(address token) external view returns(TOKEN_STRUCT memory);
    function getFee(uint256 price) external view returns (uint256);
}
struct TOKEN_STRUCT {
    bool status;
    uint256 refundRate;
}
contract Auction is AccessControl, Pausable {
    using Counters for Counters.Counter;
    Counters.Counter private _marketIdCounter;
    address public _setterAddress;
    ITOKEN wlToken;
    enum TokenType {
        CLOSED,
        ERC1155,
        ERC721
    }
    enum STATUS_TYPE {
        BIDDING,
        WAIT_WINNER,
        REFUND_DEPOSIT,
        WINNER_ACCEPT,
        WINNER_CANCEL,
        CLOSE_AUCTION,
        SOLD
    }
    bytes4 public constant ERC1155InterfaceId = 0xd9b67a26;
    bytes4 public constant ERC721InterfaceId = 0x80ac58cd;
    bytes32 public constant ACTIVE_SETTER_ROLE = keccak256("ACTIVE_SETTER_ROLE");
    struct Item {
        address _item;
        TokenType _itemType;
        address _owner;
        uint256 _tokenId;
        uint256 _amount;
        uint256 _price;
        uint256 _startPrice;
        uint256 _expiration;
        uint256 _acceptTime;
        address _buyer;
        bool _available;
        address _lockedBuyer;
        uint256 _marketId;
        uint256 _terminatePrice;
        STATUS_TYPE _status;
        address _token;
        uint256 _refundPrice;
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
        address bidder;
        bool isRefund;
    }
    Item[] items;
    mapping(uint256 => Bid[]) bidders; // marketId => struct
    mapping(uint256 => RefundStruct[]) refundStruct; // marketId => struct
    event BidItem(uint256 marketId, uint256 price, uint256 tokenId, address item);
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
        bool isERC721 = IERC721(itemData._item).supportsInterface(ERC721InterfaceId);
        bool isERC1155 = IERC1155(itemData._item).supportsInterface(ERC1155InterfaceId);
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
                items[i]._status == STATUS_TYPE.BIDDING
            ) revert("This item is already created");
        }
        _;
    }
    function _getItemInfo(uint256 marketId) public view returns(bool, Item memory) {
        Item memory itemData = items[marketId];
        if(itemData._item == address(0)) return (false, itemData);
        return(true, itemData);
    }
    constructor(address tokenWhiteList) {
        address adminWallet = 0xe923EA8B926E9a4b9B3f7FadBF5dd1319a677D67;
        _grantRole(DEFAULT_ADMIN_ROLE, msg.sender);
        _grantRole(ACTIVE_SETTER_ROLE, msg.sender);
        _grantRole(ACTIVE_SETTER_ROLE, adminWallet);
        wlToken = ITOKEN(tokenWhiteList);
        _setterAddress = adminWallet;
    }
    function placeAuction(
        address item,
        uint256 tokenId,
        uint256 amount,
        uint256 price,
        uint256 expiration,
        uint256 terminatePrice,
        address token
    ) public whenNotPaused uniqueItem(item, tokenId, amount) returns(uint256) {
        require(wlToken._getWhiteList(token).status, "Token is not in white list");
        require(amount > 0, "Amount is incorrect");
        require(price > 0, "Price must greater than zero");
        require(expiration > block.timestamp, "Incorrect expiration");
        TokenType itemType = TokenType.CLOSED;
        if(IERC1155(item).supportsInterface(ERC1155InterfaceId))
            itemType = TokenType.ERC1155;
        if(IERC721(item).supportsInterface(ERC721InterfaceId))
            itemType = TokenType.ERC721;
        if(itemType == TokenType.ERC1155){
            require(IERC1155(item).balanceOf(msg.sender, tokenId) >= amount, "You do not own this item (ERC1155)");
            require(IERC1155(item).isApprovedForAll(msg.sender, address(this)), "Item is not approve");
        }
        if(itemType == TokenType.ERC721) {
            require(IERC721(item).ownerOf(tokenId) == msg.sender, "You do not own this item (ERC721)");
            require(IERC721(item).isApprovedForAll(msg.sender, address(this)), "Items is not approve");
        }
        uint256 marketId = _marketIdCounter.current();
        _marketIdCounter.increment();
        require(IERC20(token).balanceOf(msg.sender) >= wlToken.getFee(price), "Balance is not enough to pay fee");
        IERC20(token).transferFrom(msg.sender, _setterAddress, wlToken.getFee(price));
        items.push(
            Item(
                item,
                itemType,
                msg.sender,
                tokenId,
                amount,
                price, // bidding price
                price, // startPrice
                expiration,
                0, // acceptTime
                address(0), // buyer
                true, // available
                address(0), // lockedBuyer
                marketId,
                terminatePrice,
                STATUS_TYPE.BIDDING,
                token,
                wlToken._getWhiteList(token).refundRate
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
        return marketId;
    }
    function tranferItem(Item memory itemData) internal virtual {
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
            itemData._status == STATUS_TYPE.BIDDING &&
            itemData._lockedBuyer == address(0)
        , "Auction isn't available");
        require(IERC20(itemData._token).balanceOf(msg.sender) >= itemData._terminatePrice, "Balance is not enough");

        IERC20(itemData._token).transferFrom(msg.sender, itemData._owner, itemData._terminatePrice);
        tranferItem(itemData);
         items[marketId]._available = false;
        items[marketId]._lockedBuyer = msg.sender;
        items[marketId]._buyer = msg.sender;
        items[marketId]._acceptTime = block.timestamp;
        items[marketId]._status = STATUS_TYPE.SOLD;
    }
    function refundBid(uint256 marketId) public whenNotPaused onlyExistItem(marketId) {
        (, Item memory itemData) = _getItemInfo(marketId);
        (bool status, RefundStruct memory refundData, uint256 index) = getUserBidData(marketId, msg.sender); 
        require(
            (status && refundData.isRefund == false) ||
            itemData._status != STATUS_TYPE.BIDDING ||
            itemData._expiration < block.timestamp
            , "You Can't refund this bid");
        IERC20(itemData._token).approve(msg.sender, itemData._refundPrice);
        IERC20(itemData._token).transferFrom(address(this), msg.sender, itemData._refundPrice);
        refundStruct[marketId][index] = RefundStruct(msg.sender, true);
    }
    function withdrawCash(address token) public onlyRole(DEFAULT_ADMIN_ROLE){
        uint256 balance = IERC20(token).balanceOf(address(this));
        // 90% from all balance
        IERC20(token).transferFrom(address(this), _setterAddress, balance * 9 / 10);
    }
    function getAllAuction() public view returns(Item[] memory){
        return items;
    }
    function _getBidWinner(uint256 marketId) internal view returns(Bid memory) {
        for(uint256 i = bidders[marketId].length - 1; i >= 0; i--){
            if(bidders[marketId][i]._active) return bidders[marketId][i];
        }
        return Bid(address(0), 0, 0, 0, false, false, false);
    }
    function getAllBids(uint256 marketId) public view returns (Bid[] memory){
        return bidders[marketId];
    }
    function getSpecificBid(uint256 marketId, uint256 index) public view returns (Bid memory){
        return bidders[marketId][index];
    }
    function cancelAuction(uint256 marketId) public whenNotPaused onlyItemOwner(marketId)  {
        (, Item memory itemData) = _getItemInfo(marketId);
        require(msg.sender == itemData._owner, "You can't cancel this auction");
        items[marketId]._available = false;
        items[marketId]._status = STATUS_TYPE.CLOSE_AUCTION;
    }
    function cancelBid(uint256 marketId, uint256 offerId) public whenNotPaused onlyExistItem(marketId) {
        Bid memory bidData = bidders[marketId][offerId];
        require(bidData._buyer == msg.sender, "You can't cancle this bid");
        require(items[marketId]._status == STATUS_TYPE.BIDDING, "Auction isn't available");
        require(IERC20(items[marketId]._token).balanceOf(msg.sender) >=  wlToken.getFee(bidData._price), "Balance isn't enough to pay fee");
        IERC20(items[marketId]._token).transferFrom(msg.sender, _setterAddress, wlToken.getFee(bidData._price));
        bidders[marketId][offerId]._active = false;
        bidders[marketId][offerId]._cancel = true;
        uint256 bidLastestIndex = bidders[marketId].length - 1;
        if(offerId == bidders[marketId].length - 1 && bidLastestIndex >= 1){
            // set previous bid
           items[marketId]._price = bidders[marketId][bidLastestIndex - 1]._price;
        } else {
            // set start price
            items[marketId]._price = items[marketId]._startPrice;
        }
    }
    function closeBid(uint256 marketId) public whenNotPaused onlyItemOwner(marketId){
         (, Item memory itemData) = _getItemInfo(marketId);
        require(itemData._lockedBuyer == address(0), "The auction has been closed");
        require(itemData._available, "This item is not available");
        require(bidders[marketId].length > 0, "No winner found");
        require(msg.sender == itemData._owner || msg.sender == _setterAddress, "You can't close this auction");
        Bid memory winner = _getBidWinner(marketId);
        require(winner._buyer != address(0), "Not found winner");
        require(items[marketId]._status == STATUS_TYPE.BIDDING, "Can't close this bid");
        require(winner._buyer != itemData._owner, "You already owned this item");
        items[marketId]._acceptTime = items[marketId]._expiration + 1 days;
        items[marketId]._lockedBuyer = winner._buyer;
        if(bidders[marketId].length == 1){
            items[marketId]._status = STATUS_TYPE.CLOSE_AUCTION;
        } else {
            items[marketId]._status = STATUS_TYPE.WAIT_WINNER;
        }
    }
    function winnerAcceptBid(uint256 marketId) public whenNotPaused onlyItemOwner(marketId) {
        uint256 bidIndex = bidders[marketId].length - 1;
        uint256 price = bidders[marketId][bidIndex]._price;
        require(items.length > marketId, "Item not found");
        require(items[marketId]._acceptTime >= block.timestamp, "Out of accept time");
        require(bidders[marketId][bidIndex]._buyer == msg.sender, "You can't accept this bid");
        require(IERC20(items[marketId]._token).balanceOf(msg.sender) >= price, "Balance winnner is not enough");
        require(items[marketId]._status == STATUS_TYPE.WAIT_WINNER, "Auction status must be wait winner accept, You can't accept this bid");
        (, Item memory itemData) = _getItemInfo(marketId);
        // tranfer NFT
        tranferItem(itemData);
        // tranfer erc20 to seller
        IERC20(itemData._token).transferFrom(msg.sender, itemData._owner, price);
        bidders[marketId][bidIndex]._isAccept = true;
        bidders[marketId][bidIndex]._active = false;
        items[marketId]._available = false;
        items[marketId]._lockedBuyer = msg.sender;
        items[marketId]._status = STATUS_TYPE.WINNER_ACCEPT;
    }
    function bidItem(uint256 marketId, uint256 bidPrice) public whenNotPaused onlyExistItem(marketId){
        (, Item memory itemData) = _getItemInfo(marketId);
        (bool status, , ) = getUserBidData(marketId, msg.sender); 
        require(status, "Place deposit before bidding");
        require(itemData._lockedBuyer == address(0), "This item is not available for auction");
        require(bidders[marketId][bidders[marketId].length - 1]._price < bidPrice, "The auction price must be greater than the latest price");
        require(msg.sender != itemData._owner, "You can't bid this auction");
        require(items[marketId]._available, "Auction is not available");
        require(items[marketId]._status == STATUS_TYPE.BIDDING, "Can't bid this auction");
        require(IERC20(items[marketId]._token).balanceOf(msg.sender) >= bidPrice, "Balance is not enough to bid");
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
        emit BidItem(marketId, bidPrice, itemData._tokenId, itemData._item);
    }
    function depositCash(uint256 marketId) public onlyExistItem(marketId){
        (bool status, RefundStruct memory refundData, ) = getUserBidData(marketId, msg.sender);
        require(status == false && refundData.bidder == address(0) && refundData.isRefund == false, "You can't deposit for auction");
        (, Item memory itemData) = _getItemInfo(marketId);
        IERC20(itemData._token).transferFrom(msg.sender, address(this), itemData._refundPrice);
        refundStruct[marketId].push(
            RefundStruct(
                msg.sender,
                false
            )
        );
    }
    function getUserBidData(uint256 marketId, address bidder) public view returns(bool, RefundStruct memory, uint256 index){
        RefundStruct[] memory refundData = refundStruct[marketId];
        for(uint256 i = 0; i < refundData.length; i++){
            if(refundData[i].bidder == bidder) return (true, refundData[i], i);
        }
        return (false, RefundStruct(address(0), false), 0);
    }
    function setAdminWallet(address wallet) public whenNotPaused onlyRole(DEFAULT_ADMIN_ROLE){
        _setterAddress = wallet;
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
    function setAvailable(uint256 marketId) public whenNotPaused onlyExistItem(marketId) onlyRole(ACTIVE_SETTER_ROLE){
        items[marketId]._available = false;
        items[marketId]._status = STATUS_TYPE.CLOSE_AUCTION;
    }
    function grantRoleSetter(address account) public whenNotPaused onlyRole(DEFAULT_ADMIN_ROLE) {
        _grantRole(ACTIVE_SETTER_ROLE, account);
    }
}