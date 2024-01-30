
@extends('new_ui.layouts.front-end-seller')
@section('content')
				<div class="row">

					<div class="col-12 p-4">
						<h3><strong>การจัดส่งของฉัน</strong></h3>
					</div>
					<div class="container-fluid">			
                       {{--  @foreach ($shipping_type as $item) --}}
                            <div class="row px-4">	
                                <div class="col-12 mx-0"style="background-color: #fff;"><br>
                                    <!-- <div class="row align-items-center"> -->
									<div class="row align-items-center ">
										<div class="col-lg-8 col-md-12 col-12">
										<h5><b>{{-- {{ $item->shipty_name }} --}}</b></h5>
										</div>
										<div class="col-lg-3 col-md-11 col-10 custom-control custom-control d-flex justify-content-end">
										<button class="btn btn btn-link btnbro form-control" id="btnpass" type="button" id="button-addon2">กำหนดราคาเอง</button>
										</div>
										<div class="col-lg-1 col-md-1 col-2 custom-control custom-control custom-switch d-flex justify-content-end">
										<input type="checkbox" class="custom-control-input " id="switch{{-- {{ $item->shipty_id }} --}}"style="background-color:#c75ba1;">
                                            <label class="custom-control-label " for="switch{{-- {{ $item->shipty_id }} --}}"></label>
										</div>
									</div><br>
                                </div><br>
                            </div><br>
						<!-- {{-- @endforeach --}} -->
						<div class="col-12 mx-0">
							<div class="row justify-content-between">	
								<div class="col-lg-12 col-md-12 col-sm-12  mt-3 ">	
									<button type="button" class="btn btn-c75ba1 float-right  col-lg-2 col-md-1 ml-1 mb-1">บันทึก</button>
									<button type="button" class="btn  btnb2b2b2 float-right  col-lg-2 col-md-1">ยกเลิก</button>
								</div>
							</div>
						</div>
                    </div> <!-- endcontainer -->
				</div><!-- endrow -->
@endsection

<!-- Modal -->
<div class="modal fade bd-example-modal-xlsssss " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl " role="document">
            <form action="{{-- {{route('addShippingDetail')}} --}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูลการจัดส่ง</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               		<div class="modal-body table-responsive">
						<div class="col-12">
							<table class="table table-hover">
								<thead>
									<tr>
									<th scope="col">ตัวเลือก</th>
									<th scope="col">กว้าง</th>
									<th scope="col">สูง</th>
									<th scope="col">ยาว</th>
									<th scope="col">น้ำหนัก (กรัม)</th>
									<th scope="col">ราคา</th>
									</tr>
								</thead>
								<tbody>
									<tr class="text-center">
										<th scope="row">
										<td data-label="ตัวเลือก">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input myCheck" name="check_shipid[]" id="customCheck'+value.shipde_id+'" value="'+value.shipde_id+'">
												<label class="custom-control-label" for="customCheck'+value.shipde_id+'"></label>
											</div>
											</td>
										</th>
										<td data-label="กว้าง">'+value.shipde_wide+'</td>
										<td data-label="สูง">'+value.shipde_high+'</td>
										<td data-label="ยาว">'+value.shipde_long+'</td>
										<td data-label="น้ำหนัก (กรัม)">'+value.shipde_weight+'</td>
										<td data-label="ราคา">
											<input typt="text" name="price_shipping['+value.shipde_id+']" value="'+value.shipde_price+'">
											<input typt="text" name="shipty_id" value="'+value.shipty_id+'" style="display:none">
										</td>
									</tr>
								</tbody>
								<tbody>
									<th scope="row">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input myCheck" name="check_shipid[]" id="customCheck'+value.shipde_id+'" value="'+value.shipde_id+'">
											<label class="custom-control-label" for="customCheck'+value.shipde_id+'"></label>
										</div>
									</th>
									<td data-label="กว้าง">'+value.shipde_wide+'</td>
									<td data-label="สูง">'+value.shipde_high+'</td>
									<td data-label="ยาว">'+value.shipde_long+'</td>
									<td data-label="น้ำหนัก (กรัม)">'+value.shipde_weight+'</td>
									<td data-label="ราคา">
										<input typt="text" name="price_shipping['+value.shipde_id+']" value="'+value.shipde_price+'">
										<input typt="text" name="shipty_id" value="'+value.shipty_id+'" style="display:none">
									</td>
								</tbody>
							</table>
						</div>
                	</div>
                    <div class="modal-footer">
                        <button type="button" class="btn-can" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn-sub">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@section('script')
<script>
	$(document).ready(function(){
  		$("#btnpass").click(function(){
   		$("#exampleModalCenter").modal('show');
  		});
		  
});
</script>
@endsection



@section('style')
<style>
.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #c75ba1;
    background-color: #c75ba1;
}

.btnb2b2b2{
	background-color: #b2b2b2;
	color: #ffffff;
}

.btn-link {
    font-weight: 400;
    color: #919191;
	border-bottom-color:#919191;
	
    text-decoration: none;
}
</style>
@endsection