@extends('layouts.home')
@section('title', $articles->title)
@section('keywords', $articles->keywords)
@section('description', $articles->description)
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

        .new-cont {
            min-height: 800px;
            overflow: hidden;
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
                        <li><a href="{{$item->url}}" alt="{{$item->name}}" title="{{$item->name}}">{{$item->name}}</a>
                        </li>
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
        var pathname="{{$articles->categories->name}}";
        $(".top-nav-right a").each(function(){
            var text=$(this).text();
            if (pathname==text)$(this).addClass('active');
        });
        $(".mnav a").each(function(){
            var text=$(this).text();
            if (pathname==text)$(this).addClass('selected');
        });
        var _pre = $('.new-cont pre');
        if (_pre.length > 0) {
            _pre.addClass("line-numbers").css("white-space", "pre-wrap");
        } else {
            _pre.addClass("line-numbers");
        }
    </script>
@endsection