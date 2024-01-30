@extends('layouts.default')
@section('content')
<div class="container">
    {{-- ////////////////////////////////////nav-home//////////////////////////////////// --}}
    <div class="row">
        <nav class="navbar navbar-expand navbar-light fixed-top bg-white nav-home "  id="nav-home">
            <div class="container">
            <ul class="navbar-nav ">
                <li class="nav-item border-right">
                    <a class="nav-link h6 medium mr-2 ml-4" href="category">All Categories
                        <u class="ml-4 pink">ดูทั้งหมด</u>
                    </a>
                </li>
                <li class="nav-item border-right">
                    <a class="nav-link h6 medium ml-2 mr-2" href="#flash-sale" onclick="testfun()">Flash Sale</a>
                </li>
                <li class="nav-item border-right ml-2 mr-2">
                    <a class="nav-link h6 medium ml-2 mr-2" href="#contact">ขายดีประจำสัปดาห์</a>
                </li>
                <li class="nav-item border-right ">
                    <a class="nav-link h6 medium ml-2 mr-2" href="#new-product">สินค้าใหม่</a>
                </li>
                <li class="nav-item border-right ">
                    <a class="nav-link h6 medium ml-2 mr-2" href="/product_all?product=otop">สินค้าโอทอป</a>
                </li>
            </ul>
            </div>
        </nav>
    </div>
        {{-- ////////////////////////////////////category//////////////////////////////////// --}}

    <div class="row justify-content-center" style="padding-top: 70px">
        <div class="card col-lg-2-5 col-md-2-5 d-sm-none d-none d-lg-block  white border-0 rounded pt-3 pl-0 pr-0 scroll" >
            @foreach($category_all as $category)
            <?php $banner = explode('.',$category->banner)?>
            <div class="row category pl-xl-4 pl-lg-3 pl-md-0">
                <a class="" href="product_all/?category={{$category->category_id}}">
                    <img src="/img/category/{{$banner[0]}}.svg" alt="" style="width:20px;" class="d-none d-lg-inline-block">
                    <h6 class="light d-inline-block ml-3 mt-2">{{ $category->category_name }}</h6><br>
                    <div class="sub-category col-8 border-left-0 p-4 ">
                        <div class="d-inline-block col-9">
                            <div class="row">
                                @foreach($category->data_subdets as $value)
                                <div class="col-4">
                                    <a class="" href="product_all/?category={{$category->category_id}}&sub={{$value->sub_id}}">
                                        <h6 class="light mt-3">{{$value->sub_name}}</h6>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-inline-block col-2" >
                            <h3 class="regular" style="color: black">แบรนด์<hr style="color: #000000"></h3>
                        </div>
                    </div>
                </a>

            </div>
            @endforeach
        </div>

        {{-- ////////////////////////////////////slider//////////////////////////////////// --}}

        <div class="col-lg-9 col-md-12 mt-3" >
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100 rounded" style="max-height:40vw" src="/img/slides1.png" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 rounded" style="max-height:40vw" src="/img/slides2.png" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 rounded" style="max-height:40vw" src="/img/slides3.png" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>
    {{-- ////////////////////////////////////flash sale//////////////////////////////////// --}}

    <?php
        $product_flash = $product_all ;
        $class = "item";
        // foreach ($product_all as $key => $value) {
        //     if($value->front_image!='0'&&$value->front_image!=null){
        //         array_push($product_flash,$value);
        //     }
        // }
        ?>
    <div data-spy="scroll" data-target="#nav-home" data-offset="0">
        <div class="row justify-content-center " id="flash-sale">
            <div class="card col-11 mt-4  white border-0 rounded pr-4 pl-4 pt-3 "  style="">
                <div class="row">
                    <div class="d-flex col-12"  style="height:35px">
                        <h1 class="regular black mb-0" style="font-size:22px;">Flash Sale</h1>
                        <!-- <button class="btn btn-md btn-secondary pb-1 pt-1 pr-3 pl-3 d-inline-block mr-2 ml-3" ><h6 class="regular mb-0">จะหมดอายุภายใน</h6></button> -->
                        <button class="btn btn-primary btn-sm ml-auto"><h6 class="regular mb-0">ดูสินค้าทั้งหมด</h6></button>
                    </div>
                </div>
                <hr>

                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                        <div class="MultiCarousel-inner">

                            @foreach($product_flash as $item)
                                @include('component.product-cart')
                            @endforeach
                        </div>
                        <button class="btn btn-primary leftLst"><</button>
                        <button class="btn btn-primary rightLst">></button>
                    </div>

            </div>
        </div>
    </div>

    {{-- ////////////////////////////////////promotion//////////////////////////////////// --}}

        <div id="promotion" class="row mt-5">
            <div class="col m-0 p-0 nav-link">
                <a href="/promotion"><img class="col-12  m-0 p-1" src="/img/promotion1.png" alt="" ></a>
            </div>
            <div class="col  m-0 p-0 nav-link">
                <a href="/promotion" ><img  class="col-12  m-0 p-1"  src="/img/promotion2.png" alt=""></a>
            </div>
            <div class="col  m-0 p-0 nav-link">
                <a href="/promotion" ><img  class="col-12  m-0 p-1"  src="/img/promotion3.png" alt=""></a>
            </div>

{{--
                <img href="/category" class="col-4" src="/img/promotion2.png" alt="">

                <img href="#" class="col-4" src="/img/promotion3.png" alt=""> --}}
        </div>

    {{-- ////////////////////////////////////product//////////////////////////////////// --}}
    <div class="row justify-content-center " id="new-product">
        <div class="card col-11 mt-3 white border-0 rounded pt-3 mb-2 pb-2" id="flash-sale" style="">
            <div class="d-flex justify-content-start">
                <a class="nav-link h5 medium ml-2 mr-2" href="#new-product">สินค้าใหม่</a>
                <a class="nav-link h5 medium ml-2 mr-2 pink" href="#new-product">สินค้าแนะนำ</a>
            </div>

        </div>
    </div>

    <div class="">
        <div>
            <?php  $class = "shadow-sm";
            // $product_all = (array)$product_all
            ?>
            {{-- @foreach ($product_all as $item)
                @include('component.product-cart')
            @endforeach --}}
            <div class="row mt-lg-1 pt-lg-1 ml-lg-5 pl-lg-5 mr-lg-5 pr-lg-5  p-md-4 m-sm-1 p-sm-1 p-0 ">
                @foreach($product_all->chunk(6) as $row)
                    <div class="row col-12 p-0">
                        @foreach($row as $item)
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6 p-1">
                            @include('component.product-cart')
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center " id="new-product">
        <a class="card d-lg-none col-6 mt-2 white border-0 rounded pt-2 mb-5 pb-1 shadow-sm"  href="/product_all" id="flash-sale" style="">
            <h3 class="nav-link medium ml-2 mr-2 text-center black" >ดูเพิ่มเติม</h3>
        </a>
        <a class="card d-none d-lg-block col-3 mt-2 white border-0 rounded pt-2 mb-5 pb-1 shadow-sm"  href="/product_all" id="flash-sale" style="">
            <h3 class="nav-link medium ml-2 mr-2 text-center black" >ดูเพิ่มเติม</h3>
        </a>
    </div>
</div>








<script>
    $(document).ready(function () {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();




        $(window).resize(function () {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                } else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({
                    'transform': 'translateX(0px)',
                    'width': itemWidth * itemNumbers
                });
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            } else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });



    var navOffset = parseInt($('body').css('padding-top'));
    $('.navbar a').click(function (event) {
        var scrollPos = jQuery('body').find($(this).attr('href')).offset().top - navOffset - 70;
        $('body,html').animate({
            scrollTop: scrollPos
        }, 500, function () {});
        return false;
    });


</script>

<script>
    $(document).ready(function() {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function() {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();




            // $(window).resize(function() {
            //             ResCarouselSize();

            //             //this function define the size of the items
            //             function ResCarouselSize() {
            //                 var incno = 0;
            //                 var dataItems = ("data-items");
            //                 var itemClass = ('.item');
            //                 var id = 0;
            //                 var btnParentSb = '';
            //                 var itemsSplit = '';
            //                 var sampwidth = $(itemsMainDiv).width();
            //                 var bodyWidth = $('body').width();
            //                 $(itemsDiv).each(function() {
            //                     id = id + 1;
            //                     var itemNumbers = $(this).find(itemClass).length;
            //                     btnParentSb = $(this).parent().attr(dataItems);
            //                     itemsSplit = btnParentSb.split(',');
            //                     $(this).parent().attr("id", "MultiCarousel" + id);


            //                     if (bodyWidth >= 1200) {
            //                         incno = itemsSplit[3];
            //                         itemWidth = sampwidth / incno;
            //                     } else if (bodyWidth >= 992) {
            //                         incno = itemsSplit[2];
            //                         itemWidth = sampwidth / incno;
            //                     } else if (bodyWidth >= 768) {
            //                         incno = itemsSplit[1];
            //                         itemWidth = sampwidth / incno;
            //                     } else {
            //                         incno = itemsSplit[0];
            //                         itemWidth = sampwidth / incno;
            //                     }
            //                     $(this).css({
            //                         'transform': 'translateX(0px)',
            //                         'width': itemWidth * itemNumbers
            //                     });
            //                     $(this).find(itemClass).each(function() {
            //                         $(this).outerWidth(itemWidth);
            //                     });



                                $(window).resize(function() {
                                    ResCarouselSize();
                                });

                                //this function define the size of the items
                                function ResCarouselSize() {
                                    var incno = 0;
                                    var dataItems = ("data-items");
                                    var itemClass = ('.item');
                                    var id = 0;
                                    var btnParentSb = '';
                                    var itemsSplit = '';
                                    var sampwidth = $(itemsMainDiv).width();
                                    var bodyWidth = $('body').width();
                                    $(itemsDiv).each(function() {
                                        id = id + 1;
                                        var itemNumbers = $(this).find(itemClass).length;
                                        btnParentSb = $(this).parent().attr(dataItems);
                                        itemsSplit = btnParentSb.split(',');
                                        $(this).parent().attr("id", "MultiCarousel" + id);


                                        if (bodyWidth >= 1200) {
                                            incno = itemsSplit[3];
                                            itemWidth = sampwidth / incno;
                                        } else if (bodyWidth >= 992) {
                                            incno = itemsSplit[2];
                                            itemWidth = sampwidth / incno;
                                        } else if (bodyWidth >= 768) {
                                            incno = itemsSplit[1];
                                            itemWidth = sampwidth / incno;
                                        } else {
                                            incno = itemsSplit[0];
                                            itemWidth = sampwidth / incno;
                                        }
                                        $(this).css({
                                            'transform': 'translateX(0px)',
                                            'width': itemWidth * itemNumbers
                                        });
                                        $(this).find(itemClass).each(function() {
                                            $(this).outerWidth(itemWidth);
                                        });

                                        $(".leftLst").addClass("over");
                                        $(".rightLst").removeClass("over");

                                    });
                                }


                                //this function used to move the items
                                function ResCarousel(e, el, s) {
                                    var leftBtn = ('.leftLst');
                                    var rightBtn = ('.rightLst');
                                    var translateXval = '';
                                    var divStyle = $(el + ' ' + itemsDiv).css('transform');
                                    var values = divStyle.match(/-?[\d\.]+/g);
                                    var xds = Math.abs(values[4]);
                                    if (e == 0) {
                                        translateXval = parseInt(xds) - parseInt(itemWidth * s);
                                        $(el + ' ' + rightBtn).removeClass("over");

                                        if (translateXval <= itemWidth / 2) {
                                            translateXval = 0;
                                            $(el + ' ' + leftBtn).addClass("over");
                                        }
                                    } else if (e == 1) {
                                        var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                                        translateXval = parseInt(xds) + parseInt(itemWidth * s);
                                        $(el + ' ' + leftBtn).removeClass("over");

                                        if (translateXval >= itemsCondition - itemWidth / 2) {
                                            translateXval = itemsCondition;
                                            $(el + ' ' + rightBtn).addClass("over");
                                        }
                                    }
                                    $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
                                }

                                //It is used to get some elements from btn
                                function click(ell, ee) {
                                    var Parent = "#" + $(ee).parent().attr("id");
                                    var slide = $(Parent).attr("data-slide");
                                    ResCarousel(ell, Parent, slide);
                                }

                            });

                            var navOffset = parseInt($('body').css('padding-top'));
                            $('.navbar a').click(function(event) {
                                var scrollPos = jQuery('body').find($(this).attr('href')).offset().top - navOffset - 70;
                                $('body,html').animate({
                                    scrollTop: scrollPos
                                }, 500, function() {});
                                return false;
                            });





                        });
</script>






@stop
