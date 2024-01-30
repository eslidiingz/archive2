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
        .btn-main {
        background-color: #346751;
        color: #fff;
        }
        .btn:hover {
        color: #fff;
        background-color: #346751;
        text-decoration: none;
        }

    </style>
@endsection
@section('content')


    <div class="container-fluid py-lg-4 py-md-4 py-3 banner_product_n" id="navCategoryTitle">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-dark"><strong>{{ $newsCategory->name }}</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-lg-block d-md-none d-none">
            <div class="col-12 p-0 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: unset;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color: #346751;">หน้าแรก</a></li>
                        <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{ url('/blogs') }}" style="color: #346751;">ข่าวสาร</a></li>
                        <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                        <li class="breadcrumb-item active" aria-current="page">{{ $newsCategory->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container pb-lg-3 py-md-3 py-3">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @foreach ($news as $key => $value)
                                @if ($newsCategory->id == $value->news_category_id)
                                <div class="col-12 col-md-12 col-lg-12 pb-3">
                                    <div class="card w-100 list-product rounded8px position-relative"
                                        style="border: unset; cursor: pointer;">
                                        <div class="row no-gutters">
                                            <div class="col-12 col-xl-4 col-lg-6 col-md-6">
                                                <div class="card w-100 list-product rounded8px position-relative"
                                                style="border: unset; cursor: pointer;">
                                                <img src="{{ asset($value->images) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_banner_medix.png'"
                                                    class="img-fluid lazy entered error"
                                                    style="object-fit: cover;border-radius: 8px;height:240px;" alt="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-8 col-lg-6 col-md-6">
                                                <div class="card-body">
                                                    <h5 class="card-title text-dot1">{{$value->title}}</h5>
                                                    <span class="badge badge-success rounded8px px-2"
                                                        style="color: white;">{{$newsCategory->name}}</span>
                                                    <p class="card-text text-dot2-custom">{{ strip_tags( $value->detail ) }}</p>
                                                    <p class="card-text"><small class="text-muted">{{$value->updated_at}}</small></p>
                                                    <a href="/blogs/detail/{{$value->id}}" class="btn btn-main">อ่านเพิ่มเติม</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            <div>
                                {{ $news->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
