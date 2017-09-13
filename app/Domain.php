<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    public function customers()
    {
    	return $this->belongsTo('App/customer');
    }

    public function registrars()
    {
    	return $this->belongsTo('App/Registrar');
    }

    public function renewalHistory()
    {
    	return $this->hasMany('App/RenewalHistory');
    }
}
