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
    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed p-l-0">
            <main id="main-container">
                <div class="block mt-12">
                    <div class="block-content block-content-full">
                        <form class="form-inline form-login" action="{{ route('admin-login') }}" method="POST">
                             <div class="box-error">
                                @if(session('notification'))
                                <div class="alert alert-danger">
                                    {{session('notification')}}
                                </div>
                                @endif
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="email" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-if-email" name="email" placeholder="Email">
                            <input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-if-password"  name="password" placeholder="Password">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
        <script src="{{asset('assets/js/oneui.core.min.js')}}"></script>
        <script src="{{asset('assets/js/oneui.app.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/be_pages_dashboard.min.js')}}"></script>
    </body>
</html>            