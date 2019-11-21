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
        <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入品牌名称关键字"><button>搜索</button>
        <input type="text" name="desc" value="{{$query['desc']??''}}" placeholder="请输入备注"><button>搜索</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th>品牌ID</th>
            <th>品牌LOGO</th>
            <th>品牌名称</th>
            <th>品牌网址</th>
            <th>品牌备注</th>
            <th>状态</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
        @foreach ($data as $v)
        <tr  @if($i%2==0) class="warning" @else class="danger" @endif>
            <td>{{$v->brand_id}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="80"></td>
            <td>{{$v->brand_name}}</td>
            <td>{{$v->brand_url}}</td>
            <td>{{$v->brand_desc}}</td>
            <td><a href="{{url('/brand/edit/'.$v->brand_id)}}">编辑</a>||<a href="{{url('/brand/delete/'.$v->brand_id)}}">删除</a></td>
        </tr>
            @php $i++ @endphp
        @endforeach
        </tbody>
    </table>
    {{--分页--}}
        {{$data->appends($query)->links()}}
</body>
</html>