

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
                                แก้ไขหมวดหมู่
                            </b>
                        </h5>
                    </div>
                </div>


                <form class="row" role="form" action="{{ url('dashboard/news-categories/edit') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{ $newsCategory->id }}">
                    <div class="col-12 mb-3">
                        <label for="name">ชื่อหมวดหมู่</label>
                        <input type="text" class="form-control" name="name" id="name"  value="{{$newsCategory->name}}" placeholder="ชื่อหมวดหมู่" required>
                    </div>
                    <div class="col-12 text-center">
                        <a href="{{ url('dashboard/news-categories') }}"
                            class="btn btn-secondary">ย้อนกลับ</a>

                        <button type="button" class="btn btn-outline-pink"
                            data-toggle="modal" data-target="#editModal{{$newsCategory->id}}">
                            บันทึก
                        </button>
                    </div>

                    <div class="modal fade" id="editModal{{$newsCategory->id}}"
                        tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        แก้ไขหมวดหมู่ #{{$newsCategory->name}}</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        คุณต้องการจะแก้ไขหมวดหมู่นี้ใช่หรือไม่?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"
                                        class="btn btn-success">ยืนยัน</button>
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
{{--
<form role="form" action="{{ url('dashboard/news-categories/update') }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="col-md-12">
            <input type="hidden" name="id" value="{{ $photo->id }}">
            <div class="form-group required mb-3">
                <label for="title">TITLE</label>
                <input type="text" class="form-control" name="title" value="{{$photo->title}}" placeholder="Fill title..." required>
            </div>

            <div class="form-group required mb-3">
                <label for="detail">DETAIL</label>
                <textarea type="text" rows="5" class="form-control" name="detail" placeholder="Fill detail..." required>{{ $photo->detail }}</textarea>
            </div>

            <div class="form-group required mb-3">
                <label for="image">IMAGE</label>
                <div class="form-group">
                <img style="height:300px;" id="blah" src="{{ asset($photo->image)}}" alt="your image" />
                    <div class="input-group mt-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image" onchange="readURL(this);">
                        </div>
                    </div>
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#blah')
                                        .attr('src', e.target.result);
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="well well-sm clearfix mb-3">
                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                    data-bs-target="#createModal">Update</button>

                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    Are you sure?
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="submit" title="Save" class="btn btn-success">Confirm</button>
                                <button type="button" class="btn btn-danger"
                                    data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('photos')}}" class="btn btn-danger pull-right" type="button">Cancel</a>
            </div>
    </div>
</form> --}}

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
