<?php
$title = '用户';
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
            <th>用户名</th>
            <th>昵称</th>
            <th>状态</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['username'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['status'] }}</td>
                <td>{{ $user['created_at'] }}</td>
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