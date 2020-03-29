@extends('layouts.body')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/config/seo')}}">
                    <li class="layui-this">seo设置</li>
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
                    <label class="layui-form-label">使用 Slug</label>
                    <div class="layui-input-block">
                        <input type="radio" name="206" value="true" title="是" @if($config['config.is_slug']=='true')checked @endif >
                        <input type="radio" name="206" value="false" title="否" @if($config['config.is_slug']=='false') checked @endif >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站名</label>
                    <div class="layui-input-block">
                        <input type="text" name="201" required lay-verify="required" placeholder="" autocomplete="off"
                               class="layui-input" value="{{ $config['app.name'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="202" required lay-verify="required" placeholder="" autocomplete="off"
                               class="layui-input" value="{{ $config['config.head.title'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站关键字</label>
                    <div class="layui-input-block">
                        <textarea name="203" placeholder=""
                                  class="layui-textarea">{{ $config['config.head.keywords'] }}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站描述</label>
                    <div class="layui-input-block">
                        <textarea name="204" placeholder=""
                                  class="layui-textarea">{{ $config['config.head.description'] }}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站图标</label>
                    <div class="layui-upload-drag" id="test10">
                        <i class="layui-icon"></i>
                        <p>点击上传，或将文件拖拽到此处</p>
                        <div class="@if(empty($config['config.head.icon']))layui-hide @endif " id="uploadDemoView">
                            <hr>
                            <img src="{{ $config['config.head.icon'] }}" alt="上传成功后渲染" style="max-width: 196px">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="cover" name="205" value="{{ $config['config.head.icon'] }}">
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
            upload.render({
                elem: '#test10'
                , acceptMime: 'image/*'
                , exts: 'ico'
                , size: 1024 * 2
                , url: '{{url('admin/articles/upload_image')}}'
                , done: function (res) {
                    if (res.success==1){
                        layer.msg('上传成功', {icon: 1});
                        $(".layui-upload-file").remove();
                        $("#cover").attr('value', res.url);
                        layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.url);
                    } else {
                        layer.msg('上传失败', {icon: 2});
                    }
                }, error: function () {
                    layer.msg('上传失败', {icon: 2});
                }
            });
        });
    </script>
@endsection
