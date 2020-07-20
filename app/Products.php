<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Categories;
class Products extends Model
{
    protected $products = 'products';

    use SoftDeletes;

    public function Categories()
    {
    	return $this->belongsTo('App\Categories','category_id','id');
    	//categories.id = products.category_id
    }
}
