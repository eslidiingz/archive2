@extends('new_ui.layouts.front-end')
@section('style')
    @php
    // dd($product_all);
    // dd($search_name);
    @endphp
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css') }}">
    <style>
        body {
            background-color: #fff !important;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: unset;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .product-img-thumbnail {
            width: 100%;
            height: 220px;
            max-height: 220px;
            object-fit: cover !important;
            margin-top: -80px;
            border-radius: 5px;
        }

        .crop-text-2 {
            -webkit-line-clamp: 2;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            padding-top: 14px;
            height: 45px
        }

        .scroll {
            overflow-x: hidden;
            overflow-y: auto;
            -ms-overflow-style: none;
            height: 35.7vw;
            max-height: 520px;
        }

        .scroll {
            position: static;

            .sub-category {
                position: absolute;
                z-index: 2 !important;
                display: none;
            }

            &:hover>.sub-category {
                display: block;
            }
        }

        .scroll::-webkit-scrollbar {
            display: none;
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
            color: #346751;
            padding: 0;
            position: absolute;
            z-index: 1;
            display: flex;
            top: 0;
            width: 10px;
            left: 0;
            overflow: hidden;
        }

        .rating-lower {
            padding: 0;
            display: flex;
            z-index: 0;
        }

        li.active a:not([href]).sub_category {
            color: #346751 !important;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row d-lg-block d-md-none d-none">
            <!-- <div class="col-12 p-0">
                                @include('component.breadcrumb')
                            </div> -->
        </div>
        {{-- <div class="row m-0 rounded8px pb-4 mt-lg-0 mt-md-4 mt-4" style="background-color: #fff;">
            <div class="col-12 mt-lg-4 mt-md-3 mt-3 ">
                <h3 class="mb-0 font_head_item"><strong>คู่ค้าของเรา</strong></h3>
            </div>
            <div class="col-12">
                <hr class="w-100 mt-md-2 mt-lg-3">
            </div>
            <div class="col-12">
                <div class="swiper-container-4" style="overflow: hidden;">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-1.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-2.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-3.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-4.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-6.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-7.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-8.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-1.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-2.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-3.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-4.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-6.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-7.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/new_ui/img/customer/customer-8.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
         </div> --}}
        <div class="row pt-2">
            <div class="col-12 d-flex align-items-center justify-content-center nav_menu_custom w-100 pb-4">
                <img src="/new_ui/img/banner-register.png" alt="" class="w-100">
            </div>
            <div class="col-2 d-lg-block d-md-none d-none pt-3">
                <div class="row">
                    @if (isset($subcategory_all) && sizeof($subcategory_all) > 0)
                        <div class="col-12 d-flex flex-row">
                            <h5 class="mb-0">
                                <img src="/new_ui/img/menu/icon-menu-categories.png" width="27px" class="mr-3"
                                    alt="..."><strong>{{ trans('message.category') }}</strong>
                            </h5>
                        </div>
                </div>
                @endif
                <div class="col-12 mt-4">
                    <h5 class="mb-0">
                        <img src="/new_ui/img/menu/icon-menu-search-all.png" width="27px" class="mr-2"
                            alt="..."><strong>{{ trans('message.more_filter') }}</strong>
                    </h5>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>
                {{-- <div class="col-12">
                    <h5 class="my-3"><strong>Channel of transport</strong></h5>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="1" id="Transport1" name="transport">
                        <label class="form-check-label" for="Transport1">
                            <h6>Kerry Express</h6>
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="2" id="Transport2" name="transport">
                        <label class="form-check-label" for="Transport2">
                            <h6>Thailand Post - EMS</h6>
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="3" id="Transport3" name="transport">
                        <label class="form-check-label" for="Transport3">
                            <h6>Thailand Post - Registered Mail</h6>
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="4" id="Transport4" name="transport">
                        <label class="form-check-label" for="Transport4">
                            <h6>Transport by Shop</h6>
                        </label>
                    </div>
                </div> --}}
                {{-- <div class="col-12">
                    <hr class="w-100">
                </div> --}}

                {{-- @if (!isset($address_otop_geography))
                <div class="col-12">
                    <h5 class="my-3"><strong>ส่งจาก</strong></h5>
                    @foreach (@$address_all as $item)
                        @if (str_replace(' ', '', $item->city) != '')
                            <li style="list-style: none">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="{{$item->city}}"
                name="location" value="{{$item->city}}">
                <label class="form-check-label" for="{{$item->city}}">
                    <h6>{{$item->city}}</h6>
                </label>
            </div>
            </li>
            @endif
            @endforeach
        </div>
        <div class="col-12">
            <hr class="w-100">
        </div>
        @endif --}}

                {{-- <div class="col-12">
                    <h5 class="my-3"><strong>Payment Option</strong></h5>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="payment1">
                        <label class="form-check-label" for="payment1">
                            <h6>ชำระเงินปลายทาง</h6>
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="payment2">
                        <label class="form-check-label" for="payment2">
                            <h6>บัตรเครดิต</h6>
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>
                <div class="col-12">
                    <h5 class="my-3"><strong>บริการและโปรโมชั่น</strong></h5>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="service1">
                        <label class="form-check-label" for="service1">
                            <h6>พร้อมส่วนลด</h6>
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="service2">
                        <label class="form-check-label" for="service2">
                            <h6>รับเงินคืน 10%</h6>
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="service3">
                        <label class="form-check-label" for="service3">
                            <h6>ส่งพรี</h6>
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>
                <div class="col-12">
                    <h5 class="my-3"><strong>ประเภทร้าน</strong></h5>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="shoptype1">
                        <label class="form-check-label" for="shoptype1">
                            <h6>Shopteenii Mall</h6>
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="shoptype2">
                        <label class="form-check-label" for="shoptype2">
                            <h6>ร้านแนะนำ</h6>
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div> --}}
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <strong>{{ trans('message.price') }}</strong>
                        </div>
                        <div class="col-6">
                            <strong id="clear_checkbox"
                                style="color: #346751; text-decoration: underline;cursor: pointer;float: right;">{{ trans('message.clear') }}</strong>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card-deck">
                                <div class="card">
                                    <input type="text" class="form-control" id="minPrice" name="minPrice"
                                        value="{{ $request->minPrice }}" placeholder="min">
                                </div>
                                <strong style="align-self: center;">-</strong>
                                <div class="card">
                                    <input type="text" class="form-control" id="maxPrice" name="maxPrice"
                                        value="{{ $request->maxPrice }}" placeholder="max">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>&nbsp;</div>
                    <!-- <div class="row">
                                        <div class="col-6">
                                            <strong>{{ trans('message.address_province_ex') }}</strong>
                                        </div>
                                        <div class="col-6">
                                        </div>
                                    </div> -->
                    <div class="row mt-3">
                        <div class="col-12">
                        </div>
                        <div class="col-12 mt-3">
                            <div class="btn btn-c75ba1 form-control font-btn-custom px-0" id="ok" name="dis1">
                                {{ trans('message.search') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-12 mt-4">
                                <strong>{{ trans('message.product_rating') }}</strong>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" value="5" name="rating"
                                        <?php if (isset($a_wh_rating) && in_array('5', $a_wh_rating)) {
                                            echo 'checked';
                                        } ?>>
                                    <h6>
                                        <div class="rating">
                                            <div class="rating-upper" style="width: 100%">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                            <div class="rating-lower">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                        </div>
                                    </h6>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="4" name="rating"
                                        <?php if (isset($a_wh_rating) && in_array('4', $a_wh_rating)) {
                                            echo 'checked';
                                        } ?>>
                                    <h6>
                                        <div class="rating">
                                            <div class="rating-upper" style="width: 80%">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                            <div class="rating-lower">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                        </div>
                                        <small style="color: #000000;">{{ trans('message.up') }}</small>
                                    </h6>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="3" name="rating"
                                        <?php if (isset($a_wh_rating) && in_array('3', $a_wh_rating)) {
                                            echo 'checked';
                                        } ?>>
                                    <h6>
                                        <div class="rating">
                                            <div class="rating-upper" style="width: 60%">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                            <div class="rating-lower">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                        </div>
                                        <small style="color: #000000;">{{ trans('message.up') }}</small>
                                    </h6>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="2" name="rating"
                                        <?php if (isset($a_wh_rating) && in_array('2', $a_wh_rating)) {
                                            echo 'checked';
                                        } ?>>
                                    <h6>
                                        <div class="rating">
                                            <div class="rating-upper" style="width: 40%">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                            <div class="rating-lower">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                        </div>
                                        <small style="color: #000000;">{{ trans('message.up') }}</small>
                                    </h6>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="rating"
                                        <?php if (isset($a_wh_rating) && in_array('1', $a_wh_rating)) {
                                            echo 'checked';
                                        } ?>>
                                    <h6>
                                        <div class="rating">
                                            <div class="rating-upper" style="width: 20%">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                            <div class="rating-lower">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                        </div>
                                        <small style="color: #000000;">{{ trans('message.up') }}</small>
                                    </h6>
                                </div>
                            </div> -->


                {{-- <div class="col-12">
                    <button class="btn btn-danger form-control" id="clear_checkbox2">{{ trans('message.delete_all') }}</button>
    </div> --}}
            </div>
        </div>
        <div class="col-lg-10 col-md-12 col-12 pt-3">

            @if (!empty($shop_search))
                {{-- start tab shop --}}
                <!-- <div class='text-right'>
                                       <a class='text-main' href='shop-search-all?search={{ $search_name }}'> ร้านค้าอื่นๆ > </a>
                                    </div> -->
                <!-- <div class="col-12 px-0 mb-4 rounded8px" style="background-color: #eee;">
                                            <div class="row mt-4 mb-lg-2 mb-md-4 mb-4 mx-0">
                                                <div class="col-lg-4 col-md-8 col-8  order-md-1 order-lg-1 d-flex align-items-center mb-4">
                                                    <div class="media d-flex align-items-center justify-content-center">
                                                        <div class="d-flex align-items-center justify-content-center"
                                                            style="width: 110px; height: 80px;">
                                                            <img class="align-self-start mr-3"
                                                                style="max-height: 100%; max-width: 100%; border: 1px solid #666;"
                                                                src="{{ '/img/shop_profiles/' . $shop_search->shop_pic }}" alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mb-0"><strong>จัดจำหน่ายโดย</strong></p>
                                                            <h6 class="mt-0">{{ $shop_search->shop_name }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-2 col-md-4 col-4 text-center d-flex align-items-center justify-content-start flex-column border-left-right-custom order-md-3 order-lg-2 mb-4">
                                                    <div>
                                                        <h6 class="pt-2 mb-0" style="color: #333;"><strong>คะแนนร้านค้า</strong></h6>
                                                    </div>
                                                    <div class="mt-auto">
                                                        <h1 class="mb-0"><strong style="color: #006957;">-</strong></h1>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-4 col-4 text-center d-md-flex d-lg-flex align-items-center justify-content-start flex-column d-lg-block d-md-block d-none order-md-4 order-lg-3 mb-4"
                                                    style="border-right: 1px solid #666;">
                                                    <div>
                                                        <h6 class="pt-2 mb-0" style="color: #333;"><strong>จัดส่งตรงเวลา</strong></h6>
                                                    </div>
                                                    <div class="mt-auto">
                                                        <h1 class="mb-0"><strong style="color: #006957;">-</strong></h1>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-2 col-md-4 col-4 text-center d-md-flex d-lg-flex align-items-center justify-content-start flex-column d-lg-block d-md-block d-none order-md-5 order-lg-4 mb-4">
                                                    <div>
                                                        <h6 class="pt-2 mb-0" style="color: #333;"><strong>อัตราการตอบแชท</strong></h6>
                                                    </div>
                                                    <div class="mt-auto">
                                                        <h1 class="mb-0"><strong style="color: #006957;">-</strong></h1>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-4 col-12 order-md-2 order-lg-5 d-flex align-items-center ">
                                                    <div class="row w-100 mx-0">
                                                        <div class="col-12 px-0">
                                                            <a href="/shop-user-details?id={{ $shop_search->id }}" class="w-100">
                                                                <button class="btn form-control mb-2 text-white" style=" font-size: 14px; background-color: #333; border-radius: 10px;">
                                                                    <img src="/new_ui/img/icon-shop.svg" class="mr-1" alt="">ไปที่ร้านค้า
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                <!-- <div class="col-12 px-4 mb-4 " style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
                                        <div class="row pt-4 mb-lg-2 mb-md-4 mb-4">
                                            <div class="col-lg-4 col-md-8 col-8 mb-4  order-md-1 order-lg-1">
                                                <div class="media">
                                                    <div class="d-flex align-items-center justify-content-center"
                                                        style="width: 110px; height: 80px;">
                                                        <img class="align-self-start mr-3"
                                                            style="max-height: 100%; max-width: 100%; border: 1px solid #caced1;"
                                                            src="{{ asset('img/shop_profiles/' . $shop_search->shop_pic) }}" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mb-0">จัดจำหน่ายโดย</p>
                                                        <h5 class="mt-0"><strong>{{ $shop_search->shop_name }}</strong></h5>
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
                                                        <a class="btn-outline-c45e9f btn form-control mb-2"
                                                            href="/shop-user-details?id={{ $shop_search->id }}"><img
                                                                src="/new_ui/img/icon-shop.svg" style="width: 20px;" class="mr-2"
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
                                    </div> -->
            @else
            @endif
            {{-- end tab shop --}}
            <div class="row rounded8px py-4 mx-0 align-items-center itemHidden" style="background-color: #fff;">
                <div class="col-12 mb-lg-2 mb-md-3 mb-3">
                    <div class="row">
                        <div class="">
                            <h5 class="mb-0 pl-lg-4 pl-md-4 pl-3 pt-2 font_head_item">
                                <strong>{{ trans('message.sort_by') }}</strong>
                            </h5>
                        </div>
                        <div>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group ml-3 mr-3" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-filter" id="order1"
                                        style="@if (request('sortBy') == 'pop') color: #fff;border: 1px solid #346751;border-radius: 6px;background-color: #346751; @endif">{{ trans('message.popular') }}</button>
                                </div>
                                <div class="btn-group mr-3" role="group" aria-label="Second group">
                                    <button type="button" class="btn btn-filter" id="order2"
                                        style="@if (request('sortBy') == 'ctime') color: #fff;border: 1px solid #346751;border-radius: 6px;background-color: #346751; @endif">{{ trans('message.most_recent') }}</button>
                                </div>
                                <div class="btn-group mr-3" role="group" aria-label="Second group">
                                    <button type="button" class="btn btn-filter" id="order3"
                                        style="@if (request('sortBy') == 'sales') color: #fff;border: 1px solid #346751;border-radius: 6px;background-color: #346751; @endif">{{ trans('message.best_sale') }}</button>
                                </div>
                                <div class="btn-group mr-3" role="group" aria-label="Second group">
                                    <button type="button" class="btn btn-filter" id="order4"
                                        style="@if (request('sortBy') == 'priceLess') color: #fff;border: 1px solid #346751;border-radius: 6px;background-color: #346751; @endif">{{ trans('message.price_min_max') }}</button>
                                </div>
                                <div class="btn-group mr-3" role="group" aria-label="Third group">
                                    <button type="button" class="btn btn-filter" id="order5"
                                        style="@if (request('sortBy') == 'priceMore') color: #fff;border: 1px solid #346751;border-radius: 6px;background-color: #346751; @endif">{{ trans('message.price_max_min') }}</button>
                                </div>
                                <div class="btn-group mr-3" role="group" aria-label="Fourth group">
                                    <button type="button" class="btn btn-filter" id="order6"
                                        style="@if (request('isPromo') == 'Y') color: #fff;border: 1px solid #346751;border-radius: 6px;background-color: #346751; @endif"
                                        data-value="{{ $request->isPromo }}">{{ trans('message.price_special') }}</button>
                                </div>
                                <div class="btn-group mr-3" role="group" aria-label="sixth group">
                                    @if ($locale == 'en')
                                        <select id="chkProvince" multiple="multiple">
                                            @foreach ($province_en as $item)
                                                <option value="{{ $item->id }}"
                                                    @if (in_array($item->id, $a_selected_province)) selected="selected" @endif>
                                                    {{ $item->name_en }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select id="chkProvince" multiple="multiple">
                                            @foreach ($province_th as $item)
                                                <option value="{{ $item->id }}"
                                                    @if (in_array($item->id, $a_selected_province)) selected="selected" @endif>
                                                    {{ $item->name_th }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row rounded8px py-4 mx-0 align-items-center itemHiddenDesktop" style="background-color: #fff;">
                <div class="container">
                    <div class="itemHiddenDesktop">
                        <h5 class="mb-0 pl-lg-4 pl-md-0 pl-0 pt-2 font_head_item">
                            <strong>{{ trans('message.sort_by') }}</strong>
                        </h5>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-2">
                            <button type="button"
                                class="btn btn-filter w-100 @if (request('sortBy') == 'pop') active @endif"
                                id="order1">{{ trans('message.popular') }}</button>
                        </div>
                        <div class="col-6 mt-2">
                            <button type="button"
                                class="btn btn-filter w-100 @if (request('sortBy') == 'ctime') active @endif"
                                id="order2">{{ trans('message.most_recent') }}</button>
                        </div>
                        <div class="col-6 mt-2">
                            <button type="button"
                                class="btn btn-filter w-100 @if (request('sortBy') == 'sales') active @endif"
                                id="order3">{{ trans('message.best_sale') }}</button>
                        </div>
                        <div class="col-6 mt-2">
                            <select class="custom-select" id="cboPrice"
                                style="color: #000000;border: 1px solid #F0F0F0;border-radius: 6px;background-color: #F0F0F0;">
                                <option selected>{{ trans('message.price') }}</option>
                                <option value="priceLess" @if (request('sortBy') == 'priceLess') selected @endif>
                                    <button type="button" class="btn btn-filter"
                                        id="order4">{{ trans('message.price_min_max') }}</button>
                                </option>
                                <option value="priceMore" @if (request('sortBy') == 'priceMore') selected @endif>
                                    <button type="button" class="btn btn-filter"
                                        id="order5">{{ trans('message.price_max_min') }}</button>
                                </option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <button type="button"
                                class="btn btn-filter w-100 @if (request('isPromo') == 'Y') active @endif"
                                id="order6"
                                data-value="{{ $request->isPromo }}">{{ trans('message.price_special') }}</button>
                        </div>
                        <div class="col-6 mt-2">
                            @if ($locale == 'en')
                                <select id="chkProvince2" class="btn btn-filter w-100" multiple="multiple">
                                    @foreach ($province_en as $item)
                                        <option value="{{ $item->id }}"
                                            @if (in_array($item->id, $a_selected_province)) selected="selected" @endif>
                                            {{ $item->name_en }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select id="chkProvince2" class="btn btn-filter w-100" multiple="multiple">
                                    @foreach ($province_th as $item)
                                        <option value="{{ $item->id }}"
                                            @if (in_array($item->id, $a_selected_province)) selected="selected" @endif>
                                            {{ $item->name_th }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="itemHiddenDesktop mt-2">
                        <h5 class="mb-0 pl-lg-4 pl-md-0 pl-0 pt-2 font_head_item"><strong>ราคา</strong></h5>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <input type="text" class="form-control" id="minPrice2" name="minPrice2"
                                value="{{ $request->minPrice }}" placeholder="min">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="maxPrice2" name="maxPrice2"
                                value="{{ $request->maxPrice }}" placeholder="max">
                        </div>
                        <div class="col-4">
                            <div class="btn btn-c75ba1 w-100" id="ok" name="dis1">
                                {{ trans('message.search') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="hdPrivince" value="{{ $request->province }}">
            {{-- <div class="d-flex justify-content-center">
                    <div class="spinner-border pink" role="status" id="wait" style="display:none">
                      <span class="sr-only">Loading...</span>
                    </div>
                </div> --}}
            <div id="tag_container" class="col-12 p-0 mt-3">
                @if (count($product_all) == 0)
                    @include('component.no-data')
                    {{-- @elseif() --}}
                @else
                    @include('component.pagination_data')
                @endif
            </div>

        </div>
    </div>
@endsection
@section('script')
    <!-- Bootstrap Multiselect JS -->
    <script src="{{ URL::asset('/assets/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js') }}"></script>

    <script>
        var swiper = new Swiper('.swiper-container-4', {
            slidesPerView: 8,
            spaceBetween: 30,
            freeMode: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                320: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 6,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 6,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 8,
                    spaceBetween: 50,
                },
            }
        });
    </script>

    <script type="text/javascript">
        $(".dropdown-menu li a ").click(function() {
            $(this).closest('.btn-group').find('.btn').text($(this).text());
            $(".btn:first-child").val($(this).text());
            $(".dropdown-toggle").addClass("active");
            $('.radio').removeClass('active');
        });

        $("input[name='geography']").click(function() {
            if ($(this).is(":checked")) {
                $('#province' + $(this).val()).show();
            } else {
                $('#province' + $(this).val()).hide();
                $('#province' + $(this).val() + " input[name='location']").prop("checked", false);

                var location = new Array();
                $("input[name='location']:checked").each(function() {
                    location.push($(this).val());
                });

                var transport = '';
                urlParams.set('transport', transport);
                urlParams.set('location', location);
                var category = urlParams.get('category');
                var page = 1;
                var search = urlParams.get('search');
                var sub = urlParams.get('sub');
                var sortBy = urlParams.get('sortBy');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                var isPromo = urlParams.get('isPromo');
                getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null,
                    isPromo);

            }
        });

        $("#clear_checkbox,#clear_checkbox2").click(function() {
            $("input[name='location'] , input[name='geography'] , input[name='transport']").prop("checked", false);
            $('.province').hide();
            event.preventDefault();
            var transport = '';
            var location = '';
            urlParams.set('transport', transport);
            urlParams.set('location', location);
            var page = 1;
            var search = urlParams.get('search');
            var category = urlParams.get('category');
            var minPrice = '';
            var maxPrice = '';
            var sub = urlParams.get('sub');
            var sortBy = urlParams.get('sortBy');
            var isPromo = urlParams.get('isPromo');
            var rating = '';
            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo);
        });

        var urlParams = new URLSearchParams(window.location.search);

        $('.datalist li:gt(10)').hide();
        var l = $('.datalist li').length;
        if (l > 11) {
            $('#readmore').show();
        } else {
            $('#readmore').hide();
        }
        $('#readmore').click(function() {
            $('.datalist li:gt(10)').toggle('slide');
        });


        $(document).on('click', "input[name='location']", function() {
            var location = new Array();
            $("input[name='location']:checked").each(function() {
                location.push($(this).val());
            });
            if ($("input[name='transport']").is(":checked")) {
                var transport = urlParams.get('transport');
            } else {
                var transport = '';
                urlParams.set('transport', transport);
            }

            urlParams.set('location', location);
            var category = urlParams.get('category');
            var page = 1;
            var search = urlParams.get('search');
            var sub = urlParams.get('sub');
            var sortBy = urlParams.get('sortBy');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var isPromo = urlParams.get('isPromo');
            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo);

        });

        $(document).on('click', "input[name='transport']", function() {
            var transport = new Array();
            $("input[name='transport']:checked").each(function() {
                transport.push($(this).val());
            });

            if ($("input[name='location']").is(":checked")) {
                var location = urlParams.get('location');
            } else {
                var location = '';
                urlParams.set('location', location);
            }

            urlParams.set('transport', transport);
            var category = urlParams.get('category');
            var page = 1;
            var search = urlParams.get('search');
            var sub = urlParams.get('sub');
            var sortBy = urlParams.get('sortBy');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var isPromo = urlParams.get('isPromo');
            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo);
        });

        $('.category').on('click', function() {
            event.preventDefault();
            var transport = urlParams.get('transport');
            var location = urlParams.get('location');
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var category = $(this).data('key');
            urlParams.set('category', category);
            var page = 1;
            var search = urlParams.get('search');
            var sub = urlParams.get('sub');
            var sortBy = urlParams.get('sortBy');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var isPromo = urlParams.get('isPromo');

            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo);
        });

        $(document).on('click', '.sub_category', function() {
            // $("ul li #category .sub_category ").css('color','black');
            // $('i').removeClass('fa-circle')
            // $(this).css('color','#c75ba1 !important');
            // $(this).css('border','1px solid red');
            // alert('click');
            $(this).find('i').toggleClass('fa-circle')
            event.preventDefault();
            var transport = urlParams.get('transport');
            var location = urlParams.get('location');
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var sub = $(this).data('key');
            urlParams.set('sub', sub);
            var page = 1;
            var search = urlParams.get('search');
            var category = urlParams.get('category');
            var sortBy = urlParams.get('sortBy');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var isPromo = urlParams.get('isPromo');

            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo);
        });

        // $(document).on('click', '.pagination a',function()
        // {
        //     event.preventDefault();
        //     var location = urlParams.get('transport');
        //     var location = urlParams.get('location');
        //     $('li').removeClass('active');
        //     $(this).parent('li').addClass('active');
        //     var page = $(this).attr('href').split('page=')[1];
        //     var search = urlParams.get('search');
        //     var category =  urlParams.get('category');
        //     var sortBy =  urlParams.get('sortBy');
        //     var minPrice = urlParams.get('minPrice');
        //     var maxPrice = urlParams.get('maxPrice');
        //     var sub = urlParams.get('sub');
        //     getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
        // });

        $(document).on('click', '#order1', function(event) {
            event.preventDefault();
            var transport = urlParams.get('transport');
            var location = urlParams.get('location');
            var page = 1;
            var search = urlParams.get('search');
            var category = urlParams.get('category');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var rating = $('input[name=rating]:checked').map(function(i, e) {
                return e.value
            }).toArray();
            var sub = urlParams.get('sub');
            var sortBy = 'pop';
            urlParams.set('sortBy', 'pop');
            var isPromo = urlParams.get('isPromo');
            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo,
                rating);
        });

        $(document).on('click', '#order2, #new-product', function(event) {
            event.preventDefault();
            var transport = urlParams.get('transport');
            var location = urlParams.get('location');
            var page = 1;
            var search = urlParams.get('search');
            var category = urlParams.get('category');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var rating = $('input[name=rating]:checked').map(function(i, e) {
                return e.value
            }).toArray();
            var sub = urlParams.get('sub');
            var sortBy = 'ctime';
            urlParams.set('sortBy', 'ctime');
            var isPromo = urlParams.get('isPromo');
            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo,
                rating);
        });

        $(document).on('click', '#order3', function(event) {
            event.preventDefault();
            var transport = urlParams.get('transport');
            var location = urlParams.get('location');
            var page = 1;
            var search = urlParams.get('search');
            var category = urlParams.get('category');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var rating = $('input[name=rating]:checked').map(function(i, e) {
                return e.value
            }).toArray();
            var sub = urlParams.get('sub');
            var sortBy = 'sales';
            urlParams.set('sortBy', 'sales');
            var isPromo = urlParams.get('isPromo');
            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo,
                rating);
        });

        $(document).on('click', '#order4', function(event) {
            event.preventDefault();
            var transport = urlParams.get('transport');
            var location = urlParams.get('location');
            var page = 1;
            var search = urlParams.get('search');
            var category = urlParams.get('category');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var rating = $('input[name=rating]:checked').map(function(i, e) {
                return e.value
            }).toArray();
            var sub = urlParams.get('sub');
            var sortBy = 'priceLess';
            urlParams.set('sortBy', 'priceLess');
            var isPromo = urlParams.get('isPromo');
            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo,
                rating);
        });

        $(document).on('click', '#order5', function(event) {
            event.preventDefault();
            var transport = urlParams.get('transport');
            var location = urlParams.get('location');
            var page = 1;
            var search = urlParams.get('search');
            var category = urlParams.get('category');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var rating = $('input[name=rating]:checked').map(function(i, e) {
                return e.value
            }).toArray();
            var sub = urlParams.get('sub');
            var sortBy = 'priceMore';
            urlParams.set('sortBy', 'priceMore');
            var isPromo = urlParams.get('isPromo');
            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo,
                rating);
        });

        $(document).on('click', '#order6', function(event) {
            event.preventDefault();
            var transport = urlParams.get('transport');
            var location = urlParams.get('location');
            var page = 1;
            var search = urlParams.get('search');
            var category = urlParams.get('category');
            var minPrice = urlParams.get('minPrice');
            var maxPrice = urlParams.get('maxPrice');
            var rating = $('input[name=rating]:checked').map(function(i, e) {
                return e.value
            }).toArray();
            var sub = urlParams.get('sub');
            var maxPrice = urlParams.get('maxPrice');
            var sortBy = urlParams.get('sortBy');
            if ($(this).data('value') == 'Y') {
                urlParams.set('isPromo', 'N');
            } else {
                urlParams.set('isPromo', 'Y');
            }

            var isPromo = urlParams.get('isPromo');
            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, null, isPromo,
                rating);
        });
        var a_province = Array();

        $(document).on('click', '#ok', function(event) {
            if ($('input[name=type]:checked').length > 0) {
                var type = $('input[name=type]:checked').val();
            }
            event.preventDefault();
            var transport = urlParams.get('transport');
            var location = urlParams.get('location');
            var page = 1;
            var search = urlParams.get('search');
            var category = urlParams.get('category');
            var sortBy = $('#cboPrice').val();
            var minPrice = $('#minPrice').val() || 0
            var maxPrice = $('#maxPrice').val() || 0
            var rating = $('input[name=rating]:checked').map(function(i, e) {
                return e.value
            }).toArray();
            var sub = urlParams.get('sub');
            var isPromo = urlParams.get('isPromo');

            urlParams.set('sortBy', sortBy);
            urlParams.set('minPrice', minPrice);
            urlParams.set('maxPrice', maxPrice);
            urlParams.set('type', type);

            getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, type, isPromo,
                rating);
        });

        $('#chkProvince,#chkProvince2').multiselect({
            templates: {
                @if ($locale == 'en')
                    button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown">Province</button>',
                @else
                    button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown">จังหวัด</button>',
                @endif
            },
            onInitialized: function(select, container) {
                a_province = $('#hdPrivince').val().split(",");
            },
            onChange: function(option, checked, select) {
                if (checked) {
                    a_province.push($(option).val());
                } else {
                    a_province = removeItem(a_province, $(option).val());
                }
                a_province = a_province.filter(onlyUnique);
            },
            onDropdownHidden: function(option) {
                var a_tmp_province = $('#hdPrivince').val().split(",");
                if (JSON.stringify(a_province) != JSON.stringify(a_tmp_province)) {
                    $('#ok').click();
                }
            }
        });

        function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }

        function removeItem(arr, item) {
            return arr.filter(f => f !== item)
        }

        function getData(page, sortBy, search, category, minPrice, maxPrice, sub, transport, location, type, isPromo,
            rating) {
            var url = ('?page=' + page) + ((category == null) ? "" : '&category=' + category) +
                ((sub == null) ? "" : '&sub=' + sub) +
                ((search == null) ? "" : '&search=' + search) +
                ((sortBy == null) ? "" : '&sortBy=' + sortBy) +
                ((minPrice == null) ? "" : '&minPrice=' + minPrice) +
                ((maxPrice == null) ? "" : '&maxPrice=' + maxPrice) +
                ((transport == null) ? "" : '&transport=' + transport) +
                ((location == null) ? "" : '&location=' + location) +
                ((type == null) ? "" : '&type=' + type) +
                ((isPromo == null) ? "" : '&isPromo=' + isPromo) +
                ((rating == null) ? "" : '&rating=' + rating) +
                ((a_province == null) ? "" : '&province=' + a_province);
            window.location.href = url;
            // $.ajax(
            // {
            //     url: url,
            //     beforeSend: function() {
            //         $("#wait").show(100);
            //         $("#tag_container").empty();
            //     },
            //     complete: function() {
            //         $("#wait").hide(100);
            //     },
            //     type: "get",
            //     datatype: "html"

            // }).done(function(data){
            //     $("#tag_container").html(data);
            //     window.history.replaceState(null ,null , url)  ;
            // }).fail(function(jqXHR, ajaxOptions, thrownError){
            //       alert('No response from server');
            // });
        }
    </script>
@endsection
