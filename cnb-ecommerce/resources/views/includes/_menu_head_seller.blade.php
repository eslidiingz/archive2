<?php
use App\Http\Controllers\Controller;
use App\withdrow;
use App\Shops;
use App\invs;
$user_shop_bank = Shops::where('user_id', Auth::user()->id)->first();
$inv_status = invs::where('shop_id', $user_shop_bank->id)->where('status', '2')->get();
// use App\User;
// use App\Shops;
// $user_shops = shops::Where('user_id', Auth::user()->id)->first();
?>
<div class="col-12 p-0 ">
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 3px 5px 0px rgba(0,0,0,0.15)!important;">
    <div class="col px-0 py-2 d-lg-block d-md-none d-none">
      <!-- <a href="/home"><button class="btn btn-outline-c45e9f form-control" style="width:200px;"><img
            style=" filter: invert(63%) sepia(78%) saturate(2658%) hue-rotate(288deg) brightness(83%) contrast(84%);"
            src="/new_ui/img/menu/icon-menu-out.png" width="23;" alt=""> กลับสู่ Shopteenii</button></a> -->
    </div>
    <a href="{{ url('shop/seller-shop-user-detail') }}" class="px-0 py-2 d-lg-none d-md-block d-block">
      <img src="/new_ui/img/logo/logo.svg" class="img-fluid logo-width"></a>
    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> --}}
    <div class="collapse navbar-collapse py-2" id="navbarSupportedContent">

      @auth
      <ul class="navbar-nav ml-auto pr-4 d-flex align-items-center">
        <!-- <li><img src="/new_ui/img/seller/icon-comment.svg" class="img-fluid mr-3" alt="..."></li>
        <li><img src="/new_ui/img/seller/icon-alert.svg" class="img-fluid mr-4" alt="..."></li> -->
        <li class="nav-item dropdown" style="border-left: 1px solid #bbbbbb; cursor: pointer;">
          <a class="nav-link dropdown-toggle py-0 ml-3 href="#" id="navbarDropdown" style="height: 50px;" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
            <img src="{{('/img/profile/'.Auth::user()->user_pic) }}"
              style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
              class="align-self-start mx-2" alt="..." onerror="this.onerror=null;this.src='/new_ui/img/user_icon_menu/user_icon.svg'">
          </a>
          @guest
                        <button class="btn  dropdown-toggle" data-toggle="modal" data-target="#user-login-regis" id="btn-login-regis"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="/new_ui/img/menu/icon-menu-user.svg" class="img-fluid pr-2"
                                alt="" onerror="this.onerror=null;this.src='/new_ui/img/user_icon_menu/user_icon.svg'"><strong>บัญชีผู้ใช้</strong>
                        </button>
                        @endguest
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="row px-4 py-2" style="width: 300px;">
                                @guest
                                <div class="col-12">
                                    <h6><strong>Welcome</strong></h6>
                                </div>

                                <!-- <div class="col-12 pb-1">
                                    <button class="btn form-control" data-toggle="modal" data-target="#user-login-regis"
                                        style="background-color: #346751; color: #fff;">เข้าสู่ระบบ</button>
                                </div>
                                <div class="col-12">
                                    <button class="btn form-control"
                                        style="background-color: #f8eaf3; color: #346751;">สมัครสมาชิก</button>
                                </div> -->
                                @endguest
                                @auth
                                <a class="col-12" href="{{ url('profile') }}">
                                    <div class="row pb-1">
                                        <div class="col-4" style="height: 50px;">
                                            <img src="{{('/img/profile/'.Auth::user()->user_pic) }}" alt=""
                                                style="border-radius: 100%; height: 100%; max-width: 100%; width: 70px; object-fit: cover;object-position: 50% 0;"
                                                class="rounded-circle" onerror="this.onerror=null;this.src='/new_ui/img/user_icon_menu/user_icon.svg'">
                                        </div>
                                        <div class="col-6">
                                            <div class="row mt-1">
                                                <strong>Welcome</strong>
                                            </div>
                                            <div class="row">
                                                <strong>{{Auth::user()->name}}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="col-12">
                                    <div class="row py-3">
                                        <div class="col-12 mb-2">
                                            <a href="{{ url('profile') }}">
                                                <!-- <img src="/new_ui/img/user_icon_menu/icon_side_1.png"
                                                    style="width: 25px;" class="pr-2" alt=""> -->
                                                    <i class="fas fa-user mr-2" style="width: 18px; color: #5DB5A5;" class="pr-2"></i>
                                                <strong>My Profile</strong>
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <a href="{{ url('profile_my_sale') }}">
                                                <img src="/new_ui/img/menu/fi-br-shopping-cart-add.svg" style="width: 25px;"
                                                    class="pr-2" alt="">
                                                <strong>My Order</strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <form action="{{route('logout')}}">
                                        <button id="login" name="login" type="submit"
                                        class="btn btns btn-block form-control rounded8px">
                                            <strong class="text-white">Logout</strong>
                                        </button>
                                    </form>
                                </div>


                                <?php
                                $isshop = DB::table('shops')->where('user_id', Auth::user()->id)->first();
                                ?>
                                @if (!isset($isshop))



                                @endif
                                @endauth
                            </div>

                        </div>
        </li>
      </ul>
      @endauth
    </div>
  </nav>
</div>


<div class="d-flex text-center fixed-bottom justify-content-around d-lg-none shadow" style="background-color: #fff;">
  <a href="{{ url('home') }}" class="col p-0 py-2 text-black">
    <div class="d-flex align-items-center justify-content-between flex-column">
      <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-1.png" width="24px;" alt="">
      <p class="m-0" style="color: #000;">Shopteenii</p>
    </div>
  </a>

  <div class="col p-0 py-2 text-black d-flex align-items-center justify-content-between flex-column"
    data-toggle="drawer" data-target="#drawer-5">
    <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-2.png" width="24px;" alt="">
    <p class="m-0" style="color: #000;">เมนู</p>
  </div>

  <!-- <a href="#" class="col p-0 py-2 text-black ">
    <div class="d-flex align-items-center justify-content-between flex-column">
      <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-3.png" width="24px;" alt="">
      <p class="m-0" style="color: #000;">แชท</p>
    </div>
  </a> -->
  @auth
  <div class="col p-0 py-2 text-black d-flex align-items-center justify-content-between flex-column"
    data-toggle="drawer" data-target="#drawer-2">
    <!-- <div style="height: 23px;">
      <img src="{{asset('/img/profile/'.Auth::user()->user_pic) }}"
        style="border-radius: 100%; height: 100%; max-width: 100%; width: 23px; object-fit: cover;object-position: 50% 0;"
        alt="" class="rounded-circle">
    </div> -->
    <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-4.png" width="24px;" alt="">
    <p class="m-0" style="color: #000;">บัญชี</p>
  </div>
  @endauth
  @guest
  <div class="col p-0 py-2 text-black d-flex align-items-center justify-content-between flex-column" data-toggle="modal"
    data-target="#user-login-regis">
    <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-4.png" width="24px;" alt="">
    <p class="m-0" style="color: #000;">บัญชี</p>
  </div>
  @endguest

</div>



<div class="drawer drawer-left slide" tabindex="-1" role="dialog" aria-labelledby="drawer-5-title" aria-hidden="true"
  id="drawer-5">
  <div class="drawer-content drawer-content-scrollable" role="document">
    <div class="drawer-header">
      <div class="col-12">
        <a href="{{ url('shop/sales-list') }}" class="p-0"><img src="/new_ui/img/logo/logo.svg" class="img-fluid logo-width" style="width: 200px;"></a>
      </div>
    </div>
    <div class="drawer-body">
      <div class="col-12">
        <div id="accordion">
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0"
              style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseOne">
              <strong class="text-dark">
                <img src="/new_ui/img/seller/icon_menu/icon_menu_1.svg" style="width: 30px;" class="pr-2"
                  alt="">รายการขาย
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseOne" class="collapse show">
              <div class="card-body py-0 px-0">
                <a class="px-0" href="{{ url('shop/sales-list') }}">
                  <h6 style="text-indent: 30px;">รายการขายของฉัน
                    @if(count($inv_status) > 0)
                    <span class="badge-pill badge-danger ml-2"
                      style="font-size: 11px; margin-top: -2px;">{{count($inv_status)}}</span>
                    @endif
                  </h6>
                </a>
                <!-- <h6 style="text-indent: 30px;">คืนสินค้า</h6> -->
              </div>
            </div>
          </div>
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0"
              style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseTwo">
              <strong class="text-dark">
                <img src="/new_ui/img/seller/icon_menu/icon_menu_2.svg" style="width: 30px;" class="pr-2" alt="">สินค้า
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseTwo" class="collapse show">
              <div class="card-body py-0 px-0">
                <a class="px-0" href="{{ url('shop/seller-product') }}">
                  <h6 style="text-indent: 30px;">สินค้าของฉัน
                    {{-- <span class="badge-pill badge-danger ml-2" style="font-size: 11px; margin-top: -2px;">1</span> --}}
                  </h6>
                </a>
                <a class="px-0" href="{{ url('shop/myproduct/new') }}">
                  <h6 style="text-indent: 30px;">เพิ่มสินค้าใหม่</h6>
                </a>
              </div>
            </div>
          </div>
          <!-- <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0"
              style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseSix">
              <strong class="text-dark">
                <img src="/new_ui/img/seller/icon_menu/icon_menu_2.svg" style="width: 30px;" class="pr-2"
                  alt="">สินค้าพรีออเดอร์
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseSix" class="collapse show">
              <div class="card-body py-0 px-0">
                <a class="px-0" href="{{ url('/shop/preorder') }}">
                  <h6 style="text-indent: 30px;">สินค้าพรีออเดอร์ของฉัน</h6>
                </a>
                <a class="px-0" href="{{ url('/shop/preorder/add') }}">
                  <h6 style="text-indent: 30px;">เพิ่มสินค้าพรีออเดอร์ใหม่</h6>
                </a>
              </div>
            </div>
          </div> -->
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0"
              style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
              href="#collapseThree">
              <strong class="text-dark">
                <img src="/new_ui/img/seller/icon_menu/icon_menu_3.svg" style="width: 30px;" class="pr-2" alt="">การเงิน
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseThree" class="collapse show">
              <div class="card-body py-0 px-0">
                <a class="px-0" href="{{ url('shop/seller-wallet') }}">
                  <h6 style="text-indent: 30px;">รายการถอนจากยอดขาย</h6>
                </a>
                <a class="px-0" href="{{ url('shop/seller-recommend') }}">
                  <h6 style="text-indent: 30px;">รายการถอนจากการแนะนำ</h6>
                </a>
              </div>
            </div>
          </div>
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0"
              style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
              href="#collapseFour">
              <strong class="text-dark">
                <img src="/new_ui/img/seller/icon_menu/icon_menu_4.svg" style="width: 30px;" class="pr-2" alt="">ร้านค้า
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseFour" class="collapse show">
              <div class="card-body py-0 px-0">
                <a class="px-0" href="{{ url('shop/seller-shop-user-detail') }}">
                  <h6 style="text-indent: 30px;">ร้านค้าของฉัน</h6>
                </a>
                {{-- <h6 style="text-indent: 30px;">คะแนนร้านค้า</h6> --}}
                <a class="px-0" href="{{ url('shop') }}">
                  <h6 style="text-indent: 30px;">รายละเอียดร้านค้า</h6>
                </a>
                {{-- <h6 style="text-indent: 30px;">หมวดหมู่ในร้านค้า</h6>
                <h6 style="text-indent: 30px;">รายงาน</h6> --}}
              </div>
            </div>
          </div>
          <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center px-0"
              style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
              href="#collapseFive">
              <strong class="text-dark">
                <img src="/new_ui/img/seller/icon_menu/icon_menu_5.svg" style="width: 30px;" class="pr-2" alt="">
                การตั้งค่า
              </strong>
              <div class="collapsedIcon1">
                <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
              </div>
            </div>
            <div id="collapseFive" class="collapse show">
              <div class="card-body py-0 px-0">
                {{-- <a class="px-0" href="{{ url('shop/seller-proflie') }}"><h6 style="text-indent: 30px;">บัญชีของฉัน
                </h6></a>
                <h6 style="text-indent: 30px;">การจัดส่งของฉัน</h6> --}}
                <a class="px-0" href="{{ url('shop/shipping') }}">
                  <h6 style="text-indent: 30px;">การจัดส่งของฉัน</h6>
                </a>
                <a class="px-0" href="{{ url('/shop/seller-address') }}">
                  <h6 style="text-indent: 30px;">ที่อยู่ของฉัน</h6>
                </a>
                <a class="px-0" href="{{ url('/shop/addsellerbank') }}">
                  <h6 style="text-indent: 30px;">บัญชี
                    @if($user_shop_bank->bank_number == null)
                    <span class="badge-pill badge-danger ml-2" style="font-size: 11px; margin-top: -2px;">!</span>
                    @endif</h6>
                </a>

                <a class="px-0" href="{{ url('/shop/kyc') }}">
                    <h6 style="text-indent: 30px;">ยืนยันตัวตนร้านค้า</h6>
                </a>
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

<div class="drawer drawer-left slide" tabindex="-1" role="dialog" aria-labelledby="drawer-2-title" aria-hidden="true"
  id="drawer-2">
  <div class="drawer-content drawer-content-scrollable" role="document">
    {{-- <div class="drawer-header">
      <div class="col-12">
        <a href="{{ url('shop/sales-list') }}" class="p-0"><img src="/new_ui/img/logo/logo.svg" class="img-fluid logo-width"></a>
  </div>
</div>
<div class="drawer-body">
  <div class="row">
    <div class="col-12 mb-1 text-center">
      <img src="/new_ui/img/img-user-test.jpg" style="width: 50%; border-radius: 100%;" class="align-self-start"
        alt="...">
      <a href="#">
        <h4 class="mt-4"><strong><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไขรูปภาพ</strong></h4>
      </a>
    </div>
    <div class="col-12">
      <div class="form-group">
        <label for="name">
          <h4 class="mb-0"><strong>ชื่อ</strong></h4>
        </label>
        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" value="สมหญิง">
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <label for="lastname">
          <h4 class="mb-0"><strong>นามสกุล</strong></h4>
        </label>
        <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp" value="รักดี">
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <label for="tel">
          <h4 class="mb-0"><strong>เบอร์โทร</strong></h4>
        </label>
        <input type="tel" class="form-control" id="tel" aria-describedby="emailHelp" value="095 123 4556">
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <label for="email">
          <h4 class="mb-0"><strong>อีเมล</strong></h4>
        </label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="rukdee@gmail.com">
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-c75ba1 form-control">บันทึก</button>
    </div>
  </div>
</div> --}}
<div class="drawer-header">
  <div class="col-12">
    <div class="row d-flex align-items-center py-2 rounded8px" style="background-color: #F9F9F9;">
      @auth
      <div class="col-4 d-flex align-items-center justify-content-center" style="height: 50px;">
          <img src="{{('/img/profile/'.Auth::user()->user_pic) }}"
              style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
              class="align-self-start" alt="...">
      </div>

      <div class="col-8 d-flex flex-row align-items-center">
          <div class="row w-100">
              <div class="col-12 px-0">
                  <h5 class="font_size_14px text-dark"><strong>{{Auth::user()->name}}</strong></h5>
              </div>
              <div class="col-12 px-0">
                  <a href="{{ url('profile') }}" class="d-flex align-items-start">
                      <i class="fa fa-pencil  icon-pencil"></i><small class="color-sky"><strong  class="ml-2">แก้ไขข้อมูลส่วนตัว</strong></small>
                  </a>
              </div>
          </div>
      </div>
      <!-- <div class="col-4 d-flex align-items-center justify-content-center" style="height: 50px;">
        <img src="{{('/img/profile/'.Auth::user()->user_pic) }}"
          style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
          class="align-self-start" alt="...">
      </div>

      <div class="col-8 d-flex flex-row align-items-center">
        <h6 class="mb-0 text-white"><strong>{{Auth::user()->name}}</strong></h6>
        <a href="{{ url('profile') }}"><img src="/new_ui/img/user_icon_menu/edit_name.png" class="pl-2" style="width: 24px;"
            alt=""></a>
      </div> -->
      @endauth
      @auth
      @if(isset($wallet->status) && $wallet->status=='appect')
      <!-- <div class="col-12 mt-2">
        <p class="mb-0"><strong>ยอดวอลเล็ทที่ถอนได้</strong></p>
      </div>
      <div class="col-12">
        <h3 class="mb-0"><strong style="color: #c45e9f;">฿ {{ number_format($wallet->credit,2) }}</strong></h3>
      </div> -->
      {{-- <div class="col-6 d-flex flex-row align-items-center justify-content-center" data-toggle="modal" data-target="#Wallet" data-dismiss="drawer"
                                style="border-left: 1px solid #c45e9f; cursor: pointer;">
                                <img src="/new_ui/img/wallet.svg" class="pr-2" style="width: 30px;" alt="">
                                <p class="mb-0"><strong>เติมเงิน</strong></p>
                            </div> --}}
      @else
      <!-- <div class="col-12 my-2">
        <a class="btn btn-c75ba1 form-control" href="{{ url('profile_wallet_t10') }}">เปิดใช้ Wallet</a>
      </div> -->
      @endif
      @endauth
    </div>
  </div>
</div>

<div class="drawer-body">
  <div class="row">
    <!-- <div class="col-12">
      <a href="/home" class="btn btn-outline-c45e9f form-control"><img
          style="filter: invert(63%) sepia(78%) saturate(2658%) hue-rotate(288deg) brightness(83%) contrast(84%);"
          src="/new_ui/img/menu/icon-menu-out.png" width="23;" alt=""> กลับสู่ Shopteenii</a>
    </div> -->
    <div class="col-12">
      <div id="accordion" style='padding-top: 10px;'>
        <div class="card" style="border: none;">
          <div class="card-header d-flex justify-content-between align-items-center px-0"
            style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseOne">
            <strong class="text-purple">
              <img src="/new_ui/img/user_icon_menu/icon_side_1.png" style="width: 25px;" class="pr-2" alt="">บัญชีของฉัน
            </strong>
            <div class="collapsedIcon">
              <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
            </div>
          </div>
          <div id="collapseOne" class="collapse show">
            <div class="card-body py-0">
              <a class="px-0" href="{{ url('profile') }}">
                <h6 style="text-indent: 5px;">ข้อมูลส่วนตัว</h6>
              </a>
              {{-- <a class="px-0" href="{{ url('profile_paymen_method') }}">
              <h6 style="text-indent: 5px;">ช่องทางการชำระเงิน</h6>
              </a> --}}
              <!-- <a class="px-0" href="{{ url('profile_wallet_t10') }}">
                <h6 style="text-indent: 5px;">วอลเลต Multi Pay</h6>
              </a> -->
              <a class="px-0" href="{{ url('address') }}">
                <h6 style="text-indent: 5px;">ที่อยู่</h6>
              </a>
              <a class="px-0" href="{{ url('change_pass') }}">
                <h6 style="text-indent: 5px;">เปลี่ยนรหัสผ่าน</h6>
              </a>
            </div>
          </div>
        </div>
        {{-- <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center px-0" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseTwo">
                  <a href="{{ url('profile_my_sale') }}">
        <strong class="text-purple">
          <img src="/new_ui/img/user_icon_menu/cart-icon.png" style="width: 25px;" class="pr-2" alt="">การซื้อของฉัน
        </strong>
        </a>
        <div class="collapsedIcon">
        </div>
      </div>
    </div> --}}
    {{-- <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center px-0" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseThree">
                    <strong class="text-purple">
                        <img src="/new_ui/img/user_icon_menu/bell-icon.svg" style="width: 25px;" style="width: 30px;" class="pr-2" alt="">การแจ้งเตือน
                    </strong>
                    <div class="collapsedIcon">
                        <h4 class="m-0"><i class="fa fa-angle-down" aria-hidden="true"></i></h4>
                    </div>
                </div>
                <div id="collapseThree" class="collapse ">
                    <div class="card-body py-0">
                      <a class="px-0" href="{{ url('profile_user_notification') }}">
    <h6 style="text-indent: 5px;">อัพเดทคำสั่งซื้อ</h6>
    </a>
    <a class="px-0" href="{{ url('profile_user_notification2') }}">
      <h6 style="text-indent: 5px;">เรื่องโปรโมชั่น</h6>
    </a>
    <a class="px-0" href="{{ url('profile_user_notification3') }}">
      <h6 style="text-indent: 5px;">รายการอัพเดท T10 Wallet</h6>
    </a>
  </div>
</div>
</div> --}}
{{--  <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center px-0" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseFour">
                  <a href="{{ url('profile_coupon') }}">
<strong class="text-purple">
  <img src="/new_ui/img/user_icon_menu/ticket-icon.svg" style="width: 25px;" style="width: 30px;" class="pr-2"
    alt="">คูปอง / ส่วนลดของฉัน
</strong>
</a>
<div class="collapsedIcon">
</div>
</div>
</div> --}}
{{-- <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center px-0" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseFive">
                  <a href="{{ url('profile_user_wishlist') }}">
<strong class="text-purple">
  <img src="/new_ui/img/user_icon_menu/wish-icon.svg" style="width: 25px;" style="width: 30px;" class="pr-2"
    alt="">วิสลิสต์ ของฉัน
</strong>
</a>
<div class="collapsedIcon">
</div>
</div>
</div> --}}
<div class="card" style="border: none;">
  <a href="{{route('logout')}}">
    <div class="card-header d-flex justify-content-between align-items-center px-0"
      style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseSix">
      <strong class="text-purple" style="color: #dc4e41 !important">
        <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-1.png" style="width: 25px;" style="width: 30px;"
          class="pr-2" alt="">ออกจากระบบ
      </strong>
      <div class="collapsedIcon">
        {{-- <h4 class="m-0"><i class="fa fa-angle-down" aria-hidden="true"></i></h4> --}}
      </div>
    </div>
  </a>
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



@section('script')
<script>
  $('.collapse').on('show.bs.collapse', function () {
    id = $(this).attr('id');
    $('div[href="#'+id+'"] div.collapsedIcon h4').html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
  });
  $('.collapse').on('hide.bs.collapse', function () {
    id = $(this).attr('id');
    $('div[href="#'+id+'"] div.collapsedIcon h4').html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
  });
</script>

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

@endsection
