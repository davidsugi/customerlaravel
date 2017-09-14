@extends('app')

@section('title')
	Customer {{$res->name}}
@endsection

@section('content')
<div class="row">
<div class="col-sm-2"> </div>
 <div class="col-sm-1"><a class="btn btn-primary" href="{{ action('CustomerController@edit', $res->id) }}" role="button">edit</a>
	</div>
 <div class="col-sm-1"><form action="{{ action('CustomerController@destroy', $res->id) }}" method="POST"><input name="_method" type="hidden" value="DELETE">
	{{ csrf_field() }}
			<button type="submit" class="btn btn-danger">Delete</button>
	</form></div>
</div>

<div class="blo" style="background-color:lightsteelblue; padding:30px;margin-left: 150px; margin-right: 350px; margin-top:100px;font-size: 30px;">
	<h1>Detail Customer: {{ $res->name }} </h1>
	<p> Nomor customer: {{ $res->id }} </p>
	<p> Nama customer: {{ $res->name }} </p>
	<p> Alamat customer: {{ $res->Addres }} </p>
	<p> Tanggal lahir customer: {{ $res->dateOfBirth }} </p>
</div>

@endsection
