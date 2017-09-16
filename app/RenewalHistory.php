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
      'domain_id',
   	];

   	protected $dates= ['end','tanggal_perpanjang','deleted_at'];

    public function domain()
    {
    	return $this->belongsTo('App\Domain','domain_id');
    }

    // public function getdomainLabelAttribute()
    // {
    //     $dom='App\Domain'::findOrFail($this->dom_id);
    //     return $dom->name;
    // }

    public function getstartLabelAttribute()
    {
        return $this->tanggal_perpanjang->format('d-m-Y');
    }

    public function getendLabelAttribute()
    {
        return $this->end->format('d-m-Y');
    }
}
