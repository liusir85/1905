<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('/static/admin/js/jquery.js')}}"></script>
    <title>Document</title>
</head>
<body>
<form action="{{url('ben/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h2>添加</h2><br>
        <tr>
            <td>文章标题</td>
            <td><input type="text" name="ben_biao" id="biao">
                <b style="color: red">@php echo $errors->first('ben_biao'); @endphp</b>
            </td>
        </tr><br>
        <tr>
            <td>文章分类</td>
            <td>
                <select name="ben_cate">
                    <option value="手机促销">手机促销</option>
                    <option value="3G咨询">3G咨询</option>
                    <option value="站内快讯">站内快讯</option>
                </select>
            </td>
        </tr><br>
        <tr>
            <td>文章重要性</td>
            <td>
                <input type="radio" name="ben_zyx" value="1">普通
                <input type="radio" name="ben_zyx" value="2">置顶
                <b style="color: red">@php echo $errors->first('ben_zyx'); @endphp</b>
            </td>
        </tr><br>
        <tr>
            <td>是否显示</td>
            <td>
                <input type="radio" name="ben_xs" value="1">显示
                <input type="radio" name="ben_xs" value="2">不显示
                <b style="color: red">@php echo $errors->first('ben_xs'); @endphp</b>
            </td>
        </tr><br>
        <tr>
            <td>文章作者</td>
            <td><input type="text" name="ben_name"></td>
        </tr><br>
        <tr>
            <td>作者email</td>
            <td><input type="text" name="ben_email"></td>
        </tr><br>
        <tr>
            <td>关键字</td>
            <td><input type="text" name="ben_gjz"></td>
        </tr><br>
        <tr>
            <td>网页描述</td>
            <td><textarea name="ben_desc"></textarea></td>
        </tr><br>
        <tr>
            <td>上传文件</td>
            <td><input type="file" name="ben_chuan"></td>
        </tr><br>
        <tr>
            <td></td>
            <td><input type="button" class="btn" value="确定">
                <input type="reset" value="重置">
            </td>
        </tr>
</form>
</body>

<script>
    $('#biao').blur(function() {
        var ben_biao = $(this).val();
        var reg = /^[\u4e00-\u9fa5_a-zA-Z0-9]+$/;
        if (!reg.test(ben_biao)) {
            $(this).parent().addClass('has-error');
            $(this).next().text('文章标题不符合规范');
            return;
        }
        $.ajax({
            method: "POST",
            url: "{{url('/ben/checkOnly')}}",
            data: {ben_biao: ben_biao}
        }).done(function (msg) {
            if (msg > 0) {
                $('#biao').parent().addClass('has-error');
                $('#biao').next().text('文章标题已存在');
            }
        });
    });
        $('.btn').click(function(){
            var ben_biao=$('#biao').val();
            var reg=/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/;
            if(!reg.test(ben_biao)){
                $('#biao').parent().addClass('has-error');
                $('#biao').next().text('文章标题不符合规范');
                return;
            }

            var flag=true;
            $.ajax({
                method:"POST",
                url:"{{url('/ben/checkOnly')}}",
                async:false,
                data:{ben_biao:ben_biao}
            }).done(function(msg){
                if(msg>0){
                    $('#biao').parent().addClass('has-error');
                    $('#biao').next().text('文章标题已存在');
                   flag=false;
                }
            });
            if(!flag){
                return;
            }
        $('form').submit();
        });
</script>

</html>
