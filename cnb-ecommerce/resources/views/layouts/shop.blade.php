<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes._head')
	@yield('style')
</head>

<body>
	@yield('loader')
	<div id="minHeight">
		<div class="container-fluid ">
			<div class="d-lg-block d-md-none d-none">
				@include('includes._menu_left_seller')
			</div>
			<div class="main">

				<div class="row sticky-top">
					@include('includes._menu_head_seller')
				</div>
				<div style="margin-bottom: 60px;">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	@yield('script')
</body>

</html>