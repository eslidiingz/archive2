@extends('layouts.default')
@section('style')
    <style>
        @media (min-width: 320px) {
            .w-loader-custom {
                width: 75%;
            }
        }

        @media (min-width: 768px) {
            .w-loader-custom {
                width: 25%;
            }
        }
    </style>
@endsection
@section('loader')
    <div class="preloader js-preloader flex-center"
        style="height: 101vh; z-index: 9999; background-color: #fff; text-align: center;">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="/new_ui/img/logo/logo.svg" class="w-loader-custom">
                </div>
                <div class="col-12 mb-4 mt-4">
                    <div class="dots">
                        <div class="dot" style="background-color: #7BCFDD;"></div>
                        <div class="dot" style="background-color: #7BCFDD;"></div>
                        <div class="dot" style="background-color: #7BCFDD;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.js-preloader').preloadinator({
            minTime: 2000
        });
    </script>
@endsection
@section('content')
<div class="container" >
    <div class="row m-1 mt-4 p-2 pt-3 col-12" id="sub-payment-method2">
        <div class="col">
            <label class="row col-12">
                <div class="col-1 mt-2">
                    <input required type="radio"  id="credit"  name="credit" value="credit">
                </div>
                <div class="col-3">
                    <img src="/img/icon/Group 2843.svg" alt="">
                </div>
                <div class="col-7 mt-2">
                    <h6 class="regular black">Credit/Debit</h6>
                </div>
            </label>
        </div>
        <div class="col">
            <div class="row">
                <h6 class="regular black mb-1">{{ trans('message.cc_how_to_pay') }}</h6>
            </div>
            <hr>
            <pre class="row black regular thin">
                {{ trans('message.cc_how_to_pay1') }}
            </pre>
        </div>
        <div class="card col-12 mt-0 border-0  p-4 bg-fafaff rounded-bottom-lg" id="flash-sale" style="">
            <div class="row mb-1 justify-content-end">
                <div class="col-2 ">
                    <h6 class="regular black mb-2">{{ trans('message.total_product_price') }}</h6>
                    <h6 class="regular black mb-2">{{ trans('message.product_discount') }}</h6>
                    <h6 class="regular black mb-2">{{ trans('message.ship_price') }}</h6>
                    <h6 class="regular black mb-2">{{ trans('message.grand_total') }}</h6>
                </div>
                <div class="col-2">
                    <h6 class="regular black mb-2">฿ {{$total_price}}</h6>
                    <h6 class="regular text-danger mb-2">-฿ 0</h6>
                    <h6 class="regular black mb-2">฿ 0</h6>
                    <h5 class="regular pink mb-2">฿ {{$total_price}}</h5>
                </div>
            </div>
            <hr>
            <div class="row mb-1 justify-content-end">
                <form method="post" id="CreditForm" action="{{ $payment_url }}">
                <!-- <form method="post" id="CreditForm" action="https://paytest.treepay.co.th/total/hubInit.tp"> -->
                    
                    <div class="form-group" hidden>
                        <input type="text" class="form-control" name="version" value="{{$version}}" >
                        <input type="text" class="form-control" name="merchant_id" value="{{ $merchant_id }}" >
                        <input type="text" class="form-control" name="currency" value="{{$currency}}" >
                        <input type="text" class="form-control" name="result_url_1" value="{{$result_url_1}}" >
                        <input type="text" class="form-control" name="hash_value" value="{{$hash_value}}" >
                        <input type="text" class="form-control" name="payment_description" value="{{$payment_description}}" >
                        <input type="text" class="form-control" name="order_id" value="{{$order_id}}" >
                        <input type="text" class="form-control" name="amount" value="{{$amount}}" >
                    </div>
                    <div class="form-group">
                        <button type=submit class="btn btn-success col" style="height: 35px !important"><h6 class="regular white">{{ trans('message.pay') }}</h6> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $('#CreditForm').submit();
    </script>
@endsection
