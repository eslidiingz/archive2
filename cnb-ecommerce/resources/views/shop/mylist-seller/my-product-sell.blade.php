@if(count($products) > 0)
<div class="col-12 px-0">
    <table class="table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-left p-4">Product name</th>
                <th scope="col" class="width200 text-left">SKU no</th>
                <th scope="col" class="width200 text-left">Option (s)</th>
                <th scope="col" class="width200 text-left">Price</th>
                <th scope="col" class="width200 text-left">Discount</th>
                <th scope="col" class="width200 text-left">Stock</th>
                <th scope="col" class="width200 text-left">Sold amt</th>
                <th scope="col" class="width100 text-left">Active status</th>
                <th scope="col" class="width100 text-left">Action</th>
            </tr>
        </thead>
        @php
        $array_id = [];
        @endphp
        <tbody>

            @foreach($products->where('status_goods',1) as $key=>$product)

            <tr>
                <td scope="row" data-label="ชื่อสินค้า">
                    <div class="row">
                        <div class="col-12 mb-4 text-left">
                            <div class="media">
                                <a href="/product/{{$product->id}}">
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
                            <h6 class="mb-0 font_size_14px"><strong>{{$pro_dis1}}
                                    @endif
                                    <!-- ----------------------------------------------------------------------------------------------------------->
                                    @if($pro_dis1 == null && $pro_dis2 != null)
                                    <h6 class="mb-0 font_size_14px"><strong>{{$pro_dis2}}
                                            @endif
                                            <!-- ----------------------------------------------------------------------------------------------------------->
                                            @if($pro_dis1 == null && $pro_dis2 == null)
                                            <h6 class="mb-0" style="color:grey"><strong>No option</strong></h6>
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
                <td data-label="ราคาส่วนลด" class="text-lg-left text-md-right text-sm-right">
                    <div class="row">
                        @if (isset($product->product_option['margin']))
                        @foreach($product->product_option['margin'] as $margin)
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            @if($margin == 0)
                            <h6 class="mb-0 font_size_14px" style="color:red"><strong>฿ {{$margin}}</strong></h6>
                            @else
                            <h6 class="mb-0 font_size_14px"><strong>฿ {{$margin}}</strong></h6>
                            @endif
                        </div>
                        @endforeach
                        @endif
                    </div>
                </td>
                <td data-label="คลัง" class="text-lg-left text-md-right text-sm-right">
                    <div class="row">
                        @foreach($product->product_option['stock'] as $pro_price)
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            @if($pro_price == 0)
                            <h6 class="mb-0 font_size_14px" style="color:red"><strong> {{$pro_price}}</strong></h6>
                            @else
                            <h6 class="mb-0 font_size_14px"><strong> {{$pro_price}}</strong></h6>
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
                </td>
                <td data-label="สถานะสินค้า" class="text-lg-left text-md-right text-sm-right">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                            <div class="col-lg-1 col-md-1 col-2 custom-control custom-control custom-switch d-flex justify-content-end">
                                <input type="checkbox" class="custom-control-input" id="switch3{{$product->id}}" onclick="send_status_goods2({{$product->id}})" style="background-color:#333;">
                                <label class="custom-control-label" for="switch3{{$product->id}}"></label>
                            </div>

                        </div>
                </td>
                <td data-label="ดำเนินการ">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right dropup">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/shop/myproduct/{{$product->id}}" class="dropdown-item" type="button">แก้ไขสินค้า</a>
                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#exampleModalCenter-edit-list">เพิ่มเติม</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @php

            array_push($array_id,$product->id);
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {

        $.ajax({
            type: 'get',
            data: {
                "shop_id": "{{$products[0]->shop_id}}"
            },
            url: "{{route('get-status-goods')}}",
            success: function(value) {
                value.forEach(res_product => {
                    if (res_product.status_goods == 1) {
                        $("#switch3" + res_product.id).prop("checked", true);
                    }
                });


            }
        });

    });



    function send_status_goods2(id) {
        var checkBox = document.getElementById("switch3" + id);

        if (checkBox.checked == true) {
            $.ajax({
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "product_id": id,
                    "status_goods": 1
                },
                url: "{{route('status-goods')}}",
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
                    "status_goods": 2
                },
                url: "{{route('status-goods')}}",
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
</script>
@else
<div class="col-12 px-0 text-center py-4" style='background:white'>
    <img class='pb-2 w-custom-nodata h-200px' src="/img/no_image.png" style="width: auto !important;" alt="">
    <p style='color:#919191'>Product not found</p>
    <!-- <a href="{{ url('shop/myproduct/new') }}"><button class='btn-primary btn' style='background:#333;border-color: #333;'>เพิ่มสินค้าใหม่</button></a> -->
</div>

@endif
