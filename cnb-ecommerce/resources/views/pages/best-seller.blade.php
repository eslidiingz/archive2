@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .nav_custom_cat{
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
<div class="container-fluid py-lg-4 py-md-4 py-3" style="background-color: #d61900;" id="navCategoryTitle">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white">ขายดีประจำสัปดาห์</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row d-lg-block d-md-none d-none">
        <div class="col-12 p-0 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: unset;">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color: #1947e3;">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ขายดีประจำสัปดาห์</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
{{-- <div class="container-fluid mb-4" style="background-color: #fff;">
    <div class="container p-0">
        <div class="row m-0 py-4">
            <div class="col-12 d-flex flex-row mt-4">
                <h3><strong>ขายดีประจำสัปดาห์</strong></h3>
            </div>
            <div class="col-12">
                <hr class="w-100">
            </div>
            <div class="col-12 px-lg-3 px-md-3 px-0">
                <!-- Swiper -->
                <div class="swiper-container-3 " style="overflow: hidden;">
                    <div class="swiper-wrapper">
                        @for ($x = 0; $x <= 11; $x++) <div class="swiper-slide">
                            <a href="{{ url('product-list') }}">
<div class="col-12 rounded8px mb-4 d-flex align-items-stretch" style="background-color: #efefef;">
    <div class="row">
        <div class="col-12 px-4 text-left">
            <h5 class="pt-3"><strong>มือถือและอุปกรณ์เสริม</strong></h5>
            <h6 style="color: #666;">คำสั่งซื้อ 334453 รายการ</h6>
        </div>
        <div class="col-8 mb-4 d-flex pr-0 position-relative">
            <img data-src="new_ui/img/product/product-1.png" class="img-fluid rounded8px" alt="">
            <div class="position-absolute d-lg-block d-md-none d-none" style="left: 10%; top: -2px;">
                <img data-src="new_ui/img/1.svg" class="position-relative" style=" width: 40px;" alt="">
                <h4 class="position-absolute text-white" style="left: 50%;top: 40%;transform: translate(-50%,-50%);">
                    <strong>1</strong>
                </h4>
            </div>
        </div>
        <div class="col-4 mb-4  d-flex">
            <div class="row">
                <div class="col-12 mb-2 position-relative">
                    <img data-src="new_ui/img/product/product-2.png" class="img-fluid rounded8px" alt="">
                    <div class="position-absolute d-lg-block d-md-none d-none" style="left: 15%; top: -2px;">
                        <img data-src="new_ui/img/2.svg" class="position-relative" style=" width: 40px;" alt="">
                        <h4 class="position-absolute text-white"
                            style="left: 50%;top: 40%;transform: translate(-50%,-50%);"><strong>2</strong></h4>
                    </div>
                </div>
                <div class="col-12 mt-2 position-relative">
                    <img data-src="new_ui/img/product/product-3.png" class="img-fluid rounded8px" alt="">
                    <div class="position-absolute d-lg-block d-md-none d-none" style="left: 15%; top: -2px;">
                        <img data-src="new_ui/img/3.svg" class="position-relative" style=" width: 40px;" alt="">
                        <h4 class="position-absolute text-white"
                            style="left: 50%;top: 40%;transform: translate(-50%,-50%);"><strong>3</strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</a>
</div>
@endfor
</div>
<!-- Add Arrows -->
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>
</div>
</div>
</div> --}}
<div class="container mt-4">
    <div class="form-row">
        @foreach($product_all as $item)
        <div class="col-lg-2 col-md-4 col-6 ">
            <a href="/product/{{$item->id}}">
                <div class="rounded8px px-2 "
                    style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                    <div class="d-flex align-items-center justify-content-center h-200px pt-2" style="overflow:hidden;">
                        <img data-src="{{asset('/img/product/'.$item->product_img[0])}}" class=" rounded8px "
                            style="max-height: 100%;max-width: 100%;" alt="...">
                    </div>
                    <div class="px-2">
                        <h6 class="card-title mb-0 text-left text-dots pt-2 font_head_item" data-toggle="tooltip" data-placement="top" title="{{ $item->name }}" style="font-size: 14px !important;">
                            <strong>{{ $item->name }}</strong></h6>
                        <h2 class="card-text mb-0 text-left font_price" style="color: #346751; font-size: 18px !important;"><strong>฿
                                {{number_format($item->product_option['price'][0])}}</strong></h2>
                        <!-- <h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6> -->
                        <?php
                        $allpaying = 0;
                        $rating_person = 0;
                        ?>
                        @foreach ($rating_group as $rating)
                        <?php

                            if($rating['product_id'] == $item->id){
                                $allpaying += $rating['rating'];
                                $rating_person++;
                            }
                            //
                            ?>
                        @endforeach
                        <h6 class="text-left mb-3 pb-1 d-flex align-items-start" style="height:25px !important;">

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
                            <span class="mb-3" style="font-size: 14px; color: #b2b2b2;">
                                ({{ $rating_person }})</span>

                            @else
                            <?php $starpercen = 0; ?>
                            <span class="mb-3" style="color: #b2b2b2;">
                                {{-- ไม่มีคะแนน --}}</span>

                            @endif
                        </h6>
                    </div>
                </div>
            </a>


        </div>
        @endforeach

        <div class="d-flex justify-content-end col-12">


            @if ($product_all->hasPages())
            <ul class="pagination">
                {{-- Previous Page Link --}}

                @if ($product_all->onFirstPage())
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
                @else <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->url(1) }}" rel="prev">
                        <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                   </a>
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->previousPageUrl() }}" rel="prev">
                        <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                    </a>
                </li> @endif

                {{-- show button first page --}}
                @if ( $product_all->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->url(1) }}"><span>1</span></a>
                </li>
                @endif
                {{-- show button first page --}}


                {{-- condition stay in first page not show button --}}
                {{-- @if ( $product_all->currentPage() == 1 )
                                <li class="align-self-center mr-1">
                                    <a class="d-none page-link" tabindex="-2">1</a>
                                </li>
                                @endif --}}


                @if ( $product_all->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <span>...</span>
                </li>
                @endif



                @foreach(range(1, $product_all->lastPage()) as $i)
                @if($i >= $product_all->currentPage() - 2 && $i <= $product_all->currentPage() + 2)

                    @if ($i == $product_all->currentPage())
                    <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                    @else
                    <li class="px-2 bg-pagination-white"><a
                            href="{{ $product_all->url($i) }}">{{ $i }}</a></li>
                    @endif
                    @endif
                    @endforeach


                    {{-- three dots between number near last pages --}}
                    @if ( $product_all->currentPage() < $product_all->lastPage() - 4)
                        <li class="align-self-center  px-2 bg-pagination-white">
                            <span>...</span>
                        </li>
                        @endif
                        {{-- three dots between number near last pages --}}


                        {{-- Show Last Page --}}
                        @if($product_all->hasMorePages() == $product_all->lastPage() && $product_all->lastPage() > 5)
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a
                                href="{{ $product_all->url($product_all->lastPage()) }}"><span>{{ $product_all->lastPage() }}</span>
                            </a>
                        </li>
                        @endif
                        {{-- Show Last Page --}}



                        @if ($product_all->hasMorePages())
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $product_all->nextPageUrl() }}" rel="next">
                               <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $product_all->url($product_all->lastPage()) }}" rel="next">
                                <i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i>
                            </a>
                        </li>

                        @else
                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span><i class="fa fa-angle-right text-secondary" aria-hidden="true"></i></span></li>
                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i></a></li>

                        @endif

            </ul>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container-3', {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1.5,
                spaceBetween: 20,
            },
            320: {
                slidesPerView: 1.5,
                spaceBetween: 20,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
        }
    });

</script>
@endsection
