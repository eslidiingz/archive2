@extends('layouts.shop')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="row py-4 px-lg-4 px-md-2 px-0">
    <div class="col-12">
        <h3><strong>ยืนยันตัวตน</strong></h3>
    </div>
    <div class="col-12">
        <div class="form-row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
            <div class="col-12">
                <h3><strong>เลือกประเภทนิติบุคคล</strong></h3>
            </div>
            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-12 mb-1">
                        <input type="radio" id="defaultCheck1" name="tab" value="igotnone" checked onclick="show1();" style="cursor: pointer;" />
                        <label class="form-check-label" for="defaultCheck1" style="cursor: pointer;">
                            นิติบุคคลทั่วไป
                        </label>
                    </div>
                    <div class="col-12">
                        <input type="radio" id="defaultCheck2" name="tab" value="igottwo" onclick="show2();" style="cursor: pointer;" />
                        <label class="form-check-label" for="defaultCheck2" style="cursor: pointer;">
                            นิติบุคคล (ที่เกี่ยวกับเครื่องมือแพทย์)
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-12" id="div1">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h3><strong>นิติบุคคลทั่วไป</strong></h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                        <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                <div class="media">
                                  <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image">
                                  <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                    <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6 เดือน)</strong></h5>
                                    <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                <button class="btn btn-main btn-file w-100">
                                    อัพโหลดไฟล์<input type="file" onchange="readURL1(this);">
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                <img id="upload1" src="/img/no_image.png" class="w-100" alt="your image" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                        <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                <div class="media">
                                  <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image">
                                  <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                    <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                    <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                <button class="btn btn-main btn-file w-100">
                                    อัพโหลดไฟล์<input type="file" onchange="readURL2(this);">
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                <img id="upload2" src="/img/no_image.png" class="w-100" alt="your image" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-secondary px-4">ยกเลิก</button>
                        <button class="btn btn-main px-4 ml-2">บันทึก</button>
                    </div>
                </div>
            </div>
            <div class="col-12" id="div2" style="display: none;">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h3><strong>นิติบุคคล (ที่เกี่ยวกับเครื่องมือแพทย์)</strong></h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                        <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                <div class="media">
                                  <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image">
                                  <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                    <h5 class="mt-0 mb-1"><strong>หนังสือรับรอง (อายุไม่เกิน 6 เดือน)</strong></h5>
                                    <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                <button class="btn btn-main btn-file w-100">
                                    อัพโหลดไฟล์<input type="file" onchange="readURL3(this);">
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                <img id="upload3" src="/img/no_image.png" class="w-100" alt="your image" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                        <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                <div class="media">
                                  <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image">
                                  <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                    <h5 class="mt-0 mb-1"><strong>ภ.พ.20</strong></h5>
                                    <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                <button class="btn btn-main btn-file w-100">
                                    อัพโหลดไฟล์<input type="file" onchange="readURL4(this);">
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                <img id="upload4" src="/img/no_image.png" class="w-100" alt="your image" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                        <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                <div class="media">
                                  <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image">
                                  <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                    <h5 class="mt-0 mb-1"><strong>สน.1</strong></h5>
                                    <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                <button class="btn btn-main btn-file w-100">
                                    อัพโหลดไฟล์<input type="file" onchange="readURL5(this);">
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                <img id="upload5" src="/img/no_image.png" class="w-100" alt="your image" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch">
                        <div class="row mx-0 p-3 mb-3 rounded8px w-100" style="background-color: #efefef;">
                            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-md-1 order-1">
                                <div class="media">
                                  <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;" alt="image">
                                  <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                    <h5 class="mt-0 mb-1"><strong>ฆพ. (ถ้ามี)</strong></h5>
                                    <span style="color: #6A7187;">ยังไม่ได้กรอกข้อมูลให้ครบถ้วน</span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12 d-flex align-items-start justify-content-end order-lg-2 order-md-2 order-3">
                                <button class="btn btn-main btn-file w-100">
                                    อัพโหลดไฟล์<input type="file" onchange="readURL6(this);">
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mx-auto py-3 order-lg-3 order-md-3 order-2">
                                <img id="upload6" src="/img/no_image.png" class="w-100" alt="your image" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-secondary px-4">ยกเลิก</button>
                        <button class="btn btn-main px-4 ml-2">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>
    function show1(){
      document.getElementById('div1').style.display ='block';
      document.getElementById('div2').style.display ='none';
    }
    function show2(){
      document.getElementById('div1').style.display = 'none';
      document.getElementById('div2').style.display = 'block';
    }
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload1').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload2').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload3').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload4').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload5').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload6').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

@endsection
