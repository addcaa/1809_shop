<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>属性添加</title>
</head>
<body>
<h2>
    <samp >
        <a href="/admin/classify"  style="color: #000; text-decoration: none;">
            商品品牌分类表
        </a>

        -></samp>

    <samp style="color: #b91d19">
            商品属性
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
            <td>属性名</td>
            <td>
                <input type="text" name="attr_name" id="attr">
                <input type="button" value="＋" id="add">
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" value="属性添加" id="sub"></td>
        </tr>
    </table>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    $(function () {
        $("#add").click(function () {
            $("#attr").after("<input type='text' name='attr_name'>");
        })
        $("#sub").click(function () {
            var arr="";
            $("[name='attr_name']").each(function(index,val){
                arr+=$(this).val()+",";
                if($(this).val()==""){
                    alert("属性名不能为空");
                    return false;
                }
            });
                $.post(
                "/admin/attradd",
                {arr:arr},
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