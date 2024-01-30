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
			<h3><strong>แก้ไขสินค้า</strong></h3>
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
							<input type="text" class="form-control" id="title" placeholder="ชื่อสินค้า" name="title" value="{{ $product->name }}">
						</div>
					</div>
				</div>

				<div class="col-12">
                    <div class="form-group row">
                        <label for="inputNameProduct-2"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                style="color: #c45e9f;">หมวดหมู่สินค้า</strong></label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control is-invalid" id="category" name="category_id" value="{{ $category[0]->category_name ." > " . $sub_category[0]->sub_category_name}}"
                                required>
                            <input type="hidden" class="form-control" name="category"  value="{{$product->sub_category_id}}">

                        </div>
                    </div>
                </div>
				<div class="col-12">
					<div class="form-group row ">
						<label for="detail" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #c45e9f;">รายละเอียดสินค้า</strong></label>
						<div class="col-sm-10">
							<textarea class="form-control" id="detail" rows="10" placeholder="รายละเอียดสินค้า" name="detail">{{$product->description}}</textarea>
						</div>
					</div>
                </div>


                <div class="col-12">
                        <div class="form-group row was-validated">
                            <label for="inputNameProduct-3" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                    style="color: #c45e9f;">บาร์โค้ด (Barcode)</strong></label>
                            <div class="col-sm-10">
                                <input type="number" name="barcode" id="PreOderEditbarcode_input" maxlength="13"
                                @if($product->barcode)
                                    value="{{$product->barcode}}"
                                @endif>
                                <button style="margin-right: 1%;" class="btn btn-c75ba1" type="button" id="barcode_btn" data-toggle="modal"
                                    data-target="#barcodeModalEditPreOrder">Scan Barcode</button>
                                {{-- <span><span style="color:red;">*</span><b>คำแนะนำ : </b> ตรวจสอบเลข Barcode ของสินค้าเพื่อความถูกต้อง</span> --}}
                                    <br>
                                    <span><span style="color:red;">*</span><b>คำแนะนำ : </b> สามารถแก้ไขเลข Barcode ของสินค้าเพิ่มเติมได้ เพื่อความถูกต้องของตัวเลข</span>
                            </div>
                        </div>
                    </div>

			</div>
        </div>

<!-- Barcode -->
<div class="modal fade" id="barcodeModalEditPreOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
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
                <b> Barcode NO : <span id="showEditBarcode_no"></span></b>

                <div id="barcodeBodyModalEditPreoder">
                    <video class="dbrScanner-video" playsinline="true"></video>
                </div>

                <br>
                <span>วิธีใช้ : วางสินค้าที่มีพื้นหลังสีพื้น เช่น ขาว หรือ ดำ</span>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="button" id="PreOderEditsaveModal" class="btn btn-primary">Save changes</button>
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
							@include('shop.shop_pre_order_edit_vue')
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
                                    <input id="file-1" type="file" name="file" multiple class="file" data-overwrite-initial="false" accept="image/*"
                                       data-min-file-count="1" required>
                                </div>
                            </div>

                        </div>
					</div>
					@foreach ($product->preOrder_option as $key1 => $item)
						@foreach ($item['datetime_range'] as $key2 => $value)
							@foreach ($value['amount_limit'] as $key3 => $value1)
								<input type="hidden" name="data[{{$key2}}][amount_limit][{{$key3}}]" value="{{$value1}}">
							@endforeach
						@endforeach
					@endforeach
					@if ($product->product_img)
						@foreach ($product->product_img as $item)
							<input type="hidden" name="img_upload[]" value="{{$item}}">
						@endforeach
					@endif
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
		var imgs = []
		var imgs_initialPreviewConfig = []
	</script>

	@if ($product->product_img)
		@foreach ($product->product_img as $item)
			<script>
				imgs.push(`<img class='kv-preview-data file-preview-image' id="img_db" src="/img/product/{{$item}}">`)
				imgs_initialPreviewConfig.push({
					caption: '{{$item}}', width: "120px",
					url: '/shop/myproduct/edit/imgupload/delete/{{$item}}',
					key: '{{$item}}',
					// extra: {
					// 	item: '{{$item}}',
					// 	_token: $("input[name='_token']").val()
					// }
				})
			</script>
		@endforeach
	@endif


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
				url: '/shop/preorder/edit/{{$product->id}}',
                data:formdata,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                	if($.trim(data.status) == 'true'){
                		alert('แก้ไขสินค้าสำเร็จ');
                		// setTimeout(function(){
                		// 	location.reload();
                        // }, 1000);
                        window.location = '/shop/preorder';
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
                await scanner.setUIElement(document.getElementById('barcodeBodyModalEditPreoder'));
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

                $('#showEditBarcode_no').text('');
                scanner.onUnduplicatedRead = (txt, result) => {

                    console.log(txt);
                    var barcode_input = txt;

                    $('#showEditBarcode_no').text(barcode_input);
                    $('#PreOderEditbarcode_input').val(barcode_input);

                    $('#PreOderEditsaveModal').on('click', function () {
                        $('#barcodeModalEditPreOrder').modal('hide');
                    });

                };
                await scanner.show();
            })();
        });
    });
</script>
{{-------------------------------------------------------- Barcode Scanner --------------------------------------------}}




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
	        // overwriteInitial: false,
	        validateInitialCount: false,
	        showUpload: false, // hide upload button
	        // initialPreviewAsData: true,
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
	        }, overwriteInitial: false,
			validateInitialCount: true,
			initialPreview: imgs,
			initialPreviewConfig: imgs_initialPreviewConfig,
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



	{{-- vue --}}
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
	<script type="text/javascript">
		@php
			$option1 = $product->preOrder_option[0]["option1"];
			$option2 = $product->preOrder_option[0]["option2"];
			$dis1 = $product->preOrder_option[0]["dis1"];
			$dis2 = $product->preOrder_option[0]["dis2"];
			$sku = $product->preOrder_option[0]["sku"];
			$datetime_range = $product->preOrder_option[0]["datetime_range"];
		@endphp
		var vm = new Vue({
			el: '#app',
		  	data: {
		  		number : 0,
		  		option1 : '{{ $option1 }}',
		  		option2 : '{{ $option2 }}',
		  		dis1 : [
		  			@foreach ($dis1 as $element)
		  				"{{ $element }}",
		  			@endforeach
		  		],
		  		dis2 : [
		  			@foreach ($dis2 as $element)
		  				"{{ $element }}",
		  			@endforeach
		  		],
				sku : [
					{
						@php
							$index = 0;
						@endphp
						@foreach ($dis1 as $key_dis1 => $data_dis1)
							'{{ $key_dis1 }}' : [
								@foreach ($dis2 as $key_dis2 => $data_dis2)
									{
										'{{ $key_dis2 }}' : '{{ $sku[$index] }}',
										@php
											$index++;
										@endphp

									},
								@endforeach
							],
						@endforeach
					}
		  		],
		  		datetime : [
		  			@foreach ($datetime_range as $element)
		  				{
		  					start_date : "{{ date('Y-m-d',strtotime($element['start_date'])) }}",
		  					end_date : "{{ date('Y-m-d',strtotime($element['end_date'])) }}",
		  					price : {
			  					@php
			  						$index = 0;
			  					@endphp
		  						@foreach ($dis1 as $key_dis1 => $data_dis1)
			  						'{{ $key_dis1 }}' : [
				  						@foreach ($dis2 as $key_dis2 => $data_dis2)
						  					{
					  							'{{ $key_dis2 }}' : '{{ $element['price'][$index] }}',
					  							@php
					  								$index++;
					  							@endphp

						  					},
				  						@endforeach
				  					],
		  						@endforeach
		  					},
							stock : {
			  					@php
			  						$index = 0;
			  					@endphp
		  						@foreach ($dis1 as $key_dis1 => $data_dis1)
			  						'{{ $key_dis1 }}' : [
				  						@foreach ($dis2 as $key_dis2 => $data_dis2)
						  					{
					  							'{{ $key_dis2 }}' : '{{ $element['stock'][$index] }}',
					  							@php
					  								$index++;
					  							@endphp

						  					},
				  						@endforeach
				  					],
		  						@endforeach
		  					},
		  				},
		  			@endforeach
		  		],

		  	},
		  	methods:{
		  		addOption1:function(){
		  			this.dis1.push("");
					_this = this;

					var option1Number = _this.dis1.length - 1;
					$.each(_this.datetime, function(key, value) {
						_this.datetime[key].price[option1Number] = [];
						_this.datetime[key].stock[option1Number] = [];

						for(let i=0; i < _this.dis2.length; i++){
							var valBlank = {};
							valBlank[i] = "0";
							_this.datetime[key].price[option1Number].push(valBlank);
							_this.datetime[key].stock[option1Number].push(valBlank);
						}

					});

					_this.sku[0][option1Number] = [];

					for(let i=0; i < _this.dis2.length; i++){
						var valBlank = {};
						valBlank[i] = "";
						_this.sku[0][option1Number].push(valBlank);
					}
		  		},
		  		addOption2:function(){
		  			this.dis2.push("");
		  			_this = this;

				  	var option2Number = _this.dis2.length - 1;
		  			$.each(_this.datetime, function(key, value) {
			  			$.each(value.price, function(key2, value2) {
					     	console.log("option2Number", option2Number);
					     	const arrayBlank = Array();
							var valBlank = {};
							valBlank[option2Number] = "0";
							arrayBlank.push(valBlank);

						  	_this.datetime[key].price[key2] = value2.concat(arrayBlank);
					   	});
				   	});

					$.each(_this.datetime, function(key, value) {
			  			$.each(value.stock, function(key2, value2) {
					     	const arrayBlank = Array();
							var valBlank = {};
							valBlank[option2Number] = "0";
							arrayBlank.push(valBlank);

						  	_this.datetime[key].stock[key2] = value2.concat(arrayBlank);
					   	});
				   	});

					$.each(_this.sku[0], function(key, value) {
						const arrayBlank = Array();
						var valBlank = {};
						valBlank[option2Number] = "";
						arrayBlank.push(valBlank);

						_this.sku[0][key] = value.concat(arrayBlank);
					});
		  		},
				addDatetime:function(){
					_this = this;
					var val = {};
					val["start_date"] = "";
					val["end_date"] = "";
					var price = {};
					var stock = {};
					for(let i = 0; i < _this.dis1.length; i++){
						price[i] = [];
						stock[i] = [];
						for(let j=0; j < _this.dis2.length; j++){
							var valBlank = {};
							valBlank[j] = "0";
							price[i].push(valBlank);
							stock[i].push(valBlank);
						}
					}
					val["price"] = price;
					val["stock"] = stock;
					_this.datetime.push(val);
				},
				delOption1:function(key){
					this.dis1.splice(key,1);
					_this = this;
					$.each(_this.datetime, function(key1, value) {
						Vue.delete(this.price, key);
						var price = {};
						$.each(value.price, function(key2, value2) {
							if (key2 < key) {
								price[key2] = value2;
							}
							else{
								var newKey = key2 - 1;
								price[newKey] = value2;
							}
						});
						this.price = price;
					});

					$.each(_this.datetime, function(key1, value) {
						Vue.delete(this.stock, key);
						var stock = {};
						$.each(value.stock, function(key2, value2) {
							if (key2 < key) {
								stock[key2] = value2;
							}
							else{
								var newKey = key2 - 1;
								stock[newKey] = value2;
							}
						});
						this.stock = stock;
					});

					Vue.delete(_this.sku[0], key);
					var sku = {};
					$.each(_this.sku[0], function(key1, value1) {
						if (key1 < key) {
							sku[key1] = value1;
						}
						else{
							var newKey = key1 - 1;
							sku[newKey] = value1;
						}
					});
					_this.sku[0] = sku;
				},
				delOption2:function(key){
					this.dis2.splice(key,1);
					_this = this;
					$.each(_this.datetime, function(key1, value) {
						$.each(value.price, function(key2, value2) {
							_this.datetime[key1].price[key2].splice(key,1);
						});
					});
					$.each(_this.datetime, function(key1, value) {
						$.each(value.price, function(key2, value2) {
							let loopKey = 0;
							let arrNewKey = Array()
							$.each(value2, function(key3, value3) {
								$.each(value3, function(key4, value4) {
									var valBlank = {};
									valBlank[loopKey] = value4;
									loopKey++;
									arrNewKey.push(valBlank);
								});
							});
							_this.datetime[key1].price[key2] = arrNewKey;
						});
					});

					$.each(_this.datetime, function(key1, value) {
						$.each(value.stock, function(key2, value2) {
							_this.datetime[key1].stock[key2].splice(key,1);
						});
					});
					$.each(_this.datetime, function(key1, value) {
						$.each(value.stock, function(key2, value2) {
							let loopKey = 0;
							let arrNewKey = Array()
							$.each(value2, function(key3, value3) {
								$.each(value3, function(key4, value4) {
									var valBlank = {};
									valBlank[loopKey] = value4;
									loopKey++;
									arrNewKey.push(valBlank);
								});
							});
							_this.datetime[key1].stock[key2] = arrNewKey;
						});
					});

					$.each(_this.sku[0], function(key1, value1) {
						_this.sku[0][key1].splice(key,1);
					});
					$.each(_this.sku[0], function(key1, value1) {
						let loopKey = 0;
						let arrNewKey = Array()
						$.each(value1, function(key2, value2) {
							$.each(value2, function(key3, value3) {
								var valBlank = {};
								valBlank[loopKey] = value3;
								loopKey++;
								arrNewKey.push(valBlank);
							});
						});
						_this.sku[0][key1] = arrNewKey;
					});
				},
				delDatetime:function(key){
					console.log(key);
					this.datetime.splice(key,1);
				},
		  	}
		})
	</script>


























@endsection








