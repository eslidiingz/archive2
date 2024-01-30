@extends('layouts.default')
@section('content')
<div class="">
    <div class="container">
        <div class="row justify-content-center" style="">
            <div class="card col-lg-8 col-md-12 col-12  white border-0 rounded p-4 mt-lg-4 mt-md-0 mt-0" id="flash-sale" style="">
                <div class="row mb-2 mt-4">
                    <div class="col-12">
                        <h4 class="pink regular"><strong>{{ trans('message.pay') }}</strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h5 class="regular">{{ trans('message.pay_amount') }}</h5>
                    </div>
                    <div class="col-6 text-right">
                        <h5 class="pink regular" style="color: #7BCFDD;"><strong>฿ {{$total}}</strong></h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <h4 class="pink regular"><strong>{{ trans('message.payment_method') }}</strong></h4>
                                <h5 class="black thin">ATM / {{ trans('message.bank_transfer') }}</h5>
                                <h5 class="black thin">{{ trans('message.keep_slip_24_hr') }}
                                </h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-left">
                                <img src="/img/icon/Group 151(1).svg" alt="" class="d-inline-block mr-2">
                                <h5 class="black thin d-inline-block">{{ trans('message.transfer_bank_name') }}</h5>
                                <h5 class="black regular mt-lg-0 mt-md-0 mt-2">{{ trans('message.transfer_account_name') }}</h5>
                                <h5 class="black regular">{{ trans('message.transfer_account_no') }}</h5>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-9 col-12 ml-auto mt-3">
                        <div class="form-row">
                            <div class="col-lg-6 col-md-6 col-12 mb-2">
                                <button style="" class="btn btn-c45e9f-custom form-control" data-toggle="modal" data-target="#modal-img-bank">
                                    {{ trans('message.upload_slip') }}
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-2">
                                <a href="/profile_my_sale">
                                    <button style="" class="btn btn-outline-c45e9f form-control">
                                        {{ trans('message.upload_later') }}
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

<div class="h-150"></div>
<div class="modal fade" id="modal-img-bank" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>{{ trans('message.upload_slip') }}</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('bank-update') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
                                    <div class="custom-file was-validated">
                                        <div class="d-flex align-items-center justify-content-center" style="width: 100%; height: 300px;">
                                            <img id="preview_bank" class="img-shop-profile" style="max-width: 100%; max-height: 100%;" src="{{('/new_ui/img/no_image.png') }}">
                                        </div>
                                        <div class="custom-file mt-3 mb-3">
                                            <input onchange="bankURL(this)" type="file" class="custom-file-input form-control-file is-invalid" id="bank_pic" name="bank_pic" accept="image/*" required />
                                            <input name="bank_ref" value="{{$ref_invs}}" hidden >

                                            <label class="custom-file-label">
                                                <p id="image_img_bank"></p>
                                            </label>
                                        </div>
                                        <!-- <div class="col-12 px-0">
                                            <div class="form-group">
                                                <label>
                                                    <h5><strong style="color: #346751;">วันที่โอนเงิน</strong></h5>
                                                </label>
                                                <input class="form-control" type="date" id="date_tranfer" value="{{date('Y-m-d')}}" name="date_tranfer" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-12 px-0">
                                            <div class="form-group">
                                                <label>
                                                    <h5><strong style="color: #346751;">เวลาที่โอนเงิน</strong></h5>
                                                </label>
                                                <input class="form-control" type="time" id="time_tranfer" value="{{date('H:i:s')}}" name="time_tranfer" required="">
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-5">
                    <div class="col-12 px-4 px-lg-4 px-md-4 mx-0">
                        <div class="row px-0">
                            <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-end px-4">
                                <button class="btn btn-secondary " type="button" data-dismiss="modal" aria-label="Close">{{ trans('message.cancel') }}</button>
                                <button type="submit" class="btn btn-c75ba1 ml-2" >{{ trans('message.save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body{
        background-color: #F9F9F9 !important;
    }
    .btn-c45e9f-custom {
        background-color: #02A2D5;
        color: #fff;
        border: 1px solid #02A2D5;
    }
    .btn-c45e9f-custom:hover {
        background-color: #7BCFDD;
        color: #fff;
        border: 1px solid #7BCFDD;
    }

    @media (min-width: 320px) {
        .h-150 {
            height: 0px;
        }
        .border-custom-footer{
            display: block;
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
        .border-custom-footer{
            display: none;
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
    $(document).ready(function() {

        var urlParams = new URLSearchParams(window.location.search); //get all parameters


        $('#payment-method0').on('click', function() {
            $('#sub-payment-method').toggle();
        });


        $("#comfirm_buy").click(function() {
            $.each($("input[id='bank']:checked"), function() {
                bank = $(this).val();
                $("#comfirm_buy").attr("href", "/checkout/bank/?inv_ref=" + urlParams.get('inv_ref') + "&bank_id=" + bank);
            });
        });

        var image_name = $("#image_img_bank").text("{{ trans('message.please_pick_slip') }}");
        // var click_image = $(".click_image").val();


    });

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
    $('.form_submit_slip').on('click', function() {
        $(this).prop('disabled', true);
        $(this).parents('form').submit();
    });
</script>

@stop
