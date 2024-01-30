<style>
    .rating {
        width: auto;
    }

    .rating span {
        float: right;
        position: relative;
    }

    .rating span input {
        position: absolute;
        top: 0px;
        left: 0px;
        opacity: 0;
    }

    .rating span label {
        display: inline-block;
        width: 30px;
        height: 30px;
        text-align: center;
        color: #333;
        font-size: 30px;
        margin-right: 2px;
        line-height: 30px;
        border-radius: 50%;
        -webkit-border-radius: 50%;
    }

    .rating span:hover~span label,
    .rating span:hover label,
    .rating span.checked label,
    .rating span.checked~span label {
        color: #F90;
        cursor: pointer;
    }
</style>
<div>
    <div class="boxInv">
        <div class="row py-4 mx-0 mt-3" style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">

            <div class="col-lg-6 col-md-6 col-12">
                <div class="form-row align-items-center">
                    <div class="col-lg-4 col-md-12 col-12 text-lg-left text-md-left text-left mt-lg-0 mt-md-0">
                        <h6 class="mb-lg-0 mb-md-2 mb-lg-2"><strong>{{ $item->shops[0]->shop_name }} </strong></h6>
                    </div>
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- <a href="/shop-user-details?id={{ $item->shop_id }}" class='o-btn form-control d-flex align-items-center justify-content-center'><svg width="1em" style='margin: 6px;' height="1em" viewBox="0 0 16 16"
                                class="bi bi-shop mt-0" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0 15.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zM3.12 1.175A.5.5 0 0 1 3.5 1h9a.5.5 0 0 1 .38.175l2.759 3.219A1.5 1.5 0 0 1 16 5.37v.13h-1v-.13a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.13H0v-.13a1.5 1.5 0 0 1 .361-.976l2.76-3.22z" />
                                <path
                                    d="M2.375 6.875c.76 0 1.375-.616 1.375-1.375h1a1.375 1.375 0 0 0 2.75 0h1a1.375 1.375 0 0 0 2.75 0h1a1.375 1.375 0 1 0 2.75 0h1a2.375 2.375 0 0 1-4.25 1.458 2.371 2.371 0 0 1-1.875.917A2.37 2.37 0 0 1 8 6.958a2.37 2.37 0 0 1-1.875.917 2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.5h1c0 .76.616 1.375 1.375 1.375z" />
                                <path
                                    d="M4.75 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm3.75 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm3.75 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                <path fill-rule="evenodd"
                                    d="M2 7.846V7H1v.437c.291.207.632.35 1 .409zm-1 .737c.311.14.647.232 1 .271V15H1V8.583zm13 .271a3.354 3.354 0 0 0 1-.27V15h-1V8.854zm1-1.417c-.291.207-.632.35-1 .409V7h1v.437zM3 9.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5V15H7v-5H4v5H3V9.5zm6 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4zm1 .5v3h2v-3h-2z" />
                                </svg>ไปที่ร้านค้า</a> -->
                    </div>
                    {{-- <div class="col-lg-4 col-md-6 col-6">
                        <button class='o-btn'>
                            <svg width="1em" style='margin: 6px;' height="1em" viewBox="0 0 16 16"
                                class="bi bi-chat-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                <path
                                    d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>แชทเลย</button>
                    </div> --}}
                </div>
            </div>
            <?php
            $status_name = '';
            $status_note = false;
            if ($item->status == 1) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#F6A100; font-size:15px;'>" . trans('message.pf_to_pay') . '</a>';
            } elseif ($item->status == 2) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#e26e20; font-size:15px;'>" . trans('message.pf_to_ship') . '</a>';
            } elseif ($item->status == 12) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#e26e20; font-size:15px;'>" . trans('message.pf_to_check') . '</a>';
            } elseif ($item->status == 13) {
                $status_name = "<a href='/profile_my_sale_detail/" . $item->inv_ref . (isset($item->inv_no) && $item->inv_no != null ? '-' . $item->inv_no : '') . "' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#e26e20; font-size:15px;'>" . trans('message.pf_to_ship') . '</a>';
            } elseif ($item->status == 21) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#F6A100; font-size:15px;'>" . trans('message.pf_to_pay') . '</a>';
            } elseif ($item->status == 3) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#23C197; font-size:15px;'>" . trans('message.pf_shipped') . '</a>';
            } elseif ($item->status == 4) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#23C197; font-size:15px;'>" . trans('message.pf_to_receive') . '</a>';
            } elseif ($item->status == 43) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#23C197; font-size:15px;'>" . trans('message.pf_wait_receive') . '</a>';
            } elseif ($item->status == 5) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#23C197; font-size:15px;'>" . trans('message.pf_success') . '</a>';
            } elseif ($item->status == 52) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#23C197; font-size:15px;'>" . trans('message.pf_success') . '</a>';
            } elseif ($item->status == 53) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#23C197; font-size:15px;' >" . trans('message.pf_success') . '</a>';
            } elseif ($item->status == 54) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#23C197; font-size: 15px;'>" . trans('message.pf_announced') . '</a>';
            } elseif ($item->status == 6) {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#E00A0A; font-size:15px;'>" . trans('message.pf_to_cancel') . '</a>';
            } else {
                $status_name = "<a href='#' class='badge text-lg-center text-md-center text-left px-0 w-100' style='color:#E00A0A; font-size:15px;'>" . trans('message.pf_cancelled') . '</a>';
            }
            ?>

            <div class="col-lg-6 col-md-6 col-12 d-flex justify-content-end align-items-center px-lg-3 px-md-3 px-0">
                <div class="row align-items-lg-center align-items-md-center align-items-start w-100">
                    <div
                        class="col-lg-8 px-lg-3 px-md-3 px-0 col-md-8 col-12 text-lg-right text-md-left text-left mt-lg-0 mt-md-4 mt-4 bd-r">
                        <!-- <strong>Kerry Express : </strong> -->
                        <input type="hidden" name="shop_id_purchase" value="{{ $item->shop_id }}">
                        <p class="mb-0 " stype="font-size:12px;">{{ trans('message.invoice_no') }} : <span
                                class="inv_ref_show">{{ $item->inv_ref }}@if (isset($item->inv_no) && $item->inv_no != null)
                                    -{{ $item->inv_no }}
                                @endif
                            </span></p>
                    </div>
                    <div class="col-lg-4 px-lg-3 px-md-3 px-0 col-md-4 col-6 mt-lg-0 mt-md-4 mt-0">
                        <?php echo $status_name; ?>
                        @if ($status_note == 13)
                            <div>เนื่องจาก : {{ $item->note }}</div>
                        @endif
                        <!-- <a href='#' class="badge badge-primary">
                            {{ $status_name }}
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
        @foreach ($item->inv_products as $key1 => $item1)
            @if (!isset($item1['type']) || $item1['type'] == '')
                @foreach ($product_all as $item2)
                    @if ($item2->id == $item1['product_id'])
                        <div class="row py-4 mx-0"
                            style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">
                            <div class="col-lg-6 col-md-6 col-9">
                                <div class="row">
                                    <div class="col-12 mb-0 text-left">
                                        <div class="media">
                                            <?php $front_image = $item2->product_img[0]; ?>
                                            @if ($front_image == '0' || $front_image == null)
                                                <img src="/img/no_image.png" style="width: 60px;"
                                                    class="mr-3 rounded8px" alt="...">
                                            @else
                                                <img src="/img/product/{{ $item2->product_img[0] }}"
                                                    style="max-height: 100%;width: 60px; height:
                                    60px; object-fit: cover;"
                                                    class="mr-3 rounded8px" alt="..."
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'">
                                            @endif
                                            <div class="media-body">
                                                <h6 class="mt-0">{{ $item2->name }}</h6>
                                                <!-- have data -->
                                                @if (isset($item1['dis1']))
                                                    <span class="font_size_14px"
                                                        style="color:gray;">{{ $item1['dis1'] }}</span>
                                                @endif


                                                <!-- not have data -->
                                                @if (!isset($item1['dis1']))
                                                    <span class="font_size_14px"
                                                        style="color:gray;">{{ trans('message.no_option') }}</span>
                                                @endif



                                                <!-- have data -->
                                                @if (isset($item1['dis2']))
                                                    <span class="font_size_14px">{{ $item1['dis2'] }}</span>
                                                @endif
                                                <h6 class="mb-0 font_size_14px">
                                                    <strong>x {{ $item1['amount'] }}
                                                    </strong>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>




                            <div class="col-lg-6 col-md-6 col-3 text-right px-4">
                                <h5 class="mb-0 font_size_14px" style='color:#333'>
                                    <strong>฿

                                        {{ $item1['price'] * $item1['amount'] }}
                                    </strong>
                                </h5>
                            </div>

                            @if ($item->status == 6 || $item->status == 99)
                                <div class="col-12">
                                    <div class="row py-4 mx-0">
                                        <div class="col-lg-6 col-md-6 col-12 ml-auto">
                                            <div class="form-row align-items-center">
                                                <div
                                                    class="col-lg-6 col-md-12 col-12 text-lg-right text-md-right text-left mt-lg-0  ml-auto px-0">
                                                    <a href="product_detail/{{ $item2->id }}"
                                                        onclick="if(! confirm('{{ trans('message.confirm_buy_again') }}')) {return false}">
                                                        <button
                                                            class='o-btn-purple mb-2'>{{ trans('message.buy_again') }}</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($item->status == 5 || $item->status == 52 || $item->status == 53 || $item->status == 54)
                                <div class="col-lg-6 col-md-6 col-12 ml-auto">
                                    <div class="form-row py-4">
                                        @if (isset($item->rating_peview))
                                            @php
                                                $arr = [];
                                                $pro_id = explode(',', $item->rating_peview);
                                                foreach ($pro_id as $value) {
                                                    array_push($arr, $value);
                                                }
                                            @endphp
                                            @if (in_array($item2->id, $arr))
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <button class='btn o-btn mb-2' data-toggle="modal"
                                                        data-target-id_rating="{{ $item->id }}"
                                                        data-target-shop_id="{{ $item->shop_id }}"
                                                        data-target-user_id="{{ $item->user_id }}"
                                                        data-target-product_id="{{ $item2->id }}"
                                                        data-target-date="{{ date('Y-m-d H:i:s') }}"
                                                        data-target-status="1" data-target="#ratingmodal"
                                                        disabled>{{ trans('message.rate_order') }}</button>
                                                </div>
                                            @else
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <button class='btn o-btn mb-2' data-toggle="modal"
                                                        data-target-id_rating="{{ $item->id }}"
                                                        data-target-shop_id="{{ $item->shop_id }}"
                                                        data-target-user_id="{{ $item->user_id }}"
                                                        data-target-product_id="{{ $item2->id }}"
                                                        data-target-date="{{ date('Y-m-d H:i:s') }}"
                                                        data-target-status="1"
                                                        data-target="#ratingmodal">{{ trans('message.rate_order') }}</button>
                                                </div>
                                            @endif
                                        @else
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <button class='btn o-btn mb-2' data-toggle="modal"
                                                    data-target-id_rating="{{ $item->id }}"
                                                    data-target-shop_id="{{ $item->shop_id }}"
                                                    data-target-user_id="{{ $item->user_id }}"
                                                    data-target-product_id="{{ $item2->id }}"
                                                    data-target-date="{{ date('Y-m-d H:i:s') }}" data-target-status="1"
                                                    data-target="#ratingmodal">{{ trans('message.rate_order') }}</button>
                                            </div>
                                        @endif
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="row align-items-center">
                                                <div
                                                    class="col-lg-12 col-md-12 col-12 text-lg-right text-md-right text-left mt-lg-0 ">
                                                    <a href="product_detail/{{ $item2->id }}"
                                                        onclick="if(! confirm('Would you like to shop again?')) {return false}">
                                                        <button
                                                            class='o-btn-purple mb-2'>{{ trans('message.buy_again') }}</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- amount for goods --}}
                    @endif
                @endforeach
            @endif

            @if (isset($item1['type']))
                @if ($item1['type'] == 'flashsale')
                    @foreach ($product_flash as $item2)
                        @if ($item2->id == $item1['product_id'])
                            <div class="row py-4 mx-0"
                                style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">
                                <div class="col-lg-6 col-md-6 col-9">
                                    <div class="row">
                                        <div class="col-12 mb-4 text-left">
                                            <div class="media">
                                                <?php $front_image = $item2->product_img[0]; ?>
                                                @if ($front_image == '0' || $front_image == null)
                                                    <img src="/img/no_image.png" style="width: 60px;"
                                                        class="mr-3 rounded8px" alt="...">
                                                @else
                                                    <img src="/img/product/{{ $item2->product_img[0] }}"
                                                        style="max-height: 100%;width: 60px; height:
                                    60px; object-fit: cover;"
                                                        class="mr-3 rounded8px" alt="..."
                                                        onerror="this.onerror=null;this.src='/img/no_image.png'">
                                                @endif
                                                <div class="media-body">
                                                    <h6 class="mt-0">{{ $item2->name }}</h6>

                                                    <!-- have data -->
                                                    @if (isset($item1['dis1']))
                                                        <span class="font_size_14px"
                                                            style="color: gray;">{{ $item1['dis1'] }}</span>
                                                    @endif


                                                    <!-- not have data -->
                                                    @if (!isset($item1['dis1']))
                                                        <span class="font_size_14px"
                                                            style="color:gray">{{ trans('message.no_option') }}</span>
                                                    @endif

                                                    &nbsp;

                                                    <!-- have data -->
                                                    @if (isset($item1['dis2']))
                                                        <span class="font_size_14px">{{ $item1['dis2'] }}</span>
                                                    @endif
                                                    <h6 class="mb-0 font_size_14px">
                                                        <strong>x {{ $item1['amount'] }}
                                                        </strong>
                                                    </h6>
                                                </div>

                                            </div>
                                        </div>

                                        @if ($item->status == 6 || $item->status == 99)
                                            <div class="col-12">
                                                <div class="row py-4 mx-0">
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="row align-items-center">
                                                            <div
                                                                class="col-lg-12 col-md-12 col-12 text-lg-right text-md-right text-left mt-lg-0 ">
                                                                <a href="flash-sale/{{ $item2->id }}"
                                                                    onclick="if(! confirm('Would you like to shop again?')) {return false}">
                                                                    <button
                                                                        class='o-btn-purple mb-2'>{{ trans('message.buy_again') }}</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-3 text-right px-4">
                                    <h5 class="mb-0 font_size_14px" style='color:#333'>
                                        <strong>฿

                                            {{ $item1['price'] * $item1['amount'] }}
                                        </strong>
                                    </h5>
                                </div>
                                @if ($item->status == 5 || $item->status == 52 || $item->status == 53 || $item->status == 54)
                                    <div class="col-lg-6 col-md-6 col-12 ml-auto">
                                        <div class="row py-4 ">
                                            @if (isset($item->rating_peview))
                                                @php
                                                    $arr = [];
                                                    $pro_id = explode(',', $item->rating_peview);
                                                    foreach ($pro_id as $value) {
                                                        array_push($arr, $value);
                                                    }
                                                @endphp
                                                @if (in_array($item2->id, $arr))
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <button class='btn o-btn mb-2' data-toggle="modal"
                                                            data-target-id_rating="{{ $item->id }}"
                                                            data-target-shop_id="{{ $item->shop_id }}"
                                                            data-target-user_id="{{ $item->user_id }}"
                                                            data-target-product_id="{{ $item2->id }}"
                                                            data-target-date="{{ date('Y-m-d H:i:s') }}"
                                                            data-target-status="1" data-target="#ratingmodal"
                                                            disabled>{{ trans('message.rate_order') }}</button>
                                                    </div>
                                                @else
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <button class='btn o-btn mb-2' data-toggle="modal"
                                                            data-target-id_rating="{{ $item->id }}"
                                                            data-target-shop_id="{{ $item->shop_id }}"
                                                            data-target-user_id="{{ $item->user_id }}"
                                                            data-target-product_id="{{ $item2->id }}"
                                                            data-target-date="{{ date('Y-m-d H:i:s') }}"
                                                            data-target-status="1"
                                                            data-target="#ratingmodal">{{ trans('message.rate_order') }}</button>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <button class='btn o-btn mb-2' data-toggle="modal"
                                                        data-target-id_rating="{{ $item->id }}"
                                                        data-target-shop_id="{{ $item->shop_id }}"
                                                        data-target-user_id="{{ $item->user_id }}"
                                                        data-target-product_id="{{ $item2->id }}"
                                                        data-target-date="{{ date('Y-m-d H:i:s') }}"
                                                        data-target-status="1"
                                                        data-target="#ratingmodal">{{ trans('message.rate_order') }}</button>
                                                </div>
                                            @endif
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="row align-items-center">
                                                    <div
                                                        class="col-lg-12 col-md-12 col-12 text-lg-right text-md-right text-left mt-lg-0 ">
                                                        <a href="flash-sale/{{ $item2->id }}"
                                                            onclick="if(! confirm('Would you like to shop again?')) {return false}">
                                                            <button
                                                                class='o-btn-purple mb-2'>{{ trans('message.buy_again') }}</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{-- amount for goods --}}
                        @endif
                    @endforeach
                @endif

                @if ($item1['type'] == 'pre_order')
                    @foreach ($product_pre as $item2)
                        @if ($item2->id == $item1['product_id'])
                            <div class="row py-4 mx-0"
                                style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">
                                <div class="col-lg-6 col-md-6 col-9">
                                    <div class="row">
                                        <div class="col-12 mb-4 text-left">
                                            <div class="media">
                                                <?php $front_image = $item2->product_img[0]; ?>
                                                @if ($front_image == '0' || $front_image == null)
                                                    <img src="/img/no_image.png" style="width: 60px;"
                                                        class="mr-3 rounded8px" alt="...">
                                                @else
                                                    <img src="/img/product/{{ $item2->product_img[0] }}"
                                                        style="max-height: 100%;width: 60px; height:
                                    60px; object-fit: cover;"
                                                        class="mr-3 rounded8px" alt="..."
                                                        onerror="this.onerror=null;this.src='/img/no_image.png'">
                                                @endif
                                                <div class="media-body">
                                                    <h6 class="mt-0">{{ $item2->name }}</h6>

                                                    <!-- have data -->
                                                    @if (isset($item1['dis1']))
                                                        <span class="font_size_14px"
                                                            style="color: gray;">{{ $item1['dis1'] }}</span>
                                                    @endif


                                                    <!-- not have data -->
                                                    @if (!isset($item1['dis1']))
                                                        <span class="font_size_14px"
                                                            style="color:gray">{{ trans('message.no_option') }}</span>
                                                    @endif

                                                    &nbsp;

                                                    <!-- have data -->
                                                    @if (isset($item1['dis2']))
                                                        <span class="font_size_14px">{{ $item1['dis2'] }}</span>
                                                    @endif
                                                    <h6 class="mb-0 font_size_14px">
                                                        <strong>x {{ $item1['amount'] }}
                                                        </strong>
                                                    </h6>
                                                </div>

                                            </div>
                                        </div>

                                        @if ($item->status == 6 || $item->status == 99)
                                            <div class="col-12">
                                                <div class="row py-4 mx-0">
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="row align-items-center">
                                                            <div
                                                                class="col-lg-12 col-md-12 col-12 text-lg-right text-md-right text-left mt-lg-0 ">
                                                                <a href="flash-sale/{{ $item2->id }}"
                                                                    onclick="if(! confirm('Would you like to shop again?')) {return false}">
                                                                    <button
                                                                        class='o-btn-purple mb-2'>{{ trans('message.buy_again') }}</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-3 text-right px-4">
                                    <h5 class="mb-0 font_size_14px" style='color:#333'>
                                        <strong>฿

                                            {{ $item1['price'] * $item1['amount'] }}
                                        </strong>
                                    </h5>
                                </div>
                                @if ($item->status == 5 || $item->status == 52 || $item->status == 53 || $item->status == 54)
                                    <div class="col-lg-6 col-md-6 col-12 ml-auto">
                                        <div class="row py-4 ">
                                            @if (isset($item->rating_peview))
                                                @php
                                                    $arr = [];
                                                    $pro_id = explode(',', $item->rating_peview);
                                                    foreach ($pro_id as $value) {
                                                        array_push($arr, $value);
                                                    }
                                                @endphp
                                                @if (in_array($item2->id, $arr))
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <button class='btn o-btn mb-2' data-toggle="modal"
                                                            data-target-id_rating="{{ $item->id }}"
                                                            data-target-shop_id="{{ $item->shop_id }}"
                                                            data-target-user_id="{{ $item->user_id }}"
                                                            data-target-product_id="{{ $item2->id }}"
                                                            data-target-date="{{ date('Y-m-d H:i:s') }}"
                                                            data-target-status="1" data-target="#ratingmodal"
                                                            disabled>{{ trans('message.rate_order') }}</button>
                                                    </div>
                                                @else
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <button class='btn o-btn mb-2' data-toggle="modal"
                                                            data-target-id_rating="{{ $item->id }}"
                                                            data-target-shop_id="{{ $item->shop_id }}"
                                                            data-target-user_id="{{ $item->user_id }}"
                                                            data-target-product_id="{{ $item2->id }}"
                                                            data-target-date="{{ date('Y-m-d H:i:s') }}"
                                                            data-target-status="1"
                                                            data-target="#ratingmodal">{{ trans('message.rate_order') }}</button>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <button class='btn o-btn mb-2' data-toggle="modal"
                                                        data-target-id_rating="{{ $item->id }}"
                                                        data-target-shop_id="{{ $item->shop_id }}"
                                                        data-target-user_id="{{ $item->user_id }}"
                                                        data-target-product_id="{{ $item2->id }}"
                                                        data-target-date="{{ date('Y-m-d H:i:s') }}"
                                                        data-target-status="1"
                                                        data-target="#ratingmodal">{{ trans('message.rate_order') }}</button>
                                                </div>
                                            @endif
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="row align-items-center">
                                                    <div
                                                        class="col-lg-12 col-md-12 col-12 text-lg-right text-md-right text-left mt-lg-0 ">
                                                        <a href="flash-sale/{{ $item2->id }}"
                                                            onclick="if(! confirm('Would you like to shop again?')) {return false}">
                                                            <button
                                                                class='o-btn-purple mb-2'>{{ trans('message.buy_again') }}</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                @endif
            @endif
        @endforeach

        {{-- Total --}}
        <div class="row py-4 mx-0" style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">
            <div class="col-lg-6 col-md-6 col-12 px-2">
                <div class="row align-items-center mx-0">
                    <div class="col-lg-12 col-md-12 col-12 text-lg-left text-md-left text-right mt-lg-0 font_size_14px mb-2"
                        style="color:#e26e20;">
                        @if ($item->status == 13)
                            <strong>{{ trans('message.remark') }}: {{ $item->note }}</strong>
                        @elseif($item->status == 3)
                            <strong>{{ trans('message.ship_by') }}: {{$item->shipty_name}}<br/>{{ trans('message.track_no') }}: {{ $item->tracking_number }}<br />{{ trans('message.ship_datetime') }}: {{ date('d/m/y H:i', strtotime($item->track_at)) }}</strong>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 px-2">
                <div class="row align-items-center mx-0">
                    <div class="col-lg-8 col-md-8 col-6 text-lg-right text-md-right text-right mt-lg-0 font_size_14px">
                        <strong>{{ trans('message.total_price') }}</strong>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6 text-right">
                        <h5 class="mb-0 font_size_14px" style='color:#333'>
                            <strong>฿ {{ number_format($item->total, 2) }}</strong>
                        </h5>
                    </div>
                </div>
                <div class="row align-items-center mx-0">
                    <div class="col-lg-8 col-md-8 col-6 text-lg-right text-md-right text-right mt-lg-0 font_size_14px">
                        <strong>{{ trans('message.ship_price') }}</strong>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6 text-right">
                        <h5 class="mb-0 font_size_14px" style='color:#333'>
                            <strong>฿ {{ number_format($item->shipping_cost, 2) }}</strong>
                        </h5>
                    </div>
                </div>
                <div class="row align-items-center mx-0">
                    <div class="col-lg-8 col-md-8 col-6 text-lg-right text-md-right text-right mt-lg-0 font_size_14px">
                        <strong>{{ trans('message.product_discount') }}</strong>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6 text-right">
                        <h5 class="mb-0 font_size_14px" style='color:red;'>
                            <strong>฿ {{ number_format($item->disc_amt, 2) }}</strong>
                        </h5>
                    </div>
                </div>
                <div class="row align-items-center mx-0">
                    <div class="col-lg-8 col-md-8 col-6 text-lg-right text-md-right text-right mt-lg-0 font_size_14px">
                        <strong>{{ trans('message.grand_total') }}</strong>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6 text-right">
                        <h5 class="mb-0 font_size_14px" style='color:#3B7369'>
                            @php
                                $grandtotal = $item->total + $item->shipping_cost;
                            @endphp
                            <strong>฿ {{ number_format($grandtotal - $item->disc_amt, 2) }}</strong>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- Total --}}

        @if ($item->status == 1 or $item->status == 13 or $item->status == 21)
            <!-- <form action="/product-payment-repurchase" method="GET"> -->
            <div class="row py-4 mx-0" style="background-color: #fff;">
                <div class="col-lg-6 col-md-6 col-12 order-lg-1 order-md-1 order-2">
                    <div class="form-row align-items-center p-0 m-0">
                        <div class="col-lg-6 col-md-6 col-12">
                            <a href="/profile/cancel/{{ $item->id }}"
                                onclick="if(! confirm('{{ trans('message.confirm_cancel_order') }}')) {return false;}">
                                <button class='o-btn mb-2'>{{ trans('message.cancel_order') }}</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-1">
                    <form action="/product-payment-repurchase" method="GET">
                        <div class="form-row align-items-center p-0 m-0">
                            <div class="col-lg-6 col-md-6 col-12 ml-auto">
                                <input type="hidden" name="inv_ref" value="{{ $item->inv_ref }}">
                                <input type="hidden" name="inv_no" value="{{ $item->inv_no }}">
                                <input type="hidden" name="shop_id" value="{{ $item->shop_id }}">
                                <input type="submit" class='o-btn-purple mb-2 purchase'
                                    value="{{ trans('message.pay') }}"
                                    @if ($item->status != 1 && $item->status != 13) disabled @endif>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-left mt-lg-0 ">
                                <a href="/profile_my_sale_detail/{{ $item->inv_ref }}-{{ $item->inv_no }}"
                                    class='btn o-btn mb-2'>{{ trans('message.order_detail') }}</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- </form> -->
        @elseif($item->status == 2)
            <div class="row py-4 mx-0" style="background-color: #fff;">
                <div class="col-lg-6 col-md-6 col-12 order-lg-1 order-md-1 order-2">
                    <div class="form-row align-items-center p-0 m-0">
                        <div class="col-lg-6 col-md-6 col-12">
                            <button type="button" class="btn o-btn mb-2" data-toggle="modal" data-target="#cancel"
                                data-target-id="{{ $item->id }}">
                                {{ trans('message.cancel_order') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-1">
                    <div class="form-row align-items-center p-0 m-0">
                        <div class="col-lg-6 col-md-6 col-12 ml-auto">
                            <button class='o-btn-purple mb-2' style="opacity: 0.5" disabled>
                                {{ trans('message.order_received') }}
                            </button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-left mt-lg-0 ">
                            <a href="/profile_my_sale_detail/{{ $item->inv_ref }}-{{ $item->inv_no }}"
                                class='btn o-btn mb-2'>{{ trans('message.order_detail') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($item->status == 3 || $item->status == 4 || $item->status == 43)
            <div class="row py-4 mx-0" style="background-color: #fff;">
                <div class="col-lg-6 col-md-6 col-12 order-lg-1 order-md-1 order-2">
                    <div class="form-row align-items-center p-0 m-0">
                        <div class="col-lg-6 col-md-6 col-12">
                            <button type="button" class="btn o-btn mb-2" style="opacity: 0.5" disabled>
                                {{ trans('message.cancel_order') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-1">
                    <div class="form-row align-items-center p-0 m-0">
                        <div class="col-lg-6 col-md-6 col-12 ml-auto">
                            <button class='o-btn-purple mb-2'
                                onclick="confirmProduct({{ $item->id }},{{ $item->total }},{{ $item->shop_id }});">
                                {{ trans('message.order_received') }}
                            </button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-left mt-lg-0  ">
                            <a href="/profile_my_sale_detail/{{ $item->inv_ref }}-{{ $item->inv_no }}"
                                class='btn o-btn mb-2'>{{ trans('message.order_detail') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($item->status == 5 ||
            $item->status == 52 ||
            $item->status == 53 ||
            $item->status == 54 ||
            $item->status == 7)
            <div class="row py-4 mx-0" style="background-color: #fff;">
                <div class="col-lg-6 col-md-6 col-12 order-lg-1 order-md-1 order-2">
                    {{-- <div class="col-lg-6 col-md-6 col-12">
                    <button class='btn o-btn mb-2' data-toggle="modal" data-target="#ratingmodal">{{ trans('message.rate_order') }}</button>
                </div>

                data-target-id_rating="{{ $invs[$key_shop]->id }}"
                data-target-shop_id="{{$invs[$key_shop]->shop_id}}"
                data-target-user_id="{{$invs[$key_shop]->user_id}}" data-target-product_id="{{$product_id}}"
                data-target-date="{{date('Y-m-d H:i:s')}}" data-target-status="1" --}}

                </div>
                <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-1">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-md-6 col-12 ml-auto">
                            <a href="/profile_my_sale_detail/{{ $item->inv_ref }}-{{ $item->inv_no }}"
                                class='btn o-btn mb-2'>{{ trans('message.order_detail') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($item->status == 6 || $item->status == 99)
            <div class="row py-4 mx-0" style="background-color: #fff;">
                <div class="col-lg-6 col-md-6 col-12 order-lg-1 order-md-1 order-2">
                    <div class="col-lg-6 col-md-6 col-12">
                        <!-- <button class='btn o-btn mb-2' disabled >ให้คะแนนร้านค้า</button> -->
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-1">
                    <div class="form-row align-items-center p-0 m-0">
                        <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-left mt-lg-0  ml-auto">
                            {{-- <a href="/shop-user-details?id={{$item->shop_id}}"
                        onclick="if(! confirm('คุณต้องการซื้อสินค้าอีกครั้ง ใช่หรือไม่?')) {return false}">
                        <button class='o-btn-purple mb-2'>{{ trans('message.buy_again') }}</button>
                        </a> --}}
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <a href="/profile_my_sale_detail/{{ $item->inv_ref }}-{{ $item->inv_no }}"
                                class='btn o-btn mb-2'>{{ trans('message.order_detail') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- @elseif($item->status==7)
        <div class="row py-4 mx-0" style="background-color: #fff;">
            <div class="col-lg-6 col-md-6 col-12 order-lg-1 order-md-1 order-2">
                <div class="col-lg-6 col-md-6 col-12">
                    <button class='btn o-btn mb-2' data-toggle="modal" data-target="#ratingmodal">{{ trans('message.view_rating') }}</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-1">
                <div class="row align-items-center p-0 m-0">
                    <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-left mt-lg-0  ">
                        <a href="product/{{$item->id}}"
        onclick="if(! confirm('Would you like to shop again?')) {return false}">
        <button class='o-btn-purple mb-2'>{{ trans('message.buy_again') }}</button>
        </a>
    </div>
    <!-- <div class="col-lg-6 col-md-6 col-12">
        <a href="{{ url('/profile_my_sale_detail') }}" class='btn o-btn mb-2'>รายละเอียดคำสั่งซื้อ</a>
    </div> -->
</div>
</div>
</div> --}}
        @endif
        <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="cancel_modalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="width:350px">
                <div class="modal-content shadow-sm rounded border-0">
                    <div class="modal-header border-0">
                        <h6 class="modal-title black" id="cancel_modalLabel">
                            <strong>{{ trans('message.cancel_order') }}</strong>
                        </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="black" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="get" id="send_cancel2" action="">

                            @csrf
                            <div class="form-group" hidden>
                                <input type="text" class="form-control" name="inv_id" id="inv_id2">
                            </div>

                            <label for=""
                                class="black"><strong>{{ trans('message.bank_name') }}</strong></label>
                            @if (!Auth::user()->bank_id)
                                <div class="col-12 px-0 mb-2">
                                    <a class="btn btn-primary form-control" href="{{ url('profile') }}">+
                                        {{ trans('message.add_bank_account') }}</a>
                                </div>
                            @else
                                <div class="col-12 shadow rounded8px mb-2"
                                    style="background-color: #fff; padding-top: 30px; padding-bottom: 30px; cursor: pointer;">
                                    <div class="row mx-0">
                                        <div class="col-12">
                                            <div class="media d-flex align-items-center">
                                                <img src="/new_ui/img/bank/{{ $user->bankLogo }}"
                                                    class="mr-3 rounded8px" style="width: 70px;" alt="...">
                                                <div
                                                    class="media-body d-flex align-items-start flex-column justify-content-center">
                                                    <h5 class="mt-0 mb-0"><strong>{{ $user->bank }}</strong></h5>
                                                    {{ $user->bankName }} <br>
                                                    {{ $user->bankNumber }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-absolute icon-edit-delete"
                                        style="top: 5px; right: 10px; display: none;">
                                        <i class="fa fa-pencil pr-1 text-main" aria-hidden="true" data-toggle="modal"
                                            data-target="#edit-modal"></i>
                                        <i class="fa fa-trash text-main" aria-hidden="true" data-toggle="modal"
                                            data-target="#delete-modal"></i>
                                    </div>
                                </div>
                                <div class="col-12 px-0">
                                    <div class="form-group">
                                        <label for="typeSelect"
                                            class="black"><strong>{{ trans('message.cancel_reason') }}</strong></label>
                                        <select class="form-control" id="typeSelect" name="typeSelect">
                                            <option value="1">{{ trans('message.cancel_reason1') }}</option>
                                            <option value="2">ต้องการเพิ่ม/{{ trans('message.cancel_reason2') }}
                                            </option>
                                            <option value="3">{{ trans('message.cancel_reason3') }}</option>
                                            <option value="4">{{ trans('message.cancel_reason4') }}</option>
                                            <option value="5">{{ trans('message.cancel_reason5') }}</option>
                                            <option value="6">{{ trans('message.cancel_reason6') }}</option>
                                            <option value="7">{{ trans('message.cancel_reason7') }}</option>
                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                <label for="bank" class="black">{{ trans('message.bank') }}</label>
                                <input type="text" class="form-control" name="bank" id="bank">
                            </div> --}}

                                    <div class="form-group">
                                        <label for="note" class="black">{{ trans('message.detail') }}</label>
                                        <textarea class="form-control" id="note2" name="note" cols="30" rows="10"></textarea>
                                    </div>

                                    {{-- <div class="form-group">
                                <label for="pic" class="black">{{ trans('message.picture') }}</label>
                                <input type="file" class="form-control-file" id="pic2" name="pic">
                            </div> --}}

                                    <div class="form-group">
                                        <button type="button" class="btn btn-grey"
                                            data-dismiss="modal">{{ trans('message.cancel') }}</button>
                                        <button type="submit"
                                            class="btn btn-primary">{{ trans('message.save') }}</button>
                                    </div>

                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- cancel modal -->


        <!-- return product modal -->
        <div class="modal fade" id="cashBack" tabindex="-1" role="dialog" aria-labelledby="cancel_modalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="width:350px">
                <div class="modal-content shadow-sm rounded border-0">
                    <div class="modal-header border-0">
                        <h6 class="modal-title black" id="cancel_modalLabel">{{ trans('message.return_product') }}
                        </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="black" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="get" id="send_cancel3" action="">

                            @csrf
                            <div class="form-group" hidden>
                                <input type="text" class="form-control" name="inv_id" id="inv_id2">
                            </div>
                            <div class="rol-12">
                                <div class="form-group">
                                    <label for="typeSelect"
                                        class="black">{{ trans('message.return_reason') }}</label>
                                    <select class="form-control" id="typeSelect" name="typeSelect">
                                        <option value="11">{{ trans('message.return_reason11') }}</option>
                                        <option value="12">{{ trans('message.return_reason12') }}</option>
                                        <option value="13">{{ trans('message.return_reason13') }}</option>
                                        <option value="14">{{ trans('message.return_reason14') }}</option>
                                        <option value="15">{{ trans('message.return_reason15') }}</option>
                                        <option value="16">{{ trans('message.return_reason16') }}</option>
                                        <option value="17">{{ trans('message.return_reason17') }}</option>
                                        <option value="18">{{ trans('message.return_reason18') }}</option>
                                        <option value="19">{{ trans('message.return_reason19') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="note" class="black">{{ trans('message.detail') }}</label>
                                    <textarea class="form-control" id="note2" name="note" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="pic" class="black">{{ trans('message.picture') }}</label>
                                    <input type="file" class="form-control-file" id="pic2" name="pic">
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-grey"
                                        data-dismiss="modal">{{ trans('message.cancel') }}</button>
                                    <button type="submit"
                                        class="btn btn-primary">{{ trans('message.save') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- return product modal -->

        <div class="modal fade" id="ratingmodal" tabindex="-1" role="dialog" aria-labelledby="rating_modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content shadow-sm rounded border-0">
                    <div class="modal-header border-0">
                        <h6 class="modal-title black" id="rating_modalLabel">
                            <strong>{{ trans('message.rate_order') }}</strong>
                        </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="black" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-0 ">
                        <form method="post" action="{{ url('rating') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group" hidden>
                                        <input type="text" class="form-control" name="invs_id" id="invs_id">
                                        <input type="text" class="form-control" name="shop_id" id="shop_id">
                                        <input type="text" class="form-control" name="user_id" id="user_id">
                                        <input type="text" class="form-control" name="product_id"
                                            id="product_id">
                                        <input type="text" class="form-control" name="date" id="date">
                                        <input type="text" class="form-control" name="status" id="status">
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-start mb-2">
                                    <div class="rating">
                                        <span><input type="radio" name="rating" id="str5"
                                                value="5"><label class="fa fa-star"
                                                for="str5"></label></span>
                                        <span><input type="radio" name="rating" id="str4"
                                                value="4"><label class="fa fa-star"
                                                for="str4"></label></span>
                                        <span><input type="radio" name="rating" id="str3"
                                                value="3"><label class="fa fa-star"
                                                for="str3"></label></span>
                                        <span><input type="radio" name="rating" id="str2"
                                                value="2"><label class="fa fa-star"
                                                for="str2"></label></span>
                                        <span><input type="radio" name="rating" id="str1"
                                                value="1"><label class="fa fa-star"
                                                for="str1"></label></span>
                                    </div>
                                </div>
                                <div class="col-12">

                                    <!-- <div class="form-group">
                                <label for="typeSelect" class="black"><strong>คะแนน</strong></label>
                                <select class="form-control" id="score" name="rating">
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div> -->
                                    <div class="form-group">
                                        <label for="note"
                                            class="black"><strong>{{ trans('message.opinion') }}</strong></label>
                                        <textarea class="form-control" id="note" name="comment" cols="30" rows="5"
                                            placeholder="{{ trans('message.write_opinion') }}"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pic"
                                            class="black"><strong>{{ trans('message.picture') }}</strong></label>
                                        <div class="file-loading">
                                            <input id="file-1" type="file" name="file" multiple
                                                class="file" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('message.cancel') }}</button>
                                        <button type="submit"
                                            class="btn btn-primary ml-2">{{ trans('message.save') }}</button>
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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/js/app.js"></script>
<script type="text/javascript">
    function confirmProduct(inv_id, total_price, shop_id) {
        // console.log(inv_id)

        $.ajax({
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "invs_id": inv_id,
                "total_price": total_price,
                "shops_id": shop_id
            },
            url: "confirmProduct",
            success: function() {
                // console.log(json);
                alert("{{ trans('message.confirm_receive_order') }}")
                location.reload();
            }
        });
    }

    $(document).ready(function() {


        $("#cancel").on("shown.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');
            $('#inv_id2').val(id);
            $('#send_cancel2').attr('action', '/profile/cancel/content/' + id);
        });

        $("#cashBack").on("shown.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');
            $('#inv_id2').val(id);
            $('#send_cancel3').attr('action', '/profile/cancel/content/' + id);
        });

        $("#ratingmodal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id_rating');
            var shop_id = $(e.relatedTarget).data('target-shop_id');
            var user_id = $(e.relatedTarget).data('target-user_id');
            var product_id = $(e.relatedTarget).data('target-product_id');
            var date = $(e.relatedTarget).data('target-date');
            var status = $(e.relatedTarget).data('target-status');


            $('#invs_id').val(id);
            $('#shop_id').val(shop_id);
            $('#user_id').val(user_id);
            $('#product_id').val(product_id);
            $('#date').val(date);
            $('#status').val(status);

        });



    });
</script>
<script>
    $(document).ready(function() {
        // Check Radio-box
        $(".rating input:radio").attr("checked", false);

        $('.rating input').click(function() {
            $(".rating span").removeClass('checked');
            $(this).parent().addClass('checked');
        });

        $('input:radio').change(
            function() {
                var userRating = this.value;

            });
    });
</script>
