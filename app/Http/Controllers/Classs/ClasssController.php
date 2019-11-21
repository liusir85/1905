<?php

namespace App\Http\Controllers\Classs;

use App\Http\Controllers\Controller;
use \App\Http\Requests\StoreClasssPost;
use Illuminate\Http\Request;
use DB;
use App\Classs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;//缓存

class ClasssController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user=\Auth::user();
//        $id=\Auth::id();

        $page=request()->page??1;//缓存
//        $word=request()->word??'';//缓存
//        $query['word'];
//        dump($query);
//        echo 'datas_'.$page.'_'.$word;//缓存 有搜索
//        $data=Cache::get('data_'.$page.'_'.$word);//缓存 有搜索
        echo 'datas_'.$page.'_';//缓存
        $data=Cache::get('data_'.$page.'_');//缓存
//        dump($data);
        if(!$data) {//缓存
            echo "数据库";//缓存
            //分页
            $pageSize = config('app.pageSize');
            //搜索
//            $word = request()->word;
//            $where = [];
//            if ($word) {
//                $where[] = ['c_name', 'like', "%$word%"];
//            }

//            $data = Classs::where($where)->paginate($pageSize); //有条件搜索
//            Cache::put('data_'.$page.'_'.$word, $data, 1*10);//缓存 //有条件搜索

            $data = Classs::select()->paginate($pageSize);
            Cache::put('data_'.$page.'_', $data, 1*10);//缓存
        }
        $query=request()->all();
        return view('classs.index',['data'=>$data,'query'=>$query]);
    }
}
