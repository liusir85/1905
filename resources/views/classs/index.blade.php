<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<form action="">
    <input type="text" name="word" value="{{$query['word']??''}}" ><button>搜索</button>
</form>
<body>
    <table border="1">
        <tr>
            <td>学生id</td>
            <td>学生姓名</td>
            <td>学生班级</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->c_id}}</td>
            <td>{{$v->c_name}}</td>
            <td>{{$v->c_ban}}</td>
            <td>删除</td>
        </tr>
        @endforeach
    </table>
    {{$data->appends($query)->links()}}
</body>
</html>