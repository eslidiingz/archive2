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

    .nav-link.active {
        color: white !important;
        background-color: #c75ba1 !important;
    }

    .nav-tabs {
        border-bottom: 5px solid #c75ba1 !important;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .nav-tabs .nav-link {
        border-bottom: 1px solid #c75ba1 !important;
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
{{-- @php
dd($cancelcase_all);
@endphp --}}

<div class="container-fluid px-0" style='background:#fdf7fb'>
    <div class="row">
        <div class="col-xl-12 col-12 ml-xl-auto">
            <h5 class="mt-4"><b>การคืนเงินWallet</b></h5>

            <div class=" text-center">
                <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                aria-controls="list-1" aria-selected="true">ทั้งหมด ({{ $cancelcase_all->total() }})</a>
                        </li>
                    </ul>
                </div>

                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="1">ทั้งหมด ({{ $cancelcase_all->total() }})</option>
                    </select>
                </div>

                <div class="w-100">
                    <div class="tab-content">

                        {{-- SEARCH --}}
                        <div class="col-lg-12 col-md-12 col-12 pt-4">
                            <form role="search" action="/dashboard/walletCancel" method="GET">
                                {{-- @csrf --}}
                                <div class="input-group flex-wrap">
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
                                            placeholder="date-start" aria-label="date-start"
                                            aria-describedby="addon-wrapping">
                                        @else
                                        <input type="date" name="date_start" class="form-control"
                                            style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                            placeholder="date-start" aria-label="date-start"
                                            aria-describedby="addon-wrapping">
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-6">
                                        @if (isset($_REQUEST['date_end']))
                                        <input type="date" name="date_end" value="{{ $_REQUEST['date_end'] }}"
                                            class="form-control"
                                            style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                            placeholder="date-end" aria-label="date-end"
                                            aria-describedby="addon-wrapping">
                                        @else
                                        <input type="date" name="date_end" class="form-control"
                                            style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                            placeholder="date-end" aria-label="date-end"
                                            aria-describedby="addon-wrapping">
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group flex-wrap pt-2">
                                    <div
                                        class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                        <h6 class="mb-0">สถานะ</h6>
                                    </div>
                                    <select class="form-control col-lg-2" id="status" name='status'>
                                        <option id='status_chk' value='0'>ทั้งหมด</option>
                                        <option id='status_chk' value='2'>ตรวจสอบแล้ว</option>
                                        <option id='status_chk' value='99'>ปิดเคส</option>
                                    </select>
                                    <div
                                        class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                        <h6 class="mb-0">ชื่อร้านค้า</h6>
                                    </div>
                                    @if (isset($_REQUEST['shop_name']))
                                    <input type="text" name="shop_name" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['shop_name'] }}" placeholder="ชื่อร้านค้า"
                                        aria-label="shop_name" aria-describedby="addon-wrapping">
                                    @else
                                    <input type="text" name="shop_name" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="ชื่อร้านค้า" aria-label="shop_name"
                                        aria-describedby="addon-wrapping">
                                    @endif
                                    <div
                                        class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                        <h6 class="mb-0">INVS</h6>
                                    </div>
                                    @if (isset($_REQUEST['invs']))
                                    <input type="text" name="invs" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['invs'] }}" placeholder="ชื่อร้านค้า" aria-label="invs"
                                        aria-describedby="addon-wrapping">
                                    @else
                                    <input type="text" name="invs" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="หมายเลข invs" aria-label="invs"
                                        aria-describedby="addon-wrapping">
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
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="ชื่อผู้ซื้อ" aria-label="u_name"
                                        aria-describedby="addon-wrapping">
                                    @endif
                                    <div class="col-lg-2 col-md-2 col-12 mb-2">
                                        <input type="submit" value="Filter" name="filter" id="filter"
                                            class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- SEARCH --}}

                        {{-- 1taphome --}}
                        <div class="row justify-content-center tab-pane fade show active " id="list-1">
                            <div class="container-fluid table-responsive">
                                <div class="card" style="border: none;">
                                    <div class="card-body m-2 p-0 ">
                                        <table class="table table-striped" id="">
                                            <thead>
                                                <tr>
                                                    <th class='no-sort'><input type="checkbox" status='1'
                                                            name="select_all" value="1" id="example-select-all"></th>
                                                    <th scope="col">อันดับ</th>
                                                    <th style="width:150px" scope="col">วันที่</th>
                                                    <th style="width:150px" scope="col">ผู้ซื้อ</th>
                                                    <th style="width:150px" scope="col">ร้านค้า</th>
                                                    <th scope="col">invs</th>
                                                    <th style="width:150px" scope="col">สถานะ</th>
                                                    <th scope="col">ดำเนินการ</th>
                                                    <th scope="col">ผู้ดำเนินการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cancelcase_all as $key=>$cancelcase_all_value)
                                                <tr style="text-align: center; align-items: center;">
                                                    <td><input type="checkbox" name="id[]" class='checkbox1'
                                                            value="{{ $key+1 }}"></td>
                                                    <td data-label="#">
                                                        {{ (($cancelcase_all->currentPage()-1) * $cancelcase_all->perPage())+$key+1 }}
                                                    </td>


                                                    <td data-label="วันที่">
                                                        {{ date('d/m/y H:i', strtotime($cancelcase_all_value->created_at)) }}

                                                    </td>

                                                    <td data-label="ผู้ซื้อ" style="font-weight:bold;">
                                                        {{ @$cancelcase_all_value->user_name }}
                                                    </td>

                                                    <td data-label="ร้านค้า" style="font-weight:bold;">
                                                        {{ $cancelcase_all_value->shop_name }}
                                                    </td>


                                                    <td data-label="เลขใบสั่งซื้อ" style="font-weight:bold;">
                                                        {{ @$cancelcase_all_value->inv_ref }}</td>

                                                    <td data-label="สถานะ">
                                                        @if($cancelcase_all_value->status == '0')
                                                        <b style='color:#ffab0d'>รอตรวจสอบ</b>
                                                        @elseif($cancelcase_all_value->status == '99')
                                                        <b style='color:#23c197'>ปิดเคส</b>
                                                        @elseif($cancelcase_all_value->status == '1')
                                                        <b style='color:#ffab0d'>อยู่ระหว่างรอตรวจสอบ</b>
                                                        @elseif($cancelcase_all_value->status == '2')
                                                        <b style='color:#ffab0d'>ตรวจสอบแล้ว</b>
                                                        @else
                                                        <b style='color:#23c197'>อนุมัติสำเร็จ</b>
                                                        @endif
                                                    </td>



                                                    <td data-label="ดำเนินการ"
                                                        style='text-decoration: underline;color:#226fff'>
                                                        <a data-toggle="modal"
                                                            data-target="#chk_status{{ $cancelcase_all_value->id }}">
                                                            ดูเพิ่มเติม
                                                        </a>
                                                    </td>

                                                    @if(isset($cancelcase_all_value->approve_user->name))
                                                    <td data-label="ผู้ดำเนินการ">
                                                        {{ @$cancelcase_all_value->approve_user->name }}
                                                        ({{@$cancelcase_all_value->approve_user->username}})
                                                    </td>
                                                    @else
                                                    <td data-label="ผู้ดำเนินการ">
                                                        -
                                                    </td>
                                                    @endif

                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="chk_status{{ $cancelcase_all_value->id }}" role="dialog">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    รายละเอียดเคส
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="/dashboard/walletCancel_submit/?id={{$cancelcase_all_value->id}}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="d-flex flex-wrap">
                                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                                <div class="d-flex flex-wrap">
                                                                                    <div class="col-6 px-0 text-left">
                                                                                        <b>ยกเลิกรายการรอชำระ :</b>
                                                                                    </div>
                                                                                    <input hidden type="text" name='id'
                                                                                        value={{ $cancelcase_all_value->id }}>
                                                                                    <div class="col-6 px-0 text-right">
                                                                                        @if($cancelcase_all_value->status
                                                                                        == '99')
                                                                                        <b
                                                                                            style='color:#23c197'>ปิดเคส</b>
                                                                                        @elseif($cancelcase_all_value->status
                                                                                        == '2')
                                                                                        <b
                                                                                            style='color:#ffab0d'>ตรวจสอบแล้ว</b>
                                                                                        @else
                                                                                        <b
                                                                                            style='color:#23c197'>อนุมัติสำเร็จ</b>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap pt-2">
                                                                                    <div class="col-6 px-0 text-left">
                                                                                        <b>ชื่อผู้ซื้อ :</b>
                                                                                    </div>
                                                                                    <div class="col-6 px-0 text-right">
                                                                                        <b>
                                                                                            {{ $cancelcase_all_value->user_name }}</b>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap pt-2">
                                                                                    <div class="col-6 px-0 text-left">
                                                                                        <b>เบอร์ผู้ซื้อ :</b>
                                                                                    </div>
                                                                                    <div class="col-6 px-0 text-right">
                                                                                        <b>
                                                                                            {{ $cancelcase_all_value->user_phone }}</b>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap pt-2">
                                                                                    <div class="col-6 px-0 text-left">
                                                                                        <b>ชื่อร้านค้า :</b>
                                                                                    </div>
                                                                                    <div class="col-6 px-0 text-right">
                                                                                        <b>
                                                                                            {{ $cancelcase_all_value->shop_name }}</b>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap pt-2">
                                                                                    <div class="col-6 px-0 text-left">
                                                                                        <b>invs :</b>
                                                                                    </div>
                                                                                    <div class="col-6 px-0 text-right">
                                                                                        <b>
                                                                                            {{ $cancelcase_all_value->inv_ref }}</b>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap pt-2">
                                                                                    <div class="col-6 px-0 text-left">
                                                                                        <b>ราคา :</b>
                                                                                    </div>
                                                                                    <div class="col-6 px-0 text-right">
                                                                                        <b>
                                                                                            {{ number_format($cancelcase_all_value->total,2) }}</b>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap pt-2">
                                                                                    <div class="col-6 px-0 text-left">
                                                                                        <b>ค่าขนส่ง :</b>
                                                                                    </div>
                                                                                    <div class="col-6 px-0 text-right">
                                                                                        <b>
                                                                                            {{ number_format($cancelcase_all_value->shipping_cost,2) }}</b>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap pt-2">
                                                                                    <div class="col-6 px-0 text-left">
                                                                                        <b>รวมราคา :</b>
                                                                                    </div>
                                                                                    <div class="col-6 px-0 text-right">
                                                                                        <b>
                                                                                            {{ number_format($cancelcase_all_value->sum_total,2) }}</b>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap pt-2">
                                                                                    <div
                                                                                        class="col-6 pb-2 px-0 text-left">
                                                                                        <b>บันทึกข้อความ admin : </b>
                                                                                    </div>
                                                                                    <textarea class="form-control "
                                                                                        id="exampleCheck1" readonly
                                                                                        name='remark'>{{ $cancelcase_all_value->admin_note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                                <div class="d-flex flex-wrap">
                                                                                    <div class="col-12 px-0 text-left">
                                                                                        <b>รายละเอียด : </b>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class='d-flex flex-wrap'>

                                                                                        <span>{{ $cancelcase_all_value->description }}</span>

                                                                                    </div>
                                                                                    @if($cancelcase_all_value->cancel_pic)
                                                                                    <div class='d-flex flex-wrap'>
                                                                                        <img class='py-2'
                                                                                            style='width: 200px;height: 100%;'
                                                                                            src="{{asset('/img/inv_cancel/'.$cancelcase_all_value->cancel_pic)}}"
                                                                                            alt="">
                                                                                    </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @if($cancelcase_all_value->status != '99')
                                                                    <div class="modal-footer"
                                                                        style="justify-content: flex-start;">
                                                                        <b>ปิดเคส : </b>
                                                                        <div>
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ $cancelcase_all_value->user_id }}">
                                                                            <input type="hidden" name="inv_ref"
                                                                                value="{{ $cancelcase_all_value->inv_ref }}">
                                                                            <input type="hidden" name="total"
                                                                                value="{{ $cancelcase_all_value->sum_total }}">
                                                                            <input type="hidden" name="shop_id"
                                                                                value="{{ $cancelcase_all_value->shop_id }}">
                                                                            <!-- <input type="checkbox" id="case" name="case"
                                                                                value="1">
                                                                            <label for="case">ปิดเคส</label><br> -->
                                                                            <input type="radio" id="case" name="case"
                                                                                value="1">
                                                                            <label
                                                                                for="case">คืนเงินให้ลูกค้า</label><br>
                                                                            <input type="radio" id="case" name="case"
                                                                                value="2">
                                                                            <label
                                                                                for="case">คืนเงินให้ร้านค้า</label><br>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex flex-wrap pt-2 px-0 mx-0 col-12">
                                                                            <div class="col-6 pl-0 text-right">
                                                                                <a href="#">
                                                                                    <button class="form-control mx-0"
                                                                                        type="submit"
                                                                                        style='color:white;background:#23c197'>บันทึก</button>
                                                                                </a>
                                                                            </div>

                                                                            <div class="col-6 pr-0 text-left"
                                                                                style='color:#c45e9f'>
                                                                                <a href="#">
                                                                                    <a class="form-control mx-0 text-center"
                                                                                        data-dismiss="modal"
                                                                                        style='color:white;background:#a83c23'>ยกเลิก</a>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </form>
                                                            </div>
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

                            <div class="col-12 d-flex flex-wrap">
                                <div class="col-6 text-left">
                                    ลำดับที่ {{ (($cancelcase_all->currentPage()-1) * $cancelcase_all->perPage())+1 }} -
                                    {{ (($cancelcase_all->currentPage()-1) * $cancelcase_all->perPage())+ count($cancelcase_all) }}
                                    จาก
                                    {{ $cancelcase_all->total() }}

                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-end col-12">

                                        @if ($cancelcase_all->hasPages())
                                        <ul class="pagination">

                                            @if ($cancelcase_all->onFirstPage())
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                    class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                                        aria-hidden="true"></i></span></li>
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                    class="mr-1"><i class="fa fa-angle-left text-secondary"
                                                        aria-hidden="true"></i></span></li>
                                            @else <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $cancelcase_all->url(1) }}" rel="prev">
                                                    <i class="fa fa-angle-double-left text-secondary"
                                                        aria-hidden="true"></i>
                                                </a>
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $cancelcase_all->previousPageUrl() }}" rel="prev">
                                                    <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                                </a>
                                            </li> @endif

                                            @if ( $cancelcase_all->currentPage() > 5 )
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $cancelcase_all->url(1) }}"><span>1</span></a>
                                            </li>
                                            @endif


                                            @if ( $cancelcase_all->currentPage() > 5 )
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <span>...</span>
                                            </li>
                                            @endif



                                            @foreach(range(1, $cancelcase_all->lastPage()) as $i)
                                            @if($i >= $cancelcase_all->currentPage() - 2 && $i <= $cancelcase_all->
                                                currentPage()
                                                +
                                                2)

                                                @if ($i == $cancelcase_all->currentPage())
                                                <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                                @else
                                                <li class="px-2 bg-pagination-white"><a
                                                        href="{{ $cancelcase_all->url($i) }}">{{ $i }}</a></li>
                                                @endif
                                                @endif
                                                @endforeach


                                                @if ( $cancelcase_all->currentPage() < $cancelcase_all->lastPage() - 4)
                                                    <li class="align-self-center  px-2 bg-pagination-white">
                                                        <span>...</span>
                                                    </li>
                                                    @endif

                                                    @if($cancelcase_all->hasMorePages() == $cancelcase_all->lastPage()
                                                    &&
                                                    $cancelcase_all->lastPage() > 5)
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a
                                                            href="{{ $cancelcase_all->url($cancelcase_all->lastPage()) }}"><span>{{ $cancelcase_all->lastPage() }}</span>
                                                        </a>
                                                    </li>
                                                    @endif

                                                    @if ($cancelcase_all->hasMorePages())
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $cancelcase_all->nextPageUrl() }}" rel="next">
                                                            <i class="fa fa-angle-right text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $cancelcase_all->url($cancelcase_all->lastPage()) }}"
                                                            rel="next">
                                                            <i class="fa fa-angle-double-right text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </li>

                                                    @else
                                                    <li
                                                        class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                        <span><i class="fa fa-angle-right text-secondary"
                                                                aria-hidden="true"></i></span>
                                                    </li>
                                                    <li
                                                        class="disabled align-self-center px-2 bg-pagination-white d-none">
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

<script>
    $('#select-submenu').on('change', function () {
        value = $(this).val();
        $('a.nav-link[href="#list-' + value + '"]').click();
    });

</script>


<script>
    $(document).ready(function () {
        $("#status option").each(function (index) {
            location.getParams = getParams;
            // console.log (location.getParams()["status"]);
            if ($(this).val() == location.getParams()["status"]) {
                $(this).attr('selected', 'true');
                console.log($(this).val());
            }
        });
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

</script>


@endsection