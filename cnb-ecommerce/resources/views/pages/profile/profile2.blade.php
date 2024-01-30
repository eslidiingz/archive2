@extends('layouts.profile')
@section('content')

<div class="content justify-content-center">
  <h3 class="h3 light mt-5" style="text-align: center;">แก้ไขข้อมูลส่วนตัว</h3>

  <div class="col-md-12 justify-content-center">
    <form action="/profile/updateMobile" method="POST" enctype="multipart/form-data">
      @csrf
      <img src="{{asset('img/profile/'.Auth::user()->user_pic) }}" type="file" class="img-fluid img-thumbnail" id="user_pic3" name="user_pic3" value="{{Auth::user()->user_pic}}">
      <div class="row">
        <input type="file" name="user_pic" id="change_pic_btn" onchange="readURL(this)" value="{{Auth::user()->user_pic}}">
        <label for="change_pic_btn">เลือกรูปภาพ</label>
        <p id="specification_pic" style="text-align:center; margin-left:115px; height:2px">ขนาดไฟล์:สูงสุด 1 MB</p>
        <p id="specification_pic" style="text-align:center;  margin-left:105px">ไฟล์ที่รองรับ: .JPEG,.PNG</p>
      </div>
  </div>

  <div class="col-md-12">
    <label for="name" id="detail_inside">ชื่อผู้ใช้<input type="text" name="name" class="form-control font-body" id="block_details" value="{{ Auth::user()->name}}">
    </label>
  </div>


  <div class="col-md-12">
    <label for="surname" id="detail_inside">นามสกุล<input type="text" class="form-control font-body" name="surname" id="block_details" value="{{ Auth::user()->surname}}">
    </label>
  </div>


  <div class="col-md-12">
    <label for="email" id="detail_inside">อีเมล<input type="email" readonly class="form-control font-body" name="email" id="block_details" value=" {{ Auth::user()->email}}">
    </label>
  </div>


  <div class="col-md-12">
    <label for="tel" id="detail_inside">เบอร์โทรศัพท์<input type="tel" class="form-control font-body" readonly name="phone" id="block_details" pattern="[0-9[{3}-[0-9]{3}-[0-9]{4}" value=" {{ Auth::user()->phone}}">
    </label>
  </div>


  <div class="col-md-12">
    <label for="gender" id="detail_inside" style="margin-left:5px;">เพศ</label>

    <input type="radio" class="genDer" id="female" name="sex" value="female" {{ Auth::user()->sex =="female"? "checked" : "" }}>
    <label for="gender" id="name_user">หญิง</label>

    <input type="radio" class="genDer" id="male" name="sex" value="male" {{ Auth::user()->sex =="male"? "checked" : "" }}>
    <label for="gender" id="name_user">ชาย</label>

    <input type="radio" class="genDer" id="other" name="sex" value="other" {{ Auth::user()->sex =="other"? "checked" : "" }}>
    <label for="gender" id="name_user">อื่นๆ</label>
  </div>

  <div class="col-md-12">
    <label for="birthtday" id="name_user" style="margin-right:30px">วันเกิด</label>


    <?php

    use App\User;
    $user = User::Where('id', Auth::user()->dateofbirth)->first();
    $M = Auth::user()->dateofbirth;
    $month = substr($M, 3, 3);
    if ($month = 01)
      $D = Auth::user()->dateofbirth;
    $day = substr($D, 0, 2);

    $Y = Auth::user()->dateofbirth;
    $year = substr($Y, 6);

    ?>

    <!-- <span> -->
    <select name="dateofbirthDay" id="select_birth_day">
      @if(isset ($user))
      <option><?php echo $day ?></option>
      @endif
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
    </select>
    <!-- </span> -->

    <span>
      <select name="dateofbirthMonth" id="select_birth_month">
        <!-- <option></option> -->
        @if(isset ($user))
        <option>{{ date('M', strtotime(Auth::user()->dateofbirth)) }}</option>
        @endif
        <option value="01">มกราคม</option>
        <option value="02">กุมภาพันธ์</option>
        <option value="03">มีนาคม</option>
        <option value="04">เมษายน</option>
        <option value="05">พฤษภาคม</option>
        <option value="06">มิถุนายน</option>
        <option value="07">กรกฎาคม</option>
        <option value="08">สิงหาคม</option>
        <option value="09">กันยายน</option>
        <option value="10">ตุลาคม</option>
        <option value="11">พฤศจิกายน</option>
        <option value="12">ธันวาคม</option>

      </select>
    </span>


    <span>
      <select name="dateofbirthYear" id="select_birth_year">
        @if(isset ($user))
        <option><?php echo $year; ?></option>
        @endif
        <?php
        $year = date('Y');
        $min = $year - 60;
        $max = $year;
        for ($i = $max; $i >= $min; $i--) {
          echo '<option value=' . $i . '>' . $i . '</option>';
        }
        ?>
      </select>
    </span>
  </div>
  <div class="col-md-12" style="margin-top:15px">
    <div class="row justify-content-center">
      <input type="submit" id="submit" name="submit" class="btn btn-secoundary" value="บันทึก"><br><br><br><br><br>
    </div>
    </form>
  </div>
</div>




@stop

<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#user_pic3').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>