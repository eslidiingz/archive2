<!DOCTYPE html>
<html lang="en">
<head>
    {{-- @include('includes.head') --}}

	@include('includes._head')
	@yield('style')
</head>
<body  style="background-color: #d6d6d6;">
    @yield('loader')
	@include('includes._menu')
	<div id="minHeight">
        @yield('content')
        {{-- @include('new_ui.chatwindows') --}}
    </div>
	@include('includes._footer')
    @include('component.modal-cate')
	@yield('script')
<script>
//   window.lazyLoadOptions = {
//     elements_selector: 'img'
//   };
</script>
{{-- <script async src="js/lazyload.min.js"></script> --}}
</body>
</html>

<!-- <!doctype html>
<html>
<head>
    {{-- @include('includes.head') --}}
</head>
<body>
<div>

        {{-- @include('includes.header') --}}

    {{-- <div id="main" class="row"> --}}
{{--
            @yield('content')
            @include('includes.chat') --}}

    {{-- </div> --}}
    <footer class="row">
        {{-- @include('includes.footer') --}}
    </footer>


</div>

</body>
</html> -->
<style>
    body{
        background-color: #fff;
    }
</style>


