@extends('layouts.body')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="javascript:void(0)">
                    <li class="layui-this">文章管理</li>
                </a>
                <a href="{{url('admin/articles/create')}}">
                    <li class="">新增文章</li>
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
                                <input id="boxCode" name="name" placeholder="分类名" class="layui-input" type="text"
                                       value="{{old('name')}}" maxlength="50"></div>
                        </div>
                        <div class="layui-inline">
                            <a href="{{url('admin/articles/index')}}" class="layui-btn">重置</a>
                            <button id="btnSubmit" type="submit" class="layui-btn">查询</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="layui-table">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>分类</th>
                    <th>标题</th>
                    <th>点击数</th>
                    <th>状态</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $index => $items)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$items->categories->name}}</td>
                        <td>{{$items->title}}</td>
                        <td>{{$items->views}}</td>
                        <td>
                            @if (is_null($items->deleted_at))
                                √
                            @else
                                ×
                            @endif
                        </td>
                        <td>{{$items->created_at}}</td>
                        <td>
                            <a class="layui-btn layui-btn-xs" href="{{url('admin/articles/edit/'.$items->id)}}">修改</a>
                            @if(is_null($items->deleted_at))
                                <a class="layui-btn layui-btn-xs layui-btn-normal J-baseAjaxTodo"
                                   href="{{url('admin/articles/destroy/'.$items->id)}}" title="你确定要删除吗？">删除</a>
                            @else
                                <a class="layui-btn layui-btn-xs layui-btn-warm J-baseAjaxTodo"
                                   href="{{url('admin/articles/restore/'.$items->id)}}" title="你确定要删除吗？">恢复</a>
                                <a class="layui-btn layui-btn-xs layui-btn-danger J-baseAjaxTodo"
                                   href="{{url('admin/articles/forceDelete/'.$items->id)}}" title="你确定要删除吗？">彻底删除</a>
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
@endsection
