<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders_out_detail extends Model
{
    protected $table = 'orders_out_detail';

    // public function Product()
    // {
    //     return $this->belongsTo('App\Products','product_id','id');
    // }
}
