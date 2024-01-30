<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body style="background-color:white">
    <div>

        @include('includes.header')
        <div class="container">
            <div class="row justify-content-center">
                @include('includes.sidebar')
                @yield('content')

            </div>
            <footer class="row">
                {{-- @include('includes.footer') --}}
            </footer>

        </div>
    </div>

</body>

</html>