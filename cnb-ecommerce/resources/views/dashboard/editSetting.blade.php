@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row py-4">
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-lg-row">
                    <div class="">
                        <h5 class="mb-0">
                            <b>
                                ตั้งค่าระบบ
                            </b>
                        </h5>
                    </div>
                </div>

                @if ((isset($status) && $status=='true') || !isset($status))
                    <form class="row" id="formAdmin">
                        @csrf
                        @if (isset($status))
                            <input type="hidden" name="id" value="{{ @$id }}">
                        @endif
                        <div class="form-group col-12 col-md-6">
                            <label for="username">GP Rate (%)</label>
                            <input type="number" class="form-control" id="txtGPRate" value="{{ $o_setting->gp_rate }}" name="txtGPRate" placeholder="GP Rate" />
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="password">
                                วันที่ตัดรอบการขอเบิกเงินร้านค้า
                            </label>
                            <select class="form-control" name="cboAccountDay" id="cboAccountDay">
                                <option value="" >-- เลือกวันที่ตัดรอบการขอเบิกเงิน --</option>
                                @for($i = 1; $i < 32; $i++)
                                <option @if($o_setting->account_day == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-12 text-center">
                            <a href="/dashboard/admin" class="btn btn-secondary">ย้อนกลับ</a>
                            <button type="button" class="btn btn-outline-pink submitFormAdmin" id="submit">บันทึก</button>
                        </div>
                    </form>
                @endif
            </div>
            <div class="card p-4 mt-4 d-none" id="showUser">
                <div class="showusername">ชื่อผู้ใช้งาน : <span></span></div>
                <div class="showpassword">รหัสผ่าน : <span></span></div>
            </div>
        </div>
    </div>
</div>
<style type="text/css" scoped>
    .position-text{
        position: absolute;
        right: 15px;
        top: 0;
        font-size: 12px;
        color: red;
    }
    .form-group{
        position: relative;
    }
</style>


@endsection
@section('script')
<script type="text/javascript">
    $('#view').on('click',function(){
        view = $(this).hasClass('show');
        if(view){
            $(this).removeClass('show');
            $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
            $('input#password').attr('type','password');
        }else{
            $(this).addClass('show');
            $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
            $('input#password').attr('type','text').addClass('show');
        }
    });
    $('#genarate').on('click',function(){
        $('input#password').val(genarate(8));
    });
    function genarate(length) {
       var result           = '';
       var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
       var charactersLength = characters.length;
       for ( var i = 0; i < length; i++ ) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
       }
       return result;
    }
    $('.submitFormAdmin').on('click',function(){
        $('#formAdmin').submit();
    })
    $('#formAdmin').on('submit',function(e){
        var formdata = new FormData(this);
        $('.position-text').remove();
        $('.submitFormAdmin').prop('disabled',true);
        url = '{{ route("dashboard.update.setting"); }}';
        var success = 'บันทึกข้อมูลสำเร็จ';
        var fail = 'บันทึกข้อมูลไม่สำเร็จ';

        $.ajax({
            url: url,
            data:formdata,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                if($.trim(data)=='true'){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    @if (!isset($status))
                        window.location.reload();
                    @endif
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'fail',
                        title: fail,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('button').removeClass('click').prop('disabled',false);
                }
                $('.submitFormAdmin').prop('disabled',false);
            },
            error: function(data) {
                json = JSON.parse(data.responseText);
                $.each(json['errors'], function( index, value ) {
                    $('input[name='+index+'], textarea[name='+index+'], select[name='+index+']').parents('.form-group').append('<div class="position-text">*'+value+'</div>');
                //     $('input[name='+index+'], textarea[name='+index+'], select[name='+index+']').attr('placeholder',value).addClass('placeholderError');
                });
                $('.submitFormAdmin').prop('disabled',false);
            }
        });
    })
</script>
@endsection