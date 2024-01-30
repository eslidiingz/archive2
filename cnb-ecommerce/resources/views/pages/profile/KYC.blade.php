@extends('layouts.profile')
@section('style')
    <style>
        .nav_custom_cat {
            display: none !important;
        }

        .footer-area {
            display: none;
        }

        #kyc_pic1::before {
            content: 'เลือกรูปภาพ';
            display: inline-block;
            background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 1px solid #999;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
        }

        #kyc_pic1::-webkit-file-upload-button {
            visibility: hidden;
        }

        .cate-all {
            display: none !important;
        }

    </style>
@endsection
@section('content')
    @php
    if (session('alert') != null && session('alert') != '') {
        $alert = session('alert');
        session()->forget('alert');
    } else {
        $alert = '';
    }
    @endphp
    <div class="container pb_custom_footer">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-3 d-xl-block d-lg-block d-md-none d-none px-0 sticky-top mr-0"
                        style="height: calc(100vh - 131px); top: 131px; z-index: 900;">
                        @include('includes._menu_left_user_profile')
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-12">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-12 px-0 bg-white my-4 text-center">
                            @php
                                $status = ['0' => 'กรุณาใส่รูปภาพ', '1' => 'ตรวจสอบผ่านแล้ว', '2' => 'ทำการแก้ไขรูปภาพ', '3' => 'รอการตรวจสอบ'];
                                $bgcolor = ['0' => 'gray', '1' => '#28a745', '2' => 'red', '3' => '#ffc107'];
                            @endphp
                            <div class="alert alert-success px-0 sticky-top text-white" role="alert"
                                style="background-color:{{ $bgcolor[Auth::user()->kyc_status] }}; border-radius: 0; border: 0px; top: 108px; z-index: 1;">
                                <strong>{{ $status[Auth::user()->kyc_status] }}</strong>
                            </div>
                            <h1 style="font-weight: 620;" class="py-4">ยืนยันตัวตน</h1>


                            <div class="row px-4 pb-4">
                                <div class="col-lg-6 mb-4 px-lg-3 px-md-0 px-0">
                                    <span class="text-left">
                                        <li class="text-center font_size_14px" style="font-weight: 620;list-style: none">
                                            วิธีการ ยืนยันตัวตน</li>
                                        <li class="font_size_14px" style="list-style: none">1. ใช้กระดาษ a4 จำนวน 1 แผ่น
                                            ถ่ายรูปท่านพร้อมบัตรประชาชน
                                            หรือหนังสือเดินทาง เขียนว่า "ใช้สำหรับสมัคร Bird Fresh"</li>
                                        <li class="font_size_14px" style="list-style: none">2. ลงวันที่ ที่ท่านยืนยันตัวตน
                                        </li>
                                        <li class="font_size_14px" style="list-style: none">3. เซ็นกำกับ ด้วยลายมือของท่าน
                                            เพื่อเป็นการยืนยัน</li>
                                        <li class="font_size_14px" style="list-style: none">4. อัพโหลดรูปถ่าย</li>
                                    </span>
                                    <br>
                                    <span class="text-left">
                                        <li class="text-center font_size_14px" style="font-weight: 620;list-style: none">
                                            ข้อควรรู้</li>
                                        <li class="font_size_14px" style="list-style: none">1. รูปต้องไม่มีอะไรบัง
                                            เห็นได้ชัด</li>
                                        <li class="font_size_14px" style="list-style: none">2. ถือ Passport หรือ
                                            บัตรประชาชนให้เห็นข้อมูลได้อย่างชัดเจนไม่บดบังรายละเอียดบนบัตร</li>
                                        <li class="font_size_14px" style="list-style: none">3.
                                            กระดาษที่เขียนต้องอ่านออกได้ชัดเจน</li>
                                    </span>
                                    @if (Auth::user()->kyc_status == '2')
                                        <br>
                                        <span class="text-left">
                                            <li class="font_size_14px"
                                                style="font-weight: 620; list-style: none; color:red;">หมายเหตุ:
                                                <br />{{ Auth::user()->kyc_remark }}
                                            </li>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 px-lg-3 px-md-0 px-0">
                                    <!-- <form action="/profile/KYC/update" id="update_kyc" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row mx-0">
                                                        <div class="col-lg-12 d-flex justify-content-center " style=" border: 1px solid #ddd">
                                                            {{-- {{ Auth::user()->kyc_pic }} --}}
                                                            {{-- {{ strpos(Auth::user()->kyc_pic , 'kyc_', 1) }} --}}
                                                            <div style="height: 300px; width: 300px;">
                                                                @if (strpos(Auth::user()->kyc_pic, 'kyc_') !== false)
                                                                <img src="{{ '/img/profile/kyc/' . Auth::user()->kyc_pic }}" type="file"
                                                                id="kyc_pic2" name="kyc_pic1" value="{{ Auth::user()->kyc_pic }}"
                                                                style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;" class="mb-3">

                                                @else

                                                                <img src="{{ '/img/profile/kyc/kyc.png' }}" type="file" id="kyc_pic2" name="kyc_pic1"
                                                                value="{{ Auth::user()->kyc_pic }}"
                                                                style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;" class="mb-3">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 d-flex flex-wrap my-3 px-0">
                                                            <input style="width: 100%;" type="file" name="kyc_pic" id="kyc_pic1"
                                                                onchange="readURL(this)">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 px-0">
                                                        <input type="button" name="submit" class="btn btn-c75ba1 form-control" value="ยืนยัน" id="submit_update_kyc"
                                                            class="btn btn-primary">
                                                        <input type="submit" class="d-none" id="btn_update_kyc">
                                                        <input type="button" class="d-none" id="btn_modal" data-toggle="modal" data-target="#inputSuccess">
                                                    </div>
                                                    <div class="modal fade" id="inputSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header d-flex justify-content-center" style="border: unset;">
                                                            <h5 class="modal-title" id="exampleModalLabel"><strong>คุณได้ทำการยืนยันตัวตนเรียบร้อยแล้ว</strong></h5>
                                                          </div>
                                                          <div class="modal-body py-0">
                                                            <h6>กรุณารออนุมัติภายใน 24ชม.</h6>
                                                          </div>
                                                          <div class="modal-footer d-flex justify-content-center" style="border: unset;">
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">กลับสู่หน้าหลัก</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </form> -->
                                    <form class="row" role="form" action="{{ url('/profile/KYC/update') }}"
                                        method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="col-12 d-flex align-items-stretch">
                                            <div class="row mx-0 p-3 mb-3 rounded8px w-100"
                                                style="background-color: #efefef;">
                                                <div class="col-12">
                                                    <div class="media">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1 text-left">
                                                                <strong>รูปถ่ายบัตรประชาชนอย่างเดียว</strong></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (Auth::user()->kyc_status == '1')
                                                @else
                                                    <div
                                                        class="col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                                        <button class="btn btn-main btn-file w-100">
                                                            อัพโหลดไฟล์
                                                            <input type="file" name="kyc_pic1" onchange="readURL(this,1);"
                                                                required>
                                                        </button>
                                                    </div>
                                                @endif
                                                <div class="col-lg-6 col-md-6 col-12 mx-auto py-3">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <img src="{{ url(Auth::user()->kyc_pic1 ? Auth::user()->kyc_pic1 : "") }}"
                                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                            class="w-100 upload1ShowImage" alt="your image" />
                                                        <i class="fas fa-file-pdf fa-10x upload1ShowIcon d-none"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex align-items-stretch">
                                            <div class="row mx-0 p-3 mb-3 rounded8px w-100"
                                                style="background-color: #efefef;">
                                                <div class="col-12">
                                                    <div class="media">
                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                            <h5 class="mt-0 mb-1 text-left">
                                                                <strong>รูปถ่ายคู่กับบัตรประชาชน</strong></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (Auth::user()->kyc_status == '1')
                                                @else
                                                <div
                                                    class="col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                                    <button class="btn btn-main btn-file w-100">
                                                        อัพโหลดไฟล์
                                                        <input type="file" name="kyc_pic2" onchange="readURL(this,2);"
                                                            required>
                                                    </button>
                                                </div>
                                                @endif
                                                <div class="col-lg-6 col-md-6 col-12 mx-auto py-3">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <img src="{{ url(Auth::user()->kyc_pic2 ? Auth::user()->kyc_pic2 : "")  }}"
                                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                            class="w-100 upload2ShowImage" alt="your image" />
                                                        <i class="fas fa-file-pdf fa-10x upload2ShowIcon d-none"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (Auth::user()->kyc_status == '1')
                                        @else
                                        <div class="col-12 text-left">
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#addModal">
                                                บันทึก
                                            </button>
                                            <a href="{{ url('/profile/KYC/') }}" class="btn btn-secondary">ยกเลิก</a>
                                        </div>
                                        @endif

                                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                            aria-hidden="true">
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
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
    {{-- <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#kyc_pic2').attr('src', e.target.result);
                // alert('กรุณาใส่รูปภาพ');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#submit_update_kyc').click(function () {
        console.log($('#kyc_pic1').val());
        if ($('#kyc_pic1').val() == '') {
            return alert('กรุณาใส่รูปภาพ');
        }

        $('#btn_update_kyc').click();

    });

    $(document).ready(function() {
        var alert = '{{ $alert }}';
        console.log(alert);
        if(alert != ''){
            $('#btn_modal').click();
        }
    });

</script> --}}

@endsection
