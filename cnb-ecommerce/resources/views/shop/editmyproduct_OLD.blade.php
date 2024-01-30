@extends('layouts.shop')
@section('content')

<style>
	.nav-tabs .nav-link {
    	padding: 3px 45px;
	}

	.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
		color: #fff;
		background-color: #c75ba1;
		border-color: #c75ba1;
	}
	.nav-tabs {
		border-bottom: 1px solid #c75ba1;
		padding: 2px;
	}

	.navbar-light .navbar-nav .nav-link:hover, a:hover {
		color: #858585;
		opacity: 0.9;
	}

	.table tr td , .table tr th {
		text-align: center
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


	body {
    font-family: DB Heavent-medium;
    font-size: 19px;
    font-weight: 300;
    font-stretch: normal;
    font-style: normal;
    line-height: 1;
	}
</style>

@php
	// // $arr = $product->product_option["dis1"][5] = "";

	// $arr = [];
	// foreach ($product->product_option["dis1"] as  $value) {
	// 	array_push($arr , $value);
	// }
	// array_push($arr , "");

@endphp
{{-- {{dd($product->product_option["sku"][0])}} --}}



<!-- Content Here -->
<div class="container-fluid">
	<form action="{{route('update.myproduct', ['id'=> $product->id])}}" method="POST">
		@csrf
		@method('put')
	<h2>สินค้าของฉัน</h2>
		<div class="col col-lg-11 col-xs-12 justify-content-center mb-3">
			<div class="card">
				<div class="card-header">
					<label class="font-header">ข้อมูลทั่วไป</label>
				</div>

				<div class="card-body">
						<div class="form-group row">
						  <label for="name" class="col-sm-2 col-form-label">ชื่อสินค้า</label>
						  <div class="col-sm-10">
						  <input type="text" class="form-control" name="name" value="{{$product->name}}">
						  </div>
						</div>

						<div class="form-group row">
							<label for="category_id" class="col-sm-2 col-form-label">หมวดหมู่สินค้า</label>
							<div class="col-sm-10">
                            <input type="text" class="form-control" id="category_id" name="category_id" value="{{$product->category_id}}">

                            <input type="hidden" class="form-control" name="category" value="{{$product->sub_category_id}}">

							</div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-sm-2 col-form-label">รายละเอียดสินค้า</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$product->description}}</textarea>
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
					@php
						$option_key1 = $product->product_option["option1"];
						$option_key2 = $product->product_option["option2"];

						// $option_key2[0] = "default";

						$option_value1 = $product->product_option["dis1"];
						$option_value2 = $product->product_option["dis2"];

						$i = 0;
						$j = 0;

						// $option_value2[0] = "default";
					@endphp
					{{-- {{dd($product->product_option)}} --}}
					{{-- @foreach ($product->product_option["sku"] as $key => $value) --}}
					@if ($option_value1[0] != "default")
					<h4>ตัวเลือกที่ 1</h4>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">ชื่อ</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="option1" value="{{$option_key1}}"  autocomplete="off">
							</div>
						</div>
							@foreach ($option_value1 as $value1)
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">{{ ($loop->iteration === 1)? 'ตัวเลือก':'' }}</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" name="dis1[]" value="{{$value1}}" autocomplete="off">
									</div>
								</div>
							@endforeach
						<div class="form-group row">
							<label for="description" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="button" class="btn btn-block btn-outline-info" attr-name="dis1" attr-add="dis1[]">เพิ่มตัวเลือกสินค้า</button>
							</div>
						</div>
					@endif

					@if ($option_value2[0] != "default")
					<h4>ตัวเลือกที่ 2</h4>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">ชื่อ</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="option2" value="{{$option_key2}}"  autocomplete="off">
							</div>
						</div>
							@foreach ($option_value2 as $value2)
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">{{ ($loop->iteration === 1)? 'ตัวเลือก':'' }}</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" name="dis2[]" value="{{$value2}}" autocomplete="off">
									</div>
								</div>
							@endforeach
						<div class="form-group row">
							<label for="description" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="button" class="btn btn-block btn-outline-info" attr-name="dis2"  attr-add="dis2[]">เพิ่มตัวเลือกสินค้า</button>
							</div>
						</div>
					@endif



					@if ($option_value1[0] === "default่")
					<div class="form-group row">
						<label for="description" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<button class="btn btn-block btn-outline-success">เพิ่มตัวเลือกที่ 1</button>
						</div>
					</div>
					@endif

					@if ($option_value2[0] === "default")
					<div class="form-group row">
						<label for="description" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<button class="btn btn-block btn-outline-success">เพิ่มตัวเลือกที่ 2</button>
						</div>
					</div>
					@endif


					<div class="form-group row">
						<label class="col-sm-2 col-form-label">รายการตัวเลือกสินค้า</label>
						<div class="col-sm-10">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
									  @if ($option_value1[0] != "default")
									  <th scope="col">{{$option_key1}}</th>
									  @endif

									  @if ($option_value2[0] != "default")
									  <th scope="col">{{$option_key2}}</th>
									  @endif

									  <th scope="col">ราคา</th>
									  <th scope="col">คลัง</th>
									  <th scope="col">เลข SKU</th>
									</tr>
								  </thead>
								  <tbody>

									@if ($option_value1[0] != "default" && $option_value2[0] != "default")
										@foreach ($option_value1 as $value1)
												@foreach ($option_value2 as $value2)
											<tr>
												@if ($option_value1[0] != "default")
													<td scope="col">{{$value1}}</td>
												@endif

												@if ($option_value2[0] != "default")
													<td scope="col">{{$value2}}</td>
												@endif

													<td><input type="text" class="form-control text-right" name="price[]" value="{{$product->product_option['price'][$i]}}" required></td>
													<td><input type="text" class="form-control text-right" name="stock[]" value="{{$product->product_option['stock'][$i]}}" required></td>
													<td><input type="text" class="form-control text-right" name="sku[]" value="{{$product->product_option['sku'][$i++]}}" required></td>
											</tr>
												@endforeach
										@endforeach
									@endif


									@if ($option_value1[0] != "default" && $option_value2[0] == "default")
										@foreach ($option_value1 as $value1)
											<tr>
												@if ($option_value1[0] != "default")
													<td scope="col">{{$value1}}</td>
												@endif

												@if ($option_value2[0] != "default")
													<td scope="col">{{$value2}}</td>
												@endif
													<td><input type="text" class="form-control" name="price[] text-right" value="{{$product->product_option['price'][$i]}}" required></td>
													<td><input type="text" class="form-control" name="stock[] text-right" value="{{$product->product_option['stock'][$i]}}" required></td>
													<td><input type="text" class="form-control" name="sku[] text-right" value="{{$product->product_option['sku'][$i++]}}" required></td>
											</tr>
										@endforeach
									@endif

								  </tbody>
							</table>
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
						<div class="col-3">

							@if ($product->product_img=='0'|| $product->product_img==null)
								<img style="
								width:  100%;
								height: 60%;
								margin-bottom:5%;
								object-fit: cover;" src="/img/no_image.png" alt="">
								@else
								<img style="
								width:  100%;
								height: 60%;
								margin-bottom:5%;
								object-fit: cover;"
								src="/img/product/{{$product->product_img}}"
							alt="">
								@endif

						</div>

					</div> --}}
					<div class="row">
						<div class="col-lg-12 col-sm-12 col-12 main-section">
								{{-- {!! csrf_field() !!} --}}
								<div class="form-group">
									<div class="file-loading">
										<input id="file-1" type="file" name="file" multiple class="file" accept="image/*" data-overwrite-initial="false" data-min-file-count="0">
									</div>
								</div>

						</div>
					</div>



					@if ($product->product_img)
						@foreach ($product->product_img as $item)
							<input type="hidden" name="img_upload[]" value="{{$item}}">
						@endforeach
					@endif



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
						<input type="text" class="form-control" id="product_weight" name="product_weight" value="{{$product->product_weight}}">
						</div>
					</div>

					<div class="form-group row">
						<label for="product_lwh" class="col-sm-2 col-form-label">ขนาดพัสดุ (เซนติเมตร)</label>
						<div class="col-sm-3">
							<input type="text" class="form-control mb-2" id="product_lwh" name="product_L" value="{{$product->product_L}}" placeholder="กว้าง">
						</div>
						<div class="col-sm-3">
							<input type="text" class="form-control mb-2" id="product_lwh" name="product_W" value="{{$product->product_W}}" placeholder="ยาว">
						</div>
						<div class="col-sm-3">
							<input type="text" class="form-control mb-2" id="product_lwh" name="product_H" value="{{$product->product_H}}" placeholder="สูง">
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="col col-lg-11 col-xs-12 justify-content-center pb-5">
			<div class="col col-lg-4 col-xs-12 px-0 float-right">
				<button type="submit" class="btn btn-primary btn-block float-right">บันทึก</button>
			</div>
		</div>
	</form>
</div>


<div id="app">
    <parent-component inline-template>
        <ul>
            @foreach(range(1, 3) as $i)
                <child-component index="{{ $i }}" :value="value" @mounted="handleChildMounted"></child-component>
            @endforeach
        </ul>
    </parent-component>
</div>

<script>
	var imgs = []
	var imgs_initialPreviewConfig = []
</script>
@if ($product->product_img)
	@foreach ($product->product_img as $item)
		<script>
			imgs.push(`<img class='kv-preview-data file-preview-image' src="/img/product/{{$item}}">`)
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


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 8500">
	<div class="modal-dialog modal-xl">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="staticBackdropLabel">หมวดหมู่สินค้า</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col col-xs-6 col-lg-4">
				  <div class="list-group" id="list-tab" role="tablist">
					  @foreach ($catogorys ?? '' as $catogory)
						<a class="list-group-item list-group-item-action" id="list-{{$catogory->category_id}}-list" data-toggle="list" href="#list-{{$catogory->category_id}}" role="tab" aria-controls="{{$catogory->category_id}}">{{$catogory->category_name}}</a>
					  @endforeach
				  </div>
				</div>
				<div class="col col-xs-6 col-lg-8">
				  <div class="tab-content" id="nav-tabContent">
					@foreach ($catogorys ?? '' as $catogory)
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
{{-- end model --}}



@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script>
console.log(imgs);

	var krajeeGetCount = function(id) {
			var cnt = $('#' + id).fileinput('getFilesCount');
			return cnt === 0 ? 'You have no files remaining.' :
            'You have ' +  cnt + ' file' + (cnt > 1 ? 's' : '') + ' remaining.';
    };

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
			deleteExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            showUpload: false, // hide upload button
            browseOnZoneClick: true,
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
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
				// window.alert('File deletion was aborted! ' + krajeeGetCount('file-1'));
			};
			return aborted;
		}).on('filedeleted', function(event, data, previewId, index) {
			// console.log(`input[name="img_upload[]"][val="${data}"]`);
			$(`input[name="img_upload[]"][value="${data}"]`).remove();
			// setTimeout(function() {
			// 	window.alert('File deletion was successful! ' + krajeeGetCount('file-1'));
			// }, 900);
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

	$('button[attr-add]').on('click', function (e) {
		var _this = $(this)
		// alert(_this.attr("attr-name"))
		// const last_el = $(this).parent().parent().prev()
		// const input = `<div class="form-group row">
		// 					<label class="col-sm-2 col-form-label"></label>
		// 					<div class="col-sm-10">
		// 					<input type="text" class="form-control" name="${$(this).attr('attr-add')}" autocomplete="off">
		// 					</div>
		// 				</div>`

		// last_el.after(input)



		$.ajax({
			type: "POST",
			url: '{{route("update.option.add.myproduct", ["id" => $product->id])}}',
			data: $('form').serialize()+"&dis="+_this.attr("attr-name"),
			dataType: "json",
			success: function (response) {
				// console.log(response);
				if (response === 'success') {
					location.reload()
				}
			}
		});
	});

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
        // console.log($('input[name="category"]').val())
        $('input[name="category_id"]').val($('.list-group-item.list-group-item-action.active').text() +" > "+ $(this).text())
        $('.modal#staticBackdrop').modal('toggle')
	})



	$('button[attr-add]').on('click', function (e) {
		var _this = $(this)
		// alert(_this.attr("attr-name"))
		const last_el = $(this).parent().parent().prev()
		const input = `<div class="form-group row">
							<label class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="${$(this).attr('attr-add')}" autocomplete="off">
							</div>
						</div>`

		last_el.after(input)
		table_content()
	});


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

</script>
@endsection


