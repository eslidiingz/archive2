<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes._head')
	@yield('style')
</head>

<body>

	@include('includes._menu')
	<div id="minHeight">
		@yield('content')
	</div>
	@include('includes._footer')
	@include('component.modal-cate')
	@yield('script')
</body>

</html>