@extends('new_ui.layouts.front-end')
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

	.nav-tabs .nav-item.show .nav-link,
	.nav-tabs .nav-link.active {

		outline-offset: -3px;
		color: #333;
		border-radius: 0 0 0 0;
		background-color: #fff;
	}

	.nav-tabs .nav-item.show .nav-link,
	.nav-tabs .nav-link.custom-nav.active {
		outline: 3px solid #333;
		outline-offset: -3px;
		color: #333;
		border-radius: 0 0 0 0;
		background-color: #fff;
	}

	.nav-tabs .nav-item.show .nav-link img,
	.nav-tabs .nav-link.active img {
		/* filter: invert(52%) sepia(52%) saturate(711%) hue-rotate(276deg) brightness(84%) contrast(83%); */
		filter: none !important;
	}

	/*.nav-tabs .nav-link:hover{
			outline: 3px solid #333;
			outline-offset: -3px;
			color: #333;
			border-radius: 0 0 0 0;
		}*/
	.nav-tabs .nav-link.nav-custom {
		border: none !important;
		background-color: #fff;
		margin: 2px;
		width: calc((100% / 1) - 4px);

	}

	@media (min-width: 768px) {
		.nav-tabs .nav-link.nav-custom {
			width: calc((100% / 2) - 4px);
		}
	}

	@media (min-width: 992px) {
		.nav-tabs .nav-link.nav-custom {
			width: calc((100% / 9) - 4px);
		}
	}

	.nav-tabs {
		border-bottom: unset;
	}

	#custom-flex {
		display: flex;
		flex-flow: row wrap;
		justify-content: space-between;
	}

	#custom-flex::after {
		content: "";
		flex: auto;
	}

	#navCategoryLeft {
		overflow-y: scroll;
		position: -webkit-sticky;
		/* Safari */
		position: sticky;
		max-height: 100%;
	}

	/* width */
	#navCategoryLeft::-webkit-scrollbar {
		width: 4px;
	}

	/* Track */
	#navCategoryLeft::-webkit-scrollbar-track {
		box-shadow: inset 0 0 5px grey;
		border-radius: 10px;
	}

	/* Handle */
	#navCategoryLeft::-webkit-scrollbar-thumb {
		background: #333;
		border-radius: 10px;
	}

	/* Handle on hover */
	#navCategoryLeft::-webkit-scrollbar-thumb:hover {
		background: #666;
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
<div class="container-fluid py-lg-5 py-md-5 py-4 banner_product_n" id="navCategoryTitle">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-dark"><strong>{{ trans('message.all_category') }}</strong></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row d-lg-block d-md-none d-none">
		<div class="col-12 p-0 mt-2">
			@include('component.breadcrumb')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-4 col-4 px-0 px-lg-2">
			<nav style="overflow-y: auto;" id="navCategoryLeft">
				<div class="nav nav-tabs" id="nav-tab" role="tablist" id="custom-flex">
					<!-- <div class="nav nav-tabs d-flex justify-content-between" id="nav-tab" role="tablist"> -->
					@foreach ($category_all as $key=>$item)
						@if( $item->productCount > 0 )
							@if( $locale == 'en' )
							<a class="nav-link custom-nav nav-custom d-flex flex-column justify-content-center align-items-center {{ $loop->first ? 'active' : '' }}"
								id="nav-product-{{$key}}-tab" data-toggle="tab" href="#nav-product-{{$key}}" role="tab"
								aria-controls="nav-product-{{$key}}" aria-selected="false" style="height: 130px;">
								<div>
									<img src="/new_ui/img/categories_icon/{{$item->banner}}" class="img active"
										style="width: 40px;filter:grayscale(100%);" alt="">
								</div>
								<div class="text-center mt-2" style="line-height: 18px !important;">
									<strong style="color: #000;">{{$item->category_name_en}}</strong>
								</div>
							</a>
							@else
							<a class="nav-link custom-nav nav-custom d-flex flex-column justify-content-center align-items-center {{ $loop->first ? 'active' : '' }}"
								id="nav-product-{{$key}}-tab" data-toggle="tab" href="#nav-product-{{$key}}" role="tab"
								aria-controls="nav-product-{{$key}}" aria-selected="false" style="height: 130px;">
								<div>
									<img src="/new_ui/img/categories_icon/{{$item->banner}}" class="img active"
										style="width: 40px;filter:grayscale(100%);" alt="">
								</div>
								<div class="text-center mt-2" style="line-height: 18px !important;">
									<strong style="color: #000;">{{$item->category_name}}</strong>
								</div>
							</a>
							@endif
						@endif
					@endforeach
				</div>
			</nav>
			<script type="text/javascript">
				$(document).ready(navCategoryLeft);
						$(window).on('resize',navCategoryLeft);
						$(document).ready(function(){ $(window).on('scroll',navCategoryLeft); });
						function navCategoryLeft(){
							var width = $(window).width();
							if(width < 992){
								var h_wrapper = $('main#wrapper').outerHeight();
								var h_title = $('div#navCategoryTitle').outerHeight();
								var h_bottom = $('div.fixed-bottom').outerHeight();
								var h_sum = h_wrapper+h_title+h_bottom;
								$('nav#navCategoryLeft').css('height','calc(100vh - '+h_sum+'px)');

						    	if($(window).scrollTop() >= h_title){
						    		$('nav#navCategoryLeft').css({
						    			'top':h_wrapper+'px',
						    			'height': 'calc(100vh - '+(h_wrapper+h_bottom)+'px)'
						    		});
						    	}else{
									$('nav#navCategoryLeft').css({
										'top':(h_wrapper+h_title-$(window).scrollTop())+'px',
										'height': 'calc(100vh - '+(h_sum-$(window).scrollTop())+'px)'
									});
					    		}
					    	}else{
					    		$('nav#navCategoryLeft').css({
									'top':'0',
									'height': 'unset'
								});
					    	}
						}
			</script>
		</div>
		<div class="col-lg-12 col-md-8 col-8">
			<div class="tab-content" id="nav-tabContent">
				@foreach ($category_all as $key=>$item)
				<div class="tab-pane fade show {{$loop->first ? 'active' : '' }}" id="nav-product-{{$key}}"
					role="tabpanel" aria-labelledby="nav-product-{{$key}}-tab">
					<div class="row mt-lg-4 mt-md-0 mt-0 p-4" style="background-color: #fff;">
						<div class="col-lg-8 col-md-12 col-12">
							<div class="row">
								<div class="col-12 mb-2">
									@if( $locale == 'en' )
										<h4 class="font_head_item"><strong style="color: #333;">{{$item->category_name_en}}</strong></h4>
									@else
										<h4 class="font_head_item"><strong style="color: #333;">{{$item->category_name}}</strong></h4>
									@endif
								</div>
								@foreach ($item->data_subdets as $item1)
									@if( $item1->product_count>0 )
										@if( $locale == 'en' )
											<div class="col-lg-4 col-md-12 col-12 mb-2">
												{{-- <a href="/product_all"><h5><strong>{{$item1->sub_name}}</strong></h5></a> --}}
												<a href="/product_all?category={{$item->category_id}}&sub={{$item1->sub_id}}">
													<h6 class="font_head_item">{{$item1->sub_name_en}}</h6>
												</a>
											</div>
										@else
											<div class="col-lg-4 col-md-12 col-12 mb-2">
												{{-- <a href="/product_all"><h5><strong>{{$item1->sub_name}}</strong></h5></a> --}}
												<a href="/product_all?category={{$item->category_id}}&sub={{$item1->sub_id}}">
													<h6 class="font_head_item">{{$item1->sub_name}}</h6>
												</a>
											</div>
										@endif
									@endif
								@endforeach
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="row">
								<div class="col-12">
									<h4 class="font_head_item"><strong style="color: #333;">แบรนด์</strong></h4>
								</div>
								{{-- <div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-1.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-2.png" class="img-fluid w-100" alt="">
								</div>
								<div class="col-lg-4 col-md-4 col-6">
									<img src="new_ui/img/brand/img-brand-3.png" class="img-fluid w-100" alt="">
								</div> --}}
							</div>
						</div>
						<div class="col-12">
							<hr class="w-100">
						</div>

					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>
</div>
</div>

<style>
	.text-purple{
		color: #333 !important;
	}
</style>
@endsection


