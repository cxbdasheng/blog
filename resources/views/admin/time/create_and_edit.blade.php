@extends('layouts.body')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/time/index')}}">
                    <li>时间轴管理</li>
                </a>
                <a href="javascript:void(0)">
                    @if($data->id)
                        <li class="layui-this">修改时间点</li>
                    @else
                        <li class="layui-this">新增时间点</li>
                    @endif
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-col-md5  mt-10">
            @if($data->id)
                <form action="{{url('admin/time/update',$data->id)}}" method="POST" class="layui-form "
                      accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                        <form action="{{url('admin/time/store')}}" method="post" class="layui-form ">
                            @endif
                            @csrf
                            <div class="layui-form-item">
                                <label class="layui-form-label">内容</label>
                                <div class="layui-input-block">
                                    <textarea name="content" placeholder="请输入内容" class="layui-textarea"  style="min-height: 300px;">{{old('content',$data->content)}}</textarea>
                                </div>
                            <div class="buttons" style="">
                                <button class="layui-btn" lay-submit="" lay-filter="submit">提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        layui.use(['layer', 'form'], function () {@include('shared._error')@include('shared._messages')});
    </script>
@endsection
