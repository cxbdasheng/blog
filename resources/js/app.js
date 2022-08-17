require('jssocials/dist/jssocials.min');

require('social-share.js/dist/js/jquery.share.min');

$(function () {
    // 回顶部
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.return').fadeIn(300);
        } else {
            $('.return').fadeOut(300);
        }
    });
    $('.returntop').click(function () {
        $('html ,body').animate({scrollTop: 0}, 300);
        return false;
    });
    // 移动端导航
    $("#check-nav").click(function () {
        var display = $('.left-nav').css("display");
        if (display == "none") {
            $('.left-nav').show(300);
            $("#check-nav").removeClass("icon-zhedie");
            $("#check-nav").addClass("icon-zhedie1");
        } else {
            $('.left-nav').hide(400);
            $("#check-nav").removeClass("icon-zhedie1");
            $("#check-nav").addClass("icon-zhedie");
        }
        ;
    });
    $('.mp').click(function () {
        $('.left-nav').hide(400);
        $("#check-nav").removeClass("icon-zhedie1");
        $("#check-nav").addClass("icon-zhedie");
    });
    var pathname = window.location.href;
    var nav = window.location.pathname;
    $(".top-nav-right a").each(function () {
        var href = $(this).attr('href');
        if (pathname == href) $(this).addClass('active');
        if (nav == href) $(this).addClass('active');
    });
    if (pathname == "/") $('#nav').eq(0).addClass('active');
    $(".mnav a").each(function () {
        var href = $(this).attr('href');
        if (pathname == href) $(this).addClass('selected');
        if (nav == href) $(this).addClass('selected');
    });
    if (pathname == "/") $('#left-nav').eq(0).addClass('selected');

    // 顶部导航吸顶
    var moun;//定义全局变量
    $(window).scroll(function () {
        clearTimeout(moun);
        if ($(document).scrollTop() > 0) {
            moun = setTimeout(function () {
                $(".top_2").addClass("mounting");
            }, 100);
        } else {
            moun = setTimeout(function () {
                $(".top_2").removeClass("mounting");
            }, 10);
        }
    });

    if ($(document).scrollTop() > 0) {
        $(".top_2").addClass("mounting");
    } else {
        $(".top_2").removeClass("mounting");
    }
    //搜索框光标聚焦边框变色
    var searchColor = $(".main-right .search input");
    searchColor.onfocus = function () {
        $(this).addClass("border-color");
    };
    searchColor.onblur = function () {
        $(this).removeClass("border-color");
    };

    function clickHandler() {
        $('.top-nav-left').addClass('onmouseover');
        setTimeout(function () {
            $('.top-nav-left').removeClass('onmouseover');
            $('.top-nav-left').one('mouseover', clickHandler);
        }, 1000);
    }

    $('.top-nav-left').one('mouseover', clickHandler);

    // 固定在顶部
    // $(window).scroll(function(){
    //     if($(this).scrollTop() > 1000){
    //         var wh=$(window).height();
    //         var h=$(this).scrollTop();
    //         if (wh < 662) {
    //             $('.right-fix').css("top",h-370);
    //         }else{
    //             $('.right-fix').css("top",h-140);
    //         };
    //     }else{
    //         $('.right-fix').css("top","auto");
    //     }
    // });
    $("img.lazy").lazyload({
        placeholder: "/img/loading.gif",
        effect: "fadeIn",
        failure_limit: 10,
    });

    // 登入弹出框JS
    $("#index-login,#comments-login,#lytext").click(function () {
        var display = $('.pop').css("display");
        if (display == "none") {
            $('.pop').show();
            $('.pop-shade').show();
        } else {
            $('.pop').hide();
            $('.pop-shade').hide();
        }
    });


    $('.pop-shade').click(function () {
        $('.pop').hide();
        $(this).hide();
    });
    $('#login_close').click(function () {
        $('.pop').hide();
        $('.pop-shade').hide();
    });

});
emojify = require('emojify.js');
emojify.setConfig({img_dir: '/img/emojis'});
