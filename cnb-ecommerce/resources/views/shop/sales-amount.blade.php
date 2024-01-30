@extends('new_ui.layouts.front-end-seller')
@section('content')
@php
// dd($user_shops);
@endphp
<div class="row">
    <div class="col-xl-9 col-lg-12 col-md-12 col-12 px-4 px-lg-4 px-md-4 px-2 mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-12 px-4 pt-4 pb-0">
                <h3><strong>ยอดขายทั้งหมด</strong></h3>
            </div>
        </div>
        <div class="row px-lg-4 px-md-4 px-0 py-lg-4 py-md-4 py-4 mx-0 rounded8px" style="background-color: #f8eaf3;">
            <div class="col-lg-6 col-md-6 col-12">
                <h5 class="font_head_item"><img src="/new_ui/img/seller/icon_menu/icon_menu_3.svg" style="width: 25px;" class="mr-2"
                        alt=""><strong>ยอดขายที่สามารถถอนได้</strong></h5>
                <h3 style="color: #c75ba1;"><strong>{{ number_format($user_balance->seller_credit,2) }}</strong>
                </h3>
            </div>
            <div class="col-lg-4 col-md-3 col-12 d-flex align-items-center justify-content-end ml-auto flex-column">
                <div class="row">
                    <div class="col-12 mb-1 ">
                        <button class="btn btn-primary form-control" data-toggle="modal" data-target="#Send-1"><img
                        src="/new_ui/img/money.svg" style="width: 20px;" class="" alt="">ถอนเงิน</button>
                    </div>
                    <div class="col-12">
                        <h6 class="text-right font_size_14px text-danger">*1 บริษัทได้รับแจ้งความประสงค์ก่อน 12.00 น. ลูกค้าจะได้รับเงินภายในวันทำการนั้น</h6>
                        <h6 class="text-right font_size_14px text-danger">2. บริษัทได้รับแจ้งความประสงค์หลัง 12.00 น. ลูกค้าจะได้รับเงินในวันทำการวันถัดไป</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2 mx-0 mt-4">
            <div class="col-12 px-0">
                <div class="d-lg-block d-md-block d-none">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                aria-controls="list-1" aria-selected="true">ถอนเงิน ({{ count($user_shops) }})</a>
                        </li>
                    </ul>
                </div>
                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="3">ถอนเงิน ({{ count($user_shops) }})</option>
                    </select>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
                        @include('component.sales-amount-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3 mb-4 d-xl-block d-lg-none d-md-none d-none  "
        style="background-color: #fff; height: 100vh;position: fixed; right: 0;max-width: 21%;">
        <div class="row p-lg-4 p-md-2 p-2">
            <div class="col-12">
                <h4><strong>ตัวกรอง</strong></h4>
            </div>
            <div class="col-12">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="today" status="false"
                        value="1">
                    <label class="form-check-label" for="exampleRadios1">
                        <strong>วันนี้</strong>
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" status="false"
                        value="2">
                    <label class="form-check-label" for="exampleRadios2">
                        <strong>เดือนนี้</strong>
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" status="false"
                        value="3">
                    <label class="form-check-label" for="exampleRadios3">
                        <strong>ปีนี้</strong>
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" status="true"
                        value="4">
                    <label class="form-check-label" for="exampleRadios4">
                        <strong>Custom by self</strong>
                    </label>
                </div>
                <div class="col-12 mb-2">
                    <input type="date" disabled class="form-control"
                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                        placeholder="date-start" id='date-start' aria-label="date-start"
                        aria-describedby="addon-wrapping">
                </div>
                <div class="col-12">
                    <input type="date" disabled class="form-control"
                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                        placeholder="date-end" id='date-end' aria-label="date-end" aria-describedby="addon-wrapping">
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
@section('script')

<script>
    $('#select-submenu').on('change', function () {
        value = $(this).val();
        $('a.nav-link[href="#list-' + value + '"]').click();
    });

</script>
@endsection
@section('style')
<style>
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
        background-color: #c75ba1;
        border-color: #c75ba1;
        border: none;

    }

    .nav-tabs .nav-link:hover {
        border: none;
        color: #fff;
        background-color: #c75ba1;
    }

    .nav-tabs .nav-link {
        border: none;
    }

    .nav-tabs {
        border-bottom: 4px solid #c75ba1;
    }

    .btn-color {
        background-color: #ededed;
        color: #495057;
        border-radius: 8px;
    }

</style>
<!-- Modal -->
<div class="modal fade" id="Bank-Modal" role="dialog">
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
                    <div class="form-control rounded8px mb-3" id="bank-name"
                        style="background-color: #ededed; border: none;">{{ $user_shop_bank->bank_name }}</div>
                    <div class="form-control rounded8px" id="bank-name"
                        style="background-color: #ededed; border: none;">{{ $user_shop_bank->bank_number }}</div>
                </div>
                <div class="col-12 mb-3 mt-3 px-0">
                    <input type="text" class="form-control rounded8px" id="money_chk" required
                        aria-describedby="emailHelp" placeholder="จำนวนเงินที่ต้องการถอน"
                        style="background-color: #ededed; border: none;">
                </div>
                <div class="col-12 mb-3 mt-4 px-0">
                    <div class='form-row'>
                        <div class="col-6 mb-3 text-center">
                            <button class="btn form-control text-white rounded8px" data-dismiss="modal"
                                style="background-color: #b2b2b2;">ยกเลิก</button>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <button class="btn btn-c75ba1 form-control text-white rounded8px" data-toggle="modal"
                                id="send-to1" onclick="openchk_modal()" data-dismiss="modal">ส่งข้อความ</button>
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
</div>


<!-- Modal -->
<div class="modal fade" id="Send-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header pb-0" style="border-bottom: unset;">
                <div class="col-12 position-relative">

                    <h5 class="modal-title text-center " id="exampleModalLabel"><strong>กรุณายืนยัน</strong></h5>
                    <button type="button" class="close position-absolute" style="right: 5px; top: 0px;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <h6 class="text-center">ยอดถอน <strong style="color: #c75ba1;">3 รายการ</strong> คุณต้องการถอนเงินจำนวน <strong style="color: #c75ba1;"> 2,015 </strong>
                    ใช่หรือไม่
                </h6>
            </div>
            <form action="{{route('submitWithDraw')}}" method="POST">
                <input type="text" name="balance" id="balance" hidden>
                <div class="modal-footer pt-0" style="border-top: unset;">
                    <div class="form-row w-100">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary form-control"
                                data-dismiss="modal">ยกเลิก</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-c75ba1 form-control ">ยืนยัน</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
{{-- <div class="modal fade" id="Send-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> --}}
<!-- Modal -->
{{-- <div class="modal fade" id="Send-3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <h6 class="text-center">คุณไม่สามารถถอนเงินได้เนื่องจากยอดไม่เพียงพอ<br>กรุณาลองใหม่อีกครั้งค่ะ</h6>
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
</div> --}}

@if (Session::get('success'))
<script>
    $(function () {
        $('#Send-2').modal('show');
    });

</script>
@elseif(Session::get('error'))
<script>
    $(function () {
        $('#Send-3').modal('show');
    });

</script>
@endif

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $("input.form-check-input").change(function () {
            var chk_pass = $(this).attr('value');
            var d = new Date();
            var month = d.getMonth() + 1;
            var day = d.getDate();
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
            if (chk_pass == '1') {
                var today = d.getFullYear() + '-' +
                    ((+month).length < 2 ? '0' : '') + month + '-' +
                    ((+day).length < 2 ? '0' : '') + day;
                search_date(today);
            } else if (chk_pass == '2') {
                var m1 = d.getFullYear() + '-' +
                    ((+month).length < 2 ? '0' : '') + month + '-' +
                    ((+day).length < 2 ? '0' : '') + '01';
                var m2 = d.getFullYear() + '-' +
                    ((+month).length < 2 ? '0' : '') + month + '-' +
                    ((+day).length < 2 ? '0' : '') + '31';
                search_date(m1, m2);
            } else if (chk_pass == '3') {
                var y1 = d.getFullYear() + '-' +
                    ((+month).length < 2 ? '0' : '') + '01' + '-' +
                    ((+day).length < 2 ? '0' : '') + '01';
                var y2 = d.getFullYear() + '-' +
                    ((+month).length < 2 ? '0' : '') + '12' + '-' +
                    ((+day).length < 2 ? '0' : '') + '31';
                search_date(y1, y2);
            }
        });

        $("#date-start").change(function () {
            $('#date-end').prop("disabled", false);
        });

        function search_date(fdate, tdate) {
            $('.hd_row').remove();
            $('.pagination').remove();
            $.ajax({
                url: '/seller-wallet-search',
                type: 'POST',
                data: {
                    value: fdate,
                    value2: tdate,
                    _token: '{{ csrf_token() }}',
                },
                success: function (data) {
                    if (data.length > 0) {
                        $.each(data, function (key, value) {
                            $('#list-1-tab').html("ถอนเงิน (" + data.length + ")");
                            $('.table-bordered').append("<tbody class='hd_row'><tr>" +
                                "<td scope='row' data-label='วันที่'><div class='row'><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0'><strong>" +
                                value['date'] + "</strong></h6></div></div></td>" +
                                "<td data-label='รายละเอียด'><div class='row'><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0 text-dots'><strong>ถอนเงิน</strong></h6></div><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0' style='color: #919191;'>" +
                                value['bank_code'] + " " + value['bank_number'] +
                                "</h6></div></div></td>" +
                                "<td scope='row' data-label='วันที่'><div class='row'><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0'><strong style='color: #a83c23;'>-" +
                                value['amount'] + "</strong></h6></div></div></td>" +
                                "<td scope='row' data-label='วันที่'><div class='row'><div class='col-12 mb-2 text-lg-left text-md-right text-sm-right'><h6 class='mb-0'>" + 
                                value['status_t'] + 
                                "</h6></div></div></td>" +
                                "</tr></tbody>");
                        });
                    } else {
                        $('#list-1-tab').html("ถอนเงิน (0)");
                        $('.pagefull').append(
                            "<div class='hd_row pt-3' style='background: white;'>" +
                            "<div class='col-12 d-flex justify-content-center'><img src='/img/Group 5063.svg' alt=''></div>" +
                            "<div class='col-12 d-flex justify-content-center my-5'><h5 style='color: grey;''>ไม่พบข้อมูล</h5></div>" +
                            "</div>");
                        console.log('ssss');
                    }
                },
                error: function (data) {
                    console.log("data", data);
                }
            });
            return false;
        };

        $("#date-end").on("change", function () {
            $('.hd_row').css("display", "none");
            var value = $("#date-start").val();
            var value2 = $(this).val();
            search_date(value, value2);
        });
    });

    function openchk_modal() {
        $('#Bank-Modal').modal('hide');
        $('#Send-1').modal('show');
    }


    $(document).ready(function () {
        $('#Send-1').on('shown.bs.modal', function () {
            var getmoney = $('#money_chk').val();
            $(this).find("#money_chg").html('฿ ' + getmoney);
            $(this).find("#balance").val(getmoney);
        })
    });

</script>
