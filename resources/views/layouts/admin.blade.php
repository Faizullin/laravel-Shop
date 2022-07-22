<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','AdminLTE 3 | Dashboard')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
      const LURL={};
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      var table,
          checkAllState = false;
    </script>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      @include('admin.includes.header')
      @include("admin.includes.sidebar")
      <div class="content-wrapper">
        <section class="content">
          <div class="container-fluid">
            @include('admin.includes.content-top')
            @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
      </footer>
    </div>
  </body>
  <!-- jQuery UI 1.11.4 -->
  {{--     <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  {{--     <script>
  $.widget.bridge('uibutton', $.ui.button)
  </script> --}}
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dist/js/adminlte.js') }}"/></script>
  {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
  {{-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> --}}
</html>