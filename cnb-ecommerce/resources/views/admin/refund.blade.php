@extends('layouts.dashboard')

@section('content')
<div class="container">
   <div class="row py-4">
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-lg-row">
                    <div class=""><h5 class="mb-0"><b>{{ $product->name }}</b></h5></div>
                    <div class="flex-fill d-flex flex-column flex-md-row justify-content-end">
                        <div class="d-flex">
                            <input type="text" name="search" placeholder="ค้นหา" class="form-control ml-auto" style="max-width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="col-12 w-100">
                    <table class="table table-borderless table-striped table-sm-responsive" id="choose">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="10">
                                    ผู้ที่ได้รับรางวัล
                                </th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th style="min-width: 200px">อีเมล</th>
                                <th style="min-width: 60px">จำนวน</th>
                                <th style="min-width: 100px">เลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="nodata">
                                <td colspan="10" class="text-center">-</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">
                                    <form  id="chooseUser" class="d-none">
                                        <div>
                                            
                                        </div>
                                        @csrf
                                    </form>
                                    <button type="button" class="btn btn-success submitChooseUser" id="submit">ยืนยันการประกาศผล</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-12 w-100">
                    <table class="table table-borderless table-striped table-sm-responsive" id="show">
                        <thead class="thead-dark"> <tr>
                            <th colspan="10">
                                รอการคัดเลือก
                            </th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th style="min-width: 200px">อีเมล</th>
                                <th style="min-width: 60px">จำนวน</th>
                                <th style="min-width: 100px">เลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rows as $key => $value)
                                <tr class="filter" user="{{ @$value['user_id'] }}">
                                    <td class="key">{{ $key+1 }}</td>
                                    <td class="text-left">{{ @$value['user']->name }} {{ @$value['user']->surname }}</td>
                                    <td class="text-left">{{ @$value['user']->email }}</td>
                                    <td class="amount">{{ @$value['amount'] }}</td>
                                    <td><button class="btn btn-sm btn-success select">เลือก</button></td>
                                </tr>
                            @empty
                                <tr class="nodata">
                                    <td colspan="10" class="text-center">-</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
        var trNodata = '<tr class="nodata">\
                            <td colspan="10" class="text-center">-</td>\
                        </tr>';

        // search
        $('input[name="search"').on('change keyup', function() {
            var value = $(this).val().toLowerCase();
            $('table tr.filter').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        // append user
        $('#show button.select').on('click',function(){
            // varible
            var parents = $(this).parents('.filter');
            var user = $(this).parents('.filter').attr('user');
            var count = $('#choose tbody tr:not(.nodata)').length;
            var html = '<tr user="'+user+'">';
            html += parents.html();
            html += '</tr>';
           
            //remove no data
            $('#choose tbody tr.nodata').remove();
            
            //add new data 
            $('#choose tbody').append(html);

            // edit new data
            $('#choose tbody tr[user="'+user+'"]').find('.amount').text('1');
            $('#choose tbody tr[user="'+user+'"]').find('.key').text(count+1);
            $('#choose tbody tr[user="'+user+'"]').find('button').removeClass('btn-success').removeClass('select').addClass('btn-danger').addClass('cancle').text('ยกเลิก');

            // minus old
            var old = $(this).parents('tr').find('.amount').text();
            $(this).parents('tr').find('.amount').text((parseInt(old)-1));
            
            //set old button
            $(this).removeClass('btn-success').addClass('btn-secondary').prop('disabled',true);


            //set value
            $('form#chooseUser div').append('<input type="text" name="user[]" value="'+user+'">');

        });

        // remove user
        $('table#choose').on('click','button.cancle',function(){
            // varible
            var parents = $(this).parents('tr');
            var user = $(this).parents('tr').attr('user');
            console.log("user", user);
            var count = $('#choose tbody tr:not(.nodata)').length;
           
            //remove data
            parents.remove();

            // //add new data 
            var old = $('#show tbody tr[user="'+user+'"] .amount').text();
            $('#show tbody tr[user="'+user+'"] .amount').text((parseInt(old)+1));

            // clear button
            $('#show tbody tr[user="'+user+'"] button').removeClass('btn-secondary').addClass('btn-success').prop('disabled',false);

            //remove value
            $('form#chooseUser div').find('input[value="'+user+'"]').remove();

            var count = $('#choose tbody tr:not(.nodata)').length;
            if(count < 1){
                $('table#choose tbody').html(trNodata);
            }
        });

        // ajax
        $('.submitChooseUser').on('click',function(){
            $('.submitChooseUser').prop('disabled',true);
            $('form#chooseUser').submit();
        });
        $('form#chooseUser').on('submit',function(){
            @if(isset($id))
                var formdata = new FormData(this);
                if($('input[name="user[]"]').length > 0){
                    $.ajax({
                        url: '/dashboard/flash_sale/{{ $id }}/refund',
                        data:formdata,
                        type: 'POST',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if($.trim(data.status)=='true'){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'ประกาศผลสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(function(){
                                    location.reload();
                                }, 1500);
                            }
                        },
                    });
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'ไม่มีข้อมูล',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('.submitChooseUser').prop('disabled',false);
                }
            @endif
        });
    });
    amount = 0;
    $( "table .amount" ).each(function( index ) {
        amount+=parseInt($(this).text());
    });
    console.log("amount", amount);
</script>
@endsection