<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta property="og:title" content="SHOPTEENII">
	<meta property="og:description" content="SHOPTEENII เว็บขายสินค้าออนไลน์ โดยสมาคมผู้ประกอบการไทย">
	<meta property="og:image" content="https://new.shopteenii.com/img/img-logo.png">
	<meta property="og:url" content="https://new.shopteenii.com/">
	<link rel="icon" type="image/png" href="https://new.shopteenii.com/img/logo-small.svg" />
	<title>SHOPTEENII</title>
	<base href="/">
	<!-- jQuery 3.4.1 -->
	<script src="/new_ui/js/jquery.min.js"></script>

	<!-- Bootstrap 4.4.1 -->
	<link rel="stylesheet" href="/new_ui/plugins/bootstrap/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="/new_ui/css/style.css?v=5">
	<link rel="stylesheet" href="/new_ui/css/table-responsive.css">
	<link rel="stylesheet" href="/css/ated-custom-phorn.css">
	<link rel="stylesheet" href="/css/ated-custom-gia.css">
	<link rel="stylesheet" href="/css/ated-custom-meji.css">

</head>
<body>
	<div id="canvas">
		<div class="col-12 d-flex align-items-center justify-content-center">
			<div class="box">
			<div style="text-align: center;margin-bottom: 60px;">
				<img src="/new_ui/img//logo/logo.svg" style="width: 200px;">
			</div>
			<div class="boxInput">
				<input type="text" name="username" id="username">
				<label for="username"><strong>ชื่อผู้ใช้งาน</strong></label>
			</div>
			<div class="boxInput">
				<input type="password" name="password" id="password">
				<label for="password"><strong>รหัสผ่าน</strong></label>
			</div>
			<div>
				<button type="button" class="btn-main-set btn" id="submit">เข้าสู่ระบบ</button>
			</div>
			</div>
		</div>
	</div>
</body>
</html>
<style type="text/css">
	html,body{
		font-family: 'Prompt', sans-serif;
		/*background-image: url('new_ui/img/bg_login.png');
		background-position: center;
		background-size: cover;
		background-repeat: no-repeat;*/

	}
	#canvas{
		width: 100vw;
		height: 100vh;
		overflow: hidden;
		/*background: rgb(6,34,84);*/
		background-color: #eee;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.box{
		width: 100%;
		max-width: 400px;
		background-color: #fff;
		box-shadow: 0 0 10px 1px rgba(0,0,0,0.4);
		padding: 1.5rem;
		border-radius: 10px;
	}
	.boxInput{
		position: relative;
		margin-bottom: 1.5rem;
	}
	.boxInput label{
		position: absolute;
		top: 10px;
		left: 0;
		transition: .5s;
		color: #333;
	}
	input{
		outline: none;
		width: 100%;
		border: none;
		padding: 10px 2px;
		border-bottom: 2px solid #333;
		color: #333;
	}
	.boxInput input:focus + label, .boxInput input.active + label{
	  	top: -14px;
	  	color: #333;
	}
	button{
		width: 100%;
		height: 40px;
		border: none;
		/*background-image: linear-gradient(150deg, rgba(6,34,84,1) 0%, rgba(66,41,79,1) 100%);*/
		color: #fff;

	    background-size: 150% 150%;
		/*animation: gradient 2s linear infinite;*/
	}
	button.click{
	    -webkit-animation: fade 2s linear infinite;
	    -moz-animation: fade 2s linear infinite;
	    animation: fade 2s linear infinite;
		/*animation: gradient 2s linear infinite;*/
	}
	@-webkit-keyframes fade {
	    0%{background-position:0% 50%}
	    50%{background-position:100% 51%}
	    100%{background-position:0% 50%}
	}
	@-moz-keyframes fade {
	    0%{background-position:0% 50%}
	    50%{background-position:100% 51%}
	    100%{background-position:0% 50%}
	}
	@keyframes fade {
	    0%{background-position:0% 50%}
	    50%{background-position:100% 51%}
	    100%{background-position:0% 50%}
	}
</style>
<script type="text/javascript">
	$('input').on('change keypress keyup',function(){
		var text = $(this).val();
		if(text != ''){
			$(this).addClass('active');
		}else{
			$(this).removeClass('active');
		}
	});
	$('#username').focus();

	$('input').on('keypress',function(e){
		if(e.which == 13){
			login();
		}
	});
	$('#submit').on('click',function(e){
		login();
	});

	function login(){
		$('button').addClass('click').prop('disabled',true);
		$.ajax({
	        url: '/dashboard/login',
	        // data: form.serialize(),
	        data:{
	        	username : $('#username').val(),
	        	password : $('#password').val(),
	        	_token : '{{ csrf_token() }}'
	        },
	        type: 'POST',
	        success: function(data) {
	            if($.trim(data)=='true'){
	                // Swal.fire({
	                //     position: 'center',
	                //     icon: 'success',
	                //     title: $success,
	                //     showConfirmButton: false,
	                //     timer: 1500
	                // });
	                // setTimeout(function(){
	                //     window.location.href = $urlTo;
	                // }, 1500);
	                window.location.replace("{{ url('dashboard') }}");
	            }else{
	                // Swal.fire({
	                //     position: 'center',
	                //     icon: 'error',
	                //     title: $error,
	                //     showConfirmButton: false,
	                //     timer: 1500
	                // });
	                $('button').removeClass('click').prop('disabled',false);
	                alert('ชื่อผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้อง');
	            }
	        },
	        error: function(data) {
	            // json = JSON.parse(data.responseText);
	            // $.each(json['errors'], function( index, value ) {
	            //     // $('input[name='+index+'], textarea[name='+index+']').attr('placeholder',value).addClass('placeholderError').val('');
	            //     $('input[name='+index+'], textarea[name='+index+'], select[name='+index+']').attr('placeholder',value).addClass('placeholderError');
	            // });
	        }
	    });
	}
</script>








