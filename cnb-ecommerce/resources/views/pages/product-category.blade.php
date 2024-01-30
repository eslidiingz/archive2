@extends('new_ui.layouts.front-end')
@section('style')


    <base href="/">
    <style>
        /*.nav_custom_cat{
            display: none !important;
        }*/
        /* body {
            background-color: #fff;
        } */

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

        .banner_product_n {
            /* background-image: url('../new_ui/img/banner_bg/banner_product_news.png'); */
            background-color: #acacac;
            width: 100%;
            background-position: right;
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
@endsection
@section('content')
    <div class="container-fluid py-lg-5 py-md-5 py-4 banner_product_n" id="navCategoryTitle">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-dark"><strong>{{ $cate_name }}</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-lg-block d-md-none d-none">
            <div class="col-12 p-0 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: unset;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="color-blue" >หน้าแรก</a></li>
                        <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                        <li class="breadcrumb-item active" aria-current="page">{{ $cate_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="form-row mt-4">
            @foreach ($data as $item)

                <?php
                $allpaying = 0;
                $rating_person = 0;
                ?>


                @foreach ($rating_data as $rating)
                    <?php

                    if ($rating['product_id'] == $item['id']) {
                        $allpaying += $rating['rating'];
                        $rating_person++;
                    }

                    ?>
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
                                                <img class="position-absolute-img" src="img/frame_product/กรอบรูปMM-02.png"
                                                    alt="">
                                            @elseif(isset($item->product_option['price_special'][0]) && $item->product_option['price_special'][0]>0)
                                                <img class="position-absolute-img" src="img/frame_product/กรอบรูปMM-01.png"
                                                    alt="">
                                            @elseif($item->view_cnt > $sum_views)
                                                <img class="position-absolute-img" src="img/frame_product/กรอบรูปMM-03.png"
                                                    alt="">
                                            @elseif($item->sold_amt > $sum_solds)
                                                <img class="position-absolute-img"
                                                    src="{{ 'img/frame_product/กรอบรูปMM-0' . rand(4, 5) . '.png' }}"
                                                    alt="">
                                            @else
                                                <img class="position-absolute-img"
                                                    src="{{ 'img/frame_product/กรอบรูปMM-0' . rand(6, 8) . '.png' }}"
                                                    alt="">
                                            @endif
                                            <img class="img-fluid" src="{{ '/img/product/' . $item->product_img[0] }}"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                alt="Card image cap">
                                        </div>

                                    </div>

                                </div>
                                <div class="card-body px-lg-3 px-md-2 px-1">
                                    <div class="col-12 mb-2">
                                        <p class="card-text mb-0 text-dot1" data-toggle="tooltip" data-placement="top"
                                            title="{{ $item->name }}">
                                            <strong>{{ $item->name }}</strong>
                                        </p>
                                        <p class="card-text mb-0 text-dot2-custom">{!! nl2br($item->description) !!}
                                        </p>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <?php
                                                            if( isset( $item->product_option['price_special'] ) && $item->product_option['price_special'][0] > 0) {
                                                        ?>
                                                        <h3 class="mb-0 price_reborn_custom">
                                                            <small style="color: #CCCCCC;font-size: 14px;">
                                                                <strike><i>฿{{ min($item->product_option['price']) }}</i></strike>
                                                            </small><br>
                                                            <strong class="pt-2 color-red">
                                                                ฿{{ min($item->product_option['price_special']) }}
                                                            </strong>
                                                        </h3>
                                                        <?php
                                                            } else {
                                                        ?>
                                                        <h3 class="mb-0 price_reborn_custom color-red">
                                                            <br>
                                                            <strong class="pt-2">
                                                                ฿{{ min($item->product_option['price']) }}
                                                            </strong>
                                                        </h3>
                                                        <?php
                                                            }
                                                        ?>
                                    </div>
                                    <div class="col-12">
                                        <hr class="w-100">
                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                            ร้าน {{ $item->shops[0]->shop_name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- <div class="col-lg-2 col-md-4 col-6" id="demo">
                <a href="/product_detail/{{ $item->id }}" >
                    <div class="rounded8px px-2 "
                        style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                        <div class="d-flex align-items-center justify-content-center h-200px pt-2" style="overflow:hidden;">
                            <img data-src="{{ '/img/product/' . $item->product_img[0] }}" class=" rounded8px lazy"
                                style="max-height: 100%;max-width: 100%;" alt="...">
                        </div>
                        <div class="px-2">
                            <h6 class="card-title mb-0 text-left text-dot2-custom pt-2 font_head_item" data-toggle="tooltip" data-placement="top" title="{{ $item->name }}" style="font-size: 14px !important; padding-bottom: 1px;"><strong>{{ $item->name }}</strong></h6>
                        <h2 class="card-text mb-0 text-left font_price" style="color: #d61900; font-size: 18px !important; padding-bottom: 1px;"><strong>฿
                                {{ number_format($item->product_option['price'][0]) }}</strong></h2>
                        <h6 class="text-left mb-3 pb-1 d-flex align-items-start" style="height:25px !important;">
                            @if ($allpaying > 0)
                            <?php $starpercen = ($allpaying / ($rating_person * 5)) * 100; ?>

                            <div class="rating">
                                <div class="rating-upper" style="width: {{ $starpercen }}%">
                                    <span style="font-size: 14px;">★★★★★</span>
                                </div>
                                <div class="rating-lower">
                                    <span style="font-size: 14px;">★★★★★</span>
                                </div>
                            </div>
                            <span class="mb-0" style="color: #b2b2b2; font-size: 14px;">
                                ({{ $rating_person }})</span>

                        @else
                            <?php $starpercen = 0; ?>
                            <span class="mb-0" style="color: #b2b2b2;visibility: hidden;">
                                ไม่มีคะแนน</span>

                            @endif
                        </h6>
                        </div>
                    </div>
                </a>
            </div> -->
                @endif
            @endforeach

            <div class="d-flex justify-content-end col-12">


                @if ($data->hasPages())
                    <ul class="pagination">
                        {{-- Previous Page Link --}}

                        @if ($data->onFirstPage())
                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                    class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                        aria-hidden="true"></i></span></li>
                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                    class="mr-1"><i class="fa fa-angle-left text-secondary"
                                        aria-hidden="true"></i></span></li>
                        @else <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $data->url(1) }}" rel="prev">
                                    <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                                </a>
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $data->previousPageUrl() }}" rel="prev">
                                    <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                </a>
                            </li>
                        @endif

                        {{-- show button first page --}}
                        @if ($data->currentPage() > 5)
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $data->url(1) }}"><span>1</span></a>
                            </li>
                        @endif
                        {{-- show button first page --}}


                        {{-- condition stay in first page not show button --}}
                        {{-- @if ($data->currentPage() == 1)
                                <li class="align-self-center mr-1">
                                    <a class="d-none page-link" tabindex="-2">1</a>
                                </li>
                                @endif --}}


                        @if ($data->currentPage() > 5)
                            <li class="align-self-center px-2 bg-pagination-white">
                                <span>...</span>
                            </li>
                        @endif



                        @foreach (range(1, $data->lastPage()) as $i)
                            @if ($i >= $data->currentPage() - 2 && $i <= $data->currentPage() + 2)

                                @if ($i == $data->currentPage())
                                    <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                @else
                                    <li class="px-2 bg-pagination-white"><a
                                            href="{{ $data->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endif
                        @endforeach


                        {{-- three dots between number near last pages --}}
                        @if ($data->currentPage() < $data->lastPage() - 4)
                            <li class="align-self-center  px-2 bg-pagination-white">
                                <span>...</span>
                            </li>
                        @endif
                        {{-- three dots between number near last pages --}}


                        {{-- Show Last Page --}}
                        @if ($data->hasMorePages() == $data->lastPage() && $data->lastPage() > 5)
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $data->url($data->lastPage()) }}"><span>{{ $data->lastPage() }}</span>
                                </a>
                            </li>
                        @endif
                        {{-- Show Last Page --}}



                        @if ($data->hasMorePages())
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $data->nextPageUrl() }}" rel="next">
                                    <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $data->url($data->lastPage()) }}" rel="next">
                                    <i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i>
                                </a>
                            </li>

                        @else
                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span><i
                                        class="fa fa-angle-right text-secondary" aria-hidden="true"></i></span></li>
                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><i
                                    class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i></a></li>

                        @endif

                    </ul>
                @endif
            </div>


        </div>
    </div>
@endsection
