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
				<h1 class="text-white">FLASH SALE</h1>
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
					<li class="breadcrumb-item active" aria-current="page">FLASH SALE</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row mt-4">
		@foreach($product_all as $item)
		<div class="col-lg-2 col-md-3 col-6 px-lg-2 px-md-2 px-1  mb-3">
			<div class="card position-relative" style=" border: none;">
				<a href="{{ url('product-detail') }}"><img src="{{asset('/img/product/'.$item->product_img[0])}}" style="height:200px" class="card-img-top img-fluid" alt="..." onerror="this.onerror=null;this.src='/img/no_image.png'">
					<div class="card-body text-left p-2">
						<h6 class="card-title mb-0" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><strong>{{ $item->name }}</strong></h6>
						<h2 class="card-text mb-0" style="color: #c75ba1;"><strong>฿{{ $item->product_option['price'][0] }}</strong></h2>
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
@endsection
