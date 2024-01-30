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
                <th scope="col" class="width200 p-4 text-left"><strong>วันที่</strong></th>
                <th scope="col" class="width200 text-left "><strong>เลขกำกับคำสั่งซื้อ</strong></th>
                <th scope="col" class="width200 text-left "><strong>ร้านที่จำหน่าย</strong></th>
                <th scope="col" class="width200 text-left "><strong>จำนวนเงินทั้งหมด</strong></th>
                <th scope="col" class="width200 text-left "><strong>รายได้จากการแนะนำ 3%</strong></th>
            </tr>
        </thead>
        <tbody class="hd_row">
            @foreach ($withdraw->where('status',0) as $item)
                <tr>
                    <td data-label="วันที่" class="font_size_14px">
                        <div class="row">
                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                <h6 class="mb-0 font_size_14px" style="cursor: pointer; "><strong>{{ $item->created_at }}</strong></h6>
                            </div>
                        </div>
                    </td>
                    <td data-label="เลขกำกับคำสั่งซื้อ" class="font_size_14px">
                        <div class="row">
                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                <h6 class="mb-0 font_size_14px" style="cursor: pointer; "><strong>{{ $item->inv_ref }}</strong></h6>
                            </div>
                        </div>
                    </td>
                    <td data-label="ร้านที่จำหน่าย" class="font_size_14px">
                        <div class="row">
                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                <h6 class="mb-0 font_size_14px" style="cursor: pointer; "><strong>{{ $item->shop_ref_name }}</strong></h6>
                            </div>
                        </div>
                    </td>
                    <td data-label="จำนวนเงินทั้งหมด" class="font_size_14px">
                        <div class="row">
                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                <h6 class="mb-0 font_size_14px"><strong style="color: #a83c23;">{{ number_format($item->total,0) }}</strong></h6>
                            </div>
                        </div>
                    </td>
                    <td data-label="จำนวนเงิน 3% ที่ได้" class="font_size_14px">
                        <div class="row">
                            <div class="col-12 mb-2 text-lg-left text-md-right text-sm-right pr-0">
                                <h6 class="mb-0 font_size_14px"><strong style="color: #a83c23;">{{ number_format($item->amount,0) }}</strong></h6>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


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