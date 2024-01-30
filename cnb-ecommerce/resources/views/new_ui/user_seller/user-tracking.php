<div id="tracking">
  <div class="tracking-list">
      <div class="tracking-item">
        <div class="tracking-icon status-outfordelivery d-flex align-items-center justify-content-center">
           <img src="new_ui/img/seller/purchase-history-1.png" style="width: 20px; height: 20px; filter: invert(60%) sepia(21%) saturate(1373%) hue-rotate(276deg) brightness(79%) contrast(93%);" alt="">
         </div>
         <div class="tracking-content">
          <strong style="color: #c45e9f;">คำสั่งซื้อใหม่</strong>
          <span>06/06/2563 19:56</span>
        </div>
      </div>
      <div class="tracking-item">
        <div class="tracking-icon status-outfordelivery d-flex align-items-center justify-content-center">
         <img src="new_ui/img/seller/purchase-history-2.png" style="width: 20px; height: 20px; filter: invert(60%) sepia(21%) saturate(1373%) hue-rotate(276deg) brightness(79%) contrast(93%);" alt="">
       </div>
       <div class="tracking-content">
        <strong style="color: #c45e9f;">โอนเงินสำเร็จแล้ว</strong>
        <span>06/06/2563 20:18</span>
      </div>
      </div>
      <div class="tracking-item">
        <div class="tracking-icon status-outfordelivery d-flex align-items-center justify-content-center">
         <img src="new_ui/img/seller/purchase-history-3.png" style="width: 20px; height: 20px; filter: invert(65%) sepia(17%) saturate(0%) hue-rotate(195deg) brightness(86%) contrast(89%);" alt="">
       </div>
       <div class="tracking-content">
        <strong style="color: #919191;">ร้านค้าส่งสินค้าแล้ว</strong>
        <!-- <span>07/06/2563 12:34</span> -->
      </div>
      </div>
      <div class="tracking-item">
        <div class="tracking-icon status-outfordelivery d-flex align-items-center justify-content-center">
         <img src="new_ui/img/seller/purchase-history-4.png" style="width: 20px; height: 20px; filter: invert(65%) sepia(17%) saturate(0%) hue-rotate(195deg) brightness(86%) contrast(89%);" alt="">
        </div>
        <div class="tracking-content">
        <strong style="color: #919191;">สำเร็จ</strong>
        <!-- <span>08/06/2563 13:45</span> -->
        </div>
      </div>
  </div>
</div>


<style type="text/css">
  .tracking-item{
    padding-top: 0px !important;
    padding-bottom: 0px !important;
  }

  .tracking-item:first-child{
    padding-top: 0!important;
  }
  .tracking-item:last-child{
    padding-bottom: 0 !important;
    border: none;
  }
  .tracking-icon{
    background-color: #fff !important;
    box-shadow: 0 0 5px 1px rgba(0,0,0,0.2);
    top: 0;
  }
  .tracking-item{
    display: flex;
    /*align-items: center;*/
  }
  .tracking-detail {
   padding:3rem 0
 }
 #tracking {
   margin-bottom:1rem
 }
 [class*=tracking-status-] p {
   margin:0;
   font-size:1.1rem;
   color:#fff;
   text-transform:uppercase;
   text-align:center
 }
 [class*=tracking-status-] {
   padding:1.6rem 0
 }
 .tracking-status-intransit {
   background-color:#65aee0
 }
 .tracking-status-outfordelivery {
   background-color:#f5a551
 }
 .tracking-status-deliveryoffice {
   background-color:#f7dc6f
 }
 .tracking-status-delivered {
   background-color:#4cbb87
 }
 .tracking-status-attemptfail {
   background-color:#b789c7
 }
 .tracking-status-error,.tracking-status-exception {
   background-color:#d26759
 }
 .tracking-status-expired {
   background-color:#616e7d
 }
 .tracking-status-pending {
   background-color:#ccc
 }
 .tracking-status-inforeceived {
   background-color:#214977
 }
 .tracking-list {
   border:0px solid #e5e5e5
 }
 .tracking-item {
   border-left:1px solid #e5e5e5;
   position:relative;
   padding:2rem 0rem .5rem 2.5rem;
   font-size:.9rem;
   margin-left:3rem;
   min-height:5rem
 }
 .tracking-item:last-child {
   padding-bottom:4rem
 }
 .tracking-item .tracking-date {
   margin-bottom:.5rem
 }
 .tracking-item .tracking-date span {
   color:#888;
   font-size:85%;
   padding-left:.4rem
 }
 .tracking-item .tracking-content {
   padding:.5rem .8rem;
   background-color:#fff;
   border-radius:.5rem
 }
 .tracking-item .tracking-content span {
   display:block;
   color:#888;
   font-size:85%
 }
 .tracking-item .tracking-icon {
   line-height:2.6rem;
   position:absolute;
   left:-1.4rem;
   width:2.6rem;
   height:2.6rem;
   text-align:center;
   border-radius:50%;
   font-size:1.1rem;
   background-color: unset;
   color:#fff
 }
 .tracking-item .tracking-icon.status-sponsored {
   background-color:#f68
 }
 .tracking-item .tracking-icon.status-delivered {
   background-color:#4cbb87
 }
/*.tracking-item .tracking-icon.status-outfordelivery {
 background-color:#f5a551
 }*/
 .tracking-item .tracking-icon.status-deliveryoffice {
   background-color:#f7dc6f
 }
 .tracking-item .tracking-icon.status-attemptfail {
   background-color:#b789c7
 }
 .tracking-item .tracking-icon.status-exception {
   background-color:#d26759
 }
 .tracking-item .tracking-icon.status-inforeceived {
   background-color:#214977
 }
 .tracking-item .tracking-icon.status-intransit {
   color:#e5e5e5;
   border:1px solid #e5e5e5;
   font-size:.6rem
 }
 @media(min-width:992px) {
   .tracking-item {
    margin-left:0rem
  }
  .tracking-item .tracking-date {
    position:absolute;
    left:-10rem;
    width:7.5rem;
    text-align:right
  }
  .tracking-item .tracking-date span {
    display:block
  }
  .tracking-item .tracking-content {
    padding:0;
    background-color:transparent
  }
}

</style>