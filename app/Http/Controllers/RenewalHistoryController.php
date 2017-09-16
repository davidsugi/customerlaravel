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
        RenewalHistory::create($request->all()); 
        // $upd= "App\Domain"::findOrFail($request['dom_id']);
        // // $upd['start']=$request->tanggal_perpanjang;
        // // $upd['end']=$request->end;
        // // $upd->save();
        return redirect('renewal_histories');
    }

    public function index()
    {
    	// $res = RenewalHistory::withTrashed()->get();
        $res = RenewalHistory::all();
    	return view('RenewalHistory.index')->with('res',$res);
    }

    public function create($id='')
    {
        $res=['id'=>$id];
        if($id!=''){
            $tmp="App\Domain"::findOrFail($id);
            $res['biaya']=$tmp->renewal_fee;
            $res['domainLabel']=$tmp->name;
            $res['dom_id']=$id;
        }
        // dd($res);
        $res= (object) $res;
        $dom="App\Domain"::all();
        return view('RenewalHistory.form')->with(['dom'=>$dom, 'hist'=>$res]);
    }

    public function update($id,RenewalHistoryRequest $request)
    {
        $res= RenewalHistory::findOrFail($id);
        $res->update($request->all());
        return redirect('renewal_histories');
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
        return redirect('renewal_histories');
    }

    public function edit($id)
    {
        $res= RenewalHistory::findOrFail($id);
        $dom="App\Domain"::all();
        dd($res);
        return view('RenewalHistory.form')->with(['hist'=>$res, 'dom'=>$dom]
            );
    }
    
}
