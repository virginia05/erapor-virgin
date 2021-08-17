<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body style="min-height: 100vh;">
<div class="">

    {{-- <header class="row"> --}}
        @include('includes.header')
    {{-- </header> --}}

    <div id="main" class="d-flex" >
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-2 text-center" style="border-right: 1px solid;">
            @include('includes.sidebar')
        </div>

        <!-- main content -->
        <div id="content" class="col-md-10">
            @yield('content')
        </div>
    </div>

    {{-- <footer class="">
        @include('includes.footer')
    </footer> --}}

</div>
</body>
</html>