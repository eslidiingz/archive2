<table class="table table-bordered">
    @if (count($product_all) == 0)
        @include('component.no-data')
    @else
        {{-- @foreach ($product_all->chunk(4) as $row) --}}
        <div class="form-row">
            @php
                $matchData = false;
            @endphp
            @foreach ($product_all as $key => $value)
                @if ($value['status_goods'] == 1)
                    <?php
                    $allpaying = 0;
                    $rating_person = 0;
                    ?>
                    @foreach ($rating_group as $rating)
                        <?php

                        if ($rating['product_id'] == $value->id) {
                            $allpaying += $rating['rating'];
                            $rating_person++;
                        }
                        ?>
                    @endforeach

                    @if ((!$minPrice && !$maxPrice) ||
                        ($value->product_option['price'][0] >= $minPrice && $value->product_option['price'][0] <= $maxPrice))
                        @php
                            $matchData = true;
                        @endphp
                        <div class="col-lg-3 col-md-3 col-6 mb-3 d-flex align-items-stretch">
                            <a href="/product_detail/{{ $value->id }}" class="w-100">
                                <div class="card w-100 list-product rounded8px" style="border: unset; cursor: pointer;">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="embed-responsive embed-responsive-1by1 position-relative"
                                            style="overflow: hidden;border-radius: 8px;">
                                            <div class="embed-responsive-item d-flex align-items-center justify-content-center"
                                                style="overflow: hidden;">

                                                @php
                                                    $date1 = date_create($value->created_at);
                                                    $date2 = date_create(date('Y-m-d'));
                                                    $o_diff = date_diff($date1, $date2);
                                                @endphp
                                                @if ($o_diff->d <= 7)
                                                    <img class="position-absolute-img"
                                                        src="img/frame_product/กรอบรูปMM-02.png" alt="">
                                                @elseif(isset($value->product_option['price_special'][0]) && $value->product_option['price_special'][0] > 0)
                                                    <img class="position-absolute-img"
                                                        src="img/frame_product/กรอบรูปMM-01.png" alt="">
                                                @elseif($value->view_cnt > $sum_views)
                                                    <img class="position-absolute-img"
                                                        src="img/frame_product/กรอบรูปMM-03.png" alt="">
                                                @elseif($value->sold_amt > $sum_solds)
                                                    <img class="position-absolute-img"
                                                        src="{{ 'img/frame_product/กรอบรูปMM-0' . rand(4, 5) . '.png' }}"
                                                        alt="">
                                                @else
                                                    <img class="position-absolute-img"
                                                        src="{{ 'img/frame_product/กรอบรูปMM-0' . rand(6, 8) . '.png' }}"
                                                        alt="">
                                                @endif

                                                <img src="/img/product/{{ $value->product_img[0] }}" class="img-fluid"
                                                    onerror="this.onerror=null;this.src='/img/no_image.png'"
                                                    alt="Card image cap">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-body px-lg-3 px-md-2 px-1">
                                        <div class="col-12 mb-2">
                                            <p class="card-text mb-0 text-dot1"><strong>{{ $value->name }}</strong></p>
                                            <p class="card-text mb-0 text-dot2-custom">{!! nl2br($value->description) !!}</p>
                                        </div>
                                        <div class="col-12">
                                            <?php
                                if( isset( $value->product_option['price_special'][0] ) && $value->product_option['price_special'][0] > 0 ) {
                            ?>
                                            <h3 class="mb-2 price_reborn_custom">
                                                <small style="color: #CCCCCC;font-size:14px;"><strike><i>฿
                                                            {{ $value->product_option['price'][0] }}</i></strike></small>
                                                <br>
                                                <strong style="color: #EA1B23;">฿
                                                    {{ $value->product_option['price_special'][0] }}</strong>
                                            </h3>
                                            <?php
                                } else {
                            ?>
                                            <h3 class="mb-2 price_reborn_custom" style="color: #EA1B23;">
                                                <br>
                                                <strong>
                                                    ฿ {{ $value->product_option['price'][0] }}
                                                </strong>
                                            </h3>
                                            <?php
                                }
                            ?>
                                            <!-- <h6 class="text-left mb-3 pb-3" style="height:35px !important;">

                                            @if ($allpaying > 0)
<?php $starpercen = ($allpaying / ($rating_person * 5)) * 100; ?>

                                                <div class="rating">
                                                    <div class="rating-upper" style="width: {{ $starpercen }}%">
                                                        <span style="font-size: 14px;">★★★★★</span>
                                                    </div>
                                                    <div class="rating-lower">
                                                        <span style="font-size: 14px;">★★★★★</span>
                                                    </div>
                                                </div>
                                                <span class="mb-3" style="color: #b2b2b2;">
                                                    ({{ $rating_person }})
</span>
@else
<?php $starpercen = 0; ?>
                                                <span class="mb-3" style="color: #b2b2b2;">
                                                    ไม่มีคะแนน</span>
@endif
                                        </h6> -->
                                        </div>
                                        <div class="col-12">
                                            <hr class="w-100">
                                            <p class="card-text mb-0 text-dot1" style="color: #666;">
                                                <!-- <strong>ร้าน {{ $value->shopsName['shop_name'] }}</strong> -->
                                                <strong>SIAM CANNABIS</strong>
                                            </p>
                                            @if ($value->shopsName->ated_gen_no)
                                                <!-- <p class="card-text mb-0 text-dot1" style="color: #666;">
                                            <strong>คพอ.รุ่นที่ {{ $value->shopsName->ated_gen_no }}</strong>
                                        </p> -->
                                                <!-- <p class="card-text mb-0 text-dot1" style="color: #666;">
                                            <strong>จังหวัด {{ $value->shopsName->ated_province_id ? $value->shopsName->province[0]->name_th : '' }}</strong>
                                        </p> -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    {{-- <div class="col-lg-3 col-md-4 col-6 ">
            <a href="/product/{{$value->id}}">
                <div class="rounded8px px-2 "
                    style="background-color: #fff; box-shadow: 0 .125rem 0.50rem rgba(0,0,0,0.100)!important;">
                    <div class="d-flex align-items-center justify-content-center h-200px-all pt-2"
                        style="overflow:hidden;">
                        <img src="/img/product/{{$value->product_img[0]}}"
                            style="max-height: 100%;max-width: 100%;" class="rounded8px"
                            onerror="this.onerror=null;this.src='/img/no_image.png'" />
                    </div>
                    <?php
                    $allpaying = 0;
                    $rating_person = 0;
                    ?>
								@foreach ($rating_group as $rating)
								<?php

        if ($rating['product_id'] == $value->id) {
            $allpaying += $rating['rating'];
            $rating_person++;
        }
        ?>
								@endforeach
                    <div class="px-2">
                        <h6 class="card-title mb-0 text-left text-dot2-custom pt-2" data-toggle="tooltip" data-placement="top" title="{{ $value->name }}" style="font-size: 14px !important;"><strong>{{$value->name}}</strong></h6>
                    <h2 class="card-text mb-0 text-left" style="color: #d61900; font-size: 18px !important;"><strong>฿
                            {{number_format(min($value->product_option['price']))}}</strong></strong></h2>
                        <h6 class="text-left mb-3 pb-3" style="height:35px !important;">

                            @if ($allpaying > 0)
                            <?php $starpercen = ($allpaying / ($rating_person * 5)) * 100; ?>

                            <div class="rating">
                                <div class="rating-upper" style="width: {{ $starpercen }}%">
                                    <span style="font-size: 14px;">★★★★★</span>
                                </div>
                                <div class="rating-lower">
                                    <span style="font-size: 14px;">★★★★★</span>
                                </div>
                            </div>
                            <span class="mb-3" style="color: #b2b2b2;">
                                ({{ $rating_person }})</span>

                            @else
                            <?php $starpercen = 0; ?>
                            <span class="mb-3" style="color: #b2b2b2;">
                                ไม่มีคะแนน</span>

                            @endif
                        </h6>
                    </div>
                </div>
            </a>
        </div> --}}
                @endif
            @endforeach

            @if (!$matchData)
                <div class="col-12">

                    @include('component.no-data')
                </div>
            @endif
        </div>
        {{-- @endforeach --}}
    @endif

    {{-- {!! $product_all->links() !!} --}}
</table>
{{-- <div style="height: 100px"></div> --}}
<div class="d-flex justify-content-end col-12 p-0">

    {{-- {{ dd($product_all) }} --}}
    @if ($product_all->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}

            @if ($product_all->onFirstPage())
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i
                            class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i
                            class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
            @else
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->url(1) . '&category=' . @$request->category . '&sub=' . @$request->sub }}"
                        rel="prev">
                        <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                    </a>
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->previousPageUrl() . '&category=' . @$request->category . '&sub=' . @$request->sub }}"
                        rel="prev">
                        <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                    </a>
                </li>
            @endif

            {{-- show button first page --}}
            @if ($product_all->currentPage() > 5)
                <li class="align-self-center px-2 bg-pagination-white">
                    <a
                        href="{{ $product_all->url(1) . '&category=' . @$request->category . '&sub=' . @$request->sub }}"><span>1</span></a>
                </li>
            @endif
            {{-- show button first page --}}


            {{-- condition stay in first page not show button --}}
            {{-- @if ($product_all->currentPage() == 1)
                        <li class="align-self-center mr-1">
                            <a class="d-none page-link" tabindex="-2">1</a>
                        </li>
                        @endif --}}


            @if ($product_all->currentPage() > 5)
                <li class="align-self-center px-2 bg-pagination-white">
                    <span>...</span>
                </li>
            @endif



            @foreach (range(1, $product_all->lastPage()) as $i)
                @if ($i >= $product_all->currentPage() - 2 && $i <= $product_all->currentPage() + 2)
                    @if ($i == $product_all->currentPage())
                        <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                    @else
                        <li class="px-2 bg-pagination-white"><a
                                href="{{ $product_all->url($i) . '&category=' . @$request->category . '&sub=' . @$request->sub }}">{{ $i }}</a>
                        </li>
                    @endif
                @endif
            @endforeach


            {{-- three dots between number near last pages --}}
            @if ($product_all->currentPage() < $product_all->lastPage() - 4)
                <li class="align-self-center  px-2 bg-pagination-white">
                    <span>...</span>
                </li>
            @endif
            {{-- three dots between number near last pages --}}


            {{-- Show Last Page --}}
            @if ($product_all->hasMorePages() == $product_all->lastPage() && $product_all->lastPage() > 5)
                <li class="align-self-center px-2 bg-pagination-white">
                    <a
                        href="{{ $product_all->url($product_all->lastPage()) . '&category=' . @$request->category . '&sub=' . @$request->sub }}"><span>{{ $product_all->lastPage() }}</span>
                    </a>
                </li>
            @endif
            {{-- Show Last Page --}}



            @if ($product_all->hasMorePages())
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->nextPageUrl() . '&category=' . @$request->category . '&sub=' . @$request->sub }}"
                        rel="next">
                        <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->url($product_all->lastPage()) . '&category=' . @$request->category . '&sub=' . @$request->sub }}"
                        rel="next">
                        <i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i>
                    </a>
                </li>
            @else
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span><i
                            class="fa fa-angle-right text-secondary" aria-hidden="true"></i></span></li>
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><i
                        class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i></a></li>
            @endif

        </ul>
    @endif
</div>
