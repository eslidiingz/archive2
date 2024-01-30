@extends('layouts.profile')
@section('content')

<div class="content ml-3 p-2">
    <form action="#" class="form-inline p-1">
        <h3 class="h3 medium">วิสลิสต์ของฉัน</h3>
        <h6 class="h6 light" style="text-align:right;
                                     margin-left:510px;
                                     text-decoration-line: underline;
                                     color:blue;
                                     font-weight:700">เพิ่มสินค้าทั้งหมดไปยังรถเข็น</h6>
    </form>

    <div class="card">
        <div class="contanier">
            <ul class="nav nav-tabs">
                <li class="nav-item h4 light"><a class="nav-link active bold black pt-2 pl-2" data-toggle="tab" href="#">รายการที่ชอบ</a></li>
            </ul>
            <div class='tab-content'>
                <div class="row justify-content-center tab-pane fade show active" id="#">
                    <div class="container">
                        <div class="card">
                            <h6 class="h6 light m-2">ร้าน Holidays Queen</h6>
                            <div class="card-body form-inline p-3 align-items-start">
                                <div class="col-md-2">
                                    <img src="\img\product\3.jpg" class="pic_wish img-fluid img-thumbnail">
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="row">
                                        <span>FANTECH รุ่น HG15 Captain ระบบ 7.1 Stereo Headset for
                                            Gaming หูฟังเกมมิ่ง แฟนเทค หูฟังครอบหู มีไมโครโฟน....</span>
                                        <img class="p" src="/img/profile/Group 2810.png" style="width: 20px;height: 20px; margin-top:10px">
                                    </div>
                                </div>
                                <div class="col-md-4 m-0 " style="background-color: #f8eaf3; border-radius: 8px;">
                                    <div class="row">
                                        <div class="col-md-5 p-2 ">
                                            <span class="h6 medium" style="font-size:18px">฿350</span>
                                            <span style="text-decoration: line-through;">฿1140</span><br>
                                            <span class="h6 medium" style="font-size: 13px;color:#23c197;">↓ ราคาลดลง</span>
                                        </div>
                                        <div class="col-md-7 pt-4">
                                            <label class="textcss">
                                                <img class="button-basket-img" src="/img/profile/shopping-cart.png" id="pic_wish">
                                                <label type="button" class="pl-2 h6 light" id="btn_wish">ใส่ลงตะกร้า</label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body form-inline p-3 align-items-start">
                                <div class="col-md-2 outstock">
                                    <img src="\img\product\3.jpg" class="pic_wish grayscale pic_outstock img-fluid img-thumbnail">
                                    <div class="label_outstock">
                                        <label id="btn_no_wish_in_img">ไม่มีสินค้า</label>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="row">
                                        <span>FANTECH รุ่น HG15 Captain ระบบ 7.1 Stereo Headset for
                                            Gaming หูฟังเกมมิ่ง แฟนเทค หูฟังครอบหู มีไมโครโฟน....</span>
                                        <img class="p grayscale" src="/img/profile/Group 2810.png" style="width: 20px;height: 20px; margin-top:10px">
                                    </div>
                                </div>
                                <div class="col-md-4 m-0 d-flex align-items-end flex-column " style="border-radius: 8px;">
                                    <label type="button" class="pl-2 h6 light " id="btn_not_wish">ไม่มีสินค้า</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h6 class="h6 light m-2">ร้าน Awesome Wanchai</h6>
                        <div class="card-body form-inline p-3 align-items-start">
                            <div class="col-md-2">
                                <img src="\img\product\3.jpg" class="pic_wish img-fluid img-thumbnail">
                            </div>
                            <div class="col-md-6 p-0">
                                <div class="row">
                                    <span>FANTECH รุ่น HG15 Captain ระบบ 7.1 Stereo Headset for
                                        Gaming หูฟังเกมมิ่ง แฟนเทค หูฟังครอบหู มีไมโครโฟน....</span>
                                    <img class="p" src="/img/profile/Group 2810.png" style="width: 20px;height: 20px; margin-top:10px">
                                </div>
                            </div>
                            <div class="col-md-4 m-0 " style="background-color: #f8eaf3; border-radius: 8px;">
                                <div class="row">
                                    <div class="col-md-5 p-2 ">
                                        <span class="h6 medium" style="font-size:18px">฿350</span>
                                        <span style="text-decoration: line-through;">฿1140</span><br>
                                        <span class="h6 medium" style="font-size: 13px;color:#23c197;">↓ ราคาลดลง</span>
                                    </div>
                                    <div class="col-md-7 pt-4">
                                        <label class="textcss">
                                            <img src="/img/profile/shopping-cart.png" id="pic_wish">
                                            <label type="button" class="pl-2 h6 light" id="btn_wish">ใส่ลงตะกร้า</label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



@stop