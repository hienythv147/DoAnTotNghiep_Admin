<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders_out extends Model
{
    protected $table = 'orders_out';
    
    public function User()
    {
        return $this->belongsTo('App\User','staff_id', 'id');
    }
    // public function Customer()
    // {
    //     return $this->belongsTo('App\Customers','customer_id','id');
    // }

    public function OrdersOutDetail()
    {
        return $this->belongsToMany('App\Products','orders_out_detail','order_out_id','product_id','id','id')->withPivot('id','price','amount');
    }
}
