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
                    <div class="l"><a href="/article/{{$value->id}}"  target="_blank" title="{{$value->title}}"><img src="{{$value->cover}}" alt="{{$value->title}}"></a></div>
                    <div class="r">
                        <div class="r-titel">
                            <a href="/article/{{$value->id}}" target="_blank" title="{{$value->title}}">{{$value->title}}</a>
                        </div>
                        <div class="c">{{$value->author}}· {{$value->created_at}}</div>
                        <div class="d">{{$value->description}}</div>
                    </div>
                    <div class="reading"><a href="/article/{{$value->id}}">阅读全文</a></div>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
            <input type="hidden" id="time" name="time" value="">
            <input type="hidden" id="type" name="type" value="{{$type}}">
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
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(window).scroll(function() {
            if ($(document).scrollTop() >= $(document).height() - $(window).height()) {
                if ($('.wan-button').css("display")=="block"){
                    return ;
                }else {
                    var more=$('.more-button');
                    more.hide();
                    $('.more-loading').show();
                    // var time=$('#time').val();
                    // $.post("/article/more?number="+Math.random(),{time:time},function(res) {
                    //     var res=JSON.parse(res);
                    //     if (res.code==400){
                    //         $('.more-loading').hide();
                    //         $('.wan-button').show();
                    //         return ;
                    //     }else {
                    //         for (var i=0;i<res.data.length; i++){
                    //             var str= "<div class='list-content'><div class='l'><a href='/article/"+res.data[i].article_id+"'><img src='/public/static/uploads/"+res.data[i].article_img+"'></a></div>";
                    //             str=str+ "<div class='r'><div class='r-titel'><a href=/article/"+res.data[i].article_id+"'>"+res.data[i].article_name+"</a></div>";
                    //             str=str+ "<div class='c'>"+res.data[i].type_name+"/"+res.data[i].author_name+"·"+res.data[i].create_time+"</div><div class='d'>"+res.data[i].article_describe+"</div></div><div class='clear'></div></div>";
                    //             $(".apen").append(str);
                    //         }
                    //         $('.more-loading').hide();
                    //         dq.show();
                    //         $('#time').val(res.data.time);
                    //     }
                    // },"json");
                }
            }
        });
    </script>
@endsection