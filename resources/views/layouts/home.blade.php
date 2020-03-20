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
                };
                document.write('Hi' + meg + '好，现在是：' + new Date().getFullYear() + "年" + (new Date().getMonth() + 1) + "月" + new Date().getDate() + "日" + " " + "星期" + "日一二三四五六".charAt(new Date().getDay()));
            </script>
        </div>
    </div>
    <div class="top_2">
        <div class="top-nav">
            <div class="top-nav-left">
                <a href="/"><img src="img/logo.png" alt="爱一直在" title="爱一直在"></a>
            </div>
            <div class="top-nav-right">
                <ul>
                    <li><a id="nav" href="/index" class="active">首页</a></li>
                    <li><a id="nav" href="/colum/33">生活杂事</a></li>
                    <li><a id="nav" href="/img">摄影游记</a></li>
                    <li><a id="nav" href="/about">关于“我”</a></li>
                    <li><a id="nav" href="/leave">留言板</a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="min-nav">
        <div class="overlay">
            <i class="iconfont icon-zhedie"></i>
        </div>
        <h1 class="logo"><a href="/"><img src="img/logo.png" alt=""></a></h1>
    </div>
    <div class="min-nav">
        <div class="overlay">
            <i class="iconfont icon-zhedie" id="check-nav"></i>
        </div>
        <h1 class="logo"><a href="/"><img src="img/logo.png" alt=""></a></h1>
    </div>
    <div class="left-nav">
        <div class="mnav">
            <a id="left-nav" href="/index" class="selected">首页</a>
            <a id="left-nav" href="/colum/33">生活杂事</a>
            <a id="left-nav" href="/img">摄影游记</a>
            <a id="left-nav" href="/about">关于“我”</a>
            <a id="left-nav" href="/leave">留言板</a>
        </div>
        <div class="mp"></div>
    </div>
</div>
<!-- 内容开始 -->
<div class="body">
@yield('body')
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