@extends('layouts.default')
@section('style')
<link href="/plugins/lightbox2/css/lightbox.css" rel="stylesheet" />
<style>
    .nav_custom_cat{
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
    }

    @media (min-width: 768px) {
        .swiper-container {
            height: 180px;
        }

        .cuttom-img-big {
            width: 100%;
            height: 350px;
        }

        .gallery-top {
            height: 70%;
            width: 100%;
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
            height: 73%;
            width: 100%;
        }
    }

    /* .h-product-detail:hover {
        border: 3px #c75ba1 solid;
    } */

    /* .swiper-slide-thumb-active {
        border: 3px #c75ba1 solid;
    } */

</style>
<link rel="stylesheet" href="/new_ui/plugins/swiper/swiper.min.css?v=3">
<script src="/new_ui/plugins/swiper/swiper.min.js"></script>



@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-10 col-md-12 col-12 mx-auto">
            <div class="row">
                <div class="col-12 px-lg-4 px-md-0 px-sm-0 mb-4"
                    style="background-color: #fff; border-radius: 0 0 8px 8px;">
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
                    <div class="row p-lg-0 p-md-4 p-0">
                        <div class="col-lg-4 col-md-12 col-12 mb-lg-0 mb-md-4 mb-4 mt-4 mt-md-0 mt-lg-0">
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" style="cursor: pointer;">
                                        <div class="d-flex align-items-center justify-content-center cuttom-img-big position-relative">
                                            <a data-lightbox="picture" href="/img/product/16.jpg">
                                                <img src="/img/product/16.jpg" alt=""
                                                    style="max-width: 100%; max-height: 100%;">
                                                    <div class="position-absolute pl-2 pr-4 py-1" style="clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0 100%, 0% 50%, 0 0); top: 40px; left: 0; background-color: #23c197;">
                                                        <h6 class="mb-0" style="font-size: 14px;"><strong style="color: #fff;">Pre - Order</strong></h6>
                                                    </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="cursor: pointer;">
                                        <div class="d-flex align-items-center justify-content-center cuttom-img-big">
                                            <a data-lightbox="picture" href="/img/product/16.jpg">
                                                <img src="/img/product/16.jpg" alt=""
                                                    style="max-width: 100%; max-height: 100%;">
                                                    <div class="position-absolute pl-2 pr-4 py-1" style="clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0 100%, 0% 50%, 0 0); top: 40px; left: 0; background-color: #23c197;">
                                                        <h6 class="mb-0" style="font-size: 14px;"><strong style="color: #fff;">Pre - Order</strong></h6>
                                                    </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="cursor: pointer;">
                                        <div class="d-flex align-items-center justify-content-center cuttom-img-big">
                                            <a data-lightbox="picture" href="/img/product/16.jpg">
                                                <img src="/img/product/16.jpg" alt=""
                                                    style="max-width: 100%; max-height: 100%;">
                                                    <div class="position-absolute pl-2 pr-4 py-1" style="clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0 100%, 0% 50%, 0 0); top: 40px; left: 0; background-color: #23c197;">
                                                        <h6 class="mb-0" style="font-size: 14px;"><strong style="color: #fff;">Pre - Order</strong></h6>
                                                    </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="cursor: pointer;">
                                        <div class="d-flex align-items-center justify-content-center cuttom-img-big">
                                            <a data-lightbox="picture" href="/img/product/16.jpg">
                                                <img src="/img/product/16.jpg" alt=""
                                                    style="max-width: 100%; max-height: 100%;">
                                                    <div class="position-absolute pl-2 pr-4 py-1" style="clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0 100%, 0% 50%, 0 0); top: 40px; left: 0; background-color: #23c197;">
                                                        <h6 class="mb-0" style="font-size: 14px;"><strong style="color: #fff;">Pre - Order</strong></h6>
                                                    </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-container gallery-thumbs pt-3">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" style="cursor: pointer;">
                                        <div class="d-flex align-items-center justify-content-center h-product-detail"
                                            style=" width: 100%;">
                                            <img src="/img/product/16.jpg" alt=""
                                                style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="cursor: pointer;">
                                        <div class="d-flex align-items-center justify-content-center h-product-detail"
                                            style=" width: 100%;">
                                            <img src="/img/product/16.jpg" alt=""
                                                style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="cursor: pointer;">
                                        <div class="d-flex align-items-center justify-content-center h-product-detail"
                                            style=" width: 100%;">
                                            <img src="/img/product/16.jpg" alt=""
                                                style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="cursor: pointer;">
                                        <div class="d-flex align-items-center justify-content-center h-product-detail"
                                            style=" width: 100%;">
                                            <img src="/img/product/16.jpg" alt=""
                                                style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="cursor: pointer;">
                                        <div class="d-flex align-items-center justify-content-center h-product-detail"
                                            style=" width: 100%;">
                                            <img src="/img/product/16.jpg" alt=""
                                                style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12 ">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="font_head_item"><strong>ห้องน้ำแมวไฟฟ้าอัจฉริยะ Petree ทำความสะอาดอัตโนมัติ (แถมแผ่นรอง+ถุง)</strong></h5>
                                </div>
                                <div class="col-12 d-flex flex-row align-items-center mb-2">
                                    <div class="mr-4">
                                        <div class="d-flex align-items-end">
                                            <span>ราคา </span>
                                            <h4 id="price" class="mb-0 mx-2 font_price" style="color: #c45e9f;">
                                                <strong>17,500 บาท</strong></h4>
                                            <span> บาท</span>
                                        </div>
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
                                    <div class="row mx-0">
                                        {{-- <div class="col-12 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-lg-2 col-md-12 col-12 mb-2">
                                                    <h6 class="mb-0" id="dis1">
                                                        <strong>สี :</strong></h6>
                                                </div>
                                                <div data-toggle="buttons" class="col-lg-9 col-md-6 col-12 mb-2">
                                                    <label
                                                        class="btn-outline-422a4e btn form-control btn-outline-secondary " style="width: auto;">
                                                        <input required type="radio" data-key="1" id="option1"
                                                            name="dis1" value="ขาว" style="display: none">
                                                        <div class="mb-0">ขาว</div>
                                                    </label>

                                                    <h6 class="text-danger regular ml-2"
                                                        style="font-size:14px; display: none;" id="warning1">
                                                        เลือกตัวเลือกเพื่อซื้อสินค้า</h6>
                                                </div>
                                            </div>
                                        </div> --}}
                                    {{-- end option 1 --}}


                                    {{-- <div class="col-12 mb-2 ">
                                        <div class="row align-items-center">
                                            <div class="col-lg-2 col-md-12 col-12 mb-2">
                                                <h6 class="mb-0" id="dis2">
                                                    <strong>ขนาด :</strong></h6>
                                            </div>
                                            <div data-toggle="buttons" class="col-lg-9 col-md-12 col-12 mb-2">

                                                <label
                                                    class="btn-outline-422a4e btn form-control btn-outline-secondary " style="width: auto;">
                                                    <input required type="radio" data-key="2" id="option2"
                                                        name="dis2" value="เล็ก" style="display: none">
                                                    <h6 class="mb-0">เล็ก</h6>
                                                </label>
                                                <h6 class="text-danger regular ml-2"
                                                    style="font-size:14px; display: none;" id="warning2">
                                                    เลือกตัวเลือกเพื่อซื้อสินค้า</h6>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- end option 2 --}}

                                    <div class="col-12 mb-3 px-0">
                                        <div class="row align-items-center ">
                                            <div class="col-lg-2 col-md-12 col-7 mb-3">
                                                <h6 id="addnum" class="mb-0"><strong>จำนวน</strong></h6>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-5 d-flex flex-row">
                                                <input
                                                    style="text-align: center" value="1" min="1" name="amount"
                                                    type="number" class="form-control d-inline-block mr-4 py-0 px-2"
                                                    id="stock_input" placeholder="จำนวน">
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12 ml-auto">
                                                <strong>

                                                    <div class="black light  d-inline-block ">มีสินค้าทั้งหมด :
                                                    </div>

                                                    <div class="black light  d-inline-block " id="stock">15
                                                    </div>
                                                </strong>
                                            </div>

                                            {{-- <input type="hidden" name="shop_id" value="{{$product[0]->shops[0]->id}}">
                                            <input type="hidden" id="price_one" name="price"
                                                value="{{min($product[0]->product_option['price'])}}">
                                            @if (isset($product[0]->product_option['option1']))
                                            <input type="hidden" name="option1"
                                                value="{{$product[0]->product_option['option1']}}">
                                            @endif
                                            @if (isset($product[0]->product_option['option2']))
                                            <input type="hidden" name="option2"
                                                value="{{$product[0]->product_option['option2']}}">
                                            @endif
                                            <input type="hidden" name="product_id" value="{{$product[0]->id}}"> --}}
                                        </div>
                                    </div>
                                    {{-- count product --}}

                                    <div class="col-12 d-flex flex-row align-items-center px-0">
                                        <div class="row align-items-center w-100">
                                            <div class="col-lg-12 col-md-12 col-12 mb-3 d-flex flex-row align-items-center">
                                                <div><h6 class="mb-0"><strong>ช่วงเวลาที่ได้ของ : </strong></h6></div>
                                                <div class="form-group pl-3 mb-0" style="width: auto;">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                      <option>2 - 7 พฤศจิกายน 2020</option>
                                                      <option>2</option>
                                                      <option>3</option>
                                                      <option>4</option>
                                                      <option>5</option>
                                                    </select>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex flex-row align-items-center px-0">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-md-12 col-12 mb-3">
                                                <h6 class="mb-0"><strong class="pr-2">จำนวนที่สั่งได้ : </strong>
                                                  <strong>20 <span style="color: #c75ba1;">/ 100</span></strong></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 px-0">
                                        <div class="form-row">
                                            <div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
                                                <div class="btn-f8eaf3 btn form-control">
                                                    <a class="col p-1" data-toggle="modal"
                                                        data-target="#user-login-regis" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <img style="margin-top: -4px; width: 20px;"
                                                            src="/new_ui/img/menu/icon-sub-menu-user-1.svg" alt="">
                                                        ใส่ตะกร้า
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
                                                <div class="btn-f8eaf3 btn form-control">
                                                    <a class="col p-1" data-toggle="modal"
                                                        data-target="#user-login-regis" aria-haspopup="true"
                                                        aria-expanded="false">
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
                                    </div>
                                {{-- end btn group --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end product --}}
                {{-- <div class="row pl-lg-3 pl-sm-1" style="color: black">

                </div> --}}

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
                                    <h6 class="mb-0">
                                        8

                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-row align-items-center mb-2">
                            <div class="d-flex align-items-center flex-row">
                                <div style="width: 100px;">
                                    <h6 class="mb-0"><strong style="color: #b1b7bc;">จำนวนสินค้า</strong></h6>
                                </div>
                                <div>
                                    <h6 class="mb-0">35</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-row align-items-center mb-2">
                            <div class="d-flex align-items-center flex-row">
                                <div style="width: 100px; ">
                                    <h6 class="mb-0"><strong style="color: #b1b7bc;">ส่งจาก</strong></h6>
                                </div>
                                <div>
                                    <h6 class="mb-0">เขตลาดพร้าว จังหวัดกรุงเทพมหานคร , อำเภอบางพลี จังหวัดสมุทรปราการ</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-12" style="font-family: 'Kanit' !important;">
                            <h6 class="font_head_item"><strong>รายละเอียดสินค้า</strong></h6>
                            <p style="font-family: 'Kanit' !important;">
                                เตียงนอน 6 ฟุต เตียงคิงไซส์ King Size เตียงขนาดใหญ่ที่รองรับทุกการพักผ่อนในห้องนอนของคุณ ทางเรามีเตียงให้คุณเลือกหลากหลายสไตล์ ทั้งสไตล์วินเทจ สไตล์โมเดิร์น สไตล์สแกนดิเนเวียน สไตล์ลอฟท์ สไตล์คอนเทมโพรารี ฯลฯ และที่โดดเด่นไม้แพ้กันคือฟังก์ชั่นการใช้งานที่ครบครัน นอกจากนี้เรายังมีเฟอร์นิเจอร์อื่นๆที่เข้าชุด และที่นอนให้คุณเลือกสรร สามารถสวยจบทั้งห้องได้ในเว็ปเดียว
                            </p>
                        </div>
                    </div>
                </div>
                {{-- end detail product --}}

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
                                    <h5 class="mt-0"><strong>SAVEAGE</strong></h5>
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
                                    <a class="btn-outline-c45e9f btn form-control mb-2" style=" font-size: 14px;"
                                        href="#"><img
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
                </div>
                {{-- end tab shop --}}

            </div>


        </div>

    </div>
</div>
{{-- end row --}}
</div>
{{-- end container --}}




<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
      maxWidth : 300,
    })
</script>

<script>
    $("#addnum").click(function(){
      $("#input1").hide();
});

$("input[type=radio]").click(function(){
    if (($("#option2").length == 0)){
        op1 = parseInt($('input[id=option1]:checked').data('key'));
    }
    if (($("#option2").length == 1)){
        op1 = parseInt($('input[id=option1]:checked').data('key') * $('input[id=option2]').length) +parseInt( $('input[id=option2]:checked').data('key')) ;
    }
    // console.log($('input[id=option2]'))
    if(op1>=0){
        // alert($('#price'+op1).text());
         $("#price").html(commaSeparateNumber($('#price'+op1).text()));
         $("#stock").html($('#stock'+op1).text());
         $("#stock_input").attr('max',$('#stock'+op1).text());
         $("#price_one").val($('#price'+op1).text());
    }


});
function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }
$("#stock_input").keypress(function(){
      console.log(this.value);
      if (/^0/.test(this.value)) {
    this.value = this.value.replace(/^0/, "")
  }
});

$( "#stock_input" ).change(function() {
    var n = this.value.toString();
    n2 = n;
    var i;
    for(i = 0;i<this.value.length;i++){
        if(n[i] < 1 ){
            n2 = n.substring(i+1, n.length);
        }else{
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


$('#basket_add').add($('#buy_now')).click(function() {
    if (($("#option1").length > 0)){
        if($('input[id=option1]').is(':checked')) {
        }else{
            $('#warning1').show();
            $("#warning1").css("display", "inline-block");
        }
    }
    if (($('#option2').length > 0)){
        if($('input[id=option2]').is(':checked')) {
        }else{
            $('#warning2').show();
            $("#warning2").css("display", "inline-block");
        }
    }
});

    $('input[id=option1]').click(function() {
        $('#warning1').hide();
    });
    $('input[id=option2]').click(function() {
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





</script>


@stop
