<?php
$title = '角色';
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
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role['id'] }}</td>
                <td>{{ $role['name'] }}</td>
                <td>{{ $role['slug'] }}</td>
                <td>{{ $role['created_at'] }}</td>
                <td><a href="javascript:void(0);">删除</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Main content -->
</section>