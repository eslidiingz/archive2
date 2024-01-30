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
                    <h1 class="text-dark"><strong>การสั่งสินค้า</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-lg-block d-md-none d-none">
            <div class="col-12 p-0 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: unset;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color: #346751;">หน้าแรก</a></li>
                        <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                        <li class="breadcrumb-item active" aria-current="page">การสั่งสินค้า</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- <div class="form-row mt-4">
            <div class="col-12 mb-3">
                <p style="font-size: 22px !important;">
                    คุณสามารถสั่งซื้อสินค้าผ่านทางหน้าเว็บไซต์และทางหน้าแอปพลิเคชั่น
                    โดยจะต้องทำการเข้าสู่ระบบบัญชีเมดิคมาร์เก็คตก่อน
                    (คลิก <a href="#" data-toggle="modal" data-target="#user-login-regis"
                        style="text-decoration: underline;" class="color-sky">ที่นี่</a> เพื่อสมัครสมาชิก)

                </p>
                <p style="font-size: 22px !important;">
                    ขั้นตอนการสั่งซื้อสินค้าทางหน้าเว็บไซต์เมดิคมาร์เก็ต<br>
                    1. ค้นหาสินค้าที่คุณต้องการ
                </p>
                <li>
                    ค้นหาด้วยการพิมพ์ชื่อสินค้าลงในช่องค้นหา (ดังภาพด้านล่าง)
                </li>
                <li>
                    ค้นหาจากหมวดหมู่ปรเภทสินค้า และคุณยังสามารถดูสินค้าและโปรโมชั่นอื่นๆ ได้ที่หน้าโฮมเพจของเรา
                </li>
                <br>
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" style="min-height: 300px;border: 1px solid #acacac;" src="{{ URL('/new_ui/img/other/order/order_1-1.png')}}" alt="Card image cap">
                    </div>
                </div>
                <br>
                <p style="font-size: 22px !important;">
                    2. เลือกซื้อสินค้า
                </p>
                <li>
                    ดูรายละเอียดสินค้า
                </li>
                <li>
                    ตรวจสอบตัวเลือกการจัดส่ง และการรับประกัน
                </li>
                <li>
                    ดูเรตติ้งของร้านค้า และรีวิวของสินค้า
                </li>
                <br>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 pb-2">
                        <img class="img-fluid" style="min-height: 300px;border: 1px solid #acacac;" src="{{ URL('/new_ui/img/other/order/order_2-1.png')}}" alt="Card image cap">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 pb-2">
                        <img class="img-fluid" style="min-height: 300px;border: 1px solid #acacac;" src="{{ URL('/new_ui/img/other/order/order_2-2.png')}}" alt="Card image cap">
                    </div>
                </div>
                <br>
                <p style="font-size: 22px !important;">
                    3. การสั่งซื้อสินค้า
                </p>
                <li>
                    เข้าไปที่หน้ารถเข็น โดยคลิกที่ “สัญลักษณ์รถเข็น”
                </li>
                <li>
                    เลือกสินค้าที่คุณต้องการทำการชำระเงิน โดยกดที่ช่องสี่เหลี่ยมหน้าสินค้าชิ้นนั้นๆ (สามารถเลือกได้มากกว่า 1
                    รายการต่อการชำระเงิน 1 ครั้ง)
                </li>
                <li>
                    คลิก “ดำเนินการชำระเงิน”
                </li>
                <li>
                    เลือกรูปแบบการจัดส่งที่ต้องการ
                </li>
                <li>
                    ใส่ที่อยู่ในการจัดส่ง และข้อมูลการออกใบกำกับภาษีให้ถูกต้องและครบถ้วน (หากต้องการแก้ไขที่อยู่ คลิก
                    “แก้ไข”)
                </li>
                <li>
                    ระบุคูปองส่วนลด (ถ้ามี)
                </li>
                <li>
                    ตรวจสอบข้อมูลต่างๆให้ถูกต้องครบถ้วน
                </li>
                <li>
                    คลิก “สั่งสินค้า”
                </li>
                <br>
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" style="min-height: 300px;border: 1px solid #acacac;" src="{{ URL('/new_ui/img/other/order/order_3-1.png')}}" alt="Card image cap">
                    </div>
                </div>
                <br>
                <p style="font-size: 22px !important;">
                    4. ชำระเงิน
                </p>
                <li>
                    เลือกช่องทางการชำระเงิน
                </li>
                <br>
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" style="min-height: 300px;border: 1px solid #acacac;" src="{{ URL('/new_ui/img/other/order/order_4-1.png')}}" alt="Card image cap">
                    </div>
                </div>
                <br>
                <p style="font-size: 22px !important;">
                    5. กดยืนกันการชำระเงิน
                </p>
                <li>
                    ตรวจสอบยอดเงินที่ต้องชำระ
                </li>
                <br>
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" style="min-height: 300px;border: 1px solid #acacac;" src="{{ URL('/new_ui/img/other/order/order_5-1.png')}}" alt="Card image cap">
                    </div>
                </div>
                <br>
                <p style="font-size: 22px !important;">
                    6. ดำเนินการชำระเงินภายในเวลาที่กำหนด
                </p>
                <li>
                    ตรวจสอบยอดเงินที่ต้องชำระ
                </li>
                <li>
                    หากเป็นช่องทางที่ต้องชำระเงินล่วงหน้า
                    ให้ดำเนินการชำระเงินภายในระยะเวลาที่กำหนดเพื่อหลีกเลี่ยงคำสั่งซื้อถูกยกเลิก
                </li>
                <li>
                    ในกรณีที่โอนเงินผ่านทางธนาคาร กรุณาอัพโหลดหลักฐานการโอนเงิน
                </li>
                <br>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 pb-2">
                        <img class="img-fluid" style="min-height: 300px;border: 1px solid #acacac;" src="{{ URL('/new_ui/img/other/order/order_6-1.png')}}" alt="Card image cap">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 pb-2">
                        <img class="img-fluid" style="min-height: 300px;border: 1px solid #acacac;" src="{{ URL('/new_ui/img/other/order/order_6-2.png')}}" alt="Card image cap">
                    </div>
                </div>
                <br>
            </div>
        </div> -->
    </div>
@endsection
`
