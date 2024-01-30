@extends('layouts.shop')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="row py-4 px-lg-4 px-md-2 px-0">
        <div class="col-12">
            <h3><strong>แก้ไขการยืนยันตัวตนร้านค้า</strong></h3>
        </div>

        <div class="col-12">
            <div class="form-row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                <div class="col-12 pb-3">
                    <h3>
                        <strong>ประเภทปัจจุบัน :
                            @if ($kyc_edit->type_kyc == 1)
                                นิติบุคคลทั่วไป
                            @elseif ($kyc_edit->type_kyc == 3)
                                บุคคลทั่วไป
                            @else
                                นิติบุคคล (ที่เกี่ยวกับเครื่องมือแพทย์)
                            @endif
                        </strong>
                    </h3>
                </div>
                <div class="col-12">
                    <h3><strong><span class="text-danger">*</span> เลือกประเภท</strong></h3>
                </div>
                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-12 mb-1">
                            <input type="radio" id="defaultCheck3" name="tab" value="igotnthree" onclick="show3();"
                                style="cursor: pointer;" @if ($kyc_edit->type_kyc == 3) checked @else @endif />
                            <label class="form-check-label" for="defaultCheck3" style="cursor: pointer;">
                                บุคคลทั่วไป
                            </label>
                        </div>
                        <!--div class="col-12 mb-1">
                            <input type="radio" id="defaultCheck1" name="tab" value="igotnone" onclick="show1();"
                                style="cursor: pointer;" @if ($kyc_edit->type_kyc == 1) checked @else @endif />
                            <label class="form-check-label" for="defaultCheck1" style="cursor: pointer;">
                                นิติบุคคลทั่วไป
                            </label>
                        </div>
                        <div class="col-12">
                            <input type="radio" id="defaultCheck2" name="tab" value="igottwo" onclick="show2();"
                                style="cursor: pointer;" @if ($kyc_edit->type_kyc == 2) checked @else @endif />
                            <label class="form-check-label" for="defaultCheck2" style="cursor: pointer;">
                                นิติบุคคล (ที่เกี่ยวกับเครื่องมือแพทย์)
                            </label>
                        </div-->
                    </div>
                </div>
                <form class="row" role="form" action="{{ url('shop/kyc/edit') }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="shop_id" value="{{Auth::user()->shops[0]->id}}" hidden>
                    <div class="col-12" id="div1" style="@if ($kyc_edit->type_kyc == 1) display: block; @else display: none; @endif">
                        <input type="text" class="form-control" name="id" id="id" placeholder="id"
                            value="{{ $kyc_edit->id }}" hidden>
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
                                            @if ($kyc_edit->status_first == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6
                                                            เดือน)</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                </div>
                                            @elseif ($kyc_edit->status_first == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6
                                                            เดือน)</strong></h5>
                                                    <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6
                                                            เดือน)</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_first == 2 || $kyc_edit->status_first == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_first" onchange="readURL(this,1);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_first) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload1ShowIcon {{ substr($kyc_edit->image_first, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_first) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload1ShowImage {{ substr($kyc_edit->image_first, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            @if ($kyc_edit->status_second == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                </div>
                                            @elseif ($kyc_edit->status_second == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                                    <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_second == 2 || $kyc_edit->status_second == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_second" onchange="readURL(this,2);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_second) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload2ShowIcon {{ substr($kyc_edit->image_second, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_second) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload2ShowImage {{ substr($kyc_edit->image_second, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            @if ($kyc_edit->status_fifth == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                </div>
                                            @elseif ($kyc_edit->status_fifth == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_fifth == 2 || $kyc_edit->status_fifth == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_fifth" onchange="readURL(this,3);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_fifth) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload3ShowIcon {{ substr($kyc_edit->image_fifth, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_fifth) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload3ShowImage {{ substr($kyc_edit->image_fifth, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ url('shop/kyc') }}" class="btn btn-secondary px-4">ยกเลิก</a>

                                <button type="button" class="btn btns btn-main px-4 ml-2 submit" data-toggle="modal"
                                    data-target="#editModal">
                                    บันทึก
                                </button>
                            </div>
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                แก้ไขการยืนยันตัวตน</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                คุณต้องการจะแก้ไขการยืนยันตัวตนใช่หรือไม่?
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
                <form class="row" role="form" action="{{ url('shop/kyc/edit') }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-12" id="div2" style="@if ($kyc_edit->type_kyc == 2) display: block; @else display: none; @endif">
                        <input type="text" class="form-control" name="id" id="id" placeholder="id"
                            value="{{ $kyc_edit->id }}" hidden>
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
                                            @if ($kyc_edit->status_first == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6
                                                            เดือน)</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                </div>
                                            @elseif ($kyc_edit->status_first == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6
                                                            เดือน)</strong></h5>
                                                    <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6
                                                            เดือน)</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_first == 2 || $kyc_edit->status_first == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_first" onchange="readURL(this,4);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_first) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload4ShowIcon {{ substr($kyc_edit->image_first, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_first) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload4ShowImage {{ substr($kyc_edit->image_first, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            @if ($kyc_edit->status_second == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                </div>
                                            @elseif ($kyc_edit->status_second == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                                    <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_second == 2 || $kyc_edit->status_second == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_second" onchange="readURL(this,5);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_second) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload5ShowIcon {{ substr($kyc_edit->image_second, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_second) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload5ShowImage {{ substr($kyc_edit->image_second, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            @if ($kyc_edit->status_third == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>สน.1</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                </div>
                                            @elseif ($kyc_edit->status_third == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>สน.1</strong></h5>
                                                    <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>สน.1</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_third == 2 || $kyc_edit->status_third == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_third" onchange="readURL(this,6);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_third) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload6ShowIcon {{ substr($kyc_edit->image_third, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_third) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload6ShowImage {{ substr($kyc_edit->image_third, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            @if ($kyc_edit->status_fourth == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ฆพ. (ถ้ามี)</strong>
                                                    </h5>
                                                    <span class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                    <br>
                                                    <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                                </div>
                                            @elseif ($kyc_edit->status_fourth == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ฆพ. (ถ้ามี)</strong>
                                                    </h5>
                                                    <span class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                    <br>
                                                    <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ฆพ. (ถ้ามี)</strong>
                                                    </h5>
                                                    <span class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                    <br>
                                                    <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_fourth == 2 || $kyc_edit->status_fourth == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_fourth" onchange="readURL(this,7);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_fourth) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload7ShowIcon {{ substr($kyc_edit->image_fourth, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_fourth) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload7ShowImage {{ substr($kyc_edit->image_fourth, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            @if ($kyc_edit->status_fifth == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                </div>
                                            @elseif ($kyc_edit->status_fifth == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_fifth == 2 || $kyc_edit->status_fifth == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_fifth" onchange="readURL(this,8);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_fifth) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload8ShowIcon {{ substr($kyc_edit->image_fifth, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_fifth) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload8ShowImage {{ substr($kyc_edit->image_fifth, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ url('shop/kyc') }}" class="btn btn-secondary px-4">ยกเลิก</a>

                                <button type="button" class="btn btns btn-main px-4 ml-2 submit" data-toggle="modal"
                                    data-target="#editModal2">
                                    บันทึก
                                </button>
                            </div>
                            <div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                แก้ไขการยืนยันตัวตน</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                คุณต้องการจะแก้ไขการยืนยันตัวตนใช่หรือไม่?
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
                <form class="row" role="form" action="{{ url('shop/kyc/edit') }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="shop_id" value="{{Auth::user()->shops[0]->id}}" hidden>
                    <div class="col-12" id="div3" style="@if ($kyc_edit->type_kyc == 3) display: block; @else display: none; @endif">
                        <input type="text" class="form-control" name="id" id="id" placeholder="id"
                            value="{{ $kyc_edit->id }}" hidden>
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
                                            @if ($kyc_edit->status_first == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                </div>
                                            @elseif ($kyc_edit->status_first == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_first == 2 || $kyc_edit->status_first == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_first" onchange="readURL(this,9);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_first) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload9ShowIcon {{ substr($kyc_edit->image_first, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_first) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload9ShowImage {{ substr($kyc_edit->image_first, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div-->
                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                    <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            @if ($kyc_edit->status_second == 1)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>รูปถ่ายคู่กับบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                </div>
                                            @elseif ($kyc_edit->status_second == 2)
                                                <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>รูปถ่ายคู่กับบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                </div>
                                            @else
                                                <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                    style="width: 45px;" alt="image">
                                                <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                    <h5 class="mt-0 mb-1"><strong>รูปถ่ายคู่กับบัตรประชาชน</strong></h5>
                                                    <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($kyc_edit->status_second == 2 || $kyc_edit->status_second == 3)
                                        <div
                                            class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                            <button class="btn btns btn-main btn-file w-100">
                                                อัพโหลดไฟล์
                                                <input type="file" name="image_second" onchange="readURL(this,10);">
                                            </button>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_edit->image_second) }}" target="_blank">
                                                <i
                                                    class="fas fa-file-pdf fa-10x upload10ShowIcon {{ substr($kyc_edit->image_second, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img src="{{ asset($kyc_edit->image_second) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload10ShowImage {{ substr($kyc_edit->image_second, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ url('shop/kyc') }}" class="btn btn-secondary px-4">ยกเลิก</a>

                                <button type="button" class="btn btns btn-main px-4 ml-2 submit" data-toggle="modal"
                                    data-target="#editModal3">
                                    บันทึก
                                </button>
                            </div>
                            <div class="modal fade" id="editModal3" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                แก้ไขการยืนยันตัวตน</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                คุณต้องการจะแก้ไขการยืนยันตัวตนใช่หรือไม่?
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
