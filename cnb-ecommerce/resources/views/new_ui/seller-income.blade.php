
@extends('new_ui.layouts.front-end-seller')
@section('content')
<div class="row">
	<div class="col-xl-9 col-lg-12 col-md-12 col-12 px-4 px-lg-4 px-md-4 px-2 mb-4" >
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12 px-4 pt-4 pb-0 d-flex flex-row">
				<h3 class="mr-2"><strong>รายรับของฉัน</strong></h3>
				<h3><strong style="color: #c75ba1;">฿ 84,567</strong></h3>
			</div>
			<div class="col-lg-6 col-md-6 col-12 px-4 pt-4 pb-0">
				<div class="row">
					<div class="col-6">
						<button class="btn btn-primary form-control"><i class="fa fa-download" aria-hidden="true"></i> Export .csv</button>
					</div>
					<div class="col-6">
						<button class="btn btn-primary form-control"><i class="fa fa-download" aria-hidden="true"></i> Export PDF</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row  p-md-2 p-2 mb-2 mx-0 mt-4" >
			<div class="col-12 px-0">
				<table class="table-bordered">
					<thead>
						<tr style="background-color: #c75ba1">
							<th scope="col" class="width200 p-4 text-left text-white">วันที่</th>
							<th scope="col" class="width200 text-left text-white">รายละเอียด</th>
							<th scope="col" class="width200 text-left text-white">จำนวนเงิน</th>
							<th scope="col" class="width200 text-left text-white">สถานะ</th>
						</tr>
					</thead>
					<tbody>
@for ($i = 0; $i < 30; $i++)
						<tr>
							<td scope="row" data-label="วันที่">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<h6 class="mb-0"><strong>01/06/2563 09:00</strong></h6>
									</div>
								</div>
							</td>
							<td data-label="รายละเอียด">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<h6 class="mb-0 text-dots">Basics by sita | A224 - One เสื้อผ้าแฟชั่นสไตล์เกาหลีน่ารักๆ สินค้า</h6>
									</div>
								</div>
							</td>
							<td data-label="จำนวนเงิน" class="text-lg-left text-md-right text-sm-right">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<h6 class="mb-0"><strong style="color: #23c197;">+ 1,250</strong></h6>
									</div>
								</div>
							</td>
							<td data-label="สถานะ">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<h6 class="mb-0"><strong>สำเร็จแล้ว</strong></h6>
									</div>
								</div>
							</td>
						</tr>
@endfor
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-3 mb-4 d-xl-block d-lg-none d-md-none d-none  " style="background-color: #fff; height: 100vh;position: fixed; right: 0;max-width: 21%;">
		<div class="row p-lg-4 p-md-2 p-2" >
			<div class="col-12">
				<h4><strong>ตัวกรอง</strong></h4>
			</div>
			<div class="col-12">
				<div class="form-check mb-3">
				  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
				  <label class="form-check-label" for="exampleRadios1">
				    <strong>วันนี้</strong>
				  </label>
				</div>
				<div class="form-check mb-3">
				  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
				  <label class="form-check-label" for="exampleRadios2">
				    <strong>เดือนนี้</strong>
				  </label>
				</div>
				<div class="form-check mb-3">
				  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
				  <label class="form-check-label" for="exampleRadios3">
				    <strong>ปีนี้</strong>
				  </label>
				</div>
				<div class="form-check mb-3">
				  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4">
				  <label class="form-check-label" for="exampleRadios4">
				    <strong>Custom by self</strong>
				  </label>
				</div>
				<div class="col-12 mb-2">
					<input type="date" class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="date-start" aria-label="date-start" aria-describedby="addon-wrapping">
				</div>
				<div class="col-12">
					<input type="date" class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="date-end" aria-label="date-end" aria-describedby="addon-wrapping">
				</div>

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
</style>
@endsection



