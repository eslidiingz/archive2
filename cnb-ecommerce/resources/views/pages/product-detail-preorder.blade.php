@extends('layouts.default')
@section('style')
<link href="/plugins/lightbox2/css/lightbox.css" rel="stylesheet" />

<style>
    .nav_custom_cat {
        display: none !important;
    }

    .swiper-container {
        width: 100%;

        margin-left: auto;
        margin-right: auto;
    }

    .swiper-container-5 {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }



    .gallery-thumbs {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .rating {
        display: inline-block;
        unicode-bidi: bidi-override;
        color: #888888;
        font-size: 25px;
        height: 25px;
        width: auto;
        margin: 0;
        position: relative;
        padding: 0;
    }

    .rating-upper {
        color: #f6c100;
        padding: 0;
        position: absolute;
        z-index: 1;
        display: flex;
        width: 10px;
        left: 0;
        overflow: hidden;
    }

    .rating-lower {
        padding: 0;
        display: flex;
        z-index: 0;
    }

    .gallery-thumbs .swiper-slide {
        height: 100%;
        opacity: 0.4;
    }

    .gallery-thumbs .swiper-slide-thumb-active {
        opacity: 1;
    }

    @media (min-width: 320px) {
        .swiper-container {
            height: 65px;
        }

        .cuttom-img-big {
            width: 100%;
            height: 220px;
        }

        .gallery-top {
            height: 80%;
            width: 100%;
        }

        .h_img_detail_custom {
            height: 200px;
        }
    }

    @media (min-width: 350px) {
        .swiper-container {
            height: 80px;
        }

        .cuttom-img-big {
            width: 100%;
            height: 280px;
        }

        .gallery-top {
            height: 80%;
            width: 100%;
        }

        .h_img_detail_custom {
            height: 300px;
        }
    }

    @media (min-width: 576px) {
        .swiper-container {
            height: 100px;
        }

        .cuttom-img-big {
            width: 100%;
            height: 350px;
        }

        .gallery-top {
            height: 80%;
            width: 100%;
        }

        .h_img_detail_custom {
            height: 300px;
        }
    }

    @media (min-width: 768px) {
        .swiper-container {
            height: 140px;
        }

        .cuttom-img-big {
            width: 100%;
            height: 350px;
        }

        .gallery-top {
            height: 70%;
            width: 100%;
        }

        .h_img_detail_custom {
            height: 400px;
        }
    }

    @media (min-width: 992px) {
        .swiper-container {
            height: 70px;
        }

        .cuttom-img-big {
            width: 100%;
            height: 240px;
        }

        .gallery-top {
            height: 60%;
            width: 100%;
        }

        .h_img_detail_custom {
            height: 250px;
        }
    }

    @media (min-width: 1200px) {
        .swiper-container {
            height: 100px;
        }

        .cuttom-img-big {
            width: 100%;
            height: 290px;
        }

        .gallery-top {
            height: 320px;
            width: 100%;
        }

        .h_img_detail_custom {
            height: 320px;
        }
    }

    /*PreOrder*/
    /*.syotimer{
            text-align: center;

            margin: 0;
            padding: 0 0 10px;
        }
        .syotimer-cell{
            display: inline-block;
            margin: 0 5px;

            width: 79px;
            background: url(../img/timer.png) no-repeat 0 0;

        }
        .syotimer-cell__value{
            font-size: 20px;
            color: #80a3ca;
            height: 60px;
            line-height: 81px;
            margin: 0 0 -4px;
        }
        .syotimer-cell__unit{
            font-family: Arial, serif;
            font-size: 8px;
            text-transform: uppercase;
        }

        #simple-timer .syotimer-cell_type_day,
        #periodic-timer_period_days .syotimer-cell_type_hour,
        #layout-timer_only-seconds .syotimer-cell_type_second,
        #layout-timer_mixed-units .syotimer-cell_type_minute{
            width: 120px;
            background-image: url(../img/timer_long.png);
        }

        .option{
            font-weight: 700;
        }


        .toggle-source-code{
            width: 650px;
            margin: 10px auto;
            text-align: right;
        }
        .toggle-source-code:before{
            font-size: .9em;
            color: #666666;
            border-bottom: 1px dashed #666666;
        }
        .toggle-source-code_action_show:before{
            content: "Show code";
        }
        .toggle-source-code_action_hide:before{
            content: "Hide code";
        }
        .syotimer__head{
            display: none;
        }*/
    /*PreOrder END*/


    /* .h-product-detail:hover {
        border: 3px #c75ba1 solid;
    } */

    /* .swiper-slide-thumb-active {
        border: 3px #c75ba1 solid;
    } */
    a.nav-item.active .btn-outline-secondary {
        background-color: unset !important;
        border: 1px solid #c45e9f;
        color: #c45e9f;
    }

    a.nav-item:hover .btn-outline-secondary {
        background-color: unset !important;
        border: 1px solid #c45e9f;
        color: #c45e9f;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        border: unset;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link:hover {
        border: unset;
    }

    .nav-tabs {
        border: unset;
    }

    .sl-counter {
        display: none !important;
    }

</style>

<link rel="stylesheet" href="/new_ui/plugins/swiper/swiper.min.css?v=3">
<script src="/new_ui/plugins/swiper/swiper.min.js"></script>



@endsection
@section('content')

@php
$current_time = date("Y-m-d H:i");
@endphp

@if (session('msgStock'))
<div class="alert alert-success">
    {{ session('msgStock') }}
</div>
@endif


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 mx-auto">
            <div class="row">
                <div class="col-12 px-4 mb-4" style="background-color: #fff; border-radius: 0 0 8px 8px;">
                    <div class="row d-lg-block d-md-none d-none">
                        <div class="col-12 mt-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0" style="background-color: unset;">
                                    <li class="breadcrumb-item"><a href="/" style="color: #1947e3;">หน้าแรก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pre Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    @if(session('msgStock_PreOrder'))
                    <div class="row">
                        <div class="col-12 my-4">
                            <div class="alert alert-danger" role="alert">
                                การแจ้งเตือน : {{ session('msgStock_PreOrder') }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('basket')}}">
                        <div class="row p-lg-0 px-md-0 py-md-4 p-0">
                            <div class="col-lg-4 col-md-12 col-12 mb-lg-0 mb-md-4 mb-4 mt-4 mt-md-0 mt-lg-0">
                                <div class="swiper-container gallery-top">
                                    <div class="swiper-wrapper">
                                        @foreach ($pre->product_img as $preOrder_img)
                                            <div class="swiper-slide" style="cursor: pointer;">
                                                <div
                                                    class="d-flex align-items-center justify-content-center cuttom-img-big position-relative">
                                                    <div class="gallery h_img_detail_custom">
                                                        <a href="/img/product/{{ $preOrder_img }}"
                                                            class="big d-flex flex-row align-items-center h_img_detail_custom">
                                                            <img src="/img/product/{{ $preOrder_img }}" alt=""
                                                                style="max-height: 100%; max-width: 100%;"
                                                                onerror="this.onerror=null;this.src='/img/no_image.png'">
                                                            <div class="position-absolute pl-2 pr-4 py-1"
                                                                style="clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0 100%, 0% 50%, 0 0); top: 40px; left: 0; background-color: #23c197;">
                                                                <h6 class="mb-0" style="font-size: 14px;"><strong
                                                                        style="color: #fff;">Pre - Order</strong></h6>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="swiper-container gallery-thumbs pt-3">
                                    <div class="swiper-wrapper">

                                        @foreach ($pre->product_img as $preOrder_img)
                                            <div class="swiper-slide" style="cursor: pointer;">
                                                <div class="d-flex align-items-center justify-content-center h-product-detail"
                                                    style=" width: 100%;">
                                                    <img src="/img/product/{{$preOrder_img}}" alt=""
                                                        style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;"
                                                        onerror="this.onerror=null;this.src='/img/no_image.png'">
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 col-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="font_head_item"><strong>{{ $pre->name }}</strong></h5>
                                    </div>
                                    <div class="col-12 d-flex flex-row align-items-center mb-2">
                                        <div class="mr-4">
                                            <div class="d-flex align-items-end">
                                                <span>ราคา </span>

                                                @foreach($datetime_range as $price)
                                                    <h4 id="price" class="mb-0 mx-2 font_price" style="color: #c45e9f;">
                                                        <strong>{{ number_format(min($price['price'])) }}</strong>
                                                    </h4>
                                                @endforeach
                                                <span> บาท</span>
                                            </div>

                                            @foreach ($datetime_range as $key => $item)
                                                @foreach ($item['price'] as $key => $price)
                                                <h6 id="price{{$key}}" style="display: none">{{$price}}</h6>
                                                @endforeach
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="col-12 d-flex flex-row align-items-center">
                                        <div class="mr-lg-4 mr-md-2 mr-2 d-flex align-items-center flex-row">

                                            <div class="rating-lower">
                                                <span style="font-size: 22px;">★★★★★</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 px-0">
                                    <hr class="w-100">
                                </div>

                                <div class="col-12 d-flex flex-row align-items-center px-0">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12 col-md-12 col-12 mb-3">
                                            <h6 class="mb-0"><strong>ส่งจาก : </strong>
                                                เขตลาดพร้าว จังหวัดกรุงเทพมหานคร</h6>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <h6 class="mb-0"><strong>ค่าส่ง : </strong>
                                                0-70 บาท</h6>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 px-0">
                                    <hr class="w-100">
                                </div>

                                {{-- statr option 1 --}}
                                @foreach ($pre->preOrder_option as $option_dis1)
                                    @if(isset($option_dis1['option1']) && $option_dis1['option1'] != null)
                                        <div class="row mx-0">
                                            <div class="col-12 mb-2 px-0">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-2 col-md-12 col-12 mb-2">
                                                        <h6 class="mb-0" id="dis1">
                                                            <strong>{{ $option_dis1['option1'] }} :</strong></h6>
                                                    </div>
                                                    <div data-toggle="buttons" class="col-lg-9 col-md-6 col-12 mb-2">

                                                        @foreach ($option_dis1['dis1'] as $keyDis1 => $dis1)
                                                            <label
                                                                class="btn-outline-422a4e btn form-control btn-outline-secondary "
                                                                style="width: auto;">
                                                                <input required type="radio" data-key="{{$keyDis1}}" id="option1"
                                                                    name="dis1" value="{{ $dis1 }}" style="display: none">
                                                                <div class="mb-0">{{ @$dis1 }}</div>
                                                            </label>
                                                        @endforeach


                                                        <h6 class="text-danger regular ml-2"
                                                            style="font-size:14px; display: none;" id="warning1">
                                                            เลือกตัวเลือกเพื่อซื้อสินค้า</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($option_dis1['dis1'] as $keydis1 => $dis1)
                                            <input type="hidden" data-key="{{$keydis1}}" id="option1" name="dis1"
                                                value="{{ $dis1 }}">
                                        @endforeach
                                    @endif
                                @endforeach
                                {{-- end option 1 --}}



                                {{-- start option 2 --}}
                                @foreach ($pre->preOrder_option as $option_dis2)
                                    @if(isset($option_dis2['option2']) && $option_dis2['option2'] != null)
                                        <div class="col-12 mb-2 px-0">
                                            <div class="row align-items-center">
                                                <div class="col-lg-2 col-md-12 col-12 mb-2">
                                                    <h6 class="mb-0" id="dis2">
                                                        <strong>{{ $option_dis2['option2'] }} :</strong></h6>
                                                </div>
                                                <div data-toggle="buttons" class="col-lg-9 col-md-12 col-12 mb-2">

                                                    @foreach ($option_dis2['dis2'] as $keyDis2 => $dis2)
                                                        <label class="btn-outline-422a4e btn form-control btn-outline-secondary "
                                                            style="width: auto;">
                                                            <input required type="radio" data-key="{{ $keyDis2 }}" id="option2"
                                                                name="dis2" value="{{ $dis2 }}" style="display: none">
                                                            <h6 class="mb-0">{{ $dis2 }}</h6>
                                                        </label>
                                                    @endforeach

                                                    <h6 class="text-danger regular ml-2" style="font-size:14px; display: none;"
                                                        id="warning2">
                                                        เลือกตัวเลือกเพื่อซื้อสินค้า</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($option_dis2['dis2'] as $keydis2 => $dis2)
                                        <input type="hidden" data-key="{{ $keydis2 }}" id="option2" name="dis2"
                                            value="{{ $dis2 }}">
                                        @endforeach
                                    @endif
                                @endforeach
                                {{-- end option 2 --}}

                                <div class="col-12 mb-3 px-0">
                                    <div class="row align-items-center ">
                                        <div class="col-lg-2 col-md-12 col-7 mb-0">
                                            <h6 id="addnum" class="mb-0"><strong>จำนวน</strong></h6>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-5 d-flex flex-row">

                                            <input style="text-align: center" value="1" min="1"
                                            @foreach ($datetime_range as $keydate => $date)
                                                @if($current_time == $date['start_date'] || $current_time >= $date['start_date'] && $current_time <= $date['end_date'])
                                                    max="{{ max($date['stock']) }}"
                                                @else
                                                    max="0"
                                                @endif

                                            @endforeach
                                                name="amount" type="number"
                                                class="form-control d-inline-block mr-4 py-0 px-2" id="stock_input"
                                                placeholder="จำนวน">
                                        </div>
                                    </div>
                                </div>
                                {{-- count product --}}

                                <div class="col-12 d-flex flex-row align-items-center px-0 mb-3">
                                    <div class="row align-items-center w-100">
                                        <div class="col-lg-3 col-md-6 col-7 mb-0 pr-0">
                                            <h6 class="mb-0"><strong>ระยะเวลาสิ้นสุด : </strong></h6>
                                        </div>
                                        <div class="col-lg-9 col-md-6 col-5 d-flex flex-row">
                                            <strong>
                                                <div id="flashtime"
                                                    class="d-flex justify-content-lg-start justify-content-md-center justify-content-center"
                                                    style="width: 100%; font-size: 20px;"></div>
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-none">

                                    @foreach($datetime_range as $date)
                                        @foreach($date['stock'] as $key_stock => $stock)
                                            <span id="check_stock{{$key_stock}}">{{$stock}}</span>
                                        @endforeach
                                    @endforeach
                                </div>

                                <div class="col-12 d-flex flex-row align-items-center px-0">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12 col-md-12 col-12 mb-3">

                                            @foreach ($datetime_range as $keydate => $date)

                                                    <h6 class="mb-0 ">
                                                        <strong class="pr-2">จำนวนที่สั่งได้ &nbsp; :
                                                            <span class="check_stock_btn">0</span>
                                                            <input type="hidden" name="stock_key">
                                                        </strong>
                                                    </h6>
                                                    <span style="font-size: 15px !important; margin-bottom: 20px !important; ">
                                                        ({{ date("d-M-Y",strtotime($date['start_date']))  }}) ,
                                                        ({{ date("d-M-Y",strtotime($date['end_date']))   }})
                                                    </span>

                                                    @if($current_time == $date['start_date'] || $current_time >= $date['start_date'] && $current_time <= $date['end_date'])
                                                        <input type="hidden" name="start_date" value="{{ $date['start_date'] }}">
                                                        <input type="hidden" name="end_date" value="{{ $date['end_date'] }}">
                                                    @endif

                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                                @auth
                                <div class="col-12 px-0">
                                    <div class="form-row">
                                        <div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
                                            <button class="btn-f8eaf3 btn form-control" id="basket_add" name="which_btn"
                                                value="1" type="submit">
                                                <img class="basket_img" value="1" style="margin-top: -4px; width: 20px;"
                                                    src="/new_ui/img/menu/icon-sub-menu-user-1.svg" alt="">
                                                ใส่ตะกร้า
                                            </button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
                                            <button class="btn-f8eaf3 btn form-control" id="buy_now" name="which_btn"
                                                value="2" type="submit">
                                                <div name="which_btn">
                                                    ซื้อเลย
                                                </div>
                                                <input type="hidden" name="product_id" value="{{ $pre->id }}">
                                                <input type="hidden" name="product_name" value="{{ $pre->name }}">
                                                <input type="hidden" name="type" value="pre_order">
                                                <input type="hidden" name="shop_id" value="{{ $pre->shop_id }}">
                                                <input type="hidden" id="price_one" name="price"
                                                    value="{{ min($datetime_range[0]['price']  ) }}">
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>
                                        <div class="col-12 d-flex flex-row align-items-center mb-4">
                                            <div class="mr-4 d-flex align-items-center flex-row">
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-1.svg"
                                                        width="30px" alt=""></div>
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-2.svg"
                                                        width="30px" alt=""></div>
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-3.svg"
                                                        width="30px" alt=""></div>
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-4.svg"
                                                        width="30px" alt=""></div>
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-5.svg"
                                                        width="30px" alt=""></div>
                                            </div>
                                        </div>
                                    </div>


                                    @if(session('msgStock'))
                                    <div class="row">
                                        <div class="col-12 my-4">
                                            <div class="alert alert-danger" role="alert">
                                                การแจ้งเตือน : {{ session('msgStock') }}
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                </div>
                                @endauth

                                @guest
                                <div class="col-12 px-0">
                                    <div class="form-row">
                                        <div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
                                            <div class="btn-f8eaf3 btn form-control">
                                                <a class="col p-1" data-toggle="modal" data-target="#user-login-regis"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <img style="margin-top: -4px; width: 20px;"
                                                        src="/new_ui/img/menu/icon-sub-menu-user-1.svg" alt="">
                                                    ใส่ตะกร้า
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
                                            <div class="btn-f8eaf3 btn form-control">
                                                <a class="col p-1" data-toggle="modal" data-target="#user-login-regis"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    ซื้อเลย
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>
                                        <div class="col-12 d-flex flex-row align-items-center mb-4">
                                            <div class="mr-4 d-flex align-items-center flex-row">
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-1.svg"
                                                        width="30px" alt=""></div>
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-2.svg"
                                                        width="30px" alt=""></div>
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-3.svg"
                                                        width="30px" alt=""></div>
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-4.svg"
                                                        width="30px" alt=""></div>
                                                <div class="mr-2"><img src="/new_ui/img/footer/icon-footer-5.svg"
                                                        width="30px" alt=""></div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                @endguest
                            </div>
                            {{-- end btn group --}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-4 " style="background-color: #fff; border-radius: 8px 8px 0px 0px;">
                    <div class="row">
                        <div class="col-12 my-3">
                            <h5 class="mb-0 font_head_item" style="color: #c45e9f;"><strong>รายละเอียด</strong></h5>
                        </div>
                        <hr>
                    </div>
                </div>

                    <div class="col-12 px-4 mb-4"
                        style="background-color: #fff; border-radius: 0 0 8px 8px; border-top: 3px solid #dfe1e3;">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <h6 class="font_head_item"><strong>ข้อมูลของสินค้า</strong></h6>
                            </div>
                            <div class="col-12 d-flex flex-row align-items-center mb-2">
                                <div class="d-flex align-items-center flex-row">
                                    <div style="width: 100px;">
                                        <h6 class="mb-0"><strong style="color: #b1b7bc;">หมวดหมู่</strong></h6>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $pre->category_id }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-row align-items-center mb-2">
                                <div class="d-flex align-items-center flex-row">
                                    <div style="width: 100px; ">
                                        <h6 class="mb-0"><strong style="color: #b1b7bc;">ส่งจาก</strong></h6>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">เขตลาดพร้าว จังหวัดกรุงเทพมหานคร , อำเภอบางพลี จังหวัดสมุทรปราการ
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3" style="font-family: 'Kanit' !important;">
                                <h6 class="font_head_item"><strong>รายละเอียดสินค้า</strong></h6>
                                <p style="font-family: 'Kanit' !important;">
                                    {{ $pre->description }}
                                </p>
                            </div>
                        </div>
                    </div>

                {{-- end detail product --}}

                    @foreach ($shop_id as $shop)
                        @if($pre->shop_id == $shop->id)
                            <div class="col-12 px-4 mb-4 " style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                <div class="row mt-4 mb-lg-2 mb-md-4 mb-4">
                                    <div class="col-lg-4 col-md-8 col-8 mb-4  order-md-1 order-lg-1">
                                        <div class="media">
                                            <div class="d-flex align-items-center justify-content-center"
                                                style="width: 110px; height: 80px;">
                                                <img class="align-self-start mr-3"
                                                    style="max-height: 100%; max-width: 100%; border: 1px solid #caced1;"
                                                    src="img/shop_profiles/profile_1598941835.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p class="mb-0">จัดจำหน่ายโดย</p>
                                                <h6 class="mt-0"><strong>{{ $shop->shop_name }}</strong></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-md-4 col-4 text-center d-flex align-items-center justify-content-start flex-column mb-4 border-left-right-custom order-md-3 order-lg-2">
                                        <div>
                                            <h6 class="pt-2 mb-0" style="color: #acb0b4;">คะแนนร้านค้า</h6>
                                        </div>
                                        <div class="mt-auto">
                                            <h1 class="mb-0"><strong style="color: #c45e9f;">-</strong></h1>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-4 text-center d-md-flex d-lg-flex align-items-center justify-content-start flex-column mb-4 d-lg-block d-md-block d-none order-md-4 order-lg-3"
                                        style="border-right: 1px solid #caced1;">
                                        <div>
                                            <h6 class="pt-2 mb-0" style="color: #acb0b4;">จัดส่งตรงเวลา</h6>
                                        </div>
                                        <div class="mt-auto">
                                            <h1 class="mb-0"><strong style="color: #c45e9f;">-</strong></h1>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-md-4 col-4 text-center d-md-flex d-lg-flex align-items-center justify-content-start flex-column mb-4 d-lg-block d-md-block d-none order-md-5 order-lg-4">
                                        <div>
                                            <h6 class="pt-2 mb-0" style="color: #acb0b4;">อัตราการตอบแชท</h6>
                                        </div>
                                        <div class="mt-auto">
                                            <h1 class="mb-0"><strong style="color: #c45e9f;">-</strong></h1>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-12 order-md-2 order-lg-5">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <a class="btn-outline-c45e9f btn form-control mb-2" style="font-size: 14px;"
                                                    href="/shop-user-details?id={{ $shop->id }}"><img
                                                        src="/new_ui/img/icon-shop.svg" style="width: 20px;" class="mr-1"
                                                        alt="">ไปที่ร้านค้า</a>
                                            </div>
                                            {{-- <div class="col-lg-12 col-md-12 col-12">
                                                <div class="btn-outline-c45e9f btn form-control"><img
                                                        src="/new_ui/img/icon-chat.svg" style="width: 20px;" class="mr-2"
                                                        alt="">แชทเลย</div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif {{-- check shop --}}
                    @endforeach {{-- loop shop --}}

            </div>


            <div class="row">
                <div class="col-12 px-4 " style="background-color: #fff; border-radius: 8px 8px 0px 0px;">
                    <div class="row">
                        <div class="col-6 my-3 d-flex align-items-center">
                            <h5 class="mb-0" style="color: #c45e9f;"><strong>คะแนนของสินค้า</strong></h5>
                        </div>
                        <div class="col-6 my-3 d-flex flex-row justify-content-end">
                            @if($starpercen > 0)
                            <h5 class="mb-0 mr-2 d-flex align-items-center" style="color: #f6c100;">
                                <strong>{{ number_format(($starpercen*5)/100,1) }}</strong></h5>
                            <div class="rating d-flex align-items-center">
                                <div class="rating-upper" style="width: {{ $starpercen }}%">
                                    <span style="font-size: 22px;">★★★★★</span>
                                </div>
                                <div class="rating-lower">
                                    <span style="font-size: 22px;">★★★★★</span>
                                </div>
                            </div>
                            @else
                            <span style="color: #b1b7bc;">ไม่มีคะแนน</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 px-4 mb-1"
                    style="background-color: #fff; border-radius: 0 0 8px 8px; border-top: 3px solid #dfe1e3;">
                    <div class="row my-4">
                        @if (isset($rating_data))
                        <div class="col-12">
                            <nav>
                                <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active col-lg com-md-6 col-6 px-1 order-lg-0 order-md-0 order-0 pt-1"
                                        id="nav-tab-1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1"
                                        aria-selected="true">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-lg-2 mb-md-0 mb-0 mr-2 d-flex flex-row justify-content-center ">
                                            ทั้งหมด <span
                                                class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data) }})</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-1 order-md-2 order-2 pt-1"
                                        id="nav-tab-2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            5 ดาว <span
                                                class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',5)) }})</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-2 order-md-3 order-3 pt-1"
                                        id="nav-tab-3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            4 ดาว <span
                                                class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',4)) }})</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-3 order-md-4 order-4 pt-1"
                                        id="nav-tab-4" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            3 ดาว <span
                                                class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',3)) }})</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-4 order-md-5 order-5 pt-1"
                                        id="nav-tab-5" data-toggle="tab" href="#nav-5" role="tab" aria-controls="nav-5"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            2 ดาว <span
                                                class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',2)) }})</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-5 order-md-6 order-6 pt-1"
                                        id="nav-tab-6" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-6"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            1 ดาว <span
                                                class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',1)) }})</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col-6 px-1 order-lg-6 order-md-1 order-1 pt-1"
                                        id="nav-tab-7" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-7"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-lg-2 mb-md-0 mb-0 mr-2 px-1 d-flex flex-row justify-content-center">
                                            รูปภาพ <span
                                                class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('picture','!=',null)) }})</span>
                                        </div>
                                    </a>
                                </div>
                            </nav>
                        </div>
                        @else
                        <div class="col-12">
                            <nav>
                                <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active col-lg com-md-6 col-6 px-1 order-lg-0 order-md-0 order-0 pt-1"
                                        id="nav-tab-1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1"
                                        aria-selected="true">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-lg-2 mb-md-0 mb-0 mr-2 d-flex flex-row justify-content-center ">
                                            ทั้งหมด <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-1 order-md-2 order-2 pt-1"
                                        id="nav-tab-2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            5 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-2 order-md-3 order-3 pt-1"
                                        id="nav-tab-3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            4 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-3 order-md-4 order-4 pt-1"
                                        id="nav-tab-4" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            3 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-4 order-md-5 order-5 pt-1"
                                        id="nav-tab-5" data-toggle="tab" href="#nav-5" role="tab" aria-controls="nav-5"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            2 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col px-1 order-lg-5 order-md-6 order-6 pt-1"
                                        id="nav-tab-6" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-6"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
                                            1 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
                                    </a>
                                    <a class="nav-item nav-link col-lg com-md col-6 px-1 order-lg-6 order-md-1 order-1 pt-1"
                                        id="nav-tab-7" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-7"
                                        aria-selected="false">
                                        <div
                                            class="btn-outline-secondary btn form-control mb-lg-2 mb-md-0 mb-0 mr-2 px-1 d-flex flex-row justify-content-center">
                                            รูปภาพ <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
                                    </a>
                                </div>
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-tab-1">

                            @if(isset($rating_data) && count($rating_data) > 0)
                            <div class="row">
                                <div class="col-12 p-4 mb-4 "
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    @foreach ($rating_data as $item)
                                    @foreach ($user_data as $item1)
                                    @foreach ($inv_data as $item2)
                                    @if ($item->user_id == $item1->id)
                                    @if ($item->invs_id == $item2->id)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="media">
                                                <div style="height: 50px;">
                                                    <img src="{{asset('img/profile/'.$item1->user_pic) }}"
                                                        style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
                                                        class="align-self-start mr-3" alt="...">
                                                </div>
                                                <div class="media-body d-flex flex-row">
                                                    <div>
                                                        <h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
                                                        @php
                                                        $percent = 0;
                                                        $percent = ($item->rating /5) * 100;
                                                        @endphp
                                                        <div class="rating d-flex align-items-center">
                                                            <div class="rating-upper" style="width: {{ $percent }}%">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                            <div class="rating-lower">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($item2->inv_products as $value)
                                                    @if ($value['product_id'] == $item->product_id)
                                                    @if (!isset($value['type']) || $value['type'] != '')
                                                    @if (isset($value['dis1']) || $value['dis1'] != '')
                                                    @if (isset($value['dis2']) || $value['dis2'] != '')
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
                                                    </div>
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}</h6>
                                                    </div>
                                                    @endif
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            ไม่มีตัวเลือกสินค้า</h6>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <h6>{{ $item->comment }}</h6>
                                        </div>
                                        <div class="col-12">
                                            @if (isset($item->picture))
                                            @foreach (json_decode($item->picture) as $value)
                                            <div class="gallery">
                                                <a class="big" href="{{asset('img/rating/'.$value) }}">
                                                    <img src="{{asset('img/rating/'.$value) }}"
                                                        class="img-fluid rounded8px mr-2"
                                                        style="width: 60px; height:60px;" alt="">
                                                </a>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-12 mt-2">
                                            <p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
                                        </div>
                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12 p-4 mb-4 text-center"
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    <h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
                                </div>
                            </div>
                            @endif
                            {{-- end comment rating --}}
                        </div>
                        <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-tab-2">
                            {{-- comment rating --}}
                            @if(isset($rating_data) && count($rating_data->where('rating',5)) > 0)
                            <div class="row">
                                <div class="col-12 p-4 mb-4 "
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    @foreach ($rating_data->where('rating',5) as $item)
                                    @foreach ($user_data as $item1)
                                    @foreach ($inv_data as $item2)
                                    @if ($item->user_id == $item1->id)
                                    @if ($item->invs_id == $item2->id)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="media">
                                                <div style="height: 50px;">
                                                    <img src="{{asset('img/profile/'.$item1->user_pic) }}"
                                                        style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
                                                        class="align-self-start mr-3" alt="...">
                                                </div>
                                                <div class="media-body d-flex flex-row">
                                                    <div>
                                                        <h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
                                                        {{-- <p class="mb-0" style="color: #f6c100;">
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                        </p> --}}
                                                        @php
                                                        $percent = 0;
                                                        $percent = ($item->rating /5) * 100;
                                                        @endphp
                                                        <div class="rating d-flex align-items-center">
                                                            <div class="rating-upper" style="width: {{ $percent }}%">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                            <div class="rating-lower">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($item2->inv_products as $value)
                                                    @if ($value['product_id'] == $item->product_id)
                                                    @if (!isset($value['type']) || $value['type'] != '')
                                                    @if (isset($value['dis1']) || $value['dis1'] != '')
                                                    @if (isset($value['dis2']) || $value['dis2'] != '')
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
                                                    </div>
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}</h6>
                                                    </div>
                                                    @endif
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            ไม่มีตัวเลือกสินค้า</h6>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                                {{-- <div>
                                                                    <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
                                                                </div> --}}
                                            </div>
                                        </div>

                                        {{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
                                                            {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
                                                        </div> --}}
                                        <div class="col-12 mt-2">
                                            <h6>{{ $item->comment }}</h6>
                                        </div>
                                        <div class="col-12">
                                            @if (isset($item->picture))
                                            @foreach (json_decode($item->picture) as $value)
                                            <div class="gallery">
                                                <a class="big" href="{{asset('img/rating/'.$value) }}">
                                                    <img src="{{asset('img/rating/'.$value) }}"
                                                        class="img-fluid rounded8px mr-2"
                                                        style="width: 60px; height:60px;" alt="">
                                                </a>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-12 mt-2">
                                            <p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
                                        </div>
                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12 p-4 mb-4 text-center"
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    <h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
                                </div>
                            </div>
                            @endif
                            {{-- end comment rating --}}
                        </div>
                        <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-tab-3">
                            {{-- comment rating --}}
                            @if(isset($rating_data) && count($rating_data->where('rating',4)) > 0)
                            <div class="row">
                                <div class="col-12 p-4 mb-4 "
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    @foreach ($rating_data->where('rating',4) as $item)
                                    @foreach ($user_data as $item1)
                                    @foreach ($inv_data as $item2)
                                    @if ($item->user_id == $item1->id)
                                    @if ($item->invs_id == $item2->id)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="media">
                                                <div style="height: 50px;">
                                                    <img src="{{asset('img/profile/'.$item1->user_pic) }}"
                                                        style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
                                                        class="align-self-start mr-3" alt="...">
                                                </div>
                                                <div class="media-body d-flex flex-row">
                                                    <div>
                                                        <h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
                                                        {{-- <p class="mb-0" style="color: #f6c100;">
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                        </p> --}}
                                                        @php
                                                        $percent = 0;
                                                        $percent = ($item->rating /5) * 100;
                                                        @endphp
                                                        <div class="rating d-flex align-items-center">
                                                            <div class="rating-upper" style="width: {{ $percent }}%">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                            <div class="rating-lower">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($item2->inv_products as $value)
                                                    @if ($value['product_id'] == $item->product_id)
                                                    @if (!isset($value['type']) || $value['type'] != '')
                                                    @if (isset($value['dis1']) || $value['dis1'] != '')
                                                    @if (isset($value['dis2']) || $value['dis2'] != '')
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
                                                    </div>
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}</h6>
                                                    </div>
                                                    @endif
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            ไม่มีตัวเลือกสินค้า</h6>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                                {{-- <div>
                                                                    <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
                                                                </div> --}}
                                            </div>
                                        </div>

                                        {{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
                                                            {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
                                                        </div> --}}
                                        <div class="col-12 mt-2">
                                            <h6>{{ $item->comment }}</h6>
                                        </div>
                                        <div class="col-12">
                                            @if (isset($item->picture))
                                            @foreach (json_decode($item->picture) as $value)
                                            <div class="gallery">
                                                <a class="big" href="{{asset('img/rating/'.$value) }}">
                                                    <img src="{{asset('img/rating/'.$value) }}"
                                                        class="img-fluid rounded8px mr-2"
                                                        style="width: 60px; height:60px;" alt="">
                                                </a>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-12 mt-2">
                                            <p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
                                        </div>
                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12 p-4 mb-4 text-center"
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    <h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
                                </div>
                            </div>
                            @endif
                            {{-- end comment rating --}}
                        </div>
                        <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-tab-4">
                            {{-- comment rating --}}
                            @if(isset($rating_data) && count($rating_data->where('rating',3)) > 0)
                            <div class="row">
                                <div class="col-12 p-4 mb-4 "
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    @foreach ($rating_data->where('rating',3) as $item)
                                    @foreach ($user_data as $item1)
                                    @foreach ($inv_data as $item2)
                                    @if ($item->user_id == $item1->id)
                                    @if ($item->invs_id == $item2->id)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="media">
                                                <div style="height: 50px;">
                                                    <img src="{{asset('img/profile/'.$item1->user_pic) }}"
                                                        style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
                                                        class="align-self-start mr-3" alt="...">
                                                </div>
                                                <div class="media-body d-flex flex-row">
                                                    <div>
                                                        <h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
                                                        {{-- <p class="mb-0" style="color: #f6c100;">
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                        </p> --}}
                                                        @php
                                                        $percent = 0;
                                                        $percent = ($item->rating /5) * 100;
                                                        @endphp
                                                        <div class="rating d-flex align-items-center">
                                                            <div class="rating-upper" style="width: {{ $percent }}%">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                            <div class="rating-lower">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($item2->inv_products as $value)
                                                    @if ($value['product_id'] == $item->product_id)
                                                    @if (!isset($value['type']) || $value['type'] != '')
                                                    @if (isset($value['dis1']) || $value['dis1'] != '')
                                                    @if (isset($value['dis2']) || $value['dis2'] != '')
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
                                                    </div>
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}</h6>
                                                    </div>
                                                    @endif
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            ไม่มีตัวเลือกสินค้า</h6>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                                {{-- <div>
                                                                    <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
                                                                </div> --}}
                                            </div>
                                        </div>

                                        {{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
                                                            {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
                                                        </div> --}}
                                        <div class="col-12 mt-2">
                                            <h6>{{ $item->comment }}</h6>
                                        </div>
                                        <div class="col-12">
                                            @if (isset($item->picture))
                                            @foreach (json_decode($item->picture) as $value)
                                            <div class="gallery">
                                                <a class="big" href="{{asset('img/rating/'.$value) }}">
                                                    <img src="{{asset('img/rating/'.$value) }}"
                                                        class="img-fluid rounded8px mr-2"
                                                        style="width: 60px; height:60px;" alt="">
                                                </a>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-12 mt-2">
                                            <p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
                                        </div>
                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12 p-4 mb-4 text-center"
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    <h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
                                </div>
                            </div>
                            @endif
                            {{-- end comment rating --}}
                        </div>
                        <div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-tab-5">
                            {{-- comment rating --}}
                            @if(isset($rating_data) && count($rating_data->where('rating',2)) > 0)
                            <div class="row">
                                <div class="col-12 p-4 mb-4 "
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    @foreach ($rating_data->where('rating',2) as $item)
                                    @foreach ($user_data as $item1)
                                    @foreach ($inv_data as $item2)
                                    @if ($item->user_id == $item1->id)
                                    @if ($item->invs_id == $item2->id)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="media">
                                                <div style="height: 50px;">
                                                    <img src="{{asset('img/profile/'.$item1->user_pic) }}"
                                                        style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
                                                        class="align-self-start mr-3" alt="...">
                                                </div>
                                                <div class="media-body d-flex flex-row">
                                                    <div>
                                                        <h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
                                                        {{-- <p class="mb-0" style="color: #f6c100;">
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                        </p> --}}
                                                        @php
                                                        $percent = 0;
                                                        $percent = ($item->rating /5) * 100;
                                                        @endphp
                                                        <div class="rating d-flex align-items-center">
                                                            <div class="rating-upper" style="width: {{ $percent }}%">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                            <div class="rating-lower">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($item2->inv_products as $value)
                                                    @if ($value['product_id'] == $item->product_id)
                                                    @if (!isset($value['type']) || $value['type'] != '')
                                                    @if (isset($value['dis1']) || $value['dis1'] != '')
                                                    @if (isset($value['dis2']) || $value['dis2'] != '')
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
                                                    </div>
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}</h6>
                                                    </div>
                                                    @endif
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            ไม่มีตัวเลือกสินค้า</h6>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                                {{-- <div>
                                                                    <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
                                                                </div> --}}
                                            </div>
                                        </div>

                                        {{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
                                                            {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
                                                        </div> --}}
                                        <div class="col-12 mt-2">
                                            <h6>{{ $item->comment }}</h6>
                                        </div>
                                        <div class="col-12">
                                            @if (isset($item->picture))
                                            @foreach (json_decode($item->picture) as $value)
                                            <div class="gallery">
                                                <a class="big" href="{{asset('img/rating/'.$value) }}">
                                                    <img src="{{asset('img/rating/'.$value) }}"
                                                        class="img-fluid rounded8px mr-2"
                                                        style="width: 60px; height:60px;" alt="">
                                                </a>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-12 mt-2">
                                            <p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
                                        </div>
                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12 p-4 mb-4 text-center"
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    <h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
                                </div>
                            </div>
                            @endif
                            {{-- end comment rating --}}
                        </div>
                        <div class="tab-pane fade" id="nav-6" role="tabpanel" aria-labelledby="nav-tab-6">
                            {{-- comment rating --}}
                            @if(isset($rating_data) && count($rating_data->where('rating',1)) > 0)
                            <div class="row">
                                <div class="col-12 p-4 mb-4 "
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    @foreach ($rating_data->where('rating',1) as $item)
                                    @foreach ($user_data as $item1)
                                    @foreach ($inv_data as $item2)
                                    @if ($item->user_id == $item1->id)
                                    @if ($item->invs_id == $item2->id)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="media">
                                                <div style="height: 50px;">
                                                    <img src="{{asset('img/profile/'.$item1->user_pic) }}"
                                                        style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
                                                        class="align-self-start mr-3" alt="...">
                                                </div>
                                                <div class="media-body d-flex flex-row">
                                                    <div>
                                                        <h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
                                                        {{-- <p class="mb-0" style="color: #f6c100;">
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                        </p> --}}
                                                        @php
                                                        $percent = 0;
                                                        $percent = ($item->rating /5) * 100;
                                                        @endphp
                                                        <div class="rating d-flex align-items-center">
                                                            <div class="rating-upper" style="width: {{ $percent }}%">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                            <div class="rating-lower">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($item2->inv_products as $value)
                                                    @if ($value['product_id'] == $item->product_id)
                                                    @if (!isset($value['type']) || $value['type'] != '')
                                                    @if (isset($value['dis1']) || $value['dis1'] != '')
                                                    @if (isset($value['dis2']) || $value['dis2'] != '')
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
                                                    </div>
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}</h6>
                                                    </div>
                                                    @endif
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            ไม่มีตัวเลือกสินค้า</h6>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                                {{-- <div>
                                                                    <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
                                                                </div> --}}
                                            </div>
                                        </div>

                                        {{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
                                                            {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
                                                        </div> --}}
                                        <div class="col-12 mt-2">
                                            <h6>{{ $item->comment }}</h6>
                                        </div>
                                        <div class="col-12">
                                            @if (isset($item->picture))
                                            @foreach (json_decode($item->picture) as $value)
                                            <div class="gallery">
                                                <a class="big" href="{{asset('img/rating/'.$value) }}">
                                                    <img src="{{asset('img/rating/'.$value) }}"
                                                        class="img-fluid rounded8px mr-2"
                                                        style="width: 60px; height:60px;" alt="">
                                                </a>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-12 mt-2">
                                            <p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
                                        </div>
                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12 p-4 mb-4 text-center"
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    <h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
                                </div>
                            </div>
                            @endif
                            {{-- end comment rating --}}
                        </div>
                        <div class="tab-pane fade" id="nav-7" role="tabpanel" aria-labelledby="nav-tab-7">
                            {{-- comment rating --}}
                            @if(isset($rating_data) && count($rating_data->where('picture', '!=', null)) > 0)
                            <div class="row">
                                <div class="col-12 p-4 mb-4 "
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    @foreach ($rating_data->where('picture', '!=', null) as $item)
                                    @foreach ($user_data as $item1)
                                    @foreach ($inv_data as $item2)
                                    @if ($item->user_id == $item1->id)
                                    @if ($item->invs_id == $item2->id)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="media">
                                                <div style="height: 50px;">
                                                    <img src="{{asset('img/profile/'.$item1->user_pic) }}"
                                                        style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;"
                                                        class="align-self-start mr-3" alt="...">
                                                </div>
                                                <div class="media-body d-flex flex-row">
                                                    <div>
                                                        <h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
                                                        {{-- <p class="mb-0" style="color: #f6c100;">
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                            <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
                                                                        </p> --}}
                                                        @php
                                                        $percent = 0;
                                                        $percent = ($item->rating /5) * 100;
                                                        @endphp
                                                        <div class="rating d-flex align-items-center">
                                                            <div class="rating-upper" style="width: {{ $percent }}%">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                            <div class="rating-lower">
                                                                <span style="font-size: 22px;">★★★★★</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($item2->inv_products as $value)
                                                    @if ($value['product_id'] == $item->product_id)
                                                    @if (!isset($value['type']) || $value['type'] != '')
                                                    @if (isset($value['dis1']) || $value['dis1'] != '')
                                                    @if (isset($value['dis2']) || $value['dis2'] != '')
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
                                                    </div>
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            {{ $value['dis1'] }}</h6>
                                                    </div>
                                                    @endif
                                                    @else
                                                    <div class="d-lg-block d-md-block d-none">
                                                        <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
                                                            ไม่มีตัวเลือกสินค้า</h6>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                                {{-- <div>
                                                                    <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
                                                                </div> --}}
                                            </div>
                                        </div>

                                        {{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
                                                            {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
                                                        </div> --}}
                                        <div class="col-12 mt-2">
                                            <h6>{{ $item->comment }}</h6>
                                        </div>
                                        <div class="col-12">
                                            @if (isset($item->picture))
                                            @foreach (json_decode($item->picture) as $value)
                                            <div class="gallery">
                                                <a class="big" href="{{asset('img/rating/'.$value) }}">
                                                    <img src="{{asset('img/rating/'.$value) }}"
                                                        class="img-fluid rounded8px mr-2"
                                                        style="width: 60px; height:60px;" alt="">
                                                </a>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-12 mt-2">
                                            <p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
                                        </div>
                                        <div class="col-12">
                                            <hr class="w-100">
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12 p-4 mb-4 text-center"
                                    style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                    <h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
                                </div>
                            </div>
                            @endif
                            {{-- end comment rating --}}
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
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
      maxWidth : 300,
    })
</script>

<script>
    $(document).ready(function () {

        $("#addnum").click(function () {
            $("#input1").hide();
        });


        $("input[type=radio]").click(function () {
            if (($("#option2").length == 0)) {
                op1 = parseInt($('input[id=option1]:checked').data('key'));
            }
            if (($("#option2").length == 1)) {
                op1 = parseInt($('input[id=option1]:checked').data('key') * $('input[id=option2]').length) + parseInt($('input[id=option2]:checked').data('key'));
            }
            if (op1 >= 0) {
                // alert($('#price'+op1).text());
                // console.log(" checkde : " + op1);

                $("#price").html(commaSeparateNumber($('#price' + op1).text()));
                $(".check_stock_btn").html($("#check_stock" + op1).text());
                $('input[name="stock_key"]').val(op1);
                $("#stock_input").attr('max', $('#check_stock' + op1).text());
                $("#price_one").val($('#price' + op1).text());
            }
        });

        // if(!$("input[type=radio]")){
            var option1 = $('input[id=option1]').data('key');
            var option2 = $('input[id=option2]').data('key');
            var op1 = option1;
            $("#price").html(commaSeparateNumber($('#price' + op1).text()));
            $(".check_stock_btn").html($("#check_stock" + op1).text());
            $('input[name="stock_key"]').val(op1);
            $("#stock_input").attr('max', $('#check_stock' + op1).text());
            $("#price_one").val($('#price' + op1).text());
        // }

        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
            }
            return val;
        }
        $("#stock_input").keypress(function () {
            console.log(this.value);
            if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
            }
        });

        $("#stock_input").change(function () {
            var n = this.value.toString();
            n2 = n;
            var i;
            for (i = 0; i < this.value.length; i++) {
                if (n[i] < 1) {
                    n2 = n.substring(i + 1, n.length);
                } else {
                    break;
                }
            }
            this.value = n2;
        });

        // $(".check_item").change(function(){
        //     if($(".check_item").prop("checked", true)){
        //         $(this).css({"border": "#FFFFFF","background-color": "#422a4e","color": "#FFFFFF"})
        //     }
        //     else{
        //         $(this).css({"border": "#422a4e","background-color": "#FFFFFF","color": "#422a4e"})
        //     }
        // });


        $('#basket_add').add($('#buy_now')).click(function () {
            if (($("#option1").length > 0)) {
                if ($('input[id=option1]').is(':checked')) {} else {
                    $('#warning1').show();
                    $("#warning1").css("display", "inline-block");
                }
            }
            if (($('#option2').length > 0)) {
                if ($('input[id=option2]').is(':checked')) {} else {
                    $('#warning2').show();
                    $("#warning2").css("display", "inline-block");
                }
            }
        });

        $('input[id=option1]').click(function () {
            $('#warning1').hide();
        });
        $('input[id=option2]').click(function () {
            $('#warning2').hide();
        });

        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: false,
            freeMode: true,
            loopedSlides: 5, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            loop: false,
            loopedSlides: 5, //looped slides should be the same
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs,
            },
        });


    });


</script>



<script>
    $(document).ready(function () {

        $(".check_stock_btn").on('DOMSubtreeModified', function () {
            var check = $(this).text();
            if (check == 0) {
                $('button[name="which_btn"]').css('color', 'grey').css('cursor', 'not-allowed').prop('disabled', true);
                $('.basket_img').css('filter', 'invert(50%)');
            } else {
                $('button[name="which_btn"]').css('color', '#c45e9f').css('cursor', 'pointer').prop('disabled', false);
                $('.basket_img').css('filter', 'invert(0%)');
            }
        });


        $("#flashtime").on('DOMSubtreeModified', function () {
            var check = $(this).text();
            if (check == "EXPIRED") {
                $('button[name="which_btn"]').css('color', 'grey').css('cursor', 'not-allowed').prop('disabled', true);
                $('.basket_img').css('filter', 'invert(50%)');
            } else {
                $('button[name="which_btn"]').css('color', '#c45e9f').css('cursor', 'pointer').prop('disabled', false);
                $('.basket_img').css('filter', 'invert(0%)');
            }
        });
    });
</script>




<script>
    // Set the date we're counting down to
// var countDownDate = new Date().plusDays(1).getTime();
$(document).ready(function () {
    var date_db = $('input[name="end_date"]').val();
    var countDownDate = new Date(date_db).getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("flashtime").innerHTML = days + " : " + hours + " : " +
            minutes + " : " + seconds + " ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("flashtime").innerHTML = "EXPIRED";
        }
    }, 1000);
});
</script>
@endsection
