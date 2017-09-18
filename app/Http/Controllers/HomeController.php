<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RenewalHistory;
use App\Domain;
use App\Registrar;
use App\customer;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function new()
    {
        // $cust=Customer::where('status',0)->count();
        // $weekly=Domain::whereBetween('end', Carbon::now(), Carbon::now()->addWeek())->count();
        // $monthly=Domain::whereBetween('end', Carbon::now(), Carbon::now()->addMonth())->count();
        // $yearly=Domain::whereBetween('end', Carbon::now(), Carbon::now()->addYear())->count();
        // $dead = Domain::where('end','<', Carbon::now)->count();
        // $reg= Registrar::count();
        $counts=[
            'cust'=>customer::where('status',0)->count(),
            'weekly'=>Domain::whereBetween('end', [Carbon::now(), Carbon::now()->addWeek()])->count(),
            'monthly'=>Domain::whereBetween('end', [Carbon::now()->addWeek(), Carbon::now()->addMonth()])->count(),
            'yearly'=>Domain::whereBetween('end', [Carbon::now()->addMonth(), Carbon::now()->addYear()])->count(),
            'more'=>Domain::where('end','>=', Carbon::now()->addYear())->count(),
            'dead'=>Domain::where('end','<', Carbon::now())->count(),
            'reg'=>Registrar::count(),
            'dom'=>Domain::where('end','>',Carbon::now())->count() 
        ];
        $res= RenewalHistory::orderBy('end', 'desc')->get();
        return view('new')->with(['res'=>$res, 'counts'=>$counts]);
    }
}
