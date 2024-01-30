@extends('layouts.dashboard')

@section('content')
    <div class="p-0">
        <div class="row py-4">
            <div class="col-12">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-center flex-column flex-lg-row" style="margin-bottom: 0px;">
                        <div class="col-6">
                            <h5 class="mb-0">
                                <b>
                                    Code เปิดร้านค้า
                                </b>
                            </h5>
                        </div>
                        <div class="col-2 py-4">
                            <a href="javascript:void(0);" id="aExportExcel" class="btn btn-success form-control"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel </a>
                        </div>
                    </div>

                    <form class="row" role="form" action="#" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12 mb-3">
                            <label for="detail">รายละเอียด</label>
                            <textarea type="text" rows="4" class="form-control" name="detail" id="detail"
                                placeholder="รายละเอียด" readonly="true">{{$o_code_open_shop_gen->detail}}</textarea>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="name">จำนวน Code</label>
                            <input type="text" class="form-control" name="title" value="{{$o_code_open_shop_gen->code_amt}}" id="title" placeholder="จำนวน Code"
                                readonly="true">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="name">ใช้ไปแล้ว</label>
                            <input type="text" class="form-control" name="title" value="{{$o_code_open_shop_gen->code_amt-$o_code_open_shop_gen->remain_amt}}" id="title" placeholder="ใช้ไปแล้ว"
                                readonly="true">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="name">คงเหลือ</label>
                            <input type="text" class="form-control" name="title" value="{{$o_code_open_shop_gen->remain_amt}}" id="title" placeholder="คงเหลือ"
                                readonly="true">
                        </div>
                        <div class="col-12">
                            <label for="images">Code</label>
                            <div class="col-12">
                                <table class="table table-striped" id="buy_table">
                                    <thead class="thead-blue">
                                        <tr>
                                            <th  scope="col">Code</th>
                                            <th  scope="col">จำนวน</th>
                                            <th  scope="col">ใช้ไปแล้ว</th>
                                            <th scope="col">ชื่อร้านค้า</th>
                                            <th  scope="col">วัน-เวลาที่ใช้ Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($o_code_open_shop as $key=>$code_open_shop_all_value)
                                        <tr style="text-align: center; align-items: center;">
                                            <td data-label="Code">
                                                {{ $code_open_shop_all_value->code }}
                                            </td>
                                            <td data-label="จำนวน">
                                                {{ $code_open_shop_all_value->code_amt }}
                                            </td>
                                            <td data-label="ใช้ไปแล้ว">
                                                {{ $code_open_shop_all_value->code_amt-$code_open_shop_all_value->remain_amt }}
                                            </td>
                                            <td data-label="Code">
                                                {{ $code_open_shop_all_value->used_shop_name }}
                                            </td>
                                            <td data-label="วันที่-เวลาที่ใช้ Code">
                                                {{ ($code_open_shop_all_value->used_at) ? date('d/m/y H:i', strtotime($code_open_shop_all_value->used_at)) : '' }}

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <a href="{{ url('dashboard/codeOpenShop') }}" class="btn btn-secondary">ย้อนกลับ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css" scoped>
        .position-text {
            position: absolute;
            right: 15px;
            top: 0;
            font-size: 12px;
            color: red;
        }

        .form-group {
            position: relative;
        }

    </style>

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#aExportExcel').click(function() {
                if( "{{$o_code_open_shop_gen->id}}" != '' ) {
                    window.location.href = "/dashboard/codeOpenShop/excel/{{$o_code_open_shop_gen->id}}";
                } else {
                    
                }
            });
        });
    </script>
@endsection
