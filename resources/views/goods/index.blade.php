<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
</head>
<body>
@foreach($arr as $v)
<div>
    <h4>{{$v->goods_name}}</h4>
    <p><a href="/goods/details?goods_id={{$v->goods_id}}"><img src="\storage\{{$v->goods_img}}" alt="" style="width: 300px;height: 300px;"></a></p>
    <p>￥{{$v->price}}</p>
</div>
@endforeach

<div>
    <h4>{{$v->goods_name}}</h4>
    <p><a href="/goods/details?goods_id={{$v->goods_id}}"><img src="\storage\{{$v->goods_img}}" alt="" style="width: 300px;height: 300px;"></a></p>
    <p>￥{{$v->price}}</p>
</div>
</body>
</html>