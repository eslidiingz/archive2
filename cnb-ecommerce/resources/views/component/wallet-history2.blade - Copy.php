<div class="col-12 px-0">
    <div class="row rounded8px pt-3" style="background-color: #fff;">
        <div class="col-12">
            <h6><strong>รายการที่ต้องชำระ ({{count($notPay)}})</strong></h6>
        </div>
        @foreach($notPay as $notpay)
        <div class="col-12 mb-3">
            <div class="row py-3" style="background-color: #fafaff;">
                <div class="col-7">
                <p class="mb-0"><strong>{{ $notpay->shops[0]->shop_name }}</strong></p>
                </div>
                <div class="col-5 text-right">
                    <p class="mb-0">{{ $notpay->countPro }} รายการ</p>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>

                @foreach ($notpay->inv_products as $not_inv)
                {{-- {{ dd($not_inv) }} --}}
                <div class="col-12">
                    <div class="row px-0">
                        <div class="col-lg-5 col-md-3 col-3" style="width: 100%; height: 50px;">
                            <img class="rounded8px" style="width:  100%; height: 100%; object-fit: cover;" src="" alt="">
                        </div>
                        <div class="col-lg-7 col-md-9 col-9 pl-0">
                            <p class="text-dot2 mb-0"><strong>{{-- {{ $not_inv['pro_name'] }} --}}</strong></p>
                            <p class="mb-0">
                                @if(@$not_inv->dis1 && @$not_inv->dis2)
                                {{ @$not_inv->dis1 }} , {{ @$not_inv->dis2 }}
                                @elseif(@$not_inv->dis1 || @$not_inv->dis2)
                                {{ @$not_inv->dis1 }} {{ @$not_inv->dis2 }}
                                @elseif(@!$not_inv->dis1 || @!$not_inv->dis2)
                                ไม่มีตัวเลือก
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12">
                    <hr class="w-100">
                </div>
                <div class="col-7">
                    <p class="mb-0">ราคารวมทั้งหมด</p>
                </div>
                <div class="col-5 text-right pr-2">
                    <h6 class="text-main mb-0"><strong>฿ {{ $notpay->total }}</strong></h6>
                </div>
            </div>
        </div>
        @endforeach


        {{-- <div class="col-12">
            <div class="row py-3" style="background-color: #fafaff;">
                <div class="col-7">
                    <p class="mb-0"><strong>SAVEAGE</strong></p>
                </div>
                <div class="col-5 text-right">
                    <p class="mb-0">4 รายการ</p>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>
                <div class="col-12">
                    <div class="row px-0">
                        <div class="col-lg-5 col-md-3 col-3" style="width: 100%; height: 50px;">
                            <img class="rounded8px" style="width:  100%; height: 100%; object-fit: cover;" src="/img/product/0.808869001608195929_26.jpg" alt="">
                        </div>
                        <div class="col-lg-7 col-md-9 col-9 pl-0">
                            <p class="text-dot2 mb-0"><strong>Basics by sita | A224 - OneButton Box by sita Button....</strong></p>
                            <p class="mb-0">สีน้ำตาล,S x2</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="w-100">
                </div>
                <div class="col-7">
                    <p class="mb-0">ราคารวมทั้งหมด</p>
                </div>
                <div class="col-5 text-right">
                    <h6 class="text-main mb-0"><strong>฿ 660</strong></h6>
                </div>
            </div>
        </div> --}}



        <div class="col-12 p-2 text-center">
            <a href="#"><p class="mb-0 text-primary" style="text-decoration: underline;"><strong>ดูทั้งหมด</strong></p></a>
        </div>
    </div>
</div>

