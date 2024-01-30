@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .o-btn-purple {
        border-radius: 8px;
        background-color: #f8eaf3;
        padding: 10px;
        color: #c75ba1;
        border: 0px;
        width: 100px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
    }

    @media (min-width: 768px) {}
</style>
@endsection

@section('content')
    <div class="container">
                        <div class="col-12 pb-4 px-0 d-flex flex-row">
                            <div class="col-3 d-xl-block d-lg-none d-md-none d-none px-0">
                                @include('new_ui._menu_left_user_profile')
                            </div>
                            <div class="col-xl-9 col-lg-12 col-md-12 col-12 pt-4 px-0">
                                <div class="col-12 px-1 py-3" style='border-bottom: 1px solid #d9d9d9;'>
                                    <div class='row'>
                                        <div class=' col-lg-9 col-md-9 col-sm-12'>
                                            <h3><strong>การแจ้งเตือน</strong></h3>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-2" style='text-align : right; text-decoration: underline;'>
                                            <a href='#' style='color:#1947e3'>ทำเครื่องหมายอ่านแล้วทั้งหมด</a>
                                        </div>
                                    </div>
                                </div>

                                    <div class='col-12 py-3'>
                                        <div class='row'>
                                            <div class='col-lg-2 col-md-2'>
                                                <img src='new_ui/img/user_icon_menu/t10-pic.png' style='width:100px'>
                                            </div>
                                            <div class='col-lg-8 col-md-8'>
                                                <a href='#' style='color:black'><strong>ได้เงินคืน</strong></a>
                                                <p>ได้เงินคืน 1000 Credits จากการซื้อของหมายเลขการซื้อ 20021496M4SGS2 </p>
                                                <a style='color:#c75ba1'><strong>23/05/20 11:30</strong></a>
                                            </div>
                                            <div class='col-lg-2 col-md-2'>
                                                <button class='o-btn-purple '>ดูรายละเอียด</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-12 py-3'>
                                        <div class='row'>
                                            <div class='col-lg-2 col-md-2'>
                                                <img src='new_ui/img/user_icon_menu/t10-pic.png' style='width:100px'>
                                            </div>
                                            <div class='col-lg-8 col-md-8'>
                                                <a href='#' style='color:black'><strong>ได้เงินคืน</strong></a>
                                                <p>ได้เงินคืน 1000 Credits จากการซื้อของหมายเลขการซื้อ 20021496M4SGS2 </p>
                                                <a style='color:#c75ba1'><strong>23/05/20 11:30</strong></a>
                                            </div>
                                            <div class='col-lg-2 col-md-2'>
                                                <button class='o-btn-purple '>ดูรายละเอียด</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-12 py-3'>
                                        <div class='row'>
                                            <div class='col-lg-2 col-md-2'>
                                                <img src='new_ui/img/user_icon_menu/t10-pic.png' style='width:100px'>
                                            </div>
                                            <div class='col-lg-8 col-md-8'>
                                                <a href='#' style='color:black'><strong>ได้เงินคืน</strong></a>
                                                <p>ได้เงินคืน 1000 Credits จากการซื้อของหมายเลขการซื้อ 20021496M4SGS2 </p>
                                                <a style='color:#c75ba1'><strong>23/05/20 11:30</strong></a>
                                            </div>
                                            <div class='col-lg-2 col-md-2'>
                                                <button class='o-btn-purple '>ดูรายละเอียด</button>
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