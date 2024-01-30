<style>
    .sidenav {
        height: 100%;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #fff;
        overflow-x: hidden;
    }

    .to_edit {
        position: absolute;
        top: 45px;
        right: 0;
    }

    .text-purple {
        color: #333 !important;
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .change_pic {
        display: none;
    }

    .change_pic2 {
        display: none;
    }

    @media (min-width: 350px) {
        .sidenav {
            width: 0px;
        }

        .main {
            margin-left: 0;
            width: 100%;
        }
    }

    @media (min-width: 576px) {
        .sidenav {
            width: 0px;
        }

        .main {
            margin-left: 0;
            width: 100%;
        }
    }

    @media (min-width: 768px) {
        .sidenav {
            width: 0px;
        }

        .main {
            margin-left: 0;
            width: 100%;
        }

    }

    @media (min-width: 992px) {
        .sidenav {
            width: 100%;
        }

    }
</style>
<?php

//use App\User;

//$user = User::Where('id', Auth::user()->id)->first();

?>

<div class="sidenav col-12">
    <div class="col-12 px-0">
        <div id="accordion" style='padding-top: 10px;'>
            <div class='container col-12 mt-3' style='background-color : #f8eaf3;border-radius: 8px;'>
                <div class='col-12 row' style='padding-top:15px;'>
                    <div class='col-4' style='padding-left : 0px;'>
                        <img src="{{asset('img/profile/'.Auth::user()->user_pic) }}"
                            style="width: 70px; height:70px;border-radius:50%">
                        {{-- <label for="change_pic_btn2">
                            <img class='to_edit' src="new_ui/img/user_icon_menu/edit_pic.png" style="width: 25px;">
                        </label>
                        <form id='chpic' class='m-0' action="/profile/chpic" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input class='change_pic' type="file" name="user_pic" id="change_pic_btn2" onchange="auto_submit()" value="{{Auth::user()->user_pic}}">
                        </form> --}}
                    </div>
                    <div class='col-8' style=" padding-top: 15px;">
                        <div class='d-flex'>
                            <div>
                                <h5><strong><?php echo Auth::user()->name ?></strong></h5>
                            </div>

                            <div style='padding-left : 10px;'>
                                <a href='{{ url('profile') }}' class="d-flex align-items-start">
                                    <img src="new_ui/img/user_icon_menu/edit_name.png" style="width: 15px;">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    ยอดเงินในวอลเล็ท
                </div>
                <div class='col-12 row' style='padding-right: 0px;'>
                    <div class='col-7'
                        style='border-right: 1px solid #333; padding-left : 0px;font-size: 22px;color: #333;'>
                        <strong>
                            ฿ -
                        </strong>
                    </div>
                    <div class='col-5 font-weight-bold' style='font-size: 15px; padding-right: 0px;'>
                        <img src="new_ui/img/user_icon_menu/wallet-icon.svg" style="width: 25px;" style="width: 30px;"
                            class="pr-2" alt="">

                        เติมเงิน

                    </div>
                </div>
            </div>
            <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center"
                    style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                    href="#collapseOne">
                    <strong class="text-purple">
                        <img src="new_ui/img/user_icon_menu/icon_side_1.png" style="width: 25px;" class="pr-2"
                            alt="">บัญชีของฉัน
                    </strong>
                    <div class="collapsedIcon">
                        <h4 class="m-0" style="color: #333;"><i class="fa fa-angle-up" aria-hidden="true"></i></h2>
                    </div>
                </div>
                <div id="collapseOne" class="collapse show">
                    <div class="card-body py-0">
                        <a class="px-0" href="{{ url('profile') }}">
                            <h6 style="text-indent: 30px;">ข้อมูลส่วนตัว</h6>
                        </a>
                        <!--a class="px-0" href="{{ url('profile_paymen_method') }}">
                            <h6 style="text-indent: 30px;">ช่องทางการชำระเงิน</h6>
                        </a-->
                        <a class="px-0" href="{{ url('profile_wallet_t10') }}">
                            <h6 style="text-indent: 30px;">วอลเลต T10</h6>
                        </a>
                        <a class="px-0" href="{{ url('address') }}">
                            <h6 style="text-indent: 30px;">ที่อยู่</h6>
                        </a>
                        <a class="px-0" href="{{ url('change_pass') }}">
                            <h6 style="text-indent: 30px;">เปลี่ยนรหัสผ่าน</h6>
                        </a>
                        <a class="px-0 d-flex align-items-center" href="/profile/KYC">
                            <h6 style="text-indent: 30px; ">
                                @php
                                $status =
                                ['0'=>'ยังไม่ได้ทำการพิสูจน์ตัวตน','1'=>'ตรวจสอบผ่านแล้ว','2'=>'ทำการแก้ไขรูปภาพ','3'=>'รอการตรวจสอบ'];
                                $color = ['0'=>'badge badge-secondary ml-2','1'=>'badge badge-success ml-2','2'=>'badge
                                badge-danger ml-2','3'=>'badge badge-warning ml-2'];
                                @endphp
                                KYC
                                <span class="{{$color[Auth::user()->kyc_status]}}"
                                    style="color: white; text-indent: 0px !important;">{{ $status[Auth::user()->kyc_status] }}</span>
                            </h6>
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center"
                    style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                    href="#collapseTwo">
                    <a href="{{ url('profile_my_sale') }}" style='font-size: 16px; padding:0px;'><strong
                            class="text-purple">
                            <img src="new_ui/img/user_icon_menu/cart-icon.png" style="width: 25px;" class="pr-2"
                                alt="">การซื้อของฉัน
                        </strong>
                        <div class="collapsedIcon" style='display : none'>
                            <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseThree">
                    <strong class="text-purple">
                        <img src="new_ui/img/user_icon_menu/bell-icon.svg" style="width: 25px;" style="width: 30px;" class="pr-2" alt="">การแจ้งเตือน
                    </strong>
                    <div class="collapsedIcon">
                        <h4 class="m-0" style="color: #333;"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
                    </div>
                </div>
                <div id="collapseThree" class="collapse show">
                    <div class="card-body py-0">
                        <a class="px-0" href="{{ url('profile_user_notification') }}">
                            <h6 style="text-indent: 30px;">อัพเดทคำสั่งซื้อ</h6>
                        </a>
                        <a class="px-0" href="{{ url('profile_user_notification2') }}">
                            <h6 style="text-indent: 30px;">เรื่องโปรโมชั่น</h6>
                        </a>
                        <a class="px-0" href="{{ url('profile_user_notification3') }}">
                            <h6 style="text-indent: 30px;">รายการอัพเดท T10 Wallet</h6>
                        </a>
                    </div>
                </div>
            </div-->
            <!--div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseFour">
                    <a href="{{ url('profile_coupon') }}" style='font-size: 16px; padding:0px;'><strong class="text-purple">
                            <img src="new_ui/img/user_icon_menu/ticket-icon.svg" style="width: 25px;" style="width: 30px;" class="pr-2" alt="">คูปอง / ส่วนลดของฉัน
                        </strong>
                        <div class="collapsedIcon" style='display : none'>
                            <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
                        </div>
                    </a>
                </div>
            </div-->
            <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center"
                    style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                    href="#collapseFive">

                    <a href="/profile/wishlist" style='font-size: 16px; padding:0px;'><strong class="text-purple">
                            <img src="new_ui/img/user_icon_menu/wish-icon.svg" style="width: 25px;" style="width: 30px;"
                                class="pr-2" alt="">
                            วิสลิสต์ ของฉัน
                        </strong>
                        <div class="collapsedIcon" style='display : none'>
                            <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center"
                    style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                    href="#collapseFive">

                    <a href="/profile/KYC" style='font-size: 16px; padding:0px;'><strong class="text-purple">
                            <img src="new_ui/img/user_icon_menu/wish-icon.svg" style="width: 25px;" style="width: 30px;"
                                class="pr-2" alt="">
                            @php
                            $status =
                            ['0'=>'ยังไม่ได้ทำการพิสูจน์ตัวตน','1'=>'ตรวจสอบผ่านแล้ว','2'=>'ทำการแก้ไขรูปภาพ','3'=>'รอการตรวจสอบ'];
                            $color = ['0'=>'badge badge-secondary','1'=>'badge badge-success','2'=>'badge badge-danger','3'=>'badge badge-warning'];
                            @endphp
                            KYC
                            
                            <span class="{{$color[Auth::user()->kyc_status]}} ml-2"
                                style="color: white">{{ $status[Auth::user()->kyc_status] }}</span>
                            
                        </strong>
                        <div class="collapsedIcon" style='display : none'>
                            <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
    </div>
</div>

@section('script')
<script>
    $('.collapse').on('show.bs.collapse', function() {
    id = $(this).attr('id');
    $('div[href="#' + id + '"] div.collapsedIcon h4').html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
});
$('.collapse').on('hide.bs.collapse', function() {
    id = $(this).attr('id');
    $('div[href="#' + id + '"] div.collapsedIcon h4').html(
        '<i class="fa fa-angle-down" aria-hidden="true"></i>');
});

</script>
@endsection