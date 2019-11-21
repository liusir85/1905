<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{url('/goods/update/'.$goods->goods_id)}}" method="post" enctype="multipart/form-data">
        @csrf
    <table>
    
        <tr>
            <td>商品名称</td>
            <td><input type="text" name="goods_name" value="{{$goods->goods_name}}"></td>
        </tr>
        <tr>
            <td>商品价格</td>
            <td><input type="text" name="goods_price" value="{{$goods->goods_price}}"></td>
        </tr>
        <tr>
            <td>商品图片</td>
            <td><input type="file" name="goods_img" ></td>
        </tr>
        <tr>
            <td>商品图集</td>
            <td><input type="file" name="goods_imgs[]"></td>
        </tr>
        <tr>
            <td>商品库存</td>
            <td><input type="text" name="goods_number" value="{{$goods->goods_number}}"></td>
        </tr>
        <tr>
            <td>商品介绍</td>
            <td><textarea name="goods_desc" id="" cols="30" rows="10">{{$goods->goods_desc}}</textarea></td>
        </tr>
        <tr>
            <td>分类</td>
            <td>
                <select name="cate_id" id="">
                    <option value="">--请选择分类--</option>
                    @foreach($cate as $k=>$v)
                    <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>品牌</td>
            <td>
                <select name="brand_id" id="">
                    <option value="">--请选择商品--</option>
                    @foreach($brand as $k=>$v) 
                    <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="商品修改"></td>
        </tr>
    </table>
    

    <a href="{{url('/goods/index')}}">商品展示页</a>
</form>
</body>
</html>