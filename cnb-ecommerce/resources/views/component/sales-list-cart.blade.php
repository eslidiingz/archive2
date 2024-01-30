<div class="col-12 px-0" id="flash-sale">
    <table class="table-bordered">
        <thead>
            <tr>
                <th scope="col" class="p-4 text-left ">Product</th>
                <th scope="col" class="width200 text-left ">Invoice no</th>
                <th scope="col" class="width200 text-left ">Status</th>
                {{-- <th scope="col" class="width200 text-left ">Shopteenii MP</th> --}}
                <th scope="col" class="width200 text-left ">Shipping</th>
                <th scope="col" class="width200 text-left">Ship date/time</th>
                <th scope="col" class="width100 text-left ">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($basket_all->whereIn('status', [1, 12, 2, 3, 4, 43, 5, 52, 53, 6, 99]) as $key => $item)
                <tr>
                    <td scope="row" data-label="Product">
                        <div class="row">
                            @foreach ($item->inv_products as $key1 => $item1)
                                @if (isset($item1['type']) && $item1['type'] != null)
                                    @if ($item1['type'] == 'flashsale')
                                        @foreach ($product_flash as $item2)
                                            @if ($item2->id == $item1['product_id'])
                                                <div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
                                                    <div class="media">
                                                        <?php $front_image = $item2->product_img[0]; ?>
                                                        @if ($front_image == '0' || $front_image == null)
                                                            <img class="mr-3 rounded8px"
                                                                style="width: 60px; height: 60px; object-fit: cover;"
                                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                                src="/img/no_image.png" alt="">
                                                        @else
                                                            <img style="width: 60px; height: 60px; object-fit: cover;"
                                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                                src="/img/product/{{ $front_image }}" alt="">
                                                        @endif
                                                        <div class="media-body pl-2">
                                                            <h6 class="mt-0">
                                                                <strong>{{ $item2->name }}</strong>
                                                            </h6>
                                                            @if (!isset($item1['dis2']) && !isset($item1['dis1']))
                                                            @elseif(isset($item1['dis2']) && !isset($item1['dis1']))
                                                                {{ $item1['dis2'] }}
                                                            @elseif(!isset($item1['dis2']) && isset($item1['dis1']))
                                                                {{ $item1['dis1'] }}
                                                            @else
                                                                {{ $item1['dis2'] }} , {{ $item1['dis1'] }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif ($item1['type'] == 'pre_order')
                                        @foreach ($product_pre as $item2)
                                            @if ($item2->id == $item1['product_id'])
                                                <div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
                                                    <div class="media">
                                                        <?php $front_image = $item2->product_img[0]; ?>
                                                        @if ($front_image == '0' || $front_image == null)
                                                            <img class="mr-3 rounded8px"
                                                                style="width: 60px; height: 60px; object-fit: cover;"
                                                                onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                                src="/img/no_image.png" alt="">
                                                        @else
                                                            <img style="width: 60px; height: 60px; object-fit: cover;"
                                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                                src="/img/product/{{ $front_image }}" alt="">
                                                        @endif
                                                        <div class="media-body pl-2">
                                                            <h6 class="mt-0">
                                                                <strong>{{ $item2->name }}</strong>
                                                            </h6>
                                                            @if (!isset($item1['dis2']) && !isset($item1['dis1']))
                                                            @elseif(isset($item1['dis2']) && !isset($item1['dis1']))
                                                                {{ $item1['dis2'] }}
                                                            @elseif(!isset($item1['dis2']) && isset($item1['dis1']))
                                                                {{ $item1['dis1'] }}
                                                            @else
                                                                {{ $item1['dis2'] }} , {{ $item1['dis1'] }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @else
                                    @foreach ($product_all as $item2)
                                        @if ($item2->id == $item1['product_id'])
                                            <div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
                                                <div class="media">
                                                    <?php $front_image = $item2->product_img[0]; ?>
                                                    @if ($front_image == '0' || $front_image == null)
                                                        <img class="mr-3 rounded8px"
                                                            style="width: 60px; height: 60px; object-fit: cover;"
                                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                            src="/img/no_image.png" alt="">
                                                    @else
                                                        <img style="width: 60px; height: 60px; object-fit: cover;"
                                                        onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                            src="/img/product/{{ $front_image }}" alt="">
                                                    @endif
                                                    <div class="media-body pl-2">
                                                        <h6 class="mt-0">
                                                            <strong>{{ $item2->name }}</strong>
                                                        </h6>
                                                        @if (!isset($item1['dis2']) && !isset($item1['dis1']))
                                                        @elseif(isset($item1['dis2']) && !isset($item1['dis1']))
                                                            {{ $item1['dis2'] }}
                                                        @elseif(!isset($item1['dis2']) && isset($item1['dis1']))
                                                            {{ $item1['dis1'] }}
                                                        @else
                                                            {{ $item1['dis2'] }} , {{ $item1['dis1'] }}
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
                                <h6 class="mb-0 font_size_14px"><strong>{{ $item->inv_ref }}@if (isset($item->inv_no) && $item->inv_no != null)
                                            -{{ $item->inv_no }}
                                        @endif
                                    </strong></h6>
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
                                    <strong><?php echo $status_name; ?></strong>
                                </h6>
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
                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right ">
                                <h6 class="mb-0 font_size_14px"><strong>{{ $item->shipty_name }}</strong></h6>
                                @if ($item->status == 2)
                                    <hr>
                                    <input id="ship_note_1[{{ $item->id }}]" class="form-control form-control-sm"
                                        type="text" placeholder="Tracking number" status="{{ $item->status }}"
                                        name="tracking_number">
                                    <button id="send_ship_note[{{ $item->id }}]"
                                        onclick="send_ship_note_1({{ $item->id }},this);" type="button"
                                        class="btn btn-c45e9f btn-sm btn-block mt-1 ">Save</button>
                                @elseif($item->status == 3 || $item->status == 4)
                                    <hr>
                                    <input id="ship_note_1[{{ $item->id }}]" class="form-control form-control-sm"
                                        type="text" placeholder="Tracking number" status="{{ $item->status }}"
                                        name="tracking_number"
                                        @if ($item->tracking_number != '') value="{{ $item->tracking_number }}" @endif>
                                    <button id="send_ship_note_1[{{ $item->id }}]"
                                        onclick="send_ship_note_1({{ $item->id }},this);" type="button"
                                        class="btn btn-outline-c45e9f btn-sm btn-block mt-1 ">Edit</button>
                                @elseif($item->status == 5 || $item->status == 52)
                                    <hr>
                                    <input id="ship_note_1[{{ $item->id }}]" class="form-control form-control-sm"
                                        type="text" placeholder="Tracking number" status="{{ $item->status }}"
                                        name="tracking_number"
                                        @if ($item->tracking_number != '') value="{{ $item->tracking_number }}" @endif
                                        readonly>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td data-label="Ship date/time">
                        <div class="row">
                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                @if ($item->track_at != null || $item->track_at != '')
                                    <h6 class="mb-0 font_size_14px"><strong>{{ $item->track_at }}</strong></h6>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td data-label="Action">
                        <div class="row">
                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right dropup">
                                {{-- {{dd($item)}} --}}
                                @if($item->status == 2 || $item->status == 3 || $item->status == 4 || $item->status == 43 || $item->status == 5 || $item->status == 52 || $item->status == 53 || $item->status == 54)
                                    <button type="button" class="btn btn-outline-dark px-1 py-0 print-label"
                                    data-from-name="{{$item->shop_name}}"
                                    data-from-addr="{{$item->address1}} {{$item->address2}} {{$item->county}} {{$item->district}} {{$item->city}}"
                                    data-from-zipcode="{{$item->zipcode}}"
                                    data-from-tel="{{$item->tel}}"
                                    data-to-name="{{isset($item->address['name']) ? $item->address['name'] : ''}}"
                                    data-to-addr="{{isset($item->address['address']) ? $item->address['address'] : ''}}"
                                    data-to-zipcode="{{isset($item->address['zipcode']) ? $item->address['zipcode'] : ''}}"
                                    data-to-tel="{{isset($item->address['tel']) ? $item->address['tel'] : ''}}"
                                    data-products="{{$item->s_products}}"
                                    data-has-logo="{{$item->has_logo}}"
                                    data-img-logo="{{$item->img_logo}}"
                                    data-inv-ref="{{$item->inv_ref}}-{{$item->inv_no}}"
                                    data-track-at="{{$item->track_at}}"
                                    data-shipping-note="{{$item->shipping_note}}"
                                    data-status="{{$item->status}}">
                                        <i class="fa fa-print"></i>
                                    </button>
                                @endif
                                <button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/shop/sales-list/detail/{{ $item->inv_ref }}-{{ $item->inv_no }}"
                                        class="dropdown-item" type="button">View detail</a>
                                    {{-- @if ($item->status == 2)
											<button type="button" class="dropdown-item" data-target="#cancelmodal1" data-toggle="modal">Cancel order</button>
											@endif --}}
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

<div class="print-area" id="divLabel" clear="all">
    <div class="print-padding">
        <div class="box-label">
            <div class="bg-box-label">
                <div class="row m-0">
                    <div class="col-12 border-all box-label-content d-flex align-items-center">
                        <div class="row d-flex align-items-center">
                            <div class="col">
                                <img style="height: 200px;width:100%;" src="/new_ui/img/logo-label.png" alt="">
                            </div>
                            <div class="col-4">
                                <h3> From: <span id="spFromName" style="text-decoration: underline;"></span></h3>
                                <h3 class="text-wrap-3row"> Address: <span id="spFromAddr" style="text-decoration: underline;word-break:break-all;"></span> </h3>
                                <h3> Phone No.: <span id="spFromTel" style="text-decoration: underline;"></span></h3>
                            </div>
                            <div class="col-4">
                                <div id="dvFromZipcode" class="row d-flex justify-content-center text-center my-3 mx-2"></div>
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
                            <h4> To: <span id="spToName" style="text-decoration: underline;"></span></h4>
                            <h4 class="text-wrap-3row"> Address: <span id="spToAddr" style="text-decoration: underline;word-break:break-all;"></span> </h4>
                            <div id="dvToZipcode" class="row d-flex justify-content-start text-center my-3 ml-1"></div>
                            <h4> Phone No.: <span id="spToTel" style="text-decoration: underline;"></span></h4>
                        </div>
                    </div>
                    <div class="col-4 border-all box-label-content">
                        <div id="dvProducts" class="row d-flex align-items-center mt-3"></div>
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
                                    <img id="imgLabelLogo" style="height:50px; width: auto;" src="/new_ui/img/logo-courier/flash-logo.png" alt="">
                                    <h3><span id="spShipping" style="display: none;"></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-6 border-all box-label-content d-flex align-items-center">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <h4>Order No: <span id="spInvRef"></span> </h4>
                            </div>
                            <div class="col-12 mt-3">
                                <h4>Pickup Date: <span id="spTrackAt"></span></h4>
                            </div>
                            <div class="col-12 mt-3">
                                <h4>Description: <span id="spShippingNote"></span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 border-all box-label-content d-flex align-items-center text-center">
                        <div class="col-12 mt-3">
                            <h4 class="mb-4" style="text-decoration: underline">Payment</h4>
                            <div id="dvPaid" style="border: 5px solid red;border-radius: 20px; padding:10px;font-size: 84px;color:red"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="cancelmodal1" tabindex="-1" role="dialog" aria-labelledby="cancel_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:350px">
        <div class="modal-content shadow-sm rounded border-0">
            <div class="modal-header border-0">
                <h6 class="modal-title black" id="cancel_modalLabel">ยกเลิกคำสั่งซื้อ</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="black" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" id="send_cancel1" action="">

                    @csrf
                    <div class="form-group" hidden>
                        <input type="text" class="form-control" name="inv_id" id="inv_id1">
                    </div>
                    <div class="rol-12">
                        <div class="form-group">
                            <label for="typeSelect" class="black">ประเภทของการยกเลิก</label>
                            <select class="form-control" id="typeSelect" name="typeSelect">
                                <option value="1">สินค้าหมด (จำนวน,รูปแบบ, เป็นต้น)</option>
                                <option value="2">อื่นๆ</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="note" class="black">รายละเอียด</label>
                            <textarea class="form-control" id="note1" name="note" cols="30" rows="10"></textarea>
						</div>

                        <div class="form-group">
                            <button type="button" class="btn btn-grey" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

{{-- <script type="text/javascript">
    $(document).ready(function(){
		$("#cancelmodal1").on("shown.bs.modal",function(e){
            var id = $(e.relatedTarget).data('target-id');
            $('#inv_id1').val(id);
            $('#send_cancel1').attr('action', '/shop/cancel/content/'+id);
        });

	});

</script> --}}
<script>
    $(document).ready(function() {
        var shop_id = "{{ $item->shop_id }}";
        var status_id = "{{ $item->status }}";
        $.ajax({
            type: 'get',
            data: {
                "_token": "{{ csrf_token() }}",
                "shop_id": shop_id,
                "status_id": status_id
            },
            url: "{{ route('getShippingNotes') }}",
            success: function(value) {
                value.forEach(index => {
                    document.getElementById("ship_note_1[" + index.id + "]").value = index
                        .shipping_note;
                });
            }
        });

        $('.print-label').click(function() {
            $('#spFromName').html($(this).data('from-name'));
            $('#spFromAddr').html($(this).data('from-addr'));
            $('#spFromTel').html($(this).data('from-tel'));
            $('#dvFromZipcode').html('<div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(0,1)+'</div><div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(1,2)+'</div><div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(2,3)+'</div><div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(3,4)+'</div><div class="box-zipcode mr-2">'+$(this).data('from-zipcode').toString().substring(4,5)+'</div>');

            $('#spToName').html($(this).data('to-name'));
            $('#spToAddr').html($(this).data('to-addr'));
            $('#spToTel').html($(this).data('to-tel'));
            $('#dvToZipcode').html('<div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(0,1)+'</div><div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(1,2)+'</div><div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(2,3)+'</div><div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(3,4)+'</div><div class="box-zipcode mr-2">'+$(this).data('to-zipcode').toString().substring(4,5)+'</div>');
            $('#dvProducts').html($(this).data('products'));

            if( $(this).data('has-logo') == 'Y') {
                // var defer = $.Deferred();
                // defer.done(function(s_img_logo) {
                    $("#imgLabelLogo").attr("src","/new_ui/img/logo-courier/"+$(this).data('img-logo')).show().hide().show();
                    $("#spShipping").hide();
                // }).done(function() {

                // });
                // defer.resolve( $(this).data('img-logo') );
            } else {
                $("#imgLabelLogo").hide();
                $("#spShipping").html( $(this).data('inv-ref') ).show();
            }

            $('#spInvRef').html($(this).data('inv-ref'));
            $('#spTrackAt').html($(this).data('track-at'));
            $('#spShippingNote').html($(this).data('shipping-note'));
            if( $(this).data('status') == 2 || $(this).data('status') == 3 || $(this).data('status') == 4 || $(this).data('status') == 43 || $(this).data('status') == 5 || $(this).data('status') == 52 || $(this).data('status') == 53 || $(this).data('status') == 54 ) {
                $('#dvPaid').html('Paid');
            } else {
                $('#dvPaid').html('');
            }

            $('#divLabel').addClass("for-print");
            window.print();
            $('#divLabel').removeClass("for-print");
        });
    });

    function send_ship_note_1(id, this_index) {
        var text_res = document.getElementById("ship_note_1[" + id + "]").value;
        var status = $('input[id="ship_note_1[' + id + ']"]').attr('status');
        if (text_res == '') {
            alert("Please input tracking number.");
            return false;
        }
        $.ajax({
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "shipping_note": text_res,
                "id": id,
                "status": status
            },
            url: "{{ route('newShippingNotes') }}",
            success: function(value) {
                alert("Saved successfully.");
                location.reload();
            }

        });

    }
</script>
