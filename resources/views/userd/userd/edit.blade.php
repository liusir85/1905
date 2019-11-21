<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户修改</title>
</head>
<body>
<h2>用户修改</h2>
<form action="{{url('/userd/index'.$data->u_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    用户昵称:<input type="text" name="u_name" value="{{$data->u_name}}"><br><br>
    用户密码:<input type="password" name="u_pwd" value="{{$data->u_pwd}}"><br><br>
    <input type="radio" name="u_mis" value="1" value="{{$data->u_mis}}">库管员
    <input type="radio" name="u_mis" value="2" value="{{$data->u_mis}}">主管<br><br>
    <input type="submit" value="修改">
</body>
</form>
</html>