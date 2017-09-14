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
			border-radius:30px;
			padding:30px;
			margin-right: 300px;
			font-size:30px;

		}
		.front{
			background-color:lightsteelblue;
			margin-left: 150px;
			margin-top:-450px;

		}
		.back{
			background-color:grey;
			margin-left: 160px;
			margin-top:100px;
			height:441px;
			width:690px;
		}
		.modal-body>p{
			font-size:40px;
		}

		.modal-body>p>span{
			color:red;
		}

	</style>
@endsection

@section('title')
	Registrar {{$res->name}}
@endsection

@section('content')
<div class="row command">
	<div class="col-sm-2"> </div>
	<div class="col-sm-2"><p>Perintah:</p></div>
	 <div class="col-sm-1"><a class="btn btn-primary" href="{{ action('RegistrarController@edit', $res->id) }}" role="button">edit</a>
		</div>
	 <div class="col-sm-1"><button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button></div>
</div>
<div class="blo back">
</div>

<div class="blo front">
	<h1>Detail Registrar: {{ $res->name }} </h1>
	<p> Nomor customer: {{ $res->id }} </p>
	<p> Nama customer: {{ $res->name }} </p>
	<p> Email customer: {{ $res->email }} </p>
	<p> Nomor Handphone customer: {{ $res->phone }} </p>
	<p> Alamat customer: {{ $res->Addres }} </p>
	<p> Tanggal lahir customer: {{ $res->dateOfBirth }} </p>
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
						<p>Anda yakin mau menghapus Registrar <span> {{ $res->name }} </span> ?</p>
					</div>
					<div class="modal-footer">

						<form action="{{ action('RegistrarController@destroy', $res->id) }}" method="POST"><input name="_method" type="hidden" value="DELETE">
						{{ csrf_field() }}
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
@endsection

@section('script')
	
@endsection