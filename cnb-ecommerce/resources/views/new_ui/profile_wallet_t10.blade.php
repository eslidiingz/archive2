@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .title_posit {
        text-align: left;
    }

    .o-btn-purple {
        border-radius: 8px;
        background-color: #f8eaf3;
        padding: 10px;
        color: #c75ba1;
        border: 0px;
        width: 100px;
    }

    .o-btn {
        border-radius: 8px;
        background-color: #226fff;
        padding: 10px;
        color: white;
        border: 0px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
    }

    .o-btn2 {
        border-radius: 8px;
        background-color: #f8eaf3;
        padding: 10px;
        color: #c75ba1;
        border: 0px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
    }

    .o-bg-box {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.16);
    }

    .img-res {
        width: 20px;
    }

    .card_res {
        width: 30px;
    }

    .text-res {
        font-size: 12px;
    }

    @media (min-width: 768px) {
        .title_posit {
            text-align: left;
        }
    }

    .round {
        position: relative;
    }

    .round label {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 50%;
        cursor: pointer;
        height: 28px;
        left: 0;
        position: absolute;
        top: 0;
        width: 28px;
    }

    .round label:after {
        border: 2px solid #fff;
        border-top: none;
        border-right: none;
        content: "";
        height: 6px;
        left: 7px;
        opacity: 0;
        position: absolute;
        top: 8px;
        transform: rotate(-45deg);
        width: 12px;
    }

    .round input[type="checkbox"] {
        visibility: hidden;
    }

    .round input[type="checkbox"]:checked+label {
        background-color: #66bb6a;
        border-color: #66bb6a;
    }

    .round input[type="checkbox"]:checked+label:after {
        opacity: 1;
    }

    .inside-md {
        background-color: white;
        border-radius: 6px;
        box-shadow: 0 2px 9px 0 rgba(146, 146, 146, 0.26);
    }

    .bt-wb {
        border-radius: 6px;
        background-color: white;
        color: #1947e3;
        border: #1947e3 1px solid;
        width: 30px;
    }

    .abs-baht {
        position: absolute;
        left: 25px;
        top: 20px;
    }

    .modal {
        overflow: auto !important;
    }
</style>
@endsection

@section('content')
    <div class="container">
                        <div class="col-12 pb-4 px-0 d-flex flex-row">
                            <div class="col-3 d-xl-block d-lg-none d-md-none d-none px-0">
                                @include('new_ui._menu_left_user_profile')
                            </div>
                            <div class="col-xl-9 col-lg-12 col-md-12 col-12 pt-4 px-0">
                                <div class="col-12 px-1 py-3" style='border-bottom: 1px solid #d9d9d9;'>
                                    <div class='row'>
                                        <div class=' col-lg-6 col-md-6 col-12'>
                                            <h3><strong>วอลเลต T10</strong></h3>
                                        {{-- <h3><strong>{{ $t10 }}</strong></h3> --}}

                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12" style='text-align : right;'>
                                            <button class="o-btn" data-toggle="modal" data-target="#topup-wallet">+ เติมเงินวอลเลต</button>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12" style='text-align : right;'>
                                            <button class="o-btn2" data-toggle="modal" data-target="#">
                                                <img src='new_ui/img/re-money.svg' style='width:15px;'>
                                                ถอนเงิน</button>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-12 col-12 px-0'>
                                    <div class='col-lg-12 col-md-12 col-12 px-0 mt-4 o-bg-box'>
                                        <div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 py-4">
                                                <div class="col-lg-12 px-0" style='border-bottom: #d9d9d9 1px solid;'>
                                                    <div class='col-12 px-0' style='color:#c45e9f'>
                                                        <strong>ยอดเงินที่ใช้ได้</strong>
                                                    </div>
                                                    <div class='col-12 px-0'>
                                                        <h1><strong>฿450.67</strong></h1>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-2 col-md-2 col-4 mt-2' style='border-right: #d9d9d9 1px solid;'>
                                                        <div class='col-12 px-0' style='text-align:center;color:#c45e9f'>
                                                            <strong>พอยท์</strong>
                                                        </div>
                                                        <div class='d-flex flex-row'>
                                                            <div class='px-0 col-6' style='text-align:right'>
                                                                <h2><strong>53</strong></h2>
                                                            </div>
                                                            <div class='px-0 col-6 pt-1 px-1'>
                                                                <img src='new_ui/img/bank/cp.png' style='width:20px;'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-2 col-md-2 col-4 mt-2' style='border-right: #d9d9d9 1px solid;'>
                                                        <div class='col-12 px-0' style='text-align:center;color:#c45e9f'>
                                                            <strong>เหรียญ</strong>
                                                        </div>
                                                        <div class='d-flex flex-row'>
                                                            <div class='px-0 col-6' style='text-align:right'>
                                                                <h2><strong>70</strong></h2>
                                                            </div>
                                                            <div class='px-0 col-6 pt-1 px-1'>
                                                                <img src='new_ui/img/bank/pp.png' style='width:20px;'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-2 col-md-2 col-4 mt-2' style='border-right: #d9d9d9 1px solid;'>
                                                        <div class='col-12 px-0' style='text-align:center;color:#c45e9f'>
                                                            <strong>เงินคืน</strong>
                                                        </div>
                                                        <div class='d-flex flex-row'>
                                                            <div class='px-0 col-12' style='text-align:center'>
                                                                <h2><strong>฿200</strong></h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 pt-4 px-0">
                                    <div class="d-lg-block d-md-block d-none">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist" style='background-color : white '>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="true">ประวัติการใช้ทั้งหมด</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab" aria-controls="list-2" aria-selected="false">ได้รับ</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab" aria-controls="list-3" aria-selected="false">ใช้ในการชำระ</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group d-lg-none d-md-none d-block">
                                        <select class="form-control" id="select-submenu">
                                            <option value="1">ประวัติการใช้ทั้งหมด</option>
                                            <option value="2">ได้รับ</option>
                                            <option value="3">ใช้ในการชำระ</option>
                                        </select>
                                    </div>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
                                            @include('new_ui.user_seller.user-list-all')
                                        </div>
                                        <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
                                            @include('new_ui.user_seller.user-list-all2')
                                        </div>
                                        <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-tab">
                                            @include('new_ui.user_seller.user-list-all3')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    </div>
@endsection
@section('script')
<script>
    function add_new_topup() {
        $('#topup-wallet').modal('hide');
        $('#new-topup-wallet').modal('show');
    }

    function waiting_modal() {
        $('#topup-wallet').modal('hide');
        $('#waiting-topup-wallet').modal('show');
    }

    function otp_modal() {
        $('#waiting-topup-wallet').modal('hide');
        $('#otp-topup-wallet').modal('show');
    }

    function success_modal() {
        $('#otp-topup-wallet').modal('hide');
        $('#success-topup-wallet').modal('show');
    }

    $('.o-bank-hover').hover(function() {
        $('.hover').fadeIn(1000);
    }, function() {
        $('.hover').fadeOut(1000);
    });

    $('#select-submenu').on('change', function() {
        value = $(this).val();
        $('a.nav-link[href="#list-' + value + '"]').click();
    });
</script>
@endsection




<!-- Modal -->
    <div class="modal fade px-0" id="topup-wallet" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #ededed;">
                <div class="modal-header">
                    <div class='col-11' style='text-align:center'>
                        <strong>
                            <h4>เติมเงินวอลเล็ต</h4>
                        </strong>
                    </div>
                    <div class='col-1' style='text-align:right'>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-12 mb-3 ">
                        <strong> จำนวนเงินที่ต้องการเติม <a style='color : #b2b2b2'>(ขั้นต่ำ ฿100 )</a></strong>
                    </div>
                    <div class="col-12 mb-3 inside-md">
                        <div class='py-3'>
                            <span class='abs-baht'>
                                <strong>฿</strong>
                            </span>
                            <input type="search" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="จำนวนเงิน" style="background-color: #ededed; border: none; padding-left:25px;">
                        </div>
                    </div>
                    <div class="col-12 mb-3 ">
                        <strong>ช่องทางการชำระเงิน</strong>
                    </div>
                    <div class="col-12 mb-3 inside-md px-0">
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='px-3'>
                                <strong>บัตรเครดิต/บัตรเดบิต</strong><img src='new_ui/img/bank/sec-modal.png'>
                            </div>
                        </div>
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='px-3'>
                                <div class='d-flex'>
                                    <div class='col-2'>
                                        <img src='new_ui/img/bank/visa.png' style='width:40px;'>
                                    </div>
                                    <div class='col-5'>
                                        <strong>ธนาคารกสิกรไทย</strong>
                                    </div>
                                    <div class='col-5' style='color:#b2b2b2'>
                                        <strong>* 6702</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='px-3'>
                                <div class='d-flex'>
                                    <div class='col-2'>
                                        <img src='new_ui/img/bank/master.jpg' style='width:40px;'>
                                    </div>
                                    <div class='col-5'>
                                        <strong>ธนาคารไทยพาณิชย์</strong>
                                    </div>
                                    <div class='col-5' style='color:#b2b2b2'>
                                        <strong>* 5116</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='py-3' style='border-bottom : #ededed 1px solid' onclick="add_new_topup()">
                            <div class='px-3'>
                                <div class='d-flex'>
                                    <div class='col-2'>
                                        <button class='bt-wb'><strong> + </strong></button>
                                    </div>
                                    <div class='col-10' style='color:#1947e3'>
                                        <strong>เพิ่มบัตรเดบิต / เครดิต</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3 ">
                        <strong>โมบายแบงค์กิ้ง/การโอนเงิน</strong>
                        <p>
                            กรุณาทำการชำระเงินผ่านโมบายแบงค์กิ้งหรือเอทีเอ็ม
                            ภายใน 48 ชม. มิเช่นนั้นคำร้องของคุณจะถูกยกเลิก
                            อัตโนมัติ
                        </p>
                    </div>
                    <div class="col-12 mb-3 inside-md px-0">
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='px-3'>
                                <div class='d-flex'>
                                    <div class='col-lg-2'>
                                        <img src='new_ui/img/bank/bank03.png' style='width:40px;'>
                                    </div>
                                    <div class='col-lg-10'>
                                        <strong>ธนาคารกรุงเทพ</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='px-3'>
                                <div class='d-flex'>
                                    <div class='col-lg-2'>
                                        <img src='new_ui/img/bank/bank04.png' style='width:40px;'>
                                    </div>
                                    <div class='col-lg-10'>
                                        <strong>ธนาคารกรุงไทย</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='px-3'>
                                <div class='d-flex'>
                                    <div class='col-lg-2'>
                                        <img src='new_ui/img/bank/bank01.png' style='width:40px;'>
                                    </div>
                                    <div class='col-lg-10'>
                                        <strong>ธนาคารกสิกรไทย</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='px-3'>
                                <div class='d-flex'>
                                    <div class='col-lg-2'>
                                        <img src='new_ui/img/bank/bank02.png' style='width:40px;'>
                                    </div>
                                    <div class='col-lg-10'>
                                        <strong>ธนาคารไทยพาณิชย์</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3 ">
                    <div class='row'>
                        <div class="col-12 mb-3 text-center">
                            <button class="btn form-control text-white rounded8px" onclick="waiting_modal()" style="background-color: #c75ba1;">ถัดไป</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->

    <!-- Modal New Topup -->
    <div class="modal fade px-0" id="new-topup-wallet" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #ededed;">
                <div class="modal-header">
                    <div class='col-11' style='text-align:center'>
                        <strong>
                            <h4>เติมเงินวอลเล็ต</h4>
                        </strong>
                    </div>
                    <div class='col-1' style='text-align:right'>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-12 mb-3 ">
                        <strong> จำนวนเงินที่ต้องการเติม <a style='color : #b2b2b2'>(ขั้นต่ำ ฿100 )</a></strong>
                    </div>
                    <div class="col-12 mb-3 inside-md">
                        <div class='py-3'>
                            <span class='abs-baht'>
                                <strong>฿</strong>
                            </span>
                            <input type="search" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="จำนวนเงิน" style="background-color: #ededed; border: none; padding-left:25px;">
                        </div>
                    </div>
                    <div class="col-12 mb-3 ">
                        <strong>เติมเงินด้วย บัตรเครดิต / เดรบิต</strong>
                    </div>
                    <div class="col-12 mb-3 inside-md px-0">
                        <div class='py-3'>
                            <div class='px-3'>
                                <img src="img/user_icon_menu/pay-method.png" style='width:150px;'>
                            </div>
                        </div>
                        <div class="col-12 mb-3 ">
                            <input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="หมายเลขบัตร" style="background-color: #ededed; border: none;">
                        </div>
                        <div class="col-12 mb-3 ">
                            <input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ชื่อที่ผูกกับบัตร" style="background-color: #ededed; border: none;">
                        </div>
                        <div class='d-flex'>
                            <div class="col-6 mb-3 ">
                                <input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="เดือนปีหมดอายุ" style="background-color: #ededed; border: none;">
                            </div>
                            <div class="col-6 mb-3 ">
                                <input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="CVV" style="background-color: #ededed; border: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3 pt-4">
                    <div class='row'>
                        <div class="col-12 mb-3 text-center">
                            <button class="btn form-control text-white rounded8px" style="background-color: #c75ba1;">ถัดไป</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal New Topup -->

    <!-- Modal Waiting process -->
    <div class="modal fade px-0" id="waiting-topup-wallet" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #ededed;">
                <div class="modal-header">
                    <div class='col-11' style='text-align:center'>
                        <strong>
                            <h4>เติมเงินวอลเล็ต</h4>
                        </strong>
                    </div>
                    <div class='col-1' style='text-align:right'>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-12 mb-3 inside-md">
                        <div class='py-3'>
                            <div class='col-12 px-0' style='text-align : center'>
                                <img src='new_ui/img/bank/waiting-icon.svg' style='width : 30px;'>
                                <p class='mb-0'><strong>กำลังรอชำระเงิน</strong></p>
                                <p class='mb-0'><strong>ผ่านโมบายแบงค์กิ้ง/การโอนเงิน</strong></p>
                                <p class='mb-0'>กรุณาทำการชำระเงินผ่านโมบายแบงค์กิ้งหรือเอทีเอ็ม
                                    <a style='text-decoration: underline;'>ภายใน 48 ชม.</a> มิเช่นนั้นคำร้องของคุณจะถูกยกเลิกอัตโนมัติ</p>
                                <img src='new_ui/img/bank/qrcode.png' style='width : 200px;'>
                                <p class='mb-0' style='color:#c40000'><strong>ควรชำระเงินก่อน 10/05/2563 เวลา 10:09</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3 inside-md">
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='d-flex'>
                                <div class='col-lg-1 col-1'>
                                    <img src='new_ui/img/bank/bank01.png' style='width:40px;'>
                                </div>
                                <div class='col-8'>
                                    <div class='col-12'>
                                        หมายเลขอ้างอิง ธนาคารกสิกรไทย
                                    </div>
                                    <div class='col-12'>
                                        <strong>1234567890</strong>
                                    </div>
                                </div>
                                <div class='col-lg-3' style='color:#c75ba1'>
                                    <strong>คัดลอก</strong>
                                </div>
                            </div>
                        </div>
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='d-flex'>
                                <div class='col-9'>
                                    หมายเลขคำร้อง <a><strong>1234567890123456</strong></a>
                                </div>
                                <div class='col-lg-3 pt-2' style='color:#c75ba1'>
                                    <strong>คัดลอก</strong>
                                </div>
                            </div>
                        </div>
                        <div class='py-3' style='border-bottom : #ededed 1px solid'>
                            <div class='d-flex'>
                                <div class='col-9'>
                                    จำนวนเงินที่ต้องการเติม
                                </div>
                                <div class='col-lg-3' style='color:#23c197'>
                                    <strong>฿ 100</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3 ">
                        <strong>ชำระเงินอย่างไร</strong>
                    </div>
                    <div class="col-12 mb-3 inside-md px-0">
                        <div class="card" style="border: none;">
                            <div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border-bottom: #ededed 1px solid; background-color: unset;" data-toggle="collapse" href="#showper1">
                                <strong>
                                    เอทีเอ็ม
                                </strong>
                                <div class="collapsedIcon">
                                    <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h2>
                                </div>
                            </div>
                            <div id="showper1" class="collapse show">
                                <div class="card-body py-2 px-0">
                                    <h6 style="padding-left : 20px;">1. เลือกจ่ายบิล / ชำระค่าบริการ</h6>
                                    <h6 style="padding-left : 20px;">2. เลือกอื่นๆ > รหัสบริษัท > ระบุรหัสบริษัท > ออมทรัพย์</h6>
                                    <h6 style="padding-left : 20px;">3. ใส่รหัสบริษัท 12345</h6>
                                    <h6 style="padding-left : 20px;">4. ระบุหมายเลขอ้างอิงการชำระเงินสำหรับ “REF1”</h6>
                                    <h6 style="padding-left : 20px;">5. ระบุหมายเลขโทรศัพท์มือถือ สำหรับ “REF2”</h6>
                                    <h6 style="padding-left : 20px;">6. ระบุยอดเงิน</h6>
                                    <h6 style="padding-left : 20px;">7. หมายเหตุ : ค่าธรรมเนียมขึ้นกับธนาคา หรือ ผู้ให้บริการ</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3 inside-md px-0">
                        <div class="card" style="border: none;">
                            <div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border-bottom: #ededed 1px solid; background-color: unset;" data-toggle="collapse" href="#showper2">
                                <strong>
                                    โมบายแบงค์กิ้ง
                                </strong>
                                <div class="collapsedIcon">
                                    <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h2>
                                </div>
                            </div>
                            <div id="showper2" class="collapse show">
                                <div class="card-body py-2 px-0">
                                    <h6 style="padding-left : 20px;">1. ล็อกอินเข้าระบบ K Plus</h6>
                                    <h6 style="padding-left : 20px;">2. เลือกเมนู “จ่ายบิล”</h6>
                                    <h6 style="padding-left : 20px;">3. เลือก “รายการใหม่”</h6>
                                    <h6 style="padding-left : 20px;">4. เลือก “บิลอื่น”</h6>
                                    <h6 style="padding-left : 20px;">5. เลือก “บริษัท” เป็น “123 เซอร์วิส”</h6>
                                    <h6 style="padding-left : 20px;">6. ใส่ เลขที่อ้างอิง ใน “รหัสลูกค้า”</h6>
                                    <h6 style="padding-left : 20px;">7. ใส่หมายเลขโทรศัพท์มือถือใน “รหัสใบสั่งซื้อ”</h6>
                                    <h6 style="padding-left : 20px;">8. ใส่จำนวนเงิน</h6>
                                    <h6 style="padding-left : 20px;">9. กด “จ่ายบิล”</h6>
                                    <h6 style="padding-left : 20px;">10. ตรวจสอบความถูกต้อง และกด “ยืนยัน”</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3 pt-4">
                    <div class='row'>
                        <div class="col-12 mb-3 text-center">
                            <button class="btn form-control text-white rounded8px" onclick="otp_modal()" style="background-color: #c75ba1;">ถัดไป</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Waiting process -->

    <!-- Modal OTP -->
    <div class="modal fade px-0" id="otp-topup-wallet" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-image: linear-gradient(to bottom, #c75ba1, #7f4075 56%, #5c386f);">
                <div class="modal-header">
                    <div class='col-11' style='text-align:center;color:white'>
                        <strong>
                            <h4>เติมเงินวอลเลต</h4>
                        </strong>
                    </div>
                    <div class='col-1' style='text-align:right'>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-12 mb-3 " style='color:white;text-align:center'>
                        <strong> รหัส OTP จะถูกส่งไปที่เบอร์ 080-441-9585</strong>
                    </div>
                    <div class="col-12 mb-3 inside-md" style='text-align:center'>
                        <div class='py-3'>
                            <img src='new_ui/img/bank/otp-number.svg' style='width: 250px;'>
                            <div class="col-12 mb-3 " style='text-align:center'>
                                <strong> รหัสอ้างอิง OTP : GTBV</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3 " style='color:white;text-align:center'>
                        <strong> รหัส OTP จะไปถึงภายใน 50 วินาที</strong>
                    </div>
                </div>
                <div class="col-12 mb-3 pt-4">
                    <div class='row'>
                        <div class="col-12 mb-3 text-center">
                            <button class="btn form-control rounded8px" onclick="success_modal()" style="background-color: #f8eaf3; color:#c75ba1">ส่งอีกครั้ง</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal OTP -->


    <!-- Modal Success -->
    <div class="modal fade px-0" id="success-topup-wallet" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #ededed;">
                <div class="modal-header">
                    <div class='col-11' style='text-align:center'>
                        <strong>
                            <h4>เติมเงินวอลเล็ต</h4>
                        </strong>
                    </div>
                    <div class='col-1' style='text-align:right'>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-12 mb-3 inside-md">
                        <div class='py-3'>
                            <div class='col-12 px-0' style='text-align : center'>
                                <img src='new_ui/img/bank/success.png' style='width : 30px;'>
                                <p class='mb-0' style='color:#23c197'><strong>เติมเงินสำเร็จ</strong></p>
                                <p class='mb-0'>คุณได้เติมเงินลงในวอลเล็ตของคุณเรียบร้อย
                                    คุณสามารถเช็คยอดเงินได้ที่วอลเล็ตของคุณ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3 pt-4">
                    <div class='row'>
                        <div class="col-12 mb-3 text-center">
                            <button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #c75ba1;">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Success -->