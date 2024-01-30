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

    .border-r {
        border-right: 0px solid #d9d9d9;
    }

    @media (min-width: 280px) {
        .to_edit2 {
            position: absolute;
            top: 50%;
            right: 30%;
        }
    }

    @media (min-width: 576px) {
        .to_edit2 {
            position: absolute;
            top: 50%;
            right: 23%;
        }
    }

    @media (min-width: 768px) {
        .border-r {
            border-right: 1px solid #d9d9d9;
        }

        .to_edit2 {
            position: absolute;
            top: 35%;
            right: 26%;
        }
    }

    @media (min-width: 992px) {
        .to_edit2 {
            position: absolute;
            top: 44%;
            right: 32%;
        }

        .title_posit {
            text-align: right;
        }

    }
</style>


@section('content')
    <div class="container">
                        <div class="col-12 pb-4 px-0 d-flex flex-row">
                            <div class="col-3 d-xl-block d-lg-none d-md-none d-none px-0">
                                @include('new_ui._menu_left_user_profile')
                            </div>
                            <div class="col-xl-9 col-lg-12 col-md-12 col-12 pt-4 px-0" style=' background: #f8f8f8;'>
                                <div class=' col-lg-12 col-md-12 col-sm-12' style='border-bottom: 1px solid #d9d9d9;'>
                                    <h3><strong>ข้อมูลของฉัน</strong></h3>
                                    <p>จัดการข้อมูลของคุณเพื่อให้ใช้งานได้สะดวกขึ้น</p>
                                </div>
                                <div class='col-lg-12 col-12'>
                                    <div class='row'>
                                        <div class='col-lg-7 col-md-7 col-12 order-lg-1 order-md-1 order-2 border-r px-0' style='padding-top: 20px;'>
                                            <div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                                            ชื่อผู้ใช้
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-12 strong-text" style="margin-bottom: 20px;">
                                                            <input type="search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ชื่อผู้ใช้">
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                                            อีเมล
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-12 strong-text" style="margin-bottom: 20px;">
                                                            <a class='abs-change' href='#'>เปลี่ยน</a>
                                                            <input disabled type="search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="t.peexxxx@gmail.com">
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                                            เบอร์โทรศัพท์
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-12 strong-text" style="margin-bottom: 20px;">
                                                            <a class='abs-change' href='#'>เปลี่ยน</a>
                                                            <input disabled type="search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="08x-xxx-6567">
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                                            เพศ
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-12 strong-text d-flex flex-row" style="margin-bottom: 20px;">
                                                            <div class='col-4' style='padding-right : 0px;'>
                                                                <label class="radio-inline"><input type="radio" name="optradio" checked>หญิง</label>
                                                            </div>
                                                            <div class='col-4' style='padding-right : 0px;'>
                                                                <label class="radio-inline"><input type="radio" name="optradio">ชาย</label>
                                                            </div>
                                                            <div class='col-4' style='padding-right : 0px;'>
                                                                <label class="radio-inline"><input type="radio" name="optradio">อื่นๆ</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                                            วัน เดือน ปี เกิด
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-12 strong-text row" style="margin-bottom: 20px; padding-right:0px;">
                                                            <div class='col-lg-4 col-md-12 col-12 pr-0'>
                                                                <div>
                                                                    <select class="form-control" id="exampleSelect1" style="margin-bottom: 20px;">
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class='col-lg-4 col-md-12 col-12 pr-0'>
                                                                <div>
                                                                    <select class="form-control" id="exampleSelect1" style="margin-bottom: 20px;">
                                                                        <option>มกราคม</option>
                                                                        <option>กุมภาพันธ์</option>
                                                                        <option>มีนาคม</option>
                                                                        <option>เมษายน </option>
                                                                        <option>พฤษภาคม</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class='col-lg-4 col-md-12 col-12 pr-0'>
                                                                <div>
                                                                    <select class="form-control" id="exampleSelect1" style="margin-bottom: 20px;">
                                                                        <option>1995</option>
                                                                        <option>1996</option>
                                                                        <option>1997</option>
                                                                        <option>1998</option>
                                                                        <option>1999</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='col-lg-3 col-md-3 col-12 offset-lg-3 offset-md-4' style='margin-bottom: 20px;'>
                                                            <button class="form-control" style='color: white; background-color: #42294f;'>บันทึก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-lg-5 col-md-5 col-12 order-lg-2 order-md-2 order-1' style='padding-top: 20px;'>
                                            <div classs='col-12'>
                                                <div style="padding-top: 60px; text-align:center;width: 140px;">
                                                    <img src="new_ui/img/user_icon_menu/avata01.png" style="max-height: 100%; max-width: 100%;">
                                                    <img class='to_edit2' src="new_ui/img/user_icon_menu/edit_pic.png" style="width: 40px;">
                                                </div>
                                                <div class='col-lg-12' style='text-align : center; padding-top: 20px'>
                                                    <button class="o-btn-purple">เลือกรูป</button>
                                                </div>

                                                <div class='col-lg-12 cmt' style='text-align : center; padding-top: 20px'>
                                                    ขนาดไฟล์: สูงสุด 1 MB
                                                </div>
                                                <div class='col-lg-12 cmt' style='text-align : center'>
                                                    ไฟล์ที่รองรับ: .JPEG, .PNG
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