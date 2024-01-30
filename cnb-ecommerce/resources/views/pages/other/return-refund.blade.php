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
                    <h1 class="text-dark"><strong>การคืนสินค้า/การคืนเงิน</strong></h1>
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
                        <li class="breadcrumb-item active" aria-current="page">การคืนสินค้า/การคืนเงิน</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- <div class="form-row mt-4">
            <div class="col-12 mb-3">
                <p style="font-size: 22px !important;">
                    การคืนสินค้าและการคืนเงิน หากคุณต้องการขอคืนเงิน/คืนสินค้า คุณสามารถกดส่งคำขอได้ในแอป
                    หรือเว็บไซต์ภายในระยะเวลา Medixmarket
                    การันตี (หรือภายใน 3-15 วัน* หลังจากที่ได้รับสถานะ “การจัดส่งสำเร็จ” จากบริษัทที่ทำการขนส่ง)

                </p>
                <p style="font-size: 22px !important;">
                    <span style="color: red">คำเตือน!!!</span> หากผู้ซื้อกด ”ฉันได้ตรวจสอบและยอมรับสินค้าแล้ว” จะไม่สามารถ
                    เลือก ”คืนเงิน/คืนสินค้า” ภายในแอพลิเคชั่นได้
                    กรุณาติดต่อร้านค้าเพื่อประสานงานขอคืนเงิน/ คืนสินค้า
                    หรือติดต่อฝ่ายลูกค้าสัมพันธ์หากไม่ได้รับความช่วยเหลือจากร้านค้าภายใน 48 ชม.
                </p>

                <p style="font-size: 22px !important;">
                    ปัญหาที่คุณสามารถขอคืนสินค้า/ คืนเงินได้
                </p>
                <li>
                    ไม่ได้รับคำสั่งซื้อ (ขอคืนเงิน)
                </li>
                <li>
                    ได้รับสินค้าไม่ครบ หรือชิ้นส่วนสินค้าไม่ครบ
                </li>
                <li>
                    ได้รับสินค้าไม่ตรงตามที่สั่ง เช่น ไซส์ผิด สีผิด สินค้าผิด
                </li>
                <li>
                    สินค้าไม่ดีหรือ เสียหาย
                </li>
                <li>
                    สินค้าการทำงานไม่สมบูรณ์ หรือหมดอายุ
                </li>
                <br>

                <p style="font-size: 22px !important;">
                    รูปแบบของการคืนเงิน/ คืนสินค้า
                </p>
                <li>
                    คืนเงินเต็มจำนวน
                </li>
                <li>
                    คืนเงินบางส่วนโดยไม่ต้องคืนสินค้า
                </li>
                <li>
                    คืนสินค้าเพื่อรับเงินคืนเต็มจำนวน
                </li>
                <li>
                    ผู้ซื้อสามารถเลือกขอคืนเงิน/คืนสินค้า กับสินค้าบางรายการในคำสั่งซื้อได้
                </li>
                <br>

                <p style="font-size: 22px !important;text-decoration: underline;">
                    ข้อควรรู้
                    <br>
                    <li>
                        ผู้ซื้อและผู้ขายสามารถเจรจาตกลงกันเองได้โดยตรงผ่านทางแชทสำหรับคืนเงินคืนสินค้า
                        โดยไม่ต้องผ่านเจ้าหน้าที่บทสนทนาและรูปภาพจะถูกบันทึกเป็นหลักฐานในระบบ
                    </li>
                    <li>
                        หากผู้ซื้อและผู้ขายไม่สามารถตกลงกันได้ ผู้ซื้อหรือผู้ขายสามารถเปิดข้อพิพาทเพื่อให้ Medixmarket
                        เข้าไปช่วยเหลือโดยตรงและเป็นผู้ตัดสินผ่านหน้าแชทการคืนเงินคืนสินค้า
                    </li>
                </p>
                <p style="font-size: 22px !important;">
                    ขั้นตอนโดยรวม สำหรับการคืนเงิน/ คืนสินค้าใน Medixmarket
                </p>
                <p style="font-size: 18px !important;">
                    1. กด ขอคืนเงิน/ คืนสินค้า ภายในแอปหรือเว็บไซต์ Medixmarket  (กรณีไม่มีข้อพิพาท)
                    ปุ่ม "คืนเงิน/สินค้า"
                    จะสามารถกดได้เมื่อสินค้าจัดส่งสำเร็จหรือหรือตามระยะเวลาที่ขนส่งกำหนดโดยสามารถตรวจสอบได้จาก
                    “การซือของฉัน”
                    เลือก “ที่ต้องได้รับ”  (ตัวอย่างเช่น สามารถกดปุ่มยอมรับสินค้าได้ภายในวันที่ XX-XX-XXXX
                    โดยสามารถตรวจสอบได้จากหน้าแอพ)
                    <br>
                    <label style="font-size: 18px !important;">
                        ***ดังนั้น หากปรากฏปุ่มคืนเงิน/คืนสินค้าเป็นสีเทา ผู้ขายจะไม่สามารถกดคืนสินค้าได้ โดยเป็นปกติ
                        โดยจะทำการกดปุ่มนี้ได้อีกครั้งหลังจากครบระยะเวลาขนส่งที่บริษัทกำหนด
                    </label>
                </p>
                <p style="font-size: 22px !important;text-decoration: underline;">
                    กรณีมีข้อพิพาท
                    <br>
                    <label style="font-size: 22px">
                        เอกสารประกอบการยื่นข้อพิพาท
                        <br>
                    </label>
                    <label style="font-size: 18px">
                        สำหรับการขอคืนสินค้าและการคืนเงิน
                        ผู้ซื้อจำเป็นต้องยื่นหลักฐานที่สอดคล้องกับเหตุผลการคืนสินค้าหรือสอดคล้องกับปัญญาหาที่พบ
                        เพื่อบริษัทฯจะทำการพิจารณาคำร้องในลำดับต่อไป
                        ดังนั้นหลักฐานที่ยื่นเข้ามาจึงมีผลต่อการตัดสินคำร้องดังกล่าว เพื่อการดำเนินการที่รวดเร็วขึ้น
                        ผู้ซื้อสามารถอัปโหลดหลักฐานตามเหตุผลการขอคืนสินค้าและคืนเงินได้ ดังนี้

                    </label>
                </p>
                <p style="font-size: 18px !important;">
                    1.1 สินค้าสภาพไม่ดีหรือมีความเสียหาย
                    <li>
                        รูปภาพ/วิดีโอ ของสินค้าที่ได้รับ (ทั้งหมดอย่างชัดเจน)
                    </li>
                    <li>
                        รูปภาพสินค้าบริเวณที่เสียหาย
                    </li>
                    <li>
                        รูปภาพกล่องสินค้าภายในและภายนอก (ภาพกล่องข้างนอกรอบด้าน และ ภาพกล่องข้างใน คือ เปิดฝากล่องออกมา)
                    </li>
                    <li>
                        รายละเอียดการบรรจุหีบห่อ (มีบับเบิ้ล/กันกระแทก)
                    </li>
                    <li>
                        รูปภาพใบปะหน้าพัสดุบนกล่องที่เสียหาย
                    </li>
                    <br>
                    <label style="font-size: 18px !important;">
                        ตัวอย่างการอัปโหลดหลักฐาน <span style="color: red;">กรณีสินค้าได้รับความเสียหาย</span>
                    </label>
                <div class="container text-center p-0 mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <p class="card-text">ตัวอย่างหลักฐานสำหรับสินค้าเสียหาย</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <img src="/img/return-refund/1.png" class="card-img img-return-refund" alt="...">
                            <div class="card-body">
                                <p class="card-text">หลักฐานภายนอกที่ได้รับความเสียหาย</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <img src="/img/return-refund/2.png" class="card-img img-return-refund" alt="...">
                            <div class="card-body">
                                <p class="card-text">ภาพถ่ายระหว่างแกะพัสดุ</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <img src="/img/return-refund/3.png" class="card-img img-return-refund" alt="...">
                            <div class="card-body">
                                <p class="card-text">ภาพถ่ายวัสดุที่ได้รับความเสียหาย
                                    และวัสดุสำหรับการใช้ห่อหรือกันกระแทก</p>
                            </div>
                        </div>
                    </div>
                </div>
                </p>
                <p style="font-size: 18px !important;">
                    1.2 การทำงานของสินค้าไม่สมบูรณ์หรือสินค้าหมดอายุ
                    <li>
                        รูปภาพของสินค้าที่ได้รับ (ทั้งหมดอย่างชัดเจน) และรูปภาพใบปะหน้าพัสดุบนกล่อง
                    </li>
                    <li>
                        วิดีโอแสดงปัญหาของสินค้าที่ได้รับ
                    </li>
                    <li>
                        รายละเอียดของสินค้าที่พบปัญหาโดยละเอียด
                    </li>
                    <li>
                        รายละเอียดการบรรจุหีบห่อ (มีบับเบิ้ล/กันกระแทก)
                    </li>
                    <li>
                        รูปภาพใบปะหน้าพัสดุบนกล่องที่เสียหาย
                    </li>
                    <br>
                    หมายเหตุ: หากเป็นสินค้าประเภทเครื่องใช้ไฟฟ้า/อิเล็คทรอนิกส์ รบกวนส่งวิดีโอ ขณะเปิดใช้งาน
                    <br>
                    <label style="font-size: 18px !important;">
                        ตัวอย่างการอัปโหลดหลักฐาน <span style="color: red;">กรณีได้รับสินค้าหมดอายุ</span>
                    </label>
                <div class="container text-center p-0 mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <p class="card-text">ตัวอย่างหลักฐานสินค้าหมดอายุ</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                        </div>
                        <div class="col-12 col-md-4">
                            <img src="/img/return-refund/4.png" class="card-img img-return-refund" alt="...">
                        </div>
                        <div class="col-12 col-md-4">
                        </div>
                    </div>
                </div>
                </p>
                <p style="font-size: 18px !important;">
                    1.3 ได้รับสินค้าไม่ครบหรือชิ้นส่วนไม่ครบ
                    <li>
                        รูปภาพ/วิดีโอ ของสินค้าที่ได้รับ (ทั้งหมดอย่างชัดเจน)
                    </li>
                    <li>
                        รูปภาพหน้ากล่องพัสดุ
                    </li>
                    <li>
                        รูปภาพ/วิดีโอ ขณะเปิดสินค้า
                    </li>
                    <br>
                    <label style="font-size: 18px !important;">
                        ตัวอย่างการอัปโหลดหลักฐาน <span style="color: red;">กรณีสั่งสินค้า 3 ชิ้น แต่ได้รับเพียง 2
                            ชิ้น</span>
                    </label>
                <div class="container text-center p-0 mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <p class="card-text">ตัวอย่างหลักฐานสำหรับสินค้าไม่ครบ/ขาด</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                        </div>
                        <div class="col-12 col-md-4 pb-4">
                            <img src="/img/return-refund/5.png" class="card-img img-return-refund" alt="...">
                        </div>
                        <div class="col-12 col-md-4">
                            <img src="/img/return-refund/6.png" class="card-img img-return-refund" alt="...">
                        </div>
                        <div class="col-12 col-md-2">
                        </div>
                    </div>
                </div>
                </p>
                <p style="font-size: 18px !important;">
                    1.4 ได้รับสินค้าไม่ตรงตามที่สั่ง เช่น ไซส์ผิด สีผิด สินค้าผิด

                    <li>
                        รูปภาพของสินค้าที่ได้รับ (ทั้งหมดอย่างชัดเจน) และรายละเอียดของสินค้าที่พบปัญหาโดยละเอียด
                    </li>
                    <li>
                        รูปภาพหน้ากล่องพัสดุ
                    </li>
                    <br>
                    <label style="font-size: 18px !important;">
                        ตัวอย่างการอัปโหลดหลักฐาน <span style="color: red;">กรณีสั่งสินค้าสั่งเสื้อยืดสีชมพู
                            ได้เสื้อยืดสีดำ</span>
                    </label>
                <div class="container text-center p-0 mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <p class="card-text">ตัวอย่างหลักฐานสำหรับได้รับสินค้าผิด</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                        </div>
                        <div class="col-12 col-md-4 pb-4">
                            <img src="/img/return-refund/7.png" class="card-img img-return-refund" alt="...">
                        </div>
                        <div class="col-12 col-md-4">
                            <img src="/img/return-refund/8.png" class="card-img img-return-refund" alt="...">
                        </div>
                        <div class="col-12 col-md-2">
                        </div>
                    </div>
                </div>
                </p>
                <p style="font-size: 18px !important;text-decoration: underline;">
                    คำแนะนำในการยื่นหลักฐานประกอบการพิจารณา
                    <li>
                        ขนาดของรูปภาพจะต้องไม่เกิน 5MB และวิดีโอ จะต้องไม่เกิน 30MB กรณีที่ไฟล์มีขนาดใหญ่
                        แนะนำคุณลดขนาดไฟล์หรือทำการอัปโหลด ผ่าน Google Drive และเปิดเป็นสาธารณะ
                        หลักฐานรูปภาพหรือวีดีโอจะต้องชัด ภาพไม่แตก
                    </li>
                    <li>
                        เราแนะนำให้คุณอัปโหลดวิดีโอเป็นอย่างยิ่งสำหรับกรณีที่สินค้าใช้งานไม่ได้
                    </li>
                    <li>
                        โปรดอัปโหลดภาพที่เห็นปัญหาสินค้าได้อย่างชัดเจน
                    </li>
                    <li>
                        โปรดส่งหลักฐานการสนทนากับผู้ขาย ***หากมี
                    </li>
                    <br>หมายเหตุ<br>
                    <li>
                        สำหรับกรณีไม่ได้รับสินค้า ผู้ซื้อไม่จำเป็นจะต้องส่งหลักฐานประกอบการยื่นขอคืนเงิน
                    </li>
                    <li>
                        หาผู้ซื้อและผู้ขายตกลงกันไม่ได้จึงจะทำการยื่นเอกสารข้อพิพาท
                    </li>
                    <br>
                    <label style="font-size: 18px !important;">
                        ตัวอย่างการอัปโหลดหลักฐาน <span style="color: red;">กรณีสินค้าได้รับความเสียหาย</span>
                    </label>
                </p>
                <p style="font-size: 18px !important;">
                    2. รอการตอบกลับจากผู้ขายภายใน 3 วัน - ผู้ขายสามารถตอบรับได้ 3 รูปแบบ<br>
                    <label style="font-size: 18px !important;">
                        2.1 กด ตอบรับคำขอ และขอให้ผู้ซื้อทำการส่งสินค้ากลับไปยังผู้ขายเพื่อทำการตรวจสอบ
                        <br>
                        2.2 กด ปฎิเสธคำขอ จากนั้น Medixmarket จะเป็นคนกลางในการตัดสินข้อพิพาท
                        <br>
                        2.3 กด คืนเงิน เพื่อให้ Medixmarket ทำการคืนเงินให้กับผู้ซื้อ
                    </label>
                </p>
                <br>
            </div>
        </div> -->
    </div>
@endsection
