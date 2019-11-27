<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" class="brand-image img-circle" type="image" href="{{ icon_title() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ offline_asset() }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ online_asset() }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ online_asset() }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('header')
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        @include('layouts.components._navbar')
        @include('layouts.components._sidebar')
        <div class="content-wrapper">
            @include('layouts.components._content_header')
            <div class="content">
                <div class="container-fluid">
                    @yield('content_body')
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline"><i class="far fa-copyright"></i> Bachtiars Project</div>
            <strong>{{ config('app_handler.app_name') }}</strong>
        </footer>
    </div>
    <script src="{{ online_asset() }}/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.19.0/dist/axios.min.js"></script>
    <script src="{{ online_asset() }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ online_asset() }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ online_asset() }}/dist/js/adminlte.min.js"></script>
    <script src="/js/app/master/master_home.min.js" defer></script>
    @include('layouts.libraries._libraries', ['_lib' => ['_toasterjs']])
    @yield('footer')
    <!-- </body></html> -->
