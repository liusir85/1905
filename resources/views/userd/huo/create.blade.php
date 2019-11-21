<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<h2></h2>
<form action="{{url('/Kaoshi/store')}}" method="post">
    @csrf
    货物名称:<input type="text" name="h_name"><br><br>
    货物库存:<input type="password" name="h_number"><br><br>
    货物图片:<input type="file" name="h_img"><br><br>
    <input type="submit" value="添加">
</form>
</body>
</html>