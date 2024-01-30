<!DOCTYPE html>
<html lang="en">
<head>

	@include('includes._head')
	@yield('style')
</head>
<body>

	
	<div id="minHeight">
        @yield('content')
    </div>

	@yield('script')
</body>
</html>


