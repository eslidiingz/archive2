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
    .nav-tabs .nav-item.show .nav-link.nav-custom-1, .nav-tabs .nav-link.nav-custom-1.active{
        color: #000;
        background-color: #f8eaf3;
        border: none;
    }
    .nav-tabs .nav-link.nav-custom-1:hover{
        color: #000;
        background-color: #f8eaf3;
        border: none;
    }
    .nav-tabs .nav-link.nav-custom-1{
        color: #b2b2b2;
        background-color: #fff;
        border: none;
    }
    .nav-tabs{
        border: none;
    }
</style>
@endsection
@section('content')
<div class="container-fluid py-lg-4 py-md-4 py-3" style="background-color: #d61900;" id="navCategoryTitle">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-4 col-md-6 col-6 d-flex align-items-center justify-content-lg-end justify-content-md-end justify-content-center px-0">
                <h1 class="mb-0 text-white"><strong>Flash <img data-src="new_ui/img/categories_icon/FLASHSALE.png" class="flash-img" width="30px;" alt=""> Sale</strong></h1>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-4 col-6 d-flex justify-content-center px-0 px-md-3 px-lg-3">
                <h3 class="mb-0 px-2 px-md-3 py-lg-2 py-md-2 py-2 rounded8px text-white d-flex flex-row w-100 justify-content-lg-center justify-content-md-center justify-content-center  align-items-center"
                style="background-color: #346751;">
                <span class="d-none d-md-none d-lg-block h4 mb-0">จะหมดอายุภายใน&nbsp;&nbsp;</span>
                <span class="d-none d-md-none d-lg-block" style="color: #d61900;">|&nbsp;&nbsp;</span>
                <div id="flashtime" class="d-flex justify-content-lg-start justify-content-md-center justify-content-center" style="width: 180px;"></div>

            </h3>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 px-0" >
                {{-- <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link nav-custom-1 tab-pane px-0 w-25 active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1" aria-selected="true">
                            <h3 class="text-center mb-0"><strong>09:00</strong></h3>
                            <p class="text-center mb-0">กำลังลดราคา</p>
                        </a>
                        <a class="nav-link nav-custom-1 tab-pane px-0 w-25" id="list-2-tab" data-toggle="tab" href="#list-2" role="tab" aria-controls="list-2" aria-selected="false">
                            <h3 class="text-center mb-0"><strong>12:00</strong></h3>
                            <p class="text-center mb-0">เร็วๆ นี้</p>
                        </a>
                        <a class="nav-link nav-custom-1 tab-pane px-0 w-25" id="list-3-tab" data-toggle="tab" href="#list-3" role="tab" aria-controls="list-3" aria-selected="false">
                            <h3 class="text-center mb-0"><strong>18:00</strong></h3>
                            <p class="text-center mb-0">เร็วๆ นี้</p>
                        </a>
                        <a class="nav-link nav-custom-1 tab-pane px-0 w-25" id="list-4-tab" data-toggle="tab" href="#list-4" role="tab" aria-controls="list-4" aria-selected="false">
                            <h3 class="text-center mb-0"><strong>21:00</strong></h3>
                            <p class="text-center mb-0">เร็วๆ นี้</p>
                        </a>
                </div> --}}
            <div class="tab-content" id="myTabContent">
                @if($time_end)
                <input type="hidden" name="end_date" value="{{ $time_end->end_date }}">
                @else
                <input type="hidden" name="end_date" value="2021-01-01">
                @endif
                @foreach ($flash_all as $key => $value)
                    <div class="tab-pane fade show
                    @if($key == 0)
                    active
                    @endif" id="list-{{ $key+1 }}" role="tabpanel" aria-labelledby="list-1-tab">
                    <div class="container">
                        <div class="row d-lg-block d-md-none d-none">
                            <div class="col-12 p-0 mt-2">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb" style="background-color: unset;">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color: #1947e3;">หน้าแรก</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">FLASH SALE</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="form-row mt-4">
                        	@if(count($value) > 0)
                            @foreach ($value as $item)
                            <div class="col-lg-2 col-md-3 col-6 position-relative mb-3  px-0">
                                <div class="px-3">
                                    <a href="/flash-sale/{{$item->id}}">
                                        <div class="h-200px d-flex justify-content-center pt-2" style="background-color: #fff; border-radius: 8px 8px 0 0;">
                                            <img data-src="{{asset('/img/product/'.$item->product_img[0])}}" class="position-relative rounded8px" style="max-height: 100%;max-width: 100%;" alt="...">
                                            <img data-src="img/fs.png" class="position-absolute" style="top: 5px; right: 10px; width: 50px;" alt="">
                                        </div>
                                        <div class="card-body text-left p-2" style="background-color: #fff;">
                                            <h6 class="card-title mb-0 text-dot1 font_head_item" data-toggle="tooltip" data-placement="top" title="{{ $item->name }}" style="font-size: 14px !important;"><strong>{{ $item->name }}</strong></h6>
                                            <h2 class="card-text mb-0 font_price" style="color: #346751; font-size: 18px !important; padding-bottom: 2px;"><strong>฿
                                                {{ number_format($item->price) }}</strong></h2>
                                            <h6 class="card-text mb-4 pb-2" style="color: #b2b2b2; text-decoration:line-through; font-size: 14px !important;"><strong>฿
                                                {{ number_format($item->discount) }}</strong></h6>
                                        </div>
                                        <div class="progress position-absolute mx-3 px-0" style="bottom: 0; left: 0; right: 0; border-radius: 50px; height: 8px;">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $item->percent }}%; background-color: #c40000;" aria-valuenow="{{ $item->percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="position-absolute mx-2 px-0" style="bottom: 8px; left: 10px;">
                                            <p class="mb-0 px-2 py-1 text-white " style="background-color: #0f0f0f; border-radius: 8px 8px 0 0; font-size: 9px !important;">ขายแล้ว {{ $item->sale }} ชิ้น</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @else
							<div class="col-12 px-0 text-center py-4" style='background:white; margin-bottom: 80px;'>
							    <img class='pb-2' data-src="/img/no_image.png" alt="">
							    <p style='color:#919191'>Product not found</p>
							    <a href="{{ url('/home') }}"><button class='btn-primary btn'
							            style='background:#346751;border-color: #346751;'>กลับสู่หน้าแรก</button></a>
							</div>

							@endif
                         <div class="d-flex justify-content-end col-12">


            @if ($value->hasPages())
            <ul class="pagination">
                {{-- Previous Page Link --}}

                @if ($value->onFirstPage())
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
                @else <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $value->url(1) }}" rel="prev">
                        <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                   </a>
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $value->previousPageUrl() }}" rel="prev">
                        <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                    </a>
                </li> @endif

                {{-- show button first page --}}
                @if ( $value->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $value->url(1) }}"><span>1</span></a>
                </li>
                @endif
                {{-- show button first page --}}


                {{-- condition stay in first page not show button --}}
                {{-- @if ( $value->currentPage() == 1 )
                                <li class="align-self-center mr-1">
                                    <a class="d-none page-link" tabindex="-2">1</a>
                                </li>
                                @endif --}}


                @if ( $value->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <span>...</span>
                </li>
                @endif



                @foreach(range(1, $value->lastPage()) as $i)
                @if($i >= $value->currentPage() - 2 && $i <= $value->currentPage() + 2)

                    @if ($i == $value->currentPage())
                    <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                    @else
                    <li class="px-2 bg-pagination-white"><a
                            href="{{ $value->url($i) }}">{{ $i }}</a></li>
                    @endif
                    @endif
                    @endforeach


                    {{-- three dots between number near last pages --}}
                    @if ( $value->currentPage() < $value->lastPage() - 4)
                        <li class="align-self-center  px-2 bg-pagination-white">
                            <span>...</span>
                        </li>
                        @endif
                        {{-- three dots between number near last pages --}}


                        {{-- Show Last Page --}}
                        @if($value->hasMorePages() < 0  && $value->lastPage() > 5)
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a
                                href="{{ $value->url($value->lastPage()) }}"><span>{{ $value->lastPage() }}</span>
                            </a>
                        </li>
                        @endif
                        {{-- Show Last Page --}}



                        @if ($value->hasMorePages())
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $value->nextPageUrl() }}" rel="next">
                               <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $value->url($value->lastPage()) }}" rel="next">
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
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
// Set the date we're counting down to
// var countDownDate = new Date().plusDays(1).getTime();
var countDownDate = new Date("Nov 15, 2020 23:59:59").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("flashtime").innerHTML = days + " : " + hours + " : "
  + minutes + " : " + seconds + " ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("flashtime").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

@endsection
