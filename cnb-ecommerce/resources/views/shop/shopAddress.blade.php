@extends('layouts.shop')
@section('content')

<div class="container-fluid " style="width:100%; height:auto;margin-top:-40px !important;">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-9">
                    <h3>ที่อยู่</h3>
                    <h6>ตั้งค่าที่อยู่สำหรับการจัดส่งและที่อยู่สำหรับการนัดรับสินค้า</h6>
                </div>
                <div class="col-md-3 d-flex justify-content-end align-items-center">
                    <input type="submit" id="btn-add" name="submit" value="+ เพิ่มที่อยู่" data-toggle="modal" data-target="#add_address">
                </div>
            </div>
        </div>
    






        <!-- Check status 2 only -->
        @foreach($address->where('status_address','=','2') as $key=>$add)
        <div class="col-12">
            <div class="row mt-2">
                <div class="card w-100">
                    <div class="card-header">
                        <h4>ที่อยู่ร้านค้า</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 d-flex flex-row">
                            <div style="width:60px;">
                                <img src="/img/placeholder.png">
                            </div>
                            <div style="width:300px;">
                                <label>ชื่อ-นามสกุล</label><br>
                                <label>หมายเลขโทรศัพท์</label><br>
                                <label>ที่อยู่</label>
                            </div>
                            <div style="width:300px;">
                                <label><strong>{{ $add->name }} {{ $add->surname }}</strong></label><br>
                                <label><strong>{{ $add->tel }}</strong></label><br>
                                <label></label><strong>{{ $add->address1 }} {{ $add->address2 }} {{ $add->county }} {{ $add->district }} {{ $add->city }} {{ $add->zipcode }} {{ $add->country }}</strong></label>
                            </div>
                            <div class="ml-auto text-right">
                                <a href="#" style="color:blue ;text-decoration: underline;" data-toggle="modal" data-target="#edit_address{{ $add->id}}">แก้ไข</a><br>
                                <a href="/shop/address/delete/?id={{$add->id}}" style="color:blue ;text-decoration: underline;">ลบ</a><br>
                                <a href="/shop/address/setBackShopAddress/?id={{$add->id}}" style="color:blue ;text-decoration: underline;">เอาออก</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Check status 2 only -->




        <!-- Normal Addres -->
        <div class="col-12">
            <div class="row mt-2">
                <div class="card w-100">
                    <div class="card-header">
                        <h4>ที่อยู่ของท่าน</h4>
                    </div>
                    @foreach($address as $add)
                    @if($add->status_address == 0 || $add->status_address == 1)
                    <div class="card-body">
                        <div class="col-md-12 d-flex flex-row">
                            <div style="width:60px;">
                                <img src="/img/placeholder.png">
                            </div>
                            <div style="width:300px;">
                                <label>ชื่อ-นามสกุล</label><br>
                                <label>หมายเลขโทรศัพท์</label><br>
                                <label>ที่อยู่</label>
                            </div>
                            <div style="width:300px;">
                                <label><strong>{{ $add->name }} {{ $add->surname }}</strong></label><br>
                                <label><strong>{{ $add->tel }}</strong></label><br>
                                <label></label><strong>{{ $add->address1 }} {{ $add->address2 }} {{ $add->county }} {{ $add->district }} {{ $add->city }} {{ $add->zipcode }} {{ $add->country }}</strong></label>
                            </div>
                            <div class="ml-auto text-right">
                                <a href="#" style="color:blue ;text-decoration: underline;" data-toggle="modal" data-target="#edit_address{{ $add->id}}">แก้ไข</a><br>
                                <a href="/shop/address/delete/?id={{$add->id}}" style="color:blue ;text-decoration: underline;">ลบ</a><br>
                                <a href="/shop/address/setShopAddress/?id={{$add->id}}" style="color:blue ;text-decoration: underline;">ตั้งค่าเป็นที่สถานที่จัดส่ง</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Normal Addres -->



    </div>












    <!-- ----------------- Modal Create Address -------------- -->
    <div class="modal fade" id="add_address" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p style=" font-size: 30px; font-family: DB Heavent-Light; ">เพิ่มที่อยู่ใหม่</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('shop-address-add')}}" method="POST" enctype="multipart/form-data" id="AddAddress111" autocomplete="off">


                        @csrf
                        <div class="col-12 justify-content-start">
                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ชื่อ-นามสกุล</label><br>
                                    <input id="name_input" type="text" name="name" placeholder="ชื่อ">
                                    <input id="surname_input" type="text" name="surname" placeholder="นามสกุล">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">เบอร์โทรศัพท์</label><br>
                                    <input class="dataInput" type="tel" name="tel" placeholder="เบอร์โทรศัพท์">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ที่อยู่<small class="text-danger">*</small></label><br>
                                    <input class="dataInput" type="text" name="address1" placeholder="ที่อยู่">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ที่อยู่ (เพิ่มเติม)</label><br>
                                    <input class="dataInput" type="text" name="address2" placeholder="ที่อยู่ (เพิ่มเติม)">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ตำบล / เเขวง</label><br>
                                    <input class="dataInput" type="text" name="county" id="county" placeholder="ตำบล / แขวง">
                                </div>
                            </div>



                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">อำเภอ/เขต</label><br>
                                    <input class="dataInput" type="text" name="district" id="district" placeholder="อำเภอ / เขต">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">จังหวัด</label><br>
                                    <input class="dataInput" type="text" name="city" id="city" placeholder="จังหวัด">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">รหัสไปรษณีย์<small class="text-danger">*</small></label><br>
                                    <input class="dataInput" type="number" name="zipcode" id="zipcode" placeholder="รหัสไปรษณีย์">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ประเทศ</label><br>
                                    <input class="dataInput" type="text" name="country" placeholder="ประเทศ">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col">
                                    <!-- status -->
                                    <input class="dataInput" type="hidden" name="status" value=0>
                                </div>
                            </div>


                            <div class="row form-group ">
                                <div class="col d-flex justify-content-center">
                                    <input class="form-control" type="submit" id="btn_add_address" name="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------- Modal Create Address -------------- -->





    <!-- ---------------- Modal Edit Address ----------------- -->
    @foreach($address as $addModal)
    <div class="modal fade" tabindex="-5" id="edit_address{{$addModal->id}}" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p style=" font-size: 30px; font-family: DB Heavent-Light; ">แก้ไขสถานที่</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('shop-address-edit')}}" method="POST" enctype="multipart/form-data" id="editAddress111">


                        @csrf

                        <div class="col-12 justify-content-start">
                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ชื่อ-นามสกุล</label><br>
                                    <input id="name_input" type="text" name="name" placeholder="ชื่อ" value="{{ $addModal->name }}">
                                    <input id="surname_input" type="text" name="surname" placeholder="นามสกุล" value="{{ $addModal->surname }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">เบอร์โทรศัพท์</label><br>
                                    <input class="dataInput" type="tel" name="tel" placeholder="เบอร์โทรศัพท์" value="{{ $addModal->tel }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ที่อยู่<small class="text-danger">*</small></label><br>
                                    <input class="dataInput" type="text" name="address1" placeholder="ที่อยู่" value="{{ $addModal->address1 }}">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ที่อยู่ (เพิ่มเติม)</label><br>
                                    <input class="dataInput" type="text" name="address2" placeholder="ที่อยู่ (เพิ่มเติม)" value="{{ $addModal->address2 }}">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ตำบล / เเขวง</label><br>
                                    <input class="dataInput" type="text" name="county" placeholder="ตำบล / แขวง" value="{{ $addModal->county }}">
                                </div>
                            </div>



                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">อำเภอ/เขต</label><br>
                                    <input class="dataInput" type="text" name="district" placeholder="อำเภอ / เขต" value="{{ $addModal->district }}">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">จังหวัด</label><br>
                                    <input class="dataInput" type="text" name="city" placeholder="จังหวัด" value="{{ $addModal->city }}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">รหัสไปรษณีย์<small class="text-danger">*</small></label><br>
                                    <input class="dataInput" type="text" name="zipcode" placeholder="รหัสไปรษณีย์" value="{{ $addModal->zipcode }}">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col p-0">
                                    <label id="name_modal">ประเทศ</label><br>
                                    <input class="dataInput" type="text" name="country" placeholder="ประเทศ" value="{{ $addModal->country }}">
                                </div>
                            </div>

                            <div class="row form-group ">
                                <div class="col d-flex justify-content-center">
                                    <input class="form-control" type="submit" id="btn_add_address" name="submit">
                                    <input type="hidden" name="id" value="{{$addModal->id}}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- ---------------- Modal Edit Address ----------------- -->





    @stop