@extends('app')

@section('ext')
@endsection

@section('bread')
	<li class="active"><a href=""><i class="fa fa-dashboard"></i> </a>
@endsection

@section('title')
		dashboard
@endsection

@section('Header')
		Home<small>Home is where your ehart is</small>
@endsection

@section('content')
 <div class="col-xs-12">
                            <div class="box box-solid box-info">
                            <div class="box-header">
                            	<h3 class="box-title">Histori perpanjangan domain</h3>
                            </div>
                            <div class="box-body table-responsive">
		<table id="example1" class="table table-bordered table-striped">
		<thead>
				<tr>
					<th>Nomor History</th>
					<th>Domain</th>
					<th>biaya perpanjang</th>
					<th>tanggal mulai</th>
					<th>tanggal berakhir</th>

				</tr>
			</thead>
			<tbody>
		@foreach ($res as $row)
		<tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
			@endforeach --}}
			<td>{{ $row->id }}</td>
			<td>{{ $row->domain->name }}</td>
			<td>{{ $row->biaya }}</td>
			<td>{{ $row->startLabel }}</td>
			<td>{{ $row->endLabel }}</td>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
	</div>
</div>
</div>


@endsection

@include('datatablescr')

