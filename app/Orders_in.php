<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Orders_in extends Model
{
    protected $table = 'orders_in';

    public function User()
    {
        return $this->belongsTo('App\User','staff_id','id');
    }
    public function OrdersInDetail()
    {
        return $this->belongsToMany('App\Ingredients','orders_in_detail','order_in_id','ingredient_id','id','id')->withPivot('id','price','amount');
    }
}
