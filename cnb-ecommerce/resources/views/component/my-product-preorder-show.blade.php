<div class="row">
    @foreach($product_pre->where('status_goods', 1) as $product)
        <div class="col-12">
            <div class="card p-4 mb-4">
                <div class="d-flex mb-2">{{--  title --}}
                    <?php $front_image = (isset($product->product_img[0]) ? $product->product_img[0] : null)?>
                    @if ($front_image=='0'||$front_image==null)
                    <img src="/img/no_image.png" style="width: 60px; height: 60px; object-fit: cover;"
                        class="mr-3 rounded8px" alt="...">
                    @else
                    <img src="/img/product/{{$front_image}}"
                        style="width: 60px; height: 60px; object-fit: cover;" class="mr-3 rounded8px" alt="...">
                    @endif
                    <div class="media-body">
                        <h6 class="mt-0 text-dot2"><strong>{{ $product->name }}</strong></h6>
                    </div>
                    <div class="ml-auto">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right dropup">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/shop/preorder/{{ $product->id }}" class="dropdown-item"
                                    type="button">แก้ไขสินค้า</a>
                                {{-- <a href="/shop/preorder/delete/{{ $product->id }}" class="dropdown-item"
                                    type="button">ลบสินค้า</a> --}}
                                <button class="dropdown-item deletePre" data-key="{{$product->id}}" type="button"
                                data-toggle="modal" data-target="#deletePreorder">ลบสินค้า</button>
                            </div>
                        </div>
                    </div>
                </div>{{--  title --}}
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-left p-4"></th>
                            <th scope="col" class="width200 text-left">เลข SKU</th>
                            <th scope="col" class="width200 text-left">ตัวเลือกสินค้า</th>
                            <th scope="col" class="width200 text-left">ราคา</th>
                            <th scope="col" class="width200 text-left">คลัง</th>
                            <th scope="col" class="width200 text-left">ยอดขาย</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->preOrder_option[0]['datetime_range'] as $key_op => $item)
                            <tr class="endTr{{ $product->id }}">
                                <td scope="row" data-label="ชื่อสินค้า">
                                    <div class="row">
                                        <div class="col-12 mb-4 text-left">
                                            <div class="row mx-0 rounded8px px-lg-4 px-md-4 px-0 py-lg-4 py-md-4 py-2"
                                                style="background-color: #f8eaf2;">
                                                <div class="col-12">
                                                    <strong style="font-size: 13px;">ระยะเวลา : {{ $item['start_date'] }} -
                                                        {{ $item['end_date'] }}</strong>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            @php
                                                            $sale_sum = 0;
                                                            $amount_sum = 0;
                                                            @endphp
                                                            @foreach ($item['stock'] as $key_p => $value)
                                                            @php
                                                            $stock_p = intval($value);
                                                            $amount_p = intval($item['amount_limit'][$key_p]);
                                                            $sale_p = $amount_p - $stock_p;
                                                            $sale_sum += $sale_p;
                                                            $amount_sum += $amount_p;
                                                            @endphp
                                                            @endforeach
                                                            <strong style="font-size: 13px;"
                                                                style="color: #23c197;">{{ $sale_sum }}/{{ $amount_sum }} P</strong>
                                                        </div>
                                                        <div class="col-4 text-right pl-0">
                                                            @php
                                                            $min = min($item['price']);
                                                            $max = max($item['price']);
                                                            @endphp
                                                            <strong class="text-main" style="font-size: 13px;">฿ {{ $min }} ~ ฿
                                                                {{ $max }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    @php
                                                    $percent = ($sale_sum/$amount_sum)*100;
                                                    @endphp
                                                    <div class="progress" style="height: 0.4rem; border: 1px solid #23c197;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $percent }}%; background-color: #23c197;"
                                                            aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="เลข SKU">
                                    <div class="row">
                                        @if($product->preOrder_option[0]['sku'][0] == null)
                                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                                <h6 class="mb-0 font_size_14px"><strong>ไม่มีรหัสสินค้า</strong></h6>
                                            </div>
                                        @else
                                            @foreach ($product->preOrder_option[0]['sku'] as $value)
                                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                                <h6 class="mb-0 font_size_14px"><strong>{{ $value }}</strong></h6>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </td>
                                <td data-label="ตัวเลือกสินค้า" class="text-lg-left text-md-right text-sm-right">
                                    <div class="row">
                                        @if (count($product->preOrder_option[0]['dis1']) > 0)
                                        @if (count($product->preOrder_option[0]['dis2']) > 0)
                                        @foreach ($product->preOrder_option[0]['dis1'] as $value)
                                        @foreach ($product->preOrder_option[0]['dis2'] as $value1)
                                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                            <h6 class="mb-0 font_size_14px"><strong>{{ $value }},{{ $value1 }}</strong></h6>
                                        </div>
                                        @endforeach
                                        @endforeach
                                        @elseif(count($product->preOrder_option[0]['dis2']) < 1) @foreach ($product->
                                            preOrder_option[0]['dis1'] as $value)
                                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                                <h6 class="mb-0 font_size_14px"><strong>{{ $value }}</strong></h6>
                                            </div>
                                            @endforeach
                                            @endif
                                            @elseif(count($product->preOrder_option[0]['dis2']) > 0)
                                            @foreach ($product->preOrder_option[0]['dis2'] as $value)
                                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                                <h6 class="mb-0 font_size_14px"><strong>{{ $value }}</strong></h6>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                                <h6 class="mb-0 font_size_14px"><strong>ไม่มีตัวเลือก</strong></h6>
                                            </div>
                                            @endif
                                    </div>
                                </td>
                                <td data-label="ราคา" class="text-lg-left text-md-right text-sm-right">
                                    <div class="row">
                                        @foreach ($item['price'] as $value)
                                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                            <h6 class="mb-0 font_size_14px"><strong>฿ {{ $value }}</strong></h6>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td data-label="คลัง" class="text-lg-left text-md-right text-sm-right">
                                    <div class="row">
                                        @foreach ($item['stock'] as $value)
                                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                            <h6 class="mb-0 font_size_14px"><strong>{{ $value }}</strong></h6>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td data-label="ยอดขาย" class="text-lg-left text-md-right text-sm-right">
                                    <div class="row">
                                        @foreach ($item['stock'] as $key_sale => $value)
                                        @php
                                        $sale = 0;
                                        $stock_sale = intval($value);
                                        $amount_sale = intval($item['amount_limit'][$key_sale]);
                                        $sale = $amount_sale - $stock_sale;
                                        @endphp
                                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
                                            <h6 class="mb-0 font_size_14px"><strong>{{ $sale }}</strong></h6>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>



