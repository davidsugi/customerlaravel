@extends('app')

@section('title')
		view Domain
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
@auth
	<div class="alert alert-info" role="alert">
		Welcome {{ $usr->name }}
	</div>
@endauth

	<a class="btn btn-primary" href="{{ action('DomainController@create') }}" role="button"> Tambah Domain baru </a>
<table class="table">
		<thead>
				<tr>
				<th>Nomor Domain</th>
				<th>Domain</th>
				<th>Customer</th>
				<th>No HP</th>
				<th>Alamat</th>
				<th>Tanggal Lahir</th>
				<th>status</th>
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
			<td>{{ $row->name }}</td>
			<td>{{ $row->email }}</td>
			<td>{{ $row->phone }}</td>
			<td>{{ $row->Addres }}</td>
			<td>{{ $row->dateOfBirth }}</td>
			<td>{{ $row->status }}</td>
			<td><a class="btn btn-primary" href="{{ action('DomainController@show', [$row->id]) }}" role="button">detail</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
