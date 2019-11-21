<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="{{asset('/static/admin/js/jquery.js')}}"></script>
    <title>Document</title>
</head>
<body>
<h2>列表</h2><hr/>

<form action="">
    <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入分类关键字"><button>搜索</button>
    <input type="text" name="biao" value="{{$query['biao']??''}}" placeholder="请输入文章标题"><button>搜索</button>
</form>

<table class="table">
    <thead>
    <tr>
        <th>编号</th>
        <th>文章标题</th>
        <th>文章分类</th>
        <th>文章重要性</th>
        <th>是否显示</th>
        <th>文件</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @php $i=1 @endphp
    @foreach ($data as $v)
        <tr   id="{{$v->ben_id}}" @if($i%2==0) class="warning" @else class="danger" @endif>
            <td>{{$v->ben_id}}</td>
            <td>{{$v->ben_biao}}</td>
            <td>{{$v->ben_cate}}</td>
            <td>@if($v->ben_zyx==1) 普通 @else 置顶 @endif</td>
            <td>@if($v->ben_xs==1) √ @else × @endif</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->ben_chuan}}" width="80"></td>
            <td><a href="{{url('/ben/edit/'.$v->ben_id)}}">编辑</a>||<a href="javascript:;" class="del">删除</a></td>
        </tr>
        @php $i++ @endphp
    @endforeach
    </tbody>
</table>
{{--分页--}}
{{$data->appends($query)->links()}}
</body>

<script>
    $(".del").click(function(){
        var id = $(this).parents('tr').attr('id');
        var r = confirm('确定要删除么');
        if(r==true) {
            $.ajax({
                url: "{{ URL('ben/delete')}}",
                type: "POST",
                data:{id:id,_token:'{{csrf_token()}}'},
                success: function(data){
                    if(data==1){
                        alert('删除成功');
                        location.href= "{{ URL('ben/index/')}}";
                    } else {
                        alert('删除失败');
                    }
                }});
        }
    })
</script>

</html>