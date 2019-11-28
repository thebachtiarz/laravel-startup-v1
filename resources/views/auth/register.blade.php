<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" class="brand-image img-circle" type="image" href="{{ icon_title() }}">
    <title>{{ config('app_handler.app_name') }} | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ offline_asset() }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ online_asset() }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ online_asset() }}/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="hold-transition login-page bg-gradient-dark">
    <div id="view-register-page"></div>
    <script src="{{ online_asset() }}/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.19.0/dist/axios.min.js"></script>
    <script src="{{ online_asset() }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    @include('layouts.libraries._libraries', ['_lib' => ['_forgejs', '_toasterjs']])
    <script async src="/js/app/auth/register_master.min.js"></script>
    <script src="/js/app/master/master_home.min.js"></script>
    <!-- </body></html> -->
