<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class RegController extends Controller
{
    public function index()
    {
        return view('text');
    }

    public function dofrom()
    {
        return view('text');
    }

    //必填
//    public function goods($goods_id)
//    {
//        echo $goods_id;
//    }

//可选
    public function goods($goods_id='99')
    {
        echo $goods_id;
    }




    public function dologin(){
        $post=request()->except('_token');
        if (Auth::attempt($post)) {
            // 认证通过...
            return redirect('/ben/index');
        }else{
            return redirect('/login')->with('msg','没有此用户');
        }

    }

    public function doReg(){
        $post=request()->except('_token');
//        dd($post);

        $post['password']=bcrypt($post['password']);
        $res=User::create($post);
        dd($res);
    }
}
