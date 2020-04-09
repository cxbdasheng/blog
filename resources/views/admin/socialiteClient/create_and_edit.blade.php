@extends('layouts.body')
@section('title', '第三方登录列表')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/socialiteClient/index')}}">
                    <li>第三方登录列表</li>
                </a>
                <a href="javascript:void(0)">
                    <li class="layui-this">修改</li>
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-col-md5  mt-10">
            <form action="{{url('admin/socialiteClient/update',$data->id)}}" method="POST" class="layui-form " accept-charset="UTF-8">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">名称</label>
                    <div class="layui-input-block">
                        <input type="text" disabled autocomplete="off" class="layui-input"
                               value="{{$data->name}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> Client Id</label>
                    <div class="layui-input-block">
                        <input type="text" name="client_id" class="layui-input" value="{{$data->client_id}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">Client Secret</label>
                    <div class="layui-input-block">
                        <input type="text" name="client_secret" placeholder="" class="layui-input" value="{{$data->client_secret}}">
                    </div>
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
