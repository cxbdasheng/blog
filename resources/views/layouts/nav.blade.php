<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-read left-nav-li" lay-tips="文章管理"></i>
                    <!-- <i class="iconfont">&#xe620;</i> -->
                    <cite>文章管理</cite>
                    <i class="iconfont nav_right"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a url="{{ url('admin/articles/index') }}" code="">
                            <i class="layui-icon"></i>
                            <cite> 文章列表</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-user left-nav-li" lay-tips="分类导航"></i>
                    <!-- <i class="iconfont">&#xe620;</i> -->
                    <cite>分类导航</cite>
                    <i class="iconfont nav_right"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a  url="{{ url('admin/category/index') }}">
                            <i class="layui-icon"></i>
                            <cite> 分类管理</cite>
                        </a>
                    </li>
                    <li>
                        <a  url="{{ url('admin/nav/index') }}">
                            <i class="layui-icon"></i>
                            <cite> 导航管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-note left-nav-li" lay-tips="标签管理"></i>
                    <!-- <i class="iconfont">&#xe620;</i> -->
                    <cite>标签管理</cite>
                    <i class="iconfont nav_right"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a  url="{{ url('admin/tag/index') }}">
                            <i class="layui-icon"></i>
                            <cite> 标签管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-user left-nav-li" lay-tips="用户管理"></i>
                    <!-- <i class="iconfont">&#xe620;</i> -->
                    <cite>用户管理</cite>
                    <i class="iconfont nav_right"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a  url="{{ url('admin/user/index') }}">
                            <i class="layui-icon"></i>
                            <cite> 管理员管理</cite>
                        </a>
                    </li>
                    <li>
                        <a  url="{{ url('admin/socialiteUser/index') }}">
                            <i class="layui-icon"></i>
                            <cite> 第三方登入用户</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-link left-nav-li" lay-tips="友情链接"></i>
                    <!-- <i class="iconfont">&#xe620;</i> -->
                    <cite>友情链接</cite>
                    <i class="iconfont nav_right"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a  url="{{ url('admin/link/index') }}">
                            <i class="layui-icon"></i>
                            <cite> 外链管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-dialogue left-nav-li" lay-tips="时间轴"></i>
                    <!-- <i class="iconfont">&#xe620;</i> -->
                    <cite>时间轴</cite>
                    <i class="iconfont nav_right"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a  url="{{ url('admin/time/index') }}">
                            <i class="layui-icon"></i>
                            <cite> 时间轴管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-set left-nav-li" lay-tips="系统设置"></i>
                    <!-- <i class="iconfont">&#xe620;</i> -->
                    <cite>系统设置</cite>
                    <i class="iconfont nav_right"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a  url="{{ url('admin/config/seo') }}">
                            <i class="layui-icon"></i>
                            <cite> seo</cite>
                        </a>
                    </li>
                    <li>
                        <a  url="{{ url('admin/config/other') }}">
                            <i class="layui-icon"></i>
                            <cite>其他设置</cite>
                        </a>
                    </li>
                    <li>
                        <a  url="{{ url('admin/config/mail') }}">
                            <i class="layui-icon"></i>
                            <cite>邮箱设置</cite>
                        </a>
                    </li>
                    <li>
                        <a  url="{{ url('admin/socialiteClient/index') }}">
                            <i class="layui-icon"></i>
                            <cite>第三方登入</cite>
                        </a>
                    </li>
                    <li>
                        <a  url="{{ url('admin/config/socialShare') }}">
                            <i class="layui-icon"></i>
                            <cite>社会化分享</cite>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>