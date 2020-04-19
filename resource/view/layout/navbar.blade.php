<style type="text/css">
    @media only screen and (max-width: 479px) {
        #lockscreen_label{display: none;}
    }
</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/admin" class="nav-link">{{ trans('admin.home') }}</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form action="/admin/search" method="get" class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input type="search" name="q" class="form-control form-control-navbar" placeholder="{{ trans('admin.search') }}" aria-label="Search" value="{{ $data['_search'] ?? '' }}">
            <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- User Account Menu -->
        <li class="nav-item dropdown user-menu mt-1">
            <a data-toggle="dropdown" href="#">
                <img src="{{ $data['_user']['avatar'] ?? ' ' }}" class="img-size-32 mr-2 ml-2 img-circle" alt="{{ $data['_user']['name'] ?? 'User Image' }}">
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                <li class="user-header">
                    <img src="{{ $data['_user']['avatar'] ?? '' }}" class="img img-circle" alt="{{ $data['_user']['name'] ?? 'User Image' }}">
                    <p>
                        {{ $data['_user']['name'] ?? '' }}
                        <small>{{ trans('admin.register_time') }}: {{ $data['_user']['updated_at'] }} </small>
                    </p>
                </li>
                <li class="user-footer">
                    <div class="float-left">
                        <a href="/admin/user/edit" class="btn btn-default btn-flat">{{ trans('admin.setting') }}</a>
                    </div>
                    <div class="float-right">
                        <a href="/admin/user/logout" class="btn btn-default btn-flat">{{ trans('admin.logout') }}</a>
                    </div>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/user/lock">
            <i class="fas fa-lock"></i>
            <span id="lockscreen_label">{{ trans('admin.lockscreen') }}</span>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->