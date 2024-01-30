@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .o-btn-purple {
        background-color: #c75ba1;
        padding: 10px;
        color: #ffffff;
        border: 0px;
        width: 100px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
    }

    .o-btn-white {
        border-radius: 6px;
        background-color: #ffffff;
        padding: 10px;
        color: #c75ba1;
        border: 0px;
        padding: .375rem .75rem;
        position: absolute;
        bottom: -10px;
        transform: translate(-50%, -50%)
    }

    .o-btn-white-gray {
        border-radius: 6px;
        background-color: #d9d9d9;
        padding: 10px;
        color: #ffffff;
        border: 0px;
        padding: .375rem .75rem;
        position: absolute;
        bottom: -10px;
        transform: translate(-50%, -50%)
    }

    .title_posit {
        text-align: right;
    }

    @media (min-width: 768px) {
        .title_posit {
            text-align: left;
        }
    }

    .nav-link.active {
        color: white !important;
        background-color: #c75ba1 !important;
    }

    .ticket_left {
        background-color: #f8eaf3;
        border-radius: 6px;
    }

    .ticket_right {
        background-color: #42294f;
        border-radius: 6px;
        color: white;
    }

    .nav-tabs {
        border-bottom: 5px solid #c75ba1 !important;
    }

    .nav-tabs .nav-link {
        border-bottom: 1px solid #c75ba1 !important;
    }

</style>
@endsection

@section('content')
<div class="container">
    <div class="col-12 pb-4 px-0 d-flex flex-row">
        <div class="col-3 d-xl-block d-lg-none d-md-none d-none px-0">
            @include('includes._menu_left_user_profile')
        </div>
        <div class="col-xl-9 col-lg-12 col-md-12 col-12 pt-4 px-0">
            <div class="col-12 px-1 py-3" style='border-bottom: 1px solid #d9d9d9;'>
                <div class='row'>
                    <div class='col-12'>
                        <h3><strong>คูปอง / ส่วนลดของฉัน</strong></h3>
                    </div>
                </div>
            </div>
            <div class='row pt-4' style='text-align:center'>
                <div class='col-lg-7 col-6 pr-0'>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="ใส่โค้ดส่วนลด">
                </div>
                <div class='col-lg-2 col-5 pl-0 '>
                    <button class='o-btn-purple px-0'>เก็บโคดส่วนลด</button>
                </div>
            </div>
            <div class="col-12 pt-4 px-0">
                <div class="d-lg-block d-md-block d-none">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style='background-color : white '>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                aria-controls="list-1" aria-selected="true">ทั้งหมด (30)</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab"
                                aria-controls="list-2" aria-selected="false">แคมเปญ (20)</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab"
                                aria-controls="list-3" aria-selected="false">ส่วนลดเฉพาะร้านค้า (10)</a>
                        </li>
                    </ul>
                </div>
                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="1">ทั้งหมด (30)</option>
                        <option value="2">แคมเปญ (20)</option>
                        <option value="3">ส่วนลดเฉพาะร้านค้า (10)</option>
                    </select>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
                        @include('new_ui.user_seller.user-coupon-all')
                    </div>
                    <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
                        @include('new_ui.user_seller.user-coupon-campaint')
                    </div>
                    <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-tab">
                        @include('new_ui.user_seller.user-coupon-shop')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        function add_new_topup() {
                $('#topup-wallet').modal('hide');
                $('#new-topup-wallet').modal('show');
            }

            function waiting_modal() {
                $('#topup-wallet').modal('hide');
                $('#waiting-topup-wallet').modal('show');
            }

            function otp_modal() {
                $('#waiting-topup-wallet').modal('hide');
                $('#otp-topup-wallet').modal('show');
            }

            function success_modal() {
                $('#otp-topup-wallet').modal('hide');
                $('#success-topup-wallet').modal('show');
            }

            $('.o-bank-hover').hover(function() {
                $('.hover').fadeIn(1000);
            }, function() {
                $('.hover').fadeOut(1000);
            });

            $('#select-submenu').on('change', function() {
                value = $(this).val();
                $('a.nav-link[href="#list-' + value + '"]').click();
            });
    </script>
    @endsection