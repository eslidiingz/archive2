{{-- @extends('layouts.default')
@section('content') --}}
 <!-- Modal -->
  <div class="modal fade " id="login-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document"  style="width:350px">
        <div class="modal-content shadow-sm rounded border-0">
            <div class="modal-header border-0">
                <div class="row justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row justify-content-center mb-3">
                        <img src="/img/logo1.png"  alt="" style="width: 50%;margin-top:-30px">
                    </div>
                    <div class="col-10 d-flex justify-content-around">
                        <a id="login-btn" class="btn btn-active" href="javascript:void(0);" ><h6 class="regular mb-0">เข้าสู่ระบบ</h6><a>
                        <a id="register-btn" class="btn" href="javascript:void(0);" ><h6 class="regular mb-0">สมัครสมาชิก</h6></a>
                    </div>
                    <div class="row">
                        <form id="login-form" method="POST" class="justify-content-center mt-3" action="{{ route('login') }}" >
                            @csrf

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="email" name="username" style="width: 288px" class="form-control form" id="email" aria-describedby="emailHelp" placeholder="ใส่อีเมลล์ / ไอดี">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="password" name="password" class="form-control form" id="password" placeholder="รหัสผ่าน">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <h5 id="login_error" class="regular text-danger"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <a id="forget-pass"  href="{{ route('password.request') }}" class="pink regular h6" href="javascript:void(0);" ><u>ลืมรหัสผ่าน ?</u></a>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-secondary col-12"><h6 class="regular mb-0">เข้าสู่ระบบ</h6></button>
                            </div>
                        </form>
                        <form id="register-form" class="justify-content-center mt-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="name"  class="form-control form" id="firstname" aria-describedby="emailHelp" placeholder="ชื่อ">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="surname" class="form-control form" id="lastname" aria-describedby="emailHelp" placeholder="นามสกุล">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="email" name="email" class="form-control form" id="email" aria-describedby="emailHelp" placeholder="ใส่อีเมลล์">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="password" name="password" class="form-control form" id="password" placeholder="รหัสผ่าน">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="password" name="password_confirmation" class="form-control form" id="repassword" placeholder="ยืนยันรหัสผ่าน">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="tel" name="phone"  class="form-control form" id="tel" aria-describedby="" placeholder="เบอร์โทร">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-secondary col-12"><h6 class="regular mb-0">สมัครสมาชิก</h6></button>
                            </div>
                        </form>
                    </div>
            </div>

        </div>

      </div>
    </div>
  </div>

  <script>

$("#register").click(function(){
  	$("#login-form").hide();
    $("#register-form").show();
    document.getElementById("login-btn").className = "btn";
    document.getElementById("register-btn").className += " btn-active";

  });
  $("#login").click(function(){
    $("#login-form").show();
    $("#register-form").hide()
    document.getElementById("login-btn").className += " btn-active";
    document.getElementById("register-btn").className = "btn";

  });

      $(document).ready(function(){
  $("#login-btn").click(function(){
    $("#login-form").show();
    $("#register-form").hide();
    document.getElementById("login-btn").className += " btn-active";
    document.getElementById("register-btn").className = "btn";
  });
  $("#register-btn").click(function(){
  	$("#login-form").hide();
    $("#register-form").show();
    document.getElementById("login-btn").className = "btn";
    document.getElementById("register-btn").className += " btn-active";

  });
})
  </script>

