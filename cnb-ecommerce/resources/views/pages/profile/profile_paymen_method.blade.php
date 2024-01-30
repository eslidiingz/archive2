@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .title_posit {
        text-align: left;
    }

    .o-btn-purple {
        border-radius: 8px;
        background-color: #f8eaf3;
        padding: 10px;
        color: #c75ba1;
        border: 0px;
        width: 100px;
    }

    .o-btn {
        border-radius: 8px;
        background-color: #226fff;
        padding: 10px;
        color: white;
        border: 0px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
    }

    .o-bg-box {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.16);
    }

    @media (min-width: 280px) {
        .img-res {
            width: 11px;
        }

        .card_res {
            width: 30px;
        }

        .text-res {
            font-size: 12px;
        }

    }

    @media (min-width: 350px) {
        .img-res {
            width: 20px;
        }

        .card_res {
            width: 40px;
        }

        .text-res {
            font-size: 16px;
        }

    }

    @media (min-width: 768px) {
        .title_posit {
            text-align: left;
        }

        .img-res {
            width: 20px;
        }

        .card_res {
            width: 60px;
        }

        .text-res {
            font-size: 24px;
        }
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
                    <div class=' col-lg-9 col-md-9 col-sm-12'>
                        <h3><strong>บัตรเครดิต / บัตรเดบิต</strong></h3>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-2" style='text-align : right;'>
                        <button class="o-btn" data-toggle="modal" data-target="#add_payment">+ บัตรเครดิต /
                            บัตรเดบิต</button>
                    </div>
                </div>
            </div>
            <div class='col-lg-12 col-12 px-0'>
                <div class='col-lg-12 col-md-12 col-12 px-0 mt-4 o-bg-box'>
                    <div>
                        <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-3 title_posit">
                                    <img class='card_res' src="new_ui/img/user_icon_menu/master-card.svg">
                                </div>
                                <div class="col-lg-8 col-md-7 col-6 mb-2 pt-1 text-res" style='color : #a9a9a9'>
                                    <strong>**** **** **** 2881</strong>
                                </div>
                                <div class="col-lg-2 col-md-3 col-3 title_posit" style='text-align:right'>
                                    <a href='#'>
                                        <img class='img-res' src="new_ui/img/user_icon_menu/edit-black.png"
                                            style="margin-right: 5px;">
                                    </a>
                                    <a href='#'>
                                        <img class='img-res' src="new_ui/img/user_icon_menu/bin-icon.svg">
                                    </a>
                                </div>
                            </div>
                            <div class='col-12 pt-4 px-4'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-lg-12 col-12 px-0 '>
                <div class='col-lg-12 col-md-12 col-12 px-0 mt-4 o-bg-box'>
                    <div>
                        <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-3 title_posit">
                                    <img class='card_res' src="new_ui/img/user_icon_menu/master-card.svg">
                                </div>
                                <div class="col-lg-8 col-md-7 col-6 mb-2 pt-1 text-res" style='color : #a9a9a9'>
                                    <strong>**** **** **** 2881</strong>
                                </div>
                                <div class="col-lg-2 col-md-3 col-3 title_posit" style='text-align:right'>
                                    <a href='#'>
                                        <img class='img-res' src="new_ui/img/user_icon_menu/edit-black.png"
                                            style="margin-right: 5px;">
                                    </a>
                                    <a href='#'>
                                        <img class='img-res' src="new_ui/img/user_icon_menu/bin-icon.svg">
                                    </a>
                                </div>
                            </div>
                            <div class='col-12 pt-4 px-4'>
                            </div>
                        </div>
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

<!-- Modal -->
<div class="modal fade" id="add_payment" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style='text-align : center'>
                <h4>เพิ่มบัตรเครดิท / เดบิต</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-12 mb-3 mt-4 ">
                    <img src="new_ui/img/user_icon_menu/pay-method.png" style='width:150px;'>
                </div>
                <div class="col-12 mb-3 mt-4 ">
                    <input type="text" class="form-control rounded8px" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="หมายเลขบัตร"
                        style="background-color: #ededed; border: none;">
                </div>
                <div class="col-12 mb-3 mt-4 ">
                    <input type="text" class="form-control rounded8px" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="ชื่อที่ผูกกับบัตร"
                        style="background-color: #ededed; border: none;">
                </div>
                <div class='d-flex flex-row'>
                    <div class="col-6 mb-3">
                        <div class="form-group">
                            <select class="form-control rounded8px" style="background-color: #ededed; border: none;"
                                id="exampleFormControlSelect1">
                                <option>เดือนปีหมดอายุ</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mb-3 ">
                        <input type="text" class="form-control rounded8px" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="CVV"
                            style="background-color: #ededed; border: none;">
                    </div>
                </div>
                <div class="col-12 mb-3 mt-4 ">
                    <div class='row'>
                        <div class="col-6 mb-3 text-center">
                            <button class="btn form-control text-white rounded8px" data-dismiss="modal"
                                style="background-color: #b2b2b2;">ยกเลิก</button>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <button class="btn form-control text-white rounded8px" onclick="myFunction()"
                                style="background-color: #c75ba1;">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal -->