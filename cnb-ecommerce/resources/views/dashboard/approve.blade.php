@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid px-0" style='background:#fdf7fb'>
        <div class="row">
            <div class="col-xl-12 col-12 ml-xl-auto">
                <h5 class="mt-4"><b>ระบบจัดการผู้ใช้งาน </b>
                </h5>
                <div class=" text-center">
                    <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active nav-manage" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                    aria-controls="list-1" aria-selected="true">ทั้งหมด
                                    ({{ $user->total() }})</a>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab"
                                aria-controls="list-3" aria-selected="false">ระงับผู้ใช้งาน
                                ({{ count($ban) }})</a>
                        </li> --}}
                        </ul>
                    </div>
                    <div class="form-group d-lg-none d-md-none d-block">
                        <select class="form-control" id="select-submenu">
                            <option value="1">ทั้งหมด ({{ $user->total() }})</option>
                            {{-- <option value="2">ยืนยันตัวตน ({{ count($approve) }})</option> --}}
                            {{-- <option value="3">ระงับผู้ใช้งาน ({{ count($ban) }})</option> --}}
                        </select>
                    </div>

                    {{-- SEARCH --}}
                    <div class="col-lg-12 col-md-12 col-12 pt-4">
                        <form role="search" action="/dashboard/manageUser" method="GET">
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
                                    <h6 class="mb-0">ชื่อ</h6>
                                </div>
                                @if (isset($_REQUEST['u_name']))
                                    <input type="text" name="u_name" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['u_name'] }}" placeholder="ชื่อ" aria-label="u_name"
                                        aria-describedby="addon-wrapping">
                                @else
                                    <input type="text" name="u_name" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="ชื่อ" aria-label="u_name" aria-describedby="addon-wrapping">
                                @endif
                                <div
                                    class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">อีเมล</h6>
                                </div>
                                @if (isset($_REQUEST['email']))
                                    <input type="text" name="email" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['email'] }}" placeholder="อีเมล" aria-label="email"
                                        aria-describedby="addon-wrapping">
                                @else
                                    <input type="text" name="email" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="อีเมล" aria-label="email" aria-describedby="addon-wrapping">
                                @endif
                                <div
                                    class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">เบอร์โทรศัพท์</h6>
                                </div>
                                @if (isset($_REQUEST['phone']))
                                    <input type="number" name="phone" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="{{ $_REQUEST['phone'] }}" placeholder="เบอร์โทรศัพท์" aria-label="phone"
                                        aria-describedby="addon-wrapping">
                                @else
                                    <input type="number" name="phone" class="form-control col-lg-2"
                                        style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;"
                                        value="" placeholder="เบอร์โทรศัพท์" aria-label="phone"
                                        aria-describedby="addon-wrapping">
                                @endif
                            </div>
                            <div class="input-group flex-wrap pt-2">
                                <div class="col-lg-auto d-flex align-items-center col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    <h6 class="mb-0">วันที่สมัคร</h6>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6">
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
                                <div class="col-lg-auto d-flex align-items-center col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-ๅ mt-ๅ">
                                    <h6 class="mb-0">-</h6>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6">
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

                                <div class="d-flex align-items-center col-lg-auto col-md-12 col-12 text-md-left text-left mt-lg-0 mt-md-4 mt-4">
                                    @if (isset($_REQUEST['chkISShop']) && $_REQUEST['chkISShop'] == 'Y')
                                    <input type="checkbox" id="chkISShop" name="chkISShop" value="Y" checked="checked" >&nbsp;&nbsp;
                                    @else
                                    <input type="checkbox" id="chkISShop" name="chkISShop" value="Y" >&nbsp;&nbsp;
                                    @endif
                                    <h6 class="mb-0">เฉพาะร้านค้า</h6>
                                </div>

                                <div class="col-lg-2 col-md-2 col-12 mb-2 ml-auto">
                                    <input type="submit" value="ค้นหา" name="filter" id="filter" class="form-control btn btn-main-set">
                                </div>
                                <div class="col-lg-2 col-md-2 col-12 mb-2">
                                    <a href="/dashboard/manageUser"><input type="button" value="ล้างค่า" class="form-control btn " style="background-color: #ffc107"></a>
                                </div>
                            </div>



                        </form>
                    </div>

                    {{-- SEARCH --}}

                    <div class="w-100">
                        <div class="tab-content" id="myTabContent">
                            {{-- 1taphome --}}
                            <div class="row justify-content-center tab-pane fade show active " id="list-1">
                                <div class="container-fluid table-responsive">
                                    <div class="card" style="border: none;">
                                        <div class="card-body m-2 p-0 ">
                                            <table class="table table-striped" id="main_table">
                                                <thead class="thead-blue">
                                                    <tr>
                                                        <th scope="col">อันดับ</th>
                                                        <th style="width:150px">เลขกระเป๋า</th>
                                                        <th scope="col">ชื่อ- นามสกุล</th>
                                                        <th scope="col">ชื่อร้านค้า</th>
                                                        <th scope="col">อีเมล</th>
                                                        <th style="width:150px" scope="col">เบอร์โทรศัพท์</th>
                                                        <th style="width:160px" scope="col">วันที่สมัคร</th>
                                                        <!--th style="width:160px" scope="col">สถานะ KYC</th>
                                                        <th scope="col"></th-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user as $key => $userdata)
                                                        <tr style="text-align: center; align-items: center;">
                                                            <td data-label="#">
                                                                {{ ($user->currentPage() - 1) * $user->perPage() + $key + 1 }}
                                                            </td>
                                                            <td data-label="เลขกระเป๋า"
                                                                style="font-weight:bold">
                                                                {{ $userdata->wallet_address ? substr($userdata->wallet_address, 0, 4).'...'.substr($userdata->wallet_address, -4) : '' }}
                                                            </td>

                                                            @if ($userdata->type == 99)
                                                                <td data-label="ชื่อ-นามสกุล"
                                                                    style="font-weight:bold;color:red">
                                                                    {{ $userdata->name }}
                                                                    {{ $userdata->surname }}
                                                                </td>
                                                            @endif
                                                            @if ($userdata->type != 99)
                                                                <td>
                                                                    {{ $userdata->name }}
                                                                    {{ $userdata->surname }}
                                                                </td>
                                                            @endif
                                                            <td data-label="ชื่อร้านค้า" style="color: #000;">
                                                                @if ($userdata->shop_name != null && $userdata->shop_name != '')
                                                                    <a href="javascript:void(0);" data-toggle="modal"
                                                                    data-target="#view_addr{{ $userdata->id }}"
                                                                    >{{ $userdata->shop_name }}</a>
                                                                @else
                                                                    <button data-toggle="modal" data-target="#modalSeller_{{$userdata->id}}" class="btn btn-select px-4" data-dismiss="drawer" >ลงทะเบียนร้าน</button>
                                                                @endif
                                                            </td>
                                                            <td data-label="Email">{{ $userdata->email }}</td>
                                                            <td data-label="เบอร์โทรศัพท์">{{ $userdata->phone }}</td>
                                                            <td data-label="วัน-เดือน-ปี (เกิด)">
                                                                @if ($userdata->created_at != '')
                                                                    {{ $userdata->created_at }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="view_addr{{ $userdata->id }}" role="dialog">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-lg-6 col-md-12 col-12">
                                                                                        <div class="col-12" style='background:#dee2e6; border-radius:8px;'>
                                                                                            <div class="d-flex flex-wrap">
                                                                                                <div class="col-4 px-0 py-3">
                                                                                                    <img style='border-radius: 50%;width: 60px; height: 55px;border: #333 3px solid;' src="{{ '/img/profile/' . $userdata->user_pic }}" alt="" onerror="this.onerror=null;this.src='/new_ui/img/menu/icon-menu-bottom-user.png'" >
                                                                                                </div>
                                                                                                <div class="col-8 text-left py-3">
                                                                                                    <h6 class="font-weight-bold mb-1" style='color:#919191'>ชื่อร้านค้า</h6>
                                                                                                    <b>
                                                                                                        <h6
                                                                                                            class="font-weight-bold">
                                                                                                            {{ $userdata->shop_name }}
                                                                                                        </h6>
                                                                                                    </b>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-6 col-md-12 col-12">
                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-6" style='text-align: left'>
                                                                                                    แก้ไขข้อมูลร้านค้า
                                                                                                </div>
                                                                                                <div class="col-6" style='text-align: right'>
                                                                                                    <a href="/dashboard/manageUser/shopDetail/{{$userdata->shop_id}}" class="btn btn-select px-4" >แก้ไข</a>
                                                                                                </div>
                                                                                            </div><br/>
                                                                                            <div class="row">
                                                                                                <div class="col-6" style='text-align: left'>
                                                                                                    แก้ไขที่อยู่ร้านค้า
                                                                                                </div>
                                                                                                <div class="col-6" style='text-align: right'>
                                                                                                    <a href="/dashboard/manageUser/shopAddress/{{$userdata->shop_id}}" class="btn btn-select px-4" >แก้ไข</a>
                                                                                                </div>
                                                                                            </div><br/>
                                                                                            <div class="row">
                                                                                                <div class="col-6" style='text-align: left'>
                                                                                                    เรียกดูรายการสินค้า
                                                                                                </div>
                                                                                                <div class="col-6" style='text-align: right'>
                                                                                                    <a href="/dashboard/manageUser/productList?shop_id={{$userdata->shop_id}}" class="btn btn-select px-4" >รายการสินค้า</a>
                                                                                                </div>
                                                                                            </div><br/>
                                                                                            <div class="row">
                                                                                                <div class="col-9" style='text-align: left'>
                                                                                                    สถานะร้านค้า
                                                                                                </div>
                                                                                                <div class="col-3 d-flex align-items-center justify-content-end">
                                                                                                    <input type="checkbox" id="btnSetShopSts_{{ $userdata->shop_id }}" class="d-none btn-set-shop-sts" switch="primary" data-shop-id="{{ $userdata->shop_id }}" {{ $userdata->shop_sts == 'open' ? 'checked="checked"' : '' }} />
                                                                                                    <label class="mb-0" for="btnSetShopSts_{{ $userdata->shop_id }}" data-on-label="เปิด" data-off-label="ปิด"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-12 border-right">
                                                                                        <div class='col-12 border-bottom'>
                                                                                            <div class="col-12 text-left pt-3">
                                                                                                <h6 class="font-weight-bold mb-1" style='color:#919191'>ที่อยู่ร้านค้า</h6>
                                                                                                <b>
                                                                                                    <h6 class="font-weight-bold">
                                                                                                        @if ($userdata->origin_addr != '')
                                                                                                            {{ $userdata->origin_addr }}
                                                                                                        @else
                                                                                                            -
                                                                                                        @endif
                                                                                                    </h6>
                                                                                                </b>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class='col-12 border-bottom'>
                                                                                            <div class="col-12 text-left pt-3">
                                                                                                <h6 class="font-weight-bold mb-1" style='color:#919191'>ที่อยู่ของฉัน</h6>
                                                                                                @if ($userdata->shop_addr != '')
                                                                                                    @foreach($userdata->shop_addr as $v_shop_addr)
                                                                                                        <b>
                                                                                                            <h6 class="font-weight-bold">
                                                                                                                {{$v_shop_addr}}
                                                                                                            </h6>
                                                                                                        </b><hr>
                                                                                                    @endforeach
                                                                                                @else
                                                                                                    -
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
                                                            <!-- Modal 2 -->
                                                            <div class="modal fade" id="modalSeller_{{$userdata->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel"><strong>ลงทะเบียนร้านค้า</strong></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form method="POST" action="/dashboard/manageUser/shop/new" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <div class="col-12">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
                                                                                                <div class="custom-file was-validated">
                                                                                                    <div class="d-flex align-items-center justify-content-center"
                                                                                                        style="width: 100%; height: 300px;border: 1px solid #ced4da !important;border-radius: .25rem !important;">
                                                                                                        <img id="preview" class="img-shop-profile"
                                                                                                            style="max-width: 100%; max-height: 100%;"
                                                                                                            src="{{ '/new_ui/img/no_image.png' }}">
                                                                                                    </div>
                                                                                                    <label style="margin-top: 10px;">
                                                                                                        <h6 style="color: red;">ขนาดภาพแนะนำ 120px x 120px</h6>
                                                                                                    </label>
                                                                                                    <div class="custom-file mt-3" id="customFile"
                                                                                                        style="margin-top: 0px !important;">
                                                                                                        <input onchange="readURL(this)" type="file"
                                                                                                            class="click_image custom-file-input form-control-file is-invalid @error('shop_pic') is-invalid @enderror "
                                                                                                            id="shop_pic" name="shop_pic" required />
                                                                                                        <label class="custom-file-label">
                                                                                                            <p id="image_img"></p>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="col-lg-12 col-md-12 col-12  px-0">
                                                                                            <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                                                                                                <div class="col-12 px-0">
                                                                                                    <div class="form-group was-validated">
                                                                                                        <label>
                                                                                                            <h5><strong style="color: #333;">ชื่อร้าน</strong></h5>
                                                                                                        </label>
                                                                                                        <input type="text" class="form-control is-invalid" id="shop_name"
                                                                                                            name="shop_name" placeholder="กรอกชื่อร้านค้า" required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-12 px-0">
                                                                                                    <div class="form-group was-validated">
                                                                                                        <label>
                                                                                                            <h5><strong style="color: #333;">รายละเอียดร้านค้า</strong></h5>
                                                                                                        </label>
                                                                                                        <textarea class="form-control is-invalid" id="description" name="description" rows="8"
                                                                                                            placeholder="กรอกรายละเอียดของร้านค้า" required></textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary " type="button" data-dismiss="modal"
                                                                                    aria-label="Close">{{ __('ยกเลิก') }} </button>
                                                                                <button type="submit" class="btn btn-main-set">{{ __('บันทึก') }}</button>
                                                                            </div>
                                                                            <input type="hidden" name="user_id" value="{{ $userdata->id }}">
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex flex-wrap">
                                <div class="col-6 text-left">
                                    ลำดับที่ {{ ($user->currentPage() - 1) * $user->perPage() + 1 }} -
                                    {{ ($user->currentPage() - 1) * $user->perPage() + count($user) }} จาก
                                    {{ $user->total() }}

                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-end col-12">


                                        @if ($user->hasPages())
                                            <ul class="pagination">
                                                {{-- Previous Page Link --}}

                                                @if ($user->onFirstPage())
                                                    <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                        <span class="mr-1"><i
                                                                class="fa fa-angle-double-left text-secondary"
                                                                aria-hidden="true"></i></span>
                                                    </li>
                                                    <li class="disabled align-self-center px-2 bg-pagination-white d-none">
                                                        <span class="mr-1"><i
                                                                class="fa fa-angle-left text-secondary"
                                                                aria-hidden="true"></i></span>
                                                    </li>
                                                @else <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $user->url(1) }}" rel="prev">
                                                            <i class="fa fa-angle-double-left text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $user->previousPageUrl() }}" rel="prev">
                                                            <i class="fa fa-angle-left text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- show button first page --}}
                                                @if ($user->currentPage() > 5)
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $user->url(1) }}"><span>1</span></a>
                                                    </li>
                                                @endif
                                                {{-- show button first page --}}


                                                {{-- condition stay in first page not show button --}}
                                                {{-- @if ($user->currentPage() == 1)
                                                        <li class="align-self-center mr-1">
                                                            <a class="d-none page-link" tabindex="-2">1</a>
                                                        </li>
                                                        @endif --}}


                                                @if ($user->currentPage() > 5)
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <span>...</span>
                                                    </li>
                                                @endif



                                                @foreach (range(1, $user->lastPage()) as $i)
                                                    @if ($i >= $user->currentPage() - 2 && $i <= $user->currentPage() + 2)

                                                        @if ($i == $user->currentPage())
                                                            <li class="active px-2 bg-pagination-42294f">
                                                                <span>{{ $i }}</span>
                                                            </li>
                                                        @else
                                                            <li class="px-2 bg-pagination-white"><a
                                                                    href="{{ $user->url($i) }}">{{ $i }}</a>
                                                            </li>
                                                        @endif
                                                    @endif
                                                @endforeach


                                                {{-- three dots between number near last pages --}}
                                                @if ($user->currentPage() < $user->lastPage() - 4)
                                                    <li class="align-self-center  px-2 bg-pagination-white">
                                                        <span>...</span>
                                                    </li>
                                                @endif
                                                {{-- three dots between number near last pages --}}


                                                {{-- Show Last Page --}}
                                                @if ($user->hasMorePages() == $user->lastPage() && $user->lastPage() > 5)
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $user->url($user->lastPage()) }}"><span>{{ $user->lastPage() }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- Show Last Page --}}



                                                @if ($user->hasMorePages())
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $user->nextPageUrl() }}" rel="next">
                                                            <i class="fa fa-angle-right text-secondary"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li class="align-self-center px-2 bg-pagination-white">
                                                        <a href="{{ $user->url($user->lastPage()) }}" rel="next">
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
@section('style')
    <style>
        .box {
            height: calc(100vh - 250px);
            ;
        }

        .top {
            margin-top: 100px;
        }

        .btn a {
            color: #346751;
        }

        .btn a:hover {
            color: #333;
        }


        .ticket_left {
            background-color: #f8eaf3;
            border-radius: 6px;
        }

        .ticket_right {
            background-color: #42294f;
            border-radius: 6px;
            color: white;
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

        .sl-prev,
        .sl-next,
        .sl-counter {
            display: none !important;
        }

        input[switch]+label {
            font-size: 1em;
            line-height: 1;
            width: 65px;
            height: 24px;
            background-color: #D61900;
            background-image: none;
            border-radius: 2rem;
            padding: .16667rem;
            cursor: pointer;
            display: inline-block;
            position: relative;
        }

        input[switch]+label,
        input[switch]+label:before {
            text-align: center;
            font-weight: 500;
            -webkit-transition: all .1s ease-in-out;
            transition: all .1s ease-in-out;
        }

        input[switch=primary]:checked+label {
            background-color: #34C38F;
        }

        input[switch]:checked+label {
            background-color: #34C38F;
        }

        input[switch]:checked+label:before {
            color: #fff;
            content: attr(data-on-label);
            right: auto;
            left: 3px;
        }

        input[switch]+label:before {
            color: #fff;
            content: attr(data-off-label);
            display: block;
            font-family: inherit;
            font-size: 12px;
            line-height: 21px;
            position: absolute;
            right: 1px;
            margin: 3px;
            top: -2px;
            min-width: 1.66667rem;
            overflow: hidden;
        }

        input[switch]+label,
        input[switch]+label:before {
            text-align: center;
            font-weight: 500;
            -webkit-transition: all .1s ease-in-out;
            transition: all .1s ease-in-out;
        }

        input[switch]:checked+label:after {
            left: 33px;
            background-color: #eff2f7;
        }

        input[switch]+label:after {
            content: "";
            position: absolute;
            left: 3px;
            background-color: #eff2f7;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: 2rem;
            height: 20px;
            width: 20px;
            top: 2px;
            -webkit-transition: all .1s ease-in-out;
            transition: all .1s ease-in-out;
        }

    </style>
@endsection


@section('script')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="{{ '/js/jquery.dataTables.min.js' }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $('#select-submenu').on('change', function() {
            value = $(this).val();
            $('a.nav-link[href="#list-' + value + '"]').click();
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#sex option").each(function(index) {
                location.getParams = getParams;
                // console.log (location.getParams()["status"]);
                if ($(this).val() == location.getParams()["sex"]) {
                    $(this).attr('selected', 'true');
                    console.log($(this).val());
                }
            });
            $("#kyc_select option").each(function(index) {
                location.getParams = getParams;
                // console.log (location.getParams()["status"]);
                if ($(this).val() == location.getParams()["kyc_select"]) {
                    $(this).attr('selected', 'true');
                    console.log($(this).val());
                }
            });
            $('body').on('click', '#btnDecline', function() {
                $('.dvRemark_' + $(this).data('id')).show();
                // alert($("#dvRemark").html());
            });
            $(".btnConfirmDecline").click(function() {
                $.ajax({
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": $(this).data('id'),
                        "remark": $('#kyc_remark' + $(this).data('id')).val()
                    },
                    url: "/dashboard/manageUser/KYC/delete",
                    success: function(json) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'บันทึกข้อมูลสำเร็จ'
                        })
                        location.reload();
                    }
                });
            });
            $(".btn-set-shop-sts").click(function() {
                var i_shop_id = $(this).data('shop-id');

                if ($(this).is(':checked') == true) {
                    $.ajax({
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "shop_sts": 'open',
                            "shop_id": i_shop_id
                        },
                        url: "{{ '/dashboard/manageUser/setShopSts' }}",
                        success: function(json) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'บันทึกข้อมูลสำเร็จ'
                            })
                            // location.reload();
                        }

                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "shop_sts": 'close',
                            "shop_id": i_shop_id
                        },
                        url: "{{ '/dashboard/manageUser/setShopSts' }}",
                        success: function(json) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'บันทึกข้อมูลสำเร็จ'
                            })
                            // location.reload();
                        }

                    });
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

        var image_name = $("#image_img").text("กรุณาเลือกรูปภาพโลโก้ร้านค้า");
        var click_image = $("#click_image").val();
        // console.log(click_image);


        // var image_name;
        function readURL(input) {
            var readerImg = $("#shop_pic").val();
            if (input.files && input.files[0]) {
                reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                    // readerImg = e.target.result;
                    image_name = $("#image_img").text(readerImg.split('\\').pop());
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>




@endsection
