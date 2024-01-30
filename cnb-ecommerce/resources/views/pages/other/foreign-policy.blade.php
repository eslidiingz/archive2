@extends('new_ui.layouts.front-end')
@section('style')
    <base href="/">
    <style>
        .banner_product_n {
            /* background-image: url('../new_ui/img/banner_bg/banner_product_news.png'); */
            background-color: #acacac;
            width: 100%;
            background-position: right;
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
@endsection
@section('content')
    <div class="container-fluid py-lg-5 py-md-5 py-4 banner_product_n" id="navCategoryTitle">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-dark"><strong>นโยบายของสินค้าต่างประเทศ</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-lg-block d-md-none d-none">
            <div class="col-12 p-0 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: unset;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"class="color-sky">หน้าแรก</a></li>
                        <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                        <li class="breadcrumb-item active" aria-current="page">นโยบายของสินค้าต่างประเทศ</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- <div class="form-row mt-4">
            <div class="col-12 mb-3">
                <p style="font-size: 22px !important;">
                    สินค้า Medixmarket
                </p>
                <label style="font-size: 18px !important;">
                    ฉันจะรู้ได้อย่างไรว่ายังมีสินค้าอยู่ในสต็อก
                    <br>
                    ทำไมสินค้าของลาซาด้าจึงมีราคาถูกกว่าที่อื่น
                    <br>
                    คูปองอิเล็กทรอนิกส์ (E-Coupon) คืออะไร และใช้อย่างไร
                    <br>
                    ความแตกต่างของ E-Voucher กับสินค้าดีลออนไลน์อื่นๆ
                </label>
                <br><br>
                <p style="font-size: 22px !important;">
                    สินค้าต่างประเทศ
                </p>
                <label style="font-size: 18px !important;">
                    ข้อมูลอะไรบ้างที่คุณควรทราบก่อนที่จะสั่งซื้อสินค้าจากต่างประเทศ?
                    <br>
                    ฉันสามารถยกเลิกสินค้าที่ส่งจากด่างประเทศได้หรือไม่
                    <br>
                    ฉันจำเป็นจะต้องจ่ายภาษีพิเศษสำหรับสินค้าระหว่างประเทศหรือไม่
                    <br>
                    ฉันจะรู้ได้อย่างไรว่าสินค้าชิ้นไหนส่งจากต่างประเทศบ้าง
                    <br>
                    สินค้า Taobao Collection คืออะไร
                </label>
                <br><br>
                <p style="font-size: 22px !important;">
                    การรับประกัน
                </p>
                <label style="font-size: 18px !important;">
                    ศูนย์รับประกันสินค้าอยู่ที่ไหน
                    <br>
                    ฉันจะใช้บริการการรับประกันสินค้าได้อย่างไร
                    <br>
                    ฉันจะตรวจสอบการรับประกันสินค้าได้อย่างไร
                    <br>
                    ถ้าสินค้าของฉันเกินระยะเวลาการรับประกัน-ฉันต้องจ่ายเงินในการซ่อมสินค้าหรือไม่
                </label>
            </div> -->
        </div>
        <br>
    </div>
@endsection
