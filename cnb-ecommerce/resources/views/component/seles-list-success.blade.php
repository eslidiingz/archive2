<div class="col-12 px-0"id="flash-sale">
	<table class="table-bordered">
		<thead>
			<tr>
				<th scope="col" class="p-4 text-left">Product</th>
				<th scope="col" class="width200 text-left">Invoice no</th>
				<th scope="col" class="width200 text-left">Status</th>
				<th scope="col" class="width200 text-left ">Shopteenii MP</th>
				<th scope="col" class="width200 text-left">Shipping</th>
				<th scope="col" class="width200 text-left">Receive date/time</th>
				<th scope="col" class="width100 text-left">Action</th>
			</tr>
		</thead>
		<tbody>	
			@foreach ($basket_all->whereIn('status',[5,52,53]) as $key=>$item)
			{{-- @foreach ($item->inv_products as $key1=>$item1)			 --}}
			<tr>
				<td scope="row" data-label="Product">
					<div class="row">
						@foreach ($item->inv_products as $key1=>$item1)
							@if (isset($item1['type']))
								@if ($item1['type'] == 'flashsale')
									@foreach ($product_flash as $item2)
										@if ( $item2->id == $item1['product_id'])
											<div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
												<div class="media">
													<?php $front_image = $item2->product_img[0]?>
													@if ($front_image=='0'||$front_image==null)
													<img class="mr-3 rounded8px" style="width: 60px; height: 60px; object-fit: cover;" src="/img/no_image.png" alt="">
													@else
													<img style="width: 60px; height: 60px; object-fit: cover;" src="/img/product/{{$front_image}}" alt="">
													@endif
													<div class="media-body pl-2">
														<h6 class="mt-0"><strong>{{$item2->name}}</strong></h6>
														@if(!isset($item1['dis2']) && !isset($item1['dis1']))

														@elseif(isset($item1['dis2']) && !isset($item1['dis1']))
														{{$item1['dis2']}}
														@elseif(!isset($item1['dis2']) && isset($item1['dis1']))
														{{$item1['dis1']}}
														@else
														{{$item1['dis2']}} , {{$item1['dis1']}}
														@endif
													</div>
												</div>
											</div>
										@endif
									@endforeach
								@elseif ($item1['type'] == 'pre_order')
									@foreach ($product_pre as $item2)
										@if ( $item2->id == $item1['product_id'])
											<div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
												<div class="media">
													<?php $front_image = $item2->product_img[0]?>
													@if ($front_image=='0'||$front_image==null)
													<img class="mr-3 rounded8px" style="width: 60px; height: 60px; object-fit: cover;" src="/img/no_image.png" alt="">
													@else
													<img style="width: 60px; height: 60px; object-fit: cover;" src="/img/product/{{$front_image}}" alt="">
													@endif
													<div class="media-body pl-2">
														<h6 class="mt-0"><strong>{{$item2->name}}</strong></h6>
														@if(!isset($item1['dis2']) && !isset($item1['dis1']))

														@elseif(isset($item1['dis2']) && !isset($item1['dis1']))
														{{$item1['dis2']}}
														@elseif(!isset($item1['dis2']) && isset($item1['dis1']))
														{{$item1['dis1']}}
														@else
														{{$item1['dis2']}} , {{$item1['dis1']}}
														@endif
													</div>
												</div>
											</div>
										@endif
									@endforeach
								@endif
							@else
								@foreach ($product_all as $item2)
									@if ( $item2->id == $item1['product_id'])
										<div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
											<div class="media">
												<?php $front_image = $item2->product_img[0]?>
												@if ($front_image=='0'||$front_image==null)
												<img class="mr-3 rounded8px" style="width: 60px; height: 60px; object-fit: cover;" src="/img/no_image.png" alt="">
												@else
												<img style="width: 60px; height: 60px; object-fit: cover;" src="/img/product/{{$front_image}}" alt="">
												@endif
												<div class="media-body pl-2">
													<h6 class="mt-0"><strong>{{$item2->name}}</strong></h6>
													@if(!isset($item1['dis2']) && !isset($item1['dis1']))

													@elseif(isset($item1['dis2']) && !isset($item1['dis1']))
													{{$item1['dis2']}}
													@elseif(!isset($item1['dis2']) && isset($item1['dis1']))
													{{$item1['dis1']}}
													@else
													{{$item1['dis2']}} , {{$item1['dis1']}}
													@endif
												</div>
											</div>
										</div>
									@endif
								@endforeach
							@endif
						@endforeach
					</div>
				</td>
				<td data-label="หมายเลขคำสั่งซื้อ">
					<div class="row">
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							<h6 class="mb-0 font_size_14px"><strong>{{$item->inv_ref}}</strong></h6>
						</div>
						<div class="col-12 text-lg-left text-md-right text-sm-right">
							{{-- <h6 class="mb-0" style="color: #919191;">โอนผ่าน</h6> --}}
						</div>
					</div>
				</td>
				<td data-label="สถานะ" class="text-lg-left text-md-right text-sm-right">
					<div class="row">
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							<h6 class="mb-0 font_size_14px">
								<?php
											$status_name = '';
											if ($item->status == 1) {
		                                        if ($item->note != 'test') {
		                                            $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#E00A0A; font-size:14px;'>Payment failed</a>";
		                                        } else {
		                                            $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#E00A0A; font-size:14px;'>Waiting payment</a>";
		                                        }
		                                    } elseif ($item->status == 12) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#e26e20; font-size:14px;'>Waiting transfer approval</a>";
		                                    } elseif ($item->status == 13) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#e26e20; font-size:14px;'>Waiting transfer approval</a>";
		                                    } elseif ($item->status == 21) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#E00A0A; font-size:14px;'>Waiting payment</a>";
		                                    } elseif ($item->status == 2) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#e26e20; font-size:14px;'>To ship</a>";
		                                    } elseif ($item->status == 3 || $item->status == 4) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#23C197; font-size:14px;'>Shipped</a>";
		                                    } elseif ($item->status == 43) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#23C197; font-size:14px;'>Customer pickup</a>";
		                                    } elseif ($item->status == 5) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#23C197; font-size:14px;'>Order completed</a>";
		                                    } elseif ($item->status == 52) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#23C197; font-size:14px;'>Order completed</a>";
		                                    } elseif ($item->status == 53) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#23C197; font-size:14px;'>Order completed</a>";
		                                    } elseif ($item->status == 54) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#23C197; font-size:14px;'>Announced</a>";
		                                    } elseif ($item->status == 6) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#E00A0A; font-size:14px;'>Cancel</a>";
		                                    } elseif ($item->status == 99) {
		                                        $status_name = "<a href='#' class='badge w-100 text-lg-left text-md-right text-right px-0' style='color:#E00A0A; font-size:14px;'>Cancelled</a>";
		                                    }
										?>
							<strong><?php echo $status_name; ?></strong></h6>
						</div>
					</div>
				</td>
				<td data-label="คนช่วยขาย">
					<div class="row">
						<div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
							@if ($item->uidmp != null || $item->uidmp != '')
								<i class="fa fa-check"></i>
							@endif
						</div>
					</div>
				</td>
				<td data-label="ช่องทางการจัดส่ง">
					<div class="row">
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							<h6 class="mb-0 font_size_14px"><strong>{{$item->shipty_name}}</strong></h6>
						</div>
					</div>
				</td>
				<td data-label="วัน-เวลาจัดส่ง">
					<div class="row">
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							@if ($item->track_at != null || $item->track_at != '')
								<h6 class="mb-0 font_size_14px"><strong>{{$item->track_at}}</strong></h6>
							@endif
						</div>
					</div>
				</td>
				<td data-label="ดำเนินการ">
					<div class="row">
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right dropup">
							<button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="/shop/sales-list/detail/{{$item->inv_ref}}-{{$item->inv_no}}" class="dropdown-item" type="button">Detail</a>
							</div>
						</div>
					</div>
				</td>
			</tr>
			{{-- @endforeach --}}
			@endforeach	
		</tbody>
	</table>
</div>