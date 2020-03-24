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
                    <i class="layui-icon layui-icon-dialogue left-nav-li" lay-tips="随言细语"></i>
                    <!-- <i class="iconfont">&#xe620;</i> -->
                    <cite>随言细语</cite>
                    <i class="iconfont nav_right"></i>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-set left-nav-li" lay-tips="系统设置"></i>
                    <!-- <i class="iconfont">&#xe620;</i> -->
                    <cite>系统设置</cite>
                    <i class="iconfont nav_right"></i>
                </a>
            </li>
        </ul>
    </div>
</div>