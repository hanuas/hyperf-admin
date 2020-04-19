<!DOCTYPE html>
<html lang="{{ config('translation.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ $data['_csrf_token'] }}">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- 页面css /-->
        @include('layout.css')

    </head>
    <body class="hold-transition {{ join(' ', config('admin.layout')) }}">
        <div class="wrapper">
            <!-- 页面样式自定义 /-->
            <aside class="control-sidebar control-sidebar-dark"></aside>
            <!-- 页面导航栏 /-->
            @include('layout.navbar')
            <!-- 页面侧边栏 /-->
            @include('layout.sidebar')
            <!-- 页面js /-->
            @include('layout.js')

            <div class="content-wrapper" id="pjax-container">
                <div id="app">
                    @yield('content')
                </div>
            </div>

            <!-- 页面footer /-->
            @include('layout.footer')
        </div>
    </body>
</html>