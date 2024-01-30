
@extends('new_ui.layouts.front-end-seller')
@section('content')
<div class="row">
	<div class="col-12 p-4">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
				<h3><strong>หมวดหมู่ในร้านค้า</strong></h3>
			</div>
			<div class="col-lg-2 col-md-2 col-12 ml-auto">
				<button class="btn btn-primary form-control"><i class="fa fa-plus" aria-hidden="true"></i> สร้างหมวดหมู่สินค้า</button>
			</div>
		</div>
	</div>
	<div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
		<div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
			<div class="col-lg-6 col-md-12 col-12 mb-4">
				<div class="input-group flex-nowrap">
					<div class="input-group-prepend">
						<span class="input-group-text" style="border: none; background-color: unset;border-bottom: 1px solid #ced4da;border-radius: unset;" id="addon-wrapping"><i class="fa fa-search" aria-hidden="true"></i></span>
					</div>
					<input type="text" class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="ค้นหาสินค้า" aria-label="search" aria-describedby="addon-wrapping">
				</div>
			</div>


			<div class="col-12 px-0">
				<table class="table-bordered">
					<thead>
						<tr>
							<th scope="col" class=" p-4 text-left"><strong>ชื่อหมวดหมู่สินค้า</strong></th>
							<th scope="col" class="width200 text-left"><strong>จำนวนสินค้า</strong></th>
							<th scope="col" class="width200 text-left"><strong>การมองเห็น</strong></th>
							<th scope="col" class="width200 text-left"><strong>เรียงลำดับ</strong></th>
							<th scope="col" class="width100 text-left"><strong>ดำเนินการ</strong></th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 0; $i < 15; $i++)
						<tr>
							<td scope="row" data-label="ชื่อหมวดหมู่สินค้า">
								<div class="row">
									<div class="col-12 text-left">
										<input type="text" class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="ชื่อหมวดหมู่สินค้า" aria-label="search" aria-describedby="addon-wrapping">
									</div>
								</div>
							</td>
							<td data-label="จำนวนสินค้า">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<a href="#">
											<h6 class="mb-0" style="color: #226fff; text-decoration: underline;">+ เพิ่มสินค้า</h6>
										</a>
									</div>
								</div>
							</td>
							<td data-label="การมองเห็น" class="text-lg-left text-md-right text-sm-right">
								<div class="row">
									<div class="col-12 mb-0 text-lg-left text-md-right text-sm-right">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="customSwitch1">
											<label class="custom-control-label" for="customSwitch1"></label>
										</div>
									</div>
								</div>
							</td>
							<td data-label="เรียงลำดับ" class="text-lg-left text-md-right text-sm-right">
								<div class="row">
									<div class="col-12 mb-0 text-lg-left text-md-right text-sm-right">
										<button class="btn " style="background-color: #fff; border: 1px solid #ddd;"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
										<button class="btn " style="background-color: #fff; border: 1px solid #ddd;"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
									</div>
								</div>
							</td>
							<td data-label="ดำเนินการ" class="text-lg-left text-md-right text-sm-right">
								<div class="row">
									<div class="col-12 mb-0 text-lg-left text-md-right text-sm-right">
										<button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fa fa-bars" aria-hidden="true"></i>
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item" type="button">ลบ</a>
										</div>
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

</div>
@endsection
