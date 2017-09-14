@extends('app')

@section('title')
		@if (isset($cust))
			Update customer
		@else
			Tambah customer
		@endif
@endsection

@section('content')
		@if (isset($cust))
			<h1>Ubah customer: {{$cust->name}}</h1>
			<form action="{{ url('/customers', $cust->id ) }}" method="POST"><input name="_method" type="hidden" value="PUT">
		@else
		<h1>Tambah customer baru</h1>
			<form action="{{ url('/customers') }}" method="POST">
		@endif
		 {{ csrf_field() }}
		<fieldset class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name">Nama</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama customer" @if(isset($cust))
				value="{{ $cust->name }}"
			@elseif(isset($errors))
				 value="{{ old('name') }}"
			@endif>
		@if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
		</fieldset>

	<fieldset class="form-group {{ $errors->has('Addres') ? ' has-error' : '' }}">
		<label for="Addres">Alamat</label>
		<input type="text" class="form-control" id="Addres" name="Addres" placeholder="Masukan Alamat" @if(isset($cust))
			value="{{ $cust->Addres }}"
			@elseif(isset($errors))
				 value="{{ old('Addres') }}"
			@endif>
		@if ($errors->has('Addres'))
            <span class="help-block">
                <strong>{{ $errors->first('Addres') }}</strong>
            </span>
        @endif
	</fieldset>
`	
	<fieldset class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
		<label for="dob">Tanggal lahir</label>
		<input type="date" class="form-control" id="dob" name="dob" placeholder="Masukan Tanggal lahir" @if(isset($cust))
				value="{{ $cust->dob->format('Y-m-d') }}"
			@elseif(isset($errors))
				 value="{{ old('dob') }}"
			@endif>
				@if ($errors->has('dob'))
            <span class="help-block">
                <strong>{{ $errors->first('dob') }}</strong>
            </span>
        @endif
	</fieldset>	
		<fieldset class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
			<label for="name">Nomor Telpon/Handphone</label>
			<input type="text" class="form-control" name="phone" id="phone" placeholder="Masukan nomor anda"
			@if(isset($cust))
				value="{{ $cust->phone }}"
			@elseif(isset($errors))
				 value="{{ old('phone') }}"
			@endif>
			@if ($errors->has('phone'))
	            <span class="help-block">
	                <strong>{{ $errors->first('phone') }}</strong>
	            </span>
	        @endif
		</fieldset>

		<fieldset class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="name">Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="masukan email anda" 
			@if(isset($cust))
				value="{{ $cust->email }}"
			@elseif(isset($errors))
				 value="{{ old('email') }}"
			@endif>
			@if ($errors->has('email'))
	            <span class="help-block">
	                <strong>{{ $errors->first('email') }}</strong>
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
	<div class="form-group row">
		<label class="col-sm-2">Aktif?</label>
			<div class="col-sm-10">
				<div class="checkbox">
					<label>
						<input name="status" id="status" type="checkbox" value="0" @if(isset($cust))
				@if ($cust->status==0)
					checked
				@endif
			@else
				checked
			@endif  > 
					</label>
				</div>
			</div>
		</div>{{-- 
	<fieldset class="form-group">
		<label class="checkbox">
			<input type="checkbox" id="status" name="status" value="0"> Aktif
		</label>
	</fieldset> --}}
	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection


