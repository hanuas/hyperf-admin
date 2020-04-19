<!DOCTYPE html>
<html lang="{{ config('translation.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ $data['_csrf_token'] }}">
    <title>{{config('admin.title')}} | {{ trans('admin.login') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/hyperf-admin/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/vendor/hyperf-admin/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/hyperf-admin/AdminLTE/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/vendor/hyperf-admin/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/vendor/hyperf-admin/AdminLTE/plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style type="text/css">
        .login-page{height: 80vh;}
    </style>
</head>

<body class="hold-transition login-page" @if(config('admin.login_background_image'))style="background: url({{config('admin.login_background_image')}}) no-repeat;background-size: cover;"@endif>

    <div class="login-box">
        <div class="login-logo">
            <a href="/admin"><b>{!! config('admin.name') !!}</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ trans('admin.login') }}</p>

                <form action="/admin/user/login" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{{ trans('admin.username') }}" name="username" value="{{ $data['_user']['username'] ?? '' }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="{{ trans('admin.password') }}" name="password" value="{{ $data['_user']['password'] ?? '' }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" value="1" >
                                <label for="remember">{{ trans('admin.remember_me') }}</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <input type="hidden" name="_csrf_token" value="{{ $data['_csrf_token'] }}">
                            <button type="submit" class="btn btn-primary btn-block">{{ trans('admin.login') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /.login-box -->

</body>
<!-- jQuery -->
<script src="/vendor/hyperf-admin/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/vendor/hyperf-admin/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/vendor/hyperf-admin/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="/vendor/hyperf-admin/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/vendor/hyperf-admin/AdminLTE/plugins/toastr/toastr.min.js"></script>
@include('common.toastr')
</html>
