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

@section('Header')
		View Domain<small>Melihat data domain </small>
@endsection

@section('content')
 <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive">
	<a class="btn btn-primary" href="{{ action('DomainController@create') }}" role="button"> Tambah Domain baru </a>
	<br>
	<br>
	<br>
<table id="example1" class="table table-bordered table-striped">

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
				<th colspan="2">Action</th>
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
			<td>{{ $row->customer->name }}</td>
			<td>{{ $row->registrar->registrar }}</td>
			<td><a class="btn btn-primary" href="{{ action('DomainController@show', [$row->id]) }}" role="button">detail</a></td>
			<td><form method="POST" action="{{ url('renewal_histories/create', [$row->id]) }}"> {{ csrf_field() }}
				<button class="btn btn-success" type="submit">Perpanjang</a>
			</form></td>
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