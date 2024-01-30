@extends('layouts.profile')
@section('content')

<div class="col-7 justify-content-center" style="margin-top: 30px;background-color:#f8f8f8 !important">
    <br>
    <br>
    <h2 class="bold black">การซื้อของฉัน</h2>
    <hr>
    <ul class="nav nav-tabs3 justify-content-between">
        <li class="nav-item"><a class="nav-link3 active regular black h6 pt-2 text-center" data-toggle="tab" href="#all">ทั้งหมด ({{count($basket_all)}})</a></li>
        <li class="nav-item"><a class="nav-link3 regular black h6 pt-2 text-center"  data-toggle="tab" href="#status1">ที่ต้องชำระ ({{count($basket_all->where('status',1))}})</a></li>
        <li class="nav-item"><a class="nav-link3 regular black h6 pt-2 text-center"  data-toggle="tab" href="#status2">ที่ต้องจัดส่ง ({{count($basket_all->where('status',2))}})</a></li>
        <li class="nav-item"><a class="nav-link3 regular black h6 pt-2 text-center"  data-toggle="tab" href="#status3-4">ที่ต้องได้รับ ({{count($basket_all->whereIn('status',[3,4]))}})</a></li>
        <li class="nav-item"><a class="nav-link3 regular black h6 pt-2 text-center"  data-toggle="tab" href="#status5">สำเร็จ ({{count($basket_all->whereIn('status',[5,7]))}})</a></li>
        <li class="nav-item"><a class="nav-link3 regular black h6 pt-2 text-center"  data-toggle="tab" href="#status6-99">ยกเลิก ({{count($basket_all->whereIn('status',[6,99]))}})</a></li>
      </ul>

      {{-- @section('search') --}}
        {{-- <div class="bg-white col-12 shadow-sm" style="height: 70px">
            <div class="row pt-3">
                <div class="col-6">
                    <input type="text" class="col-6 regular border-top-0 border-left-0 border-right-0" placeholder="ค้นหาคำสั่งซื้อ">
                </div>
                <div class="col-6">
                    <h6 class="regular black d-inline-block">วันที่ทำการสั่งซื้อ</h6>
                    <input type="date" class="col-4 regular d-inline-block">
                    <h6 class="regular black d-inline-block">-</h6>
                    <input type="date" class="col-4 regular d-inline-block">
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-12" style="height: 50px">
            <div class="row pt-3">
                <div class="col-5">
                    <h6 class="regular black d-inline-block">สินค้าทั้งหมด</h6>
                </div>
                <div class="col-2">
                    <h6 class="regular black d-inline-block">ยอดคำสั่งซื้อทั้งหมด</h6>
                </div>
                <div class="col-2">
                    <h6 class="regular black d-inline-block">สถานะ</h6>
                </div>
                <div class="col-2">
                    <h6 class="regular black d-inline-block">ช่องทางการจัดส่ง</h6>
                </div>
                <div class="col-1">
                    <h6 class="regular black d-inline-block">ดำเนินการ</h6>
                </div>
            </div>
        </div> --}}
      {{-- @endsection --}}

      <div class="tab-content">
        <div id="all" class="tab-pane fade show active">
            @if (count($basket_all->whereIn('status',[1,2,3,4,5,6,99]))== 0)
                @include('component.no-data')
            @else
                @foreach ($basket_all->whereIn('status',[1,2,3,4,5,6,99]) as $key=>$item)
                
                    @include('component.purchase-list-cart')
                    @include('component.cancel-modal')
                @endforeach
            @endif
        </div>

        <div id="status1" class="tab-pane fade">
            @if (count($basket_all->where('status',1))== 0 )
                @include('component.no-data')
            @else
                @foreach ($basket_all->where('status',1) as $key=>$item)
                    @include('component.purchase-list-cart')
                    @include('component.cancel-modal')
                @endforeach
            @endif
        </div>
        <div id="status2" class="tab-pane fade ">
            @if (count($basket_all->where('status',2))== 0 )
                @include('component.no-data')
            @else
                @foreach ($basket_all->where('status',2) as $key=>$item)
                    @include('component.purchase-list-cart')
                    @include('component.cancel-modal')
                @endforeach
            @endif
        </div>


        <div id="status3-4" class="tab-pane fade">
            @if (count($basket_all->whereIn('status',[3,4]))== 0 )
                @include('component.no-data')
            @else
                @foreach ($basket_all->whereIn('status',[3,4]) as $key=>$item)
                    @include('component.purchase-list-cart')
                    @include('component.cancel-modal')
                @endforeach
            @endif
        </div>


        <div id="status5" class="tab-pane fade">
            @if (count($basket_all->whereIn('status',[5,7]))== 0 )
                @include('component.no-data')
            @else
                @foreach ($basket_all->whereIn('status',[5,7]) as $key=>$item)
                    @include('component.purchase-list-cart-rating')
                    @include('component.cancel-modal')
                    @include('component.rating-modal')
                @endforeach
            @endif
        </div>

        <div id="status6-99" class="tab-pane fade">
            @if (count($basket_all->whereIn('status',[6,99]))== 0 )
                @include('component.no-data')
            @else
                @foreach ($basket_all->whereIn('status',[6,99]) as $key=>$item)
                    @include('component.purchase-list-cart')
                    @include('component.cancel-modal')
                @endforeach
            @endif
        </div>
      </div>
</div>
<!-- modal -->



@stop
