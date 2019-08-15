<?php

namespace App\Http\Controllers\AdminGoods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AdminGoods extends Controller
{
    //分类添加
    public function classify(){
        $arr=DB::table('shop_classify')->where(['pid'=>0])->get();
        return view('admin.classify',['arr'=>$arr]);
    }
    public function  classifyadd(){
        $info=[
            'pid'=>$_POST['pid'],
            'cat_name'=>$_POST['cat_name'],
            'cat_time'=>time()
        ];
        $arr=DB::table('shop_classify')->insert($info);

        if($arr){
            return $arr=json_encode([
                'on'=>1,
                'mag'=>"添加成功",
            ]);
        }else{
            return $arr=json_encode([
                'on'=>0,
                'mag'=>"添加失败",
            ]);
        }
    }


    //属性添加
    public function attr(){
        return view('admin.attr');
    }
    public function attradd(){
        $attr=$_POST['arr'];
       $arr=explode(',',rtrim($attr,','));
       $info=[];
       foreach ($arr as $v){

           $info[]=[
               'attr_name'=>$v,
               'created_at'=>time(),
               'updated_at'=>time()
           ];
       };
       $arr=DB::table('shop_attr')->insert($info);
        if($arr){
            return $arr=json_encode([
                'on'=>1,
                'mag'=>"添加成功",
            ]);
        }else{
            return $arr=json_encode([
                'on'=>0,
                'mag'=>"添加失败",
            ]);
        }
    }


    //属性值添加
    public function attrval(){
        $arr=DB::table('shop_attr')->get();
        return view('admin.attrval',['arr'=>$arr]);
    }
    public function attrvaladd(){
        $title=$_POST['title'];
        $cat_id=$_POST['cat_id'];
        $title_name=explode(',',rtrim($title,','));
        $arr=[];
        foreach ($title_name as $v) {
            $arr[]=[
                'attr_id'=>$cat_id,
                'title'=>$v,
                'created_at'=>time(),
                'updated_at'=>time()
            ];
        }
        $info=DB::table('shop_attr_value')->insert($arr);
        if($info){
            return $arr=json_encode([
                'on'=>1,
                'mag'=>"添加成功",
            ]);
        }else{
            return $arr=json_encode([
                'on'=>0,
                'mag'=>"添加失败",
            ]);
        }
    }


    //添加商品
    public function goods(){
        $shop_classify=DB::table('shop_classify')->where(['pid'=>1])->get();
        $attr=DB::table('shop_attr')->get();
        return view('admin.goods',['attr'=>$attr,'shop_classify'=>$shop_classify]);
    }
    public function goodsadd(){
//        dd($_POST);
        $attr_id=rtrim($_POST['attr_id'],',');
//        echo "<pre>";print_r($attr_id);echo "<pre>";
        $info=[
            'cat_id'=>$_POST['cat_id'],
            'attr_id'=>$attr_id,
            'goods_name'=>$_POST['goods_name'],
            'short_desc'=>$_POST['short_desc'],
            'created_at'=>time(),
            'goods_sn'=>"s".Str::random(10),
        ];
        $goods=DB::table('shop_goods')->insert($info);
        if($goods){
            return $arr=json_encode([
                'on'=>1,
                'mag'=>"添加成功",
            ]);
        }else{
            return $arr=json_encode([
                'on'=>0,
                'mag'=>"添加失败",
            ]);
        }
    }

    public function goodslist(){
        $goods=DB::table('shop_goods')->where(['is_delete'=>0,'is_onsale'=>0])->get();

        return view('admin.list',['goods'=>$goods]);
    }
}
