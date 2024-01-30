@extends('layouts.shop')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
		min-width: 250px;
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
@section('content')

				<div class="row">
					<div class="col-12 px-4 pt-4 pb-2">
						<h3><strong>บัญชีธนาคาร</strong></h3>
						<div class="col-12 p-4">
							<div class="row">
								<div class="kbank1">
									<div class="col-md-4 col-sm-12 col-lg-12 mb-4 text-left o-box-bank ">
										<div class="media o-padding dataTarget">
										</div>
									</div>
								</div>
								<div class="add">
									<div class="col-md-4 col-sm-12 col-lg-5 mb-4 text-left o-box-bank addTraget" data-toggle="modal" data-target="#add-modal" style="cursor: pointer;">
										<div class="media o-text-black abs-text" >
											<strong>+ เพิ่มบัญชีธนาคาร </strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="btn">
					<div class="row">
						<div class="col-1" style="border-right: 1px solid white;">
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-modal">แก้ไข</button>
						</div>
						<div class="col-1 ml-5">
						<a href="/shop/deletebank" type="button" class="btn btn-danger" id="del">ลบ</a>
						</div>
					</div>
				</div>


@endsection


	<!-- Modal -->
	<div class="modal fade add-modal" id="add-modal" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header" style='text-align : center'>
					<h4>เพิ่มบัญชีธนาคาร</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="col-12">
						<select title="เลือกธนาคาร" class="form-control btn-color"id="bank-code">
							<option data-thumbnail="/new_ui/img/bank/kbank.svg" value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
							<option data-thumbnail="/new_ui/img/bank/scb.svg"value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
							<option data-thumbnail="/new_ui/img/bank/bbl.svg"value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
							<option data-thumbnail="new_ui/img/bank/ktb.svg"value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
							<option data-thumbnail="/new_ui/img/bank/tmb.svg"value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
							<option data-thumbnail="/new_ui/img/bank/bay.svg"value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
							<option data-thumbnail="/new_ui/img/bank/kk.svg"value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
							<option data-thumbnail="/new_ui/img/bank/cimb.svg"value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
							<option data-thumbnail="/new_ui/img/bank/tisco.svg"value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
							<option data-thumbnail="/new_ui/img/bank/tbank.svg"value="ธนาคารธนชาต">ธนาคารธนชาต</option>
							<option data-thumbnail="/new_ui/img/bank/uob.svg"value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
							<option data-thumbnail="/new_ui/img/bank/tcrb.svg"value="ธนาคารไทยเครดิตเพื่อรายย่อย">ธนาคารไทยเครดิตเพื่อรายย่อย</option>
							<option data-thumbnail="/new_ui/img/bank/lhb.svg"value="ธนาคารแลนด์แอนด์ เฮ้าส์">ธนาคารแลนด์แอนด์ เฮ้าส์</option>
							{{--noimg--}}{{--<option data-thumbnail="/new_ui/img/bank/.png"value="ธนาคารไอซีบีซี (ไทย)">ธนาคารไอซีบีซี (ไทย)</option>--}}
							{{--noimg--}}{{--<option data-thumbnail="/new_ui/img/bank/.png"value="ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย">ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย</option>--}}
							<option data-thumbnail="/new_ui/img/bank/baac.svg"value="ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร">ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</option>
							{{--noimg--}}{{--<option data-thumbnail="/new_ui/img/bank/.png"value="ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย">ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย</option>--}}
							<option data-thumbnail="/new_ui/img/bank/gsb.svg"value="ธนาคารออมสิน">ธนาคารออมสิน</option>
							<option data-thumbnail="/new_ui/img/bank/ghb.svg"value="ธนาคารอาคารสงเคราะห์">ธนาคารอาคารสงเคราะห์</option>
							<option data-thumbnail="/new_ui/img/bank/ibank.svg"value="ธนาคารอิสลามแห่งประเทศไทย">ธนาคารอิสลามแห่งประเทศไทย</option>
						</select>
					</div>
					<div class="col-12 mb-3">
						<div class="form-group">
							<select title="เลือกประเภทบัญชี" class="form-control rounded8px" style="background-color: #ededed; border: none; margin-top: 20px;" id="bank-class">
								<option value="ออมทรัพย์">ออมทรัพย์</option>
								<option value="กระแสรายวัน">กระแสรายวัน</option>
							</select>
						</div>
					</div>
					<div class="col-12 mb-3 mt-4 ">
						<input type="text" class="form-control rounded8px" id="bank-name" aria-describedby="emailHelp" placeholder="ชื่อบัญชี" style="background-color: #ededed; border: none;">
					</div>
					<div class="col-12 mb-3 mt-4 ">
					<input type="text" class="form-control rounded8px" id="bank-number" aria-describedby="emailHelp" placeholder="เลขที่บัญชี"  style="background-color: #ededed; border: none;">
					</div>
					<div class="col-12 mb-3 mt-4 ">
						<div class="divv">
							<div class='form-row'>
								<div class="col-6 mb-3 text-center">
									<button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
								</div>
								<div class="col-6 mb-3 text-center">
									<button type="sumbit" class="btn form-control text-white rounded8px btn-main-set" id="add-bank">บันทึก</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

 {{-- modaledit --}}
	<div class="modal fade edit-modal" id="edit-modal" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header" style='text-align : center'>
					<h4><strong>แก้ไขบัญชีธนาคาร</strong></h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="dataeditTarget">
						<div class="col-12">
							<select title="เลือกธนาคาร" class="form-control btn-color bankcode"id="bank-code2" name="bank_select">
								<option data-thumbnail="/new_ui/img/bank/kbank.svg" value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
								<option data-thumbnail="/new_ui/img/bank/scb.svg"value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
								<option data-thumbnail="/new_ui/img/bank/bbl.svg"value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
								<option data-thumbnail="new_ui/img/bank/ktb.svg"value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
								<option data-thumbnail="/new_ui/img/bank/tmb.svg"value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
								<option data-thumbnail="/new_ui/img/bank/bay.svg"value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
								<option data-thumbnail="/new_ui/img/bank/kk.svg"value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
								<option data-thumbnail="/new_ui/img/bank/cimb.svg"value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
								<option data-thumbnail="/new_ui/img/bank/tisco.svg"value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
								<option data-thumbnail="/new_ui/img/bank/tbank.svg"value="ธนาคารธนชาต">ธนาคารธนชาต</option>
								<option data-thumbnail="/new_ui/img/bank/uob.svg"value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
								<option data-thumbnail="/new_ui/img/bank/tcrb.svg"value="ธนาคารไทยเครดิตเพื่อรายย่อย">ธนาคารไทยเครดิตเพื่อรายย่อย</option>
								<option data-thumbnail="/new_ui/img/bank/lhb.svg"value="ธนาคารแลนด์แอนด์ เฮ้าส์">ธนาคารแลนด์แอนด์ เฮ้าส์</option>
								{{--noimg--}}{{--<option data-thumbnail="/new_ui/img/bank/.png"value="ธนาคารไอซีบีซี (ไทย)">ธนาคารไอซีบีซี (ไทย)</option>--}}
								{{--noimg--}}{{--<option data-thumbnail="/new_ui/img/bank/.png"value="ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย">ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย</option>--}}
								<option data-thumbnail="/new_ui/img/bank/baac.svg"value="ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร">ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</option>
								{{--noimg--}}{{--<option data-thumbnail="/new_ui/img/bank/.png"value="ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย">ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย</option>--}}
								<option data-thumbnail="/new_ui/img/bank/gsb.svg"value="ธนาคารออมสิน">ธนาคารออมสิน</option>
								<option data-thumbnail="/new_ui/img/bank/ghb.svg"value="ธนาคารอาคารสงเคราะห์">ธนาคารอาคารสงเคราะห์</option>
								<option data-thumbnail="/new_ui/img/bank/ibank.svg"value="ธนาคารอิสลามแห่งประเทศไทย">ธนาคารอิสลามแห่งประเทศไทย</option>
							</select>
						</div>
						<div class="col-12 mb-3">
							<div class="form-group">
								<select title="เลือกประเภทบัญชี" class="form-control rounded8px bankclass" style="background-color: #ededed; border: none; margin-top: 20px;" id="bank-class2">
									<option value="ออมทรัพย์">ออมทรัพย์</option>
									<option value="กระแสรายวัน">กระแสรายวัน</option>
								</select>
							</div>
						</div>
						<div class="col-12 mb-3 mt-4 ">
							<input type="text" class="form-control rounded8px bankname" id="bank-name2" aria-describedby="emailHelp" placeholder="ชื่อบัญชี" style="background-color: #ededed; border: none;">
						</div>
						<div class="col-12 mb-3 mt-4 ">
						<input type="text" class="form-control rounded8px banknumber" id="bank-number2" aria-describedby="emailHelp" placeholder="เลขที่บัญชี"  style="background-color: #ededed; border: none;">
						</div>
					</div>
					<div class="col-12 mb-3 mt-4 ">
						<div class="divv">
							<div class='form-row'>
								<div class="col-6 mb-3 text-center">
									<button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
								</div>
								<div class="col-6 mb-3 text-center">
									<button type="sumbit" class="btn form-control text-white rounded8px btn-main-set" id="edit-bank" >บันทึก</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade success-modal" id="success-modal" role="dialog">
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
						<button class="col-6 btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #c75ba1;"  onClick="window.location.reload();">ตกลง</button>
					</div>
				</div>
			</div>
		</div>
	</div>

		<!-- Modal edit success-->
		<div class="modal fade edit-success" id="edit-success" role="dialog">
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
							<h4 style='color : #23c197'><strong>แก้ไขบัญชีธนาคารสำเร็จ</strong></h4>
						</div>
					</div>
					<div class="modal-body">
						<div class="col-12 mb-3 text-center">
							<div style='padding-bottom: 20px;'>คุณได้แก้ไขบัญชีธนาคารเรียบร้อยแล้ว</div>
							<button class="col-6 btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #c75ba1;"  onClick="window.location.reload();">ตกลง</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script>
		
		$(document).ready(function(){
			var datares = [];
			var bank_code;
			var bank_name;
			var bank_number;
			var bank_category;			

			$('#add-bank').click(function(){
				
				var bankcode = $('#bank-code option:selected').text();
				var bankname = $('#bank-name').val();
				var banknumber = $('#bank-number').val();
				var bankclass = $('#bank-class option:selected').text();
				console.log('bankcode=',bankcode ,'bankclass=',bankclass ,'bankname=',bankname ,'banknumber=',banknumber);
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				
				$.ajax({
					type:'POST',

					data:{
						"bankcode":bankcode,
						"bankname":bankname,
						"banknumber":banknumber,
						"bankclass":bankclass
					},
					url: "{{route('addbankdata')}}",
					success: function(respones){
					console.log(respones);
					// document.getElementById("#success-modal").showModal();
					$('#add-modal').modal('hide')
					$('#success-modal').modal('show')
					$(document).click(function(){
						window.location.reload(true);
					});
					// window.location.reload(true);
					// document.getElementById("#divv").disabled = true;
					// document.getElementById("#addbankbutton").disabled = true;
					}
				});
				
			});
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type:'get',

					url: "{{route('getbankdata')}}",
					success: function(respones){
						respones.forEach(p => {
							datares.push(p);
							bank_code = p.bank_code;
							bank_name = p.bank_name;
							bank_number = p.bank_number;
							bank_category = p.bank_category;
							
							console.log(respones);
							$(".bankname").val(bank_name);
							$(".banknumber").val(bank_number);
							$(".bankcode").val(bank_code);
							$(".bankclass").val(bank_category);

						});
						if(bank_name === null){
							
							$("[class='kbank1']").remove();
							$("[class='btn']").remove();
							// $("[class='kbank']").remove();
							$("[class='add']").show();
							
						}
						else if(respones.length === 1){
							addbank();
							// $("[class='test']").remove();
							$("[class='add']").remove();
						}
						
					}
				});

				function addbank(){
					var str_bank ="";

					if(bank_code === "ธนาคารกสิกรไทย"){
						str_bank += '<img src="/new_ui/img/bank/kbank.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารไทยพาณิชย์"){
						str_bank += '<img src="/new_ui/img/bank/scb.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารกรุงเทพ"){
						str_bank += '<img src="/new_ui/img/bank/bbl.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารกรุงไทย"){
						str_bank += '<img src="/new_ui/img/bank/ktb.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารทหารไทย"){
						str_bank += '<img src="/new_ui/img/bank/tmb.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารกรุงศรีอยุธยา"){
						str_bank += '<img src="/new_ui/img/bank/bay.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารเกียรตินาคิน"){
						str_bank += '<img src="/new_ui/img/bank/kk.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารซีไอเอ็มบีไทย"){
						str_bank += '<img src="/new_ui/img/bank/cimb.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารทิสโก้"){
						str_bank += '<img src="/new_ui/img/bank/tisco.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารธนชาต"){
						str_bank += '<img src="/new_ui/img/bank/tbank.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารยูโอบี"){
						str_bank += '<img src="/new_ui/img/bank/uob.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารไทยเครดิตเพื่อรายย่อย"){
						str_bank += '<img src="/new_ui/img/bank/tcrb.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารแลนด์แอนด์ เฮ้าส์"){
						str_bank += '<img src="/new_ui/img/bank/lhb.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารไอซีบีซี (ไทย)"){
						str_bank += '<img src="/new_ui/img/bank/.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';//noimg//
					}
					else if(bank_code === "ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย"){
						str_bank += '<img src="/new_ui/img/bank/.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';//noimg//
					}
					else if(bank_code === "ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร"){
						str_bank += '<img src="/new_ui/img/bank/baac.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย"){
						str_bank += '<img src="/new_ui/img/bank/.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';//noimg//
					}
					else if(bank_code === "ธนาคารออมสิน"){
						str_bank += '<img src="/new_ui/img/bank/gsb.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารอาคารสงเคราะห์"){
						str_bank += '<img src="/new_ui/img/bank/ghb.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					else if(bank_code === "ธนาคารอิสลามแห่งประเทศไทย"){
						str_bank += '<img src="/new_ui/img/bank/ibank.svg" style="width: 60px;" class="mr-3 rounded8px" alt="...">';
					}
					str_bank +=		'<div class="media-body">';
					str_bank +=			'<h6 class="mg_b0"><strong>'+ bank_code +'</strong></h6>';
					str_bank +=			'<div>'+ bank_name +'</div>';
					str_bank +=			'<div class="o-text-black">' + bank_number +'</div>';
					str_bank +=		'</div>';
					$(".dataTarget").append(str_bank);
				}
				$('#edit-bank').click(function(){
				
					var bankcode = $('#bank-code2 option:selected').text();
					var bankname = $('#bank-name2').val();
					var banknumber = $('#bank-number2').val();
					var bankclass = $('#bank-class2 option:selected').text();

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					
					$.ajax({
						type:'POST',

						data:{
							"bankcode":bankcode,
							"bankname":bankname,
							"banknumber":banknumber,
							"bankclass":bankclass
						},
						url: "{{route('editbankdata')}}",
						success: function(respones){
						console.log(respones);
						$('#edit-modal').modal('hide')
						$('#edit-success').modal('show')
						$(document).click(function(){
							window.location.reload(true);
						});
						// document.getElementById("#success-modal").showModal();
						// window.location.reload(true);
						// document.getElementById("#divv").disabled = true;
						// document.getElementById("#addbankbutton").disabled = true;
						}
					});
				});
				

		});
		

	</script>



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