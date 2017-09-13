<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
	use SoftDeletes;

   	protected $fillable= [
   		'name',
   		'Addres',
   		'dob',
   		'status',

   	];
   	protected $dates= ['dob','deleted_at'];
   	//accesor
   	public function getDateOfBirthAttribute()
   	{
   		return $this->dob->format('d-m-Y');
   	}

   	public function getStatus()
   	{
   		$code="Aktif";
   		if ($this->status==1) {
   			$code="Non-aktif";
   		}

   		return $code;
   	}

}
