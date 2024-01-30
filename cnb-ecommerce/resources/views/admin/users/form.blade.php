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
                                    แก้ไขข้อมูลผู้ใช้งานแอดมิน
                                @else
                                    เพิ่มผู้ใช้งานแอดมิน
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
                        <div class="form-group col-12 col-md-6">
                            <label for="username">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control" id="username"
                                @if (isset($status))
                                    readonly="" 
                                @endif
                                value="{{ @$user->username }}"
                                name="username" 
                                placeholder="ชื่อผู้ใช้งาน" 
                            />
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="password">
                                รหัสผ่าน
                                @if (isset($status))
                                    ใหม่ 
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-sm btn-outline-pink" type="button" id="view" style="width: 40px;">
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <input type="password" class="form-control" name="password" id="password">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-outline-pink" type="button" id="genarate">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> สร้างรหัส
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="name">ชื่อ</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ @$user->name }}">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="surname">นามสกุล</label>
                            <input type="text" class="form-control" name="surname" id="surname" value="{{ @$user->surname }}">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">อีเมล</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ @$user->email }}">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="type">ประเภท</label>
                            <select class="form-control" name="type" id="type">
                                <option selected value="" disabled="">กรุณาเลือกประเภท</option>
                                <option @if(@$user->type == 'admin') selected @endif value="admin">Admin</option>
                                <option @if(@$user->type == 'superadmin') selected @endif value="superadmin">Superadmin</option>
                                <option @if(@$user->type == 'blog_editor') selected @endif value="blog_editor">Blog Editor</option>
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