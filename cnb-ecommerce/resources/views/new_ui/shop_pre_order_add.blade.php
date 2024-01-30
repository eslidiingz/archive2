@extends('layouts.shop')
@section('style')
	<style>
		.swiper-container {
			width: 100%;
			height: 300px;
			margin-left: auto;
			margin-right: auto;
		}
		.swiper-container-5 {
			width: 100%;
			height: 300px;
			margin-left: auto;
			margin-right: auto;
		}

		.swiper-slide {
			background-size: cover;
			background-position: center;
		}

		.gallery-top {
			height: 80%;
			width: 100%;
		}

		.gallery-thumbs {
			height: 20%;
			box-sizing: border-box;
			padding: 10px 0;
		}

		.gallery-thumbs .swiper-slide {
			height: 100%;
			opacity: 0.4;
		}

		.gallery-thumbs .swiper-slide-thumb-active {
			opacity: 1;
		}
		.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
			color: #fff;
			background-color: #c75ba1;
			border-color: #c75ba1;
			border: none;

		}
		.nav-tabs .nav-link:hover{
			border: none;
			color: #fff;
			background-color: #c75ba1;
		}
		.nav-tabs .nav-link{
			border: none;
		}
		.nav-tabs{
			border-bottom: 4px solid #c75ba1;
		}
		.custom-control-input:checked~.custom-control-label::before{
			color: #fff;
			border-color: #c75ba1;
			background-color: #c75ba1;
		}
		.form-control.is-invalid, .was-validated .form-control:invalid{
			border-color: #ced4da;
		}
		#modalcategory .modal-body ul li.active{
			background-color: #c45e9f;
			border-color: #c45e9f;
		}
	</style>
@endsection
@section('content')
<div class="row">
	<div class="col-12 px-4 pt-4 pb-1">
		<h3><strong>เพิ่มสินค้าใหม่</strong></h3>
	</div>
	<div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
		<div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
			<div class="col-12 mt-4">
				<h5><strong>ข้อมูลทั่วไป</strong></h5>
			</div>
			<div class="col-12">
				<div class="form-group row was-validated">
					<label for="inputNameProduct-1" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">ชื่อสินค้า</strong></label>
					<div class="col-sm-10">
						<input type="text" class="form-control is-invalid" id="inputNameProduct-1" placeholder="ชื่อสินค้า" required>
					</div>
				</div>
			</div>

			<div class="col-12">
				<div class="form-group row was-validated">
					<label for="inputNameProduct-2" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">หมวดหมู่สินค้า</strong></label>
					<div class="col-sm-10">
						<input type="text" class="form-control is-invalid" id="inputNameProduct-2" data-toggle="modal" data-target="#modalcategory" placeholder="หมวดหมู่สินค้า" required>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group row was-validated">
					<label for="inputNameProduct-3" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">รายละเอียดสินค้า</strong></label>
					<div class="col-sm-10">
						<textarea class="form-control is-invalid" id="inputNameProduct-3" rows="10" placeholder="รายละเอียดสินค้า" required></textarea>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
		<div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
			<div class="col-12 mt-4">
				<h5><strong>ข้อมูลการขาย</strong></h5>
			</div>
			<div class="col-12">
				<div class="form-group row">
					<div class="col-lg-10 col-md-10 col-12 ml-auto">
						<div class="row">
							<div class="col-12">
								<div class="form-group row">
									<div class="col-12">
										<div class="d-flex flex-column flex-fill  px-lg-4 px-md-4 px-2 py-lg-4 py-md-4 py-4 position-relative" style="background-color: #fafafa;">
											<div class="col-12">
												<h5><strong>ช่วงเวลาที่ <span class="countnumber">1</span></strong></h5>
											</div>
											<div class="col-12">
												<div class="form-row">
													<div class="col-6">
														<div class="form-group row">
															<label for="date-start" class="col-sm-2 col-form-label"><strong class="text-main">วันเริ่มต้น</strong></label>
															<div class="col-sm-10">
																<input type="date" class="form-control" id="date-start">
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group row">
															<label for="date-end" class="col-sm-2 col-form-label"><strong class="text-main">วันสิ้นสุด</strong></label>
															<div class="col-sm-10">
																<input type="date" class="form-control" id="date-end">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="row">
													<div class="col-12">
														<div class="form-group row">
															<label for="numberTotal" class="col-sm-1 col-form-label"><strong class="text-main">จำนวนชิ้น</strong></label>
															<div class="col-sm-11">
																<input type="number" class="form-control" id="numberTotal">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group row" id="optionBox">

								</div>
							</div>
							<div class="col-12">
								<div class="form-group row">
									<div class="col-12">
										<button class="btn btn-outline-primary form-control" id="addOptionBox2" style="border-style: dashed;"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มช่วงเวลา</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
		<div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
			<div class="col-12 mt-4">
				<h5><strong>รูปภาพและวิดิโอ</strong></h5>
			</div>
			<div class="col-12">
				<form action="/upload-target" class="dropzone"></form>
			</div>
		</div>
	</div>
	<div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
		<div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
			<div class="col-12 mt-4">
				<h5><strong>การจัดส่ง</strong></h5>
			</div>
			<div class="col-12">
				<div class="form-group row was-validated">
					<label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">น้ำหนัก</strong></label>
					<div class="col-sm-10">
						<div class="input-group mb-3">
							<input type="number" class="form-control is-invalid" id="inputNameProduct-6" placeholder="น้ำหนัก" required>
							<div class="input-group-append">
								<span class="input-group-text" >Kg</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group row">
					<label for="inputNameProduct-7" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">ขนาดพัสดุ</strong></label>
					<div class="col-sm-10">
						<div class="form-row was-validated">
							<div class="col-lg-4 col-md-4 col-12">
								<div class="input-group mb-3">
								  <input type="number" class="form-control is-invalid" id="inputNameProduct-7" placeholder="กว้าง" required>
								  <div class="input-group-append">
								    <span class="input-group-text" >Kg</span>
								  </div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-12">
								<div class="input-group mb-3">
								  <input type="number" class="form-control is-invalid" id="inputNameProduct-8" placeholder="ยาว" required>
								  <div class="input-group-append">
								    <span class="input-group-text" >Kg</span>
								  </div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-12">
								<div class="input-group mb-3">
								  <input type="number" class="form-control is-invalid" id="inputNameProduct-9" placeholder="สูง" required>
								  <div class="input-group-append">
								    <span class="input-group-text" >Kg</span>
								  </div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group row px-2">
					<label for="inputNameProduct-10" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">ค่าจัดส่ง</strong></label>
					<div class="col-sm-10">
						<div class="form-row px-3 py-2" style="border: solid 1px #ced4da;">
							<div class="col-12 mb-2">
								<div class="row">
									<div class="col-10">
										<strong>Kerry Express (Max 50 kg)</strong>
									</div>
									<div class="col-2 d-flex justify-content-end">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="kerry">
											<label class="custom-control-label" style="cursor: pointer;" for="kerry"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 mb-2">
								<div class="row">
									<div class="col-10">
										<strong>Alpha Fast  (Max 20 kg)</strong>
									</div>
									<div class="col-2 d-flex justify-content-end">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="alpha">
											<label class="custom-control-label" style="cursor: pointer;" for="alpha"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 mb-2">
								<div class="row">
									<div class="col-10" >
										<strong>ไปรษณีย์ไทย  (Max 50 kg)</strong>
									</div>
									<div class="col-2 d-flex justify-content-end">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="post">
											<label class="custom-control-label" style="cursor: pointer;" for="post"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 mb-2">
								<div class="row">
									<div class="col-10">
										<strong>Ninja  (Max 30 kg)</strong>
									</div>
									<div class="col-2 d-flex justify-content-end" >
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="ninja">
											<label class="custom-control-label" style="cursor: pointer;" for="ninja"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 mb-2">
								<div class="row">
									<div class="col-10">
										<strong>Lalamove  (Max 10 kg)</strong>
									</div>
									<div class="col-2 d-flex justify-content-end">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="lalamove">
											<label class="custom-control-label" style="cursor: pointer;" for="lalamove"></label>
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
	<div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
		<div class="p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
			<div class="col-12 mt-4">
				<h5><strong>อื่นๆ</strong></h5>
			</div>
			<div class="col-12">
				<div class="form-group row was-validated">
					<label for="inputNameProduct-4" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">การส่งนานกว่าปกติ</strong></label>
					<div class="col-sm-5 d-flex align-items-center">
						  <div class="custom-control custom-radio mr-4">
						    <input type="radio" class="custom-control-input " id="customControlValidation2" name="radio-stacked" checked required>
						    <label class="custom-control-label" for="customControlValidation2">ไม่ใช่</label>
						  </div>
						  <div class="custom-control custom-radio ml-4">
						    <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
						    <label class="custom-control-label" for="customControlValidation3">ใช่</label>
						  </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group row was-validated">
					<label for="inputNameProduct-4" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">สภาพ</strong></label>
					<div class="col-sm-5">
						<select class="form-control custom-select" id="exampleFormControlSelect1" required>
					      <option value="1">ของใหม่</option>
					      <option value="2">ของมือสอง</option>
					    </select>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group row was-validated">
					<label for="inputNameProduct-4" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">SKU</strong></label>
					<div class="col-sm-5">
						<input type="text" class="form-control is-invalid" id="inputNameProduct-4" placeholder="ใส่ค่า" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 mb-4 text-right  px-2 px-lg-4 px-md-4 mx-0">
		<button class="btn btn-outline-c45e9f">ยกเลิก</button>
		<button class="btn btn-c75ba1">บันทึก</button>
	</div>

		<!-- Modal -->
	<div class="modal fade" id="modalcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">เลือกหมวดหมู่</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row ">
						<div class="col-6 mb-4" style="overflow-y: auto; height: 300px;">
							<ul class="list-group">
								<li class="list-group-item active">อาหารเสริมและผลิตภัณฑ์สุขภาพ</li>
								<li class="list-group-item">Dapibus ac facilisis in</li>
								<li class="list-group-item">Morbi leo risus</li>
								<li class="list-group-item">Porta ac consectetur ac</li>
								<li class="list-group-item">Vestibulum at eros</li>
								<li class="list-group-item">Dapibus ac facilisis in</li>
								<li class="list-group-item">Morbi leo risus</li>
								<li class="list-group-item">Porta ac consectetur ac</li>
								<li class="list-group-item">Vestibulum at eros</li>
							</ul>
						</div>
						<div class="col-6 mb-4" style="overflow-y: auto; height: auto;">
							<ul class="list-group right">
								<li class="list-group-item">อาหารเสริมเพื่อสุขภาพ</li>
								<li class="list-group-item">Dapibus ac facilisis in</li>
								<li class="list-group-item">Morbi leo risus</li>
								<li class="list-group-item">Porta ac consectetur ac</li>
								<li class="list-group-item">Vestibulum at eros</li>
							</ul>
						</div>
						<div class="col-12">
							<h6>ที่เลือกในปัจจุบัน : <strong>อาหารเสริมและผลิตภัณฑ์สุขภาพ > อาหารเสริมเพื่อสุขภาพ</strong></h6>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn text-white" style="background-color: #c45e9f;">Save</button>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('script')
	<script type="text/javascript">
		$('#modalcategory .modal-body ul li').on('click',function(){
			var check = $(this).parent().hasClass('right');
			if(!check){
				$('#modalcategory .modal-body ul li').removeClass('active');
			}else{
				$('#modalcategory .modal-body ul.right li').removeClass('active');
			}
			$(this).addClass('active');
		});
	</script>
	<script>
		
		$('#addOptionBox2').on('click',function(){
			console.log("click");
			var number = ($("span.countnumber").length+1);
			$('#optionBox').append('\
				<div class="col-12 mb-3 deleteOptionSelectMore">\
					<div class="d-flex flex-column flex-fill  px-lg-4 px-md-4 px-2 py-lg-4 py-md-4 py-4 position-relative" style="background-color: #fafafa;">\
						<div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times closeOptionBox" style="cursor: pointer;" aria-hidden="true"></i></div>\
						<div class="col-12">\
							<h5><strong>ช่วงเวลาที่ <span class="countnumber">'+number+'</span></strong></h5>\
						</div>\
						<div class="col-12">\
							<div class="form-row">\
								<div class="col-6">\
									<div class="form-group row">\
										<label for="date-start" class="col-sm-2 col-form-label"><strong class="text-main">วันเริ่มต้น</strong></label>\
										<div class="col-sm-10">\
											<input type="date" class="form-control" id="date-start">\
										</div>\
									</div>\
								</div>\
								<div class="col-6">\
									<div class="form-group row">\
										<label for="date-end" class="col-sm-2 col-form-label"><strong class="text-main">วันสิ้นสุด</strong></label>\
										<div class="col-sm-10">\
											<input type="date" class="form-control" id="date-end">\
										</div>\
									</div>\
								</div>\
							</div>\
						</div>\
						<div class="col-12">\
							<div class="row">\
								<div class="col-12">\
									<div class="form-group row">\
										<label for="numberTotal" class="col-sm-1 col-form-label"><strong class="text-main">จำนวนชิ้น</strong></label>\
										<div class="col-sm-11">\
											<input type="number" class="form-control" id="numberTotal">\
										</div>\
									</div>\
								</div>\
							</div>\
						</div>\
					</div>\
				</div>\
			');
			number++;
		});

		$('#optionBox').on('click','.closeOptionBox',function(){
			$(this).parents('.deleteOptionSelectMore').remove();
			$( "span.countnumber" ).each(function( index ) {
			  $(this).text((index+1));
			});
		});
	</script>
	@endsection

	


	



