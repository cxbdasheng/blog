@extends('layouts.home')
@section('body')
    <div class="main-left">
        <div class="left-titel">
            <h2 class="name">今日推荐</h2>
        </div>
        <div class="left-content">
            <div class="apen">
                @foreach($articles as $value)
                <div class="list-content">
                    <div class="l"><a href="{{$value->url}}"  target="_blank" title="{{$value->title}}"><img class="lazy"  data-original="{{$value->cover}}"  alt="{{$value->title}}"></a></div>
                    <div class="r">
                        <div class="r-titel">
                            <a href="{{$value->url}}" target="_blank" title="{{$value->title}}">{{$value->title}}</a>
                        </div>
                        <div class="c">{{$value->categories->name}} / {{$value->author}} · {{$value->created_at}}</div>
                        <div class="d">{{$value->description}}</div>
                    </div>
                    <div class="reading"><a href="{{$value->url}}">阅读全文</a></div>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
            <input type="hidden" id="type" name="type" value="{{$type}}">
            <input type="hidden" id="index" name="index" value="{{$index}}">
            <input type="hidden" id="type_id" name="type_id" value="{{$type_id}}">
            @if(count($articles)==10)
            <div class="index-page">
                <div class="more-button">
                    查看更多
                </div>
                <div class="more-loading">
                    ....正在加载
                </div>
                <div class="wan-button">
                    已经到底了！
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $("img").lazyload({
                placeholder: "/uploads/article/default.jpg",
                effect: "fadeIn"
            });
            $(window).scroll(function() {
                if ($(document).scrollTop() >= $(document).height() - $(window).height()) {
                    if ($('.wan-button').length<=0){
                        return ;
                    }
                    if ($('.wan-button').css("display")=="block"){
                        return ;
                    }else {
                        $('.more-button').hide();
                        $('.more-loading').show();
                        ajax_articles();
                    }
                }
            });
            $(".more-button").on("click",function(){
                $('.more-button').hide();
                $('.more-loading').show();
                ajax_articles();
            });
            function ajax_articles() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if ($('#type').val()=='search'){
                    var type_id=$('#search').val();
                }else{
                    var type_id=$('#type_id').val();
                }
                $.ajax({
                    url: "/articles/more?number=" + Math.random(),
                    type: 'post',
                    data: {type: $('#type').val(), type_id: type_id, index:$('#index').val() },
                    success: function (res) {
                        if (res.success == 1) {
                            if (res.data.item.length <= 0) {
                                $('.more-loading').hide();
                                $('.wan-button').show();
                                return;
                            }
                            for (var i = 0; i < res.data.item.length; i++) {
                                var str = '<div class="list-content">\n' +
                                    '<div class="l"><a href="' + res.data.item[i].url + '" target="_blank" title="' + res.data.item[i].title.replace(/</g, '&lt;').replace(/>/g, '&gt;') + '"><img data-original="' + res.data.item[i].cover + '" src="' + res.data.item[i].cover + '" alt="' + res.data.item[i].title.replace(/</g, '&lt;').replace(/>/g, '&gt;') + '"></a></div>\n' +
                                    '<div class="r">\n' +
                                    '<div class="r-titel">\n' +
                                    '<a href="' + res.data.item[i].url + '" target="_blank" title="' + res.data.item[i].title.replace(/</g, '&lt;').replace(/>/g, '&gt;') + '">' + res.data.item[i].title.replace(/</g, '&lt;').replace(/>/g, '&gt;') + '</a>\n' +
                                    '</div>\n' +
                                    '<div class="c">'+ res.data.item[i].categories.name.replace(/</g, '&lt;').replace(/>/g, '&gt;') +' / '+ res.data.item[i].author.replace(/</g, '&lt;').replace(/>/g, '&gt;')  + ' · ' + res.data.item[i].created_at + '</div>\n' +
                                    '<div class="d">' + res.data.item[i].description.replace(/</g, '&lt;').replace(/>/g, '&gt;')+ '</div>\n' +
                                    '</div>\n' +
                                    '<div class="reading"><a href="' + res.data.item[i].url + '">阅读全文</a></div>\n' +
                                    '<div class="clear"></div>\n' +
                                    '</div>';
                                $(".apen").append(str).animate({opacity: 1}, 1500);
                            }
                            $('.more-loading').hide();
                            $('.more-button').show();
                            $('#type').val(res.data.type);
                            $('#index').val(res.data.index);
                            $('#type_id').val(res.data.type_id);
                        } else {
                            $('.more-loading').hide();
                            $('.wan-button').show();
                            return;
                        }
                    },
                    error: function (error) {
                        $('.more-loading').hide();
                        $('.wan-button').show();
                        return;
                    },dataType:"json"
                });
            }
        });
    </script>
@endsection