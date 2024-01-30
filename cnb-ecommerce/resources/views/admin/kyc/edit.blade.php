@extends('layouts.dashboard') 
@section('content')
<div class="p-0">
    <div class="row py-4">
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-lg-row">
                    <div class="">
                        <h5 class="mb-0">
                            <b>
                                แก้ไขสถานะการยืนยันตัวตนร้านค้า
                            </b>
                        </h5>
                    </div>
                </div>

                <form class="row" role="form" action="{{ url('dashboard/kyc/edit') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $kyc_admin->id }}" />
                    <input type="hidden" name="status_first" value="{{ $kyc_admin->status_first }}" />
                    <input type="hidden" name="status_second" value="{{ $kyc_admin->status_second }}" />
                    <input type="hidden" name="status_third" value="{{ $kyc_admin->status_third }}" />
                    <input type="hidden" name="status_fourth" value="{{ $kyc_admin->status_fourth }}" />
                    <input type="hidden" name="status_fifth" value="{{ $kyc_admin->status_fifth }}" />
                    <input type="hidden" name="admin_id" value="{{ Auth::guard('admin')->user()->id }}" />
                    <div class="col-12 pb-3">
                        <strong>ประเภท : @if ($kyc_admin->type_kyc == 1) นิติบุคคลทั่วไป @elseif ($kyc_admin->type_kyc == 3) บุคคลทั่วไป @else นิติบุคคล (ที่เกี่ยวกับเครื่องมือแพทย์) @endif </strong>
                    </div>

                    <!--div class="col-12 col-lg-6 pb-3 d-flex align-items-stretch mb-3 p-0">
                        <div class="row w-100 mx-0">
                            <div class="col-lg-12 col-md-12 col-12" style="height: calc(100% - 70px);">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef; height: 100%;">
                                    <div class="col-12">
                                        <div class="media">
                                            @if ($kyc_admin->status_first == 1)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-success.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6 เดือน)</strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                            </div>
                                            @elseif ($kyc_admin->status_first == 2)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6 เดือน)</strong></h5>
                                                <span style="color: #6a7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                            </div>
                                            @else
                                            <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6 เดือน)</strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_admin->image_first) }}" target="_blank">
                                                <i class="fas fa-file-pdf fa-10x upload1ShowIcon {{ substr($kyc_admin->image_first, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img
                                                    src="{{ asset($kyc_admin->image_first) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload1ShowImage {{ substr($kyc_admin->image_first, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image"
                                                />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row p-3">
                                    <label for="status_first">สถานะ</label>
                                    <select class="form-control" name="status_first" id="status_first">
                                        <option selected value="{{ $kyc_admin->status_first }}" disabled="">
                                            @if ($kyc_admin->status_first == 1) ยอมรับการยืนยันตัวตนร้านค้า @elseif ($kyc_admin->status_first == 2) รอการดำเนินการยืนยันตัวตนร้านค้า @else ปฎิเสธการยืนยันตัวตนร้านค้า @endif
                                        </option>
                                        <option value="3">ปฎิเสธการยืนยันตัวตนร้านค้า</option>
                                        <option value="1">ยอมรับการยืนยันตัวตนร้านค้า</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div-->

                    <div class="col-12 col-lg-6 pb-3 d-flex align-items-stretch mb-3 p-0">
                        <div class="row w-100 mx-0">
                            <div class="col-lg-12 col-md-12 col-12" style="height: calc(100% - 70px);">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef; height: 100%;">
                                    <div class="col-lg-12 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            @if ($kyc_admin->status_second == 1)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-success.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>รูปถ่ายคู่บัตรประชาชน</strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                            </div>
                                            @elseif ($kyc_admin->status_second == 2)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>รูปถ่ายคู่บัตรประชาชน</strong></h5>
                                                <span style="color: #6a7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                            </div>
                                            @else
                                            <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>รูปถ่ายคู่บัตรประชาชน</strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_admin->image_second) }}" target="_blank">
                                                <i class="fas fa-file-pdf fa-10x upload2ShowIcon {{ substr($kyc_admin->image_second, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img
                                                    src="{{ asset($kyc_admin->image_second) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload2ShowImage {{ substr($kyc_admin->image_second, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image"
                                                />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row p-3">
                                    <label for="status_second">สถานะ</label>
                                    <select class="form-control" name="status_second" id="status_second">
                                        <option selected value="{{ $kyc_admin->status_second }}" disabled="">
                                            @if ($kyc_admin->status_second == 1) ยอมรับการยืนยันตัวตนร้านค้า @elseif ($kyc_admin->status_second == 2) รอการดำเนินการยืนยันตัวตนร้านค้า @else ปฎิเสธการยืนยันตัวตนร้านค้า @endif
                                        </option>
                                        <option value="3">ปฎิเสธการยืนยันตัวตนร้านค้า</option>
                                        <option value="1">ยอมรับการยืนยันตัวตนร้านค้า</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($kyc_admin->type_kyc == 2)
                    <div class="col-12 col-lg-6 pb-3 d-flex align-items-stretch mb-3 p-0">
                        <div class="row w-100 mx-0">
                            <div class="col-lg-12 col-md-12 col-12" style="height: calc(100% - 70px);">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef; height: 100%;">
                                    <div class="col-12">
                                        <div class="media">
                                            @if ($kyc_admin->status_third == 1)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-success.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>เอกสารใบจดทะเบียนสถานประกอบการนำเข้าเครื่องมือแพทย์ (สน.1) </strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                            </div>
                                            @elseif ($kyc_admin->status_third == 2)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>เอกสารใบจดทะเบียนสถานประกอบการนำเข้าเครื่องมือแพทย์ (สน.1) </strong></h5>
                                                <span style="color: #6a7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                            </div>
                                            @else
                                            <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>เอกสารใบจดทะเบียนสถานประกอบการนำเข้าเครื่องมือแพทย์ (สน.1) </strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_admin->image_third) }}" target="_blank">
                                                <i class="fas fa-file-pdf fa-10x upload3ShowIcon {{ substr($kyc_admin->image_third, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img
                                                    src="{{ asset($kyc_admin->image_third) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload3ShowImage {{ substr($kyc_admin->image_third, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image"
                                                />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row p-3">
                                    <label for="status_third">สถานะ</label>
                                    <select class="form-control" name="status_third" id="status_third">
                                        <option selected value="{{ $kyc_admin->status_third }}" disabled="">
                                            @if ($kyc_admin->status_third == 1) ยอมรับการยืนยันตัวตนร้านค้า @elseif ($kyc_admin->status_third == 2) รอการดำเนินการยืนยันตัวตนร้านค้า @else ปฎิเสธการยืนยันตัวตนร้านค้า @endif
                                        </option>
                                        <option value="3">ปฎิเสธการยืนยันตัวตนร้านค้า</option>
                                        <option value="1">ยอมรับการยืนยันตัวตนร้านค้า</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 pb-3 d-flex align-items-stretch mb-3 p-0">
                        <div class="row w-100 mx-0">
                            <div class="col-lg-12 col-md-12 col-12" style="height: calc(100% - 70px);">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef; height: 100%;">
                                    <div class="col-12">
                                        <div class="media">
                                            @if ($kyc_admin->status_fourth == 1)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-success.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>เอกสารใบอนุญาตโฆษณาเครื่องมือแพทย์ (ฆพ.) </strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                            </div>
                                            @elseif ($kyc_admin->status_fourth == 2)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>เอกสารใบอนุญาตโฆษณาเครื่องมือแพทย์ (ฆพ.) </strong></h5>
                                                <span style="color: #6a7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                            </div>
                                            @else
                                            <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>เอกสารใบอนุญาตโฆษณาเครื่องมือแพทย์ (ฆพ.) </strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_admin->image_fourth) }}" target="_blank">
                                                <i class="fas fa-file-pdf fa-10x upload4ShowIcon {{ substr($kyc_admin->image_fourth, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img
                                                    src="{{ asset($kyc_admin->image_fourth) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload4ShowImage {{ substr($kyc_admin->image_fourth, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image"
                                                />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row p-3">
                                    <label for="status_fourth">สถานะ</label>
                                    <select class="form-control" name="status_fourth" id="status_fourth">
                                        <option selected value="{{ $kyc_admin->status_fourth }}" disabled="">
                                            @if ($kyc_admin->status_fourth == 1) ยอมรับการยืนยันตัวตนร้านค้า @elseif ($kyc_admin->status_fourth == 2) รอการดำเนินการยืนยันตัวตนร้านค้า @else ปฎิเสธการยืนยันตัวตนร้านค้า @endif
                                        </option>
                                        <option value="3">ปฎิเสธการยืนยันตัวตนร้านค้า</option>
                                        <option value="1">ยอมรับการยืนยันตัวตนร้านค้า</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif @if ($kyc_admin->type_kyc == 1 || $kyc_admin->type_kyc == 2)
                    <div class="col-12 col-lg-6 pb-3 d-flex align-items-stretch mb-3 p-0">
                        <div class="row w-100 mx-0">
                            <div class="col-lg-12 col-md-12 col-12" style="height: calc(100% - 70px);">
                                <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef; height: 100%;">
                                    <div class="col-lg-12 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                        <div class="media">
                                            @if ($kyc_admin->status_fifth == 1)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-success.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                            </div>
                                            @elseif ($kyc_admin->status_fifth == 2)
                                            <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                <span style="color: #6a7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                            </div>
                                            @else
                                            <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png" style="width: 45px;" alt="image" />
                                            <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                <h5 class="mt-0 mb-1"><strong>ภาพถ่ายบัตรประชาชน</strong></h5>
                                                <span style="color: #6a7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ asset($kyc_admin->image_fifth) }}" target="_blank">
                                                <i class="fas fa-file-pdf fa-10x upload2ShowIcon {{ substr($kyc_admin->image_fifth, -4) == '.pdf' ? '' : 'd-none' }}"></i>
                                                <img
                                                    src="{{ asset($kyc_admin->image_fifth) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    class="w-100 upload5ShowImage {{ substr($kyc_admin->image_fifth, -4) != '.pdf' ? '' : 'd-none' }}"
                                                    alt="your image"
                                                />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row p-3">
                                    <label for="status_fifth">สถานะ</label>
                                    <select class="form-control" name="status_fifth" id="status_fifth">
                                        <option selected value="{{ $kyc_admin->status_fifth }}" disabled="">
                                            @if ($kyc_admin->status_fifth == 1) ยอมรับการยืนยันตัวตนร้านค้า @elseif ($kyc_admin->status_fifth == 2) รอการดำเนินการยืนยันตัวตนร้านค้า @else ปฎิเสธการยืนยันตัวตนร้านค้า @endif
                                        </option>
                                        <option value="3">ปฎิเสธการยืนยันตัวตนร้านค้า</option>
                                        <option value="1">ยอมรับการยืนยันตัวตนร้านค้า</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col-12 text-center">
                        <a href="{{ url('dashboard/kyc') }}" class="btn btn-secondary">ย้อนกลับ</a>

                        <button type="button" class="btn btn-main-set" data-toggle="modal" data-target="#editModal{{ $kyc_admin->id }}">
                            บันทึก
                        </button>
                    </div>

                    <div class="modal fade" id="editModal{{ $kyc_admin->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        แก้ไขการยืนยันตัวตนร้านค้า
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        คุณต้องการจะแก้ไขการยืนยันตัวตนร้านค้านี้ใช่หรือไม่?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-main-set">ยืนยัน</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style type="text/css" scoped>
    .position-text {
        position: absolute;
        right: 15px;
        top: 0;
        font-size: 12px;
        color: red;
    }

    .form-group {
        position: relative;
    }
     a {
        color: #666;
    }

    a:hover {
        color: #02a2d4;
        text-decoration: none;
    }
</style>

@endsection @section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
