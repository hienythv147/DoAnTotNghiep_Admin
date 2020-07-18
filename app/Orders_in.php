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
}
