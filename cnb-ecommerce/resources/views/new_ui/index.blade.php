@extends('new_ui.layouts.front-end')
@section('style')
	<style>
		.swiper-container {
			width: 100%;
			height: 100%;
			margin-left: auto;
			margin-right: auto;
		}
		.swiper-container-1 {
			width: 100%;
			height: 100%;
			margin-left: auto;
			margin-right: auto;
		}
		.swiper-container-2 {
			width: 100%;
			height: 100%;
			margin-left: auto;
			margin-right: auto;
		}
		.swiper-container-3 {
			width: 100%;
			height: 100%;
			margin-left: auto;
			margin-right: auto;
		}
		.swiper-container-4 {
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
		<div class="container">
			<div class="row align-items-stretch d-flex align-items-end">
				<!-- <div class="col-3 d-lg-block d-md-none d-none"> -->
				<div class="col-205 d-xl-block d-lg-none d-md-none d-none">
					<div class="row m-0 " style="background-color: #fff; height: 100%; border-radius: 0 0 8px 8px;position: relative;z-index: 900;">

						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_54.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">กระเป๋า</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
												<hr class="w-100">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_56.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">กล้องและอุปกรณ์ถ่ายภาพ</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_51.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">การท่องเที่ยว</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_34.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">กีฬาและกิจกรรมกลางแจ้ง</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_57.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">ของเล่น สินค้าแม่และเด็ก</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_32.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">ความงามและของใช้ส่วนตัว</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_28.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">คอมพิวเตอร์และแล็ปท็อป</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_53.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">จัดทำกราฟฟิค</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_52.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">จัดทำวิดีโอ</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_43.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">ตั๋วและบัตรกำนัล</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_38.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">นาฬิกาและแว่นตา</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_50.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">บริการ</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_42.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">มือถือและอุปกรณ์เสริม</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_37.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">ยานยนต์</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
						<div class="col-12 py-2 d-flex align-items-center pr-0 d-hover" style="cursor: pointer;position:unset;">
							<div class="dropdown-custom w-100">
							  <div class="media d-flex align-items-center">
									<img src="new_ui/img/categories_icon/category_40.svg" width="23px" class="mr-3" alt="...">
									<div class="media-body">
										<p class="mb-0">รองเท้าผู้ชาย</p>
									</div>
								</div>
							  <div class="dropdown-content p-4" style="z-index: 1200;">
							    <div class="row">
							    	<div class="col-9">
							    		<div class="row">
							    			<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
									    	<div class="col-4 mb-3">
									    		<h6><strong style="color: #c75ba1;">เสื้อและเสื้อยืด</strong></h6>
									    		<hr class="w-100">
									    		<a href="{{ url('product-list') }}">โปโล</a>
											    <a href="{{ url('product-list') }}">เสื้อกล้าม</a>
											    <a href="{{ url('product-list') }}">เสื้อยืด</a>
									    	</div>
							    		</div>
							    	</div>
							    	<div class="col-3">
							    		<div class="row">
							    			<div class="col-12">
							    				<h6><strong style="color: #c75ba1;">แบรนด์</strong></h6>
									    		<hr class="w-100">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid" alt="">
							    			</div>
							    			<div class="col-6">
							    				<img src="new_ui/img/brand/img-brand-4.png" class="img-fluid" alt="">
							    			</div>
							    		</div>
							    	</div>

							    </div>
							  </div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="col-lg-9 col-md-12 col-12 mt-3 "> -->
				<div class="col-lg-905 col-12 d-flex  pt-4">
					<div class="swiper-container rounded8px">
						<div class="swiper-wrapper">
							<div class="swiper-slide ">
								<img src="new_ui/img/slides1.png" class="img-fluid" alt="">
							</div>
							<div class="swiper-slide">
								<img src="new_ui/img/slides2.png" class="img-fluid" alt="">
							</div>
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination"></div>
						<!-- Add Arrows -->
						<div class="swiper-button-next d-lg-block d-md-none d-none"></div>
						<div class="swiper-button-prev d-lg-block d-md-none d-none"></div>
					</div>
				</div>

				<div class="col-12 mt-4 d-block d-md-block d-lg-none">
					<div class="row">
						<div class="col-3 d-flex align-items-center justify-content-center flex-column">
							<a href="/category">
								<img src="new_ui/img/icon-index-1.png" class="img-fluid" alt="">
								<p class="text-center"><strong class="font-icon-index">หมวดหมู่</strong></p>
							</a>
						</div>
						<div class="col-3 d-flex align-items-center justify-content-center flex-column">
							<a href="{{ url('flash-sale') }}">
								<img src="new_ui/img/icon-index-2.png" class="img-fluid" alt="">
								<p class="text-center"><strong class="font-icon-index">FlashSale</strong></p>
							</a>
						</div>
						<div class="col-3 d-flex align-items-center justify-content-center flex-column">
							<a href="{{ url('best-seller') }}">
								<img src="new_ui/img/icon-index-3.png" class="img-fluid" alt="">
								<p class="text-center"><strong class="font-icon-index">ขายดี</strong></p>
							</a>
						</div>
						<div class="col-3 d-flex align-items-center justify-content-center flex-column">
							<a href="#">
								<img src="new_ui/img/icon-index-4.png" class="img-fluid" alt="">
								<p class="text-center"><strong class="font-icon-index">เปรียบเทียบ</strong></p>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-12 mt-lg-4 mt-md-3 mt-0 ">
					<div class="row rounded8px m-0" style="background-color: #fff">
						<div class="col-12 mt-3 d-flex flex-row align-items-center">
							<div class="mr-2 mr-md-4 ">
								<h3 class="mb-0"><strong>FLASH <img src="new_ui/img/categories_icon/FLASHSALE.svg" class="flash-img" width="26px;" alt=""> SALE</strong></h3>
							</div>
							<div>
								<h4 class="mb-0 px-2 px-md-3 py-1 rounded8px text-white d-flex flex-row" style="background-color: #42294f;">
									<span class="d-none d-md-none d-lg-block">จะหมดอายุภายใน&nbsp;&nbsp;</span>
									<span class="d-none d-md-none d-lg-block" style="color: #5b4566;">|&nbsp;&nbsp;</span>
									23&nbsp;&nbsp; <span style="color: #c2599e;">:&nbsp;&nbsp;</span>
									13&nbsp;&nbsp; <span style="color: #c2599e;">:&nbsp;&nbsp;</span>
									58
								</h4>
							</div>
							<div class="ml-auto">
								<a href="{{ url('flash-sale') }}" class="btn btn-all rounded8px py-1  d-lg-block d-md-none d-none"><strong class="font-product-all">ดูสินค้าทั้งหมด <i class="fa fa-angle-right fa-angle-right-icon" aria-hidden="true"></i></strong></a>
								<a href="{{ url('flash-sale') }}"><strong class="font-product-all d-lg-none d-md-block d-block text-right" style="color: #b85298;">ดูสินค้าทั้งหมด <i class="fa fa-angle-right fa-angle-right-icon" aria-hidden="true"></i></strong></a>
							</div>

						</div>
						<div class="col-12">
							<hr class="w-100 mt-1">
						</div>
						<div class="col-12 mb-4">
							<!-- Swiper -->
							<div class="swiper-container-1" style="overflow: hidden;">
								<div class="swiper-wrapper" >
@for ($x = 0; $x <= 11; $x++)


									<div class="swiper-slide">
										<div class="card position-relative" style="width: 18rem; border: none;">
											<a href="{{ url('product-detail') }}"><img src="new_ui/img/product/flashsale-1.png" class="card-img-top img-fluid" alt="...">
												<div class="card-body text-left p-2">
													<h6 class="card-title mb-0"><strong>Basicsbysita | A224 - One Button Box</strong></h6>
													<h2 class="card-text mb-0" style="color: #c75ba1;"><strong>฿790</strong></h2>
													<h6 class="card-text mb-4 pb-3" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6>
												</div>
												<div class="progress position-absolute" style="bottom: 0; left: 0; right: 0; border-radius: 50px; height: 8px;">
													<div class="progress-bar" role="progressbar" style="width: 50%; background-color: #c40000;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<div class="position-absolute " style="bottom: 8px; left: 4px;">
													<p class="mb-0 px-2 py-1 text-white " style="background-color: #0f0f0f; border-radius: 8px 8px 0 0;">ขายแล้ว 600 ชิ้น</p>
												</div>
												<div class="position-absolute" style="top:10px; right: 0;"></div>
												<div class="position-absolute" style="right: -7px; top: 7%;">
													<img src="new_ui/img/sale.svg" class="position-relative" style=" width: 80px;" alt="">
													<h6 class="position-absolute text-white" style="left: 50%;top: 50%;transform: translate(-50%,-50%);">-30%</h6>
												</div>
											</a>
										</div>
									</div>
@endfor
								</div>
								<!-- Add Pagination -->
								<div class="swiper-pagination"></div>
								<!-- Add Arrows -->
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-12 my-4">
					<div class="row m-0">
						<!-- Swiper -->
						  <div class="swiper-container-5" style="overflow: hidden;">
						    <div class="swiper-wrapper">
						      <div class="swiper-slide">
								<img src="new_ui/img/promotion1.png" class="img-fluid" alt="">
						      </div>
						      <div class="swiper-slide">
								<img src="new_ui/img/promotion2.png" class="img-fluid" alt="">
						      </div>
						      <div class="swiper-slide">
								<img src="new_ui/img/promotion3.png" class="img-fluid" alt="">
						      </div>
						    </div>
						    <!-- Add Pagination -->
						    <div class="swiper-pagination"></div>
						  </div>
					</div>
				</div>
<!-- 				<div class="col-4  mt-4 mb-4">
					<img src="new_ui/img/promotion1.png" class="img-fluid" alt="">
				</div>
				<div class="col-4  mt-4 mb-4">
					<img src="new_ui/img/promotion2.png" class="img-fluid" alt="">
				</div>
				<div class="col-4  mt-4 mb-4">
					<img src="new_ui/img/promotion3.png" class="img-fluid" alt="">
				</div> -->

				<div class="col-3 d-lg-block d-md-none d-none mb-4">
					<img src="new_ui/img/banner-food.png" class="img-fluid rounded8px" alt="">
				</div>
				<div class="col-12 d-lg-none d-md-block d-block">
					<img src="new_ui/img/banner-food-mobile.png" class="img-fluid w-100 " style="border-radius: 8px 8px 0 0;" alt="">
				</div>
				<div class="col-lg-9 col-md-12 col-12 mb-4">
					<div class="row m-0" style="background-color: #fff;">
						<div class="col-12 px-0">
							<nav>
							  <div class="nav nav-tabs" id="nav-tab" role="tablist">
							    <a class="nav-link active text-center pt-4 w-33"  id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><h5><strong>อาหาร</strong></h5></a>
							    <a class="nav-link text-center pt-4 w-33"  id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><h5><strong>เครื่องดื่ม</strong></h5></a>
							    <a class="nav-link text-center pt-4 w-33"  id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><h5><strong>อื่นๆ</strong></h5></a>
							  </div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
							  <div class="tab-pane fade show active px-4 " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								<div class="owl-carousel"  id="owl1">
@for ($x = 0; $x <= 11; $x++)
									<a href="{{ url('product-detail') }}">
									<div class="col-12 rounded8px" style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important; margin-top: 100px;">
										<div class="row">
											<div class="col-12">
												<img src="new_ui/img/product/food-1.png" style="margin-top: -80px;" class="img-fluid rounded8px 	" alt="...">
												<h6 class="card-title mb-0 text-left pt-2"><strong>Basicsbysita | A224 - One Button Box</strong></h6>
												<h2 class="card-text mb-0 text-left" style="color: #c75ba1;"><strong>฿790</strong></h2>
												<h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6>
												<h6 class="text-left mb-3">
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<span style="color: #b2b2b2;"> (1342)</span>
												</h6>
											</div>
										</div>
									</div>
									</a>
@endfor
								</div>
							  </div>
							  <div class="tab-pane fade px-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<div class="owl-carousel"  id="owl2">
@for ($x = 0; $x <= 11; $x++)
									<a href="{{ url('product-detail') }}">
									<div class="col-12 rounded8px" style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important; margin-top: 100px;">
										<div class="row">
											<div class="col-12">
												<img src="new_ui/img/product/food-2.png" style="margin-top: -80px;" class="img-fluid rounded8px 	" alt="...">
												<h6 class="card-title mb-0 text-left pt-2"><strong>Basicsbysita | A224 - One Button Box</strong></h6>
												<h2 class="card-text mb-0 text-left" style="color: #c75ba1;"><strong>฿790</strong></h2>
												<h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6>
												<h6 class="text-left mb-3">
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<span style="color: #b2b2b2;"> (1342)</span>
												</h6>
											</div>
										</div>
									</div>
									</a>
@endfor
								</div>
							  </div>
							  <div class="tab-pane fade px-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
								<div class="owl-carousel"  id="owl3">
@for ($x = 0; $x <= 11; $x++)
									<a href="{{ url('product-detail') }}">
									<div class="col-12 rounded8px" style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important; margin-top: 100px;">
										<div class="row">
											<div class="col-12">
												<img src="new_ui/img/product/food-1.png" style="margin-top: -80px;" class="img-fluid rounded8px 	" alt="...">
												<h6 class="card-title mb-0 text-left pt-2"><strong>Basicsbysita | A224 - One Button Box</strong></h6>
												<h2 class="card-text mb-0 text-left" style="color: #c75ba1;"><strong>฿790</strong></h2>
												<h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6>
												<h6 class="text-left mb-3">
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
													<span style="color: #b2b2b2;"> (1342)</span>
												</h6>
											</div>
										</div>
									</div>
									</a>
@endfor
								</div>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mb-4" style="background-color: #fff;">
			<div class="container p-0">
				<div class="row m-0 py-4">
					<div class="col-12 d-flex flex-row mt-4">
						<h3><strong>ขายดีประจำสัปดาห์</strong></h3>
						<div class="ml-auto">
								<a href="{{ url('best-selle') }}" class="btn btn-all rounded8px py-1  d-lg-block d-md-none d-none"><strong class="font-product-all">ดูสินค้าทั้งหมด <i class="fa fa-angle-right fa-angle-right-icon" aria-hidden="true"></i></strong></a>
								<a href="{{ url('best-selle') }}"><strong class="font-product-all d-lg-none d-md-block d-block text-right" style="color: #b85298;">ดูสินค้าทั้งหมด <i class="fa fa-angle-right fa-angle-right-icon" aria-hidden="true"></i></strong></a>
							</div>
					</div>
					<div class="col-12">
						<hr class="w-100">
					</div>
					<div class="col-12">
						 <!-- Swiper -->
						  <div class="swiper-container-3 " style="overflow: hidden;">
						    <div class="swiper-wrapper">
@for ($x = 0; $x <= 11; $x++)
								<div class="swiper-slide">
									<a href="{{ url('product-list') }}">
									<div class="col-12 rounded8px mb-4 d-flex align-items-stretch" style="background-color: #efefef;">

										<div class="row">
											<div class="col-12 px-4 text-left" >
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

		<div class="container mb-4">
			<div class="row m-0 rounded8px py-4" style="background-color: #fff;">
				<div class="col-12 mt-lg-4 mt-md-0 ">
					<h3 class="mb-0"><strong>คู่ค้าของเรา</strong></h3>
				</div>
				<div class="col-12">
					<hr class="w-100 mt-md-2 mt-lg-3">
				</div>
				<div class="col-12">
					 <!-- Swiper -->
					  <div class="swiper-container-4" style="overflow: hidden;">
					    <div class="swiper-wrapper">
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-1.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-2.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-3.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-4.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-5.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-6.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-7.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-8.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-1.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-2.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-3.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-4.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-5.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-6.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-7.png" class="img-fluid" alt="">
					      </div>
					      <div class="swiper-slide">
							<img src="new_ui/img/customer/customer-8.png" class="img-fluid" alt="">
					      </div>
					    </div>
					    <!-- Add Pagination -->
					    <div class="swiper-pagination"></div>
					  </div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 ">
					<nav class="rounded8px mb-4" style="background-color: #fff; ">
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-link active text-center pt-4 w-49"   id="nav-product-new-tab" data-toggle="tab" href="#nav-product-new" role="tab" aria-controls="nav-product-new" aria-selected="true"><h5><strong>สินค้ามาใหม่</strong></h5></a>
							<a class="nav-link text-center pt-4 w-49"   id="nav-product-recommend-tab" data-toggle="tab" href="#nav-product-recommend" role="tab" aria-controls="nav-product-recommend" aria-selected="false"><h5><strong>สินค้าแนะนำ</strong></h5></a>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-product-new" role="tabpanel" aria-labelledby="nav-product-new-tab">
							<div class="row">
@for ($x = 0; $x <= 11; $x++)

								<div class="col-lg-2 col-md-4 col-6 px-lg-2 px-md-2 px-1" >
									<a href="{{ url('product-detail') }}">
										<div class="rounded8px px-2 " style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
											<img src="new_ui/img/product/product-11.png"  class="mt-2 img-fluid rounded8px w-100" alt="...">
											<h6 class="card-title mb-0 text-left pt-2"><strong>Basicsbysita | A224 - One Button Box</strong></h6>
											<h2 class="card-text mb-0 text-left" style="color: #c75ba1;"><strong>฿790</strong></h2>
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

@endfor
								<div class="col-12 text-center mb-4">
									<div class="row justify-content-center">
										<div class="col-lg-4 col-md-6 col-12">
											<a href="{{ url('product-new') }}" class="btn py-2" style="width: 100%; background-color: #fff;box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;"><strong>ดูเพิ่มเติม</strong></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-product-recommend" role="tabpanel" aria-labelledby="nav-product-recommend-tab">
							<div class="row">
@for ($x = 0; $x <= 11; $x++)
								<div class="col-lg-2 col-md-4 col-6 px-lg-2 px-md-2 px-1" >
									<a href="{{ url('product-detail') }}">
										<div class="rounded8px px-2 " style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
											<img src="new_ui/img/product/product-22.png"  class="mt-2 img-fluid rounded8px w-100" alt="...">
											<h6 class="card-title mb-0 text-left pt-2"><strong>Basicsbysita | A224 - One Button Box</strong></h6>
											<h2 class="card-text mb-0 text-left" style="color: #c75ba1;"><strong>฿790</strong></h2>
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
@endfor
								<div class="col-12 text-center mb-4">
									<div class="row justify-content-center">
										<div class="col-lg-4 col-md-6 col-12">
											<a href="{{ url('product-new') }}" class="btn py-2" style="width: 100%; background-color: #fff;box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;"><strong>ดูเพิ่มเติม</strong></a>
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

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});
</script>

  <script>
    var swiper = new Swiper('.swiper-container-1', {
      slidesPerView: 6,
      spaceBetween: 30,
      freeMode: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
		0: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
		320: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 6,
          spaceBetween: 50,
        },
      }
    });
  </script>
  <script>
    var swiper = new Swiper('.swiper-container-2', {
      slidesPerView: 4,
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
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      }
    });
  </script>
  <script>
    var swiper = new Swiper('.swiper-container-6', {
      slidesPerView: 4,
      spaceBetween: 30,
      freeMode: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
		0: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
		320: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      }
    });

  </script>

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
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container-4', {
      slidesPerView: 8,
      spaceBetween: 30,
      freeMode: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
		0: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
		320: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 6,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 6,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 8,
          spaceBetween: 50,
        },
      }
    });
  </script>

    <!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container-5', {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
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


<!-- slide owl -->
  <script>
  	$('#owl1').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1.5,
            nav:false
        },
        320:{
            items:1.5,
            nav:false
        },
        640:{
            items:3,
            nav:false
        },
        768:{
            items:4,
            nav:false
        },
        1024:{
            items:4,
            nav:false,
            loop:false
        }
    }
})
  </script>
  <!-- slide owl -->
  <script>
  	$('#owl2').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1.5,
            nav:false
        },
        320:{
            items:1.5,
            nav:false
        },
        640:{
            items:3,
            nav:false
        },
        768:{
            items:4,
            nav:false
        },
        1024:{
            items:4,
            nav:false,
            loop:false
        }
    }
})
  </script>
  <!-- slide owl -->
  <script>
  	$('#owl3').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1.5,
            nav:false
        },
        320:{
            items:1.5,
            nav:false
        },
        640:{
            items:3,
            nav:false
        },
        768:{
            items:4,
            nav:false
        },
        1024:{
            items:4,
            nav:false,
            loop:false
        }
    }
})
  </script>

@endsection
