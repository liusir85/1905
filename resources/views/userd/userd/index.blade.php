<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>展示</title>
</head>
<body>
<h2>用户展示</h2>
<table border="1">
    <tr>
        <td>用户id</td>
        <td>用户昵称</td>
        <td>用户密码</td>
        <td>用户身份</td>
        <td>状态</td>
    </tr>
    @foreach($data as $v)
    <tr>
        <td>{{$v->u_id}}</td>
        <td>{{$v->u_name}}</td>
        <td>{{$v->u_pwd}}</td>
        <td>@if($v->u_mis===0)库管员@else主管@endif</td>
        <td>
            <a href="{{url('/userd/edit/'.$v->u_id)}}">编辑</a>
        </td>
    </tr>
    @endforeach
</table>
{{--分页--}}
{{$data->appends($query)->links()}}
</body>
</html>