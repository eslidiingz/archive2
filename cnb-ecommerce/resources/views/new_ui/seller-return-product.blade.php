
@extends('new_ui.layouts.front-end-seller')
@section('content')
<div class="row">
	<div class="col-12 px-4 pt-4 pb-2">
		<h3><strong>คืนสินค้า/คืนเงิน</strong></h3>
	</div>
	<div class="col-12 px-4" >
		@include('new_ui.mylist-seller.my-list-search')

		<div class="col-12 px-0">
			<table class="table-bordered">
				<thead>
					<tr>
						<th scope="col" class="p-4 text-left">สินค้าทั้งหมด</th>
						<th scope="col" class="width200 text-left">ยอดคำสั่งซื้อทั้งหมด</th>
						<th scope="col" class="width200 text-left">สถานะ</th>
						<th scope="col" class="width200 text-left">ช่องทางการจัดส่ง</th>
						<th scope="col" class="width100 text-left">ดำเนินการ</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td scope="row" data-label="สินค้าทั้งหมด">
							<div class="row">
								<div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
									<div class="media">
										<img src="img/product/product-11.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
										<div class="media-body">
											<h6 class="mt-0"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
											สีน้ำตาล,S
										</div>
									</div>
								</div>
								<div class="col-12 text-lg-left text-md-right text-sm-right">
									<div class="media">
										<img src="img/product/product-11.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
										<div class="media-body">
											<h6 class="mt-0"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
											สีน้ำตาล,S
										</div>
									</div>
								</div>
							</div>
						</td>
						<td data-label="ยอดคำสั่งซื้อทั้งหมด">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0"><strong>฿ 1,050</strong></h6>
								</div>
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0" style="color: #919191;">โอนผ่าน T10 วอลเล็ท</h6>
								</div>
							</div>
						</td>
						<td data-label="สถานะ" class="text-lg-left text-md-right text-sm-right">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0"><strong style="color: #ffba00;">รออนุมัติ</strong></h6>
								</div>
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0" style="color: #919191;">#STN637849506</h6>
								</div>
							</div>
						</td>
						<td data-label="ช่องทางการจัดส่ง">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0">Kerry express</h6>
								</div>
							</div>
						</td>
						<td data-label="ดำเนินการ">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="{{ url('seller-detail') }}" class="dropdown-item" type="button">ดูรายละเอียด</a>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td scope="row" data-label="สินค้าทั้งหมด">
							<div class="row">
								<div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
									<div class="media">
										<img src="img/product/product-11.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
										<div class="media-body">
											<h6 class="mt-0"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
											สีน้ำตาล,S
										</div>
									</div>
								</div>

							</div>
						</td>
						<td data-label="ยอดคำสั่งซื้อทั้งหมด">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0"><strong>฿ 1,050</strong></h6>
								</div>
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0" style="color: #919191;">โอนผ่านบัตรเครดิต/เดบิต</h6>
								</div>
							</div>
						</td>
						<td data-label="สถานะ" class="text-lg-left text-md-right text-sm-right">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0"><strong style="color: #23c197;">ยอมรับ</strong></h6>
								</div>
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0" style="color: #919191;">#STN637849506</h6>
								</div>
							</div>
						</td>
						<td data-label="ช่องทางการจัดส่ง">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0">Alpha Fast</h6>
								</div>
							</div>
						</td>
						<td data-label="ดำเนินการ">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="{{ url('seller-detail') }}" class="dropdown-item" type="button">ดูรายละเอียด</a>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td scope="row" data-label="สินค้าทั้งหมด">
							<div class="row">
								<div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
									<div class="media">
										<img src="img/product/product-11.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
										<div class="media-body">
											<h6 class="mt-0"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
											สีน้ำตาล,S
										</div>
									</div>
								</div>

							</div>
						</td>
						<td data-label="ยอดคำสั่งซื้อทั้งหมด">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0"><strong>฿ 1,050</strong></h6>
								</div>
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0" style="color: #919191;">โอนผ่านบัตรเครดิต/เดบิต</h6>
								</div>
							</div>
						</td>
						<td data-label="สถานะ" class="text-lg-left text-md-right text-sm-right">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0"><strong style="color: #a83c23;">ปฏิเสธ</strong></h6>
								</div>
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0" style="color: #919191;">#STN637849506</h6>
								</div>
							</div>
						</td>
						<td data-label="ช่องทางการจัดส่ง">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0">Alpha Fast</h6>
								</div>
							</div>
						</td>
						<td data-label="ดำเนินการ">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="{{ url('seller-detail') }}" class="dropdown-item" type="button">ดูรายละเอียด</a>
									</div>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
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