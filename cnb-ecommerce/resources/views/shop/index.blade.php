@extends('layouts.shop')
@section('content')
<!-- Content Here -->
		<div class="row">
			<div class="col-12 px-4 pt-4">
				<h3><strong>Shop Details</strong></h3>
            </div>
			<div class="col-lg-6 col-md-12 col-12  px-4 px-lg-4 px-md-4 px-2 mb-4" >
				<form method="POST" action="{{ route('updateShopInfo') }}" enctype="multipart/form-data">
					@csrf
					<div class="row p-lg-4 p-md-2 p-2 mx-0" style="background-color: #fff;">
                        <div class="col-12 mb-4">
                            <div class="row justify-content-center ">
                                <div class="d-flex align-items-center justify-content-center" style="width: 100%; height: 300px;">
                                    <img id="preview" class="img-shop-profile" style="max-width: 100%; max-height: 100%;" src="{{('/img/shop_profiles/'.$user_shops->shop_pic) }}" alt="{{ $user_shops->shop_pic }}">
                                </div>

                                {{-- <label class="custom-file-upload d-flex align-items-center justify-content-center" >
                                    <input onchange="readURL(this)" type="file" class="form-control-file @error('shop_pic') is-invalid @enderror " id="shop_pic" name="shop_pic" value="{{ $user_shops->shop_pic }}"/>
                                    <img src="img/icon/camera-black.png" alt="">
                                </label> --}}
                                <div class="form-group was-validated w-100">
                                    <div class="col-12">
                                    <div class="custom-file mt-2" id="customFile">
                                            <input onchange="readURL(this)" type="file" class="is-invalid click_image custom-file-input form-control-file @error('shop_pic') is-invalid @enderror " id="shop_pic" name="shop_pic" accept="image/*" />
                                        <label class="custom-file-label" >
                                            {{-- <img src="img/icon/camera-black.png" alt=""> --}}
                                            <p id="image_img"></p>
                                        </label>
                                    </div>
                                    </div>
                                </div>
                            </div>
						</div>


                        {{-- <div class="col-12">
                                <div class="btn-group btn-block" role="group" aria-label="Basic example">
                                <?php
                                    $product_count = DB::table('product_s')->where('shop_id', '=', $user_shops->id)->count();
                                ?>
                                    <button type="button" class="btn btn-status text-truncate">สินค้าทั้งหมด : {{ $product_count }} รายการ</button>
                                    <button type="button" class="btn btn-status text-truncate">คะแนนร้านค้า : 0 คะแนน</button>
                                </div>
                        </div> --}}

                        <div class="col-12">
                            <div class="form-group was-validated">
                                <label class="font-body"><strong class="font_head_item">Shop name</strong></label>
                                <input class="form-control font-body is-invalid" type="text" name="shop_name" value="{{isset($user_shops->shop_name)? $user_shops->shop_name:''}}" required>
                            </div>
                        </div>
                        <div id="dvAtedProvince" class="col-12" >
                            <div class="form-group was-validated">
                                <label class="font-body"><strong class="font_head_item">Province</strong></label>
                                <select name='ated_province_id' title="เลือกจังหวัด" class="form-control btn-color" id="ated_province_id" >
                                    <option value="">-- Select province --</option>
                                    @foreach ($o_province as $item)
                                        <option value="{{ $item->id }}" {{ ($user_shops->ated_province_id == $item->id) ? 'selected="selected"' : '' }} >{{ $item->name_th }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group was-validated">
                                <label class="font-body"><strong class="font_head_item">Transport time</strong></label>
                                <input class="form-control font-body is-invalid" type="text" name="ship_period" value="{{isset($user_shops->ship_period)? $user_shops->ship_period:''}}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group was-validated">
                                <label class="font-body"><strong class="font_head_item">Detail Shop</strong></label>
                                <textarea class="form-control font-body is-invalid" id="description" name="description" rows="6" required>{{isset($user_shops->description)? $user_shops->description:''}}</textarea>
                            </div>
                        </div>

                        {{-- <div class="col-12">
                            <div class="form-group">
                                <label class="font-body">Code Shopteenii MP</label>
                                <input class="form-control font-body" type="text" name="Influencer" value="{{isset($user_shops->Influencer)? $user_shops->Influencer:''}}" readonly="true">
                            </div>
                        </div> --}}

                        <!-- <div class="col-12">
                            <div class="form-group">
                                <label class="font-body">รหัสผู้แนะนำ</label>
                                <input class="form-control font-body" type="text" name="partner" value="{{isset($user_shops->partner)? $user_shops->partner:'ไม่ระบุ'}}" readonly="true">
                            </div>
                        </div> -->

                    </div>
            </div>
					<div class="col-12 px-4 px-lg-4 px-md-4 mx-0">
                        <div class="row px-0">
                            <div class="col-lg-6 col-md-12 col-12 d-flex justify-content-end px-4">
                                <a href="{{ route('shop') }}" class="btn btn-secondary">
                                    {{ __('Canecl') }}
                                </a>
                                <button type="submit"  class="btn btn-c75ba1 ml-2 newShop">{{ __('Save') }}</button>
                            </div>
                        </div>
					</div>
                </form>
                <br><br><br><br><br>

		</div>

@endsection


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        var image_name = $("#image_img").text("Please select a store logo image");
        $('#ated_type').change(function() {
            if( $(this).val() == 'kpo' ) {
                $('#dvAtedGenNo').show();
                $('#dvAtedProvince').hide();
                $('#ated_gen_no').prop('required',true);
                $('#ated_province_id').prop('required',false);
            } else if( $(this).val() == 'province' ) {
                $('#dvAtedGenNo').hide();
                $('#dvAtedProvince').show();
                $('#ated_gen_no').prop('required',false);
                $('#ated_province_id').prop('required',true);
            }
        });

        window
    });
    // var image_name;
    function readURL(input) {
        var readerImg = $("#shop_pic").val();
        if (input.files && input.files[0]) {
            reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                // readerImg = e.target.result;
                image_name = $("#image_img").text(readerImg.split('\\').pop());
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

@endsection
