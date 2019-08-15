<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\GoodsModel;
use Illuminate\Support\Facades\DB;
class GoodsContrller extends Controller
{
    //
    public function index(){
//            $goods_id=1000002;
//            echo "<pre>";print_r($arr);echo "<pre>"
        $arr=GoodsModel::get();
        return view('goods.index',['arr'=>$arr]);
    }

    public function details(){
        $goods_id=$_GET['goods_id'];
        $arr=GoodsModel::where(['goods_id'=>$goods_id])->first();
        $colour=DB::table('shop_type')->where(['goods_id'=>$goods_id])->get();
//      echo "<pre>";print_r($arr);echo "<pre>";
        $sku= DB::table('shop_sku')
            ->rightJoin('shop_type', 'shop_sku.t_id', '=', 'shop_type.t_id')
            ->where(['shop_sku.goods_id'=>$goods_id])->first();
//            dd($sku );/
        return view('goods.details',['arr'=>$arr,'colour'=>$colour,'sku'=>$sku]);
    }
}
