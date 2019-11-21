<?php

namespace App\Http\Controllers\Index;

use App\Goods;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods as good;

class ProinfoController extends Controller
{
    public function proinfo($goods_id){
        $where=[
            ['goods_id','=',$goods_id]
        ];
        $goodsInfo=Goods::where($where)->first();

        return view('index.proinfo.proinfo',['goodsInfo'=>$goodsInfo]);
    }
}
