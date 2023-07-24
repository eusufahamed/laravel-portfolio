<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>
    @yield('title')
  </title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('images/logo/eusuf-(favicon).png') }}"/>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('css/templates/css/bootstrap.min.css') }}">

  <!-- Plugins -->
  <link rel='stylesheet' href="{{ asset('css/templates/css/font-awesome.min.css') }}">
  <link rel='stylesheet' href="{{ asset('css/templates/css/lightgallery.min.css') }}">
  <link rel='stylesheet' href="{{ asset('css/templates/css/slick.css') }}">
  <link rel='stylesheet' href="{{ asset('css/templates/css/zoom.css') }}">

  <!-- Custom css file -->
  <link rel="stylesheet" href="{{ asset('css/templates/css/style.css') }}">
</head>

<body>
  <div class="wrapper">
    @include('templates.layouts.partials.navBar')

    @yield('content')

    @include('templates.layouts.partials.footer')
  </div>

  <!-- JS -->
  <!-- jquery-2.1.3.min js -->
  <script type="text/javascript" src="{{ asset('js/templates/js/jquery-2.1.3.min.js') }}"></script>

  <!-- Plugins -->
  <script type="text/javascript" src="{{ asset('js/templates/js/libs.js') }}"></script>

  <!-- Main js -->
  <script type="text/javascript" src="{{ asset('js/templates/js/main.js') }}"></script>
</body>
</html>
