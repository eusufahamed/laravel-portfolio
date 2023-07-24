<!DOCTYPE html>
<html lang="en" class="fixed left-sidebar-top">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>

  </title>

  <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
  <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

  <!--load progress bar-->
  <script src="{{ asset('js/admin/js/pace.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/css/pace-theme-minimal.css') }}">

  <!--BASIC css-->
  <!-- ========================================================= -->
  <link rel="stylesheet" href="{{ asset('css/admin/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/css/animate.css') }}">

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!--dataTable-->
  <link rel="stylesheet" href="{{ asset('css/admin/css/dataTables.bootstrap.min.css') }}">

  <!--SECTION css-->
  <!-- ========================================================= -->
  <!--Notification msj-->
  <link rel="stylesheet" href="{{ asset('css/admin/css/toastr.min.css') }}">
  <!--Magnific popup-->
  <link rel="stylesheet" href="{{ asset('css/admin/css/magnific-popup.css') }}">
  <!--TEMPLATE css-->
  <!-- ========================================================= -->
  <link rel="stylesheet" href="{{ asset('css/admin/css/style.css') }}">
</head>

<body>
  <div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
      @include('admin.layouts.partials.rightSideHeader')
    </div>

    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
      @include('admin.layouts.partials.leftSideBar')

      @yield('content')

      <!--scroll to top-->
      <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
  </div>

  <!--BASIC scripts-->
  <!-- ========================================================= -->
  <script src="{{ asset('js/admin/js/jquery-1.12.3.min.js') }}"></script>
  <script src="{{ asset('js/admin/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/admin/js/nano-scroller.js') }}"></script>

  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <!--TEMPLATE scripts-->
  <!-- ========================================================= -->
  <script src="{{ asset('js/admin/js/template-script.min.js') }}"></script>
  <script src="{{ asset('js/admin/js/template-init.min.js') }}"></script>

  <!-- SECTION script and examples-->
  <!-- ========================================================= -->
  <!--Notification msj-->
  <script src="{{ asset('js/admin/js/toastr.min.js') }}"></script>
  <!--morris chart-->
  <script src="{{ asset('js/admin/js/chart.min.js') }}"></script>
  <!--Gallery with Magnific popup-->
  <script src="{{ asset('js/admin/js/jquery.magnific-popup.min.js') }}"></script>
  <!--dataTable-->
  <script src="{{ asset('js/admin/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/admin/js/dataTables.bootstrap.min.js') }}"></script>
  <!--Examples-->
  <script src="{{ asset('js/admin/js/data-tables.js') }}"></script>
  <!--Examples-->
  <script src="{{ asset('js/admin/js/dashboard.js') }}"></script>

  @stack('scripts')

</body>
</html>
