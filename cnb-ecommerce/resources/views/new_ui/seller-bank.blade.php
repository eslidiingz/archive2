@extends('new_ui.layouts.front-end-seller')
@section('content')
				<div class="row">
					<div class="col-12 px-4 pt-4 pb-2">
						<h3><strong>บัญชีธนาคาร</strong></h3>
						<div class="col-12 p-4">
							<div class="row">
								<div class="p4 col-md-4 col-sm-12 col-lg-3 mb-4 text-left o-box-bank o-bank-hover">
									<div class='black-hover'>
										<div class='col-12 row'>
											<div class='col-6' style="border-right: 1px solid white;">
												<a href='#' class='abs-1' style="color:white"><strong>แก้ไข</strong></a>
											</div>
											<div class='col-6'>
												<a href='#' class='abs-2' style="color:white"><strong>ลบ</strong></a>
											</div>
										</div>
									</div>
									<div class="media o-padding">
										<img src="new_ui/img/bank/bank01.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
										<div class="media-body">
											<h6 class="mg_b0"><strong>ธนาคารกสิกรไทย</strong></h6>
											<div>Narcharee Charee</div>
											<div class='o-text-black'>*** *** *** 6707</div>
										</div>
									</div>
								</div>
								<div class="p4 col-md-4 col-sm-12 col-lg-3 mb-4 text-left o-box-bank" data-toggle="modal" data-target="#add-modal" style="cursor: pointer;">
									<div class="media o-text-black abs-text" >
										<strong>+ เพิ่มบัญชีธนาคาร</strong>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection


	<!-- Modal -->
	<div class="modal fade" id="add-modal" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header" style='text-align : center'>
					<h4>เพิ่มบัญชีธนาคาร</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="col-12">
						<select title="เลือกธนาคาร" class="selectpicker btn-color">
							<option>เลือกธนาคาร</option>
							<option data-thumbnail="new_ui/img/bank/bank01.png">ธนาคารกสิกรไทย</option>
							<option data-thumbnail="new_ui/img/bank/bank02.png">ธนาคารไทยพาณิชย์</option>
							<option data-thumbnail="new_ui/img/bank/bank03.png">ธนาคารกรุงเทพ</option>
							<option data-thumbnail="new_ui/img/bank/bank04.png">ธนาคารกรุงไทย</option>
						</select>
					</div>
					<div class="col-12 mb-3">
						<div class="form-group">
							<select class="form-control rounded8px" style="background-color: #ededed; border: none; margin-top: 20px;" id="exampleFormControlSelect1">
								<option>เลือกประเภทบัญชี</option>
								<option>ออมทรัพย์</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						</div>
					</div>
					<div class="col-12 mb-3 mt-4 ">
						<input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ชื่อบัญชี" style="background-color: #ededed; border: none;">
					</div>
					<div class="col-12 mb-3 mt-4 ">
						<input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="เลขที่บัญชี" style="background-color: #ededed; border: none;">
					</div>
					<div class="col-12 mb-3 mt-4 ">
						<div class='row'>
							<div class="col-6 mb-3 text-center">
								<button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
							</div>
							<div class="col-6 mb-3 text-center">
								<button class="btn form-control text-white rounded8px" onclick="myFunction()" style="background-color: #c75ba1;">บันทึก</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="success-modal" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content ">
				<div class='col-12 row' style='text-align : center; padding-top: 20px;'>
					<div class='col-4' style='text-align : right'>
						<svg style='color : #23c197' width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
							<path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
						</svg>
					</div>
					<div>
						<h4 style='color : #23c197'><strong>เพิ่มบัญชีธนาคารสำเร็จ</strong></h4>
					</div>
				</div>
				<div class="modal-body">
					<div class="col-12 mb-3 text-center">
						<div style='padding-bottom: 20px;'>คุณได้เพิ่มบัญชีธนาคารเรียบร้อยแล้ว</div>
						<button class="col-6 btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #c75ba1;">ตกลง</button>
					</div>
				</div>
			</div>
		</div>
	</div>


@section('style')
<style>
	.mg_b0 {
		margin-bottom: 0px;
	}

	.o-box-bank {
		background-color: #ffff;
		margin-right: 15px;
		border-radius: 8px;
		box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.1);
		min-height: 98px;
		min-width: 200px;
	}

	.o-padding {
		padding: 15px;
	}

	.o-text-black {
		color: #919191;
	}

	.o-bank-hover:hover:after,
	.o-bank-hover:hover:before {
		opacity: 1;
	}

	.o-bank-hover:after,
	.o-bank-hover:before {
		position: absolute;
		opacity: 0;
		transition: all 0.5s;
		-webkit-transition: all 0.5s;
	}

	.o-bank-hover:after {
		content: '\A';
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background: rgba(0, 0, 0, 0.6);
		z-index: 1000;
	}

	.black-hover {
		position: absolute;
		top: 40%;
		color: white;
		z-index: 1001;
		width: 100%;
		text-align: center;
		display: none;
	}

	.abs-text {
		position: absolute;
		top: 40%;
		left: 30%;
	}

	.o-bank-hover:hover>.black-hover {
		display: block;
	}

	.btn-color {
		background-color: #ededed;
		color: #495057;
		border-radius: 8px;
	}

	.text>img {
		width: 40px;
	}

	.filter-option-inner-inner>img {
		width: 40px;
	}
</style>
@endsection

{{-- @section('script')
<script>
	function myFunction() {
		$('#add-modal').modal('hide');
		$('#success-modal').modal('show');
	}

	$('.o-bank-hover').hover(function() {
		$('.hover').fadeIn(1000);
	}, function() {
		$('.hover').fadeOut(1000);
	});
</script>
@endsection --}}
