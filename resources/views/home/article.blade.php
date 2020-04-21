@extends('layouts.home')
@section('title', $articles->title)
@section('keywords', $articles->keywords)
@section('description', $articles->description)
@section('css')
@endsection
@section('body')
    <div class="main-left">
        <div class="text">
            <h1 class="article-title">
                {{ $articles->title}}</h1>
            <div class="new-info">
                <ul>
                    <li><i class="iconfont icon-morentouxiang"></i>{{$articles->author}}</li>
                    <li><i class="iconfont icon-rilicalendar107"></i>{{$articles->created_at}}</li>
                    <li><i class="iconfont icon-ai-eye"></i>{{$articles->views}}</li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="tags">
                <ul>
                    <li><i class="iconfont icon-biaoqian"></i>标签:</li>
                    @foreach($articles->tags as $item)
                        <li><a href="{{$item->url}}" alt="{{$item->name}}" title="{{$item->name}}">{{$item->name}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="clear"></div>
            </div>
            <div class="new-cont">
                {!! $articles->html!!}
            </div>
            <div class="tags">
                <ul>
                    <li><i class="iconfont icon-biaoqian"></i>标签:</li>
                    @foreach($articles->tags as $item)
                        <li><a href="/label/1" alt="{{$item->name}}" title="{{$item->name}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
                <div class="clear"></div>
            </div>
            <div class="article-action">
                <div class="xshare">
                    <span class="xshare-title">分享到：</span>
                    @if(config('config.social_share.select_plugin') === 'sharejs')
                        <div id="share-js"></div>
                    @else
                        <div id="js-socials"></div>
                    @endif
                </div>
                <div class="zan">
                    <div class="zan-k" onclick="praise()">
                        <i class="iconfont icon-weibiaoti--"></i>
                        赞
                        <span>（<b class="zan-data">{{$praiseCount}}</b>）</span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="hflc">
            </div>
            <h2 class="hometitle">
                说点儿什么吧
            </h2>
            <div class="ly">
                <form id="" class="layui-form">
                    @if(auth()->guard('socialite')->check())
                        <div class="comments-left">
                            <img src="{{ auth()->guard('socialite')->user()->avatar }}"
                                 alt="{{ auth()->guard('socialite')->user()->name }}"
                                 title="{{ auth()->guard('socialite')->user()->name }}"/>
                        </div>
                        <input type="hidden" name="article_id" value="{{$articles->id}}">
                        <input type="hidden" name="socialite_user_id"
                               value="{{auth()->guard('socialite')->user()->id}}">
                        <input type="hidden" name="pid" value="0">
                        <div class="comments-right">
                            <div class="comments-right-head">
                                <input class="textinput" autocomplete="off" name="nickname" type="text"
                                       value="{{ auth()->guard('socialite')->user()->name }}" placeholder="请先登入"
                                       readonly="" required="">
                                <input class="textinput" name="email" lay-verify="email" type="text"
                                       value="{{ auth()->guard('socialite')->user()->email}}" placeholder="接收回复的邮箱">
                            </div>
                            <div class="comments-right-body">
                                <p>
                                    <textarea class="textarea" required lay-verify="required" name="content"
                                              @if(auth()->guard('socialite')->check()) @else readonly @endif  cols="60"
                                              required="" rows="12" id="lytext" placeholder="留下你想对我说的话！"></textarea>
                                </p>
                                <div class="comment-ctrl">
                                    <span class="emotion"><img src="/img/em.png" width="20" height="20" alt="">表情</span>
                                </div>
                                <button type="button" name="comment-submit" id="submit" class="comment-submit"
                                        lay-submit lay-filter="submit">评论
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="comments-left">
                            <img src="/img/default.jpg" alt="头像" title="头像"/>
                        </div>
                        <div class="comments-right">
                            <div class="comments-right-head">
                                <input class="textinput" name="nickname" required lay-verify="pop_login" type="text"
                                       value="" readonly="" placeholder="请先登入">
                                <input class="textinput" name="email" lay-verify="email" type="text"
                                       placeholder="接收回复的邮箱">
                            </div>
                            <div class="comments-right-body">
                                <p>
                                    <textarea class="textarea" required lay-verify="required" name="content"
                                              @if(auth()->guard('socialite')->check()) @else readonly @endif  cols="60"
                                              required="" rows="12" id="lytext" placeholder="留下你想对我说的话！"></textarea>
                                </p>
                                <div class="comment-ctrl">
                                    <span class="emotion"><img src="/img/em.png" width="20" height="20" alt="">表情</span>
                                </div>
                                <button type="button" name="comment-submit" id="submit" class="comment-submit"
                                        lay-submit lay-filter="submit">评论
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="clear"></div>
                </form>
            </div>
            <div class="comment_foot" >
                @foreach($comment as $item)
                    <div class="hf" id="comment-{{$item['id']}}">
                        <div class="hflc">
                            <div class="hflc-left">
                                <img src="{{$item['avatar']}}" class="hfimg" alt="{{$item['name']}}" title="{{$item['name']}}">
                            </div>
                            <div class="hfmain">
                                <div class="hfmain-top">
                                    <a href="javascript:;" class="name" title="{{$item['name']}}">@if($item['is_admin']==1) <span class="master">站长</span> @endif {{$item['name']}}</a>
                                    <span class="hfmain-con">
                                <p>{!! $item['content']!!}</p>
                            </span>
                                </div>
                                <div class="fhtime">
                                    <span class="fhtime-time">{{$item['created_at']}}</span>
                                    <div class="fh-fh">
                                        <a href="javascript:;" class="reply" id="{{$item['id']}}" name="{{$item['name']}}"
                                           title="回复">回复</a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="interactive">
                                    @if(!empty($item['child']))
                                        @foreach($item['child'] as $child)
                                            <div class="interactive-con" id="comment-{{$child['id']}}">
                                                <div class="hflc-left">
                                                    <img src="{{$child['avatar']}}" class="hfimg" alt="{{$child['name']}}" title="{{$child['name']}}">
                                                </div>
                                                <div class="hfmain">
                                                    <div class="hfmain-top">
                                                        <a href="javascript:;" class="name">@if($child['is_admin']==1) <span class="master">站长</span> @endif{{$child['name']}}<span class="hfmain-reply"> 回复 </span>@if($child['is_admin']==1) <span class="master">站长</span> @endif{{$child['reply_name']}}</a>
                                                        <span class="hfmain-con">
                                <p>{!! $child['content'] !!}</p>
                            </span>
                                                    </div>
                                                    <div class="fhtime">
                                                        <span class="fhtime-time">{{$child['created_at']}}</span>
                                                        <div class="fh-fh">
                                                            <a href="javascript:;" class="reply" id="{{$child['id']}}" name="{{$child['name']}}">回复</a>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('lib/layui/layui.all.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/prism.js')}}"></script>
    <script>
        $('.emotion').qqFace({
            id : 'facebox',
            assign:'lytext',
            path:'/img/arclist/'
        });
        $('.new-cont a').attr('target', "{{ config('config.link_target') }}")
        jsSocialsConfig = {!! config('config.social_share.jssocials_config') !!};
        sharejsConfig = {!! config('config.social_share.sharejs_config') !!};
        $('#share-js').share(sharejsConfig);
        $('#js-socials').jsSocials(jsSocialsConfig);
        var pathname = "{{$articles->categories->name}}";
        $(".top-nav-right a").each(function () {
            var text = $(this).text();
            if (pathname == text) $(this).addClass('active');
        });
        $(".mnav a").each(function () {
            var text = $(this).text();
            if (pathname == text) $(this).addClass('selected');
        });
        var _pre = $('.new-cont pre');
        if (_pre.length > 0) {
            _pre.addClass("line-numbers").css("white-space", "pre-wrap");
        } else {
            _pre.addClass("line-numbers");
        }
        var form = layui.form;
        form.verify({
            pop_login: function (value, item) {
                $('.pop').show();
                $('.pop-shade').show();
                return '请先登入！';
            }
        });
        function praise() {
            $.ajax({
                    type: "POST",
                    url: "{{route('praise')}}?number="+Math.random(),
                    dataType: "json",
                    async:false,
                    data:{id:{{$articles->id}}},
                    success: function(res) {
                        if(res=="ok"){
                            var b=Number($('.zan-data').text());
                            $('.zan-data').text(b+1);
                        }else{
                            alert("你已经投过一次了，还想投么(￣口￣)！！！");
                        }
                     }
            })
        }
        //监听提交
        form.on('submit(submit)', function (data) {
            var load = layer.msg('正在努力提交...', {icon: 16, shade: [0.1, '#fff'], time: false});
            $.ajax({
                url: "{{route('contact')}}?number=" + Math.random(),
                type: "POST",
                dataType: "json",
                data: data.field,
                success: function (data) {
                    layer.close(load);
                    if (data.success==1) {
                        layer.msg(data.message, {icon: 1, time: 1500});
                            window.location.reload();
                    } else {
                        layer.msg("请求失败！", {icon: 5, time: 1500});
                    }
                }, error: function (xhr) {
                    layer.msg("请求失败！", {icon: 5, time: 1500});
                }
            });
            return false;
        });
        emojify.run(document.querySelector('.new-cont'));
        $('.body').on('click', '.reply', function () {
            var clas = $(this).attr('class');
            var id = $(this).attr('id');
            if (clas !== "check reply") {
                @if(auth()->guard('socialite')->check())
                var html = '<form id="ly" class="layui-form"><div class="comments-left">\n' +
                    '                            <img src="{{ auth()->guard('socialite')->user()->avatar }}"\n' +
                    '                                 alt="{{ auth()->guard('socialite')->user()->name }}"\n' +
                    '                                 title="{{ auth()->guard('socialite')->user()->name }}"/>\n' +
                    '                        </div>\n' +
                    '                        <input type="hidden" name="article_id" value="{{$articles->id}}">\n' +
                    '                        <input type="hidden" name="socialite_user_id"\n' +
                    '                               value="{{auth()->guard('socialite')->user()->id}}">\n' +
                    '                        <input type="hidden" name="pid" value="'+id+'">\n' +
                    '                        <div class="comments-right">\n' +
                    '                            <div class="comments-right-head">\n' +
                    '                                <input class="textinput" autocomplete="off" name="nickname" type="text"\n' +
                    '                                       value="{{ auth()->guard('socialite')->user()->name }}" placeholder="请先登入"\n' +
                    '                                       readonly="" required="">\n' +
                    '                                <input class="textinput" name="email" lay-verify="email" type="text"\n' +
                    '                                       value="{{ auth()->guard('socialite')->user()->email}}" placeholder="接收回复的邮箱">\n' +
                    '                            </div>\n' +
                    '                            <div class="comments-right-body">\n' +
                    '                                <p>\n' +
                    '                                    <textarea class="textarea" required lay-verify="required" name="content"\n' +
                    '                                              @if(auth()->guard('socialite')->check()) @else readonly @endif  cols="60"\n' +
                    '                                              required="" rows="12" id="lytext_cli" placeholder="留下你想对我说的话！"></textarea>\n' +
                    '                                </p>\n' +
                    '                                <div class="comment-ctrl">\n' +
                    '                                    <span class="emotion"><img src="/img/em.png" width="20" height="20" alt="">表情</span>\n' +
                    '                                </div>\n' +
                    '                                <button type="button" name="comment-submit" id="submit" class="comment-submit"\n' +
                    '                                        lay-submit lay-filter="submit">评论\n' +
                    '                                </button>\n' +
                    '                            </div>\n' +
                    '                        </div></form>';
                @else
                    var html = '<form id="ly" class="layui-form"><div class="comments-left">\n' +
                    '                            <img src="/img/default.jpg" alt="头像" title="头像"/>\n' +
                    '                        </div>\n' +
                    '                        <div class="comments-right">\n' +
                    '                            <div class="comments-right-head">\n' +
                    '                                <input class="textinput" name="nickname" required lay-verify="pop_login" type="text"\n' +
                    '                                       value="" readonly="" placeholder="请先登入">\n' +
                    '                                <input class="textinput" name="email" lay-verify="email" type="text"\n' +
                    '                                       placeholder="接收回复的邮箱">\n' +
                    '                            </div>\n' +
                    '                            <div class="comments-right-body">\n' +
                    '                                <p>\n' +
                    '                                    <textarea class="textarea" required lay-verify="required" name="content"\n' +
                    '                                              @if(auth()->guard('socialite')->check()) @else readonly @endif  cols="60"\n' +
                    '                                              required="" rows="12" id="lytext_cli" placeholder="留下你想对我说的话！"></textarea>\n' +
                    '                                </p>\n' +
                    '                                <div class="comment-ctrl">\n' +
                    '                                    <span class="emotion"><img src="/img/em.png" width="20" height="20" alt="">表情</span>\n' +
                    '                                </div>\n' +
                    '                                <button type="button" name="comment-submit" id="submit" class="comment-submit"\n' +
                    '                                        lay-submit lay-filter="submit">评论\n' +
                    '                                </button>\n' +
                    '                            </div>\n' +
                    '                        </div></form>';
                @endif
                $('.comment_foot').find('#ly').remove();
                $(this).attr('class', 'check reply');
                $(this).parents('.fh-fh').parents('.fhtime').append(html);
                $('.emotion').qqFace({
                    id : 'facebox',
                    assign:'lytext_cli',
                    path:'/img/arclist/'
                });
            } else {
                $(this).parents('.fh-fh').parents('.fhtime').find('#ly').remove();
                $(this).removeClass('check');
            }
        });

    </script>
@endsection