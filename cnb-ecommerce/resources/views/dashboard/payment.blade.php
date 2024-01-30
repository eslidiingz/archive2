@extends('layouts.dashboard')
@section('content')

<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.21/datatables.min.css" />


<script src="js/jquery.min.js"></script>
<script src="js/jquery.table2excel.js"></script>

<style>
    .box{
        height: calc(100vh - 270px);;
    }
    .top{
        margin-top: 100px;
    }
    </style>

<div class="row justify-content-center top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-12 ml-xl-auto">
                <div class="card">
                    <div class="card-body m-2 p-0">
                        <div class="row">
                            <div class="col-6 p-0 ml-3">
                                <h2 class="medium" style="padding: 0;margin: 0;"><b>รายงานการเงิน</b></h2>
                                <h5 class="medium"><b>ตรวจสอบการเงิน</b></h5>
                            </div>
                        </div>
                        <div class="col-12 justify-content-center"><br>
                            <ul class="nav nav-tabs">
                                <li class="nav-item" style="font-size: 18px;"><a class="nav-link active bold black pt-2 pl-2" data-toggle="tab" href="#main">ทั้งหมด</a></li>
                                <li class="nav-item" style="font-size: 18px;"><a class="nav-link bold black pt-2 pl-2" data-toggle="tab" href="#t10">T10</a></li>
                                <li class="nav-item" style="font-size: 18px;"><a class="nav-link bold black pt-2 pl-2" data-toggle="tab" href="#transaction">โอน</a></li>
                                <li class="nav-item" style="font-size: 18px;"><a class="nav-link bold black pt-2 pl-2" data-toggle="tab" href="#qr">QR</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="row justify-content-center tab-pane fade show active" id="main">
                                    <div class="container-fluid table-responsive box">
                                        <div class="card"style="border: none;">
                                            <div class="card-body m-2 p-0">
                                                <table class="table tt  1 table-striped" id="mainn">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <th>#</th>
                                                            <th>Time</th>
                                                            <th>Type</th>
                                                            <th>Payment</th>
                                                            <th>Total</th>
                                                            <th>INV_REF</th>
                                                            <th>INV_ID</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($trans as $key=>$tran)
                                                            <tr style="text-align: center;">
                                                                <td data-label="#">{{ $key+1 }}</td>
                                                                <td data-label="Time">{{ $tran->updated_at }}</td>
                                                                <td data-label="Type">{{ $tran->type }}</td>
                                                                <td data-label="Payment">{{ $tran->payment }}</td>
                                                                <td data-label="Total">{{ $tran->total }}</td>
                                                                <td data-label="INV_REF">{{ $tran->inv_ref }}</td>

                                                                <td data-label="INV_ID">
                                                                    @foreach($tran->inv_id as $key=>$tra)
                                                                        {{ $tra }}
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <a href="/export_excel/excel/?id={{$tra}}"><i class="far fa-file-excel fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center tab-pane fade" id="t10">
                                    <div class="container-fluid table-responsive box">
                                        <div class="card"style="border: none;">
                                            <div class="card-body m-2 p-0">
                                                <table class="table table-striped" id="t10s">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <th>#</th>
                                                            <th>User</th>
                                                            <th>วัน-เวลา</th>
                                                            <th>จำนวน</th>
                                                            <th>Ref_INV</th>
                                                            <th>INV_ID</th>
                                                            <th>สถานะ</th>
                                                            <th>Note</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($trans->where('type','=','T10 Service') as $key=>$tran)
                                                            <tr style="text-align: center;">
                                                                <td data-label="#">{{ $key+1 }}</td>
                                                                <td data-label="User">{{ $tran->uSers[0]->name }} {{ $tran->uSers[0]->surname }}</td>
                                                                <td data-label="วัน-เวลา">{{ $tran->updated_at }}</td>
                                                                <td data-label="จำนวน">{{ $tran->total }}</td>
                                                                <td data-label="Ref_INV">{{ $tran->inv_ref }}</td>
                                                                <td data-label="INV_ID">
                                                                    @foreach($tran->inv_id['id'] as $key=>$tra)
                                                                    {{ $tra }}
                                                                    @endforeach
                                                                </td>
                                                                <td data-label="สถานะ" style="color:green">เรียบร้อย</td>
                                                                <td data-label="Note">Test</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center tab-pane fade" id="transaction">
                                    <div class="container-fluid table-responsive box">
                                        <div class="card"style="border: none;">
                                            <div class="card-body m-2 p-0">
                                                <table class="table table-striped" id="transactions">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <th>#</th>
                                                            <th>User</th>
                                                            <th>วัน-เวลา</th>
                                                            <th>จำนวน</th>
                                                            <th>Ref_INV</th>
                                                            <th>INV_ID</th>
                                                            <th>สถานะ</th>
                                                            <th>Note</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($trans->where('type','=','mobile banking') as $key=>$tran)
                                                            <tr style="text-align: center;">
                                                                <td data-label="#">{{ $key+1 }}</td>
                                                                <td data-label="User">{{ $tran->uSers[0]->name }} {{ $tran->uSers[0]->name }}</td>
                                                                <td data-label="วัน-เวลา">{{ $tran->updated_at }}</td>
                                                                <td data-label="จำนวน">{{ $tran->total }}</td>
                                                                <td data-label="Ref_INV">{{ $tran->inv_ref }}</td>
                                                                <td data-label="INV_ID">
                                                                    @foreach($tran->inv_id['id'] as $trr)
                                                                    {{$trr}}
                                                                    @endforeach
                                                                </td>
                                                                <td data-label="สถานะ"style="color:red">ยังไม่พร้อม</td>
                                                                <td data-label="Note">test</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center tab-pane fade" id="qr">
                                    <div class="container-fluid table-responsive box">
                                        <div class="card"style="border: none;">
                                            <div class="card-body m-2 p-0">
                                                <table class="table table-striped" id="qrr">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <th>#</th>
                                                            <th>User</th>
                                                            <th>วัน-เวลา</th>
                                                            <th>จำนวน</th>
                                                            <th>Ref_INV</th>
                                                            <th>INV_ID</th>
                                                            <th>สถานะ</th>
                                                            <th>Note</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($trans->where('type','=','qr') as $key=>$tran)
                                                            <tr style="text-align: center;">
                                                                <td data-label="#">{{ $key+1 }}</td>
                                                                <td data-label="User">{{ $tran->uSers[0]->name }} {{ $tran->uSers[0]->name }}</td>
                                                                <td data-label="วัน-เวลา">{{ $tran->updated_at }}</td>
                                                                <td data-label="จำนวน">{{ $tran->total }}</td>
                                                                <td data-label="Ref_INV">{{ $tran->inv_ref }}</td>
                                                                <td data-label="INV_ID">
                                                                    @foreach($tran->inv_id['id'] as $tra)
                                                                    {{ $tra }}
                                                                    @endforeach
                                                                </td>
                                                                <td data-label="สถานะ" style="color:red">ยังไม่พร้อม</td>
                                                                <td data-label="Note">test</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        $('#mainn').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#t10s').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#transactions').DataTable();

    });
</script>

<script>
    $(document).ready(function() {
        $('#qrr').DataTable();
    });
</script>


<script type="text/javascript">
    var $btnDLtoExcel = $('#DLtoExcel');
    $btnDLtoExcel.on('click', function() {
        $("#mainn").excelexportjs({
            containerid: "tableData",
            datatype: 'table'
        });
    });
</script>


@endsection