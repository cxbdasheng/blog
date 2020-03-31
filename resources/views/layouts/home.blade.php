<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','陈大剩博客') @if(request()->path() != '/') - {{ config('config.head.title') }} @endif</title>
    <meta name="keywords" content="@yield('keywords','Cxb,php全栈成长之路,陈大剩博客,php程序员,全栈成长之路')"/>
    <meta name="description" content="@yield('description','一位正在努力的程序员,记录自己的成长之路！php全栈成长之路,陈大剩博客')"/>
    <meta name="author" content="Cxb,chenDasheng"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ config('config.head.icon') }}" type="image/x-icon">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('ico/iconfont.css') }}" rel="stylesheet">
    <script src="{{asset('lib/layui/jquery.min.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    @yield('css')
</head>
<body>
<!-- 	顶部开始 -->
<div class="top">
    <div class="top-header">
        <div class="top-weclome">
            <script type="text/javascript">
                var Hours = new Date().getHours();
                var meg = '';
                if (Hours <= 6) {
                    meg = "凌晨";
                }
                else if (Hours <= 11) {
                    meg = "早上";
                }
                else if (Hours <= 14) {
                    meg = "中午";
                }
                else if (Hours <= 19) {
                    meg = "下午";
                }
                else {
                    meg = "晚上";
                }
                ;
                document.write('Hi' + meg + '好，现在是：' + new Date().getFullYear() + "年" + (new Date().getMonth() + 1) + "月" + new Date().getDate() + "日" + " " + "星期" + "日一二三四五六".charAt(new Date().getDay()));
            </script>
        </div>
    </div>
    <div class="top_2">
        <div class="top-nav">
            <div class="top-nav-left">
                <a href="/">
                @if(config('config.login.type')=='img')
                   <img src="{{config('config.login.value')}}" alt="{{ config('config.head.title') }}">
                @else
                   <h1>{{config('config.login.value')}}</h1>
                @endif
                </a>
            </div>
            <div class="top-nav-right">
                <ul>
                    <li><a id="nav" href="/">首页</a></li>
                    @foreach($category as $item)
                        <li><a id="nav" href="{{$item->url}}">{{ $item->name}}</a></li>
                    @endforeach
                    @foreach($navs as $item)
                        <li><a id="nav" href="{{$item->url}}">{{ $item->name}}</a></li>
                    @endforeach
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="min-nav">
        <div class="overlay">
            <i class="iconfont icon-zhedie" id="check-nav"></i>
        </div>
        <h1 class="logo"><a href="/">
                @if(config('config.login.type')=='img')
                    <img src="{{config('config.login.value')}}" alt="{{ config('config.head.title') }}">
                @else
                    {{config('config.login.value')}}
                @endif
            </a></h1>
    </div>
    <div class="left-nav">
        <div class="mnav">
            <a id="left-nav" href="/">首页</a>
            @foreach($category as $item)
                <li><a id="nav" href="{{$item->url}}">{{ $item->name}}</a></li>
            @endforeach
            @foreach($navs as $item)
                <li><a id="nav" href="{{$item->url}}">{{ $item->name}}</a></li>
            @endforeach
        </div>
        <div class="mp"></div>
    </div>
</div>
<!-- 内容开始 -->
<div class="body">
    @yield('body')
    <div class="main-right">
        <form action="{{route('home.search')}}" class="search clear" method="get">
            <input type="text" class="s-content" id="search" name="wd" value="@if(!empty($wd)){{$wd}}@endif" placeholder="">
            <button class="s-btn">搜索</button>
        </form>
        <div class="right-fix">
            <div class="panel pb10">
                <h2 class="p-titel">
                    标签列表
                </h2>
                <div class="p-tal" >
                    <ul>
                        @foreach($tag as $item)
                            <li><a href="{{$item->url}}" alt="{{$item->name}}"
                                   title="{{$item->name}}">{{$item->name}}</a></li>
                        @endforeach
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
            {{--<div class="message">--}}
            {{--<h2 class="m-titel">--}}
            {{--留言墙--}}
            {{--</h2>--}}
            {{--<div class="w">--}}
            {{--</div>--}}
            {{--<div class="clear" style="margin-top: 20px;"></div>--}}
            {{--</div>--}}
            <div class="click">
                <h2 class="c-titel">
                    置顶推荐
                </h2>
                <ul>
                    @foreach($topArticle as $item)
                        <li><a href="{{$item->url}}" target="{{config('config.link_type')}}" alt="{{$item->title}}" title="{{$item->title}}"><span
                                        class="c-img">
                                <img class="lazy" data-original="{{$item->cover}}" alt="{{$item->title}}" title="{{$item->title}}"></span>
                                <div class="c-right"><span class="text">{{$item->title}}</span>
                                    <div class="c-foot"><span class="muted">{{$item->created_at}}</span><span
                                                class="muted-r"><span
                                                    class="ds-thread-count" data-replace="1">{{$item->views}}
                                                次阅读</span></span></div>
                                </div>
                            </a></li>
                    @endforeach
                </ul>
                <div class="clear"></div>
            </div>
            <div class="link">
                <h2 class="l-titel">
                    友情链接
                </h2>
                <ul>
                    @foreach($links as $item)
                        <li><a target="_blank" href="{{$item->url}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="foot" title="返回顶部">
    <div class="cont">
        <div class="cont-main">
            <p><a href="http://c69p.com">关于c69p</a>|<a href="http://c69p.com/about">关于CXB</a>|<a href="c69p.com/about">版权所有</a>|<a
                        target="_blank" href="http://www.beian.miit.gov.cn">{{config('config.icp')}}</a></p>
            <p class="copyright">Copyright © 2017 -
                <script>
                    document.write(new Date().getFullYear());
                </script>
                cxb. All Rights Reserved.
            </p>
        </div>
    </div>
</div>
<div class="return">
    <div class="returntop">
        <i class="iconfont icon-dingbu"></i>
    </div>
</div>
</body>
{!! htmlspecialchars_decode(config('config.statistics')) !!}
<script src="{{mix('js/app.js')}}"></script>
<script src="{{ asset('js/jquery.lazyload.js') }}"></script>
@yield('js')
</html>