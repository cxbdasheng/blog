/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(function(){
    // 回顶部
    $(window).scroll(function(){
        if($(this).scrollTop() > 200){
            $('.return').fadeIn(300);
        }else{
            $('.return').fadeOut(300);
        }
    });
    $('.returntop').click(function(){
        $('html ,body').animate({scrollTop: 0}, 300);
        return false;
    });
    // 移动端导航
    $("#check-nav").click(function(){
        var display=$('.left-nav').css("display");

        if (display=="none") {
            $('.left-nav').show(300);
            $("#check-nav").removeClass("icon-zhedie");
            $("#check-nav").addClass("icon-zhedie1");
        }else{
            $('.left-nav').hide(400);
            $("#check-nav").removeClass("icon-zhedie1");
            $("#check-nav").addClass("icon-zhedie");
        };
    });
    $('.mp').click(function(){
        $('.left-nav').hide(400);
        $("#check-nav").removeClass("icon-zhedie1");
        $("#check-nav").addClass("icon-zhedie");
    });
    var pathname=window.location.pathname;
    $(".top-nav-right a").each(function(){
        var href=$(this).attr('href');
        if (pathname==href)$(this).addClass('active');
    });
    if (pathname=="/")$('#nav').eq(0).addClass('active');
    $(".mnav a").each(function(){
        var href=$(this).attr('href');
        if (pathname==href)$(this).addClass('selected');
    });
    if (pathname=="/")$('#left-nav').eq(0).addClass('selected');
});