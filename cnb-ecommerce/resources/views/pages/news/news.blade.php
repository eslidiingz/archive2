@extends('layouts.default')
@section('content')


    <div class="container-fluid py-lg-4 py-md-4 py-3 banner_product_n" id="navCategoryTitle">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-dark"><strong>ข่าวสารทั้งหมด</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-lg-block d-md-none d-none">
            <div class="col-12 p-0 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: unset;">
                        <li class="breadcrumb-item "><a href="{{ url('/') }}" class="color-sky">หน้าแรก</a></li>
                        <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                        <li class="breadcrumb-item active" aria-current="page">ข่าวสารทั้งหมด</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container pb-lg-3 py-md-3 py-3">
        <div class="row">
            <div class="col-12 col-lg-9 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @foreach ($news as $key => $value)
                                @if ($key == 0)
                                    <div class="col-12 pb-3">
                                        <a href="/blogs/detail/{{ $value->id }}">
                                            <div class="card w-100 list-product rounded8px position-relative"
                                                style="border: unset; cursor: pointer;">
                                                <img data-src="{{ asset($value->img_cover) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_banner_medix.png'"
                                                    class="img-fluid lazy entered error"
                                                    style="object-fit: cover;border-radius: 8px;" alt="">
                                                {{-- <div class="d-flex align-items-center justify-content-center">
                                                    <div class="embed-responsive embed-responsive-16by9 position-relative"
                                                        style="overflow: hidden;border-radius: 8px;">
                                                        <div class="embed-responsive-item d-flex align-items-center justify-content-center"
                                                            style="overflow: hidden;">
                                                            <img class="img-fluid"
                                                                data-src="{{ asset($value->img_cover) }}"
                                                                onerror="this.onerror=null;this.src='/img/no_banner_medix.png'"
                                                                alt="Card image cap">
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title text-dot1">{{ $value->title }}</h5>
                                                    <p class="card-text text-dot2-custom">
                                                        {{ strip_tags($value->detail) }}
                                                    </p>
                                                    <p class="card-text"><small
                                                            class="text-muted">{{ $value->updated_at }}</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            @foreach ($news as $key => $value)
                                @if ($key != 0)
                                    <div class="col-12 col-md-6 col-lg-3 pb-3">
                                        <a href="/blogs/detail/{{ $value->id }}">
                                            <div class="card w-100 list-product rounded8px position-relative"
                                                style="border: unset; cursor: pointer;">
                                                <img data-src="{{ asset($value->img_cover) }}"
                                                    onerror="this.onerror=null;this.src='/img/no_banner_medix.png'"
                                                    class="img-fluid lazy entered error"
                                                    style="object-fit: cover;border-radius: 8px;" alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title text-dot1">{{ $value->title }}</h5>
                                                    <p class="card-text text-dot2-custom">
                                                        {{ strip_tags($value->detail) }}
                                                    </p>
                                                    <p class="card-text"><small
                                                            class="text-muted">{{ $value->updated_at }}</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-4 d-lg-block d-none">
                <div class="row rounded8px py-3 mr-lg-1" style="background-color: #fff;">
                    <div class="col-12">
                        <h5 class="mb-0"><strong>หมวดหมู่ทั้งหมด ({{ count($newsCategory) }})</strong></h5>
                    </div>
                    <div class="col-12">
                        <hr class="w-100">
                    </div>
                    <div class="col-12">
                        <div class="row">

                            @foreach ($newsCategory as $key => $value)
                                <div class="col-7">
                                    <a href="blogs/categories/{{ $value->id }}">
                                        <p class="mb-0"><strong>{{ $value->name }}</strong></p>
                                    </a>
                                </div>
                                {{-- <div class="col-5 text-right">
                                <p class="mb-0"><strong>(0)</strong></p>
                            </div> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            {{ $news->links() }}
        </div>
    </div>
@endsection
