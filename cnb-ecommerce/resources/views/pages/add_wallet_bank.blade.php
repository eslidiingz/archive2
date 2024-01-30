@extends('layouts.default')
@section('content')
<style>
    .nav_custom_cat{
        display: none !important;
    }
</style>
    <div class="">
        <div class="container">
            <div class="row justify-content-center" style="">
                <div class="card col-lg-8 col-md-12 col-12  white border-0  p-4" id="flash-sale" style="border-radius: 0 0 8px 8px;">
                    <div class="row mb-2 mt-4">
                        <div class="col-12">
                            <h4 class="pink regular font_head_item"><strong>เติมเงิน Wallet</strong></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h5 class="regular font_head_item">จำนวนเงินที่ต้องชำระ</h5>
                        </div>
                        <div class="col-6 text-right">
                            <h5 class="pink regular font_head_item"><strong>฿ {{ number_format($inv->total,2) }}</strong></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h4 class="pink regular font_head_item"><strong>ช่องทางการชำระเงิน</strong></h4>
                                    <h5 class="black thin font_head_item">ATM / โอนเข้าธนาคาร</h5>
                                    <h5 class="black thin font_head_item">กรุณาเก็บเอกสาร/หลักฐานการโอนเงินไว้ เพื่ออัพโหลดภายใน 24 ชม.
                                    </h5>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-left">
                                    <img src="/img/icon/Group 151.svg" alt="" class="d-inline-block mr-2">
                                    <h5 class="black thin d-inline-block font_head_item">ธนาคารไทยพาณิชย์ สาขานนทบุรี</h5>
                                    <h5 class="black regular mt-lg-0 mt-md-0 mt-2 font_head_item">บริษัท เอสพี อินเวสเตอร์เรส จำกัด</h5>
                                    <h5 class="black regular font_head_item">302-304253-4</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-9 col-12 ml-auto mt-3">
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-12 mb-2">
                                    <button style="" class="btn btn-main-set form-control" data-toggle="modal"
                                        data-target="#modal-img-bank">
                                        อัพโหลดหลักฐานโอนเงิน
                                    </button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 mb-2">
                                    <a href="/addwallet">
                                        <button style="" class="btn btn-outline-c45e9f form-control">
                                            อัพโหลดหลักฐานโอนเงินภายหลัง
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- @php
    dd($invs_wallet->inv_ref);
    @endphp --}}
    <div class="h-150"></div>

    <div class="modal fade" id="modal-img-bank" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>อัพโหลดหลักฐานโอนเงิน</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <form method="POST" action="{{ route('wallet-update') }}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 px-0">
                                        <div class="custom-file was-validated">
                                            <div class="d-flex align-items-center justify-content-center"
                                                style="width: 100%; height: 180px;">
                                                <img id="preview_bank" class="img-shop-profile"
                                                    style="max-width: 100%; max-height: 100%;"
                                                    src="{{asset('img/shop_profiles/default_shop.svg') }}">
                                            </div>
                                            <div class="custom-file mt-3 mb-3">
                                                <input onchange="bankURL(this)" type="file"
                                                    class="custom-file-input form-control-file is-invalid" id="bank_pic"
                                                    name="bank_pic" required />
                                                <input name="bank_ref" value={{$invs_wallet->inv_ref}} hidden>

                                                <label class="custom-file-label">
                                                    <p id="image_img_bank"></p>
                                                </label>
                                            </div>
                                            {{-- <div class="col-12 px-0">
                                                <div class="form-group">
                                                    <label>
                                                        <h5 class="font_head_item mb-0"><strong style="color: #c45e9f;">เบอร์ติดต่อ</strong></h5>
                                                    </label>
                                                    <input class="form-control" type="text" id="tel" name="tel"
                                                        value="" placeholder="" required>
                                                </div>
                                            </div> --}}
                                            <div class="col-12 px-0">
                                                <div class="form-group">
                                                    <label>
                                                        <h5 class="font_head_item mb-0"><strong style="color: #c45e9f;">วันที่โอนเงิน</strong></h5>
                                                    </label>
                                                    <input class="form-control" type="date" id="date_tranfer"
                                                        name="date_tranfer" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-12 px-0">
                                                <div class="form-group">
                                                    <label>
                                                        <h5 class="font_head_item mb-0"><strong style="color: #c45e9f;">เวลาที่โอนเงิน</strong></h5>
                                                    </label>
                                                    <input class="form-control" type="time" id="time_tranfer"
                                                        name="time_tranfer" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer m-0">
                        <div class="col-12">
                            <div class="form-row ">
                                <div class="col-6">
                                    <button class="btn btn-secondary  form-control" type="button" data-dismiss="modal"
                                        aria-label="Close">ยกเลิก</button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-c75ba1  form-control login_submit">บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<style>
  

    @media (min-width: 320px) {
        .h-150 {
            height: 0px;
        }
    }

    @media (min-width: 350px) {
        .h-150 {
            height: 0px;
        }
    }


    @media (min-width: 576px) {
        .h-150 {
            height: 150px;
        }
    }


    @media (min-width: 768px) {
        .h-150 {
            height: 150px;
        }
    }


    @media (min-width: 992px) {
        .h-150 {
            height: 150px;
        }
    }


    @media (min-width: 1200px) {
        .h-150 {
            height: 150px;
        }
    }

</style>

<script>
    function bankURL(input) {
        var readerImg = $("#bank_pic").val();
        console.log("readerIMG")
        if (input.files && input.files[0]) {
            reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_bank').attr('src', e.target.result);
                // readerImg = e.target.result;
                image_name = $("#image_img_bank").text(readerImg.split('\\').pop());
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.login_submit').on('click', function () {
                        $(this).prop('disabled', true);
                        $(this).parents('form').submit();
                    });
</script>

@stop
