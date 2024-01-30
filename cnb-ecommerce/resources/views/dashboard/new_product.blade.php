@extends('layouts.dashboard')

@section('content')
<style>
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        input[type="file"] {
            display: block;
        }

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover {
            background: white;
            color: black;
        }



    .modal-backdrop {
    z-index: 10400;
    }
    .modal {
    z-index: 10500;
    }

    </style>
    <style type="text/css">
        /* .main-section{
                margin:0 auto;
                padding: 20px;
                margin-top: 100px;
                background-color: #fff;
                box-shadow: 0px 0px 20px #c1c1c1;
            } */
        .fileinput-remove,
        .fileinput-upload {
            display: none;
        }

        .file-preview {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 0;
            width: 100%;
            margin-bottom: 5px;
        }

        .clearfix::after {
            display: block;
            clear: both !important;
            content: "";
        }

    </style>
    <style>
        .deleteOptionSelect {
            cursor: pointer;
        }

        .swiper-container {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-container-5 {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .gallery-top {
            height: 80%;
            width: 100%;
        }

        .gallery-thumbs {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .gallery-thumbs .swiper-slide {
            height: 100%;
            opacity: 0.4;
        }

        .gallery-thumbs .swiper-slide-thumb-active {
            opacity: 1;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #333;
            border-color: #333;
            border: none;

        }

        .nav-tabs .nav-link:hover {
            border: none;
            color: #fff;
            background-color: #333;
        }

        .nav-tabs .nav-link {
            border: none;
        }

        .nav-tabs {
            border-bottom: 4px solid #333;
        }

        .custom-control-input:checked~.custom-control-label::before {
            color: #fff;
            border-color: #333;
            background-color: #333;
        }

        .form-control.is-invalid,
        .was-validated .form-control:invalid {
            border-color: #ced4da;
        }

        #modalcategory .modal-body ul li.active {
            background-color: #333;
        }

        .file-preview-frame.krajee-default.kv-zoom-thumb {
            display: none !important;
        }

    </style>
    <style>
        /* In order to place the tracking correctly */
        canvas.drawing,
        canvas.drawingBuffer {
            position: absolute;
            left: 0;
            top: 0;
        }
        .btn-group {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            width: 100%;
        }

    </style>

    <script src="/assets/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>  
    <link rel="stylesheet" href="/assets/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

    <!-- Content Here -->

    <!-- ////////////////////////////////ข้อมูลทั่วไป//////////////////////////////// -->

    <div class="row mb-4">
        <form action="{{ route('dashboard.add.product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12 p-4">
                <h3><strong>เพิ่มสินค้าใหม่</strong></h3>
            </div>
            <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
                <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                    <div class="col-12 mt-4">
                        <h5><strong>ข้อมูลทั่วไป</strong></h5>
                    </div>
                    <div class="col-12">
                        <div class="form-group row was-validated">
                            <label for="inputNameProduct-1"
                                class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                    style="color: #333;">ชื่อสินค้า</strong></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control is-invalid" id="name" name="name"
                                    placeholder="ชื่อสินค้า และ น้ำหนักสินค้า" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group row was-validated">
                            <label for="inputNameProduct-2"
                                class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                    style="color: #333;">หมวดหมู่สินค้า</strong></label>
                            <div class="col-sm-10">

                                <input type="text" class="form-control is-invalid" id="category" name="category_id" required
                                    placeholder="เลือกประเภทสินค้า">
                                <input type="hidden" class="form-control" name="category" id="res_category" required>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row was-validated">
                            <label for="inputNameProduct-3"
                                class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                    style="color: #333;">รายละเอียดสินค้า</strong></label>
                            <div class="col-sm-10">
                                <textarea class="form-control is-invalid" name="description" id="description" rows="10"
                                    placeholder="ตัวอย่าง: ปูม้าสดจากทะเลใต้จังหวัดสงขลา รับประกันคุณภาพความหวานและความแน่น
    ตัดรอบสั่งเพื่อจัดส่งตอน 10:00 โมงเช้า เพื่อจัดส่งตอน 13:00
    จัดส่งโดย Nim Express แบบคุมอุณหภูมิถึงภายในวันถัดไป" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-12">
                        <div class="form-group row was-validated">
                            <label for="inputNameProduct-3" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                    style="color: #333;">บาร์โค้ด (Barcode)</strong></label>
                            <div class="col-sm-10">
                                <input type="number" name="barcode" id="NewProductbarcode_input" maxlength="13">
                                <button style="margin-right: 1%;" class="btn btn-c75ba1" type="button" id="barcodeaddProduct_btn" data-toggle="modal" data-target="#NewProductBarcodeModal">Scan Barcode</button>
                                {{-- <span><span style="color:red;">*</span><b>คำแนะนำ : </b> ตรวจสอบเลข Barcode ของสินค้าเพื่อความถูกต้อง</span> --}}
                                <br>
                                <span><span style="color:red;">*</span><b>คำแนะนำ : </b> สามารถแก้ไขเลข Barcode ของสินค้าเพิ่มเติมได้ เพื่อความถูกต้องของตัวเลข</span>
                            </div>
                        </div>
                    </div> -->


                </div>
            </div>

            <!-- Barcode -->
            <div class="modal fade" id="NewProductBarcodeModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <b> Barcode NO : <span id="showNewProductBarcode_no"></span></b>

                            <div id="barcodeBodyModalNewProduct">
                                <video class="dbrScanner-video" playsinline="true"></video>
                            </div>

                            <br>
                            <span>วิธีใช้ : วางสินค้าที่มีพื้นหลังสีพื้น เช่น ขาว หรือ ดำ</span>

                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                            <button type="button" id="saveModalNewProduct" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered  modal-xl px-lg-5 px-0">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">เลือกหมวดหมู่</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row ">
                                <div class="col-6 mb-4" style="overflow-y: auto; height: 300px;">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        @foreach ($catogorys as $catogory)
                                            <a class="list-group-item list-group-item-action"
                                                id="list-{{ $catogory->category_id }}-list" data-toggle="list"
                                                href="#list-{{ $catogory->category_id }}" role="tab"
                                                aria-controls="{{ $catogory->category_id }}">{{ $catogory->category_name }}</a>


                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-6 mb-4" style="overflow-y: auto; height: 300px;">
                                    <div class="tab-content" id="nav-tabContent">
                                        @foreach ($catogorys as $catogory)
                                            <div class="tab-pane right" id="list-{{ $catogory->category_id }}"
                                                role="tabpanel" aria-labelledby="list-{{ $catogory->category_id }}-list">
                                                @foreach ($catogory->subcategorys as $sub)
                                                    <a class="list-group-item list-group-item-action sub-list"
                                                        sub_category_id="{{ $sub->sub_category_id }}">{{ $sub->sub_category_name }}</a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- <div class="col-12">
                                    <h6>ที่เลือกในปัจจุบัน : <strong>อาหารเสริมและผลิตภัณฑ์สุขภาพ > อาหารเสริมเพื่อสุขภาพ</strong></h6>
                                </div> -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="add_product" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-xl px-lg-5 px-0">
                    <div class="modal-content">
                        <div class="modal-header pt-4">
                            <div class='col-12 position-relative' style='text-align:center'>
                                <strong>
                                    <h6 class="mb-0"><strong>ตัวอย่างขนาดรูป</strong></h6>
                                </strong>
                                <button type="button" class="close position-absolute" style="right: 4px; top: -8px;"
                                    data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <img src="/new_ui/img/example.png" class="w-100" alt="">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <!-- ////////////////////////////////ข้อมูลการขาย//////////////////////////////// -->

            <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
                <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                    <div class="col-12 mt-4">
                        <h5><strong>ข้อมูลการขาย</strong></h5>
                    </div>
                    <div class="col-12">

                        {{-- {{dd($product->product_option)}} --}}
                        {{-- @foreach ($product->product_option['sku'] as $key => $value) --}}


                        <div class="closeoption">
                            <div class="form-group row was-validated">
                                <label for="inputNameProduct-4"
                                    class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                        style="color: #333;">ราคาขายปลีก</strong><br><small>ค่าธรรมเนียม GP
                                        10%</small></label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control is-invalid" name="price[]" value=""
                                            id="check_price" autocomplete="off" placeholder="ราคาขายปลีก" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="width: 70px;">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row was-validated">
                                <label for="inputNameProduct-4"
                                    class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                        style="color: #333;">ราคาพิเศษ</strong><br><small>ค่าธรรมเนียม GP
                                        10%</small></label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control is-invalid" name="price_special[]" value=""
                                            id="check_price_special" autocomplete="off" placeholder="ราคาพิเศษ">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="width: 70px;">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row was-validated">
                                <label for="inputNameProduct-4"
                                    class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                        style="color: #333;">ราคาขายส่ง</strong></label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control is-invalid" name="margin[]" value=""
                                            id="check_margin" autocomplete="off" placeholder="ราคาขายส่ง (ไม่จำเป็น)">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="width: 70px;">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row was-validated">
                                <label for="inputNameProduct-5"
                                    class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                        style="color: #333;">คลัง</strong></label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control is-invalid" name="stock[]" value=""
                                            autocomplete="off" placeholder="จำนวนสินค้าในคลัง" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="width: 70px;">จำนวน</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row was-validated">
                                <label for="inputNameProduct-5"
                                    class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                        style="color: #333;">รหัสรายการสินค้า (sku)</strong></label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control is-invalid" name="sku[]" autocomplete="off"
                                            placeholder="หน่วยสำหรับจำแนกประเภทสินค้า (ไม่จำเป็น)">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNameProduct-5" class="col-sm-2 col-form-label text-lg-right text-md-left text-left d-none d-md-none d-lg-block"><strong style="color: #333;">ตัวเลือกสินค้า</strong><small style="color: #333;"><strong> (เช่น สี,ขนาด)</strong></small></label>
                                <div class="col-sm-10 d-none d-md-none d-lg-block">
                                    <button type="button" class="btn btn-outline-primary form-control" openoption="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือกสินค้า</button>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ราคา</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="price[]" value=""  autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">คลัง</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="stock[]" value="" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">รหัสsku</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="sku[]" autocomplete="off">
                                </div>
                            </div> -->
                            <div class="form-group row d-lg-none d-md-block d-block">
                                <label for="description" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-block btn-outline-primary" openoption="true"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือกสินค้า</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="option d-none">
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label"></label>
                                <div class="offset-sm-2 offset-lg-0 col-sm-10 ">
                                    <button type="button" option="1" class="btn btn-block btn-outline-primary"
                                        style="border-style: dashed;">เพิ่มตัวเลือกที่ 1</button>
                                </div>
                            </div>

                            <div class="option1 d-none">
                                <div class="col-12 px-0">
                                    <div class="form-group row">
                                        <label for="inputNameProduct-4"
                                            class="col-lg-2 col-form-label text-lg-right text-md-left text-left"><strong
                                                style="color: #333;">แบบที่ 1</strong></label>
                                        <div class="offset-sm-2 offset-lg-0 col-sm-10">
                                            <div class="d-flex flex-column flex-fill  px-0 py-4 position-relative"
                                                style="background-color: #fafafa;">
                                                <!-- <div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times" style="cursor: pointer;" id="closeOptionBox" aria-hidden="true"></i></div> -->
                                                <div
                                                    class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
                                                    <label for="inputText" class="col-lg-2 col-md-2 col-12">ประเภท</label>
                                                    <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="text" class="form-control"
                                                            placeholder="ใส่ประเภทของตัวเลือกสินค้า เช่น ขนาด สี .."
                                                            name="option1" value="" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div id="addOptionSelect-1">
                                                    <div
                                                        class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left">
                                                        <label for="inputText"
                                                            class="col-lg-2 col-md-2 col-12">ตัวเลือก</label>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="ใส่ข้อมูลของตัวเลือกสินค้า เช่น สีแดง สีขาว .."
                                                                name="dis1[]" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group d-lg-flex d-md-flex">
                                                    <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                                    <div class="col-lg-9 col-md-9 col-12">
                                                        <button id="btnOption1"
                                                            class="btn btn-outline-primary form-control"
                                                            style="border-style: dashed;" type="button" attr-name="dis1"
                                                            attr-add="dis1[]"><i class="fa fa-plus-circle"
                                                                aria-hidden="true"></i> เพิ่มตัวเลือก-1</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label"></label>
                                <div class="offset-sm-2 offset-lg-0 col-sm-10 ">
                                    <button type="button" option="2" class="btn btn-block btn-outline-primary"
                                        style="border-style: dashed;">เพิ่มตัวเลือกที่ 2</button>
                                </div>
                            </div>


                            <div class="option2 d-none">
                                <div class="col-12 px-0">
                                    <div class="form-group row">
                                        <label for="inputNameProduct-4"
                                            class="col-lg-2 col-form-label text-lg-right text-md-left text-left"><strong
                                                style="color: #333;">แบบที่ 2</strong></label>
                                        <div class="offset-sm-2 offset-lg-0 col-sm-10">
                                            <div class="d-flex flex-column flex-fill  px-0 py-4 position-relative"
                                                style="background-color: #fafafa;">
                                                <!-- <div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times" style="cursor: pointer;" id="closeOptionBox" aria-hidden="true"></i></div> -->
                                                <div
                                                    class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
                                                    <label for="inputText" class="col-lg-2 col-md-2 col-12">ประเภท</label>
                                                    <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="text" class="form-control"
                                                            placeholder="ใส่ประเภทของตัวเลือกสินค้า เช่น ขนาด สี .."
                                                            name="option2" value="" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div id="addOptionSelect-1">
                                                    <div
                                                        class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left">
                                                        <label for="inputText"
                                                            class="col-lg-2 col-md-2 col-12">ตัวเลือก</label>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="ใส่ข้อมูลของตัวเลือกสินค้า เช่น สีแดง สีขาว .."
                                                                name="dis2[]" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group d-lg-flex d-md-flex">
                                                    <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                                    <div class="col-lg-9 col-md-9 col-12">
                                                        <button class="btn btn-outline-primary form-control"
                                                            style="border-style: dashed;" attr-name="dis2" attr-add="dis2[]"
                                                            type="button"><i class="fa fa-plus-circle"
                                                                aria-hidden="true"></i> เพิ่มตัวเลือก-2</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row table-option d-none">
                            <label for="inputNameProduct-4"
                                class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                    style="color: #333;">รายการตัวเลือก</strong></label>
                            <div class="col-sm-10">
                                <div id="table"></div>

                            </div>
                        </div>

                        <div>
                            <div class="form-group row">
                                <label for="inputNameProduct-4"
                                    class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                        style="color: #333;">ส่วนลดเมื่อใช้ NFT</strong><br><small></small></label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control is-invalid" name="txtNFTDiscount" value="" id="txtNFTDiscount" autocomplete="off" placeholder="ส่วนลดเมื่อใช้ NFT" >
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="width: 70px;">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ////////////////////////////////รูปภาพและวิดีโอ//////////////////////////////// -->
            <!--div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
                <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                    <div class="col-12 mt-4">
                        <h5><strong>วิดีโอ</strong> <small class="text-dark" ><strong class="text-danger"><span class="text-dark">(ประเภท mp4 ขนาดไม่เกิน 10mb)</span> </strong></small></h5>
                    </div>
                    <div class="col-12">


                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 main-section">
                                <div class="form-group">
                                    <div class="file-loading">
                                        <input id="file-2" type="file" name="file" class="file" accept="video/*" multiple>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div-->

            <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
                <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                    <div class="col-12 mt-4">
                        <h5><strong>รูปภาพ</strong> <small class="text-dark" data-toggle="modal"
                                data-target="#add_product" style="cursor: pointer;"><strong class="text-danger"><span
                                        class="text-dark">(ลงรูปภาพขนาด 300 * 300 pixel)</span> คลิกดูตัวอย่าง <i
                                        class="fa fa-exclamation-circle" aria-hidden="true"></i></strong></small></h5>
                    </div>
                    <div class="col-12">


                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 main-section">
                                {{-- {!! csrf_field() !!} --}}
                                <div class="form-group">
                                    <div class="file-loading">
                                        <input id="file-1" type="file" name="file" multiple class="file"
                                            accept="image/*" data-min-file-count="0">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- ////////////////////////////////การจัดส่ง//////////////////////////////// -->
            <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
                <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                    <div class="col-12 mt-4">
                        <h5><strong>การบรรจุและจัดส่ง</strong></h5>
                    </div>
                    <div class="col-12">
                        <div class="form-group row was-validated">
                            <label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                                <strong style="color: #333;">ตัวแทนขนส่ง</strong>
                            </label>
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <select name='shipty_id' title="เลือกตัวแทนขนส่ง" class="form-control btn-color"
                                        id="shipty_id" required>
                                        <option value="">-- เลือกตัวแทนขนส่ง --</option>
                                        @foreach ($shipping_type as $item)
                                            <option value="{{ $item->shipty_id }}">
                                                {{ @$item->ship_name != null ? $item->ship_name : $item->shipty_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                                <strong style="color: #333;">น้ำหนักสินค้า</strong>
                            </label>
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control is-invalid" id="product_weight"
                                        name="product_weight" placeholder="น้ำหนัก" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">กรัม</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="inputNameProduct-7"
                                class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                                <strong style="color: #333;">ขนาดพัสดุ</strong>
                            </label>
                            <div class="col-sm-10">
                                <div class="form-row was-validated">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control is-invalid" id="product_lwh" value=""
                                                name="product_L" placeholder="กว้าง">
                                            <div class="input-group-append">
                                                <span class="input-group-text">ซม.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control is-invalid" id="product_lwh" value=""
                                                name="product_W" placeholder="ยาว">
                                            <div class="input-group-append">
                                                <span class="input-group-text">ซม.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control is-invalid" id="product_lwh" value=""
                                                name="product_H" placeholder="สูง">
                                            <div class="input-group-append">
                                                <span class="input-group-text">ซม.</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-6"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">ขนาดกล่อง 1</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <select name='box_size_id1' title="เลือกขนาดกล่อง" class="form-control btn-color" id="box_size_id1" required>
                                    <option value="">-- เลือกขนาดกล่อง --</option>
                                    @foreach ($a_box_size as $item)
                                        @php
                                        @endphp
                                        <option value="{{ $item->id }}" >{{ 'เบอร์ '.$item->size_name.' ขนาด '.$item->width.' x '.$item->long.' x '.$item->height.' ซม.' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">บรรจุ</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control is-invalid" id="product_box_pack_amt1"
                                    name="product_box_pack_amt1" placeholder="ชิ้น / กล่อง" value="" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">ชิ้น / กล่อง</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-6"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">ขนาดกล่อง 2</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <select name='box_size_id2' title="เลือกขนาดกล่อง" class="form-control btn-color" id="box_size_id2" >
                                    <option value="">-- เลือกขนาดกล่อง --</option>
                                    @foreach ($a_box_size as $item)
                                        <option value="{{ $item->id }}" >{{ 'เบอร์ '.$item->size_name.' ขนาด '.$item->width.' x '.$item->long.' x '.$item->height.' ซม.' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">บรรจุ</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control is-invalid" id="product_box_pack_amt2"
                                    name="product_box_pack_amt2" placeholder="ชิ้น / กล่อง" value="" >
                                <div class="input-group-append">
                                    <span class="input-group-text">ชิ้น / กล่อง</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-6"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">ขนาดกล่อง 3</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <select name='box_size_id3' title="เลือกขนาดกล่อง" class="form-control btn-color" id="box_size_id3" >
                                    <option value="">-- เลือกขนาดกล่อง --</option>
                                    @foreach ($a_box_size as $item)
                                        <option value="{{ $item->id }}" >{{ 'เบอร์ '.$item->size_name.' ขนาด '.$item->width.' x '.$item->long.' x '.$item->height.' ซม.' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">บรรจุ</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control is-invalid" id="product_box_pack_amt3"
                                    name="product_box_pack_amt3" placeholder="ชิ้น / กล่อง" value="" >
                                <div class="input-group-append">
                                    <span class="input-group-text">ชิ้น / กล่อง</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////////////////////อื่นๆ//////////////////////////////// -->

            <div class="col-12 mb-4 text-right  px-2 px-lg-4 px-md-4 mx-0 mt-3" style="padding-right: 0px !important;">
                <a href="{{ URL::previous() }}" class="btn btn-secondary">ยกเลิก</a>
                <!-- <button class="btn btn-outline-c45e9f">บันทึกและซ่อน</button> -->
                <button type="submit" id="send-data" class="btn btn-outline-pink submitFormAdmin">บันทึก</button>
                {{-- <div class="test_res btn">TEST</div> --}}
            </div>
            <input type="hidden" name="shop_id" value="{{ $user_shops->id }}">
        </form>
    </div>
@endsection


@section('script')


    <script>
        let option_count = 1;

        $(window).on("load", function() {
            // console.log( "window loaded" );
            var check_category = $("#res_category").val();
            if (check_category == "") {
                $("#category").val("");
            }
        });

        $('button[attr-add]').on('click', function(e) {
            var _this = $(this)
            // alert(_this.attr("attr-name"))
            const last_el = $(this).parent().parent().prev()
            const input = `<div id="${option_count}" class="form-group d-md-flex text-right deleteOptionSelectMore row mx-0" >
                                    <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                    <div class="col-lg-9 col-md-9 col-10" >
                                        <input type="text" class="form-control" name="${$(this).attr('attr-add')}" autocomplete="off" >
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-2 d-flex align-items-center" >
                                        <i type="button" class="fa fa-trash-o deleteOptionSelect" attr-name="dis2"  attr-add="dis2[]" onclick="clearoption($(this).parent().parent().attr('id'))" "></i>
                                    </div>
                                </div>`

            last_el.after(input)
            table_content()
            option_count = option_count + 1
        });

        function clearoption(option_count) {

            var element = document.getElementById(option_count);
            element.remove();
            table_content()

        }


        $('button[openoption').on('click', function(e) {
            const _this = $(this)
            $(".option").toggleClass('d-none')
            $(".closeoption").toggleClass('d-none')
            $(".table-option").toggleClass('d-none')
            $('input[name="price[]"]').eq(0).attr('disabled', 'true')
            $('input[name="margin[]"]').eq(0).attr('disabled', 'true')
            $('input[name="stock[]"]').eq(0).attr('disabled', 'true')
            $('#btnOption1').click();
        });

        $('button[option]').on('click', function(e) {
            $(`.option${$(this).attr('option')}`).toggleClass('d-none')

            table_content();
        });

        function table_content() {

            var options = ["option1", "option2"]
            var theads = ["emp", "emp", "ราคาขายปลีก", "ราคาขายส่ง", "คลัง", "เลข SKU"];
            var theads_key = ["emp", "emp", "price", "margin", "stock", "sku"];
            var dis = []
            var sum = 0;
            var loop = 1;
            $.each(options, function(indexInArray, valueOfElement) {
                if (!$(`.option${indexInArray+1}`).hasClass('d-none')) {
                    dis[indexInArray] = $(`input[name="dis${indexInArray+1}[]"]`).length
                    theads[indexInArray] = $(`input[name="option${indexInArray+1}"]`).val()
                } else {
                    dis[indexInArray] = 1
                }

                loop *= dis[indexInArray]
            });

            var option1_index = []
            var c = 0;
            for (let index = 0; index < loop; index++) {
                if (index % dis[1] == 0 && index > 0) {
                    c++
                }
                console.log(dis[0]);
                option1_index[index] = $('input[name="dis1[]"]').eq(c).val()
            }

            var option2_index = []
            var c = 0;
            for (let index = 0; index < loop; index++) {
                if (index % dis[1] == 0) {
                    c = 0
                }
                option2_index[index] = $('input[name="dis2[]"]').eq(c).val()
                c++
            }

            var thead_html = `<table class="table table-striped table-bordered"><thead><tr>`
            $.each(theads, function(indexInArray, valueOfElement) {
                if (valueOfElement != "emp")
                    thead_html += `<th>${valueOfElement}</th>`
            })
            thead_html += `</thead>`
            thead_html += `<tbody>`


            for (let index = 0; index < loop; index++) {
                thead_html += "<tr>"
                $.each(theads, function(indexInArray, valueOfElement) {
                    if (valueOfElement != "emp") {
                        if (valueOfElement === "เลข SKU") {
                            if (indexInArray > 1) {
                                thead_html +=
                                    `<td>
                                <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                    <h6>เลข SKU (ไม่จำเป็นต้องกรอก)</h6>
                                </div>
                                <input type="text" class="form-control text-lg-right text-md-left text-left" placeholder="เลข SKU (ไม่จำเป็นต้องกรอก)" name="${theads_key[indexInArray]}[]">
                            </td>`

                            } else {
                                if (indexInArray === 0) {
                                    thead_html +=
                                        `<td class="bind-${option1_index[index]}" >${option1_index[index]}</td>`
                                } else {
                                    thead_html +=
                                        `<td class="bind2-${option2_index[index]}">${option2_index[index]}</td>`
                                }
                            }
                        } else if (valueOfElement === "คลัง") {
                            if (indexInArray > 1) {
                                thead_html +=
                                    `<td>
                                <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                    <h6>จำนวนในคลัง</h6>
                                </div>
                                <input type="number" class="form-control text-lg-right text-md-left text-left" placeholder="จำนวนในคลัง" name="${theads_key[indexInArray]}[]" required>
                            </td>`

                            } else {
                                if (indexInArray === 0) {
                                    thead_html +=
                                        `<td class="bind-${option1_index[index]}">${option1_index[index]}</td>`
                                } else {
                                    thead_html +=
                                        `<td class="bind2-${option2_index[index]}">${option2_index[index]}</td>`
                                }
                            }
                        } else if (valueOfElement === "ราคาขายปลีก") {
                            if (indexInArray > 1) {
                                thead_html +=
                                    `<td>
                                <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                    <h6>ราคาขายปลีก(บาท)</h6>
                                </div>
                                <input type="number" class="form-control text-lg-right text-md-left text-left" placeholder="ราคาขายปลีก(บาท)" name="${theads_key[indexInArray]}[]" required>
                            </td>`

                            } else {
                                if (indexInArray === 0) {
                                    thead_html +=
                                        `<td class="bind-${option1_index[index]}">${option1_index[index]}</td>`
                                } else {
                                    thead_html +=
                                        `<td class="bind2-${option2_index[index]}">${option2_index[index]}</td>`
                                }
                            }
                        } else {
                            if (indexInArray > 1) {
                                thead_html +=
                                    `<td>
                                <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                    <h6>ราคาขายส่ง(บาท) (ไม่จำเป็น)</h6>
                                </div>
                                <input type="number" class="form-control text-lg-right text-md-left text-left" placeholder="ราคาขายส่ง(บาท) (ไม่จำเป็น)" name="${theads_key[indexInArray]}[]">
                            </td>`

                            } else {
                                if (indexInArray === 0) {
                                    thead_html +=
                                        `<td class="bind-${option1_index[index]}">${option1_index[index]}</td>`
                                } else {
                                    thead_html +=
                                        `<td class="bind2-${option2_index[index]}">${option2_index[index]}</td>`
                                }
                            }
                        }
                    }
                })
                thead_html += "</tr>"
            }


            $("#table").html(thead_html)

        }


        $('input[name="option1"]').on('keyup keypress blur change', function(e) {
            $("#table thead tr th").eq(0).text($(this).val())
        });

        $('input[name="option2"]').on('keyup keypress blur change', function(e) {
            $("#table thead tr th").eq(1).text($(this).val())
        });

        $(document).on('keyup keypress blur change', 'input[name="dis1[]"]', function(e) {
            table_content()
        });


        $(document).on('keyup keypress blur change', 'input[name="dis2[]"]', function(e) {
            table_content()
        });

        $('input[name="category_id"]').on('focus', function() {
            $('.modal#staticBackdrop').modal('toggle')

        });

        $('.modal#staticBackdrop').on('hidden.bs.modal', function(e) {
            $('.navbar.navbar-inverse').toggleClass('d-none')
        });

        $('.modal#staticBackdrop').on('show.bs.modal', function(e) {
            $('.navbar.navbar-inverse').toggleClass('d-none')
        });

        $(".sub-list").on('click', function() {
            $(".sub-list").removeClass('active')
            // $(this).addClass('active');
            var c = $('input[name="category"]').val($(this).attr('sub_category_id'))
            $('input[name="category_id"]').val($('.list-group-item.list-group-item-action.active').text() + " > " +
                $(this).text())
            $('.modal#staticBackdrop').modal('toggle')
            // alert($('#category').val());
            // var head = $('.list-group-item.active').text()

            // console.log(head)
        });



        $(document).ready(function() {
            // $('.modal#staticBackdrop').modal('toggle')

        });

        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            var image_html = "<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result +
                                "\" title=\"" +
                                file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove image</span>" +
                                "</span>";
                            console.log($("input[name]files[]"));
                            $(image_html).insertAfter("#files");
                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });

                            // Old code here
                            /*$("<img></img>", {
                                class: "imageThumb",
                                src: e.target.result,
                                title: file.name + " | Click to remove"
                            }).insertAfter("#files").click(function(){$(this).remove();});*/

                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/fileinput.js" type="text/javascript">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/themes/fa/theme.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        var res_img;
        var res_img_file;
        var four_number = [];
        var count_index = 0;
        var count_array = [];
        $(document).on("click", ".kv-file-remove", function() {
            res_img = count_array[$('.kv-file-remove').index(this) / 2];
            $('[id="' + res_img + '"]').remove();
            count_array.splice($('.kv-file-remove').index(this) / 2, 1);
        });
        $(document).on("click", ".fileinput-remove-button", function() {
            count_array.forEach(res => {
                $('[id="' + res + '"]').remove();
            });
        });

        $("input[type=number]").on("keydown", function(e) {
            var invalidChars = ["-", "+", "e"];
            if (invalidChars.includes(e.key)) {
                e.preventDefault();
            }
        });

        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: '{{ route('dashboard.add.product.imgupload') }}',
            uploadAsync: true,
            overwriteInitial: false,
            validateInitialCount: false,
            showUpload: false, // hide upload button
            initialPreviewAsData: true,
            // required: true,


            maxFilesCount: 8,
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                    shop_id: "{{ $user_shops->id }}",
                };
            },
            deleteExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            fileActionSettings: {
                showUpload: false, //This remove the upload button
                // showRemove: false,
            },
            allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
            browseOnZoneClick: true,
            // initialPreviewAsData: true,
            overwriteInitial: false,
            // maxFileSize: 2000,

            slugCallback: function(filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        })
        .on('fileimageloaded', function(event, previewId) {
            console.log("fileimageloaded");
        })
        .on('filebeforedelete', function() {
            var aborted = !window.confirm('Are you sure you want to delete this file?');
            if (aborted) {
                window.alert('File deletion was aborted! ');
            };
            return aborted;
        })
        .on('filedeleted', function(event, data, previewId, index) {
            // console.log(`input[name="img_upload[]"][val="${data}"]`);
            // console.log("TRTRTRTRTR");

            // $("#file-1").fileinput('clear');
            $("#file-1").text("");
            // console.log($("#file-1").val());
            // $(`input[name="img_upload[]"][value="${data}"]`).remove();

        })
        .on('fileuploaded', function(event, data, previewId, index, id) {
            console.log(this)
            var form = data.form,
                files = data.files,
                extra = data.extra,
                response = data.response,
                reader = data.reader;
            res_img = response.uploaded;
            index++;
            res_img_file = res_img.substring(0, res_img.lastIndexOf("."));
            $("body").find("form").append(
                `<input type="hidden" id="${res_img}" name="img_upload[]" value="${res_img}">`);
            $("#file-1").text(res_img);
            $("#file-1").prop('required', false);
            // console.log(event, data, previewId, index,id)

            four_number[index] = res_img;

            count_array.push(four_number[index]);
            console.log("index ::", index, "new index ::", count_array, "arrayLenght ::", count_array.length)
            // console.log("count_index ::",count_index = count_index + index)
            // four_number[index] = res_img
        })
        .on("filebatchselected", function(event, data, previewId, index) {
            var form = data.form,
                files = data.files,
                extra = data.extra,
                response = data.response,
                reader = data.reader;
            $("#file-1").fileinput("upload");
            // console.log("filebatchselected", data);
        })
        .on('filesuccessremove', function(event, id, data, a, b) {
            // var res_img = $(event.target).text()
            // console.log(event,id,data,a,b)
            // console.log(event,id,data,a,b)
            // var form = data.form,
            //     files = data.files,
            //     extra = data.extra,
            //     response = data.response,
            //     reader = data.reader;
            //     res_img = response.uploaded;
            // console.log('id = ' + id + ', index = ' + index);
            // console.log('id = ' + id + ', event = ' + event);

            // document.getElementById(res_img).remove()
            // $(window).on("load", function(){
            // var el = document.getElementById(res_img);
            // $('[id="'+res_img+'"]').remove();
            // console.log('[id="'+res_img+'"]');
            // console.log(data,"res_img",el)
            // });
        });
        $("#file-2").fileinput({
            theme: 'fa',
            uploadUrl: '{{ route('dashboard.add.product.imgupload') }}',
            uploadAsync: true,
            overwriteInitial: false,
            validateInitialCount: false,
            showUpload: false, // hide upload button
            initialPreviewAsData: true,
            maxFileCount: 1,
            autoReplace: true,
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            deleteExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            fileActionSettings: {
                showUpload: false, //This remove the upload button
                // showRemove: false,
            },
            allowedFileExtensions: ['mp4'],
            browseOnZoneClick: true,
            // initialPreviewAsData: true,
            overwriteInitial: false,
            // maxFileSize: 2000,

            slugCallback: function(filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        })
        .on('fileimageloaded', function(event, previewId) {
            console.log("fileimageloaded");
        })
        .on('filebeforedelete', function() {
            var aborted = !window.confirm('Are you sure you want to delete this file?');
            if (aborted) {
                window.alert('File deletion was aborted! ');
            };
            return aborted;
        })
        .on('filedeleted', function(event, data, previewId, index) {
            // console.log(`input[name="img_upload[]"][val="${data}"]`);
            // console.log("TRTRTRTRTR");

            // $("#file-2").fileinput('clear');
            $("#file-2").text("");
            // console.log($("#file-2").val());
            // $(`input[name="img_upload[]"][value="${data}"]`).remove();

        })
        .on('fileuploaded', function(event, data, previewId, index, id) {
            // console.log('aaa:'+this)
            var form = data.form,
                files = data.files,
                extra = data.extra,
                response = data.response,
                reader = data.reader;
            res_img = response.uploaded;
            index++;
            res_img_file = res_img.substring(0, res_img.lastIndexOf("."));
            $("body").find("form").append(
                `<input type="hidden" id="${res_img}" name="img_upload2[]" value="${res_img}">`);
            $("#file-2").text(res_img);
            // $("#file-2").prop('required', false);
            // console.log(event, data, previewId, index,id)

            four_number[index] = res_img;

            count_array.push(four_number[index]);
            console.log("index ::", index, "new index ::", count_array, "arrayLenght ::", count_array.length)
            // console.log("count_index ::",count_index = count_index + index)
            // four_number[index] = res_img
        })
        .on("filebatchselected", function(event, data, previewId, index) {
            var form = data.form,
                files = data.files,
                extra = data.extra,
                response = data.response,
                reader = data.reader;
            console.log( 'data.length: '+data );
            $("#file-2").fileinput("upload");
            // console.log("filebatchselected", data);
        })
        .on('filesuccessremove', function(event) {
        });
        // $("#send-data").on("click", function(e) {
        //     if(count_array.length == 0){
        //         // $("body").find("form").append(`<input type="hidden" name="img_upload[]" value="{{ asset('img/no_image.png') }}" required>`);
        //         $("#file-1").prop('required',true);
        //         $("#file-1").fileinput("upload");
        //         e.preventDefault()
        //         console.log("iff");
        //     }

        // $("#file-1").fileinput("upload");
        // else{
        //     $("#file-1").fileinput("upload");
        //     console.log("elseee");
        // }

        // });


        $(".test_res").click(function() {
            console.log(res_img);
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/keillion-dynamsoft-javascript-barcode@0.20201124110923.0/dist/dbr.js"
        data-productKeys="t0068NQAAAAYe5rtv/EEICK+bjDKnHsSZi4eRCBF7rQoo4BhbwBvsLTRt1TobT/J1jN00GtxRIdWW9OLEX3k889MgSuF1n5k=">
    </script>
    {{-- ------------------------------------------------------ Barcode Scanner ------------------------------------------ --}}
    <script>
        $(document).ready(function() {
            $('#barcodeaddProduct_btn').on('click', function() {

                let scanner = null;
                (async () => {

                    scanner = await Dynamsoft.DBR.BarcodeScanner.createInstance();
                    await scanner.setUIElement(document.getElementById(
                        'barcodeBodyModalNewProduct'));
                    await scanner.updateVideoSettings({
                        video: {
                            width: {
                                ideal: 460
                            },
                            height: {
                                ideal: 240
                            },
                            facingMode: {
                                ideal: 'environment'
                            }
                        }
                    });
                    scanner.onFrameRead = results => {
                        console.log(results);
                    };

                    $('#showNewProductBarcode_no').text('');
                    scanner.onUnduplicatedRead = (txt, result) => {

                        console.log(txt);
                        $('input[name="barcode"]').val(txt);

                        var barcode_input = $('input[name="barcode"]').val();

                        $('#showNewProductBarcode_no').text(barcode_input);
                        $('#NewProductbarcode_input').val(barcode_input);
                        $('#saveModalNewProduct').on('click', function() {
                            $('#NewProductBarcodeModal').modal('hide');
                        });

                    };
                    await scanner.show();
                })();
            });
            $('#check_margin').blur(function() {
                var i_margin = parseFloat($('#check_margin').val());
                var i_price = parseFloat($('#check_price').val());
                var i_price_special = parseFloat($('#check_price_special').val());

                if( i_price_special != '' && i_price_special > 0 ) {
                    if ( i_margin >= (i_price_special - 1) ) {
                        $(this).val(i_price_special - 1);
                    }
                } else {
                    if ( i_margin >= (i_price - 1) ) {
                        $(this).val(i_price - 1);
                    }
                }
            });
        });
    </script>
    {{-- ------------------------------------------------------ Barcode Scanner ------------------------------------------ --}}
@endsection