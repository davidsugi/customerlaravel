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
	<a class="btn btn-primary" href="{{ action('DomainController@create') }}" role="button"> Tambah Domain baru </a>
<table class="table">
		<thead>
				<tr>
				<th>Nomor Domain</th>
				<th>Domain</th>
				<th>tanggal beli</th>
				<th>tanggal berakhir</th>
				<th>Harga Beli</th>
				<th>Harga Perpanjangan</th>
				<th>Customer</th>
				<th>Registrar</th>
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
			<td>{{ $row->startLabel }}</td>
			<td>{{ $row->endLabel }}</td>
			<td>{{ $row->fee }}</td>
			<td>{{ $row->renewal_fee }}</td>
			<td>{{ $row->customerLabel }}</td>
			<td>{{ $row->registrarLabel }}</td>
			<td><a class="btn btn-primary" href="{{ action('DomainController@show', [$row->id]) }}" role="button">detail</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
