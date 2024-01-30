<div class="container">
    <div class="row d-lg-block d-md-none d-none">
        <div class="col-12 p-0 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: unset;">
                    <li class="breadcrumb-item"><a href="#" style="color: #1947e3;">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FLASH SALE</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="form-row mt-4">
        @foreach($product_all as $item)
        <div class="col-lg-2 col-md-4 col-6 position-relative mb-3">
            <a href="product-detail.php">
                <div class="h-200px">
                    <img src="img/product/flashsale-1.png" class="card-img-top position-relative" style="max-height: 100%;width: 100%; height: 100%; object-fit: cover;" alt="...">
                    <img src="img/fs.png" class="position-absolute" style="top: 5px; right: 10px; width: 50px;" alt="">
                </div>
                <div class="card-body text-left p-2">
                    <h6 class="card-title mb-0 text-dot1"><strong>Basicsbysita | A224 - One Button Box</strong></h6>
                    <h2 class="card-text mb-0" style="color: #c75ba1;"><strong>฿9</strong></h2>
                    <h6 class="card-text mb-4 pb-2" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6>
                </div>
                <div class="progress position-absolute" style="bottom: 0; left: 0; right: 0; border-radius: 50px; height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #c40000;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="position-absolute " style="bottom: 8px; left: 4px;">
                    <p class="mb-0 px-2 py-1 text-white " style="background-color: #0f0f0f; border-radius: 8px 8px 0 0; font-size: 9px !important;">ขายแล้ว 600 ชิ้น</p>
                </div>
                {{-- <div class="position-absolute" style="top:10px; right: 0;"></div>
                    <div class="position-absolute" style="right: -7px; top: 7%;">
                        <img src="new_ui/img/sale.svg" class="position-relative" style=" width: 80px;"
                                                            alt="">
                    <h6 class="position-absolute text-white" style="left: 50%;top: 50%;transform: translate(-50%,-50%);"> 9.-
                    </h6>
                </div> --}}
            </a>
        </div>






        <!-- <div class="col-lg-2 col-md-3 col-6  mb-3">
			<div class="card position-relative" style=" border: none;">
				<a href="product-detail.php">
					<div class="pt-2 rounded8px d-flex align-items-center justify-content-center" style="height: 180px;">
						<img src="{{asset('/img/product/'.$item->product_img[0])}}" style="max-width: 100%; max-height: 100%;" alt="..." onerror="this.onerror=null;this.src='/img/no_image.png'">
					</div>
					<div class="card-body text-left p-2">
						<h6 class="card-title mb-0"><strong>{{ $item->name }}</strong></h6>
						<h2 class="card-text mb-0" style="color: #c75ba1;"><strong>฿{{ $item->product_option['discount'][0] }}</strong></h2>
						<h6 class="card-text mb-4 pb-3" style="color: #b2b2b2; text-decoration:line-through"><strong>฿ 1140</strong></h6>
					</div>
					<div class="progress position-absolute" style="bottom: 0; left: 0; right: 0; border-radius: 50px; height: 8px;">
						<div class="progress-bar" role="progressbar" style="width: 50%; background-color: #c40000;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="position-absolute " style="bottom: 8px; left: 4px;">
						<p class="mb-0 px-2 py-1 text-white " style="background-color: #0f0f0f; border-radius: 8px 8px 0 0;">ขายแล้ว 600 ชิ้น</p>
					</div>
					<div class="position-absolute" style="top:10px; right: 0;"></div>
					<div class="position-absolute" style="right: -7px; top: 7%;">
						<img src="img/sale.svg" class="position-relative" style=" width: 80px;" alt="">
						<h6 class="position-absolute text-white" style="left: 50%;top: 50%;transform: translate(-50%,-50%);">-30%</h6>
					</div>
				</a>
			</div>
		</div> -->
        @endforeach
        <div class="d-flex justify-content-end col-12">


            @if ($flash_all1->hasPages())
            <ul class="pagination">
                {{-- Previous Page Link --}}

                @if ($product_all->onFirstPage())
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
                <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
                @else <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->url(1) }}" rel="prev">
                        <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
                   </a>
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->previousPageUrl() }}" rel="prev">
                        <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
                    </a>
                </li> @endif

                {{-- show button first page --}}
                @if ( $product_all->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $product_all->url(1) }}"><span>1</span></a>
                </li>
                @endif
                {{-- show button first page --}}


                {{-- condition stay in first page not show button --}}
                {{-- @if ( $product_all->currentPage() == 1 )
                                <li class="align-self-center mr-1">
                                    <a class="d-none page-link" tabindex="-2">1</a>
                                </li>
                                @endif --}}


                @if ( $product_all->currentPage() > 5 )
                <li class="align-self-center px-2 bg-pagination-white">
                    <span>...</span>
                </li>
                @endif



                @foreach(range(1, $flash_all1->lastPage()) as $i)
                @if($i >= $flash_all1->currentPage() - 2 && $i <= $flash_all1->currentPage() + 2)

                    @if ($i == $product_all->currentPage())
                    <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
                    @else
                    <li class="px-2 bg-pagination-white"><a
                            href="{{ $product_all->url($i) }}">{{ $i }}</a></li>
                    @endif
                    @endif
                    @endforeach


                    {{-- three dots between number near last pages --}}
                    @if ( $product_all->currentPage() < $product_all->lastPage() - 4)
                        <li class="align-self-center  px-2 bg-pagination-white">
                            <span>...</span>
                        </li>
                        @endif
                        {{-- three dots between number near last pages --}}


                        {{-- Show Last Page --}}
                        @if($product_all->hasMorePages() == $product_all->lastPage() && $product_all->lastPage() > 5)
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a
                                href="{{ $product_all->url($product_all->lastPage()) }}"><span>{{ $product_all->lastPage() }}</span>
                            </a>
                        </li>
                        @endif
                        {{-- Show Last Page --}}



                        @if ($product_all->hasMorePages())
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $product_all->nextPageUrl() }}" rel="next">
                               <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="align-self-center px-2 bg-pagination-white">
                            <a href="{{ $product_all->url($product_all->lastPage()) }}" rel="next">
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
