<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RenewalHistory extends Model
{
	use SoftDeletes;
  
	protected $fillable = [
   		'tanggal_perpanjang',
   		'end',
   		'biaya',
   	];

   	protected $dates= ['end','tanggal_perpanjang','deleted_at'];

    public function domains()
    {
    	return $this->belongsTo('App\Domain');
    }
}
