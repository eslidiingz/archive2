@extends('new_ui.layouts.front-end')
@section('style')
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
</style>
@endsection
@section('content')
<div class="container-fluid py-4" style="background-color: #42294f;" id="navCategoryTitle">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-white">ขายดีประจำสัปดาห์</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row d-lg-block d-md-none d-none">
		<div class="col-12 p-0 mt-2">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb" style="background-color: unset;">
					<li class="breadcrumb-item"><a href="#" style="color: #1947e3;">หน้าแรก</a></li>
					<li class="breadcrumb-item active" aria-current="page">ขายดีประจำสัปดาห์</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<div class="container-fluid mb-4" style="background-color: #fff;">
	<div class="container p-0">
		<div class="row m-0 py-4">
			<div class="col-12 d-flex flex-row mt-4">
				<h3><strong>ขายดีประจำสัปดาห์</strong></h3>
			</div>
			<div class="col-12">
				<hr class="w-100">
			</div>
			<div class="col-12 px-lg-3 px-md-3 px-0">
				<!-- Swiper -->
				<div class="swiper-container-3 " style="overflow: hidden;">
					<div class="swiper-wrapper">
						@for ($x = 0; $x <= 11; $x++) <div class="swiper-slide">
							<a href="{{ url('product-list') }}">
								<div class="col-12 rounded8px mb-4 d-flex align-items-stretch" style="background-color: #efefef;">
									<div class="row">
										<div class="col-12 px-4 text-left">
											<h5 class="pt-3"><strong>มือถือและอุปกรณ์เสริม</strong></h5>
											<h6 style="color: #666;">คำสั่งซื้อ 334453 รายการ</h6>
										</div>
										<div class="col-8 mb-4 d-flex pr-0 position-relative">
											<img src="new_ui/img/product/product-1.png" class="img-fluid rounded8px" alt="">
											<div class="position-absolute d-lg-block d-md-none d-none" style="left: 10%; top: -2px;">
												<img src="new_ui/img/1.svg" class="position-relative" style=" width: 40px;" alt="">
												<h4 class="position-absolute text-white" style="left: 50%;top: 40%;transform: translate(-50%,-50%);"><strong>1</strong></h4>
											</div>
										</div>
										<div class="col-4 mb-4  d-flex">
											<div class="row">
												<div class="col-12 mb-2 position-relative">
													<img src="new_ui/img/product/product-2.png" class="img-fluid rounded8px" alt="">
													<div class="position-absolute d-lg-block d-md-none d-none" style="left: 15%; top: -2px;">
														<img src="new_ui/img/2.svg" class="position-relative" style=" width: 40px;" alt="">
														<h4 class="position-absolute text-white" style="left: 50%;top: 40%;transform: translate(-50%,-50%);"><strong>2</strong></h4>
													</div>
												</div>
												<div class="col-12 mt-2 position-relative">
													<img src="new_ui/img/product/product-3.png" class="img-fluid rounded8px" alt="">
													<div class="position-absolute d-lg-block d-md-none d-none" style="left: 15%; top: -2px;">
														<img src="new_ui/img/3.svg" class="position-relative" style=" width: 40px;" alt="">
														<h4 class="position-absolute text-white" style="left: 50%;top: 40%;transform: translate(-50%,-50%);"><strong>3</strong></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
					</div>
					@endfor
				</div>
				<!-- Add Arrows -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container">
	<div class="row">
		@foreach($product_all as $item)
		<div class="col-lg-2 col-md-4 col-6 px-lg-2 px-md-2 px-1">
			<a href="{{ url('product-detail') }}">
				<div class="rounded8px px-2 " style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
					<div class="pt-2 rounded8px d-flex align-items-center justify-content-center" style="height: 180px;">

						<img src="{{asset('/img/product/'.$item->product_img[0])}}" alt="..." style="max-width:100%; max-height:100%" onerror="this.onerror=null;this.src='/img/no_image.png'">
					</div>
					<h6 class="card-title mb-0 text-left pt-2"style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><strong>{{ $item->name }}</strong></h6>
					<h2 class="card-text mb-0 text-left" style="color: #c75ba1;" ><strong>฿{{ $item->product_option['price'][0] }}</strong></h2>
					<h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6>
					<h6 class="text-left mb-3">
						<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
						<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
						<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
						<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
						<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
						<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
						<span style="color: #b2b2b2;"> (1342)</span>
					</h6>
				</div>
			</a>
		</div>
		@endforeach
		<div class="col-12 d-flex justify-content-end">
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">4</a></li>
					<li class="page-item"><a class="page-link" href="#">5</a></li>
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
</div>
@endsection

@section('script')
<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper('.swiper-container-3', {
		slidesPerView: 3,
		spaceBetween: 30,
		freeMode: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			0: {
				slidesPerView: 1.5,
				spaceBetween: 20,
			},
			320: {
				slidesPerView: 1.5,
				spaceBetween: 20,
			},
			640: {
				slidesPerView: 2,
				spaceBetween: 20,
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 40,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 50,
			},
		}
	});
</script>
@endsection
