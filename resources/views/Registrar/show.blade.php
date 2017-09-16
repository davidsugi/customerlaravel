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

		@media screen and (min-width: 710px) {
		    .buttoned {
		        margin-left:30px;
		    }
		}

	</style>
@endsection

@section('Header')
		Detail Registrar<small>Melihat data detail dari registrar {{$res->registrar}} </small>
@endsection

@section('title')
	Registrar {{$res->registrar}}
@endsection

@section('content')

 <div class="row">
 <div class="row command">
	<div class="col-sm-2"> </div>
	<div class="col-sm-2"><p>Perintah:</p></div>
	 <div class="col-sm-1"><a class="btn btn-primary" href="{{ action('RegistrarController@edit', $res->id) }}" role="button">edit</a>
		</div>
	 <div class="col-sm-1"><button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button></div>
</div>
<br>
 <div class="col-xs-3">
 </div>
                        <div class="col-xs-6">
                            <div class="box box-success">

                                <div class="box-body table-responsive">
	<h1>Detail Registrar: {{ $res->registrar }} </h1>
	<p> Nomor registrar: {{ $res->id }} </p>
	<p> Nama registrar: {{ $res->registrar }} </p>
	<p> username untuk registrar: {{ $res->username }} </p>
	<p> password untuk registrar: {{ $res->password }} </p>
</div>
</div>
</div>
</div>

{{-- Table data domain --}}
 <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-solid box-info">
                            <div class="box-header">
                            	<h3 class="box-title"> Domain yang terdaftar di registrar {{ $res->registrar }}</h3>
                            </div>
                                <div class="box-body table-responsive">
@include('../Domain/dom')
</div>
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

@push('script')
@include("datatablescr")
@endpush
