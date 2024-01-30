<style>
	.sidenav {
		height: 100%;
		position: fixed;
		z-index: 1500;
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
		.sidenav {
			width: 0px;
		}

		.main {
			margin-left: 0;
			width: 100%;
		}
	}

	@media (min-width: 576px) {
		.sidenav {
			width: 0px;
		}

		.main {
			margin-left: 0;
			width: 100%;
		}
	}

	@media (min-width: 768px) {
		.sidenav {
			width: 0px;
		}

		.main {
			margin-left: 0;
			width: 100%;
		}
	}

	@media (min-width: 992px) {
		.sidenav {
			width: 280px;
		}

		.main {
			margin-left: 280px;
			width: calc(100% - 280px);
		}
	}

	@media (min-width: 1200px) {}
</style>
<div class="sidenav ">
	<div class="row px-2 mb-4">
		<div class="col-12 text-center">
			<a href="/" class="p-0"><img src="/new_ui/img/logo/logo.svg"
					class="img-fluid w-75"></a>
		</div>
	</div>
	<?php

		use App\withdrow;
		use App\Shops;
		use App\invs;

		$user_shop_bank = Shops::where('user_id', Auth::user()->id)->first();
		$CheckB = withdrow::Where('shop_id', $user_shop_bank->id)
			->whereIn('status', [0, 1])->get();
		// dd($CheckB);
		// dd($user_shop_bank->bank_number);
		$total = 0;
		$inv_status = invs::where('shop_id', $user_shop_bank->id)->where('status', '2')->get();
		// dd($inv_status);
		foreach ($CheckB as $key => $value) {
			$total += $value->amount;
		}
		if( isset($user_shop_bank->shop_pic) ) {
			$s_shop_pic = "/img/shop_profiles/" . $user_shop_bank->shop_pic;
		} else {
			$s_shop_pic = "/img/no_banner_medix.png";
		}
		// dd($total);
	?>
	<div class='col-12 px-2'>
		<div class="row mx-0" style="background-color : #F9F9F9; border-radius: 8px;">
			<div class="col-12 pt-3">
				<div class="media d-flex align-items-center">
				  <img class="mr-3" src="{{ $s_shop_pic }}" alt="Generic placeholder image" style="width: 50px; height: 50px;" onerror="this.onerror=null;this.src='/img/no_image.png'">
				  <div class="media-body">
				    <h5 class="mt-0 mb-0 color-sky"><strong>Shop name</strong></h5>
				    <strong >{{$user_shop_bank->shop_name}}</strong>
				  </div>
				</div>
			</div>
			<div class="col-12">
				<hr class="w-100">
			</div>
			<div class='col-12 mb-2'>
				<strong class="font_head_item" style="color: #000;">Sales</strong>
			</div>
			<div class='col-12 mb-2'>
				<div class='d-flex ' style='color: #000;'>
					<a href="#" class="font_price p-0" style='color: #346751;'>
						<h3><strong>฿ </strong> <strong>{{ number_format($total,2) }}</strong>
						</h3>
					</a>
					<!-- <div class='col-12 pb-3' style='background-color : #f8eaf3;border-radius: 0px 0px 8px 8px;'>
						<a id="withdraw" href="#" class="p-0">
							<button class="btn btn-outline-c45e9f form-control">ถอนเงิน</button>
						</a>
	                </div> -->
				</div>
			</div>
			{{-- <div class='col-12 pb-3' style='background-color : #f8eaf3;border-radius: 0px 0px 8px 8px;'>
	            <a id="withdraw" href="#" class="p-0">
					<button class="btn btn-outline-c45e9f form-control">ถอนเงิน</button>
				</a>
	            <!-- <a href="#" class="p-0"><button class="btn btn-outline-c45e9f form-control">ถอนเงิน</button></a> -->
	        </div> --}}
		</div>


	</div>
	<!-- <div class="col-12 ">
			<a href="/"><button class="btn btn-outline-c45e9f form-control"><img style="filter: invert(63%) sepia(78%) saturate(2658%) hue-rotate(288deg) brightness(83%) contrast(84%);" src="/new_ui/img/menu/icon-menu-out.png" width="23;" alt=""> กลับสู่ Shopteenii</button></a>
		</div> -->
	<div class="col-12 ">
		<div id="accordion">
			<div class="card" style="border: none;">
				<div class="card-header d-flex justify-content-between align-items-center"
					style="cursor:pointer; border: none; background-color: unset;" >

						<a class="px-0 " href="{{ url('shop/seller-shop-user-detail') }}" >
							<h6><strong class="color-grey">
								<img src="/new_ui/img/seller/icon_menu/icon_menu_4.svg" style="width: 30px;" class="pr-2"
							alt="">Shop Overview</strong>
							</h6>
						</a>

				</div>
			</div>
			<div class="card" style="border: none;">
				<div class="card-header d-flex justify-content-between align-items-center"
					style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
					href="#collapseOne">
					<strong class="color-grey">
						<img src="/new_ui/img/seller/icon_menu/icon_menu_1.svg" style="width: 30px;" class="pr-2"
							alt="">List Sales
					</strong>

					<div class="collapsedIcon">
						<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
					</div>
				</div>
				<div id="collapseOne" class="collapse show">
					<div class="card-body py-0">
						<a class="px-0" href="{{ url('shop/sales-list') }}">
							<h6 class="color-grey-sub" >My sale list
								@if(count($inv_status) > 0)
								<span class="badge-pill badge-danger ml-2"
									style="font-size: 11px; margin-top: -2px;">{{count($inv_status)}}</span>
								@endif
							</h6>
						</a>
						<!-- <a class="px-0" href="{{ url('seller-return-product') }}"><h6 style="text-indent: 30px;">คืนสินค้า</h6></a> -->
					</div>
				</div>
			</div>
			<div class="card" style="border: none;">
				<div class="card-header d-flex justify-content-between align-items-center"
					style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
					href="#collapseTwo">
					<strong class="color-grey">
						<img src="/new_ui/img/seller/icon_menu/icon_menu_2.svg" style="width: 30px;" class="pr-2"
							alt="">Product
					</strong>
					<div class="collapsedIcon">
						<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
					</div>
				</div>
				<div id="collapseTwo" class="collapse show">
					<div class="card-body py-0">
						<a class="px-0" href="{{ url('shop/seller-product') }}">
							<h6 class="color-grey-sub" >My Product
								{{-- <span class="badge-pill badge-danger ml-2" style="font-size: 11px; margin-top: -2px;">1</span> --}}
							</h6>
						</a>
						<!-- <a class="px-0" href="{{ url('shop/myproduct/new') }}">
							<h6 class="color-grey-sub" >เพิ่มสินค้าใหม่</h6>
						</a> -->
					</div>
				</div>
			</div>
			<!-- <div class="card" style="border: none;">
				<div class="card-header d-flex justify-content-between align-items-center"
					style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
					href="#collapseSix">
					<strong class="text-dark">
						<img src="/new_ui/img/seller/icon_menu/icon_menu_2.svg" style="width: 30px;" class="pr-2"
							alt="">สินค้าพรีออเดอร์
					</strong>
					<div class="collapsedIcon">
						<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
					</div>
				</div>
				<div id="collapseSix" class="collapse show">
					<div class="card-body py-0">
						<a class="px-0" href="{{ url('/shop/preorder') }}">
							<h6 style="text-indent: 30px;">สินค้าพรีออเดอร์ของฉัน</h6>
						</a>
						<a class="px-0" href="{{ url('/shop/preorder/add') }}">
							<h6 style="text-indent: 30px;">เพิ่มสินค้าพรีออเดอร์ใหม่</h6>
						</a>
					</div>
				</div>
			</div> -->
			<div class="card" style="border: none;">
				<div class="card-header d-flex justify-content-between align-items-center"
					style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
					href="#collapseThree">
					<strong class="color-grey">
						<img src="/new_ui/img/seller/icon_menu/icon_menu_3.svg" style="width: 30px;" class="pr-2"
							alt="">Finance
					</strong>
					<div class="collapsedIcon">
						<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
					</div>
				</div>
				<div id="collapseThree" class="collapse show">
					<div class="card-body py-0">
						<a class="px-0" href="{{ url('shop/seller-wallet') }}">
							<h6 class="color-grey-sub" >Withdrawal from sales</h6>
						</a>
						{{-- <a class="px-0" href="{{ url('shop/seller-recommend') }}">
							<h6 class="color-grey-sub" >Withdrawal from Referral</h6>
						</a> --}}
						{{-- <a class="px-0" href="{{ url('seller-bank') }}"><h6 class="color-grey-sub" >Bank Account
						</h6></a> --}}
					</div>
				</div>
			</div>
			{{-- <div class="card" style="border: none;">
				<div class="card-header d-flex justify-content-between align-items-center"
					style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
					href="#collapseFour">
					<strong class="color-grey">
						<img src="/new_ui/img/seller/icon_menu/icon_menu_4.svg" style="width: 30px;" class="pr-2"
							alt="">Shop
					</strong>
					<div class="collapsedIcon">
						<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
					</div>
				</div>
				<div id="collapseFour" class="collapse show">
					<div class="card-body py-0">
						<a class="px-0" href="{{ url('shop/seller-shop-user-detail') }}">
							<h6 class="color-grey-sub" >My Shop</h6>
						</a>
						<a class="px-0" href="{{ url('seller-review') }}"><h6 class="color-grey-sub" >
							คะแนนร้านค้า</h6></a>
						<a class="px-0" href="{{ url('shop') }}">
							<h6 class="color-grey-sub" >Detail my shop</h6>
						</a>
						<a class="px-0" href="{{ url('seller-category') }}"><h6 class="color-grey-sub" >
							Category Shop</h6></a>
						<h6 class="color-grey-sub" >Report</h6>
					</div>
				</div>
			</div> --}}
			<div class="card" style="border: none;">
				<div class="card-header d-flex justify-content-between align-items-center"
					style="cursor:pointer; border: none; background-color: unset;" data-toggle="collapse"
					href="#collapseFive">
					<strong class="color-grey">
						<img src="/new_ui/img/seller/icon_menu/icon_menu_5.svg" style="width: 30px;" class="pr-2"
							alt="">
						Settings
					</strong>
					<div class="collapsedIcon">
						<h4 class="m-0"><i class="fa fa-angle-up" aria-hidden="true"></i></h4>
					</div>
				</div>
				<div id="collapseFive" class="collapse show">
					<div class="card-body py-0">
						{{-- <a class="px-0" href="{{ url('seller-proflie') }}"><h6 class="color-grey-sub" >
							บัญชีของฉัน</h6></a> --}}
						<a class="px-0" href="{{ url('shop/shipping') }}">
							<h6 class="color-grey-sub" >My Transport</h6>
						</a>
						{{-- <a class="px-0" href="{{ url('/shop/seller-address') }}">
							<h6 class="color-grey-sub" >ที่อยู่ร้านค้า</h6>
						</a> --}}
						{{-- <a class="px-0" href="{{ url('/shop/addsellerbank') }}">
							<h6 class="color-grey-sub" >บัญชีธนาคาร
								@if($user_shop_bank->bank_number == null)
								<span class="badge-pill badge-danger ml-2"
									style="font-size: 11px; margin-top: -2px;">!</span>
								@endif</h6>
						</a> --}}
						{{-- <a class="px-0" href="{{ url('/shop/kyc') }}">
							<h6 class="color-grey-sub" >ยืนยันตัวตนร้านค้า</h6>
						</a> --}}
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<div id="Modal-Withdraw" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">ยอดเงินที่ต้องการถอน</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('submitWithDraw')}}" method="POST">
					@csrf
					@if(session()->has('message-credit'))
					<div class="alert alert-danger">
						{{ session()->get('message-credit') }}
					</div>
					@endif
					<input type="text" name="balance" id="balance">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>




<script>
	$('.collapse').on('show.bs.collapse', function() {
		id = $(this).attr('id');
		$('div[href="#' + id + '"] div.collapsedIcon h4').html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
	});
	$('.collapse').on('hide.bs.collapse', function() {
		id = $(this).attr('id');
		$('div[href="#' + id + '"] div.collapsedIcon h4').html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
	});

	$("#withdraw").click(function() {
		var route = "{{route('addsellerbank')}}";
		$.ajax({
			type: 'get',
			url: "{{route('getWithDraw')}}",
			success: function(data) {
				//    console.log(data);
				if (data == 1) {
					$('#Modal-Withdraw').modal('show');
				} else {
					window.location.replace(route);
				}
			}
		});
	});
</script>

@if(session()->has('message-credit'))
<script>
	$(function() {
		$('#Modal-Withdraw').modal('show');
	});
</script>
@endif
