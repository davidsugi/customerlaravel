<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
	use SoftDeletes;
    protected $fillable = [
        'name',
        'start',
        'end',
        'fee',
        'renewal_fee',
    ];

	
	protected $dates= ['start','end','deleted_at'];

    public function customers()
    {
    	return $this->belongsTo('App\customer');
    }

    public function registrars()
    {
    	return $this->belongsTo('App\Registrar');
    }

    public function renewalHistory()
    {
    	return $this->hasMany('App\RenewalHistory');
    }
}
