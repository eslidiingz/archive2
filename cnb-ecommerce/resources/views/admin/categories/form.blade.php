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
                                @if (isset($status))
                                    แก้ไขหมวดหมู่
                                @else
                                    เพิ่มหมวดหมู่
                                @endif
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
                    <div class="form-group col-12 col-md-12">
                        <label for="username">ชื่อหมวดหมู่</label>
                        <input type="text" class="form-control" id="username"
                            @if (isset($status))
                                readonly=""
                            @endif
                            value="{{ @$user->username }}"
                            name="username"
                            placeholder="ชื่อหมวดหมู่"
                        />
                    </div>
                    <div class="col-12 text-center">
                        <a href="/dashboard/categories" class="btn btn-secondary">ย้อนกลับ</a>
                        <button type="button" class="btn btn-success submitFormAdmin" id="submit">บันทึก</button>
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
        $('#showUser .showusername span').text('');
        $('#showUser .showpassword span').text('');
        $('#showUser').addClass('d-none');
        @if (!isset($status))
            url = '/dashboard/admin/create';
            $success = 'เพิ่มผู้ใช้งานแอดมินสำเร็จ';
        @else
            url = '/dashboard/admin/edit';
            $success = 'แก้ไขข้อมูลผู้ใช้งานแอดมินสำเร็จ';
        @endif
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
                        title: $success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    @if (!isset($status))
                        $('#showUser .showusername span').text($('input#username').val());
                        $('#showUser .showpassword span').text($('input#password').val());
                        $('#showUser').removeClass('d-none');
                        $('#formAdmin').trigger("reset");
                    @endif
                }else{
                    // Swal.fire({
                    //     position: 'center',
                    //     icon: 'error',
                    //     title: $error,
                    //     showConfirmButton: false,
                    //     timer: 1500
                    // });
                    $('button').removeClass('click').prop('disabled',false);
                    alert('ชื่อผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้อง');
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
