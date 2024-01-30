@extends('new_ui.layouts.front-end-seller')
@section('content')
				<div class="row">
					<div class="col-12 p-4">
						<h3><strong>รายละเอียดร้านค้า</strong></h3>
					</div>
					<div class="col-lg-6 col-md-12 col-12  px-4 px-lg-4 px-md-4 px-2 mb-4" >
						<div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
							<div class="col-12 mb-4">
								<form action="/upload-target" class="dropzone" id="exampleInputEmail2" style="height: 200px;"></form>
							</div>
							<div class="col-12">
								<div class="form-group">
								    <label for="exampleInputEmail1"><h5><strong style="color: #c45e9f;">ชื่อร้าน</strong></h5></label>
								    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
								    <label for="exampleFormControlTextarea1"><h5><strong style="color: #c45e9f;">รายละเอียดร้านค้า</strong></h5></label>
								    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 px-4 px-lg-4 px-md-4 mx-0">
						<div class="row px-0">
							<div class="col-lg-6 col-md-12 col-12 d-flex justify-content-end px-4">
								<button class="btn btn-secondary">ยกเลิก</button>
								<button class="btn btn-c75ba1 ml-2">บันทึก</button>
							</div>
						</div>
					</div>
				</div>
@endsection
