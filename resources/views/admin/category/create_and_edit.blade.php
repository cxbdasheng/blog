@extends('layouts.body')
@if($data->id)
    @section('title', '修改分类')
@else
    @section('title', '新增分类')
@endif
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/category/index')}}">
                    <li>分类管理</li>
                </a>
                <a href="javascript:void(0)">
                    @if($data->id)
                        <li class="layui-this">修改分类</li>
                    @else
                        <li class="layui-this">新增分类</li>
                    @endif
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-col-md5  mt-10">
            @if($data->id)
                <form action="{{url('admin/category/update',$data->id)}}" method="POST" class="layui-form "
                      accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                        <form action="{{url('admin/category/store')}}" method="post" class="layui-form ">
                            @endif
                            @csrf
                            <div class="layui-form-item">
                                <label class="layui-form-label">分类名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="name" required lay-verify="required" placeholder=""
                                           autocomplete="off" class="layui-input" value="{{old('name',$data->name)}}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">关键词</label>
                                <div class="layui-input-block">
                                    <input type="text" name="keywords" required lay-verify="required" placeholder=""
                                           autocomplete="off" class="layui-input"
                                           value="{{old('keywords',$data->keywords)}}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">描述</label>
                                <div class="layui-input-block">
                                    <input type="text" name="description" required lay-verify="required" placeholder=""
                                           autocomplete="off" class="layui-input"
                                           value="{{old('description',$data->description)}}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">排序</label>
                                <div class="layui-input-block">
                                    <input type="text" maxlength="3" name="sort" required lay-verify="required|number" placeholder=""
                                           autocomplete="off" class="layui-input" value="{{old('sort',$data->sort)}}">
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
