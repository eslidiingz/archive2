@extends('new_ui.layouts.front-end-seller')
@section('content')
				<div class="row">
					<div class="col-12 p-4">
						<h3><strong>บัญชีของฉัน</strong></h3>
					</div>

						<div class="container-fluid">
							<div class="row">				
								<div class="col-lg-6 col-md-12 col-sm-12 mx-1">
									<div class="card">
										<div class="card-body cardh"style="background-color: #fff;">
											<div class="col-xl-5 col-lg-8 col-md-5">
												<labal for="tel" class="t">เบอร์โทรศัพท์มือถือ</labal>
											</div>
												<div class="form-group row ">
													<div class="col-lg-11 col-md-11 mx-3">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<select class="form-control">
																	<option>+66</option>
																	<option>+66</option>
																	<option>+66</option>
																</select>
															</div>
																<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
														</div>
													</div>
												</div>
												<div class="form-group row mt-n4">
													<div class="col-lg-11 mx-3">
														<label for="email" class="t mt-2">อีเมล</label>
														<input type="email" class="form-control" id="validationCustom01" value="******" >
													</div>
												</div>
												<div class="form-group row mt-n2">
													<div class="col-lg-11 mx-3">
														<label for="password" class="t mt-2">รหัสผ่าน</label>
													</div>
												</div>
												<div class="form-group row mt-n2">
													<div class="col-lg-11 mx-3">
														<div class="input-group mb-3">
															<input type="password" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"value="******">
																<div class="input-group-append ">
																	<button class="btn btn btn-link btnbro " id="btnpass" type="button" id="button-addon2">แก้ไขรหัสผ่าน</button>
																</div>
														</div>
													</div>
												</div>
										</div>
									</div>											
								</div>
							</div>
						</div>
				</div>	
					<div class="row">	
						<div class="col-lg-6 col-md-12 col-sm-12  mt-3 ">	
							<button type="button" class="btn btn-c75ba1 float-right  col-2 ml-1">บันทึก</button>
							<button type="button" class="btn  btnb2b2b2 float-right  col-2">ยกเลิก</button>
						</div>
					</div>
@endsection
<!-- Modal1 -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<div class="col-11 mx-auto">
						<h6 class="text-center"><b>แก้ไขรหัสผ่าน</b></h6>
					</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
									<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
								</svg>
							</span>
						</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-lg-10 mx-auto">
							<input class="form-control border-0" type="password" placeholder="รหัสผ่านเดิม"style="background-color:#f2f2f2;">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-10 mx-auto">
							<input class="form-control border-0" type="password" placeholder="รหัสผ่านใหม่"style="background-color:#f2f2f2;">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-10 mx-auto">
							<input class="form-control border-0" type="password" placeholder="ยืนยันรหัสผ่านใหม่"style="background-color:#f2f2f2;">
						</div>
					</div>
					<div class="form-group row ">
						<div class="col-6 text-right ">
							<button type="button" class="btn btn-ededed col-lg-10 col-md-12 texttext " data-dismiss="modal"style="background-color:#b2b2b2;">ยกเลิก</button>
						</div>
  						<div class="col-6 text-left">
						  <button type="button" class="btn btn-ededed col-lg-10 col-md-12 texttext  " id="btnok"style="background-color:#b2b2b2;">บันทึก</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- endModal -->
<!-- Modal2 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0 ">
					<div class="col-11 mx-auto">
						<h5 class="text-center iconchack">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
							</svg>
							เปลี่ยนรหัสผ่านสำเร็จ
						</h5>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-lg-10 mx-auto ">
							<h6 class="text-center">คุณได้ทำการเปลี่ยนรหัสผ่าน</h6><br>
							<h6 class="text-center mt-n4">เรียบร้อยแล้ว</h6>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12 text-center">
							<button type="button" class="btn btn-c75ba1 col-lg-5"id="btnokcheck">ตกลง</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- endModal -->
</body>
</html>


@section('script')
<script>
	$(document).ready(function(){
  		$("#btnpass").click(function(){
   		$("#myModal").modal('show');
  		});
});

$(document).ready(function(){
  		$("#btnok").click(function(){
		$('#myModal').modal('hide');
   		$("#myModal1").modal('show');
  		});
});
$(document).ready(function(){
  		$("#btnokcheck").click(function(){
			$('#myModal1').modal('hide');
  		});
});
</script>
@endsection


@section('style')
<style>
.cardh {
  width: auto;
  height: 400px;

}
.t{
	font-size: 20px;
	color: #c45e9f;
}
.texttext{
	color: white;
}
.iconchack{
	color: #23c197
;
}

.btnb2b2b2{
	background-color: #b2b2b2;
	color: #ffffff;
}

.btnbro {
  background-color: white;
  border: 1px solid #e2e2e2;
}
</style>
@endsection