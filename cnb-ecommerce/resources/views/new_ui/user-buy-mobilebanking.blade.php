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
        color: red;
    }

    .border1 {
        background: none;
        border-style: dotted;
        border-left: none;
        border-right: none;
        border-bottom: none;
    }
</style>

@endsection
@section('content')
<div class="container">
    <div class="row mt-2">
        <div class="card col-xl-8 col-lg-8 mx-auto" style="border:none">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 d-flex justify-content-center">
                        <img src="new_ui/img/icon_Waiting_Green.svg" width="35px" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 d-flex justify-content-center mt-2">
                        <div class="t"><b>กำลังรอชำระเงิน ผ่านโมบายแบงค์กิ้ง</b></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 d-flex justify-content-center mt-2">
                        <div class="t2">กรุณาทำการชำระเงินผ่านโมบายแบงค์กิ้งภายใน 48 ชม.
                            มิเช่นนั้นคำร้องของคุณจะถูกยกเลิกอัตโนมัติ</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 d-flex justify-content-center mt-2">
                        <img src="new_ui/img/qrcodebank.png" width="230px" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 d-flex justify-content-center mt-2">
                        <div class="t mr-1">
                            <b>ควรชำระเงินก่อน</b>
                        </div>
                        <div class="t3 mr-1">
                            <b>10/10/2563</b>
                        </div>
                        <div class=" t mr-1">
                            <b>เวลา</b>
                        </div>
                        <div class=" t3 mr-1">
                            <b>10:00</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 d-flex justify-content-center mt-2">
                        <div class=" t mr-2">
                            <b>จำนวนเงิน</b>
                        </div>
                        <div class=" t3 mr-2">
                            <b>1500.00</b>
                        </div>
                        <div class=" t3 mr-2">
                            <b>บาท</b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border1">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 d-flex justify-content-center mt-2">
                        <div class="t mr-2">
                            <b>วิธีการชำระเงินผ่านโมบายแบงค์กิ้ง</b>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-xl-5 col-lg-7 col-md-6 mx-auto">
                        <div class="col t2 mr-2 mt-1" style="color:#c45e9f;">
                            <b>1.แคปหน้าจอเพื่อบันทึกรูป QR ลงโทรศัพท์ </b>
                        </div>
                        <div class="col t2 mr-2 mt-1" style="color:#808080;">
                            <b>2.ล็อกอินเข้าระบบ โมบายแบงค์กิ้ง </b>
                        </div>
                        <div class="col t2 mr-2 mt-1" style="color:#808080;">
                            <b>3.เลือกเมนู "จ่ายบิล" / เลือกหน้าสแกน QR </b>
                        </div>
                        <div class="col t2 mr-2 mt-1" style="color:#808080;">
                            <b>4.อัพโหลดรูป QR ที่ต้องการจะจ่าย </b>
                        </div>
                        <div class="col t2 mr-2 mt-1" style="color:#808080;">
                            <b>5.ตรวจสอบความถูกต้องต้อง และกด "ยืนยัน" </b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="background:#fafaff;">
                <div class="col-xl-12 mb-3 mt-4 " style="background:#fafaff;">
                    <div class="row" style="background:#fafaff;">
                        <div class="col-xl-4 col-lg-4 col-md-3"></div>
                        <div
                            class="col-xl-2 col-lg-2 col-md-3 order-xl-1 order-lg-1 order-md-1 order-sm-0 mb-3 text-center">
                            <button class="btn form-control btn btn-c75ba1 rounded8px btn-lg">บันทึก QR</button>
                        </div>
                        <div
                            class="col-xl-2 col-lg-2 col-md-3 order-xl-0 order-lg-0 order-md-0 order-sm-1 mb-3 text-center">
                            <button class="btn form-control text-white rounded8px btn-lg"
                                style="background-color: #b2b2b2;color:#fff;">ปิดหน้านี้</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>


@stop