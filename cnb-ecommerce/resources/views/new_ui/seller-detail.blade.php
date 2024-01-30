
@extends('new_ui.layouts.front-end-seller')
@section('content')
				<div class="row">
					<div class="col-12 px-4 pt-4 pb-0">
						<h3><strong>รายการขายของฉัน</strong></h3>
					</div>
					<div class="col-12 px-2">
						<nav aria-label="breadcrumb" >
							<ol class="breadcrumb mb-0" style="background-color: unset;">
								<li class="breadcrumb-item"><a href="seller-index.php">Main</a></li>
								<li class="breadcrumb-item active" aria-current="page">STN0843849305</li>
							</ol>
						</nav>
					</div>
					<div class="col-lg-9 col-md-12 col-12 px-4 px-lg-4 px-md-4 px-2 mb-4" >
						<div class="row p-lg-4 p-md-2 p-2 py-md-4 py-4 mb-2 mx-0" style="background-color: #fff;">
							<div class="col-lg-6 col-md-6 col-12 d-flex flex-row align-items-center ">
								<img src="new_ui/img/seller/icon-error.svg" style="width: 25px;" alt="">
								<h5 class="mb-0 ml-2"><strong>ที่ต้องจัดส่ง</strong></h5>
							</div>
							<div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-end justify-content-md-start justify-content-start">
								<h5 class="mb-0"><strong>หมายเลขสั่งซื้อ : #STN0843849305</strong></h5>
							</div>
						</div>
						<div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0 d-block d-md-block d-lg-none" style="background-color: #fff;">
							<div class="col-12 mt-4">
								@include('new_ui.user_seller.user-tracking')
							</div>
						</div>
						{{-- <div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0" style="background-color: #fff;">
							<div class="col-6 d-flex flex-row align-items-center">
								<h5 class="mb-0 ml-2"><strong><span style="color: #c75ba1;">สาเหตุ :</span> แขนเสื้อกระดุมหลุด</strong></h5>
							</div>
							<div class="col-6">
								<div class="form-row justify-content-end">
									<div class="col-4">
										<button class="btn btn btn-outline-danger form-control" data-toggle="modal" data-target="#CancelModal">ปฏิเสธ</button>
									</div>
									<div class="col-4">
										<button class="btn btn btn-outline-success form-control" data-toggle="modal" data-target="#SuccessModal">ยอมรับ</button>
									</div>
								</div>
							</div>
						</div> --}}
						<div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0" style="background-color: #fff;">
							<div class="col-12 px-1">
								<table class="table-bordered">
									<thead>
										<tr class="d-lg-none d-md-none d-block">
											<th scope="col" class="p-4 text-left">สินค้าทั้งหมด</th>
											<th scope="col" class="width200 text-left">ยอดคำสั่งซื้อทั้งหมด</th>
											<th scope="col" class="width200 text-left">สถานะ</th>
											<th scope="col" class="width200 text-left">สถานะ</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td scope="row">
												<div class="row">
													<div class="col-12 mb-4 text-left">
														<div class="media" style="height: 60px;">
															<img src="new_ui/img/product/product-demo-3.png" style="max-height: 100%;width: 60px; height: 100%; object-fit: cover;" class="mr-3 rounded8px" alt="...">
															<div class="media-body">
																<h6 class="mt-0 text-dot1"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
																สีน้ำตาล,S
															</div>
														</div>
													</div>

												</div>
											</td>
											<td data-label="ราคา">
												<div class="row" >
													<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
														<h6 class="mb-0"><strong>฿ 350</strong></h6>
													</div>
													<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
														<h6 class="mb-0" style="color: #919191; text-decoration: line-through">฿ 1140 (-37%)</h6>
													</div>
												</div>
											</td>
											<td data-label="จำนวน">
												<div class="row">
													<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
														<h6 class="mb-0"><strong>x2</strong></h6>
													</div>
												</div>
											</td>
											<td data-label="ราคาทั้งหมด">
												<div class="row">
													<div class="col-12 mb-2 text-right px-0">
														<h6 class="mb-0"><strong>฿ 700</strong></h6>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td scope="row" >
												<div class="row">
													<div class="col-12 mb-4 text-lg-left text-md-right text-sm-right">
														<div class="media" style="height: 60px;">
															<img src="new_ui/img/product/product-11.png" style="max-height: 100%;width: 60px; height: 100%; object-fit: cover;" class="mr-3 rounded8px" alt="...">
															<div class="media-body">
																<h6 class="mt-0 text-dot1"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
																สีน้ำตาล,S
															</div>
														</div>
													</div>

												</div>
											</td>
											<td data-label="ราคา">
												<div class="row">
													<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
														<h6 class="mb-0"><strong>฿ 350</strong></h6>
													</div>
													<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
														<h6 class="mb-0" style="color: #919191; text-decoration: line-through">฿ 1140 (-37%)</h6>
													</div>
												</div>
											</td>
											<td data-label="จำนวน">
												<div class="row">
													<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
														<h6 class="mb-0"><strong>x2</strong></h6>
													</div>
												</div>
											</td>
											<td data-label="ราคาทั้งหมด">
												<div class="row">
													<div class="col-12 mb-2 text-right px-0">
														<h6 class="mb-0"><strong>฿ 700</strong></h6>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-12">
								<hr class="w-100">
							</div>
							<div class="col-lg-12 col-md-6 col-6 text-left d-lg-none d-md-block d-block pr-0">
								<h5 class="mb-0 mr-2"><strong style="color: #c45e9f;">ราคารวมทั้งหมด</strong></h5>
							</div>
							<div class="col-lg-12 col-md-6 col-6 text-right pl-0">
								<h5 class="mb-0"><strong style="color: #c45e9f;">฿ 1,050</strong></h5>
							</div>
						</div>
						<div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0 py-md-4 py-4" style="background-color: #fff;">
							<div class="col-lg-6 col-md-6 col-12 d-flex flex-row align-items-center">
								<img src="new_ui/img/img-user-test.jpg" style="width: 70px; height:70px;border-radius:50%" alt="">
								<h6 class="ml-4"><strong>j**********s</strong></h6>
							</div>
							<div class="ml-auto col-lg-2 col-md-3 col-12 d-flex align-items-center justify-content-end mt-lg-0 mt-md-0 mt-2">
								<button class="btn btn-outline-c45e9f form-control"><img src="new_ui/img/seller/icon-comment.svg" style="filter: invert(52%) sepia(52%) saturate(711%) hue-rotate(276deg) brightness(84%) contrast(83%);}" width="24px;" alt=""> แชทเลย</button>
							</div>
						</div>
						<div class="row p-lg-4 p-md-2 py-4 px-2 mb-2 mx-0 py-md-4 py-4" style="background-color: #fff;">
							<div class="col-lg-5 col-md-12 col-sm-12 d-flex flex-row align-items-center ">
								<h5><strong style="color: #c45e9f;">กรุณากรอกเลขพัสดุ</strong></h5>
							</div>
							<div class="col-lg-5 col-md-9 col-sm-12 d-flex align-items-center">
								<div class="input-group">
								  <input type="text" class="form-control" style="border: 1px solid #c45e9f" placeholder="เลขพัสดุ" aria-label="Recipient's username" aria-describedby="basic-addon2">
								  <div class="input-group-append">
								    	<a href="#" class="btn input-group-text" style="    background-color: #c45e9f;border: 1px solid #c45e9f; color: #fff;" id="basic-addon2">ส่งเลขพัสดุ</a>
								  </div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-12 d-flex align-items-center justify-content-end mt-0 mt-md-0 mt-lg-0">
								<button class="btn btn-outline-c45e9f  form-control mt-lg-0 mt-md-0 mt-2" data-toggle="modal" data-target="#CancelSuccessModal-1">ยกเลิกคำสั่งซื้อ</button>
							</div>
						</div>
						<div class="row p-lg-4 p-md-2 py-4 px-2 mb-2 mb-2 mx-0 py-md-4 py-4" style="background-color: #fff;">
							<div class="col-12 mb-2">
								<h5><strong style="color: #c45e9f;">ที่อยู่ในการจัดส่ง</strong></h5>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="row ">
									<div class="col-12">
										<h6><strong>ชื่อ - นามสกุล</strong> สมหญิง รักดี</h6>
									</div>
									<div class="col-12">
										<h6><strong>เบอร์โทรศัพท์</strong> (+66) 081-441-9585</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="row">
									<div class="col-12">
										<h6><strong>ที่อยู่</strong> 52/2 ซ.เจริญนคร 78 ถนน เจริญนคร บุคคโล เขตธนบุรี จังหวัดกรุงเทพมหานคร 10600</h6>
									</div>
									<div class="col-12">
										<h6><strong style="color: #c45e9f;">(ที่อยู่หลัก)</strong></h6>
									</div>
								</div>
							</div>
							<div class="col-12 my-2">
								<hr class="w-100">
							</div>
							<div class="col-lg-6 col-md-6 col-12 mb-2">
								<h5><strong style="color: #c45e9f;">ช่องทางการชำระเงิน</strong></h5>
							</div>
							<div class="col-lg-6 col-md-6 col-12 mb-2">
								<div class="row ">
									<div class="col-12 d-md-flex d-lg-flex justify-content-end">
										<h6><strong>บัตรเครดิต / บัตรเดบิต</strong></h6>
									</div>
									<div class="col-12 d-md-flex d-lg-flex align-items-center justify-content-end">
										<div class="d-flex flex-row">
											<img src="new_ui/img/seller/visa.png" style="width: 60px;" class="mr-2" alt="">
											<h6><strong>ธนาคารกสิกรไทย * 6702</strong></h6>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 my-2">
								<hr class="w-100">
							</div>
							<div class="col-12">
								<div class="row justify-content-end">
									<div class="col-lg-4 col-md-6 col-12">
										<div class="row">
											<div class="col-6 text-md-right text-lg-right text-left pr-0">
												<h6>ยอดรวมสินค้า</h6>
												<h6>ส่วนลด</h6>
												<h6>ค่าส่ง</h6>
												<h6>รวมราคาทั้งหมด</h6>
											</div>
											<div class="col-6 text-right">
												<h6><strong>฿ 700</strong></h6>
												<h6><strong style="color: #c40000;">- 100</strong></h6>
												<h6><strong>฿ 60</strong></h6>
												<h5><strong style="color: #c45e9f;">฿ 660</strong></h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-3 px-4 mb-4 d-lg-block d-md-none d-none" >
						<div class="row p-lg-4 p-md-2 p-2" >
							<div class="col-12 mb-4">
								<h5><strong>ประวัติการซื้อ</strong></h5>
							</div>
							<div class="col-md-12 col-lg-12">
						         @include('new_ui.user_seller.user-tracking')
						    </div>
						      
						</div>
					</div>
				</div>
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
		.table-bordered td, .table-bordered th{
			border: none;
		}
		.table-bordered{
			border: none;
		}
		table tr{
			border: none;
		}

</style>
<!-- Modal -->
<div class="modal fade" id="CancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
    	<div class="modal-header pb-0" style="border-bottom: unset;">
      		<div class="col-12 position-relative">
      			<h5 class="modal-title text-center " id="exampleModalLabel"><strong>ปฏิเสธการคืนสินค้า</strong></h5>
        		<button type="button" class="close position-absolute" style="right: 5px; top: 0px;" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
      		</div>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
			    <select class="form-control" id="exampleFormControlSelect1">
			      <option>กรุณาเลือกสาเหตุที่ต้องการปฏิเสธ</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			      <option>5</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ส่งข้อความถึงเจ้าหน้าที่">
			  </div>
        	</div>
        </div>
      </div>
      <div class="modal-footer pt-0" style="border-top: unset;">
      	<div class="form-row w-100">
      		<div class="col-6">
      			<button type="button" class="btn btn-secondary form-control" data-dismiss="modal">ยกเลิก</button>
      		</div>
      		<div class="col-6">
      			<button type="button" class="btn btn-c75ba1 form-control">ส่งคำร้อง</button>
      		</div>
      	</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="SuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header pb-0" style="border-bottom: unset;">
      		<div class="col-12 position-relative">

      			<h5 class="modal-title text-center " id="exampleModalLabel">
      				<img src="new_ui/img/seller/purchase-history-4.svg" style="width: 20px; height: 20px;" alt=""> <strong style="color: #26c298;">ยอมรับสำเร็จ</strong></h5>
        		<button type="button" class="close position-absolute" style="right: 5px; top: 0px;" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
      		</div>
      </div>
      <div class="modal-body">
	      <h6 class="text-center">คุณได้ยอมรับการคืนสินค้าเรียบร้อยแล้ว<br>ระบบจะทำการโอนเงินคืนผู้ซื้อ ภายใน 2-3 วัน</h6>
      </div>
      <div class="modal-footer pt-0" style="border-top: unset;">
      	<div class="form-row w-100">
      		<div class="col-12 d-flex justify-content-center">
      			<button type="button" class="btn btn-c75ba1 form-control w-25">ตกลง</button>
      		</div>
      	</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="CancelSuccessModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
    	<div class="modal-header pb-0" style="border-bottom: unset;">
      		<div class="col-12 position-relative">
      			<h5 class="modal-title text-center " id="exampleModalLabel"><strong>ยกเลิกคำสั่งซื้อ</strong></h5>
        		<button type="button" class="close position-absolute" style="right: 5px; top: 0px;" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
      		</div>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
			    <select class="form-control" id="exampleFormControlSelect1">
			      <option>กรุณาเลือกสาเหตุที่ต้องการยกเลิก</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			      <option>5</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ส่งข้อความถึงเจ้าหน้าที่">
			  </div>
        	</div>
        </div>
      </div>
      <div class="modal-footer pt-0" style="border-top: unset;">
      	<div class="form-row w-100">
      		<div class="col-6">
      			<button type="button" class="btn btn-secondary form-control" data-dismiss="modal">ยกเลิก</button>
      		</div>
      		<div class="col-6">
      			<button type="button" class="btn btn-c75ba1 form-control " data-toggle="modal" data-target="#CancelSuccessModal-2" data-dismiss="modal">ส่งคำร้อง</button>
      		</div>
      	</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="CancelSuccessModal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header pb-0" style="border-bottom: unset;">
      		<div class="col-12 position-relative">

      			<h5 class="modal-title text-center " id="exampleModalLabel">
      				<img src="new_ui/img/seller/purchase-history-4.svg" style="width: 20px; height: 20px;" alt=""> <strong style="color: #26c298;">ยกเลิกคำสั่งซื้อสำเร็จ</strong></h5>
        		<button type="button" class="close position-absolute" style="right: 5px; top: 0px;" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
      		</div>
      </div>
      <div class="modal-body">
	      <h6 class="text-center">คุณได้ยกเลิกรายการสั่งซื้อนี้แล้ว<br>ข้อความของคุณจะถูกส่งไปให้ผู้ซื้อ</h6>
      </div>
      <div class="modal-footer pt-0" style="border-top: unset;">
      	<div class="form-row w-100">
      		<div class="col-12 d-flex justify-content-center">
      			<button type="button" class="btn btn-c75ba1 form-control w-25">ตกลง</button>
      		</div>
      	</div>
      </div>
    </div>
  </div>
</div>
@endsection



