
@extends('new_ui.layouts.front-end-seller')
@section('content')
	<div class="row">
		<div class="col-12 px-4 pt-4 pb-2">
			<h3><strong>รายการขายของฉัน</strong></h3>
		</div>
		<div class="col-12 px-4" >
			<div class="d-lg-block d-md-block d-none">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="true">ทั้งหมด (200)</a>
					</li>
					<!-- <li class="nav-item" role="presentation">
						<a class="nav-link" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab" aria-controls="list-2" aria-selected="false">ยังไม่ชำระ (20)</a>
					</li> -->
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab" aria-controls="list-3" aria-selected="false">ที่ต้องจัดส่ง (10)</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="list-4-tab" data-toggle="tab" href="#list-4" role="tab" aria-controls="list-4" aria-selected="false">จัดส่งแล้ว (60)</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="list-5-tab" data-toggle="tab" href="#list-5" role="tab" aria-controls="list-5" aria-selected="false">สำเร็จ (100)</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="list-6-tab" data-toggle="tab" href="#list-6" role="tab" aria-controls="list-6" aria-selected="false">ยกเลิก (5)</a>
					</li>
				</ul>
			</div>
			<div class="form-group d-lg-none d-md-none d-block">
				<select class="form-control" id="select-submenu">
					<option value="1">ทั้งหมด (200)</option>
					<!-- <option value="2">ยังไม่ชำระ (20)</option> -->
					<option value="3">ที่ต้องจัดส่ง (10)</option>
					<option value="4">จัดส่งแล้ว (60)</option>
					<option value="5">สำเร็จ (100)</option>
					<option value="6">ยกเลิก (5)</option>
				</select>
			</div>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
					{{-- <?php require_once('mylist-seller/my-list-all.php') ?> --}}
					@include('new_ui.mylist-seller.my-list-search')
					@include('new_ui.mylist-seller.my-list-all')
				</div>
				<div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
					{{-- <?php require_once('mylist-seller/my-list-not.php') ?> --}}
					@include('new_ui.mylist-seller.my-list-search')
					@include('new_ui.mylist-seller.my-list-not')
				</div>
				<div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-tab">
					{{-- <?php require_once('mylist-seller/my-list-send.php') ?> --}}
					@include('new_ui.mylist-seller.my-list-search')
					@include('new_ui.mylist-seller.my-list-send')
				</div>
				<div class="tab-pane fade" id="list-4" role="tabpanel" aria-labelledby="list-4-tab">
					{{-- <?php require_once('mylist-seller/my-list-send-success.php') ?> --}}
					@include('new_ui.mylist-seller.my-list-search')
					@include('new_ui.mylist-seller.my-list-send-success')
				</div>
				<div class="tab-pane fade" id="list-5" role="tabpanel" aria-labelledby="list-5-tab">
					{{-- <?php require_once('mylist-seller/my-list-success.php') ?> --}}
					@include('new_ui.mylist-seller.my-list-search')
					@include('new_ui.mylist-seller.my-list-success')
				</div>
				<div class="tab-pane fade" id="list-6" role="tabpanel" aria-labelledby="list-6-tab">
					{{-- <?php require_once('mylist-seller/my-list-cancel.php') ?> --}}
					@include('new_ui.mylist-seller.my-list-search')
					@include('new_ui.mylist-seller.my-list-cancel')
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