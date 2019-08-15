<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>属性值添加</title>
</head>
<body>
<h2>
    <samp>
        <a href="/admin/classify"  style="color: #000; text-decoration: none;">
            商品品牌分类表
        </a>
        -></samp>
    <samp>
        <a href="/admin/attr"  style="color: #000; text-decoration: none;">
            商品属性
        </a>->
    </samp>
    <samp style="color: #b91d19">
                属性值

    </samp>

    <samp>->
        <a href="/admin/goods"  style="color: #000; text-decoration: none;">
            商品
        </a>->
        添加sku
    </samp>

</h2>
<table>
    <tr>
        <td>属性</td>
        <td>
            <select name="" id="">
                <option value="0">--请选择属性类型--</option>
            @foreach($arr as $v)
                    <option value="{{$v->attr_id}}">{{$v->attr_name}}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td>属性类型</td>
        <td><input type="text" id='title' name="title"><button id="jia">＋</button></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="button" value="属性类型添加" id="sub"></td>
    </tr>
</table>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(function () {
        $("#jia").click(function () {
            var attr=$("#title").after("<p><input type='text' name='title' id='attrid'></p>");
        })

        $("#sub").click(function () {
            var cat_id=$("select option:selected").attr('value');
            var title="";
            $("input[name='title']").each(function(index,val){
                title+=$(this).val()+",";
            });

            $.post(
                '/admin/attrvaladd',
                {cat_id:cat_id,title:title},
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