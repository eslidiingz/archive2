@extends('layouts.profile')
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

    #change_pic {
        display: none;
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

<?php

use App\User;

$user = User::Where('id', Auth::user()->id)->first();
if (is_null($user->dateofbirth)) {
    $year = date("Y");
    $month = '01';
    $day = '01';
} else {
    $yeahtest = explode('-', $user->dateofbirth);
    $year = $yeahtest[0];
    $month = $yeahtest[1];
    $day = $yeahtest[2];
}

$p_format = phone_format($user->phone);
$arr_mon = array(
    '1' =>  'มกราคม',
    '2' =>  'กุมภาพันธ์',
    '3' =>  'มีนาคม',
    '4' =>  'เมษายน',
    '5' =>  'พฤษภาคม',
    '6' =>  'มิถุนายน',
    '7' =>  'กรกฎาคม',
    '8' =>  'สิงหาคม',
    '9' =>  'กันยายน',
    '10' =>  'ตุลาคม',
    '11' =>  'พฤศจิกายน',
    '12' =>  'ธันวาคม',
);



function phone_format($phone_number)
{
    $in_p1 = substr($phone_number, 0, 2);
    $in_p2 = substr($phone_number, -4);
    $format_p = $in_p1 . 'X-XXX-' . $in_p2;
    return $format_p;
}

?>


@section('content')
<div class="container">
    <div class="col-12 px-0 d-flex flex-row">
        <div class="col-3 d-xl-block d-lg-none d-md-none d-none px-0">
            @include('includes._menu_left_user_profile')
        </div>
        <div class="col-xl-9 col-lg-12 col-md-12 col-12 pt-4 my-4" style=' background: #f8f8f8;'>
            <div class=' col-lg-12 col-md-12 col-sm-12' style='border-bottom: 1px solid #d9d9d9;'>
                <h3><strong>ข้อมูลของฉัน</strong></h3>
                <p>จัดการข้อมูลของคุณเพื่อให้ใช้งานได้สะดวกขึ้น</p>
            </div>
            <form action="/profile/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class='col-lg-12 col-12'>
                    <div class='row'>
                        <div class='col-lg-7 col-md-7 col-12 order-lg-1 order-md-1 order-2 border-r px-0' style='padding-top: 20px;'>
                            <div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                            <strong>ชื่อผู้ใช้</strong>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-12 strong-text" style="margin-bottom: 20px;">
                                            <input type="search" class="form-control" id="name" name='name' placeholder="ชื่อผู้ใช้" value='<?php echo $user->name ?>'>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                            <strong>อีเมล</strong>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-12 strong-text" style="margin-bottom: 20px;">
                                            <a class='abs-change' href='#'>เปลี่ยน</a>
                                            <input disabled type="search" class="form-control" id="email" name="email" value='<?php echo $user->email ?>' placeholder="t.peexxxx@gmail.com">
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                            <strong>เบอร์โทรศัพท์</strong>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-12 strong-text" style="margin-bottom: 20px;">
                                            <!--a class='abs-change' href='#'>เปลี่ยน</a-->
                                            <input disabled type="search" class="form-control" id="phone" value='<?php echo $p_format ?>' aria-describedby="emailHelp" placeholder="08x-xxx-6567">
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                            <strong>เพศ</strong>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-12 strong-text d-flex flex-row" style="margin-bottom: 20px;">
                                            <div class='col-4' style='padding-right : 0px;'>
                                                <label class="radio-inline"><input type="radio" value='female' name="sex" {{ Auth::user()->sex =="female"? "checked" : "" }}>หญิง</label>
                                            </div>
                                            <div class='col-4' style='padding-right : 0px;'>
                                                <label class="radio-inline"><input type="radio" value='male' name="sex" {{ Auth::user()->sex =="male"? "checked" : "" }}>ชาย</label>
                                            </div>
                                            <div class='col-4' style='padding-right : 0px;'>
                                                <label class="radio-inline"><input type="radio" value='other' name="sex" {{ Auth::user()->sex =="other"? "checked" : "" }}>อื่นๆ</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                            <strong>วัน เดือน ปี เกิด</strong>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-12 strong-text row" style=" padding-right:0px;">
                                            <div class='col-lg-4 col-md-12 col-12 pr-0'>
                                                <div>
                                                    <select class="form-control" id="dateofbirthDay" name='dateofbirthDay' style="margin-bottom: 20px;">
                                                        <option value=''>กรุณาเลือก</option>
                                                        <?php
                                                        for ($i = 1; $i <= 31; $i++) {
                                                            if ($i == $day) {
                                                                $select_d = ' selected';
                                                            } else {
                                                                $select_d = '';
                                                            }
                                                            echo '<option value=' . $i . $select_d . '>' . $i . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='col-lg-4 col-md-12 col-12 pr-0'>
                                                <div>
                                                    <select class="form-control" id="dateofbirthMonth" name='dateofbirthMonth' style="margin-bottom: 20px;">
                                                        <option value=''>กรุณาเลือก</option>
                                                        <?php
                                                        for ($i = 1; $i <= 12; $i++) {
                                                            if ($i == $month) {
                                                                $select_m = ' selected';
                                                            } else {
                                                                $select_m = '';
                                                            }
                                                            echo '<option value=' . $i . $select_m . '>' . $arr_mon[$i] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='col-lg-4 col-md-12 col-12 pr-0'>
                                                <div>
                                                    <select class="form-control mb-4 mb-md-3 mb-lg-0" id="dateofbirthYear" name='dateofbirthYear'>
                                                        <option value=''>กรุณาเลือก</option>
                                                        <?php
                                                        $year2 = date('Y');
                                                        $min = $year2 - 60;
                                                        $max = $year2;
                                                        for ($i = $max; $i >= $min; $i--) {
                                                            if ($i == $year) {
                                                                $select_y = ' selected';
                                                            } else {
                                                                $select_y = '';
                                                            }
                                                            echo '<option value=' . $i . $select_y . '>' . $i . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-lg-3 col-md-3 col-12 offset-lg-3 offset-md-4' style='margin-bottom: 20px;'>
                                            <button class="form-control" id='submit' style='color: white; background-color: #42294f;'>บันทึก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-lg-5 col-md-5 col-12 order-lg-2 order-md-2 order-1' style='padding-top: 20px;'>
                            <div classs='col-12'>
                                <div style="padding-top: 60px; text-align:center; width: 140px;height:140px;border-radius: 50%;">
                                    <img src="{{asset('img/profile/'.Auth::user()->user_pic) }}" style="max-height: 100%; max-width: 100%;" type="file" class="img-fluid img-thumbnail" id="user_pic2" name="user_pic2" value="{{Auth::user()->user_pic}}">
                                    <label for="change_pic" class="change_pic_btn">
                                        <img class='to_edit2' src="new_ui/img/user_icon_menu/edit_pic.png" style="width: 40px;">
                                    </label>
                                </div>
                                <div class='col-lg-12' style='text-align : center; padding-top: 20px'>
                                    <input id="change_pic" type="file" name="user_pic" id="change_pic_btn" onchange="readURL(this)" value="{{Auth::user()->user_pic}}">
                                    <label for="change_pic" class="change_pic_btn">
                                        <div class='o-btn-purple'>
                                            เลือกรูป
                                        </div>
                                    </label>
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
            </form>
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user_pic2').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection