@extends('new_ui.layouts.front-end')
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
    <div class="row p-4 rounded8px" style="background-color: #fff;">
        <div class="col-12">
            <h4><strong style="color: #c75ba1;">สินค้า</strong></h4>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center">
                    <h5 class="mb-0">SAVEAGE</h5>
                </div>
                <div class="col-lg-3 col-md-6 col-12 ml-auto d-flex flex-row justify-content-end">
                    <div class="btn-outline-c45e9f btn form-control mb-2 mr-2"><img src="new_ui/img/icon-shop.svg" style="width: 20px;" class="mr-2" alt="">ไปที่ร้านค้า</div>
                    <div class="btn-outline-c45e9f btn form-control"><img src="new_ui/img/icon-chat.svg" style="width: 20px;" class="mr-2" alt="">แชทเลย</div>
                </div>
            </div>
        </div>
        <div class="col-12 px-0">
            <table class="table-bordered">
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td scope="row" class=" text-right" data-label="สินค้าทั้งหมด">
                            <div class="row">
                                <div class="col-12 text-lg-left text-md-right text-sm-right">
                                    <div class="media">
                                        <img src="img/product/product-11.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
                                        <div class="media-body">
                                            <h6 class="mt-0"><strong>Basics by sita | A224 - One Button Box by sita
                                                    Button....</strong></h6>
                                            สีน้ำตาล,S
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="width200 text-right" data-label="ราคา/จำนวน">
                            <div class="row ">
                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                    <h4 class="mb-0"><strong style="color: #c75ba1;">฿ 350</strong></h4>
                                </div>
                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                    <h6 class="mb-0" style="color: #919191;">฿ 1140 <span style="color: #000;">(-37%)</span></h6>
                                </div>
                            </div>
                        </td>
                        <td class="width200 " data-label="จำนวน">
                            <div class="row">
                                <div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
                                    <h6 class="mb-0"><strong>x2</strong></h6>
                                </div>
                            </div>
                        </td>
                        <td class="width200 " data-label="ราคารวม">
                            <div class="row">
                                <div class="col-12 mb-2 text-lg-center text-md-right text-sm-right">
                                    <h4 class="mb-0"><strong style="color: #c75ba1;">฿ 700</strong></h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row p-4 rounded8px mb-3" style="background-color: #fafaff;">
        <div class="col-lg-6 col-md-6 col-12" style="border-right: 1px solid #efefef;">
            <div class="row">
                <div class="col-12">
                    <h4><strong style="color: #c75ba1;">ข้อความถึงผู้ขาย</strong></h4>
                </div>
                <div class="col-12 mb-4">
                    <input type="test" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="row">
                <div class="col-12">
                    <h4><strong style="color: #c75ba1;">การจัดส่ง</strong></h4>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <h6 class="mb-0">Kerry Express ฿ 60</h6>
                    <a href="#">
                        <h6 class="mb-0" style="color: #1947e3; text-decoration: underline;">เปลี่ยน</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @foreach($address->where('status',1) as $add)
    <div class="row p-4 rounded8px mb-3" style="background-color: #fff;">
        <div class="col-12 mb-2">
            <h4><strong style="color: #c75ba1;">ที่อยู่ในการจัดส่ง</strong></h4>
        </div>
        <div class="col-lg-10 col-md-10 col-12">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <h6><strong>ชื่อ - นามสกุล</strong><span id="shipping_name">{{ $add->name }}</span></h6>
                    <h6><strong>เบอร์โทรศัพท์</strong> (+66) <span id="shipping_tel">{{ $add->tel }}</span></h6>
                </div>
                <div class="col-lg-5 col-md-6 col-12">
                    <h6 style="line-height: 25px;"><strong>ที่อยู่</strong><span id="shipping_address">{{ $add->address1 }} {{ $add->add }}
                            {{ $add->district }} {{ $add->county }} {{ $add->city }}
                            {{ $add->zipcode }} </span><span style="color: #c75ba1;">(ที่อยู่หลัก)</span></h6>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-12 d-flex justify-content-end">
            <a href="#" data-toggle="modal" data-target="#change_address">
                <h6 class="mb-0" style="color: #1947e3; text-decoration: underline;">เปลี่ยน</h6>
            </a>
        </div>
    </div>
    @endforeach

    <div class="modal" id="change_address">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เปลี่ยนสถานที่ส่ง</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($address as $item)
                    <div class='col-lg-12 col-12 px-2 chkmodal'>
                        <div class='col-lg-12 col-md-12 col-12 px-0 mt-4 o-bg-box'>
                            <div>
                                <div class="col-lg-12 col-md-12 col-sm-12 py-4">
                                    <div class="row">
                                        <div class="col-lg-12 address_pay">
                                            <div class='form-row'>
                                                <div class='mb-4 col-lg-3 col-md-3 col-8 text-md-right text-lg-right order-1 order-md-1 order-lg-1'>
                                                    <strong>ชื่อ - นามสกุล</strong>
                                                </div>
                                                <div class='col-lg-6 col-md-6 col-7 mb-4 pr-lg-0 pr-md-0 order-3 order-md-2 order-lg-2'>
                                                    <input readonly type="text" value='{{ $item->name }} {{ $item->surname }}' class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ชื่อ - นามสกุล" style="background-color: #ededed; border: none;">
                                                </div>
                                                <div class='col-lg-2 col-md-2 col-5 order-4 order-md-3 order-lg-3'>

                                                    <button data-name="{{ $item->name }} {{ $item->surname }}" data-tel="{{ $item->tel }}" data-address="{{ $item->address1 }} {{ $item->item }} {{ $item->district }} {{ $item->county }} {{ $item->city }} {{ $item->zipcode }}" class="btn btn-primary change_addtess" type="button">
                                                        เลือกที่ตั้งนี้
                                                    </button>

                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='mb-4 col-lg-3 col-md-3 col-12 text-md-right text-lg-right'>
                                                    <strong>หมายเลขโทรศัพท์</strong>
                                                </div>
                                                <div class='col-lg-9 col-md-9 col-12 mb-4'>
                                                    <input readonly type="text" value='{{ $item->tel }}' class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="(+66) 081-441-9585" style="background-color: #ededed; border: none;">
                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='mb-4 col-lg-3 col-md-3 col-12 text-md-right text-lg-right'>
                                                    <strong>ที่อยู่</strong>
                                                </div>
                                                <div class='col-lg-9 col-md-9 col-12 mb-4'>
                                                    <textarea readonly class="form-control" rows="4" style="background-color: #ededed; border: none;">{{ $item->address1 }}
                                                    {{ $item->item }} {{ $item->district }}
                                                    {{ $item->county }} {{ $item->city }}
                                                    {{ $item->zipcode }}</textarea>
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

            </div>
        </div>
    </div>


    <div class="row p-4 rounded8px mb-3" style="background-color: #fff;">
        <div class="col-12 mb-2">
            <h4><strong style="color: #c75ba1;">วิธีชำระเงิน</strong></h4>
        </div>
        <div class="col-12">
            <div class="form-group d-lg-none d-md-none d-block">
                <select class="form-control" id="select-submenu">
                    <option value="1">T10 วอลเล็ท</option>
                    <option value="2">บัตรเครดิต/บัตรเดบิต</option>
                    <option value="3">โมบายแบงค์กิ้ง</option>
                    <option value="4">โอนเงินธนาคาร</option>
                </select>
            </div>
            <div class="d-lg-block d-md-block d-none">
                <ul class="nav nav-tabs row" id="myTab" role="tablist">
                    <li class="nav-item col-lg-3  col-md-6 col-6 mb-md-4" role="presentation">
                        <a class="nav-link active d-flex justify-content-center align-items-center flex-column py-4" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="true">
                            <img src="new_ui/img/payment/payment-1.png" style="width: 100px;" alt="">
                            <h6 class="mb-0 text-center mt-2">T10 วอลเล็ท</h6>
                            <h6 class="mb-0 text-center" style="color: #23c197;">ฟรีค่าธรรมเนียม</h6>
                        </a>
                    </li>
                    <li class="nav-item col-lg-3  col-md-6 col-6 mb-md-4" role="presentation">
                        <a class="nav-link d-flex justify-content-center align-items-center flex-column py-4" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab" aria-controls="list-2" aria-selected="false">
                            <img src="new_ui/img/payment/payment-2.png" style="width: 100px;" alt="">
                            <h6 class="mb-0 text-center mt-2">บัตรเครดิต/บัตรเดบิต</h6>
                            <h6 class="mb-0 text-center" style="color: #23c197;">SECURITY GUARANTEED</h6>
                        </a>
                    </li>
                    <li class="nav-item col-lg-3  col-md-6 col-6 mb-md-4" role="presentation">
                        <a class="nav-link d-flex justify-content-center align-items-center flex-column py-4" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab" aria-controls="list-3" aria-selected="false">
                            <img src="new_ui/img/payment/payment-3.png" style="width: 100px;" alt="">
                            <h6 class="mb-0 text-center mt-2">โมบายแบงค์กิ้ง</h6>
                            <h6 class="mb-0 text-center" style="color: #23c197;">รอยืนยัน 45 นาที หลังชำระเงิน</h6>
                        </a>
                    </li>
                    <li class="nav-item col-lg-3  col-md-6 col-6 mb-md-4" role="presentation">
                        <a class="nav-link d-flex justify-content-center align-items-center flex-column py-4" id="list-4-tab" data-toggle="tab" href="#list-4" role="tab" aria-controls="list-4" aria-selected="false">
                            <img src="new_ui/img/payment/payment-4.png" style="width: 100px;" alt="">
                            <h6 class="mb-0 text-center mt-2">โอนเงินธนาคาร</h6>
                            <h6 class="mb-0 text-center" style="color: #23c197;">รอยืนยัน 45 นาที หลังชำระเงิน</h6>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-tab">
                    @include('new_ui.payment-page.payment-t10')
                </div>
                <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-tab">
                    @include('new_ui.payment-page.payment-credit')
                </div>
                <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-tab">
                    @include('new_ui.payment-page.payment-bank1')
                </div>
                <div class="tab-pane fade" id="list-4" role="tabpanel" aria-labelledby="list-4-tab">
                    @include('new_ui.payment-page.payment-bank2')
                </div>
            </div>
        </div>
    </div>
    <div class="row px-4 pt-4 pb-0" style="background-color: #fff; border-radius: 8px 8px 0 0;">
        <div class="col-lg-6 col-md-6 col-12 mb-2">
            <h4><strong style="color: #c75ba1;">เหรียญ T10</strong></h4>
            <input type="text" class="form-control" id="exampleCoin" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6 col-md-6 col-12 mb-2">
            <h4><strong style="color: #c75ba1;">คูปอง / ส่วนลดของฉัน</strong></h4>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="กรุณาเลือกโค้ด" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text btn-c75ba1" style="border-color: #c75ba1;" id="basic-addon2">เลือกโค้ดส่วนลด</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-4" style="background-color: #fafaff; border-radius: 0 0 8px 8px;">
        <div class="col-lg-3 col-md-6 col-12 ml-auto">
            <div class="row">
                <div class="col-6">
                    <h6 class="mb-2">ยอดรวมสินค้า</h6>
                    <h6 class="mb-2">ส่วนลด</h6>
                    <h6 class="mb-2">ค่าส่ง</h6>
                    <h6 class="mb-2">รวมราคาทั้งหมด</h6>
                </div>
                <div class="col-6 text-right">
                    <h6 class="mb-2">฿ 700</h6>
                    <h6 class="mb-2" style="color: #c40000;">-100</h6>
                    <h6 class="mb-2">฿ 60</h6>
                    <h4 class="mb-2"><strong style="color: #c75ba1;">฿ 660</strong></h4>
                </div>
            </div>
        </div>
        <div class="col-12">
            <hr class="w-100">
        </div>
        <div class="col-lg-2 col-md-3 col-12 ml-auto">
            <button class="btn btn-c75ba1 form-control">สั่งสินค้า</button>
        </div>
    </div>

</div>
@endsection


@section('script')

<script>
    $('#select-submenu').on('change', function() {
        value = $(this).val();
        $('a.nav-link[href="#list-' + value + '"]').click();
    });
</script>
<script>
    $(document).ready(function() {
        $('.change_addtess').on('click', function() {
            $('#change_address').modal('hide');
            var name = $(this).data('name');
            var tel = $(this).data('tel');
            var address = $(this).data('address');
            $('#shipping_name').html(name);
            $('#shipping_tel').html(tel);
            $('#shipping_address').html(address);
        });
    });
</script>
@endsection