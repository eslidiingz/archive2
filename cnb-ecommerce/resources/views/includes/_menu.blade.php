<style>
    .error {
    color: red;
    font-size: 12.8px;
    }

    .over {
    background-color: #fff;
    width: 280px;
    height: 500px;
    border: 1px;
    overflow: auto;
    }

    .text-purple {
    color: #333 !important;
    }

    .item:hover {
    background-color: #346751;
    color: #fff !important;
    }

    .dropdown:hover>.dropdown-menu {
    display: block;
    }

    .dropdown>.dropdown-toggle:active {
    /*Without this, clicking will make it sticky*/
    pointer-events: none;
    }

    .swiper-slide {
    width: auto;
    }

    .swiper-container-vertical> .swiper-wrapper.swiper-custom {
    flex-direction: row;
    }

    /*
    .swiper-button-prev{
    display: none;
    }*/
    .swiper-button-next,
    .swiper-button-prev {
    color: #74788D;
    width: 40px !important;
    height: 40px !important;
    border-radius: 30px;
    }

    .nav_menu_custom .swiper-button-next {
    right: 0 !important;
    }

    .nav_menu_custom .swiper-button-prev {
    left: 0 !important;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
    font-size: 18px;
    font-weight: bold;
    }

    .nav_menu_custom:hover .swiper-button-next {
    background-color: #DBDBDB;
    padding: 10px;
    transition: 0.5s;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 8px 0px;
    }

    .nav_menu_custom:hover .swiper-button-prev {
    background-color: #DBDBDB;
    padding: 10px;
    transition: 0.5s;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 8px 0px;
    }

    .menu-bottom .active {
    border-top: 2px solid #346751;
    color: #346751 !important;
    }

    .menu-bottom .active img {
    filter: invert(15%) sepia(22%) saturate(3884%) hue-rotate(197deg) brightness(90%) contrast(109%);
    }

    .menu-bottom {
    color: 000 !important;
    }

    .custom-img-cate {
    width: 55px;
    }

    .custom-text-cate {
    width: 120px;
    }

    @media (min-width: 992px) {
    .custom-img-cate {
        width: 60px;
    }
    }

    @media (max-width: 992px) {

    .swiper-button-next,
    .swiper-button-prev {
        display: none;
    }
    }

    canvas.drawing,
    canvas.drawingBuffer {
        position: absolute;
        left: 0;
        top: 0;
    }
</style>
<header id="header" class="sticky-top">
    <!-- <div class="container-fluid px-2 pb-0 d-lg-block d-md-none d-none bg-blue navbar-ated">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                @php
                    $i_to_ship_badge = 0;
                @endphp
                @auth
                @php
                    $isshop = DB::table('shops')
                        ->where('user_id', Auth::user()->id)
                        ->first();

                    if( $isshop ) {
                        $i_to_ship_badge =  DB::table('invs')->leftJoin('shops', 'invs.shop_id', 'shops.id')
                            ->where('shops.user_id', Auth::user()->id)
                            ->where('invs.status', 2)
                            ->count();
                    }
                @endphp
                @endauth
                @guest
                    <div class="btn-group d-flex align-items-center mb-2 mt-2 mr-3">
                        <button class="btn btn-white shop-chk" data-toggle="modal" data-target="#user-login-regis"
                            style="background-color: #fff; border-radius: 20px; " aria-haspopup="true" aria-expanded="false">
                            <img src="/new_ui/img/menu/icon-menu-medix.png" style="width: 30px;" class="img-fluid pr-2" alt="">
                            <strong>{{ trans('message.sell_with_us') }}</strong>
                        </button>
                    </div>
                @endguest
            </nav>
        </div>
    </div> -->
    <main id="wrapper">
        <!-- navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-2"
            style="background-color: #fff !important; box-shadow: 0 3px 5px 0px rgba(0,0,0,0.15)!important;">
            <div class="container d-flex flex-row ">
                <div class="mr-lg-4 mr-md-0 pr-lg-4 pr-md-0">
                    <a class="navbar-brand" href="/">
                        <div class="d-flex align-items-center" style="">
                            <img src="/new_ui/img/logo/logoW.svg" class="img-logo_size">
                            <p class="text-logo">SIAMCANNABIS.IO</p>
                        </div>
                        {{-- <img src="/new_ui/img/logo/logo.svg" class="img-fluid logo-width"> --}}
                    </a>
                </div>
                <div class="d-lg-block d-md-none d-none w-75">
                    <form role="search" action="/product_all" class="mb-0">
                        <div class="input-group">
                            @if (isset($_REQUEST['search']))
                                <input name="search" value="{{ @$_REQUEST['search'] }}" type="search"
                                    class="form-control" placeholder="{{ trans('message.search') }}" aria-label="Close"
                                    aria-describedby="basic-addon2"
                                    style="padding-left: 30px; border-radius: 20px 0px 0px 20px !important; border-right: unset;">
                            @else
                                <input name="search" type="search" class="form-control" placeholder="{{ trans('message.search') }}"
                                    aria-label="Close" aria-describedby="basic-addon2"
                                    style="padding-left: 30px; border-radius: 20px 0px 0px 20px !important; border-right: unset;">
                            @endif
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text d-flex justify-content-center"
                                    style="width: 80px; color: #CFCFCF; background-color: #fff; border: 1px solid #CFCFCF; border-radius: 0px 20px 20px 0px; border-left: unset;"
                                    id="basic-addon2"><i class="fa fa-search color-blue" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row justify-content-end d-flex align-items-center m-0 p-0">
                    @auth
                        <?php
                        $isshop = DB::table('shops')
                            ->where('user_id', Auth::user()->id)
                            ->first();
                        ?>
                        @if (!isset($isshop))
                            <div class="btn-group d-flex align-items-center  d-lg-none d-md-block"
                                style="margin-right: 5px;">
                                <button data-toggle="modal" data-target="#Modal-Seller"
                                    class="btn d-flex align-items-center px-2 py-1"
                                    style="background-color: #eee; border-radius: 20px;" aria-haspopup="true"
                                    aria-expanded="false">
                                    <!-- <img src="/new_ui/img/menu/icon-menu-medix.png" style="width: 20px;"class="img-fluid pr-2" alt=""> -->
                                    <small><strong>ร้านค้าของฉัน</strong></small>
                                    @if( $i_to_ship_badge > 0 )
                                        <span class="badge badge-danger position-absolute count_basket_pc"
                                        style="top:0px; right: 0px;">{{ $i_to_ship_badge }}</span>
                                    @endif
                                </button>
                            </div>
                        @else
                            <form action="/shop/seller-shop-user-detail"
                                style="margin-right: 5px;margin-bottom: 0px !important;">
                                <div class="btn-group d-flex align-items-center d-lg-none d-md-block">
                                    <button class="btn d-flex align-items-center px-2 py-1"
                                        style="background-color: #eee; border-radius: 20px;" aria-haspopup="true"
                                        aria-expanded="false">
                                    <!-- <img src="/new_ui/img/menu/icon-menu-medix.png" style="width: 20px;"class="img-fluid pr-1" alt=""> -->
                                            <small><strong>{{ trans('message.sell_with_us') }}</strong></small>
                                        @if( $i_to_ship_badge > 0 )
                                            <span class="badge badge-danger position-absolute count_basket_pc"
                                            style="top:0px; right: 0px;">{{ $i_to_ship_badge }}</span>
                                        @endif
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endauth
                    <div class="dropdown px-0 d-lg-none d-md-block">
                        @if( $locale == 'en')
                        <a class="dropdown-item px-2" href="/change/en">
                                <button class="btn dropdown-toggle px-0" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                    <img src="/new_ui/img/menu/icon-menu-eng.svg" class="img-fluid pr-2" width="50%;" alt=""><label
                                    style="color: #ffffff;margin-bottom: 0;"></label>
                                </button>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/change/th"><img src="/new_ui/img/menu/icon-menu-thai.png"
                                        class="img-fluid pr-2" width="50%;" alt=""><label
                                        style="color: #000000;margin-bottom: 0;"></label></a>
                            </div>
                        @else
                            {{-- <a class="dropdown-item px-2" href="/change/th">
                                <button class="btn dropdown-toggle px-0" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                    <img src="/new_ui/img/menu/icon-menu-thai.svg" class="img-fluid pr-2" width="50%;" alt=""><label
                                    style="color: #ffffff;margin-bottom: 0;"></label>
                                </button>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/change/en"><img src="/new_ui/img/menu/icon-menu-eng.png"
                                        class="img-fluid pr-2" width="50%;" alt=""><label
                                        style="color: #000000;margin-bottom: 0;"></label></a>
                            </div> --}}
                        @endif
                    </div>


                </div>
                <div class="d-lg-none d-md-block d-block w-75 mt-3 w-60-set">
                    <form role="search" action="/product_all">
                        <div class="input-group ">
                            <input name="search" value="{{ @$_REQUEST['search'] }}" type="search"
                                class="form-control" placeholder="{{ trans('message.search') }}" aria-label="Close"
                                aria-describedby="basic-addon2"
                                style="padding-left: 30px; border-radius: 20px 0px 0px 20px !important; border-right: unset;">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text d-flex justify-content-center"
                                    style="width: 80px; color: #CFCFCF; background-color: #fff; border: 1px solid #CFCFCF; border-radius: 0px 20px 20px 0px; border-left: unset;"
                                    id="basic-addon2"><i class="fa fa-search color-blue" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="d-lg-none d-md-block d-block w-25 w-40-set">
                    <div class="d-flex">
                        <div>
                            @auth
                                <a class="nav-link position-relative count_basket" href="/basket"><img
                                        src="/new_ui/img/menu/icon-menu-bottom-2.png" id="basket" style="width: 20px;">
                                </a>
                            @endauth
                            @guest
                                <a class="nav-link" id="login" name="login" data-toggle="modal"
                                    data-target="#user-login-regis">
                                    <img src="/new_ui/img/menu/icon-menu-bottom-2.png" id="basket"
                                        style="width: 30px; cursor: pointer;" class="hover_shopping">
                                </a>
                            @endguest
                        </div>
                        <div class="d-flex align-items-center">
                                @auth
                                    <button
                                        class="btn dropdown-toggle d-flex flex-row align-items-center justify-content-center px-0"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div>
                                            <img  style="width: 20px;" src="{{ '/img/profile/' . Auth::user()->user_pic }}" alt=""
                                                onerror="this.onerror=null;this.src='/new_ui/img/menu/icon-menu-bottom-user.png'"
                                                style="border-radius: 100%; height: 100%; max-width: 100%; width: 30px; object-fit: cover;object-position: 50% 0;"
                                                class="rounded-circle">
                                            <!-- {{ Auth::user()->name }} -->
                                        </div>

                                    </button>
                                @endauth
                                @guest
                                    <!-- <a class="nav-link" id="alert">
                                        <img src="/new_ui/img/menu/icon-menu-bottom-user.png" style="width: 30px;">
                                    </a> -->
                                    <div class="dropleft color-blue" data-toggle="modal" data-target="#user-login-regis"
                                        style="cursor: pointer; text-decoration: underline;">
                                        {{ trans('message.login') }}
                                        <!-- {{ trans('message.login') }}/{{ trans('message.register') }} -->
                                    </div>
                                @endguest
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="row px-4 py-2" style="width: 300px;">
                                        @guest
                                            <div class="col-12">
                                                <h6><strong class="color-blue">{{ trans('message.welcome') }}</strong></h6>
                                            </div>

                                            <div class="col-12 pb-1">
                                                <button class="btn form-control rounded8px bg-blue" data-toggle="modal"
                                                    data-target="#user-login-regis"
                                                    style="color: #fff;">{{ trans('message.login') }}</button>
                                            </div>
                                        @endguest
                                        @auth
                                            <a class="col-12" href="{{ url('profile') }}">
                                                <div class="row py-3"
                                                    style="background-color: #F9F9F9; border-radius: 10px;">
                                                    <div class="col-4">
                                                        <img src="{{ '/img/profile/' . Auth::user()->user_pic }}"
                                                            onerror="this.onerror=null;this.src='/new_ui/img/menu/icon-menu-bottom-user.png'"
                                                            alt=""
                                                            style="border-radius: 100%; height: 100%; max-width: 100%; width: 70px; object-fit: cover;object-position: 50% 0;"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row mt-1">
                                                            <strong class="color-blue">{{ trans('message.welcome') }}</strong>
                                                        </div>
                                                        <div class="row">
                                                            <strong>{{ Auth::user()->name }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-12">
                                                <div class="row py-3">
                                                    <div class="col-12 mb-2">
                                                        <a href="{{ url('profile') }}">
                                                            <img src="/new_ui/img/user_icon_menu/icon_side_1.png"
                                                                style="width: 25px;" class="pr-2" alt="">
                                                            <strong>{{ trans('message.my_account') }}</strong>
                                                        </a>
                                                    </div>
                                                    <div class="col-12">
                                                        <a href="{{ url('profile_my_sale') }}">
                                                            <img src="/new_ui/img/menu/icon-menu-bottom-2.png"
                                                                style="width: 25px;" class="pr-2" alt="">
                                                            <strong>{{ trans('message.my_order') }}</strong>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                @if (Session::has('walletAddress') && Session::get('walletAddress'))
                                                <span class="btn btn-block form-control rounded8px bg-secondary">
                                                    <strong class="text-white">{{substr(Session::get('walletAddress'), 0 ,4).'...'.substr(Session::get('walletAddress'), -4)}}</strong>
                                                </span>
                                                @else
                                                <button type="button"
                                                    class="btn btn-block form-control rounded8px bg-secondary btn_connect_wallet">
                                                    <strong class="text-white">Connect Wallet</strong>
                                                </button>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <form action="{{ route('logout') }}">
                                                    <button id="login" name="login" type="submit"
                                                        class="btn btn-block form-control rounded8px bg-blue">
                                                        <strong class="text-white">{{ trans('message.logout') }}</strong>
                                                    </button>
                                                </form>
                                            </div>
                                            <?php
                                            $isshop = DB::table('shops')
                                                ->where('user_id', Auth::user()->id)
                                                ->first();
                                            ?>
                                            @if (!isset($isshop))
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                        </div>
                    </div>


                </div>
                <div class="collapse navbar-collapse" style="width: 37%;" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto  d-flex flex-row align-items-center justify-content-center">
                        <li class="nav-item dropdown" >
                            <div class="dropleft">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                    style="background-color:#fff;">
                                    <div class="container-fulid">
                                        <div class="col-12">
                                            <div class=" row">
                                                <div class="col-12 mt-n2">
                                                    <div class="row text-center">
                                                        <div class="col-lg-12 col-md-9 col-sm-12 pt-1">
                                                            <h5 style="color:#346751;"><b>การแจ้งเตือน</b></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="over">
                                                    <div class="col-12 mt-1">
                                                        <hr>
                                                        <div class="col-12  mt-n1 rounded-0" role="alert"
                                                            style="width: 400px;">
                                                            <a href="#">
                                                                <b class="badge badge-primary">การชำระเงินเสร็จแล้ว</b>
                                                                <span class="badge badge-danger position-absolute"
                                                                    style="top:0px; right: 0px;">!</span><br>
                                                                <p>หมายเลขคำสั่งซื้อ. 20021496M4SGS2
                                                                    เราได้แจ้งผู้ส่งสินค้าเรียบร้อยแล้ว
                                                                    กรุณารอรับสินค้าภายใน 5-7 วันทำการค่ะ</p>
                                                                <p style="color:#346751"><b>23/05/20 15:30</b></p>
                                                            </a>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12 mt-n1 rounded-0" role="alert"
                                                            style="width: 400px;">
                                                            <a href="#">
                                                                <b class="badge badge-success">ได้เงินคืน</b>
                                                                <span class="badge badge-danger position-absolute"
                                                                    style="top:0px; right: 0px;">!</span><br>
                                                                <p>ได้เงินคืน 1000 Credits จากการซื้อของหมายเลขการซื้อ
                                                                    20021496M4SGS2</p>
                                                                <p style="color:#346751"><b>23/05/20 15:30</b></p>
                                                            </a>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12 mt-n1 rounded-0" role="alert"
                                                            style="width: 400px;">
                                                            <a href="#">
                                                                <b class="badge badge-success">ได้เงินคืน</b>
                                                                <span class="badge badge-danger position-absolute"
                                                                    style="top:0px; right: 0px;">!</span><br>
                                                                <p>ได้เงินคืน 1000 Credits จากการซื้อของหมายเลขการซื้อ
                                                                    20021496M4SGS2</p>
                                                                <p style="color:#346751"><b>23/05/20 15:30</b></p>
                                                            </a>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12  mt-n1 rounded-0" role="alert"
                                                            style="width: 400px;">
                                                            <a href="#">
                                                                <b class="badge badge-success">ได้เงินคืน</b>
                                                                <span class="badge badge-danger position-absolute"
                                                                    style="top:0px; right: 0px;">!</span><br>
                                                                <p>ได้เงินคืน 1000 Credits จากการซื้อของหมายเลขการซื้อ
                                                                    20021496M4SGS2</p>
                                                                <p style="color:#346751"><b>23/05/20 15:30</b></p>
                                                            </a>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12 mt-n1 rounded-0" role="alert"
                                                            style="width: 400px;">
                                                            <a href="#">
                                                                <b class="badge badge-primary">การชำระเงินเสร็จแล้ว</b>
                                                                <span class="badge badge-danger position-absolute"
                                                                    style="top:0px; right: 0px;">!</span><br>
                                                                <p>หมายเลขคำสั่งซื้อ. 20021496M4SGS2
                                                                    เราได้แจ้งผู้ส่งสินค้าเรียบร้อยแล้ว
                                                                    กรุณารอรับสินค้าภายใน 5-7 วันทำการค่ะ</p>
                                                                <p style="color:#346751"><b>23/05/20 15:30</b></p>
                                                            </a>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12 mt-n1 rounded-0" role="alert"
                                                            style="width: 400px;">
                                                            <a href="#">
                                                                <b class="badge badge-danger">ผ่อนสบาย 0% นานสูงสุด 10
                                                                    เดือน</b>
                                                                <span class="badge badge-danger position-absolute"
                                                                    style="top:0px; right: 0px;">!</span><br>
                                                                <p>รับเงินคืนสูงสุด 1000 Credits ผ่อน 0 % นานสูงสุด 10
                                                                    เดือน ทั้งโหมด เครื่องใช้ไฟฟ้า...</p>
                                                                <p style="color:#346751"><b>23/05/20 15:30</b></p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-n2">
                                                    <div class="row text-center">
                                                        <div class="col-lg-12 col-md-9 col-sm-12 pt-1">
                                                            <a href="{{ url('/profile_user_notification') }}"
                                                                style='color:#1947e3'>{{ trans('message.view_all') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li  class="nav-item">
                            @auth
                            @if (!isset($isshop))
                            {{-- <div class="btn-group d-flex align-items-center mb-2 mt-2" style="">
                                <button data-toggle="modal" data-target="#Modal-Seller" class="btn btn-select"
                                     aria-haspopup="true"
                                    aria-expanded="false">
                                        <strong>{{ trans('message.my_shop') }}</strong>
                                    @if( $i_to_ship_badge > 0 )
                                        <span class="badge badge-danger position-absolute count_basket_pc"
                                        style="top:0px; right: 0px;">{{ $i_to_ship_badge }}</span>
                                    @endif
                                </button>
                            </div> --}}
                            @else
                                <form action="/shop/seller-shop-user-detail" style="margin-bottom: 0px !important;">
                                    <div class="btn-group d-flex align-items-center mb-2 mt-2 mr-3">
                                        <button class="btn btn-select"
                                             aria-haspopup="true"
                                            aria-expanded="false">
                                            <!-- <img src="/new_ui/img/menu/icon-menu-medix.png" style="width: 30px;" class="img-fluid pr-2" alt="" /> -->
                                                <strong>Manage My Shop</strong>
                                            @if( $i_to_ship_badge > 0 )
                                                <span class="badge badge-danger position-absolute count_basket_pc"
                                                style="top:0px; right: 0px;">{{ $i_to_ship_badge }}</span>
                                            @endif
                                        </button>
                                    </div>
                                </form>
                            @endif
                            @endauth
                        </li>


                        <li class="nav-item d-flex flex-row mr-2">
                            @auth
                                <a class="nav-link position-relative count_basket pt-3" href="/basket"><img
                                        src="/new_ui/img/menu/icon-menu-bottom-2.png" id="basket" style="width: 30px;">
                                    <span class="badge badge-danger position-absolute count_basket_pc"
                                        style="top:0px; right: 0px;">{{ $basket_badges }}</span>
                                </a>
                            @endauth
                            @guest
                                <a class="nav-link" id="login" name="login" data-toggle="modal"
                                    data-target="#user-login-regis">
                                    <img src="/new_ui/img/menu/icon-menu-bottom-2.png" id="basket"
                                        style="width: 30px; cursor: pointer;" class="hover_shopping">
                                </a>
                            @endguest
                        </li>




                        {{-- <li class="nav-item">
                            <div class="dropdown px-0">
                                @if( $locale == 'en')
                                    <!-- <a class="dropdown-item px-2" href="/change/en">
                                        <button class="btn dropdown-toggle px-0" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                            <img src="/new_ui/img/menu/icon-menu-eng.svg" class="img-fluid pr-2" width="50%;" alt=""><label
                                            style="color: #ffffff;margin-bottom: 0;"></label>
                                        </button>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/change/th"><img src="/new_ui/img/menu/icon-menu-thai.svg"
                                                class="img-fluid pr-2" width="50%;" alt=""><label
                                                style="color: #000000;margin-bottom: 0;"></label></a>
                                    </div> -->
                                @else
                                    <!-- <a class="dropdown-item px-2" href="/change/th">
                                        <button class="btn dropdown-toggle px-0" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                            <img src="/new_ui/img/menu/icon-menu-thai.svg" class="img-fluid pr-2" width="50%;" alt=""><label
                                            style="color: #ffffff;margin-bottom: 0;"></label>
                                        </button>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/change/en"><img src="/new_ui/img/menu/icon-menu-eng.png"
                                                class="img-fluid pr-2" width="50%;" alt=""><label
                                                style="color: #000000;margin-bottom: 0;"></label></a>
                                    </div> -->
                                @endif
                            </div>
                        </li> --}}

                        <li class="nav-item dropdown d-flex align-items-center px-0">
                            @auth
                                <button
                                    class="btn dropdown-toggle d-flex flex-row align-items-center justify-content-center px-0"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div style="height: 30px;">
                                        <img src="{{ '/img/profile/' . Auth::user()->user_pic }}" alt=""
                                            onerror="this.onerror=null;this.src='/new_ui/img/menu/icon-menu-bottom-user.png'"
                                            style="border-radius: 100%; height: 100%; max-width: 100%; width: 30px; object-fit: cover;object-position: 50% 0;"
                                            class="rounded-circle">
                                        <!-- {{ Auth::user()->name }} -->
                                    </div>

                                </button>
                            @endauth
                            @guest
                                <!-- <a class="nav-link" id="alert">
                                    <img src="/new_ui/img/menu/icon-menu-bottom-user.png" style="width: 30px;">
                                </a> -->
                                <div class="dropleft color-blue btn_pay_order ml-3" data-toggle="modal" data-target="#user-login-regis"
                                    style="cursor: pointer; color: #000;">
                                    {{ trans('message.login') }}
                                    <!-- {{ trans('message.login') }}/{{ trans('message.register') }} -->
                                </div>
                            @endguest
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="row px-4 py-2" style="width: 300px;">
                                    @guest
                                        <div class="col-12">
                                            <h6><strong class="color-blue">{{ trans('message.welcome') }}</strong></h6>
                                        </div>

                                        <div class="col-12 pb-1">
                                            <button class="btn form-control rounded8px bg-blue" data-toggle="modal"
                                                data-target="#user-login-regis"
                                                style="color: #fff;">{{ trans('message.login') }}</button>
                                        </div>
                                    @endguest
                                    @auth
                                        <a class="col-12" href="{{ url('profile') }}">
                                            <div class="row py-3"
                                                style="background-color: #F9F9F9; border-radius: 10px;">
                                                <div class="col-4">
                                                    <img src="{{ '/img/profile/' . Auth::user()->user_pic }}"
                                                        onerror="this.onerror=null;this.src='/new_ui/img/menu/icon-menu-bottom-user.png'"
                                                        alt=""
                                                        style="border-radius: 100%; height: 100%; max-width: 100%; width: 70px; object-fit: cover;object-position: 50% 0;"
                                                        class="rounded-circle">
                                                </div>
                                                <div class="col-6">
                                                    <div class="row mt-1">
                                                        <strong class="color-blue">{{ trans('message.welcome') }}</strong>
                                                    </div>
                                                    <div class="row">
                                                        <strong>{{ Auth::user()->name }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-12">
                                            <div class="row py-3">
                                                <div class="col-12 mb-2">
                                                    <a href="{{ url('profile') }}">
                                                        <img src="/new_ui/img/user_icon_menu/icon_side_1.png"
                                                            style="width: 25px;" class="pr-2" alt="">
                                                        <strong>{{ trans('message.my_account') }}</strong>
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ url('profile_my_sale') }}">
                                                        <img src="/new_ui/img/menu/icon-menu-bottom-2.png"
                                                            style="width: 25px;" class="pr-2 hover_shopping" alt="">
                                                        <strong>{{ trans('message.my_order') }}</strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            @if (Session::has('walletAddress') && Session::get('walletAddress'))
                                            <span class="btn btn-block form-control rounded8px bg-secondary">
                                                <strong class="text-white">{{substr(Session::get('walletAddress'), 0 ,4).'...'.substr(Session::get('walletAddress'), -4)}}</strong>
                                            </span>
                                            @else
                                            <button type="button"
                                                class="btn btn-block form-control rounded8px bg-secondary btn_connect_wallet">
                                                <strong class="text-white">Connect Wallet</strong>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <form action="{{ route('logout') }}">
                                                <button id="login" name="login" type="submit"
                                                    class="btn btn-block form-control rounded8px bg-blue">
                                                    <strong class="text-white">{{ trans('message.logout') }}</strong>
                                                </button>
                                            </form>
                                        </div>


                                        <?php
                                        $isshop = DB::table('shops')
                                            ->where('user_id', Auth::user()->id)
                                            ->first();
                                        ?>
                                        @if (!isset($isshop))
                                        @endif
                                    @endauth
                                </div>

                            </div>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>

    </main>
</header>

<!-- @if (isset($category_all))
    <nav class="nav_custom_cat py-3" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center pt-2 nav_menu_custom">
                    <div class="swiper" style="overflow-x: hidden; width: 98%;">
                        <div class="swiper-wrapper swiper-custom justify-content-between">
                            @foreach ($category_all as $value)
                                <div class="swiper-slide px-lg-4 pr-5">
                                    <div
                                        class="d-flex justify-content-center text-center group-cate-box-custom w-100 ">
                                        <a href="product/category/{{ $value->category_id }}">

                                            <img src="/new_ui/img/categories_icon/{{ $value->banner }}"
                                                class="custom-img-cate">
                                            <p class="card-text mt-2 text-dot2 custom-text-cate">
                                                {{ $value->category_name }}</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endif -->

@php
if(!isset($value->category_id)){
    $value = new stdClass();
    $value->category_id = 1;
}
@endphp




<!-- Modal -->
<div class="modal fade" id="user-login-regis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 500px;">
        <div class="modal-content" style="background-color: #F9F9F9;">
            <div class="modal-header " style="border: unset;">
                <div class="col-12 d-flex justify-content-center position-relative">
                    <img src="/new_ui/img/logo/logo.svg" class="img-fluid d-flex justify-content-center"
                        style="width: 50%;">
                    <button type="button" class="close position-absolute" style="top: 0; right: 10px;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
            <div class="modal-body pt-0">
                <div class="col-12">
                    <hr class="w-100 my-0">
                </div>
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border: unset;">
                            <a class="nav-link active text-center pt-4 " style="width: 50% !important;"
                                id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab"
                                aria-controls="nav-login" aria-selected="true">
                                <h6><strong>{{ trans('message.login') }}</strong></h6>
                            </a>
                            <a class="nav-link text-center pt-4 regis_btn" style="width: 50% !important;"
                                id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab"
                                aria-controls="nav-register" aria-selected="false">
                                <h6><strong>{{ trans('message.register') }}</strong></h6>
                            </a>
                        </div>
                    </nav>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="nav-login" role="tabpanel"
                            aria-labelledby="nav-login-tab">
                            <div class="row">
                                <div class="col-12 mb-3 mt-4">
                                    <label><strong style="color: #495057;">{{ trans('message.tel_or_email') }}</strong></label>
                                    <input type="input"
                                        class="form-control rounded8px @error('username') is-invalid @enderror"
                                        name="username" aria-describedby="emailHelp"
                                        placeholder="{{ trans('message.input_tel_or_email') }}">
                                </div>
                                <div class="col-12 mb-1">
                                    <label><strong style="color: #495057;">{{ trans('message.password') }}</strong></label>
                                    {{-- <input type="password"
                                        class="form-control rounded8px @error('password') is-invalid @enderror"
                                        name="login_password" placeholder="กรอกรหัสผ่านของคุณ"> --}}
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control rounded8px @error('password') is-invalid @enderror"
                                            name="login_password" placeholder="{{ trans('message.input_password') }}"
                                            aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary form-control rounded8px" type="button" id="btnLoginEyeOpen"><i
                                                    class="fa fa-eye"></i></button>
                                            <button class="btn btn-secondary form-control rounded8px" type="button" id="btnLoginEyeSlash" style="display: none;"><i
                                                    class="fa fa-eye-slash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-0 text-right py-2">
                                    <a href="{{ route('password.request') }}">
                                        <h6><strong class="color-blue"
                                                style="font-size: 14px; text-decoration: underline;">{{ trans('message.forget_password') }}
                                                ?</strong></h6>
                                    </a>
                                </div>
                                <div class="col-12 mb-2 text-center">
                                    <button class="btn form-control text-white rounded8px login_submit bg-blue">{{ trans('message.login') }}</button>
                                </div>
                                <!-- <div class="col-12 mb-2">
                                    <div class="row">
                                        <div class="col-5 pr-0">
                                            <hr class="w-100 ">
                                        </div>
                                        <div class="col-2 d-flex align-items-center justify-content-center"
                                            style="color: rgba(0,0,0,.5);">
                                            หรือ
                                        </div>
                                        <div class="col-5 pl-0">
                                            <hr class="w-100 ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 ">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="{{ url('/login/facebook') }}"
                                            class="btn form-control py-0 d-flex align-items-center justify-content-center rounded8px"
                                            style="border:2px solid #4267B2; color: #fff; background-color: #4267B2;">
                                            {{-- <img src="/new_ui/img/footer/icon-facebook.svg" style="width: 25px;"
                                                class="img-fluid pr-2" alt=""> --}}
                                            <strong><i class="fab fa-facebook-f"></i> {{ trans('message.login_with_facebook') }}</strong></a>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-register" role="tabpanel"
                            aria-labelledby="nav-register-tab">
                            <div class="form-row">
                                <div class="col-6 mb-3 mt-4 ">
                                    <label><strong style="color: #495057;">{{ trans('message.name') }}</strong></label>
                                    <input type="text" class="form-control rounded8px" name="name"
                                        aria-describedby="name" placeholder="{{ trans('message.input_name') }}">
                                </div>
                                <div class="col-6 mb-3 mt-4 ">
                                    <label><strong style="color: #495057;">{{ trans('message.surname') }}</strong></label>
                                    <input type="text" class="form-control rounded8px" name="surname"
                                        aria-describedby="surname" placeholder="{{ trans('message.input_surname') }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label><strong style="color: #495057;">{{ trans('message.tel') }}</strong></label>
                                    <input type="tel" class="form-control rounded8px" maxlength="10"
                                        onkeypress="return isNumberKey(event)" name="phone" aria-describedby="phone"
                                        placeholder="{{ trans('message.input_tel') }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label><strong style="color: #495057;">{{ trans('message.email') }}</strong></label>
                                    <input type="email" class="form-control rounded8px" name="email"
                                        aria-describedby="email" placeholder="{{ trans('message.input_email') }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label><strong style="color: #495057;">{{ trans('message.password_min8') }}</strong></label>
                                    {{-- <input type="password" class="form-control rounded8px" name="password"
                                        aria-describedby="password" placeholder="กรุณากรอกรหัสผ่าน"> --}}

                                    <div class="input-group">
                                        <input type="password" class="form-control rounded8px" name="password"
                                            placeholder="{{ trans('message.input_password_min8') }}" aria-describedby="password">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary form-control rounded8px" type="button" id="btnLoginEyeOpen2"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-secondary form-control rounded8px" type="button" id="btnLoginEyeSlash2" style="display: none;"><i class="fa fa-eye-slash"></i></button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 mb-3">
                                    <label><strong style="color: #495057;">{{ trans('message.confirm_password_min8') }}</strong></label>
                                    {{-- <input type="password" class="form-control rounded8px" name="password_confirmation"
                                        aria-describedby="password_confirmation" placeholder="กรุณากรอกยืนยันรหัสผ่าน"> --}}

                                    <div class="input-group">
                                        <input type="password" class="form-control rounded8px"
                                            name="password_confirmation" placeholder="{{ trans('message.input_confirm_password_min8') }}"
                                            aria-describedby="password_confirmation">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary form-control rounded8px" type="button" id="btnLoginEyeOpen3"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-secondary form-control rounded8px" type="button" id="btnLoginEyeSlash3" style="display: none;"><i class="fa fa-eye-slash"></i></button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input mt-2" type="checkbox" name="i_accept"
                                            id="i_accept">
                                        <label class="form-check-label" for="exampleRadios1">
                                            <h6><strong style="font-size: 14px;">{{ trans('message.accept') }}<a href="/other/policy" class="color-blue" target="_blank"> {{ trans('message.policy') }}</a></strong></h6>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 text-center">
                                    <button type="submit" name="continue" id="continue"
                                        class="btn form-control text-white rounded8px continue bg-blue" disabled>{{ trans('message.register') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="barcode1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan Barcode</h5>
                <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form role="search" id="barcode_form1" method="GET" action="/product_all">

                    <b> Barcode NO : <span id="searchIndexBarcode1"></span></b>
                    <div class="d-flex text-center"></div>
                    <div id="camera1">
                        <video class="dbrScanner-video" playsinline="true"></video>
                    </div>

                    <br>
                    <span>วิธีใช้ : วางสินค้าที่มีพื้นหลังสีพื้น เช่น ขาว หรือ ดำ</span>
                    <input type="hidden" name="barcode">
                </form>


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="barcode2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan Barcode</h5>
                <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form role="search" id="barcode_form2" method="GET" action="/product_all">

                    <b> Barcode NO : <span id="searchIndexBarcode2"></span></b>

                    <div class="d-flex text-center" id="camera2">
                        <video class="dbrScanner-video" playsinline="true"></video>
                    </div>

                    <br>
                    <span>วิธีใช้ : วางสินค้าที่มีพื้นหลังสีพื้น เช่น ขาว หรือ ดำ</span>
                    <input type="hidden" name="barcode">
                </form>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="barcode3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan Barcode</h5>
                <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="search" id="barcode_form3" method="GET" action="/product_all">

                    <b> Barcode NO : <span id="searchIndexBarcode3"></span></b>

                    <div class="d-flex text-center" id="camera3">

                        <video class="dbrScanner-video" playsinline="true"></video>
                    </div>
                    <br>
                    <span>วิธีใช้ : วางสินค้าที่มีพื้นหลังสีพื้น เช่น ขาว หรือ ดำ</span>
                    <input type="hidden" name="barcode">
                </form>


            </div>
        </div>
    </div>
</div>
{{-- ------------------------------------------------------ Barcode Scanner ------------------------------------------ --}}

<div class="modal fade" id="Modal-Seller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>สมัครร้านค้า</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('new-shopInfo') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
                                    <div class="custom-file was-validated">
                                        <div class="d-flex align-items-center justify-content-center"
                                            style="width: 100%; height: 300px;border: 1px solid #ced4da !important;border-radius: .25rem !important;">
                                            <img id="preview" class="img-shop-profile"
                                                style="max-width: 100%; max-height: 100%;"
                                                src="{{ '/new_ui/img/no_image.png' }}">
                                        </div>
                                        <label style="margin-top: 10px;">
                                            <h6 style="color: red;">ขนาดภาพแนะนำ 120px x 120px</h6>
                                        </label>
                                        <div class="custom-file mt-3" id="customFile" style="margin-top: 0px !important;">
                                            <input onchange="readURL(this)" type="file"
                                                class="click_image custom-file-input form-control-file is-invalid @error('shop_pic') is-invalid @enderror "
                                                id="shop_pic" name="shop_pic" required />
                                            <label class="custom-file-label">
                                                <p id="image_img"></p>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 col-md-12 col-12  px-0">
                                <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                                    <div class="col-12 px-0">
                                        <div class="form-group was-validated">
                                            <label>
                                                <h5><strong style="color: #333;">ชื่อร้าน</strong></h5>
                                            </label>
                                            <input type="text" class="form-control is-invalid" id="shop_name"
                                                name="shop_name" placeholder="กรอกชื่อร้านค้า" required>
                                        </div>
                                    </div>
                                    <div id="dvAtedProvince" class="col-12 px-0">
                                        <div class="form-group was-validated">
                                            <label>
                                                <h5><strong style="color: #333;">จังหวัด</strong></h5>
                                            </label>
                                            <select name='ated_province_id' title="เลือกจังหวัด" class="form-control btn-color" id="ated_province_id">
                                                <option value="">-- เลือกจังหวัด --</option>
                                                @foreach ($o_province as $item)
                                                    <option value="{{ $item->id }}" >{{ $item->name_th }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 px-0">
                                        <div class="form-group was-validated">
                                            <label>
                                                <h5><strong style="color: #333;">รายละเอียดร้านค้า</strong></h5>
                                            </label>
                                            <textarea class="form-control is-invalid" id="description"
                                                name="description" rows="8" placeholder="กรอกรายละเอียดของร้านค้า"
                                                required></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12 px-4 px-lg-4 px-md-4 mx-0">
                        <div class="row px-0">
                            <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-end px-4">
                                <button class="btn btn-secondary " type="button" data-dismiss="modal"
                                    aria-label="Close">{{ __('ยกเลิก') }} </button>
                                <button type="submit"
                                    class="btn btn-c45e9f ml-2 newShop">{{ __('บันทึก') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="drawer drawer-left slide" tabindex="-1" role="dialog" aria-labelledby="drawer-1-title" aria-hidden="true"
    id="drawer-2">
    <div class="drawer-content drawer-content-scrollable" role="document">
        <div class="drawer-header">
            <div class="col-12">
                <div class="row d-flex align-items-center py-2 rounded8px" style="background-color: #F9F9F9;">
                    @auth
                        <div class="col-4 d-flex align-items-center justify-content-center" style="height: 50px;">
                            <img src="{{ 'img/profile/' . Auth::user()->user_pic }}"
                                style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
                                class="align-self-start" alt="...">
                        </div>

                        <div class="col-8 d-flex flex-row align-items-center">
                            <div class="row w-100">
                                <div class="col-12 px-0">
                                    <h5 class="font_size_14px text-dark"><strong>{{ Auth::user()->name }}</strong></h5>
                                </div>
                                <div class="col-12 px-0">
                                    <a href="{{ url('profile') }}" class="d-flex align-items-start">
                                        <!-- <img src="/new_ui/img/user_icon_menu/edit_name.png" style="width: 20px;"> -->
                                        <i class="fa fa-pencil  icon-pencil"></i>
                                        <small class="color-blue" ><strong class="ml-2">แก้ไขข้อมูลส่วนตัว</strong></small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endauth
                    @auth
                        @if (isset($wallet->status) && $wallet->status == 'appect')
                        @else
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        <div class="drawer-body">
            <div class="row">
                <div class="col-12">
                    @if (!isset($isshop))
                        <button data-toggle="modal" data-target="#Modal-Seller"
                            class="btn btn-outline-c45e9f form-control" data-dismiss="drawer" aria-label="Close">
                            <!-- <img src="/new_ui/img/menu/icon-menu-medix.png" class="img-fluid" style="width: 22px;"alt="">  -->
                            {{ trans('message.sell_with_us') }}
                        </button>
                    @else
                        <a href="{{ url('shop/seller-shop-user-detail') }}"
                            class="btn btn-outline-c45e9f form-control">
                            <!-- <img src="/new_ui/img/menu/icon-menu-medix.png"class="img-fluid" style="width: 22px;" alt="">  -->
                            ร้านค้าของฉัน
                        </a>
                    @endif
                </div>
                <div class="col-12">
                    <div id="accordion" style='padding-top: 10px;'>


                        <div class="card" style="border: none;">
                            <div class="card-header d-flex justify-content-between align-items-center px-0"
                                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                                {{-- href="#collapseTwo" --}}>
                                <a href="{{ url('profile_my_sale') }}">
                                    <strong class="text-purple">
                                        <img src="/new_ui/img/menu/icon-menu-bottom-2.png" style="width: 25px;"
                                            class="pr-2 hover_shopping" alt="">การซื้อของฉัน
                                    </strong>
                                </a>
                                <div class="collapsedIcon">
                                </div>
                            </div>
                        </div>
                        <div id="collapseTwo" class="collapse show">
                            <div class="card-body py-0">
                                @include('component.shop_step')
                            </div>
                        </div>
                        @if (isset(Auth::user()->ref_code))
                            <div class="card" style="border: none;">
                                <div class="card-header d-flex flex-column px-0"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" {{-- href="#collapseTwo" --}}>
                                    <div class="d-flex justify-content-start mb-2">
                                        <strong class="text-purple">
                                            <img src="/new_ui/img/user_icon_menu/shop_recommend.svg"
                                                style="width: 25px;" class="pr-2"
                                                alt="">แนะนำเพื่อนเปิดร้านกับเรา
                                        </strong>
                                    </div>
                                    <div class="input-group d-flex flex-column">
                                        <div class="input-group mb-3">
                                            <input type="text" readonly="readonly"
                                                value="{{ isset(Auth::user()->ref_code) ? Auth::user()->ref_code : '' }}"
                                                class="form-control" id="copyText2">
                                            <div class="input-group-append" style="cursor: pointer;">
                                                <span class="input-group-text bg-blue">
                                                    <p class="mb-0 text-white" id="btnCopy" onclick="copyRef2()">
                                                        <strong><i class="fa fa-link" aria-hidden="true"></i>
                                                            คัดลอก</strong>
                                                    </p class="mb-0">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" readonly="readonly"
                                                value="{{ isset(Auth::user()->ref_code) ? url('') . 'welcome?ref_code=' . Auth::user()->ref_code : '' }}"
                                                class="form-control" id="copyLink2">
                                            <div class="input-group-append" style="cursor: pointer;">
                                                <span class="input-group-text bg-blue">
                                                    <p class="mb-0 text-white" id="btnLink" onclick="copyLink2()">
                                                        <strong><i class="fa fa-link" aria-hidden="true"></i>
                                                            คัดลอก</strong>
                                                    </p class="mb-0">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="card" style="border: none;">
                            <div class="card-header d-flex justify-content-between align-items-center px-0"
                                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                                href="#collapseOne">
                                <strong class="text-purple">
                                    <img src="/new_ui/img/user_icon_menu/icon_side_1.png" style="width: 25px;"
                                        class="pr-2" alt="">{{ trans('message.my_account') }}
                                </strong>
                                <div class="collapsedIcon">
                                    <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
                                </div>
                            </div>
                            <div id="collapseOne" class="collapse show">
                                <div class="card-body py-0">
                                    <a class="px-0" href="{{ url('profile') }}">
                                        <h6 style="text-indent: 5px;">{{ trans('message.my_profile') }}</h6>
                                    </a>
                                    {{-- <a class="px-0" href="{{ url('profile_paymen_method') }}">
                                    <h6 style="text-indent: 5px;">{{ trans('message.payment_method') }}</h6>
                                    </a> --}}
                                    <a class="px-0" href="{{ url('address') }}">
                                        <h6 style="text-indent: 5px;">{{ trans('message.my_address') }}</h6>
                                    </a>
                                    <a class="px-0" href="{{ url('change_pass') }}">
                                        <h6 style="text-indent: 5px;">{{ trans('message.change_password') }}</h6>
                                    </a>
                                    <!-- @auth
                                                <a class="px-0 d-flex align-items-center" href="/profile/KYC">
                                                    <h6 style="text-indent: 5px; ">
                                                        @php
                                                            $status = ['0' => 'ยังไม่ได้ทำการพิสูจน์ตัวตน', '1' => 'ตรวจสอบผ่านแล้ว', '2' => 'ทำการแก้ไขรูปภาพ', '3' => 'รอการตรวจสอบ'];
                                                            $color = [
                                                                '0' => 'badge badge-secondary ml-2',
                                                                '1' => 'badge badge-success
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ml-2',
                                                                '2' => 'badge badge-danger ml-2',
                                                                '3' => 'badge badge-warning ml-2',
                                                            ];
                                                        @endphp
                                                        ยืนยันตัวตน <span class="{{ $color[Auth::user()->kyc_status] }}"
                                                            style="color: white; text-indent: 0px !important;">{{ $status[Auth::user()->kyc_status] }}</span>
                                                    </h6>
                                                </a>
                                    @endauth -->
                                </div>
                            </div>
                        </div>

                        <div class="card" style="border: none;">
                            <a href="{{ route('logout') }}">
                                <div class="card-header d-flex justify-content-between align-items-center px-0"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" href="#collapseSix">
                                    <strong class="text-purple" style="color: #dc4e41 !important;">
                                        <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-1.png"
                                            style="width: 25px;" class="pr-2" alt="">ออกจากระบบ
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
</div>
@if($errors->any())
<input type="hidden" id="walletMessage" value="{{$errors->first()}}">
@endif
</div>

@include('pages.payment-page.modal_add_wallet')
<script type="text/javascript">
    var image_name = $("#image_img").text("กรุณาเลือกรูปภาพโลโก้ร้านค้า");
    var click_image = $("#click_image").val();
    // console.log(click_image);


    // var image_name;
    function readURL(input) {
        var readerImg = $("#shop_pic").val();
        if (input.files && input.files[0]) {
            reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                // readerImg = e.target.result;
                image_name = $("#image_img").text(readerImg.split('\\').pop());
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script>
    $('.collapse').on('show.bs.collapse', function() {
        id = $(this).attr('id');
        $('div[href="#' + id + '"] div.collapsedIcon h4').html(
            '<i class="fa fa-angle-up" aria-hidden="true"></i>');
    });
    $('.collapse').on('hide.bs.collapse', function() {
        id = $(this).attr('id');
        $('div[href="#' + id + '"] div.collapsedIcon h4').html(
            '<i class="fa fa-angle-down" aria-hidden="true"></i>');
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="/js/quagga.min.js"></script>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>







{{-- //------------------------------------- REGISTER ENTER FOR SUBMIT AJAX -------------------------------------\\ --}}
<script>
    $(document).ready(function() {
        $('input[name="name"],input[name="surname"],input[name="phone"],input[name="email"],input[name="password"],input[name="password_confirmation"],input[name="i_accept"]')
            .keypress(function(e) {

                if (e.which === 13) {
                    ajaxRegister();

                }

            });
        $('.continue').on('click', function() {
            ajaxRegister();

        });




        $('input').on('keypress', function() {
            $('.continue').parent().find('.register_error').remove();
        });


        function ajaxRegister() {
            var name = $('input[name="name"]').val();
            var surname = $('input[name="surname"]').val();
            var phone = $('input[name="phone"]').val();
            var email = $('input[name="email"]').val();
            var password = $('input[name="password"]').val();
            var password_confirmation = $('input[name="password_confirmation"]').val();
            var i_accept = $('input[name="i_accept"]:checked').val();
            console.log(i_accept);
            // return false;
            //Need to fix


            if (i_accept == 'on') {
                $('.continue').prop("disabled", false);
            } else {
                Swal.fire({
                    text: "ยินยอมเงื่อนไขและนโยบายความเป็นส่วนตัวก่อน",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ปิดหน้าต่าง!'
                });
                $('.continue').attr("disabled", "true");
            }


            $('.form-row').find('.register_error').remove();

            $('.continue').attr("disabled", "true");


            $.ajax({
                url: '{{ route('register') }}',
                type: 'POST',
                data: {
                    name: name,
                    surname: surname,
                    phone: phone,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                    i_accept: i_accept,
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    // console.log(data);
                    $('.continue').prop('disabled', true);
                    window.location.replace("/welcome");
                    return false;
                },
                error: function(data) {
                    json = JSON.parse(data.responseText);
                    console.log(json);
                    var loop = 0;
                    $.each(json['errors'], function(index, value) {
                        // focus เฉพาะ Input แรก เท่านั้น
                        console.log(index);
                        console.log(value);
                        if (loop == 0) {
                            $('input[name="' + index + '"]').focus();
                            loop++;
                        }





                        $('input[name="' + index + '"]').parent()
                            .append('<span class="register_error invalid-feedback pl-2" role="alert" style="display:block !important;">\
                                     <strong>' + value + '</strong>\
                                </span>')
                            .val('');


                    });

                    if (loop > 0) {
                        $('.continue').parents('form-row').find('.register_error').remove();
                    }
                    $('.continue').prop('disabled', false);

                }
            });
        }





        $('input[name="i_accept"]').on('change', function() {
            var test = this.checked;
            if (test == true) {
                $('.continue').prop("disabled", false);
            } else {
                Swal.fire({
                    text: "ยินยอมเงื่อนไขและนโยบายความเป็นส่วนตัวก่อน",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ปิดหน้าต่าง!'
                });
                $('.continue').attr("disabled", "true");
            }
        });






    });
</script>
{{-- //------------------------------------- REGISTER ENTER FOR SUBMIT AJAX  -------------------------------------\\ --}}










{{-- //------------------------------------- LOGIN AJAX -------------------------------------\\ --}}
<script>
    $(document).ready(function() {
        $('.login_submit').on('click', function() {
            ajaxLogin();

        });

        $('input[name="username"],input[name="login_password"]').keypress(function(e) {
            if (e.which === 13) {
                ajaxLogin();
            }
        });

        $('input').on('keypress', function() {
            $('.login_submit').parent().find('.login_error').remove();
        });


        function ajaxLogin() {
            var username = $('input[name="username"]').val();
            var login_password = $('input[name="login_password"]').val();
            $('.login_submit').prop('disabled', true);

            // var text = $('.login_submit').text();
            // $('.login_submit').text('');


            $('.row').find('.login_error').remove();
            $.ajax({
                url: '{{ route('login2') }}',
                type: 'POST',
                data: {
                    username: username,
                    password: login_password,
                    _token: '{{ csrf_token() }}',
                },
                // $.ajax({
                //     url: '{{ route('login') }}',
                //     type: 'POST',
                //     data: {
                //         username: username,
                //         login_password: login_password,
                //         _token: '{{ csrf_token() }}',
                //     },
                success: function(data) {
                    console.log(data);

                    if ($.trim(data) == 'false') {
                        Swal.fire({
                            text: "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง",
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ปิดหน้าต่าง!'
                        });
                        $('.login_submit').prop('disabled', false);

                        return false;

                    }

                    window.location.replace("/welcome");
                },
                error: function(data) {
                    // console.log(data);
                    json = JSON.parse(data.responseText);
                    console.log(json);
                    var loop = 0;
                    $.each(json['errors'], function(index, value) {
                        // focus เฉพาะ Input แรก เท่านั้น
                        if (loop == 0) {
                            $('input[name="' + index + '"]').focus();
                            loop++;
                        }
                        $('input[name="' + index + '"]').parent()
                            .append('<span class="login_error invalid-feedback" role="alert" style="display:block !important">\
                                <strong>' + value + '</strong>\
                            </span>')
                            .val('');

                    });
                    $('.login_submit').prop('disabled', false);

                }
            });
        }



    });
</script>
{{-- //------------------------------------- LOGIN CLICK AJAX -------------------------------------\\ --}}










{{-- ------------------------------------------------------ Barcode Scanner ------------------------------------------ --}}
{{-- <script>
    $(document).ready(function () {

        var camera1 = '#camera1';
        var camera2 = '#camera2';
        var camera3 = '#camera3';

        var form1 = $('#barcode_form1');
        var form2 = $('#barcode_form2');
        var form3 = $('#barcode_form3');

        var showText1 = $('#searchIndexBarcode1');
        var showText2 = $('#searchIndexBarcode2');
        var showText3 = $('#searchIndexBarcode3');

        $('#barcode_1').on('click', function () {
            $('#barcode1').modal('show');
            scanBarcode(camera1, form1, showText1);
        });

        $('#barcode_2').on('click', function () {
            $('#barcode2').modal('show');
            scanBarcode(camera2, form2, showText2);
        });

        $('#barcode_3').on('click', function () {
            $('#barcode3').modal('show');
            scanBarcode(camera3, form3, showText3);
        });



        function scanBarcode(camera, form, showText) {
            console.log(camera);
            console.log(form);
            console.log(showText);

            let scanner = null;
            (async () => {
                scanner = await Dynamsoft.BarcodeScanner.createInstance();
                await scanner.setUIElement(document.getElementById(camera));
                scanner.onFrameRead = results => {
                    console.log(results);
                };
                scanner.onUnduplicatedRead = (txt, result) => {
                    alert(txt);
                };
                await scanner.show();
            })();


            var barcode_input = data.codeResult.code;
            showText.text('ไม่มีสินค้าในระบบ');

            $.ajax({
                url: '/bar/search',
                type: 'POST',
                data: {
                    barcode: barcode_input,
                    _token: '{{ csrf_token() }}'
},
success: function (success) {
console.log(success.product[0].barcode);
// return false;

if (typeof success.product !== 'undefined' && success.product !== null &&
typeof success.flash_sale !== 'undefined' && success.flash_sale !== null &&
typeof success.pre_order !== 'undefined' && success.pre_order !== null) {
$('input[name="barcode"]').val(success.product[0].barcode);
showText.text(success.product[0].barcode);
if (form.attr('id') == 'barcode_form3') {
form.attr('action', "/product/barcode/?=" + barcode_input);
form.submit();
Quagga.stop();
} else {
form.attr('action', "/product/barcode/?=" + barcode_input);
form.submit();
Quagga.stop();
}
} else {
showText.text('ไม่มีเลข หรือ สินค้าในระบบ');
}
},
error: function (error) {
console.log('error : ' + error);
}
});

$('.closeModal').on('click', function () {
Quagga.stop();
});

}

});
</script> --}}


<script src="https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode@8.1.2/dist/dbr.js"
data-productKeys="t0068NQAAAAYe5rtv/EEICK+bjDKnHsSZi4eRCBF7rQoo4BhbwBvsLTRt1TobT/J1jN00GtxRIdWW9OLEX3k889MgSuF1n5k=">
</script>


<script>
    $(document).ready(function() {
        var modal1 = '#barcode1';
        var modal2 = '#barcode2';
        var modal3 = '#barcode3';

        var camera1 = 'camera1';
        var camera2 = 'camera2';
        var camera3 = 'camera3';

        var form1 = $('#barcode_form1');
        var form2 = $('#barcode_form2');
        var form3 = $('#barcode_form3');

        var showText1 = $('#searchIndexBarcode1');
        var showText2 = $('#searchIndexBarcode2');
        var showText3 = $('#searchIndexBarcode3');

        $('#barcode_1').on('click', function() {
            $('#barcode1').modal('show');
            barcode(camera1, form1, showText1, modal1);
        });

        $('#barcode_2').on('click', function() {
            $('#barcode2').modal('show');
            barcode(camera2, form2, showText2, modal2);
        });

        $('#barcode_3').on('click', function() {
            $('#barcode3').modal('show');
            barcode(camera3, form3, showText3, modal3);
        });


        function barcode(camera, form, showText, modal) {


            let scanner = null;
            (async () => {
                try {

                    scanner = await Dynamsoft.DBR.BarcodeScanner.createInstance();
                    await scanner.setUIElement(document.getElementById(camera));

                    $(modal).on('hidden.bs.modal', function(e) {
                        scanner.destroy();
                    });


                    await scanner.updateVideoSettings({
                        video: {
                            width: {
                                ideal: 460
                            },
                            height: {
                                ideal: 240
                            },
                            facingMode: {
                                ideal: 'environment'
                            },
                        }
                    });
                    scanner.onFrameRead = results => {
                        //  console.log(results);
                    };

                    scanner.onUnduplicatedRead = (txt, result) => {
                        showText.text('ไม่มีเลข หรือ สินค้าชิ้นนี้');

                        $.ajax({
                            url: '/bar/search',
                            type: 'POST',
                            data: {
                                barcode: txt,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(success) {
                                // return false;
                                showText.text(txt);
                                $('input[name="barcode"]').val(txt);
                                $('input[name="search"]').val(txt);

                                //  var value_barcode = $('input[name="barcode"]').val();

                                scanner.destroy();
                                form.submit();
                                //  form.attr('action', "/product/barcode/?=" + value_barcode);

                            },
                            error: function(error) {
                                console.log('error : ' + error);
                            }
                        });

                    };
                    await scanner.show();



                } catch (ex) {
                    console.error(ex);
                }
            })
            ();
        }

        $('#btnLoginEyeOpen').click(function() {
            $('input[name="login_password"]').prop('type', 'text');
            $(this).hide();
            $('#btnLoginEyeSlash').show();
        });
        $('#btnLoginEyeSlash').click(function() {
            $('input[name="login_password"]').prop('type', 'password');
            $(this).hide();
            $('#btnLoginEyeOpen').show();
        });
        $('#btnLoginEyeOpen2').click(function() {
            $('input[name="password"]').prop('type', 'text');
            $(this).hide();
            $('#btnLoginEyeSlash2').show();
        });
        $('#btnLoginEyeSlash2').click(function() {
            $('input[name="password"]').prop('type', 'password');
            $(this).hide();
            $('#btnLoginEyeOpen2').show();
        });
        $('#btnLoginEyeOpen3').click(function() {
            $('input[name="password_confirmation"]').prop('type', 'text');
            $(this).hide();
            $('#btnLoginEyeSlash3').show();
        });
        $('#btnLoginEyeSlash3').click(function() {
            $('input[name="password_confirmation"]').prop('type', 'password');
            $(this).hide();
            $('#btnLoginEyeOpen3').show();
        });
    });
</script>
{{-- ------------------------------------------------------ Barcode Scanner ------------------------------------------ --}}


<script>
    var swiper = new Swiper('.swiper', {
        slidesPerView: 'auto',
        direction: getDirection(),
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            resize: function() {
                swiper.changeDirection(getDirection());
            },
        },
    });

    function getDirection() {
        var windowWidth = window.innerWidth;
        var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

        return direction;
    }
</script>



<script>
    var pathname = window.location.pathname;
    // var url = pathname.replace("/chotik/", "");
    $(".menu-bottom a[href='{{ url('/') }}" + pathname + "']").addClass("active");
    $(".menu-bottom-color a[href='{{ url('/') }}" + pathname + "']").addClass("active");
    console.log(pathname);
    console.log("{{ url('/') }}" + pathname);
</script>

<script>
    $(() => {
        try{
            if($('#walletMessage').length){
                const walletMessage = $('#walletMessage').val();
                Swal.fire(
                    "Warning",
                    walletMessage,
                    "warning"
                );
            }

            window.ethereum?.on?.('accountsChanged', (accounts) => {
                const account = accounts[0] || '';
                if(account){
                    window.location.href = `/connectWallet/${account}/clearWalletSession`;
                }
                return;
            });
        }catch (e){
            console.error(e)
            // window.location.reload();
        }
    });

    $('body').on('click', '.btn_connect_wallet', async () => {
        if (!window.ethereum) {
            Swal.fire(
                "Warning",
                "Please, Install metamark extension",
                "warning"
            );
            return;
        }

        const provider = new ethers.providers.Web3Provider(window.ethereum);

        let response = await fetch('/web3-login-message');
        const message = await response.text();

        await provider.send("eth_requestAccounts", []);
        const address = await provider.getSigner().getAddress();
        const signature = await provider.getSigner().signMessage(message);

        const switchedNetwork = await switchNetwork(Config.CHAIN_ID);
        switchChainID();
        console.log("🚀 ~ file: _menu.blade.php ~ line 1950 ~ $ ~ switchedNetwork", switchedNetwork)

        response = await fetch('/web3-login-verify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'address': address,
                'signature': signature,
                '_token': '{{ csrf_token() }}'
            })
        });

        const data = await response.text();

        if(data === 'OK') {
            // await switchNetwork(Config.CHAIN_ID)
            window.location.href = `/connectWallet/${address}`;
        }

        return;
    });
</script>
