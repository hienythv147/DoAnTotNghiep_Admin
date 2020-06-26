<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Roles;
class Users extends Model
{
    protected $table = 'users';
    use SoftDeletes;

    public function Roles()
    {
    	return $this->belongsTo('App\Roles','role_id','id');
    	//roles.id = users.role_id
    }
}
