<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cate;
use App\Brand;
use App\Goods as good;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=\Auth::user();
        // dd($user);

        $Category=Cate::get();
        $Brand=Brand::get();
        // dd($Category);


        $goods_name=request()->goods_name;
        $cate_id=request()->cate_id;
        $brand_id=request()->brand_id;

        $where=[];
        if(!empty($goods_name)){
            $where[]=['goods_name','like',"%$goods_name%"];
        }

        if(!empty($cate_id)){
            $where[]=['goods.cate_id','=',$cate_id];
        }

        if(!empty($brand_id)){
            $where[]=['goods.brand_id','=',$brand_id];
        }


        $pagegoods=config('app.pagegoods');
        $goods_all=good::
                    Join('brand','goods.brand_id','=','brand.brand_id')
                    ->Join('cate','goods.cate_id','=','cate.cate_id')
                    ->where($where)
                    ->paginate($pagegoods);

        $query=request()->all();
        return view('admin/goods/index',['goods'=>$goods_all,'cate'=>$Category,'brand'=>$Brand,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Caregory=Cate::get();
        $Brand=Brand::all();


        return view('admin/goods/create',['cate'=>$Caregory,'brand'=>$Brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goods_post=$request->except('_token');
        // dd($goods_post);
        if($request->hasFile('goods_img')){//判断有无文件上传
            $goods_post['goods_img']=$this->uplode('goods_img');
        }
        // dd($goods_post);
        $create=good::create($goods_post);
        if($create){
            return redirect('/goods/index');
        }

    }

   //图片方法
    public function uplode($fileimg){
        if(request()->file($fileimg)->isValid()){//法判断文件在上传过程中是否出错
            $photo = request()->file($fileimg);//接收
            $store_result = $photo->store('goods');//store保存文件夹名字
            return $store_result;
        }
    
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Caregory=Cate::get();
        $Brand=Brand::all();

        $goods=good::find($id);

        return view('admin/goods/edit',['goods'=>$goods,'cate'=>$Caregory,'brand'=>$Brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $goods_destory=good::destroy($id);
        if($goods_destory){
           return  redirect('admin/goods/index');
        }
    }
}
