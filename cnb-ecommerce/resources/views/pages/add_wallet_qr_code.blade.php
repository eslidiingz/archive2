@extends('layouts.default')
@section('content')
<style>
    .nav_custom_cat{
        display: none !important;
    }
</style>
<div class="">
    <div class="container">
        <div class="row justify-content-center" style="">
            <div class="card col-lg-8 col-md-12 col-12  white border-0  p-4" id="flash-sale" style="border-radius: 0 0 8px 8px;">
                <div class="row mb-2 mt-4">
                    <div class="col-12 text-center">
                        <h6><strong>กำลังรอชำระเงิน ผ่านโมบายแบงค์กิ้ง</strong></h6>
                        <h6>กรุณาทำการชำระเงินผ่านโมบายแบงค์กิ้งภายใน 48 ชม. มิเช่นนั้นคำร้องของคุณจะถูกยกเลิกอัตโนมัติ</h6>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        {!! DNS2D::getBarcodeHTML( $mobilebanking->rawQrCode,"QRCODE",5,5) !!}
                    </div>
                    <div class="col-12 text-center mt-2">
                        <h6><strong>จำนวนเงิน <span class="text-danger">{{ NUMBER_FORMAT($basket_all->total,2) }} บาท</span></strong></h6>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-5 col-12 mx-auto mt-4">
                        <h6><strong>วิธีการชำระเงินผ่านโมบายแบงค์กิ้ง</strong></h6>
                        <h6>1. แคปหน้าจอเพื่อบันทึกรูป QR ลงโทรศัพท์ <br>
                            2. ล็อกอินเข้าระบบ โมบายแบงค์กิ้ง<br>
                            3. เลือกเมนู “จ่ายบิล” / เลือกหน้าสแกน QR<br>
                            4. อัพโหลดรูป QR ที่ต้องการจะจ่าย<br>
                            5. ตรวจสอบความถูกต้อง และกด “ยืนยัน”
                        </h6>
                        <h6 class="font-weight-bold">ควรชำระเงินก่อน <a style='color:red'>{{ $qrtime[0] }}</a> เวลา <a
                            style='color:red'>{{ $qrtime[1] }}</a></h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- @php
dd($ref_invs);
@endphp --}}
<div class="h-150"></div>


<style>
    .btn-c45e9f-custom {
        background-color: #c45e9f;
        color: #fff;
        border: 1px solid #c45e9f;
    }

    @media (min-width: 320px) {
        .h-150 {
            height: 0px;
        }
    }

    @media (min-width: 350px) {
        .h-150 {
            height: 0px;
        }
    }


    @media (min-width: 576px) {
        .h-150 {
            height: 150px;
        }
    }


    @media (min-width: 768px) {
        .h-150 {
            height: 150px;
        }
    }


    @media (min-width: 992px) {
        .h-150 {
            height: 150px;
        }
    }


    @media (min-width: 1200px) {
        .h-150 {
            height: 150px;
        }
    }

</style>


@stop
