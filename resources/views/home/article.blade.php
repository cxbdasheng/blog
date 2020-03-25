@extends('layouts.home')
@section('css')
    {{--<link rel="stylesheet" href="{{asset('css/prism.css')}}" type="text/css" />--}}
    <style>
        .main-left .text {
            background: #fff;
            min-height: 20px;
            border-radius: 5px;
            padding: 0 20px;
            overflow: hidden;
        }

        .article-title {
            padding: 20px 0;
            font-size: 22px;
            color: #222;
        }

        .new-info {
            margin-bottom: 15px;
        }

        .new-info li {
            float: left;
            margin-right: 15px;
        }

        .new-info li i {
            margin-right: 4px;
        }

        .click {
            width: 100%;
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .c-titel {
            text-align: center;
            position: relative;
            margin: 20px;
        }

        .c-titel:before {
            content: "";
            width: 25%;
            height: 2px;
            background: #000;
            position: absolute;
            left: 0;
            bottom: 8px;
        }

        .c-titel:after {
            content: "";
            width: 25%;
            height: 2px;
            background: #000;
            position: absolute;
            right: 0;
            bottom: 8px;
        }

        .click ul {
            margin-bottom: 20px;
        }

        .main-right {
            position: relative;
        }

        .right-fix {
            position: absolute;
        }

        .click a {
            position: relative;
            display: block;
            overflow: hidden;
            margin-left: -3px;
            padding: 10px 15px 10px 0px;
            border-bottom: solid 1px #eee;
            border-left: 3px solid transparent;
            font-size: 14px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .click li:last-child a {
            border-bottom: none;
        }

        .click a:hover {
            background-color: #fafff8;
        }

        .zan-k:hover {
            background: #2F889A;
            color: #fff;
        }

        .c-img {
            float: left;
        }

        .c-img img {
            width: 80px;
            height: 55px;
        }

        .c-right {
            float: left;
        }

        .click .text {
            display: block;
        }

        .click .muted {
            margin-right: 40px;
            font-size: 12px;
            color: #999;
        }

        .panel {
            width: 100%;
            /*    height: 500px;*/
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .p-titel {
            text-align: center;
            position: relative;
            margin: 20px;
        }

        .p-titel:before {
            content: "";
            width: 25%;
            height: 2px;
            background: #000;
            position: absolute;
            left: 0;
            bottom: 8px;
        }

        .p-titel:after {
            content: "";
            width: 25%;
            height: 2px;
            background: #000;
            position: absolute;
            right: 0;
            bottom: 8px;
        }

        .p-tal ul {
            padding-left: 20px;
            padding-right: 20px;
        }

        .p-tal ul li {
            float: left;
            display: block;
            margin-right: 8px;
            margin-bottom: 15px;
        }

        .p-tal ul li a {
            display: inline-block;
            padding: 10px 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #fff;
            color: #666;
            font-size: 12px;
            transition: all .3s ease 0s;
        }

        .tags {
            margin: 15px 0;
            color: #666;
        }

        .tags li {
            float: left;
            margin-right: 8px;
            line-height: 26px;
        }

        .tags li a {
            padding: 0px 10px;
            background: #eee;
            margin-right: 10px;
            margin-bottom: 10px;
            line-height: 26px;
            border-radius: 2px;
            color: #666;
            display: inline-block;
        }

        .tags li a:hover {
            background: #666;
            color: #fff;
        }

        .shuoming {
            padding: 0px 20px;
            margin: 20px -20px 10px -20px;
            background: #fff;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .shuoming .title {
            margin: -12px auto;
            text-align: center;
            padding-bottom: 10px;
            overflow: hidden;
        }

        .shuoming .title span {
            display: inline-block;
            padding: 4px 15px;
            color: #999;
            font-size: 14px;
            max-width: 100%;
            font-weight: normal;
            background: #ffffff;
            border: 1px solid #ddd;
        }

        .shuoming p {
            margin: 20px 0px;
            color: #8c8c8c;
            text-align: center;
            font-size: 12px;
            overflow: hidden;
        }

        .article-action {
            padding: 10px;
            margin-top: 20px;
        }

        .xshare {
            font-size: 14px;
            margin-right: 15px;
            float: left;
            width: 75%;
        }

        span.xshare-title {
            float: left;
            position: relative;
            top: 9px;
            margin-right: 8px;
        }

        .zan {
            overflow: hidden;
            padding: 0;
            float: right;
        }

        .zan-k {
            display: inline-block;
            line-height: 1;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            border: 1px solid #74808e;
            border-radius: 2px;
            color: #74808e;
            background: #ffffff;
            height: 18px;
        }

        .new-cont {
            min-height: 800px;
            overflow: hidden;
        }

        .about {
            width: 100%;
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .ab-titel {
            text-align: center;
            position: relative;
            margin: 20px;
        }

        .ab-titel:before {
            content: "";
            width: 25%;
            height: 2px;
            background: #000;
            position: absolute;
            left: 0;
            bottom: 8px;
        }

        .ab-titel:after {
            content: "";
            width: 25%;
            height: 2px;
            background: #000;
            position: absolute;
            right: 0;
            bottom: 8px;
        }

        .herdimg {
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 50px;
            margin: auto;
        }

        .herdimg img {
            width: 100px;
            height: 100px;
        }

        .ab-info {
            line-height: 30px;
            padding: 10px;
        }

        .ab-info p {
            background: #f6f6f6;
            margin: 5px 0;
            padding-left: 10px;
            border-radius: 5px;
            text-shadow: rgba(255, 255, 255, 0.3) 0px 1px 0px;
        }

        @media screen and (max-width: 1023px) {
            .main-left {
                width: 100%;
            }

            .main-right {
                display: none;
            }

            .xshare {
                width: 100%;
                float: none;
            }

            .zan {
                margin-top: 10px;
                float: none;
                width: 100%;
                text-align: center;
            }
        }
    </style>
@endsection
@section('body')
    <div class="main-left">
        <div class="text">
            <h1 class="article-title">
                {{ $articles->title}}</h1>
            <div class="new-info">
                <ul>
                    <li><i class="iconfont icon-morentouxiang"></i>{{$articles->author}}</li>
                    <li><i class="iconfont icon-rilicalendar107"></i>{{$articles->created_at}}</li>
                    <li><i class="iconfont icon-ai-eye"></i>{{$articles->views}}</li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="tags">
                <ul>
                    <li><i class="iconfont icon-biaoqian"></i>标签:</li>
                    @foreach($articles->tags as $item)
                    <li><a href="/label/1" alt="{{$item->name}}" title="{{$item->name}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
                <div class="clear"></div>
            </div>
            <div class="new-cont">
                {!! $articles->html!!}
            </div>
            <div class="tags">
                <ul>
                    <li><i class="iconfont icon-biaoqian"></i>标签:</li>
                    @foreach($articles->tags as $item)
                        <li><a href="/label/1" alt="{{$item->name}}" title="{{$item->name}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('js/prism.js')}}"></script>
    <script>
            var _pre=$('.new-cont pre');
            if (_pre.length>0){
                _pre.addClass("line-numbers").css("white-space", "pre-wrap");
            }else{
                _pre.addClass("line-numbers");
            }
    </script>
@endsection