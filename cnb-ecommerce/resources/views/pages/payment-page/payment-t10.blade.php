<div class="row">
	<div id='check_mpay' hidden>@isset($wallet->status){{ $wallet->status }}@endisset</div>
	@if(isset($wallet->status) && $wallet->status == 'appect')
		<div class="col-12 mt-4 ">
			<div class="row mx-0 p-4 rounded8px" style="background-color: #f8eaf3;">
				<div class="col-lg-1 col-md-2 col-12 mb-2">
					<img src="img/profile/{{ Auth::user()->user_pic }}" style="width: 80px; border-radius: 100%;" class="align-self-start mr-3" alt="...">
				</div>
				<div class="col-lg-11 col-md-10 col-12">
					<div class="row">
						<div class="col-12 mb-2">
							<h6 class="mb-0" style="color: #c75ba1;"><strong>ชื่อบัญชี</strong></h6>
							<h6 class="mb-0"><strong>{{ Auth::user()->name }} {{ Auth::user()->surname }}</strong></h6>
						</div>
						<div class="col-lg col-md col-6 mb-2">
							<div class="row">
								<div class="col-12 mb-2">
									<h6 class="mb-0" style="color: #c75ba1;"><strong>พอยท์</strong></h6>
								</div>
								<div class="col-12 d-flex flex-row">
									<h4 class="mb-0 mr-2"><strong>{{ number_format($wallet->point,2) }}</strong></h4>
									<img src="new_ui/img/payment/payment-point.svg" alt="">
								</div>
							</div>
						</div>
						<div class="col-lg col-md col-6 mb-2">
							<div class="row " style="border-left: 1px solid #ddd !important;">
								<div class="col-12 d-lg-flex d-md-flex justify-content-center mb-2">
									<h6 class="mb-0" style="color: #c75ba1;"><strong>เหรียญ</strong></h6>
								</div>
								<div class="col-12 d-flex flex-row justify-content-md-center">
									<h4 class="mb-0 mr-2"><strong>{{ number_format($wallet->coin,2) }}</strong></h4>
									<img src="new_ui/img/payment/payment-coin.svg" alt="">
								</div>
							</div>
						</div>
	                    {{-- เงินคืน --}}

	                    {{-- เงินคืน --}}

						<div class="col-lg col-md col-12 mb-2">
							<div class="row border_left_custom">
								<div class="col-12 d-lg-flex d-md-flex justify-content-center mb-2">
									<h6 class="mb-0" style="color: #c75ba1;"><strong>ยอดเงินที่ใช้ได้</strong></h6>
								</div>
								<div class="col-12 d-lg-flex d-md-flex flex-row justify-content-center">
									<h4 class="mb-0 mr-2"><strong>฿ {{ number_format($wallet->credit,2) }}</strong></h4>
									{{-- <h4 class="mb-0 mr-2"><strong>฿ @($wallet->credit);  @endphp </strong></h4> --}}

								</div>
							</div>
						</div>
	                    	<div class="col-lg col-md col-6 mb-2">
							{{-- <div class="row" style="border-left: 1px solid #ddd !important;">
								<div class="col-12 d-lg-flex d-md-flex justify-content-center mb-2">
									<h6 class="mb-0" style="color: #c75ba1;"><strong>เงินคืน</strong></h6>
								</div>
								<div class="col-12 d-lg-flex d-md-flex flex-row justify-content-center">
									<h4 class="mb-0 mr-2"><strong>฿ 200</strong></h4>
								</div>
							</div> --}}
						</div>
						<div class="col-lg col-md-6 ml-md-auto col-12">
							<button class="btn btn-primary form-control" type="button" data-toggle="modal" data-target="#Wallet"><i class="fa fa-plus" aria-hidden="true"></i> เติมเงินวอลเลต</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	@else
		<div class="col-12 mt-4">
			<a href="{{ url('profile_wallet_t10') }}">
				<button type="button" class="btn btn-light form-control" style="color: #1947e3; background-color: #fafaff;"><i class="fa fa-plus" aria-hidden="true"></i>
				เปิดใช้ Wallet Multi Pay</button>
			</a>
		</div>
	@endif
</div>

<style>
	@media (min-width: 320px) {
		.border_left_custom{
			border-left: none;
		}
	}


	@media (min-width: 576px) {
		.border_left_custom{
			border-left: none;
		}
	}

	@media (min-width: 768px) {
		.border_left_custom{
			border-left: 1px solid #ddd !important;
		}
	}

	@media (min-width: 992px) {
		.border_left_custom{
			border-left: 1px solid #ddd !important;
		}
	}

	@media (min-width: 1200px) {
		.border_left_custom{
			border-left: 1px solid #ddd !important;
		}
	}

</style>

@include('pages.payment-page.modal_add_wallet')
