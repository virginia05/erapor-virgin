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
        <div id="sidebar" class="col-md-2" style="border-right: 1px solid;">
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
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
</body>
</html>