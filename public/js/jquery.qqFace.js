!function (e) {
    function t(i) {
        if (n[i]) return n[i].exports;
        var o = n[i] = {
            exports: {},
            id: i,
            loaded: !1
        };
        return e[i].call(o.exports, o, o.exports, t),
            o.loaded = !0,
            o.exports
    }

    var n = {};
    return t.m = e,
        t.c = n,
        t.p = '',
        t(0)
}([function (e, t, n) {
    !function () {
        var e = (n(1), n(5)),
            t = n(6),
            i = n(7),
            o = n(8);
        $.extend({
            qqface: function (n) {
                var a = {
                    before: function () {
                    },
                    after: function () {
                    }
                };
                n = $.extend({}, a, n);
                var r = $('<div class="jquery-qqface">'),
                    u = $('<div class="jquery-qqface-layer">');
                u.html(o(e, n.imgPath)),
                    r.append(u).appendTo('body'),
                    r.on('click', 'i', function () {
                        var e = '[:' + $(this).data('code') + ']';
                        n.before.call(null, n.textarea, e),
                            t(n.textarea[0], e),
                            n.after.call(null, n.textarea, e),
                            r.hide()
                    }),
                    n.handle.on('click', function (e) {
                        r.show(),
                            i(n.handle, r),
                            e.stopPropagation()
                    }),
                    $(document).on('click', function () {
                        r.hide()
                    })
            }
        })
    }()
},
    function (e, t, n) {
        var i = n(2);
        'string' == typeof i && (i = [
            [e.id,
                i,
                '']
        ]);
        n(4)(i, {});
        i.locals && (e.exports = i.locals)
    },
    function (e, t, n) {
        t = e.exports = n(3)(),
            t.push([e.id,
                '.jquery-qqface{width:406;height:163;padding:5px;border:3px solid #e5e5e5;background:#fff;display:none;position:absolute}.jquery-qqface-layer{width:406px;height:163px;cursor:pointer;position:relative}.jquery-qqface-layer i{width:26px;height:26px;border:1px solid #ccc;margin:-1px 0 0 -1px;display:block;float:left}',
                ''])
    },
    function (e, t) {
        e.exports = function () {
            var e = [];
            return e.toString = function () {
                for (var e = [], t = 0; t < this.length; t++) {
                    var n = this[t];
                    n[2] ? e.push('@media ' + n[2] + '{' + n[1] + '}') : e.push(n[1])
                }
                return e.join('')
            },
                e.i = function (t, n) {
                    'string' == typeof t && (t = [
                        [null,
                            t,
                            '']
                    ]);
                    for (var i = {}, o = 0; o < this.length; o++) {
                        var a = this[o][0];
                        'number' == typeof a && (i[a] = !0)
                    }
                    for (o = 0; o < t.length; o++) {
                        var r = t[o];
                        'number' == typeof r[0] && i[r[0]] || (n && !r[2] ? r[2] = n : n && (r[2] = '(' + r[2] + ') and (' + n + ')'), e.push(r))
                    }
                },
                e
        }
    },
    function (e, t, n) {
        function i(e, t) {
            for (var n = 0; n < e.length; n++) {
                var i = e[n],
                    o = p[i.id];
                if (o) {
                    o.refs++;
                    for (var a = 0; a < o.parts.length; a++) o.parts[a](i.parts[a]);
                    for (; a < i.parts.length; a++) o.parts.push(f(i.parts[a], t))
                } else {
                    for (var r = [], a = 0; a < i.parts.length; a++) r.push(f(i.parts[a], t));
                    p[i.id] = {
                        id: i.id,
                        refs: 1,
                        parts: r
                    }
                }
            }
        }

        function o(e) {
            for (var t = [], n = {}, i = 0; i < e.length; i++) {
                var o = e[i],
                    a = o[0],
                    r = o[1],
                    u = o[2],
                    s = o[3],
                    f = {
                        css: r,
                        media: u,
                        sourceMap: s
                    };
                n[a] ? n[a].parts.push(f) : t.push(n[a] = {
                    id: a,
                    parts: [
                        f
                    ]
                })
            }
            return t
        }

        function a(e, t) {
            var n = v(),
                i = b[b.length - 1];
            if ('top' === e.insertAt) i ? i.nextSibling ? n.insertBefore(t, i.nextSibling) : n.appendChild(t) : n.insertBefore(t, n.firstChild),
                b.push(t);
            else {
                if ('bottom' !== e.insertAt) throw new Error('Invalid value for parameter \'insertAt\'. Must be \'top\' or \'bottom\'.');
                n.appendChild(t)
            }
        }

        function r(e) {
            e.parentNode.removeChild(e);
            var t = b.indexOf(e);
            t >= 0 && b.splice(t, 1)
        }

        function u(e) {
            var t = document.createElement('style');
            return t.type = 'text/css',
                a(e, t),
                t
        }

        function s(e) {
            var t = document.createElement('link');
            return t.rel = 'stylesheet',
                a(e, t),
                t
        }

        function f(e, t) {
            var n,
                i,
                o;
            if (t.singleton) {
                var a = y++;
                n = x || (x = u(t)),
                    i = c.bind(null, n, a, !1),
                    o = c.bind(null, n, a, !0)
            } else e.sourceMap && 'function' == typeof URL && 'function' == typeof URL.createObjectURL && 'function' == typeof URL.revokeObjectURL && 'function' == typeof Blob && 'function' == typeof btoa ? (n = s(t), i = d.bind(null, n), o = function () {
                r(n),
                n.href && URL.revokeObjectURL(n.href)
            }) : (n = u(t), i = l.bind(null, n), o = function () {
                r(n)
            });
            return i(e),
                function (t) {
                    if (t) {
                        if (t.css === e.css && t.media === e.media && t.sourceMap === e.sourceMap) return;
                        i(e = t)
                    } else o()
                }
        }

        function c(e, t, n, i) {
            var o = n ? '' : i.css;
            if (e.styleSheet) e.styleSheet.cssText = m(t, o);
            else {
                var a = document.createTextNode(o),
                    r = e.childNodes;
                r[t] && e.removeChild(r[t]),
                    r.length ? e.insertBefore(a, r[t]) : e.appendChild(a)
            }
        }

        function l(e, t) {
            var n = t.css,
                i = t.media;
            t.sourceMap;
            if (i && e.setAttribute('media', i), e.styleSheet) e.styleSheet.cssText = n;
            else {
                for (; e.firstChild;) e.removeChild(e.firstChild);
                e.appendChild(document.createTextNode(n))
            }
        }

        function d(e, t) {
            var n = t.css,
                i = (t.media, t.sourceMap);
            i && (n += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(i)))) + ' */');
            var o = new Blob([n], {
                    type: 'text/css'
                }),
                a = e.href;
            e.href = URL.createObjectURL(o),
            a && URL.revokeObjectURL(a)
        }

        var p = {},
            h = function (e) {
                var t;
                return function () {
                    return 'undefined' == typeof t && (t = e.apply(this, arguments)),
                        t
                }
            },
            g = h(function () {
                return /msie [6-9]\b/.test(window.navigator.userAgent.toLowerCase())
            }),
            v = h(function () {
                return document.head || document.getElementsByTagName('head') [0]
            }),
            x = null,
            y = 0,
            b = [];
        e.exports = function (e, t) {
            t = t || {},
            'undefined' == typeof t.singleton && (t.singleton = g()),
            'undefined' == typeof t.insertAt && (t.insertAt = 'bottom');
            var n = o(e);
            return i(n, t),
                function (e) {
                    for (var a = [], r = 0; r < n.length; r++) {
                        var u = n[r],
                            s = p[u.id];
                        s.refs--,
                            a.push(s)
                    }
                    if (e) {
                        var f = o(e);
                        i(f, t)
                    }
                    for (var r = 0; r < a.length; r++) {
                        var s = a[r];
                        if (0 === s.refs) {
                            for (var c = 0; c < s.parts.length; c++) s.parts[c]();
                            delete p[s.id]
                        }
                    }
                }
        };
        var m = function () {
            var e = [];
            return function (t, n) {
                return e[t] = n,
                    e.filter(Boolean).join('\n')
            }
        }()
    },
    function (e, t) {
        e.exports = [
            'weixiao,微笑',
            'piezui,撇嘴',
            'se,色',
            'fadai,发呆',
            'deyi,得意',
            'liulei,流泪',
            'haixiu,害羞',
            'bizui,闭嘴',
            'shui,睡',
            'daku,大哭',
            'ganga,尴尬',
            'fanu,发怒',
            'tiaopi,调皮',
            'ciya,呲牙',
            'jingya,惊讶',
            'nanguo,难过',
            'ku,酷',
            'lenghan,冷汗',
            'zhuakuang,抓狂',
            'tu,吐',
            'touxiao,偷笑',
            'keai,可爱',
            'baiyan,白眼',
            'aoman,-傲慢',
            'jie,饥饿',
            'kun,困',
            'jingkong,惊恐',
            'liuhan,流汗',
            'hanxiao,憨笑',
            'dabing,大兵',
            'fendou,奋斗',
            'zhouma,咒骂',
            'yiwen,疑问',
            'xu,嘘',
            'yun,晕',
            'zhemo,折磨',
            'shuai,衰',
            'kulou,骷髅',
            'qiaoda,敲打',
            'zaijian,再见',
            'cahan,擦汗',
            'koubi,抠鼻',
            'guzhang,鼓掌',
            'qiudale,糗大了',
            'huaixiao,坏笑',
            'zuohengheng,左哼哼',
            'youhengheng,右哼哼',
            'haqian,哈欠',
            'bishi,鄙视',
            'weiqu,委屈',
            'kuaikule,快哭了',
            'yinxian,阴险',
            'qinqin,亲亲',
            'xia,吓',
            'kelian,可怜',
            'caidao,菜刀',
            'xigua,西瓜',
            'pijiu,啤酒',
            'lanqiu,篮球',
            'pingpang,乒乓',
            'kafei,咖啡',
            'fan,饭',
            'zhutou,猪头',
            'meigui,玫瑰',
            'diaoxie,凋谢',
            'shiai,示爱',
            'aixin,爱心',
            'xinsui,心碎',
            'dangao,蛋糕',
            'shandian,闪电',
            'zhadan,炸弹',
            'dao,刀',
            'zuqiu,足球',
            'piaochong,瓢虫',
            'bianbian,便便',
            'yueliang,月亮',
            'taiyang,太阳',
            'liwu,礼物',
            'yongbao,拥抱',
            'qiang,强',
            'ruo,弱',
            'woshou,握手',
            'shengli,胜利',
            'baoquan,抱拳',
            'gouyin,勾引',
            'quantou,拳头',
            'chajin,差劲',
            'aini,爱你',
            'no,NO',
            'ok,OK'
        ]
    },
    function (e, t) {
        e.exports = function (e, t) {
            if (e.focus(), document.selection) {
                var n = document.selection.createRange();
                n.text = t
            } else if ('number' == typeof e.selectionStart && 'number' == typeof e.selectionEnd) {
                var i = e.selectionStart,
                    o = e.selectionEnd,
                    a = i,
                    r = e.value;
                e.value = r.substring(0, i) + t + r.substring(o, r.length),
                    a += t.length,
                    e.selectionStart = e.selectionEnd = a
            } else e.value += t
        }
    },
    function (e, t) {
        e.exports = function (e, t) {
            var n,
                i,
                o = $(window),
                a = e.offset().left,
                r = e.offset().top,
                u = e.outerWidth(),
                s = e.outerHeight(),
                f = o.width(),
                c = o.height();
            if (a + t.outerWidth() < f) n = a;
            else {
                var l = f - a - u;
                n = f - l - t.outerWidth()
            }
            i = r + t.outerHeight() < c ? r + s : r - t.outerHeight(),
                t.css({
                    left: n,
                    top: i,
                    'z-index':11
                })
        }
    },
    function (e, t) {
        e.exports = function (e, t) {
            return $.map(e, function (e, n) {
                e = e.split(',');
                var i = t + e[0] + '.gif';
                return '<i data-code="' + e[1] + '"><img src="' + i + '" width="24" height="24" title="' + e[1] + '" /></i>'
            }).join('')
        }
    }
]);
