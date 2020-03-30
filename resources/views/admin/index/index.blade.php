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
                                    var Hours=new Date().getHours();
                                    var meg='';
                                    if (Hours<=6)
                                    {
                                        meg="凌晨";
                                    }
                                    else if (Hours <=11)
                                    {
                                        meg="早上";
                                    }
                                    else if (Hours <=14)
                                    {
                                        meg="中午";
                                    }
                                    else if (Hours <=19)
                                    {
                                        meg="下午";
                                    }
                                    else
                                    {
                                        meg="晚上";
                                    };
                                    document.write('Hi'+meg+'好，现在是：'+new Date().getFullYear() + "年" + (new Date().getMonth() + 1) + "月" + new Date().getDate() + "日" + " " + "星期" + "日一二三四五六".charAt(new Date().getDay()));
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
                                        <h3>会员数</h3>
                                        <p>
                                            <cite>12</cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md3">
                                    <a href="javascript:;" class="easy-backlog-body">
                                        <h3>回复数</h3>
                                        <p>
                                            <cite>99</cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md3">
                                    <a href="javascript:;" class="easy-backlog-body">
                                        <h3>商品数</h3>
                                        <p>
                                            <cite>67</cite></p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md4">
                    <div class="layui-card">
                        <div class="layui-card-header">卡片面板</div>
                        <div class="layui-card-body">
                            卡片式面板面板通常用于非白色背景色的主体内<br>
                            从而映衬出边框投影
                        </div>
                    </div>
                </div>
                <div class="layui-col-md4">
                    <div class="layui-card">
                        <div class="layui-card-header">卡片面板</div>
                        <div class="layui-card-body">
                            卡片式面板面板通常用于非白色背景色的主体内<br>
                            从而映衬出边框投影
                        </div>
                    </div>
                </div>
                <div class="layui-col-md4">
                    <div class="layui-card">
                        <div class="layui-card-header">环境</div>
                        <div class="layui-card-body">
                            <table class="layui-table">
                                <colgroup>
                                    <col >
                                    <col >
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
