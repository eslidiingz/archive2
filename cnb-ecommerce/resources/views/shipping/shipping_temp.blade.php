@extends('new_ui.layouts.front-end-seller')
@section('content')

<div class="row">

    <div class="col-8 p-4">
        <h3><strong>การจัดส่งของฉัน</strong></h3>
    </div>
    <div class="col-4 d-flex align-items-center justify-content-end" data-toggle="modal" data-target="#exampleModalCenter2">
        <button class="btn btn-primary mr-3">+ เพิ่มข้อมูลจัดส่ง</button>
    </div>
    <div class="container-fluid">
        @foreach ($shipping_type as $item)
        <div class="row px-4">
            <div class="col-12 mx-0" style="background-color: #fff;"><br>
                {{-- <div class="row align-items-center"> --}}
                <div class="row align-items-center ">
                    <div class="col-lg-8 col-md-12 col-12">
                        <h5><b>{{ $item->shipty_name }}</b></h5>
                    </div>
                    <div class="col-lg-3 col-md-11 col-10 custom-control custom-control d-flex justify-content-end">
                        <button class="btn btn btn-link btnbro form-control" id="{{ $item->shipty_id }}" type="button"
                            onclick="btn(this.id);">กดเพื่อดูรายละเอียด</button>
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
                        class="btn btn-c75ba1 float-right  col-lg-2 col-md-1 ml-1 mb-1">บันทึก</button>
                    {{-- <button type="button" class="btn  btnb2b2b2 float-right  col-lg-2 col-md-1">ยกเลิก</button> --}}
                    <a href="{{ route('shop') }}" class="btn  btnb2b2b2 float-right  col-lg-2 col-md-1">
                        {{ __('ยกเลิก') }}
                    </a>
                </div>
            </div>
        </div>
    </div> <!-- endcontainer -->
</div><!-- endrow -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        {{-- <form action="{{route('addShippingDetail')}}" method="post"> --}}
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>เพิ่มข้อมูลการจัดส่ง</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                {{-- <th scope="col">#</th> --}}
                                {{-- <th scope="col">กว้าง</th>
                                                <th scope="col">สูง</th>
                                                <th scope="col">ยาว</th> --}}
                                <th scope="col">น้ำหนัก (กรัม)</th>
                                <th scope="col">ราคา (พื้นที่เดียวกัน)</th>
                                <th scope="col">ราคา (ต่างพื้นที่)</th>
                            </tr>
                        </thead>
                        <tbody id="fetchData">
                            {{-- @foreach ($users as $data)
                                                    <tr class="text-center">
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck{{ $data->shipde_id }}">
                            <label class="custom-control-label" for="customCheck{{ $data->shipde_id }}"></label>
                </div>
                </th>
                <td>{{ $data->shipde_wide }}</td>
                <td>{{ $data->shipde_long }}</td>
                <td>{{ $data->shipde_high }}</td>
                <td>{{ $data->shipde_weight }}</td>
                <td>{{ $data->shipde_price }}</td>
                <td>{{ $data->shipde_price_cross_area }}</td>
                </tr>
                @endforeach --}}
                </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btnb2b2b2" data-dismiss="modal">ปิด</button>
            <button id="send-price" type="submit" class="btn btn-c75ba1">บันทึก</button>
        </div>
    </div>
    {{-- </form> --}}
</div>
</div>
{{-- ----------------------- --}}
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        {{-- <form action="{{route('addShippingDetail')}}" method="post"> --}}
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>ข้อมูลการจัดส่ง</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                {{-- <th scope="col">#</th> --}}
                                {{-- <th scope="col">กว้าง</th>
                                                <th scope="col">สูง</th>
                                                <th scope="col">ยาว</th> --}}
                                <th>น้ำหนัก (กรัม)</th>
                                <th>ราคา</th>
                            </tr>
                        </thead>
                        <tbody id="fetchData1">
                            {{-- @foreach ($users as $data)
                                                    <tr class="text-center">
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck{{ $data->shipde_id }}">
                            <label class="custom-control-label" for="customCheck{{ $data->shipde_id }}"></label>
                </div>
                </th>
                <td>{{ $data->shipde_wide }}</td>
                <td>{{ $data->shipde_long }}</td>
                <td>{{ $data->shipde_high }}</td>
                <td>{{ $data->shipde_weight }}</td>
                <td>{{ $data->shipde_price }}</td>
                </tr>
                @endforeach --}}
                </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btnb2b2b2" data-dismiss="modal">ปิด</button>
        </div>
    </div>
    {{-- </form> --}}
</div>
</div>



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>ข้อมูลการจัดส่ง</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 px-0 mb-3">
                    <label for="nameTransport"><strong>ชื่อขนส่ง</strong></label>
                    <input type="text" class="form-control" id="nameTransport" placeholder="กรอกชื่อขนส่ง">
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>น้ำหนัก (กรัม)</th>
                                <th>ราคา1</th>
                                <th>ราคา2</th>
                            </tr>
                        </thead>
                        <tbody id="fetchData1">
                        <tr>
                            <td class="d-flex align-items-center justify-content-center" style="border-top: unset;">3000</td>
                            <td><input type="number" class="form-control" id="price-1-1" placeholder="ราคา 1"></td>
                            <td><input type="number" class="form-control" id="price-1-2" placeholder="ราคา 2"></td>
                        </tr>
                        <tr>
                            <td class="d-flex align-items-center justify-content-center" style="border-top: unset;">5000</td>
                            <td><input type="number" class="form-control" id="price-1-1" placeholder="ราคา 1"></td>
                            <td><input type="number" class="form-control" id="price-1-2" placeholder="ราคา 2"></td>
                        </tr>
                        <tr>
                            <td class="d-flex align-items-center justify-content-center" style="border-top: unset;">100</td>
                            <td><input type="number" class="form-control" id="price-1-1" placeholder="ราคา 1"></td>
                            <td><input type="number" class="form-control" id="price-1-2" placeholder="ราคา 2"></td>
                        </tr>
                        <tr>
                            <td class="d-flex align-items-center justify-content-center" style="border-top: unset;">150</td>
                            <td><input type="number" class="form-control" id="price-1-1" placeholder="ราคา 1"></td>
                            <td><input type="number" class="form-control" id="price-1-2" placeholder="ราคา 2"></td>
                        </tr>
                        <tr>
                            <td class="d-flex align-items-center justify-content-center" style="border-top: unset;">250</td>
                            <td><input type="number" class="form-control" id="price-1-1" placeholder="ราคา 1"></td>
                            <td><input type="number" class="form-control" id="price-1-2" placeholder="ราคา 2"></td>
                        </tr>
                </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btnb2b2b2" data-dismiss="modal">ปิด</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">บันทึก</button>
        </div>
    </div>
</div>
</div>
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
