{{-- <!-- <div class="row">
    <div class="col-lg-4 col-md-6 col-12 mt-4 ">
        <div class="row mx-0 p-4 rounded8px align-items-center position-relative" style="background-color: #f8eaf3;">
            <img src="/new_ui/img/footer/icon-payment-3.png" alt="" style="width: 100px;">
            <h6 class="mb-0"><strong>ธนาคารกสิกรไทย</strong> * 6702</h6>
            <div class="dropdown position-absolute" style="right: 20px; top: 10px;">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">แก้ไข</a>
                    <a class="dropdown-item" href="#">ลบ</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12 mt-4 nav-tabs">
        <div class="row mx-0 p-4 rounded8px align-items-center position-relative" style="background-color: #f8eaf3;">
            <img src="/new_ui/img/footer/icon-payment-2.png" alt="" style="width: 100px;">
            <h6 class="mb-0"><strong>ธนาคารไทยพาณิชย์</strong> * 5116</h6>
            <div class="dropdown position-absolute" style="right: 20px; top: 10px;">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">แก้ไข</a>
                    <a class="dropdown-item" href="#">ลบ</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4">
        <button class="btn btn-light form-control" style="color: #1947e3; background-color: #fafaff;"><i
                class="fa fa-plus" aria-hidden="true"></i> เพิ่มบัตรเครดิต/เดบิต</button>
    </div>
</div> -->

<?php
    //$inv_ref=$_GET['inv_ref'];
    // $request_data = DB::select('select invs.user_id, invs.inv_ref, invs.total, invs.inv_products, users.name, users.email from invs
                                                        // join users on invs.user_id = users.id
                                                        // where invs.inv_ref = ?',[$inv_ref]);

    // $product_id = json_decode($request_data[0]->inv_products);
    // $product_id = $product_id[0]->product_id;


    // $product_name = DB::select('select name from product_s where id = ?',[$product_id]);

    // $total = str_replace('.','',$request_data[0]->total);

    // $pay_type = 'PACA';
    // $secure_key = '4ReIqL-vl8e3VtOQqyfFoDUlLxeI.Ojed4y3NiVWVwu7Aa8BVM7BSPjdeYw58wnrwslP6cdGX0673ru-dBuL-pI-fcNOUETfYgnvLW.88AqWryMG023TKHkG5K7S5B5na6oKJhRixnOzk1Wxoe1mmFWdjOlyDyTcqdde4c9fgLsOrr61NcJfUrJH2P8VERI-fsHnCVpYbTpm-1ovhDj-hHeh4gSJ2P1XKMiXuZcDvfVMUDs2EAKPlVAubZBt2sas0FH2Yk7H6PjLiJXTlpdlZruIaGddoPqzW9wEE7LQ76Ga35SZGM6EFJsQq2B9P7A7fiEreAz210NY1QpSzoNmQWY__';
    // $site_cd = 'A0001116P8';

    // $hash_string  = $pay_type . $inv_ref . $total . $site_cd . $secure_key . $request_data[0]->user_id;
    // $hash_data = hash('sha256', $hash_string);
    ?>
                <div class="row m-1 mt-4 p-2 pt-3 col-12" id="sub-payment-method2">
                    <div class="col">
                        <label class="row col-12">
                            <div class="col-1 mt-2">
                                <input required type="radio"  id="credit"  name="credit" value="credit">
                            </div>
                            <div class="col-3">
                                <img src="/img/icon/Group 2843.svg" alt="">
                            </div>
                            <div class="col-7 mt-2">
                                <h6 class="regular black">Credit/Debit</h6>
                            </div>
                        </label>
                    </div>
                    <div class="col">
                        <div class="row">
                            <h6 class="regular black mb-1">ชำระเงินอย่างไร</h6>
                        </div>
                        <hr>
                        <pre class="row black regular thin">
                            1. เลือกจ่ายบิล / ชำระค่าบริการ
                        </pre>
                    </div>
                    <div class="card col-12 mt-0 border-0  p-4 bg-fafaff rounded-bottom-lg" id="flash-sale" style="">
                        <div class="row mb-1 justify-content-end">
                            <div class="col-2 ">
                                <h6 class="regular black mb-2">ยอดรวมสินค้า</h6>
                                <h6 class="regular black mb-2">ส่วนลด</h6>
                                <h6 class="regular black mb-2">ค่าส่ง</h6>
                                <h6 class="regular black mb-2">รวมราคาทั้งหมด</h6>
                            </div>
                            <div class="col-2">
                                <h6 class="regular black mb-2">฿ {{$total_price}}</h6>
                                <h6 class="regular text-danger mb-2">-฿ 0</h6>
                                <h6 class="regular black mb-2">฿ 0</h6>
                                <h5 class="regular pink mb-2">฿ {{$total_price}}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-1 justify-content-end">
                            <form method="post" action="https://paytest.treepay.co.th/total/hubInit.tp">
                                @csrf
                                <div class="form-group" hidden>
                                    <input type="text" class="form-control" name="order_no" value="{{$inv_ref}}" >
                                    <input type="text" class="form-control" name="ret_url" value="http://127.0.0.1:8000/checkout/credit/return" >
                                    <input type="text" class="form-control" name="user_id" value="{{$request_data[0]->user_id}}" >
                                    <input type="text" class="form-control" name="good_name" value="{{$product_name[0]->name}}" >
                                    <input type="text" class="form-control" name="trade_mony" value="{{$total}}" >
                                    <input type="text" class="form-control" name="order_first_name" value="{{$request_data[0]->name}}" >
                                    <input type="text" class="form-control" name="order_email" value="{{$request_data[0]->email}}" >
                                    <input type="text" class="form-control" name="currency" value="764" >
                                    <input type="text" class="form-control" name="pay_type" value="{{$pay_type}}" >
                                    <input type="text" class="form-control" name="site_cd" value="{{$site_cd}}" >
                                    <input type="text" class="form-control" name="hash_data" value="{{$hash_data}}" >
                                </div>
                                <div class="form-group">
                                    <button type=submit class="btn btn-success col" style="height: 35px !important"><h6 class="regular white">สั่งซื้อสินค้า</h6> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
