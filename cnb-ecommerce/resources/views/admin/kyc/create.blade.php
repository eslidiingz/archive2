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
                                    เพิ่มรูปโฆษณา
                                </b>
                            </h5>
                        </div>
                    </div>

                    <form class="row" role="form" action="{{ url('dashboard/banner/create') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12 mb-3">
                            <label for="name">ชื่อรูปโฆษณา</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="ชื่อรูปโฆษณา"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="detail">รายละเอียด</label>
                            <textarea type="text" rows="4" class="form-control" name="detail" id="detail"
                                placeholder="รายละเอียด" required></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="url">ลิ้งก์</label>
                            <input type="text" class="form-control" name="url" id="url" placeholder="ลิ้งก์">
                        </div>
                        <div class="col-12">
                            <label for="images">รูปโฆษณา</label>
                            <small class="text-danger">(ไฟล์ .png/.jpg/.jpeg และขนาด 1220x560 เท่านั้น)</small>
                            <div class="form-group">
                                <img style="height:300px;" id="blah" src="/img/no_banner_medix.png" alt="your image" />
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
                            <a href="{{ url('dashboard/banner') }}" class="btn btn-secondary">ย้อนกลับ</a>

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                บันทึก
                            </button>
                        </div>

                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            เพิ่มรูปโฆษณา</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            คุณต้องการจะเพิ่มรูปโฆษณานี้ใช่หรือไม่?
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
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
