<?php

$title = '日志';
$description = '列表';
$breadcrumb[] = ['text' => $title, 'url' => '/admin'];
?>
@include('layout.breadcrumb', compact('title', 'description', 'breadcrumb'))

<section class="content">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="form-group">
                <div class="input-group col-md-4">
                    <input id="txtSearchKey" type="text" class="input form-control" placeholder="搜索关键字" />
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
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>访问路径</th>
            <th>访问类型</th>
            <th>IP</th>
            <th>输入</th>
            <th>创建时间</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{ $log['id'] }}</td>
                <td>{{ $log['user_id'] }}</td>
                <td>{{ $log['path'] }}</td>
                <td>{{ $log['method'] }}</td>
                <td>{{ $log['ip'] }}</td>
                <td>{{ $log['input'] }}</td>
                <td>{{ $log['created_at'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Main content -->
</section>
</script>