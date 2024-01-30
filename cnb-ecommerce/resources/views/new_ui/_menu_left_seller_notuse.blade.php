<style>
	.sidenav {
		height: 100%;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #fff;
		overflow-x: hidden;
		padding-top: 20px;
	}

	.sidenav a {
		padding: 6px 8px 6px 16px;
		text-decoration: none;
		font-size: 25px;
		color: #818181;
		display: block;
	}

	.sidenav a:hover {
		color: #f1f1f1;
	}

	@media (min-width: 350px) {
		.sidenav{
			width: 0px;
		}
		.main {
			margin-left: 0;
			width: 100%;
		}
	}
	@media (min-width: 576px) {
		.sidenav{
			width: 0px;
		}
		.main {
			margin-left: 0;
			width: 100%;
		}
	}
	@media (min-width: 768px) {
		.sidenav{
			width: 0px;
		}
		.main {
			margin-left: 0;
			width: 100%;
		}
	}
	@media (min-width: 992px) {
		.sidenav{
			width: 280px;
		}
		.main {
			margin-left: 280px;
			width: calc(100% - 280px);
		}
	}
	@media (min-width: 1200px) {

	}
</style>
<div class="sidenav ">
	<div class="row mb-4">
		<div class="col-12 text-center">
			<a href="/shop/seller-index.php" class="p-0"><img src="new_ui/img/logo-saler.svg" class="img-fluid w-75"></a>
		</div>
	</div>
	<div class="col-12 position-relative" >
		<div id="accordion">
			<div class="card" style="border: none;">
				<div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseOne">
					<strong class="text-dark">
						<img src="new_ui/img/seller/icon_menu/icon_menu_1.svg" style="width: 30px;" class="pr-2" alt="">รายการขาย
					</strong>
					<div class="collapsedIcon">
						<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
						</div>
					</div>
					<div id="collapseOne" class="collapse show">
						<div class="card-body py-0">
							<a class="px-0" href="{{ url('shop/seller-index') }}"><h6 style="text-indent: 30px;">รายการขายของฉัน</h6></a>
							<h6 style="text-indent: 30px;">คืนสินค้า</h6>
						</div>
					</div>
				</div>
				<div class="card" style="border: none;">
					<div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseTwo">
						<strong class="text-dark">
							<img src="new_ui/img/seller/icon_menu/icon_menu_2.svg" style="width: 30px;" class="pr-2" alt="">สินค้า
						</strong>
						<div class="collapsedIcon">
							<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
						</div>
					</div>
					<div id="collapseTwo" class="collapse show">
						<div class="card-body py-0">
							<a class="px-0" href="{{ url('seller-product') }}"><h6 style="text-indent: 30px;">สินค้าของฉัน</h6></a>
							<a class="px-0" href="{{ url('seller-add-product') }}"><h6 style="text-indent: 30px;">เพิ่มสินค้าใหม่</h6></a>
						</div>
					</div>
				</div>
				<div class="card" style="border: none;">
					<div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseThree">
						<strong class="text-dark">
							<img src="new_ui/img/seller/icon_menu/icon_menu_3.svg" style="width: 30px;" class="pr-2" alt="">การเงิน
						</strong>
						<div class="collapsedIcon">
							<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
						</div>
					</div>
					<div id="collapseThree" class="collapse show">
						<div class="card-body py-0">
							<h6 style="text-indent: 30px;">รายรับของฉัน</h6>
							<h6 style="text-indent: 30px;">Wallet</h6>
							<a class="px-0" href="{{ url('seller-bank') }}"><h6 style="text-indent: 30px;">บัญชีธนาคาร</h6></a>
						</div>
					</div>
				</div>
				<div class="card" style="border: none;">
					<div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseFour">
						<strong class="text-dark">
							<img src="new_ui/img/seller/icon_menu/icon_menu_4.svg" style="width: 30px;" class="pr-2" alt="">ร้านค้า
						</strong>
						<div class="collapsedIcon">
							<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
						</div>
					</div>
					<div id="collapseFour" class="collapse show">
						<div class="card-body py-0">
							<a class="px-0" href="{{ url('shop/seller-shop-user-detail') }}"><h6 style="text-indent: 30px;">ร้านค้าของฉัน</h6></a>
							<h6 style="text-indent: 30px;">คะแนนร้านค้า</h6>
							<a class="px-0" href="{{ url('seller-detail-shop') }}"><h6 style="text-indent: 30px;">รายละเอียดร้านค้า</h6></a>
							<h6 style="text-indent: 30px;">หมวดหมู่ในร้านค้า</h6>
							<h6 style="text-indent: 30px;">รายงาน</h6>
						</div>
					</div>
				</div>
				<div class="card" style="border: none;">
					<div class="card-header d-flex justify-content-between align-items-center" style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse" href="#collapseFive">
						<strong class="text-dark">
							<img src="new_ui/img/seller/icon_menu/icon_menu_5.svg" style="width: 30px;" class="pr-2" alt="">
							การตั้งค่า
						</strong>
						<div class="collapsedIcon">
							<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
						</div>
					</div>
					<div id="collapseFive" class="collapse show">
						<div class="card-body py-0">
							<a class="px-0" href="{{ url('seller-proflie') }}"><h6 style="text-indent: 30px;">บัญชีของฉัน</h6></a>
							<a class="px-0" href="{{ url('seller-proflie') }}"><h6 style="text-indent: 30px;">การจัดส่งของฉัน</h6></a>
							<a class="px-0" href="{{ url('seller-address') }}"><h6 style="text-indent: 30px;">ที่อยู่ของฉัน</h6></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 position-absolute" style="bottom: 20px; left: 0;right: 0;">
			<a href="index.php"><button class="btn btn-c75ba1 form-control">กลับสู่ Shopteenii</button></a>
		</div>
	</div>
	


	


	<script>
		$('.collapse').on('show.bs.collapse', function () {
			id = $(this).attr('id');
			$('div[href="#'+id+'"] div.collapsedIcon h4').html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
		});
		$('.collapse').on('hide.bs.collapse', function () {
			id = $(this).attr('id');
			$('div[href="#'+id+'"] div.collapsedIcon h4').html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
		});
	</script>