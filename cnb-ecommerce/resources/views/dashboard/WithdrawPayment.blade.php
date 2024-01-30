@extends('layouts.dashboard')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<style>
    .box {
        height: calc(100vh - 200px);
        ;
    }

    .top {
        margin-top: 100px;
    }

    .nav-tabs {
        border-bottom: 5px solid #346751 !important;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .nav-tabs .nav-link {
        border-bottom: 1px solid #346751 !important;
        border-top-left-radius: 8px !important;
        border-top-right-radius: 8px !important;
        padding-bottom: 10px !important;
    }

    .nav-item {
        font-size: 16px !important;
        padding-right: 5px !important;
    }

    .nav-link {
        color: black !important;
        background: #efefef;
    }

    .table.dataTable.no-footer {
        border: unset;
    }

    .table.dataTable tbody tr {
        background-color: #ffffff;
    }
    .table td, .table th {
        padding: .75rem;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
    }
    .table thead th {
        vertical-align: middle;
        border-bottom: 2px solid #dee2e6;
    }
    .modal-dialog{
        width: 100%;
        max-width:960px;
    }
    .table-modal div {
        border: solid 1px;
    }
</style>
@php
// dd($invs);
@endphp

<div class="container-fluid px-0" style='background:#efefef'>
    <div class="row">
        <div class="col-xl-12 col-12 ml-xl-auto">
            <h5 class="mt-4"><b>ร้านค้าขอถอนเงิน</b>
            </h5>
            <div class=" text-center">
                <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active  nav-manage" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                aria-controls="list-1" aria-selected="true">ทั้งหมด
                                ({{ $user_withdraw->total() }})</a>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab"
                                aria-controls="list-2" aria-selected="false">รอการอนุมัติ
                                ({{ count($user_withdraw) }})</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab"
                                aria-controls="list-3" aria-selected="false">อนุมัติสำเร็จ
                                ({{ count($user_withdraw) }})</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="list-4-tab" data-toggle="tab" href="#list-4" role="tab"
                                aria-controls="list-4" aria-selected="false">ปฏิเสธการอนุมัติ
                                ({{ count($user_withdraw) }})</a>
                        </li> --}}
                    </ul>
                </div>

                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="1">ทั้งหมด ({{ $user_withdraw->total() }})</option>
                        {{-- <option value="2">รอการอนุมัติ ({{ count($user_withdraw) }})</option>
                        <option value="3">อนุมัติสำเร็จ ({{ count($user_withdraw) }})</option>
                        <option value="4">ปฏิเสธการอนุมัติ ({{ count($user_withdraw) }})</option> --}}
                    </select>
                </div>
                {{-- SEARCH --}}
                <div class="col-lg-12 col-md-12 col-12 py-4" style="background: #fff;">
                    <form role="search" action="/dashboard/withdraw" method="GET">
                        {{-- @csrf --}}
                        <div class="input-group flex-wrap mb-3 mt-3 justify-content-center">
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">สถานะดำเนินการ</h6>
                            </div>
                            <select class="form-control col-lg-2" id="status" name='status'>
                                <option id='status_chk' value='0'>ทั้งหมด</option>
                                <option id='status_chk' value='1'>รอดำเนินการ</option>
                                <!--option id='status_chk' value='2'>โอนเงินเข้าวอลเล็ท</option-->
                                <option id='status_chk' value='3'>ดำเนินการแล้ว</option>
                                <option id='status_chk' value='99'>ยกเลิก</option>
                            </select>
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">ชื่อร้านค้า</h6>
                            </div>
                            @if (isset($_REQUEST['shop_name']))
                            <input type="text" name="shop_name" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['shop_name'] }}" placeholder="ชื่อร้านค้า" aria-label="shop_name"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="shop_name" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="ชื่อร้านค้า" aria-label="shop_name" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">จำนวนเงิน</h6>
                            </div>
                            @if (isset($_REQUEST['amount']))
                            <input type="number" name="amount" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['amount'] }}" placeholder="จำนวนเงิน" aria-label="amount"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="number" name="amount" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="จำนวนเงิน" aria-label="amount" aria-describedby="addon-wrapping">
                            @endif
                            
                        </div>
                        <div class="input-group flex-wrap pt-2 justify-content-center">
                            <input hidden type="search" name="search" class="form-control"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="search" placeholder="ค้นหาสินค้า" aria-label="search"
                                aria-describedby="addon-wrapping">
                            <div class="col-lg-auto d-flex align-items-center col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">วันที่ทำการถอน</h6>
                            </div>
                            <div class="col-lg-3 col-md-5 col-5">
                                @if (isset($_REQUEST['date_start']))
                                <input type="date" name="date_start" value="{{ $_REQUEST['date_start'] }}"
                                    class="form-control"
                                    style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                    placeholder="date-start" aria-label="date-start" aria-describedby="addon-wrapping">
                                @else
                                <input type="date" name="date_start" class="form-control"
                                    style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                    placeholder="date-start" aria-label="date-start" aria-describedby="addon-wrapping">
                                @endif
                            </div>
                            <div class="col-lg-3 col-md-5 col-5">
                                @if (isset($_REQUEST['date_end']))
                                <input type="date" name="date_end" value="{{ $_REQUEST['date_end'] }}"
                                    class="form-control"
                                    style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                    placeholder="date-end" aria-label="date-end" aria-describedby="addon-wrapping">
                                @else
                                <input type="date" name="date_end" class="form-control"
                                    style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                    placeholder="date-end" aria-label="date-end" aria-describedby="addon-wrapping">
                                @endif
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mb-2">
                                <input type="submit" value="ค้นหา" name="filter" id="filter" class="form-control btn btn-main-set">
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mb-2">
                                <a href="/dashboard/withdraw"><input type="button" value="ล้างค่า" class="form-control btn " style="background-color: #ffc107"></a>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- SEARCH --}}

                <div class="w-100">
                    <div class="tab-content">
                        {{-- 1taphome --}}
                        <div class="w-100 mb-4 pb-4" style="background: #fff;border-radius: 0 0 15px 15px;">
                            <div class="col-lg-2 col-md-3 col-12 m-auto py-3">
                                <a href="/dashboard/inprogress_inv/excel" class="btn btn-success form-control"><i
                                        class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel </a>
                            </div>

                        </div>
                        <form action="/dashboard/check_inprocess" method="post">
                            @csrf
                            <!-- <div class="col-lg-2 col-12 m-auto">
                                <button class="btn btn-success form-control"><i class="fa fa-check"
                                        aria-hidden="true"></i> เช็ค </button>
                            </div> -->

                            <div class="row justify-content-center tab-pane fade show active " id="list-1" style="padding-left: 10px !important; padding-right: 10px !important;">
                                <div class="container-fluid table-responsive" style="background: #fff;padding-top: 10px;padding-left: 10px;padding-right: 10px;border-radius: 15px 15px 0 0;">
                                    <div class="card" style="border: none;">
                                        <div class="card-body m-2 p-0 ">
                                            <table class="table table-striped">
                                                <thead class="thead-blue">
                                                    <tr>
                                                        <!-- <th>ตรวจสอบ <input type="checkbox" id="check_all"> </th> -->
                                                        <th scope="col">รอบวันโอนเงิน</th>
                                                        <th style="width:150px" scope="col">ชื่อร้าน</th>
                                                        <th scope="col">ประเภทการขอถอน</th>
                                                        <th scope="col">จำนวนเงิน</th>
                                                        <th style="width:150px" scope="col">สถานะ</th>
                                                        <th scope="col">ดำเนินการ</th>
                                                        <th scope="col">ผู้ดำเนินการ</th>
                                                    </tr>
                                                </thead>
                                                @if(count($user_withdraw)>0)
                                                <tbody>
                                                    @php
                                                    $count =0;
                                                    @endphp
                                                    @foreach($user_withdraw as $key=>$withdraw_data)
                                                    <tr style="text-align: center; align-items: center;">
                                                        <!-- <td>
                                                            <input type="checkbox" name="approve[]"
                                                                value="{{ $withdraw_data->id }}">
                                                        </td> -->

                                                        <td data-label="รอบวันโอนเงิน">
                                                            {{ $withdraw_data->account_date }}
                                                        </td>
                                                        <td data-label="ชื่อร้าน" style="font-weight:bold;">
                                                            {{ $withdraw_data->shop->shop_name }}
                                                        </td>
                                                        <td data-label="ประเภทการขอถอน">
                                                            {{ $withdraw_data->type }}
                                                        </td>
                                                        <td data-label="จำนวนเงิน" class="color-price">
                                                            {{ ($withdraw_data->type == 'Crypto') ? 'USDC '.number_format($withdraw_data->usdc,3) : '฿ '.number_format($withdraw_data->amount,0) }}
                                                        </td>
                                                        <td data-label="สถานะ">
                                                            @if($withdraw_data->status == '0')
                                                            <b class="color-yallow">withdrawable</b>
                                                            @elseif($withdraw_data->status == '99')
                                                            <b class="color-price">ยกเลิก</b>
                                                            @elseif($withdraw_data->status == '1')
                                                            <b class="color-yallow">รอดำเนินการ</b>
                                                            @elseif($withdraw_data->status == '2')
                                                            <b class="color-green">โอนเงินเข้าวอลเล็ท</b>
                                                            @else
                                                            <b class="color-green">ดำเนินการแล้ว</b>
                                                            @endif
                                                        </td>

                                                        <td data-label="ดำเนินการ"
                                                            style='text-decoration: underline;color:#226fff'>
                                                            @if($withdraw_data->status == '1')
                                                            <a id="aPopWithdraw_chk_{{ $withdraw_data->id }}" data-toggle="modal"
                                                                data-target="#chk_status{{ $withdraw_data->id }}" data-id="{{ implode(',',$withdraw_data->inv_ids) }}">
                                                                <button class="btn btn-success form-control"><i class="fa fa-check"
                                                                                            aria-hidden="true"></i> ยืนยันการถอนเงิน </button>

                                                            </a>
                                                            @elseif($withdraw_data->status == '3')
                                                            <a id="aPopWithdraw_chk_{{ $withdraw_data->id }}" data-toggle="modal"
                                                                data-target="#chk_status{{ $withdraw_data->id }}" data-id="{{ implode(',',$withdraw_data->inv_ids) }}">
                                                                <button class="btn btn-success form-control"><i class="fa fa-check"
                                                                                            aria-hidden="true"></i> เรียกดู </button>

                                                            </a>
                                                            @endif
                                                        </td>
                                                        @if(isset($withdraw_data->approve_user->name))
                                                        <td data-label="ผู้ดำเนินการ">
                                                            {{ @$withdraw_data->approve_user->name }}
                                                            ({{@$withdraw_data->approve_user->username}})
                                                        </td>
                                                        @else
                                                        <td data-label="ผู้ดำเนินการ">
                                                            -
                                                        </td>
                                                        @endif
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="chk_status{{$withdraw_data->id}}"
                                                            role="dialog">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        รายละเอียดการขอถอนเงิน
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="d-flex flex-wrap pt-3">
                                                                            <div class="col-3 text-left">
                                                                                <b>รอบวันโอนเงิน :</b>
                                                                            </div>
                                                                            <div class="col-3 text-right">
                                                                                <b style="color:#d61900;">{{ $withdraw_data->account_date }}</b>
                                                                            </div>
                                                                            <div class="col-3 text-left">
                                                                                <b>สถานะ :</b>
                                                                            </div>
                                                                            <div class="col-3 text-right">
                                                                                @if($withdraw_data->status == '0')
                                                                                <b class="color-yallow">withdrawable</b>
                                                                                @elseif($withdraw_data->status == '99')
                                                                                <b class="color-price">ยกเลิก</b>
                                                                                @elseif($withdraw_data->status == '1')
                                                                                <b class="color-yallow">รอดำเนินการ</b>
                                                                                @elseif($withdraw_data->status == '2')
                                                                                <b class="color-green">โอนเงินเข้าวอลเล็ท</b>
                                                                                @else
                                                                                <b class="color-green">Withdrawed</b>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-wrap pt-3">
                                                                            <div class="col-3 text-left">
                                                                                <b>ชื่อร้าน :</b>
                                                                            </div>
                                                                            <div class="col-3 text-right">
                                                                                <b style="color:#d61900;">{{ $withdraw_data->shop_name }}</b>
                                                                            </div>
                                                                            <div class="col-3 text-left">
                                                                                <b>เบอร์โทรศัพท์ร้านค้า :</b>
                                                                            </div>
                                                                            <div class="col-3 text-right">
                                                                                <b style="color:#d61900;">
                                                                                    @if ($withdraw_data->user != null)
                                                                                        <a href="tel:{{ @$withdraw_data->user->phone }}" class="text-dark">{{ @$withdraw_data->user->phone }}</a>
                                                                                    @else
                                                                                        -
                                                                                    @endif
                                                                                </b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-wrap pt-3">
                                                                            <div class="col-3 text-left">
                                                                                <b>ประเภทการถอน :</b>
                                                                            </div>
                                                                            <div class="col-3 text-right">
                                                                                <b style="color:#d61900;">{{ $withdraw_data->type }}</b>
                                                                            </div>
                                                                            <div class="col-3 text-left">
                                                                                <b>จำนวนเงิน :</b>
                                                                            </div>
                                                                            <div class="col-3 text-right">
                                                                                <b style="color:#d61900;">{{ ($withdraw_data->type == 'Crypto') ? 'USDC '.number_format($withdraw_data->usdc,3) : '฿ '.number_format($withdraw_data->amount,0) }}</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-wrap pt-3">
                                                                            <div class="col-3 text-left">
                                                                                <b>รายการคำสั่งซื้อ :</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-wrap pt-3 table-modal">
                                                                            <div class="col-2 text-center"><b>วัน-เวลาที่แจ้ง </b></div>
                                                                            <div class="col-2 text-center"><b>ชื่อ-นามสกุลผู้ซื้อ </b></div>
                                                                            <div class="col-2 text-center"><b>หมายเลขคำสั่งซื้อ </b></div>
                                                                            <div class="col-2 text-center"><b>จำนวนเงิน </b></div>
                                                                            <div class="col-2 text-center"><b>สถานะ </b></div>
                                                                            <div class="col-2 text-center"><b>ผู้ดำเนินการ </b></div>
                                                                        </div>
                                                                        @foreach($withdraw_data->inv as $k_inv => $v_inv)
                                                                        <div class="d-flex flex-wrap table-modal" style="margin-top: 0px;">
                                                                            <div class="col-2 text-left">{{$v_inv->created_at}}</div>
                                                                            <div class="col-2 text-left">{{$v_inv->name}} {{$v_inv->surname}}</div>
                                                                            <div class="col-2 text-left">{{$v_inv->inv_ref}}-{{$v_inv->inv_no}}</div>
                                                                            <div class="col-2 text-right">{{ ($v_inv->type == 'Crypto') ? 'USDC '.number_format($v_inv->usdc,3) : '฿ '.number_format($v_inv->amount,0) }}</div>
                                                                            <div class="col-2 text-left">
                                                                                @if($v_inv->status == '0')
                                                                                <b class="color-yallow">withdrawable</b>
                                                                                @elseif($v_inv->status == '99')
                                                                                <b class="color-price">ยกเลิก</b>
                                                                                @elseif($v_inv->status == '1')
                                                                                <b class="color-yallow">รอดำเนินการ</b>
                                                                                @elseif($v_inv->status == '2')
                                                                                <b class="color-green">โอนเงินเข้าวอลเล็ท</b>
                                                                                @else
                                                                                <b class="color-green">Withdrawed</b>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-2 text-left">
                                                                                @if(isset($v_inv->approve_user->name))
                                                                                    {{ @$v_inv->approve_user->name }}
                                                                                    ({{@$v_inv->approve_user->username}})
                                                                                @else
                                                                                    -
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                        <div class="d-flex flex-wrap pt-3">
                                                                            <div class="col-6 text-left">
                                                                                <b>บัญชีของร้านค้า : </b>
                                                                            </div>
                                                                        </div>
                                                                        <div class='d-flex flex-wrap col-12 col-xl-6 mt-3'
                                                                            style='background-color: #ffff;margin-right: 15px;border-radius: 8px;box-shadow:0px 1px 4px 4px rgba(0, 1, 1, 0.1);;min-height: 98px;min-width: 250px;'>
                                                                            <div class='col-12 col-xl-12 d-flex align-items-center'>
                                                                                @if( $withdraw_data->type == 'Crypto' )
                                                                                    <div class="col-6 text-left">
                                                                                        <b>Wallet address:</b>
                                                                                    </div>
                                                                                    <div class="col-6 text-left">
                                                                                        <b>{{ $withdraw_data->user->wallet_address }}</b>
                                                                                    </div>
                                                                                @else
                                                                                <img class='py-2'
                                                                                    style=';width: 48px;height: auto;'
                                                                                    src="{{asset('/new_ui/img/bank/'.$withdraw_data->logo)}}"
                                                                                    alt="">
                                                                                <div class="row text-left" style="padding-left: 15px;">
                                                                                    <div class="col-12">
                                                                                        <b>{{ $withdraw_data->bank_code }}</b>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <b>{{ $withdraw_data->bank_name }}</b>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <b>{{ $withdraw_data->bank_number }}</b>
                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-wrap pt-3">
                                                                            <div class="col-6 text-left">
                                                                                <b>หมายเหตุ : </b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-wrap pt-3">
                                                                            <div class="col-12 px-0 text-left">
                                                                                <textarea class='form-control remark-text' id="remark_{{ $withdraw_data->id }}" name="remark_{{ $withdraw_data->id }}" rows="5" cols="30">{{$withdraw_data->note}}</textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 px-0 mt-3">
                                                                            <div class="form-row">
                                                                                <div class="col-6 m-auto">
                                                                                    <button class="btn btn-secondary form-control" data-dismiss="modal">ปิด</button>
                                                                                </div>
                                                                                <div class="col-6 m-auto">
                                                                                    @if($withdraw_data->status == '1')
                                                                                    <button id="btnConfirmWithdraw_{{$withdraw_data->id}}" class="btn btn-success form-control"><i class="fa fa-check" aria-hidden="true"></i> ยืนยันการถอนเงิน </button>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        @if($withdraw_data->status == '0')
                                                                        <form
                                                                            action="/dashboard/payment/chkwithdrows/?id={{$withdraw_data->id}}"
                                                                            method="post" class='btnapprovewithdrows'>
                                                                            @csrf
                                                                            <input hidden type="text" name='id' value='{{$withdraw_data->id}}'>
                                                                            <div class="col-12 text-left pt-3 px-0">
                                                                                <input type="radio" id="confirm"
                                                                                    name="chk_method" value="confirm">
                                                                                <label>อนุมัติสำเร็จ</label><br>
                                                                                <input type="radio" id="cancel"
                                                                                    name="chk_method" value="cancel">
                                                                                <label>ปฏิเสธการอนุมัติ </label><br>
                                                                            </div>
                                                                            <div class='remark-chk pb-3'
                                                                                style='display:none;'>
                                                                                <div class="col-12 px-0 text-left">
                                                                                    <b>หมายเหตุการปฏิเสธ : </b>

                                                                                    <textarea
                                                                                        class='form-control remark-text'
                                                                                        required name="remark" rows="5"
                                                                                        cols="30"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 text-right px-0">
                                                                                <button type="button"
                                                                                    class="form-control login_submit"
                                                                                    style='color:white;background:#23c197'>อนุมัติ</button>
                                                                            </div>
                                                                        </form>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End -->
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @else
                                                <div class="mb-3">
                                                    ไม่พบข้อมูล
                                                </div>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <input type="hidden" id="hdRemark" name="hdRemark" value="">
                            <input type="hidden" id="hdWithdrawID" name="hdWithdrawID" value="">
                        </form>

                        <div class="col-12 d-flex align-items-center flex-wrap py-4" style='background: #fff; border-radius: 0 0 15px 15px;'>
                            <div class="col-6 text-left">
                                ลำดับที่ {{ (($user_withdraw->currentPage()-1) * $user_withdraw->perPage())+1 }} -
                                {{ (($user_withdraw->currentPage()-1) * $user_withdraw->perPage())+ count($user_withdraw) }}
                                จาก
                                {{ $user_withdraw->total() }}

                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end col-12">


                                    @if ($user_withdraw->hasPages())
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}

                                        @if ($user_withdraw->onFirstPage())
                                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                                    aria-hidden="true"></i></span></li>
                                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                class="mr-1"><i class="fa fa-angle-left text-secondary"
                                                    aria-hidden="true"></i></span></li>
                                        @else <li class="align-self-center px-2 bg-pagination-white">
                                            <a href="{{ $user_withdraw->url(1) }}" rel="prev">
                                                <i class="fa fa-angle-double-left text-secondary"
                                                    aria-hidden="true"></i>
                                            </a>
                                        <li class="align-self-center px-2 bg-pagination-white">
                                            <a href="{{ $user_withdraw->previousPageUrl() }}" rel="prev">
                                                <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                            </a>
                                        </li> @endif

                                        {{-- show button first page --}}
                                        @if ( $user_withdraw->currentPage() > 5 )
                                        <li class="align-self-center px-2 bg-pagination-white">
                                            <a href="{{ $user_withdraw->url(1) }}"><span>1</span></a>
                                        </li>
                                        @endif
                                        {{-- show button first page --}}


                                        {{-- condition stay in first page not show button --}}
                                        {{-- @if ( $user_withdraw->currentPage() == 1 )
                                                            <li class="align-self-center mr-1">
                                                                <a class="d-none page-link" tabindex="-2">1</a>
                                                            </li>
                                                            @endif --}}


                                        @if ( $user_withdraw->currentPage() > 5 )
                                        <li class="align-self-center px-2 bg-pagination-white">
                                            <span>...</span>
                                        </li>
                                        @endif



                                        @foreach(range(1, $user_withdraw->lastPage()) as $i)
                                        @if($i >= $user_withdraw->currentPage() - 2 && $i <= $user_withdraw->
                                            currentPage() +
                                            2)

                                            @if ($i == $user_withdraw->currentPage())
                                            <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                            @else
                                            <li class="px-2 bg-pagination-white"><a
                                                    href="{{ $user_withdraw->url($i) }}">{{ $i }}</a></li>
                                            @endif
                                            @endif
                                            @endforeach


                                            {{-- three dots between number near last pages --}}
                                            @if ( $user_withdraw->currentPage() < $user_withdraw->lastPage() - 4)
                                                <li class="align-self-center  px-2 bg-pagination-white">
                                                    <span>...</span>
                                                </li>
                                                @endif
                                                {{-- three dots between number near last pages --}}


                                                {{-- Show Last Page --}}
                                                @if($user_withdraw->hasMorePages() == $user_withdraw->lastPage() &&
                                                $user_withdraw->lastPage() > 5)
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $user_withdraw->url($user_withdraw->lastPage()) }}"><span>{{ $user_withdraw->lastPage() }}</span>
                                                    </a>
                                                </li>
                                                @endif
                                                {{-- Show Last Page --}}



                                                @if ($user_withdraw->hasMorePages())
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $user_withdraw->nextPageUrl() }}" rel="next">
                                                        <i class="fa fa-angle-right text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $user_withdraw->url($user_withdraw->lastPage()) }}"
                                                        rel="next">
                                                        <i class="fa fa-angle-double-right text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </li>

                                                @else
                                                <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                    <span><i class="fa fa-angle-right text-secondary"
                                                            aria-hidden="true"></i></span>
                                                </li>
                                                <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                    <i class="fa fa-angle-double-right text-secondary"
                                                        aria-hidden="true"></i></a>
                                                </li>

                                                @endif
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endsection


            @section('script')

            <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

            <script>
                $('#select-submenu').on('change', function() {
                    value = $(this).val();
                    $('a.nav-link[href="#list-' + value + '"]').click();
                });
            </script>

            <script>
                $(document).ready(function() {

                    $('#check_all').on('click', function() {
                        if (this.checked) {
                            $(':checkbox').each(function() {
                                this.checked = true;
                            });
                        } else {
                            $(':checkbox').each(function() {
                                this.checked = false;
                            });
                        }
                    });


                    $("#status option").each(function(index) {
                        location.getParams = getParams;
                        // console.log (location.getParams()["status"]);
                        if ($(this).val() == location.getParams()["status"]) {
                            $(this).attr('selected', 'true');
                            console.log($(this).val());
                        }
                    });

                    $('#add-note').click(function() {
                        var note = $('#note_note').val();
                        console.log(note);
                    });

                    $('a[id^=aPopWithdraw_]').click(function() {
                        $('#hdWithdrawID').val( $(this).data('id') );
                    });
                    $('button[id^=btnConfirmWithdraw_]').click(function() {
                        var a_id = $(this).prop('id').split('_');
                        $('#hdRemark').val( $('#remark_'+ a_id[1] ).val() );
                    });
                });

                $(':checkbox').on('click', function() {
                    $('tr').find("th.no-sort").removeClass("sorting_asc");
                    var get_chkbox = $(this).attr('status');
                    if (get_chkbox != null) {
                        if (this.checked) {
                            $('.checkbox' + get_chkbox).each(function() {
                                this.checked = true;
                            });
                        } else {
                            $('.checkbox' + get_chkbox).each(function() {
                                this.checked = false;
                            });
                        }
                    }
                });

                $('.login_submit').on('click', function() {
                    console.log('a');
                    $(this).prop('disabled', true);
                    var confirm = $('input[name="chk_method"]:checked').val();
                    if (confirm) {
                        $(this).parents('.modal').find('form.btnapprovewithdrows').submit();
                        console.log('b');
                    } else {
                        alert('โปรดยืนยัน');
                    }
                });
                $('input:radio').change(function() {
                    var status = $(this).val();
                    var textarea = $(this).parents('.modal').find('div.remark-chk');
                    var textarea2 = $(this).parents('.modal').find('textarea.remark-text');

                    if (status == 'confirm') {
                        textarea.css('display', 'none');
                        textarea2.removeAttr('required');
                    } else {
                        textarea.css('display', 'block');
                        textarea2.attr("required", "true");
                    }
                });

                function getParams() {
                    var result = {};
                    var tmp = [];

                    location.search
                        .substr(1)
                        .split("&")
                        .forEach(function(item) {
                            tmp = item.split("=");
                            result[tmp[0]] = decodeURIComponent(tmp[1]);
                        });

                    return result;
                }

                // 	// document.getElementById("#success-modal").showModal();
                // 	// $('#add-modal').modal('hide')
                // 	// $('#success-modal').modal('show')
                // 	// $(document).click(function(){
                // 	// 	window.location.reload(true);
                // });
                // 	// window.location.reload(true);
                // 	// document.getElementById("#divv").disabled = true;
                // 	// document.getElementById("#addbankbutton").disabled = true;
                // 	}
                // });

                // });
                // function myFunction() {
                // document.getElementById("demo").innerHTML = "<input>";
                // }
                // $("#hide").click(function(){
                // $("#demo").hide();
                // });
                // $("#show").click(function(){
                //     $("#demo").show();
                //     console.log("5555")
                // });

                // $(document).on("click",".showinput",function(){

                //     $(".inputshow").show("sds");
                //     console.log("3333")
                // });
                // $(document).on("click",".showdd",function(){
                //     var x = document.getElementById("myDIV");
                //         if (x.style.display === "none") {
                //             x.style.display = "block";
                //         } else {
                //             x.style.display = "none";
                //         }
                // });
            </script>

            @endsection
