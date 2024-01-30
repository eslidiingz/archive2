<style>
	.sidenav {
		height: 100%;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #fff;
		overflow-x: hidden;
		padding-top: 20px;
	}

	.sidenav a {
		padding: 6px 8px 6px 16px;
		text-decoration: none;
		font-size: 25px;
		color: #818181;
		display: block;
	}

	.sidenav a:hover {
		color: #c75ba1;
	}
.bg{
    color: #c75ba1;
}
</style>

<nav class="navbar fixed-top navbar-expand navbar-light bg-white topbar mb-1 static-top " style="margin-top:0px !important">
    {{-- new --}}
    <div class="d-flex text-center  justify-content-around d-xl-none"  style="background-color: #fff;">
        {{-- <a href="{{ url('home') }}" class="col p-0 py-2 text-black">
          <div class="d-flex align-items-center justify-content-between flex-column">
            <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-1.png" width="24px;" alt="">
            <p class="m-0" style="color: #000;">Shopteeni</p>
          </div>
        </a> --}}
      
        <div class="col p-0 py-2 text-black d-flex align-items-center justify-content-between flex-column" data-toggle="drawer" data-target="#drawer-1">
          <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-2.png" width="24px;" alt="">
          <p class="m-0" style="color: #000;">Menu</p>
        </div>
      
        {{-- <a href="#" class="col p-0 py-2 text-black ">
          <div class="d-flex align-items-center justify-content-between flex-column">
            <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-3.png" width="24px;" alt="">
            <p class="m-0" style="color: #000;">Chat</p>
          </div>
        </a>
        <div class="col p-0 py-2 text-black d-flex align-items-center justify-content-between flex-column" data-toggle="drawer" data-target="#drawer-2">
          <img src="/new_ui/img/seller/menu-lower/icon-menu-lower-4.png" width="24px;" alt="">
          <p class="m-0" style="color: #000;">User</p>
        </div> --}}
      
    </div>
    <div class="drawer drawer-left slide" tabindex="-1" role="dialog" aria-labelledby="drawer-1-title" aria-hidden="true" id="drawer-1">
        <div class="drawer-content drawer-content-scrollable" role="document">
            <div class="drawer-header">
                <div class="col-12">
                    <a href="seller-index.php" class="p-0"><img src="/img/icon/logo_shop_2.png" class="img-fluid w-75"></a>
                </div>
            </div>
            <div class="drawer-body">
                <div class="sidenav ">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                                <div class="sidebar-brand-icon rotate-n-15 ">
                                </div>
                                <div class="sidebar-brand-text">Shopteenii<sup> service</sup></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 " >
                        <div class="card" style="border: none;">
                            <div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border: none; background-color: unset;">
                                <strong class="text-dark">
                                    <img src="/new_ui/img/seller/icon_menu/icon_menu_2.svg" style="width: 30px;" class="pr-2" alt="">Dashboard
                                </strong>
                            </div>
                            <div class="card-body py-0">
                                <a class="px-0" href="{{ url('/dashboard/manageUser') }}"><h6 style="text-indent: 30px;">ระบบจัดการ User</h6></a>
                                <a class="px-0" href="{{ url('/dashboard/ReportOrder') }}"><h6 style="text-indent: 30px;">รายงานคำสั่งซื้อ</h6></a>
                                <a class="px-0" href="{{ url('/dashboard/orderCancel') }}"><h6 style="text-indent: 30px;">รายงานการพิจารณาคำสั่งซื้อ</h6></a>
                                <a class="px-0" href="{{ url('/dashboard/influencer') }}"><h6 style="text-indent: 30px;">ผู้แนะนำร้านค้า</h6></a>
                                <a class="px-0" href="#"><h6 style="text-indent: 30px;">ระบบ chat</h6></a>
                            </div>
                        </div>
                        <div class="card" style="border: none;">
                            <div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border: none; background-color: unset;">
                                <strong class="text-dark">
                                    <img src="/new_ui/img/seller/icon_menu/icon_menu_3.svg" style="width: 30px;" class="pr-2" alt="">รายงานการเงิน
                                </strong>
                            </div>
                            <div class="card-body py-0">
                                <a class="px-0" href="{{ url('/dashboard/payment') }}"><h6 style="text-indent: 30px;">การโอนเงิน</h6></a>
                                <a class="px-0" href="{{ url('/dashboard/payment/paymentApprove') }}"><h6 style="text-indent: 30px;">ยืนยันการชำระเงิน</h6></a>
                                <a class="px-0" href="{{ url('/dashboard/payment/paymentCancel') }}"><h6 style="text-indent: 30px;">ยกเลิกการโอนเงิน</h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- endnew --}}


    <!-- Sidebar Toggle (Topbar) -->
    {{-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button> --}}

    <!-- Topbar Search -->
    <div class="col-xl-7 col-lg-5 col-md-5">
        <div class="sidebar-brand-icon rotate-n-15 d-none d-xl-block">
        </div>
        <div class="sidebar-brand-text bg d-none d-xl-block"><h4><b>Shopteenii<sup> service</sup></b></h4></div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-4">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            </div>
        </form>
    </div>

    <!-- Topbar Navbar -->
    <div class="col-xl-4 col-lg-4 col-md-4">
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                    </div>
                </div>
                </form>
            </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                </div>
                <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span> --}}
                {{-- <img class="img-profile rounded-circle" src="{{ asset('images/profiles/'.Auth::user()->profile_img) }}"> --}}
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
                </a>
                <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
                </a>
                <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
                </a>
            </div>
            </li>

        </ul>
    </div>

</nav>

