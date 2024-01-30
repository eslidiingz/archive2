@extends('new_ui.layouts.front-end')
@section('style')
@php
// dd($product_all);
// dd($search_name);
@endphp
<style>
    .nav_custom_cat {
        display: none !important;
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
        background: #fff;

        /* Center slide text vertically */
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
        color: #f6c100;
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

</style>
@endsection



@section('content')
<div class="container">
    <div class="row d-lg-block d-md-none d-none">
        <div class="col-12 p-0 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: unset;">
                    <li class="breadcrumb-item"><a href="/" style="color: #1947e3;">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">หมวดหมู่ทั้งหมด</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row m-0 rounded8px pb-4 mt-lg-0 mt-md-4 mt-4" style="background-color: #fff;">
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
    </div>
    <div class="row my-4">
        <div class="col-2 d-lg-block d-md-none d-none">
            <div class="row">
                <div class="col-12 d-flex flex-row">
                    <h5 class="mb-0">
                        <img src="/new_ui/img/menu/icon-menu-categories.png" width="27px" class="mr-3"
                            alt="..."><strong>หมวดหมู่</strong>
                    </h5>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>
                <div class="col-12 d-flex flex-column" id="datalist">
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="54">
                            <h6 class="mb-3"><strong>กระเป๋า</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="56">
                            <h6 class="mb-3"><strong>กล้องและอุปกรณ์ถ่ายภาพ</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="51">
                            <h6 class="mb-3"><strong>การท่องเที่ยว</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="34">
                            <h6 class="mb-3"><strong>กีฬาและกิจกรรมกลางแจ้ง</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="57">
                            <h6 class="mb-3"><strong>ของเล่น สินค้าแม่และเด็ก</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="32">
                            <h6 class="mb-3"><strong>ความงามและของใช้ส่วนตัว</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="28">
                            <h6 class="mb-3"><strong>คอมพิวเตอร์และแล็ปท็อป</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="53">
                            <h6 class="mb-3"><strong>จัดทำกราฟฟิค</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="52">
                            <h6 class="mb-3"><strong>จัดทำวิดีโอ</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="43">
                            <h6 class="mb-3"><strong>ตั๋วและบัตรกำนัล</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none">
                        <a style="cursor:pointer;" id="category" data-key="38">
                            <h6 class="mb-3"><strong>นาฬิกาและแว่นตา</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="50">
                            <h6 class="mb-3"><strong>บริการ</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="42">
                            <h6 class="mb-3"><strong>มือถือและอุปกรณ์เสริม</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="37">
                            <h6 class="mb-3"><strong>ยานยนต์</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="40">
                            <h6 class="mb-3"><strong>รองเท้าผู้ชาย</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="39">
                            <h6 class="mb-3"><strong>รองเท้าผู้หญิง</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="58">
                            <h6 class="mb-3"><strong>วัตถุมงคล</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="48">
                            <h6 class="mb-3"><strong>วิดีโอ คอนเฟอเรนซ์</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="44">
                            <h6 class="mb-3"><strong>สัตว์เลี้ยง</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="41">
                            <h6 class="mb-3"><strong>สื่อบันเทิงภายในบ้าน</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="45">
                            <h6 class="mb-3"><strong>อาหารเสริมและผลิตภัณฑ์สุขภาพ</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="46">
                            <h6 class="mb-3"><strong>อาหารและเครื่องดื่ม</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="55">
                            <h6 class="mb-3"><strong>อื่นๆ</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="26">
                            <h6 class="mb-3"><strong>เกมส์และอุปกรณ์เสริม</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="33">
                            <h6 class="mb-3"><strong>เครื่องประดับ</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="29">
                            <h6 class="mb-3"><strong>เครื่องเขียน หนังสือ และดนตรี</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="30">
                            <h6 class="mb-3"><strong>เครื่องใช้ในบ้าน</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="31">
                            <h6 class="mb-3"><strong>เครื่องใช้ไฟฟ้าภายในบ้าน</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="35">
                            <h6 class="mb-3"><strong>เสื้อผ้าแฟชั่นผู้ชาย</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="36">
                            <h6 class="mb-3"><strong>เสื้อผ้าแฟชั่นผู้หญิง</strong></h6>
                        </a>
                    </li>
                    <li style="list-style: none; display: none;">
                        <a style="cursor:pointer;" id="category" data-key="49">
                            <h6 class="mb-3"><strong>แอปพลิเคชัน</strong></h6>
                        </a>
                    </li>
                    <a style="cursor:pointer;color: #c75ba1; text-decoration: underline;"
                        id="readmore"><strong>เพิ่มเติม <i class="fa fa-angle-down" aria-hidden="true"></i></strong></a>
                </div>
                <div class="col-12 mt-4">
                    <h5 class="mb-0">
                        <img src="/new_ui/img/menu/icon-menu-search-all.png" width="27px" class="mr-2"
                            alt="..."><strong>ค้นหาแบบละเอียด</strong>
                    </h5>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>
                <div class="col-12">
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
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>

                <div class="col-12">
                    <h5 class="my-3"><strong>ส่งจาก</strong></h5>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>


                <div class="col-12">
                    <button class="btn btn-danger form-control" id="clear_checkbox">ลบทั้งหมด</button>
                </div>
            </div>
        </div>

        <div class="col-lg-10 col-md-12 col-12">
            <div class="row rounded8px py-4 mx-0 align-items-center" style="background-color: #fff;">
                <div class="col-12 mb-lg-2 mb-md-3 mb-3">
                    <div class="form-row align-items-center">
                        <div class="col-lg-2 col-md-12 col-12 mb-lg-0 mb-md-2 mb-2">
                            <h5 class="mb-0 pl-lg-4 pl-md-0 pl-0 font_head_item"><strong>เรียงโดย</strong></h5>
                        </div>
                        <div class="col-lg-2 col-md-3 col-6">

                            <label class="btn-ededed btn w-100 font-btn-custom px-0 radio">
                                <input disabled="" type="radio" data-key="" id="order1" name="order" value=""
                                    style="display: none">
                                ยอดนิยม
                            </label>
                        </div>
                        <div class="col-lg-2 col-md-3 col-6">

                            <label class="btn-ededed btn w-100 font-btn-custom px-0 radio">
                                <input type="radio" data-key="" id="order2" name="order" value="" style="display: none"
                                    checked="checked">
                                ล่าสุด
                            </label>
                        </div>
                        <div class="col-lg-2 col-md-3 col-6">

                            <label class="btn-ededed btn w-100 font-btn-custom px-0 radio">
                                <input disabled="" type="radio" data-key="" id="order3" name="order" value=""
                                    style="display: none;">
                                สินค้าขายดี
                            </label>
                        </div>
                        <div class="col-lg-2 col-md-3 col-6">

                            <label class="btn-ededed btn w-100 font-btn-custom px-0 dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="radio" class="active" id="order45" data-key="" name="order" value=""
                                    style="display: none">ราคา
                            </label>
                            <ul class="dropdown-menu">
                                <li><a href="#" name="order" value="" id="order4" class="regular p-2">จากมากไปน้อย</a>
                                </li>
                                <li><a href="#" name="order" value="" id="order5" class="regular  p-2">จากน้อยไปมาก</a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-12 mb-lg-4 mb-md-3 mb-3">
                    <div class="form-row align-items-center">
                        <div class="col-lg-2 col-md-12 col-12 mb-lg-0 mb-md-2 mb-2">
                            <h5 class="mb-0 pl-lg-4 pl-md-0 pl-0 font_head_item"><strong>ราคา</strong></h5>
                        </div>
                        <div class="col-lg-2 col-md-4 col-4">
                            <input type="text" class="form-control" id="minPrice" name="minPrice" value=""
                                placeholder="min">
                        </div>

                        <div class="col-lg-2 col-md-4 col-4">
                            <input type="text" class="form-control" id="maxPrice" name="maxPrice" value=""
                                placeholder="max">
                        </div>
                        <div class="col-lg-2 col-md-4 col-4 ">
                            <div class="btn btn-c75ba1 form-control font-btn-custom px-0" id="ok" name="dis1">ตกลง</div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-12 col-12">
                            <div class="form-check ml-lg-4 ml-md-0 md-0">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="option1">
                                <label class="form-check-label" for="exampleRadios1">
                                    <span class="font-btn-custom">จัดส่งฟรี</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                    value="option1">
                                <label class="form-check-label" for="exampleRadios2">
                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                    <strong class="ml-2 font-btn-custom">หรือมากกว่า</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            
            <div class="row mt-3 mx-0">
                <div id="tag_container" class="col-12 p-0 m-1">


                    @if(@$product || isset($product) || @$near_name_pro || isset($near_name_pro))
                    <div class="form-row mt-5">
                        <h3>สินค้าทั่วไป</h3>
                    </div>
                    <div class="form-row">

                        <div class="col-lg-3 col-md-4 col-6 ">
                            <a href="/product/{{ $product->id }}">
                                <div class="rounded8px px-2 "
                                    style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                                    <div class="d-flex align-items-center justify-content-center h-200px-all pt-2"
                                        style="overflow:hidden;">
                                        <img src="/img/product/{{ $product->product_img[0] }}"
                                            style="max-height: 100%;max-width: 100%;" class="rounded8px"
                                            onerror="this.onerror=null;this.src='/img/no_image.png'">
                                    </div>
                                    <div class="px-2">
                                        <h6 class="card-title mb-0 text-left text-dots pt-2" data-toggle="tooltip"
                                            data-placement="top" style="font-size: 14px !important;">
                                            <strong>{{ $product->name }}</strong></h6>
                                        <h2 class="card-text mb-0 text-left"
                                            style="color: #c75ba1; font-size: 18px !important;"><strong>฿
                                                {{ number_format(min($product->product_option['price'])) }}</strong>
                                        </h2>
                                        <!-- <h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6> -->
                                        <h6 class="text-left mb-3 pb-3" style="height:35px !important;">

                                            <?php
                                                $allpaying = 0;
                                                $rating_person = 0;
                                            ?>

                                            @foreach ($rating_group as $rating)
                                            <?php
                                                if($rating['product_id'] == $product->id){
                                                    $allpaying += $rating['rating'];
                                                    $rating_person++;
                                                }
                                            ?>
                                            @endforeach


                                            @if($allpaying > 0)
                                            <?php $starpercen = ($allpaying/($rating_person*5))*100; ?>

                                            <div class="rating">
                                                <div class="rating-upper" style="width: {{ $starpercen }}%">
                                                    <span style="font-size: 14px;">★★★★★</span>
                                                </div>
                                                <div class="rating-lower">
                                                    <span style="font-size: 14px;">★★★★★</span>
                                                </div>
                                            </div>
                                            <span class="mb-3" style="color: #b2b2b2;">
                                                ({{ $rating_person }})</span>

                                            @else
                                            <?php $starpercen = 0; ?>
                                            <span class="mb-3" style="color: #b2b2b2;">
                                                ไม่มีคะแนน</span>

                                            @endif
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>





                        @foreach (@$near_name_pro as $near_pro)
                        <div class="col-lg-3 col-md-4 col-6 ">
                            <a href="/product/{{ @$near_pro->id }}">
                                <div class="rounded8px px-2 "
                                    style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                                    <div class="d-flex align-items-center justify-content-center h-200px-all pt-2"
                                        style="overflow:hidden;">
                                        <img src="/img/product/{{ @$near_pro->product_img[0] }}"
                                            style="max-height: 100%;max-width: 100%;" class="rounded8px"
                                            onerror="this.onerror=null;this.src='/img/no_image.png'">
                                    </div>
                                    <div class="px-2">
                                        <h6 class="card-title mb-0 text-left text-dots pt-2" data-toggle="tooltip"
                                            data-placement="top" style="font-size: 14px !important;">
                                            <strong>{{ @$near_pro->name }}</strong></h6>
                                        <h2 class="card-text mb-0 text-left"
                                            style="color: #c75ba1; font-size: 18px !important;"><strong>฿
                                                {{ number_format(min(@$near_pro->product_option['price'])) }}</strong>
                                        </h2>
                                        <!-- <h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6> -->
                                        <h6 class="text-left mb-3 pb-3" style="height:35px !important;">

                                            <?php
                                                                        $allpaying = 0;
                                                                        $rating_person = 0;
                                                                    ?>

                                            @foreach ($rating_group as $rating)
                                            <?php
                                                                        if($rating['product_id'] == @$near_pro->id){
                                                                            $allpaying += $rating['rating'];
                                                                            $rating_person++;
                                                                        }
                                                                    ?>
                                            @endforeach


                                            @if($allpaying > 0)
                                            <?php $starpercen = ($allpaying/($rating_person*5))*100; ?>

                                            <div class="rating">
                                                <div class="rating-upper" style="width: {{ $starpercen }}%">
                                                    <span style="font-size: 14px;">★★★★★</span>
                                                </div>
                                                <div class="rating-lower">
                                                    <span style="font-size: 14px;">★★★★★</span>
                                                </div>
                                            </div>
                                            <span class="mb-3" style="color: #b2b2b2;">
                                                ({{ $rating_person }})</span>

                                            @else
                                            <?php $starpercen = 0; ?>
                                            <span class="mb-3" style="color: #b2b2b2;">
                                                ไม่มีคะแนน</span>

                                            @endif
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach (@$near_sub_category_pro as $near_sub_pro)
                        <div class="col-lg-3 col-md-4 col-6 ">
                            <a href="/product/{{ @$near_sub_pro->id }}">
                                <div class="rounded8px px-2 "
                                    style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                                    <div class="d-flex align-items-center justify-content-center h-200px-all pt-2"
                                        style="overflow:hidden;">
                                        <img src="/img/product/{{ @$near_sub_pro->product_img[0] }}"
                                            style="max-height: 100%;max-width: 100%;" class="rounded8px"
                                            onerror="this.onerror=null;this.src='/img/no_image.png'">
                                    </div>
                                    <div class="px-2">
                                        <h6 class="card-title mb-0 text-left text-dots pt-2" data-toggle="tooltip"
                                            data-placement="top" style="font-size: 14px !important;">
                                            <strong>{{ @$near_sub_pro->name }}</strong></h6>
                                        <h2 class="card-text mb-0 text-left"
                                            style="color: #c75ba1; font-size: 18px !important;"><strong>฿
                                                {{ number_format(min(@$near_sub_pro->product_option['price'])) }}</strong>
                                        </h2>
                                        <!-- <h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6> -->
                                        <h6 class="text-left mb-3 pb-3" style="height:35px !important;">

                                            <?php
                                                                        $allpaying = 0;
                                                                        $rating_person = 0;
                                                                    ?>

                                            @foreach ($rating_group as $rating)
                                            <?php
                                                                        if($rating['product_id'] == @$near_sub_pro->id){
                                                                            $allpaying += $rating['rating'];
                                                                            $rating_person++;
                                                                        }
                                                                    ?>
                                            @endforeach


                                            @if($allpaying > 0)
                                            <?php $starpercen = ($allpaying/($rating_person*5))*100; ?>

                                            <div class="rating">
                                                <div class="rating-upper" style="width: {{ $starpercen }}%">
                                                    <span style="font-size: 14px;">★★★★★</span>
                                                </div>
                                                <div class="rating-lower">
                                                    <span style="font-size: 14px;">★★★★★</span>
                                                </div>
                                            </div>
                                            <span class="mb-3" style="color: #b2b2b2;">
                                                ({{ $rating_person }})</span>

                                            @else
                                            <?php $starpercen = 0; ?>
                                            <span class="mb-3" style="color: #b2b2b2;">
                                                ไม่มีคะแนน</span>

                                            @endif
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                    @endif
                </div>




                {{-- -------------------------------------------------------------------Pre Order--------------------------------------------------------------------- --}}

                {{-- @php
                    // dd($pre_order->preOrder_option[0]['datetime_range'][0]);
                    $month = ['01'=>'ม.ค.', '02'=>'ก.พ.', '03'=>'มี.ค.', '04'=>'เม.ย.', '05'=>'พ.ค.',
                    '06'=>'มิ.ย.', '07'=>'ก.ค.', '08'=>'ส.ค.', '09'=>'ก.ย.', '10'=>'ต.ค.',
                    '11'=>'พ.ย.', '12'=>'ธ.ค.'];

                    $day_start = explode("-",$pre_order->preOrder_option[0]['datetime_range'][0]['start_date']);
                    $start = explode(" ",$day_start[2]);

                    $day_end = explode("-",$pre_order->preOrder_option[0]['datetime_range'][0]['end_date']);
                    $end = explode(" ",$day_end[2]);


                    $month_start = $month[$day_start[1]];
                    $month_end = $month[$day_end[1]];

                    $formal_date_preOrder = $start[0]." ".$month_start." - ".$end[0]." ".$month_end;
                    // dd($formal_date_preOrder);
                    @endphp --}}



                <div id="tag_container" class="col-12 p-0 m-1">


                    @if(@$pre_order || isset($pre_order) || @$near_name_pre || isset($near_name_pre))
                    <div class="form-row mt-5">
                        <h3>สินค้า Pre Order</h3>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-3 col-md-4 col-6 ">
                            <a href="/product-detail-preorder/{{$pre_order->id}}" class="w-100">
                                <div class="rounded8px px-2 "
                                    style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                                    <div class="d-flex align-items-center justify-content-center h-200px-all pt-2"
                                        style="overflow:hidden;">
                                        <img src="/img/product/{{ $pre_order->product_img[0] }}"
                                            style="max-height: 100%;max-width: 100%;" class="rounded8px"
                                            onerror="this.onerror=null;this.src='/img/no_image.png'">
                                    </div>
                                    <div class="px-2">
                                        {{-- <div class="col-12 px-0 d-flex justify-content-start py-1">
                                            <button class="btn py-0 px-1" style="border: 1px solid #23c197; font-size: 10px; color: #23c197;"><strong>รอบวันที่
                                                    :
                                                    @if ($pre_order->preOrder_option[0]['datetime_range'][0])
                                                    {{$formal_date_preOrder}}

                                        @endif


                                        </strong></button>
                                    </div> --}}
                                    <h6 class="card-title mb-0 text-left text-dots pt-2" data-toggle="tooltip"
                                        data-placement="top" style="font-size: 14px !important;">
                                        <strong>{{ $pre_order->name }}</strong></h6>
                                    <h2 class="card-text mb-0 text-left"
                                        style="color: #c75ba1; font-size: 18px !important;"><strong>฿
                                            {{ number_format(min($pre_order->preOrder_option[0]['datetime_range'][0]['price'])) }}</strong>
                                    </h2>
                                    <!-- <h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6> -->
                                    <h6 class="text-left mb-3 pb-3" style="height:35px !important;">

                                        <?php
                                                                        $allpaying = 0;
                                                                        $rating_person = 0;
                                                                    ?>

                                        @foreach ($rating_group as $rating)
                                        <?php
                                                                        if($rating['product_id'] == $pre_order->id){
                                                                            $allpaying += $rating['rating'];
                                                                            $rating_person++;
                                                                        }
                                                                    ?>
                                        @endforeach


                                        @if($allpaying > 0)
                                        <?php $starpercen = ($allpaying/($rating_person*5))*100; ?>

                                        <div class="rating">
                                            <div class="rating-upper" style="width: {{ $starpercen }}%">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                            <div class="rating-lower">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                        </div>
                                        <span class="mb-3" style="color: #b2b2b2;">
                                            ({{ $rating_person }})</span>

                                        @else
                                        <?php $starpercen = 0; ?>
                                        <span class="mb-3" style="color: #b2b2b2;">
                                            ไม่มีคะแนน</span>

                                        @endif
                                    </h6>
                                </div>
                        </div>
                        </a>
                    </div>



                    @foreach ($near_name_pre as $near_pre)
                    <div class="col-lg-3 col-md-4 col-6 ">
                        <a href="/product-detail-preorder{{ $near_pre->id }}">
                            <div class="rounded8px px-2 "
                                style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                                <div class="d-flex align-items-center justify-content-center h-200px-all pt-2"
                                    style="overflow:hidden;">
                                    <img src="/img/product/{{ $near_pre->product_img[0] }}"
                                        style="max-height: 100%;max-width: 100%;" class="rounded8px"
                                        onerror="this.onerror=null;this.src='/img/no_image.png'">
                                </div>
                                <div class="px-2">
                                    <h6 class="card-title mb-0 text-left text-dots pt-2" data-toggle="tooltip"
                                        data-placement="top" style="font-size: 14px !important;">
                                        <strong>{{ $near_pre->name }}</strong></h6>
                                    <h2 class="card-text mb-0 text-left"
                                        style="color: #c75ba1; font-size: 18px !important;"><strong>฿
                                            {{ number_format(min($near_pre->preOrder_option[0]['datetime_range'][0]['price'])) }}</strong>
                                    </h2>
                                    <!-- <h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6> -->
                                    <h6 class="text-left mb-3 pb-3" style="height:35px !important;">

                                        <?php
                                                                                                    $allpaying = 0;
                                                                                                    $rating_person = 0;
                                                                                                ?>

                                        @foreach ($rating_group as $rating)
                                        <?php
                                                                                                    if($rating['product_id'] == $near_pre->id){
                                                                                                        $allpaying += $rating['rating'];
                                                                                                        $rating_person++;
                                                                                                    }
                                                                                                ?>
                                        @endforeach


                                        @if($allpaying > 0)
                                        <?php $starpercen = ($allpaying/($rating_person*5))*100; ?>

                                        <div class="rating">
                                            <div class="rating-upper" style="width: {{ $starpercen }}%">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                            <div class="rating-lower">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                        </div>
                                        <span class="mb-3" style="color: #b2b2b2;">
                                            ({{ $rating_person }})</span>

                                        @else
                                        <?php $starpercen = 0; ?>
                                        <span class="mb-3" style="color: #b2b2b2;">
                                            ไม่มีคะแนน</span>

                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach


                    @foreach (@$near_sub_category_pre as $near_sub_pre)
                    <div class="col-lg-3 col-md-4 col-6 ">
                        <a href="product-detail-preorder/{{ @$near_sub_pre->id }}" class="w-100">
                            <div class="rounded8px px-2 "
                                style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                                <div class="d-flex align-items-center justify-content-center h-200px-all pt-2"
                                    style="overflow:hidden;">
                                    <img src="/img/product/{{ @$near_sub_pre->product_img[0] }}"
                                        style="max-height: 100%;max-width: 100%;" class="rounded8px"
                                        onerror="this.onerror=null;this.src='/img/no_image.png'">
                                </div>
                                <div class="px-2">
                                    <h6 class="card-title mb-0 text-left text-dots pt-2" data-toggle="tooltip"
                                        data-placement="top" style="font-size: 14px !important;">
                                        <strong>{{ @$near_sub_pre->name }}</strong></h6>
                                    <h2 class="card-text mb-0 text-left"
                                        style="color: #c75ba1; font-size: 18px !important;">
                                        <strong>฿
                                            {{ number_format(min(@$near_sub_pre->preOrder_option[0]['datetime_range'][0]['price'])) }}</strong>
                                    </h2>
                                    <!-- <h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6> -->
                                    <h6 class="text-left mb-3 pb-3" style="height:35px !important;">

                                        <?php
                                                                                                        $allpaying = 0;
                                                                                                        $rating_person = 0;
                                                                                                    ?>

                                        @foreach ($rating_group as $rating)
                                        <?php
                                                                                                        if($rating['product_id'] == @$near_sub_pre->id){
                                                                                                            $allpaying += $rating['rating'];
                                                                                                            $rating_person++;
                                                                                                        }
                                                                                                    ?>
                                        @endforeach


                                        @if($allpaying > 0)
                                        <?php $starpercen = ($allpaying/($rating_person*5))*100; ?>

                                        <div class="rating">
                                            <div class="rating-upper" style="width: {{ $starpercen }}%">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                            <div class="rating-lower">
                                                <span style="font-size: 14px;">★★★★★</span>
                                            </div>
                                        </div>
                                        <span class="mb-3" style="color: #b2b2b2;">
                                            ({{ $rating_person }})</span>

                                        @else
                                        <?php $starpercen = 0; ?>
                                        <span class="mb-3" style="color: #b2b2b2;">
                                            ไม่มีคะแนน</span>

                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
                @endif
                {{-- @if(count(@$near_name_pro) < 16)
                            <div class="form-row mt-5">
                                @if(count(@$near_category_pro) < 8)
                                    <h3>สินค้าใกล้เคียง</h3>
                                @endif
                            </div>
                        @endif --}}

                {{-- -------------------------------------------------------------------Pre Order--------------------------------------------------------------------- --}}





                @if(!isset($product)  && !isset($near_name_pro) && !isset($near_category_pro) && !isset($near_sub_category_pro) &&
                !isset($pre_order) && !isset($near_name_pre) && !isset($near_category_pre) && !isset($near_sub_category_pre)
                )
                <div class="form-row">
                    @include('component.no-data')
                </div>
                @endif


            </div>
        </div>
    </div>
</div>





<table class="table table-bordered"></table>

<div class="d-flex justify-content-end col-12"></div>
@endsection


@section('script')
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
    $(".dropdown-menu li a ").click(function(){
            $(this).closest('.btn-group').find('.btn').text($(this).text());
            $(".btn:first-child").val($(this).text());
            $(".dropdown-toggle").addClass("active");
            $('.radio').removeClass('active');
        });

        $("ul li #category").add("ul li #sub_category").click(function(){
            $("ul li #category ").add("ul li #sub_category").css('color','black');
            $('i').removeClass('fa-circle')
            $(this).css('color','#c75ba1');
            $(this).find('i').toggleClass('fa-circle')
        });

        $("input[name='geography']").click(function(){
            if ($(this).is(":checked")) {
                $('#province'+ $(this).val()).show();
            } else {
                $('#province'+ $(this).val()).hide();
                $('#province'+ $(this).val()+ " input[name='location']").prop("checked", false);

                var location = new Array();
                $("input[name='location']:checked").each(function() {
                    location.push($(this).val());
                });

                var transport ='';
                urlParams.set('transport',transport);
                urlParams.set('location',location);
                var category =  urlParams.get('category');
                var page = 1;
                var search = urlParams.get('search');
                var sub =  urlParams.get('sub');
                var sortBy =  urlParams.get('sortBy');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);

            }
        });





            $("#clear_checkbox").click(function(){
                $("input[name='location'] , input[name='geography'] , input[name='transport']").prop("checked", false);
                $('.province').hide();
                event.preventDefault();
                var transport = '';
                var location = '';
                urlParams.set('transport',transport);
                urlParams.set('location',location);
                var page = 1;
                var search = urlParams.get('search');
                var category = urlParams.get('category');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                var sub = urlParams.get('sub');
                var sortBy = urlParams.get('sortBy');
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
            });


            var urlParams = new URLSearchParams(window.location.search);

            $('#datalist li:gt(10)').hide();
            var l = $('#datalist li').length;
            if (l > 11) {
                $('#readmore').show();
            } else {
                $('#readmore').hide();
            }
            $('#readmore').click(function () {
                $('#datalist li:gt(10)').toggle('slide');
            });


            $(document).on('click',"input[name='location']",function(){
                var location = new Array();
                $("input[name='location']:checked").each(function() {
                    location.push($(this).val());
                });
                if ($("input[name='transport']").is(":checked")) {
                    var transport =  urlParams.get('transport');
                } else {
                    var transport ='';
                    urlParams.set('transport',transport);
                }

                urlParams.set('location',location);
                var category =  urlParams.get('category');
                var page = 1;
                var search = urlParams.get('search');
                var sub =  urlParams.get('sub');
                var sortBy =  urlParams.get('sortBy');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);

            });

            $(document).on('click',"input[name='transport']",function(){
                var transport = new Array();
                $("input[name='transport']:checked").each(function() {
                    transport.push($(this).val());
                });

                if ($("input[name='location']").is(":checked")) {
                    var location =  urlParams.get('location');
                } else {
                    var location ='';
                    urlParams.set('location',location);
                }

                urlParams.set('transport',transport);
                var category =  urlParams.get('category');
                var page = 1;
                var search = urlParams.get('search');
                var sub =  urlParams.get('sub');
                var sortBy =  urlParams.get('sortBy');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);

            });


            $(document).on('click', '#category',function()
            {
                event.preventDefault();
                var location = urlParams.get('transport');
                var location = urlParams.get('location');
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var category = $(this).data('key');
                urlParams.set('category',category);
                var page = 1;
                var search = urlParams.get('search');
                var sub =  urlParams.get('sub');
                var sortBy =  urlParams.get('sortBy');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');

                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
            });


            $(document).on('click', '#sub_category',function()
            {
                event.preventDefault();
                var location = urlParams.get('transport');
                var location = urlParams.get('location');
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var sub = $(this).data('key');
                urlParams.set('sub',sub);
                var page = 1;
                var search = urlParams.get('search');
                var category =  urlParams.get('category');
                var sortBy =  urlParams.get('sortBy');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');

                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
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

            $(document).on('click', '#order1',function(event)
            {
                event.preventDefault();
                var location = urlParams.get('transport');
                var location = urlParams.get('location');
                var page = 1;
                var search = urlParams.get('search');
                var category = urlParams.get('category');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                var sub = urlParams.get('sub');
                var sortBy = 'pop';
                urlParams.set('sortBy','pop');
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
            });

            $(document).on('click', '#order2, #new-product',function(event)
            {
                event.preventDefault();
                var location = urlParams.get('transport');
                var location = urlParams.get('location');
                var page = 1;
                var search = urlParams.get('search');
                var category = urlParams.get('category');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                var sub = urlParams.get('sub');
                var sortBy = 'ctime';
                urlParams.set('sortBy','ctime');
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
            });

            $(document).on('click', '#order3',function(event)
            {
                event.preventDefault();
                var location = urlParams.get('transport');
                var location = urlParams.get('location');
                var page = 1;
                var search = urlParams.get('search');
                var category = urlParams.get('category');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                var sub = urlParams.get('sub');
                var sortBy = 'sales';
                urlParams.set('sortBy','sales');
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
            });

            $(document).on('click', '#order4',function(event)
            {
                event.preventDefault();
                var location = urlParams.get('transport');
                var location = urlParams.get('location');
                var page = 1;
                var search = urlParams.get('search');
                var category = urlParams.get('category');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                var sub = urlParams.get('sub');
                var sortBy = 'priceMore';
                urlParams.set('sortBy','priceMore');
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
            });

            $(document).on('click', '#order5',function(event)
            {
                event.preventDefault();
                var location = urlParams.get('transport');
                var location = urlParams.get('location');
                var page = 1;
                var search = urlParams.get('search');
                var category = urlParams.get('category');
                var minPrice = urlParams.get('minPrice');
                var maxPrice = urlParams.get('maxPrice');
                var sub = urlParams.get('sub');
                var sortBy = 'priceLess';
                urlParams.set('sortBy','priceLess');
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
            });

            $(document).on('click', '#ok',function(event)
            {
                event.preventDefault();
                var location = urlParams.get('transport');
                var location = urlParams.get('location');
                var page = 1;
                var search = urlParams.get('search');
                var category = urlParams.get('category');
                var sortBy = 'priceLess';
                var minPrice = $('#minPrice').val()
                var maxPrice = $('#maxPrice').val()
                var sub = urlParams.get('sub');
                urlParams.set('sortBy','priceLess');
                urlParams.set('minPrice',minPrice);
                urlParams.set('maxPrice',maxPrice);
                getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location);
            });


        function getData(page,sortBy,search,category,minPrice,maxPrice,sub,transport,location){
            var url =  ('?page=' + page) + ((category == null) ? "" : '&category=' + category) +
                                                            ((sub == null) ? "" : '&sub=' + sub) +
                                                            ((search == null) ? "" : '&search=' + search) +
                                                            ((sortBy == null) ? "" : '&sortBy=' + sortBy) +
                                                            ((minPrice == null) ? "" : '&minPrice=' + minPrice) +
                                                            ((maxPrice == null) ? "" : '&maxPrice=' + maxPrice) +
                                                            ((transport == null) ? "" : '&transport=' + transport) +
                                                            ((location == null) ? "" : '&location=' + location) ;

            $.ajax(
            {
                url: url,
                beforeSend: function() {
                    $("#wait").show(100);
                    $("#tag_container").empty();
                },
                complete: function() {
                    $("#wait").hide(100);
                },
                type: "get",
                datatype: "html"

            }).done(function(data){
                $("#tag_container").html(data);
                window.history.replaceState(null ,null , url)  ;
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                  alert('No response from server');
            });
        }





</script>

@endsection
