<?php

namespace App\Http\Controllers\Kaoshi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\StoreUserdPost;
use App\Userd;
class UserdController extends Controller
{
    public function create(){
        return view('userd.userd.create');
    }

    public function store(Request $request){
        $post=$request->except('_token');
        $userd=Userd::create($post);
        if($userd->u_id){
            return redirect('/userd/index');
        }
    }

    public function index(){
        //分页
        $pageSize=config('app.pageSize');
        $data=Userd::select()->paginate($pageSize);
        $query=request()->all();
        return view('userd.userd.index',['data'=>$data],['query'=>$query]);
    }

//    public function edit($id)
//    {
//        if(!$id){
//            return;
//        }
//        $data=Userd::where('u_id',$id)->first();
//        return view('userd.userd.edit',['data'=>$data]);
//    }


//    public function update(StoreUserdPost $request, $id){
//        $post=$request->except('_token');
//        Userd::where('u_id',$id)->update($post);
//        return redirect('/userd/index');
//    }
}