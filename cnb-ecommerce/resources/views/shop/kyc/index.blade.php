@extends('layouts.shop')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('style')
    <style>
        /* .o-btn {
            border-radius: 8px;
            background-color: #7BCFDD;
            padding: 10px;
            color: white;
            border: 0px;
        } */

    </style>
@endsection
@section('content')
    <div class="row py-4 px-lg-4 px-md-2 px-0">
        <div class="col-12 px-1 pt-4 d-flex flex-row">
            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-5">
                <h3><strong>ยืนยันตัวตนร้านค้า</strong></h3>
            </div>
            @if (sizeof($kyc) == 0)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-2 pb-4" style='text-align : right;'>
                    <a class="btn o-btn" href="{{ url('/shop/kyc/create') }}">+ ยืนยันตัวตน
                    </a>
                </div>
            @else
            @endif
            @if (isset($kyc[0]) && (($kyc[0]->type_kyc == 2 && $kyc[0]->status_first != 1) || $kyc[0]->status_second != 1 || $kyc[0]->status_third != 1))
                <!--div class="col-lg-3 col-md-3 col-sm-6 col-xs-2 pb-4" style='text-align : right;'>
                    <a class="btn o-btns" href="{{ url('/shop/kyc/edit') }}"><i class="fa fa-edit"></i>
                        เปลี่ยนประเภทนิติบุคคล
                    </a>
                </div-->
            @endif
        </div>
        @foreach ($kyc as $value)
            @if ($value->user_id = Auth::user()->id)
                <div class="col-12">
                    <div class="form-row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                        <div class="col-12 pb-3">
                            <h3>
                                <strong>ประเภท :
                                    @php
                                        $s_sts1_name = '';
                                        $s_sts2_name = '';
                                        $s_sts3_name = '';
                                        $s_sts4_name = '';
                                        $s_sts5_name = '';
                                    @endphp
                                    @if ($value->type_kyc == 1)
                                        นิติบุคคลทั่วไป
                                        @php
                                            $s_sts1_name = 'หนังสือรับรอง (อายุไม่เกิน 6 เดือน)';
                                            $s_sts2_name = 'ภ.พ.20';
                                            $s_sts5_name = 'ภาพถ่ายบัตรประชาชน';
                                        @endphp
                                    @elseif ($value->type_kyc == 3)
                                        บุคคลทั่วไป
                                        @php
                                            $s_sts1_name = 'ภาพถ่ายบัตรประชาชน';
                                            $s_sts2_name = 'รูปถ่ายคู่กับบัตรประชาชน';
                                        @endphp
                                    @else
                                        นิติบุคคล (ที่เกี่ยวกับเครื่องมือแพทย์)
                                        @php
                                            $s_sts1_name = 'หนังสือรับรอง (อายุไม่เกิน 6 เดือน)';
                                            $s_sts2_name = 'ภ.พ.20';
                                            $s_sts3_name = 'สน.1';
                                            $s_sts4_name = 'ฆพ. (ถ้ามี)';
                                            $s_sts5_name = 'ภาพถ่ายบัตรประชาชน';
                                        @endphp
                                    @endif
                                </strong>
                            </h3>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <!--div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                    <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                        <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                            <div class="media">
                                                @if ($value->status_first == 1)
                                                    <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                        style="width: 45px;" alt="image">
                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                        <h5 class="mt-0 mb-1"><strong>{{ $s_sts1_name }}</strong></h5>
                                                        <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                    </div>
                                                @elseif ($value->status_first == 2)
                                                    <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                        style="width: 45px;" alt="image">
                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                        <h5 class="mt-0 mb-1"><strong>{{ $s_sts1_name }}</strong></h5>
                                                        <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                    </div>
                                                @else
                                                    <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                        style="width: 45px;" alt="image">
                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                        <h5 class="mt-0 mb-1"><strong>{{ $s_sts1_name }}</strong></h5>
                                                        <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if ($value->status_first == 2 || $value->status_first == 3)
                                            <div
                                                class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                                <a class="btn btns btn-main btn-file w-100"
                                                    href="{{ url('/shop/kyc/edit') }}"><i
                                                        class="fa fa-edit"></i>
                                                    แก้ไขข้อมูล
                                                </a>
                                            </div>
                                        @else
                                        @endif
                                        <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ asset($value->image_first) }}" target="_blank">
                                                    @if (substr("$value->image_first", -4) == '.pdf')
                                                        <i class="fas fa-file-pdf fa-10x"></i>
                                                    @else
                                                        <img src="{{ asset($value->image_first) }}"
                                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                            class="w-100" alt="your image" />
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                                <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                    <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                        <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                            <div class="media">
                                                @if ($value->status_second == 1)
                                                    <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                        style="width: 45px;" alt="image">
                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                        <h5 class="mt-0 mb-1"><strong>{{ $s_sts2_name }}</strong></h5>
                                                        <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                    </div>
                                                @elseif ($value->status_second == 2)
                                                    <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                        style="width: 45px;" alt="image">
                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                        <h5 class="mt-0 mb-1"><strong>{{ $s_sts2_name }}</strong></h5>
                                                        <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                    </div>
                                                @else
                                                    <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                        style="width: 45px;" alt="image">
                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                        <h5 class="mt-0 mb-1"><strong>{{ $s_sts2_name }}</strong></h5>
                                                        <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if ($value->status_second == 2 || $value->status_second == 3)
                                            <div
                                                class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                                <a class="btn btns btn-main btn-file w-100"
                                                    href="{{ url('/shop/kyc/edit') }}"><i
                                                        class="fa fa-edit"></i>
                                                    แก้ไขข้อมูล
                                                </a>
                                            </div>
                                        @else
                                        @endif
                                        <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ asset($value->image_second) }}" target="_blank">
                                                    @if (substr("$value->image_second", -4) == '.pdf')
                                                        <i class="fas fa-file-pdf fa-10x"></i>
                                                    @else
                                                        <img src="{{ asset($value->image_second) }}"
                                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                            class="w-100" alt="your image" />
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ( $value->type_kyc == '1' )
                                <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                    <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                        <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                            <div class="media">
                                                @if ($value->status_fifth == 1)
                                                    <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                        style="width: 45px;" alt="image">
                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                        <h5 class="mt-0 mb-1"><strong>{{ $s_sts5_name }}</strong></h5>
                                                        <span style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                    </div>
                                                @elseif ($value->status_fifth == 2)
                                                    <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                        style="width: 45px;" alt="image">
                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                        <h5 class="mt-0 mb-1"><strong>{{ $s_sts5_name }}</strong></h5>
                                                        <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                    </div>
                                                @else
                                                    <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                        style="width: 45px;" alt="image">
                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                        <h5 class="mt-0 mb-1"><strong>{{ $s_sts5_name }}</strong></h5>
                                                        <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if ($value->status_fifth == 2 || $value->status_fifth == 3)
                                            <div
                                                class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                                <a class="btn btn-main btn-file w-100"
                                                    href="{{ url('/shop/kyc/edit') }}"><i
                                                        class="fa fa-edit"></i>
                                                    แก้ไขข้อมูล
                                                </a>
                                            </div>
                                        @else
                                        @endif
                                        <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ asset($value->image_second) }}" target="_blank">
                                                    @if (substr("$value->image_fifth", -4) == '.pdf')
                                                        <i class="fas fa-file-pdf fa-10x"></i>
                                                    @else
                                                        <img src="{{ asset($value->image_fifth) }}"
                                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                            class="w-100" alt="your image" />
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if ($value->type_kyc == 2)
                                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                        <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                                <div class="media">
                                                    @if ($value->status_third == 1)
                                                        <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                            style="width: 45px;" alt="image">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1"><strong>เอกสารใบจดทะเบียนสถานประกอบการนำเข้าเครื่องมือแพทย์ (สน.1)</strong></h5>
                                                            <span
                                                                style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                        </div>
                                                    @elseif ($value->status_third == 2)
                                                        <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                            style="width: 45px;" alt="image">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1"><strong>เอกสารใบจดทะเบียนสถานประกอบการนำเข้าเครื่องมือแพทย์ (สน.1)</strong></h5>
                                                            <span
                                                                style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                        </div>
                                                    @else
                                                        <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                            style="width: 45px;" alt="image">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1"><strong>เอกสารใบจดทะเบียนสถานประกอบการนำเข้าเครื่องมือแพทย์ (สน.1)</strong></h5>
                                                            <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @if ($value->status_third == 2 || $value->status_third == 3)
                                                <div
                                                    class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                                    <a class="btn btn-main btn-file w-100"
                                                        href="{{ url('/shop/kyc/edit') }}"><i
                                                            class="fa fa-edit"></i>
                                                        แก้ไขข้อมูล
                                                    </a>
                                                </div>
                                            @else
                                            @endif
                                            <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="{{ asset($value->image_third) }}" target="_blank">
                                                        @if (substr("$value->image_third", -4) == '.pdf')
                                                            <i class="fas fa-file-pdf fa-10x"></i>
                                                        @else
                                                            <img src="{{ asset($value->image_third) }}"
                                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                                class="w-100" alt="your image" />
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                        <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                                <div class="media">
                                                    @if ($value->status_fourth == 1)
                                                        <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                            style="width: 45px;" alt="image">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1"><strong>เอกสารใบอนุญาตโฆษณาเครื่องมือแพทย์ (ฆพ.) (ถ้ามี)</strong></h5>
                                                            </h5>
                                                            <span
                                                                class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                            <br>
                                                            <span
                                                                style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                        </div>
                                                    @elseif ($value->status_fourth == 2)
                                                        <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                            style="width: 45px;" alt="image">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1"><strong>เอกสารใบอนุญาตโฆษณาเครื่องมือแพทย์ (ฆพ.) (ถ้ามี)</strong></h5>
                                                            </h5>
                                                            <span
                                                                class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                            <br>
                                                            <span
                                                                style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                        </div>
                                                    @else
                                                        <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                            style="width: 45px;" alt="image">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1"><strong>เอกสารใบอนุญาตโฆษณาเครื่องมือแพทย์ (ฆพ.) (ถ้ามี)</strong></h5>
                                                            </h5>
                                                            <span
                                                                class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                            <br>
                                                            <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @if ($value->status_fourth == 2 || $value->status_fourth == 3)
                                                <div
                                                    class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                                    <a class="btn btn-main btn-file w-100"
                                                        href="{{ url('/shop/kyc/edit') }}"><i
                                                            class="fa fa-edit"></i>
                                                        แก้ไขข้อมูล
                                                    </a>
                                                </div>
                                            @else
                                            @endif
                                            <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="{{ asset($value->image_fourth) }}" target="_blank">
                                                        @if (substr("$value->image_fourth", -4) == '.pdf')
                                                            <i class="fas fa-file-pdf fa-10x"></i>
                                                        @else
                                                            <img src="{{ asset($value->image_fourth) }}"
                                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                                class="w-100" alt="your image" />
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                                        <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                                            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                                <div class="media">
                                                    @if ($value->status_fifth == 1)
                                                        <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                            style="width: 45px;" alt="image">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1"><strong>เอกสารใบอนุญาตโฆษณาเครื่องมือแพทย์ (ฆพ.) (ถ้ามี)</strong></h5>
                                                            </h5>
                                                            <span
                                                                class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                            <br>
                                                            <span
                                                                style="color: #6A7187;">ตรวจสอบข้อมูลถูกต้องเรียบร้อย</span>
                                                        </div>
                                                    @elseif ($value->status_fifth == 2)
                                                        <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                            style="width: 45px;" alt="image">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1"><strong>เอกสารใบอนุญาตโฆษณาเครื่องมือแพทย์ (ฆพ.) (ถ้ามี)</strong></h5>
                                                            </h5>
                                                            <span
                                                                class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                            <br>
                                                            <span
                                                                style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                        </div>
                                                    @else
                                                        <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                            style="width: 45px;" alt="image">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1"><strong>เอกสารใบอนุญาตโฆษณาเครื่องมือแพทย์ (ฆพ.) (ถ้ามี)</strong></h5>
                                                            </h5>
                                                            <span
                                                                class="text-danger">(ถ้าไม่มีสามารถยื่นเอกสารทางเราได้)</span>
                                                            <br>
                                                            <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @if ($value->status_fifth == 2 || $value->status_fifth == 3)
                                                <div
                                                    class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                                    <a class="btn btn-main btn-file w-100"
                                                        href="{{ url('/shop/kyc/edit') }}"><i
                                                            class="fa fa-edit"></i>
                                                        แก้ไขข้อมูล
                                                    </a>
                                                </div>
                                            @else
                                            @endif
                                            <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="{{ asset($value->image_fourth) }}" target="_blank">
                                                        @if (substr("$value->image_fifth", -4) == '.pdf')
                                                            <i class="fas fa-file-pdf fa-10x"></i>
                                                        @else
                                                            <img src="{{ asset($value->image_fifth) }}"
                                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                                class="w-100" alt="your image" />
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
