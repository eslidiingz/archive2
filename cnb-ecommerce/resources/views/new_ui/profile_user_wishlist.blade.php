@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .o-btn-purple {
        border-radius: 8px;
        background-color: #c75ba1;
        padding: 10px;
        color: #ffffff;
        border: 0px;
        width: 100px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
    }

    .o-btn-no-item {
        border-radius: 8px;
        background-color: #b2b2b2;
        padding: 10px;
        color: #ffffff;
        border: 0px;
        width: 100px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
    }

    .title_respon {
        text-align: right;
        padding-top: 15px;
    }

    @media (min-width: 760px) {

        .title_respon {
            text-align: left;
            padding-top: 0px;
        }

        .tdres {
            width: 70%;
        }

        .t-border-n {
            border: none;
        }
    }

    .nav-link.active {
        color: white !important;
        background-color: #c75ba1 !important;
    }

    .non_item {
        background-color: white;
        position: absolute;
        top: 26px;
        left: 31px;
        font-size: 14px;
        background: rgba(255, 255, 255, .6);
        color: black;
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
                                        <div class=' col-lg-8 col-md-8 col-sm-12'>
                                            <h3><strong>วิสลิสต์ ของฉัน</strong></h3>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-2" style='text-align : right; text-decoration: underline;'>
                                            <a href='#' style='color:#1947e3'>เพิ่มสินค้าทั้งหมดไปยังรถเข็น</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 pt-4 px-0">
                                    <div class="d-lg-block d-md-block d-none">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist" style='background-color : white '>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="true">รายการที่ชอบ (5)</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group d-lg-none d-md-none d-block">
                                        <select class="form-control" id="select-submenu">
                                            <option value="1">รายการที่ชอบ</option>
                                        </select>
                                    </div>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
                                            @include('new_ui.user_seller.user-wistlist-all')
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