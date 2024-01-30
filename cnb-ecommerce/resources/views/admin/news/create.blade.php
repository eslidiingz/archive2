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
                                    เพิ่มข่าวสาร
                                </b>
                            </h5>
                        </div>
                    </div>

                    <form class="row" role="form" action="{{ url('dashboard/news/create') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12 mb-3">
                            <label for="name">ชื่อข่าวสาร</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="ชื่อข่าวสาร"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="detail">รายละเอียด</label>
                            <textarea type="text" rows="4" class="form-control" name="detail" id="detail"
                                placeholder="รายละเอียด"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <select class="form-control" name="news_category_id"  id="news_category_id" required>
                                <option selected value="" disabled="">เลือกหมวดหมู่</option>
                                @foreach ($newsCategory as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="img_cover">รูปปกข่าวสาร</label>
                            <small class="text-danger">(ไฟล์ .png/.jpg/.jpeg และขนาด 610x280 เท่านั้น)</small>
                            <div class="form-group">
                                <img style="width: 100%; min-height:300px auto;" id="blah1" src="/img/no_banner_medix.png" alt="your image" />
                                <div class="input-group mt-3">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" style="padding: 3px;"
                                            id="fileImgCover" name="img_cover" onchange="readURL1(this);" required>
                                    </div>
                                </div>
                                <script>
                                    function readURL1(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                $('#blah1')
                                                    .attr('src', e.target.result);
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="images">รูปรายละเอียด</label>
                            <small class="text-danger">(ไฟล์ .png/.jpg/.jpeg และขนาด 1220x560 เท่านั้น)</small>
                            <div class="form-group">
                                <img style="width: 100%; min-height:300px auto;" id="blah" src="/img/no_banner_medix.png" alt="your image" />
                                <div class="input-group mt-3">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" style="padding: 3px;"
                                            id="exampleInputFile" name="images" onchange="readURL(this);" required>
                                    </div>
                                </div>
                                <script>
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                $('#blah')
                                                    .attr('src', e.target.result);
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <a href="{{ url('dashboard/news') }}" class="btn btn-secondary">ย้อนกลับ</a>

                            <button type="button" class="btn btn-outline-pink" data-toggle="modal" data-target="#addModal">
                                บันทึก
                            </button>
                        </div>

                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            เพิ่มข่าวสาร</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            คุณต้องการจะเพิ่มข่าวสารนี้ใช่หรือไม่?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">ยืนยัน</button>
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
    </style>

@endsection
@section('script')
    <!-- apexcharts -->
    <!--script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script-->

    <!-- dashboard init -->
    <!--script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script-->

    <!--tinymce js-->
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
@endsection
