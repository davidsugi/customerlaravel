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
        session()->flash('imp','data customer'.$request['name']."berhasil ditambahkan!"); 
        return redirect('customers');
    }

    public function index()
    {
    	// $res = customer::withTrashed()->get();
        $usr=Auth::user();
        $res = customer::all();
        // session()->flash('msg','Welcome '.$usr->name);
    	return view('Customer.index')->with('res',$res);
    }

    public function create()
    {
        return view('Customer.form');
    }

    public function update($id,CustomerRequest $request)
    {

        if(!isset($request['status'])){
            $request['status']=1;
        }
        $res= customer::findOrFail($id);
        $res->update($request->all());
        session()->flash('imp','data dengan id'.$id."berhasil di update!");
        return redirect()->action('CustomerController@show', ['id' => $id]);
    }

    public function show($id)
    {
    	$res= customer::findOrFail($id);
        session()->flash('msg','anda sedang mengakses customer dengan id: '.$id);
    	return view('Customer.show',compact('res'));
    }

    public function destroy($id)
    {
        $res= customer::findOrFail($id);
        $res->delete();
        session()->flash('imp','data customer dengan id: '.$id."berhasil dihapus!"); 
        return redirect('customers');
    }

    public function edit($id)
    {
        $res= customer::findOrFail($id);
        return view('Customer.form')->with('cust',$res);
    }
    
}
