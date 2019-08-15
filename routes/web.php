<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/', 'Goods\GoodsContrller@index');
//Route::get('/goods/details', 'Goods\GoodsContrller@details');

//后台 分类添加
Route::get('/admin/classify', 'AdminGoods\AdminGoods@classify');
Route::post('/admin/classifyadd', 'AdminGoods\AdminGoods@classifyadd');

//属性
Route::get('/admin/attr', 'AdminGoods\AdminGoods@attr');
Route::post('/admin/attradd', 'AdminGoods\AdminGoods@attradd');

//属性值
Route::get('/admin/attrval', 'AdminGoods\AdminGoods@attrval');
Route::post('/admin/attrvaladd', 'AdminGoods\AdminGoods@attrvaladd');


//添加商品
Route::get('/admin/goods', 'AdminGoods\AdminGoods@goods');
Route::post('/admin/goodsadd', 'AdminGoods\AdminGoods@goodsadd');


Route::get('/admin/goodslist', 'AdminGoods\AdminGoods@goodslist');


Route::get('/port/log', 'Port\portController@log');


