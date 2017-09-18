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

    public function renewal_histories(){
         return $this->hasManyThrough(
            'App\RenewalHistory',
            'App\Domain',
            'cust_id', // Foreign key on users table...
            'domain_id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
      }
}
