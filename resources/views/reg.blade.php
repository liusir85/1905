<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<h2>注册</h2><hr/>
{{session('msg')}}
<form action="{{url('/doReg')}}" method="post" class="form-horizontal" role="form">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">账号</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="firstname"
                   placeholder="请输入账号">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="firstname"
                   placeholder="请输入邮箱">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="lastname"
                   placeholder="请输入密码">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-10">
            <input type="text" name="password" class="form-control" id="firstname"
                   placeholder="请输入确认密码">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">注册</button>
        </div>
    </div>
</form>

</body>
</html>