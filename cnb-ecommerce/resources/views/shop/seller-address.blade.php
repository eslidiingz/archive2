@extends('layouts.shop')
@section('content')
<style>
    .input_custom_bg{
        background-color: #ededed !important;
    }
    .round {
        position: relative;
    }

    .round label {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 50%;
        cursor: pointer;
        height: 24px;
        left: 0;
        position: absolute;
        top: 0;
        width: 24px;
    }

    .round label:after {
        border: 2px solid #fff;
        border-top: none;
        border-right: none;
        content: "";
        height: 6px;
        left: 6px;
        opacity: 0;
        position: absolute;
        top: 6px;
        transform: rotate(-45deg);
        width: 10px;
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
<div class="row" style="padding-bottom: 50px;">
    <div class="col-12 px-1 pt-4 d-flex flex-row">
        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-5">
            <h3><strong>ที่อยู่</strong></h3>
            <p>ตั้งค่าที่อยู่ของร้านค้า</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-2" style='text-align : right;'>
            <button class="btn o-btn" data-toggle="modal" data-target="#add_address">+ เพิ่มที่อยู่ในการจัดส่ง</button>
        </div>
    </div>

<?php $modal_count = 0; ?>
    @foreach($address->where('status_address','=','2') as $key=>$add)
    <div class='col-12 modal_chk'>
        <h3 class="mb-0 mt-3 p-2">ที่อยู่ร้านค้า</h3>
        <hr class="w-100 mt-0">
        @php
            $addressDefault = $add->address1.' '.$add->address2.' '.$add->county.' '.$add->district.' '.$add->city.' '.$add->zipcode.' '.$add->country;
        @endphp
        <div class='row mx-0' style='background-color: white;padding-bottom : 20px;'>
            <div class='col-lg-10 col-md-10 col-12 d-flex flex-row pt-4'>
                    <div>
                        <img src="/new_ui/img/bank/placeholder.png" style="width: 20px;" class="mr-3 rounded8px" alt="...">
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-12">
                                ชื่อนามสกุล
                            </div>
                            <div class="col-lg-9 col-md-8 col-12 strong-text">
                                <strong>{{ $add->name }} {{ $add->surname }}</strong>
                            </div>
                            <div class="col-lg-3 col-md-4 col-12">
                                หมายเลขโทรศัพท์
                            </div>
                            <div class="col-lg-9 col-md-8 col-12 strong-text">
                                <strong>{{ $add->tel }}</strong>
                            </div>
                            <div class="col-lg-3 col-md-4 col-12">
                                ที่อยู่
                            </div>
                            <div class="col-lg-9 col-md-8 col-12 strong-text">
                            <strong>{{ $addressDefault }}</strong>
                            </div>
                        </div>
                    </div>

            </div>
            <div class='col-lg-2 col-md-2 col-12 pt-4 dropup' style='text-align : right'>
                <button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#edit_address{{ $add->id}}">แก้ไข</a>
                    <a href="/seller-address/delete/?id={{$add->id}}" class="dropdown-item" type="button">ลบ</a>
                    <a href="/seller-address/setBackAddressSeller/?id={{$add->id}}" class="dropdown-item" type="button">นำออก</a>

                </div>
            </div>
        </div>
    </div>
    @endforeach



    <div class='col-12'>
        <h3 class="mb-0 mt-3 p-2">ที่อยู่ของฉัน</h3>
        <hr class="w-100 mt-0">
        @foreach($address as $add)
        @if($add->status_address == 0 || $add->status_address == 1)
        <div class='row mx-0 modal_chk' style='background-color: white;padding-bottom : 20px;'>
            <div class='col-lg-10 col-md-10 col-12 d-flex flex-row pt-4'>
                <div><img src="/new_ui/img/bank/placeholder.png" style="width: 20px;" class="mr-3 rounded8px" alt="...">
                </div>
                @php
                    $addressNew =  $add->address1.' '.$add->address2.' '.$add->county.' '.$add->district.' '.$add->city.' '.$add->zipcode.' '.$add->country;
                @endphp

                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-12">
                                ชื่อนามสกุล
                            </div>
                            <div class="col-lg-9 col-md-8 col-12 strong-text">
                                <strong>{{ $add->name }} {{ $add->surname }}</strong>
                            </div>
                            <div class="col-lg-3 col-md-4 col-12">
                                หมายเลขโทรศัพท์
                            </div>
                            <div class="col-lg-9 col-md-8 col-12 strong-text">
                                <strong>{{ $add->tel }}</strong>
                            </div>
                            <div class="col-lg-3 col-md-4 col-12">
                                ที่อยู่
                            </div>
                            <div class="col-lg-9 col-md-8 col-12 strong-text">
                            <strong>{{ $addressNew }}</strong>
                            </div>
                        </div>
                    </div>
            </div>
            <div class='col-lg-2 col-md-2 col-12 pt-4 dropup' style='text-align : right'>
                <button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#edit_address{{ $add->id}}">แก้ไข</a>
                    <a href="/seller-address/delete/?id={{$add->id}}" class="dropdown-item" type="button">ลบ</a>
                    <a href="/seller-address/setAddressSeller/?id={{$add->id}}" class="dropdown-item" type="button">ที่ตั้งร้านค้า</a>

                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>


</div>






<!-- Edit Modal -->
@foreach($address as $addModal)
<?php ++$modal_count; ?>
<div class="modal fade" id="edit_address{{ $addModal->id }}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header pt-4" style='text-align : center'>
                <div class='col-12 position-relative' style='text-align:center'>
                    <strong>
                        <h6 class="mb-0"><strong>แก้ไขที่อยู่ในการจัดส่ง</strong></h6>
                    </strong>
                    <button type="button" class="close position-absolute" style="right: 4px; top: -8px;" data-dismiss="modal">&times;</button>
                </div>
            </div>
            <form action="/seller-address/edit" method="POST" enctype="multipart/form-data" class="demo" id="demo1">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-row">
                                <div class="col-6">
                                    <input type="text" class="form-control rounded8px" name="name_edit" value="{{$addModal->name}}" placeholder="ชื่อ-นามสกุล" id="ชื่อ" style="background-color: #ededed; border: none;">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control rounded8px" name="surname_edit" value="{{$addModal->surname}}" placeholder="นามสกุล" id="นามสกุล" style="background-color: #ededed; border: none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <!-- <div class="input-group-prepend" style='background-color: #ededed;'>
                                    <button style='color: black;' class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>+66</strong></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">+67</a>
                                        <a class="dropdown-item" href="#">+68</a>
                                        <a class="dropdown-item" href="#">+69</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">+70</a>
                                    </div>
                                </div> -->
                                <input type="text" class="form-control" id="telephone" name="tel_edit" value="{{$addModal->tel}}" onkeypress="return isNumberKey(event)" placeholder="เบอร์โทรศัพท์" style='background-color: #ededed;  border: none;'>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control rounded8px" id="address1" name='address1_edit' value='{{$addModal->address1}}' placeholder="บ้านเลขที่ , หมู่บ้าน , อาคาร , ซอย" style="background-color: #ededed; border: none;">
                        </div>
                        {{-- <div class="col-12 mb-3 mt-4 ">
                            <input type="text" class="form-control rounded8px" id="address2_edit" name='address2_edit' value='{{$addModal->address2}}' placeholder="ที่อยู่เพิ่มเติม" style="background-color: #ededed; border: none;">
                        </div> --}}
                        <div class="col-12">
                            <div class='form-row'>
                                <div class="col-6  ">
                                    <input required autocomplete="nope" value='{{$addModal->zipcode}}' class="form-control rounded8px input_custom_bg" style="background-color: #c1bdbd;border : 0px; " type="text" id="zipcode_shop{{$modal_count}}" name='zipcode_edit' placeholder="รหัสไปรษณีย์">
                                </div>
                                <div class="col-6 ">
                                    <div class="form-group">
                                        <input required autocomplete="nope" value='{{$addModal->district}}' class="form-control rounded8px input_custom_bg" style="background-color: #c1bdbd; border : 0px; " type="text" id="district_shop{{$modal_count}}" name='district_edit' placeholder="ตำบล">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class='form-row'>
                                <div class="col-6 ">
                                    <div class="form-group">
                                        <input required autocomplete="nope" value='{{$addModal->county}}' class="form-control rounded8px input_custom_bg" style="background-color: #c1bdbd; border : 0px; " type="text" id="county_shop{{$modal_count}}" name='county_edit' placeholder="อำเภอ">
                                    </div>
                                </div>
                                <div class="col-6 ">
                                    <div class="form-group">
                                        <input required autocomplete="nope" value='{{$addModal->city}}' class="form-control rounded8px input_custom_bg" style="background-color: #c1bdbd;border : 0px; " type="text" id="province_shop{{$modal_count}}" name='city_edit' placeholder="จังหวัด">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class='form-row'>
                                <div class="col-6 mb-3 text-center">
                                    <button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
                                </div>
                                <div class="col-6 mb-3 text-center">
                                    <input type="hidden" name="id" value="{{$addModal->id}}">
                                    <button class="btn btn-save form-control text-white rounded8px" onclick="myFunction()" >บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- Edit Modal -->



{{-- Modal Add Address Button --}}
<div class="modal fade" id="add_address" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pt-4">
                <div class='col-12 position-relative' style='text-align:center'>
                    <strong>
                        <h6 class="mb-0"><strong>เพิ่มที่อยู่ในการจัดส่ง</strong></h6>
                    </strong>
                    <button type="button" class="close position-absolute" style="right: 4px; top: -8px;"
                        data-dismiss="modal">&times;</button>
                </div>
            </div>
            {{-- <form action="address/add" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-row">
                            <div class="col-6 mb-3 ">
                                <input required type="text" class="form-control rounded8px" id="name" name='name' placeholder="ชื่อ"
                                    style="background-color: #ededed; border: none;">
                            </div>
                            <div class="col-6 mb-3 ">
                                <input required type="text" class="form-control rounded8px" id="surname" name="surname"
                                    placeholder="นามสกุล" style="background-color: #ededed; border: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3 ">
                        <input required maxlength="10" type="text" class="form-control rounded8px" id="tel" name='tel'
                            placeholder="เบอร์โทรศัพท์" onkeypress="return isNumberKey(event)"
                            style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 ">
                        <input required type="text" class="form-control rounded8px" id="address1" name='address1'
                            placeholder="บ้านเลขที่ , หมู่บ้าน , อาคาร , ซอย"
                            style="background-color: #ededed; border: none;">
                    </div>
                    {{-- <div class="col-12 mb-3 ">
                            <input type="text" class="form-control rounded8px" id="address2" name='address2'
                                placeholder="ที่อยู่เพิ่มเติม" style="background-color: #ededed; border: none;">
                        </div> --}}
                    <div class="col-12 ">
                        <div class='form-row'>
                            <div class="col-6 ">
                                <input required autocomplete="nope" maxlength="5" class="form-control rounded8px input_custom_bg"
                                    style="background-color: #c1bdbd;border : 0px; " type="text" id="zipcode" name='zipcode'
                                    placeholder="รหัสไปรษณีย์">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input required autocomplete="nope" class="form-control rounded8px input_custom_bg"
                                        style="background-color: #c1bdbd;border : 0px; " type="text" id="district"
                                        name='district' placeholder="ตำบล/แขวง">

                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class="col-6">
                                <div class="form-group">
                                    <input required autocomplete="nope" class="form-control rounded8px input_custom_bg"
                                        style="background-color: #c1bdbd;border : 0px; " type="text" id="county"
                                        name='county' placeholder="อำเภอ/เขต">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input required autocomplete="nope" class="form-control rounded8px input_custom_bg"
                                        style="background-color: #c1bdbd;border : 0px; " type="text" id="city" name='city'
                                        placeholder="จังหวัด">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-6 mb-3 ">
                                <input required autocomplete="nope" class="form-control rounded8px"
                                    style="background-color: #c1bdbd;border : 0px; " type="text" id="zipcode" name='zipcode'
                                    placeholder="รหัสไปรษณีย์">
                            </div> --}}
                    </div>
                    @if(count($address) <= 0 && isset($address)) <div class='d-flex flex-row'>
                        <div class="col-1 mb-3">
                            <div class="round">
                                <input type="checkbox" id="checkbox" name='checkbox' checked />
                                <label for="checkbox" id='checkbox' name="checkbox"></label>
                            </div>
                        </div>
                        <div class="col-11 mb-3 ">
                            <strong>เลือกเป็นที่อยู่หลัก</strong>
                        </div>

                        @else

                        <div class="col-11 mb-3">
                            <div class="round">
                                <input type="checkbox" id="checkbox" name='checkbox' checked />
                                <label for="checkbox" id='checkbox' name="checkbox"></label>
                            </div>
                        </div>
                        <div class="col-6 mb-3 ">
                            <strong>เลือกเป็นที่อยู่หลัก</strong>
                        </div>
                        @endif
                </div>

            </div>

            <div class="col-12 ">
                <div class='form-row'>
                    <div class="col-6 mb-3 text-center">
                        <button type="button" class="btn form-control text-white rounded8px btn_cancle_address"
                            data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
                    </div>
                    <div class="col-6 mb-3 text-center">
                        <button class="btn btn-save form-control text-white rounded8px submit_address" type="submit">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
{{-- add Address Button --}}

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript"
    src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript"
    src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

<link rel="stylesheet"
    href="/new_ui/plugins/thailand/jquery.Thailand.min.css">
<script type="text/javascript"
    src="/new_ui/plugins/thailand/jquery.Thailand.min.js"></script>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    $.Thailand({
        database: '/js/jquery.Thailand.js/database/db.json', // path หรือ url ไปยัง database

        $district: $('#district'), // input ของตำบล
        $amphoe: $('#county'), // input ของอำเภอ
        $province: $('#city'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });

    $(document).ready(function() {
        var chk_max = $('.modal_chk').length;
        for ($i = 1; $i <= chk_max; $i++) {
            var disname = '#district_shop' + $i;
            var amphoename = '#county_shop' + $i;
            var province = '#province_shop' + $i;
            var zipcode = '#zipcode_shop' + $i;
            $.Thailand({
                database: '/js/jquery.Thailand.js/database/db.json', // path หรือ url ไปยัง database
                $district: $(disname), // input ของตำบล
                $amphoe: $(amphoename), // input ของอำเภอ
                $province: $(province), // input ของจังหวัด
                $zipcode: $(zipcode), // input ของรหัสไปรษณีย์
            });
        }
    });
</script>

<script>
    $('.submit_address').on('click',function(){

        var user_id = $('input[name="user_id"]').val();
        var surname = $('input#surname').val();
        var name = $('input#name').val();
        var tel = $('input[name="tel"]').val();
        var address1 = $('input[name="address1"]').val();
        var district = $('input[name="district"]').val();
        var county = $('input[name="county"]').val();
        var city = $('input[name="city"]').val();
        var zipcode = $('input[name="zipcode"]').val();
        var status = $('input[name="checkbox"]').prop('checked');

        // console.log(name);
        // console.log(surname);
        $('input').removeClass('border-danger');


        $.ajax({
            url: '/seller-address/add',
            type: 'POST',
            data: {
                user_id: user_id,
                name: name,
                surname: surname,
                tel: tel,
                address1: address1,
                district: district,
                county: county,
                city: city,
                zipcode: zipcode,
                status: (status ? 2 : 0 ),
                _token: '{{ csrf_token() }}',
            },
            success:function(data){
                console.log(data);

                  if($.trim(data.status)=='true'){
                    Swal.fire({
                      icon: 'success',
                      title: 'สำเร็จ',
                      text: 'เพิ่มที่อยู่การจัดส่งเรียบร้อยแล้ว',
                      showConfirmButton: false,
                      timer: 1500
                    });
                    setTimeout(function(){
                        location.reload();
                    }, 1500);
                  }
                    $('.modal').modal('hide');


            },error:function(data){
                   json = JSON.parse(data.responseText);
                    console.log(json['error']);
                    var loop = 0;
                    $.each(json['error'], function (index, value) {
                        // focus เฉพาะ Input แรก เท่านั้น
                        if (loop == 0) {
                            $('input#' + index).focus();
                            loop++;
                        }
                        $('input#' + index).attr('placeholder', value).addClass('border').addClass('border-danger').val('');

                    });
            }
        });
    });
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

<link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

@endsection
