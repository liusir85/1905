<?php

namespace App\Http\Controllers\Index;

use App\Goods;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cate;

class IndexController extends Controller
{
    public function index(){
        $goodsInfo=Goods::all();
//        $cateInfo=
//        $cate_id=\request()->cate_id;
//        $data=Goods::get();
//        $cateInfo=Cate::where('parent_id',0)->get();
        return view('index.index.index',['goodsInfo'=>$goodsInfo]);
    }
}
