@extends('layouts.default')
@section('style')

<style>
    div.w-100 form{
        margin-bottom: 0px !important;
    }
    .footer-area {
        display: none !important;
    }

    /*.nav_custom_cat {
        display: none !important;
    }*/

    .lahead {
        color: #346751
    }

    .textcolorr {
        color: #346751;
        font-size: 18px
    }

    .fontsize {
        font-size: 16px
    }

    .btn-outline-purplish-pink {
        color: #346751;
        border-color: #346751;
    }

    /* .btn-outline-purplish-pink:hover{
    background-color: #346751;
    } */
    .btn-outline-purplish-pink:active {
        background-color: #346751;
    }

    .btn-outline-purplish-pink:visited {
        background-color: #346751;
    }

    .navbt {
        margin-top: 200px;
    }

    .btp {
        color: #1e1e1e;
        background-color: #b1b7bc;
        border-color: #b1b7bc;
    }

    .btnsum {
        color: #fff;
        background-color: #7BCFDD;
        border-color: #7BCFDD;
    }

    .navtest {
        background-color: #ffffff;
        height: 155px !important;
        z-index: 3 !important;
    }

    @media (min-width: 320px) {
        .footer-area {
            display: none;
        }

        .mb-180-custom {
            margin-bottom: 180px;
        }
    }


    @media (min-width: 350px) {
        .footer-area {
            display: none;
        }

        .mb-180-custom {
            margin-bottom: 180px;
        }
    }


    @media (min-width: 576px) {
        .footer-area {
            display: none;
        }

        .mb-180-custom {
            margin-bottom: 180px;
        }
    }


    @media (min-width: 768px) {
        .footer-area {
            display: none;
        }

        .mb-180-custom {
            margin-bottom: 80px;
        }
    }


    @media (min-width: 992px) {
        .footer-area {
            display: block;
        }

        .mb-180-custom {
            margin-bottom: 130px;
        }
    }


    @media (min-width: 1200px) {
        .footer-area {
            display: block;
        }

        .mb-180-custom {
            margin-bottom: 130px;
        }
    }

    form#form_basket {
        /* transition: 2s; */
        overflow: hidden;
    }

</style>


@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-10 col-lg-12 col-md-12 col-12 mx-auto" style="height: calc(80vh - 20px);">
            <div class="row d-xl-none d-lg-block d-md-block">
                <div class="col-lg-3 col-md-3 col-12 ml-auto mt-2">
                    <!-- <button class="btn btn-main form-control rounded8px" data-toggle="modal" data-target="#listItem">รายการที่ต้องชำระ</button> -->
                    <!-- Modal -->
                    <div class="modal fade" id="listItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body pt-0">
                            @include('component.basket-list')
                          </div>
                          <div class="modal-footer d-none">

                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            @if($product_all_id == null)

            <div class="no_basket my-0" >
                <div class="col-12 d-flex justify-content-center">
                    <img src="/img/noproduct.png" class="w-custom-noproduct" alt="">
                </div>
                <div class="col-12 d-flex justify-content-center my-0">
                    <h5 class="mb-0" style="color: grey;">{{ trans('message.empty_basket') }}</h5>
                </div>
                <div class="col-12 my-4">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 mx-auto">
                            <a href="/" class="form-control btn btn-c75ba1 rounded8px">
                                <h5 class="mb-0 h-100 d-flex align-items-center justify-content-center">
                                    {{ trans('message.back_to_shopping') }}
                                    !!!</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>




            @else


            <div class="no_basket1 d-none"
                style="height:0; ">
                <div class="col-12 d-flex justify-content-center">
                    <img src="/img/noproduct.png" class="w-custom-noproduct" alt="">
                </div>
                <div class="col-12 d-flex justify-content-center my-0">
                    <h5 class="mb-0" style="color: grey;">{{ trans('message.empty_basket') }}</h5>
                </div>
                <div class="col-12 my-4">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 mx-auto">
                            <a href="/home" class="form-control btn btn-c75ba1">
                                <h5 class="mb-0 h-100 d-flex align-items-center justify-content-center">
                                    กลับไปช้อปปิ้งกันเถอะ
                                    !!!</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>





            <form action="/product-payment" id="form_basket" method="get" class="mb-180-custom" style="padding-bottom: 100px;">
                {{-- @csrf --}}
                <div class="row rounded8px px-lg-4 px-md-2 px-0 py-lg-4 py-md-2 py-3 mx-0 mt-4 d-none d-md-none d-lg-block basket_header"
                    style="background-color: #fff; ">
                    <div class="col-12">
                        <h4>
                            <strong style="color: #333;">{{ trans('message.your_basket') }}</strong>
                            @if($errors->any())
                                <strong style="color: red; float: right;">{{$errors->first()}}</strong>
                            @endif
                        </h4>
                    </div>
                    <div class="col-12">
                        <hr class="w-100">
                    </div>
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-2 d-flex flex-row align-content-center">
                                {{-- <input type="checkbox" class="mr-2 check_all" id="check_all"> --}}
                                <h6 class="mb-0"><strong>{{ trans('message.item') }}</strong></h6>
                            </div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-4">

                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <h6 class="mb-0"><strong>{{ trans('message.price_per_piece') }}</strong></h6>
                                            </div>
                                            <div class="col-4 text-center">
                                                <h6 class="mb-0"><strong>{{ trans('message.amount') }}</strong></h6>
                                            </div>
                                            <div class="col-4 text-center">
                                                <h6 class="mb-0"><strong>{{ trans('message.total_price') }}</strong></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @if($errors->any())
                <div class="row rounded8px px-lg-4 px-md-2 px-0 py-lg-4 py-md-2 py-3 mx-0 mt-3 d-lg-none d-xl-none row_shop"
                    style="background-color: #fff; ">
                    <div class="col-12">
                        <div class="row align-content-center row_goods">
                            <strong style="color: red;">{{$errors->first()}}</strong>
                        </div>
                    </div>
                </div>
                @endif
                @foreach($shop as $key=>$item)
                <div class="row rounded8px px-lg-4 px-md-2 px-0 py-lg-4 py-md-2 py-3 mx-0 mt-3 row_shop"
                    style="background-color: #fff; ">
                    <div style="display: none;" class="getShopid">
                        <input type="checkbox" class="mr-2" name="shop_id[]" value="{{ $item['shop_id'] }}">
                    </div>
                    <div class="col-12">
                        <div class="row align-content-center row_goods">
                            <div class="col-xl-8 col-lg-7 col-md-6 col-12 mb-2 d-flex flex-row align-items-center">
                                <input type="checkbox" class="mr-2 checkStore" id="check{{ $key }}">
                                <a href="/shop-user-details?id={{$item->shops[0]->id}}"><h6 class="mb-0"><strong>{{ $item->shops[0]->shop_name }}</strong></h6></a>
                            </div>

                            <div class="col-xl-1 col-lg-1 col-md-3 col-12 mb-2 d-none d-md-block d-lg-block">
                                {{-- <button class="btn btn-outline-062254 form-control"><img src="/img/Group 2750.svg"
                                class="img-fluid mt-n1 mr-1"> แชทเลย</button> --}}
                            </div>

                            <!-- <div class="col-xl-3 col-lg-4 col-md-3 col-12 mb-2 d-none d-md-block d-lg-block">
                                <a href="/shop-user-details?id={{$item->shops[0]->id}}"
                                    class="btn btn-outline-062254 form-control"><img src="/img/Group 2752.svg"
                                        class="img-fluid mt-n1 mr-1"> ไปที่ร้านค้า</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="w-100">
                    </div>

                    {{-- {{ dd($product_all_id) }} --}}
                    {{-- Part for Row show product of a row --}}
                    @foreach($product_all_id as $key1 => $item1)

                    @if( $item->shop_id == $item1['shop_id'])

                    @php
                    $product_id = $item1['product_id'];
                    $time_period = @$item1['time_period'];
                    @endphp



                    <input type="hidden" name="inv_ref" value="{{ $item1['inv_ref'] }}">
                    <input type="hidden" name="key[]" value="{{ $key1 }}">
                    <input type="hidden" name="end_date" value="{{ @$item1['end_date'] }}">

                    @php
                    //----------------------------------------------------------------------- FLASH SALE ------------------------------------------------------------------\\

                    //--------------------------------- Time Currentlly -----------------------------\\
                    $now = new DateTime();
                    $date = $now->format('Y-m-d');
                    //--------------------------------- Time Currentlly -----------------------------\\

                    if(isset($item1['type']) && $item1['type'] == "flashsale"){

                    if (isset($item1['time_period'])) {
                    $time_period = explode(',', str_replace(array('[', ']'), '', @$item1['time_period']));
                    // dd($time_period);
                    //--------------------------------- Time Period -----------------------------\\
                    $zone[0] = ["00:00", "05:59"];
                    $zone[1] = ["06:00", "11:59"];
                    $zone[2] = ["12:00", "17:59"];
                    $zone[3] = ["18:00", "23:59"];
                    $time_status = false;
                    if (@$item1['time_period'] != null) {
                    foreach($time_period as $k_time => $v_time) {
                    $time_now = date('H:i');
                    if ($time_now >= date('H:i', strtotime($zone[$v_time][0])) && $time_now <= date('H:i',
                        strtotime($zone[$v_time][1]))) { $time_status=true; } } } } @$status_check=$date>=
                        @$item1['end_date'] || !$time_status;
                        }
                        //--------------------------------- Time Period -----------------------------\\

                        //----------------------------------------------------------------------- FLASH SALE ------------------------------------------------------------------\\




                        //----------------------------------------------------------------------- PRE ORDER ------------------------------------------------------------------\\
                        $pre_time = $now->format('Y-m-d H:i');

                        // dd($item1['type']);
                        //----------------------------------------------------------------------- PRE ORDER ------------------------------------------------------------------\\
                        @endphp

                        <div class="col-12 mb-3">
                            <div class="row row_good align-items-center position-relative
                                    @if(isset($item1['type']) && $item1['type'] == 'flashsale')
                                        flash_sale
                                            @if(@$status_check && @$item1['time_period'] != null && isset($item1['time_period']))

                                            @endif
                                    @endif
                                    @if(isset($item1['type']) && $item1['type'] == 'pre_order' && $pre_time > $item1['end_date'])
                                        pre_order
                                    @endif
                                " product_id="{{ $item1['product_id'] }}" @if(isset($item1['type']) &&
                                $item1['type']=='flashsale' )
                                limit="{{ @$message_limit['limit'][$product_id]->product_limit }}" @endif>

                                <div class="col-lg-2 col-4 px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-1">
                                        <?php
                                                if( !in_array($item['shop_id'], $a_shop_not_ready) ) {
                                            ?>
                                            <input type="checkbox" name="products[{{ $item['shop_id'] }}][]" id="check_goods" value="{{ $item1['product_id'] }}"
                                                    target=" {{ $item1['price'] * $item1['amount'] }}" class="check{{ $key1 }} checkProduct" inv_ref="{{ $item->inv_ref }}" data-key="{{ $key1 }}"
                                                data-shop_id="{{ $item->shops[0]->id }}" >
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-8 px-0" style="width: 100%; height: 80px;">
                                            @if(isset($item1['product_img']))
                                            <img class="rounded8px ml-2"
                                                style="width:  100%; height: 100%; object-fit: cover;"
                                                src="/img/product/{{ $item1['product_img'] }}" alt=""onerror="this.onerror=null;this.src='/img/no_image.png'">
                                                @if(isset($item1['type']))
                                                    @if($item1['type'] == 'pre_order')
                                                        <div class="position-absolute pl-2 pr-2 py-1"
                                                            style="clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0 100%, 0% 50%, 0 0); top: 0; left: 0; background-color: #7BCFDD;">
                                                            <h6 class="mb-0" style="font-size: 12px;"><strong style="color: #fff;">Pre - Order</strong></h6>
                                                        </div>
                                                    @endif

                                                    @if($item1['type'] == 'flashsale')
                                                        <img src="img/fs.png" class="position-absolute" style="top: 2px; right: 2px; width: 50px;" alt="">
                                                    @endif

                                                    @if($item1['type'] == '9baht')
                                                        <img src="img/fs.png" alt="">
                                                    @endif
                                                @endif


                                            @else
                                            <img class="rounded8px ml-2"
                                                style="width:  100%; height: 100%; object-fit: cover;" alt=""
                                                onerror="this.onerror=null;this.src='/img/no_image.png';">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-8">
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h6 class="text-dot2 position-relative">
                                                                <strong>{{ $item1['product_name'] }}</strong>
                                                            </h6>
                                                        </div>
                                                        <div class="col-1 d-block d-md-block d-lg-none">
                                                	    <img src="new_ui/img/icons/delete.svg"
                                                            shop_id="{{ $item1['shop_id'] }}"
                                                            inv_no="{{ $item1['inv_no'] }}"
                                                            product_id="{{ $item1['product_id'] }}"
                                                            index="{{ implode(',',$item1['index']) }}"
                                                            class="deleteBasket"
                                                            style="width: 15px; height: 15px;" alt="">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12">
                                                    <p class="mb-0" style="color: #b2b2b2;">
                                                        {{ $item1['dis2'] }}
                                                        {{ $item1['dis1'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <div class="row row_product">
                                                <div class="col-lg-4 col-5 ">
                                                    <div class="row">
                                                        <div class="col-12 text-lg-center text-md-left text-left">
                                                            <h4 class="mb-0 pricePerPiece">
                                                                <strong style="color: #333;">฿
                                                                    <span>{{ $item1['price'] }}</span></strong>
                                                            </h4>
                                                        </div>
                                                        <div class="col-12">
                                                            {{-- <p class="mb-0" style="font-size: 0.8rem !important;">฿ 1140 <strong>(-37%)</strong></p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Part for add and reduce a amount --}}
                                                <div class="col-lg-4 col-7 text-center">
                                                    <div
                                                        class="row justify-content-md-end justify-content-lg-center justify-content-end align-items-center mx-0">
                                                        <button type="button" style="height:30px;"
                                                            class="
                                                                @if(
                                                                    @$status_check &&
                                                                    (isset($item1['time_period']) && $item1['time_period'] != null )&&
                                                                    ($item1['type'] == "flashsale" || $item1['type']=='pre_order')  &&
                                                                    $pre_time >$item1['end_date']
                                                                )

                                                                @else
                                                                    btn-minus
                                                                @endif
                                                            btn btn-secondary py-0 px-2"
                                                            id="minus{{ $key1 }}">-</button>
                                                        @php
                                                        // dd($product_stock);
                                                        // dd($item1['amount']);
                                                        if(isset($item1['type'])){
                                                            if($item1['type'] == 'pre_order'){
                                                                if ($item1['amount'] > @max($preOrder_stock)) {
                                                                    $item1['amount'] = @max($preOrder_stock);
                                                                }
                                                            }
                                                            else if($item1['type'] == 'flashsale'){
                                                                if ($item1['amount'] > @max($product_stock['flashsale'])) {
                                                                    $item1['amount'] = @max($product_stock['flashsale']);

                                                                }
                                                            }
                                                            else if($item1['type'] == 'product'){
                                                                if ($item1['amount'] > @max($product_stock['product'])) {
                                                                    $item1['amount'] = @max($product_stock['product']);
                                                                }
                                                            }
                                                        }

                                                        @endphp

                                                        <input type="number" readonly style="text-align: center !important;
                                                                            border-top-style: hidden;
                                                                            border-right-style: hidden;
                                                                            border-left-style: hidden;
                                                                            border-bottom-style: hidden;"
                                                            name="amount[{{ $item['shop_id'] }}][{{$item1['product_id']}}]"
                                                            class="number form-control d-inline-block py-0 mx-0  w-25 bg-white px-0"
                                                            value="{{ $item1['amount'] }}"
                                                            @if(isset($item1['type']))
                                                                @if($item1['type']=='pre_order' )
                                                                    max="{{ @max($preOrder_stock) }}"
                                                                @elseif($item1['type']=='flashsale' )
                                                                    max={{ @max($product_stock['flashsale']) }}
                                                                @elseif($item1['type']==null)
                                                                    max="{{ @max($product_stock['product']) }}"
                                                                @endif
                                                            @else
                                                                max="{{ @max($product_stock['product']) }}"
                                                            @endif
                                                        >
                                                        <button type="button" style="height:30px;"
                                                            class="
                                                                @if(
                                                                    @$status_check &&
                                                                    ( isset($item1['time_period']) && $item1['time_period'] != null ) &&
                                                                    ( $item1['type'] == "flashsale" || $item1['type']=='pre_order' ) &&
                                                                    $pre_time > $item1['end_date']
                                                                )

                                                                @else
                                                                    btn-plus
                                                                @endif
                                                                btn btn-secondary py-0 px-2">+</button>
                                                    </div>

                                                    @if(@$message_limit)
                                                    @if(in_array($item1['product_id'],array_column(@$message_limit['limit'],'id')))
                                                    <h6 class="limit" attr-id="{{ $item1['product_id'] }}"
                                                        style="color:red; display:none">สินค้าเกินจำนวนที่กำหนด</h6>
                                                    @endif
                                                    @endif

                                                </div>
                                                {{-- Part for add and reduce a amount --}}




                                                {{-- Part for price --}}
                                                <div class="col-3 d-none d-md-none d-lg-block show_price text-right">
                                                    <h3>
                                                        <strong class="price" price="{{ $item1['price'] }}"
                                                            style="color:#333;">{{ number_format($item1['price']*$item1['amount'],2) }}</strong>
                                                    </h3>
                                                </div>
                                                {{-- Part for price --}}



                                                <div class="col-1 d-none d-md-none d-lg-block del_row">
                                                    <img src="new_ui/img/icons/delete.svg"
                                                        shop_id="{{ $item1['shop_id'] }}"
                                                        inv_no="{{ $item1['inv_no'] }}"
                                                        product_id="{{ $item1['product_id'] }}"
                                                        index="{{ implode(',',$item1['index']) }}" class="deleteBasket"
                                                        style="width: 20px; height: 20px; opacity: 1 !important" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(
                                    @$status_check &&
                                    (isset($item1['time_period']) && $item1['time_period'] != null)&&
                                    ($item1['type'] == "flashsale" || $item1['type'] == 'pre_order')&&
                                    $pre_time > $item1['end_date']
                                )
                                <div class="col-12 position-absolute bg-dark d-flex align-items-center justify-content-center rounded8px

                                    @if(isset($item1['type']))
                                        @if($item1['type'] == 'flashsale')
                                            flash_sale
                                        @endif
                                        @if($item1['type'] == 'pre_order' && $pre_time > $item1['end_date'])
                                            pre_order
                                        @endif
                                    @endif
                                "
                                    style="top: 0; left: 0; width: 100%; height: 100; opacity: 0.7; background-color: #000 !important;">
                                    <strong class="text-white pr-2">สินค้าหมด</strong>
                                    <img src="new_ui/img/icons/delete.svg" shop_id="{{ $item1['shop_id'] }}"
                                        index="{{ implode(',',$item1['index']) }}" class="deleteBasket"
                                        style="width: 20px; height: 20px; opacity: 1 !important; cursor: pointer;"
                                        alt="">
                                </div>
                                @endif
                            </div>










                        </div>
                        @php

                        unset($product_all_id[$key1]);

                        @endphp
                        @endif



                        {{-- if for check index --}}
                        @endforeach
                        {{-- loop products --}}

                </div>
                @endforeach
                {{-- loop shops --}}

                {{-- Part for Row show product of a row --}}





                <div class="row rounded8px px-lg-4 px-md-2 px-0 py-lg-4 py-md-2 py-3 mx-0 mt-4 d-lg-block d-md-none d-none basket_footer fixed-bottom"
                    style="background-color: #346751; color: #fff;">
                    <div class="container">
                        <div class="col-10 ">
                            <div class="row row_total">
                                <div class="col-6 d-flex flex-row align-items-center">
                                    {{-- <button onclick="test()">Try it</button> --}}
                                    <input type="checkbox" class="mr-2 check_all">
                                    <h6 class="mb-0"><strong>{{ trans('message.select_all') }}</strong></h6>
                                    {{-- (0) --}}
                                </div>
                                <div class="col-4 d-flex flex-row justify-content-end align-items-center total_all">
                                    <h6 class="mb-0 amount_all" id="amount_all" value="ราคารวมกับสินค้า">{{ trans('message.total_price') }}</h6>
                                    {{-- (0 สินค้า) --}}
                                    <strong>
                                        <h3 class="mb-0 mx-2 price_all color-price"
                                            price_sum={{ $total ?? '' }}>
                                        {{ $total ?? '' }} ฿</h3>
                                    </strong>
                                    <input type="hidden" id="hdTotal" name="total" value="{{ $total ?? '' }}">
                                </div>
                                <div class="col-2">
                                    <a id="buy_btn" class="buy_btn">
                                        <button class="btn form-control  buy btn-cat-pay" type="button">{{ trans('message.order') }}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            @endif
            {{-- form post --}}
        </div>
        <div class="col-lg-2 col-md-0 col-0 pt-4 d-xl-block d-lg-none d-md-none d-none">
            @include('component.basket-list')
        </div>
    </div>
</div>



<nav class="navbar fixed-bottom navbar-light bg-light navtest d-block d-md-block d-lg-none basket">

    <div class="row">
        <div class="col-5 d-flex flex-row align-items-center">
            <input type="checkbox" class="check_all mr-2" id="check_all" name="check" value="0">
            <h5 class="mb-0">{{ trans('message.price_per_piece') }}</h5>
        </div>
        <div class="col-7 pl-0 align-items-center">
            <h5 class="text-right mb-0">{{ trans('message.total_price') }}<strong id="price_all"
                    class="price_all mx-2 color-price"></strong></h5>
            <h5 class="text-right mb-0" style="color: #b2b2b2;"></h5>
        </div>
        <div class="col-12 pt-2">
            <a id="buy_btn" class="buy_btn">
                <button class="btn form-control btn btnsum buy" style="background-color: #343A40; color: #fff; border-color: #343A40;"  type="button">{{ trans('message.order') }}</button>
            </a>
        </div>
    </div>
</nav>
{{-- end --}}


@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="js/jquery.js"></script>
<script type="text/javascript"></script>

<script>
    $(document).ready(function () {
        sumPrice();


        $('.btn-plus').on('click', function () {
            count($(this), '+');
            fixedBasket();
        });
        $('.btn-minus').on('click', function () {
            count($(this), '-');
            fixedBasket();
        });


        function count(element, condition) {
            var ele = element.parents('.row_good');
            var value = ele.find('input.number').val();
            var max = ele.find('input.number').attr('max');
            var price = ele.find('.show_price .price').attr('price');

            if (condition == '+') {
                var sum = parseInt(value) + 1;
            } else {
                var sum = parseInt(value) - 1;
            }
            if (sum >= 1) {
                if (sum <= max) {
                    ele.find('.show_price .price').html(addcomma(sum * price));
                    ele.find('input.number').val(sum);
                    var count_basket = parseInt($('.count_basket span.count_basket_pc').text());

                    // console.log(count_basket);

                    if (condition == '+') {
                        $('.count_basket span').text((count_basket + 1));

                    } else {
                        $('.count_basket span').text((count_basket - 1));
                    }
                    // ele.find('input[name="check"]').val(sum * price);
                }
            }
            sumPrice();
            var flash_sale = element.parents('.row_good').has('.flash_sale');
            if(flash_sale){
                var id_flash = element.parents('.row_good').attr('product_id');
                $('.row .row_good[product_id='+id_flash+']').find('.limit').css('display','block');

                var limit = element.parents('.row_good').attr('limit');
                var sumonbasket = 0;
                var oldsumonbasket =  element.parents('.row_good').find('.number').val();
                $.each($('.row_good.flash_sale'), function () {
                    if($(this).attr('product_id') == id_flash){
                        sumcount = $(this).find('.number').val();
                        sumonbasket += parseInt(sumcount);
                    }
                });
                if(sumonbasket > limit){
                    $('.row.row_good[product_id='+id_flash+']').find('.limit').css('display','block');

                    Swal.fire({
                            text: "{{ trans('message.warn_limit') }}" + ' ' + limit + " {{ trans('message.piece') }}",
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: "{{ trans('message.close_window') }}!"
                        }).then((result) => {
                                    if (result.isConfirmed) {
                                        $('.limit').css('display', 'none');
                                    }
                            });

                    var newMargin = limit - (sumonbasket - oldsumonbasket);
                    var newMargin = (newMargin >= 0 ? newMargin : 0);
                    element.parents('.row_good').find('.number').val((newMargin>limit ? 0 : newMargin));
                    sumPrice();
                    return false;
                }else{
                        $('.limit').css('display','none');
                    }

            }
        }


        function sumPrice() {
            var sum_price_all = 0;
            fixSumPrice();
            $('.row_good:not(.remove)').each(function () {
                check = $(this).find('input[id="check_goods"]').is(':checked');
                if (check) {
                    /*
                    pricePerPiece =parseInt($(this).find('.pricePerPiece span').text());
                    number = parseInt($(this).find('.row_product input[type="number"]').val());
                    perRow = pricePerPiece*number;
                    sum_price_all += parseInt(perRow);
                    console.log(check);
                    */
                    sum_price_all += parseInt(removecomma($(this).find('.price').html()));
                }
            });
            $('.price_all').html(addcomma(sum_price_all) + " ฿");
            $('#hdTotal').val(sum_price_all);
        }
        function fixSumPrice() {
            $('.row_good').each(function () {
                pricePerPiece =parseInt($(this).find('.pricePerPiece span').text());
                number = parseInt($(this).find('.row_product input[type="number"]').val());
                perRow = pricePerPiece*number;
                $(this).find('.price').text(addcomma(perRow));
            });
        }

        function addcomma(value) {
            // console.log(value);
            return value.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        }

        function removecomma(value) {
            return value.replace(/,/g, '');
        }

        $('input[type="checkbox"]').on('change', function () {
            sumPrice();
        });


        $('.row_good input[type="checkbox"]').on('change', function () {
            checkCheckinput();
        });


        $('.check_all').on('change', function () {
            check = $(this).prop('checked');
            if (check) {
                $('input[type="checkbox"]').prop('checked', true);
            } else {
                $('input[type="checkbox"]').prop('checked', false);
            }
            checkCheckinput();
        });

        $('.checkStore').on('change', function () {
            check = $(this).prop('checked');
            if (check) {
                $(this).parents('.row_shop').find('input:not(.checkFlash_sale)').prop('checked', true);
            } else {
                $(this).parents('.row_shop').find('input').prop('checked', false);
            }
            checkCheckinput();
        });


        function checkCheckinput() {
            checkStore = true;

            $('.row_shop ').each(function (index) {
                checkBox = true;
                $(this).find('.row_good').each(function (key, value) {
                    var checkinside = $(this).find('input[type="checkbox"]').prop('checked');
                    var checkFlash_sale = $(this).has('.checkFlash_sale');
                    if (!checkinside) {
                        checkBox = false;
                    }
                });
                // console.log(checkStore);
                if (checkBox) {
                    $(this).find('.checkStore').prop('checked', true);
                } else {
                    $(this).find('.checkStore').prop('checked', false);

                    checkStore = false;
                }
            });
            if (checkStore) {
                $('.check_all').prop('checked', true);
            } else {
                $('.check_all').prop('checked', false);
            }
            // console.log(checkStore);

            sumPrice();
        }
// pre_order
        //------------------------------------ Delete Button ------------------------------------------\\
        fixedBasket();

        function fixedBasket() {
            var count = 0;
            $(".number").each(function (index) {
                count += parseInt($(this).val());
            });
            $('.count_basket span').text(count);
        }
        var inv_ref = "{{ $item1['inv_ref'] ?? '' }}";
        // var basket = $('.basket_header');
        // var no_basket = $('.no_basket');

        $('.deleteBasket').on('click', function () {

            var shop_id = $(this).attr('shop_id');
            var index = $(this).attr('index');
            var row_good = $(this).parents('.row_good');
            var row_good_flash_sale = $(this).parents('.flash_sale');
            var row_good_pre_order = $(this).parents('.pre_order');
            var row_shop = $(this).parents('.row_shop');
            // console.log(shop_id);
            // console.log(index);
            // console.log(row_good);
            console.log($(this));
            console.log(row_good_flash_sale);
            console.log(row_good_pre_order);
            // console.log(row_shop);

            // return false;

            var count_amount = parseInt($(this).parents('.row_good').find('input.number').val());
            var count_basket_delete = parseInt($('.count_basket span.count_basket_pc').text());

            Swal.fire({
                title: 'คุณมั่นใจในการลบสินค้านั้นใช่ไหม?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'

            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: 'basket/delete',
                        type: 'POST',
                        data: {
                            inv_ref: inv_ref,
                            shop_id: shop_id,
                            index: index,
                            type: 'ajax',
                            _token: '{{ csrf_token() }}'
                        },

                        success: function (respone) {
                            var index = respone['index'];
                            if (index == 0) {
                                $('form#form_basket').animate({
                                    height: 0
                                }, 1000, function () {
                                    $('.no_basket1').removeClass('d-none')
                                    $('.no_basket1').animate({
                                        height: 289
                                    }, 1000, function () {
                                        // Animation complete.
                                    });
                                });

                                $('.count_basket span').text('');

                                return false;

                            }

                            $status = $.trim(respone['status']);


                            if ($status == 'true') {
                                $('.count_basket span').text((count_basket_delete - count_amount));

                                $(this).parents('row_good').find('.deleteBasket')
                                    .each(function () {
                                        value = $(this).attr('index');
                                        if (value > index) {
                                            $(this).attr('index', value - 1);

                                            // this attr (paremeter1 , set value of attr from send value);
                                        }
                                    });

                                Swal.fire(
                                    "{{ trans('message.delete_success') }}",
                                )
                                row_good.slideUp(480);
                                row_good.addClass('remove');

                                row_good_flash_sale.slideUp(480);
                                row_good_flash_sale.addClass('remove');

                                // row_good_pre_order.slideUp(480);
                                // row_good_pre_order.addClass('remove');
                                sumPrice();
                                count = row_shop.find('.row_good:not(.remove)').length;
                                setTimeout(function () {
                                    row_good.remove();
                                    if (count < 1) {
                                        row_shop.fadeOut(500);
                                        setTimeout(function () {
                                            row_shop.remove();
                                        }, 1000);
                                    }
                                }, 520);



                            } else {
                                Swal.fire(
                                    'กรุณาทำใหม่อีกครั้ง',
                                )
                            }

                        }
                    })

                } else {
                    Swal.fire({
                        text: "{{ trans('message.back_to_shopping') }}!"
                    });
                }
            })
        });
        //------------------------------------ Delete Button ----------------------------------\\




    });
</script>








<script>
    $(document).ready(function() {


            $(".buy").click(function() {
                var flash_status = true;

                var temp = {};
                $.each($('.row_good.flash_sale'), function() {
                    id = $(this).attr('product_id');
                    if (!temp[id]) { // เช็คว่า ถ้าไม่มี id ใน array temp จะเข้าเงื่อนไข if \\
                        count = $(this).find('.number').val();
                        sum = parseInt(count);
                        temp[id] = sum;


                    } else { // มี id ใน array temp แล้ว \\
                        count = $(this).find('.number').val();
                        sum = parseInt(count);
                        temp[id] += sum;
                    }
                });
                //console.log(temp);
                $.each(temp, function(key, value) {
                    limit = $('.row_good.flash_sale[product_id="' + key + '"]').attr('limit');
                    if (value > limit) {
                        $('.row.row_good[product_id=' + key + ']').find('.limit').css('display',
                            'block');

                        Swal.fire({
                            text: "{{ trans('message.warn_limit_to') }}" + ' ' + limit + " {{ trans('message.piece') }}",
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: "{{ trans('message.close_window') }}!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('.limit').css('display', 'none');
                            }
                        });


                        flash_status = false;
                        sumPrice();
                    }
                });
                if (!flash_status) {
                    return false;
                }
                var shop_id = $('.checkProduct').data('shop_id');
                var check = '';
                var inv_ref = "{{ @$item1['inv_ref'] }}";
                var key = [];
                var test = $("input.checkProduct:checked").length;
                if (test <= 0) {
                    Swal.fire({
                        text: "{{ trans('message.no_item_selected') }}",
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: "{{ trans('message.close_window') }}!"
                    });
                } else {

                    $('#form_basket').submit();


                    // else {
                    //     console.log('No pass');
                    //     // $(".buy_btn").attr("href", "/product-payment/?inv_ref=" + $("input[id='check_1']").data(
                    //     //     'inv_ref'));
                    // }

                }
            });
        });

</script>


<script>
    $(document).ready(function(){
        var perfEntries = performance.getEntriesByType("navigation");

        if (perfEntries[0].type === "back_forward") {
            location.reload(true);
        }
    });

</script>
