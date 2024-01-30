@extends('layouts.dashboard')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>
    table,
    th,
    td {
        border: unset;
    }

    .btn-purplish-pink {
        color: #fff;
        background-color: #c45e9f;
        border-color: #c45e9f;
    }

    /* .btn-outline-purplish-pink:hover{
    background-color: #c45e9f;
} */
    .btn-purplish-pink:active {
        background-color: #c45e9f;
    }

    .btn-purplish-pink:visited {
        background-color: #c45e9f;
    }

    .box {
        height: calc(100vh - 300px);
    }

    .top {
        margin-top: 30px;
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

    .modal-backdrop {
        display: none;
    }

    .modal {
        background: rgba(0, 0, 0, 0.5);
    }
</style>
<?php
$session = session()->all();
?>
@if(isset($session['alert']))
<div hidden><input type="text" id='alertfield' value="{{$session['alert']}}"></div>
@endif
<div class="container-fluid top">
    <div class="row">
        <div class="col-xl-12 col-12">

            <div class="card">
                <div class="card-head mt-3 ml-3">
                    <h2><b>ผู้แนะนำร้านค้า</b></h2>

                    <div class="card-body px-0">
                        @csrf
                        <form action="/dashboard/influencer/seacrh" method="get">

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12 mb-3 d-flex align-items-center" id="input-daterange">
                                    <div class="form-row w-100">
                                        @if (isset($_REQUEST['start_date']))
                                        <div class="col-lg-4 col-md-4 col-6 mb-2">
                                            <input type="date" class="form-control" value="{{ $_REQUEST['start_date'] }}" id="from_date" name="start_date" placeholder="วันที่เริ่มต้น">
                                        </div>
                                        @else
                                        <div class="col-lg-4 col-md-4 col-6 mb-2">
                                            <input type="date" class="form-control" id="from_date" name="start_date" placeholder="วันที่เริ่มต้น">
                                        </div>
                                        @endif
                                        @if (isset($_REQUEST['end_date']))
                                        <div class="col-lg-4 col-md-4 col-6 mb-2">
                                            <input type="date" class="form-control" value="{{ $_REQUEST['end_date'] }}" id="from_date" name="end_date" placeholder="วันที่สิ้นสุด">
                                        </div>
                                        @else
                                        <div class="col-lg-4 col-md-4 col-6 mb-2">
                                            <input type="date" class="form-control" id="from_date" name="end_date" placeholder="วันที่สิ้นสุด">
                                        </div>
                                        @endif
                                        <div class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                            <h6 class="mb-0">รหัสคนแนะนำร้านค้า</h6>
                                        </div>
                                        @if (isset($_REQUEST['Influencer']))
                                        <input type="text" name="Influencer" class="form-control col-lg-2" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value="{{ $_REQUEST['Influencer'] }}" placeholder="รหัสคนแนะนำร้านค้า" aria-label="Influencer" aria-describedby="addon-wrapping">
                                        @else
                                        <input type="text" name="Influencer" class="form-control col-lg-2" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value="" placeholder="รหัสคนแนะนำร้านค้า" aria-label="Influencer" aria-describedby="addon-wrapping">
                                        @endif
                                        <div class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                            <h6 class="mb-0">สถานะ ร้านค้า</h6>
                                        </div>
                                        <select class="form-control col-lg-2" id="shop_select" name='shop_select'>
                                            <option id='shop_select_chk' value='0'>ทั้งหมด</option>
                                            <option id='shop_select_chk' value='approve'>ตรวจสอบแล้ว</option>
                                            <option id='shop_select_chk' value='waiting'>รอตรวจสอบ</option>
                                            <option id='shop_select_chk' value='decide'>รอตัดสินใจ</option>
                                            <option id='shop_select_chk' value='decline'>Ban</option>
                                        </select>
                                        <div class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                            <h6 class="mb-0">ชื่อร้านค้า</h6>
                                        </div>
                                        @if (isset($_REQUEST['shop_name']))
                                        <input type="text" name="shop_name" class="form-control col-lg-2" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value="{{ $_REQUEST['shop_name'] }}" placeholder="ชื่อร้านค้า" aria-label="shop_name" aria-describedby="addon-wrapping">
                                        @else
                                        <input type="text" name="shop_name" class="form-control col-lg-2" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value="" placeholder="ชื่อร้านค้า" aria-label="shop_name" aria-describedby="addon-wrapping">
                                        @endif
                                        <div class="col-lg-2 col-md-2 col-12 mb-2">
                                            <input type="submit" value="Filter" name="filter" id="filter" class="form-control btn btn-primary">
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-12 mb-2">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    เพิ่มเติม
                                                </button>
                                                <div class="dropdown-menu" id="drop" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="/dashboard/influencer">ทั้งหมด</a>
                                                    <a class="dropdown-item" href="/dashboard/influencer/no-onePersernal">ไม่มีผู้แนะนำ</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </form>
                        @csrf
                        @if(isset($shop))
                        <div class="col-12">


                            <form action="/dashboard/influencer/update" method="post">
                                @csrf

                                <a id='kill_shop' formaction="/dashboard/influencer/kill_shop" class="px-3 mx-1 mb-3 btn btn-danger d-flex flex-row " style="float: right; color:white">ลบร้านค้า</a>
                                <button type="submit" formaction="/dashboard/influencer/ban" class="px-3 mx-1 mb-3 btn btn-danger d-flex flex-row " style="float: right;">BAN</button>
                                <button type="submit" formaction="/dashboard/influencer/approve_shop" class="px-3 mx-1 mb-3 btn btn-warning d-flex flex-row " name='btn_choice' style="float: right;color: white;" value='decide'>รอตัดสินใจ</button>
                                <button type="submit" formaction="/dashboard/influencer/del_ban" class="px-3 mx-1 mb-3 btn btn-success d-flex flex-row " style="float: right;">ปลด
                                    BAN</button>
                                <button type="submit" formaction="/dashboard/influencer/approve_shop" class="px-3 mx-1 mb-3 btn btn-success d-flex flex-row " name='btn_choice' style="float: right;" value='approve'>ตรวจสอบแล้ว</button>
                                <button type="submit" class="mb-3 mx-1 btn btn-primary d-flex flex-row " style="float: right;">บันทึก</button>




                                <table class="table" id="">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center; cursor: pointer;" onclick="sortTable(0)">ลำดับ
                                            </th>
                                            <th style="text-align:center; cursor: pointer;" onclick="sortTable(1)">
                                                shop_id
                                            </th>
                                            <th style="text-align:center; cursor: pointer;" onclick="sortTable(2)">
                                                user_id
                                            </th>
                                            <th style="text-align:center; cursor: pointer;" onclick="sortTable(3)">
                                                ชื่อร้าน
                                            </th>
                                            <th style="text-align:center; cursor: pointer;" onclick="sortTable(4)">
                                                วันที่สมัคร
                                            </th>
                                            <th style="text-align:center; cursor: pointer;" onclick="sortTable(5)">
                                                จำนวนสินค้า
                                            </th>
                                            <th style="text-align:center; cursor: pointer;" onclick="sortTable(6)">
                                                รหัสคนแนะนำร้านค้า
                                            </th>
                                            <th style="text-align:center; cursor: pointer;">
                                                สถานะร้านค้า
                                            </th>
                                            <th>ตรวจสอบ <input type="checkbox" id="check_all"> </th>
                                        </tr>
                                    </thead>

                                    @php
                                    $approve_name=array(
                                    'waiting' => 'รอตรวจสอบ',
                                    'approve' => 'ตรวจสอบแล้ว',
                                    'decline' => 'Ban'
                                    );
                                    @endphp

                                    <tbody>
                                        @foreach($shop as $key=>$shopp)
                                        @if($shopp->approve_shop == 1)
                                        <tr style="background-color: #33FF5B;">
                                            @else
                                        <tr>
                                            @endif
                                            <td style="text-align:center">{{$key+1}}</td>
                                            <td style="text-align:center">{{ $shopp->id }}</td>
                                            <td style="text-align:center"><a style='text-decoration: underline;color:#226fff;cursor: pointer;' data-toggle="modal" data-target="#chk_status{{ $shopp->id }}">{{ $shopp->user_id }}</a></td>
                                            <td style="text-align:center">{{ $shopp->shop_name }}</td>
                                            <td style="text-align:center">{{ $shopp->created_at }}</td>
                                            <td style="text-align:center">
                                                {{ count($shopp->products) + count($shopp->products_preorder) }}
                                            </td>
                                            <td style="text-align:center">{{ $shopp->Influencer ?? 'ไม่มีผู้แนะนำ' }}
                                            <td class='font-weight-bold' style="text-align:center" id='approve_name'>
                                                @if($shopp->approve_shop == 'waiting')
                                                รอตรวจสอบ
                                                @elseif($shopp->approve_shop == 'approve')
                                                ตรวจสอบแล้ว
                                                @elseif($shopp->approve_shop == 'decide')
                                                รอตัดสินใจ
                                                @elseif($shopp->approve_shop == null)
                                                รอตรวจสอบ
                                                @else
                                                Ban
                                                @endif
                                            </td>
                                            @if($shopp->approve_shop == 1)
                                            <td>
                                                <input type="checkbox" checked name="approve_shop[]" value="{{ $shopp->id }}">
                                            </td>
                                            @else
                                            <td>
                                                <input type="checkbox" name="approve_shop[]" value="{{ $shopp->id }}">
                                            </td>
                                        </tr>
                                        @endif
                                        <!-- Modal -->
                                        <div class="modal fade" id="chk_status{{$shopp->id}}" style='z-index:1500' role="dialog">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        ข้อมูล User
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="col-12 px-0 text-left">
                                                                <div class="d-flex flex-wrap pt-4">
                                                                    <b> ชื่อ</b> :
                                                                    {{ @$shopp->name }}
                                                                    {{ @$shopp->surname }}
                                                                </div>
                                                                <div class="d-flex flex-wrap">
                                                                    <b>เบอร์</b> :
                                                                    {{ @$shopp->phone }}
                                                                </div>
                                                                <div class="d-flex flex-wrap">
                                                                    <b>Email</b> :
                                                                    {{ @$shopp->email }}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- End -->
                                        @endforeach


                                    </tbody>

                                    <!-- <button type="submit" class="btn btn-primary">บันทึก</button> -->




                                </table>
                            </form>
                            @endif


                            <div class="d-flex justify-content-end col-12">


                                @if ($shop->hasPages())
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}

                                    @if ($shop->onFirstPage())
                                    <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
                                    <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
                                    @else <li class="align-self-center px-2 bg-pagination-white">
                                        <a href="{{ $shop->url(1) }}" rel="prev">
                                            <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                                        </a>
                                    <li class="align-self-center px-2 bg-pagination-white">
                                        <a href="{{ $shop->previousPageUrl() }}" rel="prev">
                                            <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                        </a>
                                    </li> @endif

                                    {{-- show button first page --}}
                                    @if ( $shop->currentPage() > 5 )
                                    <li class="align-self-center px-2 bg-pagination-white">
                                        <a href="{{ $shop->url(1) }}"><span>1</span></a>
                                    </li>
                                    @endif
                                    {{-- show button first page --}}


                                    {{-- condition stay in first page not show button --}}
                                    {{-- @if ( $shop->currentPage() == 1 )
                                                    <li class="align-self-center mr-1">
                                                        <a class="d-none page-link" tabindex="-2">1</a>
                                                    </li>
                                                    @endif --}}


                                    @if ( $shop->currentPage() > 5 )
                                    <li class="align-self-center px-2 bg-pagination-white">
                                        <span>...</span>
                                    </li>
                                    @endif



                                    @foreach(range(1, $shop->lastPage()) as $i)
                                    @if($i >= $shop->currentPage() - 2 && $i <= $shop->currentPage() +
                                        2)

                                        @if ($i == $shop->currentPage())
                                        <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                        @else
                                        <li class="px-2 bg-pagination-white"><a href="{{ $shop->url($i) }}">{{ $i }}</a>
                                        </li>
                                        @endif
                                        @endif
                                        @endforeach


                                        {{-- three dots between number near last pages --}}
                                        @if ( $shop->currentPage() < $shop->lastPage() - 4)
                                            <li class="align-self-center  px-2 bg-pagination-white">
                                                <span>...</span>
                                            </li>
                                            @endif
                                            {{-- three dots between number near last pages --}}


                                            {{-- Show Last Page --}}
                                            @if($shop->hasMorePages() == $shop->lastPage() &&
                                            $shop->lastPage() > 5)
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $shop->url($shop->lastPage()) }}"><span>{{ $shop->lastPage() }}</span>
                                                </a>
                                            </li>
                                            @endif
                                            {{-- Show Last Page --}}



                                            @if ($shop->hasMorePages())
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $shop->nextPageUrl() }}" rel="next">
                                                    <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="align-self-center px-2 bg-pagination-white">
                                                <a href="{{ $shop->url($shop->lastPage()) }}" rel="next">
                                                    <i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i>
                                                </a>
                                            </li>

                                            @else
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                <span><i class="fa fa-angle-right text-secondary" aria-hidden="true"></i></span>
                                            </li>
                                            <li class="disabled align-self-center px-2 bg-pagination-white d-none"><i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i></a></li>

                                            @endif
                                </ul>
                                @endif
                            </div>




                        </div>
                        <div class="mt-3 d-flex justify-content-center">
                            <!-- <button type="submit" class="col-5 btn btn-primary ml-2 ">บันทึก</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection


    @section('script')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table_shop').dataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#table_dates').dataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#table_not').dataTable();
        });
    </script>



    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("influ");
            switching = true;
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.getElementsByTagName("tr");
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[n];
                    y = rows[i + 1].getElementsByTagName("td")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }

                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            // var msg = '{{Session::get('
            // alert ')}}';
            // var exist = '{{Session::has('
            // alert ')}}';
            // alertfield
            var msg2 = $("#alertfield").val();
            // alert(msg2);
            if (typeof msg2 != "undefined") {
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สามารถทำรายการได้',
                    text: msg2
                })
            }

            $('#kill_shop').on('click', function() {
                var form = $(this).parents('form');
                swal.fire({
                    title: "ต้องการลบร้านค้าที่เลือกหรือไม่",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ยืนยัน",
                    cancelButtonText: "ยกเลิก"
                }).then(function(result) {
                    if (result.value === true) {
                        console.log("Submitted");
                        form.attr('action', '/dashboard/influencer/kill_shop');
                        form.submit();
                    }
                });

            });



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

            $('td#approve_name').each(function(index, value) {
                var text = $(this).text().trim();
                console.log(text);
                if (text == 'รอตรวจสอบ') {
                    $(this).css('color', '#e26e20');
                    console.log(text);
                } else if (text == 'ตรวจสอบแล้ว') {
                    $(this).css('color', '#33FF5B');
                    console.log(text);
                } else if (text == 'รอตัดสินใจ') {
                    $(this).css('color', '#ffc107');
                    console.log(text);
                } else if (text == 'Ban') {
                    $(this).css('color', 'red');
                    console.log(text);
                }

            });

            // Search all columns
            $('#search').keyup(function() {
                // Search Text
                var search = $(this).val();

                // Hide all table tbody rows
                $('table tbody tr').hide();

                // Count total search result
                var len = $('table tbody tr td:contains("' + search + '")').length;
                var table = $("#table_shop").find('tr').length;
                let zero = 0;

                if (len > 0) {
                    // Searching text in columns and show match row
                    $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
                        $(this).closest('tr').show();
                        $('#count_shop').text(len);
                        console.log('test')

                    });
                } else {
                    $('.notfound').show();
                    $('#count_shop').text(zero);

                }

            });
        });

        $.expr[":"].contains = $.expr.createPseudo(function(arg) {
            return function(elem) {
                return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
            };
        });

        $(document).ready(function() {
            $("#shop_select option").each(function(index) {
                location.getParams = getParams;
                // console.log (location.getParams()["status"]);
                if ($(this).val() == location.getParams()["shop_select"]) {
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
                .forEach(function(item) {
                    tmp = item.split("=");
                    result[tmp[0]] = decodeURIComponent(tmp[1]);
                });

            return result;
        }
    </script>



    <script>

    </script>
    @endsection