<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title','cxb')</title>
    <link rel="stylesheet" href="{{asset('lib/layui/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('lib/layui/css/layui.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description','null')" />
    <meta name="keyword" content="@yield('keyword','null')" />
    <script src="{{asset('lib/layui/jquery.min.js')}}"></script>
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="layui-easy layui-layout-body" style="overflow: auto;">
@yield('body')
<script src="{{asset('lib/layui/layui.js')}}"></script>
<script src="{{ mix('js/admin.js') }}"></script>
@yield('js')
</body>
</html>