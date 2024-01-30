@extends('layouts.shop')
@section('content')
<div class="row">
	<div class="col-12 px-4 pt-4 pb-1">
		<h3><strong>สินค้าพรีออเดอร์ของฉัน</strong></h3>
	</div>
	<div class="col-12 px-4" >
		<div class="d-lg-block d-md-block d-none">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="true">ทั้งหมด ({{count($product_pre->where('status_goods','!=',9))}})</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab" aria-controls="list-2" aria-selected="false">ขายอยู่ ({{count($product_pre->where('status_goods', 1))}})</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab" aria-controls="list-3" aria-selected="false">รอตรวจสอบ ({{count($product_pre->where('status_goods', 0))}})</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" id="list-4-tab" data-toggle="tab" href="#list-4" role="tab" aria-controls="list-4" aria-selected="false">ไม่แสดง ({{count($product_pre->where('status_goods', 2))}})</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" id="list-5-tab" data-toggle="tab" href="#list-5" role="tab" aria-controls="list-5" aria-selected="false">ไม่ผ่านการตรวจสอบ ({{count($product_pre->where('status_goods', 99))}})</a>
				</li>
			</ul>
        </div>
		<div class="form-group d-lg-none d-md-none d-block">
			<select class="form-control" id="select-submenu">
				<option value="1">ทั้งหมด ({{count($product_pre->where('status_goods','!=',9))}})</option>
				<option value="2">ขายอยู่ ({{count($product_pre->where('status_goods', 1))}})</option>
				<option value="3">รอตรวจสอบ ({{count($product_pre->where('status_goods', 0))}})</option>
				<option value="4">ไม่แสดง ({{count($product_pre->where('status_goods', 2))}})</option>
				<option value="5">ไม่ผ่านการตรวจสอบ ({{count($product_pre->where('status_goods', 99))}})</option>
			</select>
		</div>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
				@include('component.my-product-preorder-all')
			</div>
			<div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
				@include('component.my-product-preorder-show')
			</div>
			<div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-tab">
				@include('component.my-product-preorder-wait')
			</div>
			<div class="tab-pane fade" id="list-4" role="tabpanel" aria-labelledby="list-4-tab">
				@include('component.my-product-preorder-not')
			</div>
			<div class="tab-pane fade" id="list-5" role="tabpanel" aria-labelledby="list-5-tab">
				@include('component.my-product-preorder-ban')
			</div>
		</div>
	</div>
@endsection

@section('script')

<script>
	$('#select-submenu').on('change',function(){
		value = $(this).val();
		$('a.nav-link[href="#list-'+value+'"]').click();
	});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function () {
        $('.deletePre').on('click', function () {
            var id = $(this).data('key');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'คุณแน่ใจแล้วหรือไม่ว่าจะลบสินค้าชิ้นนี้?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน ',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire('ลบสินค้าชิ้นนี้สำเร็จ');

                    $.ajax({
                        url: "/shop/preorder/delete/" + id,
                        type: "DELETE",
                        success: function (respone) {

                            if (respone == "pass") {
                                var startTr = $('.startTr' + id);
                                var endTr = $('.endTr' + id);
                                startTr.fadeOut(500);
                                endTr.fadeOut(500);
								location.reload();
                            }
                        },
                        error: function (respone) {
                            console.log(respone);
                            if (respone == "fail") {
                                swalWithBootstrapButtons.fire('เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง');
                            }
                        }
                    });

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // swalWithBootstrapButtons.fire(
                    //     'Cancelled',
                    //     'Your imaginary file is safe :)',
                    //     'error'
                    // )
                }
            });




        });
    });
</script>



@endsection

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
		.table-bordered{
			border: unset;
		}
	</style>

	<style type="text/css">
		.startTr td{
			border-bottom: 0 !important;
		}
		.endTr td{
			border-top: 0 !important;
		}
	</style>
@endsection
