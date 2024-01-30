@extends('layouts.default')
@section('style')
    <style>
       /*  .swiper-container {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-container-1 {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-container-11 {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-container-2 {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-container-3 {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-container-4 {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }*/

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            width: 100% !important;
            /* Center slide text vertically
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
            align-items: center;*/
        }


        .dropdownTitle {
            cursor: pointer;
            position: unset;
            height: 40px;
        }

        .dropdown-content {
            z-index: 100;
        }

        .dropdownBoxScroll {
            background-color: #fff;
            border-radius: 0 0 8px 8px;
            display: block;
            overflow-y: auto;
            max-height: 595px;
            scrollbar-color: #346751 #ddd;
            scrollbar-width: thin;
        }

        .dropdownBoxScroll::-webkit-scrollbar {
            width: 2px;
        }

        .dropdownBoxScroll::-webkit-scrollbar-thumb {
            background: #346751;
        }

        .dropdownBoxScroll::-o-scrollbar {
            width: 2px;
        }

        .dropdownBoxScroll::-o-scrollbar-thumb {
            background: #346751;
        }

        .dropdownBoxScroll::-moz-scrollbar {
            width: 2px;
        }

        .dropdownBoxScroll::-moz-scrollbar-thumb {
            background: #346751;
        }

        .dropdownBoxScroll::-ms-scrollbar {
            width: 2px;
        }

        .dropdownBoxScroll::-ms-scrollbar-thumb {
            background: #346751;
        }


        .rating {
            display: inline-block;
            unicode-bidi: bidi-override;
            color: #888888;
            font-size: 25px;
            height: 15px;
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

        .owl-dots {
            display: none;
        }

        .owl-carousel .owl-item img {
            width: unset;
        }

        @media (min-width: 320px) {
            .ft-14px-custom {
                font-size: 10px;
            }

            .swiper-pagination-bullet {
                opacity: 1;
                background: #CED4DA;
                margin-right: 5px;
                width: 40px;
                height: 5px;
                border-radius: 3px;
            }

            .swiper-pagination-bullet-active {
                opacity: 1;
                background: #346751;
                margin-right: 5px;
                width: 5px;
                height: 5px;
                border-radius: 5px;
            }

            .w-loader-custom {
                width: 75%;
            }

            .dots .dot {
                width: 15px;
                height: 15px;
            }
        }

        @media (min-width: 350px) {
            .ft-14px-custom {
                font-size: 14px;
            }
        }

        @media (min-width: 768px) {
            .swiper-pagination-bullet {
                margin-right: 5px;
                width: 60px;
                height: 8px;
                border-radius: 3px;
            }

            .swiper-pagination-bullet-active {
                margin-right: 5px;
                width: 8px;
                height: 8px;
                border-radius: 8px;
            }

            .w-loader-custom {
                width: 25%;
            }

            .dots .dot {
                width: 30px;
                height: 30px;
            }

            .custom-img-cate {
                width: 70px;
            }
        }

        .swiper-button-next.custom-reborn-next-prev,
        .swiper-button-prev.custom-reborn-next-prev {
            width: 44px !important;
        }

        .swiper-button-next.custom-reborn-next-prev:after,
        .swiper-button-prev.custom-reborn-next-prev:after {
            font-size: 44px;
        }

        @media (max-width: 992px) {
            .itemHiddenBanner {
                display: none !important;
            }
        }
        .row .scrollBar {
                        align-items: stretch;
                        display: flex;
                        flex-direction: row;
                        flex-wrap: nowrap;
                        /* overflow-x: auto;
                                overflow-y: hidden; */
                        overflow: auto;
                    }

                    @media screen and (max-width: 600px) {

                        .itemHidden {
                            display: none;
                        }

                        .viewmore {
                            display: none;
                        }
                    }

                    @media screen and (min-width: 600px) {
                        .itemHiddenDesktop {
                            display: none;
                        }
                    }

                    .cardCategory>img {
                        margin-bottom: .75rem;
                        width: 100%;
                    }

                    .card-text {
                        font-size: 85%;
                    }

                    .scroll-custom::-webkit-scrollbar {
                        display: none;
                    }

    </style>
@endsection
{{-- @section('loader')
    <div class="preloader js-preloader flex-center"
        style="height: 101vh; z-index: 9999; background-color: #fff; text-align: center;">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="/new_ui/img/logo/logo.svg" class="w-loader-custom">
                </div>
                <div class="col-12 mb-4 mt-4">
                    <div class="dots">
                        <div class="dot" style="background-color:#346751"></div>
                        <div class="dot" style="background-color:#346751"></div>
                        <div class="dot" style="background-color:#346751"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.js-preloader').preloadinator({
            minTime: 50
        });
    </script>
@endsection --}}
@section('content')

    @if ($message = Session::get('error'))
        <script>
            Swal.fire(
                'เกิดข้อผิดพลาด !',
                '{{$message}}',
                'warning'
            )
        </script>
    @endif
    @if (isset($banner))
        <div class="container pb-3 px-0 w-100 ">
            <div class="d-flex flex-row">
                <div class="col-12 col-lg-12" id="bannerMain">
                    {{-- <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($banner as $itemBanner)
                                {{$itemBanner->id}} / {{$itemBanner->status}} / {{$itemBanner->updated_at}}
                                <div class="swiper-slide" style=" object-fit: cover;">
                                    <a target="_blank" href="{{ $itemBanner->url ? $itemBanner->url : '#' }}" @if (isset($itemBanner->url)) @endif>
                                    <img data-src="{{ asset($itemBanner->images) }}" onerror="this.onerror=null;this.src='/img/no_banner_medix.png'" class="w-100 lazy" style="object-fit: cover;" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next d-lg-block d-md-none d-none custom-reborn-next-prev" style="color: #333!important; "></div>
                        <div class="swiper-button-prev d-lg-block d-md-none d-none custom-reborn-next-prev" style="color: #333!important; "></div>
                        <div class="swiper-pagination"></div>
                    </div> --}}
                </div>
                @foreach ($banner as $itemBanner)
                    @if ($itemBanner->status == 2)
                    {{-- {{$itemBanner->id}} / {{$itemBanner->status}} / {{$itemBanner->updated_at}} --}}
                    <a href="{{ $itemBanner->url ? $itemBanner->url : '#' }}" @if (isset($itemBanner->url))
                        target="_blank" @endif>
                        <div class="swiper-slide" style="width: 100%; object-fit: cover;">
                            <img src="{{ asset($itemBanner->images) }}" onerror="this.onerror=null;this.src='/img/no_banner_medix.png'" class="w-100 lazy w-100" style="" alt="">
                        </div>
                    </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif


    <nav class="nav_custom_cat">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center nav_menu_custom w-100">
                    <img src="/new_ui/img/banner-register.png" alt="" data-toggle="modal" data-target="#user-login-regis" style="cursor: pointer;" class="w-100">
                </div>
            </div>
        </div>
    </nav>

    <div class="container" >
        <div class="row">
            <div class="col-12 layout-tab_home">
                <nav class="rounded8px mb-4" style="background-color: #fff; ">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active text-center pt-4 w-49" id="nav-product-recommend-tab" data-toggle="tab"
                            href="#nav-product-recommend" role="tab" aria-controls="nav-product-recommend"
                            aria-selected="true">
                            <h5 class="font_head_item"><strong>{{ trans('message.recommend_product') }}</strong></h5>
                        </a>
                        <a class="nav-link text-center pt-4 w-49" id="nav-product-new-tab" data-toggle="tab"
                            href="#nav-product-new" role="tab" aria-controls="nav-product-new" aria-selected="false">
                            <h5 class="font_head_item"><strong>{{ trans('message.lastest_product') }}</strong></h5>
                        </a>
                        <a class="viewmore nav-link text-center pt-4 w-49 float-right d-lg-block d-none" href="/product_all"
                            style="flex: auto;
                                                                                                            border-bottom: none;">
                            <h5 class="font_head_item" style="text-align: right;"><strong
                                    style="">{{ trans('message.load_more') }}</strong></h5>
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show" id="nav-product-new" role="tabpanel"
                        aria-labelledby="nav-product-new-tab">
                        <div class="form-row">
                            @foreach ($product_all2 as $item)
                                <?php
                                    $src = '/img/no_image.png';
                                    if (isset($item->product_img[0])) {
                                        $src = '/img/product/'.$item->product_img[0];
                                    }

                                    $title = $item->name;
                                    $allpaying = 0;
                                    $rating_person = 0;
                                ?>


                                @foreach ($rating_group as $rating)
                                    <?php if ($rating['product_id'] == $item['id']) {
                                        $allpaying += $rating['rating'];
                                        $rating_person++;
                                    } ?>
                                @endforeach

                                @if ($item->status_goods != 2)
                                    <div class="col-lg-2 col-md-3 col-6 mb-3 d-flex align-items-stretch">
                                        <a href="/product_detail/{{ $item->id }}" class="w-100">
                                            <div class="card w-100 list-product rounded8px position-relative"
                                                style="border: unset; cursor: pointer;">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="embed-responsive embed-responsive-1by1 position-relative"
                                                        style="overflow: hidden;border-radius: 8px;">
                                                        <div class="embed-responsive-item d-flex align-items-center justify-content-center"
                                                            style="overflow: hidden;">
                                                            @php
                                                                $date1 = date_create($item->created_at);
                                                                $date2 = date_create(date('Y-m-d'));
                                                                $o_diff = date_diff($date1, $date2);
                                                            @endphp
                                                            @if ($o_diff->d <= 7)
                                                                <img class="position-absolute-img"
                                                                    src="img/frame_product/กรอบรูปMM-02.png" alt="">
                                                            @elseif(isset($item->product_option['price_special'][0]))
                                                                <img class="position-absolute-img"
                                                                    src="img/frame_product/กรอบรูปMM-01.png" alt="">
                                                            @elseif($item->view_cnt > $sum_views)
                                                                <img class="position-absolute-img"
                                                                    src="img/frame_product/กรอบรูปMM-03.png" alt="">
                                                            @elseif($item->sold_amt > $sum_solds)
                                                                <img class="position-absolute-img"
                                                                    src="{{ 'img/frame_product/กรอบรูปMM-0' . rand(4, 5) . '.png' }}"
                                                                    alt="">
                                                            @else
                                                                <img class="position-absolute-img"
                                                                    src="{{ 'img/frame_product/กรอบรูปMM-0' . rand(6, 8) . '.png' }}"
                                                                    alt="">
                                                            @endif
                                                            <img class="img-fluid" src="{{ $src }}" onerror="this.onerror=null;this.src='{{asset('img/no_image.png')}}'" alt="Card image cap">
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="card-body px-lg-3 px-md-2 px-1">
                                                    <div class="col-12 mb-2">
                                                        <p class="card-text mb-0 text-dot1" data-toggle="tooltip"
                                                            data-placement="top" title="{{ $item->name }}">
                                                            <strong>{{ $title }}</strong>
                                                        </p>
                                                        <p class="card-text mb-0 text-dot2-custom">{!! nl2br($item->description) !!}
                                                        </p>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <?php if (isset($item->product_option['price_special']) && $item->product_option['price_special'][0] > 0) { ?>
                                                        <h3 class="mb-0 price_size-custom color-price">
                                                            <small style="color: #CCCCCC;font-size: 14px;">
                                                                <strike><i>฿  {{ min($item->product_option['price']) }}</i></strike>
                                                            </small> <br/>
                                                            <strong class="pt-2 color-price" >
                                                                ฿  {{ min($item->product_option['price_special']) }}
                                                            </strong>
                                                        </h3>
                                                        <?php } else { ?>
                                                        <h3 class="mb-0 price_size-custom color-price" >
                                                            <strong class="pt-2">
                                                                ฿  {{ min($item->product_option['price']) }}
                                                            </strong>
                                                        </h3>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr class="w-100" style="margin-top: 0px;">
                                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                                            ร้าน {{ $item->shops[0]->shop_name }}
                                                        </p>
                                                        <?php if( $item->shops[0]->ated_type == 'kpo' ) { ?>
                                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                                            คพอ.รุ่นที่ {{ $item->shops[0]->ated_gen_no }}
                                                        </p>
                                                        <?php } elseif( $item->shops[0]->ated_type == 'province' ) { ?>
                                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                                            สมาชิกจังหวัด {{ ($item->shops[0]->ated_province_id) ? $item->shops[0]->province[0]->name_th : '' }}
                                                        </p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach

                            <div class="col-12 text-center mb-4">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <a href="{{ url('product-new') }}" class="btn py-2 rounded8px btn-see-more">
                                        <strong class="font_head_item">{{ trans('message.load_more') }}</strong></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane active fade show" id="nav-product-recommend" role="tabpanel"
                        aria-labelledby="nav-product-recommend-tab">
                        <div class="form-row">
                            @foreach ($product_all3 as $item)
                            <?php
                                $src = '/img/no_image.png';
                                if (isset($item->product_img[0])) {
                                    $src = '/img/product/'.$item->product_img[0];
                                }

                                $title = $item->name;
                                $allpaying = 0;
                                $rating_person = 0;
                            ?>

                                @foreach ($rating_group as $rating)
                                    <?php if ($rating['product_id'] == $item['id']) {
                                        $allpaying += $rating['rating'];
                                        $rating_person++;
                                    } ?>
                                @endforeach


                                @if ($item->status_goods != 2)
                                    <div class="col-lg-2 col-md-3 col-6 mb-3 d-flex align-items-stretch">
                                        <a href="/product_detail/{{ $item->id }}" class="w-100">
                                            <div class="card w-100 list-product rounded8px position-relative"
                                                style="border: unset; cursor: pointer;">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="embed-responsive embed-responsive-1by1 position-relative"
                                                        style="overflow: hidden;border-radius: 8px;">
                                                        <div class="embed-responsive-item d-flex align-items-center justify-content-center"
                                                            style="overflow: hidden;">
                                                            @php
                                                                $date1 = date_create($item->created_at);
                                                                $date2 = date_create(date('Y-m-d'));
                                                                $o_diff = date_diff($date1, $date2);
                                                            @endphp
                                                            @if ($o_diff->d <= 7)
                                                                <img class="position-absolute-img"
                                                                    src="img/frame_product/กรอบรูปMM-02.png" alt="">
                                                            @elseif(isset($item->product_option['price_special'][0]))
                                                                <img class="position-absolute-img"
                                                                    src="img/frame_product/กรอบรูปMM-01.png" alt="">
                                                            @elseif($item->view_cnt > $sum_views)
                                                                <img class="position-absolute-img"
                                                                    src="img/frame_product/กรอบรูปMM-03.png" alt="">
                                                            @elseif($item->sold_amt > $sum_solds)
                                                                <img class="position-absolute-img"
                                                                    src="{{ 'img/frame_product/กรอบรูปMM-0' . rand(4, 5) . '.png' }}"
                                                                    alt="">
                                                            @else
                                                                <img class="position-absolute-img"
                                                                    src="{{ 'img/frame_product/กรอบรูปMM-0' . rand(6, 8) . '.png' }}"
                                                                    alt="">
                                                            @endif
                                                            <img class="img-fluid" src="{{ $src }}" onerror="this.onerror=null;this.src='{{asset('img/no_image.png')}}'" alt="Card image cap">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body px-lg-3 px-md-2 px-1">
                                                    <div class="col-12 mb-2">
                                                        <p class="card-text mb-0 text-dot1" data-toggle="tooltip"
                                                            data-placement="top" title="{{ $item->name }}">
                                                            <strong>{{ $title }}</strong>
                                                        </p>
                                                        <p class="card-text mb-0 text-dot2-custom">{!! nl2br($item->description) !!}
                                                        </p>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <h3 class="mb-0 price_size-custom color-price">
                                                            <strong>฿  
                                                                {{ number_format(min($item->product_option['price'])) }}</strong>
                                                        </h3>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr class="w-100" style="margin-top: 0px;">
                                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                                            ร้าน {{ $item->shops[0]->shop_name }}
                                                        </p>
                                                        <?php if( $item->shops[0]->ated_type == 'kpo' ) { ?>
                                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                                            คพอ.รุ่นที่ {{ $item->shops[0]->ated_gen_no }}
                                                        </p>
                                                        <?php } elseif( $item->shops[0]->ated_type == 'province' ) { ?>
                                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                                            สมาชิกจังหวัด {{ ($item->shops[0]->ated_province_id) ? $item->shops[0]->province[0]->name_th : '' }}
                                                        </p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach

                            <div class="col-12 text-center my-5">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <a href="{{ url('product_all') }}" class="btn py-2 rounded8px btn-see-more"><strong
                                                class="font_head_item btn-see-more">{{ trans('message.load_more') }}</strong></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row mb-5 mt-3">
                                <div class="col-6">
                                    <img class="w-100 rounded8px" src="{{ 'img/-no_banner_medix.png' }}" alt="">
                                </div>
                                <div class="col-6">
                                    <img class="w-100 rounded8px" src="{{ 'img/-no_banner_medix.png' }}" alt="">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (isset($newUser))
        @include('component.final-register')

        <script>
            $(document).ready(function() {
                $("#final-register").modal('show');
            });
        </script>
    @endif
@endsection

@section('script')

    <!-- Initialize Swiper -->
    <script>
        // var swiper = new Swiper('.swiper-container', {
        //     slidesPerView: 1,
        //     spaceBetween: 30,
        //     loop: true,
        //     autoplay: {
        //         delay: 10000,
        //         disableOnInteraction: false,
        //     },
        //     pagination: {
        //         el: '.swiper-pagination',
        //         clickable: true,
        //     },
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        // });
    </script>

    <script>
        // var swiper = new Swiper('.swiper-container-1', {
        //     slidesPerView: 6,
        //     spaceBetween: 30,
        //     freeMode: true,
        //     // autoplay: {
        //     //   delay: 2500,
        //     //   disableOnInteraction: false,
        //     // },
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        //     breakpoints: {
        //         0: {
        //             slidesPerView: 2,
        //             spaceBetween: 20,
        //         },
        //         320: {
        //             slidesPerView: 1.5,
        //             spaceBetween: 15,
        //         },
        //         640: {
        //             slidesPerView: 3,
        //             spaceBetween: 20,
        //         },
        //         768: {
        //             slidesPerView: 4,
        //             spaceBetween: 20,
        //         },
        //         1024: {
        //             slidesPerView: 6,
        //             spaceBetween: 25,
        //         },
        //     }
        // });
    </script>
    <script>
        // var swiper = new Swiper('.swiper-container-11', {
        //     slidesPerView: 6,
        //     spaceBetween: 30,
        //     freeMode: true,
        //     // autoplay: {
        //     //   delay: 2500,
        //     //   disableOnInteraction: false,
        //     // },
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        //     breakpoints: {
        //         0: {
        //             slidesPerView: 2,
        //             spaceBetween: 20,
        //         },
        //         320: {
        //             slidesPerView: 2.5,
        //             spaceBetween: 15,
        //         },
        //         640: {
        //             slidesPerView: 3,
        //             spaceBetween: 20,
        //         },
        //         768: {
        //             slidesPerView: 4,
        //             spaceBetween: 20,
        //         },
        //         1024: {
        //             slidesPerView: 6,
        //             spaceBetween: 25,
        //         },
        //     }
        // });
    </script>
    <script>
        // var swiper = new Swiper('.swiper-container-2', {
        //     slidesPerView: 4,
        //     spaceBetween: 30,
        //     freeMode: true,
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        //     breakpoints: {
        //         0: {
        //             slidesPerView: 1.5,
        //             spaceBetween: 20,
        //         },
        //         320: {
        //             slidesPerView: 1.5,
        //             spaceBetween: 20,
        //         },
        //         640: {
        //             slidesPerView: 3,
        //             spaceBetween: 20,
        //         },
        //         768: {
        //             slidesPerView: 4,
        //             spaceBetween: 40,
        //         },
        //         1024: {
        //             slidesPerView: 4,
        //             spaceBetween: 50,
        //         },
        //     }
        // });
    </script>
    <script>
        // var swiper = new Swiper('.swiper-container-6', {
        //     slidesPerView: 4,
        //     spaceBetween: 30,
        //     freeMode: true,
        //     autoplay: {
        //         delay: 2500,
        //         disableOnInteraction: false,
        //     },
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        //     breakpoints: {
        //         0: {
        //             slidesPerView: 2,
        //             spaceBetween: 20,
        //         },
        //         320: {
        //             slidesPerView: 2,
        //             spaceBetween: 20,
        //         },
        //         640: {
        //             slidesPerView: 3,
        //             spaceBetween: 20,
        //         },
        //         768: {
        //             slidesPerView: 4,
        //             spaceBetween: 40,
        //         },
        //         1024: {
        //             slidesPerView: 4,
        //             spaceBetween: 50,
        //         },
        //     }
        // });
    </script>

    <!-- Initialize Swiper -->
    <script>
        // var swiper = new Swiper('.swiper-container-3', {
        //     slidesPerView: 3,
        //     spaceBetween: 30,
        //     freeMode: true,
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        //     breakpoints: {
        //         0: {
        //             slidesPerView: 1.5,
        //             spaceBetween: 20,
        //         },
        //         320: {
        //             slidesPerView: 1.5,
        //             spaceBetween: 20,
        //         },
        //         640: {
        //             slidesPerView: 2,
        //             spaceBetween: 20,
        //         },
        //         768: {
        //             slidesPerView: 3,
        //             spaceBetween: 40,
        //         },
        //         1024: {
        //             slidesPerView: 3,
        //             spaceBetween: 50,
        //         },
        //     }
        // });
    </script>
    <!-- Initialize Swiper -->
    <script>
        // var swiper = new Swiper('.swiper-container-4', {
        //     slidesPerView: 8,
        //     spaceBetween: 30,
        //     freeMode: true,
        //     autoplay: {
        //         delay: 2500,
        //         disableOnInteraction: false,
        //     },
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        //     breakpoints: {
        //         0: {
        //             slidesPerView: 3,
        //             spaceBetween: 20,
        //         },
        //         320: {
        //             slidesPerView: 3,
        //             spaceBetween: 20,
        //         },
        //         640: {
        //             slidesPerView: 6,
        //             spaceBetween: 20,
        //         },
        //         768: {
        //             slidesPerView: 6,
        //             spaceBetween: 40,
        //         },
        //         1024: {
        //             slidesPerView: 8,
        //             spaceBetween: 50,
        //         },
        //     }
        // });
    </script>

    <!-- Initialize Swiper -->
    <script>
        // var swiper = new Swiper('.swiper-container-5', {
        //     slidesPerView: 3,
        //     spaceBetween: 30,
        //     slidesPerGroup: 1,
        //     autoplay: {
        //         delay: 3500,
        //         disableOnInteraction: false,
        //     },
        //     loop: true,
        //     loopFillGroupWithBlank: true,

        //     breakpoints: {
        //         0: {
        //             slidesPerView: 1,
        //             spaceBetween: 20,
        //         },
        //         320: {
        //             slidesPerView: 1,
        //             spaceBetween: 20,
        //         },
        //         640: {
        //             slidesPerView: 3,
        //             spaceBetween: 20,
        //         },
        //         768: {
        //             slidesPerView: 3,
        //             spaceBetween: 40,
        //         },
        //         1024: {
        //             slidesPerView: 3,
        //             spaceBetween: 50,
        //         },
        //     }
        // });
    </script>


    <!-- slide owl -->
    <script>
        $('#owl1').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1.5,
                    nav: false
                },
                320: {
                    items: 2,
                    nav: false
                },
                640: {
                    items: 3,
                    nav: false
                },
                768: {
                    items: 4,
                    nav: false
                },
                1024: {
                    items: 4.5,
                    nav: false
                }
            }
        })
    </script>
    <!-- slide owl -->
    <script>
        $('#owl2').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1.5,
                    nav: false
                },
                320: {
                    items: 2,
                    nav: false
                },
                640: {
                    items: 3,
                    nav: false
                },
                768: {
                    items: 4,
                    nav: false
                },
                1024: {
                    items: 4.5,
                    nav: false
                }
            }
        })
    </script>
    <!-- slide owl -->
    <script>
        $('#owl3').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1.5,
                    nav: false
                },
                320: {
                    items: 2,
                    nav: false
                },
                640: {
                    items: 3,
                    nav: false
                },
                768: {
                    items: 4,
                    nav: false
                },
                1024: {
                    items: 4.5,
                    nav: false
                }
            }
        })
    </script>
    <!-- slide owl -->
    <script>
        $('#owl4').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1.5,
                    nav: false
                },
                320: {
                    items: 2,
                    nav: false
                },
                640: {
                    items: 3,
                    nav: false
                },
                768: {
                    items: 4,
                    nav: false
                },
                1024: {
                    items: 4.5,
                    nav: false
                }
            }
        })
    </script>

    <script>
        $('#owl5').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1.5,
                    nav: false
                },
                320: {
                    items: 2,
                    nav: false
                },
                640: {
                    items: 3,
                    nav: false
                },
                768: {
                    items: 4,
                    nav: false
                },
                1024: {
                    items: 4.5,
                    nav: false
                }
            }
        })
    </script>

    {{-- <script>
    $(document).ready(function() {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function() {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function() {
        ResCarouselSize();
        });
    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function() {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            } else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            } else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            } else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({
                'transform': 'translateX(0px)',
                'width': itemWidth * itemNumbers
            });
            $(this).find(itemClass).each(function() {
                $(this).outerWidth(itemWidth);
            });



        $(window).resize(function() {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function() {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                } else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({
                    'transform': 'translateX(0px)',
                    'width': itemWidth * itemNumbers
                });
                $(this).find(itemClass).each(function() {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });



        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            } else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });

var navOffset = parseInt($('body').css('padding-top'));
$('.navbar a').click(function(event) {
    var scrollPos = jQuery('body').find($(this).attr('href')).offset().top - navOffset - 70;
    $('body,html').animate({
        scrollTop: scrollPos
    }, 500, function() {});
    return false;

</script> --}}

    <!-- dropdown category -->
    <script type="text/javascript">
        $(document).ready(function() {
            bannerMain = $('#bannerMain').outerHeight();
            console.log("bannerMain", bannerMain);
        })
        $(".dropdownTitle, .dropdown-content").mouseenter(function() {
            var toggle = $(this).attr('data-for');
            $('.dropdown-content[data-for="' + toggle + '"]').css('display', 'block');
        }).mouseleave(function() {
            var toggle = $(this).attr('data-for');
            $('.dropdown-content[data-for="' + toggle + '"]').css('display', 'none');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                e.target // newly activated tab
                e.relatedTarget // previous active tab
                $(".owl-carousel").trigger('refresh.owl.carousel');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.rating-upper').each(function() {
                var rate = $(this).attr('rating');
                $(this).css('width', rate + '%');
            })
        });
    </script>


@endsection
