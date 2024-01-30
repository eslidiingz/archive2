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

    .modal-lg {
        max-width: 800px !important;
    }
</style>
@php
// dd($invs);
@endphp

<div class="container-fluid px-0" style='background:#fdf7fb'>
    <div class="row">
        <div class="col-xl-12 col-12 ml-xl-auto">
            <h5 class="mt-4"><b>สินค้าทั้งหมด</b>
            </h5>
            <div class=" text-center">

                <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="list-2-tab " data-toggle="tab" href="#list-2" role="tab"
                                aria-controls="list-2" aria-selected="false">สินค้า 9 บาท ({{ $flash_s->total() }})</a>
                        </li>
                    </ul>
                </div>
                <div class="form-group d-lg-none d-md-none d-block">
                    <select class="form-control" id="select-submenu">
                        <option value="1">สินค้่าทั้งหมด ({{ $flash_s->total() }})</option>
                    </select>
                </div>
                {{-- SEARCH --}}
                <div class="col-lg-12 col-md-12 col-12 pt-4">
                    <form role="search" action="/dashboard/nine_baht" method="GET">
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
                                <h6 class="mb-0">ปักหมุด</h6>
                            </div>
                            <select class="form-control col-lg-2" id="status" name='status'>
                                <option id='status_chk' value='2'>ทั้งหมด</option>
                                <option id='status_chk' value='1'>True</option>
                                <option id='status_chk' value='0'>False</option>
                            </select>
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
                                <h6 class="mb-0">ราคา</h6>
                            </div>
                            @if (isset($_REQUEST['price']))
                            <input type="number" name="price" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['price'] }}" placeholder="ราคา" aria-label="price"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="number" name="price" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="ราคา" aria-label="price" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">คลัง</h6>
                            </div>
                            @if (isset($_REQUEST['amoung']))
                            <input type="number" name="amoung" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['amoung'] }}" placeholder="คลัง" aria-label="amoung"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="number" name="amoung" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="คลัง" aria-label="amoung" aria-describedby="addon-wrapping">
                            @endif
                            <div
                                class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                <h6 class="mb-0">คงเหลือ</h6>
                            </div>
                            @if (isset($_REQUEST['remain']))
                            <input type="number" name="remain" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                value="{{ $_REQUEST['remain'] }}" placeholder="คงเหลือ" aria-label="remain"
                                aria-describedby="addon-wrapping">
                            @else
                            <input type="number" name="remain" class="form-control col-lg-2"
                                style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value=""
                                placeholder="คงเหลือ" aria-label="remain" aria-describedby="addon-wrapping">
                            @endif
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 mb-2 pt-4 ml-auto">
                            <input type="submit" value="Filter" name="filter" id="filter"
                                class="form-control btn btn-primary">
                        </div>
                    </form>
                </div>
                {{-- SEARCH --}}
                <div class="w-100">
                    <div class="tab-content">
                        <div class="row justify-content-center tab-pane active" id="list-2" role="tabpanel">
                            <div class="container-fluid table-responsive">
                                <div class="card" style="border: none;">
                                    <form class="pin_product" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header d-flex justify-content-end px-0">

                                            <div class="col-lg-6 col-md-12 col-12 ml-auto px-0">
                                                <div class="form-row">
                                                    <div class="col-lg-3 col-md-6 col-6 mb-2">
                                                        <button type="button"
                                                            class="btn form-control btn-secondary forward mr-2">ปรับสินค้า</button>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-6 mb-2">
                                                        <button type="button"
                                                            class="btn form-control btn-primary mr-2 pin">ปักหมุด</button>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-6 mb-2">
                                                        <button type="button"
                                                            class="btn form-control btn-warning mr-2 dispin">ลบปักหมุด</button>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-6 mb-2">
                                                        <button type="button"
                                                            class="btn form-control btn-danger deleted">ลบสินค้า</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-body m-2 p-0 ">
                                            <table class="table table-striped flash_sale" id="flash_sale">
                                                <thead>
                                                    <tr>

                                                        <th class='no-sort' class="text-center"><input type="checkbox"
                                                                status='1' name="select_all" class="head_input"
                                                                id="example-select-all"></th>
                                                        <th scope="col">ลำดับ</th>
                                                        <th scope="col" style="width200px" class="text-left">
                                                            รูปภาพสินค้า</th>
                                                        <th scope="col" style="width200px" class="text-left">
                                                            วันที่จัดโปรโมชั่น-สิ้นสุด</th>
                                                        <th style="width:150px" class="text-left" scope="col">ชื่อสินค้า
                                                        </th>
                                                        <th scope="col">ราคา</th>
                                                        <th style="width:150px" scope="col">คลัง</th>
                                                        <th style="width:150px" scope="col">คงเหลือ</th>
                                                        <th scope="col">ปักหมุด</th>
                                                        <th scope="col">Refun</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($flash_s as $key => $key_flash)
                                                    <tr style="text-align: center; align-items: center;">
                                                        <td><input type="checkbox" name="id[]" class='checkbox1'
                                                                value="{{ @$key_flash->id }}">
                                                        </td>
                                                        <td>
                                                            {{ (($flash_s->currentPage()-1) * $flash_s->perPage())+$key+1 }}
                                                        </td>
                                                        <td data-label="#" class="text-left">
                                                            @if (@$key_flash->product_img =='0' ||
                                                            @$key_flash->product_img ==
                                                            null)
                                                            <img style="
                                                                            max-width:50px
                                                                            " src="/img/no_image.png" alt=""
                                                                class="img-fluid">
                                                            @else
                                                            <?php $front_image = @$key_flash->product_img[0];
                                                                            ?>
                                                            <div class="gallery1">
                                                                <a href="/img/product/{{ $front_image }}" class="big"
                                                                    rel="{{ $front_image }}">
                                                                    <img style="
                                                                            max-width:50px
                                                                            " src="/img/product/{{$front_image}}"
                                                                        alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                            @endif
                                                        </td>
                                                        <td data-label="#" class="text-left">
                                                            {{ @$key_flash->start_date }} ถึง
                                                            {{ @$key_flash->end_date }}
                                                        </td>
                                                        <td data-label="#" class="text-left">
                                                            {{ @$key_flash->name }}
                                                        </td>
                                                        <td data-label="ราคา">
                                                            @foreach (@$key_flash->product_option["price"] as $item)
                                                            <p>{{$item}}</p>
                                                            @endforeach
                                                        </td>
                                                        <td data-label="คลัง" style="font-weight:bold;">
                                                            @foreach (@$key_flash->product_option["amount"] as $item)
                                                            <p>{{$item}}</p>
                                                            @endforeach
                                                        </td>
                                                        <td data-label="คงเหลือ" style="font-weight:bold;">
                                                            @foreach (@$key_flash->product_option["stock"] as $item)
                                                            <p>{{$item}}</p>
                                                            @endforeach
                                                        </td>
                                                        <td style="font-weight:bold;" class="statusPin">
                                                            @if(@$key_flash->product_pin == '1')
                                                            <p><b style="color: green;">true</b></p>
                                                            @elseif(@$key_flash->product_pin == '0')
                                                            <p><b style="color: red;">false</b></p>
                                                            @endif
                                                        </td>
                                                        <td style="font-weight:bold;" class="refun">
                                                            <a href="/dashboard/flash_sale/{{ $key_flash->id }}/refund">
                                                                <button type="button"
                                                                    class="btn btn-primary">Refun</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-wrap">
                            <div class="col-6 text-left">
                                ลำดับที่ {{ (($flash_s->currentPage()-1) * $flash_s->perPage())+1 }} -
                                {{ (($flash_s->currentPage()-1) * $flash_s->perPage())+ count($flash_s) }} จาก
                                {{ $flash_s->total() }}
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end col-12">


                                    @if ($flash_s->hasPages())
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}

                                        @if ($flash_s->onFirstPage())
                                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                class="mr-1"><i class="fa fa-angle-double-left text-secondary"
                                                    aria-hidden="true"></i></span></li>
                                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span
                                                class="mr-1"><i class="fa fa-angle-left text-secondary"
                                                    aria-hidden="true"></i></span></li>
                                        @else <li class="align-self-center px-2 bg-pagination-white">
                                            <a href="{{ $flash_s->url(1) }}" rel="prev">
                                                <i class="fa fa-angle-double-left text-secondary"
                                                    aria-hidden="true"></i>
                                            </a>
                                        <li class="align-self-center px-2 bg-pagination-white">
                                            <a href="{{ $flash_s->previousPageUrl() }}" rel="prev">
                                                <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                                            </a>
                                        </li> @endif

                                        {{-- show button first page --}}
                                        @if ( $flash_s->currentPage() > 5 )
                                        <li class="align-self-center px-2 bg-pagination-white">
                                            <a href="{{ $flash_s->url(1) }}"><span>1</span></a>
                                        </li>
                                        @endif
                                        {{-- show button first page --}}


                                        {{-- condition stay in first page not show button --}}
                                        {{-- @if ( $flash_s->currentPage() == 1 )
                                                        <li class="align-self-center mr-1">
                                                            <a class="d-none page-link" tabindex="-2">1</a>
                                                        </li>
                                                        @endif --}}


                                        @if ( $flash_s->currentPage() > 5 )
                                        <li class="align-self-center px-2 bg-pagination-white">
                                            <span>...</span>
                                        </li>
                                        @endif



                                        @foreach(range(1, $flash_s->lastPage()) as $i)
                                        @if($i >= $flash_s->currentPage() - 2 && $i <= $flash_s->currentPage()
                                            +
                                            2)

                                            @if ($i == $flash_s->currentPage())
                                            <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                                            @else
                                            <li class="px-2 bg-pagination-white"><a
                                                    href="{{ $flash_s->url($i) }}">{{ $i }}</a>
                                            </li>
                                            @endif
                                            @endif
                                            @endforeach


                                            {{-- three dots between number near last pages --}}
                                            @if ( $flash_s->currentPage() < $flash_s->lastPage() - 4)
                                                <li class="align-self-center  px-2 bg-pagination-white">
                                                    <span>...</span>
                                                </li>
                                                @endif
                                                {{-- three dots between number near last pages --}}


                                                {{-- Show Last Page --}}
                                                @if($flash_s->hasMorePages() == $flash_s->lastPage() &&
                                                $flash_s->lastPage() > 5)
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $flash_s->url($flash_s->lastPage()) }}"><span>{{ $flash_s->lastPage() }}</span>
                                                    </a>
                                                </li>
                                                @endif
                                                {{-- Show Last Page --}}



                                                @if ($flash_s->hasMorePages())
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $flash_s->nextPageUrl() }}" rel="next">
                                                        <i class="fa fa-angle-right text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="align-self-center px-2 bg-pagination-white">
                                                    <a href="{{ $flash_s->url($flash_s->lastPage()) }}" rel="next">
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
    $('#select-submenu').on('change',function(){
                    value = $(this).val();
                    $('a.nav-link[href="#list-'+value+'"]').click();
                });
</script>
<script>
    $(".deleted").click(function(event){
                                    var_array = [];
                                    var searchIDs = $(".flash_sale input:checkbox:not(.head_input):checked").map(function(){
                                    var_array.push($(this).val());
                                    }).get(); // <----
                                        $.ajax({
                                            url: "/dashboard/deletedpromotion",
                                            type: "POST",
                                            data:  { id : var_array , _token : '{{ csrf_token() }}'},
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
                                            error: function(response){

                                            } 	        
                                        });
                                });
</script>
<script>
    $(document).ready(function (e){
                                    $('.submitPromotion').on('click',function(){
                                        $(this).parents('form').submit();
                                    })
                                    $(".promotion").on('submit',(function(e){
                                        e.preventDefault();
                                        $.ajax({
                                            url: "/dashboard/promotion",
                                            type: "POST",
                                            data:  new FormData(this),
                                            contentType: false,
                                            cache: false,
                                            processData:false,
                                            success: function(response) {
                                                if($.trim(response) == "true"){
                                                    Swal.fire({
                                                    icon: 'success',
                                                    title: 'สำเร็จ',
                                                    text: 'เพิ่มโปรโมชั่นสำเร็จ'
                                                    })
                                                }
                                                setTimeout(function(){
                                                location.reload(true);
                                                }, 2000);
                                            },
                                            error: function(response){

                                            } 	        
                                        });
                                    }));
                                });

                                $(document).ready(function (e){
                                    $('.forward').on('click',function(){
                                        $(this).parents('form').submit();
                                    })
                                    $(".pin_product").on('submit',(function(e){
                                        e.preventDefault();
                                        $.ajax({
                                            url: "/dashboard/editpromotion",
                                            type: "POST",
                                            data:  new FormData(this),
                                            contentType: false,
                                            cache: false,
                                            processData:false,
                                            success: function(response) {
                                                if($.trim(response) == "true"){
                                                    Swal.fire({
                                                    icon: 'success',
                                                    title: 'สำเร็จ',
                                                    text: 'ทำรายการสำเร็จ'
                                                    })
                                                }
                                                setTimeout(function(){
                                                location.reload(true);
                                                }, 2000);
                                            },
                                            error: function(response){

                                            } 	        
                                        });
                                    }));
                                });



                                $(document).ready(function (e){
                                    $('.pin').on('click',function(){
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
                                            data:  {
                                                id : array,
                                            },
                                            // contentType: false,
                                            // cache: false,
                                            // processData:false,
                                            success: function(response) {
                                                if($.trim(response) == "true"){
                                                    Swal.fire({
                                                    icon: 'success',
                                                    title: 'สำเร็จ',
                                                    text: 'ปัหหมุดสำเร็จ'
                                                    })
                                                    // statusPin
                                                    $.each(array, function( key, value ) {
                                                        // console.log(value);
                                                        $('.pin_product input.checkbox1[value="'+value+'"]').parents('tr').find('.statusPin').text('true').css('color','green');
                                                    });
                                                }
                                            },
                                            error: function(response){

                                            } 	        
                                        });
                                    });
                                });

                                $(document).ready(function (e){
                                    $('.dispin').on('click',function(){
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
                                            data:  {
                                                id : array,
                                            },
                                            // contentType: false,
                                            // cache: false,
                                            // processData:false,
                                            success: function(response) {
                                                if($.trim(response) == "true"){
                                                    Swal.fire({
                                                    icon: 'success',
                                                    title: 'สำเร็จ',
                                                    text: 'สำเร็จ'
                                                    })
                                                    // statusPin
                                                    $.each(array, function( key, value ) {
                                                        // console.log(value);
                                                        $('.pin_product input.checkbox1[value="'+value+'"]').parents('tr').find('.statusPin').text('false').css('color','red');
                                                    });
                                                }
                                            },
                                            error: function(response){

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

                                $(".price").on('keypress keyup', function(){
                                    val = $(this).val();
                                    console.log(val);
                                    $(this).parents('.modal-body').find('input.promotion').val(val);
                                });
</script>

<script>
    $(document).ready( function () {
                                    // $('#flash_sale').DataTable();
                                });
</script>

<script>
    $(document).ready(function() {
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