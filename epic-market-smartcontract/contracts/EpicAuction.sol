// SPDX-License-Identifier: https://multiverseexpert.com/
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
    function _getWhiteList(address token) external view returns(bool);
    function getFee(uint256 price) external view returns (uint256);
}
interface IAVATAR{
    function lockToken(uint256 token) external;
    function unlockToken(uint256 token) external;
}
contract EpicAuction is AccessControl, Pausable {
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
    Item[] items;
    // mapping bid
    mapping (uint256 => Bid[]) bidders;
    // event
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
        _grantRole(DEFAULT_ADMIN_ROLE, msg.sender);
        _grantRole(ACTIVE_SETTER_ROLE, msg.sender);
        wlToken = ITOKEN(tokenWhiteList);
        _setterAddress = msg.sender;
    }
    function placeAuction(
        address item,
        uint256 tokenId,
        uint256 amount,
        uint256 price,
        uint256 expiration,
        uint256 teminatePrice,
        address token
    ) public whenNotPaused uniqueItem(item, tokenId, amount) returns(uint256) {
        require(wlToken._getWhiteList(token), "Token is not in white list");
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
        IAVATAR(item).lockToken(tokenId);
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
                0,
                address(0),
                true,
                address(0),
                marketId,
                teminatePrice,
                STATUS_TYPE.BIDDING,
                token
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
    function buyAuction(uint256 marketId) public whenNotPaused onlyExistItem(marketId) returns(bool, Item memory){
        (, Item memory itemData) = _getItemInfo(marketId);
        require(msg.sender != itemData._owner, "You already owned this item");
        require(itemData._lockedBuyer == address(0), "This item is not available for buy");
        require(itemData._terminatePrice > 0, "This item available for bidding");
        require(IERC20(itemData._token).balanceOf(msg.sender) >= itemData._terminatePrice, "Balance is not enough");
        IAVATAR(itemData._item).unlockToken(itemData._tokenId);
        IERC20(itemData._token).transferFrom(msg.sender, itemData._owner, itemData._terminatePrice);
        // tranfer NFT to buyer
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
        }
        items[marketId]._available = false;
        items[marketId]._lockedBuyer = msg.sender;
        items[marketId]._buyer = msg.sender;
        items[marketId]._acceptTime = block.timestamp;
        items[marketId]._status = STATUS_TYPE.SOLD;
        return (true, itemData);
    }
    function getAllAuction() public view returns(Item[] memory){
        return items;
    }
    function _getBidWinner(uint256 marketId) internal view returns(Bid memory) {
        for(uint256 i = bidders[marketId].length - 1; i >= 0; i--){
            if(bidders[marketId][i]._active && bidders[marketId][i]._cancel == false) return bidders[marketId][i];
        }
        return Bid(address(0), 0, 0, 0, false, false, false);
    }
    function getAllBids(uint256 marketId) public view returns (Bid[] memory){
        return bidders[marketId];
    }
    function getSpecificBid(uint256 marketId, uint256 index) public view returns (Bid memory){
        return bidders[marketId][index];
    }
    function cancelAuction(uint256 marketId) public whenNotPaused onlyItemOwner(marketId) returns (bool)  {
        (, Item memory itemData) = _getItemInfo(marketId);
        require(msg.sender == itemData._owner, "You can't cancel this auction");
        IAVATAR(itemData._item).unlockToken(itemData._tokenId);
        items[marketId]._available = false;
        items[marketId]._status = STATUS_TYPE.CLOSE_AUCTION;
        return true;
        // transfer fee to admin wallet
    }
    function cancelBid(uint256 marketId, uint256 offerId) public whenNotPaused onlyExistItem(marketId) returns(bool) {
        Bid memory bidData = bidders[marketId][offerId];
        require(bidData._buyer == msg.sender, "You can't cancle this bid");
        require(items[marketId]._status == STATUS_TYPE.BIDDING, "Auction isn't available");
        require(IERC20(items[marketId]._token).balanceOf(msg.sender) >=  wlToken.getFee(bidData._price), "Balance is not enough to pay fee");
        require(offerId >= 1, "Incorrect offerId");
        IERC20(items[marketId]._token).transferFrom(msg.sender, _setterAddress, wlToken.getFee(bidData._price));
        Bid memory bidWinner = _getBidWinner(marketId);
        // offerId 0 - 1(cancel) - 2
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
        return true;
    }
    function closeBid(uint256 marketId) public whenNotPaused onlyItemOwner(marketId) {
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
    function winnerAcceptBid(uint256 marketId) public whenNotPaused returns (bool, uint256) {
        uint256 bidIndex = bidders[marketId].length - 1;
        uint256 price = bidders[marketId][bidIndex]._price;
        require(items.length > marketId, "Item not found");
        require(items[marketId]._acceptTime >= block.timestamp, "Out of accept time");
        require(bidders[marketId][bidIndex]._buyer == msg.sender, "You can't accept this bid");
        require(IERC20(items[marketId]._token).balanceOf(msg.sender) >= price, "Balance winnner is not enough");
        require(items[marketId]._status == STATUS_TYPE.WAIT_WINNER, "Auction status must be wait winner accept, You can't accept this bid");
        (, Item memory itemData) = _getItemInfo(marketId);
        // tranfer NFT
        IAVATAR(itemData._item).unlockToken(itemData._tokenId);
        if(itemData._itemType == TokenType.ERC1155){
            uint256 itemCount = IERC1155(itemData._item).balanceOf(itemData._owner, itemData._tokenId);
            if(itemCount >= itemData._amount){
                // tranfer Item
                IERC1155(itemData._item).safeTransferFrom(
                    itemData._owner, 
                    msg.sender, 
                    itemData._tokenId, 
                    itemData._amount, 
                    ""
                );
            } else {
                revert("Item is not available");
            }
        } else if(itemData._itemType == TokenType.ERC721){
            address ownerItem = IERC721(itemData._item).ownerOf(itemData._tokenId);
            if(ownerItem == itemData._owner){
                // tranfer Item
                IERC721(itemData._item).safeTransferFrom(
                    itemData._owner, 
                    msg.sender, 
                    itemData._tokenId
                );
            } else {
                revert("Item is not available");
            }
        }
        // tranfer erc20 to seller
        IERC20(itemData._token).transferFrom(msg.sender, itemData._owner, price);
        bidders[marketId][bidIndex]._isAccept = true;
        bidders[marketId][bidIndex]._active = false;
        items[marketId]._available = false;
        items[marketId]._lockedBuyer = msg.sender;
        items[marketId]._status = STATUS_TYPE.WINNER_ACCEPT;
        return (true, itemData._marketId);
    }
    function bidItem(uint256 marketId, uint256 bidPrice) public whenNotPaused onlyExistItem(marketId){
        (, Item memory itemData) = _getItemInfo(marketId);
        require(itemData._lockedBuyer == address(0), "This item is not available for auction");
        // Bid memory bidData = _getBidWinner(marketId);
        require(items[marketId]._price < bidPrice, "The auction price must be greater than the latest price");
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
    function setAdminWallet(address wallet) public whenNotPaused onlyRole(DEFAULT_ADMIN_ROLE) {
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
    function setAvailable(uint256 marketId) public whenNotPaused onlyExistItem(marketId) onlyRole(ACTIVE_SETTER_ROLE) returns (bool){
        items[marketId]._available = false;
        items[marketId]._status = STATUS_TYPE.CLOSE_AUCTION;
        return true;
    }
    function setSetterAddress(address setter) public whenNotPaused onlyRole(DEFAULT_ADMIN_ROLE){
        _setterAddress = setter;
    }
    function setActiveRole(address adds) public whenNotPaused onlyRole(DEFAULT_ADMIN_ROLE) returns (bool){
        _grantRole(ACTIVE_SETTER_ROLE, adds);
        return true;
    }
    function isWinnerAccept(uint256 marketId) public view returns(bool, address winner){
        uint256 bidIndex = bidders[marketId].length - 1 ;
        return (bidders[marketId][bidIndex]._isAccept, bidders[marketId][bidIndex]._buyer);
    }
}