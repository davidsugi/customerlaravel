@extends('app')

@section('title')
		view registrar
@endsection

@section('ext')
	<style type="text/css">
		table{
			font-size: 25px;
		}
		.alert{
			font-size:20px;
		}
	</style>
@endsection

@section('content')
	<a class="btn btn-primary" href="{{ action('RegistrarController@create') }}" role="button"> Tambah registrar baru </a>
<table class="table">
		<thead>
				<tr>
				<th>Nomor Registrar</th>
				<th>Registrar</th>
				<th>Username</th>
				<th>Password</th>
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
@endsection
