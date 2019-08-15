<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品添加</title>
</head>
<body>
<style>
    button {
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        border: none;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
    }
    button:hover {
        background-color: #4CAF50; /* Green */
        color: white;
    }
</style>
<h2>
    <samp>
        <a href="/admin/classify"  style="color: #000; text-decoration: none;">
            商品品牌分类表
        </a>
        -></samp>

    <samp>
        <a href="/admin/attr"  style="color: #000; text-decoration: none;">
            商品属性
        </a>
        -></samp>
    <samp style="color: #b91d19">
         商品
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
        <td>分类：</td>
        <td>
            <select name="attr_name" class=".select" >
                <option value="0">--请选择--</option>
                @foreach($shop_classify as $v)
                    <option value="{{$v->cat_id}}">{{$v->cat_name}}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td>属性</td>
        <td>
            @foreach($attr as $v)
                <p><button id="attr" value="{{$v->attr_id}}">{{$v->attr_name}}</button></p>
            @endforeach
        </td>
    </tr>
    <tr>
        <td>商品名称</td>
        <td><input type="text" name="goods_name"></td>
    </tr>
    <tr>
        <td>图片</td>
        <td><input type="text" name="goods_img"></td>
    </tr>
    <tr>
        <td>描述</td>
        <td>

            <input type="text" name="short_desc"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="button" id="sub" value="商品添加"></td>
    </tr>
</table>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    $(function () {
        $(document).on('click','#attr',function () {
            //判断当前点击事件是否有此颜色
            if($(this).css("background-color")=="rgb(76, 175, 80)"){
                //给当前点击事件添加颜色
                $(this).css("background","#D8D8D8");
            }else{
                //给当前点击事件添加颜色
                $(this).css("background","#4CAF50");
            }
        })
        $(document).on('click',"#sub",function () {
            var cat_id=$("select option:selected").attr('value');

            //定义一个变量
            var attr_id="";
            $("button[id='attr']").each(function(index,val){
                //值选择有此颜色的数据
                if($(this).css("background-color")=="rgb(76, 175, 80)"){
                    //字符串拼接
                    attr_id+=$(this).val()+",";
                }
            });
            var goods_name=$("input[name='goods_name']").val();
            var short_desc=$("input[name='short_desc']").val();

            $.post(
                '/admin/goodsadd',
                {cat_id:cat_id,attr_id:attr_id,goods_name:goods_name,short_desc:short_desc},
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