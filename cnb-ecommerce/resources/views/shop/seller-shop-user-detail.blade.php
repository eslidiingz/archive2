@extends('layouts.shop')
@section('loader')
    <!-- <div class="preloader js-preloader flex-center" style="height: 101vh; z-index: 9999; text-align: center; background-image: url('/new_ui/img/bg_login.png');background-position: center;
                                                                                      background-size: cover; background-repeat: no-repeat;">
                                                <div class="col-12">
                                                                                                                                            <div class="row">
                                                                                                                                                <div class="col-12 mb-4">
                                                                                                                                                    <img src="/new_ui/img/logo-loader-shop.png?v=2" class="w-loader-custom">
                                                                                                                                                </div>
                                                                                                                                                <div class="col-12 mb-4">
                                                                                                                                                    <div class="dots">
                                                                                                                                                        <div class="dot"></div>
                                                                                                                                                        <div class="dot"></div>
                                                                                                                                                        <div class="dot"></div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <script>
                                                                                                                                        $('.js-preloader').preloadinator({
                                                                                                                                            minTime: 2000
                                                                                                                                        });
                                                                                                                                    </script> -->
@endsection
@section('content')
    <div class="row">
        <div class="col-12 px-4 pt-4 pb-1">
            <h3><strong>My Shop</strong></h3>
        </div>
        <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
            <div class="form-row p-lg-4 p-md-2 p-2 mx-0 " style="background-color: #fff;">
                <div class="col-9 my-2">
                    <h3><strong>State my shop</strong></h3>
                    <h5 class="text-danger">(Please complete the above information before opening the store)</h5>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-end">
                    {{-- {{sizeof($kyc)}} --}}
                    @if (sizeof($address) == 0 || $shop[0]->bank_number == '' || sizeof($kyc) == 0)
                        {{-- 0 --}}
                        <input type="checkbox" id="switch6" class="d-none" switch="primary" disabled="disabled" />
                        <label class="mb-0" for="switch6" data-on-label="Open" data-off-label="Close"></label>
                    @elseif (sizeof($kyc) != 0)
                        @if ($kyc[0]->type_kyc == 2 &&
                            $kyc[0]->status_first == 1 &&
                            $kyc[0]->status_second == 1 &&
                            $kyc[0]->status_third == 1 &&
                            ($kyc[0]->status_fourth == 1 || $kyc[0]->status_fourth == 2))
                            {{-- 2 --}}
                            <input type="checkbox" id="switch6" class="d-none" switch="primary"
                                onclick="send_status_shop()"
                                {{ $shop[0]->shop_sts == 'open' ? 'checked="checked"' : '' }} />
                            <label class="mb-0" for="switch6" data-on-label="Open" data-off-label="Close"></label>
                        @elseif(($kyc[0]->type_kyc == 1 || $kyc[0]->type_kyc == 3) && $kyc[0]->status_second == 1)
                            {{-- 1 --}}
                            <input type="checkbox" id="switch6" class="d-none" switch="primary"
                                onclick="send_status_shop()"
                                {{ $shop[0]->shop_sts == 'open' ? 'checked="checked"' : '' }} />
                            <label class="mb-0" for="switch6" data-on-label="Open" data-off-label="Close"></label>
                        @else
                            {{-- 3 --}}
                            <input type="checkbox" id="switch6" class="d-none" switch="primary" disabled="disabled" />
                            <label class="mb-0" for="switch6" data-on-label="Open" data-off-label="Close"></label>
                        @endif
                    @else
                        {{-- 4 --}}
                        <input type="checkbox" id="switch6" class="d-none" switch="primary" disabled="disabled" />
                        <label class="mb-0" for="switch6" data-on-label="Open" data-off-label="Close"></label>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
            <div class="form-row p-lg-4 p-md-2 p-2 mx-0 " style="background-color: #fff;">
                <div class="col-4">
                    <select id="sales_year_select" class="form-control">
                        @for ($i = date('Y'); $i >= 1970; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-4">
                    <select id="sales_month_select" class="form-control">
                        @foreach ($monthList as $mKey => $month)
                            <option value="{{ $mKey + 1 }}">{{ $month }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <br>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
                                                            <div class="form-row p-lg-4 p-md-2 p-2 mx-0 " style="background-color: #fff;">
                                                                <div class="col-12 my-2">
                                                                    <h5><strong>Dear shop owner in selling products We need this information from you !</strong></h5>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-12 col-md-12 col-12">
                                                                    @if (sizeof($address) == 0)
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                            <div class="col-lg-8 col-md-12 col-12">
                                                                                <div class="media">
                                                                                    <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;"
                                                                                        alt="image">
                                                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                        <h5 class="mt-0 mb-1"><strong>Address my shop</strong></h5>
                                                                                        <span style="color: #6A7187;">You haven't filled out the information completely</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-12 col-12 d-flex align-items-center justify-content-end">
                                                                                <a href="{{ url('shop/seller-address') }}" class="w-100">
                                                                                    <button class="btn btn-blue form-control">+
                                                                                        Add address my shop</button>
                                                                                </a>
                                                                            </div>
                                                                        </div>
@else
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                            <div class="col-12">
                                                                                <div class="media">
                                                                                    <img class="mr-3" src="/new_ui/img/shop/icon-success.svg" style="width: 45px;"
                                                                                        alt="image">
                                                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                        <h5 class="mt-0 mb-1"><strong>ที่อยู่ร้านค้า</strong></h5>
                                                                                        <span style="color: #34C38F;">เพิ่มข้อมูลเรียบร้อยแล้ว</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
    @endif
                                                                </div> -->
        <!-- <div class="col-xl-6 col-lg-12 col-md-12 col-12">
                                                                    @if ($shop[0]->bank_number == '')
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                            <div class="col-lg-8 col-md-12 col-12">
                                                                                <div class="media">
                                                                                    <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;"
                                                                                        alt="image">
                                                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                        <h5 class="mt-0 mb-1"><strong>บัญชีธนาคาร</strong></h5>
                                                                                        <span style="color: #6A7187;">You haven't filled out the information completely</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-12 col-12 d-flex align-items-center justify-content-end">
                                                                                <a href="{{ url('shop/addsellerbank') }}" class="w-100">
                                                                                    <button class="btn btn-blue form-control">+
                                                                                        เพิ่มบัญชีธนาคาร</button>
                                                                                </a>
                                                                            </div>
                                                                        </div>
@else
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                            <div class="col-12">
                                                                                <div class="media">
                                                                                    <img class="mr-3" src="/new_ui/img/shop/icon-success.svg" style="width: 45px;"
                                                                                        alt="image">
                                                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                        <h5 class="mt-0 mb-1"><strong>บัญชีธนาคาร</strong></h5>
                                                                                        <span style="color: #34C38F;">เพิ่มข้อมูลเรียบร้อยแล้ว</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
    @endif
                                                                </div> -->

        <!-- <div class="col-xl-6 col-lg-12 col-md-12 col-12">
                                                                    @if (sizeof($kyc) == 0)
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                            <div class="col-lg-8 col-md-12 col-12">
                                                                                <div class="media">
                                                                                    <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg" style="width: 45px;"
                                                                                        alt="image">
                                                                                    <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                        <h5 class="mt-0 mb-1"><strong>ยืนยันตัวตนร้านค้า</strong></h5>
                                                                                        <span style="color: #6A7187;">You haven't filled out the information completely</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-4 col-md-12 col-12 d-flex align-items-center justify-content-end">
                                                                                <a href="{{ url('shop/kyc/create') }}" class="w-100">
                                                                                    <button class="btn btn-blue form-control">ยืนยันตัวตน</button>
                                                                                </a>
                                                                            </div>
                                                                        </div>
@elseif(sizeof($kyc) != 0)
    @if ($kyc[0]->type_kyc == 2 &&
        $kyc[0]->status_first == 1 &&
        $kyc[0]->status_second == 1 &&
        $kyc[0]->status_third == 1 &&
        ($kyc[0]->status_fourth == 1 || $kyc[0]->status_fourth == 2))
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                                <div class="col-12">
                                                                                    <div class="media">
                                                                                        <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                                                            style="width: 45px;" alt="image">
                                                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                            <h5 class="mt-0 mb-1"><strong>ยืนยันตัวตนร้านค้า</strong></h5>
                                                                                            <span style="color: #34C38F;">เพิ่มข้อมูลเรียบร้อยแล้ว</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
@elseif($kyc[0]->type_kyc == 1 &&
    $kyc[0]->status_first == 1 &&
    $kyc[0]->status_second == 1 &&
    $kyc[0]->status_fifth == 1)
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                                <div class="col-12">
                                                                                    <div class="media">
                                                                                        <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                                                            style="width: 45px;" alt="image">
                                                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                            <h5 class="mt-0 mb-1"><strong>ยืนยันตัวตนร้านค้า</strong></h5>
                                                                                            <span style="color: #34C38F;">เพิ่มข้อมูลเรียบร้อยแล้ว</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
@elseif($kyc[0]->type_kyc == 3 && $kyc[0]->status_second == 1)
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                                <div class="col-12">
                                                                                    <div class="media">
                                                                                        <img class="mr-3" src="/new_ui/img/shop/icon-success.svg"
                                                                                            style="width: 45px;" alt="image">
                                                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                            <h5 class="mt-0 mb-1"><strong>ยืนยันตัวตนร้านค้า</strong></h5>
                                                                                            <span style="color: #34C38F;">เพิ่มข้อมูลเรียบร้อยแล้ว</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
@elseif($kyc[0]->status_first == 3 ||
    $kyc[0]->status_second == 3 ||
    $kyc[0]->status_third == 3 ||
    $kyc[0]->status_fourth == 3 ||
    $kyc[0]->status_fifth == 3)
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                                <div class="col-lg-8 col-md-12 col-12">
                                                                                    <div class="media">
                                                                                        <img class="mr-3" src="/new_ui/img/shop/icon-cancel.png"
                                                                                            style="width: 45px;" alt="image">
                                                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                            <h5 class="mt-0 mb-1"><strong>กำลังดำเนินการ</strong></h5>
                                                                                            <span style="color: #6A7187;">ตรวจสอบพบข้อมูลไม่ถูกต้อง</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-12 col-12 d-flex align-items-center justify-content-end">
                                                                                    <a href="{{ url('shop/kyc') }}" class="w-100">
                                                                                        <button class="btn form-control"
                                                                                            style="background-color: #346751; color: #fff;">ตรวจสอบสถานะ</button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
@else
    <div class="row mx-0 p-3 mb-3 rounded8px" style="background-color: #efefef;">
                                                                                <div class="col-lg-8 col-md-12 col-12">
                                                                                    <div class="media">
                                                                                        <img class="mr-3" src="/new_ui/img/shop/icon-alert.svg"
                                                                                            style="width: 45px;" alt="image">
                                                                                        <div class="media-body mb-lg-0 mb-md-2 mb-2">
                                                                                            <h5 class="mt-0 mb-1"><strong>กำลังดำเนินการ</strong></h5>
                                                                                            <span style="color: #6A7187;">รอการตรวจสอบข้อมูลให้ถูกต้อง</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-12 col-12 d-flex align-items-center justify-content-end">
                                                                                    <a href="{{ url('shop/kyc') }}" class="w-100">
                                                                                        <button class="btn form-control"
                                                                                            style="background-color: #346751; color: #fff;">ตรวจสอบสถานะ</button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
    @endif
@else
    @endif
                                                                </div> -->
        <!-- <div class="col-6 mb-2 mt-4" style='object-fit: cover; margin-top: 0rem!important;'>
                                                                                                                                <?php
                                                                                                                                $s_chk_addr = $s_chk_bank = $s_chk_shop = 'x.svg';
                                                                                                                                $s_chk_shop_txt = 'ปิดร้าน';
                                                                                                                                if (sizeof($address) > 0) {
                                                                                                                                    $s_chk_addr = 'check.svg';
                                                                                                                                }
                                                                                                                                if ($shop[0]->bank_number != '') {
                                                                                                                                    $s_chk_bank = 'check.svg';
                                                                                                                                }
                                                                                                                                if ($shop[0]->shop_sts == 'open') {
                                                                                                                                    $s_chk_shop = 'check.svg';
                                                                                                                                    $s_chk_shop_txt = 'เปิดร้าน';
                                                                                                                                }
                                                                                                                                ?>
                                                                                                                                <img class="pb-2" src="/new_ui/img/{{ $s_chk_addr }}" alt="">&nbsp;&nbsp;ที่อยู่ร้านค้า
                                                                                                                                @if (sizeof($address) == 0)
    &nbsp;&nbsp;<a href="{{ url('shop/seller-address') }}" class="blue">>&nbsp;&nbsp;สร้างที่อยู่ร้านค้า</a>
    @endif
                                                <br/>
                                                <img class="pb-2" src="/new_ui/img/{{ $s_chk_bank }}" alt="">&nbsp;&nbsp;เลขบัญชีธนาคาร
                                                                                                                                @if ($shop[0]->bank_number == '')
    &nbsp;&nbsp;<a href="{{ url('shop/addsellerbank') }}" class="blue">>&nbsp;&nbsp;เพิ่มข้อมูลบัญชีธนาคาร</a>
    @endif
                                                <br/>
                                                                                                                               </div>
                                                                                                                               @if (sizeof($address) == 0 || $shop[0]->bank_number == '')
    <div class="col-6 mb-2 mt-4" style='object-fit: cover; margin-top: 0rem!important;'>
                                                                                                                                สถานะร้านค้าของคุณ : <span id="spShopSts"><img class="pb-2" src="/new_ui/img/x.svg" alt="">&nbsp;&nbsp;ข้อมูลยังไม่ครบถ้วน</span> <div
                                                                                                                                class="col-lg-1 col-md-1 col-2 custom-control custom-control custom-switch d-flex justify-content-end">
                                                                                                                                <input type="checkbox" class="custom-control-input" id="switch"
                                                                                                                                style="background-color:#346751;" checked="false" disabled="disabled">
                                                                                                                                <label class="custom-control-label" for="switch"></label>
                                                                                                                               </div>
@else
    <div class="col-6 mb-2 mt-4" style='object-fit: cover; margin-top: 0rem!important;'>
                                                                                                                                สถานะร้านค้าของคุณ : <span id="spShopSts"><img class="pb-2" src="/new_ui/img/{{ $s_chk_shop }}" alt="">&nbsp;&nbsp;{{ $shop[0]->shop_sts == 'open' ? 'เปิดร้าน' : 'ปิดร้าน' }}</span> <div
                                                                                                                                class="col-lg-1 col-md-1 col-2 custom-control custom-control custom-switch d-flex justify-content-end">
                                                                                                                                <input type="checkbox" class="custom-control-input" id="switch"
                                                                                                                                onclick="send_status_shop()" style="background-color:#346751;" {{ $shop[0]->shop_sts == 'open' ? 'checked="checked"' : '' }}>
                                                                                                                                <label class="custom-control-label" for="switch"></label>
                                                                                                                               </div>
    @endif -->
        <!-- </div>
                                                        </div> -->
        <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
            <div class="form-row p-lg-4 p-md-2 p-2 mx-0 " style="background-color: #fff;">
                <div class="col-12 mb-2 mt-4">
                    <h3><strong>My Product</strong></h3>
                </div>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-lg-2 col-md-3 col-6 mb-3 d-flex align-items-stretch">
                            <a href="/product/{{ $product->id }}" class="w-100">
                                <div class="card w-100 list-product rounded8px position-relative"
                                    style="border: unset; cursor: pointer;">
                                    <div class="d-flex align-items-center justify-content-center h-200px">
                                        <img src="{{ '/img/product/' . $product->product_img[0] }}"
                                            onerror="this.onerror=null;this.src='/img/no_image.png'"
                                            style="max-height: 100%;max-width: 100%;" alt="Card image cap">
                                    </div>
                                    <?php
                                    $allpaying = 0;
                                    $rating_person = 0;
                                    ?>
                                    @foreach ($rating_group as $rating)
                                        <?php

                                        if ($rating['product_id'] == $product['id']) {
                                            $allpaying += $rating['rating'];
                                            $rating_person++;
                                        }
                                        //
                                        ?>
                                    @endforeach
                                    <div class="card-body px-lg-3 px-md-2 px-1">
                                        <div class="col-12 mb-2">
                                            <p class="card-text mb-0 text-dot1" style="color: #A7A7A7;"><strong>ร้าน
                                                    {{ $product->shops[0]->shop_name }}</strong></p>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <p class="card-text mb-0 text-dot1"><strong>{{ $product->name }}</strong>
                                            </p>
                                            <p class="card-text mb-0 text-dot2-custom">{!! nl2br($product->description) !!}</p>
                                        </div>
                                        <div class="col-12">
                                            <?php
	                        		if( isset( $product->product_option['price_special'][0] ) ) {
	                        	?>
                                            <h3 class="mb-0 price_reborn_custom">
                                                <small
                                                    style="color: #CCCCCC;font-size:14px;"><strike><i>฿{{ $product->product_option['price'][0] }}</i></strike></small>
                                                <br>
                                                <strong
                                                    style="color: #346751;">฿{{ $product->product_option['price_special'][0] }}</strong>
                                            </h3>
                                            <?php
	                            	} else {
	                            ?>
                                            <br>
                                            <h3 class="mb-0 price_reborn_custom" style="color: #346751;">
                                                <strong>฿{{ $product->product_option['price'][0] }}</strong>
                                            </h3>
                                            <?php
	                            	}
	                            ?>
                                            <!-- <small style="color: #7D7D7D; text-decoration: line-through;">฿400.00</small> -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- <div class="col-custom" style='object-fit: cover;'>
                                                                                                                                        <a href="/product/{{ $product->id }}">
                                                                                                                                         <div class="rounded8px px-2 mb-2" style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                                                                                                                                          <div class="rounded8px d-flex align-items-center justify-content-center h-200px pt-2">
                                                                                                                                           <img src="{{ '/img/product/' . $product->product_img[0] }}" class="rounded8px"
                                                                                                                                           style="max-height: 100%;max-width: 100%;" alt="..."
                                                                                                                                           onerror="this.onerror=null;this.src='/img/no_image.png'">
                                                                                                                                          </div>
                                                                                                                                          <?php
                                                                                                                                          $allpaying = 0;
                                                                                                                                          $rating_person = 0;
                                                                                                                                          ?>
                                                                                                                                          @foreach ($rating_group as $rating)
    <?php

    if ($rating['product_id'] == $product['id']) {
        $allpaying += $rating['rating'];
        $rating_person++;
    }
    //
    ?>
    @endforeach
                                                                                                                                          <div class="px-2">
                                                                                                                                           <h6 class="card-title mb-0 text-left pt-2 text-dots font_head_item" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}" style="font-size: 14px !important;">
                                                                                                                                            <strong>{{ $product->name }}</strong>
                                                                                                                                           </h6>
                                                                                                                                           <h2 class="card-text mb-0 text-left font_price" style="color: #d61900; font-size: 18px !important;">
                                                                                                                                            <strong>฿{{ $product->product_option['price'][0] }}</strong>
                                                                                                                                           </h2>
                                                                                                                                           <h6 class="text-left mb-3 pb-1 d-flex align-items-start" style="height:25px !important;">
                                                                                                                                            @if ($allpaying > 0)
    <?php $starpercen = ($allpaying / ($rating_person * 5)) * 100; ?>
                                                                                                                                            <div class="rating" style=''>
                                                                                                                                             <div class="rating-upper" style="width: {{ $starpercen }}%">
                                                                                                                                              <span style="font-size: 14px;">★★★★★</span>
                                                                                                                                             </div>
                                                                                                                                             <div class="rating-lower">
                                                                                                                                              <span style="font-size: 14px;">★★★★★</span>
                                                                                                                                             </div>
                                                                                                                                            </div>
                                                                                                                                            <span class="mb-0" style="color: #b2b2b2; font-size: 14px;">
                                                                                                                                            ({{ $rating_person }})
    </span>
@else
    <?php $starpercen = 0; ?>
                                                                                                                                            <span class="mb-0" style="color: #b2b2b2;">
                                                                                                                                            {{-- ยังไม่มีคะแนน --}}</span>
    @endif
                                                                                                                                           </h6>
                                                                                                                                          </div>
                                                                                                                                         </div>
                                                                                                                                        </a>
                                                                                                                                       </div> -->
                    @endforeach
                @else
                    <div class="col-12 px-0 text-center py-4" style='background:white'>
                        <img class='pb-2 h-200px' src="/img/no_image.png" style="width: auto !important;"
                            alt="">
                        <p style='color:#919191'>Product not found</p>
                        <!-- <a href="{{ url('shop/myproduct/new') }}"><button class='btn-primary btn btns'
                                                                                >เพิ่มสินค้าใหม่</button></a> -->
                    </div>
                @endif
            </div>
        </div>

    </div>
    </div>

@endsection

@section('style')
    <style>
        .rating {
            display: inline-block;
            unicode-bidi: bidi-override;
            color: #888888;
            font-size: 25px;
            height: 25px;
            width: auto;
            margin: 0;
            position: relative;
            padding: 0;
        }

        .rating-upper {
            color: #f6c100;
            padding: 0;
            position: absolute;
            z-index: 1;
            display: flex;
            top: 0;
            width: 10px;
            left: 0;
            overflow: hidden;
        }

        .rating-lower {
            padding: 0;
            display: flex;
            z-index: 0;
        }

        @media (min-width: 0px) {
            .col-custom {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        @media (min-width: 320px) {
            .col-custom {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .w-custom-img {
                width: 75px;
                height: 60px;
            }

            .w-loader-custom {
                width: 75%;
            }

            .dots .dot {
                width: 15px;
                height: 15px;
                background-color: #3B7369;
            }
        }

        @media (min-width: 576px) {
            .col-custom {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .w-custom-img {
                width: 110px;
                height: 80px;
            }
        }


        @media (min-width: 768px) {
            .col-custom {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }

            .w-custom-img {
                width: 110px;
                height: 80px;
            }

            .w-loader-custom {
                width: 25%;
            }

            .dots .dot {
                width: 30px;
                height: 30px;
            }
        }


        @media (min-width: 992px) {
            .col-custom {
                flex: 0 0 25%;
                max-width: 25%;
            }

            .w-custom-img {
                width: 110px;
                height: 80px;
            }
        }


        @media (min-width: 1200px) {
            .col-custom {
                flex: 0 0 25%;
                max-width: 25%;
            }

            .w-custom-img {
                width: 110px;
                height: 80px;
            }
        }

        @media (min-width: 1600px) {
            .col-custom {
                flex: 0 0 16.666667%;
                max-width: 16.666667%;
            }
        }

        @media (min-width: 1920px) {
            .col-custom {
                flex: 0 0 16.666667%;
                max-width: 16.666667%;
            }
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            var chk_ban = '{{ $shop[0]->approve_shop }}';
            if (chk_ban == 'decline') {
                Swal.fire({
                    icon: 'error',
                    title: 'ร้านค้าของคุณถูกระงับ',
                    text: 'ร้านของคุณถูกระงับการใช้งาน กรุณาติดต่อผู้ดูแลระบบ 02-105-8699 , 081-137-0266 หรือ line @SIAM CANNABIS'
                })
            }
        });

        function send_status_shop() {
            var checkBox = document.getElementById("switch6");

            if (checkBox.checked == true) {
                $.ajax({
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "shop_sts": 'open'
                    },
                    url: "{{ route('status-shop') }}",
                    success: function(json) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'บันทึกข้อมูลสำเร็จ'
                        })
                        location.reload();
                    }

                });
            } else {

                $.ajax({
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "shop_sts": 'close'
                    },
                    url: "{{ route('status-shop') }}",
                    success: function(json) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'ปิดใช้งานสินค้าสำเร็จ'
                        })
                        location.reload();
                    }
                });
            }
        }

        $(async () => {
            let data = {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: '',
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            let config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );

            async function handleFetchSalesChart() {
                try {
                    const selectedYear = $('#sales_year_select').val();
                    const selectedMonth = $('#sales_month_select').val();
                    $.ajax({
                        url: `/seller/statistics/sales`,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            year: selectedYear,
                            month: selectedMonth
                        },
                        success: (response) => {
                            for (const key in response.data) {
                                if (response.data.hasOwnProperty(key)) {
                                    myChart.data.datasets[0].data[key - 1] = response.data[key];
                                }
                            }

                            myChart.update();
                        },
                        error: () => {
                            myChart.data.datasets[0].data = [];
                            myChart.update();
                        }
                    });
                } catch (e) {
                    console.error(e);
                }
            }

            $('body').on('change', '#sales_month_select', async () => {
                await handleFetchSalesChart();
            });

            $('body').on('change', '#sales_year_select', async () => {
                await handleFetchSalesChart();
            });

            await handleFetchSalesChart();
        })
    </script>
@endsection
