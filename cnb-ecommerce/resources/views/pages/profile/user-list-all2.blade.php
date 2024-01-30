<div class="col-12 px-0">
    <table class="table-bordered">
        <thead>
        </thead>
        <tbody>

            @foreach ($shop_id->where('status',2) as $key_shop => $item)
            <tr>
                <td scope="row" data-label="สินค้า">
                    <div>
                        <div>
                            {{-- @foreach ($shop_id as $key_shop => $item) --}}

                            <div class="row py-4 mx-0 mt-3"
                                style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="row align-items-center">
                                        <div
                                            class="col-lg-2 col-md-12 col-12 text-lg-left text-md-left text-left mt-lg-0 mt-md-4">
                                            <h6 class="mb-0"><strong>{{ $item->shops[0]->shop_name }} </strong></h6>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-6">
                                            <button class='o-btn'><svg width="1em" style='margin: 6px;' height="1em"
                                                    viewBox="0 0 16 16" class="bi bi-shop" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M0 15.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zM3.12 1.175A.5.5 0 0 1 3.5 1h9a.5.5 0 0 1 .38.175l2.759 3.219A1.5 1.5 0 0 1 16 5.37v.13h-1v-.13a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.13H0v-.13a1.5 1.5 0 0 1 .361-.976l2.76-3.22z" />
                                                    <path
                                                        d="M2.375 6.875c.76 0 1.375-.616 1.375-1.375h1a1.375 1.375 0 0 0 2.75 0h1a1.375 1.375 0 0 0 2.75 0h1a1.375 1.375 0 1 0 2.75 0h1a2.375 2.375 0 0 1-4.25 1.458 2.371 2.371 0 0 1-1.875.917A2.37 2.37 0 0 1 8 6.958a2.37 2.37 0 0 1-1.875.917 2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.5h1c0 .76.616 1.375 1.375 1.375z" />
                                                    <path
                                                        d="M4.75 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm3.75 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm3.75 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                                    <path fill-rule="evenodd"
                                                        d="M2 7.846V7H1v.437c.291.207.632.35 1 .409zm-1 .737c.311.14.647.232 1 .271V15H1V8.583zm13 .271a3.354 3.354 0 0 0 1-.27V15h-1V8.854zm1-1.417c-.291.207-.632.35-1 .409V7h1v.437zM3 9.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5V15H7v-5H4v5H3V9.5zm6 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4zm1 .5v3h2v-3h-2z" />
                                                </svg>ไปที่ร้านค้า</button>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-6">
                                            <button class='o-btn'>
                                                <svg width="1em" style='margin: 6px;' height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-chat-dots" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                                    <path
                                                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                </svg>แชทเลย</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="row align-items-center">
                                        <div
                                            class="col-lg-8 col-md-8 col-12 text-lg-right text-md-left text-left mt-lg-0 mt-md-4 mt-4 bd-r">
                                            <strong>Kerry Express : KR153284387482</strong>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-6">
                                            <a href='#' style='color:#1947e3'>

                                                @if($invs[$key_shop]->status == 2)
                                                ที่ต้องจัดส่ง
                                                @endif

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @foreach ($paymenttt as $key_pay => $pay)
                            @if($item['shop_id'] == $pay['shop_id'])

                            <div class="row py-4 mx-0"
                                style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-12 mb-4 text-left">
                                            <div class="media">
                                                <img src="{{ asset('img/products/.$pro->product_img[0]')  }}"
                                                    style="width: 60px;" class="mr-3 rounded8px" alt="...">
                                                <div class="media-body">
                                                    <h6 class="mt-0">

                                                        @foreach ($product as $pro)
                                                        @if($pro->id == $pay['product_id'])
                                                        <strong>
                                                            {{ $pro->name }}
                                                        </strong>
                                                        @endif
                                                        @endforeach

                                                    </h6>


                                                    <!-- have data -->
                                                    @if(isset($pay['dis1']))
                                                    {{ $pay['dis1']}}
                                                    @endif


                                                    <!-- not have data -->
                                                    @if(!isset($pay['dis1']))
                                                    <h6 style="color:gray">ไม่มีตัวเลือก</h6>
                                                    @endif

                                                    &nbsp;

                                                    <!-- have data -->
                                                    @if(isset($pay['dis2']))
                                                    {{ $pay['dis2']}}
                                                    @endif

                                                    <!-- not have data -->
                                                    @if(isset($pay['dis2']))
                                                    <h6 style="color:gray">ไม่มีตัวเลือก</h6>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- price to goods --}}
                                <div class="col-lg-2 col-md-2 col-6">
                                    <div class="row">
                                        <div class="col-12 mb-2 text-left">
                                            <h5 class="mb-0" style='color:#c45e9f'>
                                                <strong>
                                                    ฿{{ $pay['price'] }}
                                                </strong>
                                            </h5>
                                        </div>
                                        <div class="col-12 text-left d-flex">
                                            {{-- <h6 class="mb-0" style="color: #919191;">฿ 1140 </h6>(-37%) --}}
                                        </div>
                                    </div>
                                </div>
                                {{-- price to goods --}}



                                {{-- amount for goods --}}
                                <div class="col-lg-2 col-md-2 col-2">
                                    <h6 class="mb-0">
                                        <strong>
                                            x{{ $pay['amount'] }}
                                        </strong>
                                    </h6>
                                </div>
                                <div class="col-lg-2 col-md-2 col-4">
                                    <h5 class="mb-0" style='color:#c45e9f'>
                                        <strong>฿
                                            {{ $pay['price'] * $pay['amount'] }}
                                        </strong>
                                    </h5>
                                </div>
                            </div>
                            {{-- amount for goods --}}

                            @endif
                            @endforeach


                            {{-- Total --}}
                            <div class="row py-4 mx-0"
                                style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 1px solid;">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="row align-items-center">
                                        <div
                                            class="col-lg-10 col-md-10 col-8 text-lg-right text-md-right text-right mt-lg-0">
                                            <strong>รวมราคา</strong>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-4">
                                            <h5 class="mb-0" style='color:#c45e9f'>
                                                {{-- <strong>฿{{ $invs[$key_pay]->total }}</strong> --}}
                                                <strong>฿ {{ $invs[$key_shop]->total }}</strong>

                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Total --}}

                            {{-- {{ dd($invs[$key_shop]->status) }} --}}


                            <div class="row py-4 mx-0" style="background-color: #fff;">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="col-lg-6 col-md-6 col-12">

                                        <button type="button" class="o-btn mb-2" data-toggle="modal"
                                            data-target="#cancelmodal" data-target-id="{{ $invs[$key_shop]->id }}">
                                            ยกเลิกคำสั่งซื้อ
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <button class='o-btn-purple mb-2' style="opacity: 0.5"
                                                disabled>รับสินค้า</button>
                                        </div>
                                        <div
                                            class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-left mt-lg-0 ">
                                            <button class='o-btn mb-2'>รายละเอียดคำสั่งซื้อ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            {{-- @include('component.cancel-modal') --}}
            @endforeach
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function () {
        $("#cancelmodal").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            $('#inv_id').val(id);
            $('#send_cancel').attr('action', '/profile/cancel/content/'+id);
        });
    });


</script>
