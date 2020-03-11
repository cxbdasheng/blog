@extends('layouts.gentelella')
@section('body')
    <div class="top-nav ">
        <div class="logo">
            <a href="{{route('admin.index')}}">X-admin v2.2
            </a>
        </div>
        <div class="left_open">
            <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
        </div>
        <div class="left_open">您好，欢迎使用浩通科技CMS管理系统</div>
        <ul class="layui-nav right" lay-filter="">
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="layui-icon layui-icon-username">admin</i><span
                            class="layui-nav-more"></span></a>
                <dl class="layui-nav-child layui-anim layui-anim-upbit">
                    <!-- 二级菜单 -->
                    <dd>
                        <a href="javascript:logout()">修改密码</a></dd>
                    <dd>
                        <a href="javascript:logout()">注销账号</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item to-index">
                <a href="/"></a>
            </li>
        </ul>
    </div>
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                <li>
                    <a url="{{route('admin.test')}}" _="">
                        <i class="layui-icon layui-icon-tabs left-nav-li" lay-tips="新闻中心"></i>
                        <cite>新闻中心</cite>
                        <!--<i class="iconfont nav_right">&#xe697;</i>-->
                    </a>
                </li>
                <li>
                    <a _="">
                        <i class="layui-icon layui-icon-diamond left-nav-li" lay-tips="我们的服务"></i>
                        <cite>我们的服务</cite>
                        <!--<i class="iconfont nav_right">&#xe697;</i>-->
                    </a>
                </li>
                <li>
                    <a _="">
                        <i class="layui-icon layui-icon-template-1 left-nav-li" lay-tips="案例管理"></i>
                        <cite>案例管理</cite>
                        <!--<i class="iconfont nav_right">&#xe697;</i>-->
                    </a>
                </li>
                <li>
                    <a _="">
                        <i class="layui-icon layui-icon-username left-nav-li" lay-tips="联系我们管理"></i>
                        <cite>联系我们管理</cite>
                        <!--<i class="iconfont nav_right">&#xe697;</i>-->
                    </a>
                </li>
                <li>
                    <a _="">
                        <i class="layui-icon layui-icon-tips left-nav-li" lay-tips="关于我们"></i>
                        <cite>关于我们</cite>
                        <!--<i class="iconfont nav_right">&#xe697;</i>-->
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="layui-icon layui-icon-set left-nav-li" lay-tips="常规管理"></i>
                        <!-- <i class="iconfont">&#xe620;</i> -->
                        <cite>常规管理</cite>
                        <i class="iconfont nav_right"></i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a>
                                <i class="layui-icon"></i>
                                <cite> 企业基本资料</cite>
                            </a>
                        </li>

                        <li>
                            <a>
                                <i class="layui-icon"></i>
                                <cite> 广告banner</cite>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="layui-icon layui-icon-user left-nav-li" lay-tips="后台管理"></i>
                        <!-- <i class="iconfont">&#xe620;</i> -->
                        <cite>后台管理</cite>
                        <i class="iconfont nav_right"></i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a class="active">
                                <i class="layui-icon"></i>
                                <cite> 角色管理</cite>
                            </a>
                        </li>

                        <li>
                            <a>
                                <i class="layui-icon"></i>
                                <cite> 用户管理</cite>
                            </a>
                        </li>

                        <li>
                            <a>
                                <i class="layui-icon"></i>
                                <cite> 权限管理</cite>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
    @yield('content')
@endsection
@section('js')
    <script>
        layui.use('element', function () {
            var element = layui.element;
        });
    </script>
@endsection