<div class="col-12 p-0 ">
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a href="/shop/seller-index.php" class="px-0 py-2 d-lg-none d-md-block d-block"><img src="new_ui/img/logo-saler.svg" class="img-fluid w-100"></a>
    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> --}}
    <div class="collapse navbar-collapse py-2" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto pr-4 d-flex align-items-center" >
        <li><img src="new_ui/img/seller/icon-comment.svg" class="img-fluid mr-3" alt="..."></li>
        <li><img src="new_ui/img/seller/icon-alert.svg" class="img-fluid mr-4" alt="..."></li>
        <li class="nav-item dropdown" style="border-left: 1px solid #000;">
          <a class="nav-link dropdown-toggle py-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Big Charee
            <img src="new_ui/img/img-user-test.jpg" style="width: 50px; border-radius: 100%;" class="align-self-start mr-3" alt="...">
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>


<div class="d-flex text-center fixed-bottom justify-content-around d-lg-none"  style="background-color: #fff;">
  <a href="{{ url('home') }}" class="col p-0 py-2 text-black">
    <div>
      <img style="filter: invert(63%) sepia(78%) saturate(2658%) hue-rotate(288deg) brightness(83%) contrast(84%);" src="new_ui/img/menu/icon-menu-out.png" width="23;" alt="">
      <p class="m-0" style="color: #000;" style="color: #000;">Shopteeni</p>
    </div>
  </a>

  <div class="col p-0 py-2 text-black" data-toggle="drawer" data-target="#drawer-1">
    <img style="filter: invert(63%) sepia(78%) saturate(2658%) hue-rotate(288deg) brightness(83%) contrast(84%);" src="new_ui/img/menu/icon-menu-categories.svg" width="24px;" alt="">
    <p class="m-0" style="color: #000;">Menu</p>
  </div>

  <a href="#" class="col p-0 py-2 text-black">
    <div>
      <img style="filter: invert(63%) sepia(78%) saturate(2658%) hue-rotate(288deg) brightness(83%) contrast(84%);" src="new_ui/img/seller/icon-comment.svg" width="22px;" alt="">
      <p class="m-0" style="color: #000;">Chat</p>
    </div>
  </a>
  <a href="#" class="col p-0 py-2 text-black">
    <div>
      <img style="filter: invert(63%) sepia(78%) saturate(2658%) hue-rotate(288deg) brightness(83%) contrast(84%);" src="new_ui/img/menu/icon-menu-bottom-4.png" width="23px;" alt="">
      <p class="m-0" style="color: #000;">User</p>
    </div>
  </a>
</div>



<div class="drawer drawer-left slide" tabindex="-1" role="dialog" aria-labelledby="drawer-1-title" aria-hidden="true" id="drawer-1">
  <div class="drawer-content drawer-content-scrollable" role="document">
    <div class="drawer-header">
      <div class="col-12">
        <a href="seller-index.php" class="p-0"><img src="new_ui/img/logo-saler.svg" class="img-fluid w-75"></a>
      </div>
    </div>
    <div class="drawer-body">
      <div class="col-12">
        <div id="accordion">
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseOne">
              <strong class="text-dark">
                <img src="new_ui/img/seller/icon_menu/icon_menu_1.svg" style="width: 30px;" class="pr-2" alt="">รายการขาย
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-down" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseOne" class="collapse ">
              <div class="card-body py-0 px-0">
                <a class="px-0" href="{{ url('seller-index') }}"><h6 style="text-indent: 30px;">รายการขายของฉัน</h6></a>
                <h6 style="text-indent: 30px;">คืนสินค้า</h6>
              </div>
            </div>
          </div>
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseTwo">
              <strong class="text-dark">
                <img src="new_ui/img/seller/icon_menu/icon_menu_2.svg" style="width: 30px;" class="pr-2" alt="">สินค้า
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-down" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseTwo" class="collapse ">
              <div class="card-body py-0 px-0">
                <a class="px-0" href="{{ url('seller-product') }}"><h6 style="text-indent: 30px;">สินค้าของฉัน</h6></a>
                <a class="px-0" href="{{ url('seller-add-product') }}"><h6 style="text-indent: 30px;">เพิ่มสินค้าใหม่</h6></a>
              </div>
            </div>
          </div>
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseThree">
              <strong class="text-dark">
                <img src="new_ui/img/seller/icon_menu/icon_menu_3.svg" style="width: 30px;" class="pr-2" alt="">การเงิน
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-down" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseThree" class="collapse ">
              <div class="card-body py-0 px-0">
                <h6 style="text-indent: 30px;">รายรับของฉัน</h6>
                <h6 style="text-indent: 30px;">Wallet</h6>
                <a class="px-0" href="{{ url('seller-bank') }}"><h6 style="text-indent: 30px;">บัญชีธนาคาร</h6></a>
              </div>
            </div>
          </div>
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseFour">
              <strong class="text-dark">
                <img src="new_ui/img/seller/icon_menu/icon_menu_4.svg" style="width: 30px;" class="pr-2" alt="">ร้านค้า
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-down" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseFour" class="collapse ">
              <div class="card-body py-0 px-0">
                <a class="px-0" href="{{ url('seller-shop-user-detail') }}"><h6 style="text-indent: 30px;">ร้านค้าของฉัน</h6></a>
                <h6 style="text-indent: 30px;">คะแนนร้านค้า</h6>
                <a class="px-0" href="{{ url('seller-detail-shop') }}"><h6 style="text-indent: 30px;">รายละเอียดร้านค้า</h6></a>
                <h6 style="text-indent: 30px;">หมวดหมู่ในร้านค้า</h6>
                <h6 style="text-indent: 30px;">รายงาน</h6>
              </div>
            </div>
          </div>
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseFive">
              <strong class="text-dark">
                <img src="new_ui/img/seller/icon_menu/icon_menu_5.svg" style="width: 30px;" class="pr-2" alt="">
                การตั้งค่า
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-down" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseFive" class="collapse ">
              <div class="card-body py-0 px-0">
                <a class="px-0" href="{{ url('seller-proflie') }}"><h6 style="text-indent: 30px;">บัญชีของฉัน</h6></a>
                <h6 style="text-indent: 30px;">การจัดส่งของฉัน</h6>
                <a class="px-0" href="{{ url('seller-address') }}"><h6 style="text-indent: 30px;">ที่อยู่ของฉัน</h6></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="drawer-footer">
    <button type="button" class="btn btn-danger btn-block" data-dismiss="drawer" aria-label="Close">
      Close
    </button>
  </div> --}}
</div>



<script>
  $('.collapse').on('show.bs.collapse', function () {
    id = $(this).attr('id');
    $('div[href="#'+id+'"] div.collapsedIcon1 h4').html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
  });
  $('.collapse').on('hide.bs.collapse', function () {
    id = $(this).attr('id');
    $('div[href="#'+id+'"] div.collapsedIcon1 h4').html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
  });
</script>