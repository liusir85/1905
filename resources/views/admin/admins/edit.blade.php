<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="{{asset('/static/admin/js/jquery.js')}}"></script>
    <title>Document</title>
</head>
<body>
<h2>添加商品品牌</h2>

{{--@if ($errors->any())--}}
    {{--<div class="alert alert-danger">--}}
        {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--@endif--}}

<form action="{{url('/admins/update/'.$data->admins_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员名字</label>
        <div class="col-sm-10">
            <input type="text" name="admins_name" value="{{$data->admins_name}}" class="form-control" id="firstname" placeholder="请输入管理员名字">
            <b style="color: red">@php echo $errors->first('admins_name'); @endphp</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">管理员密码</label>
        <div class="col-sm-10">
            <input type="text" name="admins_pwd" value="{{$data->admins_pwd}}" class="form-control" id="lastname" placeholder="请输入管理员密码">
            <b style="color: red">@php echo $errors->first('admin_pwd'); @endphp</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">管理员头像</label>
        <div class="col-sm-10">
            <img src="{{env('UPLOAD_URL')}}{{$data->admins_file}}" width="80">
            <input type="file" name="admins_file" class="form-control" id="lastname" placeholder="请输入管理员头像">
            <b style="color: red">@php echo $errors->first('admins_file'); @endphp</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">管理员手机号</label>
        <div class="col-sm-10">
            <input type="text" name="admins_tel" value="{{$data->admins_tel}}" class="form-control" id="firstname" placeholder="请输入管理员手机号">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员邮箱</label>
        <div class="col-sm-10">
            <input type="text" name="admins_email" value="{{$data->admins_email}}" class="form-control" id="firstname" placeholder="请输入管理员邮箱">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">提交</button>
        </div>
    </div>
</form>

</body>
</html>

