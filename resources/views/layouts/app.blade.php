<!DOCTYPE html>
<html>

    <head>
        <!-- Basic Page Info -->
        <meta charset="utf-8" />
        <title>SIGRA | Admin Panel</title>

        <!-- Site favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{url('vendors/images/apple-touch-icon.png')}}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{url('vendors/images/favicon-32x32.png')}}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('vendors/images/favicon-16x16.png')}}" />

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet" />
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{url('vendors/styles/core.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('vendors/styles/icon-font.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('vendors/styles/style.css')}}" />

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
            crossorigin="anonymous"></script>
        <script>
        </script>
        <!-- End Google Tag Manager -->
        @yield('styles')
    </head>

    <body>
        @include('layouts._header')
        @include('layouts._sidebar')
        @yield('content')



        <!-- welcome modal end -->
        <!-- js -->
        <script src="{{url('vendors/scripts/core.js')}}"></script>
        <script src="{{url('vendors/scripts/script.min.js')}}"></script>
        <script src="{{url('vendors/scripts/process.js')}}"></script>
        <script src="{{url('vendors/scripts/layout-settings.js')}}"></script>
        <script src="{{url('assets/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{url('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('assets/assets/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{url('assets/assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{url('assets/assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{url('assets/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{url('assets/assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{url('assets/assets/vendor/php-email-form/validate.js')}}"></script>
        <script src="{{url('assets/assets/vendor/tinymce/tinymce.min.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{url('assets/assets/js/backmain.js')}}"></script>
        <script src="{{url('assets/assets/tagsinput/bootstrap-tagsinput.js')}}"></script>
        <script type="text/javascript">
        <!-- Google Tag Manager (noscript)
        -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
                style="display: none; visibility: hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        @yield('script')
    </body>

</html>
