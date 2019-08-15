<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SkuModel extends Model
{
    public $table="shop_sku";
    protected $primaryKey="s_id";
    public $timestamps=false;
}
