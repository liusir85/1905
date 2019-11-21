<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\Http\Requests\StoreBenPost;
use Illuminate\Http\Request;
use DB;
use App\Ben;
use Illuminate\Support\Facades\Auth;

class BenController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=\Auth::user();
        $id=\Auth::id();
//        dd($id);

//        getAll();


        //session的使用
        //设置session
//        session(['user'=>'张']);
//        request()->session()->put('username','你猜');

        //获取
//        echo session('user');
//        echo request()->session()->get('username');

        //删除
//        session(['user'=>null]);
//        echo request()->session()->pull('username');//现获取在删除

//        request()->session()->forget('username');//删除单个
//        request()->session()->flush();//删除所有
//        dump(session('user'));
//        dd(session('username'));


        //分页
        $pageSize=config('app.pageSize');
        //搜索
        $word=request()->word;
        $where=[];
        if($word){
            $where[]=['ben_cate','like',"%$word%"];
        }

        $biao=request()->biao;
        if($biao){
            $where[]=['ben_biao','like',"%$biao%"];
        }

        $data=Ben::where($where)->paginate($pageSize);
        $query=request()->all();
        return view('admin.ben.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ben.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //第二种验证
    public function store(Request $request)//第一种和第三种验证
    {

//        第一种验证
        $validatedData = $request->validate([
            'ben_biao' => 'required|unique:ben',
            'ben_cate' => 'required',
            'ben_zyx'=>'required',
            'ben_xs'=>'required',
        ],[
            'ben_biao.required'=>'文章不能为空',
            'ben_biao.unique'=>'文章已存在',
            'ben_cate.required'=>'文章分类不能为空',
            'ben_zyx.required'=>'文章重要性不能为空',
            'ben_xs.required'=>'是否显示不能为空',
        ]);
        //接受排除_token的值也能排除其他的值
        $post=$request->except('_token');
        //文件上传
        if($request->hasFile('ben_chuan')){
            $post['ben_chuan']=$this->upload('ben_chuan');
        }
        //ORM 添加
        $ben=Ben::create($post);
        if($ben->ben_id){
            return redirect('/ben/index');
        }
    }
    //文件上传
    public function upload($filename){
        if ( request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('upload');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');

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
     *编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id){
            return;
        }
        $data=Ben::where('ben_id',$id)->first();
        return view('admin.ben.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 执行编辑
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
    public function update(StoreBenPost $request, $id)
    {
        //        echo $id;
        //验证
        //接值
        $post=$request->except('_token');
//        dd($post);
        //判断有无文件上传 有 文件上传
        if($request->hasFile('ben_chuan')){
            $post['ben_chuan']=$this->upload('ben_chuan');
        }
        //更新数据库
        Ben::where('ben_id',$id)->update($post);
//        dd($data);
        return redirect('/ben/index');
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        if(!$id){
//            abort(404);
//        }
//        //ORM 删除
//        $res=Ben::destroy($id);
//
//        //删除后返回列表页面
//        if($res){
//            return redirect('/ben/index');
//        }
//    }


    public function delete(Request $request)
    {
        $res=0;
        $id=$request->input('id');
        $ArticleInfo = Ben::find($id);
        $result=$ArticleInfo->delete();
        $result==true && $res=1;
        return  $res;
    }

    public function checkOnly(){
        $ben_biao=request()->ben_biao;

        $count=Ben::where('ben_biao',$ben_biao)->count();
        echo $count;
    }
}
