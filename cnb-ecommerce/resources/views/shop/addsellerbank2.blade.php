@extends('layouts.shop')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="row p-4">
    <div class="col-12">
        <h3><strong>บัญชีธนาคาร</strong></h3>
    </div>
    <div class="col-12">
        <div class="row">
            @php
            // dd($shop_bank);ss
            @endphp
            @if($shop_bank->bank_number != null)
            <div class="col-xl-3 col-lg-6 col-md-6 col-12 rounded8px d-flex align-items-center add position-relative box-bank"
                style="background-color: #fff; padding-top: 30px; padding-bottom:30px; cursor: pointer;">
                <div class="row">
                    <div class="col-12">
                        <div class="media d-flex align-items-center">
                            <img src="{{asset('/new_ui/img/bank/'.$logo)}}" class="mr-3 rounded8px" style="width: 70px;"
                                alt="...">
                            <div class="media-body d-flex align-items-start flex-column justify-content-center">
                                <h5 class="mt-0 mb-0"><strong>{{ $shop_bank->bank_code }}</strong></h5>
                                {{ $shop_bank->bank_name}} <br>
                                {{ $shop_bank->bank_number }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-absolute icon-edit-delete" style="top: 5px; right: 10px;">
                    <img class='img-res pr-1' aria-hidden="true" data-toggle="modal" data-target="#edit-modal" style="width: 25px" src="/new_ui/img/icons/edit.svg" />
                    <img class='img-res pr-1' aria-hidden="true" data-toggle="modal" data-target="#delete-modal" style="width: 25px" src="/new_ui/img/icons/delete.svg" />
                    <!-- <i class="fa fa-pencil pr-1" style="color: #333;" aria-hidden="true" data-toggle="modal" data-target="#edit-modal"></i> -->
                    <!-- <i class="fa fa-trash" style="color: #333;" aria-hidden="true" data-toggle="modal" data-target="#delete-modal"></i> -->
                </div>
            </div>
            @else
            <div class="col-xl-3 col-lg-6 col-md-6 col-12 rounded8px pb-4 d-flex align-items-center add"
                style="background-color: #fff; padding-top: 30px; padding-bottom:15px; cursor: pointer;"
                data-toggle="modal" data-target="#add-modal">
                <strong>+ เพิ่มบัญชีธนาคาร</strong>
            </div>
            {{-- <div class="col-4 rounded8px d-flex align-items-center justify-content-start kbank1 pl-4" style="background-color: #fff; padding-top: 35px; padding-bottom: 35px;">
								<div class="media o-padding dataTarget">

								</div>
                            </div> --}}
            @endif
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade add-modal" id="add-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style='text-align : center'>
                <h4><strong>เพิ่มบัญชีธนาคาร</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/shop/addbank2" method="post">
                    @csrf
                    <div class="col-12">
                        <select name='bank_code' title="เลือกธนาคาร" class="form-control btn-color" id="bank-code">
                            @foreach ($bank as $item)
                                <option data-thumbnail="/new_ui/img/bank/{{ $item->logo }}" value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <select name='bank_category' title="เลือกประเภทบัญชี" class="form-control rounded8px"
                                style="background-color: #ededed; border: none; margin-top: 20px;" id="bank-class">
                                <option value="ออมทรัพย์">ออมทรัพย์</option>
                                <option value="กระแสรายวัน">กระแสรายวัน</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input required type="text" class="form-control rounded8px" id="bank-name"
                            aria-describedby="emailHelp" placeholder="ชื่อบัญชี" name='bank_name'
                            style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input required type="text" maxlength="10" class="form-control rounded8px" id="bank-number"
                            aria-describedby="emailHelp" placeholder="เลขที่บัญชี" name='bank_number'
                            style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <div class="divv">
                            <div class='form-row'>
                                <div class="col-6 mb-3 text-center">
                                    <button class="btn form-control text-white rounded8px" data-dismiss="modal"
                                        style="background-color: #b2b2b2;">ยกเลิก</button>
                                </div>
                                <div class="col-6 mb-3 text-center">
                                    <button type="sumbit" class="btn form-control text-white rounded8px btn-main-set" id="add-bank"
                                    >บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modaledit --}}
<div class="modal fade edit-modal" id="edit-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style='text-align : center'>
                <h4><strong>แก้ไขบัญชีธนาคาร</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/shop/addbank2" method="post">
                    @csrf
                    <div class="dataeditTarget">
                        <div class="col-12">
                            <select name='bank_code' title="เลือกธนาคาร" class="form-control btn-color bankcode" id="bank-code2" name="bank_select">
                                @foreach ($bank as $item)
                                    <option data-thumbnail="/new_ui/img/bank/{{ $item->logo }}" value="{{ $item->name }}" @if ($shop_bank->bank_code==$item->name) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <select name='bank_category' title="เลือกประเภทบัญชี"
                                    class="form-control rounded8px bankclass"
                                    style="background-color: #ededed; border: none; margin-top: 20px;" id="bank-class2">
                                    <option value="ออมทรัพย์" @if ($shop_bank->bank_category=="ออมทรัพย์") selected @endif>ออมทรัพย์</option>
                                    <option value="กระแสรายวัน" @if ($shop_bank->bank_category=="กระแสรายวัน") selected @endif>กระแสรายวัน</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-3 mt-4 ">
                            <input name='bank_name' value="{{ $shop_bank->bank_name }}" type="text" required
                                class="form-control rounded8px bankname" id="bank-name2" aria-describedby="emailHelp"
                                placeholder="ชื่อบัญชี" style="background-color: #ededed; border: none;">
                        </div>
                        <div class="col-12 mb-3 mt-4 ">
                            <input name='bank_number' value={{ $shop_bank->bank_number }} type="text" required
                                class="form-control rounded8px banknumber" id="bank-number2"
                                aria-describedby="emailHelp" placeholder="เลขที่บัญชี"
                                style="background-color: #ededed; border: none;">
                        </div>
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <div class="divv">
                            <div class='form-row'>
                                <div class="col-6 mb-3 text-center">
                                    <button class="btn form-control text-white rounded8px" data-dismiss="modal"
                                        style="background-color: #b2b2b2;">ยกเลิก</button>
                                </div>
                                <div class="col-6 mb-3 text-center">
                                    <button type="sumbit" class="btn form-control text-white rounded8px btn-main-set" id="edit-bank"
                                        >บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade success-modal" id="success-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class='col-12 row' style='text-align : center; padding-top: 20px;'>
                <div class='col-4' style='text-align : right'>
                    <svg style='color : #23c197' width="1.5em" height="1.5em" viewBox="0 0 16 16"
                        class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd"
                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                    </svg>
                </div>
                <div>
                    <h4 style='color : #23c197'><strong>เพิ่มบัญชีธนาคารสำเร็จ</strong></h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="col-12 mb-3 text-center">
                    <div style='padding-bottom: 20px;'>คุณได้เพิ่มบัญชีธนาคารเรียบร้อยแล้ว</div>
                    <button class="col-6 btn form-control text-white rounded8px" data-dismiss="modal"
                        style="background-color: #c75ba1;" onClick="window.location.reload();">ตกลง</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit success-->
<div class="modal fade edit-success" id="edit-success" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class='col-12 row' style='text-align : center; padding-top: 20px;'>
                <div class='col-4' style='text-align : right'>
                    <svg style='color : #23c197' width="1.5em" height="1.5em" viewBox="0 0 16 16"
                        class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd"
                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                    </svg>
                </div>
                <div>
                    <h4 style='color : #23c197'><strong>แก้ไขบัญชีธนาคารสำเร็จ</strong></h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="col-12 mb-3 text-center">
                    <div style='padding-bottom: 20px;'>คุณได้แก้ไขบัญชีธนาคารเรียบร้อยแล้ว</div>
                    <button class="col-6 btn form-control text-white rounded8px" data-dismiss="modal"
                        style="background-color: #c75ba1;" onClick="window.location.reload();">ตกลง</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pt-4">
            <div class="modal-header" style='text-align : center'>
                <h6><strong>ลบบัญชีธนาคาร</strong></h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="w-100 text-center" style='padding-bottom: 20px;'>คุณต้องการลบบัญชีนี้ใช่หรือไม่?</div>
                <div class="col-12">
                    <div class="divv">
                        <div class='form-row'>
                            <div class="col-6 mb-3 text-center">

                                <button class="btn form-control text-white rounded8px" data-dismiss="modal"
                                    style="background-color: #b2b2b2;">ยกเลิก</button>
                            </div>
                            <div class="col-6 mb-3 text-center">
                                <a href='/shop/deletebank2'>
                                    <button type="sumbit" class="btn form-control text-white rounded8px bg-red" id="edit-bank" >ยืนยัน</button>
                                </a>
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
<script>
    // $(".icon-edit-delete").hide();
    // $(".box-bank").on('mouseenter', function () {
    //     $(this).find(".icon-edit-delete").show();
    // }).mouseleave(function () {
    //     $(this).find(".icon-edit-delete").hide();
    // });

    $("input[type=number]").on("keydown", function (e) {
        var invalidChars = ["-", "+", "e"];
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>

@endsection
