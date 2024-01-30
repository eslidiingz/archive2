@extends('layouts.FinalReg')

@section('content')
<!-- Modal -->
<div class="container">
	<div class="row justify-content-center" >
		<div class="col-md-8 my-4">
			<div class="card" style="border : 0px;">
				<div class="card-header" style="border : 0px; background-color: white;">
					<div class="col-12 d-flex justify-content-center position-relative">
						<img src="/new_ui/img/logo.png" class="img-fluid w-50 d-flex justify-content-center">
						<!-- <button type="button" class="close position-absolute" style="top: 0; right: 10px;" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button> -->
					</div>
				</div>
				<div class="card-body pt-0">
					<div class="col-12">

						<div class="tab-content" id="myTabContent">
						<h4><strong> ลงทะเบียน - ขั้นตอนสุดท้าย</strong></h4>
							<div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
								<form id="register-form" name="register-form" class="justify-content-center mt-3" action="{{ route('GFregister') }}" method="get">
								@csrf
								<div class="form-row">
									<div class="col-12 mb-3">
										<strong>  กรุณากรอกรายละเอียดเพิ่มเติม </strong>
									</div>
									<div class="col-12 mb-3">
									@php
									if($user->email){
										$email = $user->email;
									}else{
										$email ="noemail";
									}
									$pos = strpos($user->email,"@shopteenii.com")
									@endphp
									@if($pos !== FALSE)
										<input type="text" autocomplete="off" class="form-control rounded8px @error('email') is-invalid @enderror" name="femail" placeholder="อีเมล" style="background-color: #ededed; border: none;" >
									@else
										<input type="text" autocomplete="off" class="form-control rounded8px @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" style="background-color: #ededed; border: none;" disabled>
									@endif
									@error('email')
											<span class="invalid-feedback pl-2" role="alert">
												<strong> อีเมลซ้ำ</strong>
											</span>

									@enderror
									</div>
									<div class="col-12 mb-3">
										<input type="tel" class="form-control rounded8px @error('final_phone') is-invalid @enderror" name="final_phone" placeholder="หมายเลขโทรศัพท์ (ตัวอย่าง 0123456789)" maxlength="10" minlength="10" style="background-color: #ededed; border: none;" autocomplete="off">
										@error('final_phone')
											<span class="invalid-feedback pl-2" role="alert">
												<strong> หมายเลขโทรศัพท์ซ้ำ</strong>
											</span>

										@enderror
									</div>

									<div class="col-12 mb-3">
										<input type="password" class="form-control rounded8px @error('final_password') is-invalid @enderror" name="final_password" placeholder="รหัสผ่าน (อย่างน้อย 8 ตัวอักษร)" style="background-color: #ededed; border: none;" autocomplete="off">
										@error('final_password')
											<span class="invalid-feedback pl-2" role="alert">
												<strong> รหัสผ่านไม่ตรงกัน</strong>
											</span>

										@enderror
									</div>
									<div class="col-12 mb-3">
										<input type="password" class="form-control rounded8px @error('final_password') is-invalid @enderror" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" style="background-color: #ededed; border: none;" autocomplete="off">
										@error('password')
											<span class="invalid-feedback pl-2" role="alert">
												<strong> รหัสผ่านไม่ตรงกัน</strong>
											</span>

										@enderror
									</div>


									<div class="col-12 mb-3">
										<div class="form-check">

										<input class="form-check-input mt-2 @error('i_accept') is-invalid @enderror" type="checkbox" name="i_accept" id="i_accept">
										<label class="form-check-label" for="exampleRadios1">
											<h6><strong style="font-size: 14px;">คุณยินยอมตาม<a href="#" style="color: #d61900;"> เงื่อนไข และ นโยบายความเป็นส่วนตัว</a></strong></h6>
										</label>
										</div>
									</div>
									<div class="col-12 mb-3 text-center">
										<button type="submit" name="continue" id="continue" class="btn form-control text-white rounded8px" style="background-color: #346751;" >สำเร็จ</button>
									</div>

								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
