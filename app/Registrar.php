<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registrar extends Model
{
	use SoftDeletes;
	protected $fillable = [
   		'registrar',
   		'username',
   		'password',
   	];

	protected $dates= ['deleted_at'];

    public function domains()
    {
    	return $this->hasMany('App\Domain','reg_id');
    }
}
