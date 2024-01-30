@extends('layouts.default')
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
                            <h6 class="regular black mb-1">ชำระเงินอย่างไร</h6>
                        </div>
                        <hr>
                        <pre class="row black regular thin">
                            1. เลือกจ่ายบิล / ชำระค่าบริการ
                        </pre>
                    </div>
                    <div class="card col-12 mt-0 border-0  p-4 bg-fafaff rounded-bottom-lg" id="flash-sale" style="">
                        <div class="row mb-1 justify-content-end">
                            <div class="col-2 ">
                                <h6 class="regular black mb-2">ยอดรวมสินค้า</h6>
                                <h6 class="regular black mb-2">ส่วนลด</h6>
                                <h6 class="regular black mb-2">ค่าส่ง</h6>
                                <h6 class="regular black mb-2">รวมราคาทั้งหมด</h6>
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
                            <form method="post" id="CreditForm" action="{{ env('TREEPAY_URL') }}">
                            <!-- <form method="post" id="CreditForm" action="https://paytest.treepay.co.th/total/hubInit.tp"> -->
                                
                                <div class="form-group" hidden>
                                    <input type="text" class="form-control" name="order_no" value="{{$inv_ref}}" >
                                    <input type="text" class="form-control" name="ret_url" value="{{ env('TREEPAY_RET_URL') }}" >
                                    <!-- <input type="text" class="form-control" name="ret_url" value="https://dev.t10assets.com/checkout/credit/return?id='{{$user_id}}'" > -->
                                    <input type="text" class="form-control" name="user_id" value="{{$user_id}}" >
                                    <input type="text" class="form-control" name="good_name" value="{{$good_name}}" >
                                    <input type="text" class="form-control" name="trade_mony" value="{{$trade_mony}}" >
                                    <input type="text" class="form-control" name="order_first_name" value="{{$order_first_name}}" >
                                    <input type="text" class="form-control" name="order_email" value="{{$order_email}}" >
                                    <input type="text" class="form-control" name="currency" value="764" >
                                    <input type="text" class="form-control" name="pay_type" value="{{$pay_type}}" >
                                    <input type="text" class="form-control" name="site_cd" value="{{$site_cd}}" >
                                    <input type="text" class="form-control" name="hash_data" value="{{$hash_data}}" >
                                </div>
                                <div class="form-group">
                                    <button type=submit class="btn btn-success col" style="height: 35px !important"><h6 class="regular white">สั่งซื้อสินค้า</h6> </button>
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
