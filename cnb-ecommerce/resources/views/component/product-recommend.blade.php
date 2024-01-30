                                    @if(isset ($item->product_img[0]) )
                                    <?php 
                                    $front_image = $item->product_img[0];
                                    $src="/img/product/".$front_image; 
                                    ?>
                                @else
                                    <?php $src="/img/no_image.png"; ?>

                                @endif
                                <?php $title = $item->name; 
                                    $allpaying = 0;
                                    $rating_person = 0;
                                    ?>


                                    @foreach ($rating_group as $rating)
                                    <?php 
                                    
                                    if($rating['product_id'] == $item['id']){
                                        $allpaying += $rating['rating']; 
                                        $rating_person++;
                                    }
                                    // 
                                    ?>
                                    @endforeach
                                
                                <!-- <a href="/product/{{$item->id}}"> -->
                                <a href="/product_detail/{{$item->id}}">
                                            <div class="rounded8px px-2 "
                                                style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                                                <div class="d-flex align-items-center justify-content-center h-200px pt-2"
                                                    style="overflow:hidden;">
                                                    <img data-src="{{$src}}" class=" rounded8px lazy"
                                                        style="max-height: 100%;max-width: 100%;"
                                                        alt="...">
                                                </div>
                                                <div class="px-2">
                                                    <h6 class="card-title mb-0 text-left text-dot2-custom pt-2 font_head_item" data-toggle="tooltip" data-placement="top" title="{{ $item->name }}" style="font-size: 14px !important;">
                                                        <strong>{{$title}}</strong>
                                                    </h6>
                                                    <h2 class="card-text mb-0 text-left font_price" style="color: #d61900; font-size: 18px !important;"><strong>฿
                                                            {{number_format(min($item->product_option['price']))}}</strong>
                                                    </h2>
                                                    <h6 class="text-left mb-3 pb-1 d-flex align-items-start" style="height:25px !important;">
                                                    @if($allpaying > 0)
                                                    <?php $starpercen = ($allpaying/($rating_person*5))*100; ?>

                                                    <div class="rating" >
                                                        <div class="rating-upper" style="width: {{ $starpercen }}%">
                                                            <span style="font-size: 14px;">★★★★★</span>
                                                        </div>
                                                        <div class="rating-lower">
                                                            <span style="font-size: 14px;">★★★★★</span>
                                                        </div>
                                                    </div>
                                                    <span class="mb-0" style="color: #b2b2b2; font-size: 14px;">
                                                        ({{ $rating_person }})</span>

                                                    @else
                                                    <?php $starpercen = 0; ?>
                                                    <span class="mb-0" style="color: #b2b2b2;visibility: hidden;">
                                                        ไม่มีคะแนน</span>

                                                    @endif
                                                    </h6>
                                                </div>

                                                <!-- <h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6> -->
                                                <!-- <h6 class="text-left mb-3 pb-3">
                                                </h6> -->
                                            </div>
                                    <!-- <div class="col-12 rounded8px "
                                        style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                                        <div class="row mb-4 mt-4">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-center h-200px-flashsale pt-2" style="overflow:hidden;">
                                                    <img src="{{$src}}"  class=" rounded8px " style="max-height: 95%;width: 100%; height: 100%; object-fit: cover;" alt="...">
                                                </div>
                                                <h6 class="card-title mb-0 text-left text-dot2-custom pt-2"><strong>{{$title}}</strong></h6>
                                                <h2 class="card-text mb-0 text-left" style="color: #346751;">
                                                    <strong>฿ {{number_format($item->product_option['price'][0])}}</strong></h2>
                                                <h6 class="card-text mb-0 pb-3 text-left"
                                                    style="color: #b2b2b2; text-decoration:line-through"><strong>฿
                                                        1140</strong></h6>
                                                <h6 class="text-left mb-3">
                                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                                                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i> <br class="d-lg-none d-md-none d-block">
                                                    <span style="color: #b2b2b2;"> (0)</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div> -->
                                </a>
    <!-- <div class="card product-card mt-4 border-0 rounded col-12 {{$class}}" style="">
        <a href="/product/{{$item->id}}">
        @if(isset ($item->product_img[0]) )
        <?php $front_image = $item->product_img[0];
        ?>
        @else
        <?php $front_image = null;
        ?>
        @endif
        <?php
        $title = $item->name;
        ?>
            @if ($front_image=='0'||$front_image==null)
                <?php $src="/img/no_image.png"; ?>
            @else
                <?php $src="/img/product/".$front_image; ?>
            @endif

        <div class="col-12 p-0 m-0" style="width:200px; height:200px;">
            <img class="product-img-thumbnail mt-0 pt-0 stick-buttom" style="" src="{{$src}}" >
        </div>

        {{-- <div class="card"><img alt="Card image cap" class="card-img-top img-fluid" src="{{$src}}" style="" /> --}}

            <h5 class="regular crop-text-2 pb-0 mb-0"  style=" ">{{$title}}</h5>
            <h2 class="regular pink"  style="margin-top: -7px">&#3647;{{$item->product_option['price'][0]}}</h2>
            <h6 class="light" style="margin-top:-6px;opacity:0.4"> <s>&#3647;  {{min($item->product_option['price'])}}</s></h6>
            <div class="row p-0 m-0 ">
                <div class="">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="">
                    <h6 class="ml-2 regular"  style="opacity:0.4">({{array_sum($item->product_option['stock'])}})</h6>
                </div>

            </div>
        </a>
    </div> -->
