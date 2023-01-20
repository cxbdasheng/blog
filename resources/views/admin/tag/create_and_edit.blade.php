@extends('layouts.body')
@if($data->id)
    @section('title', '修改标签')
@else
    @section('title', '新增标签')
@endif
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/tag/index')}}">
                    <li>标签管理</li>
                </a>
                <a href="javascript:void(0)">
                    @if($data->id)
                        <li class="layui-this">修改标签</li>
                    @else
                        <li class="layui-this">新增标签</li>
                    @endif
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-col-md5  mt-10">
            @if($data->id)
            <form action="{{url('admin/tag/update',$data->id)}}" method="POST" class="layui-form "
                  accept-charset="UTF-8">
                <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{url('admin/tag/store')}}" method="post" class="layui-form ">
                        @endif
                        @csrf
                        <div class="layui-form-item">
                            <label class="layui-form-label">标签名</label>
                            <div class="layui-input-block">
                                <input type="text" name="name" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" maxlength="20" value="{{old('name',$data->name)}}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="keywords" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{old('keywords',$data->keywords)}}" maxlength="100">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">描述</label>
                            <div class="layui-input-block">
                                <textarea name="description" placeholder="" class="layui-textarea" required lay-verify="required" placeholder="" autocomplete="off" maxlength="255">{{old('description',$data->description)}}</textarea>
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
