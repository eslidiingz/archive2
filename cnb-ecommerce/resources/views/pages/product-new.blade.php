@extends('new_ui.layouts.front-end')
@section('style')


    <base href="/">
    <style>
        /*.nav_custom_cat{
                        display: none !important;
                    }*/
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

        .nav_custom_cat {
            display: none !important;
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
                    <h1 class="text-dark"><strong>สินค้าใหม่</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mx-0">
            <div class="col-12 p-0 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: unset;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="color-blue">หน้าแรก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">สินค้าใหม่</li>
                    </ol>
                </nav>
                {{-- <div class="row rounded8px py-4 mx-0 align-items-center mt-4 itemHidden" style="background-color: #fff;">
                    <div class="col-12 mb-lg-2 mb-md-3 mb-3">
                        <div class="row">
                            <div class="itemHidden">
                                <h5 class="mb-0 pl-lg-4 pl-md-4 pl-3 pt-2 font_head_item"><strong>เรียงโดย</strong></h5>
                            </div>
                            <div>
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group ml-3 mr-3" role="group" aria-label="First group">
                                        <button type="button" class="btn btn-filter" id="order1"
                                            style="@if (request('sortBy') == 'pop') color: #346751;border: 1px solid #346751;border-radius: 6px;background-color: #F0F0F0;@endif">ยอดนิยม</button>
                                    </div>
                                    <div class="btn-group mr-3" role="group" aria-label="Second group">
                                        <button type="button" class="btn btn-filter" id="order2"
                                            style="@if (request('sortBy') == 'ctime') color: #346751;border: 1px solid #346751;border-radius: 6px;background-color: #F0F0F0;@endif">ล่าสุด</button>
                                    </div>
                                    <div class="btn-group mr-3" role="group" aria-label="Second group">
                                        <button type="button" class="btn btn-filter" id="order3"
                                            style="@if (request('sortBy') == 'sales') color: #346751;border: 1px solid #346751;border-radius: 6px;background-color: #F0F0F0;@endif">สินค้าขายดี</button>
                                    </div>
                                    <div class="btn-group mr-3" role="group" aria-label="Second group">
                                        <button type="button" class="btn btn-filter" id="order5"
                                            style="@if (request('sortBy') == 'priceLess') color: #346751;border: 1px solid #346751;border-radius: 6px;background-color: #F0F0F0;@endif">ราคาจากน้อย - มาก</button>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <button type="button" class="btn btn-filter" id="order4"
                                            style="@if (request('sortBy') == 'priceMore') color: #346751;border: 1px solid #346751;border-radius: 6px;background-color: #F0F0F0;@endif">ราคาจากมาก - น้อย</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        {{-- {{dd($product_newws)}} --}}
        <div class="form-row mt-2">
            @foreach ($product_neww as $item)
                @if (isset($item->product_img[0]))
                    <?php
                    $front_image = $item->product_img[0];
                    $src = '/img/product/' . $front_image;
                    ?>
                @else
                    <?php $src = '/img/no_image.png'; ?>
                @endif
                <?php $title = $item->name;
                $allpaying = 0;
                $rating_person = 0;
                ?>


                @foreach ($rating_group as $rating)
                    <?php

                    if ($rating['product_id'] == $item['id']) {
                        $allpaying += $rating['rating'];
                        $rating_person++;
                    }

                    ?>
                @endforeach
                @php
                    $date1 = date_create($item->created_at);
                    $date2 = date_create(date('Y-m-d'));
                    $o_diff = date_diff($date1, $date2);
                @endphp
                    <div class="col-lg-2 col-md-3 col-6 mb-3 d-flex align-items-stretch">
                        <a href="/product_detail/{{ $item->id }}" class="w-100">
                            {{-- {{$item->created_at}} --}}
                            <div class="card w-100 list-product rounded8px position-relative"
                                style="border: unset; cursor: pointer;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="embed-responsive embed-responsive-1by1 position-relative"
                                        style="overflow: hidden;border-radius: 8px;">
                                        <div class="embed-responsive-item d-flex align-items-center justify-content-center"
                                            style="overflow: hidden;">
                                            @if ($o_diff->d <= 7)
                                                <img class="position-absolute-img" src="img/frame_product/กรอบรูปMM-02.png"
                                                    alt="">
                                            @elseif(isset($item->product_option['price_special'][0]))
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
                                            <img class="img-fluid" data-src="{{ $src }}"
                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                alt="Card image cap">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-lg-3 px-md-2 px-1">
                                    <div class="col-12 mb-2">
                                        <p class="card-text mb-0 text-dot1" data-toggle="tooltip" data-placement="top"
                                            title="{{ $item->name }}">
                                            <strong>{{ $title }}</strong>
                                        </p>
                                        <p class="card-text mb-0 text-dot2-custom">{!! nl2br($item->description) !!}
                                        </p>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <h3 class="mb-0 price_reborn_custom" style="color: #02A2D5;">
                                            <strong>฿
                                                {{ number_format(min($item->product_option['price'])) }}</strong>
                                        </h3>
                                    </div>
                                    <div class="col-12">
                                        <hr class="w-100">
                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                            ร้าน {{ $item->shops[0]->shop_name }}
                                        </p>
                                        @if( $item->shops[0]->ated_gen_no )
                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                            <strong>คพอ.รุ่นที่ {{ $item->shops[0]->ated_gen_no }}</strong>
                                        </p>
                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                            <strong>จังหวัด {{ ($item->shops[0]->ated_province_id) ? $item->shops[0]->province[0]->name_th : '' }}</strong>
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach

            <div class="d-flex justify-content-end col-12">


                @if ($product_neww->hasPages())
                    <ul class="pagination">
                        {{-- Previous Page Link --}}

                        @if ($product_neww->onFirstPage())
                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                    class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                        aria-hidden="true"></i></span></li>
                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                    class="mr-1"><i class="fa fa-angle-left text-secondary"
                                        aria-hidden="true"></i></span></li>
                        @else <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $product_neww->url(1) }}&product_type={{ $product_type }}&sort_by={{ $sort_by }}"
                                    rel="prev">
                                    <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                                </a>
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $product_neww->previousPageUrl() }}&product_type={{ $product_type }}&sort_by={{ $sort_by }}"
                                    rel="prev">
                                    <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                </a>
                            </li>
                        @endif

                        {{-- show button first page --}}
                        @if ($product_neww->currentPage() > 5)
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a
                                    href="{{ $product_neww->url(1) }}&product_type={{ $product_type }}&sort_by={{ $sort_by }}"><span>1</span></a>
                            </li>
                        @endif
                        {{-- show button first page --}}


                        @if ($product_neww->currentPage() > 5)
                            <li class="align-self-center px-2 bg-pagination-white">
                                <span>...</span>
                            </li>
                        @endif



                        @foreach (range(1, $product_neww->lastPage()) as $i)
                            @if ($i >= $product_neww->currentPage() - 2 && $i <= $product_neww->currentPage() + 2)

                                @if ($i == $product_neww->currentPage())
                                    <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                @else
                                    <li class="px-2 bg-pagination-white"><a
                                            href="{{ $product_neww->url($i) }}&product_type={{ $product_type }}&sort_by={{ $sort_by }}">{{ $i }}</a>
                                    </li>
                                @endif
                            @endif
                        @endforeach


                        {{-- three dots between number near last pages --}}
                        @if ($product_neww->currentPage() < $product_neww->lastPage() - 4)
                            <li class="align-self-center  px-2 bg-pagination-white">
                                <span>...</span>
                            </li>
                        @endif
                        {{-- three dots between number near last pages --}}


                        {{-- Show Last Page --}}
                        @if ($product_neww->hasMorePages() == $product_neww->lastPage() && $product_neww->lastPage() > 5)
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a
                                    href="{{ $product_neww->url($product_neww->lastPage()) }}&product_type={{ $product_type }}&sort_by={{ $sort_by }}"><span>{{ $product_neww->lastPage() }}</span>
                                </a>
                            </li>
                        @endif
                        {{-- Show Last Page --}}



                        @if ($product_neww->hasMorePages())
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $product_neww->nextPageUrl() }}&product_type={{ $product_type }}&sort_by={{ $sort_by }}"
                                    rel="next">
                                    <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $product_neww->url($product_neww->lastPage()) }}&product_type={{ $product_type }}&sort_by={{ $sort_by }}"
                                    rel="next">
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
