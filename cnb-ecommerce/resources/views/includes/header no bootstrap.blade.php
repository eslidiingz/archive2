
  <nav class="nav-1" id="nav-1">
    <li><a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="responsiveFun()">&#9776;</a></li>
    <li onclick="myFunction()"><a class="" >บันชีผู้ใช้ <i class="arrow down"></i></a></li>
    <li><a href="#news">วิชลิสส์ของฉัน</a></li>
    <li><a href="#contact">เปรียบเทียบ</a></li>
    <li><a class="lang" href="#lang">ภาษาไทย <i class="arrow down"></i></a></li>
    <li><a class="vender" href="#vender"> Vender <i class="arrow down"></i></a></li>

  </nav>

    <a  href="/"><img class="logo logo1" src="/img/logo1.png"/></a>
    <img class="logo logo2" id="logo" src="/img/logo2.png"  />
    <img src="/img/smart-cart.svg" id="basket" class="logo basket" >
    <img src="/img/notification.svg" id="notification" class="logo notification" >

  <nav class="nav-2" id="nav-2" >
        <li class="nav-li-2" style="width: 60%"><input type="text" class="search"  name="search" placeholder="ค้นหา" style="display: inline"></li>
  </nav>


  <div id="myDropdown" class="dropdown-content" >
      <h2>ยินดีต้อนรับ</h2>
      <div class="row">
      <form action="login" style="float: right">
        <input type="button" id="login" name="login" class="button btn1" value="เข้าสู่ระบบ">
        </form>
        <form action="register" style="float: right">
            <input type="submit"  class="button btn2" value="สมัครสมาชิก">
        </form>
      </div>
      <div class="row">
        <input type="button" class="button btn3" value="เข้าระบบด้วย Facebook">
      </div>
      <div class="row">
        <input type="button" class="button btn4" value="เข้าระบบด้วย Gmail">
      </div>
      <hr style="margin-top: 20px; opacity: 0.3;">
      <div class="row">
        <input type="button" class="button btn4" value="เข้าระบบด้วย Gmail">
      </div>
      <div class="row">
          <h3>คำสั่งซื้อของฉัน</h3>
          <h3>คูปองของฉัน</h3>
          <h3>วิชลิสต์ของฉัน</h3>
          <h3>เปรียบเทียบ</h3>
      </div>
    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content" style="text-align:center">
            <span class="close">&times;</span>
            <img src="/img/logo1.png"  alt="" style="width: 50%">
            <div>
                <a id="login-btn" class="btn  btn-active" href="javascript:void(0);" ><h3 style="display: inline">เข้าสู่ระบบ</h3><a>
                <a id="register-btn" class="btn " href="javascript:void(0);" ><h3 style="display: inline">สมัครสมาชิก</h3></a>
            </div>
            <div id="login-form" class="login-form">
                <div>
                    <input type="text" class="input-text"  name="id" placeholder="ใส่อีเมล / ไอดี">
                </div>
                <div>
                    <input type="text" class="input-text"  name="pass" placeholder="ใส่รหัสผ่าน">
                </div>
                <div>
                    <a href="#"><h3 style="display: inline;margin-left:3%">ลืมรหัสผ่าน ?</h3></a>
                </div>
                <div>
                    <input type="button" id="login" name="login" class="button btn1" value="เข้าสู่ระบบ">
                </div>
            </div>
            <div id="register-form" class="register-form">
                <div>
                    <input type="text" class="input-text"  style="width: 32%;display:inline" name="first" placeholder="ชื่อ">
                    <input type="text" class="input-text" style="width: 32%;display:inline" name="last" placeholder="นามสกุล">
                </div>
                <div>
                    <input type="text" class="input-text"  name="email" placeholder="อีเมล">
                </div>
                <div>
                    <input type="text" class="input-text"  name="pass" placeholder="รหัสผ่าน">
                </div>
                <div>
                    <input type="text" class="input-text"  name="re-pass" placeholder="ยืนยันหรัสผ่าน">
                </div>
                <div>
                    <input type="text" class="input-text"  name="addres" placeholder="ที่อยู่">
                </div>
                <div>
                    <a href="#"><h3 style="display: inline;margin-left:3%">ลืมรหัสผ่าน ?</h3></a>
                </div>
                <div>
                    <input type="button" id="login" name="login" class="button btn1" value="สมัครสมาชิก">
                </div>
            </div>
        </div>

      </div>

<script>


    function responsiveFun() {
    var nav1 = document.getElementById("nav-1");
    var nav2 = document.getElementById("nav-2");
    var nav3 = document.getElementById("logo");
    var nav4 = document.getElementById("basket");
    var nav5 = document.getElementById("notification");
    var nav6 = document.getElementById("nav-home");

    if (nav1.className === "nav-1") {
        nav1.className += " responsive";
    } else {
        nav1.className = "nav-1";
    }
    if (nav2.className === "nav-2") {
        nav2.className += " responsive1";
    } else {
        nav2.className = "nav-2";
    }
    if (nav3.className === "logo logo2") {
    nav3.className += " responsive2";
    nav4.className += " responsive2";
    nav5.className += " responsive2";
    nav6.className += " responsive3";
    } else {
    nav3.className = "logo logo2";
    nav4.className = "logo basket";
    nav5.className = "logo notification";
    nav6.className = "nav-1 nav-home";
    }

}

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}


var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("login");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



$(document).ready(function(){
  $("#login-btn").click(function(){
    $("#login-form").show();
    $("#register-form").hide();
    document.getElementById("login-btn").className += " btn-active";
    document.getElementById("register-btn").className = "btn";
  });
  $("#register-btn").click(function(){
  	$("#login-form").hide();
    $("#register-form").show();
    document.getElementById("login-btn").className = "btn";
    document.getElementById("register-btn").className += " btn-active";

  });
})
</script>
