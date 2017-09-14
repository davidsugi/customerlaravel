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
        Domain::create($request->all());
        session()->flash('msg','data domain'.$request['name']."berhasil ditambahkan!"); 
        return redirect('domains');
    }

    public function index()
    {
    	// $res = Domain::withTrashed()->get();
        $res = Domain::all();
    	return view('Domain.index')->with('res',$res);
    }

    public function create()
    {
        $res= "App\customer"::all();
        $reg= "App\Registrar"::all();
        return view('Domain.form')->with([
            'customers'=>$res,
            'reg'=>$reg,
            ]);
    }

    public function update($id,DomainRequest $request)
    {
        $res= Domain::findOrFail($id);
        $res->update($request->all());
        session()->flash('imp','data dengan id'.$id."berhasil di update!");
        return redirect()->action('DomainController@show', ['id' => $id]);
    }

    public function show($id)
    {
    	$res= Domain::findOrFail($id);
    	return view('Domain.show',compact('res'));
    }

    public function destroy($id)
    {
        $res= Domain::findOrFail($id);
        $res->delete();
        session()->flash('imp','data domain dengan id: '.$id."berhasil dihapus!"); 
        return redirect('domains');
    }

    public function edit($id)
    {
        $res= Domain::findOrFail($id);
        $cus= "App\customer"::all();
        $reg= "App\Registrar"::all();
        return view('Domain.form')->with([
            'dom'=>$res, 'customers'=>$cus, 'reg'=>$reg
            ]);
    }
    
}
