<div>
    <div class="boxInv">
		@foreach ($award as $item)
			<div class="col-12 px-0">
				<div class="row py-4 mx-0 mt-3" style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">

					<div class="col-lg-6 col-md-6 col-12">
						<div class="form-row align-items-center">
							<div class="col-lg-12 col-md-12 col-12 text-lg-left text-md-left text-left mt-lg-0 mt-md-4">
								{{-- <h6 class="mb-lg-0 mb-md-2 mb-lg-2"><strong>katsu Shop</strong></h6> --}}
							</div>

						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-12 d-flex justify-content-end">
						<div class="row align-items-lg-center align-items-md-center align-items-start">

							<div class="col-lg-4 col-md-4 col-6">
								@if ($item->type == 'win')
									<a href='#' class='badge w-100' style='color:#23C197; font-size: 15px;'>ได้รับรางวัล</a>
								@else
									<a href='#' class='badge w-100' style='color:#e26e20; font-size: 15px;'>ได้รับเงินคืนทั้งหมด</a>
								@endif
							</div>
						</div>
					</div>
				</div>

				@foreach ($product_award as $item1)
					@if ($item1->id == $item->product_id)
						<div class="row py-4 mx-0" style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">
							<div class="col-lg-6 col-md-6 col-9">
								<div class="row">
									<div class="col-12 mb-4 text-left">
										<div class="media">
											<?php $front_image = $item1->product_img[0];?>
											@if ($front_image=='0'||$front_image==null)
											<img src="/img/no_image.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
											@else
											<img src="/img/product/{{$item1->product_img[0]}}" style="max-height: 100%;width: 60px; height:
													60px; object-fit: cover;"
												class="mr-3 rounded8px" alt="..."
												onerror="this.onerror=null;this.src='/img/no_image.png'">
											@endif
											<div class="media-body">
												<h6 class="mt-0">{{ $item1->name }}</h6>
												<h6 class="mb-0 font_size_14px">
													<strong>x {{ $item->amount }}</strong>
												</h6>
											</div>

										</div>
									</div>
								</div>
							</div>
							@php
								$price = $item->price / $item->amount;
							@endphp
							<div class="col-lg-6 col-md-6 col-3 text-right px-4">
								<h5 class="mb-0 font_size_14px" style='color:#c45e9f'>
									<strong>฿

										{{ $price }}
									</strong>
								</h5>
							</div>
						</div>
					@endif
				@endforeach

				{{-- Total --}}
				<div class="row py-4 mx-0" style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">
					<div class="col-lg-12 col-md-12 col-12">

						<div class="row align-items-center mx-0">
							<div class="col-lg-10 col-md-10 col-8 text-lg-right text-md-right text-right mt-lg-0 font_size_14px">
								<strong>ราคาทั้งหมด</strong>
							</div>
							<div class="col-lg-2 col-md-2 col-4 text-right">
								<h5 class="mb-0 font_size_14px" style='color:#c45e9f'>
									<strong>฿ {{ $item->price }}</strong>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach






    </div>
</div>


