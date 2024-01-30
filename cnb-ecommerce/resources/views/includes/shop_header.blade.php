
<nav class="navbar navbar-expand-lg navbar-light fixed-top nav1 "style="position:absolute;">
    
    <div class="container-fluid">
    
    <a class="navbar-brand " href="/shop">
        <img class="d-none d-lg-block" src="/img/icon/logo_shop_2.png" alt="logo"style="width: 180px;margin-left:0px; "  >
        <img class="d-lg-none" src="/img/logo2.png" alt="logo"style="max-width: 60px"  >
    </a>
    
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse  justify-content-end" id="navbarSupportedContent" >
            <ul class="navbar-nav" style="z-index: 3 !important">
                <li class="nav-item border-right">
                    <img style="width:20px;" class="d-inline-block" src="/img/Group 33.svg" />
                    <a class="d-inline-block nav-link h4 light" href="/">SIAM CANNABIS </a>
                </li>
                <li class="nav-item border-right">
                    <a class="nav-link h4 light" href="#lang">ภาษาไทย <i class="arrow down"></i></a>
                </li>
                <li class="nav-item border-right">
                    <a class="nav-link h4 light" href="#contact">เปรียบเทียบ</a>
                </li>
                <!-- <li class="nav-item border-right">
                    <a class="nav-link h4 light" href="#news">วิชลิสส์ของฉัน</a>
                </li> -->
                <li class="nav-item dropdown">
                    @auth
                    <a class="nav-link h4 light" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <!-- <img src= "{{asset('img/shop_profiles/'.$user_shops->shop_pic) }}" alt="" style="width:30px;margin-top:-6px"  class="mr-1 rounded-circle" > -->
                        @if($user_shops->shop_name==null)
                        <img src= "{{asset('img/profile/'.Auth::user()->user_pic) }}" alt="" style="width:30px; height:30px; margin-top:-6px; object-fit: cover;"  class="mr-1 rounded-circle" >
                        {{Auth::user()->name}}
                        @else
                        <img src= "{{asset('img/shop_profiles/'.$user_shops->shop_pic) }}" alt="" style="width:30px; height:30px; margin-top:-6px; object-fit: cover;"  class="mr-1 rounded-circle" >
                        {{$user_shops->shop_name}}
                        @endif
                        <i class="arrow down"></i>
                    </a>
                    @endauth

                    @guest
                    <a class="nav-link h4 light" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <img src="/img/Group 17.svg" alt="" style="width:17px" class="mr-1"> บัญชีผู้ใช้
                        <i class="arrow down"></i>
                    </a>
                    @endguest
                    {{-- @guest --}}
                    {{-- {{Auth::user()}} --}}

                    {{-- @else
                    <a class="nav-link h4 light" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        {{$user->name}}
                        <i class="arrow down"></i>
                    </a>
                    @endguest --}}



                        <div class="dropdown-menu dropdown-menu-right shadow-sm rounded border-0" aria-labelledby="dropdownMenuButton">
                          {{-- <a class="dropdown-item" href="#">Action</a> --}}
                            <div class="container p-0" style="width: 220px;">
                                @auth
                                    <a class="row mt-6" style="width: 210px;" href="/shop">
                                        

                                        @if($user_shops->shop_name==null)
                                        <div class="col-4">
                                            <img src= "{{asset('img/profile/'.Auth::user()->user_pic) }}" alt="" style="width:60px; height:60px; object-fit: cover;"  class="mr-1 rounded-circle mr-3" >
                                        </div>
                                        <div class="col-7">
                                            <div class="row">
                                                <h5 class="medium mt-2 mb-0">ยินดีต้อนรับ</h5>
                                            </div>
                                            <div class="row">
                                                <h6 class="medium mt-0">{{Auth::user()->name}}</h6>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-4">
                                            <img src= "{{asset('img/shop_profiles/'.$user_shops->shop_pic) }}" alt="" style="width:60px; height:60px; object-fit: cover;"  class="mr-1 rounded-circle mr-3" >
                                        </div>
                                        <div class="col-7">
                                            <div class="row">
                                                <h5 class="medium mt-2 mb-0">ยินดีต้อนรับ</h5>
                                            </div>
                                            <div class="row">
                                                <h6 class="medium mt-0">{{$user_shops->shop_name}}</h6>
                                            </div>
                                        </div>
                                        
                                        @endif
                                        
                                    </a>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                        <form action="{{route('logout')}}">
                                            <button style="width: 190px"  id="login" name="login" type="subnit" class="btn btn-primary" >
                                                <h6 class="regular  mb-0 pb-0">ออกจากระบบ</h6>
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                @endauth
                                @guest
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h3 class="medium">ยินดีต้อนรับ</h3>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button style="width: 100px"  id="login" name="login" type="button" class="btn btn-primary" data-toggle="modal" data-target="#login-register" >
                                                <h6 class="regular  mb-0 pb-0">เข้าสู่ระบบ</h6>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            {{-- <form action="register" style="float: right"> --}}
                                            <button style="width: 100px"  id="register" name="register" type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#login-register">
                                                <h6 class="regular  mb-0 pb-0">สมัครสมาชิก</h6>
                                            </button>
                                            {{-- </form> --}}
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <input type="button" class="btn btn-primary" value="เข้าระบบด้วย Facebook">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <input type="button" class="btn btn-primary " value="เข้าระบบด้วย Gmail">
                                        </div>
                                    </div>

                                @endguest

                                {{-- <option disabled>──────────</option> --}}
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <a class="nav-link h6 light" href="#contact">รายการขายของฉัน</a>
                                        <a class="nav-link h6 light" href="#contact">สินค้าของฉัน</a>
                                        <a class="nav-link h6 light" href="#contact">รายรับของฉัน</a>
                                    </div>
                                </div>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- <nav class="navbar navbar-expand navbar-light fixed-top nav2 justify-content-center shadow-sm" id="nav-2">
    <div class="container container-nav row">
        <a class="navbar-brand col-lg-2 col-md-2 col-sm-2 col-2" href="/">
        <img class="d-none d-lg-block" src="/img/logo1.png" alt="logo"style="max-width: 220px;margin-left:20px"  >
        <img class="d-lg-none" src="/img/logo2.png" alt="logo"style="max-width: 60px"  >
        </a> -->

        <!-- Links -->
        <!-- <ul class="navbar-nav col-lg-9 col-md-10 col-sm-10 col-11">
            <li class="form-inline col-lg-10 col-md-10 col-sm-10 col-7">
                <input class="form-control search col-lg-11 col-md-10 col-sm-10 col-9"  type="search" placeholder=ค้นหา aria-label="Search">
                <button class="btn btn-search  col-1" type="submit"><i class="fa fa-fw fa-search white"></i></button>
            </li>
            <li class="col-lg-1 col-md-1 col-sm-1 col-2">
               <a href="/basket"><img src="/img/smart-cart.svg" id="basket" style="max-width: 40px"></a>
            </li>
            <li class="col-lg-1 col-md-1 col-sm-1 col-1">
                <img src="/img/notification.svg" id="notification"  style="max-width: 40px">
            </li>

        </ul>
    </div>
</nav> -->


@include('component.login-modal')



<script>




// function myFunction() {
//     document.getElementById("myDropdown").classList.toggle("show");
// }


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




</script>
