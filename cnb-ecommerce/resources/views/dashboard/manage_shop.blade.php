@extends('layouts.dashboard')
@section('content')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
        #second {
            display: none;
        }
    </style>

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

        .modal-lg {
            max-width: 800px !important;
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
    </style>
    @php
    // dd($invs);
    @endphp

    <div class="container-fluid px-0" style='background:#efefef'>
        <div class="row">
            <div class="col-xl-12 col-12 ml-xl-auto">
                <h5 class="mt-4"><b>จัดการร้านค้า</b>
                </h5>
                <div class=" text-center">

                    <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active nav-manage" id="list-1-tab" data-toggle="tab" href="#list-1"
                                    role="tab" aria-controls="list-1" aria-selected="true">ร้านค้าทั้งหมด
                                    ({{ $shops->total() }})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group d-lg-none d-md-none d-block">
                        <select class="form-control" id="select-submenu">
                            <option value="1">สินค้่าทั้งหมด ({{ $shops->total() }})</option>
                        </select>
                    </div>

                    {{-- SEARCH --}}
                    <div class="col-lg-12 col-md-12 col-12 py-4 mb-4" style="background: #fff;border-radius: 0 0 15px 15px;">
                        <form role="search" action="/dashboard/flash_sale" method="GET">
                            {{-- @csrf --}}
                            <div class="input-group flex-wrap">
                                <input hidden type="search" name="search" class="form-control"
                                    style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                    value="search" placeholder="ค้นหาสินค้า" aria-label="search"
                                    aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group flex-wrap pt-2">
                                <div
                                    class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">ชื่อร้านค้า</h6>
                                </div>
                                @if (isset($_REQUEST['s_name']))
                                    <input type="text" name="s_name" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['s_name'] }}" placeholder="ชื่อร้านค้า" aria-label="s_name"
                                        aria-describedby="addon-wrapping">
                                @else
                                    <input type="text" name="s_name" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="ชื่อร้านค้า" aria-label="p_name"
                                        aria-describedby="addon-wrapping">
                                @endif
                                <div
                                    class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">ชื่อสินค้า</h6>
                                </div>
                                @if (isset($_REQUEST['p_name']))
                                    <input type="text" name="p_name" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['p_name'] }}" placeholder="ชื่อสินค้า" aria-label="p_name"
                                        aria-describedby="addon-wrapping">
                                @else
                                    <input type="text" name="p_name" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="ชื่อสินค้า" aria-label="p_name"
                                        aria-describedby="addon-wrapping">
                                @endif
                                <div
                                    class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">ราคาพิเศษ</h6>
                                </div>
                                <select class="form-control col-lg-2" id="chkIsPromoSearch" name='chkIsPromoSearch'>
                                    <option value=''>ทั้งหมด</option>
                                    <option value='Y'
                                        {{ isset($_REQUEST['chkIsPromoSearch']) && $_REQUEST['chkIsPromoSearch'] == 'Y' ? 'selected' : '' }}>
                                        ราคาพิเศษ</option>
                                    <option value='N'
                                        {{ isset($_REQUEST['chkIsPromoSearch']) && $_REQUEST['chkIsPromoSearch'] == 'N' ? 'selected' : '' }}>
                                        ราคาปกติ</option>
                                </select>
                                <div class="col-lg-2 col-md-2 col-12 mb-2 ml-auto">
                                    <input type="submit" value="ค้นหา" name="filter" id="filter"
                                        class="form-control btn btn-main-set">
                                </div>
                                <div class="col-lg-2 col-md-2 col-12 mb-2">
                                    <a href="/dashboard/flash_sale"><input type="button" value="ล้างค่า"
                                            class="form-control btn " style="background-color: #ffc107"></a>
                                </div>
                            </div>
                            <div class="input-group flex-wrap pt-2">
                                <div
                                    class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">ราคา</h6>
                                </div>
                                @if (isset($_REQUEST['price_start']))
                                    <input type="number" name="price_start" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['price_start'] }}" placeholder="฿ "
                                        aria-label="price_start" aria-describedby="addon-wrapping">
                                @else
                                    <input type="number" name="price_start" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="฿ " aria-label="price_start"
                                        aria-describedby="addon-wrapping">
                                @endif
                                <div
                                    class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">-</h6>
                                </div>
                                @if (isset($_REQUEST['price_end']))
                                    <input type="number" name="price_end" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['price_end'] }}" placeholder="฿ " aria-label="price_end"
                                        aria-describedby="addon-wrapping">
                                @else
                                    <input type="number" name="price_end" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="฿ " aria-label="price_end"
                                        aria-describedby="addon-wrapping">
                                @endif
                                <div
                                    class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">จำนวนสินค้าคงเหลือ</h6>
                                </div>
                                @if (isset($_REQUEST['remain_start']))
                                    <input type="number" name="remain_start" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['remain_start'] }}" placeholder="ชิ้น"
                                        aria-label="remain_start" aria-describedby="addon-wrapping">
                                @else
                                    <input type="number" name="remain_start" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="ชิ้น" aria-label="remain_start"
                                        aria-describedby="addon-wrapping">
                                @endif
                                <div
                                    class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">-</h6>
                                </div>
                                @if (isset($_REQUEST['remain_end']))
                                    <input type="number" name="remain_end" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['remain_end'] }}" placeholder="ชิ้น"
                                        aria-label="remain_end" aria-describedby="addon-wrapping">
                                @else
                                    <input type="number" name="remain_end" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="ชิ้น" aria-label="remain_end"
                                        aria-describedby="addon-wrapping">
                                @endif
                            </div>
                        </form>
                    </div>

                    {{-- SEARCH --}}
                    <div class="w-100">
                        <div class="tab-content" style="background: #fff;padding-top: 10px;padding-left: 10px;padding-right: 10px;border-radius: 15px 15px 0 0;">
                            {{-- 1taphome --}}
                            <div class="row justify-content-center tab-pane fade show active " id="list-1"
                                role="tabpanel">
                                <div class="container-fluid table-responsive">
                                    <div class="card" style="border: none;">
                                        <div class="card-body m-2 p-0 ">
                                            <table class="table table-striped" id="main_table">
                                                <thead class="thead-blue">
                                                    <tr>
                                                        <th scope="col" width="5%">ลำดับ</th>
                                                        <th scope="col" width="20%">รูปภาพสินค้า</th>
                                                        <th scope="col" style="text-align: left;">ชื่อร้านค้า</th>
                                                        <th scope="col">กำลังดำเนินการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($shops as $shop)
                                                        <tr class="text-center">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><img src="{{asset('img/shop_profiles/'.$shop->shop_pic)}}" alt="Img-{{ $shop->shop_name }}" onerror="this.onerror=null;this.src='/img/no_image.png'" width="100px" height="100px"></td>
                                                            <td style="text-align: left;">{{ $shop->shop_name }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-wrap py-4" style='background: #fff; border-radius: 0 0 15px 15px;'>
                            <div class="col-6 text-left">
                                ลำดับ {{ ($shops->currentPage() - 1) * $shops->perPage() + 1 }} -
                                {{ ($shops->currentPage() - 1) * $shops->perPage() + count($shops) }} จาก
                                {{ $shops->total() }}

                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end col-12">


                                    @if ($shops->hasPages())
                                        <ul class="pagination cursor-pointer">
                                            {{-- Previous Page Link --}}

                                            @if ($shops->onFirstPage())
                                                <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                    <span class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                                            aria-hidden="true"></i></span>
                                                </li>
                                                <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                    <span class="mr-1"><i class="fa fa-angle-left text-secondary"
                                                            aria-hidden="true"></i></span>
                                                </li>
                                            @else
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $shops->url(1) }}" rel="prev">
                                                        <i class="fa fa-angle-double-left text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $shops->previousPageUrl() }}" rel="prev">
                                                        <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- show button first page --}}
                                            @if ($shops->currentPage() > 5)
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $shops->url(1) }}"><span>1</span></a>
                                                </li>
                                            @endif
                                            {{-- show button first page --}}


                                            {{-- condition stay in first page not show button --}}
                                            {{-- @if ($shops->currentPage() == 1)
                                                        <li class="align-self-center mr-1">
                                                            <a class="d-none page-link" tabindex="-2">1</a>
                                                        </li>
                                                        @endif --}}


                                            @if ($shops->currentPage() > 5)
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <span>...</span>
                                                </li>
                                            @endif



                                            @foreach (range(1, $shops->lastPage()) as $i)
                                                @if ($i >= $shops->currentPage() - 2 && $i <= $shops->currentPage() + 2)
                                                    @if ($i == $shops->currentPage())
                                                        <li class="active px-2 bg-pagination-42294f">
                                                            <span>{{ $i }}</span>
                                                        </li>
                                                    @else
                                                        <li class="px-2 bg-pagination-white"><a
                                                                href="{{ $shops->url($i) }}">{{ $i }}</a>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endforeach


                                            {{-- three dots between number near last pages --}}
                                            @if ($shops->currentPage() < $shops->lastPage() - 4)
                                                <li class="align-self-center  px-2 bg-pagination-white">
                                                    <span>...</span>
                                                </li>
                                            @endif
                                            {{-- three dots between number near last pages --}}


                                            {{-- Show Last Page --}}
                                            @if ($shops->hasMorePages() == $shops->lastPage() && $shops->lastPage() > 5)
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $shops->url($shops->lastPage()) }}"><span>{{ $shops->lastPage() }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                            {{-- Show Last Page --}}
                                            @if ($shops->hasMorePages())
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $shops->nextPageUrl() }}" rel="next">
                                                        <i class="fa fa-angle-right text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $shops->url($shops->lastPage()) }}" rel="next">
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
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        $('#select-submenu').on('change', function() {
            value = $(this).val();
            $('a.nav-link[href="#list-' + value + '"]').click();
        });

        $(document).ready(function() {
            // alert('123');
            $(".next").click(function() {
                $(this).parents('.modal').find("#second").show();
                $(this).parents('.modal').find("#first").hide();
            });

            $(".prev").click(function() {
                $(this).parents('.modal').find("#second").hide();
                $(this).parents('.modal').find("#first").show();
            });
        });
    </script>
@endsection
