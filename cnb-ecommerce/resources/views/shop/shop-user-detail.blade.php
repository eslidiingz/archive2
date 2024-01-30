@extends('layouts.default')
@section('content')

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
	.banner_product_n{
        /* background-image: url('../new_ui/img/banner_bg/banner_product_news.png'); */
        background-color: #acacac;
        width: 100%;
        background-position: right;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<div id="minHeight">
	<div class="container-fluid py-lg-4 py-md-4 py-3 banner_product_n" id="navCategoryTitle">
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <h1 class="text-dark"><strong>{{ trans('message.shop') }}</strong></h1>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="container">
		<div class="row d-lg-block d-md-none d-none">
			<div class="col-12 p-0 mt-2">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: unset;">
						<li class="breadcrumb-item"><a href="{{ url('/') }}" class="color-blue" >{{ trans('message.home') }}</a></li>
						<i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
						<li class="breadcrumb-item active" aria-current="page"><a href="{{ url('shop-user') }}" class="color-blue">{{ trans('message.shops') }}</a></li>
						<i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
						<li class="breadcrumb-item active" aria-current="page">{{$shop[0]->shop_name}}</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="col-12 px-0 mb-4 rounded8px" style="background-color: #fff;">
            <div class="row mt-4 mb-lg-2 mb-md-4 mx-0 py-3">
                <div class="col-lg-6 col-md-8 col-8  order-md-1 order-lg-1 d-flex align-items-center mb-4">
                    <div class="media d-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center justify-content-center"
                            style="width: 90px; height: 80px;">
                            <img class="align-self-start mr-3"
                            style="max-height: 100%; max-width: 100%; border: 1px solid #caced1;border-radius: 6px;"
                            src="{{ '/img/shop_profiles/' . $shop[0]->shop_pic }}" alt="" onerror="this.onerror=null;this.src='/img/no_image.png'">
                        </div>
                        <div class="media-body">
                            <p class="mb-0"><strong>{{ trans('message.sell_by') }}</strong></p>
                            <h6 class="mt-0">{{$shop[0]->shop_name }}</h6>
                            @if( $shop[0]->ated_gen_no )
                            <p class="mb-0" style="color: #666;">
                                <strong>{{ trans('message.ssmep_gen_no') }} {{ $shop[0]->ated_gen_no }}</strong>
                            </p>
                            <p class="mb-0" style="color: #666;">
                                <strong>{{ trans('message.address_province_ex') }} {{ ($shop[0]->ated_province_id) ? $shop[0]->province[0]->name_th : '' }}</strong>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-2 col-md-4 col-4 text-center d-flex align-items-center justify-content-start flex-column border-left-right-custom order-md-3 order-lg-2 mb-0">
                    <div>
                        <h6 class="pt-2 mb-0" style="color: #333;"><strong>{{ trans('message.shop_score') }}</strong></h6>
                    </div>
                    <div class="mt-auto">
                        <h1 class="mb-0"><strong class="color-blue">-</strong></h1>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-4 text-center d-md-flex d-lg-flex align-items-center justify-content-start flex-column d-lg-block d-md-block d-none order-md-4 order-lg-3 mb-0"
                    style="border-right: 1px solid #666;">
                    <div>
                        <h6 class="pt-2 mb-0" style="color: #333;"><strong>{{ trans('message.ship_on_time') }}</strong></h6>
                    </div>
                    <div class="mt-auto">
                        <h1 class="mb-0"><strong class="color-blue">-</strong></h1>
                    </div>
                </div>
                <div
                    class="col-lg-2 col-md-4 col-4 text-center d-md-flex d-lg-flex align-items-center justify-content-start flex-column d-lg-block d-md-block d-none order-md-5 order-lg-4 mb-0">
                    <div>
                        <h6 class="pt-2 mb-0" style="color: #333;"><strong>{{ trans('message.chat_reply_rate') }}</strong></h6>
                    </div>
                    <div class="mt-auto">
                        <h1 class="mb-0"><strong class="color-blue">-</strong></h1>
                    </div>
                </div>
                {{-- <div class="col-lg-2 col-md-4 col-12 order-md-2 order-lg-5 d-flex align-items-center ">
                    <div class="row w-100 mx-0">
                        <div class="col-12 px-0">
                            <a href="/shop-user-details?id={{$shop[0]->id}}" class="w-100">
                                <button class="btn form-control mb-2 text-white" style=" font-size: 14px; background-color: #333; border-radius: 10px;">
                                    <img src="/new_ui/img/icon-shop.svg" class="mr-1" alt="">{{ trans('message.go_to_shop') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
		{{-- <div class="col-12  pt-2 mb-4 mt-4" style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
			<div class="row mt-3">
				<div class="col-12 mb-2">
					<h4 style="color: #346751;"><strong>โค้ดส่วนลดจากร้านค้า</strong></h4>
				</div>
				<div class="col-12 mb-4">
					<div class="row mx-0">
						<div class="swiper-container-5" style="overflow: hidden;">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="row mx-0">
										<div class="col-8">
											<div class="row p-3" style="background-color: #f8eaf3; border-radius: 8px 8px 8px 8px;">
												<div class="col-12 text-left">
													<h6><strong>สินค้าแคมเปญเท่านั้น</strong></h6>
												</div>
												<div class="col-12 text-left">
													<h4><strong style="color: #346751;">฿300ส่วนลด</strong></h4>
												</div>
												<div class="col-12 text-left">
													<a href="#"><h6 class="mb-0" style="color: #1947e3; text-decoration: underline;">เงื่อนไข</h6></a>
												</div>
											</div>
										</div>
										<div class="col-4 px-0 img-coupon d-flex align-items-center justify-content-center" style="border-radius: 8px 8px 8px 8px;">
											<div class="row ">
												<div class="col-12">
													<h6 class=" text-center px-0" style="color: #fff; ">ซื้อขั้นต่ำ <br> 2,990</h6>
												</div>
												<div class="col-12 text-center">
													<button class="btn w-75 px-0" style="background-color: #fff; color: #346751;"><h6 class="mb-0">เก็บ</h6></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="row mx-0">
										<div class="col-8">
											<div class="row p-3" style="background-color: #f8eaf3; border-radius: 8px 8px 8px 8px;">
												<div class="col-12 text-left">
													<h6><strong>สินค้าแคมเปญเท่านั้น</strong></h6>
												</div>
												<div class="col-12 text-left">
													<h4><strong style="color: #346751;">฿300ส่วนลด</strong></h4>
												</div>
												<div class="col-12 text-left">
													<a href="#"><h6 class="mb-0" style="color: #1947e3; text-decoration: underline;">เงื่อนไข</h6></a>
												</div>
											</div>
										</div>
										<div class="col-4 px-0 img-coupon d-flex align-items-center justify-content-center" style="border-radius: 8px 8px 8px 8px;">
											<div class="row ">
												<div class="col-12">
													<h6 class=" text-center px-0" style="color: #fff; ">ซื้อขั้นต่ำ <br> 2,990</h6>
												</div>
												<div class="col-12 text-center">
													<button class="btn w-75 px-0" style="background-color: #fff; color: #346751;"><h6 class="mb-0">เก็บแล้ว</h6></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div> --}}
        <div class="row px-lg-0 px-md-0 px-0 py-4 mx-0 mb-4"
			style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
			<div class="col-12">
				<h4 style="color: #333;"><strong>{{ trans('message.all_product_in_shop') }}</strong></h4>
			</div>
        </div>

        <div class="row rounded8px py-4 px-3 px-lg-0 mx-0 align-items-center itemHidden" style="background-color: #fff;">
            <div class="col-12 mb-lg-2 mb-md-3 mb-3">
                <div class="row">
                    <div class="itemHidden">
                        <h5 class="mb-0 pl-lg-4 pl-md-0 pl-0 pt-2 font_head_item"><strong>{{ trans('message.sort_by') }}</strong></h5>
                    </div>
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group ml-3 mr-3" role="group" aria-label="a group">
                            <a href="/shop-user-details?id={{$shop[0]->id}}&sortBy=pop">
                                <button class="btn select-optine-custom form-control px-1 mx-1 @if (request('sortBy') == 'pop') active @endif">{{ trans('message.popular') }}</button>
                            </a>
                        </div>
                        <div class="btn-group mr-3" role="group" aria-label="b group">
                            <a href="/shop-user-details?id={{$shop[0]->id}}&sortBy=ctime">
                                <button class="btn select-optine-custom form-control px-1 mx-1 @if (request('sortBy') == 'ctime') active @endif">{{ trans('message.most_recent') }}</button>
                            </a>
                        </div>
                        <div class="btn-group mr-3" role="group" aria-label="c group">
                            <a href="/shop-user-details?id={{$shop[0]->id}}&sortBy=sales">
                                <button class="btn select-optine-custom form-control px-1 mx-1 @if (request('sortBy') == 'sales') active @endif">{{ trans('message.best_sale') }}</button>
                            </a>
                        </div>
                        <div class="btn-group mr-3" role="group" aria-label="d group">
                            <a href="/shop-user-details?id={{$shop[0]->id}}&sortBy=priceLess">
                                <button class="btn select-optine-custom form-control px-1 mx-1 d-lg-block d-md-none d-none @if (request('sortBy') == 'priceLess') active @endif">{{ trans('message.price_min_max') }}</button>
                            </a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Third group">
                            <a href="/shop-user-details?id={{$shop[0]->id}}&sortBy=priceMore">
                                <button class="btn select-optine-custom form-control px-1 mx-1 d-lg-block d-md-none d-none @if (request('sortBy') == 'priceMore') active @endif">{{ trans('message.price_max_min') }}</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row rounded8px py-4 mx-0 align-items-center mt-2 mb-2 itemHiddenDesktop"
                    style="background-color: #fff;">
                    <div class="col-12 mb-lg-2 mb-md-3">
                        <div class="form-row">
                            <div class="col-4">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-filter px-1 active">{{ trans('message.popular') }}</button>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-filter px-1">{{ trans('message.most_recent') }}</button>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-filter px-1">{{ trans('message.best_sale') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

		<div class="row mt-4">
			<div class="col-12">
				<div class="form-row">
					@if(count($flash_all_Shop) > 0 || count($product_all_Shop) > 0)
						@foreach($flash_all_Shop as $product)
						<div class="col-lg-2 col-md-3 col-6 mb-3 d-flex align-items-stretch">
							<a href="/flash-sale/{{$product->id}}" class="w-100">
			                    <div class="card w-100 list-product rounded8px position-relative" style="border: unset; cursor: pointer;">
			                        <div class="d-flex align-items-center justify-content-center h-200px">
			                            <img src="{{asset('/img/product/'.$product->product_img[0])}}" onerror="this.onerror=null;this.src='/img/no_image.png'" style="max-height: 100%;max-width: 100%;" alt="Card image cap">
			                        </div>
			                        <div class="card-body px-lg-3 px-md-2 px-1">
			                            <div class="col-12 mb-2">
			                                <p class="card-text mb-0 text-dot1" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}"><strong>{{ $product->name }}</strong></p>
			                                <p class="card-text mb-0 text-dot2-custom">{!! nl2br($product->description) !!}</p>
			                            </div>
			                            <div class="col-12 mb-2">
			                                <h3 class="mb-0 price_reborn_custom color-red"><strong>฿ {{ $product->product_option['price'][0]  }}</strong></h3>
			                            </div>
                                        <div class="col-12">
                                            <hr class="w-100">
			                                <p class="card-text mb-0 text-dot1" style="color: #7BCFDD;"><strong>ร้าน Wecare</strong></p>
			                            </div>
			                        </div>
			                    </div>
			                </a>
		                </div>
						<!-- <div class="col-lg-2 col-md-4 col-6 ">
							<a href="/flash-sale/{{$product->id}}">
								<div class="rounded8px px-2 "
									style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
									<div class="pt-2 rounded8px d-flex align-items-center justify-content-center h-200px">
										<img src="{{asset('/img/product/'.$product->product_img[0])}}"
											style="max-width: 100%; max-height: 100%;" alt="..."
											onerror="this.onerror=null;this.src='/img/no_image.png'">
											<img src="img/fs.png" class="position-absolute" style="top: 5px; right: 10px; width: 50px;" alt="">
									</div>
									<?php
									$allpaying = 0;
	                                $rating_person = 0;
									?>
									@foreach ($rating_group as $rating)
									<?php

	                                    if($rating['product_id'] == $product['id']){
	                                        $allpaying += $rating['rating'];
	                                        $rating_person++;
	                                    }
	                                    ?>
									@endforeach

									<div class="px-2">
										<h6 class="card-title mb-0 text-left pt-2 font_head_item" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}"
										style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; font-size: 14px !important;">
											<strong>{{ $product->name }}</strong></h6>
										<h2 class="card-text mb-0 text-left font_price" style="color: #346751; font-size: 18px !important;">
											<strong>฿{{ $product->product_option['price'][0]  }}</strong></h2>
										<h6 class="text-left mb-3 pb-2" style="height:35px !important;">

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
											<span class="mb-3" style="color: #b2b2b2;">
												({{ $rating_person }})</span>

											@else
											<?php $starpercen = 0; ?>
											<span class="mb-3 pb-4" style="color: #b2b2b2;">
												ไม่มีคะแนน</span>

											@endif
										</h6>
									</div>
								</div>
							</a>
						</div> -->
						@endforeach
					@foreach($product_all_Shop as $product)
					@if($product->status_goods == 1)

                    <div class="col-lg-2 col-md-3 col-6 mb-3 d-flex align-items-stretch">
                        <a href="/product_detail/{{ $product->id }}" class="w-100">
                            <div class="card w-100 list-product rounded8px position-relative"
                                style="border: unset; cursor: pointer;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="embed-responsive embed-responsive-1by1 position-relative"  style="overflow: hidden;border-radius: 8px;">
                                       <div class="embed-responsive-item d-flex align-items-center justify-content-center" style="overflow: hidden;">
                                        <img class="img-fluid" src="{{asset('/img/product/'.$product->product_img[0])}}" onerror="this.onerror=null;this.src='/img/no_image.png'" alt="Card image cap">

                                       </div>
                                        <?php
                                        $date1=date_create($product->created_at);
                                        $date2=date_create( date('Y-m-d') );
                                        $o_diff=date_diff($date1,$date2);

                                        if( $o_diff->d <= 7 ) {
                                    ?>
                                                <div class="position-absolute px-3 py-1"
                                                    style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;top: 5px !important; left: 5px !important; background-color: #c94b39; border-radius: 12px 0 12px 0;">
                                                    <small class="text-white">{{ trans('message.new_product') }}</small>
                                                </div>
                                                <?php
                                        }
                                    ?>
                                    </div>

                                </div>
                                <div class="card-body px-lg-3 px-md-2 px-1">
                                    <div class="col-12 mb-2">
                                        <p class="card-text mb-0 text-dot1" data-toggle="tooltip"
                                            data-placement="top" title="{{ $product->name }}">
                                            <strong>{{ $product->name }}</strong>
                                        </p>
                                        <p class="card-text mb-0 text-dot2-custom">{!! nl2br($product->description) !!}
                                        </p>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <h3 class="mb-0 price_reborn_custom color-red">
                                            <strong>฿
                                                {{ number_format(min($product->product_option['price'])) }}</strong>
                                        </h3>
                                    </div>
                                    <div class="col-12">
                                        <hr class="w-100">
                                        <p class="card-text mb-0 text-dot1" style="color: #666;">
                                            {{ trans('message.shop') }} {{ $product->shops[0]->shop_name }}
                                        </p>
                                        @if( $product->shops[0]->ated_gen_no )
				                        <p class="mb-0" style="color: #666;">
				                            <strong>{{ trans('message.ssmep_gen_no') }} {{ $product->shops[0]->ated_gen_no }}</strong>
				                        </p>
				                        <p class="mb-0" style="color: #666;">
				                            <strong>{{ trans('message.province') }} {{ ($product->shops[0]->ated_province_id) ? $product->shops[0]->province[0]->name_th : '' }}</strong>
				                        </p>
				                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

					{{-- <div class="col-lg-2 col-md-3 col-6 mb-3 d-flex align-items-stretch">
						<a href="/product_detail/{{$product->id}}" class="w-100">
		                    <div class="card w-100 list-product rounded8px position-relative" style="border: unset; cursor: pointer;">
		                        <div class="d-flex align-items-center justify-content-center h-200px">
		                            <img src="{{asset('/img/product/'.$product->product_img[0])}}" onerror="this.onerror=null;this.src='/img/no_image.png'" style="max-height: 100%;max-width: 100%;" alt="Card image cap">
		                        </div>
		                        <div class="card-body px-lg-3 px-md-2 px-1">
		                            <div class="col-12 mb-2">
		                                <p class="card-text mb-0 text-dot1" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}"><strong>{{ $product->name }}</strong></p>
		                                <p class="card-text mb-0 text-dot2-custom">{!! nl2br($product->description) !!}</p>
		                            </div>
		                            <div class="col-12 mb-2">
		                                <h3 class="mb-0 price_reborn_custom color-red"><strong>฿ {{ $product->product_option['price'][0]  }}</strong></h3>
		                            </div>
                                    <div class="col-12">
                                        <hr class="w-100">
		                                <p class="card-text mb-0 text-dot1" style="color: #7BCFDD;"><strong>ร้าน Wecare</strong></p>
		                            </div>
		                        </div>
		                    </div>
		                </a>
	                </div> --}}
					<!-- <div class="col-lg-2 col-md-4 col-6 ">
						<a href="/product/{{$product->id}}">
							<div class="rounded8px px-2 "
								style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
								<div class="pt-2 rounded8px d-flex align-items-center justify-content-center h-200px">
									<img src="{{asset('/img/product/'.$product->product_img[0])}}"
										style="max-width: 100%; max-height: 100%;" alt="..."
										onerror="this.onerror=null;this.src='/img/no_image.png'">
								</div>
								<?php
								$allpaying = 0;
                                $rating_person = 0;
								?>
								@foreach ($rating_group as $rating)
								<?php

                                    if($rating['product_id'] == $product['id']){
                                        $allpaying += $rating['rating'];
                                        $rating_person++;
                                    }
                                    ?>
								@endforeach

								<div class="px-2">
									<h6 class="card-title mb-0 text-left pt-2 font_head_item" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}"
									style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; font-size: 14px !important;">
										<strong>{{ $product->name }}</strong></h6>
									<h2 class="card-text mb-0 text-left font_price" style="color: #d61900; font-size: 18px !important; padding-top: 2px;">
										<strong>฿{{ $product->product_option['price'][0]  }}</strong></h2>
									<h6 class="text-left mb-3 pb-2" style="height:35px !important;">

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
										<span class="mb-3" style="color: #b2b2b2;">
											({{ $rating_person }})</span>

										@else
										<?php $starpercen = 0; ?>
										<span class="mb-3 pb-4" style="color: #b2b2b2;">
											ไม่มีคะแนน</span>

										@endif
									</h6>
								</div>
							</div>
						</a>
					</div> -->
					@endif
					@endforeach
					@else

						<div class="col-12 mb-4 text-center">
							<h4 class="mt-0"><strong style="color: #acb0b4;">{{ trans('message.no_product') }}</strong></h4>
						</div>

					@endif
				</div>
				<!-- Pagination -->

			</div>
		</div>
	</div>
</div>

<script>
	var swiper = new Swiper('.swiper-container-5', {
		slidesPerView: 3,
		spaceBetween: 30,
		slidesPerGroup: 1,
		autoplay: {
			delay: 3500,
			disableOnInteraction: false,
		},
		loop: true,
		loopFillGroupWithBlank: true,

		breakpoints: {
			0: {
				slidesPerView: 1,
				spaceBetween: 20,
			},
			320: {
				slidesPerView: 1,
				spaceBetween: 20,
			},
			640: {
				slidesPerView: 3,
				spaceBetween: 20,
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 40,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 50,
			},
			1200: {
				slidesPerView: 4,
				spaceBetween: 50,
			},
		}
	});
</script>
@stop
