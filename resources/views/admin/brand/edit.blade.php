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

<form action="{{url('/brand/update/'.$data->brand_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
        <div class="col-sm-10">
            <input type="text" name="brand_name" value="{{$data->brand_name}}" class="form-control" id="firstname" placeholder="请输入品牌名称">
            <b style="color: red">@php echo $errors->first('brand_name'); @endphp</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
        <div class="col-sm-10">
            <input type="text" name="brand_url" value="{{$data->brand_url}}" class="form-control" id="brand_url" placeholder="请输入品牌网址">
            <b style="color: red">@php echo $errors->first('brand_url'); @endphp</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
        <div class="col-sm-10">
            <img src="{{env('UPLOAD_URL')}}{{$data->brand_logo}}" width="80">
            <input type="file" name="brand_logo" class="form-control"  placeholder="请输入品牌LOGO">
            <b style="color: red">@php echo $errors->first('brand_logo'); @endphp</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌描述</label>
        <div class="col-sm-10">
            <textarea name="brand_desc" class="form-control" rows="3">{{$data->brand_desc}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">提交</button>
        </div>
    </div>
</form>

</body>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#firstname').blur(function(){
        var brand_name=$(this).val();
        var reg=/^[\u4e00-\u9fa5\w]{2,12}$/;
        if(!reg.test(brand_name)){
            $(this).parent().addClass('has-error');
            $(this).next().text('品牌名称不符合规范');
            return;
        }
    });

    //品牌名称失去焦点
    $('#brand_url').blur(function(){
        var brand_url=$(this).val();
        var reg=/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/ ;
        if(!reg.test(brand_url)){
            $(this).parent().addClass('has-error');
            $(this).next().text('品牌网址不符合规范');
            return;
        }
    });

    $('.btn-default').click(function() {
        //名称验证
        var brand_name = $('#firstname').val();
        var reg = /^[\u4e00-\u9fa5\w]{2,12}$/;
        if (!reg.test(brand_name)) {
            $('#firstname').parent().addClass('has-error');
            $('#firstname').next().text('品牌名称不符合规范');
            return;
        }

        var brand_url = $('#brand_url').val();
        var reg = /^https?:\/\/?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
        if (!reg.test(brand_url)) {
            $('#brand_url').parent().addClass('has-error');
            $('#brand_url').next().text('品牌网址不符合规范');
            return;
        }
        $('form').submit();
    });
</script>
</html>

