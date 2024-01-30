<div class="col-12 px-0" style='background-color: white;'>
    <div class="py-3 px-3" style='border-bottom: #dee2e6 1px solid;'>
        @foreach($wish as $wiish)
        <strong value="{{ $wiish->shoP[0]->shop_name }}">{{ $wiish->shoP[0]->shop_name }}</strong>
    </div>
    <table class="table-bordered" style='border: none;'>
        <thead>
        </thead>
        <tbody class='t-border-n'>

            @foreach($wishlist as $key=>$www)




            @if($wiish->shop_id == $www->shop_id)
            <form action="/profile/wishlist/Basket/{{ $www->id }}" method="GET">
                @csrf
                <input type="hidden" name="id" value="{{ $www->id }}">
                <input type="hidden" name="product_id" value="{{ $www->product_id }}">
                <input type="hidden" name="shop_id" value="{{ $wiish->shop_id }}">
                <tr class='t-border-n'>
                    <td class='tdres' scope="row" data-label="สินค้า" class="font_head_item">
                        <div class="row">
                            <div class="col-12 mb-4 text-left">
                                <div class="media">
                                    <img src="{{ asset('img/product/'.$www->proDuc[0]->product_img[0]) }}"
                                        style="width: 90px;" class="mr-3 rounded8px" alt="...">
                                    <div class="media-body">

                                        <h5 class="mt-0"><strong>{{ $www->proDuc[0]->description }}</strong>

                                        </h5>
                                        <div>
                                            <h6 name="dis1" value="{{ $www->details_wishlist[0]['dis1'] }}"
                                                style="font-weight: bold;">
                                                @if($www->details_wishlist[0]['option1'] != null)
                                                {{ $www->details_wishlist[0]['option1'] }} :
                                                @endif

                                                @if($www->details_wishlist[0]['option1'] == null)
                                                ขนาด :
                                                @endif



                                                @if($www->details_wishlist[0]['dis1'] != null)
                                                {{ $www->details_wishlist[0]['dis1'] }}
                                                @endif

                                                @if($www->details_wishlist[0]['dis1'] == null)
                                                &emsp; -
                                                @endif
                                            </h6>
                                            <input type="hidden" name="option1"
                                                value="{{ $www->details_wishlist[0]['option1'] }}">
                                            <input type="hidden" name="dis1"
                                                value="{{ $www->details_wishlist[0]['dis1'] }}">

                                            <h6 name="dis2" value="{{ $www->details_wishlist[0]['dis2'] }}"
                                                style="font-weight: bold;">
                                                @if($www->details_wishlist[0]['option2'] != null)
                                                {{ $www->details_wishlist[0]['option2'] }} :
                                                @endif

                                                @if($www->details_wishlist[0]['option2'] == null)
                                                แบบ :
                                                @endif


                                                @if($www->details_wishlist[0]['dis2'] != null)
                                                {{ $www->details_wishlist[0]['dis2'] }}
                                                @endif

                                                @if($www->details_wishlist[0]['dis2'] == null)
                                                &emsp; -
                                                @endif
                                            </h6>
                                            <input type="hidden" name="option2"
                                                value="{{ $www->details_wishlist[0]['option2'] }}">
                                            <input type="hidden" name="dis2"
                                                value="{{ $www->details_wishlist[0]['dis2'] }}">

                                            <h6 name="amount" value="{{ $www->details_wishlist[0]['amount'] }}"
                                                style="font-weight: bold;">จำนวน :
                                                @if($www->details_wishlist[0]['amount'] != null)
                                                {{ $www->details_wishlist[0]['amount'] }}
                                                @endif

                                                @if($www->details_wishlist[0]['amount'] == null)
                                                &emsp; -
                                                @endif
                                            </h6>
                                            <input type="hidden" name="amount"
                                                value="{{ $www->details_wishlist[0]['amount'] }}">
                                        </div>


                                        <div class="mt-2" style='color: #afafaf;'>
                                            <a class="p grayscale" href="/profile/wishlist/delete/{{$www->id}}">
                                                <img src="/img/icon/Group 2810.png" style='width:20px;'>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>
                        <div class='merge-a col-12' style="border-radius: 8px;background-color: #f8eaf3;">
                            <div class='row'>
                                <div class='col-lg-5 col-md-6 rw1 pr-3 pl-2 title_respon'>
                                    <div style='color: #c75ba1;'>
                                        <input type="hidden" name="price"
                                            value="{{ $www->details_wishlist[0]['price'] }}">
                                        <h4 style='margin-bottom:0px;' name="price"
                                            value="{{ $www->details_wishlist[0]['price'] }}">
                                            <strong> ฿ {{ $www->details_wishlist[0]['price'] }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!-- <div class="">
                                        <strong style='color: #b2b2b2;'><s> ฿ 1140 </s></strong>
                                        <strong> (-37%) </strong>
                                    </div>
                                    <div class="" style='color: #23c197;'>
                                        <img src='/img/icon/Group 2822.svg' style='width:10px;'>
                                        <strong> ราคาลดลง </strong>
                                    </div> -->
                                </div>
                                <div class='col-lg-7 col-md-3 ml-auto rw1 px-0'>
                                    <div class="pt-3 px-3 mb-3">
                                        <button class='o-btn-purple ' name="which_btn" value="ใส่ตะกร้า"
                                            type="submit"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                                class="bi bi-cart4" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                            </svg>ใส่ลงตะกร้า</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </form>
            @if($www->stock == 0 )
            <tr class='t-border-n'>
                <td class='tdres' scope="row" data-label="สินค้า">
                    <div class="row">
                        <div class="col-12 mb-4 text-left">
                            <div class="media">
                                <img src="new_ui/img/user_icon_menu/user-seller-no.png" style="width: 90px;"
                                    class="mr-3 rounded8px" alt="...">
                                <div class="media-body" style='color:#666666'>
                                    <h6 class="mt-0"><strong>{{ $www->proDuc[0]->description }}</strong></h6>
                                    <div class='non_item p-1'>
                                        ไม่มีสินค้า
                                    </div>
                                    <div style='color: #afafaf;'><img src="/img/icon/Group 2810.png"
                                            style='width:20px;'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <!-- Not have a goods -->
                    <div class='col-12 px-0'>
                        <div class='merge-a col-12'>
                            <div class='row'>
                                <div class='col-lg-5 col-md-6 rw1 pr-3 pl-2 title_respon'>
                                    <div class="">
                                    </div>
                                </div>
                                <div class='col-lg-7 col-md-3 ml-auto rw1 px-0'>
                                    <div class="pt-3 px-3 mb-3">
                                        <button class='disable o-btn-no-item '><svg width="1em" height="1em"
                                                viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                            </svg>ไม่มีสินค้า</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endif
            <!-- if for check to empty? -->
            @endif

            @endforeach

        </tbody>
    </table>
    @endforeach
    <!-- loop show seperate shop -->
</div>