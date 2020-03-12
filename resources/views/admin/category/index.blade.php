@extends('layouts.body')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="layui-this">文章列表</li>
                <li class="">新增文章</li>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-tab-content">
            <form action="" class="layui-form">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input id="boxCode" name="name" placeholder="分类名" class="layui-input" type="text" value="{{old('name')}}" maxlength="50"></div>
                        </div>
                        <div class="layui-inline">
                            <button id="btnSubmit" onclick="$('#pageNum').val(1);" class="layui-btn">查询</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="layui-table">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>排序</th>
                    <th>分类名</th>
                    <th>关键词</th>
                    <th>描述</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $index => $items)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$items->sort}}</td>
                    <td>{{$items->name}}</td>
                    <td>{{$items->keywords}}</td>
                    <td>{{$items->description}}</td>
                    <td>
                        @if ( !$items->created_at)
                            不存在
                        @else
                            存在
                        @endif
                    </td>
                    <td>
                        <a class="layui-btn layui-btn-xs" href="/admin/config/sensorGraph/form?id=43">修改</a>
                        <a class="layui-btn layui-btn-xs layui-btn-danger J-baseAjaxTodo" href="/admin/config/sensorGraph/delete?id=43" title="你确定要删除吗？">删除</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('js')
    {{ $data->links('layouts.page', ['paginator' => $data]) }}
@endsection
