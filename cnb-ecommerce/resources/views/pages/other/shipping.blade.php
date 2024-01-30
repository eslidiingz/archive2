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
                    <h1 class="text-dark"><strong>การส่งสินค้า</strong></h1>
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
                        <li class="breadcrumb-item active" aria-current="page">การส่งสินค้า</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- <div class="form-row mt-4">
            <div class="col-12 mb-3">
                <p style="font-size: 22px !important;">
                    เวลาจัดส่งอาจอยู่ในช่วงตั้งแต่ 2-20 วันทำการ, ระยะเวลาดำเนินการจัดส่งของบริษัทขนส่ง
                    และระยะเวลาที่ขนส่งเข้ารับสินค้า การคำนวนนี้ไม่รวมวันหยุดนักขัตฤกษ์และวันหยุดของบริษัทขนส่ง
                    สำหรับขนส่งที่ทำการรองรับโดย Medixmarket
                </p>
                <p style="font-size: 22px !important;">
                    เวลาในการเตรียมพัสดุ
                </p>
                <li>
                    สำหรับสินค้าปกติ (ไม่ใช่สินค้าจัด่งนานกว่าปกติ) เวลาจัดเตรียมพัสดุ คือ 2 วัน
                </li>
                <li>
                    สำหรับสินค้าจัดส่งนานกว่าปกติ เวลาจัดเตรียมพัสดุคือ 7-20 วัน
                </li>
                <br>
                <p style="font-size: 22px !important;">
                    1. ระยะเวลาการจัดส่งสินค้า
                    <br>
                    <label style="font-size: 18px !important;">
                        Standard Delivery (BEST Express, Flash Express และ J&T Express)
                    </label>
                </p>
                <li>
                    จัดส่งในพื้นที่กรุงเทพและปริมณฑล ประมาณ 1-2 วันทำการ
                </li>
                <li>
                    จัดส่งในพื้นที่ต่างจังหวัด ประมาณ 2-4 วันทำการ
                </li>
                <li>
                    จัดส่งในพื้นที่ห่างไกล ประมาณ 3-5 วันทำการ
                </li>
                <p style="font-size: 22px !important;">
                    <br>
                    <label style="font-size: 18px !important;">
                        สินค้าที่มีขนาดใหญ่ที่ไม่ได้รองรับผ่านทาง Medixmarket
                    </label>
                </p>
                <li>
                    จัดส่งในพื้นที่กรุงเทพและปริมณฑล ประมาณ 3-7 วันทำการ
                </li>
                <li>
                    จัดส่งในพื้นที่ต่างจังหวัด ประมาณ 7-14 วันทำการ
                </li>
                <li>
                    จัดส่งในพื้นที่ห่างไกล ประมาณ 14-20 วันทำการ
                </li>
                <li>
                    คำสั่งซื้อจะไม่มีหมายเลขติดตามสถานะ และไม่สามารถติดตามสถานะการจัดส่งได้ผ่าน Medixmareket Platform
                    หากคำสั่งซื้อไม่มีหมายเลขติดตาม
                </li>
                <li>
                    คุณสามารถติดต่อผู้ขายโดยตรงเพื่อตรวจสอบสถานะการจัดส่งของคำสั่งซื้อของคุณ
                </li>
                <br>
                <p style="font-size: 22px !important;">
                    2. วันทำการของผู้ให้บริการขนส่ง
                    <br>
                    <label style="font-size: 18px !important;">
                        BEST Express, Flash Express และ J&T Express จันทร์ - อาทิตย์ ไม่เว้นวันหยุดราชาการ
                    </label>
                </p>
                <p style="font-size: 22px !important;text-decoration: underline;">
                    หากบริษัทขนส่ง ส่งพัสดุไม่สำเร็จ
                    <br>
                    <label style="font-size: 18px !important;">
                        โดยปกติทางขนส่งจะพยายามส่งพัสดุไปยังที่ผู้รับปลายทางตามที่ร้านค้าระบุไว้ 3 ครั้ง ภายใน 5-7 วันทำการ
                        ขึ้นอยู่กับเงื่อนไขการจัดส่ง ของแต่ละบริษัทขนส่ง
                        ในกรณีที่ผุ้ซื้อสินค้าได้ปฏิเสธการรับสินค้าหรือบริษัทขนส่งไม่สามารถจัดส่งสินค้าได้สำเร็จ
                        สินค้าดังกล่าวจะถูกจัดส่งคืนไปยังร้านค้าตามที่ร้านค้าได้แจ้งไว้ต่อ Medixmarket
                    </label>
                    <br>
                    <label style="font-size: 18px !important;">
                        หากผู้ให้บริการขนส่งไม่สามารถส่งคืนพัสดุไปยังร้านค้าได้ภายในระยะเวลาที่กำหมด
                        เนื่องจากสาเหตุที่ไม่สามารถติดต่อร้านค้าได้หรือร้านค้าปฏิเสธการรับคืนสินค้า
                        บริษัทขนส่งจะส่งพัสดุมายังคลังสินค้าของ Medixmarket
                        ร้านค้าจำเป็นต้องกรอกแบบฟอร์มขอติดตามการรัรบสินค้าคืน ภายใน 14 วัน หลังจาก Medixmarekt
                        ได้ส่งข้อความแจ้งเตือนทาง SMS หรือ อีเมล โดยสามารถ กรอกแบบฟอร์มขอติดตามการรับสินค้าคืน
                    </label>
                </p>
                </p>

                <label style="font-size: 18px !important;">
                    หมายเหตุ:
                </label>
                <li>
                    ในกรณีที่ Medixmarketไม่ได้รับการติดต่อใดๆ จากร้านค้า <span style="color: red;">ภายใน 14 วัน</span>
                    หลังจาก Medixmarket ได้ส่งข้อความแจ้งเตือนแล้ว จะถือว่าผู้ขายได้สละสิทธิ์ในสินค้าดังกล่าวและ Medixmarket
                    มีสิทธิ์ที่จะจัดการสินค้าด้วยวิธีการใดๆ ตามที่ Medixmarket เห็นสมควรต่อไป
                </li>
                <li>
                    ในกรณีที่ร้านค้าติดต่อขอรับพัสดุคืน
                    ร้านค้าจะเป็นผู้รับผิดชอบค่าใช้จ่ายในการส่งคืนสินค้าดังกล่าวเพิ่มเติม และในกรณีนี้ ร้านค้ายินยอมให้
                    Medixmarket สามารถหักค่าใช้จ่ายในการขนส่ง จากบัญชีของร้านค้าได้
                </li>
                <br>
                <p style="font-size: 22px !important;">
                    เงื่อนไขการจัดส่งสินค้ากรณีที่บริษัทขนส่ง ส่งพัสดุไม่สำเร็จ
                    โดยปกติแล้วบริษัทขนส่งจะพยายามส่งพัสดุไปยังที่อยู่ผู้รับปลายทางตามที่ร้านค้าระบุไว้
                    ตามเงื่อนไขแต่ละบริษัทขนส่ง ดังนี้
                    <br>
                    <label style="font-size: 18px !important;">
                        BEST Express, Flash Express และ J&T Express
                        จะพยายามส่งพัสดุไปยังที่อยู่ผู้่รับปลายทางตามที่ร้านค้าระบุไว้ 3 ครั้ง ภายใน 5 วันทำการ
                    </label>
                </p>
                <p style="font-size: 22px !important;text-decoration: underline;">
                    หากสถานะสินค้าไม่อัพเดท (ผู้ขาย)
                    <br>
                    <label style="font-size: 18px !important;">
                        กรณีสถานะสินค้าไม่อัพเดตหลังจาก 24 ชม. ที่ผู้ขายได้ทำการส่งสินค้าออกไปยังผู้ซื้อแล้ว
                        ผู้ขายสามารถส่งหลักฐานการจัดส่งดังต่อไปนี้ให้กับแผนกลูกค้าสัมพันธ์ของ Medixmarket
                        เพื่อประสานงานไปยังบริษัทขนส่ง
                    </label>
                </p>
                <p style="font-size: 22px !important;">
                    หากผู้ขายทำการจัดส่งด้วย J&T Express (Pick up), BEST Express (Pick up) และ Flash Express (Pick up)
                    กรุณาส่งหลักฐานดังต่อไปนี้
                </p>
                <li>
                    หมายเลขคำสั่งซื้อ หรือ หมายเลขติดตามพัสดุ
                </li>
                <li>
                    หลักฐานการส่งสินค้า เช่น ใบ Check list ที่มีลายเซ็นยืนยันการรับสินค้า
                </li>
                <li>
                    เบอร์โทรเจ้าหน้าที่ ที่เข้ามารับสินค้า
                </li>
                <li>
                    วันและเวลาที่ส่งสินค้า
                </li>
                <li>
                    จำนวนคำสั่งซื้อทั้งหมดที่ส่งออกไปในวันดังกล่าว
                </li>
                <br>
                <label style="font-size: 18px !important;">
                    ร้านค้าต้องส่งหมายเลขคำสั่งซื้อเข้ามาภายในวันที่ร้านค้าต้องจัดส่ง (Ship by date)
                    เพื่อทำการปรับสถานะคำสั่งซื้อ
                </label>
                <label style="font-size: 18px !important;">
                    หมายเหตุ:
                    หากร้านค้าได้ทำการจัดส่งผิดช่องทางและสถานะคำสั่งซื้อถูกยกเลิกทางบริษัทจะขอไม่รับผิดชอบใดๆบริษัทขอแนะนำให้ร้านค้าจัดส่งสินค้ากับผู้ให้บริการขนส่งตามหน้าระบบที่ผู้ซื้อได้เลือกให้ทำการจัดส่งสินค้า
                </label>
                <li>
                    ส่งเรื่องเข้ามา: 10:00-15:00 น. (จันทร์-ศุกร์) จะถูกดำเนินการภายในวันนั้น
                </li>
                <li>
                    ส่งเรื่องเข้ามา: หลัง 15:00 น. (จันทร์-ศุกร์) จะถูกดำเนินการภายในวันถัดไป
                </li>
                <li>
                    ส่งเรื่องเข้ามา: นอกเหนือเวลาทำการ (เสาร์-อาทิตย์ และวันหยุดนักขัตฤกษ์) จะถูกดำเนินการภายในวันทำการถัดไป
                </li>
                <br>
                <p style="font-size: 22px !important;">
                    หากผู้ขายทำการจัดส่งด้วย J&T Express (Pick up), BEST Express (Pick up) และ Flash Express (Pick up)
                    กรุณาส่งหลักฐานดังต่อไปนี้
                </p>
                <li>
                    หมายเลขคำสั่งซื้อ หรือ หมายเลขติดตามพัสดุ
                </li>
                <li>
                    ภาพใบเสร็จการจัดส่งแบบเต็มใบที่เห็นเลข Tracking และ วันที่ส่งชัดเจน
                </li>
                <br>
                <label style="font-size: 18px !important;">
                    หมายเหตุ: ร้านค้าหรือผู้ซื้อจะต้องส่งเรื่องเข้ามาภายใน 30 วันหลังจากการส่งสำเร็จ
                </label>
                <br>
            </div>
        </div> -->
    </div>
@endsection
