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
						<h1 class="text-white">ร้านค้า</h1>
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
							<li class="breadcrumb-item active" aria-current="page">ร้านค้า</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row p-4" style="background-color: #fff;">
				<div class="col-lg-5 col-md-12 col-12 px-0">
					<div class="form-group d-flex flex-row align-items-center">
						<div>
							<label for="exampleFormControlSelect1" style="width: 150px;"><h6 class="mb-0"><strong>จัดเรียงตาม :</strong></h6></label>
						</div>
						<div class="w-100">
							<select class="form-control" id="exampleFormControlSelect1">
								<option>ยอดนิยม</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-12 px-0">
					<hr class="w-100">
				</div>
				<div class="col-12">
					<div class="row mb-4">
						<div class="col-lg-4 col-md-6 col-12 d-flex align-items-center py-2" style="border: 1px solid #ddd;">
							<a href="shop-user-detail.php">
								<div class="media">
								  <img src="new_ui/img/shop/shop-1.png" style="width: 110px;" class="align-self-start mr-3" alt="...">
								  <div class="media-body ">
								    <h5 class="mt-0"><strong>ร้านMac Service thailand  สาขานครราชสีมา</strong></h5>
								    <p class="mb-0">โทรศัพท์มือถือ อุปกรณ์และเครือข่าย</p>
								    <p class="mb-0">
								    	<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
								    </p>
								  </div>
								</div>
							 </a>
						</div>
						<div class="col-lg-4 col-md-6 col-12 d-flex align-items-center py-2" style="border: 1px solid #ddd;">
							<a href="shop-user-detail.php">
								<div class="media">
								  <img src="new_ui/img/shop/shop-2.png" style="width: 110px;" class="align-self-start mr-3" alt="...">
								  <div class="media-body ">
								    <h5 class="mt-0"><strong>ร้านMac Service thailand  สาขานครราชสีมา</strong></h5>
								    <p class="mb-0">โทรศัพท์มือถือ อุปกรณ์และเครือข่าย</p>
								    <p class="mb-0">
								    	<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
								    </p>
								  </div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6 col-12 d-flex align-items-center py-2" style="border: 1px solid #ddd;">
							<a href="shop-user-detail.php">
								<div class="media">
								  <img src="new_ui/img/shop/shop-3.png" style="width: 110px;" class="align-self-start mr-3" alt="...">
								  <div class="media-body ">
								    <h5 class="mt-0"><strong>ร้านMac Service thailand  สาขานครราชสีมา</strong></h5>
								    <p class="mb-0">โทรศัพท์มือถือ อุปกรณ์และเครือข่าย</p>
								    <p class="mb-0">
								    	<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
										<i class="fa fa-star mb-3" style="color: #f6c100;" aria-hidden="true"></i>
								    </p>
								  </div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-12 d-flex justify-content-end px-0">
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
	@endsection