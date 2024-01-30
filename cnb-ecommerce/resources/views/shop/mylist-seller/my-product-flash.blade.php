@if(count($flash_product) > 0)
<div class="col-12 px-0">
    <table class="table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-left p-4">ชื่อสินค้า</th>
                <th scope="col" class="width200 text-left">เลข SKU</th>
                <th scope="col" class="width200 text-left">ตัวเลือกสินค้า</th>
                <th scope="col" class="width200 text-left">ราคา</th>
                <th scope="col" class="width200 text-left">คลัง</th>
                <th scope="col" class="width200 text-left">ยอดขาย</th>
                <th scope="col" class="width100 text-left">รับสินค้า</th>
                <th scope="col" class="width100 text-left">สถานะสินค้า</th>
            </tr>
            @php
            $array_id = [];
            @endphp
        </thead>
        <tbody>
            @foreach($flash_product as $key=>$product)
            <tr>
                <td scope="row" data-label="ชื่อสินค้า">
                    <div class="row">
                        <div class="col-12 mb-4 text-left">
                            <div class="media">
                                <a href="/flash-sale/{{$product->id}}">
                                    <img src="{{'/img/product/'.$product->product_img[0] }}" style="width: 60px; height: 60px; object-fit: cover;" class="mr-3 rounded8px" alt="...">
                                </a>
                                <div class="media-body">
                                    <h6 class="mt-0"><strong>{{$product->name}}</strong></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td data-label="เลข SKU">
                    <div class="row">
                        @foreach($product->product_option['sku'] as $sku)
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            <h6 class="mb-0 font_size_14px"><strong>{{$sku}}</strong></h6>
                        </div>
                        @endforeach
                    </div>
                </td>
                <td data-label="ตัวเลือกสินค้า" class="text-lg-left text-md-right text-sm-right">
                    <div class="row">
                        @foreach($product->product_option['dis1'] as $pro_dis1)
                        @foreach($product->product_option['dis2'] as $pro_dis2)
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            <!-- ----------------------------------------------------------------------------------------------------------->
                            @if($pro_dis1 != null && $pro_dis2 != null)
                            <h6 class="mb-0 font_size_14px"><strong>{{$pro_dis1}}
                                    @if($pro_dis1 != null && $pro_dis2 != null)
                                    ,
                                    @endif
                                    {{ $pro_dis2 }}</strong></h6>
                            @endif
                            <!-- ----------------------------------------------------------------------------------------------------------->
                            @if($pro_dis1 != null && $pro_dis2 == null)
                            <h6 class="mb-0"><strong>{{$pro_dis1}}
                                    @endif
                                    <!-- ----------------------------------------------------------------------------------------------------------->
                                    @if($pro_dis1 == null && $pro_dis2 != null)
                                    <h6 class="mb-0 font_size_14px"><strong>{{$pro_dis2}}
                                            @endif
                                            <!-- ----------------------------------------------------------------------------------------------------------->
                                            @if($pro_dis1 == null && $pro_dis2 == null)
                                            <h6 class="mb-0 font_size_14px" style="color:grey"><strong>ไม่มี</strong>
                                            </h6>
                                            @endif
                                            <!-- ----------------------------------------------------------------------------------------------------------->

                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </td>
                <td data-label="ราคา" class="text-lg-left text-md-right text-sm-right">
                    <div class="row">
                        @foreach($product->product_option['price'] as $pro)
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            @if($pro == 0)
                            <h6 class="mb-0 font_size_14px" style="color:red"><strong>฿ {{$pro}}</strong></h6>
                            @else
                            <h6 class="mb-0 font_size_14px"><strong>฿ {{$pro}}</strong></h6>
                            @endif
                        </div>
                        @endforeach

                    </div>
                </td>
                <td data-label="คลัง" class="text-lg-left text-md-right text-sm-right">
                    <div class="row">
                        @foreach($product->product_option['stock'] as $pro_price)
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            @if($pro_price == 0)
                            <h6 class="mb-0 font_size_14px" style="color:red"><strong>{{$pro_price}}</strong></h6>
                            @else
                            <h6 class="mb-0 font_size_14px"><strong>{{$pro_price}}</strong></h6>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </td>
                <td data-label="ยอดขาย" class="text-lg-left text-md-right text-sm-right">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            <h6 class="mb-0 font_size_14px"><strong>-</strong></h6>
                        </div>
                    </div>
                </td>
                <td data-label="รับสินค้า" class="text-lg-left text-md-right text-sm-right">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            <div class="col-lg-1 col-md-1 col-2 custom-control custom-control custom-switch d-flex justify-content-end">
                                <input type="checkbox" class="custom-control-input" id="switch_flash{{$product->product_old_id}}" onclick="send_receive_goods_flashsale({{$product->product_old_id}})" style="background-color:#333;">
                                <label class="custom-control-label" for="switch_flash{{$product->product_old_id}}"></label>
                            </div>
                        </div>
                    </div>
                </td>
                <td data-label="สถานะสินค้า" class="text-lg-left text-md-right text-sm-right">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            @if($product->status == 'enabled')
                            <h6 class='font-weight-bold font_size_14px' style="color:#23c197">กำลังขาย</h6>
                            @else
                            <h6 class='font-weight-bold font_size_14px' style="color:red">หมดระยะเวลาการขาย</h6>
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @php

            array_push($array_id,$product->id);
            @endphp
        </tbody>

    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'get',
            data: {
                "shop_id": "{{$flash_product[0]->shop_id}}"
            },
            url: "{{route('get-status-goods')}}",
            success: function(value) {
                value.forEach(res_product => {
                    if (res_product.receive_product == 'receive') {
                        $("#switch_flash" + res_product.id).prop("checked", true);
                    }
                });
            }
        });

    });

    function send_receive_goods_flashsale(id) {
        var checkBox = document.getElementById("switch_flash" + id);

        if (checkBox.checked == true) {
            $.ajax({
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "product_id": id,
                    "receive_product": 'receive'
                },
                url: "{{route('receive-goods')}}",
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
                    "product_id": id,
                    "receive_product": 'unreceived'
                },
                url: "{{route('receive-goods')}}",
                success: function(json) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'ปิดการรับสินค้าสำเร็จ'
                    })
                    location.reload();
                }

            });
        }
    }
</script>
@else
<div class="col-12 px-0 text-center py-4" style='background:white'>
    <img class='pb-2 w-custom-nodata h-200px' src="/img/no_image.png" style="width: auto !important;" alt="">
    <p style='color:#919191'>Product not found</p>
    <!-- <a href="{{ url('shop/myproduct/new') }}"><button class='btn-primary btn' style='background:#333;border-color: #333;'>เพิ่มสินค้าใหม่</button></a> -->
</div>

@endif
