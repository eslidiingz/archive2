@extends('layouts.default')
@section('style')

<style>
    .swiper-container {
        width: 100%;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #c75ba1;
        background-color: #fafaff;
        border: 1px solid #23c197;
        border-radius: 5px;
    }

    .nav-tabs .nav-link:hover {
        color: #c75ba1;
        background-color: #fafaff;
        border: 1px solid #23c197;
        border-radius: 5px;
    }

    .nav-tabs .nav-link {
        color: #c75ba1;
        background-color: #fafaff;
        border-radius: 5px;
        width: 100%;
    }

    .nav-tabs {
        border: unset;
    }

    .round {
        position: relative;
    }

    .round label {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 50%;
        cursor: pointer;
        height: 28px;
        left: 0;
        position: absolute;
        top: 0;
        width: 28px;
    }

    .round label:after {
        border: 2px solid #fff;
        border-top: none;
        border-right: none;
        content: "";
        height: 6px;
        left: 7px;
        opacity: 0;
        position: absolute;
        top: 8px;
        transform: rotate(-45deg);
        width: 12px;
    }

    .round input[type="checkbox"] {
        visibility: hidden;
    }

    .round input[type="checkbox"]:checked+label {
        background-color: #66bb6a;
        border-color: #66bb6a;
    }

    .round input[type="checkbox"]:checked+label:after {
        opacity: 1;
    }

    /* width */
    .modal-body ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    .modal-body ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    .modal-body ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    .modal-body ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .bg-demo-custom {
        background-color: rgb(0, 0, 0, 0.5) !important;
    }
</style>

@endsection

@section('content')
<div class="container">
    <div class="row d-lg-block d-md-none d-none">
        <div class="col-12 p-0 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: unset;">
                    <li class="breadcrumb-item"><a href="#" style="color: #1947e3;">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ร้านค้า</li>
                </ol>
            </nav>
        </div>
    </div>
    @if(session('messageError'))
    <div class="row">
        <div class="col-12 my-4">
            <div class="alert alert-danger" role="alert">
                การแจ้งเตือน : {{ session('messageError') }}
            </div>
        </div>
    </div>
    @endif
    <form action="/product-payment/visa" method="POST" class="form_pay" enctype="multipart/form-data">
        @csrf
        @foreach($shop as $shop_id)
        <input type="hidden" name="shop_id[]" class="shop_id" value="{{ $shop_id->id }}">

        <div class="row p-4 rounded8px" style="background-color: #fff;">
            <div class="col-12 px-lg-3 px-md-3 px-0">
                <h4><strong style="color: #346751;">สินค้า</strong></h4>
            </div>
            <div class="col-12 px-lg-3 px-md-3 px-0">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 d-flex  flex-column justify-content-start">
                        <h5 class="mb-0">{{ $shop_id->shop_name }}</h5>
                        <p class="mb-0" stype="font-size:12px;">หมายเลขอ้างอิง : {{ $inv_ref }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 ml-auto d-flex flex-row justify-content-end">
                        <div class="btn-outline-c45e9f btn form-control mb-2 mr-2"><a href="/shop-user-details?id={{$shop_id->id}}" style="color : #c45e9f"><img src="new_ui/img/icon-shop.svg" style="width: 20px;" class="mr-2" alt="">ไปที่ร้านค้า</a></div>
                        {{-- <div class="btn-outline-c45e9f btn form-control"><img src="new_ui/img/icon-chat.svg"
                                style="width: 20px;" class="mr-2" alt="">แชทเลย</div> --}}
                    </div>
                </div>
            </div>
            <div class="col-12 px-lg-3 px-md-3 px-0">
                <table class="table-bordered">
                    <tbody>
                        @foreach($payment as $key => $pay)
                        {{-- {{ dd($pay) }} --}}

                        {{-- @if($shop_id->id == $pay['shop_id']) --}}
                        <input type="hidden" name="type" value="{{ $pay['type'] }}">
                        <tr>
                            <td scope="row" class=" text-right" data-label="สินค้าทั้งหมด">
                                <div class="row">
                                    <div class="col-12 text-lg-left text-md-right text-sm-right">
                                        <div class="media">

                                            <img src="/img/product/user.svg" style="width: 60px;" class="mr-3 rounded8px" alt="" onerror="this.onerror=null;this.src='/img/no_image.png'">

                                            <div class="media-body">
                                                <h6 class="mt-0"><strong>{{$product[0]->name}}
                                                    </strong></h6>

                                                {{-- Details Products --}}
                                                {{-- @if($pay['dis1'] != null && $pay['dis2'] != null)
                                                {{ $pay['dis1']}} , {{ $pay['dis2'] }}
                                                @endif
                                                @if($pay['dis1'] != null)
                                                {{ $pay['dis1'] }}
                                                @endif
                                                @if($pay['dis2'] != null)
                                                {{ $pay['dis2'] }}
                                                @endif --}}
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="width200 text-right" data-label="ราคา/จำนวน">
                                <div class="row ">
                                    <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                        <h4 class="mb-0"><strong style="color: #346751;">฿ {{ $pay['price'] }}</strong>
                                        </h4>
                                    </div>
                                    {{-- <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                            <h6 class="mb-0" style="color: #919191;">฿ 1140 <span
                                                    style="color: #000;">(-37%)</span></h6>
                                        </div> --}}
                                </div>
                            </td>
                            <td class="width200 " data-label="จำนวน">
                                <div class="row">
                                    <div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
                                        <h6 class="mb-0"><strong>x {{ $pay['amount'] }} </strong></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="width200 " data-label="ราคารวม">
                                <div class="row">
                                    <div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
                                        @php
                                        $total = $pay['amount'] * $pay['price'];
                                        @endphp
                                        <h4 class="mb-0"><strong style="color: #346751;">฿
                                                {{ $pay['amount'] * $pay['price'] }}</strong></h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- @endif --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row p-4 rounded8px mb-3" style="background-color: #fafaff;">
            <div class="col-lg-6 col-md-6 col-12 px-lg-3 px-md-3 px-0" style="border-right: 1px solid #efefef;">
                <div class="row">
                    <div class="col-12 ">
                        <h4><strong style="color: #346751;">ข้อความถึงผู้ขาย</strong></h4>
                    </div>
                    <div class="col-12 mb-4">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 px-lg-3 px-md-3 px-0 div_shipping">
                <div class="row">
                    <div class="col-12">

                        <h4 class="form-inline"><strong style="color: #346751;">การจัดส่ง <p class="detention" attr-id="{{ $shop_id->id }}" style="color: red">*กรุณาเลือกรูปแบบการจัดส่ง</p>
                            </strong></h4>
                    </div>
                    <div class="col-12 d-flex justify-content-between">

                        <input type="hidden" name="shipping_id[{{ $shop_id->id }}][]" attr-id="{{ $shop_id->id }}" class="shipping_id" value="6">
                        <h6 class="mb-0">
                            <span class="shipping_font" attr-id="{{ $shop_id->id }}">รับสินค้าเลย</span>
                            <span attr-id="{{ $shop_id->id }}" class="cal_shipping">฿ 0.00</span>
                        </h6>

                        {{-- <a href="#" class="btn_shipping" data-target="#change_shippings{{ $shop_id->id }}"
                        data-toggle="modal">
                        <h6 class="mb-0 chang_shipping" style="color: #1947e3; text-decoration: underline;">เปลี่ยน
                        </h6>
                        </a> --}}





                    </div>
                </div>
            </div>
        </div>
        @endforeach






        {{-- --------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
        <input type="hidden" name="inv_ref" value="{{ @$invs[0]->inv_ref }}">
        <input type="hidden" name="user_name" value="{{ @$address_default->name }} {{ @$address_default->surname }}">
        <input type="hidden" name="tel_address" value="{{ @$address_default->tel }}">
        <input type="hidden" name="address" value="{{ @$address_default->address1 }} {{ @$address_default->add }} {{ @$address_default->district }} {{ @$address_default->county }} {{ @$address_default->city }} {{ @$address_default->zipcode }}">


        {{-- <div class="row p-4 rounded8px mb-3 no_address" style="background-color: #fff;">
            <div class="col-12 mb-2 px-lg-3 px-md-3 px-0">
                <h4><strong style="color: #346751;">ที่อยู่ในการจัดส่ง<p class="address_detention" style="color:red">
                            *กรุณาระบุที่อยู่ในการจัดส่ง</p></strong></h4>
            </div>
            <div class="col-lg-10 col-md-10 col-12 px-lg-3 px-md-3 px-0">
                <div class="row">
                    <input type="hidden" name="id_address" value="{{ @$address_default->id }}">
        <div class="col-lg-5 col-md-6 col-12">
            <h6><strong>ชื่อ - นามสกุล : </strong><span id="shipping_name">
                    {{ @$address_default->name }} {{ @$address_default->surname }}</span></h6>
            <h6><strong>เบอร์โทรศัพท์ : </strong> (+66) <span id="shipping_tel">
                    {{ @$address_default->tel }}</span></h6>
        </div>
        <div class="col-lg-5 col-md-6 col-12">
            <h6 style="line-height: 25px;"><strong>ที่อยู่ : </strong><span id="shipping_address">
                    {{ @$address_default->address1 }} {{ @$address_default->add }}
                    {{ @$address_default->district }} {{ @$address_default->county }}
                    {{ @$address_default->city }}
                    {{ @$address_default->zipcode }} </span>

                @if(@$address_default->status == 1)
                <span id="default" style="color: #346751;">
                    (ที่อยู่หลัก)
                </span>
                @endif
            </h6>
        </div>
</div>
</div>
<div class="col-lg-2 col-md-2 col-12 d-flex justify-content-end px-lg-3 px-md-3 px-0">
    <a href="#" data-toggle="modal" data-target="#change_address">
        <h6 class="mb-0" style="color: #1947e3; text-decoration: underline;">เปลี่ยน</h6>
    </a>
</div>
</div> --}}
{{-- ProductRecive --}}
<div class="row p-4 rounded8px mb-3 no_address" style="background-color: #fff;">
    <div class="col-12 mb-2 px-lg-3 px-md-3 px-0">
        <h4><strong style="color: #c75ba1;">ที่อยู่ในการจัดส่ง<p class="address_detention" style="color:red">
                    *กรุณาระบุที่อยู่ในการจัดส่ง</p></strong></h4>
    </div>
    <div class="col-lg-10 col-md-10 col-12 px-lg-3 px-md-3 px-0 ">
        <div class="row">
            <div class="d-flex justify-content-center">
                <input type="hidden" name="id_address" value="รับสินค้าเลย">
                <h6><strong>รับสินค้าเลย</strong></span></h6>
                <input type="hidden" name="receive" value="{{ $receive_product }}">
            </div>
            {{-- <div class="col-lg-5 col-md-6 col-12">
                        <h6><strong>ชื่อ - นามสกุล : </strong><span id="shipping_name">
                                {{ @$address_default->name }} {{ @$address_default->surname }}</span></h6>
            <h6><strong>เบอร์โทรศัพท์ : </strong> (+66) <span id="shipping_tel">
                    {{ @$address_default->tel }}</span></h6>
        </div>
        <div class="col-lg-5 col-md-6 col-12">
            <h6 style="line-height: 25px;"><strong>ที่อยู่ : </strong><span id="shipping_address">
                    {{ @$address_default->address1 }} {{ @$address_default->add }}
                    {{ @$address_default->district }} {{ @$address_default->county }}
                    {{ @$address_default->city }}
                    {{ @$address_default->zipcode }} </span>

                @if(@$address_default->status == 1)
                <span id="default" style="color: #c75ba1;">
                    (ที่อยู่หลัก)
                </span>
                @endif
            </h6>
        </div> --}}
    </div>
</div>
{{-- <div class="col-lg-2 col-md-2 col-12 d-flex justify-content-end px-lg-3 px-md-3 px-0">
                <a href="#" data-toggle="modal" data-target="#change_address">
                    <h6 class="mb-0" style="color: #1947e3; text-decoration: underline;">เปลี่ยน</h6>
                </a>
            </div> --}}
</div>


{{-- --------------------------------------------------------------------------------------------------------------------------------------------------------- --}}







{{-- Modal Change Addres --}}
{{-- <div class="modal fade" id="change_address">
            <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class='col-12 position-relative' style='text-align:center'>
                            <strong>
                                <h4 class="mb-0"><strong>เปลี่ยนสถานที่ส่ง</strong></h4>
                            </strong>
                            <button type="button" class="close position-absolute" style="right: 4px; top: -8px;"
                                data-dismiss="modal">&times;</button>
                        </div>
                    </div>
                    <div class="modal-body address_add_modal">
                        @foreach($address as $item)
                        <div class="col-lg-12 col-12 px-2 chkmodal">
                            <div class="col-lg-12 col-md-12 col-12 px-0 mt-0 o-bg-box">
                                <div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 pb-0">
                                        <div class="row">
                                            <div class="col-lg-12 address_pay">
                                                <div class="form-row">
                                                    <input class="form-check-input change_addtess" type="radio"
                                                        name="address" id=""
                                                        value="{{ $item->id }}" data-id="{{$item->id}}"
data-name="{{ $item->name }}
{{ $item->surname }}" data-tel="{{ $item->tel }}"
data-status="{{ $item->status }}" data-address="{{ $item->address1 }} {{ $item->item }}
{{ $item->district }} {{ $item->county }} {{ $item->city }}
{{ $item->zipcode }}" @if($item->status == 1)
checked
@endif>
<div class=" col-lg-3 col-md-3 col-8 text-md-right text-lg-left order-1 order-md-1 order-lg-1">
    <strong>ชื่อ - นามสกุล : </strong>
</div>
<div class="col-lg-6 col-md-6 col-7  pr-lg-0 pr-md-0 order-3 order-md-2 order-lg-2">
    <input readonly type="text" value="{{ $item->name }} {{ $item->surname }}" class="rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ชื่อ - นามสกุล" style="background-color: white; border: none;">
</div>
<div class="col-lg-3 col-md-2 col-5 order-4 order-md-3 order-lg-3">
    @if($item->status > 0)
    <a style="color:#c75ba1"><b>(ที่อยู่หลัก)</b></a>
    @endif
</div>
</div>
<div class="form-row">
    <div class=" col-lg-3 col-md-3 col-12 text-md-right text-lg-left">
        <strong>เบอร์โทรศัพท์ : </strong>
    </div>
    <div class="col-lg-9 col-md-9 col-12">
        <input readonly type="text" value="{{ $item->tel }}" class="rounded8px py-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="(+66) 081-441-9585" style="background-color: white; border: none;">
    </div>
</div>
<div class="form-row">
    <div class="col-lg-3 col-md-3 col-12 text-md-right text-lg-right" style="padding-right: 17px;">
        <strong>ที่อยู่ : </strong>
    </div>
    @php
    $space = " ";
    $textsum
    =$item->address1.$space.$item->item.$space.$item->district.$space.$item->county.$space.$item->city.$space.$item->zipcode;
    @endphp
    <div class="col-lg-9 col-md-9 col-12">
        <textarea readonly class="" rows="2" style="background-color: white; border: none;width:100%;resize: none">{{ $textsum }}</textarea>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endforeach
</div>
<div class="modal-footer border-0 text-center">
    <div class="col-12">
        <button type="button" class="btn btn-outline-primary form-control add_address" data-toggle="modal" data-target="#add_address">เพิ่มที่อยู่</button>
    </div>
    <div class="col-12">
        <div class="form-row">
            <div class="col-6"><button type="button" class="form-control btn_cancel_address" data-dismiss="modal" style="color:white;background:#b2b2b2">ยกเลิก</button>
            </div>
            <div class="col-6 ">
                <button class="form-control change_address_btn" type="button" style="color:white;background:#c45e9f">ตกลง</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div> --}}

{{-- Modal Shippings --}}




{{-- Modal Shippings --}}
{{-- @foreach ($ship as $shipLoop)
        <div class="modal fade" id="change_shippings{{ $shipLoop->shop_id }}" attr-id="{{ $shipLoop->shop_id}}"
role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">รูปแบบการส่ง</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @php
            $index = explode(',',$shipLoop->ship_default);
            @endphp
            @forelse ($index as $shipStoreId)
            <div class="card ">
                <button class="btn btn-primary shipping_btn" data-shipping="{{ $shipStoreId }}" type="button" value="{{ $ship_type[$shipStoreId]->shipty_id }}" id="{{ $ship_type[$shipStoreId]->shipping_api }}">
                    <h5>{{ $ship_type[$shipStoreId]->shipty_name }}</h5>
                </button>
            </div>
            @empty
            <div class="card ">
                <button class="btn btn-primary shipping_btn" type="button" data-shipping="3" value="3">
                    <h5>Thailand Post - Registered Mail</h5>
                </button>
            </div>
            @endforelse
        </div>
    </div>
</div>
</div>
@endforeach --}}
{{-- Modal Shippings --}}






{{-- Modal Change Addres --}}




<div class="row p-4 rounded8px mb-3" style="background-color: #fff;">
    <div class="col-12 mb-2 px-lg-3 px-md-3 px-lg-3 px-md-3 px-0">
        <h4><strong style="color: #c75ba1;">วิธีชำระเงิน</strong></h4>
    </div>
    <div class="col-12 px-lg-3 px-md-3 px-0">
        <div class="form-group d-lg-none d-md-none d-block">
            <select class="form-control" id="select-submenu">
                <option value="4">โอนเงินธนาคาร</option>
                <option value="3">โอนเงินด้วย QR โค้ด</option>
                <option value="2">บัตรเครดิต/บัตรเดบิต <span class="text-danger" style="font-size: 12px;">(*
                        คิดค่าธรรมเนียม 3%)</span></option>
                <option value="1">Multi Pay</option>
            </select>
        </div>
        <div class="d-lg-block d-md-block d-none">
            <ul class="nav nav-tabs row" id="myTab" role="tablist">
                <li class="nav-item col-lg-3  col-md-6 col-6 mb-md-4" id="select_pay_bank" role="presentation">
                    <a class="nav-link active d-flex justify-content-center align-items-center flex-column py-4" id="list-4-tab" data-toggle="tab" href="#list-4" role="tab" aria-controls="list-4" aria-selected="false">
                        <img src="new_ui/img/payment/payment-4.png" style="width: 100px;" alt="">
                        <h6 class="mb-0 text-center mt-2">โอนเงินธนาคาร</h6>
                        <h6 class="mb-0 text-center" style="color: #23c197;">รอยืนยัน 45 นาที หลังชำระเงิน</h6>
                    </a>
                </li>
                <li class="nav-item col-lg-3  col-md-6 col-6 mb-md-4" id="select_pay_mobile" role="presentation">
                    <a class="nav-link d-flex justify-content-center align-items-center flex-column py-4" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab" aria-controls="list-3" aria-selected="false">
                        <img src="new_ui/img/payment/payment-3.png" style="width: 100px;" alt="">
                        <h6 class="mb-0 text-center mt-2">โอนเงินด้วย QR โค้ด</h6>
                        <h6 class="mb-0 text-center" style="color: #23c197;">รอยืนยัน 45 นาที หลังชำระเงิน</h6>
                    </a>
                </li>
                <li class="nav-item col-lg-3  col-md-6 col-6 mb-md-4" id="select_pay_credit" role="presentation">
                    <a class="nav-link d-flex justify-content-center align-items-center flex-column py-4" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab" aria-controls="list-2" aria-selected="false">
                        <img src="new_ui/img/payment/payment-2.png" style="width: 100px;" alt="">
                        <h6 class="mb-0 text-center mt-2">บัตรเครดิต/บัตรเดบิต</h6>
                        <h6 class="mb-0 text-center" style="color: #23c197;">SECURITY GUARANTEED</h6>
                        <span class="text-danger position-absolute" style="font-size: 12px; bottom: 5px; left: 50%; transform: translate(-50%);"><strong>(*
                                คิดค่าธรรมเนียม 3%)</strong></span>
                    </a>
                </li>
                <li class="nav-item col-lg-3  col-md-6 col-6 mb-md-4 position-relative" id="select_pay_wallet" role="presentation">
                    <a class="nav-link d-flex justify-content-center align-items-center flex-column py-4" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="false">
                        <img src="new_ui/img/payment/MultiPay_Logo.png" style="width: 150px;" alt="">
                        <h6 class="mb-0 text-center mt-2">Multi Pay</h6>
                        <h6 class="mb-0 text-center" style="color: #23c197;">ฟรีค่าธรรมเนียม</h6>

                    </a>
                </li>

            </ul>
        </div>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade " id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
                <div class="form-group" hidden>
                    <input type="checkbox" name="bank" value="wallet">
                </div>
                @include('pages.payment-page.payment-t10')
            </div>
            <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
                <div class="form-group" hidden>
                    <input type="checkbox" name="bank" value="credit">
                </div>
                @include('pages.payment-page.payment-credit')
            </div>
            <div class="tab-pane fade " id="list-3" role="tabpanel" aria-labelledby="list-3-tab">
                <div class="form-group" hidden>
                    <input type="checkbox" name="bank" value="mobilebanking">
                </div>
                @include('pages.payment-page.payment-bank1')
            </div>
            <div class="tab-pane fade show active" id="list-4" role="tabpanel" aria-labelledby="list-4-tab">
                <div class="form-group" hidden>
                    <input type="checkbox" name="bank" value="bank" checked>
                </div>
                @include('pages.payment-page.payment-bank2')
            </div>

        </div>
    </div>
</div>

{{-- <div class="row px-4 pt-4 pb-0" style="background-color: #fff; border-radius: 8px 8px 0 0;">
            <div class="col-lg-6 col-md-6 col-12 mb-2">
                <h4><strong style="color: #c75ba1;">เหรียญ T10</strong></h4>
                <input type="text" class="form-control" id="exampleCoin" aria-describedby="emailHelp">
            </div>
            <div class="col-lg-6 col-md-6 col-12 mb-2">
                <h4><strong style="color: #c75ba1;">คูปอง / ส่วนลดของฉัน</strong></h4>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="กรุณาเลือกโค้ด"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text btn-c75ba1" style="border-color: #c75ba1;"
                            id="basic-addon2">เลือกโค้ดส่วนลด</span>
                    </div>
                </div>
            </div>
        </div> --}}
@php

@endphp



<div class="row p-4" style="background-color: #fafaff; border-radius: 0 0 8px 8px;">
    <div class="col-lg-3 col-md-6 col-12 ml-auto px-lg-3 px-md-3 px-0">
        <div class="row">
            <div class="col-6">
                <h6 class="mb-2">ยอดรวมสินค้า</h6>
                <h6 class="mb-2">ส่วนลด</h6>
                <h6 class="mb-2">ค่าส่ง</h6>
                <h6 class="mb-2 d-none complex">ค่าธรรมเนียม</h6>
                <h6 class="mb-2">รวมราคาทั้งหมด</h6>
            </div>
            <div class="col-6 text-right">
                <h6 class="mb-2 ">฿ {{ $total_price }}</h6>
                {{-- <h6 class="mb-2" style="color: #c40000;">-100</h6> --}}
                <h6 class="mb-2" style="color: gray;">0</h6>
                {{-- <h6 class="mb-2">฿ 60</h6> --}}
                <h6 class="mb-2 sum_shipping" style="color: gray;">฿ <span>0</span></h6>
                <h6 class="mb-2 d-none complex" id="showComplex" style="color: gray;">
                    ฿ <span>{{ $total_price*3/100 }}</span>
                </h6>
                <h4 class="mb-2 total_price"><strong style="color: #c75ba1;">฿ <span>{{ $total_price }}</span></strong>
                </h4>
                <input type="hidden" name="total_price" value="{{ $total }}">
            </div>
        </div>
    </div>
    <div class="col-12 px-lg-3 px-md-3 px-0">
        <hr class="w-100">
    </div>
    <div class="col-lg-2 col-md-3 col-12 ml-auto px-lg-3 px-md-3 px-0">
        <button type="button" class="btn btn-c75ba1 form-control btn_product">
            สั่งสินค้า
        </button>
    </div>
</div>

</div>


<!-- Modal -->
<div class="modal fade" id="SendVisa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header pb-0" style="border-bottom: unset;">
                <div class="col-12 position-relative">
                    <h5 class="modal-title text-center " id="exampleModalLabel"><strong>ยืนยันการชำระเงิน</strong>
                    </h5>
                    <button type="button" class="close position-absolute" style="right: 5px; top: 0px;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row px-2 ">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">จำนวนที่ต้องชำระ</h6>
                    </div>
                    <div class="col-6 text-right">
                        <h5 class="mb-0 total_price">
                            <strong style="color: #ca63a6;">
                                ฿ <span>{{ $total_price }}</span>
                            </strong>
                        </h5>
                    </div>
                    {{-- <div class="col-12">
                        <hr class="w-100">
                    </div> --}}
                    {{-- <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">ช่องทางการชำระเงิน</h6>
                    </div>
                    <div class="col-6 text-right">
                        <div class="form-group mb-0">
                            <select class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">T10 วอลเล็ท</option>
                                    <option value="2">บัตรเครดิต/บัตรเดบิต</option>
                                    <option value="3">โมบายแบงค์กิ้ง</option>
                                    <option value="4">โอนเงินธนาคาร</option>
                                </select>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="modal-footer pt-0" style="border-top: unset;">
                <div class="form-row w-100">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary form-control" data-dismiss="modal">กลับ</button>
                    </div>
                    <a class="col-6" href="#" id="comfirm_buy">
                        <!-- <button type="button" class="btn btn-c75ba1 form-control btn_submit">ชำระ</button> -->
                        <button type="button" class="btn btn-c75ba1 form-control">ชำระ</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</form>



{{-- Modal Add Address Button --}}
{{-- <div class="modal fade" id="add_address" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-12 position-relative' style='text-align:center'>
                    <strong>
                        <h4 class="mb-0"><strong>เพิ่มที่อยู่</strong></h4>
                    </strong>
                    <button type="button" class="close position-absolute" style="right: 4px; top: -8px;"
                        data-dismiss="modal">&times;</button>
                </div>
            </div>

            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">

<div class="modal-body">
    <div class="col-12 mb-3 px-0">
        <input required type="text" class="form-control rounded8px" id="name" name='name' placeholder="ชื่อ" style="background-color: #ededed; border: none;">
    </div>
    <div class="col-12 mb-3 px-0">
        <input required type="text" class="form-control rounded8px" id="surname" name="surname" placeholder="นามสกุล" style="background-color: #ededed; border: none;">
    </div>
    <div class="col-12 mb-3 px-0">
        <input required maxlength="10" type="text" class="form-control rounded8px" id="tel" name='tel' placeholder="เบอร์โทรศัพท์" onkeypress="return isNumberKey(event)" style="background-color: #ededed; border: none;">
    </div>
    <div class="col-12 mb-3 px-0">
        <input required type="text" class="form-control rounded8px" id="address1" name='address1' placeholder="บ้านเลขที่ , หมู่บ้าน , อาคาร , ซอย" style="background-color: #ededed; border: none;">
    </div>

    <div class="col-12 px-0">
        <div class='form-row'>
            <div class="col-6">
                <div class="form-group">
                    <input required autocomplete="nope" class="form-control rounded8px" style="background-color: #c1bdbd;border : 0px; " type="text" id="district" name='district' placeholder="ตำบล">

                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input required autocomplete="nope" class="form-control rounded8px" style="background-color: #c1bdbd;border : 0px; " type="text" id="county" name='county' placeholder="อำเภอ">
                </div>
            </div>
        </div>
        <div class='form-row'>
            <div class="col-6">
                <div class="form-group">
                    <input required autocomplete="nope" class="form-control rounded8px" style="background-color: #c1bdbd;border : 0px; " type="text" id="city" name='city' placeholder="จังหวัด">
                </div>
            </div>
            <div class="col-6 ">
                <input required autocomplete="nope" maxlength="5" class="form-control rounded8px" style="background-color: #c1bdbd;border : 0px; " type="text" id="zipcode" name='zipcode' placeholder="รหัสไปรณีย์">
            </div>
        </div>

    </div>
    @if(count(@$address) <= 0 && isset(@$address)) <div class='d-flex flex-row'>
        <div class="col-1 mb-3">
            <div class="round">
                <input type="checkbox" id="checkbox" name='checkbox' checked />
                <label for="checkbox" id='checkbox' name="checkbox"></label>
            </div>
        </div>
        <div class="col-6 mb-3 ">
            <strong>เลือกเป็นที่อยู่หลัก</strong>
        </div>

        @else

        <div class="col-1 mb-3">
            <div class="round">
                <input type="checkbox" id="checkbox" name='checkbox' checked />
                <label for="checkbox" id='checkbox' name="checkbox"></label>
            </div>
        </div>
        <div class="col-6 mb-3 ">
            <strong>เลือกเป็นที่อยู่หลัก</strong>
        </div>
        @endif
</div>

<div class="col-12 px-0">
    <div class='form-row'>
        <div class="col-6 mb-3 text-center">
            <button type="button" class="btn form-control text-white rounded8px btn_cancle_address" data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
        </div>
        <div class="col-6 mb-3 text-center">
            <button class="btn form-control text-white rounded8px submit_address" type="submit" style="background-color: #c75ba1;">บันทึก</button>
        </div>
    </div>
</div>
</div>
</div>
</div> --}}
{{-- add Address Button --}}
@endsection

@section('script')
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

<link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<script>
    $('#select-submenu').on('change', function() {
        value = $(this).val();
        $('a.nav-link[href="#list-' + value + '"]').click();
    });
</script>

<script type="text/javascript">
    function vat3percent(type) {
        var total = '{{ $total_price }}';
        var shipping = $('.sum_shipping span').text();
        var aTotal = parseFloat(total) + parseFloat(shipping);
        var target = $('.complex');
        if (type == "credit") {
            var vTotal = aTotal * 103 / 100;
            var vat = aTotal * 3 / 100;
            $('.total_price span').text(vTotal);
            $('#showComplex span').text(vat);
            target.removeClass('d-none');
        } else {
            $('.total_price span').text(aTotal);
            target.addClass('d-none');
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('.modal').on('click', '.change_addtess', function() {

            // console.log('yes');
            // กด เพิ่มที่อยู่ ปิด Modal เลือกที่อยู่ที่มีอยู่


            // console.log(id);
        });

        //Submit
        $('.modal#change_address .change_address_btn').on('click', function() {
            $this = $('.modal#change_address input[name="address"]:checked');
            // console.log("$this", $this);
            var id = $this.data('id');
            var name = $this.data('name');
            var tel = $this.data('tel');
            var address = $this.data('address');
            var status = $this.data('status');

            if (status == '1') {
                $('#default').show();
            } else {
                $('#default').hide();
            }

            $('#change_address').modal('hide');
            $('#shipping_name').html(name);
            $('#shipping_tel').html(tel);
            $('#shipping_address').html(address);
            $('input[name="name"]').val(name);
            $('input[name="tel"]').val(tel);
            $('input[name="address"]').val(address);
            $('input[name="id_address"]').val(id);
            $('.address_detention').css('display', 'none');
            // console.log('submit');

        });
        // Cancel
        $('.modal#change_address .btn_cancel_address').on('click', function() {
            // console.log('cancel');
            // $('input[name="id_address"]').val('');
        });
        // กด เพิ่มที่อยู่ ปิด Modal เลือกที่อยู่ที่มีอยู่




        $('.add_address').on('click', function() {
            $('#change_address').modal('hide');
        });


        $('.btn_cancle_address').on('click', function() {
            $('#change_address').modal('show');
        });



        var total_all = 0;
        var shipping_default = 3;

        var weight_jquery = 0;

        //console.log(weight_jquery);
        $('.shipping_btn').on('click', function() {
            var text_shipping = $(this).find('h5').text();
            var value_shipping = $(this).val();

            if (shipping_default == value_shipping) {
                value_shipping = shipping_default;
                // console.log(value_shipping);
                // console.log('pass');
            } else {
                console.log('No pass');
            }
            var id = $(this).parents('.modal').attr('attr-id');
            //
            // console.log(id);
            // console.log(weight_jquery[id]);
            // console.log(id);
            // return false;


            var total_all_product = '{{ $total_price }}';


            $('input[attr-id="' + id + '"]').val(value_shipping);

            $.ajax({
                url: '/product-payment/getshipping',
                type: 'GET',
                data: {
                    id: id,
                    inv_ref: '{{ $inv_ref }}',
                    weight: weight_jquery[id],
                    type_shipping: value_shipping,
                },
                success: function(data) {
                    // console.log(data['shipde_price']);
                    $('.modal').modal('hide');
                    if (data != null) {
                        $('.detention[attr-id="' + id + '"]').css('display', 'none');
                    }
                    $('.modal').modal('hide');

                    $(('.shipping_font[attr-id="' + id + '"]')).html(text_shipping);
                    $('.cal_shipping[attr-id="' + id + '"]').html(data['shipde_price'] + "฿ ");
                    $('.shipping_id[attr-id="' + id + '"]').val(data['shipde_id']);



                    sum_shipping = 0;
                    var total_all = 0;
                    $('.cal_shipping').each(function() {
                        price_shipping = 0;
                        if (parseFloat($(this).text()) >= 0) {
                            price_shipping = parseFloat($(this).text());
                        }
                        sum_shipping = sum_shipping + (+price_shipping);
                    });
                    $('.sum_shipping').html("฿ <span>" + sum_shipping + "</span>");
                    total_all = parseInt(total_all_product) + parseInt(sum_shipping);
                    // console.log(total_all);
                    $('.total_price').html("฿ <span>" + total_all + "</span>").css('color', '#ca63a6').css('font-weight', 'bold');
                    $('input[name="total_price"]').val(total_all);

                    var typePay = $('input[name="bank"]:checked').val();
                    if (typePay) {
                        vat3percent(typePay);
                    }
                }
            });
        });

        $('.detention').css('display', 'none');
        $('.address_detention').css('display', 'none');

        // onclick for Checking success process \\
        $('#btn_product').on('click', function() {


            // $('#SendVisa').modal('show');

            // var status = true;
            // var id_shop_array = [];
            // var name = $('#shipping_name').text().trim();
            // // console.log(name);
            // $('.cal_shipping').each(function (index) {
            //     var text = parseFloat($(this).text());
            //     var id_ship = $(this).attr('attr-id');

            //     if (!text && text != 0) {
            //         id_shop_array.push(id_ship);
            //         $('.detention[attr-id="' + id_ship + '"]').css('display', 'block');
            //         // $('.address_detention').css('display', 'block');
            //         status = false;
            //         // return false;
            //     }

            // });

            // if(name == ''){
            //     $('.address_detention').css('display', 'block');
            // }else{
            //     $('.address_detention').css('display', 'none');
            // }




            // if (!status) {
            //     $([document.documentElement, document.body]).animate({
            //         scrollTop: $('.detention[attr-id="' + id_shop_array[0] + '"]').offset().top - 200
            //     }, 300);
            //     return false;
            // }

            //When don't have address
            // if (!$('#shipping_name').text().trim()) {
            //     $('.address_detention').css('display', 'block');
            //     $([document.documentElement, document.body]).animate({
            //         scrollTop: $('.no_address').offset().top - 200
            //     }, 300);
            //     // $('#change_address').modal('show');
            //     status = false;
            //     return false;
            // }


            //When don't have address
            // if (status) {
            //     $('#SendVisa').modal('show');
            // }
        });

        $('.btn_submit').on('click', function() {
            $('.form_pay').submit();
        });
        // total_price = parseInt($('.total_price').text());
        // myWallet = {{ $wallet->credit }};
        // if(total_price < myWallet){

        // }




    });
</script>


<script>
    $(document).ready(function() {
        var chk_max = $('.chkmodal').length;
        for ($i = 1; $i <= chk_max; $i++) {
            var disname = '#district_shop' + $i;
            var amphoename = '#county_shop' + $i;
            var province = '#province_shop' + $i;
            // var zipcode = '#zipcode_shop' + $i;
            $.Thailand({
                database: '/js/jquery.Thailand.js/database/db.json', // path หรือ url ไปยัง database
                $district: $(disname), // input ของตำบล
                $amphoe: $(amphoename), // input ของอำเภอ
                $province: $(province), // input ของจังหวัด
                // $zipcode: $(zipcode), // input ของรหัสไปรษณีย์
            });
        }
    });


    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $.Thailand({
        database: '/js/jquery.Thailand.js/database/db.json', // path หรือ url ไปยัง database

        $district: $('#district'), // input ของตำบล
        $amphoe: $('#county'), // input ของอำเภอ
        $province: $('#city'), // input ของจังหวัด
        // $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });
</script>




<script>
    $(document).ready(function() {
        //   var type_product = $('.media').find('.flash_sale').attr('type_product');
        var type_product = $('input[name="type"]').val();
        //   alert(type_product);
        if (type_product != 'flashsale') {
            $('#list-4-tab').on('click', function() {
                $("input[value='bank']").prop("checked", true);
                $("input[value='mobilebanking']").prop("checked", false);
                $("input[value='credit']").prop("checked", false);
                $("input[value='wallet']").prop("checked", false);
                vat3percent('bank');
            });

            $('#list-3-tab').on('click', function() {
                $("input[value='bank']").prop("checked", false);
                $("input[value='mobilebanking']").prop("checked", true);
                $("input[value='credit']").prop("checked", false);
                $("input[value='wallet']").prop("checked", false);
                vat3percent('mobilebanking');
            });

            $('#list-2-tab').on('click', function() {
                $("input[value='bank']").prop("checked", false);
                $("input[value='mobilebanking']").prop("checked", false);
                $("input[value='credit']").prop("checked", true);
                $("input[value='wallet']").prop("checked", false);
                vat3percent('credit');
            });

            $('#list-1-tab').on('click', function() {
                $("input[value='bank']").prop("checked", false);
                $("input[value='credit']").prop("checked", false);
                $("input[value='mobilebanking']").prop("checked", false);
                $("input[value='wallet']").prop("checked", true);
                vat3percent('wallet');
            });
        } else {
            $('#list-1-tab').on('click', function() {
                $("input[value='bank']").prop("checked", false);
                $("input[value='credit']").prop("checked", false);
                $("input[value='mobilebanking']").prop("checked", false);
                $("input[value='wallet']").prop("checked", true);
                vat3percent('wallet');
            });
        }
        var inv_ref = '{{ $invs[0]->inv_ref ?? $inv_ref }}';
        var address = $('input[name="id_address"]').val();
        var shipping_id = [];
        var shop = [];
        var type = $('input[name="type"]').val();
        var receive = $('input[name="receive"]').val();
        // alert(receive);


        $("#comfirm_buy").click(function() {
            var address = $('input[name="id_address"]').val();
            $.each($('.shop_id'), function() {
                shop.push($(this).val());
            });
            // console.log(shop);
            // return false;

            $.each($('input[class="shipping_id"]'), function(key) {
                var id_shop = $(this).attr('attr-id');

                shipping_id.push(($(this).val()));
            });

            //console.log(shipping_id);
            // return false;

            var total = $('input[name="total_price"]').val();
            $.each($("input[name='bank']:checked"), function() {
                bank = $(this).val();
                // alert(bank);
                if (bank === 'mobilebanking') {
                    $("#comfirm_buy").attr("href", "/checkout/bank/mobilebanking/" + inv_ref + "/?inv_ref=" + inv_ref + "&address=" + address + "&total=" + total + "&shipping=" + shipping_id + "&type=" + type);
                } else if (bank === 'bank') {
                    $("#comfirm_buy").attr("href", "/checkout/bank/?inv_ref=" + inv_ref + "&bank_id=" + bank + "&shop=" + shop + "&address=" + address + "&total=" + total + "&shipping=" + shipping_id + "&type=" + type);
                } else if (bank === 'wallet') {
                    $("#comfirm_buy").attr("href", "/checkout/bank/wallet/" + inv_ref + "/?inv_ref=" + inv_ref + "&address=" + address + "&total=" + total + "&shipping=" + shipping_id + "&type=" + type + "&receive=" + receive);
                } else if (bank === 'credit') {
                    $("#comfirm_buy").attr("href", "/checkout/bank/credit/" + inv_ref + "/?inv_ref=" + inv_ref + "&address=" + address + "&total=" + total + "&shipping=" + shipping_id + "&type=" + type);
                }


            });
        });
    });
</script>

<script>
    $('.submit_address').on('click', function() {

        var user_id = $('input[name="user_id"]').val();
        var name = $('input#name').val();
        var surname = $('input#surname').val();
        var tel = $('input[name="tel"]').val();
        var address1 = $('input[name="address1"]').val();
        var district = $('input[name="district"]').val();
        var county = $('input[name="county"]').val();
        var city = $('input[name="city"]').val();
        var zipcode = $('input[name="zipcode"]').val();
        var status = $('input[name="checkbox"]').prop('checked');
        var textsum = address1 + " " + district + " " + county + " " + city + " " + zipcode;
        status = (status == true) ? 1 : 0;

        $('input').removeClass('border-danger');



        $.ajax({
            url: 'address/add',
            type: 'POST',
            data: {
                user_id: user_id,
                name: name,
                surname: surname,
                tel: tel,
                address1: address1,
                district: district,
                county: county,
                city: city,
                zipcode: zipcode,
                status: status,
                _token: '{{ csrf_token() }}',
            },
            success: function(data) {
                // console.log(data.id);
                $('.address_add_modal').append('<div class="col-lg-12 col-12 px-2 chkmodal">' +
                    '<div class="col-lg-12 col-md-12 col-12 px-0 mt-0 o-bg-box">' +
                    '<div>' +
                    '<div class="col-lg-12 col-md-12 col-sm-12 pb-0">' +
                    '<div class="row">' +
                    '<div class="col-lg-12 address_pay">' +
                    '<div class="form-row">' +
                    '<input class="form-check-input change_addtess" type="radio"' +
                    'name="address" id="' + data.id + '" value="' + data.id + '" ' +
                    'data-id="' + data.id + '" ' +
                    'data-name="' + name + ' ' + surname + ' "' +
                    'data-tel="' + tel + '" ' +
                    'data-status="' + status + '" ' +
                    'data-address="' + textsum + '" checked>' +
                    '<div class=" col-lg-3 col-md-3 col-8 text-md-right text-lg-left order-1 order-md-1 order-lg-1">' +
                    '<strong>ชื่อ - นามสกุล : </strong>' +
                    '</div>' +
                    '<div class="col-lg-6 col-md-6 col-7  pr-lg-0 pr-md-0 order-3 order-md-2 order-lg-2">' +
                    '<input readonly type="text" value="' + name + ' ' + surname + ' " ' +
                    'class="rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" ' +
                    'placeholder="ชื่อ - นามสกุล" style="background-color: white; border: none;"> ' +
                    '</div>' +
                    // '<div class="col-lg-3 col-md-2 col-5 order-4 order-md-3 order-lg-3">'+
                    //     '<a style="color:#c75ba1"><b>(ที่อยู่หลัก)</b></a>'+
                    // '</div>'+
                    '</div>' +
                    '<div class="form-row">' +
                    '<div class=" col-lg-3 col-md-3 col-12 text-md-right text-lg-left">' +
                    '<strong>เบอร์โทรศัพท์ : </strong>' +
                    '</div>' +
                    '<div class="col-lg-9 col-md-9 col-12">' +
                    '<input readonly type="text" value="' + tel + '" class="rounded8px py-0" ' +
                    'id="exampleInputEmail1" aria-describedby="emailHelp" ' +
                    'placeholder="(+66) 081-441-9585" style="background-color: white; border: none;">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-row">' +
                    '<div class="col-lg-3 col-md-3 col-12 text-md-right text-lg-right" ' +
                    'style="padding-right: 17px;">' +
                    '<strong>ที่อยู่ : </strong>' +
                    '</div>' +
                    '<div class="col-lg-9 col-md-9 col-12">' +
                    '<textarea readonly class="" rows="2" ' +
                    'style="background-color: white; border: none;width:100%;resize: none">' + textsum + '</textarea>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
                Swal.fire({
                    text: "สร้างที่อยู่สำเร็จแล้ว",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ปิดหน้าต่าง!'
                });

                $('input[name="id_address"]').val(data.id);
                $('#shipping_name').text(name + ' ' + surname);
                $('#shipping_tel').text(tel);
                $('#shipping_address').text(textsum);



                $('.modal').modal('hide');

            },
            error: function(data) {
                json = JSON.parse(data.responseText);
                // console.log(json['error']);
                var loop = 0;
                $.each(json['error'], function(index, value) {
                    // focus เฉพาะ Input แรก เท่านั้น
                    if (loop == 0) {
                        $('input#' + index).focus();
                        loop++;
                    }
                    $('input#' + index).attr('placeholder', value).addClass('border').addClass('border-danger').val('');

                });
            }

        });
    });
</script>


<script>
    $(document).ready(function() {
        var type_product = $('input[name="type"]').val();
        if (type_product == 'flashsale') {
            var select = $('#select-submenu').text();
            $('#select_pay_bank').css('filter', 'grayscale(100%)');
            $('#select_pay_mobile').css('filter', 'grayscale(100%)');
            $('#select_pay_credit').css('filter', 'grayscale(100%)');
            $('input[name="bank"]').prop('checked', false); {
                {
                    --$('#list-4').removeClass('show active');
                    --
                }
            }
            // //$('#list-3').
            // //$('#list-2').
            {
                {
                    --$('#list-1').addClass('show active');
                    --
                }
            }

            $('#list-4-tab').prop('disabled', true);
            $('#list-3-tab').prop('disabled', true);
            $('#list-2-tab').prop('disabled', true); {
                {
                    --$('#list-1-tab').addClass('active');
                    $('#list-1-tab ').prop('active');
                    --
                }
            }

            $('#list-1-tab').click();
        }

    });
</script>









@endsection