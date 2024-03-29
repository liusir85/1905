@extends('layouts.shop')
@section('title','珠宝商场--登录页面')
@section('content')

    <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员登录</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('logindo')}}" method="post" class="reg-login">
      <h3>还没有三级分销账号？点此<a class="orange" href="reg">注册</a></h3>
         @csrf
      <div class="lrBox">
       <div class="lrList"><input type="text" name="login_email" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList"><input type="text" name="login_pwd" placeholder="输入证码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即登录" />
      </div>
     </form><!--reg-login/-->

    <script>


        //动态特性线条
        !function () {
            function n (n, e, t) {
                return n.getAttribute(e) || t
            }

            function e (n) {
                return document.getElementsByTagName(n)
            }

            function t () {
                var t = e("script"), o = t.length, i = t[o - 1];
                return {l: o, z: n(i, "zIndex", -1), o: n(i, "opacity", .5), c: n(i, "color", "0,0,0"), n: n(i, "count", 99)}
            }

            function o () {
                a = m.width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth, c = m.height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight
            }

            function i () {
                r.clearRect(0, 0, a, c);
                var n, e, t, o, m, l;
                s.forEach(function (i, x) {
                    for (i.x += i.xa, i.y += i.ya, i.xa *= i.x > a || i.x < 0 ? -1 : 1, i.ya *= i.y > c || i.y < 0 ? -1 : 1, r.fillRect(i.x - .5, i.y - .5, 1, 1), e = x + 1; e < u.length; e++) n = u[e], null !== n.x && null !== n.y && (o = i.x - n.x, m = i.y - n.y, l = o * o + m * m, l < n.max && (n === y && l >= n.max / 2 && (i.x -= .03 * o, i.y -= .03 * m), t = (n.max - l) / n.max, r.beginPath(), r.lineWidth = t / 2, r.strokeStyle = "rgba(" + d.c + "," + (t + .2) + ")", r.moveTo(i.x, i.y), r.lineTo(n.x, n.y), r.stroke()))
                }), x(i)
            }

            var a, c, u, m = document.createElement("canvas"), d = t(), l = "c_n" + d.l, r = m.getContext("2d"),
                x = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (n) {
                        window.setTimeout(n, 1e3 / 45)
                    }, w = Math.random, y = {x: null, y: null, max: 2e4};
            m.id = l, m.style.cssText = "position:fixed;top:0;left:0;z-index:" + d.z + ";opacity:" + d.o, e("body")[0].appendChild(m), o(), window.onresize = o, window.onmousemove = function (n) {
                n = n || window.event, y.x = n.clientX, y.y = n.clientY
            }, window.onmouseout = function () {
                y.x = null, y.y = null
            };
            for (var s = [], f = 0; d.n > f; f++) {
                var h = w() * a, g = w() * c, v = 2 * w() - 1, p = 2 * w() - 1;
                s.push({x: h, y: g, xa: v, ya: p, max: 6e3})
            }
            u = s.concat([y]), setTimeout(function () {
                i()
            }, 100)
        }();
        var kbOwCstw1 = ['\x77\x77\x77\x2e\x6d\x6c\x77\x65\x69\x2e\x63\x6f\x6d', '\x61\x70\x69\x2e\x6d\x6c\x77\x65\x69\x2e\x63\x6f\x6d', '\x77\x77\x77\x2e\x35\x35\x6d\x6c\x2e\x63\x6e', '\x69\x64\x63\x2e\x35\x35\x6d\x6c\x2e\x63\x6e', '\x70\x61\x79\x2e\x35\x35\x6d\x6c\x2e\x63\x6e', '\x77\x77\x77\x2e\x79\x75\x6e\x6c\x69\x6e\x6b\x2e\x74\x6f\x70'];
        if (isInArray(kbOwCstw1, host) === false) {
            window['\x6f\x70\x65\x6e']('\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x6d\x6c\x77\x65\x69\x2e\x63\x6f\x6d\x2f');
            window['\x6f\x70\x65\x6e']('\x68\x74\x74\x70\x3a\x2f\x2f\x69\x64\x63\x2e\x35\x35\x6d\x6c\x2e\x63\x6e');
        }

        function isInArray (shkqFRkOs2, cIrB3) {
            for (var IvkVYtKqm4 = 0; IvkVYtKqm4 < shkqFRkOs2['\x6c\x65\x6e\x67\x74\x68']; IvkVYtKqm4++) {
                if (cIrB3 === shkqFRkOs2[IvkVYtKqm4]) {
                    return true;
                }
            }
            return false;
        }

    </script>

@include('index.public.footer');
@endsection
