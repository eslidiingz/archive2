@extends('layouts.shop')
@section('content')
<div class="row">
    <div class="col-6 px-4 pt-4 pb-2">
        <h3><strong>My Product</strong></h3>
    </div>
    <!-- <div class="col-6  pt-4 pb-2 pl-0 pr-4 text-right">
        <a href="{{ url('shop/myproduct/new') }}" class="btn btn-main-set"><i class="fa fa-plus" aria-hidden="true"></i>
            เพิ่มสินค้าใหม่</a>
    </div> -->
    <div class="col-12 px-4">
        <div class="d-lg-block d-md-block d-none">
            <ul class="nav nav-tabss" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    @if(count($products_all) > 0)
                    <a class="nav-link nav-links active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                        aria-controls="list-1" aria-selected="true">All ({{count($products_all)}})
                    </a>
                    @else
                    <a class="nav-link nav-links active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                        aria-controls="list-1" aria-selected="true">All (0)
                    </a>
                    @endif
                </li>
                <li class="nav-item" role="presentation">
                    @if(count($products) > 0)
                    <a class="nav-link nav-links" id="list-5-tab" data-toggle="tab" href="#list-5" role="tab"
                        aria-controls="list-4" aria-selected="true">Normal Product ({{count($products)}})
                    </a>
                    @else
                    <a class="nav-link nav-links" id="list-5-tab" data-toggle="tab" href="#list-5" role="tab"
                        aria-controls="list-4" aria-selected="true">Normal Product (0)
                    </a>
                    @endif
                </li>
                <li class="nav-item" role="presentation">
                    @if(count($products) > 0)
                    <a class="nav-link nav-links" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab"
                        aria-controls="list-2" aria-selected="false">Sell
                        ({{count($products->where('status_goods','1'))}})
                    </a>
                    @else
                    <a class="nav-link nav-links" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab"
                        aria-controls="list-2" aria-selected="false">Sell (0)
                    </a>
                    @endif
                </li>

                <li class="nav-item" role="presentation">
                    @if(count($products) > 0)
                    <a class="nav-link nav-links" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab"
                        aria-controls="list-3" aria-selected="false">Hidden
                        ({{count($products->whereIn('status_goods',['2']))}})</a>
                    @else
                    <a class="nav-link nav-links" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab"
                        aria-controls="list-3" aria-selected="false">Hidden (0)</a>
                    @endif
                </li>
                <li class="nav-item" role="presentation">
                    @if(count($products) > 0)
                    <a class="nav-link nav-links" id="list-6-tab" data-toggle="tab" href="#list-6" role="tab"
                        aria-controls="list-6" aria-selected="false">Ban
                        ({{count($products->whereIn('status_goods',['99']))}})</a>
                    @else
                    <a class="nav-link nav-links" id="list-6-tab" data-toggle="tab" href="#list-6" role="tab"
                        aria-controls="list-6" aria-selected="false">Ban (0)</a>
                    @endif
                </li>
            </ul>
        </div>
        <div class="form-group d-lg-none d-md-none d-block">

            <select class="form-control" id="select-submenu">
                @if(count($products) > 0)
                <option value="1">All ({{count($products_all)}})</option>
                <option value="5">Normal Product ({{count($products)}})</option>
                <option value="2">Sell ({{count($products->where('status_goods','1'))}})</option>
                <option value="3">Hidden ({{count($products->where('status_goods','2'))}})</option>
                @else
                <option value="1">All (0)</option>
                <option value="4">Flash Sales (0)</option>
                <option value="5">Normal Product (0)</option>
                <option value="2">Sell (0)</option>
                <option value="3">Hidden (0)</option>
                @endif
            </select>
        </div>
        <div class="tab-content" id="myTabContent">
            @if(count($products) > 0)
            @include('shop.mylist-seller.my-product-search')
            @endif
            <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
                {{-- @if(count($products) > 0)
                @include('shop.mylist-seller.my-product-search')
                @endif --}}
                @include('shop.mylist-seller.my-product-all')
            </div>
            <div class="tab-pane fade show" id="list-5" role="tabpanel" aria-labelledby="list-5-tab">
                {{-- @if(count($products) > 0)
                @include('shop.mylist-seller.my-product-search')
                @endif --}}
                @include('shop.mylist-seller.my-product-only')
            </div>
            <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
                {{-- @if(count($products) > 0)
                @include('shop.mylist-seller.my-product-search')
                @endif --}}
                @include('shop.mylist-seller.my-product-sell')

            </div>
            <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-tab">
                {{-- @if(count($products) > 0)
                @include('shop.mylist-seller.my-product-search')
                @endif --}}
                @include('shop.mylist-seller.my-product-notshow')
            </div>
            <div class="tab-pane fade" id="list-6" role="tabpanel" aria-labelledby="list-6-tab">
                {{-- @if(count($products) > 0)
                @include('shop.mylist-seller.my-product-search')
                @endif --}}
                @include('shop.mylist-seller.my-product-ban')
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#select-submenu').on('change', function() {
		value = $(this).val();
		$('a.nav-link[href="#list-' + value + '"]').click();
	});
</script>
@endsection

@section('style')
<style>
    .swiper-container {
        width: 100%;
        height: 300px;
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

    .gallery-top {
        height: 80%;
        width: 100%;
    }

    .gallery-thumbs {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .gallery-thumbs .swiper-slide {
        height: 100%;
        opacity: 0.4;
    }

    .gallery-thumbs .swiper-slide-thumb-active {
        opacity: 1;
    }

    .table-bordered {
        border: unset !important;
    }
    .custom-control-input:checked~.custom-control-label::before{
        color: #fff;
        border-color: #dc4e41 !important;
        background-color: #dc4e41 !important;
    }
</style>
@endsection