@extends('layouts.body')
@section('title', '其他设置')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/config/other')}}">
                    <li class="layui-this">其他设置</li>
                </a>
            </ul>
            <div class="layui-tab-content">

            </div>
        </div>
        <div class="layui-col-md5  mt-10">
            <form enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post"
                  class="layui-form">
                {{ csrf_field() }}
                <fieldset class="layui-elem-field layui-field-title">
                    <legend>首页logo信息</legend>
                </fieldset>
                <div class="layui-form-item">
                    <label class="layui-form-label">Logo 类型</label>
                    <div class="layui-input-block">
                        <input type="radio" name="207" value="text" title="文字" lay-filter="login_type"
                               @if($config['config.login.type']=='text')checked @endif >
                        <input type="radio" name="207" value="img" title="图片" lay-filter="login_type"
                               @if($config['config.login.type']=='img') checked @endif >
                    </div>
                </div>
                <div class="layui-form-item" id="logo">
                    <label class="layui-form-label">Logo</label>
                    @if($config['config.login.type']=='text')
                        <div id="login_value">
                            <div class="layui-input-block">
                                <input type="text" name="208" required lay-verify="required" placeholder=""
                                       autocomplete="off"
                                       class="layui-input" value="{{ $config['config.login.value'] }}">
                            </div>
                        </div>
                    @else
                        <div class="" id="login_value">
                            <input type="hidden" name="208" lay-verify="required" id="inputimgurl"  placeholder="图片地址"
                                   value="{{$config['config.login.value']}}" class="layui-input">
                            <div class="layui-input-inline layui-btn-container" style="width: auto;">
                                <a class="layui-btn layui-btn-primary" id="editimg">上传图片</a>
                            </div>
                            <div class="layui-input-inline">
                                <div class="layui-upload-list" style="margin:0">
                                    <img src="{{$config['config.login.value']}}" id="srcimgurl" class="layui-upload-img"
                                         width="190">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <fieldset class="layui-elem-field layui-field-title">
                    <legend>底部相关</legend>
                </fieldset>
                <div class="layui-form-item">
                    <label class="layui-form-label">ICP 备案</label>
                    <div class="layui-input-block">
                        <input type="text" name="210" required lay-verify="required" placeholder="" autocomplete="off"
                               class="layui-input" value="{{ $config['config.icp'] }}">
                    </div>
                </div>
                <fieldset class="layui-elem-field layui-field-title">
                    <legend>文章相关</legend>
                </fieldset>
                <div class="layui-form-item">
                    <label class="layui-form-label">默认作者</label>
                    <div class="layui-input-block">
                        <input type="text" name="209" required lay-verify="required" placeholder="" autocomplete="off"
                               class="layui-input" value="{{ $config['config.author'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">水印字体大小</label>
                    <div class="layui-input-block">
                        <input type="text" name="212" required maxlength="2" lay-verify="required|number" placeholder="" autocomplete="off"
                               class="layui-input" value="{{ $config['config.water.size'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">水印内容</label>
                    <div class="layui-input-block">
                        <input type="text" name="211" required lay-verify="required" placeholder="" autocomplete="off"
                               class="layui-input" value="{{ $config['config.water.text'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">水印颜色</label>
                    <div class="layui-input-inline" style="width: 120px;">
                        <input type="text" name="213" value="{{ $config['config.water.color'] }}" placeholder="请选择颜色"
                               class="layui-input" id="test-form-input">
                    </div>
                    <div class="layui-inline" style="left: -11px;">
                        <div id="test-form"></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">第三方统计代码</label>
                    <div class="layui-input-block">
                        <textarea name="214" placeholder=""
                                  class="layui-textarea">{{ $config['config.statistics'] }}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">链接打开方式</label>
                    <div class="layui-input-block">
                        <input type="radio" name="216" value="_blank" title="新标签"
                               @if($config['config.link_type']=='_blank')checked @endif >
                        <input type="radio" name="216" value="_self" title="当前标签"
                               @if($config['config.link_type']=='_self') checked @endif >
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
        layui.config({
            base: '/lib/layui/cropper/' //layui自定义layui组件目录
        }).use(['form', 'croppers', 'element', 'cropper', 'layer', 'upload', 'colorpicker'], function () {
            var $ = layui.jquery
                , form = layui.form
                , croppers = layui.croppers
                , layer = layui.layer
                , upload = layui.upload
                , colorpicker = layui.colorpicker
                , element = layui.element;
            @include('shared._error')@include('shared._messages')
            colorpicker.render({
                elem: '#test-form'
                , color: '{{$config['config.water.color']}}'
                , done: function (color) {
                    $('#test-form-input').val(color);
                }
            });

            form.on('radio(login_type)', function (data) {
                $('#login_value').remove();
                if (data.value == 'img') {
                    var html = '<div class="" id="login_value">\n' +
                        '<input type="hidden" name="208" lay-verify="required" id="inputimgurl" placeholder="图片地址"\n' +
                        'value="@if($config['config.login.type']=='img'){{$config['config.login.value']}} @endif" class="layui-input">\n' +
                        '<div class="layui-input-inline layui-btn-container" style="width: auto;">\n' +
                        '<a class="layui-btn layui-btn-primary" id="editimg">上传图片</a>\n' +
                        '</div>\n' +
                        '<div class="layui-input-inline">\n' +
                        '<div class="layui-upload-list" style="margin:0">\n' +
                        '<img src="@if($config['config.login.type']=='img'){{$config['config.login.value']}} @endif" id="srcimgurl" class="layui-upload-img" width="190">\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';

                } else {
                    var html = '<div id="login_value">\n' +
                        '<div class="layui-input-block">\n' +
                        '<input type="text" name="208" required lay-verify="required" placeholder="" autocomplete="off"\n' +
                        'class="layui-input" value="@if($config['config.login.type']=='text'){{$config['config.login.value']}} @endif">\n' +
                        '</div>\n' +
                        '</div>';
                }
                $('#logo').append(html);
            });
            croppers.render({
                elem: '#editimg'
                , saveW: 350     //保存宽度
                , saveH: 82
                , mark: 4.26 / 1    //选取比例
                , area: '900px'  //弹窗宽度
                , url: "{{url('admin/articles/upload_image')}}"  //图片上传接口返回和（layui 的upload 模块）返回的JOSN一样
                , done: function (url) { //上传完毕回调
                    $("#inputimgurl").val(url);
                    $("#srcimgurl").attr('src', url);
                }
            });
        });
    </script>
@endsection
