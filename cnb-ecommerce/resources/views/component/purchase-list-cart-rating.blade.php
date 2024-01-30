<div class="card col-12 mt-2 white border-0 rounded p-4 shadow-sm" id="flash-sale" style="">
    <div class="row black h5 regular d-flex">
        {{-- {{$item->inv_ref}} --}}
        <h5 class="regular black d-inline-block mt-2">{{$item->shops[0]->shop_name}}</h5>
        <a href="/shop-user-details?id={{$item->shop_id}}" type="" class="btn btn-md btn-outline-primary pb-1 pt-1 pr-3 pl-3 d-inline-block mr-2 ml-3" >ไปที่ร้านค้า</a>
        <button type="" class="btn btn-md btn-outline-primary pb-1 pt-1 pr-3 pl-3 d-inline-block mr-3" >แชทเลย</button>
        <?php
        $status_name = '';
        if ($item->status == 1) {
            $status_name = 'ที่ต้องชำระ';
        }
        elseif ($item->status == 2) {
            $status_name = 'ต้องจัดส่ง';
        }
        elseif ($item->status == 3) {
            $status_name = 'จัดส่งแล้ว';
        }
        elseif ($item->status == 4 ) {
            $status_name = 'ที่ต้องได้รับ';
        }
        elseif ($item->status == 5) {
            $status_name = 'สำเร็จ';
        }
        elseif ($item->status == 6) {
            $status_name = 'แจ้งยกเลิก';
        }
        else {
            $status_name = 'ยกเลิกแล้ว';
        }
        ?>

        <h6 class="regular black d-inline-block mt-2 ml-auto">: {{$item->inv_ref}} | <span class="blue">{{$status_name}}<span></h6>
    </div>
    <hr>
    @foreach ($item->inv_products as $key1=>$item1)

        <div class="row black" style="height: 100px">
            @foreach ($product_all as $item2)
                @if ( $item2->id == $item1['product_id'])
                    <div class="col-6 pl-0">
                        <div class="row">

                            <div class="col-4 mt-2 ml-4 pl-0 regular">
                                <?php $front_image = $item2->product_img[0];?>
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
                                <div class="row crop-text-2" style="height: 50px">
                                    <h6>{{$item2->name}}</h6>
                                </div>
                                <div class="row">
                                    <h6 style="opacity: 0.5">{{$item1['dis2']}} , {{$item1['dis1']}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-2 mt-2 regular black">
                        <h5>{{$item1['price']}}</h5>
                    </div>
                    <div class="col-2 mt-2 regular black">
                        <h5>x {{$item1['amount']}}</h5>
                    </div>
                    <div class="col-2 mt-2 regular black">
                        <h5>{{$item1['price']*$item1['amount']}}</h5>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
    <hr>
    <div class="row justify-content-end regular pink h4 ">
        <span class="black h6 mt-1 light">รวมราคาทั้งหมด &nbsp;</span>฿ {{ $item->total}}
    </div>
    <hr>
    <div class="d-flex">

        <div class="mr-auto p-2">

        </div>
        <div class="p-2">
            @if ($item->status == 5)
            <button type="" class="btn btn-md btn-success pb-1 pt-1 pr-3 pl-3 d-inline-block mr-2 ml-3" data-toggle="modal" data-target="#ratingmodal" >ให้คะแนนสินค้า</button>
            @else
                <button type="" class="invisible" data-toggle="modal" data-target="#ratingmodal" >ให้คะแนนสินค้า</button>
            @endif
            <button type="" class="btn btn-md btn-secondary pb-1 pt-1 pr-3 pl-3 d-inline-block mr-2 ml-3" >ฉันได้รับสินค้าแล้ว</button>
            <button type="" class="btn btn-md btn-outline-primary pb-1 pt-1 pr-3 pl-3 d-inline-block mr-3" >ดูการสั่งซื้อ</button>
        </div>

    </div>








</div>

</script>
