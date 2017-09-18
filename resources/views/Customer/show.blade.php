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
		margin: 10px;
		font-size:1.5em;

	}
	.front{
		background-color:lightsteelblue;
		
		margin-top:100px;

	}
	.back{
		z-index;-1;
		background-color:grey;
		margin-left: 160px;
		margin-top:100px;
		color:grey;
	}
	.back>p{
		display:none;
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

@section('bread')
<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('customers.index') }}"> Customer</a></li> <li class="active"> {{ $res->name }} </li>
@endsection

@section('Header')
Detail Customer <small>melihat data customer {{ $res->name }}</small>
@endsection

@section('title')
Customer {{$res->name}}
@endsection

@section('content')
<div class="row command">
	<div class="col-sm-2"> </div>
	Perintah:<a class="btn btn-primary buttoned" href="{{ action('CustomerController@edit', $res->id) }}" role="button">edit</a>
	<button class="btn btn-danger buttoned" data-toggle="modal" data-target="#delete">Delete</button>
</div>

<div class="row">
	<div class="col-sm-6 col-md-offset-3 col-xs-12 col-sm-offset-2 ">
		<div class="blo front">
			<p> Nomor customer: {{ $res->id }} </p>
			<p> Nama customer: {{ $res->name }} </p>
			<p> Email customer: {{ $res->email }} </p>
			<p> Nomor Handphone customer: {{ $res->phone }} </p>
			<p> Alamat customer: {{ $res->Addres }} </p>
			<p> Tanggal lahir customer: {{ $res->dateOfBirth }} </p>
		</div>
		</div>
	</div>
</div>

<br>
<br>

@if(null!==$dom->toArray())

<div class="row">
	<div class="col-xs-12">
		<div class="box box-solid box-info">
			<div class="box-header table-responsive">
				<H2 class="box-title">List domain milik customer {{ $res->name }} </H2>
			</div>
			<div class="box-body table-responsive">
			@include('Domain._dom')
			</div>
		</div>
	</div>
</div>
@endif


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
				<p>Anda yakin mau menghapus Customer <span> {{ $res->name }} </span> ?</p>
			</div>
			<div class="modal-footer">

				<form action="{{ action('CustomerController@destroy', $res->id) }}" method="POST"><input name="_method" type="hidden" value="DELETE">
					{{ csrf_field() }}
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@include("datatablescr")