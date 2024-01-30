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
@php
// dd($invs);
@endphp

<div class="container-fluid px-0" style='background:#fdf7fb'>
    <div class="row">
        <div class="col-xl-12 col-12 ml-xl-auto">
            <h5 class="mt-4"><b>ยืนยันการโอนเงิน Wallet</b>
            </h5>
            <div class=" text-center">
                <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                aria-controls="list-1" aria-selected="true">ทั้งหมด ({{ count($invs_wallet) }})</a>
                        </li>
                    </ul>
                </div>

                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="1">ทั้งหมด ({{ count($invs_wallet) }})</option>
                    </select>
                </div>

                {{-- SEARCH --}}
                <div class="col-lg-12 col-md-12 col-12 pt-4">
                    <form role="search" action="/dashboard/payment/walletApprove" method="GET">
                        {{-- @csrf --}}
                        <div class="input-group flex-wrap">
                            <input hidden type="search" name="search" class="form-control"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="search" placeholder="ค้นหาสินค้า" aria-label="search"
                                aria-describedby="addon-wrapping">
                            <div
                                class="col-lg-auto d-flex align-items-center col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">วันที่ทำการถอน</h6>
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
                        </div>
                        <div class="input-group flex-wrap pt-2">
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">สถานะ</h6>
                            </div>
                            <select class="form-control col-lg-2" id="status" name='status'>
                                <option id='status_chk' value='0'>ทั้งหมด</option>
                                <option id='status_chk' value='12'>รอการอนุมัติ</option>
                                <option id='status_chk' value='2'>อนุมัติสำเร็จ</option>
                                <option id='status_chk' value='99'>ปฏิเสธการอนุมัติ</option>
                            </select>
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">ชื่อผู้ใช้งาน</h6>
                            </div>
                            @if (isset($_REQUEST['u_name']))
                            <input type="text" name="u_name" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['u_name'] }}" placeholder="ชื่อผู้ใช้งาน" aria-label="u_name"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="u_name" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="ชื่อผู้ใช้งาน" aria-label="u_name" aria-describedby="addon-wrapping">
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
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">INV_REF</h6>
                            </div>
                            @if (isset($_REQUEST['inv_ref']))
                            <input type="text" name="inv_ref" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['inv_ref'] }}" placeholder="INV_REF" aria-label="amount"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="inv_ref" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="INV_REF" aria-label="inv_ref" aria-describedby="addon-wrapping">
                            @endif
                            <div class="col-lg-2 col-md-2 col-12 mb-2">
                                <input type="submit" value="Filter" name="filter" id="filter"
                                    class="form-control btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                {{-- SEARCH --}}
                <div class="col-lg-2 col-md-3 col-12 ml-auto py-3">
                    <a href="/dashboard/wallet_approve/excel/?date_start={{ @$_REQUEST['date_start'] }}&date_end={{ @$_REQUEST['date_end'] }}&status={{ @$_REQUEST['status'] }}&u_name={{ @$_REQUEST['u_name'] }}&amount={{ @$_REQUEST['amount'] }}&inv_ref={{ @$_REQUEST['inv_ref'] }}"
                        class="btn btn-success form-control"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        Download Excel </a>
                </div>

                <div class="w-100">
                    <div class="tab-content">
                        {{-- 1taphome --}}
                        <div class="row justify-content-center tab-pane fade show active " id="list-1">
                            <div class="container-fluid table-responsive">
                                <div class="card" style="border: none;">
                                    <div class="card-body m-2 p-0 ">
                                        <table class="table table-striped" id="main_table">
                                            <thead>
                                                <tr>
                                                    <th class='no-sort'><input type="checkbox" name="select_all"
                                                            value="1" id="example-select-all"></th>
                                                    <th scope="col">อันดับ</th>
                                                    <th style="width:150px" scope="col">วันที่</th>
                                                    <th style="width:150px" scope="col">ชื่อผู้ใช้งาน</th>
                                                    <th scope="col">จำนวนเงิน</th>
                                                    <th scope="col">INV_REF</th>
                                                    <th style="width:150px" scope="col">สถานะ</th>
                                                    <th style="width:150px" scope="col">สาเหตุการปฏิเสธ</th>
                                                    <th scope="col">ดำเนินการ</th>
                                                    <th scope="col">ผู้ดำเนินการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($invs_wallet as $key=>$invsdata)
                                                <tr style="text-align: center; align-items: center;">
                                                    <td><input type="checkbox" name="id[]" value="{{ $key+1 }}"></td>
                                                    <td data-label="#">{{ $key+1 }}</td>


                                                    <td data-label="วันที่">
                                                        {{ date('d/m/Y H:i', strtotime($invsdata->created_at)) }}
                                                    </td>

                                                    <td data-label="ชื่อผู้ใช้งาน" style="font-weight:bold;">
                                                        {{ @$invsdata->user->name }} {{ @$invsdata->user->surname }}
                                                    </td>


                                                    <td data-label="จำนวนเงิน">
                                                        {{ number_format($invsdata->total,2) }}</td>

                                                    <td data-label="INV_REF">{{ $invsdata->inv_ref }}</td>

                                                    <td data-label="สถานะ">
                                                        @if($invsdata->status == '12')
                                                        <b style='color:#ffab0d'>รอการอนุมัติ</b>
                                                        @elseif($invsdata->status == '99')
                                                        <b style='color:#ff1c1c'>ปฏิเสธการอนุมัติ</b>
                                                        @elseif($invsdata->status == '2')
                                                        <b style='color:#23c197'>อนุมัติสำเร็จ</b>
                                                        @else
                                                        <b style='color:#ffab0d'>รอการชำระ</b>
                                                        @endif
                                                    </td>
                                                    <td data-label="สถานะ">
                                                        <b style='color:#ff1c1c'>{{ @$invsdata->note }}</b>
                                                    </td>

                                                    <td data-label="ดำเนินการ"
                                                        style='text-decoration: underline;color:#226fff'>
                                                        <a data-toggle="modal"
                                                            data-target="#chk_status{{ $invsdata->id }}">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"
                                                                style='cursor: pointer;'></i>
                                                        </a>
                                                    </td>
                                                    @if(isset($invsdata->approve_user->name))
                                                    <td data-label="ผู้ดำเนินการ">
                                                        {{ @$invsdata->approve_user->name }}
                                                        ({{@$invsdata->approve_user->username}})
                                                    </td>
                                                    @else
                                                    <td data-label="ผู้ดำเนินการ">
                                                        -
                                                    </td>
                                                    @endif
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="chk_status{{$invsdata->id}}"
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
                                                                            <b style='color:#ffab0d'>รอการอนุมัติ</b>
                                                                            @elseif($invsdata->status == '99')
                                                                            <b
                                                                                style='color:#ff1c1c'>ปฏิเสธการอนุมัติ</b>
                                                                            @elseif($invsdata->status == '2')
                                                                            <b style='color:#23c197'>อนุมัติสำเร็จ</b>
                                                                            @else
                                                                            <b style='color:#ffab0d'>รอการชำระ</b>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-wrap pt-4">
                                                                        <div class="col-6 px-0 text-left">
                                                                            <b>ชื่อผู้ใช้งาน :</b>
                                                                        </div>
                                                                        <div class="col-6 px-0 text-right">
                                                                            <b> {{ @$invsdata->user->name }}
                                                                                {{ @$invsdata->user->surname }}</b>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-wrap pt-4">
                                                                        <div class="col-6 px-0 text-left">
                                                                            <b>จำนวน : </b>
                                                                        </div>
                                                                        <div class="col-6 px-0 text-right"
                                                                            style='color:#c45e9f'>
                                                                            <b> ฿
                                                                                {{ number_format($invsdata->total,2) }}</b>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-wrap pt-4">
                                                                        <div class="col-6 px-0 text-left">
                                                                            <b>วัน-เวลา ที่โอน : </b>
                                                                        </div>
                                                                        <div class="col-6 px-0 text-right">
                                                                            <b>{{ @$invsdata->date_tranfer }}
                                                                                {{ @$invsdata->time_tranfer }}</b>
                                                                        </div>
                                                                    </div>
                                                                    <img class='mt-4'
                                                                        style=';width: 200px;height: 300px;'
                                                                        src="{{asset('/img/bank_image/'.$invsdata->transfer_img)}}"
                                                                        alt="">
                                                                    @if($invsdata->status == '1' || $invsdata->status ==
                                                                    '12' )
                                                                    <form
                                                                        action="/dashboard/payment/btnapprovewithdrows/?id={{$invsdata->id}}"
                                                                        method="post">
                                                                        @csrf
                                                                        <input hidden type="text" name='id'
                                                                            value='{{$invsdata->id}}'>
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
                                                                            <a><button class="form-control"
                                                                                    style='color:white;background:#23c197'>อนุมัติ</button></a>
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
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end col-12">


                                @if ($invs_wallet->hasPages())
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}

                                    @if ($invs_wallet->onFirstPage())
                                    <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                            class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                                aria-hidden="true"></i></span></li>
                                    <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                            class="mr-1"><i class="fa fa-angle-left text-secondary"
                                                aria-hidden="true"></i></span></li>
                                    @else <li class="align-self-center px-2 bg-pagination-white">
                                        <a href="{{ $invs_wallet->url(1) }}" rel="prev">
                                            <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                                        </a>
                                    <li class="align-self-center px-2 bg-pagination-white">
                                        <a href="{{ $invs_wallet->previousPageUrl() }}" rel="prev">
                                            <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                        </a>
                                    </li> @endif

                                    {{-- show button first page --}}
                                    @if ( $invs_wallet->currentPage() > 5 )
                                    <li class="align-self-center px-2 bg-pagination-white">
                                        <a href="{{ $invs_wallet->url(1) }}"><span>1</span></a>
                                    </li>
                                    @endif
                                    {{-- show button first page --}}


                                    {{-- condition stay in first page not show button --}}
                                    {{-- @if ( $invs_wallet->currentPage() == 1 )
                                                    <li class="align-self-center mr-1">
                                                        <a class="d-none page-link" tabindex="-2">1</a>
                                                    </li>
                                                    @endif --}}


                                    @if ( $invs_wallet->currentPage() > 5 )
                                    <li class="align-self-center px-2 bg-pagination-white">
                                        <span>...</span>
                                    </li>
                                    @endif



                                    @foreach(range(1, $invs_wallet->lastPage()) as $i)
                                    @if($i >= $invs_wallet->currentPage() - 2 && $i <= $invs_wallet->currentPage() +
                                        2)

                                        @if ($i == $invs_wallet->currentPage())
                                        <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                        @else
                                        <li class="px-2 bg-pagination-white"><a
                                                href="{{ $invs_wallet->url($i) }}">{{ $i }}</a>
                                        </li>
                                        @endif
                                        @endif
                                        @endforeach


                                        {{-- three dots between number near last pages --}}
                                        @if ( $invs_wallet->currentPage() < $invs_wallet->lastPage() - 4)
                                            <li class="align-self-center  px-2 bg-pagination-white">
                                                <span>...</span>
                                            </li>
                                            @endif
                                            {{-- three dots between number near last pages --}}


                                            {{-- Show Last Page --}}
                                            @if($invs_wallet->hasMorePages() == $invs_wallet->lastPage() &&
                                            $invs_wallet->lastPage() > 5)
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $invs_wallet->url($invs_wallet->lastPage()) }}"><span>{{ $invs_wallet->lastPage() }}</span>
                                                </a>
                                            </li>
                                            @endif
                                            {{-- Show Last Page --}}



                                            @if ($invs_wallet->hasMorePages())
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $invs_wallet->nextPageUrl() }}" rel="next">
                                                    <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $invs_wallet->url($invs_wallet->lastPage()) }}" rel="next">
                                                    <i class="fa fa-angle-double-right text-secondary"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </li>

                                            @else
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                <span><i class="fa fa-angle-right text-secondary"
                                                        aria-hidden="true"></i></span></li>
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><i
                                                    class="fa fa-angle-double-right text-secondary"
                                                    aria-hidden="true"></i></a></li>

                                            @endif
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endsection


                @section('script')

                <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
                {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

                <script>
                    $('#select-submenu').on('change', function () {
                        value = $(this).val();
                        $('a.nav-link[href="#list-' + value + '"]').click();
                    });

                </script>
                <script>
                    $(document).ready(function () {

                        // $('tr').find("th.no-sort").removeClass("sorting_asc");

                        $("#status option").each(function (index) {
                            location.getParams = getParams;
                            // console.log (location.getParams()["status"]);
                            if ($(this).val() == location.getParams()["status"]) {
                                $(this).attr('selected', 'true');
                                console.log($(this).val());
                            }
                        });

                        $('#add-note').click(function () {
                            var note = $('#note_note').val();
                            console.log(note);

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

                    $('input:radio').change(function () {
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
                            .forEach(function (item) {
                                tmp = item.split("=");
                                result[tmp[0]] = decodeURIComponent(tmp[1]);
                            });

                        return result;
                    }

                </script>

                @endsection