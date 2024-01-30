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
				<h1 class="text-white">สินค้าใหม่</h1>
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
					<li class="breadcrumb-item active" aria-current="page">สินค้าใหม่</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row">
		@foreach($product_all as $item)

		<div class="col-lg-2 col-md-4 col-6 px-lg-2 px-md-2 px-1">
			<a href="{{ url('product-detail') }}">
				<div class="rounded8px px-2 " style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
					<div>
						<img src="{{asset('/img/product/'.$item->product_img[0])}}"class="mt-2 img-fluid rounded8px w-100" style="height:200px" alt="..."
						 onerror="this.onerror=null;this.src='/img/no_image.png'">
					</div>
					<div>
						<h6 class="card-title mb-0 text-left pt-2" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><strong >{{ $item->name }}</strong></h6>
						<h2 class="card-text mb-0 text-left" style="color: #c75ba1;"><strong>฿{{ $item->product_option['price'][0] }}</strong></h2>
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
	@endsection
