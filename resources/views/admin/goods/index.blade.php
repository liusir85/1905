<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="">
        商品名称: <input type="text" name="goods_name">
        所属分类: <select name="cate_id" id="">
                        <option value="">--请选择分类--</option>
                        @foreach($cate as $k=>$v)
                        <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                        @endforeach
                </select>
        
        所属品牌: <select name="brand_id" id="">
                        <option value="">--请选择品牌--</option>
                        @foreach($brand as $k=>$v)
                        <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                        @endforeach
                </select>
                <button>搜索</button>
    </form>


    <table border="1">
        <tr>
            <td>商品ID</td>
            <td>商品名称</td>
            <td>商品价格</td>
            <td>商品图片</td>
            <td>商品相册</td>
            <td>商品库存</td>
            <td>商品介绍</td>
            <td>所属分类</td>
            <td>所属品牌</td>
            <td>操作</td>
        </tr>
        @foreach($goods as $k=>$v)
        <tr>
            <td>{{$v->goods_id}}</td>
            <td>{{$v->goods_name}}</td>
            <td>{{$v->goods_price}}</td>
            <td><img src="{{env('GOODS_URL')}}{{$v->goods_img}}" alt="" width="70px"></td>
            <td>{{$v->goods_imgs}}</td>
            <td>{{$v->goods_number}}</td>
            <td>{{$v->goods_desc}}</td>
            <td>{{$v->cate_name}}</td>
            <td>{{$v->brand_name}}</td>
            <td>
                <a href="{{'/goods/edit/'.$v->goods_id}}">修改</a> | 
                <a href="{{'/goods/destroy/'.$v->goods_id}}">删除</a>
                
            </td>
        </tr>
    @endforeach
    </table>

    {{$goods->appends($query)->links()}}

    <a href="{{url('/goods/create')}}">添加商品页</a>
</body>
</html>