<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\StoreAdminsPost;
use App\Admins;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //分页
        $pageSize=config('app.pageSize');
        //搜索
        $word=request()->word;
        $where=[];
        if($word){
            $where[]=['admins_name','like',"%$word%"];
        }


        $data=Admins::where($where)->paginate($pageSize);
//        dd($data);//打印的已对象方式
        $query=request()->all();
        return view('admin.admins.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //第一种验证
        $validatedData = $request->validate([
            'admins_name' => 'required|unique:admins',
            'admins_pwd' => 'required',
        ],[
            'admins_name.required'=>'用户名必填',
            'admins_name.unique'=>'用户名已存在',
            'admins_pwd.required'=>'密码必填',
        ]);

        $post=$request->except('_token');

        //文件上传
        if($request->hasFile('admins_file')){
            $post['admins_file']=$this->upload('admins_file');
        }

        $admins=Admins::create($post);


        if($admins->admins_id){
            return redirect('/admins/index');
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id){
            return;
        }
        $data=Admins::where('admins_id',$id)->first();
        return view('admin.admins.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
    public function update(StoreAdminsPost $request, $id)
    {
        $post=$request->except('_token');
        if($request->hasFile('admins_file')){
            $post['admins_file']=$this->upload('admins_file');
        }
        Admins::where('admins_id',$id)->update($post);
        return redirect('/admins/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$id){
            abort(404);
        }

        $res=Admins::destroy($id);

        if($res){
            return redirect('/admins/index');
        }
    }

    public function checkOnly(){
        $admins_name=request()->admins_name;

        $count=Admins::where('admins_name',$admins_name)->count();
        echo $count;
    }
}
