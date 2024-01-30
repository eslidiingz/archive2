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
</style>
@php
// dd($invs);
@endphp

<div class="container-fluid px-0" style='background:#efefef'>
    <div class="row">
        <div class="col-xl-12 col-12 ml-xl-auto">
            <h5 class="mt-4"><b>รายงานรายได้ส่วนกลางและสาขา</b>
            </h5>
            <div class=" text-center">
                <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active nav-manage" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                aria-controls="list-1" aria-selected="true">ทั้งหมด ({{ count($income) }})</a>
                        </li>
                    </ul>
                </div>

                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="1">ทั้งหมด ({{ count($income) }})</option>
                    </select>
                </div>

                {{-- <div class="row">
                    <div class="col-lg-2 col-md-3 col-12 m-auto py-3">
                        <a href="/dashboard/transaction/excel?date_start={{ @$_REQUEST['date_start'] }}&date_end={{ @$_REQUEST['date_end'] }}&status={{ @$_REQUEST['status'] }}&shop_name={{ @$_REQUEST['shop_name'] }}&invs={{ @$_REQUEST['invs'] }}&u_name={{ @$_REQUEST['u_name'] }}"
                            class="btn btn-success form-control"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                            Download Excel </a>
                    </div>

                </div> --}}

                {{-- SEARCH --}}
                <div class="col-lg-12 col-md-12 col-12 py-4 mb-3" style="background: #fff; border-radius: 0 0 15px 15px;">
                    <form role="search" action="/dashboard/income" method="GET">
                        {{-- @csrf --}}
                        <div class="input-group flex-wrap mb-3 mt-3 justify-content-center">
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">จำนวนเงิน</h6>
                            </div>
                            @if (isset($_REQUEST['amount_start']))
                            <input type="number" name="amount_start" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['amount_start'] }}" placeholder="บาท" aria-label="amount_start"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="number" name="amount_start" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="บาท" aria-label="amount_start" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">-</h6>
                            </div>
                            @if (isset($_REQUEST['amount_end']))
                            <input type="number" name="amount_end" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['amount_end'] }}" placeholder="บาท" aria-label="amount_end"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="number" name="amount_end" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="บาท" aria-label="amount_end" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">เลขกำกับคำสั่งซื้อ</h6>
                            </div>
                            @if (isset($_REQUEST['inv_ref']))
                            <input type="text" name="inv_ref" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['inv_ref'] }}" placeholder="INV_REF" aria-label="inv_ref"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="inv_ref" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="เลขกำกับคำสั่งซื้อ" aria-label="inv_ref" aria-describedby="addon-wrapping">
                            @endif

                        </div>
                        <div class="input-group flex-wrap pt-2 justify-content-center">
                            <input hidden type="search" name="search" class="form-control"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="search" placeholder="ค้นหาสินค้า" aria-label="search"
                                aria-describedby="addon-wrapping">
                            <div
                                class="col-lg-auto d-flex align-items-center col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">วันที่ทำรายการ</h6>
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
                                <input type="submit" value="ค้นหา" name="filter" id="filter" class="form-control btn  btn-main-set">
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mb-2">
                                <a href="/dashboard/income"><input type="button" value="ล้างค่า" class="form-control btn " style="background-color: #ffc107"></a>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- SEARCH --}}

                <div class="w-100">
                    <div class="tab-content" style="background: #fff;padding-top: 10px;padding-left: 10px;padding-right: 10px;border-radius: 15px;">
                        {{-- 1taphome --}}
                        <div class="row justify-content-center tab-pane fade show active " id="list-1" style="padding-left: 10px !important; padding-right: 10px !important;">
                            <div class="container-fluid table-responsive">
                                <div class="card" style="border: none;">
                                    <div class="card-body m-2 p-0 ">
                                        <table class="table table-striped" id="">
                                            <thead class="thead-blue">
                                                <tr>
                                                    {{-- <th class='no-sort'><input type="checkbox" name="select_all"
                                                            value="1" id="example-select-all"></th> --}}
                                                    <th scope="col">อันดับ</th>
                                                    <th style="width:150px" scope="col">วันเวลาที่แจ้ง</th>
                                                    {{-- <th style="width:150px" scope="col">ชื่อผู้ใช้งาน</th> --}}
                                                    <th scope="col">เลขกำกับคำสั่งซื้อ</th>
                                                    <th scope="col">ชื่อร้านค้า</th>
                                                    <th scope="col">Fee</th>
                                                    <th scope="col">Discount</th>
                                                    <th scope="col">ยอดขายรวม (รวมค่าขนส่ง)</th>
                                                    <th scope="col">ยอดขาย (ไม่รวมค่าส่ง)</th>
                                                    <th scope="col">รายรับ GP {{ $o_setting->gp_rate }}%</th>
                                                    {{--<th scope="col">รายรับ GP 7% (ส่วนกลาง)</th>
                                                    <th scope="col">รายรับ GP 3% (สาขา)</th> --}}
                                                    {{-- <th style="width:150px" scope="col">สถานะ</th> --}}
                                                    {{-- <th scope="col">ดำเนินการ</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($income as $key=>$invsdata)
                                                <tr style="text-align: center; align-items: center;">
                                                    {{-- <td><input type="checkbox" name="id[]" value="{{ $key }}"></td>
                                                    --}}
                                                    <td data-label="#">
                                                        {{ (($income->currentPage()-1) * $income->perPage())+$key+1 }}
                                                    </td>
                                                    @php
                                                    $invid = "";
                                                    $total = 0;
                                                    @endphp
                                                    <td data-label="วันเวลาที่แจ้ง">
                                                        {{ date('d/m/y H:i', strtotime($invsdata->created_at)) }}
                                                    </td>

                                                    <td data-label="เลขกำกับคำสั่งซื้อ">{{ $invsdata->inv_ref }}@if(isset($invsdata->inv_no) && $invsdata->inv_no !=null)-{{ $invsdata->inv_no }}@endif</td>

                                                    <td data-label="ชื่อร้านค้า">{{ $invsdata->shop_name }}</td>

                                                    <td data-label="Fee" class="color-price">{{ $invsdata->fee_amt }}</td>
                                                    <td data-label="Discount" class="color-price">{{ ($invsdata->disc_type == 'nft') ? $invsdata->disc_amt : '' }}</td>

                                                    {{-- <td data-label="ชื่อผู้ใช้งาน" style="font-weight:bold;">
                                                        {{ $invsdata->name }} {{ $invsdata->surname }}
                                                    </td> --}}


                                                    <td data-label="ยอดขายรวม (รวมค่าขนส่ง)" class="color-price">
                                                        {{ $invsdata->total + $invsdata->shipping_cost,0 }}
                                                    </td>
                                                    <td data-label="ยอดขาย (ไม่รวมค่าส่ง)" class="color-price">
                                                        {{ number_format($invsdata->total,0) }}
                                                    </td>



                                                    <td data-label="รายรับ GP 10%" class="color-price">
                                                        {{ number_format($invsdata->bird_cost+$invsdata->branch_cost,0) }}
                                                    </td>

                                                    {{-- <td data-label="รายรับ GP 7% (ส่วนกลาง)" class="color-price">
                                                        {{ number_format($invsdata->bird_cost,0) }}
                                                    </td>

                                                    <td data-label="รายรับ GP 3% (สาขา)" class="color-price">
                                                        {{ number_format($invsdata->branch_cost,0) }}
                                                    </td> --}}


                                                    {{-- <td data-label="สถานะ">
                                                        @if($invsdata->status == '12')
                                                        <b class="color-yallow">รอการอนุมัติ</b>
                                                        @elseif($invsdata->status == '13')
                                                        <b class="color-price">ปฏิเสธการอนุมัติ</b>
                                                        @elseif($invsdata->status == '2')
                                                        <b class="color-green">อนุมัติสำเร็จ</b>
                                                        @elseif($invsdata->status == '3')
                                                        <b class="color-green">ส่งสินค้าแล้ว</b>
                                                        @elseif($invsdata->status == '4')
                                                        <b class="color-green">สินค้าถึงปลายทางแล้ว</b>
                                                        @elseif($invsdata->status == '5')
                                                        <b class="color-green">รับสินค้า</b>
                                                        @elseif($invsdata->status == '43')
                                                        <b class="color-yallow">รอรับสินค้าหน้างาน</b>
                                                        @elseif($invsdata->status == '52')
                                                        <b class="color-yallow">รับสินค้าอัตโนมัติ</b>
                                                        @elseif($invsdata->status == '53')
                                                        <b class="color-grey">รับสินค้าหน้างานแล้ว</b>
                                                        @elseif($invsdata->status == '54')
                                                        <b class="color-green">ประกาศผลแล้ว</b>
                                                        @else
                                                        {{ $invsdata->status }}
                                                        @endif
                                                    </td> --}}

                                                    {{-- <td data-label="ดำเนินการ"
                                                        style='text-decoration: underline;color:#226fff'>
                                                        <a data-toggle="modal"
                                                            data-target="#chk_status{{ $invsdata->id }}"> ดูเพิ่มเติม
                                                    </a>
                                                    </td> --}}

                                                    <!-- Modal -->
                                                    {{-- <div class="modal fade" id="chk_status{{$invsdata->id}}"
                                                        role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    ยืนยันการโอน
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="d-flex flex-wrap">
                                                                        <div class="col-6 px-0 text-left">
                                                                            <b>ยกเลิกรายการรอชำระ :</b>
                                                                        </div>
                                                                        <div class="col-6 px-0 text-right">
                                                                            @if($invsdata->status == '12')
                                                                            <b class="color-yallow">รอการอนุมัติ</b>
                                                                            @elseif($invsdata->status == '13')
                                                                            <b
                                                                                class="color-price">ปฏิเสธการอนุมัติ</b>
                                                                            @elseif($invsdata->status == '2')
                                                                            <b class="color-green">อนุมัติสำเร็จ</b>
                                                                            @elseif($invsdata->status == '3')
                                                                            <b class="color-green">ส่งสินค้าแล้ว</b>
                                                                            @elseif($invsdata->status == '4')
                                                                            <b
                                                                                class="color-green">สินค้าถึงปลายทางแล้ว</b>
                                                                            @elseif($invsdata->status == '5')
                                                                            <b class="color-green">รับสินค้า</b>
                                                                            @elseif($invsdata->status == '43')
                                                                            <b
                                                                                class="color-yallow">รอรับสินค้าหน้างาน</b>
                                                                            @elseif($invsdata->status == '52')
                                                                            <b
                                                                                class="color-yallow">รับสินค้าอัตโนมัติ</b>
                                                                            @elseif($invsdata->status == '53')
                                                                            <b
                                                                            class="color-grey">รับสินค้าหน้างานแล้ว</b>
                                                                            @elseif($invsdata->status == '54')
                                                                            <b class="color-green">ประกาศผลแล้ว</b>
                                                                            @else
                                                                            {{ $invsdata->status }}
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-wrap pt-4">
                                                                        <div class="col-6 px-0 text-left">
                                                                            <b>ชื่อผู้ใช้งาน :</b>
                                                                        </div>
                                                                        <div class="col-6 px-0 text-right">
                                                                            <b> {{ $invsdata->name }}
                                                                                {{ $invsdata->surname }}</b>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-wrap pt-4">
                                                                        <div class="col-6 px-0 text-left">
                                                                            <b>ชื่อร้านค้า : </b>
                                                                        </div>
                                                                        <div class="col-6 px-0 text-right">
                                                                            <b>{{ $invsdata->shop_name }}</b>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-wrap pt-4">
                                                                        <div class="col-6 px-0 text-left">
                                                                            <b>จำนวนยอดเงินโอน : </b>
                                                                        </div>
                                                                        <div class="col-6 px-0 text-right"
                                                                            style='color:#c45e9f'>
                                                                            <b> ฿
                                                                                {{ number_format($invsdata->total + $invsdata->shipping_cost,0) }}</b>
                                                                        </div>
                                                                    </div>
                                                                    <img class='pt-4'
                                                                        style=';width: 200px;height: 300px;'
                                                                        src="{{asset('/img/bank_image/'.$invsdata->transfer_img)}}"
                                                                        alt="">
                                                                    <div class="d-flex flex-wrap pt-4">
                                                                        @if($invsdata->status == '12')
                                                                        <div class="col-6 text-right">
                                                                            <a
                                                                                href="/dashboard/payment/btnapprove/?id={{$invsdata->id}}"><button
                                                                                    class="form-control"
                                                                                    style='color:white;background:#23c197'>อนุมัติ</button></a>
                                                                        </div>
                                                                        <div class="col-6 text-left"
                                                                            style='color:#c45e9f'>
                                                                            <a
                                                                                href="/dashboard/payment/btndeletetra_img/?id={{$invsdata->id}}"><button
                                                                                    class="form-control"
                                                                                    style='color:white;background:#a83c23'>ปฏิเสธ</button></a>
                                                                        </div>
                                                                        @else
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <!-- End -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex flex-wrap py-4">
                                <div class="col-6 text-left">
                                    ลำดับที่ {{ (($income->currentPage()-1) * $income->perPage())+1 }} -
                                    {{ (($income->currentPage()-1) * $income->perPage())+ count($income) }}
                                    จาก
                                    {{ $income->total() }}

                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-end col-12">
                                        @if ($income->hasPages())
                                        <ul class="pagination">
                                            {{-- Previous Page Link --}}

                                            @if ($income->onFirstPage())
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                    class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                                        aria-hidden="true"></i></span></li>
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                    class="mr-1"><i class="fa fa-angle-left text-secondary"
                                                        aria-hidden="true"></i></span></li>
                                            @else <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $income->url(1) }}" rel="prev">
                                                    <i class="fa fa-angle-double-left text-secondary"
                                                        aria-hidden="true"></i>
                                                </a>
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $income->previousPageUrl() }}" rel="prev">
                                                    <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                                </a>
                                            </li> @endif

                                            {{-- show button first page --}}
                                            @if ( $income->currentPage() > 5 )
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $income->url(1) }}"><span>1</span></a>
                                            </li>
                                            @endif
                                            {{-- show button first page --}}


                                            {{-- condition stay in first page not show button --}}
                                            {{-- @if ( $income->currentPage() == 1 )
                                                    <li class="align-self-center mr-1">
                                                        <a class="d-none page-link" tabindex="-2">1</a>
                                                    </li>
                                                    @endif --}}


                                            @if ( $income->currentPage() > 5 )
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <span>...</span>
                                            </li>
                                            @endif



                                            @foreach(range(1, $income->lastPage()) as $i)
                                            @if($i >= $income->currentPage() - 2 && $i <= $income->currentPage()
                                                +
                                                2)

                                                @if ($i == $income->currentPage())
                                                <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                                @else
                                                <li class="px-2 bg-pagination-white"><a
                                                        href="{{ $income->url($i) }}">{{ $i }}</a>
                                                </li>
                                                @endif
                                                @endif
                                                @endforeach


                                                {{-- three dots between number near last pages --}}
                                                @if ( $income->currentPage() < $income->lastPage() - 4)
                                                    <li class="align-self-center  px-2 bg-pagination-white">
                                                        <span>...</span>
                                                    </li>
                                                    @endif
                                                    {{-- three dots between number near last pages --}}


                                                    {{-- Show Last Page --}}
                                                    @if($income->hasMorePages() == $income->lastPage() &&
                                                    $income->lastPage() > 5)
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $income->url($income->lastPage()) }}"><span>{{ $income->lastPage() }}</span>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    {{-- Show Last Page --}}



                                                    @if ($income->hasMorePages())
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $income->nextPageUrl() }}" rel="next">
                                                            <i class="fa fa-angle-right text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $income->url($income->lastPage()) }}"
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
                @endsection


                @section('script')

                <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
                {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

                <script>
                    $('#select-submenu').on('change',function(){
                    value = $(this).val();
                    $('a.nav-link[href="#list-'+value+'"]').click();
                });
                </script>
                <script>
                    $(document).ready(function () {
                        // $('tr').find("th.no-sort").removeClass("sorting_asc");

                        $("#status option").each(function (index) {
                            location.getParams = getParams;
                            // console.log (location.getParams()["status"]);
                            if($(this).val() == location.getParams()["status"]){
                                $(this).attr('selected','true');
                                console.log($(this).val());
                            }
                        });

                        $('#add-note').click(function () {
                            var note = $('#note_note').val();
                            console.log(note);
                            // $.ajaxSetup({
                            // 		headers: {
                            // 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            // 		}
                            // 	});
                            // $.ajax({
                            //     type:'POST',

                            //     data:{
                            //         "note":note

                            //     },

                            //     url: "{{route('addnotedata')}}",
                            //     success: function(respones){
                            //         console.log(respones);
                            //             console.log(note);
                            //     });
                            // });

                        });
                    });

                    $('#example-select-all').on('click', function () {
                        $('tr').find("th.no-sort").removeClass("sorting_asc");
                        if (this.checked) {
                            // Iterate each checkbox
                            $(':checkbox').each(function () {
                                this.checked = true;
                            });
                        } else {
                            $(':checkbox').each(function () {
                                this.checked = false;
                            });
                        }

                    });

                    function getParams() {
                            var result = {};
                            var tmp = [];

                            location.search
                                .substr(1)
                                .split("&")
                                .forEach(function (item) {
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
