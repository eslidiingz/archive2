@extends('layouts.default')
@section('style')
<style>
	.nav_custom_cat{
		display: none !important;
	}
	.swiper-container {
		width: 100%;
		height: 100%;
		margin-left: auto;
		margin-right: auto;
	}

	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: #fff;

		/* Center slide text vertically */
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}

	.rating {
		display: inline-block;
		unicode-bidi: bidi-override;
		color: #888888;
		font-size: 25px;
		height: 25px;
		width: auto;
		margin: 0;
		position: relative;
		padding: 0;
	}

	.rating-upper {
		color: #f6c100;
		padding: 0;
		position: absolute;
		z-index: 1;
		display: flex;
		top: 0;
		width: 10px;
		left: 0;
		overflow: hidden;
	}

	.rating-lower {
		padding: 0;
		display: flex;
		z-index: 0;
	}
	.banner_product_n{
        /* background-image: url('../new_ui/img/banner_bg/banner_product_news.png'); */
        background-color: #acacac;
        width: 100%;
        background-position: right;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endsection
@section('content')


<div class="container-fluid py-lg-4 py-md-4 py-3 banner_product_n" id="navCategoryTitle">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-dark"><strong>{{ trans('message.shop') }}</strong></h1>
            </div>
        </div>
    </div>
</div>
<div class="container pb-4">
	<div class="row d-lg-block d-md-none d-none">
		<div class="col-12 p-0 mt-2">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb" style="background-color: unset;">
					<li class="breadcrumb-item"><a href="{{ url('/') }}" class="color-sky">{{ trans('message.home') }}</a></li>
					<i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
					<li class="breadcrumb-item active" aria-current="page">{{ trans('message.shop') }}</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row p-4 rounded8px" style="background-color: #fff;">
		{{-- <div class="col-lg-5 col-md-12 col-12 px-0">
			<div class="form-group d-flex flex-row align-items-center">
				<div>
					<label for="exampleFormControlSelect1" style="width: 150px;">
						<h6 class="mb-0"><strong>{{ trans('message.sort_by') }} :</strong></h6>
					</label>
				</div>
				<div class="w-100">
					<select class="form-control" id="exampleFormControlSelect1">
						<option>{{ trans('message.popular') }}</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-12 px-0">
			<hr class="w-100">
		</div> --}}
		<div class="col-12">
			<div class="row">
				@foreach($shop as $shopp)
				<div class="col-lg-4 col-md-6 col-12 d-flex align-items-center py-2" style="border: 1px solid #ddd;">
					<a href="/shop-user-details?id={{$shopp->id}}">
						<div class="media">
							<div class="d-flex align-items-center justify-content-center mr-3"
								style="height: 110px; width: 110px;">
								<img data-src="{{asset('img/shop_profiles/'.$shopp->shop_pic)}}"
									style="max-height: 100%; max-width: 100%;" class="align-self-start " alt="..."
									onerror="this.onerror=null;this.src='/img/no_image.png'">
							</div>
							<?php
                                    $allpaying = 0;
									$rating_shop = 0;
									?>

							@foreach ($rating_group as $rating)
							<?php

								if($rating['shop_id'] == $shopp['id']){
									$allpaying += $rating['rating'];
									$rating_shop++;
								}
								//
								?>
							@endforeach


							<div class="media-body ">
								<div class="row">
									<div class="col-12">
										<h5 class="mt-0"><strong>{{$shopp->shop_name}}</strong></h5>
										@if($allpaying > 0)
										<?php $starpercen = ($allpaying/($rating_shop*5))*100; ?>
										<div class="rating">
											<div class="rating-upper" style="width: {{ $starpercen }}%">
												<span style="font-size: 22px;">★★★★★</span>
											</div>
											<div class="rating-lower">
												<span style="font-size: 22px;">★★★★★</span>
											</div>
										</div>

										@else
										<?php $starpercen = 0; ?>
										<span class="mb-3" style="color: #b2b2b2;">
											{{ trans('message.no_score') }}</span>

										@endif

									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				@endforeach

			</div>
			<div class="d-flex justify-content-end col-12">


            @if ($shop->hasPages())
            <ul class="pagination">
                {{-- Previous Page Link --}}

                @if ($shop->onFirstPage())
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
                @else <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $shop->url(1) }}" rel="prev">
                        <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                   </a>
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $shop->previousPageUrl() }}" rel="prev">
                        <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                    </a>
                </li> @endif

                {{-- show button first page --}}
                @if ( $shop->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $shop->url(1) }}"><span>1</span></a>
                </li>
                @endif
                {{-- show button first page --}}


                {{-- condition stay in first page not show button --}}
                {{-- @if ( $shop->currentPage() == 1 )
                                <li class="align-self-center mr-1">
                                    <a class="d-none page-link" tabindex="-2">1</a>
                                </li>
                                @endif --}}


                @if ( $shop->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <span>...</span>
                </li>
                @endif



                @foreach(range(1, $shop->lastPage()) as $i)
                @if($i >= $shop->currentPage() - 2 && $i <= $shop->currentPage() + 2)

                    @if ($i == $shop->currentPage())
                    <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                    @else
                    <li class="px-2 bg-pagination-white"><a
                            href="{{ $shop->url($i) }}">{{ $i }}</a></li>
                    @endif
                    @endif
                    @endforeach


                    {{-- three dots between number near last pages --}}
                    @if ( $shop->currentPage() < $shop->lastPage() - 4)
                        <li class="align-self-center  px-2 bg-pagination-white">
                            <span>...</span>
                        </li>
                        @endif
                        {{-- three dots between number near last pages --}}


                        {{-- Show Last Page --}}
                        @if($shop->hasMorePages() == $shop->lastPage() && $shop->lastPage() > 5)
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a
                                href="{{ $shop->url($shop->lastPage()) }}"><span>{{ $shop->lastPage() }}</span>
                            </a>
                        </li>
                        @endif
                        {{-- Show Last Page --}}



                        @if ($shop->hasMorePages())
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $shop->nextPageUrl() }}" rel="next">
                               <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $shop->url($shop->lastPage()) }}" rel="next">
                                <i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i>
                            </a>
                        </li>

                        @else
                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span><i class="fa fa-angle-right text-secondary" aria-hidden="true"></i></span></li>
                        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><i class="fa fa-angle-double-right text-secondary" aria-hidden="true"></i></a></li>

                        @endif

            </ul>
            @endif
        </div>

		</div>
	</div>
</div>
@endsection
