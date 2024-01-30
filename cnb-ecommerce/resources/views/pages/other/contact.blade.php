@extends('new_ui.layouts.front-end')
@section('style')
    <base href="/">
    <style>
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
                    <h1 class="text-dark"><strong>ติดต่อเรา</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-lg-block d-md-none d-none">
            <div class="col-12 p-0 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: unset;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="color-sky">หน้าแรก</a></li>
                        <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                        <li class="breadcrumb-item active" aria-current="page">ติดต่อเรา</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="form-row mt-4">
            <div class="col-12 mb-3">
                <p style="font-size: 22px !important;">
                ติดต่อเรา
                </p>
                <p style="font-size: 18px !important;">
                <b>Address</b>: เลขที่ 75/6 อาคารกรมส่งเสริมอุตสาหกรรม ชั้น 6 แขวงทุ่งพญาไท เขตราชเทวี กทม. 10400
                </p>
                <p style="font-size: 18px !important;">
                <b>เลขประจำตัวผู้เสียภาษี</b>: 099-3-00038224-2
                </p>
                <p style="font-size: 18px !important;">
                <b>Website</b>: https://atedmall.com
                </p>
                <p style="font-size: 18px !important;">
                <b>Email</b>: support@atedmarket.com
                </p>
            </div>
        </div>
        <br>
    </div>
@endsection
