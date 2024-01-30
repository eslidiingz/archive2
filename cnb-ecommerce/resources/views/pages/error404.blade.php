@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .swiper-container {
        width: 100%;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

</style>
@endsection
@section('content')

<div class="container" style="margin-top: 80px; margin-bottom: 80px;">
    <div class="row">
        <div class="col-12 d-flex justify-content-center mt-5">
            <img src="/img/Group 5063.svg" alt="">
        </div>
        <div class="col-12 d-flex justify-content-center my-4">
            <h5 style="color: grey;">ไม่พบข้อมูล</h5>
        </div>
        <div class="col-12 my-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mx-auto">
                    <a href="/home" class="form-control btn btn-c75ba1">
                        <h5 class="mb-0 h-100 d-flex align-items-center justify-content-center">กลับสู่หน้าแรก !!!</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

