<div class="col-12 px-0">
    <table class="table-bordered">
        <thead>
        </thead>
        <tbody>
            @if ( count($wallettrans2) == 0)
            <tr>
                <div class="col-12 mb-4 text-center p-4 rounded8px" style="background-color: #fff;">
                    <h6 class="mt-0 font_head_item" style="color: #afafaf;">ยังไม่มีรายการ</h6>
                </div>
            </tr>
            @else
            @foreach($wallettrans2 as $key=>$item)
            <tr>
                @if ($item->type == 'wallet bank'||$item->type == 'wallet Credit'||$item->type == 'wallet QR'||$item->type == 'wallet refund'||$item->type == 'wallet cancel')
                <td scope="row" class="font_size_14px">
                    <div class="row">
                        <div class="col-12 my-0 text-left">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0 font_size_14px"><strong>ยอดโอนเข้า ระบบ
                                    @if($item->type == 'wallet bank')
                                    ผ่านการโอน
                                    @elseif($item->type == 'wallet Credit')
                                    ผ่านบัตรเครดิต
                                    @elseif($item->type == 'wallet QR')
                                    ผ่าน QR code
                                    @elseif($item->type == 'wallet refund')
                                    ได้รับยอดคืนจากการประกาศผล
                                    @elseif($item->type == 'wallet cancel')
                                    ได้รับยอดคืนจากการยกเลิก
                                    @endif
                                    </strong></h6>
                                    <div style='color: #afafaf; font-size:14px;'>{{ date('d/m/y H:i', strtotime($item->created_at)) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td data-label="จำนวนเงิน" class="font_size_14px">
                    <div class="text-right pr-4" style='color: green;'>
                        <strong> {{$item->total}} ฿ </strong>
                    </div>
                </td>
                @elseif($item->type == 'wallet Pay')
                <td scope="row" class="font_size_14px">
                    <div class="row">
                        <div class="col-12 my-0 text-left">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0 font_size_14px"><strong>ชำระสินค้า</strong></h6>
                                    <div style='color: #afafaf; font-size:14px;'>{{ date('d/m/y H:i', strtotime($item->created_at)) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td data-label="จำนวนเงิน" class="font_size_14px">
                    <div class="text-right pr-4" style='color: red;'>
                        <strong> {{$item->total}} ฿ </strong>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>