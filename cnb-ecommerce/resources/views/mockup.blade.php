<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	@if(Request::get('id'))
	<form class="promotion" method="POST" enctype="multipart/form-data" action="/dashboard/promotion">
        @csrf
        <div id="first">
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-4 ml-auto">
                        <input type="text" class="form-control price"
                            placeholder="ราคาโปรโมชั่น (บาท)" id="price_promotion" disabled="">
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <input type="text" class="form-control limit" name="limit"
                            placeholder="จำนวนสิทธิ์การซื้อ (หน่วย๗" id="limit" value="9">
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:200px" class="text-left" scope="col">
                                ชื่อสินค้า</th>
                            <th style="width:200px">SKU</th>
                            <th style="width:150px" scope="col">จำนวน</th>
                            <th scope="col">ราคา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center"
                                        style="height:50px;">
                                        <p class="mb-0">{{ @$key->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if(isset($data->product_option["sku"]))
                                <div class="row">

                                    @foreach ($data->product_option["sku"] as $item)
                                    <div class="col-12 d-flex align-items-center justify-content-center"
                                        style="height:50px;">
                                        <p class="mb-0">{{ $item }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </td>
                            <td>
                                @if(isset($data->product_option["stock"]))
                                @foreach ($data->product_option["stock"] as $item)
                                <div class="col-12 d-flex align-items-center"
                                    style="height:50px;">
                                    <input type="number" name="amount[]"
                                        class="form-control mb-2" max="{{ $item }}"
                                        style="text-align: center;" value="{{ $item }}">
                                </div>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @if(isset($data->product_option["stock"]))
                                @foreach ($data->product_option["stock"] as $item)
                                <div class="col-12 d-flex align-items-center"
                                    style="height:50px;">
                                    <input type="number" name="price[]"
                                        class="form-control mb-2 promotion"
                                        style="text-align: center;"
                                        id="price_promotion" value="9">
                                </div>
                                @endforeach
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
           

                <div class="row">
                    <div class="form-group col-4 text-left">
                        <label for="start_date">วันที่ต้องการจะจัดโปรโมชั่น</label>
                        <input type="date" class="form-control" id="start_date"
                            name="start_date" placeholder="Example input" value="{{ date('Y-m-d',strtotime('2020-10-30')) }}">
                    </div>
                    <div class="form-group col-4 text-left">
                        <label for="start_date">วันที่สิ้นสุดการจะจัดโปรโมชั่น</label>
                        <input type="date" class="form-control" id="end_date"
                            name="end_date" placeholder="Example input" value="{{ date('Y-m-d',strtotime('2020-11-02')) }}">
                    </div>
                    <div class="form-group col-4 text-left">
                        <label for="type">ประเภทโปรโมชั่น</label>
                        <select class="form-control" name="type" id="type">
                            <option value="flashsale">Flashsale</option>
                            {{-- <option value="9baht">9 ฿</option> --}}
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <div class="form-check">
                            <input class="form-check-input" name="time_period[]"
                                type="checkbox" id="time_period" value="0" checked>
                            <label class="form-check-label" for="time_period">
                                24:00 - 06:00
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <div class="form-check">
                            <input class="form-check-input" name="time_period[]"
                                type="checkbox" id="time_period" value="1" checked>
                            <label class="form-check-label" for="time_period">
                                06:00 - 12:00
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <div class="form-check">
                            <input class="form-check-input" name="time_period[]"
                                type="checkbox" id="time_period" value="2" checked>
                            <label class="form-check-label" for="time_period">
                                12:00 - 18:00
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <div class="form-check">
                            <input class="form-check-input" name="time_period[]"
                                type="checkbox" id="time_period" value="3" checked>
                            <label class="form-check-label" for="time_period">
                                18:00 - 24:00
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" value="{{ @$data->id }}">
                <button type="submit"
                    class="btn btn-primary submitPromotion">Save</button>
            </div>
        </div>
    </form>
    @endif
</body>
</html>