@extends('layouts.shop')
@section('content')

<style>
    input[type="file"] {
    display: block;
    }
    .imageThumb {
    max-height: 75px;
    border: 2px solid;
    padding: 1px;
    cursor: pointer;
    }
    .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
    }
    .remove {
    display: block;
    background: #444;
    border: 1px solid black;
    color: white;
    text-align: center;
    cursor: pointer;
    }
    .remove:hover {
    background: white;
    color: black;
    }

    .modal-backdrop {
    z-index: 10400;
    }
    .modal {
    z-index: 10500;
    }

</style>
    <style type="text/css">
        /* .main-section{
            margin:0 auto;
            padding: 20px;
            margin-top: 100px;
            background-color: #fff;
            box-shadow: 0px 0px 20px #c1c1c1;
        } */
        .fileinput-remove,
        .fileinput-upload{
            display: none;
        }

        .file-preview {
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 0;
        width: 100%;
        margin-bottom: 5px;
    }
    .clearfix::after {
        display: block;
        clear: both !important;
        content: "";
    }
    </style>
<style>
.deleteOptionSelect {
    cursor: pointer;
}

.swiper-container {
    width: 100%;
    height: 300px;
    margin-left: auto;
    margin-right: auto;
}

.swiper-container-5 {
    width: 100%;
    height: 300px;
    margin-left: auto;
    margin-right: auto;
}

.swiper-slide {
    background-size: cover;
    background-position: center;
}

.gallery-top {
    height: 80%;
    width: 100%;
}

.gallery-thumbs {
    height: 20%;
    box-sizing: border-box;
    padding: 10px 0;
}

.gallery-thumbs .swiper-slide {
    height: 100%;
    opacity: 0.4;
}

.gallery-thumbs .swiper-slide-thumb-active {
    opacity: 1;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
    color: #fff;
    background-color: #333;
    border-color: #333;
    border: none;

}

.nav-tabs .nav-link:hover {
    border: none;
    color: #fff;
    background-color: #333;
}

.nav-tabs .nav-link {
    border: none;
}

.nav-tabs {
    border-bottom: 4px solid #333;
}

.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #333;
    background-color: #333;
}

.form-control.is-invalid,
.was-validated .form-control:invalid {
    border-color: #ced4da;
}

#modalcategory .modal-body ul li.active {
    background-color: #333;
}
.file-preview-frame.krajee-default.kv-zoom-thumb{
    display:none !important;
}
</style>
<style>
    /* In order to place the tracking correctly */
    canvas.drawing,
    canvas.drawingBuffer {
        position: absolute;
        left: 0;
        top: 0;
    }
    .btn-group {
        border: 1px solid #ced4da;
        border-radius: .25rem;
        width: 100%;
    }
</style>

<script src="/assets/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>  
<link rel="stylesheet" href="/assets/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

@php
    // // $arr = $product->product_option["dis1"][5] = "";

    // $arr = [];
    // foreach ($product->product_option["dis1"] as  $value) {
    //  array_push($arr , $value);
    // }
    // array_push($arr , "");

@endphp
{{-- {{dd($product->product_option["sku"][0])}} --}}



<!-- Content Here -->

<!-- ////////////////////////////////ข้อมูลทั่วไป//////////////////////////////// -->

<div class="row">
    <form action="{{route('update.myproduct', ['id'=> $product->id])}}" method="POST">
        @csrf
        @method('put')
        <div class="col-12 p-4">
            <h3><strong>Product detail</strong></h3>
        </div>

        <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
            <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                <div class="col-12 mt-4">
                    <h5><strong>Common info</strong></h5>
                </div>
                <div class="col-12">
                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-1"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                style="color: #333;">Product name</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control is-invalid" id="name" name="name" value="{{$product->name}}"
                                placeholder="Product name" required>
                        </div>
                    </div>
                </div>

                {{-- @include('component.breadcrumb') --}}
                <div class="col-12">
                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-2"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                style="color: #333;">Product category</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control is-invalid" id="category" name="category_id" value="{{ $category[0]->category_name ." > " . $sub_category[0]->sub_category_name}}"
                                required>
                            <input type="hidden" class="form-control" name="category"  value="{{$product->sub_category_id}}">


                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-3"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong
                                style="color: #333;">Product detail</strong></label>
                        <div class="col-sm-10">
                            <textarea class="form-control is-invalid" name="description" id="description" rows="10"
                                placeholder="Product detail" required>{{$product->description}}</textarea>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Barcode -->
<div class="modal fade" id="barcodeEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <b> Barcode NO : <span id="showEditProductBarcode_no"></span></b>

                <div id="barcodeBodyModalEditProduct">
                    <video class="dbrScanner-video" playsinline="true"></video>
                </div>

                <br>
                <span>วิธีใช้ : วางสินค้าที่มีพื้นหลังสีพื้น เช่น ขาว หรือ ดำ</span>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="button" id="saveEdit_Modal" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


 <!-- ////////////////////////////////ข้อมูลการขาย//////////////////////////////// -->

        <div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
            <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                <div class="col-12 mt-4">
                    <h5><strong>Pricing</strong></h5>
                </div>
                <div class="col-12">
                    @php
                        $option_key1 = $product->product_option["option1"];
                        $option_key2 = $product->product_option["option2"];



                        $option_value1 = $product->product_option["dis1"];
                        $option_value2 = $product->product_option["dis2"];

                        $i = 0;
                        $j = 0;
                        if($product->product_option["option1"]===null){
                            $k1="default";
                        }else {
                            $k1="gotkey";
                        }

                        if($product->product_option["option2"]===null){
                            $k2="default";
                        }else {
                            $k2="gotkey";
                        }

                        //dd($k1);
                    @endphp
                    {{-- {{dd($product->product_option)}} --}}
                    {{-- @foreach ($product->product_option["sku"] as $key => $value) --}}
                    <div class="option ">
                    @if ($k1 === "gotkey")


                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label"></label>
                            {{-- <div class="col-sm-10">
                                <button type="button" option="1" class="btn btn-block btn-outline-success">Option 1</button>
                            </div> --}}
                        </div>

                        <div class="option1 ">
                            <div class="col-12 px-0">
                                <div class="form-group row">
                                    <label for="inputNameProduct-4" class="col-lg-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #333;">Type 1</strong></label>
                                    <div class="offset-sm-2 offset-lg-0 col-sm-10">
                                        <div class="d-flex flex-column flex-fill  px-0 py-4 position-relative" style="background-color: #fafafa;">
                                            <!-- <div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times" style="cursor: pointer;" id="closeOptionBox" aria-hidden="true"></i></div> -->
                                            <div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12">Type name</label>
                                                <div class="col-lg-9 col-md-9 col-12" >
                                                    <input type="text" class="form-control" name="option1" value="{{$product->product_option['option1']}}"  autocomplete="off">
                                                </div>
                                            </div>
                                            @php
                                                $option_count = 0;
                                            @endphp
                                            <div id="addOptionSelect-1">
                                            @foreach ($option_value1 as $value1)
                                                <div id="{{$option_count}}" class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left" >
                                                    <label for="inputText" class="col-lg-2 col-md-2 col-12">{{ ($loop->iteration === 1)? 'Option':'' }}</label>
                                                    <div class="col-lg-9 col-md-9 col-12" >
                                                        <input type="text" class="form-control" name="dis1[]" value="{{$value1}}" autocomplete="off" >
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center" >
                                                        @if ($loop->iteration === 1)
                                                        @else
                                                            <i type="button" class="fa fa-trash-o deleteOptionSelect" attr-name="dis1"  attr-add="dis1[]" onclick="clearoption($(this).parent().parent().attr('id'))" ></i>
                                                        @endif
                                                    </div>
                                                </div>
                                                @php
                                                    $option_count++;
                                                @endphp
                                            @endforeach
                                            </div>

                                            <div class="form-group d-lg-flex d-md-flex">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                                <div class="col-lg-9 col-md-9 col-12" >
                                                    <button class="btn btn-outline-primary form-control" style="border-style: dashed;" attr-name="dis1" attr-add="dis1[]" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add option-1</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if ($k2 === "gotkey")
                        <div class="option2">
                            <div class="col-12 px-0">
                                <div class="form-group row">
                                    <label for="inputNameProduct-4" class="col-lg-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #333;">Option 2</strong></label>
                                    <div class="offset-sm-2 offset-lg-0 col-sm-10">
                                        <div class="d-flex flex-column flex-fill  px-0 py-4 position-relative" style="background-color: #fafafa;">
                                            <!-- <div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times" style="cursor: pointer;" id="closeOptionBox" aria-hidden="true"></i></div> -->
                                            <div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12">Type name</label>
                                                <div class="col-lg-9 col-md-9 col-12" >
                                                    <input type="text" class="form-control" name="option2" value="{{$product->product_option['option2']}}"  autocomplete="off">
                                                </div>
                                            </div>

                                            <div id="addOptionSelect-2">
                                                 @foreach ($option_value2 as $value2)
                                                    <div id="{{$option_count}}" class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left" >
                                                        <label for="inputText" class="col-lg-2 col-md-2 col-12">{{ ($loop->iteration === 1)? 'Option':'' }}</label>
                                                        <div class="col-lg-9 col-md-9 col-12" >
                                                            <input type="text" class="form-control" name="dis2[]" value="{{$value2}}" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center" >
                                                            @if ($loop->iteration === 1)
                                                            @else
                                                                <i type="button" class="fa fa-trash-o deleteOptionSelect" attr-name="dis2"  attr-add="dis2[]" onclick="clearoption($(this).parent().parent().attr('id'))" "></i>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    @php
                                                        $option_count++;
                                                    @endphp
                                                @endforeach
                                            </div>
                                            @php
                                                echo '<script type="text/javascript">';
                                                echo "var option_count =  '$option_count';";
                                                echo '</script>';
                                            @endphp

                                            <div class="form-group d-lg-flex d-md-flex">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                                <div class="col-lg-9 col-md-9 col-12" >
                                                    <button class="btn btn-outline-primary form-control" style="border-style: dashed;" attr-name="dis2"  attr-add="dis2[]" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add option-2</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif





                    @if ($k1 === "default")


                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="button" option="1" class="btn btn-block btn-outline-success">Add option 1</button>
                            </div>
                        </div>

                        <div class="option1 d-none">
                            <div class="col-12 px-0">
                                <div class="form-group row">
                                    <label for="inputNameProduct-4" class="col-lg-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #333;">Type 1</strong></label>
                                    <div class="offset-sm-2 offset-lg-0 col-sm-10">
                                        <div class="d-flex flex-column flex-fill  px-0 py-4 position-relative" style="background-color: #fafafa;">
                                            <!-- <div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times" style="cursor: pointer;" id="closeOptionBox" aria-hidden="true"></i></div> -->
                                            <div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12">Type name</label>
                                                <div class="col-lg-9 col-md-9 col-12" >
                                                    <input type="text" class="form-control" name="option1" value=""  autocomplete="off">
                                                </div>
                                            </div>

                                            <div id="addOptionSelect-1">
                                                <div class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left" >
                                                    <label for="inputText" class="col-lg-2 col-md-2 col-12">Option</label>
                                                    <div class="col-lg-9 col-md-9 col-12" >
                                                        <input type="text" class="form-control" name="dis1[]" autocomplete="off" >
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center" >

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group d-lg-flex d-md-flex">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                                <div class="col-lg-9 col-md-9 col-12" >
                                                    <button class="btn btn-outline-primary form-control" style="border-style: dashed;" attr-name="dis1" attr-add="dis1[]" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add option-1</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($k2 === "default")

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="button" option="2" class="btn btn-block btn-outline-success">Add option 2</button>
                            </div>
                        </div>

                        <div class="option2 d-none">
                            <div class="col-12 px-0">
                                <div class="form-group row">
                                    <label for="inputNameProduct-4" class="col-lg-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #333;">Type 2</strong></label>
                                    <div class="offset-sm-2 offset-lg-0 col-sm-10">
                                        <div class="d-flex flex-column flex-fill  px-0 py-4 position-relative" style="background-color: #fafafa;">
                                            <!-- <div class="position-absolute" style="right: 10px; top: 5px;"><i class="fa fa-times" style="cursor: pointer;" id="closeOptionBox" aria-hidden="true"></i></div> -->
                                            <div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12">Type name</label>
                                                <div class="col-lg-9 col-md-9 col-12" >
                                                    <input type="text" class="form-control" name="option2" value=""  autocomplete="off">
                                                </div>
                                            </div>

                                            <div id="addOptionSelect-1">
                                                <div class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left" >
                                                    <label for="inputText" class="col-lg-2 col-md-2 col-12">Option</label>
                                                    <div class="col-lg-9 col-md-9 col-12" >
                                                        <input type="text" class="form-control" name="dis2[]" autocomplete="off">
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center" >

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group d-lg-flex d-md-flex">
                                                <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                                <div class="col-lg-9 col-md-9 col-12" >
                                                    <button class="btn btn-outline-primary form-control" style="border-style: dashed;" attr-name="dis2"  attr-add="dis2[]" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add option-2</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endif
                    </div>

                    <div class="form-group row">
                    <label for="inputNameProduct-4" class="col-sm-2 col-form-label text-lg-right text-md-left text-left"><strong style="color: #333;">Option list</strong></label>
                        <div class="col-sm-10">
                            <div id ="table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      @if ($k1 === "gotkey")
                                      <th scope="col">{{$option_key1}}</th>
                                      @else
                                      <th scope="col"></th>
                                      @endif

                                      @if ($k2 === "gotkey")
                                      <th scope="col">{{$option_key2}}</th>
                                      @else
                                      <th scope="col"></th>
                                      @endif

                                      <th scope="col">Retail price</th>
                                      {{-- @if (isset($product->product_option['margin'])) --}}
                                      <th scope="col">Whole price</th>
                                      {{-- @endif --}}
                                      <th scope="col">Stock</th>
                                      <th scope="col">SKU no</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    @if ($k1 === "gotkey" && $k2 === "gotkey")
                                        @foreach ($option_value1 as $value1)
                                                @foreach ($option_value2 as $value2)
                                            <tr>
                                                @if ($k1 === "gotkey")
                                                    <td scope="col">{{$value1}}</td>
                                                @endif

                                                @if ($k2 === "gotkey")
                                                    <td scope="col">{{$value2}}</td>
                                                @endif

                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Retail price (Baht)</h6>
                                                        </div>
                                                        <input type="number" class="form-control" name="price[] text-lg-right text-md-left text-left" placeholder="Retail price (Baht)" value="{{$product->product_option['price'][$i]}}" required>
                                                    </td>
                                                    {{-- @if (isset($product->product_option['margin'])) --}}
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Whole price (Baht) (Not required)</h6>
                                                        </div>
                                                        <input type="number" class="form-control text-lg-right text-md-left text-left" name="margin[]" placeholder="Whole price (Baht) (Not required)" value="{{ @$product->product_option['margin'][$i] }}" >
                                                    </td>
                                                    {{-- @endif --}}
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Stock</h6>
                                                        </div>
                                                        <input type="number" class="form-control" name="stock[] text-lg-right text-md-left text-left" placeholder="Stock" value="{{$product->product_option['stock'][$i]}}" required>
                                                    </td>
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>SKU no (Not required)</h6>
                                                        </div>
                                                        <input type="text" class="form-control" name="sku[] text-lg-right text-md-left text-left" placeholder="SKU no (Not required)" value="{{$product->product_option['sku'][$i++]}}" >
                                                    </td>
                                            </tr>
                                                @endforeach
                                        @endforeach
                                    @endif


                                    @if ($k1 === "gotkey" && $k2 === "default")
                                        @foreach ($option_value1 as $value1)
                                            <tr>
                                                @if ($k1 === "gotkey")
                                                    <td scope="col">{{$value1}}</td>
                                                @endif


                                                    <td scope="col"></td>
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Retail price (Baht)</h6>
                                                        </div>
                                                        <input type="number" class="form-control" name="price[] text-lg-right text-md-left text-left" placeholder="Retail price (Baht)" value="{{isset($product->product_option['price'][$i])?$product->product_option['price'][$i]:0}}" required>
                                                    </td>
                                                    {{-- @if (isset($product->product_option['margin'])) --}}
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Whole price (Baht) (Not required)</h6>
                                                        </div>
                                                        <input type="number" class="form-control text-lg-right text-md-left text-left" name="margin[]" placeholder="Whole price (Baht) (Not required)" value="{{@$product->product_option['margin'][$i] }}" >
                                                    </td>
                                                    {{-- @endif --}}
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Stock</h6>
                                                        </div>
                                                        <input type="number" class="form-control" name="stock[] text-lg-right text-md-left text-left" placeholder="Stock" value="{{@$product->product_option['stock'][$i]}}" required>
                                                    </td>
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>SKU no (Not required)</h6>
                                                        </div>
                                                        <input type="text" class="form-control" name="sku[] text-lg-right text-md-left text-left" placeholder="SKU no (Not required)" value="{{@$product->product_option['sku'][$i++]}}" >
                                                    </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    @if ($k1 === "default" && $k2 === "default")
                                            <tr>
                                                    <td scope="col"></td>
                                                    <td scope="col"></td>
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Retail price (Baht)</h6>
                                                        </div>
                                                        <input type="number" class="form-control text-lg-right text-md-right text-right" name="price[]" placeholder="Retail price (Baht)" value="{{isset($product->product_option['price'][$i])?$product->product_option['price'][$i]:0}}" required>
                                                    </td>
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Special price (Baht)</h6>
                                                        </div>
                                                        <input type="number" class="form-control text-lg-right text-md-right text-right" name="price_special[]" placeholder="Special price (Baht)" value="{{ isset( $product->product_option['price_special'][$i] ) ? $product->product_option['price_special'][$i] : 0 }}" >
                                                    </td>
                                                    {{-- @if (isset($product->product_option['margin'])) --}}
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Whole price (Not required)</h6>
                                                        </div>
                                                        <input type="number" class="form-control text-lg-right text-md-right text-right" name="margin[]" placeholder="Whole price (Not required)" value="{{ @$product->product_option['margin'][$i] }}" >
                                                    </td>
                                                    {{-- @endif --}}
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>Stock</h6>
                                                        </div>
                                                        <input type="number" class="form-control" name="stock[] text-lg-right text-md-left text-left" placeholder="Stock" value="{{$product->product_option['stock'][$i]}}" required>
                                                    </td>
                                                    <td>
                                                        <div class="col-12 d-flex align-items-start px-0 d-lg-none">
                                                            <h6>SKU no (Not required)</h6>
                                                        </div>
                                                        <input type="text" class="form-control" name="sku[] text-lg-right text-md-left text-left" placeholder="SKU no (Not required)" value="{{$product->product_option['sku'][$i++]}}" >
                                                    </td>
                                            </tr>
                                    @endif

                                  </tbody>
                            </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

<!-- ////////////////////////////////รูปภาพและวิดีโอ//////////////////////////////// -->
        {{--<div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
            <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                <div class="col-12 mt-4">
                    <h5><strong>วิดีโอ</strong> <small class="text-dark" data-toggle="modal" data-target="#add_product" style="cursor: pointer;"><strong class="text-danger"><span class="text-dark">(ประเภท mp4 ขนาดไม่เกิน 10mb)</span> </strong></small></h5>
                </div>
                <div class="col-12">


                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 main-section">
                            <div class="form-group">
                                <div class="file-loading">
                                    <input id="file-2" type="file" name="file-2" class="file" accept="video/*">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>--}}

        <div class="col-12 px-lg-4 px-md-4 px-2 mb-4" >
            <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                <div class="col-12 mt-4">
                    <h5><strong>Photo</strong> <small class="text-dark" data-toggle="modal"
                                data-target="#add_product" style="cursor: pointer;"><strong class="text-danger"><span class="text-dark">(Recommended size 300 * 300 pixel)</span> See example <i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong></small></h5>
                </div>
                <div class="col-12">

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 main-section">
                                {{-- {!! csrf_field() !!} --}}
                                <div class="form-group">
                                    <div class="file-loading">
                                        <input id="file-1" type="file" name="file" multiple class="file" accept="image/*,video/*" data-overwrite-initial="false" data-min-file-count="1" required>
                                    </div>
                                </div>

                        </div>
                    </div>



                    @if ($product->product_img)
                        @foreach ($product->product_img as $item)
                            <input type="hidden" name="img_upload[]" value="{{$item}}">
                        @endforeach
                    @endif



                </div>
            </div>
        </div>

<!-- ////////////////////////////////การจัดส่ง//////////////////////////////// -->

        <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
            <div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                <div class="col-12 mt-4">
                    <h5><strong>Packing and shipping</strong></h5>
                </div>
                <div class="col-12">
                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-6"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">Vendor</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <select name='shipty_id' title="Choose vendor" class="form-control btn-color" id="shipty_id" required>
                                    <option value="">-- Choose vendor --</option>
                                    @foreach ($shipping_type as $item)
                                        <option value="{{ $item->shipty_id }}" {{ ($product->shipty_id == $item->shipty_id) ? 'selected="selected"' : '' }} >{{ $item->ship_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">Weight</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control is-invalid" id="product_weight"
                                    name="product_weight" placeholder="น้ำหนัก" value="{{$product->product_weight}}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">Gram(s)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="inputNameProduct-7"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">Size</strong>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-row was-validated">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control is-invalid" id="product_lwh" name="product_L"
                                            placeholder="Wdith" value="{{$product->product_L}}" >
                                        <div class="input-group-append">
                                            <span class="input-group-text">Cm.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control is-invalid" id="product_lwh" name="product_W"
                                            placeholder="Long" value="{{$product->product_W}}" >
                                        <div class="input-group-append">
                                            <span class="input-group-text">Cm.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control is-invalid" id="product_lwh" name="product_H"
                                            placeholder="Height" value="{{$product->product_H}}" >
                                        <div class="input-group-append">
                                            <span class="input-group-text">Cm.</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-6"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">Box size 1</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <select name='box_size_id1' title="Choose size" class="form-control btn-color" id="box_size_id1" required>
                                    <option value="">-- Choose size --</option>
                                    @foreach ($a_box_size as $item)
                                        @php
                                        @endphp
                                        <option value="{{ $item->id }}" {{ ($product->box_size_id1 == $item->id) ? 'selected="selected"' : '' }} >{{ 'Name '.$item->size_name.' size: '.$item->width.' x '.$item->long.' x '.$item->height.' Cm.' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">Packing</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control is-invalid" id="product_box_pack_amt1"
                                    name="product_box_pack_amt1" placeholder="Piece / Box" value="{{$product->box_pack_amt1}}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">Piece / Box</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-6"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">Box size 2</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <select name='box_size_id2' title="Choose size" class="form-control btn-color" id="box_size_id2" >
                                    <option value="">-- Choose size --</option>
                                    @foreach ($a_box_size as $item)
                                        <option value="{{ $item->id }}" {{ ($product->box_size_id2 == $item->id) ? 'selected="selected"' : '' }} >{{ 'Name '.$item->size_name.' size: '.$item->width.' x '.$item->long.' x '.$item->height.' Cm.' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">Packing</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control is-invalid" id="product_box_pack_amt2"
                                    name="product_box_pack_amt2" placeholder="Piece / Box" value="{{$product->box_pack_amt2}}" >
                                <div class="input-group-append">
                                    <span class="input-group-text">Piece / Box</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row was-validated">
                        <label for="inputNameProduct-6"
                            class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">Box size 3</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <select name='box_size_id3' title="Choose size" class="form-control btn-color" id="box_size_id3" >
                                    <option value="">-- Choose size --</option>
                                    @foreach ($a_box_size as $item)
                                        <option value="{{ $item->id }}" {{ ($product->box_size_id3 == $item->id) ? 'selected="selected"' : '' }} >{{ 'Name '.$item->size_name.' size: '.$item->width.' x '.$item->long.' x '.$item->height.' Cm.' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="inputNameProduct-6" class="col-sm-2 col-form-label text-lg-right text-md-left text-left">
                            <strong style="color: #333;">Packing</strong>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control is-invalid" id="product_box_pack_amt3"
                                    name="product_box_pack_amt3" placeholder="Piece / Box" value="{{$product->box_pack_amt3}}" >
                                <div class="input-group-append">
                                    <span class="input-group-text">Piece / Box</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- ////////////////////////////////อื่นๆ//////////////////////////////// -->

        <!--div class="col-12 mb-4 text-right  px-2 px-lg-4 px-md-4 mx-0">
            <a href="{{ URL::previous() }}" class="btn btn-outline-c45e9f">ยกเลิก</a>
            <button id="send-data" type="submit" class="btn btn-c75ba1">บันทึก</button>
        </div-->
    </form>
</div>


<div id="app">
    <parent-component inline-template>
        <ul>
            @foreach(range(1, 3) as $i)
                <child-component index="{{ $i }}" :value="value" @mounted="handleChildMounted"></child-component>
            @endforeach
        </ul>
    </parent-component>
</div>

<script>
    var imgs = []
    var imgs_initialPreviewConfig = []
</script>
@php
if ($product->product_img) {
    foreach ($product->product_img as $item) {
        $s_ext = pathinfo($item, PATHINFO_EXTENSION);
        if( $s_ext == 'mp4' ) {
@endphp
            <script>
                imgs.push(`<video class='kv-preview-data file-preview-video' id="img_db" src="/img/product/{{$item}}" controls autoplay>`)
                imgs_initialPreviewConfig.push({
                    caption: '{{$item}}', width: "120px",
                    url: '/shop/myproduct/edit/imgupload/delete/{{$item}}',
                    key: '{{$item}}',
                    // extra: {
                    //  item: '{{$item}}',
                    //  _token: $("input[name='_token']").val()
                    // }
                })
            </script>
@php
        } else {
@endphp
            <script>
                imgs.push(`<img class='kv-preview-data file-preview-image' id="img_db" src="/img/product/{{$item}}">`)
                imgs_initialPreviewConfig.push({
                    caption: '{{$item}}', width: "120px",
                    url: '/shop/myproduct/edit/imgupload/delete/{{$item}}',
                    key: '{{$item}}',
                    // extra: {
                    //  item: '{{$item}}',
                    //  _token: $("input[name='_token']").val()
                    // }
                })
            </script>
@php
        }
    }
}
@endphp


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl px-lg-5 px-0">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">เลือกหมวดหมู่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row ">
                    <div class="col-6 mb-4" style="overflow-y: auto; height: 300px;">
                        <div class="list-group" id="list-tab" role="tablist">
                            @foreach ($catogorys as $catogory)
                            <a class="list-group-item list-group-item-action" id="list-{{$catogory->category_id}}-list"
                                data-toggle="list" href="#list-{{$catogory->category_id}}" role="tab"
                                aria-controls="{{$catogory->category_id}}">{{$catogory->category_name}}</a>


                            @endforeach
                        </div>
                    </div>
                    <div class="col-6 mb-4" style="overflow-y: auto; height: 300px;">
                        <div class="tab-content" id="nav-tabContent">
                            @foreach ($catogorys as $catogory)
                            <div class="tab-pane right" id="list-{{$catogory->category_id}}" role="tabpanel"
                                aria-labelledby="list-{{$catogory->category_id}}-list">
                                @foreach ($catogory->subcategorys as $sub)
                                <a class="list-group-item list-group-item-action sub-list"
                                    sub_category_id="{{$sub->sub_category_id}}">{{$sub->sub_category_name}}</a>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="col-12">
                <h6>ที่เลือกในปัจจุบัน : <strong>อาหารเสริมและผลิตภัณฑ์สุขภาพ > อาหารเสริมเพื่อสุขภาพ</strong></h6>
            </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_product" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl px-lg-5 px-0">
        <div class="modal-content">
            <div class="modal-header pt-4">
                <div class='col-12 position-relative' style='text-align:center'>
                    <strong>
                        <h6 class="mb-0"><strong>ตัวอย่างขนาดรูป</strong></h6>
                    </strong>
                    <button type="button" class="close position-absolute" style="right: 4px; top: -8px;"
                        data-dismiss="modal">&times;</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <img src="/new_ui/img/example.png" class="w-100" alt="">
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script>
// console.log(imgs);
    var res_img;
    var res_img_file;
    var four_number = [];
    var count_array = [];
    $(document).on("click",".kv-file-remove",function(){
        res_img = count_array[$('.kv-file-remove').index(this)/2];
        $('[id="'+res_img+'"]').remove();
        count_array.splice($('.kv-file-remove').index(this)/2, 1);
    })
    $(document).on("click",".fileinput-remove-button",function(){
        count_array.forEach(res => {
            $('[id="'+res+'"]').remove();
        });
    })

    // $(document).on("click",".test_script" ,function(){
    //     // console.log($("#img_db").length);
    //     console.log(imgs.length);
    // })


    $( window ).on( "load", function() {
        console.log( "window loaded" );
        var check_category = $("#res_category").val();
        if(check_category == ""){
            $("#category").val("");
        }
    });

    var krajeeGetCount = function(id) {
            var cnt = $('#' + id).fileinput('getFilesCount');
            return cnt === 0 ? 'You have no files remaining.' :
            'You have ' +  cnt + ' file' + (cnt > 1 ? 's' : '') + ' remaining.';
    };

    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: '{{route('shop.add.myproduct.imgupload')}}',
        uploadAsync: true,
        // overwriteInitial: false,
        validateInitialCount: false,
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        allowedFileExtensions: ['jpg','jpeg', 'png', 'gif'],
        showUpload: false, // hide upload button
        browseOnZoneClick: true,
        overwriteInitial: false,
        // maxFileSize:2000, //
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }, overwriteInitial: false,
        validateInitialCount: true,
        initialPreview: imgs,
        initialPreviewConfig: imgs_initialPreviewConfig,
        })
        .on('fileimageloaded', function(event, previewId) {
        console.log("fileimageloaded");
    })
    .on('filebeforedelete', function() {
        var aborted = !window.confirm('Are you sure you want to delete this file?');
        if (aborted) {
            window.alert('File deletion was aborted! ');
        };
        return aborted;
    })
    .on('filedeleted', function(event, data, previewId, index) {
            // console.log(`input[name="img_upload[]"][val="${data}"]`);
        // console.log("TRTRTRTRTR");
        // console.log($("#file-1").val());
        $(`input[name="img_upload[]"][value="${data}"]`).remove();
        // if(count_array.length != 0){
        //     console.log(count_array);
        // }
    })
    .on('fileuploaded', function(event, data, previewId, index) {
        var form = data.form,
            files = data.files,
            extra = data.extra,
            response = data.response,
            reader = data.reader;
            res_img = response.uploaded;
        index++;
        if(count_array.length == ""){
            count_array = [];
            imgs.forEach(res => {
                count_array.push(imgs[res])
                console.log(imgs[res]);
            });
        }
        res_img_file = res_img.substring(0,res_img.lastIndexOf("."));
        $("body").find("form").append(`<input type="hidden" id="${res_img}" name="img_upload[]" value="${res_img}">`);
        $("#file-1").text(res_img);
        $("#file-1").prop('required',false);
        four_number[index] = res_img;

        count_array.push(four_number[index])
        console.log("index ::",index,"new index ::",count_array,"arrayLenght ::",count_array.length)


    })
    .on("filebatchselected", function(event, data, previewId, index) {
        var form = data.form,
            files = data.files,
            extra = data.extra,
            response = data.response,
            reader = data.reader;
        $("#file-1").fileinput("upload");
        // console.log("filebatchselected", data);
    });

    $("#file-2").fileinput({
        theme: 'fa',
        uploadUrl: '{{ route('shop.add.myproduct.imgupload') }}',
        uploadAsync: true,
        overwriteInitial: false,
        validateInitialCount: false,
        showUpload: false, // hide upload button
        initialPreviewAsData: true,
        // required: true,


        maxFilesCount: 1,
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        fileActionSettings: {
            showUpload: false, //This remove the upload button
            // showRemove: false,
        },
        allowedFileExtensions: ['mp4'],
        browseOnZoneClick: true,
        // initialPreviewAsData: true,
        overwriteInitial: false,
        // maxFileSize: 2000,

        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    })
    .on('fileimageloaded', function(event, previewId) {
        console.log("fileimageloaded");
    })
    .on('filebeforedelete', function() {
        var aborted = !window.confirm('Are you sure you want to delete this file?');
        if (aborted) {
            window.alert('File deletion was aborted! ');
        };
        return aborted;
    })
    .on('filedeleted', function(event, data, previewId, index) {
        // console.log(`input[name="img_upload[]"][val="${data}"]`);
        // console.log("TRTRTRTRTR");

        // $("#file-2").fileinput('clear');
        $("#file-2").text("");
        // console.log($("#file-2").val());
        // $(`input[name="img_upload[]"][value="${data}"]`).remove();

    })
    .on('fileuploaded', function(event, data, previewId, index, id) {
        // console.log('aaa:'+this)
        var form = data.form,
            files = data.files,
            extra = data.extra,
            response = data.response,
            reader = data.reader;
        res_img = response.uploaded;
        index++;
        res_img_file = res_img.substring(0, res_img.lastIndexOf("."));
        $("body").find("form").append(
            `<input type="hidden" id="${res_img}" name="img_upload2[]" value="${res_img}">`);
        $("#file-2").text(res_img);
        $("#file-2").prop('required', false);
        // console.log(event, data, previewId, index,id)

        four_number[index] = res_img;

        count_array.push(four_number[index]);
        console.log("index ::", index, "new index ::", count_array, "arrayLenght ::", count_array.length)
        // console.log("count_index ::",count_index = count_index + index)
        // four_number[index] = res_img
    })
    .on("filebatchselected", function(event, data, previewId, index) {
        var form = data.form,
            files = data.files,
            extra = data.extra,
            response = data.response,
            reader = data.reader;
        $("#file-2").fileinput("upload");
        // console.log("filebatchselected", data);
    })
    .on('filesuccessremove', function(event, id, data, a, b) {
    });
    $("#send-data").on("click", function(e) {
            // $("body").find("form").append(`<input type="hidden" name="img_upload[]" value="{{asset('img/no_image.png')}}" required>`);
        // if(count_array.length == 0){
        //     $("#file-1").prop('required',true);
        //     $("#file-1").fileinput("upload");
        //     e.preventDefault();
        //     console.log("img_db",$("#img_db").length);
        // }
         $("#file-1").prop('required',false);

        // if($("#file-1").text() === ""){
        //     // $("body").find("form").append(`<input type="hidden" name="img_upload[]" value="{{asset('img/no_image.png')}}" required>`);
        //     // $("#file-1").prop('required',true);
        //     $("#file-1").fileinput("upload");
        //     console.log($("#file-1").text());
        // }
        // $("#file-1").fileinput("upload");
        // else{
        //     $("#file-1").fileinput("upload");
        //     console.log("elseee");
        // }

    });

    // $('button[attr-add]').on('click', function (e) {
    //  var _this = $(this)
    //  // alert(_this.attr("attr-name"))
    //  // const last_el = $(this).parent().parent().prev()
    //  // const input = `<div class="form-group row">
    //  //                  <label class="col-sm-2 col-form-label"></label>
    //  //                  <div class="col-sm-10">
    //  //                  <input type="text" class="form-control" name="${$(this).attr('attr-add')}" autocomplete="off">
    //  //                  </div>
    //  //              </div>`

    //  // last_el.after(input)



    //  $.ajax({
    //      type: "POST",
    //      url: '{{route("update.option.add.myproduct", ["id" => $product->id])}}',
    //      data: $('form').serialize()+"&dis="+_this.attr("attr-name"),
    //      dataType: "json",
    //      success: function (response) {
    //          // console.log(response);
    //          if (response === 'success') {
    //              location.reload()
    //          }
    //      }
    //  });
    // });

    $('input[name="category_id"]').on('focus', function(){
        $('.modal#staticBackdrop').modal('toggle')
    })

    $('.modal#staticBackdrop').on('hidden.bs.modal', function (e) {
        $('.navbar.navbar-inverse').toggleClass('d-none')
    })

    $('.modal#staticBackdrop').on('show.bs.modal', function (e) {
        $('.navbar.navbar-inverse').toggleClass('d-none')
    })

    $(".sub-list").on('click', function(){
        $(".sub-list").removeClass('active')
        // $(this).addClass('active');
        $('input[name="category"]').val($(this).attr('sub_category_id'))
        // console.log($('input[name="category"]').val())
        $('input[name="category_id"]').val($('.list-group-item.list-group-item-action.active').text() +" > "+ $(this).text())
        $('.modal#staticBackdrop').modal('toggle')
    })


    var option_count = `${option_count}`;
    var option_count_int = parseInt(option_count);
    $('button[attr-add]').on('click', function (e) {
        var _this = $(this)
        // alert(_this.attr("attr-name"))
        const last_el = $(this).parent().parent().prev()
        const input = `<div id="${option_count_int}" class="form-group d-md-flex text-right deleteOptionSelectMore row mx-0" >
                                    <label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
                                    <div class="col-lg-9 col-md-9 col-10" >
                                        <input type="text" class="form-control" name="${$(this).attr('attr-add')}" autocomplete="off" >
                                    </div>
                                    <div  class="col-lg-1 col-md-1 col-2 d-flex align-items-center" >
                                        <i type="button" class="fa fa-trash-o deleteOptionSelect" attr-name="dis2"  attr-add="dis2[]" onclick="clearoption($(this).parent().parent().attr('id'))" "></i>
                                    </div>
                                </div>`
        last_el.after(input)
        table_content()
        option_count_int = option_count_int + 1
    });


    $('button[openoption').on('click' ,function (e) {
        const _this = $(this)
        $(".option").toggleClass('d-none')
        $(".closeoption").toggleClass('d-none')
        $(".table-option").toggleClass('d-none')
        $('input[name="price[]"]').eq(0).attr('disabled', 'true')
        $('input[name="margin[]"]').eq(0).attr('disabled', 'true')
        $('input[name="stock[]"]').eq(0).attr('disabled', 'true')

    })

    $('button[option]').on('click', function (e) {
        $(`.option${$(this).attr('option')}`).toggleClass('d-none')

        table_content();
    })

    function clearoption(option_count) {

    var element = document.getElementById(option_count);
        element.remove();
        table_content()

    }


    function table_content(){

        var options = ["option1","option2"]
        var theads = ["emp", "emp", "ราคาขายปลีก", "ราคาขายส่ง", "คลัง", "เลข SKU"];
        var theads_key = ["emp", "emp", "price", "margin", "stock", "sku"];
        var dis = []
        var sum = 0;
        var loop = 1;
        $.each(options, function (indexInArray, valueOfElement) {
            if(!$(`.option${indexInArray+1}`).hasClass('d-none')) {
                dis[indexInArray] =  $(`input[name="dis${indexInArray+1}[]"]`).length
                theads[indexInArray] = $(`input[name="option${indexInArray+1}"]`).val()
            } else {
                dis[indexInArray] = 1
            }

            loop *= dis[indexInArray]
        });

        var option1_index = []
        var c = 0;
        for (let index = 0; index < loop; index++) {
            if (  index % dis[1] == 0 && index > 0){c++}
            console.log(dis[0]);
            option1_index[index] = $('input[name="dis1[]"]').eq(c).val()
        }

        var option2_index = []
        var c = 0;
        for (let index = 0; index < loop; index++) {
            if (  index % dis[1] == 0){c = 0}
            option2_index[index] = $('input[name="dis2[]"]').eq(c).val()
            c++
        }

        var thead_html = `<table class="table table-striped table-bordered"><thead><tr>`
        $.each(theads, function (indexInArray, valueOfElement) {
            if (valueOfElement != "emp")
            thead_html += `<th>${valueOfElement}</th>`
        })
        thead_html += `</thead>`
        thead_html += `<tbody>`


        for (let index = 0; index < loop; index++) {
            thead_html += "<tr>"
                $.each(theads, function (indexInArray, valueOfElement) {
                    if (valueOfElement != "emp"){
                if (valueOfElement === "เลข SKU"){
                    if (indexInArray > 1) {
                        thead_html +=
                            `<td><input type="text" class="form-control text-right" name="${theads_key[indexInArray]}[]"></td>`

                    } else {
                        if (indexInArray === 0) {
                            thead_html += `<td class="bind-${option1_index[index]}">${option1_index[index]}</td>`
                        } else {
                            thead_html += `<td class="bind2-${option2_index[index]}">${option2_index[index]}</td>`
                        }
                    }
                } else {
                    if (indexInArray > 1) {
                        thead_html +=
                            `<td><input type="number" class="form-control text-right" name="${theads_key[indexInArray]}[]" required></td>`

                    } else {
                        if (indexInArray === 0) {
                            thead_html += `<td class="bind-${option1_index[index]}">${option1_index[index]}</td>`
                        } else {
                            thead_html += `<td class="bind2-${option2_index[index]}">${option2_index[index]}</td>`
                        }
                    }
                }
            }
                    // if (valueOfElement != "emp")
                    //  if(indexInArray > 1) {
                    //      thead_html += `<td><input type="text" class="form-control text-right" name="${theads_key[indexInArray]}[]" required></td>`

                    //  }else {
                    //      if (indexInArray === 0){
                    //          thead_html += `<td class="bind-${option1_index[index]}">${option1_index[index]}</td>`
                    //      }else {
                    //          thead_html += `<td class="bind2-${option2_index[index]}">${option2_index[index]}</td>`
                    //      }
                    //  }
                })
            thead_html += "</tr>"
        }


        $("#table").html(thead_html)

    }

    $("input[type=number]").on("keydown", function(e) {
        var invalidChars = ["-", "+", "e"];
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });


    $('input[name="option1"]').on('keyup keypress blur change', function(e){
        $("#table thead tr th").eq(0).text($(this).val())
    })

    $('input[name="option2"]').on('keyup keypress blur change', function(e){
        $("#table thead tr th").eq(1).text($(this).val())
    })


    $(document).on('keyup keypress blur change' , 'input[name="dis1[]"]'  , function(e){
        table_content()
    })


    $(document).on('keyup keypress blur change' , 'input[name="dis2[]"]'  , function(e){
        table_content()
    })

</script>


<script src="https://cdn.jsdelivr.net/npm/keillion-dynamsoft-javascript-barcode@0.20201124110923.0/dist/dbr.js"
    data-productKeys="t0068NQAAAAYe5rtv/EEICK+bjDKnHsSZi4eRCBF7rQoo4BhbwBvsLTRt1TobT/J1jN00GtxRIdWW9OLEX3k889MgSuF1n5k=">
</script>
<script>
    $(document).ready(function () {

        $('#EditProductbarcode_btn').on('click', function () {

            let scanner = null;
            (async () => {

                scanner = await Dynamsoft.DBR.BarcodeScanner.createInstance();
                await scanner.setUIElement(document.getElementById('barcodeBodyModalEditProduct'));
                await scanner.updateVideoSettings({
                    video: {
                        width: {
                            ideal: 460
                        },
                        height: {
                            ideal: 240
                        },
                        facingMode: {
                            ideal: 'environment'
                        }
                    }
                });
                scanner.onFrameRead = results => {
                    console.log(results);
                };

                $('#showEditProductBarcode_no').text('');
                scanner.onUnduplicatedRead = (txt, result) => {

                    console.log(txt);
                    $('input[name="barcode"]').val(txt);

                    var barcode_input = $('input[name="barcode"]').val();
                    $('#showEditProductBarcode_no').text(barcode_input);
                    $('#barcodeeditProduct_input').val(barcode_input);
                    $('#saveEdit_Modal').on('click', function () {
                        $('#barcodeEditModal').modal('hide');
                    });

                };
                await scanner.show();
            })();
        });
        $('#d_drug_target').multiselect();
        $(':input').prop('disabled',true);
    });
</script>
@endsection


