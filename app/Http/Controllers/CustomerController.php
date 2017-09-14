<?php

namespace App\Http\Controllers;
use App\customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => 'create','edit']);
    }

    public function store(CustomerRequest $request)
    {
        if(!isset($request['status'])){
            $request['status']=1;
        } 
        // dd($request->all());
        customer::create($request->all());  
        return redirect('customers');
    }

    public function index()
    {
    	// $res = customer::withTrashed()->get();
        $usr=Auth::user();
        $res = customer::all();
    	return view('Customer.indexCustomer')->with(['res'=>$res, 'usr'=>$usr ]);
    }

    public function create()
    {
        return view('Customer.formCustomer');
    }

    public function update($id,CustomerRequest $request)
    {

        if(!isset($request['status'])){
            $request['status']=1;
        }
        $res= customer::findOrFail($id);
        $res->update($request->all());
        return redirect()->action('CustomerController@show', ['id' => $id]);
    }

    public function show($id)
    {
    	$res= customer::findOrFail($id);
    	return view('Customer.showCustomer',compact('res'));
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
        return view('Customer.formCustomer')->with('cust',$res);
    }
    
}
