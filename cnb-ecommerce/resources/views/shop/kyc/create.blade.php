@extends('layouts.shop')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="row py-4 px-lg-4 px-md-2 px-0">
        <div class="col-12">
            <h3><strong>ยืนยันตัวตนร้านค้า</strong></h3>
        </div>

        <div class="col-12">
            <div class="form-row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                <div class="col-12">
                    <h3><strong>เลือกประเภท</strong></h3>
                </div>
                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-12 mb-1">
                            <input type="radio" id="defaultCheck3" name="tab" value="igotnthree" checked onclick="show3();"
                                style="cursor: pointer;" />
                            <label class="form-check-label" for="defaultCheck3" style="cursor: pointer;">
                                บุคคลทั่วไป
                            </label>
                        </div>
                        <!--div class="col-12 mb-1">
                            <input type="radio" id="defaultCheck1" name="tab" value="igotnone" checked onclick="show1();"
                                style="cursor: pointer;" />
                            <label class="form-check-label" for="defaultCheck1" style="cursor: pointer;">
                                นิติบุคคลทั่วไป
                            </label>
                        </div>
                        <div class="col-12">
                            <input type="radio" id="defaultCheck2" name="tab" value="igottwo" onclick="show2();"
                                style="cursor: pointer;" />
                            <label class="form-check-label" for="defaultCheck2" style="cursor: pointer;">
                                นิติบุคคล (ที่เกี่ยวกับเครื่องมือแพทย์)
                            </label>
                        </div-->
                    </div>
                </div>
                <form class="row" role="form" action="{{ url('shop/kyc/create') }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="shop_id" value="{{Auth::user()->shops[0]->id}}" >
                    <div class="col-12" id="div1" style="display: none;">
                        <input type="text" class="form-control" name="type_kyc" id="type_kyc" placeholder="type_kyc"
                            value="1" hidden>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h3><strong>นิติบุคคลทั่วไป</strong></h3>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6
                                                        เดือน)</strong></h5>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_first" onchange="readURL(this,1);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload1ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload1ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_second" onchange="readURL(this,2);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload2ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload2ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_fifth" onchange="readURL(this,7);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload7ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload7ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ url('shop/kyc') }}" class="btn btn-secondary px-4">ยกเลิก</a>

                                <button type="button" class="btn bg-blue btn-main px-4 ml-2 submit" data-toggle="modal"
                                    data-target="#addModal">
                                    บันทึก
                                </button>
                            </div>
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                ยืนยันตัวตน</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                คุณต้องการจะยืนยันตัวตนใช่หรือไม่?
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="row" role="form" action="{{ url('shop/kyc/create') }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="shop_id" value="{{Auth::user()->shops[0]->id}}" >
                    <div class="col-12" id="div2" style="display: none;">
                        <input type="text" class="form-control" name="type_kyc" id="type_kyc" placeholder="type_kyc"
                            value="2" hidden>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h3><strong>นิติบุคคล (ที่เกี่ยวกับเครื่องมือแพทย์)</strong></h3>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6
                                                        เดือน)</strong></h5>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_first" onchange="readURL(this,3);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload3ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload3ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_second" onchange="readURL(this,4);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload4ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload4ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>สน.1</strong></h5>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_third" onchange="readURL(this,5);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload5ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload5ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>ฆพ. (ถ้ามี)</strong>
                                                </h5>
                                                <span class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                <br>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_fourth" onchange="readURL(this,6);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload6ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload6ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_fifth" onchange="readURL(this,8);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload8ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload8ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ url('shop/kyc') }}" class="btn btn-secondary px-4">ยกเลิก</a>

                                <button type="button" class="btn btns btn-main px-4 ml-2 submit" data-toggle="modal"
                                    data-target="#addModal2">
                                    บันทึก
                                </button>
                            </div>
                            <div class="modal fade" id="addModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                ยืนยันตัวตน</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                คุณต้องการจะยืนยันตัวตนใช่หรือไม่?
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="row" role="form" action="{{ url('shop/kyc/create') }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="shop_id" value="{{Auth::user()->shops[0]->id}}" >
                    <div class="col-12" id="div3">
                        <input type="text" class="form-control" name="type_kyc" id="type_kyc" placeholder="type_kyc"
                            value="3" hidden>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h3><strong>บุคคลทั่วไป</strong></h3>
                            </div>
                            <!--div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_first" onchange="readURL(this,1);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload1ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload1ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div-->
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                style="width: 45px;" alt="image">
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>รูปถ่ายคู่กับบัตรประชาชน</strong></h5>
                                                <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                        <button class="btn btns btn-main btn-file w-100">
                                            อัพโหลดไฟล์
                                            <input type="file" name="image_second" onchange="readURL(this,2);" required>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="/img/no_image.png"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                class="w-100 upload2ShowImage" alt="your image" />
                                            <i class="fas fa-file-pdf fa-10x upload2ShowIcon d-none"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ url('shop/kyc') }}" class="btn btn-secondary px-4">ยกเลิก</a>

                                <button type="button" class="btn btns btn-main px-4 ml-2 submit" data-toggle="modal"
                                    data-target="#addModal3">
                                    บันทึก
                                </button>
                            </div>
                            <div class="modal fade" id="addModal3" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                ยืนยันตัวตน</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                คุณต้องการจะยืนยันตัวตนใช่หรือไม่?
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>
        function show1() {
            document.getElementById('div1').style.display = 'block';
            document.getElementById('div2').style.display = 'none';
            document.getElementById('div3').style.display = 'none';
        }

        function show2() {
            document.getElementById('div1').style.display = 'none';
            document.getElementById('div2').style.display = 'block';
            document.getElementById('div3').style.display = 'none';
        }

        function show3() {
            document.getElementById('div1').style.display = 'none';
            document.getElementById('div2').style.display = 'none';
            document.getElementById('div3').style.display = 'block';
        }

        function readURL(input, index) {
            if (input.files && input.files[0]) {
                var extension = input.files[0].name.split('.').pop().toLowerCase()
                var reader = new FileReader();
                $('.upload' + index + 'ShowImage, .upload' + index + 'ShowIcon').addClass('d-none');
                reader.onload = function(e) {
                    if (extension != 'pdf') {
                        $('.upload' + index + 'ShowImage').removeClass('d-none').attr('src', e.target.result);
                    } else {
                        $('.upload' + index + 'ShowIcon').removeClass('d-none')
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
