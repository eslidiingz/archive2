<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div>

        @include('includes.header')

    {{-- <div id="main" class="row"> --}}

            @yield('content')
            @include('includes.chat')

    {{-- </div> --}}
    <footer class="row">
        @include('includes.footer')
    </footer>


</div>

</body>
</html>
