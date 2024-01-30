<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes._head')
	@yield('style')
</head>

<body>

	@include('includes._menu')
	<div id="minHeight" style="background-color: #f7f0ec;">
		@yield('content')
	</div>
	@include('includes._footer')
	@include('component.modal-cate')
	@yield('script')
<script>
//   window.lazyLoadOptions = {
//     elements_selector: 'img'
//   }
</script>
{{-- <script async src="js/lazyload.min.js"></script> --}}
</body>

</html>
