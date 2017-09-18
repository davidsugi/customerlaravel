<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
	use SoftDeletes;

   	protected $fillable = [
   		'name',
   		'Addres',
   		'dob',
   		'status',
   		'phone',
   		'email',
   	];

   	// protected $guarded = [];

   	protected $dates= ['dob','deleted_at'];
   	//accesor
   	public function getDateOfBirthAttribute()
   	{
   		return $this->dob->format('d-m-Y');
   	}

   	public function getStatusLabelAttribute()
   	{
   		$code="Aktif";
   		if ($this->status==1) {
   			$code="Non-aktif";
   		}

   		return $code;
   	}

   	public function domains()
   	{
   		return $this->hasMany('App\Domain',"cust_id");
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
