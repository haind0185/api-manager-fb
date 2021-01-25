<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>OneUI - Bootstrap 4 Admin Template &amp; UI Framework</title>

        <meta name="description" content="">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/favicons/apple-touch-icon-180x180.png')}}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('assets/css/oneui.min.css')}}">
        <link rel="stylesheet" id="css-main" href="{{asset('assets/css/custom.css')}}">
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            @include('sidebar')
            @include('header')
            @yield('content')
            @include('footer')
        </div>
        <script src="{{asset('assets/js/oneui.core.min.js')}}"></script>
        <script src="{{asset('assets/js/oneui.app.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/be_pages_dashboard.min.js')}}"></script>
        <!-- Page JS Plugins -->
        <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('assets/js/pages/be_tables_datatables.min.js')}}"></script>
        @yield('script')
    </body>
</html>
