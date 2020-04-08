@extends('layouts.body')
@if($data->id)
    @section('title', '修改第三方用户')
@else
    @section('title', '新增链接')
@endif
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/socialiteUser/index')}}">
                    <li>第三方用户管理</li>
                </a>
                <a href="javascript:void(0)">
                    <li class="layui-this">修改用户</li>
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-col-md5  mt-10">
            <form action="{{url('admin/socialiteUser/update',$data->id)}}" method="POST" class="layui-form "
                  accept-charset="UTF-8">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">类型</label>
                    <div class="layui-input-block">
                        <input type="text" disabled class="layui-input" value="{{$data->socialiteClient->name}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" required lay-verify="required|email" placeholder="" autocomplete="off"
                               class="layui-input" value="{{$data->email}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" required lay-verify="required" placeholder="" autocomplete="off"
                               class="layui-input" value="{{$data->name}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">管理员?</label>
                    <div class="layui-input-block">
                        <input type="radio" name="is_admin" value="1" title="是" @if($data->is_admin==1)checked @endif >
                        <input type="radio" name="is_admin" value="0" title="否" @if($data->is_admin==0)checked @endif >
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
