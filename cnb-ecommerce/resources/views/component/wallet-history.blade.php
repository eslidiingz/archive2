<div class="col-12 px-0">
    <table class="table-bordered">
        <thead>
        </thead>
        <tbody>
            @if ( count($wallettrans) == 0)
            <tr>
                <div class="col-12 mb-4 text-center p-4 rounded8px" style="background-color: #fff;">
                    <h6 class="mt-0 font_head_item" style="color: #afafaf;">ยังไม่มีรายการ</h6>
                </div>
            </tr>
            @else
            @foreach($wallettrans as $key=>$item)
                <tr>
                    @if ($item->payment == 'bank'||$item->payment == 'credit'||$item->payment == 'mobilebanking')
                        <td scope="row" class="font_size_14px">
                            <div class="row">
                                <div class="col-12 my-0 text-left">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0 font_size_14px"><strong>ยอดโอนเข้า ระบบ
                                            @if($item->payment == 'bank')
                                            ผ่านการโอน
                                            @elseif($item->payment == 'credit')
                                            ผ่านบัตรเครดิต
                                            @elseif($item->payment == 'mobilebanking')
                                            ผ่าน QR code
                                            @endif
                                            </strong></h6>
                                            <div style='color: #afafaf; font-size:14px;'>{{ date('d/m/y H:i', strtotime($item->created_at)) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td data-label="จำนวนเงิน" class="font_size_14px">
                            <div class="text-right pr-4" style='color: black;'>
                                <strong> {{$item->total}} ฿ </strong>
                            
                            </div>
                        </td>
                        <td data-label="จำนวนเงิน" class="font_size_14px">
                            <div class="text-right pr-4" style='color: black;'>
                                
                                @if($item->status == '1')
                                <strong style='color: black;'> ต้องชำระเงิน </strong>
                                    @if($item->payment == 'bank')
                                        <a href="/add_wallet_bank?inv_ref={{$item->inv_ref}}">
                                            <strong rong style='color: blue;'> ทำรายการต่อ </strong>
                                        </a>
                                    @elseif($item->payment == 'mobilebanking')
                                        @php
                                                $qrid = DB::table('mobilebankings')->where('inv_ref', $item->inv_ref)->value('id');
                                        @endphp
                                        <a href="/add_wallet_qr_code/qrcode/{{$qrid}}">
                                            <strong style='color: blue;'> ทำรายการต่อ</strong>
                                        </a>
                                    @elseif($item->payment == 'credit')
                                        <a href="/addwallet?wallet={{$item->total}}">
                                            <strong style='color: blue;'> ทำรายการต่อ</strong>
                                        </a>
                                    @endif
                                @elseif($item->status == '12')
                                    <strong style='color: orange;'> อยู่ระหว่างตรวจสอบ </strong>
                                @elseif($item->status == '2')
                                    <strong style='color: green;'> สำเร็จ </strong>
                                @elseif($item->status == '99')
                                    <strong style='color: red;'> รายการถูกปฏิเสธ :  {{ @$item->note }} </strong>
                                @endif
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>