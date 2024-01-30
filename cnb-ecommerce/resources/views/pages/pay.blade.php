@extends('layouts.default')
@section('content')
<div class="">
    <div class="container">
    <div class="row justify-content-center" style="">
        <div class="card col-8 mt-4 white border-0 rounded p-4" id="flash-sale" style="">
            <div class="col">
                <h3 class="pink regular">สินค้า</h3>
            </div>
        @foreach ($basket_all as $key=>$item)
        <div class="col-12 mt-2 white border-0 rounded" id="flash-sale" style="">
            <div class="row black h5 regular">
                {{-- {{$item->inv_ref}} --}}
                <div class="mr-4">
                    {{$item->shops[0]->shop_name}}
                </div>
                <button type="" class="btn btn-md btn-outline-primary pb-1 pt-1 pr-3 pl-3 d-inline-block mr-2" >ไปที่ร้านค้า</button>
                <button type="" class="btn btn-md btn-outline-primary pb-1 pt-1 pr-3 pl-3 d-inline-block" >แชทเลย</button>
            </div>
            {{-- {{dd($item->inv_products)}} --}}
            @foreach ($item->inv_products as $key1=>$item1)
           {{-- {{ dd($item1['product_id'])}} --}}
            <hr>
                <div class="row black" style="height: 100px">
                     @foreach ($product_all as $item2)
                        @if ( $item2->id == $item1['product_id'])
                            <div class="col-6 pl-0">
                                <div class="row">
                                    <div class="col-4 mt-2 ml-4 pl-0 regular">
                                        <?php $front_image = $item2->product_img[0]?>
                                        @if ($front_image=='0'||$front_image==null)
                                        <img style="
                                        width:  80%;
                                        height: 60%;
                                        margin-bottom:5%;
                                        object-fit: cover;" src="/img/no_image.png" alt="">
                                        @else
                                        <img style="
                                        width:  80%;
                                        height: 60%;
                                        margin-bottom:5%;
                                        object-fit: cover;" src="/img/product/{{$front_image}}" alt="">
                                        @endif
                                    </div>
                                    <div class="col-6 mt-2 regular p-0 ">
                                        <div class="row crop-text-2" style="height: 57px">
                                            <h5>{{$item2->name}}</h5>
                                        </div>
                                        <div class="row">
                                            <h6 style="opacity: 0.5">{{$item1['dis2']}} , {{$item1['dis1']}}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-2 mt-2 regular pink">
                                <h5>{{$item1['price']}}</h5>
                            </div>
                            <div class="col-2 mt-2 regular pink">
                                <h5>{{$item1['amount']}}</h5>
                            </div>
                            <div class="col-1 mt-2 regular pink">
                                <h5>{{$item1['price']*$item1['amount']}}</h5>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
        @endforeach
    </div>

    <div class="card col-8 mt-3 white border-0 rounded p-4" id="flash-sale" style="">
        <div class="row mb-1">
            <div class="col">
                <h4 class="regular pink">ที่อยู่ในการจัดส่ง</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($address_all->take(1) as $address)
            <div class="col-2">
                <h5 class="regular black">ชื่อ - นามสกุล</h5>
                <h5 class="regular black">เบอร์โทร</h5>
            </div>
            <div class="col">
                <h5 class="thin black">{{$address->name}} {{$address->surname}}</h5>
                <h5 class="thin black">{{$address->tel}}</h5>
            </div>
            <div class="col-1">
                <h5 class="regular black">ที่อยู่</h5>
            </div>
            <div class="col">
                <h5 class="thin black">{{$address->address1}} {{$address->address2}} {{$address->county}} {{$address->district}}
                    {{$address->city}} {{$address->zipcode}}</h5>
            </div>
            <div class="col-1 regular blue">
                <a class="" onclick="test()"><u>เปลี่ยน</u></a>
            </div>
            @endforeach

        </div>


    </div>

    <div class="card col-8 mt-3 white border-0 rounded p-4" id="flash-sale" style="">
        <div class="row mb-1">
            <div class="col">
                <h4 class="regular pink">วิธีชำระเงิน</h4>
            </div>
        </div>
        <?php $src = ['Group 2890.svg','Group 2845.svg','Group 2843.svg','Group 2848.svg'];
              $h5 = ['โอนเงินธนาคาร','โมบายแบงค์กิ้ง','บัตรเครดิต / บัตรเดบิต','T10 วอลเล็ท'];
              $h6 = ['รอยืนยัน 45 นาทีหลังชำระเงิน','รอยืนยัน 45 นาทีหลังชำระเงิน','SECURITY GUARANTEED','ฟรีค่าธรรมเนียม'];
              $banck_name = ['ธนาคารไทยพาณิชย์','ธนาคารกรุงเทพ','ธนาคารกรุงไทย','ธนาคารกสิกรไทย'];
              $bank_icon = ['Group 151.svg','Group 149.svg','Group 157.svg','Group 156.svg'];

        ?>
        <div class="row">
            <div class="d-flex col-12">
            @foreach ($src as $key=>$src )
                <a class="col card bg-fafaff border-0 m-1 p-2 pt-3 text-center" id="payment-method{{$key}}">
                    {{-- <input required type="radio"  id="payment_method"  name="payment_method" style="display: none"> --}}
                    <img src="/img/icon/{{$src}}" alt="">
                    <h5 class="regular black mt-2 mb-1">{{$h5[$key]}}</h5>
                    <h6 class="regular green mt-0">{{$h6[$key]}}</h6>
                </a>
            @endforeach
            </div>
        </div>
        <div class="row">
            {{-- <div class="col card bg-fafaff border-0 m-1 mt-4 p-2 pt-3 text-center" id="sub-payment-method">
                <a><h5 class="regular blue mt-2 mb-1">+ เพิ่มบัญชี T10 วอลเล็ท</h5></a>
            </div> --}}
            <div class="row m-1 mt-4 p-2 pt-3 col-12" id="sub-payment-method" style="display: none">
                <div class="col">
                    @foreach ($banck_name as $key=>$src )
                    <label class="row col-12">
                        <div class="col-1 mt-2">
                            <input required type="radio"  id="bank"  name="bank" value="bank{{$key}}">
                        </div>
                        <div class="col-2">
                            <img src="/img/icon/{{$bank_icon[$key]}}" alt="">
                        </div>
                        <div class="col-8 mt-2">
                            <h6 class="regular black">{{$src}}</h6>
                        </div>
                    </label>
                    @endforeach
                </div>
                <div class="col">
                    <div class="row">
                        <h6 class="regular black mb-1">ชำระเงินอย่างไร</h6>
                    </div>
                    <hr>
                    <pre class="row black regular thin">
1. เลือกจ่ายบิล / ชำระค่าบริการ
2. เลือกอื่นๆ > รหัสบริษัท > ระบุรหัสบริษัท > ออมทรัพย์
3. ใส่รหัสบริษัท 12345
4. ระบุหมายเลขอ้างอิงการชำระเงินสำหรับ “REF1”
5. ระบุหมายเลขโทรศัพท์มือถือ สำหรับ “REF2”
6. ระบุยอดเงิน
7. หมายเหตุ : ค่าธรรมเนียมขึ้นกับธนาคา หรือ ผู้ให้บริการ
                    </pre>

                </div>
            </div>


            <div class="row m-1 mt-4 p-2 pt-3 col-12" id="sub-payment-method1" style="display: none">
                <div class="col">
                    <label class="row col-12">
                        <div class="col-1 mt-2">
                            <input required type="radio"  id="bank"  name="bank" value="mobilebanking">
                        </div>
                        <div class="col-3">
                            <img src="/img/icon/Group 2845.svg" alt="">
                        </div>
                        <div class="col-7 mt-2">
                            <h6 class="regular black">โมบายแบงค์กิ้ง</h6>
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
            </div>


            <div class="row m-1 mt-4 p-2 pt-3 col-12" id="sub-payment-method3" style="display: none">
                <div class="col">
                    <label class="row col-12">
                        <div class="col-1 mt-2">
                            <input required type="radio"  id="bank"  name="bank" value="t10wallet">
                        </div>
                        <div class="col-3">
                            <img src="/img/icon/Group 2848.svg" alt="">
                        </div>
                        <div class="col-7 mt-2">
                            <h6 class="regular black">T10 วอลเล็ท</h6>
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
            </div>




        </div>
    </div>

    <div class="card col-8 mt-3 white border-0 rounded-lg p-4" id="flash-sale" style="">
        <div class="row mb-1">
            <div class="col border-right pb-3">
                <h4 class="regular pink mb-3">เหรียญ T10</h4>
                <input type="number"class="form-control form" placeholder="จำนวนเหรียญที่ต้องการใช้">
            </div>
            <div class="col">
                <h4 class="regular pink mb-3">คูปอง / ส่วนลดของฉัน</h4>
                <div class="row">
                    <input type="number"  class="form-control form col" placeholder="ใส่โค้ดส่วนลด">
                    <button class="btn btn-success col" style="height: 35px !important"><h6 class="regular white">ใส่โค้ดส่วนลด</h6> </button>
                </div>
            </div>
        </div>


    </div>
    <div class="card col-8 mt-0 border-0  p-4 bg-fafaff rounded-bottom-lg" id="flash-sale" style="">
        <div class="row mb-1 justify-content-end">
            <div class="col-2 ">
                <h6 class="regular black mb-2">ยอดรวมสินค้า</h6>
                <h6 class="regular black mb-2">ส่วนลด</h6>
                <h6 class="regular black mb-2">ค่าส่ง</h6>
                <h6 class="regular black mb-2">รวมราคาทั้งหมด</h6>
            </div>
            <div class="col-2">
                <h6 class="regular black mb-2">฿ {{$basket_all->sum('total')}}</h6>
                <h6 class="regular text-danger mb-2">-฿ 0</h6>
                <h6 class="regular black mb-2">฿ 0</h6>
                <h5 class="regular pink mb-2">฿ {{$basket_all->sum('total')}}</h5>
            </div>
        </div>
        <hr>
        <div class="row mb-1 justify-content-end">
            <a class="col-2"  href="" id="comfirm_buy">
                <button class="btn btn-success col" style="height: 35px !important"><h6 class="regular white">สั่งซื้อสินค้า</h6> </button>
            </a>
        </div>



    </div>



</div>
</div>

<div style="height: 150px"></div>

<script>

$(document).ready(function() {

    var urlParams = new URLSearchParams(window.location.search); //get all parameters


	$('#payment-method0').on('click', function(){
		$('#sub-payment-method').toggle();
    });


    $('#payment-method1').on('click', function(){
        $('#sub-payment-method1').toggle();
        $("input[value='mobilebanking']").prop("checked", true)
    });
    var inv_ref = "<?php echo $inv_ref; ?>";
    $("#comfirm_buy").click(function(){
        $.each($("input[id='bank']:checked"), function(){
            bank = $(this).val();

            if (bank === 'mobilebanking'){
                $("#comfirm_buy").attr("href", "/checkout/bank/mobilebanking/"+urlParams.get('inv_ref'));
            }else {
                $("#comfirm_buy").attr("href", "/checkout/bank/?inv_ref="+ inv_ref+"&bank_id="+bank);
            }

        });
    });
});

</script>

@stop
