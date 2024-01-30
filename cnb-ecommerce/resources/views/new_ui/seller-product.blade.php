@extends('new_ui.layouts.front-end-seller')
@section('content')
		<div class="row">
				<div class="col-6 p-4">
					<h3><strong>My Product</strong></h3>
				</div>
				<!-- <div class="col-6 py-4 pl-0 pr-4 text-right">
					<a href="{{ url('seller-add-product') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มสินค้าใหม่</a>
				</div> -->
				<div class="col-12 px-4" >
					<div class="d-lg-block d-md-block d-none">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="true">ทั้งหมด (20)</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab" aria-controls="list-2" aria-selected="false">ขายอยู่ (18)</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab" aria-controls="list-3" aria-selected="false">ไม่แสดง (2)</a>
							</li>
						</ul>
					</div>
					<div class="form-group d-lg-none d-md-none d-block">
						<select class="form-control" id="select-submenu">
							<option value="1">ทั้งหมด (20)</option>
							<option value="2">ขายอยู่ (18)</option>
							<option value="3">ไม่แสดง (2)</option>
						</select>
					</div>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
							{{-- <?php require_once('mylist-seller/my-product-all.php') ?> --}}
							@include('new_ui.mylist-seller.my-product-search')
							@include('new_ui.mylist-seller.my-product-all')
						</div>
						<div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
							{{-- <?php require_once('mylist-seller/my-product-sell.php') ?> --}}
							@include('new_ui.mylist-seller.my-product-search')
							@include('new_ui.mylist-seller.my-product-sell')
						</div>
						<div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-tab">
							{{-- <?php require_once('mylist-seller/my-product-notshow.php') ?> --}}
							@include('new_ui.mylist-seller.my-product-search')
							@include('new_ui.mylist-seller.my-product-notshow')
						</div>
					</div>
				</div>
		</div>
@endsection

@section('script')
<script>
	$('#select-submenu').on('change',function(){
		value = $(this).val();
		$('a.nav-link[href="#list-'+value+'"]').click();
	});
</script>
@endsection

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
	.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
		color: #fff;
		background-color: #c75ba1;
		border-color: #c75ba1;
		border: none;

	}
	.nav-tabs .nav-link:hover{
		border: none;
		color: #fff;
		background-color: #c75ba1;
	}
	.nav-tabs .nav-link{
		border: none;
	}
	.nav-tabs{
		border-bottom: 4px solid #c75ba1;
	}
</style>
@endsection