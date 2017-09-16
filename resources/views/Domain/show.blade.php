@extends('app')

@section('ext')
	<style type="text/css">

		.command{
			background-color:deepskyblue; 
			padding:5px; 
			width:100%;
			color:white;
			font-size: 30px;
		}
		.blo{
			padding:30px;
			font-size:30px;
			margin-top:100px;
			width:100%;
			background-color:lightsteelblue;

		}
		.modal-body>p{
			font-size:40px;
		}

		.modal-body>p>span{
			color:red;
		}
		@media screen and (min-width: 710px) {
		    .buttoned {
		        margin-left:30px;
		    }
		}

	</style>
@endsection

@section('title')
	Domain {{$res->name}}
@endsection

@section('Header')
	Detail Domain <small>Data Domain dari {{$res->name}}</small> 
@endsection

@section('content')
<div class="row command">
	<div class="col-xs-2">
</div>
Perintah:
	<a class="btn btn-primary buttoned" href="{{ action('DomainController@edit', $res->id) }}" role="button">edit</a>
		<button class="btn btn-danger buttoned" data-toggle="modal" data-target="#delete">Delete</button></div>

<br>
<br>
<div class="col-xs-3">
 </div>
                        <div class="col-xs-6">
                            <div class="box box-info">
                            <div class="box-body table-responsive">
	<h1>Detail Domain: {{ $res->name }} </h1>
	<p> Nomor Domain: {{ $res->id }} </p>
	<p> Domain: {{ $res->name }} </p>
	<p> Tanggal mulai Domain: {{ $res->startLabel }} </p>
	<p> Tanggal berakhir Domain: {{ $res->endLabel }} </p>
	<p> Biaya beli Domain: {{ $res->fee }} </p>
	<p> Biaya perpanjang Domain: {{ $res->renewal_fee }} </p>
	<p> pemilik Domain: <a href="#" data-toggle="popover" title="Data customer(no hp, email)" data-content="{{ $res->customer->phone }}, {{ $res->customer->email}} ">{{ $res->customer->name }} </a> </p>
	<p> registrar Domain: <a href="#" data-toggle="popover" title="Data registrar(usernmae, password)" data-content="{{ $res->registrar->username }}, {{ $res->registrar->password}} ">{{ $res->registrar->registrar }} </a>  </p>
	</div>
</div>
</div>

 <div class="col-xs-12">
                            <div class="box box-solid box-primary">
                            <div class="box-header">
                            	<h3 class="box-title">Histori perpanjangan domain {{ $res->name }}</h3>
                            </div>
                            <div class="box-body table-responsive">
		<table id="example1" class="table table-bordered table-striped">
		<thead>
				<tr>
					<th>Nomor History</th>
					<th>biaya perpanjang</th>
					<th>tanggal mulai</th>
					<th>tanggal berakhir</th>

				</tr>
			</thead>
			<tbody>
		@foreach ($hist as $row)
		<tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
			@endforeach --}}
			<td>{{ $row->id }}</td>
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

		<div class="modal fade" id="delete">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Konfirmasi penghapusan</h4>
					</div>
					<div class="modal-body">
						<p>Anda yakin mau menghapus Domain <span> {{ $res->name }} </span> ?</p>
					</div>
					<div class="modal-footer">

						<form action="{{ action('DomainController@destroy', $res->id) }}" method="POST"><input name="_method" type="hidden" value="DELETE">
						{{ csrf_field() }}
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
@endsection

@push('script')
	<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>

@include('datatablescr')
@endpush
