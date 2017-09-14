<?php

namespace App\Http\Controllers;
use App\RenewalHistory;
use App\Http\Requests\RenewalHistoryRequest;

class RenewalHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(RenewalHistoryRequest $request)
    {
        if(!isset($request['status'])){
            $request['status']=1;
        }  
        RenewalHistory::create($request->all());  
        return redirect('customers');
    }

    public function index()
    {
    	// $res = RenewalHistory::withTrashed()->get();
        $res = RenewalHistory::all();
    	return view('RenewalHistory.index')->with('res',$res);
    }

    public function create()
    {
        return view('RenewalHistory.form');
    }

    public function update($id,RenewalHistoryRequest $request)
    {

        if(!isset($request['status'])){
            $request['status']=1;
        }
        $res= RenewalHistory::findOrFail($id);
        $res->update($request->all());
        return redirect('customers');
    }

    public function show($id)
    {
    	$res= RenewalHistory::findOrFail($id);
    	return view('RenewalHistory.show',compact('res'));
    }

    public function destroy($id)
    {
        $res= RenewalHistory::findOrFail($id);
        $res->delete();
        return redirect('customers');
    }

    public function edit($id)
    {
        $res= RenewalHistory::findOrFail($id);
        return view('RenewalHistory.form')->with('cust',$res);
    }
    
}
