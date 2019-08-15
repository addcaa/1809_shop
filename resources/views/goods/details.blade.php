<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品详情</title>
</head>
<body>
<style>
    button {
        background-color: #4CAF50; /* Green */
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    .button4 {background-color: #e7e7e7; color: black;width: 80px;} /* Gray */
    .button4:hover {
        background-color: #e7e7e7; /* Green */
        color: white;
    }

    .button1{
        border-radius: 12px;
    }
</style>
<div>
    <h3>{{$arr->goods_name}}</h3>
    @foreach($colour as $v)
        <button class="button4"  value="{{$v->t_id}}">{{$v->t_name}}</button>
    @endforeach
    <p></p>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(function () {
    })
</script>