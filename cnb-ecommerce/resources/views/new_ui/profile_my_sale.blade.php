@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .o-btn {
        border-radius: 6px;
        background-color: #ffffff;
        padding: 10px;
        color: #c45e9f;
        border: 1px;
        width: 100px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        border-style: solid;
        border-color: #c45e9f;
    }

    .o-btn-purple {
        border-radius: 6px;
        background-color: #422a4e;
        padding: 10px;
        color: #ffffff;
        border: 1px;
        width: 100px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        border-style: solid;
        border-color: #c45e9f;
    }

    .title_posit {
        text-align: right;
    }

    @media (min-width: 768px) {
        .title_posit {
            text-align: left;
        }

        .bd-r{
            border-right : 1px #666666 solid
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

    .nav-tabs .nav-link {
        background-color: #efefef;
        border: 1px #707070 solid !important;
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
                                            <h3><strong>การซื้อของฉัน</strong></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 pt-4 px-0">
                                    <div class="d-lg-block d-md-block d-none">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="true">ทั้งหมด (20)</a>
                                            </li>
                                            <!-- <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab" aria-controls="list-2" aria-selected="false">ที่ต้องชำระ (2)</a>
                                            </li> -->
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab" aria-controls="list-3" aria-selected="false">ที่ต้องจัดส่ง (2)</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="list-4-tab" data-toggle="tab" href="#list-4" role="tab" aria-controls="list-4" aria-selected="false">ที่ต้องได้รับ (2)</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="list-5-tab" data-toggle="tab" href="#list-5" role="tab" aria-controls="list-5" aria-selected="false">สำเร็จ (2)</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group d-lg-none d-md-none d-block">
                                        <select class="form-control" id="select-submenu">
                                            <option value="1">ทั้งหมด (20)</option>
                                            <!-- <option value="2">ที่ต้องชำระ (2)</option> -->
                                            <option value="3">ที่ต้องจัดส่ง (2)</option>
                                            <option value="4">ที่ต้องได้รับ (2)</option>
                                            <option value="5">สำเร็จ (2)</option>
                                        </select>
                                    </div>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
                                            @include('new_ui.user_seller.user-mylist-all')
                                        </div>
                                        <!-- <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
                                            @include('new_ui.user_seller.user-list-all2')
                                        </div> -->
                                        <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-tab">
                                            @include('new_ui.user_seller.user-list-all3')
                                        </div>
                                        <div class="tab-pane fade" id="list-4" role="tabpanel" aria-labelledby="list-4-tab">
                                            @include('new_ui.user_seller.user-list-all2')
                                        </div>
                                        <div class="tab-pane fade" id="list-5" role="tabpanel" aria-labelledby="list-5-tab">
                                            @include('new_ui.user_seller.user-list-all3')
                                        </div>
                                    </div>
                                </div>
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