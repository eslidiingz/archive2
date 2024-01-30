  <!--sidebar nav -->

  <!-- ---------------- Banner User Profile Start ------------------ -->

  <div class="sidebar">
    <!-- <div class="container"> -->

    <div class="card" style="margin-top: 25%;
    background-color: #f8eaf3;
    border-radius: 8px;
    border-width: 0px;
    ">
      <div class="row">
        <div class="col-4 ">
          <img id="pic_profile" class="img-fluid thumbnail" src="{{asset('img/profile/'.Auth::user()->user_pic) }}" default="/img/user.svg">
        </div>
        <div class="col-6 ">
          <label class="mb-0" style="color: #1e1e1e;
                          font-family: DB Heavent-medium;
                          font-size: 15px;
                          margin-top:20px;
                          ">{{ Auth::user()->name}}</label>
          <label style="color: #1e1e1e;
                          font-family: DB Heavent-medium;
                          font-size: 15px;
                          ">{{ Auth::user()->surname}}</label>
        </div>
        <div class="col-2">
          <img src="/img/profile/edit_name.png" style="margin-left:-20px; margin-top:28px;"></p>
        </div>
        <div class="row">
          <p id="balance_money">ยอดเงินในวอลเล็ท</p>
          <div class="row">
            <div class="col-12">
              <p id="money">0.00 ฿</p>
              <p id="line_space"> | </p>

            </div>
          </div>
        </div>
        <div class="row">
          <img id="wallet" src="/img/profile/Wallet Topup.png">
          <p id="text_money">เติมเงิน</p>
        </div>

      </div>
    </div>
    <!-- </div> -->


    <!-- --------------------- Banner User Profile End ---------------------- -->






    <!-- ---------------- Menu for SideBar Start -------------------- -->
    <!-- <div class="container"> -->
    <!-- style="background-color:red" -->

    <div class="row ">
      <div class="col-xs-6">
        <img id="side_pic" src="/img/profile/icon01.png" style="margin-right:10px">
      </div>
      <div class="col-xs-6">

        <li><a data-toggle="collapse" data-target="#menu1" href="#" id="f_color">บัญชีของฉัน</a>
          <div class="collapse hidden" id="menu1">
            <ul>
              <li><a class="pt-2 pl-4" href="/profile" id="f_color">ข้อมูลส่วนตัว</a></li>
              <li><a class="pt-2 pl-4" href="#" id="f_color">ช่องทางการชำระเงิน</a></li>
              <li><a class="pt-2 pl-4" href="#" id="f_color">วอลเลต T10</a></li>
              <li><a class="pt-2 pl-4" href="/address" id="f_color">ที่อยู่</a></li>
              <li><a class="pt-2 pl-4" href="#" id="f_color">เปลี่ยนรหัสผ่าน</a></li>
              <li><a class="pt-2 pl-4" href="/profile/KYC" id="f_color">KYC</a></li>
            </ul>
          </div>
        </li>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-6">
        <img id="side_pic" src="/img/profile/icon02.png" style="margin-right:10px">
      </div>
      <div class="col-xs-6">
        <a href="profile/purchase" id="f_color">การซื้อของฉัน</a>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-6">
        <img id="side_pic" src="/img/profile/notification.png" style="margin-right:10px">
      </div>
      <div class="col-xs-6">

        <li><a data-toggle="collapse" data-target="#menu2" href="#" id="notification">การแจ้งเตือน</a>
          <div class="collapse hidden" id="menu2">
            <ul>
              <li><a class="pt-2 pl-4" href="#" id="notification">อัพเดทคำสั่งซื้อ</a></li>
              <li><a class="pt-2 pl-4" href="#" id="notification">เรื่องโปรโมชั่น</a></li>
              <li><a class="pt-2 pl-4" href="#" id="notification">รายการอัพเดท T10 Wallet</a></li>
            </ul>
          </div>
        </li>

      </div>
    </div>


    <div class="row">
      <div class="col-xs-6">
        <img id="side_pic" src="/img/profile/icon04.png" style="margin-right:8px">
      </div>
      <div class="col-xs-6">
        <a href="#" id="coupon">คูปอง / ส่วนลดของฉัน</a>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-6">
        <img id="side_pic" src="/img/profile/icon05.png" style="margin-right:8px">
      </div>
      <div class="col-xs-6">
        <a href="profile/wishlist" id="f_color">วิสลิสต์ ของฉัน</a>
      </div>
    </div>
    <!-- ---------------- Menu SideBar End ---------------------- -->

    <!-- </div> -->
  </div>