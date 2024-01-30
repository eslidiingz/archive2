@extends('new_ui.layouts.front-end-seller')
@section('content')
<div class="row">
    <div class="col-12 px-4 pt-4 pb-0">
        <h3><strong>Purchase report</strong></h3>
    </div>
    <div class="col-12 px-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="background-color: unset;">
                <li class="breadcrumb-item"><a href="seller-index.php">Main</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $basket_all[0]->inv_ref }}@if(isset($basket_all[0]->inv_no)&&$basket_all[0]->inv_no != null)-{{ $basket_all[0]->inv_no }}@endif</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-9 col-md-12 col-12 px-4 px-lg-4 px-md-4 px-2 mb-4">
        <div class="row p-lg-4 p-md-2 p-2 py-md-4 py-4 mb-2 mx-0" style="background-color: #fff;">
            <div class="col-lg-6 col-md-6 col-12 d-flex flex-row align-items-center ">
                <img src="/img/profile/user.svg" style="width: 25px;" alt="">
                <h5 class="mb-0 ml-2 font_size_14px" style="color: #d61900;"><strong>


                        {{-- normal Status --}}
                        @if( $basket_all[0]->status == 1)
                        Waiting for payment
                        @elseif( $basket_all[0]->status == 2)
                        Paid
                        @elseif( $basket_all[0]->status == 3)
                        Start shipping
                        @elseif( $basket_all[0]->status == 4)
                        On shipping
                        @elseif( $basket_all[0]->status == 5)
                        Order completed
                        @elseif( $basket_all[0]->status == 6)
                        Cancel<br/>Remark: {{$basket_all[0]->description}}
                        {{-- normal Status --}}



                        {{-- Status type waiting --}}
                        @elseif( $basket_all[0]->status == 12)
                        Wait customer transfer
                        @elseif( $basket_all[0]->status == 13)
                        Checking failed
                        @elseif( $basket_all[0]->status == 21)
                        Waiting for payment
                        {{-- Status type waiting --}}





                        {{-- Status รับหน้าหน้างาน --}}
                        @elseif( $basket_all[0]->status == 43)
                        Customer pickup
                        @elseif( $basket_all[0]->status == 53)
                        Order completed
                        {{-- Status รับหน้าหน้างาน --}}



                        {{--  --}}
                        @elseif( $basket_all[0]->status == 52)
                        Order completed (Auto)
                        {{--  --}}


                        {{-- Status Cancel --}}
                        @elseif( $basket_all[0]->status == 99)
                        Cancelled<br/>Remark: {{$basket_all[0]->description}}
                        @endif
                        {{-- Status Cancel --}}




                    </strong></h5>
            </div>
            <div
                class="col-lg-6 col-md-6 col-12 d-flex align-items-end justify-content-lg-end justify-content-md-start justify-content-start flex-column">
                <h5 class="mb-0 font_size_14px">
                    <strong>
                        Invoice no : # <span class="inv_ref">{{ $basket_all[0]->inv_ref }}@if(isset($basket_all[0]->inv_no)&&$basket_all[0]->inv_no != null)-{{ $basket_all[0]->inv_no }}@endif</span>
                    </strong>
                </h5>
                {{-- @if ($basket_all[0]->uidmp != null || $basket_all[0]->uidmp != '')
                    <h5 class="mb-0 font_size_14px">(จาก shopteenii mp)</h5>
                @endif --}}
            </div>
        </div>
        {{-- <div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0 d-block d-md-block d-lg-none" style="background-color: #fff;">
            <div class="col-12 mt-4">
                @include('shop.user-tracking')

            </div>
        </div> --}}
        {{-- <div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0" style="background-color: #fff;">
                            <div class="col-6 d-flex flex-row align-items-center">
                                <h5 class="mb-0 ml-2"><strong><span style="color: #7BCFDD;">Reason :</span> แขนเสื้อกระดุมหลุด</strong></h5>
                            </div>
                            <div class="col-6">
                                <div class="form-row justify-content-end">
                                    <div class="col-4">
                                        <button class="btn btn btn-outline-danger form-control" data-toggle="modal" data-target="#CancelModal">Declined</button>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn btn-outline-success form-control" data-toggle="modal" data-target="#SuccessModal">Accept</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
        <div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0" style="background-color: #fff;">
            <div class="col-12 px-1">
                <table class="table-bordered">
                    <thead>
                        <tr class="d-lg-none d-md-none d-block">
                            <th scope="col" class="p-4 text-left">Products</th>
                            <th scope="col" class="width200 text-left">Total purchase</th>
                            <th scope="col" class="width200 text-left">Status</th>
                            <th scope="col" class="width200 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    @php
                    $total_at = 0;
                    @endphp
                    {{-- {{dd($basket_all)}} --}}
                    @foreach ($basket as $key => $item)
                        {{-- {{ dd($item) }} --}}
                        @if (isset($item['type']))
                            @if ($item['type'] == 'flashsale')
                                @foreach($product_flash as $pro)
                                    @if($item['product_id'] == $pro->id)
                                        <tr>
                                            <td scope="row">
                                                <div class="row">
                                                    <div class="col-12 mb-4 text-left">
                                                        <div class="media" style="height: 60px;">
                                                            <img src="{{('/img/product/'. $pro->product_img[0]) }}" style="max-height: 100%;width: 60px; height: 100%; object-fit: cover;" class="mr-3 rounded8px" alt="...">
                                                            <div class="media-body">
                                                                <h6 class="mt-0 text-dot1"><strong>{{ $pro->name }}</strong></h6>
                                                                @if(isset($pro->dis1) && isset($pro->dis2))
                                                                {{ $pro->dis1 }} , {{ $pro->dis2 }}
                                                                @endif
                                                                @if(isset($pro->dis1))
                                                                {{ $pro->dis1 }}
                                                                @endif
                                                                @if(isset($pro->dis2))
                                                                {{ $pro->dis1 }}
                                                                @endif
                                                                @if(!isset($pro->dis1) && !isset($pro->dis2))
                                                                <span class="font_size_14px" style="color:grey">No detail</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                            <td data-label="ราคา">
                                                <div class="row" >
                                                    <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                        <h6 class="mb-0 font_size_14px"><strong>฿ {{ number_format($item['price'] * 0.9,0) }} (-10% ค่า GP)</strong></h6>
                                                    </div>
                                                    {{-- <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                        <h6 class="mb-0" style="color: #919191; text-decoration: line-through">฿ {{ $item['discount'] }}</h6>
                                                    </div> --}}
                                                </div>
                                            </td>
                                            <td data-label="จำนวน">
                                                <div class="row">
                                                    <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                        <h6 class="mb-0 font_size_14px"><strong>x {{ $item['amount'] }}</strong></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="ราคาทั้งหมด">
                                                <div class="row">
                                                    <div class="col-12 mb-2 text-right px-0">
                                                        @php
                                                        $total_at = 0;
                                                        $total_at += ($item['price']*0.9)*$item['amount'];
                                                        @endphp
                                                        <h6 class="mb-0 font_size_14px"><strong>฿ {{ number_format($total_at,0) }}</strong></h6>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @else
                            @foreach($product as $pro)
                                @if($item['product_id'] == $pro->id)
                                    <tr>
                                        <td scope="row">
                                            <div class="row">
                                                <div class="col-12 mb-0 text-left d-flex align-items-center">
                                                    <div class="media" style="height: 60px;">
                                                        <img src="{{('/img/product/'. $pro->product_img[0]) }}" style="max-height: 100%;width: 60px; height: 100%; object-fit: cover;" class="mr-3 rounded8px" alt="...">
                                                        <div class="media-body">
                                                            <h6 class="mt-0 text-dot1"><strong>{{ $pro->name }}</strong></h6>
                                                            @if(isset($pro->dis1) && isset($pro->dis2))
                                                            {{ $pro->dis1 }} , {{ $pro->dis2 }}
                                                            @endif


                                                            @if(isset($pro->dis1))
                                                            {{ $pro->dis1 }}
                                                            @endif

                                                            @if(isset($pro->dis2))
                                                            {{ $pro->dis1 }}
                                                            @endif

                                                            @if(!isset($pro->dis1) && !isset($pro->dis2))
                                                            <span class="font_size_14px" style="color:grey">No product detail</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                        {{-- <td data-label="icon-mp">
                                            <div class="row" >
                                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                    <img src="/img/product/0.226248001621221946_2660.jpg" style="width: 60px; height: 60px; object-fit: cover;" class="rounded8px" alt="">
                                                </div>
                                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                    <h6 class="mb-0" style="color: #919191; text-decoration: line-through">฿ 1140 (-37%)</h6>
                                                </div>
                                            </div>
                                        </td> --}}
                                        <td data-label="ราคา">
                                            <div class="row" >
                                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                    <h6 class="mb-0 font_size_14px"><strong>฿
                                                        @if (($basket_all[0]->uidmp != null || $basket_all[0]->uidmp != '') && ($item['margin'] != null || $item['margin'] != ''))
                                                            @if( $basket_all[0]->gp_rate > 0 )
                                                                {{ number_format(($item['margin']* ((100-$basket_all[0]->gp_rate)/100) ),0) }} (-{{$basket_all[0]->gp_rate}}% ค่า GP)
                                                            @else
                                                                {{ number_format($item['margin'],0) }}
                                                            @endif
                                                        @else
                                                            @if( $basket_all[0]->gp_rate > 0 )
                                                                {{ number_format(($item['price']* ((100-$basket_all[0]->gp_rate)/100) ),0) }} (-{{$basket_all[0]->gp_rate}}% ค่า GP)
                                                            @else
                                                                {{ number_format($item['price'],0) }}
                                                            @endif
                                                        @endif</strong></h6>
                                                </div>
                                                {{-- <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                    <h6 class="mb-0" style="color: #919191; text-decoration: line-through">฿ 1140 (-37%)</h6>
                                                </div> --}}
                                            </div>
                                        </td>
                                        <td data-label="จำนวน">
                                            <div class="row">
                                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right px-0">
                                                    <h6 class="mb-0 font_size_14px"><strong>x {{ $item['amount'] }}</strong></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="ราคาทั้งหมด">
                                            <div class="row">
                                                <div class="col-12 mb-2 text-right px-0">
                                                    @if (($basket_all[0]->uidmp != null || $basket_all[0]->uidmp != '') && ($item['margin'] != null || $item['margin'] != ''))
                                                        @php
                                                            $total_at = 0;
                                                            if( $basket_all[0]->gp_rate > 0 ) {
                                                                $total_at += ($item['margin']*$item['amount'])* ((100-$basket_all[0]->gp_rate)/100);
                                                            } else {
                                                                $total_at += ($item['margin']*$item['amount']);
                                                            }
                                                        @endphp
                                                    @else
                                                        @php
                                                            $total_at = 0;
                                                            if( $basket_all[0]->gp_rate > 0 ) {
                                                                $total_at += ($item['price']*$item['amount'])* ((100-$basket_all[0]->gp_rate)/100);
                                                            } else {
                                                                $total_at += ($item['price']*$item['amount']);
                                                            }
                                                        @endphp
                                                    @endif
                                                    <h6 class="mb-0 font_size_14px"><strong>฿ {{ number_format($total_at,2) }}</strong></h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 px-0">
                <hr class="w-100">
            </div>
            <div class="col-lg-12 col-md-6 col-6 text-left d-lg-none d-md-block d-block pr-0">
                <h5 class="mb-0 mr-2"><strong style="color: #7BCFDD;">ราคารวมทั้งหมด</strong></h5>
            </div>
            <div class="col-lg-12 col-md-6 col-6 text-right px-lg-0 px-md-3 px-3">
                @if ($basket_all[0]->uidmp != null || $basket_all[0]->uidmp != '')
                    @php
                        foreach ($basket_all as $key => $val1) {
                            $total_pro = 0;
                            foreach ($val1->inv_products as $key => $val2) {
                                if(isset($val2['margin']) || $val2['margin'] != '' || $val2['margin'] != null){
                                    $total_pro += ($val2['margin']*$val2['amount']);
                                }
                                else{
                                    $total_pro += ($val2['price']*$val2['amount']);
                                }
                            }
                        }
                        if( $basket_all[0]->gp_rate > 0 ) {
                            $total_pro = ($total_pro* ((100-$basket_all[0]->gp_rate)/100) );
                        }
                    @endphp
                    <h5 class="mb-0"><strong style="color: #7BCFDD;">฿ {{ number_format($total_pro,2) }}</strong></h5>
                @else
                    @if( $basket_all[0]->gp_rate > 0 )
                        <h5 class="mb-0"><strong style="color: #7BCFDD;">฿ {{ number_format($basket_all[0]->total* ((100-$basket_all[0]->gp_rate)/100),2) }}</strong></h5>
                    @else
                        <h5 class="mb-0"><strong style="color: #7BCFDD;">฿ {{ number_format($basket_all[0]->total,2) }}</strong></h5>
                    @endif
                @endif
            </div>
        </div>
        {{-- <div class="row p-lg-4 p-md-2 p-2 mb-2 mx-0 py-md-4 py-4" style="background-color: #fff;">
            <div class="col-lg-6 col-md-6 col-12 d-flex flex-row align-items-center">
                <img src="/img/profile/user.svg" style="width: 70px; height:70px;border-radius:50%" alt="">
                <h6 class="ml-4"><strong>{{ $emailUser->email }}</strong></h6>
            </div>
            <div
                class="ml-auto col-lg-2 col-md-3 col-12 d-flex align-items-center justify-content-end mt-lg-0 mt-md-0 mt-2">
                <button class="btn btn-outline-c45e9f form-control"><img src="new_ui/img/seller/icon-comment.svg"
                        style="filter: invert(52%) sepia(52%) saturate(711%) hue-rotate(276deg) brightness(84%) contrast(83%);}"
                        width="24px;" alt=""> แชทเลย</button>
            </div>
        </div> --}}
<form action="/shop/sendTrackingNumber" method="POST" enctype="multipart/form-data" class="mb-0">
@csrf
        <div class="row p-lg-4 p-md-2 py-4 px-2 mb-2 mx-0 py-md-4 py-4" style="background-color: #fff;">
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 d-flex flex-row align-items-center ">
                <h5><strong style="color: #7BCFDD;">Tracking no</strong></h5>
            </div>
            <div class="col-xl-5 col-lg-7 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                    <div class="input-group">
                        @if($basket_all[0]->status == 3 || $basket_all[0]->status == 4)
                        <input type="hidden" name="inv_ref" value="{{ $basket_all[0]->inv_ref }}">
                        <input type="hidden" name="shop_id" value="{{ $basket_all[0]->shop_id }}">
                        <input type="hidden" name="status" value="{{ $basket_all[0]->status }}">


                        <input type="text" class="form-control position-relative track_status3"
                            style="border: 1px solid #7BCFDD;" placeholder="Tracking no" aria-label="Recipient's username"
                            aria-describedby="basic-addon2" name="tracking_number3"
                            value="{{ @$track->tracking_number }}" readonly>
                        <i class="fa fa-pencil position-absolute track_status3"
                            style="right: 130px; top: 10px; z-index: 1;" data-toggle="modal"
                            data-target="#editTracknumber"></i>


                        @elseif($basket_all[0]->status <= 2)
                            <input type="text"
                            class="form-control position-relative track_status2" style="border: 1px solid #7BCFDD;"
                            placeholder="Tracking no" aria-label="Recipient's username" aria-describedby="basic-addon2"
                            name="tracking_number2" @if($address[0]=="ไม่มีที่อยู่" || $basket_all[0]->status < 2)
                                readonly @endif>
                                <input type="hidden" name="inv_ref" value="{{ $basket_all[0]->inv_ref }}">
                                <input type="hidden" name="shop_id" value="{{ $basket_all[0]->shop_id }}">
                                <input type="hidden" name="status" value="{{ $basket_all[0]->status }}">

                        @else
                            <input type="text" class="form-control position-relative track_status3"
                            style="border: 1px solid #7BCFDD;" placeholder="Tracking no" aria-label="Recipient's username"
                            aria-describedby="basic-addon2" name="tracking_number3"
                            value="{{ @$track->tracking_number }}" readonly>
                        @endif

                        <div class="input-group-append">
                            @if($basket_all[0]->status == 3 || $basket_all[0]->status == 4)
                            <button type="button" class="btn input-group-text "
                                style="background-color: #7BCFDD;border: 1px solid #7BCFDD; color: #fff;"
                                {{-- id="{{$shipping[0]->shipping_api}}" --}} id="ems" data-target="#trackEMS"
                                data-toggle="modal">Check</button>

                            @elseif($basket_all[0]->status <= 2) <button type="submit"
                                class="btn input-group-text"
                                style="background-color: #7BCFDD;border: 1px solid #7BCFDD; color: #fff;"
                                attr-id="{{ @$shipping[0]->shipty_id }}" id="basic_addon2"
                                @if($address[0]=="ไม่มีที่อยู่" || $basket_all[0]->status < 2) disabled @endif>
                                    Input tracking no</button>
                            @else
                                <button type="button" class="btn input-group-text "
                                style="background-color: #7BCFDD;border: 1px solid #7BCFDD; color: #fff;"
                                {{-- id="{{$shipping[0]->shipping_api}}" --}} id="ems" data-target="#trackEMS"
                                data-toggle="modal" disabled>Check</button>
                            @endif
                        </div>
                    </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 d-flex align-items-center justify-content-end mt-0 mt-md-0 mt-lg-0">
                <a class="btn btn-outline-c45e9f  form-control mt-lg-0 mt-md-0 mt-2
                @if($basket_all[0]->status > 2)
                disabled
                @endif
                "
                data-toggle="modal" data-target="#CancelSuccessModal-1"
                >Cancel this order</a>
            </div>
        </div>
</form>
        <div class="row p-lg-4 p-md-2 py-4 px-2 mb-2 mb-2 mx-0 py-md-4 py-4" style="background-color: #fff;">
            <div class="col-12 mb-2">
                <h5><strong style="color: #7BCFDD;">Shipping address</strong></h5>
            </div>

            {{-- Address to Send --}}

            @if($address[0] != "ไม่มีที่อยู่")
            @if (isset($address[0]['name']))
            @foreach ($address as $address_inv)
            <div class="col-lg-6 col-md-6 col-12">
                <div class="row ">
                    <div class="col-12">
                        <h6><strong>Name - Surname</strong>: {{ $address_inv['name'] }}</h6>
                    </div>
                    <div class="col-12">
                        <h6><strong>Tel.</strong>: (+66) {{ $address_inv['tel'] }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <h6><strong>Address</strong>: {{ $address_inv['address'] }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-6 col-md-6 col-12">
                <div class="row ">
                    <div class="col-12">
                        <h6><strong>Name - Surname</strong>: {{ $address[0] }}</h6>
                    </div>
                    <div class="col-12">
                        <h6><strong>Tel</strong>: (+66) {{ $address[1] }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <h6><strong>Address</strong>: {{ $address[2] }}</h6>
                    </div>
                    {{-- <div class="col-12">
                        <h6><strong style="color: #7BCFDD;">(Main address)</strong></h6>
                    </div> --}}
                </div>
            </div>
            @endif


            @elseif($address[0] == "ไม่มีที่อยู่")
            <div class="col-12">
                <div class="row d-flex justify-content-center">
                    <h2 style="color:grey; text-decoration: underline">Waiting for payment</h2>
                </div>
            </div>



            @endif

            {{-- @else
            <div class="col-lg-6 col-md-6 col-12">
                <div class="row ">
                    <div class="col-12">
                        <h6><strong>Shipping address</strong>: {{ $address_inv }}</h6>
        </div>
    </div>
</div>
@endif --}}



{{-- Address to Send --}}

{{-- <div class="col-12 my-2">
    <hr class="w-100">
</div>
<div class="col-lg-6 col-md-6 col-12 mb-2">
    <h5><strong style="color: #7BCFDD;">ช่องทางการชำระเงิน</strong></h5>
</div>
<div class="col-lg-6 col-md-6 col-12 mb-2">
    <div class="row ">
        <div class="col-12 d-md-flex d-lg-flex justify-content-end">
            <h6><strong>บัตรเครดิต / บัตรเดบิต</strong></h6>
        </div>
        <div class="col-12 d-md-flex d-lg-flex align-items-center justify-content-end">
            <div class="d-flex flex-row">
                <img src="/img/profile/user.svg" style="width: 60px;" class="mr-2" alt="">
                <h6><strong>ธนาคารกสิกรไทย * 6702</strong></h6>
            </div>
        </div>
    </div>
</div> --}}
<div class="col-12 my-2">
    <hr class="w-100">
</div>
<div class="col-12">
    <div class="row justify-content-end">
        <div class="col-xl-4 col-lg-7 col-md-6 col-12">
            <div class="row">
                <div class="col-6 text-md-right text-lg-right text-left pr-0">
                    <h6>Product price</h6>
                    <h6>Product discount</h6>
                    <h6>Ship price</h6>
                    <h6>Ship discount</h6>
                    <h6>Grand total</h6>
                </div>

                @if ($basket_all[0]->uidmp != null || $basket_all[0]->uidmp != '')
                    @php
                        $discount = 0;
                        $total_all = 0;
                        $total_all = ($basket_all[0]->shipping_cost - $discount) + $total_pro;
                    @endphp
                @else
                    @php
                    $discount = 0;
                    $total_all = 0;
                    if( $basket_all[0]->gp_rate > 0 ) {
                        $total_all = ($basket_all[0]->shipping_cost - $discount) + ($basket_all[0]->total* ((100-$basket_all[0]->gp_rate)/100) );
                    } else {
                        $total_all = ($basket_all[0]->shipping_cost - $discount) + ($basket_all[0]->total);
                    }
                    @endphp
                @endif

                @php
                    $discount = 0;
                    $total_all = 0;
                    $shipping_all = 0;
                    foreach ($basket_all as $key => $value) {
                        $total_all += $value->total;
                        $shipping_all += $value->shipping_cost;
                    }
                @endphp

                <div class="col-6 text-right">
                    @if ($basket_all[0]->uidmp != null || $basket_all[0]->uidmp != '')
                        <h6><strong>฿ {{ number_format($total_pro,0) }}</strong></h6>
                    @else
                        @if( $basket_all[0]->gp_rate > 0 )
                            <h6><strong>฿ {{ number_format($basket_all[0]->total* ((100-$basket_all[0]->gp_rate)/100) ,2) }}</strong></h6>
                        @else
                            <h6><strong>฿ {{ number_format($basket_all[0]->total,2) }}</strong></h6>
                        @endif
                    @endif
                    @if( $basket_all[0]->disc_to == 'PRODUCT' )
                        <h6><strong style="color: red;">฿ {{ number_format($basket_all[0]->disc_amt, 2) }}</strong></h6>
                    @else
                        <h6><strong style="color: grey;">฿ 0</strong></h6>
                    @endif
                    <h6><strong>฿ {{ number_format($basket_all[0]->shipping_cost,2) }}</strong></h6>
                    @if( $basket_all[0]->disc_to == 'SHIP' )
                        <h6><strong style="color: red;">฿ {{ number_format($basket_all[0]->disc_amt, 2) }}</strong></h6>
                    @else
                        <h6><strong style="color: grey;">฿ 0</strong></h6>
                    @endif
                    <h5><strong style="color: #7BCFDD;">฿ {{ number_format($total_all+$shipping_all - $basket_all[0]->disc_amt, 2) }}</strong></h5>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="col-3 px-4 mb-4 d-lg-block d-md-none d-none ">
    <div class="row px-xl-4 px-lg-0 px-md-2 px-2 py-xl-4 py-lg-4 py-md-2 py-2">
        <div class="col-12 mb-4">
            <h5><strong>Purchase history</strong></h5>
        </div>
        <div class="col-md-12 col-lg-12">
            @include('shop.user-tracking')
            {{-- @include('resources/views.shop.user-tracking') --}}
        </div>

    </div>
</div>
</div>






@endsection

@section('style')
<style>
    .swiper-container {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-container-5 {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }

    .gallery-top {
        height: 80%;
        width: 100%;
    }

    .gallery-thumbs {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .gallery-thumbs .swiper-slide {
        height: 100%;
        opacity: 0.4;
    }

    .gallery-thumbs .swiper-slide-thumb-active {
        opacity: 1;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #fff;
        background-color: #7BCFDD;
        border-color: #7BCFDD;
        border: none;

    }

    .nav-tabs .nav-link:hover {
        border: none;
        color: #fff;
        background-color: #7BCFDD;
    }

    .nav-tabs .nav-link {
        border: none;
    }

    .nav-tabs {
        border-bottom: 4px solid #7BCFDD;
    }

    .table-bordered td,
    .table-bordered th {
        border: none;
    }

    .table-bordered {
        border: none;
    }

    table tr {
        border: none;
    }

</style>
<!-- Modal -->
<div class="modal fade" id="CancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header pb-0" style="border-bottom: unset;">
                <div class="col-12 position-relative">
                    <h5 class="modal-title text-center " id="exampleModalLabel"><strong>ปฏิเสธการคืนสินค้า</strong></h5>
                    <button type="button" class="close position-absolute" style="right: 5px; top: 0px;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>กรุณาเลือกสาเหตุที่ต้องการปฏิเสธ</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="ส่งข้อความถึงเจ้าหน้าที่">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0" style="border-top: unset;">
                <div class="form-row w-100">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary form-control"
                            data-dismiss="modal">ยกเลิก</button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-c75ba1 form-control">ส่งคำร้อง</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="SuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header pb-0" style="border-bottom: unset;">
                <div class="col-12 position-relative">

                    <h5 class="modal-title text-center " id="exampleModalLabel">
                        <img src="new_ui/img/seller/purchase-history-4.svg" style="width: 20px; height: 20px;" alt="">
                        <strong style="color: #7BCFDD;">ยอมรับสำเร็จ</strong></h5>
                    <button type="button" class="close position-absolute" style="right: 5px; top: 0px;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <h6 class="text-center">คุณได้ยอมรับการคืนสินค้าเรียบร้อยแล้ว<br>ระบบจะทำการโอนเงินคืนผู้ซื้อ ภายใน 2-3
                    วัน</h6>
            </div>
            <div class="modal-footer pt-0" style="border-top: unset;">
                <div class="form-row w-100">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="btn btn-c75ba1 form-control w-25">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="CancelSuccessModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">

        <div class="modal-content">
            <div class="modal-header pb-0" style="border-bottom: unset;">
                <div class="col-12 position-relative">
                    <h5 class="modal-title text-center " id="exampleModalLabel"><strong>ยกเลิกคำสั่งซื้อ</strong></h5>
                    <button type="button" class="close position-absolute" style="right: 5px; top: 0px;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method="GET" action="/shop/cancel/content/{{$basket_all[0]->id}}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="typeSelect" class="black">ประเภทของการยกเลิก</label>
                            <select class="form-control" id="typeSelect" name="typeSelect">
                                <option value="21">สินค้าหมด (จำนวน, รูปแบบ, เป็นต้น)</option>
                                <option value="22">อื่นๆ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                name="note" placeholder="ส่งข้อความถึงเจ้าหน้าที่">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0" style="border-top: unset;">
                <div class="form-row w-100">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary form-control"
                            data-dismiss="modal">ยกเลิก</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-c75ba1 form-control">ส่งคำร้อง</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="CancelSuccessModal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header pb-0" style="border-bottom: unset;">
                <div class="col-12 position-relative">

                    <h5 class="modal-title text-center " id="exampleModalLabel">
                        <img src="new_ui/img/seller/purchase-history-4.svg" style="width: 20px; height: 20px;" alt="">
                        <strong style="color: #7BCFDD;">ยกเลิกคำสั่งซื้อสำเร็จ</strong></h5>
                    <button type="button" class="close position-absolute" style="right: 5px; top: 0px;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <h6 class="text-center">คุณได้ยกเลิกรายการสั่งซื้อนี้แล้ว<br>ข้อความของคุณจะถูกส่งไปให้ผู้ซื้อ</h6>
            </div>
            <div class="modal-footer pt-0" style="border-top: unset;">
                <div class="form-row w-100">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="btn btn-c75ba1 form-control w-25">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit Tracking Number --}}
<div class="modal fade" id="editTracknumber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit tracking no</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <input type="text" class="form-control position-relative edit_input"
                        style="border: 1px solid #7BCFDD" placeholder="Tracking no" aria-label="Recipient's username"
                        aria-describedby="basic-addon2" name="tracking_edit" value="{{ @$track->tracking_number }}">
                </div>
                <div class="col-12 d-flex justify-content-center pt-3">
                    <button class="btn input-group-tex save_edit"
                        style="background-color: #7BCFDD;border: 1px solid #7BCFDD; color: #fff; width:120px">บันทึก</button>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save_edit">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>

{{-- Modal EMS --}}
<div class="modal fade" id="trackEMS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">สถานะ EMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-6 col-12 ">
                            <div class="row">
                                <div class="col-3 text-md-right text-lg-right text-right pr-0">
                                    <h5><strong>สถานะ : </strong></h5>
                                    <h5><strong>จังหวัด : </strong></h5>
                                    <h5><strong>วันที่ / เวลา : </strong></h5>
                                </div>

                                <div class="col-9 text-left ">
                                    <h5 id="status_ems"></h5>
                                    <h5 id="city_ems"></h5>
                                    <h5 id="time_ems"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save_edit">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>



@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


{{-- Ajax for EMS --}}
<script>
    $('#basic_addon3').on('click',function(){
        alert('yes');
        return false;
        // var tracking_number = $('input[name="tracking_number"]').val();
        // var courier = $('#shipping_api').text();
        // var token = 'Token eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJzZWN1cmUtYXBpIiwiYXVkIjoic2VjdXJlLWFwcCIsInN1YiI6IkF1dGhvcml6YXRpb24iLCJleHAiOjE2MDU1MTI1MjQsInJvbCI6WyJST0xFX1VTRVIiXSwiZCpzaWciOnsicCI6InpXNzB4IiwicyI6bnVsbCwidSI6ImI5ZjhkYzBjZTgyNWM2MTI2ODExMTE1ZDhkMjViODgxIiwiZiI6InhzeiM5In19.khdbdVTXTiB2KZJiRCgOuGuif7RMokYFuAWUUgRs_BOpDtgEKCHEEi1T_qYUq_9P_EhuYUTZne6U0225djjsYQ';
        // var setting = {
        //     "url":"https://trackapi.thailandpost.co.th/post/api/v1/track",
        //     "method":"POST",
        //     "timeout": 0,
        //     "headers": {"Content-Type":"application/json","Authorization": "Token eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJzZWN1cmUtYXBpIiwiYXVkIjoic2VjdXJlLWFwcCIsInN1YiI6IkF1dGhvcml6YXRpb24iLCJleHAiOjE2MDU1MTI1MjQsInJvbCI6WyJST0xFX1VTRVIiXSwiZCpzaWciOnsicCI6InpXNzB4IiwicyI6bnVsbCwidSI6ImI5ZjhkYzBjZTgyNWM2MTI2ODExMTE1ZDhkMjViODgxIiwiZiI6InhzeiM5In19.khdbdVTXTiB2KZJiRCgOuGuif7RMokYFuAWUUgRs_BOpDtgEKCHEEi1T_qYUq_9P_EhuYUTZne6U0225djjsYQ" },
        //     "data": JSON.stringify({"barcode": [tracking_number],"language":"TH","status": "all"}),
        // };
        // $.ajax(setting).done(function(respone){
        //     console.log(respone);
        // });
    });
</script>


{{-- Ajax for EMS --}}
<script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script>
    $('#ems').on('click',function(){

        var tracking_number = $('input[name="tracking_number3"]').val();

        var token = 'Token eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJzZWN1cmUtYXBpIiwiYXVkIjoic2VjdXJlLWFwcCIsInN1YiI6IkF1dGhvcml6YXRpb24iLCJleHAiOjE2MDU1MTI1MjQsInJvbCI6WyJST0xFX1VTRVIiXSwiZCpzaWciOnsicCI6InpXNzB4IiwicyI6bnVsbCwidSI6ImI5ZjhkYzBjZTgyNWM2MTI2ODExMTE1ZDhkMjViODgxIiwiZiI6InhzeiM5In19.khdbdVTXTiB2KZJiRCgOuGuif7RMokYFuAWUUgRs_BOpDtgEKCHEEi1T_qYUq_9P_EhuYUTZne6U0225djjsYQ';
        var ems = {
            "url":"https://trackapi.thailandpost.co.th/post/api/v1/track",
            "method":"POST",
            "timeout": 0,
            "headers": {"Content-Type":"application/json","Authorization": "Token eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJzZWN1cmUtYXBpIiwiYXVkIjoic2VjdXJlLWFwcCIsInN1YiI6IkF1dGhvcml6YXRpb24iLCJleHAiOjE2MDU1MTI1MjQsInJvbCI6WyJST0xFX1VTRVIiXSwiZCpzaWciOnsicCI6InpXNzB4IiwicyI6bnVsbCwidSI6ImI5ZjhkYzBjZTgyNWM2MTI2ODExMTE1ZDhkMjViODgxIiwiZiI6InhzeiM5In19.khdbdVTXTiB2KZJiRCgOuGuif7RMokYFuAWUUgRs_BOpDtgEKCHEEi1T_qYUq_9P_EhuYUTZne6U0225djjsYQ" },
            "data": JSON.stringify({"barcode": [tracking_number],"language":"TH","status": "all"}),
        };



        $.ajax(ems).done(function (respone) {
            var tracking = $('input[name="tracking_number3"]').val();
            // console.log(respone.response.items[tracking].pop());
            var data = respone.response.items[tracking].pop();
            $('#status_ems').text(data.status_description);
            $('#city_ems').text(data.location);

            // var date = $("#time_ems").val($.datepicker.formatDate('Yr, Month D', new Date(data.delivery_datetime)));
            // console.log(data.delivery_datetime);
             var times = getDateFormat(data.delivery_datetime);



            $('#time_ems').text(times);




            // $('#time_ems').text(data.delivery_datetime);
            //     moment.locale('th');
            //     $("#time_ems").html(moment().format('LLLL'));


        });
        function getDateFormat(data){
            var data = data.split('+')[0].split(' ');
            var date = data[0].split('/');
            var time = data[1];
            // console.log(date);
            // console.log(time);
            newFormat = date[2]+"-"+date[1]+"-"+date[0]+" "+time;
            // console.log(newFormat);
            var time = new Date(newFormat);
            // console.log(time);
            h = time.getHours(); // 0-24 format
            m = (time.getMinutes() < 10 ? '0':'' )+time.getMinutes();
            y = time.getFullYear();
            mm = time.getMonth();
            d = time.getDate();
            var month = ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];




            return d+' '+month[mm]+' '+y+'  '+h+':'+m+' น.';
        }



    });

    $('#bestexpress').on('click',function(){

        var tracking_number = $('input[name="tracking_number3"]').val();
        var bestexpress = {
            "url": "https://api.best-inc.co.th/express/expresslistinfo?expressids="+tracking_number+"",
            "method": "POST",
            "timeout": 0,
        };

        $.ajax(bestexpress).done(function (response) {
            console.log(response);
            window.open("https://www.best-inc.co.th/track?bills="+tracking_number+"", '_blank');
        });
    });

    $('#speed_d').on('click',function(){
        var tracking_number = $('input[name="tracking_number3"]').val();
        var speed_d = {
                "url": "https://api.sendit.asia/oms/api/v2/public/status-tracking/"+tracking_number+"",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(speed_d).done(function (response) {
                console.log(response);
                window.open("https://speed-d.allnowgroup.com/status-tracking/"+tracking_number+"", '_blank');
        });
    })

</script>



{{-- Edit Tracking --}}
<script>
    $('.save_edit').on('click', function () {
        var tracking_edit = $('input[name="tracking_edit"]').val();
        var inv_ref = '{{ $basket_all[0]->inv_ref }}';
        var shop_id = '{{ $basket_all[0]->shop_id }}';

        // console.log(tracking_edit);

        if (tracking_edit != '') {

            $.ajax({
                url: '/shop/updateTrackingNumber',
                type: 'POST',
                data: {
                    tracking_edit: tracking_edit,
                    inv_ref: inv_ref,
                    shop_id: shop_id,
                    _token: '{{ csrf_token() }}',
                },
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Update tracking no successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('.modal').modal('hide');
                    $('input[name="tracking_number3"]').val(data.tracking_number);
                },
                error: function (data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to update tracking no.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });

        }else{
            Swal.fire({
                // position: 'top-end',
                icon: 'warning',
                title: 'Please input tracking no.',
                showConfirmButton: false,
                timer: 1500
            });

        }



    });




</script>


@endsection
