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

	.nav-tabs .nav-item.show .nav-link,
	.nav-tabs .nav-link.active {
		outline: 3px solid #c75ba1;
		outline-offset: -3px;
		color: #c75ba1;
		border-radius: 0 0 0 0;
		background-color: #fff;

	}

	.nav-tabs .nav-item.show .nav-link img,
	.nav-tabs .nav-link.active img {
		filter: invert(52%) sepia(52%) saturate(711%) hue-rotate(276deg) brightness(84%) contrast(83%);
	}

	.nav-tabs .nav-link:hover {
		outline: 3px solid #c75ba1;
		outline-offset: -3px;
		color: #c75ba1;
		border-radius: 0 0 0 0;
	}

		/* Track */
		#navCategoryLeft::-webkit-scrollbar-track {
		  box-shadow: inset 0 0 5px grey;
		  border-radius: 10px;
		}

		/* Handle */
		#navCategoryLeft::-webkit-scrollbar-thumb {
		  background: #666;
		  border-radius: 10px;
		}
	}

		/* Handle on hover */
		#navCategoryLeft::-webkit-scrollbar-thumb:hover {
		  background: #666;
		}
	}

	.nav-tabs {
		border-bottom: unset;
	}

	#custom-flex {
		display: flex;
		flex-flow: row wrap;
		justify-content: space-between;
	}

	#custom-flex::after {
		content: "";
		flex: auto;
	}

	#navCategoryLeft {
		overflow-y: scroll;
		position: -webkit-sticky;
		/* Safari */
		position: sticky;
		max-height: 100%;
	}

	/* width */
	#navCategoryLeft::-webkit-scrollbar {
		width: 4px;
	}

	/* Track */
	#navCategoryLeft::-webkit-scrollbar-track {
		box-shadow: inset 0 0 5px grey;
		border-radius: 10px;
	}

	/* Handle */
	#navCategoryLeft::-webkit-scrollbar-thumb {
		background: #666;
		border-radius: 10px;
	}

	/* Handle on hover */
	#navCategoryLeft::-webkit-scrollbar-thumb:hover {
		background: #666;
	}
</style>
@endsection
@section('content')
<div class="container-fluid py-4" style="background-color: #42294f;" id="navCategoryTitle">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-white">หมวดหมู่ทั้งหมด</h1>
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
					<li class="breadcrumb-item active" aria-current="page">หมวดหมู่ทั้งหมด</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-4 col-4 px-0 px-lg-2">
			<nav style="overflow-y: auto;" id="navCategoryLeft">
				<div class="nav nav-tabs" id="nav-tab" role="tablist" id="custom-flex">
					<!-- <div class="nav nav-tabs d-flex justify-content-between" id="nav-tab" role="tablist"> -->
					<a class="nav-link active d-flex flex-column align-items-center " id="nav-product-1-tab" data-toggle="tab" href="#nav-product-1" role="tab" aria-controls="nav-product-1" aria-selected="true">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_1.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">เสื้อผ้าแฟชั่น <br>ผู้ชาย</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-2-tab" data-toggle="tab" href="#nav-product-2" role="tab" aria-controls="nav-product-2" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_2.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">เสื้อผ้าแฟชั่น <br>ผู้หญิง</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-3-tab" data-toggle="tab" href="#nav-product-3" role="tab" aria-controls="nav-product-3" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_3.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-4-tab" data-toggle="tab" href="#nav-product-4" role="tab" aria-controls="nav-product-4" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_4.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-5-tab" data-toggle="tab" href="#nav-product-5" role="tab" aria-controls="nav-product-5" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_5.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-6-tab" data-toggle="tab" href="#nav-product-6" role="tab" aria-controls="nav-product-6" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_6.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-7-tab" data-toggle="tab" href="#nav-product-7" role="tab" aria-controls="nav-product-7" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_7.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">นาฬิกาและ<br>แว่นตา</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-8-tab" data-toggle="tab" href="#nav-product-8" role="tab" aria-controls="nav-product-8" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_8.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">นาฬิกาและ<br>แว่นตา</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-2-tab" data-toggle="tab" href="#nav-product-2" role="tab" aria-controls="nav-product-2" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_2.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">เสื้อผ้าแฟชั่น <br>ผู้หญิง</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-3-tab" data-toggle="tab" href="#nav-product-3" role="tab" aria-controls="nav-product-3" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_3.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-4-tab" data-toggle="tab" href="#nav-product-4" role="tab" aria-controls="nav-product-4" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_4.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-5-tab" data-toggle="tab" href="#nav-product-5" role="tab" aria-controls="nav-product-5" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_5.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-6-tab" data-toggle="tab" href="#nav-product-6" role="tab" aria-controls="nav-product-6" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_6.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-7-tab" data-toggle="tab" href="#nav-product-7" role="tab" aria-controls="nav-product-7" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_7.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">นาฬิกาและ<br>แว่นตา</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-8-tab" data-toggle="tab" href="#nav-product-8" role="tab" aria-controls="nav-product-8" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_8.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">นาฬิกาและ<br>แว่นตา</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-2-tab" data-toggle="tab" href="#nav-product-2" role="tab" aria-controls="nav-product-2" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_2.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">เสื้อผ้าแฟชั่น <br>ผู้หญิง</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-3-tab" data-toggle="tab" href="#nav-product-3" role="tab" aria-controls="nav-product-3" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_3.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-4-tab" data-toggle="tab" href="#nav-product-4" role="tab" aria-controls="nav-product-4" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_4.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-5-tab" data-toggle="tab" href="#nav-product-5" role="tab" aria-controls="nav-product-5" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_5.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-6-tab" data-toggle="tab" href="#nav-product-6" role="tab" aria-controls="nav-product-6" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_6.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">มือถือและ<br>อุปกรณ์เสริม</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-7-tab" data-toggle="tab" href="#nav-product-7" role="tab" aria-controls="nav-product-7" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_7.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">นาฬิกาและ<br>แว่นตา</strong>
						</div>
					</a>
					<a class="nav-link d-flex flex-column align-items-center " id="nav-product-8-tab" data-toggle="tab" href="#nav-product-8" role="tab" aria-controls="nav-product-8" aria-selected="false">
						<div>
							<img src="new_ui/img/categories_icon/icon_category_8.png" style="width: 45px;" alt="">
						</div>
						<div class="text-center mt-2" style="line-height: 18px !important;">
							<strong style="color: #000;">นาฬิกาและ<br>แว่นตา</strong>
						</div>
					</a>
				</div>
			</nav>
			<script type="text/javascript">
				$(document).ready(navCategoryLeft);
				$(window).on('resize', navCategoryLeft);
				$(document).ready(function() {
					$(window).on('scroll', navCategoryLeft);
				});

				function navCategoryLeft() {
					var width = $(window).width();
					if (width < 992) {
						var h_wrapper = $('main#wrapper').outerHeight();
						var h_title = $('div#navCategoryTitle').outerHeight();
						var h_bottom = $('div.fixed-bottom').outerHeight();
						var h_sum = h_wrapper + h_title + h_bottom;
						$('nav#navCategoryLeft').css('height', 'calc(100vh - ' + h_sum + 'px)');

						if ($(window).scrollTop() >= h_title) {
							$('nav#navCategoryLeft').css({
								'top': h_wrapper + 'px',
								'height': 'calc(100vh - ' + (h_wrapper + h_bottom) + 'px)'
							});
						} else {
							$('nav#navCategoryLeft').css({
								'top': (h_wrapper + h_title - $(window).scrollTop()) + 'px',
								'height': 'calc(100vh - ' + (h_sum - $(window).scrollTop()) + 'px)'
							});
						}
					} else {
						$('nav#navCategoryLeft').css({
							'top': '0',
							'height': 'unset'
						});
					}
				}
			</script>
		</div>
		<div class="col-lg-12 col-md-8 col-8">
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-product-1" role="tabpanel" aria-labelledby="nav-product-1-tab">
					<div class="row mt-lg-4 mt-md-0 mt-0 p-4" style="background-color: #fff;">
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-product-2" role="tabpanel" aria-labelledby="nav-product-2-tab">
					<div class="row mt-lg-4 mt-md-0 mt-0 p-4" style="background-color: #fff;">
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-product-3" role="tabpanel" aria-labelledby="nav-product-3-tab">
					<div class="row mt-lg-4 mt-md-0 mt-0 p-4" style="background-color: #fff;">
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-product-4" role="tabpanel" aria-labelledby="nav-product-4-tab">
					<div class="row mt-lg-4 mt-md-0 mt-0 p-4" style="background-color: #fff;">
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-product-5" role="tabpanel" aria-labelledby="nav-product-5-tab">
					<div class="row mt-lg-4 mt-md-0 mt-0 p-4" style="background-color: #fff;">
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-product-6" role="tabpanel" aria-labelledby="nav-product-6-tab">
					<div class="row mt-lg-4 mt-md-0 mt-0 p-4" style="background-color: #fff;">
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-product-7" role="tabpanel" aria-labelledby="nav-product-7-tab">
					<div class="row mt-lg-4 mt-md-0 mt-0 p-4" style="background-color: #fff;">
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-product-8" role="tabpanel" aria-labelledby="nav-product-8-tab">
					<div class="row mt-lg-4 mt-md-0 mt-0 p-4" style="background-color: #fff;">
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									<h4><strong style="color: #c75ba1;">เสื้อผ้าแฟชั่นผู้ชาย</strong></h4>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อฮู้ดและเสื้อกันหนาว</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>กางเกงขาสั้น</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>เสื้อและเสื้อยืด</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ยีนส์</strong></h5>
									</a>
								</div>
								<div class="col-lg-4 col-md-12 col-12 mb-2">
									<a href="{{ url('product-list') }}">
										<h5><strong>ชุดผู้ชาย</strong></h5>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4><strong style="color: #c75ba1;">แบรนด์</strong></h4>
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection