<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('admin.title')}} | {{ trans('admin.lockscreen') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/vendor/hyperf-admin/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/vendor/hyperf-admin/AdminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/vendor/hyperf-admin/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/vendor/hyperf-admin/AdminLTE/plugins/toastr/toastr.min.css">

  <style type="text/css">
    @media only screen and (max-width: 479px) {
        #lockscreen_wrapper{margin-top: 15rem !important;}
    }
  </style>

</head>
<body class="hold-transition lockscreen" @if(config('admin.lockscreen.background_image'))style="background: url({{config('admin.lockscreen.background_image')}}) no-repeat;background-size: cover;"@endif>
<!-- Automatic element centering -->
<div class="lockscreen-wrapper" id="lockscreen_wrapper" style="margin-top: 20.5rem;">
  <div class="lockscreen-item" style="width: 60px;">
    <div class="lockscreen-image" style="margin-top: -70px;">
      <img src="{{ $data['_user']['avatar'] ?? '' }}" alt="User Image">
    </div>
  </div>
  <!-- User name -->
  <div class="lockscreen-name text-white">{{ $data['_user']['name'] ?? '' }}</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials ml-0" action="/admin/user/unlock" method="post">
      <div class="input-group">
        <div class="input-group-append">
            <div class="input-group-text" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        <input type="password" class="form-control" placeholder="{{ trans('admin.password') }}" name="password" required>
        <div class="input-group-append">
          <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="/vendor/hyperf-admin/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/vendor/hyperf-admin/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="/vendor/hyperf-admin/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/vendor/hyperf-admin/AdminLTE/plugins/toastr/toastr.min.js"></script>
@include('common.toastr')
</body>
</html>