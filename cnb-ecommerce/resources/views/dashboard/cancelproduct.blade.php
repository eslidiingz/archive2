@extends('layouts.dashboard')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<style>
    .box {
        height: calc(100vh - 260px);
    }

    .top {
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
                            <div class="col-12 p-0 ml-3">
                                <h2 style="padding: 0;margin: 0;"><b>ยกเลิกการซื้อสินค้า</b></h2>
                                <br>
                            </div>
                        </div>
                        <div class="col-12 justify-content-center"><br>
                            <ul class="nav nav-tabs">
                                <li class="nav-item" style="font-size: 18px;"><a
                                        class="nav-link active bold black pt-2 pl-2" data-toggle="tab"
                                        href="#reportCancel">แจ้งยกเลิก</a></li>
                                <li class="nav-item" style="font-size: 18px;"><a class="nav-link bold black pt-2 pl-2"
                                        data-toggle="tab" href="#canceled">ยกเลิกสำเร็จแล้ว</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="row justify-content-center tab-pane fade show active" id="reportCancel">
                                    <div class="container-fluid table-responsive box">
                                        <div class="card" style="border: none;">
                                            <div class="card-body m-2 p-0">
                                                <div class="container-fluid">
                                                    <table class="table table-striped" id="cancel_transfer">
                                                        <thead>
                                                            <tr style="text-align: center;">
                                                                <th>#</th>
                                                                <th>ผู้ใช้งาน</th>
                                                                <th>วัน-เวลา</th>
                                                                <th>inv_ref</th>
                                                                <th>inv_id</th>
                                                                <th>ยอดสุทธิ</th>
                                                                <th>รูป</th>
                                                                <th>จัดการ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($cancels6 as $key=>$cancel6)
                                                            <tr style="text-align: center;">
                                                                <td data-label="#">{{ $key+1 }}</td>
                                                                <td data-label="ผู้ใช้งาน">
                                                                    {{ $cancel6->users[0]->name }}
                                                                    {{ $cancel6->users[0]->surname }}</td>
                                                                <td data-label="วัน-เวลา" style="width:200px">
                                                                    {{ $cancel6->updated_at }}</td>
                                                                <td data-label="inv_ref">{{ $cancel6->inv_ref }}</td>
                                                                <td data-label="inv_id">{{ $cancel6->id }}</td>
                                                                <td data-label="ยอดสุทธิ" style="width:100px">
                                                                    {{ $cancel6->total }}</td>
                                                                <td data-label="รูป">{{ $cancel6->transfer_img }}</td>
                                                                <td data-label="จัดการ">

                                                                    {{-- {{ dd($invscancel) }} --}}
                                                                    {{-- {{dd($invscancel[$key]->inv_ref)}} --}}
                                                                    <button class="btn btn-primary" data-toggle="modal"
                                                                        data-target="#tap"
                                                                        data-target-invscancel="{{$invscancel[$key]->inv_ref}}"
                                                                        data-target-name="{{$invscancel[$key]->name}}"
                                                                        data-target-namesur="{{$invscancel[$key]->surname}}"
                                                                        data-target-transfer_img="{{$invscancel[$key]->transfer_img}}"
                                                                        data-target-shops="{{$invscancel[$key]->description}}"
                                                                        {{-- data-target-products="{{$invscancel[$key]->inv_products->}}" --}}
                                                                        data-target-note="{{$invscancel[$key]->note}}"
                                                                        >ดูรายละเอียด</button>
                                                                </td>
                                                            </tr>
                                                            {{-- <div class="modal fade" id="tap" tabindex="-1" aria-labelledby="tap_Label" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <h5 class="modal-title" id="tap_Label">  <b>CASE</b>....</h5></h5>
                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                      </button>
                                                                    </div> --}}
                                                            <div class="modal fade" id="tap" data-backdrop="static"
                                                                data-keyboard="false" tabindex="-1"
                                                                aria-labelledby="tapLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="tapLabel">
                                                                                <b>CASE</b></h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        {{-- <div class="modal-dialog modal-dialog-scrollable"> --}}
                                                                        <div class="modal-body">
                                                                            <div class="container-fulid">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-xl-8 col-lg-8 col-md-6">
                                                                                        <h5><b>INV</b>
                                                                                            
                                                                                            <div id="inv_ref_ad">
                                                                                                {{-- invs ref --}}
                                                                                            </div>
                                                                                        </h5>

                                                                                    </div>
                                                                                    <div
                                                                                        class="col-xl-4 col-lg-4 col-md-6">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-2">
                                                                                                    <h4><b>ชื่อ</b></h4> 
                                                                                                    </div>
                                                                                                    <div class="col-5 pl-5">
                                                                                                        <h5 id="username"></h5>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <h5 id="surname"></h5>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <h5> <b
                                                                                                        class="pr-3">เบอร์ติดต่อ</b>0899999999
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <h5><b>รายละเอียดสินค้า</b>
                                                                                                    <div id="product_ad">
                                                                                                        {{-- product_ad --}}
                                                                                                    </div>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <p></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <h5><b>รายละเอียดเคส</b>
                                                                                                    <div id="note_ad">
                                                                                                        {{-- product_ad --}}
                                                                                                    </div>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        {{-- <div class="row">
                                                                                            <div class="col-12">
                                                                                                <p>Basics by sita | A224
                                                                                                    - One Button Box by
                                                                                                    sita
                                                                                                    Button....Basics by
                                                                                                    sita | A224 - One
                                                                                                    Button Box by sita
                                                                                                    Button....Basics by
                                                                                                    sita </p>
                                                                                            </div>
                                                                                        </div> --}}
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <h5><b>รูป</b></h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="row mt-2 text-center">
                                                                                            <img
                                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                                                <img id="transfer_imgshow" style="width:200px"
                                                                                                class="img-thumbnail">
                                                                                                    {{-- transfer_imgshow --}}
                                                                                               
                                                                                                {{-- <img src="{{$cancel6->transfer_img}}"
                                                                                                    style="width:200px"
                                                                                                    class="img-thumbnail"> --}}
                                                                                            </div>
                                                                                            {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                                                    <img src="new_ui/img/user_icon_menu/user-seller.png"style="width:200px"class="img-thumbnail">
                                                                                                </div>
                                                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                                                    <img src="new_ui/img/user_icon_menu/user-seller.png"style="width:200px"class="img-thumbnail">
                                                                                                </div>
                                                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                                                    <img src="new_ui/img/user_icon_menu/user-seller.png"style="width:200px"class="img-thumbnail">
                                                                                                </div> --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <h5><b>รายละเอียดร้าน</b>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <p id="shopss">
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-xl-6 col-lg-6 col-md-6 col-sm-12 border-left">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <h5><b>Note Admin</b>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <p>Basics by sita | A224
                                                                                                    - One Button Box by
                                                                                                    sita
                                                                                                    Button....Basics by
                                                                                                    sita |</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        {{-- </div> --}}
                                                                        <div class="modal-footer">
                                                                            <a type="button" class="btn btn-link"
                                                                                style="background-color:#c75ba1;color:#fff">ตกลง</a>
                                                                            <button type="button" id="cl"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">ยกเลิก</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center tab-pane fade" id="canceled">
                                    <div class="container-fluid table-responsive box">
                                        <div class="card" style="border: none;">
                                            <div class="card-body m-2 p-0">
                                                <table class="table table-striped " id="canceled_table">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <th>#</th>
                                                            <th>ผู้ใช้งาน</th>
                                                            <th>วัน-เวลา</th>
                                                            <th>inv_ref</th>
                                                            <th>inv_id</th>
                                                            <th>ยอดสุทธิ</th>
                                                            <th>รูป</th>
                                                            <th>จัดการ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($cancels99 as $key=>$cancel99)
                                                        <tr style="text-align: center;">
                                                            <td data-label="#">{{ $key+1 }}</td>
                                                            <td data-label="ผู้ใช้งาน">{{ $cancel99->users[0]->name }}
                                                                {{ $cancel99->users[0]->surname }}</td>
                                                            <td data-label="วัน-เวลา" style="width:200px">
                                                                {{ $cancel99->updated_at }}</td>
                                                            <td data-label="inv_ref">{{ $cancel99->inv_ref }}</td>
                                                            <td data-label="inv_id">{{ $cancel99->id }}</td>
                                                            <td data-label="ยอดสุทธิ" style="width:100px">
                                                                {{ $cancel99->total }}</td>
                                                            <td data-label="รูป">{{ $cancel99->transfer_img }}</td>
                                                            <td data-label="จัดการ">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Function</button>
                                                            </td>
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
@endsection


@section('script')

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>



<script>
    $(document).ready(function() {
        $('#cancel_transfer').dataTable();

        $('#canceled_table').dataTable();
        
        $(document).on("show.bs.modal","#tap", function (e) {
            
            var invscl = $(e.relatedTarget).data('target-invscancel');
            var nameuser = $(e.relatedTarget).data('target-name');
            var surname = $(e.relatedTarget).data('target-namesur');
            var shops = $(e.relatedTarget).data('target-shops');
            // var product = $(e.relatedTarget).data('target-products');
            var notee = $(e.relatedTarget).data('target-note');
            var img = $(e.relatedTarget).data('target-transfer_img');
            console.log(invscl);
            // alert("ff")

           
            $('#inv_ref_ad').text(""+invscl+"");
            $('#username').text(""+nameuser+"");
            $('#surname').text(""+surname+"");
            $('#shopss').text(""+shops+"");
            // $('#product_ad').text(""+product+"");
            $('#note_ad').text(""+notee+"");
            $('#transfer_imgshow').text(""+img+"");
            // $('#shop_id').val(shop_id);
            // $('#user_id').val(user_id);
            // $('#product_id').val(product_id);
            // $('#date').val(date);
            // $('#status').val(status);
            $( "#cl" ).click(function() {
                $('#add-modal').modal('hide')
            });
					// $('#success-modal').modal('show')
        });
        
    });
    
    
</script>



@endsection