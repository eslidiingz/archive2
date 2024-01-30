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
                    <h1 class="text-dark"><strong>Affiliate Program</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-lg-block d-md-none d-none">
            <div class="col-12 p-0 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: unset;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="color-sky">หน้าแรก</a></li>
                        <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                        <li class="breadcrumb-item active" aria-current="page">Affiliate Program</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- <div class="form-row mt-4">
            <div class="col-12 mb-3">
                <p style="font-size: 22px !important;">
                    Medixmarket Affiliate Program คืออะไร
                </p>
                <label style="font-size: 18px !important;">
                    Medixmarket Affiliate Program คือ โปรแกรมที่สามารถสร้างรายได้ให้กับทุกคนแบบง่าย ๆ เพียงแค่แชร์!
                    ทางทีม Medixmarket เปิดโอกาสให้ทุกคนมาร่วมเป็น Partner เพื่อสร้างคอนเทนต์บนหน้าโซเชียลของตัวเอง
                    ไม่ว่าจะเป็นรีวิว หรือบอกต่อ ทั้งสินค้า โปรโมชั่น แคมเปญ และกิจกรรมน่าสนใจของทาง Medixmarket เพียง
                    นำลิงก์ไปวาง ทุกยอดขายจากลิงก์ของคุณ รับค่าคอมมิชชั่นไปเลยสูงสุด 28% เป็นการหารายได้แบบไม่ต้องลงทุน
                    แถมเพื่อนได้สินค้า เราได้ค่าคอมมิชชั่น!
                </label>

                <p style="font-size: 22px !important;">
                    <br>
                    สิทธิประโยชน์ที่มากกว่า สำหรับ Medixmarket Affiliate Partner
                </p>
                <li>
                    สร้างรายได้แบบไม่ต้องลงทุนพร้อมโบนัสสุดพิเศษช่วง Big Campaign
                </li>
                <li>
                    รู้แคมเปญ Medixmarket ก่อนใคร
                </li>
                <li>
                    รับคูปองส่วนลดพิเศษและสินค้าไปใช้ฟรี(บางกรณีเท่านั้น)
                </li>

                <br>
                <label style="font-size: 18px !important;">
                    ในยุคเฟื่องฟูแห่งโลกออนไลน์ในปัจจุบัน ผู้คนส่วนใหญ่สามารถเขาถึงโลกโซเชียลได้ง่ายขึ้น ทาให้การใช้เวลากับ
                    สมาร์ตโฟนเพิ่มสูงตามไปด้วย แต่ในภาวะเศรษฐกิจถดถอยเช่นทุกวันนี้ การหาลู่ทางสร้างรายได้ใหม่ ๆ เพื่อเสริม
                    ความมั่นคงทางการเงินจึงเป็นเรื่องสำคัญกว่า ดังนั้นจะดีกว่าไหม
                    ถ้าหากโลกโซเชียลที่เราเองก็คุ้นชินกันเป็นอย่างดี
                    สามารถสร้างรายได้แบบง่าย ๆ ทำควบคู่กับงานประจำก็ได้ แถมไม่ต้องมีเงินลงทุน ถ้าคำตอบของคุณคือใช่ มาร่วม
                    เป็นส่วนหนึ่งกับ Medixmarket Affilate Program
                </label>

                <p style="font-size: 22px !important;">
                    <br>
                    5 ขั้นตอนเพื่อรับเงินกับ Medixmarket Affiliate Program
                </p>
                <li>
                    Register : กรอกแบบสอบถามเพื่อสมัครเข้าร่วมโครงการ <a
                        href="https://docs.google.com/forms/d/e/1FAIpQLSfDZf59D6Au8oUhSqBsXkQV4o_BC8AJ2HqAM2NA8FxhNYCrXQ/viewform"
                        style="text-decoration: underline;" class="color-sky" target="_blank">คลิกเพื่อสมัคร</a>
                    หากท่านผ่านเกณฑ์จะได้รับการติดต่อกลับจาก Medixmarket
                </li>
                <li>
                    How to : ทางทีม Medixmarket จะส่งรายละเอียดต่าง ๆ รวมถึงวิธีการสร้างลิงก์โปรโมตให้กับคุณทาง อีเมล
                    (หากไม่สะดวก สามารถติดต่อให้ทางแอดมินทำแทนได้)
                </li>
                <li>
                    Share Link : นำลิงก์โปรโมตที่ได้รับ ไปวางในช่องทางโซเชียลของคุณ
                </li>
                <li>
                    Purchase : เมื่อมีคนกดลิงก์ของคุณและเกิดการซื้อจริง
                </li>
                <li>
                    Earn Money : รับค่าคอมมิชชั่นไปเลย
                </li>

                <br>
                <p style="font-size: 22px !important;">
                    ทำอย่างไร ให้ได้ค่าคอมมิชชั่นมากที่สุด
                </p>
                <li>
                    สามารถโพสต์ได้มากกว่า 1 โพสต์ เพราะ Medixmarket ไม่จำกัดจำนวนโพสต์
                </li>
                <li>
                    โปรโมตได้มากกว่าที่คิดเพราะคุณสามารถโปรโมตทั้งสินค้าซื้อใหม่สินค้าที่มีอยู่แล้วหรือจะเป็นสินค้าที่มี
                    ขายอยู่บน Medixmarket และน่าสนใจจนอยากบอกต่อ (ควรเลือกสินค้าจากร้านค้าที่มียอดรีวิวดี
                    แนะนำให้รีวิวในรูปแบบของการใช้งานสินค้าจริง) แล้วไปแชร์พร้อมลิงก์ รวมไปถึงการบอกต่อแคมเปญ
                    และกิจกรรมที่น่าสนใจของ Medixmarket
                </li>
                <li>
                    สามารถคิดแคปชั่นได้ตามความเหมาะสมของเจ้าของโพส (Medixmarket ไม่จากัดเรื่องแคปชั่น)
                </li>
                <li>
                    โปรโมตได้หลายรูปแบบ มากกว่าการแชร์ลิงก์ในช่องทางโซเชียลของคุณเอง ยังสามารถแชร์ในคอมเมนต์
                    และโพสต์ของคนอื่นได้อีกด้วย
                </li>

                <br>
                <p style="font-size: 22px !important;">
                    ช่องทางการติดต่อและสมัคร Medixmarket Affiliate Program
                </p>
                <label style="font-size: 18px !important;">
                    หากคุณสนใจที่จะเข้าร่วมเป็นส่วนหนึ่งของ Medixmarket Affiliate Program แล้วล่ะก็ ติดต่อเราได้ง่าย ๆ ผ่าน
                    ช่องทางดังต่อไปนี้
                </label>
                <br>
                <label style="font-size: 18px !important;">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto: support@medixmarket.com">
                        support@medixmarket.com
                    </a>
                </label>
            </div>
        </div> -->
        <br>
    </div>
@endsection
