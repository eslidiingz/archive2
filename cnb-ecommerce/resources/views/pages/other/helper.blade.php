@extends('new_ui.layouts.front-end')
@section('content')
    <div class="container-fluid py-lg-5 py-md-5 py-4 banner_product_n" id="navCategoryTitle">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-dark"><strong>ศูนย์ช่วยเหลือ</strong></h1>
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
                        <li class="breadcrumb-item active" aria-current="page">ศูนย์ช่วยเหลือ</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- <div class="form-row mt-4">
            <div class="col-12 mb-3">
                <p style="font-size: 22px !important;">
                    คำถามที่พบบ่อย
                </p>
                <p style="font-size: 22px !important;text-decoration: underline;">
                    สำหรับลูกค้า
                </p>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header-helper card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn color-sky btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    ฉันไม่ได้รับสินค้า / ได้รับสินค้าไม่ครบ
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                คำตอบ : ฉันไม่ได้รับสินค้า / ได้รับสินค้าไม่ครบ
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header-helper card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn color-sky btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    ฉันต้องการยกเลิกค่าสั่งซื้อ?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                คำตอบ : ฉันต้องการยกเลิกค่าสั่งซื้อ?
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header-helper card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn color-sky btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    ฉันสามารถเปลี่ยนที่อยู่ในการจัดส่ง / เบอร์โทรศัพท์ / ชื่อผู้รับ ได้หรือไม่
                                    หากยืนยันคำสั่งซื้อไปแล้ว?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                คำตอบ : ฉันสามารถเปลี่ยนที่อยู่ในการจัดส่ง / เบอร์โทรศัพท์ / ชื่อผู้รับ ได้หรือไม่
                                หากยืนยันคำสั่งซื้อไปแล้ว?
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header-helper card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn color-sky btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    ต้องทำอย่างไร? หากไม่สามารถทำการสั่งซื้อได้
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                คำตอบ : ต้องทำอย่างไร? หากไม่สามารถทำการสั่งซื้อได้
                            </div>
                        </div>
                    </div>

                <br>
                <p style="font-size: 22px !important;text-decoration: underline;">
                    สำหรับร้านค้า
                </p>
                    <div class="card">
                        <div class="card-header-helper card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn color-sky btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    ลงขายสินค้ากับทาง Medixmarket ได้อย่างไร?
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                คำตอบ : ลงขายสินค้ากับทาง Medixmarket ได้อย่างไร?
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header-helper card-header" id="headingSix">
                            <h2 class="mb-0">
                                <button class="btn color-sky btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    ระยะเวลาในการรับเงินหลังจากส่งสินค้าไปแล้ว
                                </button>
                            </h2>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                คำตอบ : ระยะเวลาในการรับเงินหลังจากส่งสินค้าไปแล้ว
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header-helper card-header" id="headingSeven">
                            <h2 class="mb-0">
                                <button class="btn color-sky btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                    อยากขึ้นทะเบียนโฆษณาสินค้าต้องทำอย่างไร?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                คำตอบ : อยากขึ้นทะเบียนโฆษณาสินค้าต้องทำอย่างไร?
                            </div>
                        </div>
                    </div>
                </div>
                <br>

            </div>
        </div> -->
    </div>
@endsection
<script>
    var myCollapse = document.getElementById('myCollapse')
    var bsCollapse = new bootstrap.Collapse(myCollapse, {
        toggle: false
    })
</script>
