<?php

namespace App\Http\Controllers\Index;

use App\Goods;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Login;
class  CarController extends Controller
{
//    public function car(){
//        return view('index.car.car');
//    }

    public function cart(){
        $goods_id=request()->goods_id;

        $goods_price=request()->goods_price;
        $goods_name=request()->goods_name;
        $goods_num=request()->goods_num;
        $goods_img=request()->goods_img;
        //var_dump($goods_num);

        $login_id=session("login_id");
        $login_id=$login_id['login_id'];
        $this->addCart($goods_id,$goods_price,$goods_num,$login_id,$goods_name,$goods_img);

    }
     function addCart($goods_id,$goods_price,$goods_num,$login_id,$goods_name,$goods_img){
        $where=[
            ['goods_id','=',$goods_id],
            ['login_id','=',1],
            ['is_del','=',1]
        ];
        ////查询此商品是否存在过
        $info=Cart::where($where)->first();
//         dd($info);
        if(empty($info)){
            //     //检测库存
            // $result=$this->checkGoodsNum($goods_id,$buy_number);
            // if(empty($result)){
            //     // echo "超过库存";exit();
            //     fail("超过库存");
            // }
            // 否则
            // 把商品id 购买数量 用户id  添加时间 价格 存储到购物车表中
            $arr=['goods_id'=>$goods_id,
                'goods_name'=>$goods_name,
                'buy_number'=>$goods_num,
                'add_price'=>$goods_price,
                'goods_img'=>$goods_img,
                'login_id'=>1,
                'add_time'=>time()
            ];
            //var_dump($arr);
            $res=Cart::create($arr);
        }else{
            // // //检测库存
            // //  $result=$this->checkGoodsNum($goods_id,$buy_number,$cartInfo['buy_number']);
            // //     if(empty($result)){
            // //          fail("超过库存");
            // // }
            //累加 --修改数据库的库存 时间
            // 把此用户的此商品的购买数量改为   数据库中的购买数量 + 将要购买的数量
            $goods_num=$goods_num+$info['buy_number'];
            $goods_price=$goods_price+$info['add_price'];
            $res=Cart::where($where)->update(['buy_number'=>$goods_num,'add_time'=>time(),'add_price'=>$goods_price]);
        }
        if($res){
//            // successly("");
            echo "1";
        }else{
//            // fail("加入购物车失败");
            echo "2";
        }
    }


    public function car(){
//
//        $indexid=session('name')->index_id;
//        // dd($indexid);s
//        $get=Cart::get();
//        //    dd($get);
//         $get['add_price']*$get['buy_number'];
//
//        return view('/car',['get'=>$get]);
        $cart=Cart::get();
        return view('index.car.car',['cart'=>$cart]);
    }


    public function pay(){
        return view('index.pay.pay');
    }


}
