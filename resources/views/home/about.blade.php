@extends('layouts.about')
@section('title', $head['title'])
@section('keywords', $head['keywords'])
@section('description', $head['description'])
@section('css')
    <style>
        .main-left {
            float: left;
            width: 27.1%;
            margin-top: 10px;
            background: #fff;
        }

        .main-right {
            float: right;
            width: 71.7%;
            margin-top: 10px;
            background: #fff;
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
            border-radius: 20px;
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

        .weixin {
            background: #FFF;
            overflow: hidden;
            margin: 20px 10px;
        }

        .tvme {
            margin-bottom: 50px;;
        }

        .hometitle {
            padding: 0 10px;
            line-height: 50px;
            height: 50px;
            font-size: 18px;
            border-bottom: 1px solid #e5e5e5;
            color: #333;
            position: relative;
        }

        .hometitle:after {
            content: '';
            position: absolute;
            height: 2px;
            width: 0;
            right: inherit;
            top: inherit;
            left: 0;
            bottom: -1px;
            background: #333;
            transition: 2s ease all;
        }

        .hometitle:hover:after {
            width: 100%;
            transition: 2s ease all;
        }

        .hometitle:after {
            content: '';
            position: absolute;
            height: 2px;
            width: 0;
            right: inherit;
            top: inherit;
            left: 0;
            bottom: -1px;
            background: #333;
            transition: 2s ease all;
        }

        .weixin img {
            width: 100%;
        }


        .learn {
            margin-bottom: 50px;
        }

        .newsview {
            padding: 0 30px;
        }

        .news_infos {
            padding: 30px 0;
        }

        .news_infos {
            line-height: 24px;
            text-align: justify;
        }

        .news_infos img {
            max-width: 100%;
            height: auto;
        }

        .news_infos p {
            margin-bottom: 10px;
        }

        .travel {
            margin-top: 10px;
        }

        .travel p {
            margin-bottom: 10px;
        }

        .tv {
            margin: 0 auto;
            text-align: center;
            /*height: 400px;*/
        }

        .tv > iframe {
            height: 100%;
            width: 100%;
        }

        .learn ul li {
            width: 100%;
            height: 180px;
            padding: 10px 0px;
            border-bottom: 2px solid #ededed;
        }

        .learn ul li .title {
            position: relative;
            width: 190px;
        }

        .learn ul li .title {
            position: relative;
            display: table;
            float: left;
            width: 130px;
            width: 20%;
            height: 100%;
            margin: 0 auto;
            border-right: 1px solid #ededed;
        }

        .intro {
            width: 42%;
            float: left;
            line-height: 24px;
            text-align: justify;
        }

        .img {
            width: 35%;
            float: right;
            margin-top: -4px;
        }

        .learn ul li .title .index {
            left: 50%;
            margin-left: -50px;
        }

        .learn ul li .title .index {
            position: absolute;
            top: 50%;
            margin-top: -27px;
        }

        .learn ul li .title .index h3 {
            margin: 0 auto;
            overflow: hidden;
            vertical-align: middle;
        }

        .learn ul li .intro p {
            overflow: hidden;
            display: -webkit-box;
            display: box;
            text-overflow: ellipsis;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 8;
            padding: 10px;
            vertical-align: middle;
            text-align: justify;
            text-indent: 2em;
            word-wrap: break-word;
        }

        .eq2 {
            margin-top: 30px;
        }

        .img img {
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            /*box-shadow: 4px 4px 9px #712d2d;*/
            /*-moz-box-shadow: 4px 4px 9px #712d2d;*/
            /*-webkit-box-shadow: 4px 4px 9px #712d2d;*/
        }

        @media screen and (max-width: 1023px) {
            .main-left {
                float: none;
            }

            .main-right {
                float: none;
                width: 100%;
                height: 100%;
                display: block;
            }

            .panel {
                /*width: 100%;*/
                display: none;
            }

            .main-left {
                width: 100%;
            }

            .body {
                width: auto;
                margin-top: 60px;
            }

            .list-img {
                padding-left: 3.8%;
            }

            .list-img img {
                width: 100%;
                height: auto;
                border-radius: 9px;
            }

            .img {
                width: 0%;
                display: none;
                display: none;
            }

            .intro {
                width: 79%;
            }
        }

        @media screen and (max-width: 767px) {
            .l {
                float: left;
                position: relative;
                width: 30%;
                height: 120px;
                overflow: hidden;
                border-radius: 9px;
            }

            .l img {
                border-radius: 9px;
                height: auto;
            }

            .r {
                width: 67%;
                float: right;
                line-height: 20px;
                color: #666;
                font-size: 12px;
            }

            .r-titel {
                font-size: 18px;
                font-weight: 700;
            }

            .list-content {
                padding: 10px 0px;
                border-bottom: 1px solid #eee;
                overflow: hidden;
                height: 120px;
                margin: 0 20px;
            }

            .r .c {
                color: #999;
                padding: 6px 0px;
            }

            .left-titel .name:after {
                content: "";
                width: 79%;
                height: 2px;
                background: #000;
                position: absolute;
                right: 0;
                bottom: 8px;
            }

            .r .d {
                height: auto;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
                overflow: hidden;
            }
        }

        @media screen and (max-width: 766px) and (min-width: 561px) {

        }

        @media screen and (max-width: 560px) {
            .left-titel .name:after {
                content: "";
                width: 74%;
                height: 2px;
                background: #000;
                position: absolute;
                right: 0;
                bottom: 8px;
            }

            .c {
                display: none;
            }

            .list-content {
                height: auto;
            }

            .l {
                height: auto;
            }

            .r .d {
                height: auto;
            }

            .learn ul li .title {
                position: relative;
                display: table;
                float: none;
                width: 130px;
                width: 50%;
                height: 10%;
                margin: 0 auto;
                border-right: none;
            }

            .learn ul li .intro p {
                padding: 5px 0px;
            }

            .learn ul li .title .index {
                left: 65%;
                margin-top: -15px;
                margin-left: -50px;
            }

            .intro {
                width: 100%;
            }
        }

        @media screen and (max-width: 426px) {
            .left-titel .name:after {
                content: "";
                width: 68%;
                height: 2px;
                background: #000;
                position: absolute;
                right: 0;
                bottom: 8px;
            }

            .r-titel {
                font-size: 14px;
            }

            .c {
                display: none;
            }

            .list-content {
                height: auto;
            }

            .l {
                width: 45%;
                height: auto;
            }

            .r {
                width: 52%;
            }

            .intro {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 390px) {
            .left-titel .name:after {
                content: "";
                width: 61%;
                height: 2px;
                background: #000;
                position: absolute;
                right: 0;
                bottom: 8px;
            }

            .l {
                width: 45%;
                height: auto;
            }

            .r {
                width: 50%;
            }

            .intro {
                font-size: 14px;
                line-height: 18px;
            }

            .learn ul li .intro p {
                -webkit-line-clamp: 10;
            }

            .learn ul li {
                height: 190px;
            }
        }

        .social {
            background: #f6f6f6;
            min-height: 80px;
        }

        .social .social-left, .social .social-right, .social p {
            float: left;
            line-height: 70px;
        }

        .social .social-right {
            text-align: center;
            margin-top: 10px;
        }

        .social-right p {
            padding-left: 5px;
        }

        .social img {
            width: 50px;
        }
    </style>
@endsection
@section('body')
    <div class="main-left">
        <div class="about">
            <h2 class="ab-titel">
                关于我
            </h2>
            <div class="herdimg">
                <img class="lazy" data-original="img/about/head.jpg" alt="陈大剩头像" title="陈大剩头像">
            </div>
            <div class="ab-info">
                <p>陈大剩 | Cxb </p>
                <p id="year">PHP开发工程师 </p>
                <script type="application/javascript">
                    var now_year = new Date().getFullYear();
                    var now_month = new Date().getMonth() + 1;
                    var pass_year = now_year - 2017;
                    if (now_month > 6) {
                        var pass_months = (now_month - 6) / 12;
                    } else {
                        var pass_months = (12 + (now_month - 6)) / 12;
                        pass_year = pass_year - 1;
                    }
                    var pass = pass_year + pass_months;
                    var dom_year = document.getElementById('year');
                    var newText = document.createTextNode(pass.toFixed(1) + " years+");
                    dom_year.appendChild(newText);
                </script>
                <p>微信&QQ：851145971</p>
                <p>邮箱：<a href="mailto:cxb163mail@163.com" target="_blank">cxb163mail@163.com</a></p>
                <div class="social">
                    <div class="social-left">
                        <p> Social：</p>
                    </div>
                    <div class="social-right">
                        <p><a href="https://github.com/cxbdasheng" class="s-btn" target="_blank"><img class="lazy"
                                                                                                      data-original="img/about/social-github.png"
                                                                                                      alt="github"
                                                                                                      title="github"></a>
                        </p>
                        <p><a href="https://gitee.com/ChenDasheng" target="_blank" class="s-btn"> <img class="lazy"
                                                                                                       data-original="img/about/social-gitee.png"
                                                                                                       alt="gitee"
                                                                                                       title="gitee"></a>
                        </p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="weixin">
            <h2 class="hometitle">
                微信
            </h2>
            <ul>
                <img class="lazy" data-original="img/about/ewm.jpg" style="width: 100%;" alt="二维码" title="二维码">
            </ul>
        </div>

    </div>
    <div class="main-right">
        <div class="mes">
            <div class="newsview">
                <div id="news_infos" class="news_infos">
                    <p>　　Hi，我是陈大剩，一个位90后草根站长，一位户外旅行爱好者，一位持续学习者，一名PHP程序猿^_^。</p>
                    <img class="lazy" data-original="img/about/cb.png" style="width: 50%;float: left;margin: 20px;"
                         class="img-fw mb-30" alt="Hi，我是陈大剩" title="Hi，我是陈大剩">
                    <p>
                        　　大学毕业开始入坑，不知不觉已经从事PHP工作三年了。但是这对门世界上最好的语言的热爱依然不减，因为它是有趣而强大的，我还有很长的路要走！这三年已经习惯了朝7晚1的生活，也因此做了很多的项目，企业官网，商城，小程序，微信开发等等。有一些进步，但是总体提升的速度还是很缓慢，互联网的知识太多，不学习总感觉自己会退步，一定会加倍努力学习！
                    </p>
                    <p>
                        　　做这个博客断断续续花了一年多，从设计到前端展示再到后台都是自己亲力亲为，非常感给我博客提前意见的你们，谢谢！希望从现在开始能建立一个比较完整博客系统，并记录工作上遇到的问题和生活的点滴一起和大家分享，共同进步！</p>
                    <p>　　现在阶段博客还有许多功能未完善，我和把所有的功能都慢慢完善起来，并记录完善日志；与此同时我也会将我的博客整理出来，变成开源项目，供大家研究和测试！</p>
                    <p>　　如果有朋友有问题请教或者发现Bug，可以加我左边的微信好友或者QQ好友，联系我！谢谢。</p>
                    <p style="float:right;">2018年10月15日15:33:09<img class="lazy"
                                                                    data-original="img/about/mysignature.png"
                                                                    style="margin-left: 30px;" class="mt-30" alt="陈大剩签名"
                                                                    title="陈大剩签名"></p>
                </div>
                <div class="clear"></div>
                <div id="about" class="weixin tvme">
                    <h2 class="hometitle">
                        关于本站
                    </h2>
                    <div class="travel">
                        <p>　　（1）如果学过某个知识的话，写成Blog，在未来某个时刻其实可以很轻易的找到这份笔记，然后查看一下之前所学，温故而知新。</p>
                        <p>　　（2）写文章或者Blog和看书是截然不同的。写文章的话，首先不仅要看懂书本上的内容，还要整理成自己的语言描述出来，其实能够在某种程度上加深自己对知识的理解。</p>
                        <p>　　（3）持续写Blog的话，其实在未来的时候可以翻看自己的成长记录。</p>
                        <p>　　（4）持续写Blog能够看到自己一点一点的进步。人生毕竟是一场马拉松，而不是一场百米冲刺。</p>
                    </div>
                </div>
                <div id="tvme" class="weixin tvme">
                    <h2 class="hometitle">
                        一位户外旅行爱好者
                    </h2>
                    <div class="travel">
                        <p>　　古人常说：要么读书，要么旅行，身体和灵魂总有一个在路上，我认为：旅行，是心灵的阅读，而阅读，是心灵的旅行。</p>
                        <p>
                            　　“骑行西藏”一直是我的梦想，阅读也是我爱好，从大学开始，我每周看一本书，日兼两份职。大二便自己独立经济，兼职户外俱乐部，也随着户外俱乐部在全国游山涉水，15年终于圆了自己的骑行梦，经三十天风雪顺利到达拉萨。</p>
                        <p>　　以下是我去过的一些地方剪辑，希望大家喜欢 ↓</p>
                        <div class="tv">
                            <iframe id="movie" height="100%" allowfullscreen="true" width="100%"
                                    src='https://player.youku.com/embed/XMjcyNzQ5NTM1Mg==' frameborder=0
                            'allowfullscreen'></iframe></div>
                    </div>
                </div>
                <div id="eq2" class="weixin eq2">
                    <h2 class="hometitle">
                        一位持续学习者
                    </h2>
                    <div class="learn">
                        <ul>
                            <li>
                                <div class="title">
                                    <div class="index">
                                        <h3 class="basket">编程学习</h3>
                                    </div>
                                </div>
                                <div class="intro"><p>
                                        作为一个IT码农一天不学习你会不会觉得心里不安？作为一名PHP工程师，我无时无刻在提醒自己要不断学习充实自己，一天不学习我就害怕被这个互联网抛弃了
                                        。读书这么多年，我从来没有像这样努力过。已经很久没玩游戏了，看书和视频都是技术相关的，很久没有看过电视剧了。</p></div>
                                <div class="img"><img class="lazy" data-original="img/about/bc.jpg" alt="编程学习"
                                                      title="编程学习"></div>
                            </li>
                            <li>
                                <div class="title">
                                    <div class="index">
                                        <h3 class="basket">生活学习</h3>
                                    </div>
                                </div>
                                <div class="intro"><p>
                                        生活也是一个不断学习的过程，谁也不可能一出生就什么都会，只有不断的提升自己，增加自己的知识储备，才有更好的发展前景。我有很多爱好，比如游泳、弹琴、溜冰、羽毛球等等，正是因为我这些爱好迫使着我不断学习，从15年开始，我陆续考得了《5级救生员》、《5级游泳教练员》等等。</p>
                                </div>
                                <div class="img"><img class="lazy" data-original="img/about/yd.jpg" alt="生活学习"
                                                      title="生活学习"></div>
                            </li>
                            <li>
                                <div class="title">
                                    <div class="index">
                                        <h3 class="basket">工作学习</h3>
                                    </div>
                                </div>
                                <div class="intro"><p>IT 行业是一个变化非常快的行业，它需要我们持续去学习新的知识和技能。
                                        但是，工作以后，我们经常会发现自己学习的东西很少了，倒不是没有时间去学习，
                                        而是学习的效率太低了。久而久之，就演变成『一年的工作经验，重复用十年』。所以我只能不断努力！加油！</p></div>
                                <div class="img"><img class="lazy" data-original="img/about/work.jpg" alt="工作学习"
                                                      title="工作学习"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.getElementById("movie").style.height = document.getElementById("movie").scrollWidth * 0.6 + "px";
    </script>
@endsection
