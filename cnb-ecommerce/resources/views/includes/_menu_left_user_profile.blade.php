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

    /* .sidenav a:hover {
        color: #f1f1f1;
    } */

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

<div class="sidenav col-xl-12 col-lg-12">
    <div class="col-12 px-0 ">
        <div id="accordion" style='padding-top: 10px;'>
            <div class='container col-12 mt-3' style='background-color : #F9F9F9;border-radius: 8px;'>
                <div class='row mx-0' style='padding-top:15px; padding-bottom: 15px;'>
                    <div class='col-4 px-0' style='height: 70px;display: flex;justify-content: center;'>
                        <img src="{{('/img/profile/'.Auth::user()->user_pic) }}"
                        onerror="this.onerror=null;this.src='/new_ui/img/menu/user_icon.svg'" style="border-radius: 100%;height: 100%;max-width: 100%; width: 70px; object-fit: cover; object-position: 50% 0;" >
                        {{-- <label for="change_pic_btn2">
                            <img class='to_edit' src="/new_ui/img/user_icon_menu/edit_pic.png" style="width: 25px;">
                        </label>
                        <form id='chpic' class='m-0' action="/profile/chpic" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input class='change_pic' type="file" name="user_pic" id="change_pic_btn2" onchange="auto_submit()" value="{{Auth::user()->user_pic}}">
                        </form> --}}

                    </div>
                    <div class='col-8' style=" padding-top: 15px;">
                        <div class="row w-100">
                            <div class="col-12 px-0">
                                <h5 class="font_size_14px text-dark"><strong><?php echo Auth::user()->name ?></strong></h5>
                            </div>
                            <div class="col-12 px-0">
                                <a href="{{ url('profile') }}" class="d-flex align-items-start">
                                    <i class="fa fa-pencil  icon-pencil"></i><small class="color-sky"><strong  class="ml-2">{{ trans('message.pf_edit') }}</strong></small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($wallet->status) && $wallet->status=='appect')
                    <!-- <div class="font_size_14px mt-1">
                        <strong>ยอดเงินในวอลเล็ท</strong>
                    </div>
                    <div class='col-12 row' style='padding-right: 0px;'>
                        <div class='col-7'
                            style='border-right: 1px solid #c45e9f; padding-left : 0px;font-size: 22px;color: #c45e9f;'>
                            <strong>
                                ฿ {{ number_format($wallet->credit,2) }}
                            </strong>
                        </div>
                        <div class='col-5 font-weight-bold d-flex align-items-center' data-toggle="modal" data-target="#Wallet"  style='font-size: 14px; padding-right: 0px;cursor: pointer;'>
                            <img src="/new_ui/img/user_icon_menu/wallet-icon.svg" style="width: 25px;" style="width: 30px; "
                                class="pr-2" alt="">

                            เติมเงิน

                        </div>
                    </div> -->
                @else
                    <!-- <div class="col-12 mt-2 mb-4 px-0">
                        <a href="{{ url('profile_wallet_t10') }}"><button class="btn btn-c75ba1 form-control mb-3">เปิดใช้ Wallet</button></a>
                    </div> -->
                @endif
            </div>

            <!-- <div class="card" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center"
                    style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                    href="#collapseOne">
                    <strong class="text-purple">
                        <img src="/new_ui/img/user_icon_menu/icon_side_1.png" style="width: 25px;" class="pr-2"
                            alt="">{{ trans('message.my_account') }}
                    </strong>
                    <div class="collapsedIcon">
                        <h4 class="m-0" style="color: #333;"><i class="fa fa-angle-up" aria-hidden="true"></i></h2>
                    </div>
                </div>
                <div id="collapseOne" class="collapse show">
                    <div class="card-body py-0">
                        <a class="px-0" href="{{ url('profile') }}">
                            <h6 style="text-indent: 25px;">{{ trans('message.pf_my_info') }}</h6>
                        </a>
                        a class="px-0" href="{{ url('profile_paymen_method') }}">
                            <h6 style="text-indent: 25px;">ช่องทางการชำระเงิน</h6>
                        </a
                        <a class="px-0" href="{{ url('profile_wallet_t10') }}">
                            <h6 style="text-indent: 25px;">วอลเลต Multi Pay</h6>
                        </a>
                        <a class="px-0" href="{{ url('address') }}">
                            <h6 style="text-indent: 25px;">{{ trans('message.my_address') }}</h6>
                        </a>
                        <a class="px-0" href="{{ url('change_pass') }}">
                            <h6 style="text-indent: 25px;">{{ trans('message.change_password') }}</h6>
                        </a>
                        a class="px-0 d-flex align-items-center" href="/profile/KYC">
                            <h6 style="text-indent: 25px; ">
                                @php
                                $status =
                                ['0'=>'ยังไม่ได้ทำการพิสูจน์ตัวตน','1'=>'ตรวจสอบผ่านแล้ว','2'=>'ทำการแก้ไขรูปภาพ','3'=>'รอการตรวจสอบ'];
                                $color = ['0'=>'badge badge-secondary ml-2','1'=>'badge badge-success ml-2','2'=>'badge
                                badge-danger ml-2','3'=>'badge badge-warning ml-2'];
                                @endphp
                                ยืนยันตัวตน
                                <span class="{{$color[Auth::user()->kyc_status]}}"
                                    style="color: white; text-indent: 0px !important;">{{ $status[Auth::user()->kyc_status] }}</span>
                            </h6>
                        </a
                    </div>
                </div>
            </div> -->
            <div class="card mt-3" style="border: none;">
                <div class="card-header d-flex justify-content-between align-items-center"
                    style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
                    {{-- href="#collapseTwo" --}}>
                    <a href="{{ url('profile_my_sale') }}" style='font-size: 16px; padding:0px;'><strong
                            class="text-purple">
                            <img src="/new_ui/img/menu/fi-br-shopping-cart-add.svg" style="width: 30px;" class="pr-2"
                                alt="">{{ trans('message.my_order') }}
                        </strong>
                        <div class="collapsedIcon" style='display : none'>
                            <h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
                        </div>
                    </a>
                </div>
            </div>
            <div id="collapseTwo" class="collapse show">
                <div class="card-body py-0">
                    @include('component.shop_step')
                </div>
            </div>
            @if (isset(Auth::user()->ref_code))
                <!-- <div class="input-group d-flex flex-column refcode">
                    <div class=" mt-3 mb-2">
                        <strong class="text-purple d-flex justify-content-start align-items-center">
                            <img src="/new_ui/img/user_icon_menu/shop_recommend.svg" style="width: 35px;"
                                            class="pr-2" alt="">
                            <p class="mb-0">{{ trans('message.pf_suggest_friend') }}</p>
                        </strong>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" readonly="readonly" value="{{isset(Auth::user()->ref_code)? Auth::user()->ref_code:''}}" class="form-control" id="copyText">
                        <div class="input-group-append" style="cursor: pointer;">
                            <span class="input-group-text" style="background-color: #346751; border-color: #346751;">
                                <p class="mb-0 text-white" id="btnCopy" onclick="copyRef()"><strong><i class="fa fa-link" aria-hidden="true"></i> {{ trans('message.copy') }}</strong></p class="mb-0">
                            </span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" readonly="readonly" value="{{isset(Auth::user()->ref_code)? url('').'/welcome?ref_code='.Auth::user()->ref_code:''}}" class="form-control" id="copyLink">
                        <div class="input-group-append" style="cursor: pointer;">
                            <span class="input-group-text" style="background-color: #346751; border-color: #346751;">
                                <p class="mb-0 text-white" id="btnLink" onclick="copyLink()"><strong><i class="fa fa-link" aria-hidden="true"></i> {{ trans('message.copy') }}</strong></p class="mb-0">
                            </span>
                        </div>
                    </div>

                </div> -->
            @endif
        </div>
    </div>
</div>

@include('pages.payment-page.modal_add_wallet')

<script>
    $( document ).ready(function() {
        var check = $('#copyText').val();
        if(check == ''){
            document.getElementById("btnCopy").disabled = true;
            document.getElementById("btnLink").disabled = true;
        }
        else{
            document.getElementById("btnCopy").disabled = false;
            document.getElementById("btnLink").disabled = false;
        }

    });

    function copyLink() {
        var copyLink = document.getElementById("copyLink");
        copyLink.select();
        copyLink.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }

    function copyRef() {
        var copyText = document.getElementById("copyText");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }


    $('.collapse').on('show.bs.collapse', function() {
        id = $(this).attr('id');
        $('div[href="#' + id + '"] div.collapsedIcon h4').html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
    });
    $('.collapse').on('hide.bs.collapse', function() {
        id = $(this).attr('id');
        $('div[href="#' + id + '"] div.collapsedIcon h4').html(
            '<i class="fa fa-angle-down" aria-hidden="true"></i>');
    });



    function auto_submit() {
        alert(document.getElementById("change_pic2").value);
        $("#chpic").submit();
    }
</script>
