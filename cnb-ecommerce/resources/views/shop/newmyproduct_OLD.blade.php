@extends('layouts.shop')
@section('content')

<style>
	.nav-tabs .nav-link {
    	padding: 3px 45px;
	}

	.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
		color: #fff;
		background-color: #346751;
		border-color: #346751;
	}
	.nav-tabs {
		border-bottom: 1px solid #346751;
		padding: 2px;
	}

	.navbar-light .navbar-nav .nav-link:hover, a:hover {
		color: #858585;
		opacity: 0.9;
	}

	.table tr td , .table tr th {
		text-align: center
	}


	body {
    font-family: DB Heavent-medium;
    font-size: 19px;
    font-weight: 300;
    font-stretch: normal;
    font-style: normal;
    line-height: 1;
	}

	@media (min-width: 1200px){
		.modal-xl {
		max-width: 100%;
		height: 100%;
		}
	}

	input[type="file"] {
	display: block;
	}
	.imageThumb {
	max-height: 75px;
	border: 2px solid;
	padding: 1px;
	cursor: pointer;
	}
	.pip {
	display: inline-block;
	margin: 10px 10px 0 0;
	}
	.remove {
	display: block;
	background: #444;
	border: 1px solid black;
	color: white;
	text-align: center;
	cursor: pointer;
	}
	.remove:hover {
	background: white;
	color: black;
	}

</style>
    <style type="text/css">
        /* .main-section{
            margin:0 auto;
            padding: 20px;
            margin-top: 100px;
            background-color: #fff;
            box-shadow: 0px 0px 20px #c1c1c1;
        } */
        .fileinput-remove,
        .fileinput-upload{
            display: none;
        }

		.file-preview {
		border-radius: 5px;
		border: 1px solid #ddd;
		padding: 0;
		width: 100%;
		margin-bottom: 5px;
	}
	.clearfix::after {
		display: block;
		clear: both !important;
		content: "";
	}
    </style>


<!-- Content Here -->
<div class="container-fluid">
	<form action="{{route('shop.add.myproduct')}}" method="POST" enctype="multipart/form-data">
		@csrf
	<h3>เพิ่มสินค้าใหม่</h3>
		<div class="col col-lg-11 col-xs-12 justify-content-center mb-3">
			<div class="card">
				<div class="card-header">
					<label class="font-header">ข้อมูลทั่วไป</label>
				</div>

				<div class="card-body">
						<div class="form-group row">
						  <label for="name" class="col-sm-2 col-form-label">ชื่อสินค้า</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" id="name" name="name">
						  </div>
						</div>

						<div class="form-group row">
							<label for="category_id" class="col-sm-2 col-form-label">หมวดหมู่สินค้า</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" id="category" name="category_id">
							<input type="hidden" class="form-control" name="category">
							</div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-sm-2 col-form-label">รายละเอียดสินค้า</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
							</div>
						</div>

				</div>
			</div>
		</div>


		<div class="col col-lg-11 col-xs-12 justify-content-center mb-3">
			<div class="card">
				<div class="card-header">
					<label class="font-header">ข้อมูลการขาย</label>
				</div>
				<div class="card-body">



					{{-- {{dd($product->product_option)}} --}}
					{{-- @foreach ($product->product_option["sku"] as $key => $value) --}}


					<div class="closeoption">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">ราคา</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="price[]" value=""  autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">คลัง</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="stock[]" value="" autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">รหัสsku</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="sku[]" autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<label for="description" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="button" class="btn btn-block btn-outline-info" openoption="true">เปิดใช้งานตัวเลือกสินค้า <i class="fa fa-plus"></i></button>
							</div>
						</div>
					</div>



					<div class="option d-none">
						<div class="form-group row">
							<label for="description" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="button" option="1" class="btn btn-block btn-outline-success">เพิ่มตัวเลือกที่ 1</button>
							</div>
						</div>

						<div class="option1 d-none">
							<h4>ตัวเลือกที่ 1</h4>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">ชื่อ</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" name="option1" value=""  autocomplete="off">
								</div>
							</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">ตัวเลือก</label>
										<div class="col-sm-10">
										<input type="text" class="form-control" name="dis1[]" autocomplete="off">
										</div>
									</div>
							<div class="form-group row">
								<label for="description" class="col-sm-2 col-form-label"></label>
								<div class="col-sm-10">
									<button type="button" class="btn btn-block btn-outline-info" attr-name="dis1" attr-add="dis1[]">เพิ่มตัวเลือกสินค้า</button>
								</div>
							</div>
						</div>


						<div class="form-group row">
							<label for="description" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="button" option="2" class="btn btn-block btn-outline-success">เพิ่มตัวเลือกที่ 2</button>
							</div>
						</div>


						<div class="option2 d-none">
							<h4>ตัวเลือกที่ 2</h4>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">ชื่อ</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" name="option2" value=""  autocomplete="off">
								</div>
							</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">ตัวเลือก</label>
										<div class="col-sm-10">
										<input type="text" class="form-control" name="dis2[]" autocomplete="off">
										</div>
									</div>
							<div class="form-group row">
								<label for="description" class="col-sm-2 col-form-label"></label>
								<div class="col-sm-10">
									<button type="button" class="btn btn-block btn-outline-info" attr-name="dis2"  attr-add="dis2[]">เพิ่มตัวเลือกสินค้า</button>
								</div>
							</div>
						</div>

					</div>








					<div class="form-group row table-option d-none" >
						<label class="col-sm-2 col-form-label">รายการตัวเลือกสินค้า</label>
						<div class="col-sm-10">
							<div id="table"></div>
							{{-- <table class="table table-striped table-bordered">
								<thead>
									<tr>
									  <th scope="col"></th>

									  <th scope="col"></th>

									  <th scope="col">ราคา</th>
									  <th scope="col">คลัง</th>
									  <th scope="col">เลข SKU</th>
									</tr>
								  </thead>
								  <tbody>
										<tr>
											<td scope="col"></td>
											<td scope="col"></td>
											<td><input type="text" class="form-control text-right" name="price[]" required></td>
											<td><input type="text" class="form-control text-right" name="stock[]" required></td>
											<td><input type="text" class="form-control text-right" name="sku[]" required></td>
										</tr>
										<tr>
											<td scope="col"></td>
											<td scope="col"></td>
											<td><input type="text" class="form-control" name="price[] text-right" required></td>
											<td><input type="text" class="form-control" name="stock[] text-right"  required></td>
											<td><input type="text" class="form-control" name="sku[] text-right"  required></td>
										</tr>
								  </tbody>
							</table> --}}
						</div>
					</div>


				</div>
			</div>
		</div>


		<div class="col col-lg-11 col-xs-12 justify-content-center mb-3">
			<div class="card">
				<div class="card-header">
					<label class="font-header">รูปภาพและวิดีโอ</label>
				</div>
				<div class="card-body">
					{{-- <div class="row">
						<div class="col-12">
							<div class="field" align="left">
								<h3>Upload your images</h3>
								<input type="file" id="files" name="files[]" multiple />
							</div>
						</div>
					</div> --}}

					<div class="row">
						<div class="col-lg-12 col-sm-12 col-12 main-section">
								{{-- {!! csrf_field() !!} --}}
								<div class="form-group">
									<div class="file-loading">
										<input id="file-1" type="file" name="file" multiple class="file" accept="image/*" data-overwrite-initial="false" data-min-file-count="1">
									</div>
								</div>

						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="col col-lg-11 col-xs-12 justify-content-center mb-3">
			<div class="card">
				<div class="card-header">
					<label class="font-header">การจัดส่ง</label>
				</div>
				<div class="card-body">

					<div class="form-group row">
						<label for="product_weight" class="col-sm-2 col-form-label">น้ำหนัก (กรัม)</label>
						<div class="col-sm-9">
						<input type="number" class="form-control" id="product_weight" name="product_weight" value="">
						</div>
					</div>

					<div class="form-group row">
						<label for="product_lwh" class="col-sm-2 col-form-label">ขนาดพัสดุ (เซนติเมตร)</label>
						<div class="col-sm-3">
							<input type="number" class="form-control mb-2" id="product_lwh" value="" name="product_L" placeholder="กว้าง">
						</div>
						<div class="col-sm-3">
							<input type="number" class="form-control mb-2" id="product_lwh" value="" name="product_W" placeholder="ยาว">
						</div>
						<div class="col-sm-3">
							<input type="number" class="form-control mb-2" id="product_lwh" value="" name="product_H" placeholder="สูง">
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="col col-lg-11 col-xs-12 justify-content-center pb-5">
			<div class="col col-lg-4 col-xs-12 px-0 float-right">
				<button type="submit" class="btn btn-primary btn-block float-right" >บันทึก</button>
			</div>
		</div>
	</form>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 8500">
	<div class="modal-dialog modal-xl">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="staticBackdropLabel">หมวดหมู่สินค้า</h5>
		  {{-- <button type="button" class="btn btn-secondary pull-right" >เลือก</button> --}}
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col col-xs-6 col-lg-4">
				  <div class="list-group" id="list-tab" role="tablist">
					  @foreach ($catogorys as $catogory)
						<a class="list-group-item list-group-item-action" id="list-{{$catogory->category_id}}-list" data-toggle="list" href="#list-{{$catogory->category_id}}" role="tab" aria-controls="{{$catogory->category_id}}">{{$catogory->category_name}}</a>
					  @endforeach
				  </div>
				</div>
				<div class="col col-xs-6 col-lg-8">
				  <div class="tab-content" id="nav-tabContent">
					@foreach ($catogorys as $catogory)
					<div class="tab-pane fade" id="list-{{$catogory->category_id}}" role="tabpanel" aria-labelledby="list-{{$catogory->category_id}}-list">
							@foreach ($catogory->subcategorys as $sub)
								<a class="list-group-item list-group-item-action sub-list" sub_category_id="{{$sub->sub_category_id}}">{{$sub->sub_category_name}}</a>
							@endforeach

					</div>
					@endforeach
				  </div>
				</div>
			  </div>
		</div>
	  </div>
	</div>
  </div>


@endsection


@section('script')
<script>
	let  option_count = 1;

$('button[attr-add]').on('click', function (e) {
	var _this = $(this)
	// alert(_this.attr("attr-name"))
	const last_el = $(this).parent().parent().prev()
	const input = `<div id="${option_count}" class="form-group row">
						<label class="col-sm-2 col-form-label"></label>
						<div class="col-sm-9">
						<input type="text" class="form-control" name="${$(this).attr('attr-add')}" autocomplete="off">
						</div>
						<div class="col-sm-1">
						<button type="button" class="btn btn-block btn-outline-danger" attr-name="dis2"  attr-add="dis2[]" onclick="clearoption($(this).parent().parent().attr('id'))" ">ลบ</button>
						</div>
					</div>`

	last_el.after(input)
	table_content()
	option_count = option_count+1
});

function clearoption (option_count) {

var element = document.getElementById(option_count);
element.remove();
table_content()

}


	$('button[openoption').on('click' ,function (e) {
		const _this = $(this)
		$(".option").toggleClass('d-none')
		$(".closeoption").toggleClass('d-none')
		$(".table-option").toggleClass('d-none')
		$('input[name="price[]"]').eq(0).attr('disabled', 'true')
		$('input[name="stock[]"]').eq(0).attr('disabled', 'true')

	})

	$('button[option]').on('click', function (e) {
		$(`.option${$(this).attr('option')}`).toggleClass('d-none')

		table_content();
	})

	function table_content(){

		var options = ["option1","option2"]
		var theads = ["emp", "emp", "ราคา", "คลัง", "เลข SKU"];
		var theads_key = ["emp", "emp", "price", "stock", "sku"];
		var dis = []
		var sum = 0;
		var loop = 1;
		$.each(options, function (indexInArray, valueOfElement) {
			if(!$(`.option${indexInArray+1}`).hasClass('d-none')) {
				dis[indexInArray] =  $(`input[name="dis${indexInArray+1}[]"]`).length
				theads[indexInArray] = $(`input[name="option${indexInArray+1}"]`).val()
			} else {
				dis[indexInArray] = 1
			}

			loop *= dis[indexInArray]
		});

		var option1_index = []
		var c = 0;
		for (let index = 0; index < loop; index++) {
			if (  index % dis[1] == 0 && index > 0){c++}
			console.log(dis[0]);
			option1_index[index] = $('input[name="dis1[]"]').eq(c).val()
		}

		var option2_index = []
		var c = 0;
		for (let index = 0; index < loop; index++) {
			if (  index % dis[1] == 0){c = 0}
			option2_index[index] = $('input[name="dis2[]"]').eq(c).val()
			c++
		}

		var thead_html = `<table class="table table-striped table-bordered"><thead><tr>`
		$.each(theads, function (indexInArray, valueOfElement) {
			if (valueOfElement != "emp")
			thead_html += `<th>${valueOfElement}</th>`
		})
		thead_html += `</thead>`
		thead_html += `<tbody>`


		for (let index = 0; index < loop; index++) {
			thead_html += "<tr>"
				$.each(theads, function (indexInArray, valueOfElement) {
					if (valueOfElement != "emp")
						if(indexInArray > 1) {
							thead_html += `<td><input type="text" class="form-control text-right" name="${theads_key[indexInArray]}[]" required></td>`

						}else {
							if (indexInArray === 0){
								thead_html += `<td class="bind-${option1_index[index]}">${option1_index[index]}</td>`
							}else {
								thead_html += `<td class="bind2-${option2_index[index]}">${option2_index[index]}</td>`
							}
						}
				})
			thead_html += "</tr>"
		}


		$("#table").html(thead_html)

	}


	$('input[name="option1"]').on('keyup keypress blur change', function(e){
		$("#table thead tr th").eq(0).text($(this).val())
	})

	$('input[name="option2"]').on('keyup keypress blur change', function(e){
		$("#table thead tr th").eq(1).text($(this).val())
	})


	$(document).on('keyup keypress blur change' , 'input[name="dis1[]"]'  , function(e){
		table_content()
	})


	$(document).on('keyup keypress blur change' , 'input[name="dis2[]"]'  , function(e){
		table_content()
	})

	$('input[name="category_id"]').on('focus', function(){
		$('.modal#staticBackdrop').modal('toggle')
	})

	$('.modal#staticBackdrop').on('hidden.bs.modal', function (e) {
		$('.navbar.navbar-inverse').toggleClass('d-none')
	})

	$('.modal#staticBackdrop').on('show.bs.modal', function (e) {
		$('.navbar.navbar-inverse').toggleClass('d-none')
	})

	$(".sub-list").on('click', function(){
		$(".sub-list").removeClass('active')
		$(this).addClass('active');
		$('input[name="category"]').val($(this).attr('sub_category_id'))
		$('input[name="category_id"]').val($('.list-group-item.list-group-item-action.active').text() +" > "+ $(this).text())
		$('.modal#staticBackdrop').modal('toggle')

	})


	$(document).ready(function () {
		// $('.modal#staticBackdrop').modal('toggle')
	});

	$(document).ready(function() {
		if (window.File && window.FileList && window.FileReader) {
			$("#files").on("change", function(e) {
			var files = e.target.files,
				filesLength = files.length;
			for (var i = 0; i < filesLength; i++) {
				var f = files[i]
				var fileReader = new FileReader();
				fileReader.onload = (function(e) {
				var file = e.target;
				var image_html = "<span class=\"pip\">" +
					"<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
					"<br/><span class=\"remove\">Remove image</span>" +
					"</span>";
				console.log( $("input[name]files[]") );
				$(image_html).insertAfter("#files");
				$(".remove").click(function(){
					$(this).parent(".pip").remove();
				});

				// Old code here
				/*$("<img></img>", {
					class: "imageThumb",
					src: e.target.result,
					title: file.name + " | Click to remove"
				}).insertAfter("#files").click(function(){$(this).remove();});*/

				});
				fileReader.readAsDataURL(f);
			}
			});
		} else {
			alert("Your browser doesn't support to File API")
		}
		});


</script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: '{{route('shop.add.myproduct.imgupload')}}',
			uploadAsync: true,
			// overwriteInitial: false,
			validateInitialCount: false,
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            showUpload: false, // hide upload button
            browseOnZoneClick: true,
            // initialPreviewAsData: true,
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
		})
		.on('fileimageloaded', function(event, previewId) {
			console.log("fileimageloaded");
		})
		.on('filebeforedelete', function() {
			var aborted = !window.confirm('Are you sure you want to delete this file?');
			if (aborted) {
				window.alert('File deletion was aborted! ' + krajeeGetCount('file-5'));
			};
			return aborted;
		}).on('filedeleted', function() {
			setTimeout(function() {
				window.alert('File deletion was successful! ' + krajeeGetCount('file-5'));
			}, 900);
		})
		.on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
			response = data.response, reader = data.reader;
			$("body").find("form").append(`<input type="hidden" name="img_upload[]" value="${response.uploaded}">`);
		})
        .on("filebatchselected", function(event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra,
			response = data.response, reader = data.reader;
            $("#file-1").fileinput("upload");
            console.log("filebatchselected",data);
        });




    </script>

@endsection


