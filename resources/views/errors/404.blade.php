@extends('layouts.home')
@section('title', '404 not found')
@section('css')
    <style>
        .left-content img{
            margin: auto;
        }
        .left-titel .name:after,.p-titel:before,.m-titel:after,.m-titel:before,.p-titel:after,.c-titel:before,.c-titel:after,.l-titel:before,.l-titel:after{
            background:red;
        }
        .p-titel,.m-titel,.c-titel,.l-titel{
            color: red;
        }
        .left-content{
            padding: 60px;
        }
        .left-content p{
            margin-bottom: 30px;
            height: 20px;
            text-align: center;
            line-height: 20px;
        }
        .left-content #mes{
            font-size: 30px;
            color: red;
        }
        .left-content .hint{
            color: red;
        }
        .left-content a{
            color: #259AEA;
        }
    </style>
@endsection
@section('body')
    <div class="main-left">
        <div class="left-titel">
            <h2 class="name" style="color: red;">错误提示</h2>
        </div>
        <div class="left-content">
            <img src="{{ cdn_asset('img/kfz.gif') }}" alt="404错误" title="404错误">
            <p>将在 <span id="mes">5</span> 秒钟后返回<a href="/">{{ config('app.name') }}</a>首页</p>
            <p class="hint">非常抱歉 - 您可能输入了错误的网址，或者该网页已删除或移动</p>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var i = 5;
        var intervalid;
        intervalid = setInterval("fun()", 1000);
        function fun() {
            if (i == 0) {
                window.location.href = "/";
                clearInterval(intervalid);
            }
            document.getElementById("mes").innerHTML = i;
            i--;
        }
    </script>
@endsection
