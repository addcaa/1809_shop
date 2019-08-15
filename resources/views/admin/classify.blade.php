<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品分类添加</title>
</head>
<body>
<h2>
    <samp style="color: #b91d19">
            商品品牌分类表
        </samp>

    <samp>->
        <a href="/admin/attr"  style="color: #000; text-decoration: none;">
            商品属性
        </a>
        -></samp>
    <samp >
        <a href="/admin/goods"  style="color: #000; text-decoration: none;">
            商品
        </a>

    </samp>
    <samp>
        ->
        <a href="/admin/goodslist"  style="color: #000; text-decoration: none;">
            商品展示
        </a>

    </samp>

</h2>


<table>
    <tr>
        <td>选择</td>
        <td>
            <select name="pid" >
                <option value="0">--选择分类--</option >
                @foreach($arr as $v)
                    <option value="{{$v->cat_id}}">{{$v->cat_name}}</option>
                @endforeach    
            </select>
        </td>
    </tr>
    <tr>
        <td>类型名称</td>
        <td><input type="text" name="cat_name"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="button" value="商品分类添加" id="sub"> </td>
    </tr>
</table>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    $(function () {
        $("#sub").click(function () {
            var pid=$("select option:selected").attr('value');
            var cat_name=$("input[name='cat_name']").val();
            if(cat_name==""){
                alert("分类不能为空")
                return false;
            }
            // console.log(cat_name);
            $.post(
                "/admin/classifyadd",
                {pid:pid,cat_name:cat_name},
                function (res) {
                    var arr=JSON.parse(res)
                    if(arr.on==0){
                        alert(arr.mag);
                    }else{
                        alert(arr.mag);
                    }
                }
            );
        })
    })
</script>
