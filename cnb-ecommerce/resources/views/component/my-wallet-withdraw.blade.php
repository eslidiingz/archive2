<style>
    @media (min-width: 320px) {
        .mt-10-custom{
            margin-top: 1px !important;
        }
    }


    @media (min-width: 576px) {
        .mt-10-custom{
            margin-top: 1px !important;
        }
    }

    @media (min-width: 768px) {
        .mt-10-custom{
            margin-top: 8px !important;
        }
    }

    @media (min-width: 992px) {
        .mt-10-custom{
            margin-top: -10px !important;
        }
    }

    @media (min-width: 1200px) {
        .mt-10-custom{
            margin-top: -10px !important;
        }
    }

</style>


<div class="col-12 pagefull">
    
</div>
<div class="col-12 px-0">
    <table class="table-bordered " id='withdraw_tb'>
        <thead class='testappen'>
            <tr>
                <th scope="col" class="width300 p-4 text-left"><strong>Select item to withdraw</strong></th>
                <th scope="col" class="width200 text-left "><strong>Date</strong></th>
                <th scope="col" class="width200 text-left "><strong>Detail</strong></th>
                <th scope="col" class="width100 text-left "><strong>Catagory</strong></th>
                <th scope="col" class="width100 text-left "><strong>Amount</strong></th>
                <th scope="col" class="width200 text-left "><strong>State</strong></th>
            </tr>
        </thead>
        <tbody class="hd_row">
            @php
            // dd($withdraw);
            @endphp
            @if(count($withdraw) > 0)
                @foreach($withdraw as $key => $withdrawdata)
                    <tr>
                        <td scope="row" data-label="Select item to withdraw<" class="font_size_14px">
                            <div class="row">
                                <div class="col-12 text-lg-left text-md-right text-sm-right">
                                    <div class="form-check">
                                        <label class="form-check-label" for="defaultCheck1" >
                                            <strong class="d-lg-none d-md-block d-block">Select</strong>
                                        </label>
                                        @if($withdrawdata->status == 0)
                                            @if (isset($user_shop_bank->bank_code) && isset($user_shop_bank->bank_number) && isset($user_shop_bank->bank_name) && isset($user_shop_bank->bank_category))
                                                <input class="form-check-input mr-0 ml-1 mt-lg-1 mt-md-2 mt-10-custom checkwithdraw" type="checkbox" value="{{ $withdrawdata->inv_ref }}" total="{{ $withdrawdata->amount }}" sale_id="{{ $withdrawdata->id }}" id="defaultCheck1">
                                            @else
                                                <a href="{{route('addsellerbank')}}" style="color:red;" >*Add bank account to withdraw</a>
                                            @endif
                                        @else

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td scope="row" data-label="วันที่" class="font_size_14px">
                            <div class="row">
                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                    <h6 class="mb-0 font_size_14px">
                                        <strong>{{ date('d/m/Y H:i', strtotime($withdrawdata->created_at)) }}</strong></h6>
                                </div>
                            </div>
                        </td>
                        <td data-label="รายละเอียด" class="font_size_14px">
                            <div class="row">
                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                    <h6 class="mb-0 font_size_14px text-primary" data-toggle="modal" data-target="#inv{{ $withdrawdata->inv_ref }}" style="cursor: pointer; "><strong>{{ $withdrawdata->inv_ref }}@if(isset($withdrawdata->inv_no) && $withdrawdata->inv_no !=null)-{{ $withdrawdata->inv_no }}@endif</strong></h6>
                                </div>
                            </div>
                        </td>
                        <td data-label="ประเภท" class="font_size_14px">
                            <div class="row">
                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                    <h6 class="mb-0 font_size_14px"><strong>{{ $withdrawdata->type }}</strong></h6>
                                </div>
                            </div>
                        </td>
                        <td data-label="จำนวนเงิน" class="text-lg-left text-md-right text-sm-right font_size_14px">
                            <div class="row">
                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                    <h6 class="mb-0 font_size_14px"><strong style="color: #a83c23;">
                                            {{ number_format($withdrawdata->amount,0) }}</strong></h6>
                                </div>
                            </div>
                        </td>
                        <td data-label="สถานะ" class="font_size_14px">
                            <div class="row">
                                <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                    @if($withdrawdata->status == 0)
                                    <h6 class="mb-0 font_size_14px"><b style='color:#007bff'>Can be withdrawn</b></h6>
                                    @elseif($withdrawdata->status == 1)
                                    <h6 class="mb-0 font_size_14px"><b style='color:#ffab0d'>in progress</b></h6>
                                    @elseif($withdrawdata->status == 2)
                                    <h6 class="mb-0 font_size_14px"><b style='color:#ffab0d'>Transfer Wallet</b></h6>
                                    @elseif($withdrawdata->status == 3)
                                    <h6 class="mb-0 font_size_14px"><b style='color:#23c197'>Withdrawn Succeed</b></h6>
                                    @elseif($withdrawdata->status == 99)
                                    <h6 class="mb-0 font_size_14px"><b style='color:#23c197'>Canceled</b></h6>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- Modal -->
                        <div class="modal fade" id="inv{{ $withdrawdata->inv_ref }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header pb-0">
                                        <div class="col-12 position-relative">
                                            <h5 class="modal-title text-center mb-3" id="exampleModalLabel"><strong>{{ $withdrawdata->inv_ref }}</strong></h5>
                                            <button type="button" class="close position-absolute" style="right: 5px; top: 0px;"
                                                data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="row">
                                            @foreach(json_decode($withdrawdata->inv_products) as $key_inv => $item)
                                                @if(isset($item->type))
                                                    @if($item->type == 'flashsale')
                                                        @foreach($flash as $pro)
                                                            @if($item->product_id == $pro->id)
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-9 mb-4 text-lg-left text-md-right text-sm-right">
                                                                            <div class="media">
                                                                                <img src="{{asset('img/product/'. $pro->product_img[0]) }}" style="width: 60px;" class="mr-3 rounded8px" alt="...">
                                                                                <div class="media-body">
                                                                                    <h6 class="mt-0 text-dot2"><strong>{{ $pro->name }}</strong></h6>
                                                                                        @if(isset($pro->dis1) && isset($pro->dis2))
                                                                                        {{ $pro->dis1 }} , {{ $pro->dis2 }}
                                                                                        @endif
                                                                                        @if(isset($pro->dis1))
                                                                                        {{ $pro->dis1 }}
                                                                                        @endif
                                                                                        @if(isset($pro->dis2))
                                                                                        {{ $pro->dis1 }}
                                                                                        @endif
                                                                                        @if(!isset($pro->dis1) && !isset($pro->dis2))
                                                                                        <span style="color:grey">ไม่มีรายละเอียดสินค้า</span>
                                                                                        @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-3 text-right">
                                                                            <?php $price = $item->price * $item>amount; ?>
                                                                            <h6><strong>฿  {{ number_format($price,0) }}</strong></h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @elseif(!isset($item->type))
                                                    @foreach($product as $pro)
                                                        @if($item->product_id == $pro->id)
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-9 mb-4 text-lg-left text-md-right text-sm-right">
                                                                        <div class="media">
                                                                            <img src="{{asset('img/product/'. $pro->product_img[0]) }}" style="width: 60px;" class="mr-3 rounded8px" alt="...">
                                                                            <div class="media-body">
                                                                                <h6 class="mt-0 text-dot2"><strong>{{ $pro->name }}</strong></h6>
                                                                                    @if(isset($pro->dis1) && isset($pro->dis2))
                                                                                    {{ $pro->dis1 }} , {{ $pro->dis2 }}
                                                                                    @endif
                                                                                    @if(isset($pro->dis1))
                                                                                    {{ $pro->dis1 }}
                                                                                    @endif
                                                                                    @if(isset($pro->dis2))
                                                                                    {{ $pro->dis1 }}
                                                                                    @endif
                                                                                    @if(!isset($pro->dis1) && !isset($pro->dis2))
                                                                                    <span style="color:grey">ไม่มีรายละเอียดสินค้า</span>
                                                                                    @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3 text-right">
                                                                        @if ((isset($withdrawdata->uidmp) || $withdrawdata->uidmp != null || $withdrawdata->uidmp != '') && (isset($item->margin) || $item->margin != null || $item->margin != ''))
                                                                            @php
                                                                                $price = $item->margin * $item->amount;
                                                                            @endphp
                                                                        @else
                                                                            @php
                                                                                $price = $item->price * $item->amount;
                                                                            @endphp
                                                                        @endif
                                                                        <h6><strong>฿  {{ number_format($price,0) }}</strong></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            {{-- <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 text-lg-left text-md-right text-sm-right">
                                                        <div class="media">
                                                            <img src="/new_ui/img/product/product-11.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
                                                            <div class="media-body">
                                                                <h6 class="mt-0 text-dot2"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
                                                                สีน้ำตาล,S
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 text-right">
                                                        <h6><strong class="text-main">฿  1,515</strong></h6>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            
                                            
                                            
                                        </div>
                                    </div>
                                        <div class="modal-footer">
                                            {{-- <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6><strong>Price</strong></h6>
                                                    </div>
                                                    <div class="col-6 px-0 text-right">
                                                        <h6><strong>฿  {{ number_format( ($withdrawdata->total*0.9),0) }}</strong></h6>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6><strong> GP (10 %)</strong></h6>
                                                    </div>
                                                    <div class="col-6 px-0 text-right">
                                                        @if ((isset($withdrawdata->uidmp) || $withdrawdata->uidmp != null || $withdrawdata->uidmp != '') && (isset($item->margin) || $item->margin != null || $item->margin != ''))
                                                            <h6 style="color:red"><strong>- ฿  {{ number_format( ($withdrawdata->margin_total*0.1),0) }}</strong></h6>
                                                        @else
                                                            <h6 style="color:red"><strong>- ฿  {{ number_format( ($withdrawdata->total*0.1),0) }}</strong></h6>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-0">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6><strong>Product price after deduction GP</strong></h6>
                                                    </div>
                                                    <div class="col-6 px-0 text-right">
                                                        @if ((isset($withdrawdata->uidmp) || $withdrawdata->uidmp != null || $withdrawdata->uidmp != '') && (isset($item->margin) || $item->margin != null || $item->margin != ''))
                                                        <h6><strong>฿  {{ number_format($withdrawdata->margin_total*0.9,0) }}</strong></h6>
                                                        @else
                                                            <h6><strong>฿  {{ number_format($withdrawdata->total*0.9,0) }}</strong></h6>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-0">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6><strong>Price transport</strong></h6>
                                                    </div>
                                                    <div class="col-6 px-0 text-right">
                                                        <h6><strong>฿  {{ number_format($withdrawdata->shipping_cost,0) }}</strong></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-0">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6><strong class="text-main">Total</strong></h6>
                                                    </div>
                                                    <div class="col-6 px-0 text-right">
                                                        <h6><strong class="text-main">฿  {{ number_format($withdrawdata->amount,0) }}</strong></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                @else
                
                @endif
        </tbody>
    </table>
</div>


<div class="d-flex justify-content-end col-12 pagination">
    @if ($withdraw->hasPages())
    <ul class="pagination">
        @if ($withdraw->onFirstPage())
        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i
                    class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i
                    class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
        @else <li class="align-self-center px-2 bg-pagination-white">
            <a href="{{ $withdraw->url(1) }}" rel="prev">
                <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
            </a>
        <li class="align-self-center px-2 bg-pagination-white">
            <a href="{{ $withdraw->previousPageUrl() }}" rel="prev">
                <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
            </a>
        </li> @endif
        @if ( $withdraw->currentPage() > 5 )
        <li class="align-self-center px-2 bg-pagination-white">
            <a href="{{ $withdraw->url(1) }}"><span>1</span></a>
        </li>
        @endif
        @if ( $withdraw->currentPage() > 5 )
        <li class="align-self-center px-2 bg-pagination-white">
            <span>...</span>
        </li>
        @endif
        @foreach(range(1, $withdraw->lastPage()) as $i)
        @if($i >= $withdraw->currentPage() - 2 && $i <= $withdraw->currentPage() + 2)
            @if ($i == $withdraw->currentPage())
            <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
            @else
            <li class="px-2 bg-pagination-white"><a href="{{ $withdraw->url($i) }}">{{ $i }}</a></li>
            @endif
            @endif
            @endforeach
            @if ( $withdraw->currentPage() < $withdraw->lastPage() - 4)
                <li class="align-self-center  px-2 bg-pagination-white">
                    <span>...</span>
                </li>
                @endif
                @if($withdraw->hasMorePages() == $withdraw->lastPage() && $withdraw->lastPage() > 5)
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $withdraw->url($withdraw->lastPage()) }}"><span>{{ $withdraw->lastPage() }}</span>
                    </a>
                </li>
                @endif
                @if ($withdraw->hasMorePages())
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $withdraw->nextPageUrl() }}" rel="next">
                        <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $withdraw->url($withdraw->lastPage()) }}" rel="next">
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


<!-- Modal -->
{{-- <div class="modal fade" id="inv-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header pb-0">
                <div class="col-12 position-relative">
                    <h5 class="modal-title text-center mb-3" id="exampleModalLabel"><strong>202011091743585243842494</strong></h5>
                    <button type="button" class="close position-absolute" style="right: 5px; top: 0px;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-9 mb-4 text-lg-left text-md-right text-sm-right">
                                <div class="media">
                                    <img src="/new_ui/img/product/product-11.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
                                    <div class="media-body">
                                        <h6 class="mt-0 text-dot2"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
                                        สีน้ำตาล,S
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <h6><strong class="text-main">฿  1,515</strong></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-9 text-lg-left text-md-right text-sm-right">
                                <div class="media">
                                    <img src="/new_ui/img/product/product-11.png" style="width: 60px;" class="mr-3 rounded8px" alt="...">
                                    <div class="media-body">
                                        <h6 class="mt-0 text-dot2"><strong>Basics by sita | A224 - One Button Box by sita Button....</strong></h6>
                                        สีน้ำตาล,S
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <h6><strong class="text-main">฿  1,515</strong></h6>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
                <div class="modal-footer">
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-6">
                                <h6><strong class="text-main">Total</strong></h6>
                            </div>
                            <div class="col-6 px-0 text-right">
                                <h6><strong class="text-main">฿  3,030</strong></h6>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div> --}}

@section('script')
<script type="text/javascript">
    $('input[type="checkbox"]').on('change', function () {
        var sum = 0;
        var list = 0;
        var inv = [];
        var price = [];
        var id = [];
        $('input[type="checkbox"]:checked').each(function (index) {
            var value = $(this).attr('total');
            var sale_id = $(this).attr('sale_id');
            var inv_ref = $(this).val();
            sum += parseInt(value);
            inv.push(inv_ref);
            price.push(value);
            id.push(sale_id);
            list++;
        });
        var format_sum = sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $('#withdrawamount').text(format_sum);
        $('#list').text(list);
        $('#total').text(format_sum);
        $('input[name=balance]').val(sum);
        $('input[name=inv]').val(inv);
        $('input[name=price]').val(price);
        $('input[name=sale_id]').val(id);

        var check = $('input[type="checkbox"]:checked').length;
        if(check > 0){
            $('.check').prop('disabled',false);
        }
        else{
            $('.check').prop('disabled',true);
        }
    })
</script>
@endsection