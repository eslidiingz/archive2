@extends('new_ui.layouts.front-end')
@section('style')
	<style>
		.swiper-container {
			width: 100%;
			height: 300px;
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

		.gallery-top {
			height: 80%;
			width: 100%;
		}

		.gallery-thumbs {
			height: 20%;
			box-sizing: border-box;
			padding: 10px 0;
		}

		.gallery-thumbs .swiper-slide {
			height: 100%;
			opacity: 0.4;
		}

		.gallery-thumbs .swiper-slide-thumb-active {
			opacity: 1;
		}
	</style>
@endsection
	@section('content')
		<div class="container">
			<div class="row">
				<div class="col-2 d-lg-block d-md-none d-none"></div>
				<div class="col-lg-12 col-md-12 col-12">
					<div class="row">
						<div class="col-12 px-lg-4 px-md-0 px-sm-0 mb-4" style="background-color: #fff; border-radius: 0 0 8px 8px;">
							<div class="row d-lg-block d-md-none d-none">
								<div class="col-12 mt-4">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb" style="background-color: unset;">
											<li class="breadcrumb-item"><a href="#" style="color: #1947e3;">หน้าแรก</a></li>
											<li class="breadcrumb-item"><a href="#" style="color: #1947e3;">สัตว์เลี้ยง</a></li>
											<li class="breadcrumb-item"><a href="#" style="color: #1947e3;">แมว</a></li>
											<li class="breadcrumb-item active" aria-current="page">ห้องน้ำแมวไฟฟ้าอัจฉริยะ Petree ทำความสะอาดอัตโนมัติ (แถมแผ่นรอง+ถุง)....</li>
										</ol>
									</nav>
								</div>
							</div>
							<div class="row p-lg-0 p-md-4 p-0">

								<div class="col-lg-4 col-md-12 col-12 mb-lg-0 mb-md-4 mb-4">
									<!-- Swiper -->
									<div class="swiper-container gallery-top">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<img src="new_ui/img/product/product-11.png" class="img-fluid w-100" alt="">
											</div>
											<div class="swiper-slide">
												<img src="new_ui/img/product/product-22.png" class="img-fluid w-100" alt="">
											</div>
											<div class="swiper-slide">
												<img src="new_ui/img/product/food-1.png" class="img-fluid w-100" alt="">
											</div>
											<div class="swiper-slide">
												<img src="new_ui/img/product/food-2.png" class="img-fluid w-100" alt="">
											</div>
										</div>
										<!-- Add Arrows -->
										<!-- <div class="swiper-button-next swiper-button-white"></div>
										<div class="swiper-button-prev swiper-button-white"></div> -->
									</div>
									<div class="swiper-container gallery-thumbs">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<img src="new_ui/img/product/product-11.png" class="img-fluid w-100" alt="">
											</div>
											<div class="swiper-slide">
												<img src="new_ui/img/product/product-22.png" class="img-fluid w-100" alt="">
											</div>
											<div class="swiper-slide">
												<img src="new_ui/img/product/food-1.png" class="img-fluid w-100" alt="">
											</div>
											<div class="swiper-slide">
												<img src="new_ui/img/product/food-2.png" class="img-fluid w-100" alt="">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-8 col-md-12 col-12">
									<div class="row">
										<div class="col-12">
											<h5><strong>ห้องน้ำแมวไฟฟ้าอัจฉริยะ Petree ทำความสะอาดอัตโนมัติ (แถมแผ่นรอง+ถุง) ห้องน้ำแมวอัตโนมัติ ประกัน ศูนย์ 1 ปี</strong></h5>

										</div>
										<div class="col-12 d-flex flex-row align-items-center mb-2">
											<div class="mr-4">
												<h6 class="mb-0" style="color: #b1b7bc; text-decoration:line-through;">25,000 บาท</h6>
											</div>
											<div class="mr-4">
												<h4 class="mb-0" style="color: #c45e9f;"><strong>17,500 บาท</strong></h4>
											</div>
											<div class="px-2 py-0 rounded8px text-white" style="background-color: #c40000;">
												ส่วนลด 30%
											</div>
										</div>
										<div class="col-12 d-flex flex-row align-items-center">
											<div class="mr-lg-4 mr-md-2 mr-2 d-flex align-items-center flex-row">
												<h5 class="mb-0 mr-2" style="color: #f6c100;"><strong>5</strong></h5>
												<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
												<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
												<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
												<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
												<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
												<div class="ml-lg-4 ml-md-0 ml-0" style="color: #b1b7bc;">|</div>
											</div>

											<div class="mr-lg-4 mr-md-2 mr-2 d-flex align-items-center flex-row">
												<h5 class="mb-0 mr-2"><strong>123</strong></h5>
												<h6 class="mb-0" style="color: #b1b7bc;"><span class="font-btn-custom">ความคิดเห็น</span></h6>
												<div class="ml-lg-4 ml-md-1 ml-1" style="color: #b1b7bc;">|</div>
											</div>
											<div class="d-flex align-items-center flex-row">
												<h5 class="mb-0 mr-2"><strong>46.7k</strong></h5>
												<h6 class="mb-0" style="color: #b1b7bc;"><span class="font-btn-custom">ขายแล้ว</span></h6>
											</div>
                                        </div>


										<div class="col-12">
											<hr class="w-100">
										</div>
										<div class="col-12 d-flex flex-row align-items-center">
											<div class="row align-items-center">
												<div class="col-lg-2 col-md-12 col-12">
													<h6 class="mb-0"><strong>ส่งจาก : </strong></h6>
												</div>
												<div class="col-lg-10 col-md-12 col-12 px-1">
													<div class="btn-group">
														<button  class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															เขตลาดพร้าว จังหวัดกรุงเทพมหานคร
														</button>
														<div class="dropdown-menu dropdown-menu-right">
															<button class="dropdown-item" type="button"><h6>เขตลาดพร้าว จังหวัดกรุงเทพมหานคร 1</h6></button>
															<button class="dropdown-item" type="button"><h6>เขตลาดพร้าว จังหวัดกรุงเทพมหานคร 2</h6></button>
															<button class="dropdown-item" type="button"><h6>เขตลาดพร้าว จังหวัดกรุงเทพมหานคร 3</h6></button>
														</div>
													</div>
												</div>
												<div class="col-lg-2 col-md-12 col-12">
													<h6 class="mb-0"><strong>ค่าส่ง : </strong></h6>
												</div>
												<div class="col-lg-10 col-md-12 col-12 px-1">
													<div class="btn-group">
														<button  class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															0 - 70 บาท
														</button>
														<div class="dropdown-menu dropdown-menu-right">
															<button class="dropdown-item" type="button"><h6>0 - 70 บาท</h6></button>
														<button class="dropdown-item" type="button"><h6>70 - 100 บาท</h6></button>
														<button class="dropdown-item" type="button"><h6>100 - 150 บาท</h6></button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12">
											<hr class="w-100">
										</div>
										<div class="col-12 mb-2">
											<div class="row align-items-center">
												<div class="col-lg-2 col-md-12 col-12 mb-2">
													<h6 class="mb-0"><strong>สี : </strong></h6>
												</div>
												<div class="col-lg-2 col-md-6 col-6 mb-2 ">
													<div class="btn-outline-422a4e btn form-control">สีชมพู</div>
												</div>
												<div class="col-lg-2 col-md-6 col-6 mb-2 ">
													<div class="btn-outline-secondary btn form-control">สีขาว</div>
												</div>
												<div class="col-lg-2 col-md-6 col-6 mb-2 ">
													<div class="btn-outline-422a4e btn form-control">สีเขียว</div>
												</div>
												<div class="col-lg-2 col-md-6 col-6 mb-2 ">
													<div class="btn-outline-422a4e btn form-control">สีแดง</div>
												</div>
											</div>
										</div>
										<div class="col-12 mb-2">
											<div class="row align-items-center">
												<div class="col-lg-2 col-md-12 col-12 mb-2">
													<h6 class="mb-0"><strong>ขนาด : </strong></h6>
												</div>
												<div class="col-lg-2 col-md-6 col-6 mb-2 ">
													<div class="btn-outline-422a4e btn form-control">24 นิ้ว</div>
												</div>
												<div class="col-lg-2 col-md-6 col-6 mb-2 ">
													<div class="btn-outline-secondary btn form-control">30 นิ้ว</div>
												</div>
												<div class="col-lg-2 col-md-6 col-6 mb-2 ">
													<div class="btn-outline-422a4e btn form-control">36 นิ้ว</div>
												</div>

											</div>
										</div>
										<div class="col-12 mb-3">
											<div class="row align-items-center ">
												<div class="col-lg-2 col-md-12 col-12 mb-2">
													<h6 class="mb-0"><strong>จำนวน</strong></h6>
												</div>
												<div class="col-lg-3 col-md-6 col-6 d-flex flex-row">
													<div class="btn mr-4 py-0 px-2" style="color: #000; background-color: #b1b7bc;"><h4 class="mb-0">-</h4></div>
													<div>
														<h4 class="mb-0"><strong>1</strong></h4>
													</div>
													<div class="btn ml-4 py-0 px-2" style="color: #000; background-color: #b1b7bc;"><h4 class="mb-0">+</h4></div>
												</div>
												<div class="col-lg-4 col-md-6 col-6">
													<h6 class="mb-0"><strong>มีสินค้าทั้งหมด 345</strong></h6>
												</div>
											</div>
										</div>
										<div class="col-12 ">
											<div class="row">
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<div class="btn-f8eaf3 btn form-control">
														<img style="margin-top: -4px; width: 20px;" src="new_ui/img/menu/icon-sub-menu-user-1.svg" alt=""> ใส่ตะกร้า
													</div>
												</div>
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<div class="btn-f8eaf3 btn form-control">
														ซื้อเลย
													</div>
												</div>
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<div class="btn-f8eaf3 btn form-control">
														<img style="margin-top: -4px; width: 20px;" src="new_ui/img/menu/icon-sub-menu-user-4.svg" alt=""> เปรียบเทียบ
													</div>
												</div>
												<div class="col-lg-3 col-md-6 col-6 mb-2 pr-lg-1">
													<div class="btn-f8eaf3 btn form-control">
														<img style="margin-top: -4px; width: 20px;" src="new_ui/img/menu/icon-sub-menu-user-3.svg" alt=""> 2,334
													</div>
												</div>
											</div>

										</div>
										<div class="col-12">
											<hr class="w-100">
										</div>
										<div class="col-12 d-flex flex-row align-items-center mb-4" >
											<div class="mr-4 d-flex align-items-center flex-row">
												<div class="mr-2"><img src="new_ui/img/footer/icon-footer-1.svg" width="30px" alt=""></div>
												<div class="mr-2"><img src="new_ui/img/footer/icon-footer-2.svg" width="30px" alt=""></div>
												<div class="mr-2"><img src="new_ui/img/footer/icon-footer-3.svg" width="30px" alt=""></div>
												<div class="mr-2"><img src="new_ui/img/footer/icon-footer-4.svg" width="30px" alt=""></div>
												<div class="mr-2"><img src="new_ui/img/footer/icon-footer-5.svg" width="30px" alt=""></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 px-4 " style="background-color: #fff; border-radius: 8px 8px 0px 0px;">
							<div class="row">
								<div class="col-12 my-3">
									<h5 class="mb-0" style="color: #c45e9f;"><strong>รายละเอียด</strong></h5>
								</div>
							</div>
						</div>
						<div class="col-12 px-4 mb-4" style="background-color: #fff; border-radius: 0 0 8px 8px; border-top: 3px solid #dfe1e3;">
							<div class="row">
								<div class="col-12 mt-4">
									<h6><strong>ข้อมูลของสินค้า</strong></h6>
								</div>
								<div class="col-12 d-flex flex-row align-items-center mb-2">
									<div class="d-flex align-items-center flex-row">
										<div style="width: 100px;">
											<h6 class="mb-0"><strong style="color: #b1b7bc;">หมวดหมู่</strong></h6>
										</div>
										<div>
											<h6 class="mb-0">สัตว์เลี้ยง > แมว</h6>
										</div>
									</div>
								</div>
								<div class="col-12 d-flex flex-row align-items-center mb-2">
									<div class="d-flex align-items-center flex-row">
										<div style="width: 100px;">
											<h6 class="mb-0"><strong style="color: #b1b7bc;">จำนวนสินค้า</strong></h6>
										</div>
										<div>
											<h6 class="mb-0">354</h6>
										</div>
									</div>
								</div>
								<div class="col-12 d-flex flex-row align-items-center mb-2">
									<div class="d-flex align-items-center flex-row">
										<div style="width: 100px; ">
											<h6 class="mb-0"><strong style="color: #b1b7bc;">ส่งจาก</strong></h6>
										</div>
										<div>
											<h6 class="mb-0">เขตลาดพร้าว จังหวัดกรุงเทพมหานคร , อำเภอบางพลี จังหวัดสมุทรปราการ</h6>
										</div>
									</div>
								</div>

								<div class="col-12">
									<h6><strong>รายละเอียดสินค้า</strong></h6>
									<p>ห้องน้ำแมวอัตโนมัติ เก็บอึแมวให้ทันทีโดยอัตโนมัติ!! <br>
										ห้องน้ำแมวอัตโนมัติ Petree ช่วยตักอุจาระแมวออกจากทรายโดยอัตโนมัติ ลดกลิ่นไม่พึงประสงค์ภายในบ้าน ทำให้ดูบ้านสะอาด ช่วยคุณประหยัดเวลา ให้คุณมีเวลาเหลือมากขึ้น Petree ออกแบบมาอย่างสวยงามลงตัวกับห้องทุกแบบ ใช้งานง่าย สะดวกต่อคน และปลอดภัยต่อแมวด้วยเซ็นเซอร์ตรวจจับขณะแมวกำลังใช้งานอยู่ การันตีทุกบ้านแมวชอบมากกก
										มอบสิ่งดีๆเพื่อแมวที่คุณรัก<br>
										✔️ช่วยประหยัดเวลา ทำให้ผู้เลี้ยงดู ไม่โดนฝุ่นจากทรายแมว<br>
										✔️ ช่วยให้ภายในห้องสะอาด เป็นระเบียบเรียบร้อย<br>
										✔️ ลดกลิ่นที่ไม่พึงประสงค์ภายในบ้าน หรือคอนโด<br>
										✔️ ออกแบบมาให้ง่ายต่อการใช้งานของแมวโดยเฉพาะ<br>
										✔️ ปลอดภัยต่อแมวเหมียวด้วยเซ็นเซอร์ตรวจเช็ค<br>
										✔️ ใช้งานง่าย มีระบบทำงานโดยอัตโนมัติหลังแมวออก<br>
										✔️ ไม่ต้องเก็บอึแมวทุกวัน<br>
										✔️ สามารถเก็บของเสียในกระบะได้ 1 สัปดาห์/แมว1ตัว<br>
										✔️ ตัวเครื่องสามารถถอดทำความสะอาดได้ง่าย<br>
										✔️ มีไฟแสดงสถานะการทำงานของเครื่อง<br><br>

										สินค้า : ห้องน้ำแมวอัตโนมัติ<br>
										แบรนด์ : Petree<br>
										น้ำหนัก : 7.5 kg<br>
										วัสดุ : PP<br>
										กำลังไฟ : 5 วัตถ์<br>
										แรงดันไฟฟ้า : 12 โวลต์<br>
										รองรับน้ำหนัก : 20 kg<br>
										ปริมาณทรายที่รองรับ : 4 kg<br>
										ถังเก็บอุจจาระแมว : 4 ลิตร<br>
										ใช้กับทรายแมว : เบนโทไนซ์ หรือทรายภูเขาไฟ<br>
										เซ็นเซอร์ : ตรวจจับน้ำหนักแมว<br>
										รอบหมุน : ตามเข็มนาฬิกา<br>
										ขนาดบรรจุภัณฑ์ : 60 x 60 x 60 cm<br>
										การรับประกัน : 1 ปี
									</p>
								</div>
							</div>
						</div>
						<div class="col-12 px-4 mb-4 " style="background-color: #fff; border-radius: 8px 8px 8px 8px;">
							<div class="row mt-4 mb-lg-2 mb-md-4 mb-4">
								<div class="col-lg-4 col-md-12 col-12 mb-4">
									<div class="media">
										<img src="new_ui/img/brand/brand-product-detail-1.png" class="align-self-start mr-3 img-fluid" style="width: 32%; border: 1px solid #caced1;" alt="...">
										<div class="media-body">
											<p class="mb-0">จัดจำหน่ายโดย</p>
											<h5 class="mt-0"><strong>SAVEAGE</strong></h5>
											<p class="mb-0" style="color: #1947e3;">Active 5 ชั่วโมง ที่ผ่านมา</p>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-4 col-4 text-center d-flex align-items-center justify-content-start flex-column mb-4" style="border-right: 1px solid #caced1;">
									<div><h6 class="pt-2 mb-0" style="color: #acb0b4;">คะแนนร้านค้า</h6></div>
									<div class="mt-auto"><h1 class="mb-0"><strong style="color: #c45e9f;">91%</strong></h1></div>
								</div>
								<div class="col-lg-2 col-md-4 col-4 text-center d-flex align-items-center justify-content-start flex-column mb-4" style="border-right: 1px solid #caced1;">
									<div><h6 class="pt-2 mb-0" style="color: #acb0b4;">จัดส่งตรงเวลา</h6></div>
									<div class="mt-auto"><h1 class="mb-0"><strong style="color: #c45e9f;">99%</strong></h1></div>
								</div>
								<div class="col-lg-2 col-md-4 col-4 text-center d-flex align-items-center justify-content-start flex-column mb-4" >
									<div><h6 class="pt-2 mb-0" style="color: #acb0b4;">อัตราการตอบแชท</h6></div>
									<div class="mt-auto"><h1 class="mb-0"><strong style="color: #c45e9f;">94%</strong></h1></div>
								</div>
								<div class="col-lg-2 col-md-12 col-12 d-flex flex-column ">
									<div class="btn-outline-c45e9f btn form-control mb-2"><img src="new_ui/img/icon-shop.svg" style="width: 20px;" class="mr-2" alt="">ไปที่ร้านค้า</div>
									<div class="btn-outline-c45e9f btn form-control"><img src="new_ui/img/icon-chat.svg" style="width: 20px;" class="mr-2" alt="">แชทเลย</div>
								</div>
							</div>
						</div>
						<div class="col-12 px-4 " style="background-color: #fff; border-radius: 8px 8px 0px 0px;">
							<div class="row">
								<div class="col-12 my-3">
									<h5 class="mb-0" style="color: #c45e9f;"><strong>คะแนนของสินค้า</strong></h5>
								</div>
							</div>
						</div>
						<div class="col-12 px-4 mb-4" style="background-color: #fff; border-radius: 0 0 8px 8px; border-top: 3px solid #dfe1e3;">
							<div class="row my-4">
								<div class="col-lg com-md-6 col-6 px-1 order-lg-0 order-md-0 order-0">
									<div class="btn-outline-c45e9f btn form-control mb-2 mr-2 d-flex flex-row justify-content-center">ทั้งหมด <span class="d-lg-block d-md-none d-none">&nbsp;(123)</span></div>
								</div>
								<div class="col-lg com-md col px-1 order-lg-1 order-md-2 order-2">
									<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">5 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(100)</span></div>
								</div>
								<div class="col-lg com-md col px-1 order-lg-2 order-md-3 order-3">
									<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">4 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(20)</span></div>
								</div>
								<div class="col-lg com-md col px-1 order-lg-3 order-md-4 order-4">
									<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">3 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(2)</span></div>
								</div>
								<div class="col-lg com-md col px-1 order-lg-4 order-md-5 order-5">
									<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">2 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(1)</span></div>
								</div>
								<div class="col-lg com-md col px-1 order-lg-5 order-md-6 order-6">
									<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">1 ดาว <span class="d-lg-block d-md-none d-none">&nbsp;(0)</span></div>
								</div>
								<div class="col-lg com-md col-6 px-1 order-lg-6 order-md-1 order-1">
									<div class="btn-outline-secondary btn form-control mb-2 mr-2 px-1 d-flex flex-row justify-content-center">รูปภาพ <span class="d-lg-block d-md-none d-none">&nbsp;(354)</span></div>
								</div>
							</div>
@for ($x = 0; $x <= 4; $x++)
							<div class="row">
								<div class="col-12">
									<div class="media">
										<img src="new_ui/img/img-user-test.jpg" style="width: 50px; border-radius: 100%;" class="align-self-start mr-3" alt="...">
										<div class="media-body d-flex flex-row">
											<div>
												<h6 class="mt-0 mb-0"><strong>j**********s</strong></h6>
												<p class="mb-0" style="color: #f6c100;">
													<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
													<i class="fa fa-star mr-1" style="color: #f6c100;" aria-hidden="true"></i>
												</p>
											</div>
											<div class="d-lg-block d-md-block d-none">
												<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
											</div>
										</div>
										<div>
											<h6 class="ml-auto mt-0 mb-0" style="color: #c45e9f;"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</h6>
										</div>
									</div>
								</div>

								<div class="col-12 mt-2 d-lg-none d-md-none d-block">
									<h6 class="mt-0 mb-0" style="color: #dfe1e3;">ตัวเลือกสินค้า : สีแดง, 24 นิ้ว</h6>
								</div>
								<div class="col-12 mt-2">
									<h6>มือใหม่ ใช้ไม่เป็น แต่ร้านค้าแนะนำช่วยเหลือดีมากกกกค่ะ</h6>
								</div>
								<div class="col-12">
									<img src="new_ui/img/product/product-11.png" class="img-fluid rounded8px mr-2" style="width: 60px;" alt="">
									<img src="new_ui/img/product/product-22.png" class="img-fluid rounded8px mr-2" style="width: 60px;" alt="">
								</div>
								<div class="col-12 mt-2">
									<p class="mb-0" style="color: #b1b7bc;">09/05/2020 00:07</p>
								</div>
								<div class="col-12">
									<hr class="w-100">
								</div>
							</div>
@endfor
							<div class="row">
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
						<div class="col-12 px-lg-0">
							<h5 class="mb-0"><strong>สินค้าใกล้เคียง</strong></h5>
						</div>
					</div>
				</div>
				<div class="col-2 d-lg-block d-md-none d-none"></div>

				<div class="col-12">
					<div class="row">
						<div class="owl-carousel"  id="owl3">
@for ($x = 0; $x <= 11; $x++)
							<div class="col-12 rounded8px" style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important; margin-top: 100px;">
								<div class="row">
									<div class="col-12">
										<img src="new_ui/img/product/food-1.png" style="margin-top: -80px;" class="img-fluid rounded8px" alt="...">
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
@endfor
						</div>
					</div>
				</div>
				<div class="col-12 text-center mb-4">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-md-6 col-12">
							<button class="btn py-2" style="width: 100%; background-color: #fff;box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;"><strong>ดูเพิ่มเติม</strong></button>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('script')
<!-- Initialize Swiper -->
<script>
	var galleryThumbs = new Swiper('.gallery-thumbs', {
		spaceBetween: 10,
		slidesPerView: 4,
		loop: true,
		freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
  });
	var galleryTop = new Swiper('.gallery-top', {
		spaceBetween: 10,
		loop: true,
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
				items:6,
				nav:false,
				loop:false
			}
		}
	})
</script>


@endsection
