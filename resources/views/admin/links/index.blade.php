@extends('layouts.body')
@section('title', '链接管理')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="javascript:void(0)">
                    <li class="layui-this">链接管理</li>
                </a>
                <a href="{{url('admin/links/create')}}">
                    <li class="">新增链接</li>
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>

        <div class="layui-tab-content">
            <form action="" class="layui-form">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input id="boxCode" name="name" placeholder="链接名称" class="layui-input" type="text"
                                       value="{{$name}}" maxlength="50"></div>
                        </div>
                        <div class="layui-inline">
                            <a href="{{url('admin/links/index')}}" class="layui-btn">重置</a>
                            <button id="btnSubmit" type="submit" class="layui-btn">查询</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="layui-table">
                <thead>
                <tr>
                    <th>序号</th>
                    <th width="100">排序</th>
                    <th>链接名称</th>
                    <th>URL</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $index => $items)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><input type="text" value="{{$items->sort}}" maxlength="3" name="{{$items->id}}"
                                   class="layui-input category-sort"/></td>
                        <td>{{$items->name}}</td>
                        <td>{{$items->url}}</td>
                        <td>
                            @if (is_null($items->deleted_at))
                                √
                            @else
                                ×
                            @endif
                        </td>
                        <td>
                            <a class="layui-btn layui-btn-xs" href="{{url('admin/links/edit/'.$items->id)}}">修改</a>
                            @if(is_null($items->deleted_at))
                                <a class="layui-btn layui-btn-xs layui-btn-normal J-baseAjaxTodo"
                                   href="{{url('admin/links/destroy/'.$items->id)}}" title="你确定要删除吗？">删除</a>
                            @else
                                <a class="layui-btn layui-btn-xs layui-btn-warm J-baseAjaxTodo"
                                   href="{{url('admin/links/restore/'.$items->id)}}" title="你确定要删除吗？">恢复</a>
                                <a class="layui-btn layui-btn-xs layui-btn-danger J-baseAjaxTodo"
                                   href="{{url('admin/links/forceDelete/'.$items->id)}}" title="你确定要删除吗？">彻底删除</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    {{ $data->links('layouts.page') }}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        layui.use('laypage', function () {
            layer.ready(function () {
                var laypage = layui.laypage;
                        @include('shared._error')
                        @include('shared._messages')
                var name = "{{old('title')}}";
                //执行一个laypage实例
                laypage.render({
                    elem: 'page' //注意，这里的 test1 是 ID，不用加 # 号
                    , count: {{$data->total()}}
                    , curr:{{$data->currentPage()}}
                    , limit:{{$data->perPage()}}
                    , layout: ['prev', 'page', 'next', 'limit', 'count', 'skip']
                    , jump: function (obj, first) {
                        if (!first) {
                            if (name) {
                                window.location.href = "?page=" + obj.curr + "&limit=" + obj.limit + "&name=" + name;
                            } else {
                                window.location.href = "?page=" + obj.curr + "&limit=" + obj.limit;
                            }
                        }
                    }
                });
            });
        });
        $(".category-sort").blur(function () {
            var _this = $(this);
            var id = _this.attr('name');
            $.post("{{url('admin/links/sort')}}", {id: id, sort: _this.val(),}, function (res) {
                if (res.success == "1") {
                    layer.msg("修改成功！", {icon: 1});
                } else {
                    layer.msg(res.message, {icon: 2});
                }
            });
        });
        $('a.J-baseAjaxTodo').on("click", function () {
            var _this = this;
            layer.confirm(_this.title, {
                btn: ['确定', '取消']
                , yes: function (index, layero) {
                    window.location.href = _this.href;
                }
            });
            return false;
        });
    </script>
@endsection
