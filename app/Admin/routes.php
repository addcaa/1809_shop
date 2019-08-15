<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('goods', GoodsController::class);
    $router->resource('GoodsSku', GoodsController::class);
    $router->get('sku/{id}', 'SkuController@sku');//颜色
    $router->post('colour', 'SkuController@colour');//颜色

    //类型
    $router->get('type', 'SkuController@type');//颜色
    $router->post('skudo', 'SkuController@skudo');

});
