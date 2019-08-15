<?php

namespace App\Admin\Actions\Goods;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class GoodsSku extends RowAction
{
    public $name = 'sku';

    public function handle(Model $model)
    {
        // $model ...
        return $this->response()->success('Success message.')->refresh();
    }

    public function href()
    {
        $id=$this->getKey();
        return "/admin/sku/$id";
    }

}