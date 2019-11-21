<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//闭包路由
//Route::get('/', function () {
//    return view('welcome');
//});

//闭包
//Route::get('/hello',function (){
//   echo 123;
//});


//路由视图
//Route::view('/text','text');

//post路由
//Route::post('/dofrom',function(){
//   $post=request()->post();
//    $post=request()->all();
//   dd($post);
//});

//Route::get('/reg','RegController@index');
//
//Route::get('/dofrom','RegController@dofrom');
//
//Route::redirect('/reg','/hello');

//Route::get('/goods/{goods_id}',function($goods_id){
//    echo $goods_id;
//});

//必填参数
//Route::get('/goods/{goods_id}','RegController@goods');

//可选参数
//Route::get('/goods/{goods_id?}','RegController@goods');
//
//
//Route::get('/show/{id}/{name?}',function($id,$name='哈哈'){
//        echo $id;
//        echo $name;
//});

//可选  必填赋值
//Route::get('/show1/{id?}',function($id='0'){
//    echo $id;
//})->where('id','[0-9]+');




//cookie
//Route::get('/setcookie',function(){
//    //设置队列
//    Cookie::queue(Cookie::make('num','君莫笑',2));
    //获取
//    $name=request()->cookie('name');
//    $name=Illuminate\Support\Facades\cookie::get('name');
//    echo $name;
    //设置
//   return response('欢迎大佬')->cookie('name','土豪',2);
//});

//Route::get('/cookie',function(){
    //获取
//    $name=request()->cookie('name');
//    $name=Illuminate\Support\Facades\cookie::get('num');
//    echo $name;
    //设置
//   return response('欢迎大佬')->cookie('name','土豪',2);
//});


//后台
//Route::domain('www.1905.com')->group(function(){
//品牌
Route::prefix('/brand')->middleware('checklogin')->group(function(){
    Route::get('create','Admin\BrandController@create');
    Route::post('store','Admin\BrandController@store');
    Route::get('index','Admin\BrandController@index');
    Route::get('delete/{id}','Admin\BrandController@destroy');
    Route::get('edit/{id}','Admin\BrandController@edit');
    Route::post('update/{id}','Admin\BrandController@update');
    Route::post('checkOnly','Admin\BrandController@checkOnly');
});


//商品
Route::prefix('/goods')->group(function(){
    Route::get('create','Admin\GoodsController@create');
    Route::post('store','Admin\GoodsController@store');
    Route::get('index','Admin\GoodsController@index');
    Route::get('delete/{id}','Admin\GoodsController@destroy');
    Route::get('edit/{id}','Admin\GoodsController@edit');
    Route::post('update/{id}','Admin\GoodsController@update');
    Route::post('checkOnly','Admin\GoodsController@checkOnly');
});



//管理员
Route::prefix('/admins')->middleware('checklogin')->group(function(){
    Route::get('create','Admin\AdminsController@create');
    Route::post('store','Admin\AdminsController@store');
    Route::get('index','Admin\AdminsController@index');
    Route::get('delete/{id}','Admin\AdminsController@destroy');
    Route::get('edit/{id}','Admin\AdminsController@edit');
    Route::post('update/{id}','Admin\AdminsController@update');
    Route::post('checkOnly','Admin\AdminsController@checkOnly');
});

//分类
Route::prefix('/cate')->middleware('checklogin')->group(function(){
    Route::get('create','Admin\CateController@create');
    Route::post('store','Admin\CateController@store');
    Route::get('index','Admin\CateController@index');
});

//});

//Route::prefix('/login/')->group(function () {
//    Route::get('login','Admin\LoginController@create');
//    Route::post('login','Admin\LoginController@store');
//});
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//登录注册//后台
Route::view('/login','login')->name('login');
Route::post('/dologin','RegController@dologin');
Route::view('/reg/','reg');
Route::post('/doReg','RegController@doReg');



//考试1
Route::prefix('/ben')->middleware('checklogin')->group(function() {
    Route::get('create', 'Admin\BenController@create');
    Route::post('store', 'Admin\BenController@store');
    Route::get('index','Admin\BenController@index');
    Route::post('delete','Admin\BenController@delete');
    Route::get('edit/{id}','Admin\BenController@edit');
    Route::post('update/{id}','Admin\BenController@update');
    Route::post('checkOnly','Admin\BenController@checkOnly');
});



//前台
Route::get('/','Index\IndexController@index');//首页前台
Route::get('/login','Index\LoginController@login');//前台登录
Route::get('/reg','Index\LoginController@reg');//前台注册
Route::post('/regis','Index\LoginController@regis');//执行注册
Route::post('/send','Index\LoginController@send');//发送验证码post
Route::post('logindo','Index\LoginController@logindo');//执行登陆

Route::get('/proinfo/{id}','Index\ProinfoController@proinfo');//详情页/
Route::get('/car','Index\CarController@car');//购物车
Route::get('/cart','Index\CarController@cart');
Route::get('/pay','Index\CarController@pay');//购物车结算单



//其他
Route::get('/book','BookController@book');
Route::get('/bookDo','BookController@bookDo');
Route::get('/btn','BookController@btn');




//考试2
Route::get('/userd/create','Kaoshi\UserdController@create');
Route::post('/userd/store','Kaoshi\UserdController@store');
Route::get('/userd/index','Kaoshi\UserdController@index');
Route::get('/userd/edit/{id}','Kaoshi\UserdController@edit');
Route::post('/userd/update/{id}','Kaoshi\UserdController@update');

Route::get('/huo/create','Kaoshi\HuoController@create');
Route::post('/huo/store','Kaoshi\HuoController@store');
Route::get('/huo/index','Kaoshi\HuoController@index');


Route::view('/asd','asd');

Route::get('/classs/index','Classs\ClasssController@index');


