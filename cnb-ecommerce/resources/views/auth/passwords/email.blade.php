@extends('layouts.default')

@section('style')
<style>
.smsCode {
            text-align: center;
            line-height: 60px;
            font-size: 50px;
            border: solid 1px #ccc;
            box-shadow: 0 0 5px #ccc inset;
            width:100%;
            outline: none;
            border-radius: 3px;
        }
.jpa input {
    margin-right: .3rem;
    /*margin-left: .5rem;*/
    text-align: center;
}
</style>
@endsection
@section('content')


<div class="container" style="height:50vh;">
    <div class="row justify-content-center">
        <div class="col-md-8 my-4">
            <div class="card" style="border : 0px;">
                <div class="card-header" style="border : 0px; background-color: white;">{{ __('รีเซ็ตรหัสผ่าน') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <form method="POST" action="{{ route('password.email') }}"> -->
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('เบอร์โทรศัพท์') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" required placeholder="กรอกเบอร์โทรศัพท์ที่ใช้ในการสมัคร" autofocus>
                                <!-- <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="กรอกอีเมลหรือเบอร์โทรศัพท์ที่ใช้ในการสมัคร" autofocus> -->

                                <!-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>
 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            {{-- <div class="col-md-6 offset-md-4" data-toggle="modal" data-target="#exampleModalOTP"> --}}
                                <button class="btn btn-c75ba1 btn-block d-none" id="email-submit" type="submit" >
                                <button class="btn btn-c75ba1 btn-block d-none" id="modal" data-toggle="modal" data-target="#exampleModalOTP">
                                <button class="btn btn-c75ba1 btn-block" id="sub-button" type="button">ส่งเพื่อตั้งรหัสผ่านใหม่
                                    <!-- {{ __('ส่งเพื่อตั้งรหัสผ่านใหม่') }} -->
                                </button>

                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
                            <div class="modal fade" data-backdrop="static" id="exampleModalOTP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">OTP</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="col-12 jpa d-flex flex-row">
                                            <input type="tel" class="form-control" maxlength="1" id="otp1">
                                            <input type="tel" class="form-control" maxlength="1" id="otp2">
                                            <input type="tel" class="form-control" maxlength="1" id="otp3">
                                            <input type="tel" class="form-control" maxlength="1" id="otp4">
                                            <input type="tel" class="form-control" maxlength="1" id="otp5">
                                            <input type="tel" class="form-control" maxlength="1" id="otp6">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        {{-- <a href="{{ url('/reset_otp') }}"> --}}
                                            <button class="btn btn-primary btn-embossed" id="verify_otp">Verify</button>
                                        {{-- </a> --}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
@endsection
@section('script')
<link rel="stylesheet" type="text/css" href="/new_ui/plugins/otp/jquery-pincode-autotab.min.css">
<script type="text/javascript" src="/new_ui/plugins/otp/jquery-pincode-autotab.min.js"></script>
<script>
    $(document).ready(function() {
         $(".jpa input").jqueryPincodeAutotab();
        var verify_token = '';
        var verify_phone = '';
    });
    $('#sub-button').on('click', function(){
        var user = $('#email').val();
        var success = '';
        var formData;
        formData = new FormData();
        var url = '';
        
        formData.append( '_token', "{{ csrf_token() }}" );
        if(user.length <= 10){
            formData.append( 'phone',user );
            // success = "ส่งลิงค์เพื่อตั้งรหัสผ่านใหม่ไปยังเบอร์โทรเรียบร้อย";
            url = "/sendOtp";
        }
        else{
            // $('#email-submit').click();
            // formData.append( 'email',user );
            // success = "ส่งลิงค์เพื่อตั้งรหัสผ่านใหม่ไปยังอีเมลเรียบร้อย";
            // url = "/sendMail";
            // url = "{{ route('password.email')}}";
        }
        $.ajax({
            type: 'POST',
            data:formData,
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            success: function(json){
                console.log(json);
                if(json['error']){
                    alert(json['error']);
                }
                else if(json['status'] == 'success'){
                    verify_token = json['token'];
                    verify_phone = json['phone'];

                    $('#modal').click();
                }
                // location.reload();
            }
        });
    });

    $('#verify_otp').on('click', function(){
        var otp1 = $('#otp1').val();
        var otp2 = $('#otp2').val();
        var otp3 = $('#otp3').val();
        var otp4 = $('#otp4').val();
        var otp5 = $('#otp5').val();
        var otp6 = $('#otp6').val();
        var otp = otp1+otp2+otp3+otp4+otp5+otp6;
        console.log(otp);

        $.ajax({
            type: 'POST',
            data:{
                '_token': '{{ csrf_token() }}',
                'token': verify_token,
                'phone': verify_phone,
                'otp': otp,
            },
            url: '/verifyOtp',
            // cache: false,
            // contentType: false,
            // processData: false,
            success: function(json){
                console.log(json);
                if(json['error']){
                    alert(json['error']);
                }
                else if(json['status'] == 'success'){
                    window.location.replace('/reset-password');
                }
                // location.reload();
            }
        });
    });

</script>
@endsection