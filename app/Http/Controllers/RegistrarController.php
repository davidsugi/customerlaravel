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
        Registrar::create($request->all()); 
        session()->flash('msg','data registrar'.$request['name']."berhasil ditambahkan!"); 
        return redirect('registrars');
    }

    public function index()
    {
    	// $res = Registrar::withTrashed()->get();
        $res = Registrar::all();
    	return view('Registrar.index')->with('res',$res);
    }

    public function create()
    {
        return view('Registrar.form');
    }

    public function update($id,RegistrarRequest $request)
    {
        $res= Registrar::findOrFail($id);
        $res->update($request->all());
        session()->flash('imp','data dengan id'.$id."berhasil di update!");
        return redirect('registrars');
    }

    public function show($id)
    {
    	$res= Registrar::findOrFail($id);
        $dom= $res->domains()->get();
    	return view('Registrar.show',compact('res','dom'));
    }

    public function destroy($id)
    {
        $res= Registrar::findOrFail($id);
        $res->delete();
        session()->flash('imp','data registrar dengan id: '.$id."berhasil dihapus!"); 
        return redirect('registrars');
    }

    public function edit($id)
    {
        $res= Registrar::findOrFail($id);
        return view('Registrar.form')->with('reg',$res);
    }
    
}
