<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title','陈大剩博客') @if(request()->path() != '/') - {{ config('config.head.title') }} @endif</title>
    <meta name="keywords" content="@yield('keywords','Cxb,php全栈成长之路,陈大剩博客,php程序员,全栈成长之路')"/>
    <meta name="description" content="@yield('description','一位正在努力的程序员,记录自己的成长之路！php全栈成长之路,陈大剩博客')"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('lib/layui/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('lib/layui/css/layui.css')}}">
    <link rel="shortcut icon" href="{{ config('config.head.icon') }}" type="image/x-icon">
    <script src="{{asset('lib/layui/jquery.min.js')}}"></script>
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    @yield('css')
</head>
@yield('body')
<script src="{{asset('lib/layui/layui.js')}}"></script>
<script src="{{ mix('js/admin.js') }}"></script>
@yield('js')
</html>