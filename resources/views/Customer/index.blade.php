@extends('app')

@section('title')
		view customer
@endsection

@section('ext')
	<style type="text/css">

		.alert{
			font-size:20px;
		}
	</style>
@endsection

@section('bread')
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li class="active">Customer</li>
@endsection

@section('Header')
	View Customer <small>Lihat seluruh customer yang ada</small>
@endsection

@section('content')

 <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive">
	<a class="btn btn-primary" href="{{ action('CustomerController@create') }}" role="button"> Tambah customer baru </a>
	<br>
	<br>
	<br>
<table id="example1" class="table table-bordered table-striped">
		<thead>
				<tr>
				<th>Nomor customer</th>
				<th>Nama</th>
				<th>Email</th>
				<th>No HP</th>
				<th class="hidden-xs">Alamat</th>
				<th class="hidden-xs">Tanggal Lahir</th>
				<th class="hidden-xs">status</th>
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
			<td class="hidden-xs">{{ $row->Addres }}</td>
			<td class="hidden-xs">{{ $row->dateOfBirth }}</td>
			<td class="hidden-xs">{{ $row->statusLabel }}</td>
			<td><a class="btn btn-primary" href="{{ action('CustomerController@show', [$row->id]) }}" role="button">detail</a></td>
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