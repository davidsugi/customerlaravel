<?php

namespace App\Http\Controllers;
use App\customer;

use Illuminate\Http\Request;

class customer extends Controller
{
    public function show()
    {
    	$res= customer::all();
    	return view('index',compact($res));
    }
}
