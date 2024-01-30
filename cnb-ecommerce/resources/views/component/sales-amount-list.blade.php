<style>
    @media (min-width: 320px) {
        .mt-10-custom{
            margin-top: 4px !important;
        }
    }


    @media (min-width: 576px) {
        .mt-10-custom{
            margin-top: 4px !important;
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


<div class="col-12 px-0 pagefull">
    <table class="table-bordered" id='withdraw_tb'>
        <thead class='testappen'>
            <tr>
                <th scope="col" class="width200 p-4 text-left"><strong>เลือกรายการที่จะถอน</strong></th>
                <th scope="col" class="width200 text-left "><strong>วันที่</strong></th>
                <th scope="col" class="width200 text-left "><strong>รายละเอียด</strong></th>
                <th scope="col" class="width100 text-left "><strong>ชำระเงินผ่าน</strong></th>
                <th scope="col" class="width100 text-left "><strong>จำนวนเงิน</strong></th>
                <th scope="col" class="width200 text-left "><strong>สถานะ</strong></th>
            </tr>
        </thead>
        <tbody class="hd_row">
            @php
            // dd($user_shops);
            @endphp
            @foreach($sales_amount as $withdrawdata)
            <tr>
                <td scope="row" data-label="เลือกรายการที่จะถอน" class="font_size_14px">
                    <div class="row">
                        <div class="col-12 text-lg-left text-md-right text-sm-right">
                            <div class="form-check">
                                <label class="form-check-label" for="defaultCheck1" >
                                    <strong class="d-lg-none d-md-block d-block">เลือก</strong>
                                </label>
                                <input class="form-check-input mr-0 ml-1 mt-lg-1 mt-md-2 mt-10-custom" type="checkbox" value="" id="defaultCheck1">
                            </div>
                        </div>
                    </div>
                </td>
                <td scope="row" data-label="วันที่" class="font_size_14px">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                            <h6 class="mb-0 font_size_14px">
                                <strong>{{ date('d/m/y H:i', strtotime($withdrawdata->created_at)) }}</strong></h6>
                        </div>
                    </div>
                </td>
                <td data-label="รายละเอียด" class="font_size_14px">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                            <h6 class="mb-0 font_size_14px text-primary" data-toggle="modal" data-target="#inv-1" style="cursor: pointer; "><strong>202011091743585243842494</strong></h6>
                        </div>
                    </div>
                </td>
                <td data-label="ประเภท" class="font_size_14px">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                            <h6 class="mb-0 font_size_14px"><strong>{{$withdrawdata->type}}</strong></h6>
                        </div>
                    </div>
                </td>
                <td data-label="จำนวนเงิน" class="text-lg-left text-md-right text-sm-right font_size_14px">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                            <h6 class="mb-0 font_size_14px"><strong style="color: #a83c23;">-
                                    {{ number_format($withdrawdata->amount,0) }}</strong></h6>
                        </div>
                    </div>
                </td>
                <td data-label="สถานะ" class="font_size_14px">
                    <div class="row">
                        <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                            @if($withdrawdata->status == 'Withdrawable')
                            <h6 class="mb-0 font_size_14px"><b style='color:#007bff'>สามารถถอนได้</b></h6>
                            @elseif($withdrawdata->status == 'InProcess')
                            <h6 class="mb-0 font_size_14px"><b style='color:#ffab0d'>กำลังดำเนินการ</b></h6>
                            elseif($withdrawdata->status == 'TransferWallet')
                            <h6 class="mb-0 font_size_14px"><b style='color:#23c197'>ถอนเข้า wallet แล้ว</b></h6>
                            @else
                            <h6 class="mb-0 font_size_14px"><b style='color:#23c197'>ถอนแล้ว</b></h6>
                            @endif


                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="d-flex justify-content-end col-12 pagination2">
    @if ($user_shops->hasPages())
    <ul class="pagination">
        @if ($user_shops->onFirstPage())
        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i
                    class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i></span></li>
        <li class="disabled align-self-center px-2 bg-pagination-white d-none"><span class="mr-1"><i
                    class="fa fa-angle-left text-secondary" aria-hidden="true"></i></span></li>
        @else <li class="align-self-center px-2 bg-pagination-white">
            <a href="{{ $user_shops->url(1) }}" rel="prev">
                <i class="fa fa-angle-double-left text-secondary" aria-hidden="true"></i>
            </a>
        <li class="align-self-center px-2 bg-pagination-white">
            <a href="{{ $user_shops->previousPageUrl() }}" rel="prev">
                <i class="fa fa-angle-left text-secondary" aria-hidden="true"></i>
            </a>
        </li> @endif
        @if ( $user_shops->currentPage() > 5 )
        <li class="align-self-center px-2 bg-pagination-white">
            <a href="{{ $user_shops->url(1) }}"><span>1</span></a>
        </li>
        @endif
        @if ( $user_shops->currentPage() > 5 )
        <li class="align-self-center px-2 bg-pagination-white">
            <span>...</span>
        </li>
        @endif
        @foreach(range(1, $user_shops->lastPage()) as $i)
        @if($i >= $user_shops->currentPage() - 2 && $i <= $user_shops->currentPage() + 2)
            @if ($i == $user_shops->currentPage())
            <li class="active px-2 bg-pagination-42294f"><span>{{ $i }}</span></li>
            @else
            <li class="px-2 bg-pagination-white"><a href="{{ $user_shops->url($i) }}">{{ $i }}</a></li>
            @endif
            @endif
            @endforeach
            @if ( $user_shops->currentPage() < $user_shops->lastPage() - 4)
                <li class="align-self-center  px-2 bg-pagination-white">
                    <span>...</span>
                </li>
                @endif
                @if($user_shops->hasMorePages() == $user_shops->lastPage() && $user_shops->lastPage() > 5)
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $user_shops->url($user_shops->lastPage()) }}"><span>{{ $user_shops->lastPage() }}</span>
                    </a>
                </li>
                @endif
                @if ($user_shops->hasMorePages())
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $user_shops->nextPageUrl() }}" rel="next">
                        <i class="fa fa-angle-right text-secondary" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="align-self-center px-2 bg-pagination-white">
                    <a href="{{ $user_shops->url($user_shops->lastPage()) }}" rel="next">
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
<div class="modal fade" id="inv-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h6><strong class="text-main">฿ 1,515</strong></h6>
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
                                <h6><strong class="text-main">฿ 1,515</strong></h6>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
                <div class="modal-footer">
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-6">
                                <h6><strong class="text-main">ยอดรวม</strong></h6>
                            </div>
                            <div class="col-6 px-0 text-right">
                                <h6><strong class="text-main">฿ 3,030</strong></h6>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>