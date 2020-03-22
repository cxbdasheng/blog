<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','cxb')</title>
    <meta name="keywords" content="@yield('keywords','cxb')"/>
    <meta name="description" content="@yield('description','cxb')"/>
    <meta name="author" content="Cxb,chenDasheng"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <a href="/"><img src="/img/logo.png" alt="爱一直在" title="爱一直在"></a>
            </div>
            <div class="top-nav-right">
                <ul>
                    <li><a id="nav" href="/">首页</a></li>
                    @foreach($category as $item)
                        <li><a id="nav" href="/category/{{$item->id}}">{{ $item->name}}</a></li>
                    @endforeach
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="min-nav">
        <div class="overlay">
            <i class="iconfont icon-zhedie"></i>
        </div>
        <h1 class="logo"><a href="/"><img src="/img/logo.png" alt=""></a></h1>
    </div>
    <div class="min-nav">
        <div class="overlay">
            <i class="iconfont icon-zhedie" id="check-nav"></i>
        </div>
        <h1 class="logo"><a href="/"><img src="/img/logo.png" alt=""></a></h1>
    </div>
    <div class="left-nav">
        <div class="mnav">
            <a id="left-nav" href="/">首页</a>
            @foreach($category as $item)
                <li><a id="nav" href="/category/{{$item->id}}">{{ $item->name}}</a></li>
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
            <input type="text" class="s-content" name="wd" value="@if(!empty($wd)){{$wd}}@endif" placeholder="">
            <button class="s-btn">搜索</button>
        </form>
        <div class="panel">
            <h2 class="p-titel">
                标签列表
            </h2>
            <div class="p-tal">
                <ul>
                    @foreach($tag as $item)
                        <li><a href="/tag/{{$item->id}}" alt="{{$item->name}}"
                               title="{{$item->name}}">{{$item->name}}</a></li>
                    @endforeach
                    <div class="clear"></div>
                </ul>
            </div>
        </div>
        <div class="message">
            <h2 class="m-titel">
                留言墙
            </h2>
            <!--<ul>-->
            <!--<img src="img/kfz.gif" alt="程序正在加紧开发，敬请期待。。。">-->
            <!--<li style="text-align: center"><p>程序正在加紧开发，敬请期待。。。</p></li>-->
            <!--</ul>-->
            <div class="w">
            </div>
            <div class="clear" style="margin-top: 20px;"></div>
        </div>
        <div class="click">
            <h2 class="c-titel">
                置顶推荐
            </h2>
            <ul>
                @foreach($topArticle as $item)
                    <li><a href="/article/{{$item->id}}" alt="{{$item->title}}" title="{{$item->title}}"><span class="c-img">
                                <img src="{{$item->cover}}" alt="{{$item->title}}" title="{{$item->title}}"></span>
                            <div class="c-right"><span class="text">{{$item->title}}</span>
                                <div class="c-foot"><span class="muted">{{$item->created_at}}</span><span class="muted-r"><span
                                                class="ds-thread-count" data-replace="1">{{$item->views}} 次阅读</span></span></div>
                            </div>
                        </a></li>
                @endforeach
            </ul>
            <div class="clear"></div>
        </div>
        <div class=""></div>
        <div class="link">
            <h2 class="l-titel">
                友情链接
            </h2>
            <ul>
                <li><a target="_blank" href="https://www.baidu.com">百度</a></li>
                <li><a target="_blank" href="http://www.php.cn">php中文网</a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="foot">
    <div class="cont">
        <div class="cont-main">
            <p><a href="http://c69p.com">关于c69p</a>|<a href="http://c69p.com/about">关于CXB</a>|<a href="c69p.com/about">版权所有</a>|<a
                        target="_blank" href="http://www.beian.miit.gov.cn">湘ICP备17009938号</a></p>
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
@yield('js')
<script src="{{ mix('js/app.js') }}"></script>
</html>