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
    p {
        margin-bottom: 0 !important;
    }
</style>
@php
// dd($invs);
@endphp

<div class="container-fluid px-0" style='background:#efefef'>
    <div class="row">
        <div class="col-xl-12 col-12 ml-xl-auto">
            <h5 class="mt-4"><b>สินค้าทั้งหมด</b>
            </h5>
            <div class=" text-center">

                <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active nav-manage" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                aria-controls="list-1" aria-selected="true">สินค้าทั้งหมด
                                ({{ $product->total() }})</a>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab"
                                aria-controls="list-2" aria-selected="false">สินค้า 9 ฿  ({{ count($flash_s) }})</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="1">สินค้่าทั้งหมด ({{ $product->total() }})</option>
                    </select>
                </div>

                {{-- SEARCH --}}
                <div class="col-lg-12 col-md-12 col-12 py-4 mb-4" style="background: #fff;border-radius: 0 0 15px 15px;">
                    <form role="search" action="/dashboard/flash_sale" method="GET">
                        {{-- @csrf --}}
                        <div class="input-group flex-wrap">
                            <input hidden type="search" name="search" class="form-control"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="search" placeholder="Product Search" aria-label="search"
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
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="ชื่อร้านค้า" aria-label="p_name" aria-describedby="addon-wrapping">
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
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="ชื่อสินค้า" aria-label="p_name" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">ราคาพิเศษ</h6>
                            </div>
                            <select class="form-control col-lg-2" id="chkIsPromoSearch" name='chkIsPromoSearch'>
                                <option value=''>ทั้งหมด</option>
                                <option value='Y' {{ ( isset($_REQUEST['chkIsPromoSearch']) && $_REQUEST['chkIsPromoSearch'] == 'Y' ) ? 'selected' : '' }} >ราคาพิเศษ</option>
                                <option value='N' {{ ( isset($_REQUEST['chkIsPromoSearch']) && $_REQUEST['chkIsPromoSearch'] == 'N' ) ? 'selected' : '' }} >ราปกติ</option>
                            </select>
                            <div class="col-lg-2 col-md-2 col-12 mb-2 ml-auto">
                                <input type="submit" value="ค้นหา" name="filter" id="filter" class="form-control btn btn-main-set">
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mb-2">
                                <a href="/dashboard/flash_sale"><input type="button" value="ล้างค่า" class="form-control btn " style="background-color: #ffc107"></a>
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
                                value="{{ $_REQUEST['price_start'] }}" placeholder="฿ " aria-label="price_start"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="number" name="price_start" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="฿ " aria-label="price_start" aria-describedby="addon-wrapping">
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
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="฿ " aria-label="price_end" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">จำนวนสินค้าคงเหลือ</h6>
                            </div>
                            @if (isset($_REQUEST['remain_start']))
                            <input type="number" name="remain_start" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['remain_start'] }}" placeholder="ชิ้น" aria-label="remain_start"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="number" name="remain_start" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="ชิ้น" aria-label="remain_start" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">-</h6>
                            </div>
                            @if (isset($_REQUEST['remain_end']))
                            <input type="number" name="remain_end" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['remain_end'] }}" placeholder="ชิ้น" aria-label="remain_end"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="number" name="remain_end" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="ชิ้น" aria-label="remain_end" aria-describedby="addon-wrapping">
                            @endif
                        </div>
                    </form>
                </div>

                {{-- SEARCH --}}
                <div class="w-100">
                    <div class="tab-content" style="background: #fff;padding-top: 10px;padding-left: 10px;padding-right: 10px;border-radius: 15px 15px 0 0;">
                        {{-- 1taphome --}}
                        <div class="row justify-content-center tab-pane fade show active " id="list-1" role="tabpanel">
                            <div class="container-fluid table-responsive">
                                <div class="card" style="border: none;">
                                    <div class="card-body m-2 p-0 ">
                                        <table class="table table-striped" id="main_table">
                                            <thead class="thead-blue">
                                                <tr>
                                                    <th scope="col" width="5%">ลำดับ</th>
                                                    <th scope="col" width="15%">รูปภาพสินค้า</th>
                                                    <th scope="col" class="text-left" width="20%">ชื่อร้านค้า</th>
                                                    <th class="text-left" scope="col" width="20%">ชื่อสินค้า
                                                    </th>
                                                    <th scope="col" width="10%">ราคา</th>
                                                    <th scope="col" width="10%">ราคาส่วนลด</th>
                                                    <!-- <th scope="col">ค่าการตลาด stn</th> -->
                                                    <th scope="col">คลัง</th>
                                                    <th scope="col">สถานะ</th>
                                                    <!-- <th scope="col">ดำเนินการ</th> -->
                                                    <!-- <th scope="col">แก้ไขส่วนลด</th> -->
                                                    <th scope="col">Ban/Unban</th>
                                                    <th scope="col">ราคาพิเศษ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product as $key_main => $key)

                                                <tr style="text-align: center; align-items: center;">
                                                    <td>
                                                        {{ (($product->currentPage()-1) * $product->perPage())+$key_main+1 }}
                                                    </td>
                                                    <td data-label="#" class="text-left">
                                                        @if (@$key->product_img =='0' || @$key->product_img == null)
                                                        <img style="
                                                                        max-width:50px
                                                                        " src="/img/no_image.png" alt=""
                                                            class="img-fluid">
                                                        @else
                                                        <?php $front_image = @$key->product_img[0];
                                                        ?>
                                                        <div class="gallery1">
                                                            <a href="/img/product/{{ $front_image }}" class="big">
                                                                <img style="
                                                                        max-width:50px
                                                                        " src="/img/product/{{$front_image}}" alt=""
                                                                    class="img-fluid">
                                                            </a>
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td data-label="#" class="text-left">
                                                        {{ @$key->shop_name }}
                                                    </td>
                                                    <td data-label="#" class="text-left">
                                                        {{ @$key->name }}
                                                    </td>


                                                    <td data-label="Price">
                                                        @foreach (@$key->product_option["price"] as $item)
                                                        <p>{{$item}}</p>
                                                        @endforeach
                                                    </td>

                                                    <td data-label="Priceส่วนลด" style="font-weight:bold;">
                                                        @if (isset($key->product_option['margin']))
                                                        @foreach (@$key->product_option["margin"] as $item)
                                                        <p>{{$item}}</p>
                                                        @endforeach
                                                        @endif
                                                    </td>

                                                    <!-- <td data-label="ช่วยขาย" style="font-weight:bold;">
                                                        @if (isset($key->product_option['stn']))
                                                        @foreach (@$key->product_option["stn"] as $item)
                                                        @if($item != null)
                                                        <p>{{$item}}</p>
                                                        @else
                                                        <p>-</p>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </td> -->

                                                    <td data-label="ตงเหลือ" style="font-weight:bold;">
                                                        @foreach (@$key->product_option["stock"] as $item)
                                                        <p>{{$item}}</p>
                                                        @endforeach
                                                    </td>

                                                    <td data-label="สถานะ" style="font-weight:bold;">
                                                        @if(@$key->status_goods == 1)
                                                        <p>แสดง</p>
                                                        @elseif(@$key->status_goods == 2)
                                                        <p>ไม่แสดง</p>
                                                        @else
                                                        <p><b class="color-price">Ban</b></p>
                                                        @endif

                                                    </td>

                                                    <!-- <td data-label="ตงเหลือ">
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#testModal{{ @$key->id }}">เพิ่มโปรโมชั่น</button>
                                                    </td> -->

                                                    <!-- <td data-label="ตงเหลือ">
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#discountmodal{{ @$key->id }}">แก้ไขค่าการตลาด
                                                            stn</button>
                                                    </td> -->

                                                    <td data-label="ban">
                                                        @if($key->status_goods == 99)
                                                        <button type="button" class="btn btn-verify px-4"
                                                            data-toggle="modal"
                                                            data-target="#unbanproduct{{ @$key->id }}">UnBan
                                                        </button>
                                                        @else
                                                        <button type="button" class="btn btn-verify px-4"
                                                            data-toggle="modal"
                                                            data-target="#banproduct{{ @$key->id }}">Ban
                                                        </button>
                                                        @endif
                                                    </td>
                                                    <td data-label="ราคาพิเศษ">
                                                        @if($key->is_promo == 'Y')
                                                        <button type="button" class="btn btn-select px-4"
                                                            data-toggle="modal"
                                                            data-target="#unset_promo{{ @$key->id }}">ยกเลิก
                                                        </button>
                                                        @else
                                                        <button type="button" class="btn btn-select px-4"
                                                            data-toggle="modal"
                                                            data-target="#set_promo{{ @$key->id }}">เลือก
                                                        </button>
                                                        @endif
                                                    </td>
                                                    {{-- @$key->id --}}

                                                </tr>


                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($product as $key)
                        <div class="modal fade" id="testModal{{ @$key->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{@$key->shop_name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="promotion" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div id="first">
                                            <div class="modal-body">
                                                <div class="form-row mb-2">
                                                    <div class="col-lg-4 col-md-6 col-6 ml-auto">
                                                        <input type="text" class="form-control price"
                                                            placeholder="Priceโปรโมชั่น (฿ )" id="price_promotion">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-6 d-flex justify-content-end">
                                                        <input type="text" class="form-control limit" name="limit"
                                                            placeholder="จำนวนสิทธิ์การซื้อ (หน่วย๗" id="limit">
                                                    </div>
                                                </div>
                                                <table class="table">
                                                    <thead class="thead-blue">
                                                        <tr>
                                                            <th style="width:200px" class="text-left" scope="col">
                                                                ชื่อสินค้า</th>
                                                            <th style="width:200px">SKU</th>
                                                            <th style="width:150px" scope="col">จำนวน</th>
                                                            <th scope="col">Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left">
                                                                <div class="row">
                                                                    <div class="col-12 d-flex align-items-center"
                                                                        style="height:50px;">
                                                                        <p class="mb-0">{{ @$key->name }}</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if(isset($key->product_option["sku"]))
                                                                <div class="row">

                                                                    @foreach ($key->product_option["sku"] as $item)
                                                                    <div class="col-12 d-flex align-items-center justify-content-center"
                                                                        style="height:50px;">
                                                                        <p class="mb-0">{{ $item }}</p>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($key->product_option["stock"]))
                                                                @foreach ($key->product_option["stock"] as $item)
                                                                <div class="col-12 d-flex align-items-center"
                                                                    style="height:50px;">
                                                                    <input type="number" name="amount[]"
                                                                        class="form-control mb-2" max="{{ $item }}"
                                                                        style="text-align: center;" value="{{ $item }}">
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($key->product_option["stock"]))
                                                                @foreach ($key->product_option["stock"] as $item)
                                                                <div class="col-12 d-flex align-items-center"
                                                                    style="height:50px;">
                                                                    <input type="number" name="price[]"
                                                                        class="form-control mb-2 promotion"
                                                                        style="text-align: center;"
                                                                        id="price_promotion">
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary next">Next</button>
                                            </div>
                                        </div>
                                        <div id="second">
                                            <div class="modal-body d-flex justify-content-center">
                                                <div class="row">
                                                    <div class="form-group col-4 text-left">
                                                        <label for="start_date">วันที่ต้องการจะจัดโปรโมชั่น</label>
                                                        <input type="date" class="form-control" id="start_date"
                                                            name="start_date" placeholder="Example input">
                                                    </div>
                                                    <div class="form-group col-4 text-left">
                                                        <label for="start_date">วันที่สิ้นสุดการจะจัดโปรโมชั่น</label>
                                                        <input type="date" class="form-control" id="end_date"
                                                            name="end_date" placeholder="Example input">
                                                    </div>
                                                    <div class="form-group col-4 text-left">
                                                        <label for="type">ประเภทโปรโมชั่น</label>
                                                        <select class="form-control" name="type" id="type">
                                                            <option value="flashsale">Flashsale</option>
                                                            {{-- <option value="9baht">9 ฿</option> --}}
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="time_period[]"
                                                                type="checkbox" id="time_period" value="0" checked>
                                                            <label class="form-check-label" for="time_period">
                                                                24:00 - 06:00
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="time_period[]"
                                                                type="checkbox" id="time_period" value="1">
                                                            <label class="form-check-label" for="time_period">
                                                                06:00 - 12:00
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="time_period[]"
                                                                type="checkbox" id="time_period" value="2">
                                                            <label class="form-check-label" for="time_period">
                                                                12:00 - 18:00
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="time_period[]"
                                                                type="checkbox" id="time_period" value="3">
                                                            <label class="form-check-label" for="time_period">
                                                                18:00 - 24:00
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary prev">Previous</button>
                                                <input type="hidden" name="id" value="{{ @$key->id }}">
                                                <button type="button"
                                                    class="btn btn-primary submitPromotion">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="discountmodal{{ @$key->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{@$key->shop_name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="promotion2" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div id="first">
                                            <div class="modal-body">
                                                <div class="form-row mb-2">
                                                </div>
                                                <table class="table">
                                                    <thead class="thead-blue">
                                                        <tr>
                                                            <th style="width:200px" class="text-left" scope="col">
                                                                ชื่อสินค้า</th>
                                                            <!-- <th>SKU</th> -->
                                                            <th scope="col">จำนวน</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">ส่วนลด</th>
                                                            <th scope="col">ค่าการตลาด stn</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left">
                                                                <div class="row">
                                                                    <div class="col-12 d-flex align-items-center"
                                                                        style="height:50px;">
                                                                        <p class="mb-0">{{ @$key->name }}</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <!-- <td>
                                                                @if(isset($key->product_option["sku"]))
                                                                <div class="row">

                                                                    @foreach ($key->product_option["sku"] as $item)
                                                                    <div class="col-12 d-flex align-items-center justify-content-center" style="height:50px;">
                                                                        <p class="mb-0">{{ $item }}</p>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                                @endif
                                                            </td> -->
                                                            <input type="hidden" name="id" value="{{ @$key->id }}">
                                                            <td>
                                                                @if(isset($key->product_option["stock"]))
                                                                @foreach ($key->product_option["stock"] as $item)
                                                                <div class="col-12 d-flex align-items-center"
                                                                    style="height:50px;">
                                                                    <input type="number" name="amount2[]" readonly
                                                                        class="form-control mb-2" max="{{ $item }}"
                                                                        style="text-align: center;" value="{{ $item }}">
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($key->product_option["stock"]))
                                                                @foreach ($key->product_option["price"] as $item)
                                                                <div class="col-12 d-flex align-items-center"
                                                                    style="height:50px;">
                                                                    <input type="number" name="price2[]" readonly
                                                                        class="form-control mb-2 promotion"
                                                                        style="text-align: center;" value="{{ $item }}">
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($key->product_option["margin"]))
                                                                @foreach ($key->product_option["margin"] as $item)
                                                                <div class="col-12 d-flex align-items-center"
                                                                    style="height:50px;">
                                                                    <input type="number" name="margin2[]" readonly
                                                                        class="form-control mb-2 promotion"
                                                                        style="text-align: center;" value="{{ $item }}">
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($key->product_option["stn"]))
                                                                @foreach ($key->product_option["stn"] as $item)
                                                                <div class="col-12 d-flex align-items-center"
                                                                    style="height:50px;">
                                                                    <input type="number" name="discount2[]"
                                                                        class="form-control mb-2 promotion"
                                                                        style="text-align: center;" value="{{ $item }}">
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @foreach ($key->product_option["stock"] as $item)
                                                                <div class="col-12 d-flex align-items-center"
                                                                    style="height:50px;">
                                                                    <input type="number" name="discount2[]"
                                                                        class="form-control mb-2 promotion"
                                                                        style="text-align: center;">
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button"
                                                    class="btn btn-main-set submitDiscount">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="banproduct{{ @$key->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ban/Unban สินค้า</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="banitems" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div id="first">
                                            <div class="modal-body">
                                                <div class="form-row mb-2">
                                                    <input type="text" class="form-control price" placeholder="id"
                                                        id="id" name='id' value="{{ @$key->id }}" hidden>
                                                    <div class="col-lg-4 col-md-6 col-6 text-left">
                                                        หมายเหตุการแบนสินค้า
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-6 ml-auto">
                                                        <input type="text" class="form-control price"
                                                            placeholder="กรุณาใส่หมายเหตุ" id="note" name='note'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-main-set  submitban">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="unbanproduct{{ @$key->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ban/Unban สินค้า</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="unbanitems" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div id="first">
                                            <div class="modal-body">
                                                <div class="form-row mb-2">
                                                    <input type="text" class="form-control price" placeholder="id"
                                                        id="id" name='id' value="{{ @$key->id }}" hidden>
                                                    <div class="col-lg-4 col-md-6 col-6 text-left">
                                                        ยกเลิกการแบนสินค้าหมายเลข {{ @$key->id }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button"
                                                    class="btn btn-main-set  submitunban">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="set_promo{{ @$key->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">เลือกเป็นสินค้าราคาพิเศษ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="set_promo_item" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <div class="modal-body">
                                                <div class="form-row mb-2">
                                                    <input type="text" class="form-control price" placeholder="id"
                                                        name='set_promo_product_id' value="{{ @$key->id }}" hidden>
                                                    <div class="col-lg-4 col-md-6 col-6 text-left">
                                                        ร้านค้า: {{ @$key->shop_name }}<br/>
                                                        สินค้า: {{ @$key->name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-main-set  submit_set_promo">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="unset_promo{{ @$key->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ยกเลิกสินค้าราคาพิเศษ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="unset_promo_item" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <div class="modal-body">
                                                <div class="form-row mb-2">
                                                    <input type="text" class="form-control price" placeholder="id"
                                                        name='unset_promo_product_id' value="{{ @$key->id }}" hidden>
                                                    <div class="col-lg-4 col-md-6 col-6 text-left">
                                                        ร้านค้า: {{ @$key->shop_name }}<br/>
                                                        สินค้า: {{ @$key->name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button"
                                                    class="btn btn-primary submit_unset_promo">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        <div class="col-12 d-flex align-items-center flex-wrap py-4" style='background: #fff; border-radius: 0 0 15px 15px;'>
                            <div class="col-6 text-left">
                            ลำดับที่ {{ (($product->currentPage()-1) * $product->perPage())+1 }} -
                                {{ (($product->currentPage()-1) * $product->perPage())+ count($product) }} จาก
                                {{ $product->total() }}

                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end align-items-center col-12">


                                    @if ($product->hasPages())
                                    <ul class="pagination cursor-pointer" style="margin-bottom: 0;">
                                        {{-- Previous Page Link --}}

                                        @if ($product->onFirstPage())
                                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                                    aria-hidden="true"></i></span></li>
                                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                class="mr-1"><i class="fa fa-angle-left text-secondary"
                                                    aria-hidden="true"></i></span></li>
                                        @else <li class="align-self-center px-2 bg-pagination-white">
                                            <a href="{{ $product->url(1) }}" rel="prev">
                                                <i class="fa fa-angle-double-left text-secondary"
                                                    aria-hidden="true"></i>
                                            </a>
                                        <li class="align-self-center px-2 bg-pagination-white">
                                            <a href="{{ $product->previousPageUrl() }}" rel="prev">
                                                <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                            </a>
                                        </li> @endif

                                        {{-- show button first page --}}
                                        @if ( $product->currentPage() > 5 )
                                        <li class="align-self-center px-2 bg-pagination-white">
                                            <a href="{{ $product->url(1) }}"><span>1</span></a>
                                        </li>
                                        @endif
                                        {{-- show button first page --}}


                                        {{-- condition stay in first page not show button --}}
                                        {{-- @if ( $product->currentPage() == 1 )
                                                        <li class="align-self-center mr-1">
                                                            <a class="d-none page-link" tabindex="-2">1</a>
                                                        </li>
                                                        @endif --}}


                                        @if ( $product->currentPage() > 5 )
                                        <li class="align-self-center px-2 bg-pagination-white">
                                            <span>...</span>
                                        </li>
                                        @endif



                                        @foreach(range(1, $product->lastPage()) as $i)
                                        @if($i >= $product->currentPage() - 2 && $i <= $product->currentPage()
                                            +
                                            2)

                                            @if ($i == $product->currentPage())
                                            <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                            @else
                                            <li class="px-2 bg-pagination-white"><a
                                                    href="{{ $product->url($i) }}">{{ $i }}</a>
                                            </li>
                                            @endif
                                            @endif
                                            @endforeach


                                            {{-- three dots between number near last pages --}}
                                            @if ( $product->currentPage() < $product->lastPage() - 4)
                                                <li class="align-self-center  px-2 bg-pagination-white">
                                                    <span>...</span>
                                                </li>
                                                @endif
                                                {{-- three dots between number near last pages --}}


                                                {{-- Show Last Page --}}
                                                @if($product->hasMorePages() == $product->lastPage() &&
                                                $product->lastPage() > 5)
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $product->url($product->lastPage()) }}"><span>{{ $product->lastPage() }}</span>
                                                    </a>
                                                </li>
                                                @endif
                                                {{-- Show Last Page --}}
                                                @if ($product->hasMorePages())
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $product->nextPageUrl() }}" rel="next">
                                                        <i class="fa fa-angle-right text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $product->url($product->lastPage()) }}" rel="next">
                                                        <i class="fa fa-angle-double-right text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </li>

                                                @else
                                                <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                    <span><i class="fa fa-angle-right text-secondary"
                                                            aria-hidden="true"></i></span></li>
                                                <li class="disabled align-self-center px-2 bg-pagination-white d-none">
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

@endsection


@section('script')

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
{{-- <script
                                src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            --}}

<script>
    $('#select-submenu').on('change', function() {
        value = $(this).val();
        $('a.nav-link[href="#list-' + value + '"]').click();
    });
</script>
<script>
    $(".deleted").click(function(event) {
        var_array = [];
        var searchIDs = $(".flash_sale input:checkbox:not(.head_input):checked").map(function() {
            var_array.push($(this).val());
        }).get(); // <----
        $.ajax({
            url: "/dashboard/deletedpromotion",
            type: "POST",
            data: {
                id: var_array,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // if($.trim(response) == "true"){
                //     Swal.fire({
                //     icon: 'success',
                //     title: 'สำเร็จ',
                //     text: 'เพิ่มโปรโมชั่นสำเร็จ'
                //     })
                // }
                // setTimeout(function(){
                // location.reload(true);
                // }, 2000);
            },
            error: function(response) {

            }
        });
    });
</script>
<script>
    $(document).ready(function(e) {
        $('.submitPromotion').on('click', function() {
            $(this).parents('form').submit();
        })
        $(".promotion").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "/dashboard/promotion",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if ($.trim(response) == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'เพิ่มโปรโมชั่นสำเร็จ'
                        })
                    }
                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                },
                error: function(response) {

                }
            });
        }));
    });

    $(document).ready(function(e) {
        $('.submitDiscount').on('click', function() {
            $(this).parents('form').submit();
        })
        $(".promotion2").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "/dashboard/discount",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if ($.trim(response) == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'แก้ไข ค่าการตลาด STN เสร็จสิ้น'
                        })
                    }
                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                },
                error: function(response) {

                }
            });
        }));
    });

    $(document).ready(function(e) {
        $('.submitban').on('click', function() {
            $(this).parents('form').submit();
        })
        $(".banitems").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "/dashboard/flash_sale/banitem",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if ($.trim(response) == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'Ban สินค้าสำเร็จ'
                        })
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'ไม่สำเร็จ',
                            text: 'Ban สินค้าไม่สำเร็จ กรุณากรอกหมายเหตุ'
                        })
                    }
                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                },
                error: function(response) {

                }
            });
        }));

        $('.submit_set_promo').on('click', function() {
            $(this).parents('form').submit();
        })
        $(".set_promo_item").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "/dashboard/flash_sale/set_promo_item",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if ($.trim(response) == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'บันทึกข้อมูลสำเร็จ'
                        })
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'ไม่สำเร็จ',
                            text: 'บันทึกข้อมูลไม่สำเร็จ'
                        })
                    }
                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                },
                error: function(response) {

                }
            });
        }));

        $('.submit_unset_promo').on('click', function() {
            $(this).parents('form').submit();
        })
        $(".unset_promo_item").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "/dashboard/flash_sale/unset_promo_item",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if ($.trim(response) == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'บันทึกข้อมูลสำเร็จ]สำเร็จ'
                        })
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'ไม่สำเร็จ',
                            text: 'Ban สินค้าไม่สำเร็จ กรุณากรอกหมายเหตุ'
                        })
                    }
                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                },
                error: function(response) {

                }
            });
        }));
    });

    $(document).ready(function(e) {
        $('.submitunban').on('click', function() {
            $(this).parents('form').submit();
        })
        $(".unbanitems").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "/dashboard/flash_sale/banitem",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if ($.trim(response) == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'Unban สินค้าสำเร็จ'
                        })
                    }
                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                },
                error: function(response) {

                }
            });
        }));
    });

    $(document).ready(function(e) {
        $('.forward').on('click', function() {
            $(this).parents('form').submit();
        })
        $(".pin_product").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "/dashboard/editpromotion",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if ($.trim(response) == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'ทำรายการสำเร็จ'
                        })
                    }
                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                },
                error: function(response) {

                }
            });
        }));
    });



    $(document).ready(function(e) {
        $('.pin').on('click', function() {
            var array = [];
            $(".pin_product input.checkbox1:checked").each(function() {
                array.push($(this).val());
            });
            // value = $('.pin_product input.checkbox1:checked').val();
            // console.log(array);

            // e.preventDefault();
            $.ajax({
                url: "/dashboard/pinproduct",
                type: "POST",
                data: {
                    id: array,
                },
                // contentType: false,
                // cache: false,
                // processData:false,
                success: function(response) {
                    if ($.trim(response) == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'ปัหหมุดสำเร็จ'
                        })
                        // statusPin
                        $.each(array, function(key, value) {
                            // console.log(value);
                            $('.pin_product input.checkbox1[value="' + value + '"]').parents('tr').find('.statusPin').text('true').css('color', 'green');
                        });
                    }
                },
                error: function(response) {

                }
            });
        });
    });

    $(document).ready(function(e) {
        $('.dispin').on('click', function() {
            var array = [];
            $(".pin_product input.checkbox1:checked").each(function() {
                array.push($(this).val());
            });
            // value = $('.pin_product input.checkbox1:checked').val();
            // console.log(array);

            // e.preventDefault();
            $.ajax({
                url: "/dashboard/dispinproduct",
                type: "POST",
                data: {
                    id: array,
                },
                // contentType: false,
                // cache: false,
                // processData:false,
                success: function(response) {
                    if ($.trim(response) == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'สำเร็จ'
                        })
                        // statusPin
                        $.each(array, function(key, value) {
                            // console.log(value);
                            $('.pin_product input.checkbox1[value="' + value + '"]').parents('tr').find('.statusPin').text('false').css('color', 'red');
                        });
                    }
                },
                error: function(response) {

                }
            });
        });
    });
</script>

<script type="text/javascript">
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

    $(".price").on('keypress keyup', function() {
        val = $(this).val();
        console.log(val);
        $(this).parents('.modal-body').find('input.promotion').val(val);
    });
</script>

<script>
    $(document).ready(function() {
        // $('#flash_sale').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        // $('#approve_pay').dataTable();
        // $('#main_table').dataTable();
        // $('#appove_table').dataTable();
        // $('#ban_table').dataTable();
        // $('tr').find("th.no-sort").removeClass("sorting_asc");

        $('#add-note').click(function() {
            var note = $('#note_note').val();
            console.log(note);


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
</script>



@endsection