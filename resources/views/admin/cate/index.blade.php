<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<h2>商品品牌列表</h2><hr/>

<form action="">
    <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入分类名称关键字"><button>搜索</button>
</form>

<table class="table">
    <thead>
    <tr>
        <th>分类ID</th>
        <th>分类名称</th>
        <th>分类展示</th>
        <th>是否在导航栏展示</th>
        <th>状态</th>
    </tr>
    </thead>
    <tbody>
    @php $i=1 @endphp
    @foreach ($data as $v)
        <tr  @if($i%2==0) class="warning" @else class="danger" @endif>
            <td>{{$v->cate_id}}</td>
            <td>{{$v->cate_name}}}</td>
            <td>{{$v->cate_show}}</td>
            <td>{{$v->cate_nav_show}}</td>
            <td><a href="{{url('/cate/edit/'.$v->brand_id)}}">编辑</a>||<a href="{{url('/cate/delete/'.$v->brand_id)}}">删除</a></td>
        </tr>
        @php $i++ @endphp
    @endforeach
    </tbody>
</table>
{{--分页--}}
{{$data->appends($query)->links()}}
</body>
</html>