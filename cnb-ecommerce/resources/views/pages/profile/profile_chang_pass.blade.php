@extends('new_ui.layouts.front-end')
@section('style')
<style>
    input[type=radio] {
        margin-right: 5px;
    }

    .cmt {
        color: #b2b2b2;
    }

    .abs-change {
        position: absolute;
        top: 22%;
        right: 20px;
        color: #1947e3;
        text-decoration: underline;
    }

    .title_posit {
        text-align: left;
    }

    .o-btn-purple {
        border-radius: 8px;
        background-color: #f8eaf3;
        padding: 10px;
        color: #c75ba1;
        border: 0px;
        width: 100px;
    }

    .o-bg-box {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.16);
    }

    @media (min-width: 768px) {
        .title_posit {
            text-align: right;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="col-12 pb-4 px-0 d-flex flex-row">
        <div class="col-3 d-xl-block d-lg-none d-md-none d-none px-0">
            @include('new_ui._menu_left_user_profile')
        </div>
        <div class="col-xl-9 col-lg-12 col-md-12 col-12 pt-4 px-4">
            <div class=' col-lg-12 col-md-12 col-sm-12' style='border-bottom: 1px solid #d9d9d9;'>
                <h3><strong>เปลี่ยนรหัสผ่าน</strong></h3>
            </div>
            <div class='col-lg-12 col-12'>
                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-12 px-0 mt-4 o-bg-box'>
                        <div>
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-12 title_posit" style='padding-top: 5px;'>
                                        <strong>ใส่รหัสผ่านเก่า</strong>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12 strong-text" style="margin-bottom: 20px;">
                                        <input style='background-color:#f0f0f0' type="search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="รหัสผ่านใหม่">
                                    </div>
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-12 title_posit" style='padding-top: 5px;'>
                                        <strong>รหัสผ่านใหม่</strong>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12 strong-text" style="margin-bottom: 20px;">
                                        <input style='background-color:#f0f0f0' type="search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="รหัสผ่านเก่า">
                                    </div>
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-12 title_posit" style='padding-top: 5px;'>
                                        <strong>รหัสผ่านใหม่</strong>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12 strong-text" style="margin-bottom: 20px;">
                                        <input style='background-color:#f0f0f0' type="search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ยืนยันรหัสผ่านใหม่">
                                    </div>
                                    <div class="col-lg-6">
                                    </div>
                                    <div class='col-lg-2 col-md-3 col-12 offset-lg-2 offset-md-3' style='margin-bottom: 20px;'>
                                        <button class="form-control" style='color: white; background-color: #42294f;'>บันทึก</button>
                                    </div>
                                </div>
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
    function myFunction() {
        $('#add-modal').modal('hide');
        $('#success-modal').modal('show');
    }

    $('.o-bank-hover').hover(function() {
        $('.hover').fadeIn(1000);
    }, function() {
        $('.hover').fadeOut(1000);
    });
</script>
@endsection