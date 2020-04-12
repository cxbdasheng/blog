@extends('layouts.body')
@section('title', '修改管理员')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/user/index')}}">
                    <li>管理员管理</li>
                </a>
                <a href="javascript:void(0)">
                    <li class="layui-this">修改管理员</li>
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-col-md5  mt-10">
            <form action="{{url('admin/user/update',$data->id)}}" method="POST" class="layui-form "
                  accept-charset="UTF-8">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text"  name="name" required lay-verify="required" class="layui-input" value="{{$data->name}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" required lay-verify="required|email" class="layui-input" value="{{$data->email}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-block">
                        <input type="text" name="password" class="layui-input" >
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
