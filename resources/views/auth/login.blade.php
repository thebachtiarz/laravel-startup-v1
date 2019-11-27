<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" class="brand-image img-circle" type="image" href="{{ icon_title() }}">
    <title>{{ config('app_handler.app_name') }} | Signin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ offline_asset() }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ online_asset() }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ online_asset() }}/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="hold-transition login-page bg-gradient-dark">
    <div id="view-login-page"></div>
    <script src="{{ online_asset() }}/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.19.0/dist/axios.min.js"></script>
    <script src="{{ online_asset() }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    @include('layouts.libraries._libraries', ['_lib' => ['_forgejs', '_toasterjs']])
    <script>
        const sleep = ms => new Promise(resolve => setTimeout(resolve, ms));

        const checkAuth = async () => {
            let token = localStorage.getItem('_jwtApiToken');
            await sleep(2000);
            token ? (toastSuccess('Automatically Login, please wait...'), redirectTo('/home')) : '';
        }

        $(document).on('keyup', '#password', function(e) {
            if (event.keyCode === 13) {
                e.preventDefault();
                $('#submitLogin').click()
            }
        });

        $(document).on('click', '#submitLogin', function() {
            let email = $('#email').val();
            let password = $('#password').val();
            if (email && password) {
                submitLogin(email, password)
            } else {
                //
            }
        });

        const createLoginForm = () => {
            let loginForm = `<div class="login-box">
            <div class="login-logo">
            <a href="/" class="text-white" style="font-size: 40px; opacity: .8;"><b>Laravel</b> Startup</a>
            </div>
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
            <div class="card-body login-card-body"><p class="login-box-msg">Sign in to start your session</p>
            <div class="input-group mb-3"><input type="email" id="email" class="form-control" placeholder="Email@mail.com">
            <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>&nbsp;<p class="mtmin">Test</p></div>
            <div class="input-group mb-3"><input type="password" class="form-control" id="password" placeholder="Password"><div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div></div><div class="row"><div class="col-7"><div class="icheck-primary"><input type="checkbox" id="remember"><label for="remember">Remember Me</label></div></div><div class="col-5"><button class="btn btn-primary btn-block btn-flat text-bold" id="submitLogin"><i class="fas fa-sign-in-alt"></i>&ensp;Sign In</button></div></div><p class="mb-1"><a href="/lost_password">I forgot my password</a></p><p class="mb-0"><a href="/register" class="text-center">Register a new membership</a></p></div></div></div>`;
            $('#view-login-page').html(loginForm);
        }

        const submitLogin = (email, password) => {
            var md = forge.md.sha512.sha384.create();
            md.update(password);
            let encpass = md.digest().toHex();
            axios.post(`/api/signin`, {
                email,
                password
            }, {
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(response => responseLogin(response.data)).catch(error => toastWarning(error));
        }

        const responseLogin = async (data) => {
            console.log(data);
            if (data.status == 'success') {
                toastSuccess('Successfully Login, please wait...');
                localStorage.setItem('_jwtApiToken', data.response_data[0].token);
                redirectTo('/home');
            } else {
                toastWarning(data.message);
            }
        }

        const redirectTo = async (url) => {
            await sleep(3000);
            $(location).attr('href', url);
        }

        $(createLoginForm(), checkAuth());
    </script>
    <!-- </body></html> -->
