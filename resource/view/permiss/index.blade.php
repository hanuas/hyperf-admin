<?php
$title = '权限';
$description = '列表';
$breadcrumb[] = ['text' => $title, 'url' => '/admin'];
?>
@include('layout.breadcrumb', compact('title', 'description', 'breadcrumb'))

<section class="content">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="form-group">
                <div class="input-group col-md-4">
                    <input id="txtSearchKey" type="text" class="form-control input-sm" placeholder="搜索关键字">
                    <span class="input-group-btn ">
                    <button id="btnSearch" class="btn btn btn-primary" type="button"> <i class="fa fa-search"></i> 搜索</button>
                </span>
                </div>
            </div>
            <div class="jqGrid_wrapper">
                <table id="table_list"></table>
                <div id="pager_list"></div>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-hover dataTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>标识</th>
            <th>请求方式</th>
            <th>请求路径</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission['id'] }}</td>
                <td>{{ $permission['name'] }}</td>
                <td>{{ $permission['slug'] }}</td>
                <td>{{ $permission['http_method'] }}</td>
                <td>{{ $permission['http_path'] }}</td>
                <td>{{ $permission['created_at'] }}</td>
                <td>
                    <a class="btn btn-primary btn-xs" style="color: white;">编辑</a>
                    <a class="btn btn-danger btn-xs" style="color: white;">删除</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Main content -->
</section>