@extends('layouts.profile')
@section('style')
<style>
    input[type=radio] {
        margin-right: 5px;
    }

    .nav_custom_cat {
        display: none !important;
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



    .border-r {
        border-right: 0px solid #d9d9d9;
    }

    #change_pic {
        display: none;
    }

    .footer-area {
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
            top: 20%;
            right: 26%;
        }
    }

    @media (min-width: 992px) {
        .to_edit2 {
            position: absolute;
            top: 25%;
            right: 32%;
        }

        .title_posit {
            text-align: right;
        }

    }
    .cate-all{
        display: none !important;
    }
</style>
@endsection

<?php

$p_format = phone_format($user->phone);
if( $locale == 'en' ) {
    $arr_mon = array(
        '1' =>  'January',
        '2' =>  'February',
        '3' =>  'March',
        '4' =>  'April',
        '5' =>  'May',
        '6' =>  'June',
        '7' =>  'July',
        '8' =>  'August',
        '9' =>  'September',
        '10' =>  'October',
        '11' =>  'November',
        '12' =>  'December',
    );
} else {
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
}



function phone_format($phone_number)
{
    $in_p1 = substr($phone_number, 0, 2);
    $in_p2 = substr($phone_number, -4);
    $format_p = $in_p1 . 'X-XXX-' . $in_p2;
    return $format_p;
}

?>


@section('content')
<div class="container pb_custom_footer">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
            <div class="row">
                <div class="col-3 d-xl-block d-lg-block d-md-none d-none px-0 sticky-top mr-0"
                    style="height: calc(100vh - 131px); top: 95px; z-index: 900;">
                    @include('includes._menu_left_user_profile')
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-12 pt-4 mb-4 mt-0">
                    <div class=' col-lg-12 col-md-12 col-sm-12 pt-3 background-w'
                        style='border-bottom: 1px solid #d9d9d9;'>
                        <h3><strong style="color: #333;">{{ trans('message.my_profile') }}</strong></h3>
                        <p>{{ trans('message.my_profile_desc') }}</p>
                    </div>
                    <form action="/profile/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class='col-lg-12 col-12'>
                            <div class='row'>
                                <div class='col-lg-7 col-md-7 col-12 order-lg-1 order-md-1 order-2 border-r p-5 background-w'>
                                    <div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-12 title_posit"
                                                    style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.name') }}</strong>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-12 strong-text"
                                                    style="margin-bottom: 20px;">
                                                    <input type="search" class="form-control" id="name" name='name'
                                                        placeholder="{{ trans('message.name') }}" value='<?php echo $user->name ?>'>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-12 title_posit"
                                                    style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.surname') }}</strong>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-12 strong-text"
                                                    style="margin-bottom: 20px;">
                                                    <input type="search" class="form-control" id="surname"
                                                        name='surname' placeholder="{{ trans('message.surname') }}"
                                                        value='<?php echo $user->surname ?>'>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-12 title_posit"
                                                    style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.email') }}</strong>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-12 strong-text"
                                                    style="margin-bottom: 20px;">
                                                    {{-- <a class='abs-change' href='#'>{{ trans('message.change') }}</a> --}}
                                                    <input disabled type="search" class="form-control" id="email"
                                                        name="email" value='<?php echo $user->email ?>'
                                                        >
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-12 title_posit"
                                                    style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.tel') }}</strong>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-12 strong-text"
                                                    style="margin-bottom: 20px;">
                                                    <a class='abs-change' href='#' data-toggle="modal" data-target="#phone_change">{{ trans('message.change') }}</a>
                                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> --}}
                                                    <input disabled type="search" class="form-control" id="phone"
                                                        value='<?php echo $p_format ?>' aria-describedby="emailHelp"
                                                        >
                                                </div>
                                                {{-- <div class="col-lg-3 col-md-4 col-12 title_posit"
                                                    style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.gender') }}</strong>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-12 strong-text d-flex flex-row"
                                                    style="margin-bottom: 20px;">
                                                    <div class='col-4' style='padding-right : 0px;'>
                                                        <label class="radio-inline font_size_14px"><input type="radio"
                                                                value='female' name="sex"
                                                                {{ Auth::user()->sex =="female"? "checked" : "" }}>{{ trans('message.female') }}</label>
                                                    </div>
                                                    <div class='col-4' style='padding-right : 0px;'>
                                                        <label class="radio-inline font_size_14px"><input type="radio"
                                                                value='male' name="sex"
                                                                {{ Auth::user()->sex =="male"? "checked" : "" }}>{{ trans('message.male') }}</label>
                                                    </div>
                                                    <div class='col-4' style='padding-right : 0px;'>
                                                        <label class="radio-inline font_size_14px"><input type="radio"
                                                                value='other' name="sex"
                                                                {{ Auth::user()->sex =="other"? "checked" : "" }}>{{ trans('message.other') }}</label>
                                                    </div>
                                                </div> --}}
                                                <div class="col-lg-3 col-md-4 col-12 title_posit"
                                                    style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.birth_date') }}</strong>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-12 strong-text row w-100" style="margin-bottom: 5px; padding-right:0px;">
                                                    <div class='col-lg-4 col-md-12 col-12 pr-0'>
                                                        <div>
                                                            <select class="form-control" id="dateofbirthDay"
                                                                name='dateofbirthDay' style="margin-bottom: 20px;">
                                                                <option value=''>{{ trans('message.please_select') }}</option>
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
                                                            <select class="form-control" id="dateofbirthMonth"
                                                                name='dateofbirthMonth' style="margin-bottom: 20px;">
                                                                <option value=''>{{ trans('message.please_select') }}</option>
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
                                                            <select class="form-control" id="dateofbirthYear"
                                                                name='dateofbirthYear' style="margin-bottom: 20px;">
                                                                <option value=''>{{ trans('message.please_select') }}</option>
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
                                                <div class="col-lg-3 col-md-4 col-12 title_posit" style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.bank_name') }}</strong>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-12 strong-text row" style="margin-bottom: 20px; padding-right:0px;">
                                                    <div class="col-12 pr-0">
                                                        <div class="form-group">
                                                            <select class="form-control" id="bank" name="bank">
                                                                <option value="" disabled hidden selected>{{ trans('message.select_bank') }}</option>
                                                                @foreach ($bank as $value)
                                                                <option value="{{ $value->id }}"
                                                                    @if($user->bank_id == $value->id)
                                                                        selected
                                                                    @endif
                                                                >
                                                                    {{ ($locale == 'en') ? $value->name_en : $value->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 pr-0">
                                                        <div class="form-group">
                                                            <select class="form-control" id="bankCategory" name="bankCategory">
                                                                <option  @if($user->bank_category == "ออมทรัพย์") selected @endif @if($user->bank_category == "" || $user->bank_category == null) selected @endif value="ออมทรัพย์">{{ trans('message.account_saving') }}</option>
                                                                <option @if($user->bank_category == "กระแสรายวัน") selected @endif value="กระแสรายวัน">{{ trans('message.account_current') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 pr-0 mb-3">
                                                        <input type="text" class="form-control" placeholder="{{ trans('message.account_name') }}" id="bankName" name="bankName" value="{{ $user->bank_name }}">
                                                    </div>
                                                    <div class="col-12 pr-0 mb-3">
                                                        <input type="text" class="form-control" placeholder="{{ trans('message.account_no') }}" id="bankNumber" name="bankNumber" value="{{ $user->bank_number }}">
                                                    </div>
                                                </div>
                                                <div class='col-lg-3 col-md-3 col-12 offset-lg-3 offset-md-4'
                                                    style='margin-bottom: 20px;'>
                                                    <button class="btn-save btn" id="submit" >{{ trans('message.save') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-5 col-md-5 col-12 order-lg-2 order-md-2 order-1'
                                    style='padding-top: 20px;background: #f8f8f8;'>
                                    <div classs='col-12'>
                                        <div style=" text-align:center; height:140px; margin-top: 30px;">
                                            <img src="{{('img/profile/'.Auth::user()->user_pic) }}"
                                                style="border-radius: 100%;height: 100%;max-width: 100%; width: 140px; object-fit: cover; object-position: 50% 0;"
                                                type="file" class=" img-thumbnail" id="user_pic2" name="user_pic2"
                                                value="{{Auth::user()->user_pic}}" onerror="this.onerror=null;this.src='/new_ui/img/menu/icon-menu-bottom-user.png'">
                                            <label for="change_pic" class="change_pic_btn">
                                                <img class='to_edit2' src="new_ui/img/user_icon_menu/edit_pic.png"
                                                    style="width: 40px;margin-top: -15px;">
                                            </label>
                                        </div>
                                        <div class='col-lg-12' style='text-align : center; padding-top: 20px'>
                                            <input id="change_pic" type="file" name="user_pic" class="change_pic_btn"
                                                onchange="readURLprofile(this)" value="{{Auth::user()->user_pic}}" accept="image/*">
                                            <label for="change_pic" class="change_pic_btn">
                                                <div class='o-btn-purple'>
                                                    {{ trans('message.select_image') }}
                                                </div>
                                            </label>
                                        </div>
                                        <div class='col-lg-12 cmt font_size_14px' style='text-align : center; padding-top: 20px'>
                                            {{ trans('message.max_img_file_size') }}
                                        </div>
                                        <div class='col-lg-12 cmt font_size_14px' style='text-align : center'>
                                            {{ trans('message.support_img_file_type') }}
                                        </div>
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

<!-- Modal -->
<div class="modal fade" id="phone_change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.change') }} {{ trans('message.tel') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- <form method="POST" action="/profile/update/phone"> --}}
            {{-- @csrf --}}
            <div class="modal-body">
                <div class="form-group row">
                    {{-- <label for="inputEmail3" class="col-sm-3 col-form-label">{{ trans('message.tel') }}</label> --}}
                    <div class="col-sm-12 mt-3 mb-3">
                        <input type="tel" class="form-control" id="p_change" name="p_change" placeholder="{{ trans('message.input_new_tel') }}" maxlength="10" required>
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.close_window') }}</button>
            <button type="submit" id="phone_submit" class="btn btn-primary">{{ trans('message.save') }}</button>
            </div>
        {{-- </form> --}}
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

    function readURLprofile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user_pic2').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#phone_submit').on('click', function(){
        var phone = $('.modal-body #p_change').val();
        $.ajax({
            method: 'POST',
            url: '/profile/update/phone',
            data: {
                '_token': '{{ csrf_token() }}',
                'p_change': phone,
            },
            success:function(data){
                if(data == 'true'){
                    alert('เปลี่ยนข้อมูลเบอร์โทรศัพท์สำเร็จ');
                    location.reload();
                }
                else{
                    alert(data);
                    location.reload();
                }
            }

        })
        // console.log(phone);
    });
</script>
@endsection
