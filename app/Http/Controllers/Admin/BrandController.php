<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\Http\Requests\StoreBrandPost;
use Illuminate\Http\Request;
use DB;
use App\Brand;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Cache;//缓存
use Illuminate\Support\Facades\Redis;//redis

class BrandController extends Controller
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


        //DB
//        echo '列表';
        //select查询某个指定的
//        $data=DB::table('brand')->select('brand_name')->get();
        //get方式查询
//        $data=DB::table('brand')->get();
//        dd($data);

        //ORM
//        $data=Brand::all();
//        $data=Brand::get();


        $page=request()->page??1;//缓存
        $word=request()->word??'';//缓存
//        $query['word'];
//        dump($query);
//        echo 'data_'.$page.'_'.$word;//缓存

//        $data=Cache::get('data_'.$page.'_'.$word);//缓存
        $data=Redis::get('data_'.$page.'_'.$word);//redis

        dump($data);
        if(!$data) {//缓存
            echo "dddd";//缓存
                    //分页
                    $pageSize = config('app.pageSize');
                    //搜索
                    $word = request()->word;
                    $where = [];
                    if ($word) {
                        $where[] = ['brand_name', 'like', "%$word%"];
                    }


                    $desc = request()->desc;
                    if ($desc) {
                        $where[] = ['brand_desc', 'like', "%$desc%"];
                    }

                  // Brand::connection()->enableQueryLog();

                    $data = Brand::where($where)->paginate($pageSize);

//                    Cache::put('data_'.$page.'_'.$word, $data, 1*60);//缓存

                      $data=serialize($data);//redis
                      Redis::set('data_'.$page.'_'.$word, $data, 1*1);//redis

        }
//        $logs = Brand::getQueryLog();
//        dump($logs);

        $data=unserialize($data);//redis

//        dd($data);//打印的已对象方式
        $query=request()->all();
        return view('admin.brand.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //第二种验证
//    public function store(\App\Http\Requests\StoreBrandPost $request)
    public function store(Request $request)//第一种和第三种验证
    {

        //第一种验证
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brand',
            'brand_url' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必填',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_url.required'=>'品牌网址必填',
        ]);


//        $post=$request->post();

        //接受排除_token的值也能排除其他的值
        $post=$request->except('_token');

//第三种验证
//        $validator = \Validator::make($post, [
//            'brand_name' => 'required|unique:brand',
//            'brand_url' => 'required',
//        ],[
//            'brand_name.required'=>'品牌名称必填',
//            'brand_name.unique'=>'品牌名称已存在',
//            'brand_url.required'=>'品牌网址必填'
//        ]);
//        if ($validator->fails()) {
//            return redirect('brand/create')
//                ->withErrors($validator)
//                ->withInput();
//        }



        //只接受某个字段的值
//        $post=$request->only(['brand_name','brand_url']);
//        dd($post);
//        dump($post);
//        unset($post['_token']);


        //文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }

//        dd($post);
//        DB添加
//       $res=DB::table('brand')->insert($post);//返回布尔值
//        $res=DB::table('brand')->insertGetId($post);//放回自增id
//        dd($res);


        //ORM 添加
        $brand=Brand::create($post);
//        echo $brand->brand_id;

        //分别添加
//        $brand=new Brand;
//        $brand->brand_name=$post['brand_name'];
//        $brand->brand_url=$post['brand_url'];
//        $brand->brand_logo=$post['brand_logo'];
//        $brand->brand_desc=$post['brand_desc'];
//        $brand->save();

        if($brand->brand_id){
            return redirect('/brand/index');
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
//        echo $id;

        if(!$id){
            return;
        }
        //DB 单条查询
//        $data=DB::table('brand')->where('brand_id',$id)->first();

        //ORM单条
//        $data=Brand::find($id);
        $data=Brand::where('brand_id',$id)->first();
//        dd($data);
        return view('admin.brand.edit',['data'=>$data]);
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
    public function update(StoreBrandPost $request, $id)
    {
//        echo $id;
        //验证
        //接值
        $post=$request->except('_token');
//        dd($post);
        //判断有无文件上传 有 文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }
        //更新数据库
        Brand::where('brand_id',$id)->update($post);
//        dd($data);
        return redirect('/brand/index');
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
//        echo $id;
        if(!$id){
            abort(404);
        }

        //DB删除
//        $res=DB::table('brand')->where('brand_id',$id)->delete();

        //ORM 删除
        $res=Brand::destroy($id);
//        $res=Brand::where('brand_id',$id)->delete();//ORM与DB结合
//        dd($res);

        //删除后返回列表页面
        if($res){
            return redirect('/brand/index');
        }
    }


    public function checkOnly(){
        $brand_name=request()->brand_name;

        $count=Brand::where('brand_name',$brand_name)->count();
        echo $count;
    }
}
