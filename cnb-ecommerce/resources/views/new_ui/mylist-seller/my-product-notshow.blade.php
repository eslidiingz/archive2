<div class="col-12 px-0">
	<table class="table-bordered">
		<thead>
			<tr>
				<th scope="col" class="text-left p-4">ชื่อสินค้า</th>
				<th scope="col" class="width200 text-left">เลข SKU</th>
				<th scope="col" class="width200 text-left">ตัวเลือกสินค้า</th>
				<th scope="col" class="width200 text-left">ราคา</th>
				<th scope="col" class="width200 text-left">คลัง</th>
				<th scope="col" class="width200 text-left">ยอดขาย</th>
				<th scope="col" class="width100 text-left">ดำเนินการ</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products->where('status_goods',1) as $key=>$product)

			<tr>
				<td scope="row" data-label="ชื่อสินค้า">
					<div class="row">
						<div class="col-12 mb-4 text-left">
							<div class="media">
								<a href="/product/{{$product->id}}">
									<img src="{{'/img/product/'.$product->product_img[0] }}" style="width: 60px;" class="mr-3 rounded8px" alt="..." onerror="this.onerror=null;this.src='/img/no_image.png'">
								</a>
								<div class="media-body">
									<h6 class="mt-0"><strong>{{$product->name}}</strong></h6>
								</div>
							</div>
						</div>
					</div>
				</td>
				<td data-label="เลข SKU">
					<div class="row">
						@foreach($product->product_option['sku'] as $sku)
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							<h6 class="mb-0"><strong>{{$sku}}</strong></h6>
						</div>
						@endforeach
					</div>
				</td>
				<td data-label="ตัวเลือกสินค้า" class="text-lg-left text-md-right text-sm-right">
					<div class="row">
						@foreach($product->product_option['dis1'] as $pro_dis1)
						@foreach($product->product_option['dis2'] as $pro_dis2)
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							<!-- ----------------------------------------------------------------------------------------------------------->
							@if($pro_dis1 != null && $pro_dis2 != null)
							<h6 class="mb-0"><strong>{{$pro_dis1}}
									@if($pro_dis1 != null && $pro_dis2 != null)
									,
									@endif
									{{ $pro_dis2 }}</strong></h6>
							@endif
							<!-- ----------------------------------------------------------------------------------------------------------->
							@if($pro_dis1 != null && $pro_dis2 == null)
							<h6 class="mb-0"><strong>{{$pro_dis1}}
							@endif
							<!-- ----------------------------------------------------------------------------------------------------------->
							@if($pro_dis1 == null && $pro_dis2 != null)
							<h6 class="mb-0"><strong>{{$pro_dis2}}
							@endif
							<!-- ----------------------------------------------------------------------------------------------------------->
							@if($pro_dis1 == null && $pro_dis2 == null)
							<h6 class="mb-0" style="color:grey"><strong>ไม่มี</strong></h6>
							@endif
							<!-- ----------------------------------------------------------------------------------------------------------->

						</div>
						@endforeach
						@endforeach
					</div>
				</td>
				<td data-label="ราคา" class="text-lg-left text-md-right text-sm-right">
					<div class="row">
						@foreach($product->product_option['price'] as $pro)
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							<h6 class="mb-0">฿ {{$pro}}</h6>
						</div>
						@endforeach

					</div>
				</td>
				<td data-label="คลัง" class="text-lg-left text-md-right text-sm-right">
					<div class="row">
						@foreach($product->product_option['stock'] as $pro_price)
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							<h6 class="mb-0">{{$pro_price}}</h6>
						</div>
						@endforeach

					</div>
				</td>
				<td data-label="ยอดขาย" class="text-lg-left text-md-right text-sm-right">
					<div class="row">
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							<h6 class="mb-0">-</h6>
						</div>
				</td>
				<td data-label="ดำเนินการ">
					<div class="row">
						<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
							<button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="/shop/myproduct/{{$product->id}}" class="dropdown-item" type="button">แก้ไขสินค้า</a>
								<button class="dropdown-item" type="button" data-toggle="modal" data-target="#exampleModalCenter-edit-list">เพิ่มเติม</button>
							</div>
						</div>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>