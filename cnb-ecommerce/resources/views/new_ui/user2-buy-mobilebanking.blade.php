@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .t {
        font-size: 18px;
    }

    .t2 {
        font-size: 14px;
    }

    .t3 {
        font-size: 18px;
        color: #c45e9f;
    }

    .border1 {
        background: none;
        border-left: none;
        border-right: none;
        border-bottom: none;
    }

    .t4 {
        background: none;
        color: #c45e9f;
    }
</style>

@endsection
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="card col-xl-8 col-lg-10 mx-auto" style="border:none">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 d-flex justify-content-center">
                        <img src="new_ui/img/Icon_Select_Blue.svg" width="35px" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 d-flex justify-content-center mt-2">
                        <div class="t"><b>ชำระเงินเรียบร้อยแล้ว</b></div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-2 col-4">
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-8 px-0" style="width: 100%; height: 100px;">
                                <img src="new_ui/img/slides1.png" class="rounded8px"
                                    style="max-height: 100%; max-width: 100%;" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-8">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h6><b>Basics by sita A224 - One Button Box by sita Button </b></h6>
                                    </div>
                                    <div class="col-12">
                                        <p class="mb-0" style="color: #b2b2b2;">สีน้ำตาล,S</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="mb-0"><strong style="color: #c45e9f;">฿ 350</strong></h4>
                                            </div>
                                            <div class="col-12">
                                                <p class="mb-0" style="font-size: 0.8rem !important;">฿ 1140
                                                    <b>(-37%)</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-6">
                                        <div class="row">
                                            <h5 class="mx-lg-4 mx-md-2 mx-1 mb-0 mt-1"><b>x2</b></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-12">
                                        <div class="row">
                                            <div class="col-12 text-right ">
                                                <h3><b style="color: #c45e9f;">฿ 700</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border1">
                    <div class="t3">
                        <b>ที่อยู่ในการจัดส่ง</b>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-5 col-md-5 col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12 ">
                                    <p><b>ชื่อ-นามสกุล</b></p>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <p>สมหญิง รักดี</p>
                                    {{-- <p><b>เบอร์โทรศัพท์</b></p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-12">
                            <p><b>ที่อยู่</b></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <p>52/2 ซ.เจริญนคร 78 ถนน เจริญนคร บุคคโล เขตธนบุรี จังหวัดกรุงเทพมหานคร 10600 <span
                                    class="badge badge-secondary t4">(ที่อยู่หลัก)</span></p>
                        </div>
                    </div>
                    <div class="row mt-lg-n4">
                        <div class="col-lg-5 col-md-3 col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <p><b>เบอร์โทรศัพท์</b></p>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <p>(+66) 081-441-9585</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border1">
                    <div class="row">
                        <div class="col-lg-9 col-md-8 mt-3">
                            <div class="t3">
                                <b>ช่องทางการชำระเงิน</b>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <p><b>โมบายแบงค์กิ้ง</b></p>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 text-right ml-3 ">
                                            <img src="/new_ui/img/bank/bank03.png" class="rounded8px"
                                                style="max-height: 100%; max-width: 100%;" alt="">
                                        </div>
                                        <div class="col-lg-7 col-md-7 text-right mt-1 mr-n3">
                                            <p><b>ธนาคารกรุงเทพ</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border1">
                    <div class="row">
                        <div class="col-lg-7">
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-6">
                                    <p><b>ยอดรวมสินค้า</b></p>
                                </div>
                                <div class="col-6 text-right">
                                    <p><b>฿ 700</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p><b>ส่วนลด</b></p>
                                </div>
                                <div class="col-6 text-right" style="color:red">
                                    <p><b>฿ -100</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p><b>ค่าส่ง</b></p>
                                </div>
                                <div class="col-6 text-right">
                                    <p><b>฿ 60</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p><b>รวมราคาทั้งหมด</b></p>
                                </div>
                                <div class="col-6 text-right">
                                    <p><b>฿ 660</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="background:#fafaff;">
                <div class="col-xl-12 mb-3 mt-4 " style="background:#fafaff;">
                    <div class="row" style="background:#fafaff;">
                        <div
                            class="col-xl-3 col-lg-3 col-md-3 order-xl-1 order-lg-1 mx-auto order-md-1 order-sm-0 mb-3 text-center">
                            <button class="btn form-control btn btn-c75ba1 rounded8px btn-lg">กลับสู่หน้าหลัก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>


@stop