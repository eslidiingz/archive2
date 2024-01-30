@extends('new_ui.layouts.front-end-seller')
@section('content')

<div class="row">
    <div class="col-8 p-4">
        <h3><strong>My Transport</strong></h3>
    </div>
    {{-- <div class="col-4 d-flex align-items-center justify-content-end" data-toggle="modal" data-target="#exampleModalCenter2">
        <button class="btn btn-primary mr-3">+ เพิ่มข้อมูลจัดส่ง</button>
    </div> --}}
    <div class="container-fluid">
        @foreach ($shipping_type as $item)
        <div class="row px-4">
            <div class="col-12 mx-0" style="background-color: #fff;"><br>
                {{-- <div class="row align-items-center"> --}}
                <div class="row align-items-center ">
                    <div class="col-lg-8 col-md-12 col-12">
                        <h5><b>{{ @$item->ship_name != null ?  $item->ship_name : $item->shipty_name }}</b></h5>
                        {{-- <h5><b>{{ $item->shipty_name }}</b></h5> --}}
                    </div>
                    <div class="col-lg-3 col-md-11 col-10 custom-control custom-control d-flex justify-content-end">
                        <button class="btn btn btn-link btnbro form-control" data-toggle="modal" data-target="#shipping_modal{{ $item->shipty_id }}"
                           >Press to see details</button>
                    </div>
                    <div
                        class="col-lg-1 col-md-1 col-2 custom-control custom-control custom-switch d-flex justify-content-end">
                        <input type="checkbox" class="custom-control-input" onclick="check_ship(this.id);"
                            id="switch{{ $item->shipty_id }}" style="background-color:#c75ba1;">
                        <label class="custom-control-label " for="switch{{ $item->shipty_id }}"></label>
                    </div>
                </div><br>
            </div><br>
        </div><br>
        @endforeach
        <div class="col-12 mx-0">
            <div class="row justify-content-between">
                <div class="col-lg-12 col-md-12 col-sm-12  mt-3 ">
                    <button type="button" onMouseOver="this.style.color='#000000'"
                        onMouseOut="this.style.color='#FFFFFF'" id="send_res"
                        class="btn btn-c75ba1 float-right  col-lg-2 col-md-1 ml-1 mb-1">Save</button>
                    {{-- <button type="button" class="btn  btnb2b2b2 float-right  col-lg-2 col-md-1">Cancel</button> --}}
                    <a href="{{ route('shop') }}" class="btn  btnb2b2b2 float-right  col-lg-2 col-md-1">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </div> <!-- endcontainer -->
</div><!-- endrow -->

{{-- ----------------------- --}}
<!-- Modal -->
@foreach ($shipping_type as $item)
    @if ( $item->shipty_id == 1 )
    @elseif ( $item->shipty_id == 2 || $item->shipty_id == 3 )
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="shipping_modal{{ $item->shipty_id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Add shipping info</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Weight (Gram(s))</th>
                                        <th scope="col">Shipping price (Baht)</th>
                                    </tr>
                                </thead>
                                <tbody id="fetchData">
                                    @foreach ($shipping_detail[$item->shipty_id] as $val)
                                        <tr class="text-center">
                                            <td>{{ $val->shipde_weight }}</td>
                                            <td>{{ $val->shipde_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnb2b2b2" data-dismiss="modal">ปิด</button>
                        {{-- <button id="send-price" type="submit" class="btn btn-c75ba1">บันทึก</button> --}}
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    @elseif ( !( $item->shipty_id == 4 || $item->shipty_id == 5 || $item->shipty_id == 6 ) )
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="shipping_modal{{ $item->shipty_id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Add shipping info</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Weight (Gram(s))</th>
                                        <th scope="col">BKK-BKK (Baht)</th>
                                        <th scope="col">BKK-Uptown (Baht)</th>
                                        <th scope="col">Uptown-Uptown (Baht)</th>
                                    </tr>
                                </thead>
                                <tbody id="fetchData">
                                    @foreach ($shipping_detail[$item->shipty_id] as $val)
                                        <tr class="text-center">
                                            <td>{{ $val->shipde_weight }}</td>
                                            <td>{{ $val->shipde_price }}</td>
                                            <td>{{ $val->shipde_price_cross_area }}</td>
                                            <td>{{ $val->shipde_price_uptown }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnb2b2b2" data-dismiss="modal">Close</button>
                        {{-- <button id="send-price" type="submit" class="btn btn-c75ba1">Save</button> --}}
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    @else
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="shipping_modal{{ $item->shipty_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="/shop/shipping/update_selfShipping" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><b>Shipping info</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 px-0 mb-3">
                                <label for="nameTransport"><strong>Vendor name</strong></label>
                                <input type="text" class="form-control" id="nameTransport" name="ship_name" value="{{ @$item->ship_name }}" placeholder="กรอกชื่อขนส่ง">
                                <input type="hidden" value="{{ $item->shipty_id }}" name="shipty_id">
                            </div>
                            <div class="table-responsive">
                                @csrf
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Weight (Gram(s))</th>
                                            <th>Price (Same area)</th>
                                            <th>Price (Cross area)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $ship_weight = [1000, 3000, 5000, 10000, 15000, 20000, 25000, 30000, 35000];
                                        @endphp
                                        @foreach ($ship_weight as $w_key => $w_val)
                                            <tr>
                                                <td class="d-flex align-items-center justify-content-center" style="border-top: unset;">{{ $w_val }}</td>
                                                <td><input type="number" class="form-control" id="price-1-1" name="price[]" value="{{ @$shipping_detail[$item->shipty_id][$w_key]->shipde_price != null ? intval($shipping_detail[$item->shipty_id][$w_key]->shipde_price) : 0.00 }}" placeholder="ราคา (พื้นที่เดียวกัน)" required></td>
                                                <td><input type="number" class="form-control" id="price-1-2" name="price_cross[]" value="{{ @$shipping_detail[$item->shipty_id][$w_key]->shipde_price_cross_area != null ? intval($shipping_detail[$item->shipty_id][$w_key]->shipde_price_cross_area) : 0.00 }}" placeholder="ราคา (ต่างพื้นที่)" required></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btnb2b2b2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endforeach




@endsection



@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/js/app.js"></script>
<script type="text/javascript">
    var res_data = [];
    var res_price = [];
	// function btn1($shipty_id){

	//     console.log("test"+$shipty_id);

	// }
    $(document).ready(function(){
        var shop_id = "{{$user_shops->id}}";
        // console.log(shop_id);
        $.ajax({
            type: 'get',
            data:{
                "shop_id":shop_id
            },
            url: "{{route('get-shipping-details')}}",
            success: function(value_shipping){
                // console.log("get",value_shipping);

                // console.log("get",value_shipping[0].ship_default);
                if(value_shipping != ""){
                    let value_check;
                    value_check = value_shipping[0].ship_default;
                    value_check.toString();
                    shipping_data(value_check);
                    // console.log("value check :",value_check1," ",value_check2," ",value_check3,"length :",value_check.length);
                }
            }
        });
        $.ajax({
            type: 'POST',
            data:{
                "_token": "{{ csrf_token() }}",
                "shop_id":shop_id
            },
            url: "{{route('checkShippingTypes')}}",
            success: function(json){
                // console.log("check");
            }

        });
    });


    function shipping_data(evn){
        var text_value = "2";
        // console.log("evn :",evn)

        if(evn.search("1") != "-1"){
            $("#switch1").prop("checked", true);
            res_data.push("switch1");
        }
        if(evn.search("2") != "-1"){
            $("#switch2").prop("checked", true);
            res_data.push("switch2");
        }
        if(evn.search("3") != "-1"){
            $("#switch3").prop("checked", true);
            res_data.push("switch3");
        }
        if(evn.search("4") != "-1"){
            $("#switch4").prop("checked", true);
            res_data.push("switch4");
        }
        if(evn.search("5") != "-1"){
            $("#switch5").prop("checked", true);
            res_data.push("switch5");
        }
        if(evn.search("6") != "-1"){
            $("#switch6").prop("checked", true);
            res_data.push("switch6");
        }
        if(evn.search("7") != "-1"){
            $("#switch7").prop("checked", true);
            res_data.push("switch7");
        }
        if(evn.search("8") != "-1"){
            $("#switch8").prop("checked", true);
            res_data.push("switch8");
        }
        if(evn.search("9") != "-1"){
            $("#switch9").prop("checked", true);
            res_data.push("switch9");
        }
    }

    $("#send-price").on("click", function() {
        var shop_id = "{{$user_shops->id}}";
        var send_price = [];
        for(var i = 0 ; i <= 8 ; i++){
            send_price.push(document.getElementById("price_shipping["+res_price[i]+"]").value);
        }

        $.ajax({
            type: 'POST',
            data:{
                "_token": "{{ csrf_token() }}",
                "shipde_price":send_price,
                "shop_id":shop_id,
                "shipde_id":res_price
            },
            url: "{{route('addShippingPrices')}}",
            success: function(json){
                // console.log("check");
                alert("บันทึกข้อมูลเสร็จสิ้น")
            }

        });

        // console.log("price 1 :",res_price);
    });



	function btn($shipty_id){
		var content = '';
        var shop_id = "{{$user_shops->id}}";
		// console.log("test"+$shipty_id);

		$.ajax({
			type: 'POST',
			data:{
				"_token": "{{ csrf_token() }}",
				"shipty_id":$shipty_id,
                "shop_id":shop_id
			},
			url: "{{route('getshippingtype')}}",
			success: function(json){
				// console.log(json[0])
				// console.log(json[1])
				// $.each( json, function( key, value ) {
                json.forEach(value => {

                    if(value.shipty_id !== 4 && value.shop_id === 0){
                        content += '<tr class="text-center">';
                        content += ' <td data-label="น้ำหนัก (กรัม)">'+value.shipde_weight+'</td>';
                        content += ' <td data-label="ราคา">'+value.shipde_price+'</td>';
                        content += ' </tr>';
                        $('#fetchData1').html(content);
				        $('#exampleModalCenter1').modal("show");
                    }
                    else{
                        content += '<tr class="text-center">';
                        content += ' <td data-label="น้ำหนัก (กรัม)">'+value.shipde_weight+'</td>';
                        content += ' <td class="pr-0 pl-0" data-label="ราคา">';
                        content += '  <input class="form-control font-body text-center col-8 mx-auto" type="number"  id="price_shipping['+value.shipde_id+']" name="price_shipping['+value.shipde_id+']" value="'+value.shipde_price+'">';
                        content += ' </td>';
                        content += ' </tr>';
                        res_price.push(value.shipde_id);
                        $('#fetchData').html(content);
				        $('#exampleModalCenter').modal("show");
                    }


				});

			}
		});
	}

    function check_ship(id){
        // console.log(id);
        var checkBox = document.getElementById(id);
        if(checkBox.checked == true){

            // console.log(id,"true");
            res_data.push(id);
            // console.log(res_data);

        }else{
            // console.log(id,"false");
            // res_data.pop(id);
			const index = res_data.indexOf(id);
			if (index > -1) {
				res_data.splice(index, 1);
			}
            // console.log(res_data);
        }
    }

	$("#send_res").click(function(){
        if(res_data != ""){
            $.ajax({
                type: 'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    "shipty_id":res_data
                },
                url: "{{route('checkShippingDetails')}}",
                success: function(json){
                    console.log("check");
                    alert("บันทึกข้อมูลสำเร็จ")
                }

            });
        }else{
            alert("กรุณาเลือกอย่างน้อย 1 อย่าง");
        }
		// console.log(res_data);

    });


</script>

@endsection



@section('style')
<style>
    .custom-control-input:checked~.custom-control-label::before {
        color: #fff;
        border-color: #d61900;
        background-color: #d61900;
    }

    .btnb2b2b2 {
        background-color: #b2b2b2;
        color: #ffffff;
    }

    .btn-link {
        font-weight: 400;
        color: #919191;
        border-bottom-color: #919191;

        text-decoration: none;
    }

    .navbt {
        margin-top: 200px;
    }
</style>
@endsection
