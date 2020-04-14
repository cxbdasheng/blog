@extends('layouts.body')
@section('title', '链接管理')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="javascript:void(0)">
                    <li class="layui-this">评论管理</li>
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
                                <input id="boxCode" name="content" placeholder="相关内容" class="layui-input" type="text"
                                       value="{{$content}}" maxlength="50"></div>
                        </div>
                        <div class="layui-inline">
                            <a href="{{url('admin/comment/index')}}" class="layui-btn">重置</a>
                            <button id="btnSubmit" type="submit" class="layui-btn">查询</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="layui-table">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>内容</th>
                    <th>文章</th>
                    <th>用户</th>
                    <th>日期</th>
                    <th>状态</th>
                    <th>已审核</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $index => $items)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$items->content}}</td>
                        <td>《{{$items->articles->title}}》</td>
                        <td>{{$items->socialiteUser->name}}</td>
                        <td>{{$items->created_at}}</td>
                        <td>
                            @if ($items->is_audited==1)
                                √
                            @else
                                ×
                            @endif
                        </td>
                        <td>
                            @if (is_null($items->deleted_at))
                                √
                            @else
                                ×
                            @endif
                        </td>
                        <td>
                            <a class="layui-btn layui-btn-xs" href="{{url('admin/comment/edit/'.$items->id)}}">修改</a>
                            @if(is_null($items->deleted_at))
                                <a class="layui-btn layui-btn-xs layui-btn-normal J-baseAjaxTodo"
                                   href="{{url('admin/comment/destroy/'.$items->id)}}" title="你确定要删除吗？">删除</a>
                            @else
                                <a class="layui-btn layui-btn-xs layui-btn-warm J-baseAjaxTodo"
                                   href="{{url('admin/comment/restore/'.$items->id)}}" title="你确定要删除吗？">恢复</a>
                                <a class="layui-btn layui-btn-xs layui-btn-danger J-baseAjaxTodo"
                                   href="{{url('admin/comment/forceDelete/'.$items->id)}}" title="你确定要删除吗？">彻底删除</a>
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
                var content = "{{$content}}";
                //执行一个laypage实例
                laypage.render({
                    elem: 'page' //注意，这里的 test1 是 ID，不用加 # 号
                    , count: {{$data->total()}}
                    , curr:{{$data->currentPage()}}
                    , limit:{{$data->perPage()}}
                    , layout: ['prev', 'page', 'next', 'limit', 'count', 'skip']
                    , jump: function (obj, first) {
                        if (!first) {
                            if (content) {
                                window.location.href = "?page=" + obj.curr + "&limit=" + obj.limit + "&content=" + content;
                            } else {
                                window.location.href = "?page=" + obj.curr + "&limit=" + obj.limit;
                            }
                        }
                    }
                });
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
