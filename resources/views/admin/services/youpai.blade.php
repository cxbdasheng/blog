@extends('layouts.body')
@section('title', '又拍云储存设置')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/services/youpai')}}">
                    <li class="layui-this">又拍云储存设置</li>
                </a>
            </ul>
            <div class="layui-tab-content">

            </div>
        </div>
        <div class="layui-col-md5  mt-10">
            <form enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post"
                  class="layui-form">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label class="layui-form-label">加速域名</label>
                    <div class="layui-input-block">
                        <input type="text" name="236" class="layui-input"
                               value="{{ $config['services.youpai.host'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">服务名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="233" class="layui-input"
                               value="{{ $config['services.youpai.bucket'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">操作员</label>
                    <div class="layui-input-block">
                        <input type="text" name="234" class="layui-input"
                               value="{{ $config['services.youpai.username'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">操作员密码</label>
                    <div class="layui-input-block">
                        <input type="text" name="235" class="layui-input"
                               value="{{ $config['services.youpai.password'] }}">
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
        layui.use(['layer', 'form', 'upload'], function () {
            var $ = layui.jquery
                , upload = layui.upload;
            @include('shared._error')@include('shared._messages')
            //拖拽上传
        });
    </script>
@endsection
