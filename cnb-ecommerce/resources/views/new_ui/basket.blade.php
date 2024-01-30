@extends('layouts.default')
@section('style')
<style>
.lahead{
    color: #c45e9f
}
.textcolorr{
    color: #c45e9f;
    font-size: 18px
}
.fontsize{
    font-size: 16px
}
.btn-outline-purplish-pink{
    color: #c45e9f;
    border-color: #c45e9f;
}
/* .btn-outline-purplish-pink:hover{
    background-color: #c45e9f;
} */
.btn-outline-purplish-pink:active{
    background-color: #c45e9f;
}

.btn-outline-purplish-pink:visited {
    background-color: #c45e9f;
}
.navbt{
    margin-top:200px;
}
.btp{
    color: #1e1e1e;
    background-color: #b1b7bc;
    border-color: #b1b7bc;
}
.btnsum{
    color: #fff;
    background-color: #c45e9f;
    border-color: #c45e9f;
}
.navtest {
  background-color: #ffffff;
  height: 150px !important;
  z-index: 3 !important;
}

</style>
@endsection
@section('content')
<div class="container">
    <nav class="navbar nav3  justify-content-center "> 
    </nav>

    <div class="row justify-content-center" style="">
        <div class="card col-lg-9 col-md-11 col-12  mt-4 white border-0 rounded p-4" id="flash-sale" style="">
              {{-- <nav aria-label="breadcrumb bg-light">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/" class="h5 regular blue">หน้าแรก</a></li>
                  <li class="breadcrumb-item active h5 regular" aria-current="page" >ตะกร้าสินค้า</a></li>
                </ol>
              </nav> --}}
              <h4 class="lahead "><b>ตะกร้าของคุณ</b></h4>
              <hr>
            <div class="d-none d-lg-block">
                <div class="row black h5 regular col-lg-12 ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-0 d-inline-block fontsize">
                        <input type="checkbox" class="mr-lg-3 mr-sm-0 mr-xs-0 " id="check_all1" name="check" value="0">
                        <b>สินค้า</b>
                    </div>
                    <div class="col-lg-2  fontsize">
                        <b>ราคาต่อชิ้น</b>
                    </div>
                    <div class="col-lg-2  fontsize">
                        <b>จำนวน</b>
                    </div>
                    <div class="col-lg-2 d-none d-lg-block fontsize">
                        <b>ราคารวม</b>
                    </div>
                </div>
            </div>
        </div>
        {{-- @foreach ($basket_all as $key=>$item) --}}
        <div class="card col-lg-9 col-md-11 col-12  mt-2 white border-0 rounded p-4" id="flash-sale" style="">
            <div class="row black h5 regular col-lg-12 ">
                {{-- {{$item->inv_ref}} --}}
                <div class="col-lg-2 col-md-3 col-sm-12  p-0 d-inline-block fontsize">
                    {{-- <input checked type="checkbox" class="mr-3" name="check" value="0" id="check{{$key}}">
                    {{$item->shops[0]->shop_name}} --}}
                    <input checked type="checkbox" class="mr-3" name="check" value="0" id=""><b class="fontsize">สินค้าทั้งหมด</b>
                </div>
                <div class="row d-block d-sm-none">
                    <br>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 mt-lg-n1 ">
                    <button type="" class="btn btn-md btn-outline-purplish-pink pb-1 pt-1 pr-3 pl-3 d-inline-block " >
                        <img src="img/Group 2752.svg" class="img-fluid mt-n1 mr-1"><b>ไปที่ร้านค้า</b>
                    </button>
                    <button type="" class="btn btn-md btn-outline-purplish-pink pb-1 pt-1 pr-3 pl-3 d-inline-block" >
                        <img src="img/Group 2750.svg" class="img-fluid mt-n1 mr-1"><b>แชทเลย</b>
                </div>
            </div>
            
            {{-- @foreach ($item->inv_products as $key1=>$item1) --}}
                <hr>
                {{-- ipad --}}
                <div class="row ">
                    <div class="col-5 d-none d-md-block d-lg-none">
                    </div>
                    <div class="col-2 d-none d-md-block d-lg-none">
                        <div class="row">
                            <div class="col-lg-12">
                                <b>ราคาต่อชิ้น</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 d-none d-md-block d-lg-none">
                        <div class="row">
                            <div class="col-12 text-md-center">
                                <b>จำนวน</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 d-none d-md-block d-lg-none">
                        <div class="row">
                            <div class="col-12 text-md-center">
                                <b>ราคารวม</b>
                            </div>
                        </div>
                    </div>
                </div>{{-- endipad --}}
           
           
           
                <div class="row black mt-md-3 col-lg-12 d-flex " >
                {{-- @foreach ($product_all as $item2)
                    @if ( $item2->id == $item1['product_id']) --}}

{{-- new --}}

                    {{-- <div class="col-lg-2 col-md-6 col-sm-6 col-6 p-0 d-inline-block">
                        <input checked type="checkbox" style="margin-top: 30px" value=""class="" name="check" id="check_1" >
                        <img src="img/icon/Group 2756.png" alt="..." class="img-thumbnail"width="80%" height="60">
                    </div>
                    <div class="col-lg-4 col-md-5 col-6 mt-2 regular p-0">
                        <div class="row crop-text-2" style="height: 57px">
                            <div class="col-12">
                                18asdasdadadsaasdasd
                            </div>
                           
                        </div>
                        <div class="row">
                            
                            <h5 class="col-12 ">12asdasdadadsaasdasd</h5>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="textcolorr regular pink ">
                            <b class="col text-center">12000</b>
                        </div>
                    </div>
                    <div class="col-lg-2 ml-n5">
                            <button class="btn btp btn-sm" type="submit">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </button>
                            <b class="col text-center">100</b>
                            <button class="btn btp btn-sm " type="submit">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                </svg>
                            </button>
                    </div>
                    <div class="col-lg-2">
                            <div class="col textcolorr text-center">
                                <b>12555</b>
                            </div>
                    </div>
                    <div class="col-lg-1 ml-n5">
                    <button class="btn" type="submit">
                        <div class="col"><img src="img/icon/Group 2756.png"  alt=""></div>
                    </button>
                    </div> --}}
                    
{{-- new --}}


                <div class="col-lg-6 col-md-5 col-sm-12  pl-0">
                    <div class="row ">
                        <div class="col-lg-1 col-md-1 col-12">
                            <div class=" mt-1 mr-0 ml-3 pink p-0">
                                <input checked type="checkbox" style="margin-top: 30px" value=""class="" name="check" id="check_1" >
                                    {{-- <input checked type="checkbox" style="margin-top: 30px" value="{{$item1['price']*$item1['amount']}}"
                                    class="check{{$key.$key1}}" name="check" id="check_1" data-inv_ref="{{$item->inv_ref}}" data-key="{{$key1}}" data-shop_id="{{$item->shops[0]->id}}"> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4 mt-2 ml-4 pl-0 regular align-self-center">
                            <img src="img/icon/Group 2756.png" alt="..." class="img-thumbnail"width="80%" height="60">
                            {{-- @if(isset ($item->product_img[0]) )
                            <?php $front_image = $item2->product_img[0];
                            ?>

                            <?php $front_image = null;
                            ?>
                            @endif


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
                            @endif --}}
                        </div>
                        <div class="col-lg-6 col-md-5 col-6 mt-2 regular p-0">
                            <div class="row crop-text-2" style="height: 57px">
                                <div class="col-12">
                                    18asdasdadadsaasdasd
                                </div>
                                {{-- <h5>{{$item2->name}}</h5> --}}
                            </div>
                            <div class="row">
                                {{-- <h6 style="opacity: 0.5">{{$item1['dis2']}} , {{$item1['dis1']}}</h6> --}}
                                <h5 class="col-12 ">12asdasdadadsaasdasd</h5>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="col-lg-6 col-md-7 col-sm-12  pl-0 ">
                        <div class="row ">
                            <div class="col-12 mt-2 regular pink mr-lg-3 d-block d-sm-none">
                                <div class="row">
                                    <div class="col-12">
                                        <b class="col-12">ราคาต่อชิ้น</b>
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-3 col-md-4 col-sm-11 mr-xl-n3 ml-md-3 ml-sm-auto textcolorr mt-2 regular pink mr-lg-5 text-center align-self-center">
                                    <b>12000</b>
                                </div>
                                {{-- <h5>{{$item1['price']}}</h5> --}}
                                <div class="col-12 mt-2 regular pink mr-lg-3 d-block d-sm-none">
                                    <div class="row">
     
                                        <div class="col-12">
                                            <b class="col-12">จำนวน</b>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-lg-4 col-md-5 col-sm-5 mt-lg-2 ml-lg-2 ml-md-n3 text-center">
                                        <button class="btn btp btn-sm" type="submit">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                        </button>
                                        <b>100</b>
                                        <button class="btn btp btn-sm " type="submit">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                            </svg>
                                        </button>
                                    </div>
                                {{-- <h5>{{$item1['amount']}}</h5> --}}
                                <div class="col-12 mt-2 regular pink mr-lg-3 d-block d-sm-none">
                                    <div class="row ">
                                        <div class="col-12">
                                            <b class="col-12 ">ราคารวม</b>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-lg-3 col-md-3 col-12 mt-2 ml-lg-2 regular pink mr-xl-5 ml-md-n4 textcolorr text-center align-self-center">
                                <b>12555</b>
                                {{-- <h5 class="">{{$item1['price']*$item1['amount']}}</h5> --}}
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mt-1  mt-lg-n5 mt-md-n5 ml-md-auto text-right regular pink">
                                {{-- <a href="basket/delete/{{$item->inv_ref}}/{{$key1}}/{{$item->shops[0]->id}}"> --}}
                                <button class="btn"  type="submit">
                                    <div class="col"><img src="img/icon/Group 2756.png"  alt=""></div>
                                </button>
                                {{-- </a> --}}
                            </div>
                        </div>
                    </div>
                            <script>
                               
                            </script>
                        {{-- @endif
                    @endforeach --}}

                {{-- @endforeach --}}
        

                {{-- @endforeach --}}
            </div> {{--endrow black--}}
        </div> {{--endcard2--}}
        <div class="card col-lg-9 col-md-11 col-12 mt-2 white border-0 rounded p-2 d-none d-sm-block" style="">
            <nav class=" mt-2 d-none d-sm-block">
                <div class="container justify-content-center">
                    <div class="row black h5 regular col-lg-12 ">
                        <div class="col-lg-12 col-md-12 col-12 p-0">
                            <div class="row mt-2 d-flex p-0">
                            </div class="col-1">
                            </div>
                                <div class="mr-3">
                                    <input checked type="checkbox" id="check_all" name="check" value="0">
                                </div>
                                <div class="regular black">
                                    <h5>เลือกทั้งหมด</h5>
                                </div>
                                <div class="ml-auto">
                                    {{-- <div class="d-none d-sm-block"> --}}
                                        <div class="regular black d-inline-block mr-2 d-none">
                                            <h5>รวมราคาสินค้า</h5>
                                        </div>
                                    {{-- </div> --}}
                                    <div class="regular pink d-inline-block mr-2">
                                        <h3 id="price_all" class="">____</h3>
                                    </div>
                                    <div class="regular pink d-inline-block  mr-1">
                                        <a id="buy_btn" href="">
                                            <button class="btn btnsum" id="buy" type="submit">
                                                <h5 class="mb-0">สั่งซื้อสินค้า</h5>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <nav class="navbar fixed-bottom navbar-light bg-light navtest d-block d-sm-none">
            <div class="container justify-content-center">
                <div class="row black h5 regular col-lg-12 ">
                    <div class="col-lg-12 col-md-12 col-12 p-0">
                        <div class="row mt-2 col-lg-12 d-flex p-0">
                            <div class="mr-3">
                                <input checked type="checkbox" id="check_all" name="check" value="0">
                            </div>
                            <div class="regular black">
                                <h5>เลือกทั้งหมด</h5>
                            </div>
                            <div class="ml-auto">
                                {{-- <div class="d-none d-sm-block"> --}}
                                    <div class="regular black d-inline-block mr-2 d-none">
                                        <h5>รวมราคาสินค้า</h5>
                                    </div>
                                {{-- </div> --}}
                                <div class="regular pink d-inline-block mr-2">
                                    <h3 id="price_all" class="">____</h3>
                                </div>
                                <div class="regular pink d-inline-block  mr-1">
                                    <a id="buy_btn" href="">
                                        <button class="btn btnsum" id="buy" type="submit">
                                            <h5 class="mb-0">สั่งซื้อสินค้า</h5>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<div style="height: 100px">

</div>
<script>

    // $(document).ready(function() {
    // $('footer').hide();

    // var total = 0;
    // $('input[name="check"]').each(function() {
    //     if (this.checked){
    //         total += +Number(this.value);
    //     }
    // });
    // $("#price_all").text(total);


    // $('input[name="check"]').click(doIt);
    // function doIt() {
    //     var total = 0;
    //     $('input[name="check"]').each(function() {
    //         if (this.checked){
    //             total += +Number(this.value);
    //         }
    //     });
    //     $("#price_all").text(total);
    // }


    // $("#buy").click(function(){
    //     var check = '';
    //     var inv_ref = '';
    //     var shop_id = [];
    //     var key = [];
    //     $.each($("input[id='check_1']:not(:checked)"), function(){
    //         inv_ref = $(this).data('inv_ref');
    //         shop_id.push($(this).data('shop_id'));
    //         key.push($(this).data('key'));
    //         check = "?inv_ref="+inv_ref+"&shop_id="+shop_id+"&key="+key;
    //         });
    //         if (inv_ref != "") {
    //             $("#buy_btn").attr("href", "/checkout/"+check);
    //         } else {
    //             $("#buy_btn").attr("href", "/checkout/?inv_ref="+$("input[id='check_1']").data('inv_ref'));
    //         }

    //     });


    // });

</script>

@stop
