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
    public function Customer()
    {
        return $this->belongsTo('App\Customers','customer_id','id');
    }

    // public function OrderOutDetail()
    // {
    //     return $this->belongsToMany('App\Orders_out_detail','orders_out_detail','order_out_id','product_id','id','id')->withPivot('order_out_id','price','amount');
    // }
}
