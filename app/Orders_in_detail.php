<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders_in_detail extends Model
{
    protected $table = 'orders_in_detail';

    // public function Ingredient()
    // {
    //     return $this->belongsTo('App\Ingredients','ingredient_id','id');
    // }
}
