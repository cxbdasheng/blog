/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/common.js":
/*!********************************!*\
  !*** ./resources/js/common.js ***!
  \********************************/
/***/ (() => {

$(document).ready(function () {
  $("#nav .sub-menu a").click(function () {
    var url = $(this).attr("url");
    window.location.href = url;
  });
  var now_url = window.location.href;
  $("#nav .sub-menu a").each(function () {
    if ($(this).attr("url")) {
      if ($(this).attr("url") == now_url) {
        $(this).parent().parent().parent().addClass('open');
        $(this).parent().parent().parent().children('a').find('.nav_right').html('&#xe6a6;');
        $(this).parent().parent().parent().children('.sub-menu').stop(true, true).slideDown();
        $(this).addClass('active');
      }
    }
  });
});
layui.use(['layer', 'element', 'jquery'], function () {
  layer = layui.layer;
  element = layui.element;
  $ = layui.jquery;
  // 左侧缩小提示
  var left_tips_index = null;
  $('.left-nav #nav').on('mouseenter', '.left-nav-li', function (event) {
    if ($('.left-nav').css('width') != '220px') {
      var tips = $(this).attr('lay-tips');
      left_tips_index = layer.tips(tips, $(this));
    }
  });
  $('.left-nav #nav').on('mouseout', '.left-nav-li', function (event) {
    layer.close(left_tips_index);
  });
  //左侧菜单
  $('.left-nav #nav').on('click', 'li', function (event) {
    if ($('.left-nav').css('width') == '60px') {
      $('.left-nav').animate({
        width: '220px'
      }, 100);
      $('.layui-easy .layui-body').animate({
        left: '220px'
      }, 100);
      $('.left-nav i').css('font-size', '14px');
      $('.left-nav cite,.left-nav .nav_right').show();
      $('#page-panel').animate({
        left: '220px'
      }, 100);
      $('.logo').animate({
        width: '220px'
      }, 100);
      $('.logo span').show();
      $('.logo i').hide();
    }
    if ($(window).width() < 768) {
      $('.page-content-bg').show();
    }
    $('.left-nav').find('a').removeClass('active');
    $(this).children('a').addClass('active');
    if ($(this).children('.sub-menu').length) {
      if ($(this).hasClass('open')) {
        $(this).removeClass('open');
        $(this).find('.nav_right').html('&#xe697;');
        $(this).children('.sub-menu').stop(true, true).slideUp();
        $(this).siblings().children('.sub-menu').slideUp();
      } else {
        $(this).addClass('open');
        $(this).children('a').find('.nav_right').html('&#xe6a6;');
        $(this).children('.sub-menu').stop(true, true).slideDown();
        $(this).siblings().children('.sub-menu').stop(true, true).slideUp();
        $(this).siblings().find('.nav_right').html('&#xe697;');
        $(this).siblings().removeClass('open');
      }
    }
    event.stopPropagation();
  });
  // 隐藏左侧
  $('.layui-easy .left_open i').click(function (event) {
    if ($('.left-nav').css('width') == '220px') {
      $('.left-nav .open').click();
      $('.left-nav i').css('font-size', '18px');
      $('.left-nav').animate({
        width: '60px'
      }, 100);
      $('.left-nav cite,.left-nav .nav_right').hide();
      $('.layui-easy .layui-body').animate({
        left: '60px'
      }, 100);
      $('#page-panel').animate({
        left: '60px'
      }, 100);
      $('.logo').animate({
        width: '60px'
      }, 100);
      $('.logo span').hide();
      $('.logo i').show();
      $('.page-content-bg').hide();
    } else {
      $('.left-nav').animate({
        width: '220px'
      }, 100);
      $('.layui-easy .layui-body').animate({
        left: '220px'
      }, 100);
      $('#page-panel').animate({
        left: '220px'
      }, 100);
      $('.logo').animate({
        width: '220px'
      }, 100);
      $('.left-nav i').css('font-size', '14px');
      $('.logo span').show();
      $('.logo i').hide();
      $('.left-nav cite,.left-nav .nav_right').show();
      if ($(window).width() < 768) {
        $('.page-content-bg').show();
      }
    }
  });
  // 背景虚化
  $('.page-content-bg').click(function (event) {
    $('.left-nav .open').click();
    $('.left-nav i').css('font-size', '18px');
    $('.left-nav').animate({
      width: '60px'
    }, 100);
    $('.left-nav cite,.left-nav .nav_right').hide();
    $('.layui-easy .layui-body').animate({
      left: '60px'
    }, 100);
    $('#page-panel').animate({
      left: '60px'
    }, 100);
    $('.logo').animate({
      width: '60px'
    }, 100);
    $('.logo span').hide();
    $('.logo i').show();
    $(this).hide();
  });
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
// require('./bootstrap');
__webpack_require__(/*! ./common */ "./resources/js/common.js");
})();

/******/ })()
;