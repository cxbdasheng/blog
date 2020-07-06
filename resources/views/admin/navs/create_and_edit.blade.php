@extends('layouts.body')
@if($data->id)
    @section('title', '修改导航')
@else
    @section('title', '新增导航')
@endif
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/nav/index')}}">
                    <li>导航管理</li>
                </a>
                <a href="javascript:void(0)">
                    @if($data->id)
                        <li class="layui-this">修改导航</li>
                    @else
                        <li class="layui-this">新增导航</li>
                    @endif
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-col-md5  mt-10">
            @if($data->id)
                <form action="{{url('admin/nav/update',$data->id)}}" method="POST" class="layui-form "
                      accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                        <form action="{{url('admin/nav/store')}}" method="post" class="layui-form ">
                            @endif
                            @csrf
                            <div class="layui-form-item">
                                <label class="layui-form-label">导航名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="name" required lay-verify="required" placeholder=""
                                           autocomplete="off" class="layui-input" value="{{old('name',$data->name)}}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">URL</label>
                                <div class="layui-input-block">
                                    <input type="text" name="url" required lay-verify="required" placeholder=""
                                           autocomplete="off" class="layui-input"
                                           value="{{old('URL',$data->url)}}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">排序</label>
                                <div class="layui-input-block">
                                    <input type="text" name="sort" maxlength="3"  placeholder=""
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
