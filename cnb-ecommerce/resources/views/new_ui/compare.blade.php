@extends('new_ui.layouts.front-end')
@section('style')
<style>
	.swiper-container {
		width: 100%;
		height: 100%;
		margin-left: auto;
		margin-right: auto;
	}

	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: #fff;

		/* Center slide text vertically */
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}

</style>
@endsection
@section('content')

<div class="container-fluid mb-4 " >
	<div class="container p-0" >
		<div class="row m-0 py-4 px-0">
			<div class="col-lg-6 col-md-6 col-12 mt-4">
				<h3><strong>เปรียบเทียบ</strong></h3>
			</div>
			<div class="col-lg-6 col-md-6 col-12 mt-lg-4 mt-md-4 mt-0 text-lg-right text-md-right text-left">
				<a href="#"><h6><strong style="color: #1947e3; text-decoration: underline;">รีเซตการเปรียบเทียบทั้งหมด</strong></h6></a>
			</div>
		</div>
		<div class="row m-0 pt-4 rounded8px" style="background-color: #fff;">
			<div class="col-12 text-center">
				<h4><strong>หมวดหมู่ : <span style="color: #c75ba1;">เสื้อผ้าผู้หญิง</span></strong></h4>
			</div>
			<div class="col-12 px-0">
				<table class="table-borderless">
					<thead>
						<tr>
							<th scope="col" style="border: 1px solid #ddd;" class="width200 p-4 text-lg-center text-md-center text-right ">
								<h6><strong>เกี่ยวกับสินค้า</strong></h6>
							</th>
							<th scope="col" style="border: 1px solid #ddd;" class="width200 text-lg-center text-md-center text-right position-relative">
								<h6><strong>สินค้าที่ 1</strong></h6>
								<img class="position-absolute" src="new_ui/img/user_icon_menu/bin-icon.svg" style="width: 20px; top: 21px; right: 10px; cursor: pointer;" alt="">
							</th>
							<th scope="col" style="border: 1px solid #ddd;" class="width200 text-lg-center text-md-center text-right position-relative">
								<h6><strong>สินค้าที่ 2</strong></h6>
								<img class="position-absolute" src="new_ui/img/user_icon_menu/bin-icon.svg" style="width: 20px; top: 21px; right: 10px; cursor: pointer;" alt="">
							</th>
							<th scope="col" style="border: 1px solid #ddd;" class="width200 text-lg-center text-md-center text-right position-relative">
								<h6><strong>สินค้าที่ 3</strong></h6>
								<img class="position-absolute" src="new_ui/img/user_icon_menu/bin-icon.svg" style="width: 20px; top: 21px; right: 10px; cursor: pointer;" alt="">
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td scope="row" class="custom-border" data-label="">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right">
										<h6 class="mb-0"><strong>หมวดหมู่ย่อย</strong></h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 1">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right">
										<h6 class="mb-0">เสื้อเชิ้ต</h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 2" class="text-lg-left text-md-right text-sm-right">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right">
										<h6 class="mb-0">เสื้อยืด</h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 3">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
										<h6 class="mb-0"><strong style="color: #1947e3; text-decoration: underline;">+ เพิ่มการเปรียบเทียบสินค้า</strong></h6>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" class="custom-border" data-label="">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right">
										<h6 class="mb-0"><strong>รูปภาพ</strong></h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 1">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right">
										<img src="img/product/product-11.png" style="width: 80px;" class="mr-3 rounded8px" alt="...">
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 2" class="text-lg-left text-md-right text-sm-right">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right">
										<img src="img/product/product-11.png" style="width: 80px;" class="mr-3 rounded8px" alt="...">
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 3">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
										<h6 class="mb-0 d-lg-none d-md-block d-block"><strong style="color: #1947e3; text-decoration: underline;">+ เพิ่มการเปรียบเทียบสินค้า</strong></h6>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" class="custom-border" data-label="">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right">
										<h6 class="mb-0"><strong>ชื่อสินค้า</strong></h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 1">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-right">
										<h6 class="mb-0"><strong>Basics by sita | A224 - One  Button Box by sita Button....</strong></h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 2" class="text-lg-left text-md-right text-sm-right">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-right">
										<h6 class="mb-0"><strong>Basics by sita | A224 - One  Button Box by sita Button....</strong></h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 3">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
										<h6 class="mb-0 d-lg-none d-md-block d-block"><strong style="color: #1947e3; text-decoration: underline;">+ เพิ่มการเปรียบเทียบสินค้า</strong></h6>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" class="custom-border" data-label="">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right">
										<h6 class="mb-0"><strong>ราคา</strong></h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 1">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right d-flex flex-row justify-content-lg-center">
										<h6 class="mb-0 mr-2 mt-1"><strong style="color: #919191;text-decoration: line-through;">฿ 1140</strong></h6>
										<h5 class="mb-0"><strong style="color: #c75ba1;">฿ 350</strong></h5>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 2" class="text-lg-left text-md-right text-sm-right">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right d-flex flex-row justify-content-lg-center">
										<h6 class="mb-0 mr-2 mt-1"><strong style="color: #919191;text-decoration: line-through;">฿ 1140</strong></h6>
										<h5 class="mb-0"><strong style="color: #c75ba1;">฿ 400</strong></h5>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 3">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
										<h6 class="mb-0 d-lg-none d-md-block d-block"><strong style="color: #1947e3; text-decoration: underline;">+ เพิ่มการเปรียบเทียบสินค้า</strong></h6>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" class="custom-border" data-label="">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-right">
										<h6 class="mb-0"><strong>รายละเอียดสินค้า</strong></h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 1">
								<div class="row">
									<div class="col-12 mb-2 text-left">
										<h6 class="mb-0"><strong>✅💛สำหรับลูกค้าที่รัก ถ้าชอบสินค้าสั่งไว้ก่อน
											เราจะจัดส่งไล่ตามออเดอร์หลังเปิดงานค่ะ<br>
											❌⛔ถ้ารีบใช้ กรุณาพิจารณาเวลาการจัดส่งของ
											ก่อนสั่งค่ะ 
											❤ทำให้ไม่สะดวก ขออภัยด้วยนะคะ ขอบคุณมากค่ะ <br>

											🔥🔥ข่าวดี<br>
											🔥🚚 ส่งฟรีทั้งร้านเมื่อขั้นต่ำ 0 บาท<br>
											🔥🚚 วิธีได้ส่งฟรี<br>
											ขนาด <br>
											M	รอบอก：38.22” นิ้ว   /	รอบอก：98 cm  / <br>
											เสื้อยาว ：71cm  /	แขนยาว：54cm  /	 <br>
											ไหล่กว้าง ：50cm  /	น้ำหนักที่แนะนำ 45-50 kg <br>
											L	รอบอก：40.56” นิ้ว   /	รอบอก：104cm  <br>
										เสื้อยาว ：72cm  /	แขนยาว：55cm  </strong></h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 2" >
								<div class="row">
									<div class="col-12 mb-2 text-left">
										<h6 class="mb-0"><strong>✅💛สำหรับลูกค้าที่รัก ถ้าชอบสินค้าสั่งไว้ก่อน
											เราจะจัดส่งไล่ตามออเดอร์หลังเปิดงานค่ะ<br>
											❌⛔ถ้ารีบใช้ กรุณาพิจารณาเวลาการจัดส่งของ
											ก่อนสั่งค่ะ 
											❤ทำให้ไม่สะดวก ขออภัยด้วยนะคะ ขอบคุณมากค่ะ <br>

											🔥🔥ข่าวดี<br>
											🔥🚚 ส่งฟรีทั้งร้านเมื่อขั้นต่ำ 0 บาท<br>
											🔥🚚 วิธีได้ส่งฟรี<br>
											ขนาด <br>
											M	รอบอก：38.22” นิ้ว   /	รอบอก：98 cm  / <br>
											เสื้อยาว ：71cm  /	แขนยาว：54cm  /	 <br>
											ไหล่กว้าง ：50cm  /	น้ำหนักที่แนะนำ 45-50 kg <br>
											L	รอบอก：40.56” นิ้ว   /	รอบอก：104cm  <br>
										เสื้อยาว ：72cm  /	แขนยาว：55cm  </strong></h6>
									</div>
								</div>
							</td>
							<td class="custom-border" data-label="สินค้าที่ 3">
								<div class="row">
									<div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
										<h6 class="mb-0 d-lg-none d-md-block d-block"><strong style="color: #1947e3; text-decoration: underline;">+ เพิ่มการเปรียบเทียบสินค้า</strong></h6>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

</div>
@endsection
