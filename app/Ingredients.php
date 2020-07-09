<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredients extends Model
{
    protected $table = 'ingredients';
    use SoftDeletes;
}
