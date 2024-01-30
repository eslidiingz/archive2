
@extends('new_ui.layouts.front-end-seller')
@section('content')
				<div class="row">
					<div class="col-12 p-4">
						<h3><strong>ร้านค้าของฉัน</strong></h3>
					</div>
					<div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
						<div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
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
							<div class="col-lg-2 col-md-12 col-12 d-flex flex-column mb-4">
								<a href="shop-user-detail.php" target="_black">
									<div class="btn-outline-c45e9f btn form-control mb-2">
										<img src="new_ui/img/icon-shop.svg" style="width: 20px;" class="mr-2" alt="">ไปที่ร้านค้า
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
						<div class="form-row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
							<div class="col-12 mb-4 mt-4">
								<h3><strong>สินค้า</strong></h3>
							</div>
							@for ($x = 0; $x <= 3; $x++)
								<div class="col-lg-2 col-md-4 col-6 " >
									<a href="product-detail.php">
										<div class="rounded8px px-2 " style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
											<div class="pt-2 rounded8px d-flex align-items-center justify-content-center" style="height: 180px;">
												<img src="new_ui/img/product/product-22.png" style="max-width: 100%; max-height: 100%;" alt="...">
											</div>
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
						</div>
					</div>
				</div>
@endsection
