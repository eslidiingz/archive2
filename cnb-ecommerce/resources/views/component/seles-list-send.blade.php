<style>
	.btnn {
	height: 30%;
	width: 100%;
}
</style>

<div class="col-12 px-0"id="flash-sale">
	<table class="table-bordered">
		<thead>
			<tr>
				<th scope="col" class="p-4 text-left">Product</th>
				<th scope="col" class="width200 text-left">Invoice no</th>
				<th scope="col" class="width200 text-left">Status</th>
				{{-- <th scope="col" class="width200 text-left ">Shopteenii MP</th> --}}
				<th scope="col" class="width200 text-left">Shipping</th>
				<th scope="col" class="width100 text-left">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($basket_all->where('status',2) as $key=>$item)
			{{-- @foreach ($item->inv_products as $key1=>$item1) --}}
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
													<img class="mr-3 rounded8px" style="width: 60px; height: 60px; object-fit: cover;" src="/img/no_image.png" alt=""  onerror="this.onerror=null;this.src='/img/no_image.png'">
													@else
													<img style="width: 60px; height: 60px; object-fit: cover;" src="/img/product/{{$front_image}}" alt=""  onerror="this.onerror=null;this.src='/img/no_image.png'">
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
													<img class="mr-3 rounded8px" style="width: 60px; height: 60px; object-fit: cover;" src="/img/no_image.png" alt=""  onerror="this.onerror=null;this.src='/img/no_image.png'">
													@else
													<img style="width: 60px; height: 60px; object-fit: cover;" src="/img/product/{{$front_image}}" alt=""  onerror="this.onerror=null;this.src='/img/no_image.png'">
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
												<img class="mr-3 rounded8px" style="width: 60px; height: 60px; object-fit: cover;" src="/img/no_image.png" alt=""  onerror="this.onerror=null;this.src='/img/no_image.png'">
												@else
												<img style="width: 60px; height: 60px; object-fit: cover;" src="/img/product/{{$front_image}}" alt=""  onerror="this.onerror=null;this.src='/img/no_image.png'">
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
						<td data-label="Invoice no">
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
						{{-- <td data-label="คนช่วยขาย">
							<div class="row">
								<div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
									@if ($item->uidmp != null || $item->uidmp != '')
										<i class="fa fa-check"></i>
									@endif
								</div>
							</div>
						</td> --}}
						<td data-label="ช่องทางการจัดส่ง">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
									<h6 class="mb-0 text-center font_size_14px">{{$item->shipty_name}}</h6>
									<hr>
									<input id="ship_note_2[{{$item->id}}]" class="form-control form-control-sm" type="text" placeholder="เลขการส่งสินค้า" status="{{ $item->status }}">
									<button id="send_ship_note[{{$item->id}}]" onclick="send_ship_note_2({{$item->id}},this);" type="button" class="btn btn-c45e9f btn-sm btn-block mt-1 ">Confirm</button>
								</div>
							</div>
						</td>
						<td data-label="ดำเนินการ">
							<div class="row">
								<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right dropup">
									<button type="button" class="btn btn-outline-dark px-1 py-0 print-label2"
                                    data-from-name="{{$item->shop_name}}"
                                    data-from-addr="{{$item->address1}} {{$item->address2}} {{$item->county}} {{$item->district}} {{$item->city}}"
                                    data-from-zipcode="{{$item->zipcode}}"
                                    data-from-tel="{{$item->tel}}"
                                    data-to-name="{{isset($item->address['name']) ? $item->address['name'] : ''}}"
                                    data-to-addr="{{isset($item->address['address']) ? $item->address['address'] : ''}}"
                                    data-to-zipcode="{{isset($item->address['zipcode']) ? $item->address['zipcode'] : ''}}"
                                    data-to-tel="{{isset($item->address['tel']) ? $item->address['tel'] : ''}}"
                                    data-products="{{$item->s_products}}" data-has-logo="{{$item->has_logo}}" data-img-logo="{{$item->img_logo}}" data-inv-ref="{{$item->inv_ref}}-{{$item->inv_no}}" data-track-at="{{$item->track_at}}" data-shipping-note="{{$item->shipping_note}}" data-status="{{$item->status}}">
                                        <i class="fa fa-print"></i>
                                    </button>
									<button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="/shop/sales-list/detail/{{$item->inv_ref}}-{{$item->inv_no}}" class="dropdown-item" type="button">ดูรายละเอียด</a>
										<button type="button" class="dropdown-item" data-target="#cancelmodal" data-toggle="modal" data-target-id="{{$item->id}}">ยกเลิกสินค้า</button>
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

<div class="modal fade" id="cancelmodal" tabindex="-1" role="dialog" aria-labelledby="cancel_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:350px">
        <div class="modal-content shadow-sm rounded border-0">
            <div class="modal-header border-0">
                <h6 class="modal-title black" id="cancel_modalLabel">Cancel order</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="black" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" id="send_cancel" action="">

                    @csrf
                    <div class="form-group" hidden>
                        <input type="text" class="form-control" name="inv_id" id="inv_id">
                    </div>
                    <div class="rol-12">
                        <div class="form-group">
                            <label for="typeSelect" class="black">Cancel type</label>
                            <select class="form-control" id="typeSelect" name="typeSelect">
                                <option value="21">All items (Ex. Amount, Type)</option>
                                <option value="22">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="note" class="black">Detail</label>
                            <textarea class="form-control" id="note" name="note" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary ">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="print-area" id="divLabel2" clear="all">
    <div class="print-padding">
        <div class="box-label">
            <div class="bg-box-label">
                <div class="row m-0">
                    <div class="col-12 border-all box-label-content d-flex align-items-center">
                        <div class="row d-flex align-items-center">
                            <div class="col">
                                <img style="height: 200px;width:100%;" src="/new_ui/img/logo-label.svg" alt="">
                            </div>
                            <div class="col-4">
                                <h3> From: <span id="spFromName2" style="text-decoration: underline;"></span></h3>
                                <h3 class="text-wrap-3row"> Address: <span id="spFromAddr2" style="text-decoration: underline;word-break:break-all;"></span> </h3>
                                <h3> Phone No.: <span id="spFromTel2" style="text-decoration: underline;"></span></h3>
                            </div>
                            <div class="col-4">
                                <div id="dvFromZipcode2" class="row d-flex justify-content-center text-center my-3 mx-2"></div>
                            </div>
                            <div class="col">
                                <!--img style="height: auto;width:100%;" src="/new_ui/img/barcode-label.png" alt=""-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-4 border-all box-label-content">
                        <div class="row d-flex align-items-center m-3">
                            <h4> To: <span id="spToName2" style="text-decoration: underline;"></span></h4>
                            <h4 class="text-wrap-3row"> Address: <span id="spToAddr2" style="text-decoration: underline;word-break:break-all;"></span> </h4>
                            <div id="dvToZipcode2" class="row d-flex justify-content-start text-center my-3 ml-1"></div>
                            <h4> Phone No.: <span id="spToTel2" style="text-decoration: underline;"></span></h4>
                        </div>
                    </div>
                    <div class="col-4 border-all box-label-content">
                        <div id="dvProducts2" class="row d-flex align-items-center mt-3"></div>
                    </div>
                    <div class="col-4 border-all box-label-content">
                        <div class="row d-flex align-items-center mt-3">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background: transparent;border:0px">
                                            <input type="checkbox" aria-label="" checked="true">
                                        </div>
                                    </div>
                                    <img id="imgLabelLogo2" style="height:50px; width: auto;" src="/new_ui/img/logo-courier/flash-logo.png" alt="">
                                    <h3><span id="spShipping2" style="display: none;"></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-6 border-all box-label-content d-flex align-items-center">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <h4>Order No: <span id="spInvRef2"></span> </h4>
                            </div>
                            <div class="col-12 mt-3">
                                <h4>Pickup Date: <span id="spTrackAt2"></span></h4>
                            </div>
                            <div class="col-12 mt-3">
                                <h4>Description: <span id="spShippingNote2"></span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 border-all box-label-content d-flex align-items-center text-center">
                        <div class="col-12 mt-3">
                            <h4 class="mb-4" style="text-decoration: underline">Payment</h4>
                            <div id="dvPaid2" style="border: 5px solid red;border-radius: 20px; padding:10px;font-size: 84px;color:red"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
		$("#cancelmodal").on("shown.bs.modal",function(e){
			console.log(e);
            var id = $(e.relatedTarget).data('target-id');
            $('#inv_id').val(id);
            $('#send_cancel').attr('action', '/shop/cancel/content/'+id);
        });

	});

</script>
<script>
    $(document).ready(function(){
        var shop_id = "{{$item->shop_id}}";
        var status_id = "{{$item->status}}";
        $.ajax({
            type: 'get',
            data:{
                "_token": "{{ csrf_token() }}",
                "shop_id": shop_id,
                "status_id" : status_id
            },
            url: "{{route('getShippingNotes')}}",
            success: function(value){
                value.forEach(index => {
                    document.getElementById("ship_note_2["+index.id+"]").value = index.shipping_note;
                });
            }

        });
        $('.print-label2').click(function() {
            $('#spFromName2').html($(this).data('from-name'));
            $('#spFromAddr2').html($(this).data('from-addr'));
            $('#spFromTel2').html($(this).data('from-tel'));
            $('#dvFromZipcode2').html('<div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(0,1)+'</div><div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(1,2)+'</div><div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(2,3)+'</div><div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(3,4)+'</div><div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(4,5)+'</div>');

            $('#spToName2').html($(this).data('to-name'));
            $('#spToAddr2').html($(this).data('to-addr'));
            $('#spToTel2').html($(this).data('to-tel'));
            $('#dvToZipcode2').html('<div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(0,1)+'</div><div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(1,2)+'</div><div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(2,3)+'</div><div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(3,4)+'</div><div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(4,5)+'</div>');
            $('#dvProducts2').html($(this).data('products'));

            if( $(this).data('has-logo') == 'Y') {
                // var defer = $.Deferred();
                // defer.done(function(s_img_logo) {
                    $("#imgLabelLogo2").attr("src","/new_ui/img/logo-courier/"+$(this).data('img-logo')).show().hide().show();
                    $("#spShipping2").hide();
                // }).done(function() {

                // });
                // defer.resolve( $(this).data('img-logo') );
            } else {
                $("#imgLabelLogo2").hide();
                $("#spShipping2").html( $(this).data('inv-ref') ).show();
            }

            $('#spInvRef2').html($(this).data('inv-ref'));
            $('#spTrackAt2').html($(this).data('track-at'));
            $('#spShippingNote2').html($(this).data('shipping-note'));
            if( $(this).data('status') == 2 || $(this).data('status') == 3 || $(this).data('status') == 4 || $(this).data('status') == 43 || $(this).data('status') == 5 || $(this).data('status') == 52 || $(this).data('status') == 53 || $(this).data('status') == 54 ) {
                $('#dvPaid2').html('Paid');
            } else {
                $('#dvPaid2').html('');
            }

            $('#divLabel2').addClass("for-print");
            window.print();
            $('#divLabel2').removeClass("for-print");
        });
    });

    function send_ship_note_2(id,this_index){
        var text_res = document.getElementById("ship_note_2["+id+"]").value;
        var status = $('input[id="ship_note_2['+id+']"]').attr('status');
        if( text_res == '' ) {
			alert("Please input tracking number.");
			return false;
		}
        $.ajax({
            type: 'POST',
            data:{
                "_token": "{{ csrf_token() }}",
                "shipping_note":text_res,
                "id":id,
				"status":status
            },
            url: "{{route('newShippingNotes')}}",
            success: function(value){
                alert("Saved successfully.");
                location.reload();
            }

        });

    }
</script>
