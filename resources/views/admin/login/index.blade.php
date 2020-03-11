@extends('layouts.base')
@section('body')
    <body class="login-bg">
    <div class="login layui-anim">
        <div class="message">
            <h2 class="login-title">陈大剩博客登入</h2>
        </div>
        <form action="{{ url('auth/admin/login') }}" method="post"  class="layui-form" >
            <input name="username" placeholder="用户名" type="text" lay-verify="required" class="layui-input">
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
        $(function  () {
            layui.use('form', function(){
                var form = layui.form;
                form.on('submit(login)', function () {
                    return true;
                });
            });
        });
    </script>
@endsection