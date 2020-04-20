@extends('layouts.body')
@section('title', '社会化分析设置')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/config/socialShare')}}">
                    <li class="layui-this">社会化分析设置</li>
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
                    <label class="layui-form-label">选择插件：</label>
                    <div class="layui-input-block">
                        <input type="radio" name="217" value="jssocials" title="jssocials" @if($config['config.social_share.select_plugin']=='jssocials')checked @endif >
                        <input type="radio" name="217" value="sharejs" title="sharejs" @if($config['config.social_share.select_plugin']=='sharejs') checked @endif >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站关键字</label>
                    <div class="layui-input-block">
                        <textarea name="218" placeholder="" style="height: 200px" class="layui-textarea">{!! $config['config.social_share.jssocials_config'] !!}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站描述</label>
                    <div class="layui-input-block">
                        <textarea name="219" placeholder="" style="height: 200px"  class="layui-textarea">{!! $config['config.social_share.sharejs_config'] !!}</textarea>
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
