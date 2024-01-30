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
        background: #23c197
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
            <h5 class="mt-4"><b>รับสินค้าหน้างาน</b>
            </h5>
            <div class=" text-center">
                <div class="" style='font-size:unset'>
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item" style="font-size: 18px;">
                            <a class="nav-link active bold black pt-2 pl-2" data-toggle="tab" href="#buynow">ทั้งหมด
                                ({{ $invs_now->total() }})</a>
                        </li>
                        {{-- <li class="nav-item" style="font-size: 18px;">
                            <a class="nav-link bold black pt-2 pl-2" data-toggle="tab" href="#appove">จ่ายแล้ว</a>
                        </li>
                        <li class="nav-item" style="font-size: 18px;">
                            <a class="nav-link bold black pt-2 pl-2" data-toggle="tab" href="#send">ส่งแล้ว ถึงแล้ว</a>
                        </li>
                        <li class="nav-item" style="font-size: 18px;">
                            <a class="nav-link bold black pt-2 pl-2" data-toggle="tab" href="#receive">รับแล้ว</a>
                        </li>
                        <li class="nav-item" style="font-size: 18px;">
                            <a class="nav-link bold black pt-2 pl-2" data-toggle="tab" href="#cancel">ยกเลิก
                                ยกเลิกแล้ว</a>
                        </li>
                        <li class="nav-item" style="font-size: 18px;">
                            <a class="nav-link bold black pt-2 pl-2" data-show="buynow" data-toggle="tab"
                                href="#buynow">รับสินค้าหน้างาน</a>
                        </li> --}}
                    </ul>
                </div>

                {{-- SEARCH --}}
                <div class="col-lg-12 col-md-12 col-12 pt-4">
                    <form role="search" action="/dashboard/Buy_Now" method="GET">
                        {{-- @csrf --}}
                        <div class="input-group flex-wrap">
                            <input hidden type="search" name="search" class="form-control"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="search" placeholder="ค้นหาสินค้า" aria-label="search"
                                aria-describedby="addon-wrapping">
                        </div>
                        <div class="input-group flex-wrap pt-2">
                            <div
                                class="col-lg-auto d-flex align-items-center col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">วัน-เดือน-ปี (เกิด)</h6>
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
                                <option id='status_chk' value='43'>รอรับสินค้าหน้างาน</option>
                                <option id='status_chk' value='53'>รับสินค้าหน้างานแล้ว </option>
                            </select>

                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">INV REF</h6>
                            </div>
                            @if (isset($_REQUEST['inv_ref']))
                            <input type="text" name="inv_ref" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['inv_ref'] }}" placeholder="INV REF" aria-label="inv_ref"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="inv_ref" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="INV REF" aria-label="inv_ref" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">ชื่อ</h6>
                            </div>
                            @if (isset($_REQUEST['u_name']))
                            <input type="text" name="u_name" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['u_name'] }}" placeholder="ชื่อ" aria-label="u_name"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="u_name" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="ชื่อ" aria-label="u_name" aria-describedby="addon-wrapping">
                            @endif

                            <div class="col-lg-2 col-md-2 col-12 mb-2 ml-auto">
                                <input type="submit" value="Filter" name="filter" id="filter"
                                    class="form-control btn btn-primary">
                            </div>
                        </div>



                    </form>
                </div>

                {{-- SEARCH --}}

                <div class="w-100">
                    <div class="tab-content">
                        {{-- 1taphome --}}
                        <form action="/dashboard/get_pd_check" method="post">
                            @csrf
                            <div class="row justify-content-center tab-pane fade show active " id="buynow">
                                <div class="col-lg-3 col-md-3 col-8 pt-3">
                                    <button type="submit" class='btn btn-primary form-control check'
                                        id='checking'>รับสินค้าหลายชิ้น</button>
                                </div>
                                <div class="container-fluid table-responsive px-0">
                                    <div class="card" style="border: none;">
                                        <div class="card-body m-2 p-0">
                                            <table class="table table-striped" id="buynow_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"> </th>
                                                        <th scope="col">ลำดับที่</th>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Inv Ref</th>
                                                        <th scope="col">Name User</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">ดำเนินการ</th>
                                                        <th scope="col">Check</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($invs_now as $key=>$invss)
                                                    <tr style="text-align: center; align-items: center;">
                                                        @if($invss->status == '43')
                                                        <td>
                                                            <input type="checkbox" name="id[]" class='checkbox1'
                                                                value="{{ $invss->id }}">
                                                        </td>
                                                        @else
                                                        <td>
                                                            <input type="checkbox" name="id[]" class='checkbox1'
                                                                value="{{ $invss->id }}" style='cursor:no-drop'
                                                                disabled>
                                                        </td>
                                                        @endif

                                                        <td data-label="a">
                                                            {{ (($invs_now->currentPage()-1) * $invs_now->perPage())+$key+1 }}
                                                        </td>
                                                        <td data-label="#">{{ $invss->id }}</td>

                                                        <td data-label="inv_ref">
                                                            {{ @$invss->inv_ref }}
                                                        </td>

                                                        <td data-label="user">
                                                            {{ @$invss->user->name }} {{ @$invss->user->surname }}
                                                        </td>
                                                        <td data-label="วันที่">
                                                            {{ date('d/m/y H:i', strtotime($invss->created_at)) }}
                                                        </td>

                                                        <td data-label="สถานะ">
                                                            @if($invss->status == '43')
                                                            <b style='color:#ffab0d'>รอรับสินค้าหน้างาน</b>
                                                            @elseif($invss->status == '53')
                                                            <b style='color:#23c197'>รับสินค้าหน้างานแล้ว</b>
                                                            @endif
                                                        </td>

                                                        {{-- <td data-label="ship">
                                                        {{ $invss->status }}
                                                        </td> --}}

                                                        <td data-label="total">
                                                            {{ $invss->total }}
                                                        </td>

                                                        <td data-label="ดำเนินการ"
                                                            style='text-decoration: underline;color:#226fff'>
                                                            @if($invss->status == '43')
                                                            <a data-toggle="modal"
                                                                data-target="#chk_status_buynow{{ $invss->id }}"
                                                                style='cursor:pointer'>
                                                                ยืนยันการรับสินค้า
                                                            </a>
                                                            @else
                                                            <a style='cursor:no-drop'> รับสินค้าแล้ว
                                                            </a>
                                                            @endif
                                                        </td>

                                                        @if(!isset($invss->log))
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
                                                        @endif

                                                        <!-- End -->
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="chk_status_buynow{{$invss->id}}"
                                                        role="dialog">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4> ยืนยันการรับสินค้าหน้างาน <h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span>
                                                                            </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-12 px-0 text-left pb-3">
                                                                        <b>ข้อมูลผู้ซื้อ</b>
                                                                        <div class="d-flex flex-wrap pt-4">
                                                                            <b> ชื่อ</b> :
                                                                            {{ @$invss->user->name }}
                                                                            {{ @$invss->user->surname }}
                                                                        </div>
                                                                        <div class="d-flex flex-wrap">
                                                                            <b>เบอร์</b> :
                                                                            {{ @$invss->user->phone }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 border-top text-left">
                                                                        <div>
                                                                            <h4><b>สินค้า</b></h4>
                                                                        </div>
                                                                        @foreach($arr_pd[$invss->id] as $key => $value)
                                                                        <div class='d-flex flex-wrap'>
                                                                            <div
                                                                                class='d-flex flex-wrap col-12 mb-2 pt-2'>
                                                                                <div class='col-lg-2 col-12'>
                                                                                    <img class="align-self-start mr-3"
                                                                                        style="max-height: 100px; max-width: 100px; border: 1px solid #caced1;"
                                                                                        src="{{asset('img/product/'.@$value->product_img[0]) }}"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    <div><b>ชื่อสินค้า</b> :
                                                                                        {{ @$value->name }}
                                                                                    </div>
                                                                                    <div><b>ราคา</b> :
                                                                                        {{ @$invss->inv_products[$key]['price'] }}
                                                                                    </div>
                                                                                    <div><b>จำนวน</b> :
                                                                                        {{ @$invss->inv_products[$key]['amount'] }}
                                                                                    </div>
                                                                                    <div><b>รายละเอียด</b> <span
                                                                                            class='text-dot2'>:
                                                                                            {{ @$value->description }}<span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer"
                                                                    style="justify-content: flex-start;">
                                                                    <div class="d-flex flex-wrap pt-2 px-0 mx-0 col-12">
                                                                        <div class="col-6 pl-0 text-right">
                                                                            <a class='form-control mx-0 btn-sub text-center'
                                                                                href="get_pd_now?id={{ $invss->id }}">
                                                                                ตกลง
                                                                                {{-- <a class="form-control mx-0 btn-sub"
                                                                                    id='btn-sub'></a> --}}
                                                                            </a>
                                                                        </div>

                                                                        <div class="col-6 pr-0 text-left"
                                                                            style='color:#c45e9f'>
                                                                            <a href="#">
                                                                                <a class="form-control mx-0 text-center"
                                                                                    data-dismiss="modal"
                                                                                    style='color:white;background:#a83c23;cursor: pointer;'>ยกเลิก</a>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- End -->
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex flex-wrap">
                                        <div class="col-6 text-left">
                                            ลำดับที่ {{ (($invs_now->currentPage()-1) * $invs_now->perPage())+1 }} -
                                            {{ (($invs_now->currentPage()-1) * $invs_now->perPage())+ count($invs_now) }}
                                            จาก
                                            {{ $invs_now->total() }}

                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex justify-content-end col-12">


                                                @if ($invs_now->hasPages())
                                                <ul class="pagination">
                                                    {{-- Previous Page Link --}}

                                                    @if ($invs_now->onFirstPage())
                                                    <li
                                                        class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                        <span class="mr-1"><i
                                                                class="fa fa-angle-double-left text-secondary"
                                                                aria-hidden="true"></i></span></li>
                                                    <li
                                                        class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                        <span class="mr-1"><i class="fa fa-angle-left text-secondary"
                                                                aria-hidden="true"></i></span></li>
                                                    @else <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $invs_now->url(1) }}" rel="prev">
                                                            <i class="fa fa-angle-double-left text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $invs_now->previousPageUrl() }}" rel="prev">
                                                            <i class="fa fa-angle-left text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </li> @endif

                                                    {{-- show button first page --}}
                                                    @if ( $invs_now->currentPage() > 5 )
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $invs_now->url(1) }}"><span>1</span></a>
                                                    </li>
                                                    @endif
                                                    {{-- show button first page --}}


                                                    {{-- condition stay in first page not show button --}}
                                                    {{-- @if ( $invs_now->currentPage() == 1 )
                                                                    <li class="align-self-center mr-1">
                                                                        <a class="d-none page-link" tabindex="-2">1</a>
                                                                    </li>
                                                                    @endif --}}


                                                    @if ( $invs_now->currentPage() > 5 )
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <span>...</span>
                                                    </li>
                                                    @endif



                                                    @foreach(range(1, $invs_now->lastPage()) as $i)
                                                    @if($i >= $invs_now->currentPage() - 2 && $i <= $invs_now->
                                                        currentPage()
                                                        +
                                                        2)

                                                        @if ($i == $invs_now->currentPage())
                                                        <li class="active px-2 bg-pagination-42294f">
                                                            <span>{{ $i }}</span></li>
                                                        @else
                                                        <li class="px-2 bg-pagination-white"><a
                                                                href="{{ $invs_now->url($i) }}">{{ $i }}</a>
                                                        </li>
                                                        @endif
                                                        @endif
                                                        @endforeach


                                                        {{-- three dots between number near last pages --}}
                                                        @if ( $invs_now->currentPage() < $invs_now->lastPage() - 4)
                                                            <li class="align-self-center  px-2 bg-pagination-white">
                                                                <span>...</span>
                                                            </li>
                                                            @endif
                                                            {{-- three dots between number near last pages --}}


                                                            {{-- Show Last Page --}}
                                                            @if($invs_now->hasMorePages() == $invs_now->lastPage() &&
                                                            $invs_now->lastPage() > 5)
                                                            <li class="align-self-center px-2 bg-pagination-white">
                                                                <a href="{{ $invs_now->url($invs_now->lastPage()) }}"><span>{{ $invs_now->lastPage() }}</span>
                                                                </a>
                                                            </li>
                                                            @endif
                                                            {{-- Show Last Page --}}



                                                            @if ($invs_now->hasMorePages())
                                                            <li class="align-self-center px-2 bg-pagination-white">
                                                                <a href="{{ $invs_now->nextPageUrl() }}" rel="next">
                                                                    <i class="fa fa-angle-right text-secondary"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li class="align-self-center px-2 bg-pagination-white">
                                                                <a href="{{ $invs_now->url($invs_now->lastPage()) }}"
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
                        </form>
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
    $(document).ready(function () {
                // alert('s');
               
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

<script>
    $(document).ready(function(){
                var url      = window.location.href; 
                var res = url.split("#");
                $('[data-show="'+res[1]+'"').tab('show');
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
    }
</script>




<script>
    $(document).ready(function () {
                // $('#buynow_table').dataTable({
                //     "pageLength": 50
                // });
                // $('tr').find("th.no-sort").removeClass("sorting_asc");
                var msg = '{{Session::get('alert')}}';
                var exist = '{{Session::has('alert')}}';
                if(exist){
                    Swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถทำรายการได้',
                    text: msg
                    })
                }


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

            


            $('input:checkbox').on('click', function () {
                var btn_sub = $(this).parents('.modal').find('button.btn-sub');
                if (this.checked == true) {
                    btn_sub.removeAttr('disabled');
                } else {
                    btn_sub.attr('disabled', 'true');
                }

            });



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