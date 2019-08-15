<?php

namespace App\Admin\Controllers;

use App\Model\SkuModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
class SkuController extends AdminController
{
    /**
//     * Title for current resource.
     * @var string
     */
    protected $title = 'App\Model\SkuModel';

    public function sku($id){
        $arr=DB::table('shop_goods')->where(['goods_id'=>$id])->first();
        return view('admin.type',['arr'=>$arr]);
    }

    public function colour(){
        $data=Request::all();
        $id=$data['goods_id'];
        $arr=DB::table('shop_type')->insert($data);
        if($arr){
            echo "<script>alert('添加成功');location.href='/admin/type    ?id=$id';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/admin/sku/$id';</script>";
        }
    }

    public function type(){
        $id=$_GET['id'];
        $arr=DB::table('shop_goods')->where(['goods_id'=>$id])->first();
        $colour=DB::table('shop_type')->where(['goods_id'=>$id])->get();
        return view('admin.sku',['arr'=>$arr,'colour'=>$colour]);
    }


    public function skudo(){
        $data=Request::all();
//        echo "<pre>";print_r($data);echo "<pre>";
        $id=$data['goods_id'];
        $data['created_at']=time();
        $arr=SkuModel::insert($data);
        if($arr){
            echo "<script>alert('添加成功');location.href='/admin/type    ?id=$id';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/admin/sku/$id';</script>";
        }
    }

}
