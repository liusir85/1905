<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <input type="button" class="btn" value="启用">
</body>
</html>
<script src="/jquery.min.js"></script>
<script>
    $(".btn").click(function(){
        var value=$('.btn').attr('value'); 
        if(value=='启用'){
            $('.btn').attr('value','禁用');
        }else{
            $('.btn').attr('value','启用');
        }
        
    });
</script>