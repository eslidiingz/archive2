@extends('layouts.default')
@section('style')
    <link href="/plugins/lightbox2/css/lightbox.css" rel="stylesheet" />
    <style>
        /*.nav_custom_cat {
                                      display: none !important;
                                     }*/

        .swiper-container {
            width: 100%;

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



        .gallery-thumbs {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
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
            width: 10px;
            left: 0;
            overflow: hidden;
        }

        .rating-lower {
            padding: 0;
            display: flex;
            z-index: 0;
        }

        .gallery-thumbs .swiper-slide {
            height: 100%;
            opacity: 0.4;
        }

        .gallery-thumbs .swiper-slide-thumb-active {
            opacity: 1;
        }

        @media (min-width: 320px) {
            .swiper-container {
                height: 65px;
            }

            .cuttom-img-big {
                width: 100%;
                height: 220px;
            }

            .gallery-top {
                height: 80%;
                width: 100%;
            }

            .h_img_detail_custom {
                height: 200px;
            }
        }

        @media (min-width: 350px) {
            .swiper-container {
                height: 80px;
            }

            .cuttom-img-big {
                width: 100%;
                height: 280px;
            }

            .gallery-top {
                height: 80%;
                width: 100%;
            }

            .h_img_detail_custom {
                height: 300px;
            }
        }

        @media (min-width: 576px) {
            .swiper-container {
                height: 100px;
            }

            .cuttom-img-big {
                width: 100%;
                height: 350px;
            }

            .gallery-top {
                height: 80%;
                width: 100%;
            }

            .h_img_detail_custom {
                height: 300px;
            }
        }

        @media (min-width: 768px) {
            .swiper-container {
                height: 140px;
            }

            .cuttom-img-big {
                width: 100%;
                height: 350px;
            }

            .gallery-top {
                height: 70%;
                width: 100%;
            }

            .h_img_detail_custom {
                height: 400px;
            }
        }

        @media (min-width: 992px) {
            .swiper-container {
                height: 70px;
            }

            .cuttom-img-big {
                width: 100%;
                height: 240px;
            }

            .gallery-top {
                height: 60%;
                width: 100%;
            }

            .h_img_detail_custom {
                height: 250px;
            }
        }

        @media (min-width: 1200px) {
            .swiper-container {
                height: 100px;
            }

            .cuttom-img-big {
                width: 100%;
                height: 290px;
            }

            .gallery-top {
                height: 320px;
                width: 100%;
            }

            .h_img_detail_custom {
                height: 320px;
            }
        }


        a.nav-item.active .btn-outline-secondary {
            background-color: white !important;
            border: 1px solid #7BCFDD;
            color: #7BCFDD;
        }

        a.nav-item:hover .btn-outline-secondary {
            background-color: white !important;
            border: 1px solid #7BCFDD;
            color: #7BCFDD;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            border: unset;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link:hover {
            border: unset;
        }

        .nav-tabs {
            border: unset;
        }

        .sl-counter {
            display: none !important;
        }

        /* .h-product-detail:hover {
                                            border: 3px #c75ba1 solid;
                                        } */

        /* .swiper-slide-thumb-active {
                                            border: 3px #c75ba1 solid;
                                        } */
    </style>
    <link rel="stylesheet" href="/new_ui/plugins/swiper/swiper.min.css?v=3">
    <script src="/new_ui/plugins/swiper/swiper.min.js"></script>



@endsection

@section('content')
    <div class="container">
        <div class="row p-3">
            <div class="col-12 mx-auto">
                <div class="row">
                    <div class="col-12 px-lg-4 px-md-0 px-sm-0 mb-4 pb-4" style="background-color: #fff; border-radius: 8px;">
                        <div class="row d-lg-block d-md-none d-none">
                            <div class="col-12 mt-4">
                                @include('component.breadcrumb')
                                @if (session('msgStock_PreOrder'))
                                    <div class="row">
                                        <div class="col-12 my-4">
                                            <div class="alert alert-danger" role="alert">
                                                {{ trans('message.warning') }} : {{ session('msgStock_PreOrder') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row p-lg-0 p-md-4 p-0">
                            <div class="col-lg-5 col-md-12 col-12 mb-lg-0 mb-md-4 mb-4 mt-4 mt-md-0 mt-lg-0">
                                <div class="swiper-container gallery-top">
                                    <div class="swiper-wrapper">
                                        @foreach ($product->product_img as $front_image)
                                            <div class="swiper-slide" style="cursor: pointer;">
                                                <div class="d-flex align-items-center justify-content-center ">
                                                    <div class="gallery h_img_detail_custom">
                                                        <a class="big d-flex flex-row align-items-center h_img_detail_custom"
                                                            href="/img/product/{{ $front_image }}">
                                                            <img src="/img/product/{{ $front_image }}" alt=""
                                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                                style="max-height: 100%; max-width: 100%;">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="swiper-container gallery-thumbs pt-3">
                                    <div class="swiper-wrapper">
                                        <!-- @isset($product) -->
                                            @foreach ($product->product_img as $front_image)
                                                <div class="swiper-slide" style="cursor: pointer;">
                                                    <div class="d-flex align-items-center justify-content-center h-product-detail"
                                                        style=" width: 100%;">
                                                        <img src="/img/product/{{ $front_image }}" alt=""
                                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                            style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;">
                                                    </div>
                                                </div>
                                            @endforeach
                                        <!-- @endisset -->

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-12 col-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="font_head_item"><strong>{{ $product->name }}</strong></h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <strong>{{ trans('message.price') }}</strong>
                                            </div>
                                            <div class="col-6" style="text-align: right;">
                                                <?php
                                                    if( isset( $product->product_option['price_special'] ) && $product->product_option['price_special'][0] > 0 ) {
                                                ?>
                                                <strong
                                                    style="font-weight: bold;color: #CCCCCC;"><strike><i>฿  {{ number_format(min($product->product_option['price'])) }}</i></strike></strong>
                                                <strong id="price"
                                                    class="color-blue">฿  {{ number_format(min($product->product_option['price_special'])) }}</strong>
                                                <?php
                                                    } else {
                                                ?>
                                                <strong id="price" class="color-blue" style="font-weight: bold;">฿  
                                                    {{ number_format(min($product->product_option['price'])) }}
                                                    {{ $product->product_unit }}</strong>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 d-flex flex-row align-items-center mb-2">
    									discount product function
    									<div class="mr-4">
    									<h6 class="mb-0" style="color: #b1b7bc; text-decoration:line-through;">25,000 บาท</h6>
    									</div>
    									end discount product

    									<div class="mr-4">
    										<div class="d-flex align-items-end">
    											<span>ราคา </span>
    											<h4 id="price" class="mb-0 mx-2 font_price" style="color: #7BCFDD;">
    												<strong>{{number_format(min($product->product_option['price']))}}
    													{{$product->product_unit}}</strong></h4>
    											<span> บาท</span>
    										</div>
    										<h6  class="mb-0" style="color: #7BCFDD;"> บาท / {{$product->product_unit}}
    										</h6>
    										@foreach ($product->product_option['price'] as $key => $item)
    										<h6 id="price{{$key}}" style="display: none">{{$item}}</h6>
    										@endforeach
    									</div>

    									<div class="px-2 py-0 rounded8px text-white" style="background-color: #c40000;">
    										ส่วนลด 30%
    									</div>
								    </div> --}}
                                    @foreach ($product->product_option['price'] as $key => $item)
                                        <h6 id="price{{ $key }}" style="display: none">{{ $item }}</h6>
                                    @endforeach

                                    <div class="col-12 d-flex flex-row align-items-center">
                                        @foreach ($product->product_option['stock'] as $key => $item)
                                            <h3 id="stock{{ $key }}" style="display: none">{{ $item }}
                                            </h3>
                                        @endforeach
                                        <div class="d-flex align-items-center flex-row">
                                            <h5 class="mb-0 mr-2"><strong>0</strong></h5>
                                            <h6 class="mb-0" style="color: #b1b7bc;"><span
                                                    class="font-btn-custom">{{ trans('message.sold') }}</span></h6>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr class="w-100">
                                    </div>


                                    <div class="col-12">
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <strong>{{ trans('message.ship_from') }} : </strong>
                                            </div>
                                            <div class="col-6" style="text-align: right;">
                                                <strong
                                                    style="font-weight: bold;color: #454C4E;">{{ $a_shop_addr['city'] }}</strong>
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-2">
                                            <div class="col-6">
                                                <strong>{{ trans('message.ship_price') }} : </strong>
                                            </div>
                                            <div class="col-6" style="text-align: right;">
                                                <strong style="font-weight: bold;color: #454C4E;">-</strong>
                                            </div>
                                        </div> --}}
                                    </div>

                                    {{-- <div class="col-12 d-flex flex-row align-items-center">
									<div class="row align-items-center">
										<div class="col-lg-12 col-md-12 col-12 mb-3">
											<h6 class="mb-0"><strong>ส่งจาก : &nbsp;</strong>
												{{$a_shop_addr['city'] }}</h6>
										</div>
										<div class="col-lg-12 col-md-12 col-12 mb-3">
											<h6 class="mb-0"><strong>ระยะเวลาจัดส่ง : &nbsp;</strong>
												{{$product->shops[0]->ship_period }}</h6>
										</div>
										<div class="col-lg-7 col-md-12 col-12 px-1">
										<h6 class="mb-0">{{$product->shops[0]->shop_name }}</h6>
										<div class="btn-group">

										<button  class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															{{$product->shops[0]->shop_name }}
										</button>
										</div>
										</div>
										<div class="col-lg-7 col-md-12 col-12 px-1">
											price
										</div>
									</div>
								</div> --}}

                                    <div class="col-12">
                                        <hr class="w-100">
                                    </div>
                                    <div class="col-12 px-0">
                                        <form action="{{ route('basket') }}">
                                            <div class="col-12">
                                                <div class="row mx-0">
                                                    <div class="col-12 mb-2 px-0">
                                                        <div class="row align-items-center">

                                                            @if (isset($product->product_option['option1']))

                                                                <div class="col-lg-2 col-md-12 col-12 mb-2">
                                                                    <h6 class="mb-0" id="dis1">
                                                                        <strong>{{ $product->product_option['option1'] }}
                                                                            :</strong>
                                                                    </h6>
                                                                </div>
                                                                <div data-toggle="buttons"
                                                                    class="col-lg-9 col-md-6 col-12 mb-2">
                                                                    @foreach ($product->product_option['dis1'] as $key => $item)
                                                                        <label
                                                                            class="btn-outline-422a4e btn form-control btn-outline-secondary "
                                                                            style="width: auto;">
                                                                            {{-- @if ($key == 0)
		                                                                                <input checked required type="radio" id="option1" name="{{$product->product_option['option1']}}"
																value="{{$key}}" style="display: none">
																@else --}}

                                                                            {{-- @endif --}}
                                                                            <input required type="radio"
                                                                                data-key="{{ $key }}"
                                                                                id="option1" name="dis1"
                                                                                value="{{ $item }}"
                                                                                style="display: none">
                                                                            <div class="mb-0">{{ $item }}
                                                                            </div>
                                                                        </label>
                                                                    @endforeach

                                                                    <h6 class="text-danger regular ml-2"
                                                                        style="font-size:14px; display: none;"
                                                                        id="warning1">
                                                                        {{ trans('message.choose_option_to_buy') }}</h6>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- end option 1 --}}


                                                    <div class="col-12 mb-2 px-0">
                                                        <div class="row align-items-center">
                                                            @if (isset($product->product_option['option2']))
                                                                <div class="col-lg-2 col-md-12 col-12 mb-2">
                                                                    <h6 class="mb-0" id="dis2">
                                                                        <strong>{{ $product->product_option['option2'] }}
                                                                            :</strong>
                                                                    </h6>
                                                                </div>
                                                                <div data-toggle="buttons"
                                                                    class="col-lg-9 col-md-12 col-12 mb-2">
                                                                    @foreach ($product->product_option['dis2'] as $key => $item)
                                                                        <label
                                                                            class="btn-outline-422a4e btn form-control btn-outline-secondary "
                                                                            style="width: auto;">
                                                                            {{-- @if ($key == 0)
		                                                                    <input checked required type="radio" id="option2"  name="{{$product->product_option['option2']}}"
																value="{{$key}}" style="display: none">
																@else --}}
                                                                            {{-- @endif --}}
                                                                            <input required type="radio"
                                                                                data-key="{{ $key }}"
                                                                                id="option2" name="dis2"
                                                                                value="{{ $item }}"
                                                                                style="display: none">
                                                                            <h6 class="mb-0">{{ $item }}
                                                                            </h6>
                                                                        </label>
                                                                    @endforeach
                                                                    <h6 class="text-danger regular ml-2"
                                                                        style="font-size:14px; display: none;"
                                                                        id="warning2">
                                                                        {{ trans('message.choose_option_to_buy') }}</h6>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- end option 2 --}}

                                                    <div class="col-12 mb-2 px-0">
                                                        <div class="row align-items-center">
                                                            <div class="col-6">
                                                                <h6 id="addnum" class="mb-0">
                                                                    <strong>{{ trans('message.input_amount') }}</strong>
                                                                </h6>
                                                            </div>
                                                            <div class="col-2 w-100">
                                                                <input
                                                                    max="{{ max($product->product_option['stock']) }}"
                                                                    style="text-align: center" value="1"
                                                                    min="1" name="amount" type="number"
                                                                    class="form-control d-inline-block mr-4 py-0 px-2"
                                                                    id="stock_input" placeholder="จำนวน">
                                                            </div>

                                                            <div class="col-4" style="text-align: right;">
                                                                <strong>

                                                                    <div style="display: none">
                                                                        {{ $total = 0 }}
                                                                        @foreach ($product->product_option['stock'] as $stock_key => $item)
                                                                            {{ $total += $item }}
                                                                        @endforeach
                                                                    </div>

                                                                    <div class="black light  d-inline-block ml-3">
                                                                        {{ trans('message.remain_amount') }} :
                                                                    </div>

                                                                    <div class="black light  d-inline-block ml-3"
                                                                        id="stock">
                                                                        {{ $total }}
                                                                        {{-- <input type="hidden" name="stock" value="{{$total}}"> --}}
                                                                    </div>
                                                                </strong>
                                                            </div>

                                                            <input type="hidden" name="shop_id"
                                                                value="{{ $product->shops[0]->id }}">
                                                            <input type="hidden" id="price_one" name="price"
                                                                value="<?php if (isset($product->product_option['price_special']) && $product->product_option['price_special'][0] > 0) {
                                                                    echo min($product->product_option['price_special']);
                                                                } else {
                                                                    echo min($product->product_option['price']);
                                                                }
                                                                ?>">
                                                            @if (isset($product->product_option['margin']))
                                                                <input type="hidden" id="margin_one" name="margin"
                                                                    value="{{ min($product->product_option['margin']) }}">
                                                            @endif

                                                            @if (isset($product->product_option['option1']))
                                                                <input type="hidden" name="option1"
                                                                    value="{{ $product->product_option['option1'] }}">
                                                            @endif
                                                            @if (isset($product->product_option['option2']))
                                                                <input type="hidden" name="option2"
                                                                    value="{{ $product->product_option['option2'] }}">
                                                            @endif
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            {{-- <input type="hidden" name="stock_key" value="{{$stock_key}}"> --}}
                                                        </div>
                                                    </div>


                                                    {{-- <div class="col-12 mb-3 px-0">
													<div class="row align-items-center ">
														<div class="col-lg-2 col-md-12 col-12 mb-2">
															<h6 id="addnum" class="mb-0"><strong>จำนวน</strong></h6>
														</div>
														<div class="col-lg-3 col-md-6 col-5 d-flex flex-row">
															<input max="{{max($product->product_option['stock'])}}"
																style="text-align: center" value="1" min="1"
																name="amount" type="number"
																class="form-control d-inline-block mr-4 py-0 px-2"
																id="stock_input" placeholder="จำนวน">
														</div>

														<div class="col-lg-6 col-md-6 col-7 ml-auto">
															<strong>

																<div style="display: none">
																	{{ $total = 0 }}
																	@foreach ($product->product_option['stock'] as $stock_key => $item)
																	{{$total += $item}}
																	@endforeach
																</div>

																<div class="black light  d-inline-block ml-3">
																	{{ trans('message.available_amount') }} :
																</div>

																<div class="black light  d-inline-block ml-3"
																	id="stock">
																	{{$total}}
																	<input type="hidden" name="stock" value="{{$total}}">

																</div>
															</strong>
														</div>

														<input type="hidden" name="shop_id"
															value="{{$product->shops[0]->id}}">
														<input type="hidden" id="price_one" name="price"
															value="{{min($product->product_option['price'])}}">
														@if (isset($product->product_option['margin']))
															<input type="hidden" id="margin_one" name="margin"
															value="{{min($product->product_option['margin'])}}">
														@endif

														@if (isset($product->product_option['option1']))
														<input type="hidden" name="option1"
															value="{{$product->product_option['option1']}}">
														@endif
														@if (isset($product->product_option['option2']))
														<input type="hidden" name="option2"
															value="{{$product->product_option['option2']}}">
														@endif
														<input type="hidden" name="product_id"
															value="{{$product->id}}">
														<input type="hidden" name="stock_key" value="{{$stock_key}}">

													</div>
												</div> --}}
                                                </div>
                                            </div>
                                            {{-- count product --}}


                                            <div class="col-12">
                                                @if ($a_shop['shop_sts'] == 'close')
                                                    <span
                                                        style="color: red;">{{ trans('message.shop_temporary_close') }}</span>
                                                @endif
                                                <hr class="w-100">
                                            </div>

                                            <div class="col-12 ">
                                                <div class="form-row">
                                                    @auth

                                                        @if ($product->status_goods == '2' ||
                                                            $a_shop['shop_sts'] == 'close' ||
                                                            $a_shop['bank_number'] == '' ||
                                                            $a_shop_addr == null ||
                                                            $a_shop['kyc_status'] == '' ||
                                                            $a_shop['kyc_status'] == 'unapprove')
                                                            <div class="col-lg-6 col-md-6 col-6 mb-2 pr-lg-1">
                                                                <button class="form-control text-white rounded8px"
                                                                    id="" name="" value="1"
                                                                    type="submit" disabled>
                                                                    {{ trans('message.add_to_basket') }}</button>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-6 mb-2 pr-lg-1">
                                                                <button class="form-control text-white rounded8px"
                                                                    id="" name="" value="2"
                                                                    type="submit" disabled>
                                                                    <div name="which_btn">
                                                                        {{ trans('message.buy_now') }}
                                                                    </div>
                                                                    @php
                                                                        $time = new DateTime();
                                                                    @endphp
                                                                    <input type="hidden" name="type"
                                                                        value="{{ $product->type }}">
                                                                    <input type="hidden" name="type"
                                                                        value="{{ $product->type }}">
                                                                </button>
                                                            </div>
                                                        @else
                                                            <div class="col-lg-6 col-md-6 col-6 mb-2 pr-lg-1">
                                                                <button class="btn btn-cart form-control" id="basket_add"
                                                                    name="which_btn" value="1" type="submit">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                    {{ trans('message.add_to_basket') }}</button>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-6 mb-2 pr-lg-1">
                                                                <button class="btn btn-buy form-control" id="buy_now"
                                                                    name="which_btn" value="2" type="submit">
                                                                    <div name="which_btn">{{ trans('message.buy_now') }}
                                                                    </div>
                                                                    <input type="hidden" name="type"
                                                                        value="{{ $product->type }}">
                                                                    <input type="hidden" name="end_date"
                                                                        value="{{ $product->end_date }}">
                                                                    <input type="hidden" name="time_period"
                                                                        value="{{ $product->time_period }}">
                                                                </button>
                                                            </div>
                                                            @if ($product->receive_product == 'receive' && $product->type == 'flashsale')
                                                                <div class="col-lg-6 col-md-6 col-12 mb-2 pr-lg-1">
                                                                    <button class="btn-f8eaf3 btn form-control" id="which_btn"
                                                                        name="which_btn" value="5" type="submit">
                                                                        <div name="which_btn">
                                                                            ซื้อสินค้า(รับสินค้าหน้างาน)
                                                                        </div>

                                                                        <input type="hidden" name="type"
                                                                            value="{{ $product->type }}">
                                                                        <input type="hidden" name="end_date"
                                                                            value="{{ $product->end_date }}">
                                                                        <input type="hidden" name="time_period"
                                                                            value="{{ $product->time_period }}">
                                                                        <input type="hidden" name="receive_product"
                                                                            value="{{ $product->receive_product }}">
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endauth
                                                    @guest
                                                        <div class="col-lg-6 col-md-6 col-6 mb-2 pr-lg-1">
                                                            <a class="col p-1 btn btn-cart form-control text-white"
                                                                data-toggle="modal" data-target="#user-login-regis"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <!-- <i class="fas fa-shopping-basket"></i> -->
                                                                <i class="fas fa-shopping-cart"></i>
                                                                {{ trans('message.add_to_basket') }}
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-6 mb-2 pr-lg-1">
                                                            <a class="btn btn-buy form-control text-white" id="btn_buy_now"
                                                                href="addToCart/{{ $product->id }}">
                                                                </i>{{ trans('message.buy_now') }}
                                                            </a>
                                                        </div>
                                                    @endguest


                                                    {{-- <div class="col-12">
													<hr class="w-100">
												</div>
												<div class="col-12 d-flex flex-row align-items-center mb-4">
													<div class="mr-4 d-flex align-items-center flex-row">
														<div class="mr-2"><img
																src="/new_ui/img/footer/icon-footer-1.svg" width="30px"
																alt=""></div>
														<div class="mr-2"><img
																src="/new_ui/img/footer/icon-footer-2.svg" width="30px"
																alt=""></div>
														<div class="mr-2"><img
																src="/new_ui/img/footer/icon-footer-3.svg" width="30px"
																alt=""></div>
														<div class="mr-2"><img
																src="/new_ui/img/footer/icon-footer-4.svg" width="30px"
																alt=""></div>
														<div class="mr-2"><img
																src="/new_ui/img/footer/icon-footer-5.svg" width="30px"
																alt=""></div>
													</div>
												</div> --}}


                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                    {{-- end btn group --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 px-4 " style="background: #CFCFCF; border-radius: 8px 8px 0px 0px;">
                        <div class="row">
                            <div class="col-12 my-3">
                                <h6 class="mb-0 font_head_item" style="color: #000000;">
                                    <strong>{{ trans('message.detail') }}</strong>
                                </h6>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="col-12 px-4 mb-4"
                        style="background-color: #fff; border-radius: 0 0 8px 8px; border-top: 1px solid #346751;">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <h6 class="font_head_item"><strong
                                        style="color:#346751;">{{ trans('message.product_detail') }}</strong></h6>
                            </div>
                            <div class="col-12 d-flex flex-row align-items-center mt-3 mb-3">
                                <div class="d-flex align-items-center flex-row">
                                    <div style="width: 100px;">
                                        <p class="mb-0"><strong
                                                style="color: #000000;">{{ trans('message.category') }}</strong></p>
                                    </div>
                                    <div>
                                        <p class="mb-0">
                                            {{ $breadcrumb_item[0]['name'] }} <i class="fa fa-angle-right px-2 "
                                                aria-hidden="true"></i> {{ $breadcrumb_item[1]['name'] }}

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-row align-items-center mb-3">
                                <div class="d-flex align-items-center flex-row">
                                    <div style="width: 100px;">
                                        <p class="mb-0"><strong
                                                style="color: #000000;">{{ trans('message.remain_amount') }}</strong>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="mb-0">{{ $total }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-row align-items-center mb-3">
                                <div class="d-flex align-items-center flex-row">
                                    <div style="width: 100px; ">
                                        <p class="mb-0"><strong
                                                style="color: #000000;">{{ trans('message.ship_by') }}</strong></p>
                                    </div>
                                    <div>
                                        {{-- <h6 class="mb-0">{{ $product->shops[0]->shop_name }}</h6> --}}
                                        <p class="mb-0">{{ $product->shipType->shipty_name }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3" style="font-family: 'Kanit' !important;">
                                <h6 class="font_head_item mb-3"><strong
                                        style="color:#346751;">{{ trans('message.product_detail') }}</strong>
                                </h6>
                                <p style="font-family: 'Kanit' !important;">
                                    {!! nl2br($product->description) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- end detail product --}}
                </div>
            </div>
        </div>
    </div>

    {{-- end container --}}

    <div class="modal fade" id="user-login-regis" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 400px;">
            <div class="modal-content">
                <div class="modal-header " style="border: unset;">
                    <div class="col-12 d-flex justify-content-center position-relative">
                        <img src="/new_ui/img/logo.svg" class="img-fluid w-75 d-flex justify-content-center">
                        <button type="button" class="close position-absolute" style="top: 0; right: 10px;"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body pt-0">
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active text-center pt-4 " style="width: 50% !important;"
                                    id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab"
                                    aria-controls="nav-login" aria-selected="true">
                                    <h6><strong>{{ trans('message.login') }}</strong></h6>
                                </a>
                                <a class="nav-link text-center pt-4 " style="width: 50% !important;"
                                    id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab"
                                    aria-controls="nav-register" aria-selected="false">
                                    <h6><strong>{{ trans('message.register') }}</strong></h6>
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="nav-login" role="tabpanel"
                                aria-labelledby="nav-login-tab">
                                <form id="login-form" method="POST" class="justify-content-center mt-3"
                                    action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-3 mt-4">
                                            <input type="tel" class="form-control rounded8px" name="username"
                                                aria-describedby="emailHelp" placeholder="หมายเลขโทรศัพท์ หรือ อีเมล"
                                                style="background-color: #ededed; border: none;">
                                        </div>
                                        <div class="col-12 mb-1">
                                            <input type="password" class="form-control rounded8px" name="password"
                                                placeholder="รหัสผ่าน" style="background-color: #ededed; border: none;">
                                        </div>

                                        <div class="col-12 mb-0 text-right">
                                            <a href="#">
                                                <h6><strong
                                                        style="color: #c75ba1; font-size: 14px; text-decoration: underline;">{{ trans('message.forget_password') }}
                                                        ?</strong></h6>
                                            </a>
                                        </div>
                                        <div class="col-12 mb-2 text-center">
                                            <button class="btn form-control text-white rounded8px"
                                                style="background-color: #42294f;">{{ trans('message.login') }}</button>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-5 pr-0">
                                                    <hr class="w-100 ">
                                                </div>
                                                <div class="col-2 d-flex align-items-center justify-content-center"
                                                    style="color: rgba(0,0,0,.5);">
                                                    {{ trans('message.or') }}
                                                </div>
                                                <div class="col-5 pl-0">
                                                    <hr class="w-100 ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2 ">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{ url('login/facebook') }}"
                                                    class="btn form-control py-0 d-flex align-items-center justify-content-center"
                                                    style="border:2px solid #3b5998; color: #3b5998;">
                                                    <img src="/new_ui/img/footer/icon-footer-3.svg" style="width: 35px;"
                                                        class="img-fluid pr-2" alt="">
                                                    <strong>{{ trans('message.login_with_facebook') }}</strong></a>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 ">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{ url('login/google') }}"
                                                    class="btn form-control py-0 d-flex align-items-center justify-content-center"
                                                    style="border:2px solid #346751; color: #346751;">
                                                    <img src="/new_ui/img/footer/icon-footer-2.svg" style="width: 35px;"
                                                        class="img-fluid pr-2" alt="">
                                                    <strong>{{ trans('message.login_with_gmail') }}</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-register" role="tabpanel"
                                aria-labelledby="nav-register-tab">
                                <form id="register-form" name="register-form" class="justify-content-center mt-3"
                                    action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-6 mb-3 mt-4 ">
                                            <input type="text" class="form-control rounded8px" name="name"
                                                aria-describedby="name" placeholder="{{ trans('message.name') }}"
                                                style="background-color: #ededed; border: none;">
                                        </div>
                                        <div class="col-6 mb-3 mt-4 ">
                                            <input type="text" class="form-control rounded8px" name="surname"
                                                aria-describedby="surname" placeholder="{{ trans('message.surname') }}"
                                                style="background-color: #ededed; border: none;">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="tel"
                                                class="form-control rounded8px @error('phone') is-invalid @enderror"
                                                name="phone" aria-describedby="phone"
                                                placeholder="{{ trans('message.input_tel') }}"
                                                style="background-color: #ededed; border: none;">
                                            @error('phone')
                                                <span class="invalid-feedback pl-2" role="alert">
                                                    <strong> {{ trans('message.warn_dup_tel') }}</strong>
                                                </span>
                                                <script>
                                                    $(document).ready(function() {
                                                        $("#user-login-regis").modal('show');
                                                        document.getElementById("nav-login-tab").className = "nav-link text-center pt-4";
                                                        document.getElementById("nav-register-tab").className = "nav-link active text-center pt-4";
                                                        document.getElementById("nav-login").className = "tab-pane fade";
                                                        document.getElementById("nav-register").className = "tab-pane fade show active";
                                                    });
                                                </script>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="email"
                                                class="form-control rounded8px @error('email') is-invalid @enderror"
                                                name="email" aria-describedby="email"
                                                placeholder="อีเมล (ตัวอย่าง test@test.com)"
                                                style="background-color: #ededed; border: none;">
                                            @error('email')
                                                <span class="invalid-feedback pl-2" role="alert">
                                                    <strong> อีเมลซ้ำ</strong>
                                                </span>
                                                <script>
                                                    $(document).ready(function() {
                                                        $("#user-login-regis").modal('show');
                                                        document.getElementById("nav-login-tab").className = "nav-link text-center pt-4";
                                                        document.getElementById("nav-register-tab").className = "nav-link active text-center pt-4";
                                                        document.getElementById("nav-login").className = "tab-pane fade";
                                                        document.getElementById("nav-register").className = "tab-pane fade show active";
                                                    });
                                                </script>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="password"
                                                class="form-control rounded8px @error('password') is-invalid @enderror"
                                                name="password" aria-describedby="password"
                                                placeholder="{{ trans('message.password_min8') }}"
                                                style="background-color: #ededed; border: none;">
                                            @error('password')
                                                <span class="invalid-feedback pl-2" role="alert">
                                                    <strong> {{ trans('message.password_mismatch') }}</strong>
                                                </span>
                                                <script>
                                                    $(document).ready(function() {
                                                        $("#user-login-regis").modal('show');
                                                        document.getElementById("nav-login-tab").className = "nav-link text-center pt-4";
                                                        document.getElementById("nav-register-tab").className = "nav-link active text-center pt-4";
                                                        document.getElementById("nav-login").className = "tab-pane fade";
                                                        document.getElementById("nav-register").className = "tab-pane fade show active";
                                                    });
                                                </script>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="password"
                                                class="form-control rounded8px @error('password') is-invalid @enderror"
                                                name="password_confirmation" aria-describedby="password_confirmation"
                                                placeholder="ยืนยันรหัสผ่าน"
                                                style="background-color: #ededed; border: none;">
                                            @error('password')
                                                <span class="invalid-feedback pl-2" role="alert">
                                                    <strong> {{ trans('message.password_mismatch') }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-12 mb-3">
                                            <div class="form-check">

                                                <input class="form-check-input mt-2" type="checkbox" name="i_accept"
                                                    id="i_accept" value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    <h6><strong style="font-size: 14px;">{{ trans('message.accept') }}<a
                                                                href="#" style="color: #c75ba1;">
                                                                {{ trans('message.policy') }}</a></strong></h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 text-center">
                                            <button type="submit" name="continue" id="continue"
                                                class="btn form-control text-white rounded8px"
                                                style="background-color: #42294f;">{{ trans('message.register') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/plugins/lightbox2/js/lightbox.js"></script>
    </div>

    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            maxWidth: 300,
        })
    </script>

    <script>
        $("#addnum").click(function() {
            $("#input1").hide();
        });

        $("input[type=radio]").click(function() {
            if (($("#option2").length == 0)) {
                op1 = parseInt($('input[id=option1]:checked').data('key'));
            }
            if (($("#option2").length == 1)) {
                op1 = parseInt($('input[id=option1]:checked').data('key') * $('input[id=option2]').length) +
                    parseInt($('input[id=option2]:checked').data('key'));
            }
            // console.log($('input[id=option2]'))
            if (op1 >= 0) {
                // alert($('#price'+op1).text());
                $("#price").html('฿   ' + commaSeparateNumber($('#price' + op1).text()));
                $("#stock").html($('#stock' + op1).text());
                $("#stock_input").attr('max', $('#stock' + op1).text());
                $("#price_one").val($('#price' + op1).text());
                //  $("#margin_one").val($('#margin'+op1).text());
            }


        });

        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
            }
            return val;
        }
        $("#stock_input").keypress(function() {
            console.log(this.value);
            if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
            }
        });

        $("#stock_input").change(function() {
            var n = this.value.toString();
            n2 = n;
            var i;
            for (i = 0; i < this.value.length; i++) {
                if (n[i] < 1) {
                    n2 = n.substring(i + 1, n.length);
                } else {
                    break;
                }
            }
            this.value = n2;
        });

        // $(".check_item").change(function(){
        //     if($(".check_item").prop("checked", true)){
        //         $(this).css({"border": "#FFFFFF","background-color": "#422a4e","color": "#FFFFFF"})
        //     }
        //     else{
        //         $(this).css({"border": "#422a4e","background-color": "#FFFFFF","color": "#422a4e"})
        //     }
        // });

        $('#basket_add').add($('#buy_now')).click(function() {
            if (($("#option1").length > 0)) {
                if ($('input[id=option1]').is(':checked')) {} else {
                    $('#warning1').show();
                    $("#warning1").css("display", "inline-block");
                }
            }
            if (($('#option2').length > 0)) {
                if ($('input[id=option2]').is(':checked')) {} else {
                    $('#warning2').show();
                    $("#warning2").css("display", "inline-block");
                }
            }
        });

        $('input[id=option1]').click(function() {
            $('#warning1').hide();
        });
        $('input[id=option2]').click(function() {
            $('#warning2').hide();
        });

        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: false,
            freeMode: true,
            loopedSlides: 5, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            loop: false,
            loopedSlides: 5, //looped slides should be the same
            thumbs: {
                swiper: galleryThumbs,
            },
        });
    </script>


@stop
