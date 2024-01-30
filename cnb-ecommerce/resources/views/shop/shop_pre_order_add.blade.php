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
		.file-preview-frame.krajee-default.kv-zoom-thumb{
    		display:none !important;
		}
    </style>
    <style>
        /* In order to place the tracking correctly */
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        canvas.drawing,
        canvas.drawingBuffer {
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
@endsection
@section('content')
	<form class="row" id="SubmitPreOrder">
		@csrf
		<div class="col-12 px-4 pt-4 pb-1">
			<h3><strong>เพิ่มสินค้าใหม่</strong></h3>
		</div>
		<div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
			<div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
				<div class="col-12 mt-4">
					<h5><strong>ข้อมูลทั่วไป</strong></h5>
				</div>
				<div class="col-12">
					<div class="form-group row ">
						<label for="title" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">ชื่อสินค้า</strong></label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="title" placeholder="ชื่อสินค้า" name="title">
						</div>
					</div>
				</div>

				<div class="col-12">
                    <div class="form-group row">
                        <label for="inputNameProduct-2"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                style="color: #c45e9f;">หมวดหมู่สินค้า</strong></label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control" id="category" name="category_id" placeholder="เลือกประเภทสินค้า">
                            <input type="hidden" class="form-control" name="category" id="res_category" >

                        </div>
                    </div>
                </div>
				<div class="col-12">
					<div class="form-group row ">
						<label for="detail" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">รายละเอียดสินค้า</strong></label>
						<div class="col-sm-10">
							<textarea class="form-control" id="detail" rows="10" placeholder="รายละเอียดสินค้า" name="detail"></textarea>
						</div>
					</div>
				</div>

                <div class="col-12">
                        <div class="form-group row was-validated">
                            <label for="inputNameProduct-3" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                    style="color: #c45e9f;">บาร์โค้ด (Barcode)</strong></label>
                            <div class="col-sm-10">
                                <input type="number" name="barcode" id="PreOderADDbarcode_input" maxlength="13">
                                <button style="margin-right: 1%;" class="btn btn-c75ba1" type="button" id="barcode_btn" data-toggle="modal"
                                    data-target="#barcodeModalAddPreoder">Scan Barcode</button>
                                {{-- <span><span style="color:red;">*</span><b>คำแนะนำ : </b> ตรวจสอบเลข Barcode ของสินค้าเพื่อความถูกต้อง</span> --}}
                                <br>
                                <span><span style="color:red;">*</span><b>คำแนะนำ : </b> สามารถแก้ไขเลข Barcode ของสินค้าเพิ่มเติมได้ เพื่อความถูกต้องของตัวเลข</span>
                            </div>
                        </div>
                    </div>


<!-- Barcode -->
    <div class="modal fade" id="barcodeModalAddPreoder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b> Barcode NO : <span id="PreOderADDshowBarcode_no"></span></b>

                    <div id="barcodeBodyModalNewPreoder">
                        <video class="dbrScanner-video" playsinline="true"></video>
                    </div>
                    <br>
                    <span>วิธีใช้ : วางสินค้าที่มีพื้นหลังสีพื้น เช่น ขาว หรือ ดำ</span>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="button" id="PreOderADDsaveModal" class="btn btn-primary">Save changes</button>
                </div>
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
								{{-- add disc1 --}}
								<div class="col-12" id="optionDisc">
									<div class="form-group row">
										<label for="inputNameProduct-5" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
											<strong style="color: #c45e9f;">ตัวเลือกสินค้า</strong>
										</label>
										<div class="col-sm-10">
											<button type="button" class="btn btn-outline-primary form-control" openoption="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือกสินค้า</button>
										</div>
									</div>
								</div>
								<div class="col-12 d-none" id="optionDiscShow">
									<button type="button" option="1" class="btn btn-block btn-outline-primary chooseOption" style="border-style: dashed;">เพิ่มตัวเลือกที่ 1</button>
									<div id="optionDisc1" class="d-none">
										<div class="d-flex flex-column flex-fill  px-0 py-4 mt-2 position-relative" style="background-color: #fafafa;">
                                            <div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12">ชื่อ</label>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                    <input type="text" class="form-control titleTable" name="option1" value="" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="appendOption" id="addOptionSelect-1">
                                                <div class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left">
                                                    <label for="inputText" class="col-lg-2 col-md-2 col-12">ตัวเลือก</label>
                                                    <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="text" class="form-control updateTable dis1" name="dis1[]" autocomplete="off">
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group d-lg-flex d-md-flex">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                    <button class="btn btn-outline-primary form-control addOption" option="1" style="border-style: dashed;" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือก-1</button>
                                                </div>
                                            </div>
                                        </div>
									</div>
									<button type="button" option="2" class="btn btn-block btn-outline-primary chooseOption mt-3" style="border-style: dashed;">เพิ่มตัวเลือกที่ 2</button>
									<div id="optionDisc2" class="d-none">
										<div class="d-flex flex-column flex-fill  px-0 py-4 mt-2 position-relative" style="background-color: #fafafa;">
                                            <div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12">ชื่อ</label>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                    <input type="text" class="form-control titleTable" name="option2" value="" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="appendOption" id="addOptionSelect-2">
                                                <div class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left">
                                                    <label for="inputText" class="col-lg-2 col-md-2 col-12">ตัวเลือก</label>
                                                    <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="text" class="form-control updateTable dis2" name="dis2[]" autocomplete="off">
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group d-lg-flex d-md-flex">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                    <button class="btn btn-outline-primary form-control addOption" option="2" style="border-style: dashed;" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือก-2</button>
                                                </div>
                                            </div>
                                        </div>
									</div>
								</div>
								<div class="col-12 mt-3">
									<div class="form-group row">
										<div class="col-12 numberbox" number="1">
											<div class="d-flex flex-column flex-fill  px-lg-4 px-md-4 px-2 py-lg-4 py-md-4 py-4 position-relative" style="background-color: #fafafa;">
												<div class="col-12">
													<h5><strong>ช่วงเวลาที่ <span class="countnumber">1</span></strong></h5>
												</div>
												<div class="col-12">
													<div class="row">
														<div class="col-6">
															<div class="form-group">
																<label for="date-start-1" class="col-form-label"><strong class="text-main">วันเริ่มต้น</strong></label>
																<input type="date" class="form-control" id="date-start-1" name="data[1][start]">
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<label for="date-end-1" class="col-form-label"><strong class="text-main">วันสิ้นสุด</strong></label>
																<input type="date" class="form-control" id="date-end-1" name="data[1][end]">
															</div>
														</div>
													</div>
												</div>
												<div class="col-12 shopOption">
													<div class="row shopOptionOne">
														<div class="col-12 col-md-6">
															<div class="form-group">
									                            <label for="price-1" class="col-form-label"><strong style="color: #c45e9f;">ราคา</strong></label>
								                                <div class="input-group mb-3">
								                                    <input type="number" class="form-control" name="data[1][price]" value="" id="price-1" autocomplete="off" placeholder="ราคา">
								                                    <div class="input-group-append">
								                                        <span class="input-group-text" style="width: 70px;">บาท</span>
								                                    </div>
								                                </div>
									                        </div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
									                            <label for="stock-1" class="col-form-label"><strong style="color: #c45e9f;">คลัง</strong></label>
								                                <div class="input-group mb-3">
								                                    <input type="number" class="form-control" name="data[1][stock]" value="" autocomplete="off" placeholder="จำนวนสินค้าในคลัง" id="stock-1">
								                                    <div class="input-group-append">
								                                        <span class="input-group-text" style="width: 70px;">จำนวน</span>
								                                    </div>
								                                </div>
									                        </div>
														</div>
													</div>
													<div class="row shopOptionMore">

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
											<button type="button" class="btn btn-outline-primary form-control" id="addOptionBox2" style="border-style: dashed;"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มช่วงเวลา</button>
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
					<h5><strong>รูปภาพ</strong> <small class="text-dark" data-toggle="modal" data-target="#add_product" style="cursor: pointer;"><strong class="text-danger"><span class="text-dark">(ลงรูปภาพขนาด 300 * 300 pixel)</span> คลิกดูตัวอย่าง <i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong></small></h5>
				</div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 main-section">
                            {{-- {!! csrf_field() !!} --}}
                            <div class="form-group">
                                <div class="file-loading">
                                    <input id="file-1" type="file" name="file" multiple class="file" accept="image/*"
                                       data-min-file-count="1" required>
                                </div>
                            </div>

                        </div>
                    </div>

				</div>
		    </div>
		</div>
		{{-- <div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
			<div class="p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
				<div class="col-12 mt-4">
					<h5><strong>อื่นๆ</strong></h5>
				</div>
				<div class="col-12">
					<div class="form-group row ">
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
					<div class="form-group row ">
						<label for="inputNameProduct-4" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">สภาพ</strong></label>
						<div class="col-sm-5">
							<select class="form-control custom-select" id="exampleFormControlSelect1" required>
						      <option value="1">ของใหม่</option>
						      <option value="2">ของมือสอง</option>
						    </select>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<div class="col-12 mb-4 text-right  px-2 px-lg-4 px-md-4 mx-0">
			<button class="btn btn-outline-c45e9f" type="button">ยกเลิก</button>
			<button class="btn btn-c75ba1 btnSubmitPreOrder" type="button" id="submit">บันทึก</button>
		</div>
	</form>
	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-xl modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="staticBackdropLabel">เลือกหมวดหมู่</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <div class="row ">
	                    <div class="col-6 mb-4" style="overflow-y: auto; height: 300px;">
	                        <div class="list-group" id="list-tab" role="tablist">
	                            @foreach ($catogorys as $catogory)
	                            <a class="list-group-item list-group-item-action" id="list-{{$catogory->category_id}}-list"
	                                data-toggle="list" href="#list-{{$catogory->category_id}}" role="tab"
	                                aria-controls="{{$catogory->category_id}}">{{$catogory->category_name}}</a>


	                            @endforeach
	                        </div>
	                    </div>
	                    <div class="col-6 mb-4" style="overflow-y: auto; height: 300px;">
	                        <div class="tab-content" id="nav-tabContent">
	                            @foreach ($catogorys as $catogory)
	                            <div class="tab-pane right" id="list-{{$catogory->category_id}}" role="tabpanel"
	                                aria-labelledby="list-{{$catogory->category_id}}-list">
	                                @foreach ($catogory->subcategorys as $sub)
	                                <a class="list-group-item list-group-item-action sub-list"
	                                    sub_category_id="{{$sub->sub_category_id}}">{{$sub->sub_category_name}}</a>
	                                @endforeach
	                            </div>
	                            @endforeach
	                        </div>
	                    </div>
	                    <!-- <div class="col-12">
	        		<h6>ที่เลือกในปัจจุบัน : <strong>อาหารเสริมและผลิตภัณฑ์สุขภาพ > อาหารเสริมเพื่อสุขภาพ</strong></h6>
	        	</div> -->
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

	            </div>
	        </div>
	    </div>
	</div>
<div class="modal fade" id="add_product" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-12 position-relative' style='text-align:center'>
                    <strong>
                        <h5 class="mb-0"><strong>ตัวอย่างขนาดรูป</strong></h5>
                    </strong>
                    <button type="button" class="close position-absolute" style="right: 4px; top: -8px;"
                        data-dismiss="modal">&times;</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <img src="/img/example.png" class="w-100" alt="">
                    </div>
                </div>

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

		var more = 0;
		var tableMore = '';
		$('#addOptionBox2').on('click',function(){
			var number = ($("span.countnumber").length+1);
			option1 = '<div class="row shopOptionOne">\
						<div class="col-12 col-md-6">\
							<div class="form-group price">\
	                            <label for="price-'+number+'" class="col-form-label"><strong style="color: #c45e9f;">ราคา</strong></label>\
                                <div class="input-group mb-3">\
                                    <input type="number" class="form-control" name="data['+number+'][price]" value="" id="price-'+number+'" autocomplete="off" placeholder="ราคา">\
                                    <div class="input-group-append">\
                                        <span class="input-group-text" style="width: 70px;">บาท</span>\
                                    </div>\
                                </div>\
	                        </div>\
						</div>\
						<div class="col-12 col-md-6">\
							<div class="form-group stock">\
	                            <label for="stock-'+number+'" class="col-form-label"><strong style="color: #c45e9f;">คลัง</strong></label>\
                                <div class="input-group mb-3">\
                                    <input type="number" class="form-control" name="data['+number+'][stock]" value="" autocomplete="off" placeholder="จำนวนสินค้าในคลัง" id="stock-'+number+'">\
                                    <div class="input-group-append">\
                                        <span class="input-group-text" style="width: 70px;">จำนวน</span>\
                                    </div>\
                                </div>\
	                        </div>\
						</div>\
					</div>\
					<div class="row shopOptionMore">\
					</div>';

			if(more==0){
				option = option1;
			}else{
				option = '<div class="row shopOptionMore">'+tableMore+'</div>';
			}

			$('#optionBox').append('\
				<div class="col-12 mb-3 deleteOptionSelectMore numberbox" number="'+number+'">\
					<div class="d-flex flex-column flex-fill  px-lg-4 px-md-4 px-2 py-lg-4 py-md-4 py-4 position-relative" style="background-color: #fafafa;">\
						<div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times closeOptionBox" style="cursor: pointer;" aria-hidden="true"></i></div>\
						<div class="col-12">\
							<h5><strong>ช่วงเวลาที่ <span class="countnumber">'+number+'</span></strong></h5>\
						</div>\
						<div class="col-12">\
							<div class="row">\
								<div class="col-6">\
									<div class="form-group date-start">\
										<label for="date-start-'+number+'" class="col-form-label"><strong class="text-main">วันเริ่มต้น</strong></label>\
										<input type="date" class="form-control" id="date-start-'+number+'" name="data['+number+'][start]">\
									</div>\
								</div>\
								<div class="col-6">\
									<div class="form-group date-end">\
										<label for="date-end-'+number+'" class="col-form-label"><strong class="text-main">วันสิ้นสุด</strong></label>\
										<input type="date" class="form-control" id="date-end-'+number+'" name="data['+number+'][end]">\
									</div>\
								</div>\
							</div>\
						</div>\
						<div class="col-12 shopOption">\
							'+option+'\
						</div>\
					</div>\
				</div>\
			');
			if(more>0){
				updateInput();
			}
		});

		$('#optionBox').on('click','.closeOptionBox',function(){
			$(this).parents('.deleteOptionSelectMore').remove();
			// $( "span.countnumber" ).each(function( index ) {
			// 	$(this).text((index+1));
			// });
			if(more==0){
				$( ".deleteOptionSelectMore" ).each(function( index ) {
					$(this).find('.countnumber').text((index+2));
					$(this).find('.date-start label').attr('for','date-start-'+(index+2));
					$(this).find('.date-start input').attr('id','date-start-'+(index+2)).attr('name','data['+(index+2)+'][start]');
					$(this).find('.date-end label').attr('for','date-end-'+(index+2));
					$(this).find('.date-end input').attr('id','date-end-'+(index+2)).attr('name','data['+(index+2)+'][end]');
					$(this).find('.shopOptionOne .price label').attr('for','price-'+(index+2));
					$(this).find('.shopOptionOne .price input').attr('name','data['+(index+2)+'][price]').attr('id','price-'+(index+2));
					$(this).find('.shopOptionOne .stock label').attr('for','stock-'+(index+2));
					$(this).find('.shopOptionOne .stock input').attr('name','data['+(index+2)+'][stock]').attr('id','stock-'+(index+2));
				});
			}else{
				updateTable();
			}
		});
	</script>
	<script type="text/javascript">
		$('.btnSubmitPreOrder').on('click',function(){
			// alert('click');
			$('#SubmitPreOrder').submit();
		});
		$('#SubmitPreOrder').on('submit',function(){
			// e.preventDefault();
			// alert('submit');
			var formdata = new FormData(this);
			$.ajax({
				url: '/shop/preorder/add',
                data:formdata,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                	if($.trim(data.status) == 'true'){
                        alert('เพิ่มสินค้าสำเร็จ');
                        window.location = '/shop/preorder';
                		// setTimeout(function(){
                		// 	location.reload();
                		// }, 1000);
                	}else{
                		alert('เกิดข้อผิดพลาด');
                	}
                },
                error: function(data) {
                    json = JSON.parse(data.responseText);
                    $loop = true;
                    $textAlert = '';
                    $.each(json['errors'], function( index, value ) {
                    	$textAlert += value + '\n';
                        // $('input[name='+index+'], textarea[name='+index+']').attr('placeholder',value).addClass('placeholderError').val('');
                        if($loop){
                        	$('input[name='+index+'], textarea[name='+index+'], select[name='+index+']').focus();
                        	$loop = false;
                        }
                        $('input[name='+index+'], textarea[name='+index+'], select[name='+index+']').attr('placeholder',value).addClass('placeholderError');
                    });
                    alert($textAlert);
                }
			});
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/fileinput.js" type="text/javascript">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/themes/fa/theme.js" type="text/javascript"></script>
	<script type="text/javascript">
		var res_img;
		var res_img_file;
		var four_number = [];
		var count_index = 0;
		var count_array = [];
		$(document).on("click",".kv-file-remove",function(){
		     res_img = count_array[$('.kv-file-remove').index(this)/2];
		     $('[id="'+res_img+'"]').remove();
		     count_array.splice($('.kv-file-remove').index(this)/2, 1);
		})
		$(document).on("click",".fileinput-remove-button",function(){
		    count_array.forEach(res => {
		        $('[id="'+res+'"]').remove();
		    });
		})
		$("#file-1").fileinput({
	        theme: 'fa',
	        uploadUrl: '{{route('shop.add.myproduct.imgupload')}}',
	        uploadAsync: true,
	        overwriteInitial: false,
	        validateInitialCount: false,
	        showUpload: false, // hide upload button
	        initialPreviewAsData: true,
	        // required: true,


	        maxFilesCount: 8,
	        uploadExtraData: function() {
	            return {
	                _token: $("input[name='_token']").val(),
	            };
	        },
	        deleteExtraData: function() {
	            return {
	                _token: $("input[name='_token']").val(),
	            };
	        },
	        fileActionSettings: {
	            showUpload: false, //This remove the upload button
	            // showRemove: false,
	        },
	        allowedFileExtensions: ['jpg', 'png', 'gif'],
	        browseOnZoneClick: true,
	        // initialPreviewAsData: true,
	        overwriteInitial: false,
	        // maxFileSize: 2000,

	        slugCallback: function(filename) {
	            return filename.replace('(', '_').replace(']', '_');
	        }
	    })
	    .on('fileimageloaded', function(event, previewId) {
	        console.log("fileimageloaded");
	    })
	    .on('filebeforedelete', function() {
	        var aborted = !window.confirm('Are you sure you want to delete this file?');
	        if (aborted) {
	            window.alert('File deletion was aborted! ');
	        };
	        return aborted;
	    })
	    .on('filedeleted', function(event, data, previewId, index) {
				// console.log(`input[name="img_upload[]"][val="${data}"]`);
	        console.log("TRTRTRTRTR");

	        // $("#file-1").fileinput('clear');
	        $("#file-1").text("");
	        console.log($("#file-1").val());
			// $(`input[name="img_upload[]"][value="${data}"]`).remove();

		})
	    .on('fileuploaded', function(event, data, previewId, index,id) {
	        console.log(this)
	        var form = data.form,
	            files = data.files,
	            extra = data.extra,
	            response = data.response,
	            reader = data.reader;
	            res_img = response.uploaded;
	        index++;
	        res_img_file = res_img.substring(0,res_img.lastIndexOf("."));
	        $("body").find("form").append(`<input type="hidden" id="${res_img}" name="img_upload[]" value="${res_img}">`);
	        $("#file-1").text(res_img);
	        $("#file-1").prop('required',false);
	        // console.log(event, data, previewId, index,id)

	        four_number[index] = res_img;

	        count_array.push(four_number[index]);
	        console.log("index ::",index,"new index ::",count_array,"arrayLenght ::",count_array.length)
	        // console.log("count_index ::",count_index = count_index + index)
	        // four_number[index] = res_img
	    })
	    .on("filebatchselected", function(event, data, previewId, index) {
	        var form = data.form,
	            files = data.files,
	            extra = data.extra,
	            response = data.response,
	            reader = data.reader;
	        $("#file-1").fileinput("upload");
	        // console.log("filebatchselected", data);
	    })
	    .on('filesuccessremove', function(event,id,data,a,b) {
	        // var res_img = $(event.target).text()
	        // console.log(event,id,data,a,b)
	        // console.log(event,id,data,a,b)
	        // var form = data.form,
	        //     files = data.files,
	        //     extra = data.extra,
	        //     response = data.response,
	        //     reader = data.reader;
	        //     res_img = response.uploaded;
	        // console.log('id = ' + id + ', index = ' + index);
	        // console.log('id = ' + id + ', event = ' + event);

	        // document.getElementById(res_img).remove()
	        // $(window).on("load", function(){
	            // var el = document.getElementById(res_img);
	            // $('[id="'+res_img+'"]').remove();
	            // console.log('[id="'+res_img+'"]');
	            // console.log(data,"res_img",el)
	        // });
	    })
	</script>

	{{-- more option --}}
	<script type="text/javascript">
		$('#optionDisc button').on('click',function(){
			$('#optionDisc').addClass('d-none');
			$('#optionDiscShow').removeClass('d-none');
		});
		$('.chooseOption').on('click',function(){
			target = $(this).attr('option');
			id = '#optionDisc'+target;
			$('.shopOptionOne').remove();
			if($(this).hasClass('active')){
				$(id).addClass('d-none');
				$(this).removeClass('active');
				more = target-1;
			}else{
				$(id).removeClass('d-none');
				$(this).addClass('active');
				more = target;
			}
			updateTable();
		});
		$('.appendOption').on('keypress keyup','input.updateTable, input.titleTable',function(){
			updateTable();
		});
		$('.addOption').on('click',function(){
			var addOption = $(this).attr('option');

			console.log("addOption", addOption);
			var addOptionHtml = '<div class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left rowDeleteOptionSelect">\
                                    <div class="col-md-2"></div>\
                                    <div class="col-lg-9 col-md-9 col-12">\
                                        <input type="text" class="form-control updateTable dis'+addOption+'" name="dis'+addOption+'[]" autocomplete="off">\
                                    </div>\
                                    <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center">\
										<button class="deleteOptionSelect btn btn-danger btn-sm" type="button">\
											<i type="button" class="fa fa-trash-o"></i>\
										</button>\
                                    </div>\
                                </div>';
            $('#addOptionSelect-'+addOption).append(addOptionHtml);
            updateTable();
		});
		$('.appendOption').on('click','.deleteOptionSelect',function(){
			$(this).parents('.rowDeleteOptionSelect').remove();
			updateTable();
		});
		function updateTable(){
			var title1 = $('input[name="option1"]').val();
			var title2 = $('input[name="option2"]').val();
			var table = '<div class="col-12">\
							<table>\
								<thead>\
									<tr>\
										<td>'+title1+'</td>';
			if(more==2){
				table +='				<td>'+title2+'</td>';
			}
			table +='					<td>ราคา</td>\
										<td>คลัง</td>\
										<td>เลข SKU</td>\
									</tr>\
								</thead>\
								<tbody>';


			$('input.dis1').each(function( index1 ) {
				value1 = $(this);
				if(more==1){
					table +='		<tr>\
										<td>'+value1.val()+'</td>\
										<td>\
											<input type="number" name="data[]['+index1+'][0][price]" class="form-control">\
										</td>\
										<td>\
											<input type="number" name="data[]['+index1+'][0][stock]" class="form-control">\
										</td>\
										<td>\
											<input type="text" name="data[]['+index1+'][0][sku]" class="form-control">\
										</td>\
									</tr>';
				}
				else if(more==2){
					$('input.dis2').each(function( index2 ) {
						value2 = $(this);
						table +='	<tr>\
										<td>'+value1.val()+'</td>\
										<td>'+value2.val()+'</td>\
										<td>\
											<input type="number" name="data_blank_['+index1+']['+index2+'][price]" class="form-control">\
										</td>\
										<td>\
											<input type="number" name="data_blank_['+index1+']['+index2+'][stock]" class="form-control">\
										</td>\
										<td>\
											<input type="text" name="data_blank_['+index1+']['+index2+'][sku]" class="form-control">\
										</td>\
									</tr>';
					});
				}
			});

			table +='			</tbody>\
							</table>\
						</div>';
			tableMore = table;
			$('.shopOptionMore').html(table);
			updateInput();
		}
		function updateInput(){
			$('.numberbox').each(function(){
				number = $(this).attr('number');
				input = $(this).find('input');
				input.each(function(){
					attrInput = $(this).attr('name');
					if (attrInput.indexOf("data_blank_") >= 0){
						newAttrInput = attrInput.replace('data_blank_','data['+number+']');
						$(this).attr('name',newAttrInput);
					}
				})
			});
		}
	</script>

	<script type="text/javascript">
		$('input[name="category_id"]').on('focus', function() {
		    $('.modal#staticBackdrop').modal('toggle')
		})

		$('.modal#staticBackdrop').on('hidden.bs.modal', function(e) {
		    $('.navbar.navbar-inverse').toggleClass('d-none')
		})

		$('.modal#staticBackdrop').on('show.bs.modal', function(e) {
		    $('.navbar.navbar-inverse').toggleClass('d-none')
		})

		$(".sub-list").on('click', function() {
		    $(".sub-list").removeClass('active')
		    // $(this).addClass('active');
		    var c = $('input[name="category"]').val($(this).attr('sub_category_id'))
		    $('input[name="category_id"]').val($('.list-group-item.list-group-item-action.active').text() + " > " + $(this).text())
		    $('.modal#staticBackdrop').modal('toggle')
		    // var head = $('.list-group-item.active').text()

		    // console.log(head)
		})
    </script>

<script src="https://cdn.jsdelivr.net/npm/keillion-dynamsoft-javascript-barcode@0.20201124110923.0/dist/dbr.js"
    data-productKeys="t0068NQAAAAYe5rtv/EEICK+bjDKnHsSZi4eRCBF7rQoo4BhbwBvsLTRt1TobT/J1jN00GtxRIdWW9OLEX3k889MgSuF1n5k=">
</script>
{{-------------------------------------------------------- Barcode Scanner --------------------------------------------}}
<script>
    $(document).ready(function () {
        $('#barcode_btn').on('click', function () {

            let scanner = null;
            (async () => {
                scanner = await Dynamsoft.DBR.BarcodeScanner.createInstance();
                await scanner.setUIElement(document.getElementById('barcodeBodyModalNewPreoder'));
                await scanner.updateVideoSettings({
                    video: {
                        width: {
                            ideal: 460
                        },
                        height: {
                            ideal: 240
                        },
                        facingMode: {
                            ideal: 'environment'
                        }
                    }
                });
                scanner.onFrameRead = results => {
                    console.log(results);
                };

                $('#PreOderADDshowBarcode_no').text('');
                scanner.onUnduplicatedRead = (txt, result) => {

                    console.log(txt);
                    var barcode_input = txt;

                    $('#PreOderADDshowBarcode_no').text(barcode_input);
                    $('#PreOderADDbarcode_input').val(barcode_input);

                    $('#PreOderADDsaveModal').on('click', function () {
                        $('#barcodeModalAddPreoder').modal('hide');
                    });

                };
                await scanner.show();
            })();

        });
    });
</script>
{{-------------------------------------------------------- Barcode Scanner --------------------------------------------}}
@endsection



