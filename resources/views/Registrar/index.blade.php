@extends('app')

@section('title')
		view registrar
@endsection

@section('Header')
		view registrar<small>Melihat data seluruh registrar</small>
@endsection


@section('ext')
	<style type="text/css">
		
		.alert{
			font-size:20px;
		}
	</style>
@endsection

@section('bread')
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('registrars.index') }}">Registrar</a></li><li class="active">		
		@if (isset($reg))
			Update Registrar: {{ $reg->registrar }}
		@else
			Tambah Registrar
		@endif</li>
@endsection

@section('content')
 <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive">
	<a class="btn btn-primary" href="{{ action('RegistrarController@create') }}" role="button"> Tambah registrar baru </a>
<br>
	<br>
	<br>
<table id="example1" class="table table-bordered table-striped">
		<thead>
				<tr>
				<th>Nomor Registrar</th>
				<th>Registrar</th>
				<th>Username</th>
				<th>Password</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
		@foreach ($res as $row)
		<tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
			@endforeach --}}
			<td>{{ $row->id }}</td>
			<td>{{ $row->registrar }}</td>
			<td>{{ $row->username }}</td>
			<td>{{ $row->password }}</td>
			<td><a class="btn btn-primary" href="{{ action('RegistrarController@show', [$row->id]) }}" role="button">detail</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection

@include("datatablescr")