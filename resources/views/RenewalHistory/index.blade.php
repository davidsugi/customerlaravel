@extends('app')

@section('title')
		view History
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
 <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive">
	<a class="btn btn-primary" href="{{ action('RenewalHistoryController@create') }}" role="button"> Tambah History baru </a>
<br>
	<br>
	<br>
<table id="example1" class="table table-bordered table-striped">
		<thead>
				<tr>
					<th>Nomor History</th>
					<th>Nama Domain</th>
					<th>biaya perpanjang</th>
					<th>tanggal mulai</th>
					<th>tanggal berakhir</th>
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
			<td>{{ $row->domainLabel }}</td>
			<td>{{ $row->biaya }}</td>
			<td>{{ $row->startLabel }}</td>
			<td>{{ $row->endLabel }}</td>
			<td><a class="btn btn-primary" href="{{ action('RenewalHistoryController@show', [$row->id]) }}" role="button">detail</a></td>
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