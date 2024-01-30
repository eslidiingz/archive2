@extends('layouts.dashboard')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">


<style>
    .box {
        height: calc(100vh - 200px);
        ;
    }

    .btn-sub {
        color: white;
        background: #346751;
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

    .modal-backdrop {
        display: none;
    }

    .modal {
        background: rgba(0, 0, 0, 0.5);
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
    p {
        margin-bottom: 0 !important;
    }
</style>
@php
// dd($invs_all[0]);
@endphp

<div class="container-fluid px-0" style='background:#efefef'>
    <div class="row">
        <div class="col-xl-12 col-12 ml-xl-auto">
            <h5 class="mt-4"><b>รายงานคำสั่งซื้อ</b>
            </h5>
            <div class=" text-center">
                <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active nav-manage" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                aria-controls="list-1" aria-selected="true">ทั้งหมด ({{ $invs_all->total() }})</a>
                        </li>
                    </ul>
                </div>
                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="1">ทั้งหมด ({{ $invs_all->total() }})</option>
                    </select>
                </div>
                    
                {{-- SEARCH --}}
                <div class="col-lg-12 col-md-12 col-12 py-4" style="background: #fff;">
                    <form role="search" action="/dashboard/ReportOrder" method="GET">
                        {{-- @csrf --}}
                        <div class="input-group flex-wrap mb-3 mt-3 justify-content-center">
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">เลขกำกับคำสั่งซื้อ</h6>
                            </div>
                            @if (isset($_REQUEST['invs']))
                            <input type="text" name="invs" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['invs'] }}" placeholder="เลขกำกับคำสั่งซื้อ" aria-label="invs"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="invs" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="เลขกำกับคำสั่งซื้อ" aria-label="invs" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">หมายเลขกระเป๋า</h6>
                            </div>
                            @if (isset($_REQUEST['wallet_address']))
                            <input type="text" name="wallet_address" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['wallet_address'] }}" placeholder="หมายเลขกระเป๋า" aria-label="wallet_address"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="wallet_address" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="หมายเลขกระเป๋า" aria-label="wallet_address" aria-describedby="addon-wrapping">
                            @endif
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
                                <h6 class="mb-0">ผู้ซื้อ</h6>
                            </div>
                            @if (isset($_REQUEST['u_name']))
                            <input type="text" name="u_name" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['u_name'] }}" placeholder="ผู้ซื้อ" aria-label="u_name"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="u_name" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="ชื่อผู้ซื้อ" aria-label="u_name" aria-describedby="addon-wrapping">
                            @endif
                            
                        </div>
                        <div class="input-group flex-wrap pt-2 justify-content-center">
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">สถานะ</h6>
                            </div>
                            <select class="form-control col-lg-2" id="status" name='status'>
                                <option id='status_chk' value='0'>ทั้งหมด</option>
                                <option id='status_chk' value='1'>ชำระเงินแล้ว</option>
                                <option id='status_chk' value='2'>จัดส่งแล้ว</option>
                                <option id='status_chk' value='3'>ได้รับสินค้าแล้ว</option>
                                <option id='status_chk' value='99'>ยกเลิกรายการแล้ว</option>
                            </select>
                            <input hidden type="search" name="search" class="form-control"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="search" placeholder="ค้นหาสินค้า" aria-label="search"
                                aria-describedby="addon-wrapping">
                            <div
                                class="col-lg-auto d-flex align-items-center col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">วันที่</h6>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6">
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
                            <div class="col-lg-3 col-md-6 col-6">
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
                                <a href="/dashboard/ReportOrder"><input type="button" value="ล้างค่า" class="form-control btn " style="background-color: #ffc107"></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-100 mb-4 pb-4" style="background: #fff;border-radius: 0 0 15px 15px;">
                    <div class="col-lg-2 col-md-3 col-12 m-auto pt-4">
                        <a href="/dashboard/withdraw/excel?date_start={{ @$_REQUEST['date_start'] }}&date_end={{ @$_REQUEST['date_end'] }}&status={{ @$_REQUEST['status'] }}&shop_name={{ @$_REQUEST['shop_name'] }}&invs={{ @$_REQUEST['invs'] }}&u_name={{ @$_REQUEST['u_name'] }}&wallet_address={{ @$_REQUEST['wallet_address'] }}"
                            class="btn btn-success form-control"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                            Download Excel </a>
                    </div>
                </div>
                {{-- SEARCH --}}

                <div class="w-100">
                    <div class="tab-content" style="background: #fff;padding-top: 10px;padding-left: 10px;padding-right: 10px;border-radius: 15px;">
                        {{-- 1taphome --}}
                        <div class="row justify-content-center tab-pane fade show active " id="list-1" style="padding-left: 10px !important; padding-right: 10px !important;">
                            <div class="container-fluid table-responsive px-0">
                                <div class="card" style="border: none;">
                                    <div class="card-body m-2 p-0 ">
                                        <table class="table table-striped" id="main_table">
                                            <thead class="thead-blue">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col" style='width:40px'>เลขกำกับคำสั่งซื้อ</th>
                                                    <th scope="col">ชื่อร้านค้า</th>
                                                    <th scope="col">ชื่อ- นามสกุล / หมายเลขกระเป๋า</th>
                                                    <th scope="col">วันที่สั่งซื้อ</th>
                                                    <th scope="col">อัพเดทล่าสุด</th>
                                                    <th scope="col">วิธีการชำระเงิน</th>
                                                    <th scope="col">สถานะ</th>
                                                    <th scope="col">ค่าสินค้า</th>
                                                    <th scope="col">ค่าขนส่ง</th>
                                                    <th scope="col">รวม</th>
                                                    <th scope="col">ดำเนินการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($invs_all as $key=>$invss)
                                                <tr style="text-align: center; align-items: center;">
                                                    <td data-label="#">
                                                        {{ (($invs_all->currentPage()-1) * $invs_all->perPage())+$key+1 }}
                                                    </td>
                                                    <td data-label="เลขกำกับคำสั่งซื้อ">
                                                        {{ @$invss->inv_ref }}@if($invss->inv_no != null && $invss->inv_no != '')-{{ $invss->inv_no }}@endif
                                                    </td>
                                                    <td data-label="ชื่อร้านค้า">
                                                        {{ @$invss->shop->shop_name }}
                                                    </td>

                                                    <td data-label="ชื่อ- นามสกุล">
                                                        {{ @$invss->user->name }} {{ @$invss->user->surname }}<br/>{{ @$invss->user->wallet_address }}
                                                    </td>
                                                    <td data-label="วันที่สั่งซื้อ">
                                                        {{ date('d/m/y H:i', strtotime($invss->created_at)) }}
                                                    </td>
                                                    <td data-label="อัพเดทล่าสุด">
                                                        {{ date('d/m/y H:i', strtotime($invss->updated_at)) }}
                                                    </td>
                                                    <td data-label="วิธีการชำระเงิน">
                                                        {{ $invss->payment }}
                                                    </td>

                                                    <td data-label="สถานะ">
                                                        @if($invss->status == '2')
                                                        <b class="color-green">ชำระสินค้าแล้ว</b>
                                                        @elseif($invss->status == '53')
                                                        <b class="color-green">รับสินค้าหน้างานแล้ว</b>
                                                        @elseif($invss->status == '5')
                                                        <b class="color-green">รับสินค้า</b>
                                                        @elseif($invss->status == '4')
                                                        <b class="color-yallow">สินค้าถึงปลายทางแล้ว</b>
                                                        @elseif($invss->status == '3')
                                                        <b class="color-yallow">ส่งสินค้าแล้ว</b>
                                                        @elseif($invss->status == '52')
                                                        <b class="color-yallow">รับสินค้าอัตโนมัติ</b>
                                                        @elseif($invss->status == '43')
                                                        <b class="color-yallow">รอรับสินค้าหน้างาน</b>
                                                        @elseif($invss->status == '99')
                                                        <b class="color-price">ยกเลิกสำเร็จ</b>
                                                        @elseif($invss->status == '6')
                                                        <b class="color-price">แจ้งยกเลิก</b>
                                                        @else
                                                        {{ $invss->status }}
                                                        @endif
                                                    </td>
                                                    <td data-label="total">
                                                        @if( $invss->disc_to == 'PRODUCT' )
                                                            {{ number_format($invss->total, 2) }}<strong style="color: red;">-{{ number_format($invss->disc_amt, 2) }}</strong>
                                                        @else
                                                            {{ number_format($invss->total, 2) }}
                                                        @endif
                                                    </td>

                                                    <td data-label="total">
                                                        @if( $invss->disc_to == 'SHIP' )
                                                            {{ number_format($invss->shipping_cost, 2) }}<strong style="color: red;">-{{ number_format($invss->disc_amt, 2) }}</strong>
                                                        @else
                                                            {{ number_format($invss->shipping_cost, 2) }}
                                                        @endif
                                                    </td>

                                                    <td data-label="total">
                                                        {{ number_format($invss->total + $invss->shipping_cost - $invss->disc_amt,2)}}
                                                    </td>

                                                    <td data-label="ดำเนินการ"
                                                        style='text-decoration: underline;color:#226fff'
                                                        class="cursor-pointer">
                                                        <a data-toggle="modal"
                                                            data-target="#chk_status{{ $invss->id }}"> ดูเพิ่มเติม
                                                        </a>
                                                    </td>

                                                    <!-- @if(!isset($invss->log))
                                                    <td data-label="Check">

                                                    </td>
                                                    @else
                                                    @if($invss->log->status == 2)
                                                    <td data-label="Check">
                                                        {{ @$invss->approve_user->name }}
                                                    </td>
                                                    @else
                                                    <td data-label="Check">

                                                    </td>

                                                    @endif
                                                    @endif -->

                                                    <!-- Modal -->
                                                    <div class="modal fade modal_project" id="chk_status{{$invss->id}}" style='z-index:1500' role="dialog">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered"
                                                            role="document">
                                                            <form action="/dashboard/check_submit" method="post">
                                                                @csrf
                                                                <div class="modal-content" style="padding: 1em;">
                                                                    <div class="modal-header">
                                                                        <p class="text-modal_header">ยืนยันการโอน</p>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <!-- <span
                                                                                aria-hidden="true">&times;</span> -->
                                                                                <i class="fas fa-times-circle iconclose-modal_header"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="d-flex flex-wrap">
                                                                            <div
                                                                                class="col-12 px-0 text-left">
                                                                                <p class="text-topic-modal_header">ผู้ซื้อ</p>
                                                                                <div class="layout-detail-modal">
                                                                                    <div class="d-flex flex-wrap align-items-center mb-2">
                                                                                        <p class="text-detail-modal_header">ชื่อ </p> :
                                                                                        {{ @$invss->user->name }}
                                                                                        {{ @$invss->user->surname }}
                                                                                    </div>
                                                                                    <div class="d-flex flex-wrap align-items-center mb-2">
                                                                                        <p class="text-detail-modal_header">เบอร์</p> :
                                                                                        {{ @$invss->user->phone }}
                                                                                    </div>
                                                                                    @if(!empty($invss->address))
                                                                                    @if(isset($invss->address[0]['address']))
                                                                                    <div class="d-flex flex-wrap align-items-center mb-2">
                                                                                        <p class="text-detail-modal_header">ที่อยู่จัดส่ง</p> :
                                                                                        {{ $invss->address[0]['address'] }}
                                                                                        ,
                                                                                        {{ $invss->address[0]['tel'] }} ,
                                                                                        {{ $invss->address[0]['name'] }}
                                                                                    </div>
                                                                                    @else
                                                                                    <div class="d-flex flex-wrap align-items-center mb-2">
                                                                                        <p class="text-detail-modal_header">ที่อยู่จัดส่ง</p> :
                                                                                        {{ $invss->address['address'] }} ,
                                                                                        {{ $invss->address['tel'] }} ,
                                                                                        {{ $invss->address['name'] }}
                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-12 px-0 text-left">
                                                                                <p class="text-topic-modal_header">ผู้ขาย</p>
                                                                                <div class="layout-detail-modal mb-3">
                                                                                    <div class="d-flex flex-wrap mb-2">
                                                                                        <p class="text-detail-modal_header">ชื่อร้าน</p> :
                                                                                        {{ @$invss->shop->shop_name }}
                                                                                    </div>
                                                                                    <div class="d-flex flex-wrap mb-2">
                                                                                        <p class="text-detail-modal_header">ชื่อ</p> :
                                                                                        {{ @$invss->shops_user->name }}
                                                                                        {{ @$invss->shops_user->surname }}
                                                                                    </div>
                                                                                    <div class="d-flex flex-wrap mb-2">
                                                                                        <p class="text-detail-modal_header">เบอร์</p> :
                                                                                        {{ @$invss->shops_user->phone }}
                                                                                    </div>
                                                                                    <div class="d-flex flex-wrap mb-2">
                                                                                        <p class="text-detail-modal_header">Tracking Number</p> :
                                                                                        {{ @$invss->tracking_number }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 text-left">
                                                                        <div>
                                                                            <p class="text-topic-modal_header">สินค้า</p>
                                                                        </div>
                                                                        @foreach($arr_pd[$invss->id] as $key => $value)
                                                                        <div class='d-flex flex-wrap'>
                                                                            <div
                                                                                class='d-flex flex-row col-12 mb-2 p-3 layout-detail2-modal'>
                                                                                <div class="row w-100 ">
                                                                                    <div class='col-2 px-0'>
                                                                                        <img class="align-self-start mr-3"
                                                                                            style="height: auto; width: 100%; border: 1px solid #caced1;"
                                                                                            src="{{asset('img/product/'.@$value->product_img[0]) }}"
                                                                                            alt="">
                                                                                    </div>
                                                                                    <div class="col-10">
                                                                                        <div class="d-flex align-items-center"><p class="text-detail-modal_header">ชื่อสินค้า</p> :
                                                                                            {{ @$value->name }}
                                                                                        </div>
                                                                                        <div class="d-flex align-items-center"><p class="text-detail-modal_header">ราคา</p> :
                                                                                            {{ @$invss->inv_products[$key]['price'] }}
                                                                                        </div>
                                                                                        <div class="d-flex align-items-center"><p class="text-detail-modal_header">จำนวน</p> :
                                                                                            {{ @$invss->inv_products[$key]['amount'] }}
                                                                                        </div>
                                                                                        <div class="d-flex align-items-center"><p class="text-detail-modal_header">รายละเอียด</p> <span
                                                                                                class='text-dot2'>:
                                                                                                {{ @$value->description }}<span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>

                                                                    <div class="modal-footer"
                                                                        style="justify-content: flex-start;">
                                                                        @if(!isset($invss->log))
                                                                        <div class="col-12 px-0 flex-row mb-4">
                                                                            <div class="row">
                                                                                <input type="hidden" name="inv_id"
                                                                                    value="{{ $invss->id }}">
                                                                                <div class='col-12 text-left d-flex align-items-center'>
                                                                                    <b class="mr-4">Check : </b>
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="checking" name='checking'
                                                                                        value="1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        @if($invss->log->status == 2)
                                                                        <div class="col-12 d-flex flex-wrap">
                                                                            <input type="hidden" name="inv_id"
                                                                                value="{{ $invss->id }}">
                                                                            <div class='col-2'>
                                                                                <b>UnCheck : </b>
                                                                            </div>
                                                                            <div>
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="checking" name='checking'
                                                                                    value="2" checked="checked">
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="col-12 d-flex flex-wrap">
                                                                            <input type="hidden" name="inv_id"
                                                                                value="{{ $invss->id }}">
                                                                            <div class='col-2'>
                                                                                <b>Check : </b>
                                                                            </div>
                                                                            <div>
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="checking" name='checking'
                                                                                    value="1">
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @endif
                                                                        <div
                                                                            class="d-flex flex-wrap pt-2 px-0 mx-0 col-12 cursor-pointer">
                                                                            <div class="col-6 text-right">
                                                                                <a href="#">
                                                                                    <button class="form-control mx-0 btn-sub" id='btn-sub' type="submit" disabled>บันทึก</button>
                                                                                </a>
                                                                            </div>

                                                                            <div class="col-6 text-left cursor-pointer">
                                                                                <a href="#">
                                                                                    <a class="form-control mx-0 text-center"
                                                                                        data-dismiss="modal"
                                                                                        style='color:white;background:#EE1C25'>ยกเลิก</a>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <!-- End -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex align-items-center flex-wrap py-4" style='background: #fff; border-radius: 15px;'>
                                <div class="col-6 text-left">
                                    ลำดับที่ {{ (($invs_all->currentPage()-1) * $invs_all->perPage())+1 }} -
                                    {{ (($invs_all->currentPage()-1) * $invs_all->perPage())+ count($invs_all) }} จาก
                                    {{ $invs_all->total() }}

                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-end col-12">


                                        @if ($invs_all->hasPages())
                                        <ul class="pagination">
                                            {{-- Previous Page Link --}}

                                            @if ($invs_all->onFirstPage())
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                    class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                                        aria-hidden="true"></i></span></li>
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                    class="mr-1"><i class="fa fa-angle-left text-secondary"
                                                        aria-hidden="true"></i></span></li>
                                            @else <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $invs_all->url(1) }}" rel="prev">
                                                    <i class="fa fa-angle-double-left text-secondary"
                                                        aria-hidden="true"></i>
                                                </a>
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $invs_all->previousPageUrl() }}" rel="prev">
                                                    <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                                </a>
                                            </li> @endif

                                            {{-- show button first page --}}
                                            @if ( $invs_all->currentPage() > 5 )
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $invs_all->url(1) }}"><span>1</span></a>
                                            </li>
                                            @endif
                                            {{-- show button first page --}}


                                            {{-- condition stay in first page not show button --}}
                                            {{-- @if ( $invs_all->currentPage() == 1 )
                                                            <li class="align-self-center mr-1">
                                                                <a class="d-none page-link" tabindex="-2">1</a>
                                                            </li>
                                                            @endif --}}


                                            @if ( $invs_all->currentPage() > 5 )
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <span>...</span>
                                            </li>
                                            @endif



                                            @foreach(range(1, $invs_all->lastPage()) as $i)
                                            @if($i >= $invs_all->currentPage() - 2 && $i <= $invs_all->currentPage()
                                                +
                                                2)

                                                @if ($i == $invs_all->currentPage())
                                                <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                                @else
                                                <li class="px-2 bg-pagination-white"><a
                                                        href="{{ $invs_all->url($i) }}">{{ $i }}</a></li>
                                                @endif
                                                @endif
                                                @endforeach


                                                {{-- three dots between number near last pages --}}
                                                @if ( $invs_all->currentPage() < $invs_all->lastPage() - 4)
                                                    <li class="align-self-center  px-2 bg-pagination-white">
                                                        <span>...</span>
                                                    </li>
                                                    @endif
                                                    {{-- three dots between number near last pages --}}


                                                    {{-- Show Last Page --}}
                                                    @if($invs_all->hasMorePages() == $invs_all->lastPage() &&
                                                    $invs_all->lastPage() > 5)
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $invs_all->url($invs_all->lastPage()) }}"><span>{{ $invs_all->lastPage() }}</span>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    {{-- Show Last Page --}}



                                                    @if ($invs_all->hasMorePages())
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $invs_all->nextPageUrl() }}" rel="next">
                                                            <i class="fa fa-angle-right text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $invs_all->url($invs_all->lastPage()) }}"
                                                            rel="next">
                                                            <i class="fa fa-angle-double-right text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </li>

                                                    @else
                                                    <li
                                                        class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                        <span><i class="fa fa-angle-right text-secondary"
                                                                aria-hidden="true"></i></span></li>
                                                    <li
                                                        class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                        <i class="fa fa-angle-double-right text-secondary"
                                                            aria-hidden="true"></i></a></li>

                                                    @endif
                                        </ul>
                                        @endif
                                    </div>
                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script>
    $(document).ready(function() {
        var url = window.location.href;
        var res = url.split("#");
        $("#status option").each(function(index) {
            location.getParams = getParams;
            // console.log (location.getParams()["status"]);
            if ($(this).val() == location.getParams()["status"]) {
                $(this).attr('selected', 'true');
                console.log($(this).val());
            }
        });
        $('[data-show="' + res[1] + '"').tab('show');
        $('#select-submenu').val(res[1].split("t-"));
        // console.log("res", res);
    });
</script>

<script>
    $('#select-submenu').on('change', function() {
        value = $(this).val();
        console.log(value);
        $('a.nav-link[href="#list-' + value + '"]').click();
    });
</script>


<script>
    $(document).ready(function() {

        // $('tr').find("th.no-sort").removeClass("sorting_asc");
        var msg = '{{Session::get('
        alert ')}}';
        var exist = '{{Session::has('
        alert ')}}';
        if (exist) {
            Swal.fire({
                icon: 'error',
                title: 'ไม่สามารถทำรายการได้',
                text: msg
            })
        }


        $('#add-note').click(function() {
            var note = $('#note_note').val();
            console.log(note);

        });
    });


    $('input:checkbox').on('click', function() {
        var btn_sub = $(this).parents('.modal').find('button.btn-sub');
        if (this.checked == true) {
            btn_sub.removeAttr('disabled');
        } else {
            btn_sub.attr('disabled', 'true');
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
</script>

@endsection
