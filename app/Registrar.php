<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrar extends Model
{
    public function domains()
    {
    	return $this->hasMany('App/Domain')
    }
}
