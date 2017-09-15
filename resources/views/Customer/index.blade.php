@extends('app')

@section('title')
		view customer
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
        <!-- DATA TABLES -->
        <link href="../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
@endsection

@section('bread')
	<li><a href="{{ route ('customers.index') }}"><i class="fa fa-dashboard"></i> </a></li><li class="active">Customer</li>
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
			<td>{{ $row->statusLabel }}</td>
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