@extends('new_ui.layouts.front-end')
@section('style')
@php
@endphp
<style>
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

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        border: 3px solid #c75ba1;
        color: #c75ba1;
        border-radius: 0 0 0 0;
        background-color: #fff;
    }

    .nav-tabs .nav-link:hover {

        border: 3px solid #c75ba1;
        color: #c75ba1;
        border-radius: 0 0 0 0;
    }

    .nav-tabs .nav-link {
        border-bottom: unset;
        border: 3px solid #efefef;
        background-color: #fff;
    }

    .nav-tabs {
        border-bottom: unset;
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
</style>
@endsection
@section('content')
<div class="container">
    <div class="row m-0 rounded8px pb-4 mt-lg-0 mt-md-4 mt-4">
        <div class="col-12 mt-lg-4 mt-md-3 mt-3 ">
            <h3 class="mb-0"><strong>ร้านค้าอื่นๆ</strong></h3>
        </div>
        <div class="col-12">
            <hr class="w-100 mt-md-2 mt-lg-3">
        </div>
        @foreach ($shop_search as $value)
        <div class='text-right'>
         </div>
         <div class="col-12 px-4 mb-3 " style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
             <div class="row pt-4 mb-lg-2 mb-md-4 mb-4">
                 <div class="col-lg-4 col-md-8 col-8 mb-4  order-md-1 order-lg-1">
                     <div class="media">
                         <div class="d-flex align-items-center justify-content-center"
                             style="width: 110px; height: 80px;">
                             <img class="align-self-start mr-3"
                                 style="max-height: 100%; max-width: 100%; border: 1px solid #caced1;"
                                 src="{{asset('img/shop_profiles/'.$value->shop_pic) }}" alt="">
                         </div>
                         <div class="media-body">
                             <p class="mb-0">จัดจำหน่ายโดย</p>
                             <h5 class="mt-0"><strong>{{$value->shop_name }}</strong></h5>
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
                                 href="/shop-user-details?id={{$value->id}}"><img
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
         </div>
        @endforeach

        {{-- Pagination --}}
        {{-- <div class="d-flex justify-content-center text-right">
            {{  $shop_search->links() }}
        </div> --}}


        <div class="d-flex justify-content-end col-12">


            @if ($shop_search->hasPages())
            <ul class="pagination">
                {{-- Previous Page Link --}}

                @if ($shop_search->onFirstPage())
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
                @else <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $shop_search->url(1) }}" rel="prev">
                        <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                   </a>
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $shop_search->previousPageUrl() }}" rel="prev">
                        <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                    </a>
                </li> @endif

                {{-- show button first page --}}
                @if ( $shop_search->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $shop_search->url(1) }}"><span>1</span></a>
                </li>
                @endif
                {{-- show button first page --}}


                {{-- condition stay in first page not show button --}}
                {{-- @if ( $shop_search->currentPage() == 1 )
                                <li class="align-self-center mr-1">
                                    <a class="d-none page-link" tabindex="-2">1</a>
                                </li>
                                @endif --}}


                @if ( $shop_search->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <span>...</span>
                </li>
                @endif



                @foreach(range(1, $shop_search->lastPage()) as $i)
                @if($i >= $shop_search->currentPage() - 2 && $i <= $shop_search->currentPage() + 2)

                    @if ($i == $shop_search->currentPage())
                    <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                    @else
                    <li class="px-2 bg-pagination-white"><a
                            href="{{ $shop_search->url($i) }}">{{ $i }}</a></li>
                    @endif
                    @endif
                    @endforeach


                    {{-- three dots between number near last pages --}}
                    @if ( $shop_search->currentPage() < $shop_search->lastPage() - 4)
                        <li class="align-self-center  px-2 bg-pagination-white">
                            <span>...</span>
                        </li>
                        @endif
                        {{-- three dots between number near last pages --}}


                        {{-- Show Last Page --}}
                        @if($shop_search->hasMorePages() == $shop_search->lastPage() && $shop_search->lastPage() > 5)
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a
                                href="{{ $shop_search->url($shop_search->lastPage()) }}"><span>{{ $shop_search->lastPage() }}</span>
                            </a>
                        </li>
                        @endif
                        {{-- Show Last Page --}}



                        @if ($shop_search->hasMorePages())
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $shop_search->nextPageUrl() }}" rel="next">
                               <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $shop_search->url($shop_search->lastPage()) }}" rel="next">
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
    </div>
    @endsection
    @section('script')

    @endsection