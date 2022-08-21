@extends('layouts.body')
@section('title', '邮箱设置')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/services/tencent')}}">
                    <li class="layui-this">腾讯云设置</li>
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
                    <label class="layui-form-label">secret_id</label>
                    <div class="layui-input-block">
                        <input type="text" name="229" class="layui-input"
                               value="{{ $config['services.tencent_cloud.secret_id'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">secret_key</label>
                    <div class="layui-input-block">
                        <input type="text" name="230" class="layui-input"
                               value="{{ $config['services.tencent_cloud.secret_key'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">region</label>
                    <div class="layui-input-block">
                        <input type="text" name="231" class="layui-input"
                               value="{{ $config['services.tencent_cloud.region'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">project_id</label>
                    <div class="layui-input-block">
                        <input type="text" name="232" class="layui-input"
                               value="{{ $config['services.tencent_cloud.project_id'] }}">
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
