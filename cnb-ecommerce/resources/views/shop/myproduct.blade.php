@extends('layouts.shop') @section('content')

<style>
    .nav-tabs .nav-link {
        padding: 3px 45px;
    }

    .nav-tabs .nav-link.active,
    .nav-tabs .nav-item.show .nav-link {
        color: #fff;
        background-color: #346751;
        border-color: #346751;
    }

    .nav-tabs {
        border-bottom: 1px solid #346751;
        padding: 2px;
    }

    .navbar-light .navbar-nav .nav-link:hover,
    a:hover {
        color: #858585;
        opacity: 0.9;
    }

    .table tr td,
    .table tr th {
        text-align: center;
    }

    body {
        font-family: DB Heavent-medium;
        font-size: 19px;
        font-weight: 300;
        font-stretch: normal;
        font-style: normal;
        line-height: 1;
    }
</style>

<!-- Content Here -->
<div class="container-fluid">
    <div class="col-11 d-none d-lg-block justify-content-center">
        <div class="card">
            <div class="card-header">
                <label class="font-header"> รายละเอียดร้านค้า</label>
                <a href="{{route('shop.new.myproduct')}}" class="btn btn-primary float-right" addnewproduct="true">เพิ่มสินค้าใหม่ <i class="fa fa-plus"></i></a>
            </div>

            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">ทั้งหมด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="home">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" /></th>
                                    <th style="width: 250px;">ชื่อสินค้า</th>
                                    <th>เลข SKU</th>
                                    <th>ตัวเลือกสินค้า</th>
                                    <th>ราคา</th>
                                    <th>คลัง</th>
                                    <th>ยอดขาย</th>
                                    <th>ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product) @php $size_count = count($product->product_option["dis1"])+1; $color_count = count($product->product_option["dis2"])+1; $size_index = 0; $color_index = 0; @endphp
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-4">
                                                @if ($product->product_img =='0' || $product->product_img == null)
                                                <img style="max-width: 50px;" src="/img/no_image.png" alt="" class="img-fluid" />
                                                @else
                                                <?php $front_image = $product->product_img[0]; ?>
                                                <img style="max-width: 50px;" src="/img/product/{{$front_image}}" alt="" class="img-fluid" />
                                                @endif
                                            </div>
                                            <div class="col-8" style="white-space: nowrap; width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                {{$product->name}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($product->product_option["sku"] as $item)
                                        <p>{{$item}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- @php $arr_option_key = []; foreach($product->product_option as $index => $string) { if (strpos($index, "option") !== FALSE) if ($string === 'color') array_push($arr_option_key, substr($index ,
                                        -1)); } @endphp @foreach ($arr_option_key as $i => $value) @foreach ($product->product_option["sku"] as $item)
                                        <p>
                                            @php $color = substr(explode("-", $item)[1] , -1); $key_color = array_search($color, $product->product_option["dis".$arr_option_key[$i]]);
                                            foreach($product->product_option["dis".$arr_option_key[$i]] as $index => $string) { if (strpos($string, $color) !== FALSE) $color = $product->product_option["dis".$arr_option_key[$i]][$index]; }
                                            @endphp {{$color}}
                                        </p>
                                        @endforeach @endforeach --}}
                                    </td>
                                    <td>
                                        @foreach ($product->product_option["price"] as $item)
                                        <p>{{$item}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($product->product_option["stock"] as $item)
                                        <p>{{$item}}</p>
                                        @endforeach
                                    </td>
                                    <td></td>
                                    <td>
                                        <a href="{{route('edit.myproduct' , ['id'=> $product->id ])}}" style="color: #226fff;">แก้ไขสินค้า</a>
                                        <a onclick="if(confirm('คุณต้องการลบสินค้า ?')){$(this).next().submit()}" href="#" style="color: red;">ลบสินค้า</a>
                                        <form method="POST" action="{{route('delete.myproduct' , ['id'=> $product->id ])}}">
                                            @csrf @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <p>No Products</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane container fade" id="menu1">...</div>
                    <div class="tab-pane container fade" id="menu2">...</div>
                </div>
            </div>
        </div>
    </div>

    <!-- //////////////////////////mobile/////////////////////////// -->

    <div class="col-12 d-lg-none justify-content-center">
        <div class="card">
            <div class="card-header">
                <label class="font-header"> รายละเอียดร้านค้า</label>
                <a href="{{route('shop.new.myproduct')}}" class="btn btn-primary float-right" addnewproduct="true">เพิ่มสินค้าใหม่ <i class="fa fa-plus"></i></a>
            </div>

            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">ทั้งหมด</a>
                    </li>
                    <!-- <li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
						</li> -->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="home">
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th><input type="checkbox"></th> -->
                                    <th style="width: 100px;">ชื่อสินค้า</th>
                                    <!-- <th>เลข SKU</th>
										<th>ตัวเลือกสินค้า</th> -->
                                    <th>ราคา</th>
                                    <th>คลัง</th>
                                    <!-- <th>ยอดขาย</th> -->
                                    <th>ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product) @php $size_count = count($product->product_option["dis1"])+1; $color_count = count($product->product_option["dis2"])+1; $size_index = 0; $color_index = 0; @endphp
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                @if ($product->product_img =='0' || $product->product_img == null)
                                                <img style="max-width: 50px;" src="/img/no_image.png" alt="" class="img-fluid" />
                                                @else
                                                <?php $front_image = $product->product_img[0]; ?>
                                                <img style="max-width: 50px;" src="/img/product/{{$front_image}}" alt="" class="img-fluid" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="white-space: nowrap; width: 100px; overflow: hidden;">
                                                {{$product->name}}
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td>
												@foreach ($product->product_option["sku"] as $item)
													<p>{{$item}}</p>
												@endforeach
											</td> -->
                                    <!-- <td>

												{{-- @php
													$arr_option_key = [];
													foreach($product->product_option as $index => $string) {
														if (strpos($index, "option") !== FALSE)
															if ($string === 'color')
																array_push($arr_option_key, substr($index , -1));
													}
									
												@endphp


												@foreach ($arr_option_key as $i => $value)
													@foreach ($product->product_option["sku"] as $item)
													<p>
														@php
															$color = substr(explode("-", $item)[1] , -1);
															$key_color = array_search($color, $product->product_option["dis".$arr_option_key[$i]]); 
														
															foreach($product->product_option["dis".$arr_option_key[$i]] as $index => $string) {
																if (strpos($string, $color) !== FALSE)
																	$color =   $product->product_option["dis".$arr_option_key[$i]][$index];
															}
														@endphp

														{{$color}}
													</p>
													@endforeach
												@endforeach --}}
												
											</td> -->
                                    <td>
                                        @foreach ($product->product_option["price"] as $item)
                                        <p>{{$item}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($product->product_option["stock"] as $item)
                                        <p>{{$item}}</p>
                                        @endforeach
                                    </td>
                                    <!-- <td></td> -->
                                    <td>
                                        <a href="{{route('edit.myproduct' , ['id'=> $product->id ])}}"><img src="/img/icon/edit.svg" style="width: 18px; margin: 10px;" /></a>

                                        <a onclick="if(confirm('คุณต้องการลบสินค้า ?')){$(this).next().submit()}" href="#"><img src="/img/icon/trash2.svg" style="width: 20px; margin: 10px;" /></a>

                                        <form method="POST" action="{{route('delete.myproduct' , ['id'=> $product->id ])}}">
                                            @csrf @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <p>No Products</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane container fade" id="menu1">...</div>
                    <div class="tab-pane container fade" id="menu2">...</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
