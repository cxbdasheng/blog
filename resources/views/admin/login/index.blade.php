@extends('layouts.base')
@section('body')
    <body class="login-bg">
    <div class="login layui-anim">
        <div class="message">
            <h2 class="login-title">陈大剩博客登入</h2>
        </div>
        <form action="{{ url('auth/admin/login') }}" method="post"  class="layui-form" >
            <input name="email" placeholder="用户名" type="text" lay-verify="required" class="layui-input" value="{{ old('email') }}">
            <hr class="hr15">
            @csrf
            <input name="password" lay-verify="required" placeholder="密码" type="password" class="layui-input">
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20">
        </form>
    </div>
    </body>
@endsection
@section('js')
    <script>
        layui.use(['layer', 'form'], function () {
            @include('shared._error')
        });
    </script>
@endsection