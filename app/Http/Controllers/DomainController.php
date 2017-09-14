<?php

namespace App\Http\Controllers;
use App\Domain;
use App\Http\Requests\DomainRequest;

class DomainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(DomainRequest $request)
    {
        if(!isset($request['status'])){
            $request['status']=1;
        }  
        Domain::create($request->all());  
        return redirect('customers');
    }

    public function index()
    {
    	// $res = Domain::withTrashed()->get();
        $res = Domain::all();
    	return view('index')->with('res',$res);
    }

    public function create()
    {
        return view('from');
    }

    public function update($id,DomainRequest $request)
    {

        if(!isset($request['status'])){
            $request['status']=1;
        }
        $res= Domain::findOrFail($id);
        $res->update($request->all());
        return redirect('customers');
    }

    public function show($id)
    {
    	$res= Domain::findOrFail($id);
    	return view('show',compact('res'));
    }

    public function destroy($id)
    {
        $res= Domain::findOrFail($id);
        $res->delete();
        return redirect('customers');
    }

    public function edit($id)
    {
        $res= Domain::findOrFail($id);
        return view('from')->with('cust',$res);
    }
    
}
