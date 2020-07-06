@extends('layouts.body')
@if($data->id)
    @section('title', '修改文章')
@else
    @section('title', '新增文章')
@endif
@section('css')
    <link rel="stylesheet" href="{{ asset('lib/editor/css/editormd.min.css') }}">
    <style>
        #editor{
            z-index: 1000;
        }
        .buttons{
            z-index: 1001;
        }
    </style>
@endsection
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/articles/index')}}">
                    <li>文章管理</li>
                </a>
                <a href="javascript:void(0)">
                    @if($data->id)
                        <li class="layui-this">修改文章</li>
                    @else
                        <li class="layui-this">新增文章</li>
                    @endif
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-col-md11">
            @if($data->id)
                <form action="{{url('admin/articles/update',$data->id)}}" method="POST" class="layui-form" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                        <form action="{{url('admin/articles/store')}}" method="post" class="layui-form ">
                            @endif
                            @csrf
                            <div class="layui-form-item">
                                <label class="layui-form-label">分类</label>
                                <div class="layui-input-block">
                                    <select name="category_id" lay-verify="required">
                                        @foreach($category as $index => $items )
                                            <option value="{{$items->id}}" @if($items->id==old('category_id',$data->category_id))selected @endif >{{$items->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">标题</label>
                                <div class="layui-input-block">
                                    <input type="text" name="title" required lay-verify="required" placeholder=""
                                           autocomplete="off" class="layui-input" value="{{old('title',$data->title)}}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">作者</label>
                                <div class="layui-input-block">
                                    <input type="text" name="author" required lay-verify="required" placeholder=""
                                           autocomplete="off" class="layui-input"
                                           value="{{old('author',$data->author?$data->author:config('config.author'))}}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">关键词</label>
                                <div class="layui-input-block">
                                    <input type="text" name="keywords" required lay-verify="required"
                                           placeholder="用(,)逗号分隔"
                                           autocomplete="off" class="layui-input"
                                           value="{{old('keywords',$data->keywords)}}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">标签</label>
                                <div class="layui-input-block">
                                    @foreach($tag as $index => $items)
                                        <input type="checkbox" name="tags[]" value="{{$items->id}}" title="{{$items->name}}" @if(in_array($items->id, $data->tags)) checked @endif>
                                    @endforeach
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">封面</label>
                                <div class="layui-upload-drag" id="test10">
                                    <i class="layui-icon"></i>
                                    <p>点击上传，或将文件拖拽到此处</p>
                                    <div class="@if(empty($data->cover))layui-hide @endif " id="uploadDemoView">
                                        <hr>
                                        <img src="{{old('cover',$data->cover)}}" alt="上传成功后渲染" style="max-width: 196px">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="cover" name="cover" value="{{old('cover',$data->cover)}}">
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">描述</label>
                                <div class="layui-input-block">
                                    <textarea name="description" placeholder="请输入内容" class="layui-textarea"  maxlength="180">@if(isset($data->description)) {{$data->description}}@else {{old('description',$data->description)}} @endif</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">是否置顶</label>
                                <div class="layui-input-block" >
                                    <input type="radio" name="is_top" value="1"  title="是" @if(old('is_top',$data->is_top)==1)checked @endif >
                                    <input type="radio" name="is_top" value="0" title="否" @if(old('is_top',$data->is_top)==0)checked @endif>
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">内容</label>
                                <div class="layui-input-block" >
                                    <div class="" id="editor">
                                        <textarea style="display:none;" name="markdown" placeholder="请输入内容" class="layui-textarea">{{old('markdown',$data->markdown)}}</textarea>
                                    </div>
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
    <script src="{{ asset('lib/editor/editormd.min.js') }}"></script>
    <script>
        var testEditor;
        $(function () {
            layui.use(['layer', 'form', 'upload'], function () {
                var $ = layui.jquery
                    , upload = layui.upload;
                @include('shared._error')@include('shared._messages')
                //拖拽上传
                upload.render({
                    elem: '#test10'
                    , acceptMime: 'image/*'
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
            editormd.urls.atLinkBase = "https://github.com/";
            testEditor = editormd("editor", {
                autoFocus : false,
                width     : "100%",
                height    : 720,
                toc       : true,
                todoList  : true,
                placeholder: "请输入内容",
                toolbarAutoFixed: false,
                syncScrolling: "single",
                path      : '{{ asset('/lib/editor/lib') }}/',
                emoji: true,
                toolbarIcons : ['undo', 'redo', 'bold', 'del', 'italic', 'quote', 'uppercase', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'list-ul', 'list-ol', 'hr', 'link', 'reference-link', 'image', 'code', 'code-block', 'table', 'emoji', 'html-entities', 'watch', 'preview', 'search', 'fullscreen'],
                imageUpload: true,
                imageUploadURL : '{{ url('admin/articles/upload_image') }}',
            });
        });
    </script>
@endsection
