@extends('layouts.default')
@section('style')



<style>
  .nav_custom_cat{
    display: none !important;
  }
  .swiper-container {
    width: 100%;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

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

  .rating {
    display: inline-block;
    unicode-bidi: bidi-override;
    color: #888888;
    font-size: 25px;
    height: 25px;
    width: auto;
    margin: 0;
    position: relative;
    padding: 0;
  }

  .rating-upper {
    color: #f6c100;
    padding: 0;
    position: absolute;
    z-index: 1;
    display: flex;
    top: 0;
    width: 10px;
    left: 0;
    overflow: hidden;
  }

  .rating-lower {
    padding: 0;
    display: flex;
    z-index: 0;
  }
  .card-header{
    background-color: #f8f9fa;
  }
/*  .card-body{
    background-color: #efefef;
  }*/
/*  footer{
    display: none;
  }*/
  .checkBox {
    display: block;
    position: relative;
    right: 20px;
    top: -10px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default checkbox */
  .checkBox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
    display: none;
  }

  /* Create a custom checkbox */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
    border-radius: 100%;
  }

  /* On mouse-over, add a grey background color */
  .checkBox:hover input ~ .checkmark {
    background-color: #ccc;
  }

  /* When the checkbox is checked, add a blue background */
  .checkBox input:checked ~ .checkmark {
    background-color: #00ce67;
  }

  /* Create the checkmark/indicator (hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the checkmark when checked */
  .checkBox input:checked ~ .checkmark:after {
    display: block;
  }
  /* Style the checkmark/indicator */
  .checkBox .checkmark:after {
    left: 8px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  @media (min-width: 320px) {
    .w_custom_50{
      width: 30px;
    }
    .w_100_custom{
      width: 50%;
    }
    .font_custom_wallet_th{
      font-size: 10px;
    }
    .text_custom_headtext{
      font-size: 0.8rem;
    }
    .h_custom_70{
      height: 70px;
    }
    .text_custom_h3{
      font-size: 18px;
    }
    .line_custom:before{
      content: "";
      display: none;
      width: 2px;
      height: 40px;
      background: #ccd7e1;
      position: absolute;
      left: 50%;
      top: 0;
    }
    .line_custom:after{
      content: "";
      display: none;
      width: 2px;
      height: 40px;
      background: #ccd7e1;
      position: absolute;
      left: 50%;
      bottom: 0;
    }
  }
  @media (min-width: 350px) {
    .w_custom_50{
      width: 30px;
    }
    .w_100_custom{
      width: 50%;
    }
    .font_custom_wallet_th{
      font-size: 12px;
    }
    .text_custom_headtext{
      font-size: 0.8rem;
    }
    .h_custom_70{
      height: 70px;
    }
    .text_custom_h3{
      font-size: 18px;
    }
    .line_custom:before{
      display: none;
    }
    .line_custom:after{
      display: none;
    }
  }

  @media (min-width: 576px) {
    .w_custom_50{
      width: 30px;
    }
    .w_100_custom{
      width: 50%;
    }
    .font_custom_wallet_th{
      font-size: 14px;
    }
    .text_custom_headtext{
      font-size: 0.8rem;
    }
    .h_custom_70{
      height: 70px;
    }
    .text_custom_h3{
      font-size: 24px;
    }
    .line_custom:before{
      display: none;
    }
    .line_custom:after{
      display: none;
    }
  }


  @media (min-width: 768px) {
    .w_custom_50{
      width: 30px;
    }
    .w_100_custom{
      width: 100%;
    }
    .font_custom_wallet_th{
      font-size: 14px;
    }
    .text_custom_headtext{
      font-size: 0.8rem;
    }
    .h_custom_70{
      height: 70px;
    }
    .text_custom_h3{
      font-size: 24px;
    }
    .line_custom:before{
      display: none;
    }
    .line_custom:after{
      display: none;
    }
  }


  @media (min-width: 992px) {
    .w_custom_50{
      width: 50px;
    }
    .w_100_custom{
      width: 100%;
    }
    .font_custom_wallet_th{
      font-size: 18px;
    }
    .text_custom_headtext{
      font-size: 1rem;
    }
    .h_custom_70{
      height: 70px;
    }
    .text_custom_h3{
      font-size: 24px;
    }
    .line_custom:before{
      display: none;
    }
    .line_custom:after{
      display: none;
    }
  }


  @media (min-width: 1200px) {
    .w_custom_50{
      width: 50px;
    }
    .w_100_custom{
      width: 100%;
    }
    .font_custom_wallet_th{
      font-size: 18px;
    }
    .text_custom_headtext{
      font-size: 1rem;
    }
    .h_custom_70{
      height: 100px;
    }
    .text_custom_h3{
      font-size: 24px;
    }
    .line_custom:before{
      display: block;
    }
    .line_custom:after{
      display: block;
    }
  }
</style>
@endsection
@section('content')
@if(Request::get('wallet'))
<form class="container" style="margin-bottom: 80px;">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12 mx-auto my-4">
      <div class="row">
        <div class="col-12">
          <div class="accordion" id="accordionExample">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-12 ">
                <div class="card py-lg-4 py-md-2 py-2 h_custom_70 d-flex align-items-center justify-content-between">
                  <label class="card-header d-flex justify-content-between align-items-center position-relative py-0 w-100 h-100" style="cursor:pointer; border: none; background-color: unset;">
                    <strong class="text-dark">
                      โอนเงินธนาคาร
                    </strong>
                    <div class="checkBox">
                      <input type="radio" name="type" value="bank" >
                      <span class="checkmark"></span>
                    </div>
                  </label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-12 ">
                <div class="card py-lg-4 py-md-2 py-2 h_custom_70 d-flex align-items-center justify-content-between">
                  <label class="card-header d-flex justify-content-between align-items-center position-relative py-0 w-100 h-100" style="cursor:pointer; border: none; background-color: unset;">
                    <strong class="text-dark">
                      โอนเงินด้วย QR โค้ด
                    </strong>
                    <div class="checkBox">
                      <input type="radio" name="type" value="mobilebanking">
                      <span class="checkmark"></span>
                    </div>
                  </label>
                </div>

              </div>
              <div class="col-lg-4 col-md-4 col-12 ">
                <div class="card py-lg-4 py-md-2 py-2 h_custom_70 d-flex align-items-center justify-content-between vat_credit">
                  <label class="card-header d-flex justify-content-between align-items-center position-relative py-0 w-100 h-100" style="cursor:pointer; border: none; background-color: unset;">
                    <strong class="text-dark">
                      บัตรเครดิต/บัตรเดบิต <br> <span class="text-danger" style="font-size: 12px;">(* คิดค่าธรรมเนียม 3%)</span>
                    </strong>

                    <div class="checkBox">
                      <input type="radio" name="type" class="type" value="credit">
                      <span class="checkmark"></span>
                    </div>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="row mx-0 px-4 py-lg-4 py-md-4 py-0" style="background-color: #fff; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
        <div class="col-5" style="padding-top: 30px; padding-bottom: 30px;">
          <div class="row">
            <div class="col-12 px-0">
              <div class="input-group">
                <input type="number" class="form-control py-0 get" name="get_wallet" id="get_wallet"  value="{{ Request::get('wallet') }}" style="font-weight: bolder; border-radius: 0;color: #c45e9f; border-left: none; border-top: none; border-right: none; border-bottom: 3px solid #c45e9f; ">
                <div class="input-group-append">
                  <span class="d-flex align-items-center" style="background-color: unset; border-top: none; border-left: none; border-right: none; border-bottom: 3px solid #c45e9f; border-radius: 0;"><strong class="font_custom_wallet_th" style="color: #c45e9f;">THB</strong></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-center">
          <img src="img/arrow.png" class="w_custom_50" alt="">
        </div>
        <div class="col-5" style="padding-top: 30px; padding-bottom: 30px;">
          <div class="row">
            <div class="col-12 px-0">
              <div class="input-group wallets">
                <input type="number" class="form-control py-0 get_real" name="get-real-wallet" value="{{ Request::get('wallet') }}" style="font-weight: bolder; border-radius: 0;color: #ccd7e1; border-left: none; border-top: none; border-right: none; border-bottom: 3px solid #ccd7e1; background-color: #fff; " disabled>
                <div class="input-group-append">
                  <span class="d-flex align-items-center" style="background-color: unset; border-top: none; border-left: none; border-right: none; border-bottom: 3px solid #ccd7e1; border-radius: 0;"><strong class="font_custom_wallet_th" style="color: #ccd7e1;">WALLET</strong></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 mt-4">
      <div class="row mx-0 px-lg-4 px-md-4 px-0 py-4" style="background-color: #fff; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
        <div class="col-lg-5 col-md-5 col-5" style="padding-top: 30px; padding-bottom: 30px;">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-lg-9 col-md-9 col-12 d-flex align-items-center justify-content-lg-end justify-content-md-end justify-content-center order-lg-1 order-md-1 order-2">
                  <div class="row">
                    <div class="col-12 px-0 text-lg-right text-md-right text-center mt-lg-0 mt-md-0 mt-2">
                      <h6 class="text_custom_headtext mb-lg-2 mb-md-0 mb-0"><strong style="color: #ccd7e1;">คุณกำลังแลกเปลี่ยน</strong></h6>
                    </div>
                    <div class="col-12 px-0 text-lg-right text-md-right text-center">
                      <h3 class="text-main text_custom_h3"><strong><span id="monitorStatusSpan">{{ number_format(Request::get('wallet'),2) }}</span> THB</strong></h3>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12 d-flex align-items-center order-lg-2 order-md-2 order-1 justify-content-center">
                  <img src="img/thb.png" class="w_100_custom" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-center line_custom">
          <img src="img/arrow2.png" class="w_custom_50" alt="">
        </div>
        <div class="col-lg-5 col-md-5 col-5" style="padding-top: 30px; padding-bottom: 30px;">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-12 d-flex align-items-center justify-content-center">
                  <img src="img/thb2.png" class="w_100_custom" alt="">
                </div>
                <div class="col-lg-9 col-md-9 col-12 d-flex align-items-center justify-content-lg-start justify-content-md-start justify-content-center">
                  <div class="row">
                    <div class="col-12 px-0 text-lg-left text-md-left text-center mt-lg-0 mt-md-0 mt-2">
                      <h6 class="text_custom_headtext mb-lg-2 mb-md-0 mb-0"><strong style="color: #ccd7e1;">คุณจะได้รับ</strong></h6>
                    </div>
                    <div class="col-12 px-0 text-lg-left text-md-left text-center">
                      <h3 class="text-main text_custom_h3"><strong><span id="monitorStatusSpan1" val="">{{ number_format(Request::get('wallet'),2) }}</span> WALLET</strong></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12 my-lg-4 my-md-0 my-0 mx-auto">
          <button type="button" class="btn btn-c75ba1 form-control rounded8px submitForm">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>
</form>
@else

@endif

<!-- treepay payment -->

<!-- <form id="formCredit" class="d-none" method="POST" action="{{ env('TREEPAY_URL') }}">
  <input type="text" name="order_no" id="order_no" >
  <input type="text" name="ret_url" value="{{ env('TREEPAY_RET_URL') }}" >
  <input type="text" name="user_id" id="user_id" >
  <input type="text" name="good_name" id="good_name" value="wallet" >
  <input type="text" name="trade_mony" id="trade_mony" >
  <input type="text" name="order_first_name" id="order_first_name">
  <input type="text" name="order_email" id="order_email">
  <input type="text" name="currency" value="764" >
  <input type="text" name="pay_type" id="pay_type">
  <input type="text" name="site_cd" id="site_cd">
  <input type="text" name="hash_data" id="hash_data">
</form> -->

<!-- 2c2p patment -->

<form id="formCredit" class="d-none" method="POST" action="{{ env('2C2P_URL') }}">
  <input type="text" name="version" id="version" value="{{ env('2C2P_VERSION') }}" >
  <input type="text" name="merchant_id" id="merchant_id" value="{{ env('2C2P_MERCHANT_ID') }}" >
  <input type="text" name="currency" id="currency" value="764" >
  <input type="text" name="result_url_1" id="result_url_1" value="{{ env('2C2P_RESULT_URL_1') }}" >
  <input type="text" name="hash_value" id="hash_value">
  <input type="text" name="payment_description" id="payment_description">
  <input type="text" name="order_id" id="order_id" >
  <input type="text" name="amount" id="amount">
</form>

@endsection


@section('script')
    <script type="text/javascript">
      $('.submitForm').on('click',function(){
        type = $('input[name="type"]:checked').val();
        get_wallet = $('input[name="get_wallet"]').val();
        if(type&&get_wallet){
        $(this).prop('disabled',true);
        //   alert(type);
        $(this).prop('disabled',true);
          $.ajax({
            url : '/buyWallettctp',
            type : 'POST',
            data : {
                type : type,
                wallet : get_wallet,
                _token: '{{ csrf_token() }}',
            },
            success:function(data){
              if(type == "bank"){
                console.log(data);
                window.location.href = "{{ url('add_wallet_bank?inv_ref=') }}"+data.inv.inv_ref;
              }
              if(type == "mobilebanking"){
                window.location.href = "{{ url('add_wallet_qr_code?inv_ref=') }}"+data.inv.inv_ref;

              }
              if(type == "credit"){
                  // console.log(data);
                // $('#formCredit input#order_no').val(data.inv.inv_ref);
                // $('#formCredit input#user_id').val(data.inv.user_id);
                // $('#formCredit input#trade_mony').val(data.trade_mony);
                // $('#formCredit input#order_first_name').val(data.order_first_name);
                // $('#formCredit input#order_email').val(data.order_email);
                // $('#formCredit input#pay_type').val(data.pay_type);
                // $('#formCredit input#site_cd').val(data.site_cd);
                // $('#formCredit input#hash_data').val(data.hash_data);

                $('#formCredit input#order_id').val(data.order_id);
                $('#formCredit input#hash_value').val(data.hash_value);
                $('#formCredit input#payment_description').val(data.payment_description);
                $('#formCredit input#amount').val(data.amount);

                $('#formCredit').submit();
              }
            },
            error:function(data){
                // console.log(data);
                json = JSON.parse(data.responseText);
                // console.log(json);
                $(this).prop('disabled',false);
            }
          });
        }
      });
  </script>

  <script>
        statusCalVat = true;
        var temp;
        $('input[name="type"]').on('change',function(){
            if($(this).val() == 'credit'){
                var wallet = $('input[name=get_wallet]').val();
                var cal_vat = parseFloat(wallet*103/100);
                var format = cal_vat.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                var wal = parseFloat(wallet);
                var format_wal = wal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $('input[name=get_wallet]').val(cal_vat)
                $('#monitorStatusSpan').text(format);
                $('#monitorStatusSpan1').text(format_wal);
            }
            if($(this).val() == 'mobilebanking'){
                var real_wallets = parseFloat($('.get_real').val());
                var format_real = real_wallets.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                // console.log(real_wallets);
                $('input[name=get_wallet]').val(real_wallets);
                $('#monitorStatusSpan').text(format_real);
                $('#monitorStatusSpan1').text(format_real);
            }
            if($(this).val() == 'bank'){
                var real_wallets = parseFloat($('.get_real').val());
                var format_real = real_wallets.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                // console.log(real_wallets);
                $('input[name=get_wallet]').val(real_wallets);
                $('#monitorStatusSpan').text(format_real);
                $('#monitorStatusSpan1').text(format_real);
            }
        });


        $(".get").on('keypress keyup change', function(){
            val = $(this).val();
            wal = parseFloat(val);
            var format_wal = wal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');


            // console.log(val);
                $('input[name=get-real-wallet]').attr('value', val)
                $('input[type="radio"]').prop('checked', false);
                $('#monitorStatusSpan1').text(format_wal);
                $('#monitorStatusSpan').text(format_wal);
        });
  </script>
@endsection
