@extends('layouts.home')
@section('body')
    <div class="main-left">
        {{--<div class="left-titel">--}}
            {{--<h2 class="name">精选文章</h2>--}}
        {{--</div>--}}
        {{--<div class="left-content">--}}
            {{--<div class="list-content">--}}
                {{--<div class="l"><a href="/article/45" title="PHP 全栈知识总结 面试知识点汇总"><img--}}
                                {{--src="/public/static/uploads/20191108/12bd21669e1dfe129c1a37dd6d16d28e.jpg"--}}
                                {{--alt="PHP 全栈知识总结 面试知识点汇总"></a></div>--}}
                {{--<div class="r">--}}
                    {{--<div class="r-titel">--}}
                        {{--<a href="/article/45" title="PHP 全栈知识总结 面试知识点汇总">PHP 全栈知识总结 面试知识点汇总</a>--}}
                    {{--</div>--}}
                    {{--<div class="c"> 首页/ Cxb· 2019-11-08 02:07:46</div>--}}
                    {{--<div class="d">最近收集和结合自身情况的全栈知识，中级全栈知识，如果你现在处于以下几种状态，本资料非常适合你：</div>--}}
                {{--</div>--}}
                {{--<div class="clear"></div>--}}
            {{--</div>--}}
            {{--<div class="list-content">--}}
                {{--<div class="l"><a href="/article/44" title="1024节快乐，程序员们"><img--}}
                                {{--src="/public/static/uploads/20191025/b1377db68c0cf44facc16558d7879a4b.jpg"--}}
                                {{--alt="1024节快乐，程序员们"></a></div>--}}
                {{--<div class="r">--}}
                    {{--<div class="r-titel">--}}
                        {{--<a href="/article/44" title="1024节快乐，程序员们">1024节快乐，程序员们</a>--}}
                    {{--</div>--}}
                    {{--<div class="c"> 首页/ Cxb· 2019-10-25 00:00:41</div>--}}
                    {{--<div class="d">1024节快乐，程序员们</div>--}}
                {{--</div>--}}
                {{--<div class="clear"></div>--}}
            {{--</div>--}}
            {{--<div class="list-content">--}}
                {{--<div class="l"><a href="/article/39" title="PHP提取多维数组指定一列的方法大全"><img--}}
                                {{--src="/public/static/uploads/20191017/0b0d5707e92aa072cdb0aa8361feb3b5.jpg"--}}
                                {{--alt="PHP提取多维数组指定一列的方法大全"></a></div>--}}
                {{--<div class="r">--}}
                    {{--<div class="r-titel">--}}
                        {{--<a href="/article/39" title="PHP提取多维数组指定一列的方法大全">PHP提取多维数组指定一列的方法大全</a>--}}
                    {{--</div>--}}
                    {{--<div class="c"> 首页/ Cxb· 2019-10-17 19:47:08</div>--}}
                    {{--<div class="d">PHP提取多维数组指定一列的方法大全</div>--}}
                {{--</div>--}}
                {{--<div class="clear"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="left-list">--}}
            {{--<div class="left-titel">--}}
                {{--<h2 class="name">一些事情</h2>--}}
            {{--</div>--}}
            {{--<div class="list-img">--}}
                {{--<a href="/about#news_infos" title="生活学习"><img src="img/yd.jpg" alt="生活学习" title="生活学习"></a>--}}
                {{--<h5 class="t">关于我</h5>--}}
            {{--</div>--}}
            {{--<div class="list-img">--}}
                {{--<a href="/about#about" title="编程学习"><img src="img/bc.jpg" alt="编程学习" title="编程学习"></a>--}}
                {{--<h5 class="t">关于本站</h5>--}}
            {{--</div>--}}
            {{--<div class="list-img">--}}
                {{--<a href="/about#eq2" title="工作学习"><img src="img/work.jpg" alt="工作学习" title="工作学习"></a>--}}
                {{--<h5 class="t">关于技术</h5>--}}
            {{--</div>--}}
            {{--<div class="clear"></div>--}}
        {{--</div>--}}
        <div class="left-titel">
            <h2 class="name">今日推荐</h2>
        </div>
        <div class="left-content">
            <div class="apen">
                @foreach($articles as $value)
                <div class="list-content">
                    <div class="l"><a href="/article/{{$value->id}}"  target="_blank" title="{{$value->title}}"><img src="{{$value->cover}}" alt="{{$value->title}}"></a></div>
                    <div class="r">
                        <div class="r-titel">
                            <a href="/article/{{$value->id}}" target="_blank" title="{{$value->title}}">{{$value->title}}</a>
                        </div>
                        <div class="c">{{$value->author}}· {{$value->created_at}}</div>
                        <div class="d">{{$value->description}}</div>
                    </div>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
            <input type="hidden" id="time" name="time" value="1559101847">
            <div class="index-page">
                <div class="more-button">
                    查看更多
                </div>
                <div class="more-loading">
                    ....正在加载
                </div>
                <div class="wan-button">
                    已经没有内容了
                </div>
            </div>
        </div>
    </div>
@endsection