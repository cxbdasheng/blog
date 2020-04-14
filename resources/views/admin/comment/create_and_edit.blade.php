@extends('layouts.body')
@section('title', '修改评论')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="{{url('admin/comment/index')}}">
                    <li>评论管理</li>
                </a>
                <a href="javascript:void(0)">
                    <li class="layui-this">修改评论</li>
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-col-md5  mt-10">
            <form action="{{url('admin/comment/update',$data->id)}}" method="POST" class="layui-form "
                  accept-charset="UTF-8">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">内容</label>
                    <div class="layui-input-block">
                                    <textarea name="content" placeholder="请输入内容" class="layui-textarea" style="min-height: 300px;">{{old('content',$data->content)}}</textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">已审核</label>
                    <div class="layui-input-block" >
                        <input type="radio" name="is_audited" value="1"  title="是" @if(old('is_audited',$data->is_audited)==1)checked @endif >
                        <input type="radio" name="is_audited" value="0" title="否" @if(old('is_audited',$data->is_audited)==0)checked @endif>
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
