<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>reset password</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                {{-- {{ dd($data) }}
                https://shopteenii.com/img/profile/profile_1622100267.png --}}
                <div class="card w-100 mx-auto" style="max-width: 400px">
                    <img class="card-img-top" src="/img/profile/{{ $data->user_pic }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">ชื่อร้านค้า : {{ @$data->shop->shop_name }}</h5>
                      <p class="card-text">ชื่อ - นามสกุล : {{ @$data->name }} {{ @$data->surname }}</p>
                      <p class="card-text">เบอร์โทร : {{ @$data->phone }}</p>
                      <p class="card-text">อีเมล : {{ @$data->email }}</p>
                      <p class="card-text" id="newpassword">New Password  : <span></span></p>
                    </div>
                    <div class="card-body">
                      <button class="btn btn-success" id="reset">reset password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    $('#reset').on('click',function(){
        console.log('click');
        $.ajax({
            url: "{{ url('/dashboard/resetpassword/user/cf?id='.$data->id) }}",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                if($.trim(data.status)=='true'){
                    $('#newpassword span').text($.trim(data.password));
                }
            }
        });
    })
</script>