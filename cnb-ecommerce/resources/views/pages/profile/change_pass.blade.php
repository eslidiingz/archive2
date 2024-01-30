@extends('layouts.profile')
@section('style')
<style>
    input[type=radio] {
        margin-right: 5px;
    }
    .nav_custom_cat{
        display: none !important;
    }
    .cmt {
        color: #b2b2b2;
    }

    .abs-change {
        position: absolute;
        top: 22%;
        right: 20px;
        color: #1947e3;
        text-decoration: underline;
    }

    .title_posit {
        text-align: left;
    }

    .o-btn-purple {
        border-radius: 8px;
        background-color: #f8eaf3;
        padding: 10px;
        color: #3B7369;
        border: 0px;
        width: 100px;
    }

    .o-bg-box {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.16);
    }
    .footer-area{
        display: none;
    }

    @media (min-width: 768px) {
        .title_posit {
            text-align: right;
        }
    }
    .cate-all{
        display: none !important;
    }
</style>
<?php

?>
@endsection

@section('content')
<div class="container pb_custom_footer">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
            <div class="row">
                <div class="col-3 d-xl-block d-lg-block d-md-none d-none px-0 sticky-top mr-0" style="height: calc(100vh - 131px); top: 131px; z-index: 900;">
                    @include('includes._menu_left_user_profile')
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-12 pt-4 pt-md-0 pt-lg-0 mb-4 mt-0 mt-md-4 mt-lg-4">
                    <div class=' col-lg-12 col-md-12 col-sm-12' style='border-bottom: 1px solid #d9d9d9;'>
                        <h3><strong>{{ trans('message.change_password') }}</strong></h3>
                    </div>
                    <div class='col-lg-12 col-12'>
                        <div class='row'>
                            <div class='col-lg-12 col-md-12 col-12 px-0 mt-4 o-bg-box'>
                                <div>

                                    <form action="/profile/change_pass" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-12 title_posit" style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.input_current_password') }}</strong>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 strong-text" style="margin-bottom: 20px;">
                                                    <input required style='background-color:#f0f0f0' type="password" class="form-control" id="current-password" name='current-password' aria-describedby="emailHelp" placeholder="{{ trans('message.input_current_password') }}">
                                                </div>
                                                <div class="col-lg-5">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-12 title_posit" style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.input_new_password') }}</strong>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 strong-text" style="margin-bottom: 20px;">
                                                    <input required style='background-color:#f0f0f0' type="password" class="form-control" id="new-password" name='new-password' aria-describedby="emailHelp" placeholder="{{ trans('message.input_new_password') }}">
                                                </div>
                                                <div class="col-lg-5">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-12 title_posit" style='padding-top: 5px;'>
                                                    <strong class="font_size_14px">{{ trans('message.confirm_new_password') }}</strong>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12 strong-text" style="margin-bottom: 20px;">
                                                    <input required style='background-color:#f0f0f0' type="password" class="form-control" id="re-new-password" name='re-new-password' aria-describedby="emailHelp" placeholder="{{ trans('message.confirm_new_password') }}">
                                                </div>
                                                <div class="col-lg-5">
                                                </div>
                                                <div class='col-lg-2 col-md-3 col-12 offset-lg-3 offset-md-3' style='margin-bottom: 20px;'>
                                                    <button class="form-control" id='submit' style='color: white; background-color: #346751; border-color: #346751;'>{{ trans('message.save') }}</button>
                                                </div>
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
</div>
@endsection
@section('script')
<script>
    function myFunction() {
        $('#add-modal').modal('hide');
        $('#success-modal').modal('show');
    }

    $('.o-bank-hover').hover(function() {
        $('.hover').fadeIn(1000);
    }, function() {
        $('.hover').fadeOut(1000);
    });
</script>
@endsection
