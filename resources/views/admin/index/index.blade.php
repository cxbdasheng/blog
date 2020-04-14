@extends('layouts.body')
@section('title', '后台首页')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="layui-this">后台首页</li>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">

                            <blockquote class="layui-elem-quote">
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
                                <span class="x-red"></span>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">数据统计</div>
                        <div class="layui-card-body ">
                            <ul class="layui-row layui-col-space10 layui-this">
                                <li class="layui-col-md3">
                                    <a href="javascript:;" class="easy-backlog-body">
                                        <h3>文章数</h3>
                                        <p>
                                            <cite>{{$articleCount}}</cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md3">
                                    <a href="javascript:;" class="easy-backlog-body">
                                        <h3>第三方用户</h3>
                                        <p>
                                            <cite>{{$userCount}}</cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md3">
                                    <a href="javascript:;" class="easy-backlog-body">
                                        <h3>评论数</h3>
                                        <p>
                                            <cite>{{$commentCount}}</cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md3">
                                    <a href="javascript:;" class="easy-backlog-body">
                                        <h3>时间轴</h3>
                                        <p>
                                            <cite>{{$timeCount}}</cite></p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md4">
                    <div class="layui-card">
                        <div class="layui-card-header">最新登录的用户 （Top5）</div>
                        <div class="layui-card-body">
                            <table class="layui-table">
                                <thead>
                                <tr>
                                    <th>昵称</th>
                                    <th>登入次数</th>
                                    <th>登入时间</th>
                                </tr>
                                </thead>
                                @foreach($socialiteUserData as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{ $item->login_times}}</td>
                                        <td>{{ $item->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md4">
                    <div class="layui-card">
                        <div class="layui-card-header">最新评论 （Top5）</div>
                        <div class="layui-card-body">
                            <table class="layui-table">
                                <thead>
                                <tr>
                                    <th>昵称</th>
                                    <th>文章</th>
                                    <th>内容</th>
                                </tr>
                                </thead>
                                @foreach($latestComments as $item)
                                    @if($loop->index>4) @break @endif
                                    <tr>
                                        <td>{{$item->socialiteUser->name}}</td>
                                        <td>《{{ $item->articles->sub_title }}》</td>
                                        <td>{!! $item->sub_content !!}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md4">
                    <div class="layui-card">
                        <div class="layui-card-header">环境</div>
                        <div class="layui-card-body">
                            <table class="layui-table">
                                <colgroup>
                                    <col>
                                    <col>
                                </colgroup>
                                <tr>
                                    <td>服务器地址</td>
                                    <td>{{ $version['host'] }}</td>
                                </tr>
                                <tr>
                                    <td>服务器时间</td>
                                    <td>{{ $version['date'] }}</td>
                                </tr>
                                <tr>
                                    <th>操作系统</th>
                                    <th>{{ $version['system'] }}</th>
                                </tr>
                                <tbody>
                                <tr>
                                    <td>Web 服务器</td>
                                    <td>{{ $version['webServer'] }}</td>
                                </tr>
                                <tr>
                                    <td>PHP</td>
                                    <td>{{ $version['php'] }}</td>
                                </tr>
                                <tr>
                                    <td>MySQL</td>
                                    <td>{{ $version['mysql'] }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@include('layouts/page')--}}
