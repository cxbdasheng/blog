@extends('layouts.body')
@section('title', 'seo设置')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/config/mail')}}">
                    <li class="layui-this">邮箱设置</li>
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
                    <label class="layui-form-label">邮箱服务器类型</label>
                    <div class="layui-input-block">
                        <input type="text" name="220"  class="layui-input" value="{{ $config['mail.default'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱服务器地址</label>
                    <div class="layui-input-block">
                        <input type="text" name="221"  class="layui-input" value="{{ $config['mail.mailers.smtp.host'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱服务器端口</label>
                    <div class="layui-input-block">
                        <input type="text" name="222"  class="layui-input" value="{{ $config['mail.mailers.smtp.port'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">加密方式</label>
                    <div class="layui-input-block">
                        <input type="text" name="223"  class="layui-input" value="{{ $config['mail.mailers.smtp.encryption'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱账号</label>
                    <div class="layui-input-block">
                        <input type="text" name="224"  class="layui-input" value="{{ $config['mail.mailers.smtp.username'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱密码</label>
                    <div class="layui-input-block">
                        <input type="text" name="225"  class="layui-input" value="{{ $config['mail.mailers.smtp.password'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">发件人名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="226"  class="layui-input" value="{{ $config['mail.from.name'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">发件人邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" name="227"  class="layui-input" value="{{ $config['mail.from.address'] }}">
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
