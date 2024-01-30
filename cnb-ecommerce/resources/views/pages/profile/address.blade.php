@extends('layouts.profile')
@section('style')
<style>
    .title_posit {
        text-align: left;
    }
    .nav_custom_cat{
        display: none !important;
    }
    /* .o-btn-purple {
        border-radius: 8px;
        background-color: #f8eaf3;
        padding: 10px;
        color: #7BCFDD;
        border: 0px;
        width: 100px;
    } */

    /* .o-btn {
        border-radius: 8px;
        background-color: #7BCFDD;
        padding: 10px;
        color: white;
        border: 0px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
    } */

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

        .box_mg {
            margin-left: 0px;
        }
    }
    .footer-area {
        display: none;
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

    .footer-area{
        display: none;
    }

    .input_custom_bg{
        background-color: #ededed !important;
    }

    @media (min-width: 1400px) {
        .box_mg {
            margin-left: 0px;
        }
    }
    .cate-all{
        display: none !important;
    }


</style>
@endsection

<?php
$modal_count = 0;
//dd($user->id)
//$address = Address::Where('user_id', Auth::user()->id)->get();
?>
@section('content')

<script type="text/javascript"
    src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript"
    src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

<link rel="stylesheet"
    href="/new_ui/plugins/thailand/jquery.Thailand.min.css">
<script type="text/javascript"
    src="/new_ui/plugins/thailand/jquery.Thailand.min.js"></script>


{{-- Modal Add Address Button --}}
<div class="modal fade" id="add_address" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pt-4">
                <div class='col-12 position-relative' style='text-align:center;'>
                    <strong>
                        <h6 class="mb-0"><strong>{{ trans('message.add_address') }}</strong></h6>
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
                            <div class="col-6 mb-3">
                                <input required type="text" class="form-control rounded8px" id="name" name='name' placeholder="{{ trans('message.name') }}"
                                    style="background-color: #ededed; border: none;">
                            </div>
                            <div class="col-6 mb-3">
                                <input required type="text" class="form-control rounded8px" id="surname" name="surname"
                                    placeholder="{{ trans('message.surname') }}" style="background-color: #ededed; border: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <input required maxlength="10" type="text" class="form-control rounded8px" id="tel" name='tel'
                            placeholder="เบอร์โทรศัพท์" onkeypress="return isNumberKey(event)"
                            style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3">
                        <input required type="text" class="form-control rounded8px" id="address1" name='address1'
                            placeholder="{{ trans('message.address_no_ex') }}"
                            style="background-color: #ededed; border: none;">
                    </div>
                    {{-- <div class="col-12 mb-3">
                            <input type="text" class="form-control rounded8px" id="address2" name='address2'
                                placeholder="{{ trans('message.addition_address') }}" style="background-color: #ededed; border: none;">
                        </div> --}}
                    <div class="col-12">
                        <div class='form-row'>
                            <div class="col-6 ">
                                <input required autocomplete="nope" maxlength="5" class="form-control rounded8px input_custom_bg"
                                    style="background-color: #c1bdbd;border : 0px; " type="text" id="zipcode" name='zipcode'
                                    placeholder="{{ trans('message.address_zipcode_ex') }}">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input required autocomplete="nope" class="form-control rounded8px input_custom_bg"
                                        style="background-color: #c1bdbd;border : 0px; " type="text" id="city" name='city'
                                        placeholder="{{ trans('message.address_province_ex') }}">
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class="col-6">
                                <div class="form-group">
                                    <input required autocomplete="nope" class="form-control rounded8px input_custom_bg"
                                        style="background-color: #c1bdbd;border : 0px; " type="text" id="county"
                                        name='county' placeholder="{{ trans('message.address_amphur_ex') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input required autocomplete="nope" class="form-control rounded8px input_custom_bg"
                                        style="background-color: #c1bdbd;border : 0px; " type="text" id="district"
                                        name='district' placeholder="{{ trans('message.address_tambon_ex') }}">

                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-6 mb-3 ">
                                <input required autocomplete="nope" class="form-control rounded8px"
                                    style="background-color: #c1bdbd;border : 0px; " type="text" id="zipcode" name='zipcode'
                                    placeholder="{{ trans('message.address_zipcode_ex') }}">
                            </div> --}}
                    </div>
                    <div class="col-12 px-0">
                        <div class='d-flex flex-row'>
                            @if(count($address) <= 0 && isset($address))
                                <div class="col-1 mb-3">
                                    <div class="round">
                                        <input type="checkbox" id="checkbox" name='checkbox' checked />
                                        <label for="checkbox" id='checkbox' name="checkbox"></label>
                                    </div>
                                </div>
                                <div class="col-11 mb-3 ">
                                    <strong>{{ trans('message.set_as') }} {{ trans('message.main_address') }}</strong>
                                </div>
                            @else
                                <div class="col-1 mb-3">
                                    <div class="round">
                                        <input type="checkbox" id="checkbox" name='checkbox' checked />
                                        <label for="checkbox" id='checkbox' name="checkbox"></label>
                                    </div>
                                </div>
                                <div class="col-11 mb-3 ">
                                    <strong>{{ trans('message.set_as') }} {{ trans('message.main_address') }}</strong>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class='form-row'>
                    <div class="col-6 mb-3 text-center">
                        <button type="button" class="btn form-control text-white rounded8px btn_cancle_address"
                            data-dismiss="modal" style="background-color: #b2b2b2;">{{ trans('message.cancel') }}</button>
                    </div>
                    <div class="col-6 mb-3 text-center">
                        <button class="btn form-control text-white rounded8px submit_address btn-save" type="submit">{{ trans('message.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
{{-- add Address Button --}}


<!-- Edit Modal -->
@foreach($address as $address_modal)
<?php ++$modal_count; ?>
<div class="modal fade" id="edit_address{{$address_modal->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pt-4">
                <div class='col-12 position-relative' style='text-align:center'>
                    <strong>
                        <h6 class="mb-0"><strong>{{ trans('message.edit') }} {{ trans('message.my_address') }}</strong></h6>
                    </strong>
                    <button type="button" class="close position-absolute" style="right: 4px; top: -8px;"
                        data-dismiss="modal">&times;</button>
                </div>
            </div>
            <form action="/address/edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-row">
                                <div class="col-6 mb-3">
                                    <input type="hidden" class="form-control rounded8px" id="id" name='id' value='{{$address_modal->id}}' placeholder="{{ trans('message.name') }}" style="background-color: #ededed; border: none;">
                                    <input type="text" class="form-control rounded8px" id="name" name='name' value='{{$address_modal->name}}' placeholder="{{ trans('message.name') }}" style="background-color: #ededed; border: none;">
                                </div>
                                <div class="col-6 mb-3">
                                    <input type="text" class="form-control rounded8px" id="surname" name='surname' value='{{$address_modal->surname}}' placeholder="{{ trans('message.surname') }}" style="background-color: #ededed; border: none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control rounded8px" id="tel" name='tel' value='{{$address_modal->tel}}' placeholder="{{ trans('message.tel') }}" onkeypress="return isNumberKey(event)" style="background-color: #ededed; border: none;">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control rounded8px" id="address1" name='address1' value='{{$address_modal->address1}}' placeholder="{{ trans('message.address_no_ex') }}" style="background-color: #ededed; border: none;">
                        </div>
                        <div class="col-12">
                            <div class="form-row">
                                <div class="col-6">
                                    <input required autocomplete="nope" value='{{$address_modal->zipcode}}' class="form-control rounded8px input_custom_bg" style="background-color: #c1bdbd;border : 0px; " type="text" id="zipcode_shop{{$modal_count}}" name='zipcode' placeholder="{{ trans('message.address_zipcode_ex') }}">
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input required autocomplete="nope" value='{{$address_modal->city}}' class="form-control rounded8px input_custom_bg" style="background-color: #c1bdbd;border : 0px; " type="text" id="province_shop{{$modal_count}}" name='city' placeholder="{{ trans('message.address_province_ex') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input required autocomplete="nope" value='{{$address_modal->county}}' class="form-control rounded8px input_custom_bg" style="background-color: #c1bdbd;border : 0px; " type="text" id="county_shop{{$modal_count}}" name='county' placeholder="{{ trans('message.address_amphur_ex') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input required autocomplete="nope" value='{{$address_modal->district}}' class="form-control rounded8px input_custom_bg" style="background-color: #c1bdbd;border : 0px; " type="text" id="district_shop{{$modal_count}}" name='district' placeholder="{{ trans('message.address_tambon_ex') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class='form-row'>
                                <div class="col-6 text-center">
                                    <button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #b2b2b2;">{{ trans('message.cancel') }}</button>
                                </div>
                                <div class="col-6 text-center">
                                    <button class="btn form-control text-white rounded8px btn-save" type="submit" onclick="myFunction()">{{ trans('message.save') }}</button>
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
<!-- END Edit Modal -->

<div class="container pb_custom_footer">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
            <div class="row">
                <div class="col-3 d-xl-block d-lg-block d-md-none d-none px-0 sticky-top mr-0" style="height: calc(100vh - 131px); top: 131px; z-index: 900;">
                    @include('includes._menu_left_user_profile')
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-12 my-lg-4 my-md-2 my-2" id="addressBox">
                    <div class="col-12 px-1 py-3" style='border-bottom: 1px solid #d9d9d9;'>
                        <div class='row'>
                            <div class=' col-lg-9 col-md-9 col-3 d-flex align-items-center'>
                                <h3 class="mb-0"><strong>{{ trans('message.my_address') }}</strong></h3>
                            </div>
                            <div class="col-lg-3 col-md-3 col-5 ml-auto" style='text-align : right;'>
                                <button class="o-btn" data-toggle="modal" data-target="#add_address">+ {{ trans('message.add_address') }}</button>
                            </div>
                        </div>
                    </div>
                    @foreach($address as $address2)
                    <div class='col-lg-12 col-12 px-0 chkmodal'>
                        <div class='col-lg-12 col-md-12 col-12 px-0 mt-4 o-bg-box'>
                            <div>
                                <div class="col-lg-12 col-md-12 col-sm-12 py-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class='form-row'>
                                                <div class='mb-lg-2 mb-md-2 mb-2 col-lg-2 col-md-2 col-8 text-md-right text-lg-right order-1 order-md-1 order-lg-1'>
                                                    <strong class="font_size_14px">{{ trans('message.name') }} - {{ trans('message.surname') }}</strong>
                                                </div>
                                                <div class='col-lg-6 col-md-6 col-7 mb-lg-3 mb-md-3 mb-2 pr-lg-0 pr-md-0 order-3 order-md-2 order-lg-2'>
                                                    <input readonly type="text" value='{{$address2->name}} {{$address2->surname}}' class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ชื่อ - นามสกุล" style="background-color: #ededed; border: none;">
                                                </div>
                                                <div class='col-lg-3 col-md-3 col-5 order-4 order-md-3 order-lg-3'>
                                                    @if($address2->status ==1)
                                                    <a><button style='background-color: #ededed;color: black;border: 0px;cursor: context-menu;' class="o-btn form-control" data-toggle="modal" data-target="#">{{ trans('message.main_address') }}</button></a>
                                                    @else
                                                    <a href='address/setDefualt?id={{$address2->id}}'><button class="o-btn form-control" data-toggle="modal" data-target="#">{{ trans('message.set_as') }} {{ trans('message.main_address') }}</button></a>
                                                    @endif
                                                </div>
                                                <div class='pl-0 col-lg-1 col-md-1 col-4 order-2 order-md-4 order-lg-4' style='text-align : right'>
                                                    <a href='#'>
                                                        <img class='img-res' data-toggle="modal" data-target="#edit_address{{$address2->id}}" src="new_ui/img/icons/edit.svg" style="margin-right: 5px;">
                                                    </a>
                                                    <a href='address/delete?id={{$address2->id}}'>
                                                        <img class='img-res' src="new_ui/img/icons/delete.svg">
                                                    </a>
                                                </div>


                                            </div>
                                            <div class='form-row'>
                                                <div class='mb-lg-2 mb-md-2 mb-2 col-lg-2 col-md-3 col-12 text-md-right text-lg-right'>
                                                    <strong class="font_size_14px">{{ trans('message.tel') }}</strong>
                                                </div>
                                                <div class='col-lg-10 col-md-10 col-12 mb-lg-10 mb-md-3 mb-2'>
                                                    <input readonly type="text" value='{{$address2->tel}}' class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="(+66) 081-441-9585" style="background-color: #ededed; border: none;">
                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='mb-lg-2 mb-md-2 mb-2 col-lg-2 col-md-3 col-12 text-md-right text-lg-right'>
                                                    <strong class="font_size_14px">{{ trans('message.my_address') }}</strong>
                                                </div>
                                                <div class='col-lg-10 col-md-10 col-12 mb-lg-3 mb-md-3 mb-2'>
                                                    <textarea readonly class="form-control" rows="4" style="background-color: #ededed; border: none;">{{$address2->address1}} {{$address2->address2}} {{$address2->district}} {{$address2->county}} {{$address2->city}} {{$address2->zipcode}}</textarea>
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
    </div>
</div>
@endsection


@section('script')


<script>
    // Detect number in input number Telephone
     function isNumberKey(evt) {
         var charCode = (evt.which) ? evt.which : evt.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
         return true;
     }
    // Detect number in input number Telephone
</script>






<script>
    $(document).ready(function() {
        var chk_max = $('.chkmodal').length;
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

    $.Thailand({
        database: '/js/jquery.Thailand.js/database/db.json', // path หรือ url ไปยัง database

        $district: $('#district'), // input ของตำบล
        $amphoe: $('#county'), // input ของอำเภอ
        $province: $('#city'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
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
            url: 'address/add',
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
                status: (status ? 1 : 0 ),
                _token: '{{ csrf_token() }}',
            },
            success:function(data){
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
                    $('.modal').modal('hide');

                }else{
                    alert('Somethings is wrongs');
                }
            },error:function(data){
                        json = JSON.parse(data.responseText);
                    // console.log(json['error']);
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


@endsection
