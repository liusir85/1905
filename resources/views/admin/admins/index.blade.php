<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<h2>管理员列表</h2><hr/>

<form action="">
    <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入姓名关键字"><button>搜索</button>
</form>

<table class="table">
    <thead>
    <tr>
        <th>管理员ID</th>
        <th>管理员头像</th>
        <th>管理员姓名</th>
        <th>管理员密码</th>
        <th>管理员电话</th>
        <th>管理员邮箱</th>
        <th>状态</th>
    </tr>
    </thead>
    <tbody>
    @php $i=1 @endphp
    @foreach ($data as $v)
        <tr  @if($i%2==0) class="warning" @else class="danger" @endif>
            <td>{{$v->admins_id}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->admins_file}}" width="80"></td>
            <td>{{$v->admins_name}}</td>
            <td>{{$v->admins_pwd}}</td>
            <td>{{$v->admins_tel}}</td>
            <td>{{$v->admins_email}}</td>
            <td><a href="{{url('/admins/edit/'.$v->admins_id)}}">编辑</a>||<a href="{{url('/admins/delete/'.$v->admins_id)}}">删除</a></td>
        </tr>
        @php $i++ @endphp
    @endforeach
    </tbody>
</table>
{{--分页--}}
{{$data->appends($query)->links()}}
</body>
</html>