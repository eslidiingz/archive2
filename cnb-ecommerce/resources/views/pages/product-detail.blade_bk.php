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
		.h_img_detail_custom{
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
		.h_img_detail_custom{
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
		.h_img_detail_custom{
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
		.h_img_detail_custom{
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
		.h_img_detail_custom{
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
		.h_img_detail_custom{
			height: 320px;
		}
	}


	a.nav-item.active .btn-outline-secondary {
		background-color: unset !important;
		border: 1px solid #346751;
		color: #346751;
	}

	a.nav-item:hover .btn-outline-secondary {
		background-color: unset !important;
		border: 1px solid #346751;
		color: #346751;
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
	<div class="row ">
		<div class="col-xl-8 col-lg-10 col-md-12 col-12 mx-auto">
			<div class="row">
				<div class="col-12 px-lg-4 px-md-0 px-sm-0 mb-4"
					style="background-color: #fff; border-radius: 0 0 8px 8px;">
					<div class="row d-lg-block d-md-none d-none">
						<div class="col-12 mt-4">
							@include('component.breadcrumb')
							@if(session('msgStock_PreOrder'))
							<div class="row">
								<div class="col-12 my-4">
									<div class="alert alert-danger" role="alert">
										การแจ้งเตือน : {{ session('msgStock_PreOrder') }}
									</div>
								</div>
							</div>
							@endif
						</div>
					</div>

					<div class="row p-lg-0 p-md-4 p-0">
						<div class="col-lg-4 col-md-12 col-12 mb-lg-0 mb-md-4 mb-4 mt-4 mt-md-0 mt-lg-0">
							<div class="swiper-container gallery-top">
								<div class="swiper-wrapper">
									@foreach ($product[0]->product_img as $front_image)
									<div class="swiper-slide" style="cursor: pointer;">
										<div class="d-flex align-items-center justify-content-center ">
											<div class="gallery h_img_detail_custom">
												<a class="big d-flex flex-row align-items-center h_img_detail_custom" href="/img/product/{{$front_image}}">
													<img src="/img/product/{{$front_image}}" alt=""
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

									@foreach ($product[0]->product_img as $front_image)
                                        <div class="swiper-slide" style="cursor: pointer;">
                                            <div class="d-flex align-items-center justify-content-center h-product-detail"
                                                style=" width: 100%;">
                                                <img src="/img/product/{{$front_image}}" alt=""
                                                    style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </div>
									@endforeach

								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-12 col-12 ">
							<div class="row">
								<div class="col-12">
									<h5 class="font_head_item"><strong>{{$product[0]->name }}</strong></h5>
								</div>
								<div class="col-12 d-flex flex-row align-items-center mb-2">
									{{-- discount product function--}}
									{{-- <div class="mr-4"> --}}
									{{-- <h6 class="mb-0" style="color: #b1b7bc; text-decoration:line-through;">25,000 บาท</h6> --}}
									{{-- </div> --}}
									{{-- end discount product --}}

									<div class="mr-4">
										<div class="d-flex align-items-end">
											<span>ราคา </span>
											<h4 id="price" class="mb-0 mx-2 font_price" style="color: #d61900;">
												<strong>{{number_format(min($product[0]->product_option['price']))}}
													{{$product[0]->product_unit}}</strong></h4>
											<span> บาท</span>
										</div>
										{{-- <h6  class="mb-0" style="color: #346751;"> บาท / {{$product[0]->product_unit}}
										</h6> --}}
										@foreach ($product[0]->product_option['price'] as $key=>$item)
										<h6 id="price{{$key}}" style="display: none">{{$item}}</h6>
										@endforeach
									</div>

									{{-- <div class="px-2 py-0 rounded8px text-white" style="background-color: #c40000;">
												ส่วนลด 30%
											</div> --}}
								</div>

								<div class="col-12 d-flex flex-row align-items-center">
									@foreach ($product[0]->product_option['stock'] as $key=>$item)
									<h3 id="stock{{$key}}" style="display: none">{{$item}}</h3>

									@endforeach
									<div class="mr-lg-4 mr-md-2 mr-2 d-flex align-items-center flex-row">

										@if($starpercen > 0)
										<h5 class="mb-0 mr-2" style="color: #f6c100;">
											<strong>{{ number_format(($starpercen*5)/100,1) }}</strong></h5>
										<div class="rating d-flex align-items-center">
											<div class="rating-upper" style="width: {{ $starpercen }}%">
												<span style="font-size: 22px;">★★★★★</span>
											</div>
											<div class="rating-lower">
												<span style="font-size: 22px;">★★★★★</span>
											</div>
										</div>
										@else
										<span style="color: #b1b7bc;">ไม่มีคะแนน</span>
										@endif

										<div class="ml-lg-4 ml-md-2 ml-2" style="color: #b1b7bc;">|</div>
									</div>
									{{-- <div class="mr-lg-4 mr-md-2 mr-2 d-flex align-items-center flex-row">
                                        <h5 class="mb-0 mr-2"><strong>0</strong></h5>
                                        <h6 class="mb-0" style="color: #b1b7bc;"><span
                                                class="font-btn-custom">ความคิดเห็น</span></h6>
                                        <div class="ml-lg-4 ml-md-2 ml-2" style="color: #b1b7bc;">|</div>
                                    </div>
                                    <div class="d-flex align-items-center flex-row">
                                        <h5 class="mb-0 mr-2"><strong>0</strong></h5>
                                        <h6 class="mb-0" style="color: #b1b7bc;"><span
                                                class="font-btn-custom">ขายแล้ว</span></h6>
                                    </div> --}}
								</div>

								<div class="col-12">
									<hr class="w-100">
								</div>

								<div class="col-12 d-flex flex-row align-items-center">
									<div class="row align-items-center">
										<div class="col-lg-12 col-md-12 col-12 mb-3">
											<h6 class="mb-0"><strong>ส่งจาก : &nbsp;</strong>
												{{$product[0]->shops[0]->shop_name }}</h6>
										</div>
										{{-- <div class="col-lg-7 col-md-12 col-12 px-1"> --}}
										{{-- <h6 class="mb-0">{{$product[0]->shops[0]->shop_name }}</h6> --}}
										{{-- <div class="btn-group"> --}}

										{{-- <button  class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															{{$product[0]->shops[0]->shop_name }}
										</button> --}}
										{{-- </div> --}}
										{{-- </div> --}}
										<div class="col-lg-5 col-md-12 col-12">
											<h6 class="mb-0"><strong>ค่าส่ง : &nbsp;</strong></h6>
										</div>
										<div class="col-lg-7 col-md-12 col-12 px-1">
											{{-- price --}}
										</div>
									</div>
								</div>

								<div class="col-12">
									<hr class="w-100">
								</div>
								<div class="col-12 px-0">
									<form action="{{ route('basket')}}">
										<div class="col-12">
											<div class="row mx-0">
												<div class="col-12 mb-2 px-0">
													<div class="row align-items-center">

														@if (isset($product[0]->product_option['option1']))

														<div class="col-lg-2 col-md-12 col-12 mb-2">
															<h6 class="mb-0" id="dis1">
																<strong>{{$product[0]->product_option['option1']}}
																	:</strong>
															</h6>
														</div>
														<div data-toggle="buttons"
															class="col-lg-9 col-md-6 col-12 mb-2">
															@foreach ($product[0]->product_option['dis1'] as
															$key=>$item)
															<label
																class="btn-outline-422a4e btn form-control btn-outline-secondary "
																style="width: auto;">
																{{-- @if ($key == 0)
		                                                                                <input checked required type="radio" id="option1" name="{{$product[0]->product_option['option1']}}"
																value="{{$key}}" style="display: none">
																@else --}}

																{{-- @endif --}}
																<input required type="radio" data-key="{{$key}}"
																	id="option1" name="dis1" value="{{$item}}"
																	style="display: none">
																<div class="mb-0">{{$item}}</div>
															</label>
															@endforeach

															<h6 class="text-danger regular ml-2"
																style="font-size:14px; display: none;" id="warning1">
																เลือกตัวเลือกเพื่อซื้อสินค้า</h6>
														</div>
														@endif
													</div>
												</div>
												{{-- end option 1 --}}


												<div class="col-12 mb-2 px-0">
													<div class="row align-items-center">
														@if (isset($product[0]->product_option['option2']))
														<div class="col-lg-2 col-md-12 col-12 mb-2">
															<h6 class="mb-0" id="dis2">
																<strong>{{$product[0]->product_option['option2']}}
																	:</strong>
															</h6>
														</div>
														<div data-toggle="buttons"
															class="col-lg-9 col-md-12 col-12 mb-2">
															@foreach ($product[0]->product_option['dis2'] as
															$key=>$item)
															<label
																class="btn-outline-422a4e btn form-control btn-outline-secondary "
																style="width: auto;">
																{{-- @if ($key == 0)
		                                                                    <input checked required type="radio" id="option2"  name="{{$product[0]->product_option['option2']}}"
																value="{{$key}}" style="display: none">
																@else --}}
																{{-- @endif --}}
																<input required type="radio" data-key="{{$key}}"
																	id="option2" name="dis2" value="{{$item}}"
																	style="display: none">
																<h6 class="mb-0">{{$item}}</h6>
															</label>
															@endforeach
															<h6 class="text-danger regular ml-2"
																style="font-size:14px; display: none;" id="warning2">
																เลือกตัวเลือกเพื่อซื้อสินค้า</h6>
														</div>
														@endif
													</div>
												</div>
												{{-- end option 2 --}}

												<div class="col-12 mb-3 px-0">
													<div class="row align-items-center ">
														<div class="col-lg-2 col-md-12 col-12 mb-2">
															<h6 id="addnum" class="mb-0"><strong>จำนวน</strong></h6>
														</div>
														<div class="col-lg-3 col-md-6 col-5 d-flex flex-row">
															<input max="{{max($product[0]->product_option['stock'])}}"
																style="text-align: center" value="1" min="1"
																name="amount" type="number"
																class="form-control d-inline-block mr-4 py-0 px-2"
																id="stock_input" placeholder="จำนวน">
														</div>

														<div class="col-lg-6 col-md-6 col-7 ml-auto">
															<strong>

																<div style="display: none">
																	{{ $total = 0 }}
																	@foreach ($product[0]->product_option['stock'] as
																	$stock_key
																	=>
																	$item)
																	{{$total += $item}}
																	@endforeach
																</div>

																<div class="black light  d-inline-block ml-3">
																	มีสินค้าทั้งหมด :
																</div>

																<div class="black light  d-inline-block ml-3"
																	id="stock">
																	{{$total}}
																	{{-- <input type="hidden" name="stock" value="{{$total}}">
																	--}}
																</div>
															</strong>
														</div>

														<input type="hidden" name="shop_id"
															value="{{$product[0]->shops[0]->id}}">
														<input type="hidden" id="price_one" name="price"
															value="{{min($product[0]->product_option['price'])}}">
														@if (isset($product[0]->product_option['margin']))
															<input type="hidden" id="margin_one" name="margin"
															value="{{min($product[0]->product_option['margin'])}}">
														@endif

														@if (isset($product[0]->product_option['option1']))
														<input type="hidden" name="option1"
															value="{{$product[0]->product_option['option1']}}">
														@endif
														@if (isset($product[0]->product_option['option2']))
														<input type="hidden" name="option2"
															value="{{$product[0]->product_option['option2']}}">
														@endif
														<input type="hidden" name="product_id"
															value="{{$product[0]->id}}">
														{{-- <input type="hidden" name="stock_key" value="{{$stock_key}}">
														--}}
													</div>
												</div>
											</div>
										</div>
										{{-- count product --}}

										<div class="col-12 ">
											<div class="form-row">
												@auth

												@if($product[0]->status_goods == '2')
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<button class="form-control text-white" id="" name="" value="1" type="submit"
														disabled>
														ใส่ตะกร้า
													</button>
												</div>
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<button class="form-control text-white" id="" name="" value="2" type="submit"
														disabled>
														<div name="which_btn">
															ซื้อเลย
														</div>
														@php
														$time = new DateTime();
														@endphp
														<input type="hidden" name="type"
															value="{{ $product[0]->type }}">
														<input type="hidden" name="type"
															value="{{ $product[0]->type }}">
													</button>
												</div>
												@else
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<button class="btn-f8eaf3 btn form-control text-white" id="basket_add"
														name="which_btn" value="1" type="submit">
														<img value="1" style="margin-top: -4px; width: 20px;"
															src="/new_ui/img/menu/icon-sub-menu-user-1.svg" alt="">
														ใส่ตะกร้า
													</button>
												</div>
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<button class="btn-f8eaf3 btn form-control text-white" id="buy_now"
														name="which_btn" value="2" type="submit">
														<div name="which_btn">
															ซื้อเลย
														</div>
														<input type="hidden" name="type"
															value="{{ $product[0]->type }}">
														<input type="hidden" name="end_date"
															value="{{ $product[0]->end_date }}">
														<input type="hidden" name="time_period"
															value="{{ $product[0]->time_period }}">
													</button>
												</div>
												@if($product[0]->receive_product == 'receive' && $product[0]->type ==
												'flashsale')
												<div class="col-lg-6 col-md-6 col-12 mb-2 pr-lg-1">
													<button class="btn-f8eaf3 btn form-control" id="which_btn"
														name="which_btn" value="5" type="submit">
														<div name="which_btn">
															ซื้อสินค้า(รับสินค้าหน้างาน)
														</div>

														<input type="hidden" name="type"
															value="{{ $product[0]->type }}">
														<input type="hidden" name="end_date"
															value="{{ $product[0]->end_date }}">
														<input type="hidden" name="time_period"
															value="{{ $product[0]->time_period }}">
														<input type="hidden" name="receive_product"
															value="{{ $product[0]->receive_product }}">
													</button>
												</div>
												@endif
												@endif
												@endauth
												@guest
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<div class="btn-f8eaf3 btn form-control">
														<a class="col p-1 text-white" data-toggle="modal"
															data-target="#user-login-regis" aria-haspopup="true"
															aria-expanded="false">
															<img style="margin-top: -4px; width: 20px;"
																src="/new_ui/img/menu/icon-sub-menu-user-1.svg" alt="">
															ใส่ตะกร้า
														</a>
													</div>
												</div>
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<div class="btn-f8eaf3 btn form-control text-white">
														<a class="col p-1" data-toggle="modal"
															data-target="#user-login-regis" aria-haspopup="true"
															aria-expanded="false">
															ซื้อเลย
														</a>
													</div>
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
				<div class="col-12 px-4 " style="background-color: #fff; border-radius: 8px 8px 0px 0px;">
					<div class="row">
						<div class="col-12 my-3">
							<h5 class="mb-0 font_head_item" style="color: #346751;"><strong>รายละเอียด</strong></h5>
						</div>
						<hr>
					</div>
				</div>

				<div class="col-12 px-4 mb-4"
					style="background-color: #fff; border-radius: 0 0 8px 8px; border-top: 3px solid #dfe1e3;">
					<div class="row">
						<div class="col-12 mt-4">
							<h6 class="font_head_item"><strong>ข้อมูลของสินค้า</strong></h6>
						</div>
						<div class="col-12 d-flex flex-row align-items-center mb-2">
							<div class="d-flex align-items-center flex-row">
								<div style="width: 100px;">
									<h6 class="mb-0"><strong style="color: #b1b7bc;">หมวดหมู่</strong></h6>
								</div>
								<div>
									<h6 class="mb-0">
										{{$breadcrumb_item[0]['name']}} / {{$breadcrumb_item[1]['name']}}

									</h6>
								</div>
							</div>
						</div>
						<div class="col-12 d-flex flex-row align-items-center mb-2">
							<div class="d-flex align-items-center flex-row">
								<div style="width: 100px;">
									<h6 class="mb-0"><strong style="color: #b1b7bc;">จำนวนสินค้า</strong></h6>
								</div>
								<div>
									<h6 class="mb-0">{{ $total }}</h6>
								</div>
							</div>
						</div>
						<div class="col-12 d-flex flex-row align-items-center mb-2">
							<div class="d-flex align-items-center flex-row">
								<div style="width: 100px; ">
									<h6 class="mb-0"><strong style="color: #b1b7bc;">ส่งจาก</strong></h6>
								</div>
								<div>
									<!-- <h6 class="mb-0">{{$product[0]->shops[0]->shop_name }}</h6> -->
									<h6 class="mb-0">Bird Express</h6>
								</div>
							</div>
						</div>

						<div class="col-12" style="font-family: 'Kanit' !important;">
							<h6 class="font_head_item"><strong>รายละเอียดสินค้า</strong></h6>
							<p style="font-family: 'Kanit' !important;">
								{!! nl2br($product[0]->description) !!}
							</p>
						</div>
					</div>
				</div>
				{{-- end detail product --}}

				<div class="col-12 px-4 mb-4 " style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
					<div class="row mt-4 mb-lg-2 mb-md-4 mb-4">
						<div class="col-lg-4 col-md-8 col-8 mb-4  order-md-1 order-lg-1">
							<div class="media">
								<div class="d-flex align-items-center justify-content-center"
									style="width: 110px; height: 80px;">
									<img class="align-self-start mr-3"
										style="max-height: 100%; max-width: 100%; border: 1px solid #caced1;"
										src="{{('/img/shop_profiles/'.$product[0]->shops[0]->shop_pic) }}" alt="">
								</div>
								<div class="media-body">
									<p class="mb-0">จัดจำหน่ายโดย</p>
									<h6 class="mt-0"><strong>{{$product[0]->shops[0]->shop_name }}</strong></h6>
								</div>
							</div>
						</div>
						<div
							class="col-lg-2 col-md-4 col-4 text-center d-flex align-items-center justify-content-start flex-column mb-4 border-left-right-custom order-md-3 order-lg-2">
							<div>
								<h6 class="pt-2 mb-0" style="color: #acb0b4;">คะแนนร้านค้า</h6>
							</div>
							<div class="mt-auto">
								<h1 class="mb-0"><strong style="color: #346751;">-</strong></h1>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-4 text-center d-md-flex d-lg-flex align-items-center justify-content-start flex-column mb-4 d-lg-block d-md-block d-none order-md-4 order-lg-3"
							style="border-right: 1px solid #caced1;">
							<div>
								<h6 class="pt-2 mb-0" style="color: #acb0b4;">จัดส่งตรงเวลา</h6>
							</div>
							<div class="mt-auto">
								<h1 class="mb-0"><strong style="color: #346751;">-</strong></h1>
							</div>
						</div>
						<div
							class="col-lg-2 col-md-4 col-4 text-center d-md-flex d-lg-flex align-items-center justify-content-start flex-column mb-4 d-lg-block d-md-block d-none order-md-5 order-lg-4">
							<div>
								<h6 class="pt-2 mb-0" style="color: #acb0b4;">อัตราการตอบแชท</h6>
							</div>
							<div class="mt-auto">
								<h1 class="mb-0"><strong style="color: #346751;">-</strong></h1>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-12 order-md-2 order-lg-5">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-12">
									<a class="btn-outline-c45e9f btn form-control mb-2" style=" font-size: 14px;"
										href="/shop-user-details?id={{$product[0]->shops[0]->id}}"><img
											src="/new_ui/img/icon-shop.svg" style="width: 20px;" class="mr-1"
											alt="">ไปที่ร้านค้า</a>
								</div>
								{{-- <div class="col-lg-12 col-md-12 col-12">
	                                                    <div class="btn-outline-062254 btn form-control"><img
	                                                            src="/new_ui/img/icon-chat.svg" style="width: 20px;" class="mr-2"
	                                                            alt="">แชทเลย</div>
	                                                </div> --}}
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-12 px-4 " style="background-color: #fff; border-radius: 8px 8px 0px 0px;">
					<div class="row">
						<div class="col-6 my-3 d-flex align-items-center">
							<h5 class="mb-0" style="color: #d61900;"><strong>คะแนนของสินค้า</strong></h5>
						</div>
                        <div class="col-6 my-3 d-flex flex-row justify-content-end">
                            @if($starpercen > 0)
                            <h5 class="mb-0 mr-2 d-flex align-items-center" style="color: #f6c100;">
                                <strong>{{ number_format(($starpercen*5)/100,1) }}</strong></h5>
                            <div class="rating d-flex align-items-center">
                                <div class="rating-upper" style="width: {{ $starpercen }}%">
                                    <span style="font-size: 22px;">★★★★★</span>
                                </div>
                                <div class="rating-lower">
                                    <span style="font-size: 22px;">★★★★★</span>
                                </div>
                            </div>
                            @else
                            <span style="color: #b1b7bc;">ไม่มีคะแนน</span>
                            @endif
                        </div>
					</div>
				</div>
				<div class="col-12 px-4 mb-1"
					style="background-color: #fff; border-radius: 0 0 8px 8px; border-top: 3px solid #dfe1e3;">
					<div class="row my-4">
						{{-- <div class="col-lg com-md-6 col-6 px-1 order-lg-0 order-md-0 order-0">
							<div class="btn-outline-c45e9f btn form-control mb-2 mr-2 d-flex flex-row justify-content-center">ทั้งหมด <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
						</div>
						<div class="col-lg com-md col px-1 order-lg-1 order-md-2 order-2">
							<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">5 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
						</div>
						<div class="col-lg com-md col px-1 order-lg-2 order-md-3 order-3">
							<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">4 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
						</div>
						<div class="col-lg com-md col px-1 order-lg-3 order-md-4 order-4">
							<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">3 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
						</div>
						<div class="col-lg com-md col px-1 order-lg-4 order-md-5 order-5">
							<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">2 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
						</div>
						<div class="col-lg com-md col px-1 order-lg-5 order-md-6 order-6">
							<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">1 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
						</div>
						<div class="col-lg com-md col-6 px-1 order-lg-6 order-md-1 order-1">
							<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">รูปภาพ <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
						</div> --}}
						@if (isset($rating_data))
						<div class="col-12">
							<nav>
								<div class="nav nav-tabs row" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active col-lg com-md-6 col-6 px-1 order-lg-0 order-md-0 order-0 pt-0"
										id="nav-tab-1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1"
										aria-selected="true">
										<div
											class="btn-outline-secondary btn form-control mb-lg-2 mb-md-0 mb-0 mr-2 d-flex flex-row justify-content-center ">
											ทั้งหมด <span
												class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data) }})</span>
										</div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-1 order-md-2 order-2 pt-0"
										id="nav-tab-2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											5 ดาว <span
												class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',5)) }})</span>
										</div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-2 order-md-3 order-3 pt-0"
										id="nav-tab-3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											4 ดาว <span
												class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',4)) }})</span>
										</div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-3 order-md-4 order-4 pt-0"
										id="nav-tab-4" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											3 ดาว <span
												class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',3)) }})</span>
										</div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-4 order-md-5 order-5 pt-0"
										id="nav-tab-5" data-toggle="tab" href="#nav-5" role="tab" aria-controls="nav-5"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											2 ดาว <span
												class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',2)) }})</span>
										</div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-5 order-md-6 order-6 pt-0"
										id="nav-tab-6" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-6"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											1 ดาว <span
												class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('rating',1)) }})</span>
										</div>
									</a>
									<a class="nav-item nav-link col-lg com-md col-6 px-1 order-lg-6 order-md-1 order-1 pt-0"
										id="nav-tab-7" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-7"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-lg-2 mb-md-0 mb-0  mr-2 px-1 d-flex flex-row justify-content-center">
											รูปภาพ <span
												class="d-lg-block d-md-none d-none">&nbsp;({{ count($rating_data->where('picture','!=',null)) }})</span>
										</div>
									</a>
								</div>
							</nav>
						</div>
						@else
						<div class="col-12">
							<nav>
								<div class="nav nav-tabs row" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active col-lg com-md-6 col-6 px-1 order-lg-0 order-md-0 order-0 pt-0"
										id="nav-tab-1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1"
										aria-selected="true">
										<div
											class="btn-outline-secondary btn form-control mb-lg-2 mb-md-0 mb-0 mr-2 d-flex flex-row justify-content-center ">
											ทั้งหมด <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-1 order-md-2 order-2 pt-0"
										id="nav-tab-2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											5 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-2 order-md-3 order-3 pt-0"
										id="nav-tab-3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											4 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-3 order-md-4 order-4 pt-0"
										id="nav-tab-4" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											3 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-4 order-md-5 order-5 pt-0"
										id="nav-tab-5" data-toggle="tab" href="#nav-5" role="tab" aria-controls="nav-5"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											2 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
									</a>
									<a class="nav-item nav-link col-lg com-md col px-1 order-lg-5 order-md-6 order-6 pt-0"
										id="nav-tab-6" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-6"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">
											1 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
									</a>
									<a class="nav-item nav-link col-lg com-md col-6 px-1 order-lg-6 order-md-1 order-1 pt-0"
										id="nav-tab-7" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-7"
										aria-selected="false">
										<div
											class="btn-outline-secondary btn form-control mb-lg-2 mb-md-0 mb-0 mr-2 px-1 d-flex flex-row justify-content-center">
											รูปภาพ <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
									</a>
								</div>
							</nav>
						</div>
						@endif
					</div>
				</div>
				<div class="col-12">
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-tab-1">
							{{-- comment rating --}}
							@if(isset($rating_data) && count($rating_data) > 0)
							<div class="row">
								<div class="col-12 p-4 mb-4 "
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									@foreach ($rating_data as $item)
									@foreach ($user_data as $item1)
									@foreach ($inv_data as $item2)
									@if ($item->user_id == $item1->id)
									@if ($item->invs_id == $item2->id)
									<div class="row">
										<div class="col-12">
											<div class="media">
												<div style="height: 50px;">
                                                    <img src="{{('/img/profile/'.$item1->user_pic) }}"
                                                    style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;" class="align-self-start mr-3" alt="...">
                                                </div>
												<div class="media-body d-flex flex-row">
													<div>
														<h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
														{{-- <p class="mb-0" style="color: #f6c100;">
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                    </p> --}}
														@php
														$percent = 0;
														$percent = ($item->rating /5) * 100;
														@endphp
														<div class="rating d-flex align-items-center">
															<div class="rating-upper" style="width: {{ $percent }}%">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
															<div class="rating-lower">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
														</div>
													</div>
													@foreach ($item2->inv_products as $value)
													@if ($value['product_id'] == $item->product_id)
													@if (!isset($value['type']) || $value['type'] != '')
													@if (isset($value['dis1']) || $value['dis1'] != '')
													@if (isset($value['dis2']) || $value['dis2'] != '')
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
													</div>
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}</h6>
													</div>
													@endif
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															ไม่มีตัวเลือกสินค้า</h6>
													</div>
													@endif
													@endif
													@endif
													@endforeach
												</div>
												{{-- <div>
					                                                <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
					                                            </div> --}}
											</div>
										</div>

										{{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
					                                        {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
					                                    </div> --}}
										<div class="col-12 mt-2">
											<h6>{{ $item->comment }}</h6>
										</div>
										<div class="col-12 d-flex flex-row">
											@if (isset($item->picture))
											@foreach (json_decode($item->picture) as $value)
											<div class="gallery">
												<a class="big" href="{{('/img/rating/'.$value) }}">
													<img src="{{('/img/rating/'.$value) }}"
														class="img-fluid rounded8px mr-2"
														style="width: 60px; height:60px;" alt="">
												</a>
											</div>
											@endforeach
											@endif
										</div>
										<div class="col-12 mt-2">
											<p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
										</div>
										<div class="col-12">
											<hr class="w-100">
										</div>
									</div>
									@endif
									@endif
									@endforeach
									@endforeach
									@endforeach
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-12 p-4 mb-4 text-center"
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									<h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
								</div>
							</div>
							@endif
							{{-- end comment rating --}}
						</div>
						<div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-tab-2">
							{{-- comment rating --}}
							@if(isset($rating_data) && count($rating_data->where('rating',5)) > 0)
							<div class="row">
								<div class="col-12 p-4 mb-4 "
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									@foreach ($rating_data->where('rating',5) as $item)
									@foreach ($user_data as $item1)
									@foreach ($inv_data as $item2)
									@if ($item->user_id == $item1->id)
									@if ($item->invs_id == $item2->id)
									<div class="row">
										<div class="col-12">
											<div class="media">
												<div style="height: 50px;">
                                                    <img src="{{('/img/profile/'.$item1->user_pic) }}"
                                                    style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;" class="align-self-start mr-3" alt="...">
                                                </div>
												<div class="media-body d-flex flex-row">
													<div>
														<h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
														{{-- <p class="mb-0" style="color: #f6c100;">
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                    </p> --}}
														@php
														$percent = 0;
														$percent = ($item->rating /5) * 100;
														@endphp
														<div class="rating d-flex align-items-center">
															<div class="rating-upper" style="width: {{ $percent }}%">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
															<div class="rating-lower">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
														</div>
													</div>
													@foreach ($item2->inv_products as $value)
													@if ($value['product_id'] == $item->product_id)
													@if (!isset($value['type']) || $value['type'] != '')
													@if (isset($value['dis1']) || $value['dis1'] != '')
													@if (isset($value['dis2']) || $value['dis2'] != '')
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
													</div>
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}</h6>
													</div>
													@endif
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															ไม่มีตัวเลือกสินค้า</h6>
													</div>
													@endif
													@endif
													@endif
													@endforeach
												</div>
												{{-- <div>
					                                                <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
					                                            </div> --}}
											</div>
										</div>

										{{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
					                                        {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
					                                    </div> --}}
										<div class="col-12 mt-2">
											<h6>{{ $item->comment }}</h6>
										</div>
										<div class="col-12 d-flex flex-row">
											@if (isset($item->picture))
											@foreach (json_decode($item->picture) as $value)
											<div class="gallery">
												<a class="big" href="{{('/img/rating/'.$value) }}">
													<img src="{{('/img/rating/'.$value) }}"
														class="img-fluid rounded8px mr-2"
														style="width: 60px; height:60px;" alt="">
												</a>
											</div>
											@endforeach
											@endif
										</div>
										<div class="col-12 mt-2">
											<p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
										</div>
										<div class="col-12">
											<hr class="w-100">
										</div>
									</div>
									@endif
									@endif
									@endforeach
									@endforeach
									@endforeach
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-12 p-4 mb-4 text-center"
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									<h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
								</div>
							</div>
							@endif
							{{-- end comment rating --}}
						</div>
						<div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-tab-3">
							{{-- comment rating --}}
							@if(isset($rating_data) && count($rating_data->where('rating',4)) > 0)
							<div class="row">
								<div class="col-12 p-4 mb-4 "
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									@foreach ($rating_data->where('rating',4) as $item)
									@foreach ($user_data as $item1)
									@foreach ($inv_data as $item2)
									@if ($item->user_id == $item1->id)
									@if ($item->invs_id == $item2->id)
									<div class="row">
										<div class="col-12">
											<div class="media">
												<div style="height: 50px;">
                                                    <img src="{{('/img/profile/'.$item1->user_pic) }}"
                                                    style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;" class="align-self-start mr-3" alt="...">
                                                </div>
												<div class="media-body d-flex flex-row">
													<div>
														<h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
														{{-- <p class="mb-0" style="color: #f6c100;">
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                    </p> --}}
														@php
														$percent = 0;
														$percent = ($item->rating /5) * 100;
														@endphp
														<div class="rating d-flex align-items-center">
															<div class="rating-upper" style="width: {{ $percent }}%">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
															<div class="rating-lower">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
														</div>
													</div>
													@foreach ($item2->inv_products as $value)
													@if ($value['product_id'] == $item->product_id)
													@if (!isset($value['type']) || $value['type'] != '')
													@if (isset($value['dis1']) || $value['dis1'] != '')
													@if (isset($value['dis2']) || $value['dis2'] != '')
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
													</div>
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}</h6>
													</div>
													@endif
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															ไม่มีตัวเลือกสินค้า</h6>
													</div>
													@endif
													@endif
													@endif
													@endforeach
												</div>
												{{-- <div>
					                                                <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
					                                            </div> --}}
											</div>
										</div>

										{{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
					                                        {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
					                                    </div> --}}
										<div class="col-12 mt-2">
											<h6>{{ $item->comment }}</h6>
										</div>
										<div class="col-12 d-flex flex-row">
											@if (isset($item->picture))
											@foreach (json_decode($item->picture) as $value)
											<div class="gallery">
												<a class="big" href="{{('/img/rating/'.$value) }}">
													<img src="{{('/img/rating/'.$value) }}"
														class="img-fluid rounded8px mr-2"
														style="width: 60px; height:60px;" alt="">
												</a>
											</div>
											@endforeach
											@endif
										</div>
										<div class="col-12 mt-2">
											<p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
										</div>
										<div class="col-12">
											<hr class="w-100">
										</div>
									</div>
									@endif
									@endif
									@endforeach
									@endforeach
									@endforeach
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-12 p-4 mb-4 text-center"
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									<h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
								</div>
							</div>
							@endif
							{{-- end comment rating --}}
						</div>
						<div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-tab-4">
							{{-- comment rating --}}
							@if(isset($rating_data) && count($rating_data->where('rating',3)) > 0)
							<div class="row">
								<div class="col-12 p-4 mb-4 "
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									@foreach ($rating_data->where('rating',3) as $item)
									@foreach ($user_data as $item1)
									@foreach ($inv_data as $item2)
									@if ($item->user_id == $item1->id)
									@if ($item->invs_id == $item2->id)
									<div class="row">
										<div class="col-12">
											<div class="media">
												<div style="height: 50px;">
                                                    <img src="{{('/img/profile/'.$item1->user_pic) }}"
                                                    style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;" class="align-self-start mr-3" alt="...">
                                                </div>
												<div class="media-body d-flex flex-row">
													<div>
														<h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
														{{-- <p class="mb-0" style="color: #f6c100;">
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                    </p> --}}
														@php
														$percent = 0;
														$percent = ($item->rating /5) * 100;
														@endphp
														<div class="rating d-flex align-items-center">
															<div class="rating-upper" style="width: {{ $percent }}%">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
															<div class="rating-lower">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
														</div>
													</div>
													@foreach ($item2->inv_products as $value)
													@if ($value['product_id'] == $item->product_id)
													@if (!isset($value['type']) || $value['type'] != '')
													@if (isset($value['dis1']) || $value['dis1'] != '')
													@if (isset($value['dis2']) || $value['dis2'] != '')
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
													</div>
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}</h6>
													</div>
													@endif
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															ไม่มีตัวเลือกสินค้า</h6>
													</div>
													@endif
													@endif
													@endif
													@endforeach
												</div>
												{{-- <div>
					                                                <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
					                                            </div> --}}
											</div>
										</div>

										{{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
					                                        {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
					                                    </div> --}}
										<div class="col-12 mt-2">
											<h6>{{ $item->comment }}</h6>
										</div>
										<div class="col-12 d-flex flex-row">
											@if (isset($item->picture))
											@foreach (json_decode($item->picture) as $value)
											<div class="gallery">
												<a class="big" href="{{('/img/rating/'.$value) }}">
													<img src="{{('/img/rating/'.$value) }}"
														class="img-fluid rounded8px mr-2"
														style="width: 60px; height:60px;" alt="">
												</a>
											</div>
											@endforeach
											@endif
										</div>
										<div class="col-12 mt-2">
											<p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
										</div>
										<div class="col-12">
											<hr class="w-100">
										</div>
									</div>
									@endif
									@endif
									@endforeach
									@endforeach
									@endforeach
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-12 p-4 mb-4 text-center"
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									<h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
								</div>
							</div>
							@endif
							{{-- end comment rating --}}
						</div>
						<div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-tab-5">
							{{-- comment rating --}}
							@if(isset($rating_data) && count($rating_data->where('rating',2)) > 0)
							<div class="row">
								<div class="col-12 p-4 mb-4 "
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									@foreach ($rating_data->where('rating',2) as $item)
									@foreach ($user_data as $item1)
									@foreach ($inv_data as $item2)
									@if ($item->user_id == $item1->id)
									@if ($item->invs_id == $item2->id)
									<div class="row">
										<div class="col-12">
											<div class="media">
												<div style="height: 50px;">
                                                    <img src="{{('/img/profile/'.$item1->user_pic) }}"
                                                    style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;" class="align-self-start mr-3" alt="...">
                                                </div>
												<div class="media-body d-flex flex-row">
													<div>
														<h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
														{{-- <p class="mb-0" style="color: #f6c100;">
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                    </p> --}}
														@php
														$percent = 0;
														$percent = ($item->rating /5) * 100;
														@endphp
														<div class="rating d-flex align-items-center">
															<div class="rating-upper" style="width: {{ $percent }}%">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
															<div class="rating-lower">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
														</div>
													</div>
													@foreach ($item2->inv_products as $value)
													@if ($value['product_id'] == $item->product_id)
													@if (!isset($value['type']) || $value['type'] != '')
													@if (isset($value['dis1']) || $value['dis1'] != '')
													@if (isset($value['dis2']) || $value['dis2'] != '')
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
													</div>
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}</h6>
													</div>
													@endif
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															ไม่มีตัวเลือกสินค้า</h6>
													</div>
													@endif
													@endif
													@endif
													@endforeach
												</div>
												{{-- <div>
					                                                <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
					                                            </div> --}}
											</div>
										</div>

										{{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
					                                        {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
					                                    </div> --}}
										<div class="col-12 mt-2">
											<h6>{{ $item->comment }}</h6>
										</div>
										<div class="col-12 d-flex flex-row">
											@if (isset($item->picture))
											@foreach (json_decode($item->picture) as $value)
											<div class="gallery">
												<a class="big" href="{{('/img/rating/'.$value) }}">
													<img src="{{('/img/rating/'.$value) }}"
														class="img-fluid rounded8px mr-2"
														style="width: 60px; height:60px;" alt="">
												</a>
											</div>
											@endforeach
											@endif
										</div>
										<div class="col-12 mt-2">
											<p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
										</div>
										<div class="col-12">
											<hr class="w-100">
										</div>
									</div>
									@endif
									@endif
									@endforeach
									@endforeach
									@endforeach
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-12 p-4 mb-4 text-center"
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									<h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
								</div>
							</div>
							@endif
							{{-- end comment rating --}}
						</div>
						<div class="tab-pane fade" id="nav-6" role="tabpanel" aria-labelledby="nav-tab-6">
							{{-- comment rating --}}
							@if(isset($rating_data) && count($rating_data->where('rating',1)) > 0)
							<div class="row">
								<div class="col-12 p-4 mb-4 "
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									@foreach ($rating_data->where('rating',1) as $item)
									@foreach ($user_data as $item1)
									@foreach ($inv_data as $item2)
									@if ($item->user_id == $item1->id)
									@if ($item->invs_id == $item2->id)
									<div class="row">
										<div class="col-12">
											<div class="media">
												<div style="height: 50px;">
                                                    <img src="{{('/img/profile/'.$item1->user_pic) }}"
                                                    style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;" class="align-self-start mr-3" alt="...">
                                                </div>
												<div class="media-body d-flex flex-row">
													<div>
														<h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
														{{-- <p class="mb-0" style="color: #f6c100;">
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                    </p> --}}
														@php
														$percent = 0;
														$percent = ($item->rating /5) * 100;
														@endphp
														<div class="rating d-flex align-items-center">
															<div class="rating-upper" style="width: {{ $percent }}%">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
															<div class="rating-lower">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
														</div>
													</div>
													@foreach ($item2->inv_products as $value)
													@if ($value['product_id'] == $item->product_id)
													@if (!isset($value['type']) || $value['type'] != '')
													@if (isset($value['dis1']) || $value['dis1'] != '')
													@if (isset($value['dis2']) || $value['dis2'] != '')
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
													</div>
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}</h6>
													</div>
													@endif
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															ไม่มีตัวเลือกสินค้า</h6>
													</div>
													@endif
													@endif
													@endif
													@endforeach
												</div>
												{{-- <div>
					                                                <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
					                                            </div> --}}
											</div>
										</div>

										{{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
					                                        {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
					                                    </div> --}}
										<div class="col-12 mt-2">
											<h6>{{ $item->comment }}</h6>
										</div>
										<div class="col-12 d-flex flex-row">
											@if (isset($item->picture))
											@foreach (json_decode($item->picture) as $value)
											<div class="gallery">
												<a class="big" href="{{('/img/rating/'.$value) }}">
													<img src="{{('/img/rating/'.$value) }}"
														class="img-fluid rounded8px mr-2"
														style="width: 60px; height:60px;" alt="">
												</a>
											</div>
											@endforeach
											@endif
										</div>
										<div class="col-12 mt-2">
											<p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
										</div>
										<div class="col-12">
											<hr class="w-100">
										</div>
									</div>
									@endif
									@endif
									@endforeach
									@endforeach
									@endforeach
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-12 p-4 mb-4 text-center"
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									<h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
								</div>
							</div>
							@endif
							{{-- end comment rating --}}
						</div>
						<div class="tab-pane fade" id="nav-7" role="tabpanel" aria-labelledby="nav-tab-7">
							{{-- comment rating --}}
							@if(isset($rating_data) && count($rating_data->where('picture', '!=', null)) > 0)
							<div class="row">
								<div class="col-12 p-4 mb-4 "
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									@foreach ($rating_data->where('picture', '!=', null) as $item)
									@foreach ($user_data as $item1)
									@foreach ($inv_data as $item2)
									@if ($item->user_id == $item1->id)
									@if ($item->invs_id == $item2->id)
									<div class="row">
										<div class="col-12">
											<div class="media">
                                                <div style="height: 50px;">
												    <img src="{{('/img/profile/'.$item1->user_pic) }}"
													style="border-radius: 100%; height: 100%; max-width: 100%; width: 50px; object-fit: cover;object-position: 50% 0;" class="align-self-start mr-3" alt="...">
                                                </div>
												<div class="media-body d-flex flex-row">
													<div>
														<h6 class="mt-0 mb-0"><strong>{{ $item1->name }}</strong></h6>
														{{-- <p class="mb-0" style="color: #f6c100;">
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                        <i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
					                                                    </p> --}}
														@php
														$percent = 0;
														$percent = ($item->rating /5) * 100;
														@endphp
														<div class="rating d-flex align-items-center">
															<div class="rating-upper" style="width: {{ $percent }}%">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
															<div class="rating-lower">
																<span style="font-size: 22px;">★★★★★</span>
															</div>
														</div>
													</div>
													@foreach ($item2->inv_products as $value)
													@if ($value['product_id'] == $item->product_id)
													@if (!isset($value['type']) || $value['type'] != '')
													@if (isset($value['dis1']) || $value['dis1'] != '')
													@if (isset($value['dis2']) || $value['dis2'] != '')
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}, {{ $value['dis2'] }}</h6>
													</div>
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															{{ $value['dis1'] }}</h6>
													</div>
													@endif
													@else
													<div class="d-lg-block d-md-block d-none">
														<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า :
															ไม่มีตัวเลือกสินค้า</h6>
													</div>
													@endif
													@endif
													@endif
													@endforeach
												</div>
												{{-- <div>
					                                                <h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
					                                            </div> --}}
											</div>
										</div>

										{{-- <div class="col-12 mt-2 d-lg-none d-md-none d-block">
					                                        {{-- <h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
					                                    </div> --}}
										<div class="col-12 mt-2">
											<h6>{{ $item->comment }}</h6>
										</div>
										<div class="col-12 d-flex flex-row">
											@if (isset($item->picture))
											@foreach (json_decode($item->picture) as $value)
											<div class="gallery">
												<a class="big" href="{{('/img/rating/'.$value) }}">
													<img src="{{('/img/rating/'.$value) }}"
														class="img-fluid rounded8px mr-2"
														style="width: 60px; height:60px;" alt="">
												</a>
											</div>
											@endforeach
											@endif
										</div>
										<div class="col-12 mt-2">
											<p class="mb-0" style="color: #b1b7bc;">{{ $item->date }}</p>
										</div>
										<div class="col-12">
											<hr class="w-100">
										</div>
									</div>
									@endif
									@endif
									@endforeach
									@endforeach
									@endforeach
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-12 p-4 mb-4 text-center"
									style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
									<h3 style="opacity: 0.3;">ยังไม่มีคะแนน</h3>
								</div>
							</div>
							@endif
							{{-- end comment rating --}}
						</div>
					</div>
				</div>
			</div>


		</div>

	</div>

</div>


{{-- end container --}}





<div class="modal fade" id="user-login-regis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<h6><strong>เข้าสู่ระบบ</strong></h6>
							</a>
							<a class="nav-link text-center pt-4 " style="width: 50% !important;" id="nav-register-tab"
								data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register"
								aria-selected="false">
								<h6><strong>สมัครสมาชิก</strong></h6>
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
													style="color: #c75ba1; font-size: 14px; text-decoration: underline;">ลืมรหัสผ่าน
													?</strong></h6>
										</a>
									</div>
									<div class="col-12 mb-2 text-center">
										<button class="btn form-control text-white rounded8px"
											style="background-color: #42294f;">เข้าสู่ระบบ</button>
									</div>
									<div class="col-12">
										<div class="row">
											<div class="col-5 pr-0">
												<hr class="w-100 ">
											</div>
											<div class="col-2 d-flex align-items-center justify-content-center"
												style="color: rgba(0,0,0,.5);">
												หรือ
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
												<strong>เข้าระบบด้วย Facebook</strong></a>
										</div>
									</div>
									<div class="col-12 mb-3 ">
										<div class="d-flex align-items-center justify-content-center">
											<a href="{{ url('login/google') }}"
												class="btn form-control py-0 d-flex align-items-center justify-content-center"
												style="border:2px solid #dc4e41; color: #dc4e41;">
												<img src="/new_ui/img/footer/icon-footer-2.svg" style="width: 35px;"
													class="img-fluid pr-2" alt="">
												<strong>เข้าระบบด้วย Gmail</strong></a>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
							<form id="register-form" name="register-form" class="justify-content-center mt-3"
								action="{{ route('register') }}" method="POST">
								@csrf
								<div class="form-row">
									<div class="col-6 mb-3 mt-4 ">
										<input type="text" class="form-control rounded8px" name="name"
											aria-describedby="name" placeholder="ชื่อ"
											style="background-color: #ededed; border: none;">
									</div>
									<div class="col-6 mb-3 mt-4 ">
										<input type="text" class="form-control rounded8px" name="surname"
											aria-describedby="surname" placeholder="นามสกุล"
											style="background-color: #ededed; border: none;">
									</div>
									<div class="col-12 mb-3">
										<input type="tel"
											class="form-control rounded8px @error('phone') is-invalid @enderror"
											name="phone" aria-describedby="phone"
											placeholder="หมายเลขโทรศัพท์ (ตัวอย่าง 0123456789)"
											style="background-color: #ededed; border: none;">
										@error('phone')
										<span class="invalid-feedback pl-2" role="alert">
											<strong> หมายเลขโทรศัพท์ซ้ำ</strong>
										</span>
										<script>
											$(document).ready(function(){
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
											$(document).ready(function(){
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
											placeholder="รหัสผ่าน (อย่างน้อย 8 ตัวอักษร)"
											style="background-color: #ededed; border: none;">
										@error('password')
										<span class="invalid-feedback pl-2" role="alert">
											<strong> รหัสผ่านไม่ตรงกัน</strong>
										</span>
										<script>
											$(document).ready(function(){
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
											<strong> รหัสผ่านไม่ตรงกัน</strong>
										</span>

										@enderror
									</div>


									<div class="col-12 mb-3">
										<div class="form-check">

											<input class="form-check-input mt-2" type="checkbox" name="i_accept"
												id="i_accept" value="option1" checked>
											<label class="form-check-label" for="exampleRadios1">
												<h6><strong style="font-size: 14px;">คุณยินยอมตาม<a href="#"
															style="color: #c75ba1;"> เงื่อนไข และ
															นโยบายความเป็นส่วนตัว</a></strong></h6>
											</label>
										</div>
									</div>
									<div class="col-12 mb-3 text-center">
										<button type="submit" name="continue" id="continue"
											class="btn form-control text-white rounded8px"
											style="background-color: #42294f;">สมัครสมาชิก</button>
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
      maxWidth : 300,
    })
</script>

<script>
	$("#addnum").click(function(){
      $("#input1").hide();
});

$("input[type=radio]").click(function(){
    if (($("#option2").length == 0)){
        op1 = parseInt($('input[id=option1]:checked').data('key'));
    }
    if (($("#option2").length == 1)){
        op1 = parseInt($('input[id=option1]:checked').data('key') * $('input[id=option2]').length) +parseInt( $('input[id=option2]:checked').data('key')) ;
    }
    // console.log($('input[id=option2]'))
    if(op1>=0){
        // alert($('#price'+op1).text());
         $("#price").html(commaSeparateNumber($('#price'+op1).text()));
         $("#stock").html($('#stock'+op1).text());
         $("#stock_input").attr('max',$('#stock'+op1).text());
         $("#price_one").val($('#price'+op1).text());
		//  $("#margin_one").val($('#margin'+op1).text());
    }


});
function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }
$("#stock_input").keypress(function(){
      console.log(this.value);
      if (/^0/.test(this.value)) {
    this.value = this.value.replace(/^0/, "")
  }
});

$( "#stock_input" ).change(function() {
    var n = this.value.toString();
    n2 = n;
    var i;
    for(i = 0;i<this.value.length;i++){
        if(n[i] < 1 ){
            n2 = n.substring(i+1, n.length);
        }else{
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
    if (($("#option1").length > 0)){
        if($('input[id=option1]').is(':checked')) {
        }else{
            $('#warning1').show();
            $("#warning1").css("display", "inline-block");
        }
    }
    if (($('#option2').length > 0)){
        if($('input[id=option2]').is(':checked')) {
        }else{
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
      navigation: {
      	nextEl: '.swiper-button-next',
      	prevEl: '.swiper-button-prev',
      },
      thumbs: {
      	swiper: galleryThumbs,
      },
    });
</script>


@stop
