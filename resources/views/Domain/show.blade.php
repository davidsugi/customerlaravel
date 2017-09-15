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

	</style>
@endsection

@section('title')
	Domain {{$res->name}}
@endsection

@section('content')
<div class="row command">
	<div class="col-sm-2"> </div>
	<div class="col-sm-2"><p>Perintah:</p></div>
	 <div class="col-sm-1"><a class="btn btn-primary" href="{{ action('DomainController@edit', $res->id) }}" role="button">edit</a>
		</div>
	 <div class="col-sm-1"><button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button></div>
</div>
<div class="blo">
	<h1>Detail Domain: {{ $res->name }} </h1>
	<p> Nomor Domain: {{ $res->id }} </p>
	<p> Domain: {{ $res->name }} </p>
	<p> Tanggal mulai Domain: {{ $res->startLabel }} </p>
	<p> Tanggal berakhir Domain: {{ $res->endLabel }} </p>
	<p> Biaya beli Domain: {{ $res->fee }} </p>
	<p> Biaya perpanjang Domain: {{ $res->renewal_fee }} </p>
	<p> pemilik Domain: {{ $res->customer->name }} </p>
	<p> registrar Domain: {{ $res->registrarLabel }} </p>
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

@section('script')
	
@endsection
