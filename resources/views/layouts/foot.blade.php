<div class="foot">
    <div class="cont">
        <div class="cont-main">
            <p class="fl">
                <a href="https://github.com/qq851145971/blog">本站由陈大剩博客程序搭建 </a>|
                <a target="_blank" href="https://beian.miit.gov.cn/#/Integrated/index">{{config('config.icp')}}</a>|
                <span class="copyright">
                    Copyright © 2017 -<script>document.write(new Date().getFullYear());</script>
                    {{ env('APP_NAME', 'Laravel')}}
                </span>|
                <a href="https://creativecommons.org/licenses/by-nc/4.0/deed.zh" target="_blank">本站采用创作共用版权：CC BY-NC
                    4.0</a>
            </p>
            <p class="fr">
                <span>站长统计</span>|
                <span>文章总数[<em>{{$articleCount}}</em>]</span>|
                <span>评论总数[<em>{{$commentCount}}</em>]</span>|
                <span>登录用户[<em>{{$userCount}}</em>]</span>|
                <span>时间点[<em>{{$timeCount}}</em>]</span>
            </p>
        </div>
            <div class="ui inverted section divider"></div>
        <div class="sponsor">
            本站由 <a href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral"><img src="/upyun_logo.png" alt="upyun"></a> 提供cdn加速/云存储服务
    </div>


    </div>
</div>
<style>
    .sponsor{
        padding-left: 20px;
        padding-right: 20px;
        text-align: left;
        font-size: 12px;
    }
    .sponsor a{
        color: #aaa;
        /*line-height: 100px;*/
    }
    .sponsor a img{
        /*width: 100px;*/
        max-height: 30px;
        display: inline-block;
    }
    .ui.section.divider {
        margin-bottom: 1px;
        margin-top: 1px;
        margin-left: 20px;
        margin-right: 20px;
    }
    .ui.divider:not(.vertical):not(.horizontal) {
        border-bottom: 1px px solid rgba(211, 224, 233, .15);
        border-top: 1px solid #aaa;
    }
</style>
