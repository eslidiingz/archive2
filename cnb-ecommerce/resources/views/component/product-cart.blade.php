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
<a href="/product/{{$item->id}}">
    <div class="col-12 rounded8px " style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
        <div class="row mb-4 mt-4">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center h-200px mb-2">
                    <img src="{{$src}}" class="rounded8px mt-4" style="max-height: 100%; max-width: 100%;" alt="...">
                </div>
                <h6 class="card-title mb-0 text-left text-dots pt-2"><strong>{{$title}}</strong></h6>
                <h2 class="card-text mb-0 text-left" style="color: #c75ba1;">
                    <strong>฿ {{$item->product_option['price'][0]}}</strong>
                </h2>
                <!-- <h6 class="card-text mb-0 pb-3 text-left" style="color: #b2b2b2; text-decoration:line-through">
                    <strong>฿ 1140</strong></h6> -->
                <h6 class="text-left mb-3">
                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                    <i class="fa fa-star" style="color: #f6c100;" aria-hidden="true"></i>
                    <span style="color: #b2b2b2;"> (0)</span>
                </h6>
            </div>
        </div>
    </div>
</a>
