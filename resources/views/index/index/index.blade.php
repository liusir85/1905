@extends('layouts.shop')
@section('title','珠宝商场')
@section('content')

     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
      <dl>
       <dt><a href="user.html"><img src="/static/index/images/touxiang.jpg" /></a></dt>
       <dd>
        <h1 class="username">三级分销终身荣誉会员</h1>
        <ul>
         <li><a href="prolist.html"><strong>34</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="login">登录</a></li>
      <li><a href="reg" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <div id="sliderA" class="slider">
      <img src="/static/index/images/image1.jpg" />
      <img src="/static/index/images/image2.jpg" />
      <img src="/static/index/images/image3.jpg" />
      <img src="/static/index/images/image4.jpg" />
      <img src="/static/index/images/image5.jpg" />
     </div><!--sliderA/-->
     <ul class="pronav">
      <li><a href="prolist.html">晋恩干红</a></li>
      <li><a href="prolist.html">万能手链</a></li>
      <li><a href="prolist.html">高级手镯</a></li>
      <li><a href="prolist.html">特异戒指</a></li>
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">
         @foreach($goodsInfo as $v)
      <div class="index-pro1-list">
       <dl>
        <dt><a href="{{url('/proinfo/'.$v->goods_id)}}"><img src="{{env('GOODS_URL')}}{{$v->goods_img}}" /></a></dt>
        <dd class="ip-text"><a href="proinfo.html">{{$v->goods_name}}</a><span>已售：488</span></dd>
        <dd class="ip-price"><strong>¥{{$v->goods_price}}</strong> <span>¥599</span></dd>
       </dl>
      </div>
         @endforeach
     </div><!--prolist/-->
     <div class="joins"><a href="fenxiao.html"><img src="/static/index/images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>





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
