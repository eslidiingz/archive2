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
		.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
			border: 3px solid #c75ba1;
			color: #c75ba1;
			border-radius: 0 0 0 0;
			background-color: #fff;
		}
		.nav-tabs .nav-link:hover{

			border: 3px solid #c75ba1;
			color: #c75ba1;
			border-radius: 0 0 0 0;
		}
		.nav-tabs .nav-link{
			border-bottom: unset;
			border: 3px solid #efefef;
			background-color: #fff;
		}
		.nav-tabs{
			border-bottom: unset;
		}
	</style>
@endsection
	@section('content')
		<div class="container">
			<div class="row d-lg-block d-md-none d-none">
				<div class="col-12 p-0 mt-2">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: unset;">
							<li class="breadcrumb-item"><a href="#" style="color: #02A2D4;">หน้าแรก</a></li>
							<li class="breadcrumb-item"><a href="#" style="color: #02A2D4;">หมวดหมู่ทั้งหมด</a></li>
							<li class="breadcrumb-item active" aria-current="page">เสื้อผ้าผู้ขาย</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row m-0 rounded8px pb-4 mt-lg-0 mt-md-4 mt-4" style="background-color: #fff;">
				<div class="col-12 mt-lg-4 mt-md-3 mt-3 ">
					<h3 class="mb-0"><strong>คู่ค้าของเรา</strong></h3>
				</div>
				<div class="col-12">
					<hr class="w-100 mt-md-2 mt-lg-3">
				</div>
				<div class="col-12">
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
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
			<div class="row my-4">
				<div class="col-2 d-lg-block d-md-none d-none">
					<div class="row">
						<div class="col-12 d-flex flex-row">
							<h5 class="mb-0">
								<img src="new_ui/img/menu/icon-menu-categories.png" width="27px" class="mr-3" alt="..."><strong>หมวดหมู่</strong>
							</h5>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-12 d-flex flex-column">
							<h6 class="mb-3"><strong>เสื้อผ้าผู้ชาย</strong></h6>
							<h6 class="mb-3"><strong>เสื้อเชิ้ต</strong></h6>
							<h6 class="mb-3"><strong>เสื้อยืด</strong></h6>
							<h6 class="mb-3"><strong>กางเกงขาสั้น</strong></h6>
							<h6 class="mb-3"><strong>กางเกงขายาว</strong></h6>
							<h6 class="mb-3"><strong>เสื้อโปโล</strong></h6>
							<h6 class="mb-3"><strong>กางเกงยีนส์</strong></h6>
							<h6 class="mb-3"><strong>เสื้อคลุมตัวนอก</strong></h6>
							<h6 class="mb-3"><strong>ชุดใช้ในชาย</strong></h6>
							<h6 class="mb-3"><strong>ถุงเท้า</strong></h6>
							<h6 class="mb-3"><strong>อื่นๆ</strong></h6>
						</div>
						<div class="col-12 mt-4">
							<h5 class="mb-0">
								<img src="new_ui/img/menu/icon-menu-search-all.png" width="27px" class="mr-2" alt="..."><strong>ค้นหาแบบละเอียด</strong>
							</h5>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-12">
							<h5 class="my-3"><strong>ช่องทางการขนส่ง</strong></h5>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="Transport1">
								<label class="form-check-label" for="Transport1">
									<h6>J&T Express</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="Transport2">
								<label class="form-check-label" for="Transport2">
									<h6>Shopteenii Express</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="Transport3">
								<label class="form-check-label" for="Transport3">
									<h6>Best Express</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="Transport4">
								<label class="form-check-label" for="Transport4">
									<h6>Ninja Van</h6>
								</label>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-12">
							<h5 class="my-3"><strong>ส่งจาก</strong></h5>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="send1">
								<label class="form-check-label" for="send1">
									<h6>จังหวัดกรุงเทพมหานคร</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="send2">
								<label class="form-check-label" for="send2">
									<h6>จังหวัดนนทบุรี</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="send3">
								<label class="form-check-label" for="send3">
									<h6>จังหวัดสมุทรปราการ</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="send4">
								<label class="form-check-label" for="send4">
									<h6>จังหวัดปทุมธานี</h6>
								</label>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-12">
							<h5 class="my-3"><strong>Payment Option</strong></h5>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="payment1">
								<label class="form-check-label" for="payment1">
									<h6>ชำระเงินปลายทาง</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="payment2">
								<label class="form-check-label" for="payment2">
									<h6>บัตรเครดิต</h6>
								</label>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-12">
							<h5 class="my-3"><strong>บริการและโปรโมชั่น</strong></h5>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="service1">
								<label class="form-check-label" for="service1">
									<h6>พร้อมส่วนลด</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="service2">
								<label class="form-check-label" for="service2">
									<h6>รับเงินคืน 10%</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="service3">
								<label class="form-check-label" for="service3">
									<h6>ส่งพรี</h6>
								</label>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-12">
							<h5 class="my-3"><strong>ประเภทร้าน</strong></h5>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="shoptype1">
								<label class="form-check-label" for="shoptype1">
									<h6>Shopteenii Mall</h6>
								</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" value="" id="shoptype2">
								<label class="form-check-label" for="shoptype2">
									<h6>ร้านแนะนำ</h6>
								</label>
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>
						<div class="col-12">
							<button class="btn btn-danger form-control">Clear</button>
						</div>
					</div>
				</div>
				<div class="col-lg-10 col-md-12 col-12">
					<div class="row m-0 rounded8px py-4 align-items-center" style="background-color: #fff;">
						<div class="col-12 mb-lg-4 mb-md-3 mb-3">
							<div class="row align-items-center">
								<div class="col-lg-2 col-md-12 col-12 mb-lg-0 mb-md-2 mb-2">
									<h5 class="mb-0 pl-lg-4 pl-md-0 pl-0"><strong>เรียงโดย</strong></h5>
								</div>
								<div class="col-lg-2 col-md-4 col-4">
									<div class="btn-42294f btn w-100 font-btn-custom px-0">ยอดนิยม</div>
								</div>
								<div class="col-lg-2 col-md-4 col-4">
									<div class="btn-ededed btn w-100 font-btn-custom px-0">ล่าสุด</div>
								</div>
								<div class="col-lg-2 col-md-4 col-4">
									<div class="btn-ededed btn w-100 font-btn-custom px-0">สินค้าขายดี</div>
								</div>
								<div class="col-4 d-lg-flex flex-row justify-content-end align-items-center d-lg-block d-md-none d-none">
									<h6 class="mb-0 mt-2 mr-2"><strong>1/30</strong></h6>
									<nav aria-label="Page navigation example">
										<ul class="pagination mb-0">
											<li class="page-item">
												<a class="page-link" href="#" aria-label="Previous">
													<span aria-hidden="true">&laquo;</span>
												</a>
											</li>
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
						<div class="col-12 mb-lg-4 mb-md-3 mb-3">
							<div class="row align-items-center">
								<div class="col-lg-2 col-md-12 col-12 mb-lg-0 mb-md-2 mb-2">
									<h5 class="mb-0 pl-lg-4 pl-md-0 pl-0"><strong>ราคา</strong></h5>
								</div>
								<div class="col-lg-2 col-md-4 col-4">
									<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
								</div>

								<div class="col-lg-2 col-md-4 col-4">
									<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
								</div>
								<div class="col-lg-2 col-md-4 col-4">
									<div class="btn-c75ba1 btn w-100 font-btn-custom px-0">ตกลง</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="row align-items-center">
								<div class="col-lg-2 col-md-12 col-12">
									<div class="form-check ml-lg-4 ml-md-0 md-0">
										<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
										<label class="form-check-label" for="exampleRadios1">
											<span class="font-btn-custom">จัดส่งฟรี</span>
										</label>
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-12">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option1" >
										<label class="form-check-label" for="exampleRadios2">
											<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
											<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
											<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
											<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
											<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
											<i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
											<strong class="ml-2 font-btn-custom">หรือมากกว่า</strong>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
@for ($x = 0; $x <= 11; $x++)
						<div class="col-lg-3 col-md-6 col-6 mb-0 px-lg-2 px-md-2 px-1" style="margin-top: 100px;">
							<a href="{{ url('product-detail') }}">
							<div class="rounded8px px-2 " style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
								<img src="new_ui/img/product/product-22.png" style="margin-top: -80px;" class=" img-fluid rounded8px w-100" alt="...">
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
		</div>
	@endsection

@section('script')
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

@endsection
