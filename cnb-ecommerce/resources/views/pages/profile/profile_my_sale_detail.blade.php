@extends('layouts.profile')
@section('style')
    <style>
        .nav_custom_cat {
            display: none !important;
        }

        .o-btn {
            border-radius: 6px;
            background-color: #ffffff;
            padding: 10px;
            color: #7BCFDD;
            border: 1px;
            width: 100px;
            width: 100%;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
            border-style: solid;
            border-color: #7BCFDD;
        }

        .o-btn-purple {
            border-radius: 6px;
            background-color: #7BCFDD;
            padding: 10px;
            color: #ffffff;
            border: 1px;
            width: 100px;
            width: 100%;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
            border-style: solid;
            border-color: #7BCFDD;
        }

        .title_posit {
            text-align: right;
        }

        @media (min-width: 768px) {
            .title_posit {
                text-align: left;
            }

            .bd-r {
                border-right: 1px #666666 solid
            }
        }

        .nav-link.active {
            color: white !important;
            background-color: #3B7369 !important;
        }

        .ticket_left {
            background-color: #f8eaf3;
            border-radius: 6px;
        }

        .ticket_right {
            background-color: #42294f;
            border-radius: 6px;
            color: white;
        }

        .nav-tabs {
            border-bottom: 5px solid #3B7369 !important;
        }

        .nav-tabs .nav-link {
            border-bottom: 1px solid #3B7369 !important;
        }

        .table-bordered td,
        .table-bordered th {
            border: none;
        }

        .table-bordered {
            border: none;
        }

        table tr {
            border: none;
        }

        .footer-area {
            display: none;
        }
        .cate-all{
            display: none !important;
        }
        /* .nav-tabs .nav-link {
            background-color: #efefef;
            border: 1px #707070 solid !important;
            }*/

    </style>

@endsection
@section('content')
    <div class="container pb_custom_footer">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-3 d-xl-block d-lg-block d-md-none d-none px-0 sticky-top mr-0"
                        style="height: calc(100vh - 115px); top: 115px; z-index: 900;">
                        @include('includes._menu_left_user_profile')
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-12 mt-4 mb-0">
                        <div class="col-12 px-1 py-3">
                            <div class='row'>
                                <div class='col-12'>
                                    <h3><strong>{{ trans('message.my_order') }}</strong></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row px-3">
                            <div class="col-lg-9 col-md-12 col-12 px-0 mb-4">
                                <div class="row p-lg-4 p-md-2 p-2 py-md-4 py-4 mb-2 mx-0" style="background-color: #fff;">
                                    <div class="col-lg-4 col-md-6 col-12 d-flex flex-row align-items-center ">
                                        <img src="/new_ui/img/seller/icon-error.svg" style="width: 25px;" alt="">
                                        <h5 class="mb-0 ml-2 font_size_14px" style="color: #d61900;"><strong>


                                                {{-- normal Status --}}
                                                @if( $basket_all[0]->status == 1)
                                                {{ trans('message.sts1') }}
                                                @elseif( $basket_all[0]->status == 2)
                                                {{ trans('message.sts2') }}
                                                @elseif( $basket_all[0]->status == 3)
                                                {{ trans('message.sts3') }}
                                                @elseif( $basket_all[0]->status == 4)
                                                {{ trans('message.sts4') }}
                                                @elseif( $basket_all[0]->status == 5)
                                                {{ trans('message.sts5') }}
                                                @elseif( $basket_all[0]->status == 6)
                                                {{ trans('message.sts6') }}
                                                {{-- normal Status --}}


                                                {{-- Status type waiting --}}
                                                @elseif( $basket_all[0]->status == 12)
                                                {{ trans('message.sts12') }}
                                                @elseif( $basket_all[0]->status == 13)
                                                {{ trans('message.sts13') }}
                                                @elseif( $basket_all[0]->status == 21)
                                                {{ trans('message.sts21') }}
                                                {{-- Status type waiting --}}


                                                {{-- Status รับหน้าหน้างาน --}}
                                                @elseif( $basket_all[0]->status == 43)
                                                {{ trans('message.sts43') }}
                                                @elseif( $basket_all[0]->status == 53)
                                                {{ trans('message.sts53') }}
                                                {{-- Status รับหน้าหน้างาน --}}


                                                {{-- --}}
                                                @elseif( $basket_all[0]->status == 52)
                                                {{ trans('message.sts52') }}
                                                {{-- --}}

                                                {{-- Status Cancel --}}
                                                @elseif( $basket_all[0]->status == 99)
                                                {{ trans('message.sts99') }}
                                                {{-- Status Cancel --}}

                                                @endif
                                            </strong></h5>
                                    </div>
                                    <div
                                        class="col-lg-8 col-md-6 col-12 d-flex align-items-center justify-content-lg-end justify-content-md-start justify-content-start">
                                        <h5 class="mb-0 font_size_14px"><strong>{{ trans('message.invoice_no') }} : #
                                                {{ $basket_all[0]->inv_ref }}-{{ $basket_all[0]->inv_no }}</strong></h5>
                                    </div>
                                    <div
                                        class="col-lg-12 col-md-12 col-12 d-flex align-items-left">
                                        <h5 class="mb-0 font_size_14px" style="color: #d61900;"><strong>{{ trans('message.remark') }} : {{ $basket_all[0]->description }}</strong></h5>
                                    </div>
                                </div>
                                {{-- <div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0 d-block d-md-block d-lg-none"
                                    style="background-color: #fff;">
                                    <div class="col-12 mt-4">
                                        @include('pages.profile.user-tracking')
                                    </div>
                                </div> --}}
                                {{-- <div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0" style="background-color: #fff;">
                                        <div class="col-6 d-flex flex-row align-items-center">
                                            <h5 class="mb-0 ml-2"><strong><span style="color: #7BCFDD;">{{ trans('message.reason') }} :</span> </strong></h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-row justify-content-end">
                                                <div class="col-4">
                                                    <button class="btn btn btn-outline-danger form-control" data-toggle="modal" data-target="#CancelModal">{{ trans('message.decline') }}</button>
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn btn-outline-success form-control" data-toggle="modal" data-target="#SuccessModal">{{ trans('message.accept') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                <div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0" style="background-color: #fff;">
                                    <div class="col-12 px-1">
                                        <table class="table-bordered">
                                            <thead>
                                                <tr class="d-lg-none d-md-none d-block">
                                                    <th scope="col" class="p-4 text-left">{{ trans('message.total_product') }}</th>
                                                    <th scope="col" class="width200 text-left">{{ trans('message.total_purchase') }}</th>
                                                    <th scope="col" class="width200 text-left">{{ trans('message.status') }}</th>
                                                    <th scope="col" class="width200 text-left">{{ trans('message.status') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $total_at = 0;
                                                @endphp

                                                @foreach ($basket as $item)
                                                {{-- {{ dd($basket) }} --}}
                                                @if ($item['type'] == null)
                                                @foreach($product as $pro)
                                                @if($item['product_id'] == $pro->id)
                                                <tr>
                                                    <td scope="row">
                                                        <div class="row">
                                                            <div class="col-12 mb-4 text-left">
                                                                <div class="media" style="height: 60px;">
                                                                    <img src="{{('/img/product/'. $pro->product_img[0]) }}"
                                                                        style="max-height: 100%;width: 60px; height: 100%; object-fit: cover;"
                                                                        class="mr-3 rounded8px" alt="...">
                                                                    <div class="media-body">
                                                                        <h6 class="mt-0 text-dot1 ">
                                                                            <strong>{{ $pro->name }}</strong></h6>
                                                                        @if(isset($pro->dis1) && isset($pro->dis2))
                                                                        {{ $pro->dis1 }} , {{ $pro->dis2 }}
                                                                        @endif


                                                                        @if(isset($pro->dis1))
                                                                        {{ $pro->dis1 }}
                                                                        @endif

                                                                        @if(isset($pro->dis2))
                                                                        {{ $pro->dis1 }}
                                                                        @endif

                                                                        @if(!isset($pro->dis1) && !isset($pro->dis2))
                                                                        <span class="font_size_14px"
                                                                            style="color:grey">{{ trans('message.no_detail') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td data-label="ราคา" class="width50">
                                                        <div class="row">
                                                            <div
                                                                class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                                <h6 class="mb-0 font_size_14px"><strong>฿
                                                                        {{ number_format($item['price'], 0) }}</strong></h6>
                                                            </div>
                                                            {{-- <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                                    <h6 class="mb-0" style="color: #919191; text-decoration: line-through">฿ 1140 (-37%)</h6>
                                                                </div> --}}
                                                        </div>
                                                    </td>
                                                    <td data-label="จำนวน" class="width50">
                                                        <div class="row">
                                                            <div
                                                                class="col-12 mb-2 text-lg-center text-md-right text-sm-right px-0">
                                                                <h6 class="mb-0 font_size_14px"><strong>x
                                                                        {{ $item['amount'] }}</strong></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-label="ราคาทั้งหมด" class="width50">
                                                        <div class="row">
                                                            <div class="col-12 mb-2 text-right px-0">
                                                                @php
                                                                $total_at =0;
                                                                $total_at += $item['price']*$item['amount'];
                                                                @endphp
                                                                <h6 class="mb-0 font_size_14px"><strong>฿
                                                                        {{ number_format($total_at, 0) }}</strong></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif

                                                @if ($item['type'] == 'flashsale')
                                                @foreach($product_flash as $pro)
                                                @if($item['product_id'] == $pro->id)
                                                <tr>
                                                    <td scope="row">
                                                        <div class="row">
                                                            <div class="col-12 mb-4 text-left">
                                                                <div class="media" style="height: 60px;">
                                                                    <img src="{{('/img/product/'. $pro->product_img[0]) }}"
                                                                        style="max-height: 100%;width: 60px; height: 100%; object-fit: cover;"
                                                                        class="mr-3 rounded8px" alt="...">
                                                                    <div class="media-body">
                                                                        <h6 class="mt-0 text-dot1 font_size_14px">
                                                                            <strong>{{ $pro->name }}</strong></h6>
                                                                        @if(isset($pro->dis1) && isset($pro->dis2))
                                                                        {{ $pro->dis1 }} , {{ $pro->dis2 }}
                                                                        @endif


                                                                        @if(isset($pro->dis1))
                                                                        {{ $pro->dis1 }}
                                                                        @endif

                                                                        @if(isset($pro->dis2))
                                                                        {{ $pro->dis1 }}
                                                                        @endif

                                                                        @if(!isset($pro->dis1) && !isset($pro->dis2))
                                                                        <span class="font_size_14px"
                                                                            style="color:grey">{{ trans('message.no_detail') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td data-label="ราคา" class="width50">
                                                        <div class="row">
                                                            <div
                                                                class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                                <h6 class="mb-0 font_size_14px"><strong>฿
                                                                        {{ number_format($item['price'], 0) }}</strong></h6>
                                                            </div>
                                                            {{-- <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                                    <h6 class="mb-0" style="color: #919191; text-decoration: line-through">฿ {{ $item['discount'] }}
                                                            </h6>
                                                        </div> --}}
                                    </div>
                                    </td>
                                    <td data-label="จำนวน" class="width50">
                                        <div class="row">
                                            <div class="col-12 mb-2 text-lg-center text-md-right text-sm-right px-0">
                                                <h6 class="mb-0 font_size_14px"><strong>x {{ $item['amount'] }}</strong>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="ราคาทั้งหมด" class="width50">
                                        <div class="row">
                                            <div class="col-12 mb-2 text-right px-0">
                                                @php
                                                $total_at = 0;
                                                $total_at += $item['price']*$item['amount'];
                                                @endphp
                                                <h6 class="mb-0 font_size_14px"><strong>฿
                                                        {{ number_format($total_at, 0) }}</strong></h6>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif

                                    @endforeach
                                    {{-- <tr>
                                                        <td scope="row" >
                                                            <div class="row">
                                                                <div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
                                                                    <div class="media" style="height: 60px;">
                                                                        <img src="new_ui/img/product/product-11.png" style="max-height: 100%;width: 60px; height: 100%; object-fit: cover;" class="mr-3 rounded8px" alt="...">
                                                                        <div class="media-body">
                                                                            <h6 class="mt-0 text-dot1"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
                                                                            สีน้ำตาล,S
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </td>
                                                        <td data-label="ราคา">
                                                            <div class="row">
                                                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                                    <h6 class="mb-0"><strong style="#7BCFDD;">฿ 350</strong></h6>
                                                                </div>
                                                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                                    <h6 class="mb-0" style="color: #919191; text-decoration: line-through">฿ 1140 (-37%)</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-label="จำนวน">
                                                            <div class="row">
                                                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                                    <h6 class="mb-0"><strong>x2</strong></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-label="ราคาทั้งหมด">
                                                            <div class="row">
                                                                <div class="col-12 mb-2 text-right px-0">
                                                                    <h6 class="mb-0"><strong>฿ 700</strong></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr> --}}
                                    </tbody>
                                    </table>
                                </div>
                                <div class="col-12 px-0">
                                    <hr class="w-100">
                                </div>
                                <div class="col-lg-12 col-md-6 col-6 text-left d-lg-none d-md-block d-block pr-0">
                                    <h5 class="mb-0 mr-2"><strong style="color: #7BCFDD;">{{ trans('message.total_price') }}</strong></h5>
                                </div>
                                <div class="col-lg-12 col-md-6 col-6 text-right pl-0 px-lg-0 px-md-3 px-3">
                                    <h5 class="mb-0"><strong class="color-price" >฿
                                            {{ number_format($basket_all[0]->total,0) }}</strong></h5>
                                </div>
                            </div>




                            {{-- Chat With Seller --}}
                            {{-- <div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0 py-md-4 py-4" style="background-color: #fff;">
                                        <div class="col-lg-6 col-md-6 col-12 d-flex flex-row align-items-center">
                                            <img src="/img/profile/user.svg" style="width: 70px; height:70px;border-radius:50%" alt="">
                                            <h6 class="ml-4"><strong>{{ $emailUser->email }}</strong></h6>
                        </div>
                        <div
                            class="ml-auto col-lg-3 col-md-3 col-12 d-flex align-items-center justify-content-end mt-lg-0 mt-md-0 mt-2">
                            <button class="btn btn-outline-c45e9f form-control"><img
                                    src="new_ui/img/seller/icon-comment.svg"
                                    style="filter: invert(52%) sepia(52%) saturate(711%) hue-rotate(276deg) brightness(84%) contrast(83%);"
                                    width="24px;" alt=""> {{ trans('message.chat_now') }}</button>
                        </div>
                    </div> --}}
                    {{-- --}}


                    <div class="row p-lg-4 p-md-2 py-4 px-2 mb-2 mx-0 py-md-4 py-4" style="background-color: #fff;">
                        <div class="col-lg-4 col-md-4 col-12 d-flex flex-row align-items-center ">
                            <h5><strong class="color-sky">{{ trans('message.track_no') }}</strong></h5>
                        </div>



                        @if(!isset($track->tracking_number))

                            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-end">
                                <div class="input-group">
                                    <span class="w-100 text-lg-center text-md-right text-center" name="check_tracking">
                                        @if($basket_all[0]->status == 1)
                                            <b>{{ trans('message.sts1') }}</b>
                                        @else
                                            <b>{{ trans('message.shop_in_process') }}</b>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        @else

                            <div class="col-lg-4 col-md-4 col-12 d-flex align-items-center">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control tracking_number" readonly
                                                value="{{ $track->tracking_number }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text btn btn-outline-c45e9f" style="cursor: pointer"
                                                    @if(isset($checkLogis))
                                                        @if($checkLogis->shipping_api == 'ems')
                                                            id="ems" data-target="#trackEMS"  data-toggle="modal"
                                                        @elseif($checkLogis->shipping_api == "bestexpress")
                                                            id="bestexpress"
                                                        @elseif($checkLogis->shipping_api == "speed_d")
                                                            id="speed_d"
                                                        @elseif($checkLogis->shipping_api == "self")
                                                            id="self"
                                                        @else
                                                            id="ems"
                                                        @endif
                                                    @endif

                                                    ><i class="fa fa-truck" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 d-flex align-items-center justify-content-end">
                                <div class="input-group">
                                    <h6><strong class="color-sky">
                                        {{ trans('message.ship_by') }} {{ $checkLogis->shipty_name }}
                                    </strong></h6>
                                </div>
                            </div>

                        @endif


                        <!-- <div class="col-lg-4 col-md-4 col-12 d-flex align-items-center justify-content-end mt-0 mt-md-0 mt-lg-0">
                            <button class="btn btn-outline-c45e9f  form-control mt-lg-0 mt-md-0 mt-2" data-toggle="modal"
                                data-target="#CancelSuccessModal-1">ยกเลิกคำสั่งซื้อ</button>
                        </div> -->
                    </div>



                    {{-- {{ dd($address) }} --}}
                    <div class="row p-lg-4 p-md-2 py-4 px-2 mb-2 mb-2 mx-0 py-md-4 py-4" style="background-color: #fff;">
                        <div class="col-12 mb-2">
                            <h5><strong class="color-sky">{{ trans('message.ship_address') }}</strong></h5>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="row ">
                                <div class="col-12">
                                    <h6><strong>{{ trans('message.name') }} - {{ trans('message.surname') }}</strong> {{ @$address[0]['name'] }}</h6>
                                </div>
                                <div class="col-12">
                                    <h6><strong>{{ trans('message.tel') }}</strong> (+66) {{ @$address[0]['tel'] }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h6><strong>{{ trans('message.my_address') }}</strong> {{ @$address[0]['address'] }}</h6>
                                </div>
                                {{-- <div class="col-12">
                                                <h6><strong style="color: #7BCFDD;">({{ trans('message.main_address') }})</strong></h6>
                                            </div> --}}
                            </div>
                        </div>
                        {{-- <div class="col-12 my-2">
                                        <hr class="w-100">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mb-2">
                                        <h5><strong style="color: #7BCFDD;">{{ trans('message.payment_method') }}</strong></h5>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mb-2">
                                        <div class="row ">
                                            <div class="col-12 d-md-flex d-lg-flex justify-content-end">
                                                <h6><strong>{{ trans('message.credit_card') }}</strong></h6>
                                            </div>
                                            <div class="col-12 d-md-flex d-lg-flex align-items-center justify-content-end">
                                                <div class="d-flex flex-row">
                                                    <img src="new_ui/img/seller/visa.png" style="width: 60px;" class="mr-2" alt="">
                                                    <h6><strong>ธนาคารกสิกรไทย * 6702</strong></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                        <div class="col-12 my-2">
                            <hr class="w-100">
                        </div>
                        <div class="col-12">
                            <div class="row justify-content-end">
                                <div class="col-xl-5 col-lg-7 col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-6 text-md-right text-lg-right text-left pr-0">
                                            <h6>{{ trans('message.total_product_price') }}</h6>
                                            <h6>{{ trans('message.product_discount') }}</h6>
                                            <h6>{{ trans('message.ship_price') }}</h6>
                                            <h6>{{ trans('message.ship_discount') }}</h6>
                                            <h6>{{ trans('message.grand_total') }}</h6>
                                        </div>

                                        @php
                                        $discount = 0;
                                        $total_all = 0;
                                        $shipping_all = 0;
                                        foreach ($basket_all as $key => $value) {
                                            $total_all += $value->total;
                                            $shipping_all += $value->shipping_cost;
                                        }
                                        @endphp

                                        <div class="col-6 text-right">
                                            <h6><strong>฿ {{ number_format($basket_all[0]->total, 0) }}</strong></h6>
                                            @if( $basket_all[0]->disc_to == 'PRODUCT' )
                                                <h6><strong style="color: red;">฿ {{ number_format($basket_all[0]->disc_amt, 2) }}</strong></h6>
                                            @else
                                                <h6><strong style="color: grey;">฿ 0</strong></h6>
                                            @endif
                                            <h6><strong>฿ {{ number_format($shipping_all, 2) }}</strong></h6>
                                            @if( $basket_all[0]->disc_to == 'SHIP' )
                                                <h6><strong style="color: red;">฿ {{ number_format($basket_all[0]->disc_amt, 2) }}</strong></h6>
                                            @else
                                                <h6><strong style="color: grey;">฿ 0</strong></h6>
                                            @endif
                                            <h5><strong class="color-price">฿ {{ number_format($total_all+$shipping_all - $basket_all[0]->disc_amt, 2) }}</strong></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-3  d-lg-block d-md-none d-none sticky-top"
                    style="height: calc(100vh - 131px); top: 95px; z-index: 900;">
                    <div class="row p-lg-4 p-md-2 p-2">
                        <div class="col-12 mb-4">
                            <h5><strong>{{ trans('message.buy_history') }}</strong></h5>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            @include('pages.profile.user-tracking')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- Modal EMS --}}
    <div class="modal fade" id="trackEMS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.status') }} EMS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-6 col-12 ">
                                <div class="row">
                                    <div class="col-3 text-md-right text-lg-right text-right pr-0">
                                        <h5><strong>{{ trans('message.status') }} : </strong></h5>
                                        <h5><strong>{{ trans('message.address_province_ex') }} : </strong></h5>
                                        <h5><strong>{{ trans('message.datetime') }} : </strong></h5>
                                    </div>

                                    <div class="col-9 text-left ">
                                        <h5 id="status_ems"></h5>
                                        <h5 id="city_ems"></h5>
                                        <h5 id="time_ems"></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    {{-- Ajax for EMS --}}
    <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script>
        $('#ems').on('click', function () {
            var tracking_number = $('input.tracking_number').val();

            var token = "Token eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJzZWN1cmUtYXBpIiwiYXVkIjoic2VjdXJlLWFwcCIsInN1YiI6IkF1dGhvcml6YXRpb24iLCJleHAiOjE2MTAxODQ1MzksInJvbCI6WyJST0xFX1VTRVIiXSwiZCpzaWciOnsicCI6InpXNzB4IiwicyI6bnVsbCwidSI6ImI5ZjhkYzBjZTgyNWM2MTI2ODExMTE1ZDhkMjViODgxIiwiZiI6InhzeiM5In19.J-JOma1KAK3OzaczPnfEMwX4dc5v7ojjIhKbnG1mHBlabTcVsRt56v0FHVQdIpnVJY94YJh3zOU4ciILwJWGGg";
            var ems = {
                "url": "https://trackapi.thailandpost.co.th/post/api/v1/track",
                "method": "POST",
                "timeout": 0,
                "headers": {"Content-Type":"application/json","Authorization": "Token eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJzZWN1cmUtYXBpIiwiYXVkIjoic2VjdXJlLWFwcCIsInN1YiI6IkF1dGhvcml6YXRpb24iLCJleHAiOjE2MTAxODQ1MzksInJvbCI6WyJST0xFX1VTRVIiXSwiZCpzaWciOnsicCI6InpXNzB4IiwicyI6bnVsbCwidSI6ImI5ZjhkYzBjZTgyNWM2MTI2ODExMTE1ZDhkMjViODgxIiwiZiI6InhzeiM5In19.J-JOma1KAK3OzaczPnfEMwX4dc5v7ojjIhKbnG1mHBlabTcVsRt56v0FHVQdIpnVJY94YJh3zOU4ciILwJWGGg"},
                "data": JSON.stringify("barcode": [tracking_number],"language": "TH","status": "all"),
            };

            $.ajax(ems).done(function (respone) {
                var tracking_number = $('input.tracking_number').val();

                var data = respone.response.items[tracking_number].pop();

                $('#status_ems').text(data.status_description);
                $('#city_ems').text(data.location);

                var times = getDateFormat(data.delivery_datetime);
                console.log(times);
                $('#time_ems').text(times);

            });

            
        });
        function getDateFormat(data) {
            var data = data.split('+')[0].split(' ');
            var date = data[0].split('/');
            var time = data[1];
            // console.log(date);
            // console.log(time);
            newFormat = date[2] + "-" + date[1] + "-" + date[0] + " " + time;
            // console.log(newFormat);
            var time = new Date(newFormat);
            // console.log(time);
            h = time.getHours(); // 0-24 format
            m = (time.getMinutes() < 10 ? '0' : '') + time.getMinutes();
            y = time.getFullYear();
            mm = time.getMonth();
            d = time.getDate();
            var month = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
            return d + ' ' + month[mm] + ' ' + y + '  ' + h + ':' + m + ' น.';
        }

        // Bestexpress
        $('#bestexpress').on('click', function () {
            var tracking_number = $('input.tracking_number').val();
            var bestexpress = {
                "url": "https://api.best-inc.co.th/express/expresslistinfo?expressids=" + tracking_number + "",
                "method": "POST",
                "timeout": 0,
            };

            $.ajax(bestexpress).done(function (response) {
                console.log(response);
                window.open("https://www.best-inc.co.th/track?bills=" + tracking_number + "", '_blank');
            });
        });
        // Bestexpress



        //Speed D
        $('#speed_d').on('click', function () {

            var tracking_number = $('input.tracking_number').val();
            var speed_d = {
                "url": "https://api.sendit.asia/oms/api/v2/public/status-tracking/" + tracking_number + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(speed_d).done(function (response) {
                console.log(response);
                window.open("https://speed-d.allnowgroup.com/status-tracking/" + tracking_number + "", '_blank');
            });
        })
        //Speed D
    </script>
@endsection


