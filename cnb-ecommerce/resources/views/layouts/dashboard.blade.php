<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style='background:#d6d6d6'>

<head>

    @include('includes._head')
    @yield('style')


    {{-- <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    {{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    {{--
    <link rel="icon" type="image/jpg" href="{{ asset('images/t10.jpg') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="/new_ui/css/style.css?v=5">
	<link rel="stylesheet" href="/new_ui/css/table-responsive.css">
	<link rel="stylesheet" href="/css/ated-custom-phorn.css">
	<link rel="stylesheet" href="/css/ated-custom-gia.css">
	<link rel="stylesheet" href="/css/ated-custom-meji.css">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script> --}}

</head>

<body class="">


    <!-- Page Wrapper -->
    <div id="wrapper" style='background:#efefef'>
        <div class="container-fluid px-0">

            {{-- navbar --}}
            <nav class="navbar navbar-expand-lg bg-light navbar-light d-lg-none d-md-block d-block sticky-top shadow">
                <div class="row">
                    <div class="col-4">
                        <img src="/new_ui/img/logo/logo.svg" style="width: 120px;" class="pr-2" alt="">
                    </div>
                    <div class="col-8 d-flex align-items-center justify-content-end">
                        <h3 class="mb-0"><i class="fa fa-bars" aria-hidden="true" data-toggle="drawer"
                                data-target="#drawer-1"></i></h3 class="mb-0">
                    </div>
                </div>

                <div class="drawer drawer-left slide" tabindex="-1" role="dialog" aria-labelledby="drawer-1-title"
                    aria-hidden="true" id="drawer-1">
                    <div class="drawer-content drawer-content-scrollable" role="document">
                        <div class="drawer-header">
                            <img src="/new_ui/img/logo/logo.svg" style="width: 120px;" class="pr-2"
                                alt="">
                        </div>
                        <div class="drawer-body">
                        @if (Auth::guard('admin')->user()->type != 'blog_editor')
                            <div class="card" style="border: none;">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" href="#collapseOne">
                                    <strong class="text-purple">
                                        <img src="/new_ui/img/seller/icon_menu/d_user_logo.svg" style="width: 30px;"
                                            class="pr-2" alt="">User
                                    </strong>
                                </div>
                                <div id="collapseOne" class="collapse show">
                                    <div class="card-body py-0">
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/manageUser') }}">
                                            <h6 style="text-indent: 30px;">Mange User</h6>
                                        </a>
                                    </div>
                                    <!-- <div class="card-body py-0">
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/manageUser') }}">
                                            <h6 style="text-indent: 30px;">ระงับผู้ใช้งาน</h6>
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="card" style="border: none;">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" href="#collapseOne2">
                                    <strong class="text-purple">
                                        <img src="/new_ui/img/seller/icon_menu/d_shop.svg" style="width: 30px;"
                                            class="pr-2" alt="">Shop
                                    </strong>
                                </div>
                                <div id="collapseOne2" class="collapse show">
                                    <div class="card-body py-0">
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/flash_sale') }}">
                                            <h6 style="text-indent: 30px;">Manage Shop / Product</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border: none;">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" href="#collapseOne3">
                                    <strong class="text-purple">
                                        <img src="/new_ui/img/seller/icon_menu/d_shopping-bag.svg" style="width: 30px;"
                                            class="pr-2" alt="">Order
                                    </strong>
                                </div>
                                <div id="collapseOne3" class="collapse show">
                                    <div class="card-body py-0">
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/ReportOrder') }}">
                                            <h6 style="text-indent: 30px;">Report Order</h6>
                                        </a>
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/orderCancel') }}">
                                            <h6 style="text-indent: 30px;">Cancel shop order</h6>
                                        </a>
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/orderCancelCustomer') }}">
                                            <h6 style="text-indent: 30px;">Cancel customer order</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border: none;">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" href="#collapseOne4">
                                    <strong class="text-purple">
                                        <img src="/new_ui/img/seller/icon_menu/d_wallet.svg" style="width: 30px;"
                                            class="pr-2" alt="">Finance
                                    </strong>
                                </div>
                                <div id="collapseOne4" class="collapse show">
                                    <div class="card-body py-0">
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="/dashboard/withdraw">
                                            <h6 style="text-indent: 30px;">Withdrawal</h6>
                                        </a>
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/payment/paymentApprove') }}">
                                            <h6 style="text-indent: 30px;">ยืนยันการโอนเงินซื้อสินค้า Comfirm transfer of purchases</h6>
                                        </a>
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/payment/transacion') }}">
                                            <h6 style="text-indent: 30px;">Financial history</h6>
                                        </a>
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/income') }}">
                                            <h6 style="text-indent: 30px;">Report income</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                            <div class="card" style="border: none;">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" href="#collapseOne4">
                                    <strong class="text-purple">
                                        <i class="far fa-newspaper" style="font-size: 20px;"></i>ข่าวสาร/หมวดหมู่
                                    </strong>
                                </div>
                                <div id="collapseOne4" class="collapse show">
                                    <div class="card-body py-0">
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="/dashboard/news">
                                            <h6 style="text-indent: 30px;">ระบบจัดการข่าวสาร</h6>
                                        </a>
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="{{ url('/dashboard/news-categories') }}">
                                            <h6 style="text-indent: 30px;">ระบบจัดการหมวดหมู่</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @if (Auth::guard('admin')->user()->type != 'blog_editor')
                            <div class="card" style="border: none;">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" href="#collapseOne4">
                                    <strong class="text-purple">
                                        <i class="fas fa-images" style="font-size: 20px;"></i>รูปโฆษณา
                                    </strong>
                                </div>
                                <div id="collapseOne4" class="collapse show">
                                    <div class="card-body py-0">
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="/dashboard/banner">
                                            <h6 style="text-indent: 30px;">ระบบจัดการรูปโฆษณา</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border: none;">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" href="#collapseOne4">
                                    <strong class="text-purple">
                                        <i class="fas fa-images" style="font-size: 20px;"></i>จัดการ Code เปิดร้านค้า
                                    </strong>
                                </div>
                                <div id="collapseOne4" class="collapse show">
                                    <div class="card-body py-0">
                                        <a class="px-0" style="color: #818181 !important;"
                                            href="/dashboard/codeOpenShop">
                                            <h6 style="text-indent: 30px;">จัดการ Code เปิดร้านค้า</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border: none;">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                    style="cursor:pointer; border: none; background-color: unset;"
                                    data-toggle="collapse" href="#collapseOne5">
                                    <strong class="text-purple">
                                        <img src="/new_ui/img/seller/icon_menu/d_settings.svg" style="width: 30px;"
                                            class="pr-2" alt="">การตั้งค่าบัญชี
                                    </strong>
                                </div>
                                <div id="collapseOne5" class="collapse show">
                                    <div class="card-body py-0">
                                        <a class="px-0" style="color: #818181 !important;" href="/dashboard/admin">
                                            <h6 style="text-indent: 30px;">ระบบจัดการแอดมิน</h6>
                                        </a>
                                        <!-- <a class="px-0" style="color: #818181 !important;" href="#">
                                            <h6 style="text-indent: 30px;">เปลี่ยนรหัสผ่าน</h6>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        @endif
                        </div>
                        <div class="drawer-footer">
                            <div class="col-12 ">
                                <a href="/dashboard/logout" style='padding: 0px;color: #000;font-size: unset;'
                                    class='pt-4'>
                                    <strong class="text-purple">
                                        <img src="/new_ui/img/seller/icon_menu/d_logout_logo.svg"
                                            style="width: 30px;height: 30px;" class="" alt="">ออกจากระบบ
                                    </strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne">
                <strong class="text-purple">
                    <img src="/new_ui/img/seller/icon_menu/d_user_logo.svg" style="width: 30px;" class="pr-2"
                        alt="">User
                </strong>
            </div>
            <div id="collapseOne" class="collapse show">
                <div class="card-body py-0">
                    <a class="px-0" style="color: #818181 !important;" href="{{ url('/dashboard/manageUser') }}">
                <h6 style="text-indent: 30px;">ระบบจัดการผู้ใช้งาน</h6>
                </a>
        </div>
    </div>
    </div>
    <div class="card" style="border: none;">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseOne2">
            <strong class="text-purple">
                <img src="/new_ui/img/seller/icon_menu/d_shop.svg" style="width: 30px;" class="pr-2" alt="">ร้านค้า
            </strong>
        </div>
        <div id="collapseOne2" class="collapse show">
            <div class="card-body py-0">
                <a class="px-0" style="color: #818181 !important;" href="#">
                    <h6 style="text-indent: 30px;">ระบบจัดการร้านค้า/สินค้า</h6>
                </a>
                <a class="px-0" style="color: #818181 !important;" href="{{ url('/dashboard/influencer') }}">
                    <h6 style="text-indent: 30px;">ผู้แนะนำร้านค้า</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="card" style="border: none;">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseOne3">
            <strong class="text-purple">
                <img src="/new_ui/img/seller/icon_menu/d_shopping-bag.svg" style="width: 30px;" class="pr-2"
                    alt="">คำสั่งซื้อ
            </strong>
        </div>
        <div id="collapseOne3" class="collapse show">
            <div class="card-body py-0">
                <a class="px-0" style="color: #818181 !important;" href="{{ url('/dashboard/ReportOrder') }}">
                    <h6 style="text-indent: 30px;">รายงานคำสั่งซื้อ</h6>
                </a>
                <a class="px-0" style="color: #818181 !important;" href="{{ url('/dashboard/orderCancel') }}">
                    <h6 style="text-indent: 30px;">รายงานพิจารณาคำสั่งซื้อ</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="card" style="border: none;">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseOne4">
            <strong class="text-purple">
                <img src="/new_ui/img/seller/icon_menu/d_wallet.svg" style="width: 30px;" class="pr-2" alt="">การเงิน
            </strong>
        </div>
        <div id="collapseOne4" class="collapse show">
            <div class="card-body py-0">
                <a class="px-0" style="color: #818181 !important;" href="{{ url('/dashboard/payment') }}">
                    <h6 style="text-indent: 30px;">ระบบการเงินทั้งหมด</h6>
                </a>
                <a class="px-0" style="color: #818181 !important;" href="/dashboard/withdraw">
                    <h6 style="text-indent: 30px;">การถอนเงิน</h6>
                </a>
                <a class="px-0" style="color: #818181 !important;" href="/dashboard/walletCancel">
                    <h6 style="text-indent: 30px;">การคืนเงินWallet</h6>
                </a>
                <a class="px-0" style="color: #818181 !important;"
                    href="{{ url('/dashboard/payment/paymentApprove') }}">
                    <h6 style="text-indent: 30px;">ยืนยันการโอนเงิน</h6>
                </a>
                <a class="px-0" style="color: #818181 !important;" href="{{ url('/dashboard/payment/walletApprove') }}">
                    <h6 style="text-indent: 30px;">ยืนยันการโอนเงิน Wallet</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="card" style="border: none;">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseOne5">
            <strong class="text-purple">
                <img src="/new_ui/img/seller/icon_menu/d_settings.svg" style="width: 30px;" class="pr-2"
                    alt="">การตั้งค่าบัญชี
            </strong>
        </div>
        <div id="collapseOne5" class="collapse show">
            <div class="card-body py-0">
                <a class="px-0" style="color: #818181 !important;" href="/dashboard/admin">
                    <h6 style="text-indent: 30px;">ระบบจัดการแอดมิน</h6>
                </a>
                <a class="px-0" style="color: #818181 !important;" href="#">
                    <h6 style="text-indent: 30px;">เปลี่ยนรหัสผ่าน</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 ">
        <a href="/dashboard/logout" style='padding: 0px;color: #c45e9f;font-size: unset;' class='pt-4'>
            <strong class="text-purple">
                <img src="/new_ui/img/seller/icon_menu/d_logout_logo.svg" style="width: 30px;height: 30px;" class=""
                    alt="">ออกจากระบบ
            </strong></a>
    </div>
    </div> --}}
    </nav>






    <!-- Sidebar -->
    <div class="row mx-0">
        <div class="col-lg-2 col-md-12 col-12 d-lg-block d-md-none d-none">
            <div class="d-lg-block d-md-none d-none">
                @include('layouts.navleftdashboard')
                {{-- @include('includes._menu_left_dashboard') --}}
            </div>
        </div>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div class="main">
            <div class="col-xl-12 col-12 px-0" style="height: 100vh;">
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content" style="background: #efefef;">

                        <!-- Topbar -->
                        {{-- @include('layouts.navtopdashboard')
                        --}}
                        <!-- End of Topbar -->

                        <!-- Begin Page Content -->
                        <div class="container-fluid my-5 pr-4">
                            @yield('content')
                        </div>
                        <!-- /.container-fluid -->

                        <!-- Footer -->

                        {{-- <div class="d-none d-lg-block">
                            @include('layouts.footerdashboard')
                        </div> --}}
                        <!-- End of Footer -->

                    </div>
                    <!-- End of Footer -->

                </div>
            </div>
            <!-- End of Content Wrapper -->
        </div>
    </div>
    </div>
    <!-- End of Content Wrapper -->
    </div>
    </div>

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Ready to Leave?</h6>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {{-- <a class="btn btn-primary" href="{{ route('logout') }}"
                    --}} <a class="btn btn-primary" href="#logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                    <form id="logout-form" action="#logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @yield('script')


</body>

</html>

<style>
    .main {
        margin-left: 280px;
        width: calc(100% - 280px)
    }

    @media only screen and (max-width: 1024px) {
        .main {
            margin-left: 0px;
            width: 100%
        }
    }
</style>
