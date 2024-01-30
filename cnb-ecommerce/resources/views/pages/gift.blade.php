@extends('layouts.default')
@section('style')
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

    .nav-tabs .nav-item.show .nav-link.nav-custom-1,
    .nav-tabs .nav-link.nav-custom-1.active {
        color: #000;
        background-color: #f8eaf3;
        border: none;
    }

    .nav-tabs .nav-link.nav-custom-1:hover {
        color: #000;
        background-color: #f8eaf3;
        border: none;
    }

    .nav-tabs .nav-link.nav-custom-1 {
        color: #b2b2b2;
        background-color: #fff;
        border: none;
    }

    .nav-tabs {
        border: none;
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
<div class="container-fluid py-lg-4 py-md-4 py-3" style="background-color: #f8eaf3;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-2">
                <h3 class="mb-0"><img src="img/icon_Basket.png" class="pr-2" style="width: 35px;" alt=""><strong>กระเช้า</strong></h3>
            </div>
            <div class="col-12">
                <h6 class="mb-0 font_head_item">กระเช้าของขวัญต้อนรับเทศกาล คริสต์มาส และปีใหม่</h6>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row d-lg-block d-md-none d-none">
        <div class="col-12 mt-4 px-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="background-color: unset;">
                    <li class="breadcrumb-item"><a href="/" style="color: #1947e3;">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">กระเช้า</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row mt-lg-0 mt-md-4 mt-4">
                @foreach($gift as $key => $value)
                @php
                $allpaying = 0;
                $rating_person = 0;
                @endphp
                @foreach ($rating_group as $rating)
                @php
                if($rating['product_id'] == $value['id']){
                $allpaying += $rating['rating'];
                $rating_person++;
                }
                @endphp
                @endforeach
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/product_detail/{{$value->id}}">
                        <div class="rounded8px px-2 " style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                            <div class="d-flex align-items-center justify-content-center h-200px pt-2" style="overflow:hidden;">
                                <img src="img/product/{{ $value->product_img[0] }}" class=" rounded8px " style="max-height: 100%;max-width: 100%;" alt="...">
                            </div>
                            <div class="px-2">
                                <h6 class="card-title mb-0 text-left text-dots pt-2 font_head_item" data-toggle="tooltip" data-placement="top" title="{{ $value->name }}" style="font-size: 14px !important;">
                                    <strong>{{ $value->name }}</strong>
                                </h6>
                                <h2 class="card-text mb-0 text-left font_price" style="color: #c75ba1; font-size: 18px !important;">
                                    <strong>฿
                                        {{ number_format($value->price,0) }}</strong>
                                </h2>
                                <h6 class="text-left mb-3 pb-1 d-flex align-items-start" style="height:25px !important;">
                                    @if($allpaying > 0)
                                    <?php $starpercen = ($allpaying / ($rating_person * 5)) * 100; ?>

                                    <div class="rating">
                                        <div class="rating-upper" style="width: {{ $starpercen }}%">
                                            <span style="font-size: 14px;">★★★★★</span>
                                        </div>
                                        <div class="rating-lower">
                                            <span style="font-size: 14px;">★★★★★</span>
                                        </div>
                                    </div>
                                    <span class="mb-0" style="font-size: 14px; color: #b2b2b2;">
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
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end col-12">


                @if ($gift->hasPages())
                <ul class="pagination">
                    {{-- Previous Page Link --}}

                    @if ($gift->onFirstPage())
                    <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
                    <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
                    @else <li class="align-self-center px-2 bg-pagination-white">
                        <a href="{{ $gift->url(1) }}" rel="prev">
                            <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                        </a>
                    <li class="align-self-center px-2 bg-pagination-white">
                        <a href="{{ $gift->previousPageUrl() }}" rel="prev">
                            <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                        </a>
                    </li> @endif

                    {{-- show button first page --}}
                    @if ( $gift->currentPage() > 5 )
                    <li class="align-self-center px-2 bg-pagination-white">
                        <a href="{{ $gift->url(1) }}"><span>1</span></a>
                    </li>
                    @endif
                    {{-- show button first page --}}


                    {{-- condition stay in first page not show button --}}
                    {{-- @if ( $gift->currentPage() == 1 )
                                    <li class="align-self-center mr-1">
                                        <a class="d-none page-link" tabindex="-2">1</a>
                                    </li>
                                    @endif --}}


                    @if ( $gift->currentPage() > 5 )
                    <li class="align-self-center px-2 bg-pagination-white">
                        <span>...</span>
                    </li>
                    @endif



                    @foreach(range(1, $gift->lastPage()) as $i)
                    @if($i >= $gift->currentPage() - 2 && $i <= $gift->currentPage() +
                        2)

                        @if ($i == $gift->currentPage())
                        <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                        @else
                        <li class="px-2 bg-pagination-white"><a href="{{ $gift->url($i) }}">{{ $i }}</a>
                        </li>
                        @endif
                        @endif
                        @endforeach


                        {{-- three dots between number near last pages --}}
                        @if ( $gift->currentPage() < $gift->lastPage() - 4)
                            <li class="align-self-center  px-2 bg-pagination-white">
                                <span>...</span>
                            </li>
                            @endif
                            {{-- three dots between number near last pages --}}


                            {{-- Show Last Page --}}
                            @if($gift->hasMorePages() == $gift->lastPage() &&
                            $gift->lastPage() > 5)
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $gift->url($gift->lastPage()) }}"><span>{{ $gift->lastPage() }}</span>
                                </a>
                            </li>
                            @endif
                            {{-- Show Last Page --}}



                            @if ($gift->hasMorePages())
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $gift->nextPageUrl() }}" rel="next">
                                    <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="align-self-center px-2 bg-pagination-white">
                                <a href="{{ $gift->url($gift->lastPage()) }}" rel="next">
                                    <i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i>
                                </a>
                            </li>

                            @else
                            <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                <span><i class="fa fa-angle-right text-secondary" aria-hidden="true"></i></span></li>
                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i></a></li>

                            @endif
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


@endsection