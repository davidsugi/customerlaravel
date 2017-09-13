<?php

namespace App\Http\Controllers;
use App\customer;
use App\Http\Requests\CreateCustomerRequest;

class CustomerController extends Controller
{
    public function _construct($value='')
    {
        $this->middleware('auth',['only' => 'create']);
    }


    public function store(CreateCustomerRequest $request)
    {
        if(!isset($request['status'])){
            $request['status']=1;
        }  
        customer::create($request->all());  
        return redirect('customers');
    }

    public function index()
    {
    	// $res = customer::withTrashed()->get();
        $res = customer::all();
    	return view('index')->with('res',$res);
    }

    public function create()
    {
        return view('from');
    }

    public function update($id,CreateCustomerRequest $request)
    {

        if(!isset($request['status'])){
            $request['status']=1;
        }
        $res= customer::findOrFail($id);
        $res->update($request->all());
        return redirect('customers');
    }

    public function show($id)
    {
    	$res= customer::findOrFail($id);
    	return view('show',compact('res'));
    }

    public function destroy($id)
    {
        $res= customer::findOrFail($id);
        $res->delete();
        return redirect('customers');
    }

    public function edit($id)
    {
        $res= customer::findOrFail($id);
        return view('from')->with('cust',$res);
    }
    
}
