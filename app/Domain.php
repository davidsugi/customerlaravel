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
        'cust_id',
        'reg_id',
    ];
	
	protected $dates= ['start','end','deleted_at'];

    public function customer()
    {
    	return $this->belongsTo('App\customer','cust_id');
    }

    public function registrar()
    {
    	return $this->belongsTo('App\Registrar','reg_id');
    }

    public function renewalHistory()
    {
    	return $this->hasMany('App\RenewalHistory','domain_id');
    }

    public function getstartLabelAttribute()
    {
        return $this->start->format('d-m-Y');
    }

    public function getendLabelAttribute()
    {
        return $this->end->format('d-m-Y');
    }

    // public function getcustomerLabelAttribute()
    // {
    //     $cus='App\customer'::findOrFail($this->cust_id);
    //     return $cus->name;
    // }

    // public function getregistrarLabelAttribute()
    // {
    //     $reg='App\Registrar'::findOrFail($this->reg_id);
    //     return $reg->registrar;
    // }

}
