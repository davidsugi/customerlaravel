<?php

namespace App\Http\Controllers;
use App\Registrar;
use App\Http\Requests\RegistrarRequest;

class RegistrarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(RegistrarRequest $request)
    {
        if(!isset($request['status'])){
            $request['status']=1;
        }  
        Registrar::create($request->all());  
        return redirect('customers');
    }

    public function index()
    {
    	// $res = Registrar::withTrashed()->get();
        $res = Registrar::all();
    	return view('index')->with('res',$res);
    }

    public function create()
    {
        return view('from');
    }

    public function update($id,RegistrarRequest $request)
    {

        if(!isset($request['status'])){
            $request['status']=1;
        }
        $res= Registrar::findOrFail($id);
        $res->update($request->all());
        return redirect('customers');
    }

    public function show($id)
    {
    	$res= Registrar::findOrFail($id);
    	return view('show',compact('res'));
    }

    public function destroy($id)
    {
        $res= Registrar::findOrFail($id);
        $res->delete();
        return redirect('customers');
    }

    public function edit($id)
    {
        $res= Registrar::findOrFail($id);
        return view('from')->with('cust',$res);
    }
    
}
