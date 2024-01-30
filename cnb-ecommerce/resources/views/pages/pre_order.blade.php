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

</style>
@endsection
@section('content')
<div class="container-fluid py-lg-4 py-md-4 py-3" style="background-color: #f8eaf3;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-2">
                <h3 class="mb-0"><img src="img/pre_order.svg" class="pr-2" style="width: 35px;"
                        alt=""><strong>Pre-Order</strong></h3>
            </div>
            <div class="col-12">
                <h6 class="mb-0 font_head_item">ของพรีออเดอร์ จะจัดส่งตามระยะเวลาที่กำหนด <br> สั่งก่อนของจะหมดนะ</h6>
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
                    <li class="breadcrumb-item active" aria-current="page">Pre Order</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row mt-lg-0 mt-md-4 mt-4">
                @foreach ($pre_order as $key_pre => $pre)
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="product-detail-preorder/{{$pre->id}}">
                        <div class="rounded8px px-2 "
                            style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                            <div class="d-flex align-items-center justify-content-center h-200px pt-2 position-relative"
                                style="overflow:hidden;">


                                @foreach ($pre->product_img as $item)
                                    <img src="{{ asset('img/product/'. $item) }}" class="rounded8px "
                                    style="max-height: 100%;max-width: 100%;">
                                @endforeach


                                <div class="position-absolute pl-2 pr-4 py-1"
                                    style="clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0 100%, 0% 50%, 0 0); bottom: 15px; left: 0; background-color: #23c197;">
                                    <h6 class="mb-0" style="font-size: 14px;"><strong style="color: #fff;">รอบวันที่</strong></h6>
                                </div>

                            </div>
                            <h6 class="card-title mb-0 text-left text-dots pt-2 font_head_item" data-toggle="tooltip" data-placement="top" title="{{ $pre->name }}" style="font-size: 14px !important;">
                            <strong>{{ $pre->name }}</strong>
                            </h6>



                            @php
                            $month = [
                            '01' => 'ม.ค.', '02' => 'ก.พ.', '03' => 'มี.ค.', '04' => 'เม.ย.', '05' => 'พ.ค.',
                            '06' => 'มิ.ย.', '07' => 'ก.ค.', '08' => 'ส.ค.', '09' => 'ก.ย.', '10' => 'ต.ค.',
                            '11' => 'พ.ย.', '12' => 'ธ.ค.'
                            ];

                            $day_start = explode("-",$datetime_range[$key_pre]['start_date']);
                            $start = explode(" ",$day_start[2]);

                            $day_end = explode("-",$datetime_range[$key_pre]['end_date']);
                            $end = explode(" ",$day_end[2]);


                            $month_start = $month[$day_start[1]];
                            $month_end = $month[$day_end[1]];

                            $formal_date_preOrder = $start[0]." ".$month_start." - ".$end[0]." ".$month_end;

                            @endphp


                            <div class="col-12 px-0 d-flex justify-content-start py-1">
                                <button class="btn py-0 px-1"
                                    style="border: 1px solid #23c197; font-size: 10px; color: #23c197;"><strong>พรีออเดอร์
                                        : @if ($datetime_range[$key_pre])
                                        {{$formal_date_preOrder}}

                                        @endif
                                    </strong></button>
                            </div>
                            <h2 class="card-text mb-0 text-left font_price" style="color: #c75ba1; font-size: 18px !important;">
                                <strong>฿
                                {{ number_format($pre->preOrder_option[0]['datetime_range'][0]['price'][0]) }}
                            </strong>
                            </h2>
                            <h6 class="text-left mb-3 pb-1 d-flex align-items-start" style="height:25px !important;">
                                <div class="rating">
                                    <div class="rating-lower">
                                        <span style="font-size: 14px;">★★★★★</span>
                                    </div>
                                </div>
                            </h6>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


@endsection
