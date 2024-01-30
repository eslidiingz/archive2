// // SPDX-License-Identifier: MIT
// pragma solidity ^0.8.2;
// import "@openzeppelin/contracts/utils/Counters.sol";
// import "@openzeppelin/contracts/access/AccessControl.sol";
// import "@openzeppelin/contracts/security/Pausable.sol";
// import "./Auction.sol";
// contract AuctionStorage is Auction{
//     constructor(address tokenWhiteList) Auction(tokenWhiteList){

//     }
//     function getBidByIndex(uint256 marketId, uint256 index) public view returns(Bid memory){
//         return bidders[marketId][index];
//     }
//     function getAllBids(uint256 marketId) public view returns (Bid[] memory){
//         return bidders[marketId];
//     }
//     function setAvailable(uint256 marketId) public whenNotPaused onlyExistItem(marketId) onlyRole(ACTIVE_SETTER_ROLE){
//         items[marketId]._available = false;
//         items[marketId]._status = STATUS_TYPE.CLOSE_AUCTION;
//     }
//     function setAdminWallet(address wallet) public whenNotPaused onlyRole(DEFAULT_ADMIN_ROLE){
//         _setterAddress = wallet;
//     }
//     function getMarketId(address item, address owner, uint256 tokenId, uint256 amount, bool isAvailable) public view returns(bool, uint256){
//         for(uint i = 0; i < items.length; i++){
//             if(
//                 items[i]._available == isAvailable && 
//                 items[i]._owner == owner && 
//                 items[i]._tokenId == tokenId && 
//                 items[i]._amount == amount && 
//                 items[i]._item == item
//             ){
//                 return (true, items[i]._marketId);
//             }
//         }
//         return (false, 0);
//     }
//     function grantRoleSetter(address account) public whenNotPaused onlyRole(DEFAULT_ADMIN_ROLE) {
//         _grantRole(ACTIVE_SETTER_ROLE, account);
//     }
//     function getAllAuction() public view returns(Item[] memory){
//         return items;
//     }
//     function cancelBid(uint256 marketId, uint256 offerId) public whenNotPaused onlyExistItem(marketId) {
//         Bid memory bidData = bidders[marketId][offerId];
//         require(bidData._buyer == msg.sender, "You can't cancle this bid");
//         require(items[marketId]._status == STATUS_TYPE.BIDDING, "Auction isn't available");
//         require(IERC20(items[marketId]._token).balanceOf(msg.sender) >=  wlToken.getFee(bidData._price), "Balance isn't enough to pay fee");
//         IERC20(items[marketId]._token).transferFrom(msg.sender, _setterAddress, wlToken.getFee(bidData._price));
//         bidders[marketId][offerId]._active = false;
//         bidders[marketId][offerId]._cancel = true;
//         uint256 bidLastestIndex = bidders[marketId].length - 1;
//         if(offerId == bidders[marketId].length - 1 && bidLastestIndex >= 1){
//             // set previous bid
//            items[marketId]._price = bidders[marketId][bidLastestIndex - 1]._price;
//         } else {
//             // set start price
//             items[marketId]._price = items[marketId]._startPrice;
//         }
//     }
//     function cancelAuction(uint256 marketId) public whenNotPaused onlyItemOwner(marketId)  {
//         (, Item memory itemData) = _getItemInfo(marketId);
//         require(msg.sender == itemData._owner, "You can't cancel this auction");
//         items[marketId]._available = false;
//         items[marketId]._status = STATUS_TYPE.CLOSE_AUCTION;
//     }
//     function refundBid(uint256 marketId) public whenNotPaused onlyExistItem(marketId) {
//         (, Item memory itemData) = _getItemInfo(marketId);
//         (bool status, RefundStruct memory refundData, uint256 index) = getUserBidData(marketId, msg.sender); 
//         require(
//             (status && refundData.isRefund == false) ||
//             itemData._status != STATUS_TYPE.BIDDING ||
//             itemData._expiration < block.timestamp
//             , "You Can't refund this bid");
//         IERC20(itemData._token).transferFrom(address(this), msg.sender, itemData._refundPrice);
//         refundStruct[marketId][index] = RefundStruct(msg.sender, true);
//     }
//     function closeBid(uint256 marketId) public whenNotPaused onlyItemOwner(marketId){
//          (, Item memory itemData) = _getItemInfo(marketId);
//         require(itemData._lockedBuyer == address(0), "The auction has been closed");
//         require(itemData._available, "This item is not available");
//         require(bidders[marketId].length > 0, "No winner found");
//         require(msg.sender == itemData._owner || msg.sender == _setterAddress, "You can't close this auction");
//         Bid memory winner = _getBidWinner(marketId);
//         require(winner._buyer != address(0), "Not found winner");
//         require(items[marketId]._status == STATUS_TYPE.BIDDING, "Can't close this bid");
//         require(winner._buyer != itemData._owner, "You already owned this item");
//         items[marketId]._acceptTime = items[marketId]._expiration + 1 days;
//         items[marketId]._lockedBuyer = winner._buyer;
//         if(bidders[marketId].length == 1){
//             items[marketId]._status = STATUS_TYPE.CLOSE_AUCTION;
//         } else {
//             items[marketId]._status = STATUS_TYPE.WAIT_WINNER;
//         }
//     }
//     function buyAuction(uint256 marketId) public whenNotPaused onlyExistItem(marketId){
//         (, Item memory itemData) = _getItemInfo(marketId);
//         require(msg.sender != itemData._owner, "You already owned this item");
//         require(itemData._terminatePrice > 0, "This item available for bidding");
//         require(
//             itemData._status == STATUS_TYPE.BIDDING &&
//             itemData._lockedBuyer == address(0)
//         , "Auction isn't available");
//         require(IERC20(itemData._token).balanceOf(msg.sender) >= itemData._terminatePrice, "Balance is not enough");

//         IERC20(itemData._token).transferFrom(msg.sender, itemData._owner, itemData._terminatePrice);
//         tranferItem(itemData);
//          items[marketId]._available = false;
//         items[marketId]._lockedBuyer = msg.sender;
//         items[marketId]._buyer = msg.sender;
//         items[marketId]._acceptTime = block.timestamp;
//         items[marketId]._status = STATUS_TYPE.SOLD;
//     }
//     function winnerAcceptBid(uint256 marketId) public whenNotPaused onlyItemOwner(marketId) {
//         uint256 bidIndex = bidders[marketId].length - 1;
//         uint256 price = bidders[marketId][bidIndex]._price;
//         require(items.length > marketId, "Item not found");
//         require(items[marketId]._acceptTime >= block.timestamp, "Out of accept time");
//         require(bidders[marketId][bidIndex]._buyer == msg.sender, "You can't accept this bid");
//         require(IERC20(items[marketId]._token).balanceOf(msg.sender) >= price, "Balance winnner is not enough");
//         require(items[marketId]._status == STATUS_TYPE.WAIT_WINNER, "Auction status must be wait winner accept, You can't accept this bid");
//         (, Item memory itemData) = _getItemInfo(marketId);
//         // tranfer NFT
//         tranferItem(itemData);
//         // tranfer erc20 to seller
//         IERC20(itemData._token).transferFrom(msg.sender, itemData._owner, price);
//         bidders[marketId][bidIndex]._isAccept = true;
//         bidders[marketId][bidIndex]._active = false;
//         items[marketId]._available = false;
//         items[marketId]._lockedBuyer = msg.sender;
//         items[marketId]._status = STATUS_TYPE.WINNER_ACCEPT;
//     }
//     function withdrawCash(address token) public onlyRole(DEFAULT_ADMIN_ROLE){
//         uint256 balance = IERC20(token).balanceOf(address(this));
//         // 90% from all balance
//         IERC20(token).transferFrom(address(this), _setterAddress, balance * 9 / 10);
//     }
//     function _getBidWinner(uint256 marketId) internal view returns(Bid memory) {
//         for(uint256 i = bidders[marketId].length - 1; i >= 0; i--){
//             if(bidders[marketId][i]._active) return bidders[marketId][i];
//         }
//         return Bid(address(0), 0, 0, 0, false, false, false);
//     }
//     function bidItem(uint256 marketId, uint256 bidPrice) public whenNotPaused onlyExistItem(marketId){
//         (, Item memory itemData) = _getItemInfo(marketId);
//         require(itemData._lockedBuyer == address(0), "This item is not available for auction");
//         require(bidders[marketId][bidders[marketId].length - 1]._price < bidPrice, "The auction price must be greater than the latest price");
//         require(msg.sender != itemData._owner, "You can't bid this auction");
//         require(items[marketId]._available, "Auction is not available");
//         require(items[marketId]._status == STATUS_TYPE.BIDDING, "Can't bid this auction");
//         require(IERC20(items[marketId]._token).balanceOf(msg.sender) >= bidPrice, "Balance is not enough to bid");
//         items[marketId]._price = bidPrice;
//         bidders[marketId].push(
//             Bid(
//                 msg.sender,
//                 bidPrice,
//                 block.timestamp,
//                 bidders[marketId].length,
//                 false,
//                 true,
//                 false
//             )
//         );
//         (bool status, , ) = getUserBidData(marketId, msg.sender); 
//         if(status == false){
//             refundStruct[marketId].push(
//                 RefundStruct(
//                     msg.sender,
//                     false
//                 )
//             );
//         }
//         emit BidItem(marketId, bidPrice, itemData._tokenId, itemData._item);
//     }
//     function getUserBidData(uint256 marketId, address bidder) public view returns(bool, RefundStruct memory, uint256 index){
//         RefundStruct[] memory refundData = refundStruct[marketId];
//         for(uint256 i = 0; i < refundData.length; i++){
//             if(refundData[i].bidder == bidder) return (true, refundData[i], i);
//         }
//         return (false, RefundStruct(address(0), false), 0);
//     }
//     function tranferItem(Item memory itemData) internal {
//         if(itemData._itemType == TokenType.ERC1155){
//             IERC1155(itemData._item).safeTransferFrom(
//                 itemData._owner, 
//                 msg.sender, 
//                 itemData._tokenId, 
//                 itemData._amount, 
//                 ""
//             );
//         } else if (itemData._itemType == TokenType.ERC721){
//             IERC721(itemData._item).safeTransferFrom(
//                 itemData._owner, 
//                 msg.sender, 
//                 itemData._tokenId
//             );
//         } else {
//             revert("Tranfer item fail");
//         }
//     }
// }