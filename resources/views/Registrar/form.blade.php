@extends('app')

@section('ext')
	<style type="text/css">
		.container{
			font-size:22px;
		}
		input{
			font-family: "arial";
		}

	</style>
@endsection


@section('title')
		@if (isset($reg))
			Update registrar
		@else
			Tambah registrar
		@endif
@endsection

@section('Header')
		@if (isset($reg))
			Update registrar<small>Mengubah data detail registrar {{ $reg->registrar}} </small>
		@else
			Tambah registrar<small>Menambah data registrar baru</small>
		@endif
@endsection

@section('content')
		@if (isset($reg))
			<h1>Ubah registrar: {{$reg->registrar}}</h1>
			<form action="{{ url('/registrars', $reg->id ) }}" method="POST"><input name="_method" type="hidden" value="PUT">
		@else
		<h1>Tambah registrar baru</h1>
			<form action="{{ url('/registrars') }}" method="POST">
		@endif
		 {{ csrf_field() }}
		<fieldset class="form-group {{ $errors->has('registrar') ? ' has-error' : '' }}">
			<label for="registrar">Registrar</label>
			<input type="text" class="form-control" name="registrar" id="registrar" placeholder="Masukan registrar" @if(isset($reg))
				value="{{ $reg->registrar }}"
			@elseif(isset($errors))
				 value="{{ old('registrar') }}"
			@endif>
		@if ($errors->has('registrar'))
            <span class="help-block">
                <strong>{{ $errors->first('registrar') }}</strong>
            </span>
        @endif
		</fieldset>

	<fieldset class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
		<label for="username">username</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" @if(isset($reg))
			value="{{ $reg->username }}"
			@elseif(isset($errors))
				 value="{{ old('username') }}"
			@endif>
		@if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
	</fieldset>

	<fieldset class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
		<label for="password">Password</label>
		<input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password" @if(isset($reg))
				value="{{ $reg->password}}"
			@elseif(isset($errors))
				 value="{{ old('password') }}"
			@endif>
				@if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
	</fieldset>	
	
	
{{-- 
	<div class="radio">
		<label>
			<input type="radio" name="status" id="status1" value="0" checked>
			Aktif
		</label>
	</div>
	<div class="radio">
		<label>
			<input type="radio" name="status" id="status2" value="1">
			non-aktif
		</label>
	</div> --}}
	{{-- 
	<fieldset class="form-group">
		<label class="checkbox">
			<input type="checkbox" id="status" name="status" value="0"> Aktif
		</label>
	</fieldset> --}}
	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection


