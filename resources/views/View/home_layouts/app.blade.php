<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>SIGRA | Sistem Informasi Gereja</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{url('plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{url('plugins/icofont/icofont.min.css')}}">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{url('plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{url('plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  @yield('styles')
</head>

<body id="top">
    @include('view.home_layouts._header')
    @yield('content')
    @include('view.home_layouts._footer')

    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{url('plugins/jquery/jquery.js')}}"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="{{url('plugins/bootstrap/js/popper.js')}}"></script>
    <script src="{{url('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>

    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>
    @yield('script')

  </body>
</html>
