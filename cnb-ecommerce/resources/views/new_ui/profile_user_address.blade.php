@extends('new_ui.layouts.front-end')
@section('style')
<style>
    .title_posit {
        text-align: left;
    }

    .o-btn-purple {
        border-radius: 8px;
        background-color: #f8eaf3;
        padding: 10px;
        color: #c75ba1;
        border: 0px;
        width: 100px;
    }

    .o-btn {
        border-radius: 8px;
        background-color: #226fff;
        padding: 10px;
        color: white;
        border: 0px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
    }

    .o-bg-box {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.16);
    }

    .img-res {
        width: 20px;
    }

    .card_res {
        width: 30px;
    }

    .text-res {
        font-size: 12px;
    }

    @media (min-width: 768px) {
        .title_posit {
            text-align: left;
        }
    }

    .round {
        position: relative;
    }

    .round label {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 50%;
        cursor: pointer;
        height: 28px;
        left: 0;
        position: absolute;
        top: 0;
        width: 28px;
    }

    .round label:after {
        border: 2px solid #fff;
        border-top: none;
        border-right: none;
        content: "";
        height: 6px;
        left: 7px;
        opacity: 0;
        position: absolute;
        top: 8px;
        transform: rotate(-45deg);
        width: 12px;
    }

    .round input[type="checkbox"] {
        visibility: hidden;
    }

    .round input[type="checkbox"]:checked+label {
        background-color: #66bb6a;
        border-color: #66bb6a;
    }

    .round input[type="checkbox"]:checked+label:after {
        opacity: 1;
    }
</style>
@endsection

<?php

use App\User;
//use App\Address;
$user = User::Where('id', Auth::user()->id)->first();
//dd($user->id)
//$address = Address::Where('user_id', Auth::user()->id)->get();
?>
@section('content')
<div class="container">
    <div class="col-12 px-0 d-flex flex-row">
        <div class="col-3 d-xl-block d-lg-none d-md-none d-none px-0">
            @include('includes._menu_left_user_profile')
        </div>
        <div class="col-xl-9 col-lg-12 col-md-12 col-12  my-4 px-0">
            <div class="col-12 px-1 py-3" style='border-bottom: 1px solid #d9d9d9;'>
                <div class='row'>
                    <div class="col-6">
                        <h3><strong>ที่อยู่</strong></h3>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 ml-auto" style='text-align : right;'>
                        <button class="o-btn" data-toggle="modal" data-target="#add_address">+ เพิ่มที่อยู่</button>
                    </div>
                </div>
            </div>
            @foreach($address_user as $address)
            <div class='col-lg-12 col-12 px-0'>
                <div class='col-lg-12 col-md-12 col-12 px-0 mt-4 o-bg-box'>
                    <div>
                        <div class="col-lg-12 col-md-12 col-sm-12 py-4">
                            <div class="row">
                                <div class="col-lg-12 px-0">
                                    <div class='row'>
                                        <div class='col-lg-6 col-md-6 col-12 d-flex flex-row'>
                                            <div class='col-lg-3 col-md-3 col-4'>
                                                <strong>ชื่อ - นามสกุล</strong>
                                            </div>
                                            <div class='col-lg-9 col-md-9 col-8 mb-4 pr-sm-0'>
                                                <input readonly type="text" value='{{$address->name}} {{$address->surname}}' class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ชื่อ - นามสกุล" style="background-color: #ededed; border: none;">
                                            </div>
                                        </div>
                                        <div class='col-lg-6 col-md-6 col-12 d-flex flex-row mb-4'>
                                            <div class='col-lg-4 col-md-5 col-5 offset-lg-0 offset-md-0 offset-4'>
                                                @if($address->status =='1')
                                                <a><button style='background-color: #ededed;color: black;border: 0px;cursor: context-menu;' class="o-btn form-control" data-toggle="modal" data-target="#">ค่าเริ่มต้น</button></a>
                                                @else
                                                <a href='address/setDefualt?id={{$address->id}}'><button style='background-color: #f8eaf3;color: #c75ba1;border: 0px;' class="o-btn form-control" data-toggle="modal" data-target="#">ตั้งค่าเริ่มต้น</button></a>
                                                @endif
                                            </div>
                                            <div class='col-lg-8 col-md-7 ' style='text-align : right'>
                                                <a href='#'>
                                                    <img class='img-res' data-toggle="modal" data-target="#edit_address{{$address->id}}" src="new_ui/img/user_icon_menu/edit-black.png" style="margin-right: 5px;">
                                                </a>
                                                <a href='address/delete?id={{$address->id}}'>
                                                    <img class='img-res' src="new_ui/img/user_icon_menu/bin-icon.svg">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class='col-lg-6 col-md-6 col-12 d-flex flex-row px-0'>
                                        <div class='col-lg-3 col-md-3 col-4'>
                                            <strong>เบอร์โทรศัพท์</strong>
                                        </div>
                                        <div class='col-lg-9 col-md-9 col-8 mb-4'>
                                            <input readonly type="text" value='{{$address->tel}}' class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="(+66) 081-441-9585" style="background-color: #ededed; border: none;">
                                        </div>
                                    </div>
                                    <div class='col-lg-6 col-md-6 col-12  d-flex flex-row px-0'>
                                        <div class='col-lg-3 col-md-3 col-4'>
                                            <strong>ที่อยู่</strong>
                                        </div>
                                        <div class='col-lg-9 col-md-9 col-8 mb-4'>
                                            <textarea readonly class="form-control" rows="3" style="background-color: #ededed; border: none;">{{$address->address1}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection


@section('script')
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
</script>
@endsection

<!-- Modal -->
<div class="modal fade" id="add_address" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-11' style='text-align:center'>
                    <strong>
                        <h4>เพิ่มที่อยู่</h4>
                    </strong>
                </div>
                <div class='col-1' style='text-align:right'>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            </div>
            <form action="/address/add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12 mb-3 mt-4 ">
                        <input required type="text" class="form-control rounded8px" id="name" name='name' placeholder="ชื่อ" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input required type="text" class="form-control rounded8px" id="surname" name='surname' placeholder="นามสกุล" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input required maxlength="10" type="text" class="form-control rounded8px" id="tel" name='tel' placeholder="เบอร์โทรศัพท์" onkeypress="return isNumberKey(event)" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input required type="text" class="form-control rounded8px" id="address1" name='address1' placeholder="บ้านเลขที่ , หมู่บ้าน , อาคาร , ซอย" style="background-color: #ededed; border: none;">
                    </div>
                    <div class='d-flex flex-row'>
                        <div class="col-6 mb-3">
                            <div class="form-group">
                                <select class="form-control rounded8px" style="background-color: #ededed; border: none;" id="city" name='city'>
                                    <option>จังหวัด</option>
                                    <option>นนทบุรี</option>
                                    <option>กรุงเทพ</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="form-group">
                                <select class="form-control rounded8px" style="background-color: #ededed; border: none;" id="district" name='district'>
                                    <option>อำเภอ</option>
                                    <option>เมือง</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class='d-flex flex-row'>
                        <div class="col-6 mb-3">
                            <div class="form-group">
                                <select class="form-control rounded8px" style="background-color: #ededed; border: none;" id="county" name='county'>
                                    <option>ตำบล</option>
                                    <option>บางเขน</option>
                                    <option>ตลาดขวัญ</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mb-3 ">
                            <input type="text" class="form-control rounded8px" id="zipcode" name='zipcode' aria-describedby="emailHelp" placeholder="CVV" style="background-color: #ededed; border: none;">
                        </div>
                    </div>
                    <div class='d-flex flex-row'>
                        <div class="col-1 mb-3">
                            <div class="round">
                                <input type="checkbox" id="checkbox" name='checkbox' />
                                <label for="checkbox" id='checkbox' name="checkbox"></label>
                            </div>
                        </div>
                        <div class="col-6 mb-3 ">
                            <strong>เลือกเป็นที่อยู่หลัก</strong>
                        </div>
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <div class='row'>
                            <div class="col-6 mb-3 text-center">
                                <button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
                            </div>
                            <div class="col-6 mb-3 text-center">
                                <button class="btn form-control text-white rounded8px" type="submit" onclick="myFunction()" style="background-color: #c75ba1;">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal -->

<!-- Edit Modal -->
@foreach($address_user as $address_modal)
<div class="modal fade" id="edit_address{{$address_modal->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-11' style='text-align:center'>
                    <strong>
                        <h4>แก้ไขที่อยู่</h4>
                    </strong>
                </div>
                <div class='col-1' style='text-align:right'>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            </div>
            <form action="/address/edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12 mb-3 mt-4 ">
                        <input type="hidden" class="form-control rounded8px" id="id" name='id' value='{{$address_modal->id}}' placeholder="ชื่อ" style="background-color: #ededed; border: none;">
                        <input type="text" class="form-control rounded8px" id="name" name='name' value='{{$address_modal->name}}' placeholder="ชื่อ" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input type="text" class="form-control rounded8px" id="surname" name='surname' value='{{$address_modal->surname}}' placeholder="นามสกุล" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input type="text" class="form-control rounded8px" id="tel" name='tel' value='{{$address_modal->tel}}' placeholder="เบอร์โทรศัพท์" onkeypress="return isNumberKey(event)" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input type="text" class="form-control rounded8px" id="address1" name='address1' value='{{$address_modal->address1}}' placeholder="บ้านเลขที่ , หมู่บ้าน , อาคาร , ซอย" style="background-color: #ededed; border: none;">
                    </div>
                    <div class='d-flex flex-row'>
                        <div class="col-6 mb-3">
                            <div class="form-group">
                                <select class="form-control rounded8px" style="background-color: #ededed; border: none;" id="city" name='city'>
                                    <option>จังหวัด</option>
                                    <option>นนทบุรี</option>
                                    <option>กรุงเทพ</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="form-group">
                                <select class="form-control rounded8px" style="background-color: #ededed; border: none;" id="district" name='district'>
                                    <option>อำเภอ</option>
                                    <option>เมือง</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class='d-flex flex-row'>
                        <div class="col-6 mb-3">
                            <div class="form-group">
                                <select class="form-control rounded8px" style="background-color: #ededed; border: none;" id="county" name='county'>
                                    <option>ตำบล</option>
                                    <option>บางเขน</option>
                                    <option>ตลาดขวัญ</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mb-3 ">
                            <input type="text" class="form-control rounded8px" id="zipcode" name='zipcode' aria-describedby="emailHelp" placeholder="CVV" style="background-color: #ededed; border: none;">
                        </div>
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <div class='row'>
                            <div class="col-6 mb-3 text-center">
                                <button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
                            </div>
                            <div class="col-6 mb-3 text-center">
                                <button class="btn form-control text-white rounded8px" type="submit" onclick="myFunction()" style="background-color: #c75ba1;">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END Edit Modal -->