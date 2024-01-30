<nav class="navbar navbar-expand-lg navbar-light fixed-top nav1">
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse  justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav" style="z-index: 3 !important">
                <li class="nav-item border-right">
                <li class="nav-item border-right">
                    @auth
                    <a class="nav-link h5 light" href="contest">SIAM CANNABIS CONTEST 2020</a>
                    @endauth

                    @guest
                    <a class="nav-link h5 light" href="contest" data-toggle="modal" data-target="#login-register">SIAM CANNABIS CONTEST 2020</a>
                    @endguest

                </li>

                @auth
                <a class="d-inline-block nav-link h5 light" href="/shop">
                    <img style="width:20px;" class="d-inline-block" src="/img/Group 33.svg" />
                    ร้านค้า</a>
                @endauth
                @guest
                <a class="d-inline-block nav-link h5 light" data-toggle="modal" data-target="#login-register">
                    <img style="width:20px;" class="d-inline-block" src="/img/Group 33.svg" />
                    ร้านค้า</a>
                @endguest

                </li>
                <li class="nav-item border-right">
                    <a class="nav-link h5 light" href="#lang">ภาษาไทย <i class="arrow down"></i></a>
                </li>
                <li class="nav-item border-right">
                    <a class="nav-link h5 light" href="#contact">เปรียบเทียบ</a>
                </li>
                <li class="nav-item border-right">
                    <a class="nav-link h5 light" href="#news">วิชลิสส์ของฉัน</a>
                </li>
                <li class="nav-item dropdown">
                    @auth
                    <a class="nav-link h5 light " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        if (!isset(Auth::user()->user_pic)) {
                            $src = '/img/user.svg';
                        } else {
                            $src = '/img/user/' . Auth::user()->user_pic;
                        }
                        ?>
                        <img src="{{asset('img/profile/'.Auth::user()->user_pic) }}" alt="" style="width:30px;height:30px;margin-top:-6px;" class="mr-1 rounded-circle">
                        {{Auth::user()->name}}
                        <i class="arrow down"></i>
                    </a>
                    @endauth

                    @guest
                    <a class="nav-link h5 light" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/img/Group 17.svg" alt="" style="width:17px" class="mr-1"> บัญชีผู้ใช้
                        <i class="arrow down"></i>
                    </a>
                    @endguest
                        <div class="dropdown-menu dropdown-menu-right shadow-sm rounded border-0" aria-labelledby="dropdownMenuButton">
                          {{-- <a class="dropdown-item" href="#">Action</a> --}}
                            <div class="container p-0" style="width: 220px">
                                @auth
                                    <a class="row mt-6" style="width: 210px" href="/profile">
                                        <div class="col-4">
                                                <img src="{{asset('img/profile/'.Auth::user()->user_pic) }}" alt="" style="width:60px;height:60px;" class="mr-1 rounded-circle mr-3">
                                            </div>
                                        <div class="col-7">
                                            <div class="row">
                                                <h5 class="medium mt-2 mb-0">ยินดีต้อนรับ</h5>
                                            </div>
                                            <div class="row">
                                                <h5 class="medium mt-0">{{Auth::user()->name}}</h5>
                                            </div>
                                        </div>
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

                                <?php
                                    $isshop=DB::table('shops')->where('user_id', Auth::user()->id)->first();
                                ?>
                                    @if (!isset($isshop))
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <form action="{{route('shop')}}">
                                                <button style="width: 190px"  name="shop" type="subnit" class="btn btn-secondary" >
                                                    <h6 class="regular  mb-0 pb-0">สมัครร้านค้า</h6>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif

                                {{-- <option disabled>──────────</option> --}}
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <a class="nav-link h6 light" href="/profile/purchase">คำสั่งซื้อของฉัน</a>
                                        <a class="nav-link h6 light" href="#contact">คูปองของฉัน</a>
                                        <a class="nav-link h6 light" href="#contact">วิชลิสต์ของฉัน</a>
                                        <a class="nav-link h6 light" href="#contact">เปรียบเทียบ</a>
                                    </div>
                                </div>

                                @endauth
                                @guest
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h5 class="medium">ยินดีต้อนรับ</h5>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button style="width: 190px"  id="login" name="login" type="button" class="btn btn-primary" data-toggle="modal" data-target="#login-register" >
                                                <h6 class="regular  mb-0 pb-0">เข้าสู่ระบบ</h6>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6" style="padding-bottom: 10px;">
                                            {{-- <form action="register" style="float: right"> --}}
                                            <button style="width: 190px"  id="register" name="register" type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#login-register">
                                                <h6 class="regular  mb-0 pb-0">สมัครสมาชิก</h6>
                                            </button>
                                            {{-- </form> --}}
                                        </div>
                                    </div>
                                    <!-- <div class="row mt-2">
                                        <div class="col">
                                            <button type="button" style="width: 190px" class="btn btn-outline-secondary">
                                                <h6 class="regular  mb-0 pb-0">เข้าระบบด้วย Facebook</h6>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <button type="button" style="width: 190px" class="btn btn-outline-secondary">
                                                <h6 class="regular  mb-0 pb-0">เข้าระบบด้วย Gmail</h6>
                                            </button>
                                        </div>
                                    </div>   -->

                            @endguest


                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand navbar-light fixed-top nav2 justify-content-center shadow-sm" id="nav-2">
    <div class="container container-nav row">
        <a class="navbar-brand col-lg-2 col-md-2 col-sm-2 col-2" href="/home">
            <img class="d-none d-lg-block" src="/img/logo1.png" alt="logo" style="max-width: 220px;margin-left:20px">
            <img class="d-lg-none" src="/img/logo2.png" alt="logo" style="max-width: 60px">
        </a>

        <!-- Links -->
        <ul class="navbar-nav col-lg-9 col-md-10 col-sm-10 col-11">
            <form class="form-inline col-lg-10 col-md-10 col-sm-10 col-7" action="/product_all">
                <input class="form-control search col-lg-11 col-md-10 col-sm-10 col-9" name="search"  type="search" placeholder=ค้นหา aria-label="Search">
                <button class="btn btn-search  col-1" type="submit"><i class="fa fa-fw fa-search white"></i></button>
            </form>
            <li class="col-lg-1 col-md-1 col-sm-1 col-2">
                @auth
                <a href="/basket"><img src="/img/smart-cart.svg" id="basket" style="max-width: 40px">
                    <span class="badge badge-danger">{{$basket_badges}}</span>
                </a>
                @endauth
                @guest
                <a id="login" name="login" data-toggle="modal" data-target="#login-register">
                    <img src="/img/smart-cart.svg" id="basket" style="max-width: 40px">
                </a>
                @endguest

            </li>
            <li class="col-lg-1 col-md-1 col-sm-1 col-1">
                <img src="/img/notification.svg" id="notification" style="max-width: 40px">
            </li>

        </ul>
    </div>
</nav>



@include('component.login-modal')

@if (isset($errors)&&$errors=='รหัสผ่านไม่ถูกต้อง')
    <script>
        var errors = "<?php echo $errors; ?>" ;
         $('#login-register').modal('show');
         $('#login_error').html(errors);
        //  $("#email").css("border-color", "red", "important");
        //  $("#password").css("border-color", "red", "important");
    </script>

@endif

<script>





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
