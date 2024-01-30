@extends('new_ui.layouts.front-end-seller')
@section('content')
				<div class="row mb-4">
					<div class="col-12 px-4 pt-4 pb-2">
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
								<div class="row" id="optionBox">
									

								</div>
							</div>
							<div class="col-12" id="beforeOptionBox">
								<div class="form-group row was-validated">
									<label for="inputNameProduct-4" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">ราคา</strong></label>
									<div class="col-sm-10">
										<div class="input-group mb-3">
											<input type="number" class="form-control is-invalid" id="inputNameProduct-4" placeholder="ราคา" required>
											<div class="input-group-append">
												<span class="input-group-text" style="width: 70px;">บาท</span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row was-validated">
									<label for="inputNameProduct-5" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">คลัง</strong></label>
									<div class="col-sm-10">
										<div class="input-group mb-3">
											<input type="text" class="form-control is-invalid" id="inputNameProduct-5" placeholder="0" required>
											<div class="input-group-append">
												<span class="input-group-text" style="width: 70px;">จำนวน</span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputNameProduct-5" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">ตัวเลือกสินค้า</strong></label>
									<div class="col-sm-10">
										<button class="btn btn-outline-primary form-control" id="addOptionBox"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือกสินค้า</button>
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
						<button class="btn btn-outline-c45e9f">บันทึกและซ่อน</button>
						<button class="btn btn-c75ba1">บันทึกและเผยแพร่</button>
					</div>
				</div>
@endsection


@section('script')
<script type="text/javascript">

	// เพิ่ม ชุดแรก
	$('#addOptionBox').on('click',function(){
		console.log("click");
		$('#beforeOptionBox').css('display','none');
		$('#optionBox').html('\
			<div class="col-12">\
				<div class="form-group row">\
					<label for="inputNameProduct-4" class="col-lg-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">แบบที่ 1</strong></label>\
					<div class="offset-sm-2 offset-lg-0 col-sm-8">\
						<div class="d-flex flex-column flex-fill  p-4 position-relative" style="background-color: #fafafa;">\
							<div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times" style="cursor: pointer;" id="closeOptionBox" aria-hidden="true"></i></div>\
							<div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">\
								<label for="inputText" class="col-lg-2 col-md-2 col-12">ชื่อ</label>\
								<div class="col-lg-9 col-md-9 col-12" >\
									<input type="text" class="form-control" id="inputText">\
								</div>\
							</div>\
							\
							<div id="addOptionSelect-1">\
								<div class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left" >\
									<label for="inputText" class="col-lg-2 col-md-2 col-12">ตัวเลือก</label>\
									<div class="col-lg-9 col-md-9 col-12" >\
										<input type="text" class="form-control" id="inputText">\
									</div>\
									<div class="col-lg-1 col-md-1 col-12 d-flex align-items-center" >\
									\
									</div>\
								</div>\
							</div>\
							\
							<div class="form-group d-lg-flex d-md-flex">\
								<label for="inputText" class="col-lg-2 col-md-2 col-12"></label>\
								<div class="col-lg-9 col-md-9 col-12" >\
									<button class="btn btn-outline-primary form-control" id="addOptionBoxMore-1" style="border-style: dashed;"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือก-1</button>\
								</div>\
							</div>\
						</div>\
					</div>\
				</div>\
			</div>\
			<div class="col-12">\
				<div class="form-group row">\
					<label for="inputNameProduct-4" class="col-lg-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">แบบที่ 2</strong></label>\
					<div class="offset-sm-2 offset-lg-0 col-sm-8" id="optionBox2">\
						<button class="btn btn-outline-primary form-control" id="addOptionBox2" style="border-style: dashed;"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือก2</button>\
					</div>\
				</div>\
			</div>\
			<div class="col-12">\
				<div class="form-group row">\
					<label for="inputNameProduct-4" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">ข้อมูลตัวเลือกสินค้า</strong></label>\
					<div class="col-sm-8">\
						<div class="row px-3">\
							<div class="col-4 px-0">\
								<input type="email" class="form-control" id="exampleInputEmail1" style="border-radius: 4px 0 0 4px;" aria-describedby="emailHelp">\
							</div>\
							<div class="col-4 px-0">\
								<input type="email" class="form-control" id="exampleInputEmail1" style="border-radius: 0px; border-left: none; border-right: none;" aria-describedby="emailHelp">\
							</div>\
							<div class="col-4 px-0">\
								<input type="email" class="form-control" id="exampleInputEmail1" style="border-radius: 0 4px 4px 0;" aria-describedby="emailHelp">\
							</div>\
						</div>\
					</div>\
					<div class="col-sm-2">\
						<button class="btn btn-danger form-control">อัพเดท</button>\
					</div>\
				</div>\
			</div>\
			<div class="col-12">\
				<div class="form-group row">\
					<label for="inputNameProduct-4" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">รายการตัวเลือก</strong></label>\
					<div class="col-sm-10">\
						<div class="row">\
							<div class="col-12">\
								<div class="row px-3">\
									<div class="col-3 px-0">\
										<input class="form-control text-center" style="border-radius: unset;" type="text" placeholder="ชื่อ" readonly>\
									</div>\
									<div class="col-3 px-0">\
										<input class="form-control text-center" style="border-radius: unset;" type="text" placeholder="ราคา" readonly>\
									</div>\
									<div class="col-3 px-0">\
										<input class="form-control text-center" style="border-radius: unset;" type="text" placeholder="คลัง" readonly>\
									</div>\
									<div class="col-3 px-0">\
										<input class="form-control text-center" style="border-radius: unset;" type="text" placeholder="เลข SKU" readonly>\
									</div>\
								</div>\
							</div>\
							<div class="col-12">\
								<div class="row px-3">\
									<div class="col-3 px-0 ">\
										<input class="form-control text-center" style="border-radius: unset; background-color: unset;" type="text" placeholder="ตัวเลือก" readonly>\
									</div>\
									<div class="col-3 px-0">\
										<input type="number" class="form-control" style="border-radius: unset;" id="exampleFormControlInput2" placeholder="">\
									</div>\
									<div class="col-3 px-0">\
										<input type="number" class="form-control" style="border-radius: unset;" id="exampleFormControlInput3" placeholder="">\
									</div>\
									<div class="col-3 px-0">\
										<input type="text" class="form-control" style="border-radius: unset;" id="exampleFormControlInput4" placeholder="">\
									</div>\
								</div>\
							</div>\
						</div>\
					</div>\
				</div>\
			</div>\
			');
	});

	//ลบ ชุดแรก
	$('#optionBox').on('click','#closeOptionBox',function(){
	// $('#closeOptionBox').on('click',function(){

		console.log("click");
		$('#beforeOptionBox').css('display','block');
		$('#optionBox').html('');
	});


	// เพิ่ม ย่อยชุดแรก
	$('#optionBox').on('click','#addOptionBoxMore-1',function(){
		$('#addOptionSelect-1').append('\
								<div class="form-group d-md-flex text-right deleteOptionSelectMore row mx-0" >\
									<label for="inputText" class="col-lg-2 col-md-2 col-12"></label>\
									<div class="col-lg-9 col-md-9 col-10" >\
										<input type="text" class="form-control" id="inputText">\
									</div>\
									<div class="col-lg-1 col-md-1 col-2 d-flex align-items-center" >\
										<i class="fa fa-trash-o deleteOptionSelect" aria-hidden="true"></i>\
									</div>\
								</div>\
								');
	});


	// เพิ่ม ชุดสอง
	$('#optionBox').on('click','#addOptionBox2',function(){
		$('#optionBox2').html('\
						<div class="d-flex flex-column flex-fill  p-4 position-relative" style="background-color: #fafafa;">\
							<div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times" style="cursor: pointer;" id="closeOptionBox2" aria-hidden="true"></i></div>\
							<div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">\
								<label for="inputText" class="col-lg-2 col-md-2 col-12">ชื่อ</label>\
								<div class="col-lg-9 col-md-9 col-12" >\
									<input type="text" class="form-control" id="inputText">\
								</div>\
							</div>\
							<div id="addOptionSelect-2">\
								<div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">\
									<label for="inputText" class="col-lg-2 col-md-2 col-12">ตัวเลือก</label>\
									<div class="col-lg-9 col-md-9 col-12" >\
										<input type="text" class="form-control" id="inputText" >\
									</div>\
									<div class="col-lg-1 col-md-1 col-12 d-flex align-items-center" >\
										\
									</div>\
								</div>\
							</div>\
							<div class="form-group d-lg-flex d-md-flex">\
								<label for="inputText" class="col-lg-2 col-md-2 col-12"></label>\
								<div class="col-lg-9 col-md-9 col-12" >\
									<button class="btn btn-outline-primary form-control" id="addOptionBoxMore-2" style="border-style: dashed;"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือก-2</button>\
								</div>\
							</div>\
						</div>\
						');
	});

	//ลบ ชุดสอง
	$('#optionBox').on('click','#closeOptionBox2',function(){
		$('#optionBox2').html('<button class="btn btn-outline-primary form-control" id="addOptionBox2" style="border-style: dashed;"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือก2 after remove</button>');
	});
	// เพิ่ม ย่อยชุดสอง
	$('#optionBox').on('click','#addOptionBoxMore-2',function(){
		$('#addOptionSelect-2').append('\
								<div class="form-group d-md-flex text-right deleteOptionSelectMore row mx-0" >\
									<label for="inputText" class="col-lg-2 col-md-2 col-12"></label>\
									<div class="col-lg-9 col-md-9 col-10" >\
										<input type="text" class="form-control" id="inputText">\
									</div>\
									<div class="col-lg-1 col-md-1 col-2 d-flex align-items-center" >\
										<i class="fa fa-trash-o deleteOptionSelect" aria-hidden="true"></i>\
									</div>\
								</div>\
								');
	});



	$('#optionBox').on('click','.deleteOptionSelect',function(){
		$(this).parents('.deleteOptionSelectMore').remove();
	});

</script>
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

@endsection



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





@section('style')
<style>
		.deleteOptionSelect{
			cursor: pointer;
		}
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
		}
</style>
@endsection