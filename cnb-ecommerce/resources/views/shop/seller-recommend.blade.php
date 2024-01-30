@extends('new_ui.layouts.front-end-seller')
@section('content')
@php
    // dd($withdraw);
    $total_balance = 0;
    foreach ($withdraw->where('status', 0) as $key => $value) {
        $total_balance += $value->amount;
    }
    // dd($total_balance);
@endphp
<div class="row">
    <div class="col-xl-9 col-lg-12 col-md-12 col-12 px-4 px-lg-4 px-md-4 px-2 mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-12 px-4 pt-4 pb-0">
                <h3><strong>รายการถอนจากการแนะนำ</strong></h3>
                @if (isset($user_shop_bank->bank_code) && isset($user_shop_bank->bank_number) && isset($user_shop_bank->bank_name) && isset($user_shop_bank->bank_category))
                
                @else
                    <h6 class="text-dangers mb-3">* คุณจะไม่สามารถถอนเงินได้ หากยังไม่ได้กรอกข้อมูลธนาคาร</h6>
                @endif
            </div>
        </div>
        <div class="row px-lg-6 px-md-6 px-0 py-lg-4 py-md-4 py-4 mx-0 rounded8px" style="background-color: #346751;">
            <div class="col-lg-6 col-md-6 col-12">
                <h5 class="font_head_item" style="color:#fff;"><img src="/new_ui/img/seller/icon_menu/icon_menu_3new.svg" style="width: 25px;" class="mr-2" alt=""><strong>ยอดเงินที่สามารถถอนได้</strong></h5>
                @if ($total_balance < 1000)
                    <h6 class="text-dangers mb-3" style='font-size:12px;'>*&nbsp;คุณจะไม่สามารถถอนเงินได้ หากยอดเงินที่สามารถถอนได้ไม่ถึง 1,000 บาท</h6>
                @endif
                <h3 style="color: #fff;"><strong id="withdrawamount">{{ number_format($total_balance,0) }}</strong>
                </h3>
            </div>
            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-end flex-column">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12 mb-1 ml-auto mb-3">
                        <button class="btn form-controls check" data-toggle="modal" data-target="#Send-1"
                        @if ((isset($user_shop_bank->bank_code) && isset($user_shop_bank->bank_number) && isset($user_shop_bank->bank_name) && isset($user_shop_bank->bank_category)) && $total_balance >= 1000)
                        @else
                        disabled
                        @endif
                        >
                            <img src="/new_ui/img/money-new.svg" style="width: 20px;" class="" alt="">&nbsp;&nbsp;ถอนเงิน</button>
                    </div>
                    <div class="col-12">
                        <h6 class="text-right text-dangers mb-0" style='font-size:10px;'>*&nbsp;1.&nbsp;บริษัทได้รับแจ้งความประสงค์ก่อน 12.00 น. ลูกค้าจะได้รับเงินภายในวันทำการนั้น</h6>
                        <h6 class="text-right text-dangers" style='font-size:10px;'>*&nbsp;2.&nbsp;บริษัทได้รับแจ้งความประสงค์หลัง 12.00 น. ลูกค้าจะได้รับเงินในวันทำการวันถัดไป</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2 mx-0 mt-4">
            
            <div class="col-12 px-0">
                <div class="d-lg-block d-md-block d-none">
                    <ul class="nav nav-tabss" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-links active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="true">รายการรับ</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-links" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab" aria-controls="list-2" aria-selected="true">รายการถอน</a>
                        </li>
                    </ul>
                </div>
                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="3">รายการรับ</option>
                    </select>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
                        @include('component.my-wallet-withdraw-recommend')
                    </div>
                    <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
                        @include('component.my-wallet-withdraw-recommend2')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3 mb-4 d-xl-block d-lg-none d-md-none d-none  " style="background-color: #fff; height: 100vh;position: fixed; right: 0;max-width: 21%;">
        <div class="row p-lg-4 p-md-2 p-2">
            <div class="col-12">
                <h4><strong>Filter</strong></h4>
            </div>
            <form action="/shop/search_seller" method="GET">
                <div class="col-12">
                    <div class="form-check mb-3">
                        <input class="form-check-input filter" type="radio" name="filter" id="today" status="false" value="1" @if (isset($_REQUEST['filter'])) @if ($_REQUEST['filter']==1) checked @endif @endif>
                        <label class="form-check-label" for="exampleRadios1">
                            <strong>to Day</strong>
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input filter" type="radio" name="filter" id="exampleRadios2" status="false" value="2" @if (isset($_REQUEST['filter'])) @if ($_REQUEST['filter']==2) checked @endif @endif>
                        <label class="form-check-label" for="exampleRadios2">
                            <strong>Month</strong>
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input filter" type="radio" name="filter" id="exampleRadios3" status="false" value="3" @if (isset($_REQUEST['filter'])) @if ($_REQUEST['filter']==3) checked @endif @endif>
                        <label class="form-check-label" for="exampleRadios3">
                            <strong>Year</strong>
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input filter" type="radio" name="filter" id="exampleRadios4" status="true" value="4" @if (isset($_REQUEST['filter'])) @if ($_REQUEST['filter']==4) checked @endif @endif>
                        <label class="form-check-label" for="exampleRadios4">
                            <strong>Custom by self</strong>
                        </label>
                    </div>
                    <div class="col-12 mb-2">
                        <input type="date" class="form-control" name="date_start" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="date-start" id='date-start' aria-label="date-start" aria-describedby="addon-wrapping" @if (isset($_REQUEST['filter'])) @if ($_REQUEST['filter']==4) @if ($_REQUEST['date_start'] !='' ) value="{{ $_REQUEST['date_start'] }}" @else @endif @else disabled @endif @else disabled @endif>
                    </div>
                    <div class="col-12 mb-2">
                        <input type="date" class="form-control" name="date_end" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="date-end" id='date-end' aria-label="date-end" aria-describedby="addon-wrapping" @if (isset($_REQUEST['filter'])) @if ($_REQUEST['filter']==4) @if ($_REQUEST['date_start'] !='' ) @if ($_REQUEST['date_end'] !='' ) value="{{ $_REQUEST['date_end'] }}" @else @endif @else disabled @endif @else disabled @endif @else disabled @endif>
                    </div>
                    <div class="col-12 ">
                        <input type="hidden" name="date" value="{{date('Y-m-d')}}">
                        <button type="submit" class=" mx-0 form-control d-flex justify-content-center align-items-center btn btns" style=""><i class="fa fa-search pr-2" aria-hidden="true"></i>ค้นหา</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')

<script>
    $('#select-submenu').on('change', function() {
        value = $(this).val();
        $('a.nav-link[href="#list-' + value + '"]').click();
    });
</script>
@endsection
@section('style')
<style>
    input[type="checkbox"] {
        display: inline-block;
        width: 19px;
        height: 19px;
        cursor: pointer;
        /*background-color: #000 !important;*/
        /*background:url(check_radio_sheet.png) left top no-repeat;*/
    }

    .swiper-container {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-container-5 {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #fff;
        background-color: #7BCFDD;
        border-color: #7BCFDD;
        border: none;

    }

    .nav-tabs .nav-link:hover {
        border: none;
        color: #fff;
        background-color: #7BCFDD;
    }

    .nav-tabs .nav-link {
        border: none;
    }

    .nav-tabs {
        border-bottom: 4px solid #7BCFDD;
    }

    .btn-color {
        background-color: #ededed;
        color: #495057;
        border-radius: 8px;
    }

    .table-bordered {
        border: unset !important;
    }
</style>
<!-- Modal -->
{{-- <div class="modal fade" id="Bank-Modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style='text-align : center'>
                <h4><strong>ถอนเงิน</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if(isset($user_shop_bank->bank_code))
                <div class="col-12px-0">
                    <div class="form-control rounded8px mb-3" id="bank-name"
                        style="background-color: #ededed; border: none;">{{ $user_shop_bank->bank_code }}</div>
<div class="form-control rounded8px mb-3" id="bank-name" style="background-color: #ededed; border: none;">{{ $user_shop_bank->bank_name }}</div>
<div class="form-control rounded8px" id="bank-name" style="background-color: #ededed; border: none;">{{ $user_shop_bank->bank_number }}</div>
</div>
<div class="col-12 mb-3 mt-3 px-0">
    <input type="text" class="form-control rounded8px" id="money_chk" required aria-describedby="emailHelp" placeholder="จำนวนเงินที่ต้องการถอน" style="background-color: #ededed; border: none;">
</div>
<div class="col-12 mb-3 mt-4 px-0">
    <div class='form-row'>
        <div class="col-6 mb-3 text-center">
            <button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
        </div>
        <div class="col-6 mb-3 text-center">
            <button class="btn btn-c75ba1 form-control text-white rounded8px" data-toggle="modal" id="send-to1" onclick="openchk_modal()" data-dismiss="modal">ส่งข้อความ</button>
        </div>
    </div>
</div>
@else
<div class="col-12 d-flex justify-content-center my-5 ">
    <img src="/img/Group 5063.svg" alt="">
</div>
<div class="col-12 d-flex justify-content-center my-5">
    <h5 style="color: grey;">ไม่พบบัญชีธนาคาร</h5>
</div>
<div class="col-12 d-flex justify-content-center my-4">
    <div class="col-12 p-1">
        <a href="/shop/addsellerbank" class="form-control btn btnsum">
            <button class='btn btn-primary form-control'>เพิ่มบัญชีธนาคาร</button>
        </a>
    </div>
</div>
@endif
</div>
</div>
</div>
</div> --}}


<!-- Modal -->
<div class="modal fade" id="Send-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form method="POST" action="/shop/seller-recommend/withdraw">
                @csrf
                <div class="modal-header pb-0" style="border-bottom: unset;">
                    <div class="col-12 position-relative">

                        <h5 class="modal-title text-center " id="exampleModalLabel"><strong>ต้องการถอนยอดเงินทั้งหมด</strong></h5>
                        <button type="button" class="close position-absolute" style="right: 5px; top: 0px;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" name="balance" class="form-control" id="priceNumber" value="{{ number_format($total_balance,2) }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0" style="border-top: unset;">
                    <div class="form-row w-100">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary form-control" data-dismiss="modal">ยกเลิก</button>
                        </div>
                        <div class="col-6">
                            {{-- <input type="hidden" name="balance" value="0">
                            <input type="hidden" name="inv" value="">
                            <input type="hidden" name="price" value="">
                            <input type="hidden" name="sale_id" value="">
                            <input type="hidden" name="shop" value="{{ $user_shop_bank->id }}"> --}}
                            <button type="submit" class="btn btn-c75ba1 form-control" id="withdraw_rec">ยืนยัน</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="Send-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header pb-0" style="border-bottom: unset;">
                <div class="col-12 position-relative">

                    <h5 class="modal-title text-center " id="exampleModalLabel">
                        <img src="new_ui/img/seller/purchase-history-4.svg" style="width: 20px; height: 20px;" alt="">
                        <strong style="color: #26c298;">ถอนเงินสำเร็จ</strong></h5>
                    <button type="button" class="close position-absolute" style="right: 5px; top: 0px;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <h6 class="text-center">คุณได้ทำการถอนเงินเรียบร้อยแล้ว<br>ขอบคุณค่ะ</h6>
            </div>
            <div class="modal-footer pt-0" style="border-top: unset;">
                <div class="form-row w-100">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-c75ba1 form-control w-25">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="Send-3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header pb-0" style="border-bottom: unset;">
                <div class="col-12 position-relative">

                    <h5 class="modal-title text-center " id="exampleModalLabel">
                        <img src="new_ui/img/seller/purchase-history-4.svg" style="width: 20px; height: 20px;" alt="">
                        <strong style="color: red;">ถอนเงินไม่สำเร็จ</strong></h5>
                    <button type="button" class="close position-absolute" style="right: 5px; top: 0px;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <h6 class="text-center">คุณไม่สามารถถอนเงินได้เนื่องจากมีข้อผิดพลาดบางประการ<br>กรุณาลองใหม่อีกครั้งค่ะ</h6>
            </div>
            <div class="modal-footer pt-0" style="border-top: unset;">
                <div class="form-row w-100">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-c75ba1 form-control w-25">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (Session::get('success'))
<script>
    $(function() {
        $('#Send-2').modal('show');
    });
</script>
@elseif(Session::get('error'))
<script>
    $(function() {
        $('#Send-3').modal('show');
    });
</script>
@endif

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        // var total_balance = $('#withdrawamount').text();
        // // console.log(total_balance);
        // if(total_balance < 1000){
        //     // $('.check').attr('disabled', true);
        // }

        $("input.filter").change(function() {
            // var chk_pass = $(this).attr('value');
            // var d = new Date();
            // var month = d.getMonth() + 1;
            // var day = d.getDate();
            var status = $(this).attr('status');
            var tdate_status = $("#date-start").val();
            if (status == 'true') {
                $('#date-start').prop("disabled", false);
                if (tdate_status != '') {
                    $('#date-end').prop("disabled", false);
                }
            } else {
                $('#date-start').prop("disabled", true);
                $('#date-end').prop("disabled", true);
            }
            // if (chk_pass == '1') {
            //     var today = d.getFullYear() + '-' +
            //         ((+month).length < 2 ? '0' : '') + month + '-' +
            //         ((+day).length < 2 ? '0' : '') + day;
            //     search_date(today);
            // } else if (chk_pass == '2') {
            //     var m1 = d.getFullYear() + '-' +
            //         ((+month).length < 2 ? '0' : '') + month + '-' +
            //         ((+day).length < 2 ? '0' : '') + '01';
            //     var m2 = d.getFullYear() + '-' +
            //         ((+month).length < 2 ? '0' : '') + month + '-' +
            //         ((+day).length < 2 ? '0' : '') + '31';
            //     search_date(m1, m2);
            // } else if (chk_pass == '3') {
            //     var y1 = d.getFullYear() + '-' +
            //         ((+month).length < 2 ? '0' : '') + '01' + '-' +
            //         ((+day).length < 2 ? '0' : '') + '01';
            //     var y2 = d.getFullYear() + '-' +
            //         ((+month).length < 2 ? '0' : '') + '12' + '-' +
            //         ((+day).length < 2 ? '0' : '') + '31';
            //     search_date(y1, y2);
            // }

        });

        $("#date-start").change(function() {
            $('#date-end').prop("disabled", false);
        });

        // function search_date(fdate, tdate) {
        //     $('.hd_row').remove();
        //     $('.pagination').remove();
        //     $.ajax({
        //         url: '/seller-wallet-search',
        //         type: 'POST',
        //         data: {
        //             value: fdate,
        //             value2: tdate,
        //             _token: '{{ csrf_token() }}',
        //         },
        //         success: function (data) {
        //             if (data.length > 0) {
        //                 $.each(data, function (key, value) {
        //                     $('#list-1-tab').html("ถอนเงิน (" + data.length + ")");
        //                     $('.table-bordered').append("<tbody class='hd_row'><tr>" +
        //                         "<td scope='row' data-label='เลือกรายการที่จะถอน' class='font_size_14px'" +
        //                         "<td scope='row' data-label='วันที่' class='font_size_14px'><div class='row'><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0'><strong>" +
        //                         value['date'] + "</strong></h6></div></div></td>" +
        //                         "<td data-label='รายละเอียด'><div class='row'><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0 text-dots'><strong>ถอนเงิน</strong></h6></div><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0' style='color: #919191;'>" +
        //                         value['bank_code'] + " " + value['bank_number'] +
        //                         "</h6></div></div></td>" +
        //                         "<td scope='row' data-label='วันที่'><div class='row'><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0'><strong style='color: #a83c23;'>-" +
        //                         value['amount'] + "</strong></h6></div></div></td>" +
        //                         "<td scope='row' data-label='วันที่'><div class='row'><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0'>" + 
        //                         value['status_t'] + 
        //                         "</h6></div></div></td>" +
        //                         "</tr></tbody>");
        //                 });
        //             } else {
        //                 $('#list-1-tab').html("ถอนเงิน (0)");
        //                 $('.pagefull').append(
        //                     "<div class='hd_row pt-3' style='background: white;'>" +
        //                     "<div class='col-12 d-flex justify-content-center'><img src='/img/Group 5063.svg' alt=''></div>" +
        //                     "<div class='col-12 d-flex justify-content-center my-5'><h5 style='color: grey;''>ไม่พบข้อมูล</h5></div>" +
        //                     "</div>");
        //                 console.log('ssss');
        //             }
        //         },
        //         error: function (data) {
        //             console.log("data", data);
        //         }
        //     });
        //     return false;
        // };

        // $("#date-end").on("change", function () {
        //     $('.hd_row').css("display", "none");
        //     var value = $("#date-start").val();
        //     var value2 = $(this).val();
        //     search_date(value, value2);
        // });

    });

    // function openchk_modal() {
    //     $('#Bank-Modal').modal('hide');
    //     $('#Send-1').modal('show');
    // }


    $(document).ready(function() {
        // $('#Send-1').on('shown.bs.modal', function() {
        //     var getmoney = $('#money_chk').val();
        //     $(this).find("#money_chg").html('฿ ' + getmoney);
        //     $(this).find("#balance").val(getmoney);
        // })
    });
</script>