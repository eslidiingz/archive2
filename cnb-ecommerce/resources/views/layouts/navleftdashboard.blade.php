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
        color: #346751;
    }

    .btn-outline-pink {
        background-color: #346751;
        color: #fff;
        border: 1px solid #346751;
    }
</style>
<div class="col-12">
    <div class="sidenav" style='width:260px;'>
        <div class="row mb-4">
            <div class="col-12 text-center">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard" >
                    <div class="sidebar-brand-icon rotate-n-15">
                    </div>
                    <img src="/new_ui/img/logo/logo.svg?v=2" style="width: 180px;" class="pr-2" alt="">
                    {{-- <div class="sidebar-brand-text ">SIAM CANNABIS<sup> service</sup>
                    </div> --}}
                </a>
            </div>
        </div>

        <div class="col-12">
            <a href="/dashboard"><button class='btn-outline-pink btn form-control mb-3'><img
                        src="/new_ui/img/seller/icon_menu/dashboard.svg" style="width: 30px;" class="pr-2"
                        alt="">Dashboard</button></a>
        </div>

    @if (Auth::guard('admin')->user()->type != 'blog_editor')
        <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne">
                <strong class="text-purple">
                    <img src="/new_ui/img/seller/icon_menu/d_user_logo.svg" style="width: 30px;" class="pr-2"
                    alt="">ผู้ใช้งานและร้านค้า
                </strong>
            </div>
            <div id="collapseOne" class="collapse show">
                <div class="card-body py-0">
                    <a class="px-0 @if (Request::is('dashboard/manageUser')) menu-active @endif" href="{{ url('/dashboard/manageUser') }}">
                    <h6 style="text-indent: 12px;">จัดการข้อมูลผู้ใช้งานและร้านค้า</h6>
                    </a>
                    {{-- <a class="px-0 @if (Request::is('dashboard/kyc*')) menu-active @endif" href="{{ url('/dashboard/kyc') }}">
                        <h6 style="text-indent: 12px;">จัดการยืนยันตัวตนร้านค้า
                            @if($i_kyc_count)
                            <span class="badge-pill badge-danger ml-2" style="font-size: 11px;">{{$i_kyc_count}}</span>
                            @endif
                        </h6>
                    </a> --}}
                </div>
                <div class="card-body py-0">
                    <a class="px-0 @if( Request::is('dashboard/manageUser/productList') || Request::is('dashboard/manageUser/productList/*') || Request::is('dashboard/manageUser/product/*') ) menu-active @endif" href="{{ url('/dashboard/manageUser/productList') }}">
                        <h6 style="text-indent: 12px;">ระบบจัดการสินค้า<br><span
                                style="padding-left: 12px; font-size:14px; color:red;">(ฝ่ายขาย)</span></h6>
                    </a>
                </div>
            </div>
        </div>
        <!--div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne2">
                <strong class="text-purple">
                    <img src="/new_ui/img/seller/icon_menu/d_shop.svg" style="width: 30px;" class="pr-2" alt="">ร้านค้า
                </strong>
            </div>
            <div id="collapseOne2" class="collapse show">
                <div class="card-body py-0">
                    <a class="px-0 @if (Request::is('dashboard/manageShop')) menu-active @endif" href="{{ url('/dashboard/manageShop') }}">
                        <h6 style="text-indent: 12px;">ระบบจัดการร้านค้า<br><span style="padding-left: 12px; font-size:14px; color:red;">(ฝ่ายซัพพอร์ท)</span></h6>
                    </a>
                </div>
            </div>
        </div-->
        <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne3">
                <strong class="text-purple">
                    <img src="/new_ui/img/seller/icon_menu/d_shopping-bag.svg" style="width: 30px;" class="pr-2"
                        alt="">คำสั่งซื้อ
                </strong>
            </div>
            <div id="collapseOne3" class="collapse show">
                <div class="card-body py-0">
                    <a class="px-0 @if (Request::is('dashboard/ReportOrder')) menu-active @endif" href="{{ url('/dashboard/ReportOrder') }}">
                        <h6 style="text-indent: 12px;">รายงานคำสั่งซื้อ
                            @if($i_report_order_cnt)
                            <span class="badge-pill badge-danger ml-2" style="font-size: 11px;">{{$i_report_order_cnt}}</span>
                            @endif<br><span style="padding-left: 12px; font-size:14px; color:red;">(ฝ่ายขาย)</span></h6>
                    </a>
                    <a class="px-0 @if (Request::is('dashboard/orderCancel')) menu-active @endif" href="{{ url('/dashboard/orderCancel') }}">
                        <h6 style="text-indent: 12px;   ">ยกเลิกคำสั่งซื้อร้านค้า
                            @if($i_cancel_by_shop_cnt)
                            <span class="badge-pill badge-danger ml-2" style="font-size: 11px;">{{$i_cancel_by_shop_cnt}}</span>
                            @endif <br><span style="padding-left: 12px; font-size:14px; color:red;">(ฝ่ายซัพพอร์ท)</span></h6>
                    </a>
                    <a class="px-0 @if (Request::is('dashboard/orderCancelCustomer')) menu-active @endif" href="{{ url('/dashboard/orderCancelCustomer') }}">
                        <h6 style="text-indent: 12px;   ">ยกเลิกคำสั่งซื้อลูกค้า
                        @if($i_cancel_by_cust_cnt)
                            <span class="badge-pill badge-danger ml-2" style="font-size: 11px;">{{$i_cancel_by_cust_cnt}}</span>
                        @endif <br><span style="padding-left: 12px; font-size:14px; color:red;">(ฝ่ายซัพพอร์ท)</span></h6>
                    </a>
                </div>
            </div>
        </div>
       <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne4">
                <strong class="text-purple">
                    <img src="/new_ui/img/seller/icon_menu/d_wallet.svg" style="width: 30px;" class="pr-2"
                        alt="">การเงิน
                </strong>
            </div>
            <div id="collapseOne4" class="collapse show">
                <div class="card-body py-0">
                    <!-- <a class="px-0" href="{{ url('/dashboard/payment') }}">
                        <h6 style="text-indent: 30px;">ระบบการเงินทั้งหมด</h6>
                    </a> -->
                    <a class="px-0 @if (Request::is('dashboard/withdraw')) menu-active @endif" href="/dashboard/withdraw">
                        <h6 style="text-indent: 12px;">ร้านค้าขอถอนเงิน
                            @if($i_withdraw_payment_cnt)
                                <span class="badge-pill badge-danger ml-2" style="font-size: 11px;">{{$i_withdraw_payment_cnt}}</span>
                            @endif<br><span style="padding-left: 12px; font-size:14px; color:red;">(ฝ่ายการเงิน)</span></h6>
                    </a>
                    <!-- <a class="px-0" href="/dashboard/walletCancel">
                        <h6 style="padding-left:30px;">การคืนเงินWallet <br><span
                                style="font-size:14px; color:red;">(ฝ่ายการเงิน)</span></h6>
                    </a> -->
                    <a class="px-0 @if (Request::is('dashboard/payment/paymentApprove')) menu-active @endif" href="{{ url('/dashboard/payment/paymentApprove') }}">
                        <h6 style="text-indent:12px;">ยืนยันการโอนเงินซื้อสินค้า
                            @if($i_approve_transfer_cnt)
                                <span class="badge-pill badge-danger ml-2" style="font-size: 11px;">{{$i_approve_transfer_cnt}}</span>
                            @endif <br><span style="padding-left:12px; font-size:14px;color:red;">(ฝ่ายการเงิน)</span></h6>
                    </a>
                    <!-- <a class="px-0" href="{{ url('/dashboard/payment/walletApprove') }}">
                        <h6 style="padding-left:30px">ยืนยันการโอนเงินWallet <br><span
                                style="font-size:14px; color:red;">(ฝ่ายการเงิน)</span></h6>
                    </a> -->
                    <a class="px-0 @if (Request::is('dashboard/payment/transacion')) menu-active @endif" href="{{ url('/dashboard/payment/transacion') }}">
                        <h6 style="text-indent: 12px;">ประวัติธุรกรรมการเงิน<br><span style="padding-left: 12px; font-size:14px; color:red;">(ฝ่ายการเงิน)</span></h6>
                    </a>
                    <a class="px-0 @if (Request::is('dashboard/income')) menu-active @endif" href="{{ url('/dashboard/income') }}">
                        <h6 style="text-indent: 12px;">รายงานรายได้ส่วนกลางและสาขา<br><span style="padding-left: 12px; font-size:14px; color:red;">(ฝ่ายการเงิน)</span></h6>
                    </a>
                </div>
            </div>
        </div>
    @endif

        {{-- <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne6">
                <strong class="text-purple">
                    <i class="far fa-newspaper" style="font-size: 20px;"></i> ข่าวสาร/หมวดหมู่
                </strong>
            </div>
            <div id="collapseOne6" class="collapse show">
                <div class="card-body py-0">
                    <a class="px-0 @if (Request::is('dashboard/news/*') || Request::is('dashboard/news')) menu-active @endif" href="{{ url('/dashboard/news') }}">
                        <h6 style="text-indent: 12px;">ระบบจัดการข่าวสาร</h6>
                    </a>
                    <a class="px-0 @if (Request::is('dashboard/news-categories*')) menu-active @endif" href="{{ url('/dashboard/news-categories') }}">
                        <h6 style="text-indent: 12px;">ระบบจัดการหมวดหมู่</h6>
                    </a>
                </div>
            </div>
        </div> --}}
    {{-- @if (Auth::guard('admin')->user()->type != 'blog_editor') --}}
        {{-- <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne7">
                <strong class="text-purple">
                    <i class="fas fa-images" style="font-size: 20px;"></i> รูปโฆษณา
                </strong>
            </div>
            <div id="collapseOne7" class="collapse show">
                <div class="card-body py-0">
                    <a class="px-0 @if (Request::is('dashboard/banner*')) menu-active @endif" href="/dashboard/banner">
                        <h6 style="text-indent: 12px;">ระบบจัดการรูปโฆษณา</h6>
                    </a>
                    <a class="px-0" href="#">
                        <h6 style="text-indent: 30px;">เปลี่ยนรหัสผ่าน</h6>
                    </a>
                </div>
            </div>
        </div> --}}
        {{-- <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne8">
                <strong class="text-purple">
                    <i class="fas fa-images" style="font-size: 20px;"></i> จัดการ Code เปิดร้านค้า
                </strong>
            </div>
            <div id="collapseOne8" class="collapse show">
                <div class="card-body py-0">
                    <a class="px-0 @if (Request::is('dashboard/codeOpenShop*')) menu-active @endif" href="/dashboard/codeOpenShop">
                        <h6 style="text-indent: 12px;">จัดการ Code เปิดร้านค้า</h6>
                    </a>
                    <a class="px-0" href="#">
                        <h6 style="text-indent: 30px;">เปลี่ยนรหัสผ่าน</h6>
                    </a>
                </div>
            </div>
        </div> --}}
    {{-- @endif --}}
    @if (Auth::guard('admin')->user()->type == 'superadmin')
        <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne5">
                <strong class="text-purple">
                    <img src="/new_ui/img/seller/icon_menu/d_settings.svg" style="width: 30px;" class="pr-2"
                        alt="">การตั้งค่าระบบ
                </strong>
            </div>
            <div id="collapseOne5" class="collapse show">
                <div class="card-body py-0">
                    <a class="px-0 @if (Request::is('dashboard/setting*')) menu-active @endif" href="/dashboard/setting/edit">
                        <h6 style="text-indent: 12px;">ตั้งค่าระบบ</h6>
                    </a>
                    <!-- <a class="px-0" href="#">
                        <h6 style="text-indent: 30px;">เปลี่ยนรหัสผ่าน</h6>
                    </a> -->
                </div>
            </div>
        </div>
        <div class="card" style="border: none;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                href="#collapseOne5">
                <strong class="text-purple">
                    <img src="/new_ui/img/seller/icon_menu/d_settings.svg" style="width: 30px;" class="pr-2"
                        alt="">การตั้งค่าบัญชี
                </strong>
            </div>
            <div id="collapseOne5" class="collapse show">
                <div class="card-body py-0">
                    <a class="px-0 @if (Request::is('dashboard/admin*')) menu-active @endif" href="/dashboard/admin">
                        <h6 style="text-indent: 12px;">ระบบจัดการแอดมิน</h6>
                    </a>
                    <!-- <a class="px-0" href="#">
                        <h6 style="text-indent: 30px;">เปลี่ยนรหัสผ่าน</h6>
                    </a> -->
                </div>
            </div>
        </div>
    @endif
        {{-- <div class="col-12 ">
            <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center"
                    style="cursor:pointer; border: none; background-color: unset;">
                    <strong class="text-dark">
                        <img src="/new_ui/img/seller/icon_menu/icon_menu_2.svg" style="width: 30px;" class="pr-2"
                            alt="">Dashboard
                    </strong>
                </div>
                <div class="card-body py-0">
                    <a class="px-0" href="{{ url('/dashboard/manageUser') }}">
        <h6 style="text-indent: 30px;">ระบบจัดการ User</h6>
        </a>
        <a class="px-0" href="{{ url('/dashboard/ReportOrder') }}">
            <h6 style="text-indent: 30px;">รายงานคำสั่งซื้อ</h6>
        </a>
        <a class="px-0" href="{{ url('/dashboard/orderCancel') }}">
            <h6 style="text-indent: 30px;">รายงานการพิจารณาคำสั่งซื้อ</h6>
        </a>
        <a class="px-0" href="{{ url('/dashboard/influencer') }}">
            <h6 style="text-indent: 30px;">ผู้แนะนำร้านค้า</h6>
        </a>
        <a class="px-0" href="#">
            <h6 style="text-indent: 30px;">ระบบ chat</h6>
        </a>
        <a class="px-0" href="{{ url('/dashboard/cancelproduct') }}">
            <h6 style="text-indent: 30px;">รายงานการยกเลิกสินค้า</h6>
        </a>
    </div>
</div>
<div class="card" style="border: none;">
    <div class="card-header d-flex justify-content-between align-items-center"
        style="cursor:pointer; border: none; background-color: unset;">
        <strong class="text-dark">
            <img src="/new_ui/img/seller/icon_menu/icon_menu_3.svg" style="width: 30px;" class="pr-2"
                alt="">รายงานการเงิน
        </strong>
    </div>
    <div class="card-body py-0">
        <a class="px-0" href="{{ url('/dashboard/payment') }}">
            <h6 style="text-indent: 30px;">การโอนเงิน</h6>
        </a>
        <a class="px-0" href="{{ url('/dashboard/payment/paymentApprove') }}">
            <h6 style="text-indent: 30px;">ยืนยันการชำระเงิน</h6>
        </a>
        <a class="px-0" href="{{ url('/dashboard/payment/paymentCancel') }}">
            <h6 style="text-indent: 30px;">ยกเลิกการโอนเงิน</h6>
        </a>
    </div>
</div>
</div> --}}

<div class="col-12 pb-3 pt-4">
    <a href="/dashboard/logout" style='padding: 0px;color: #333;font-size: unset;'>
        <strong class="text-purple">
            <img src="/new_ui/img/seller/icon_menu/d_logout_logo.svg" style="width: 30px;height: 30px;" class=""
                alt=""> ออกจากระบบ
        </strong></a>
    {{-- <a href="/dashboard/logout"><img src="/new_ui/img/menu/d_logout_logo.png"
                    width="23;" alt=""> <strong class="text-dark">
                    <h6 style="text-indent: 30px;">ออกจากระบบ</h6>
                </strong></a> --}}
</div>


</div>
</div>

@section('script')
<script>
    $('.collapse').on('show.bs.collapse', function() {
            // alert('show');
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
@endsection
