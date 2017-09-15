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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection


@section('title')
		@if (isset($dom))
			Update Domain
		@else
			Tambah Domain
		@endif
@endsection

@section('content')
		@if (isset($dom))
			<h1>Ubah Domain: {{$dom->name}}</h1>
			<form action="{{ url('/domains', $dom->id ) }}" method="POST"><input name="_method" type="hidden" value="PUT">
		@else
		<h1>Tambah Domain baru</h1>
			<form action="{{ url('/domains') }}" method="POST">
		@endif
		 {{ csrf_field() }}
		<fieldset class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name">Nama</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama Domain" @if(isset($dom))
				value="{{ $dom->name }}"
			@elseif(isset($errors))
				 value="{{ old('name') }}"
			@endif>
		@if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
		</fieldset>

	<fieldset class="form-group {{ $errors->has('start') ? ' has-error' : '' }}">
		<label for="start">Tanggal beli</label>
		<input type="date" class="form-control" id="start" onchange="changedate(this.value)" name="start" placeholder="Tangggal beli domain"  @if(isset($dom))
			value="{{ $dom->start->format('Y-m-d') }}"
			@elseif(null!==old('start'))
				 value="{{ old('start') }}"
			@else
				value="{{ date('Y-m-d') }}"
			@endif>
		@if ($errors->has('start'))
            <span class="help-block">
                <strong>{{ $errors->first('start') }}</strong>
            </span>
        @endif
	</fieldset>

	<fieldset class="form-group {{ $errors->has('end') ? ' has-error' : '' }}">
		<label for="end">Tanggal berakhir</label>
		<input type="date" class="form-control" id="end" name="end" placeholder="Masukan Tanggal berakhir domain" @if(isset($dom))
				value="{{ $dom->end->format('Y-m-d') }}"
			@elseif(isset($errors))
				 value="{{ old('end') }}"
			@endif>
				@if ($errors->has('end'))
            <span class="help-block">
                <strong>{{ $errors->first('end') }}</strong>
            </span>
        @endif
	</fieldset>	

		<fieldset class="form-group {{ $errors->has('fee') ? ' has-error' : '' }}">
			<label for="name">Biaya beli</label>
			<input type="text" class="form-control" name="fee" id="fee" placeholder="Masukan biaya beli domain"
			@if(isset($dom))
				value="{{ $dom->fee }}"
			@elseif(isset($errors))
				 value="{{ old('fee') }}"
			@endif>
			@if ($errors->has('fee'))
	            <span class="help-block">
	                <strong>{{ $errors->first('fee') }}</strong>
	            </span>
	        @endif
		</fieldset>

		<fieldset class="form-group {{ $errors->has('renewal_fee') ? ' has-error' : '' }}">
			<label for="name">Harga perpanjang</label>
			<input type="text" class="form-control" name="renewal_fee" id="renewal_fee" placeholder="masukan biaya perpanjangan domain" 
			@if(isset($dom))
				value="{{ $dom->renewal_fee }}"
			@elseif(isset($errors))
				 value="{{ old('renewal_fee') }}"
			@endif>
			@if ($errors->has('renewal_fee'))
	            <span class="help-block">
	                <strong>{{ $errors->first('renewal_fee') }}</strong>
	            </span>
	        @endif
		</fieldset>
		<fieldset class="form-group {{ $errors->has('reg_id') ? ' has-error' : '' }}">
		<label for="reg_id">Customer:</label>
			<select class="js-example-basic-single form-control" name="cust_id">
			@php ($q=0)
				@if(isset($dom))
					@php ($q=$dom->cust_id)
				@elseif(isset($errors))
					@php ($q=old('reg_id'))
				@endif>
				@foreach ($customers as $customer)
					<option value="{{ $customer->id }}" @if ($q==$customer->id)
						selected
					@endif
					>{{$customer->name}}</option>
				@endforeach
			</select>

			@if ($errors->has('reg_id'))
		            <span class="help-block">
		                <strong>{{ $errors->first('reg_id') }}</strong>
		            </span>
		    @endif
			</fieldset>
		@if (empty($reg->toArray()))
			Registrar tidak ditemukan! <a href="{{url('registrars/create') }}"><strong> Buat Registrar</strong></a>
			<br>
		@else
			<fieldset class="form-group {{ $errors->has('reg_id') ? ' has-error' : '' }}">
			<label for="reg_id">Registrar:</label>
				<select class="js-registrar-basic-single form-control" name="reg_id">
				@php ($q=0)
					@if(isset($dom))
						@php ($q=$dom->reg_id)
					@elseif(isset($errors))
						@php ($q=old('reg_id'))
					@endif>
					@foreach ($reg as $re)
						<option value="{{ $re->id }}" @if($q==$re->id)
							selected
						@endif
						>{{$re->registrar}}</option>
					@endforeach
				</select>
		@endif
			

			@if ($errors->has('reg_id'))
		            <span class="help-block">
		                <strong>{{ $errors->first('reg_id') }}</strong>
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

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('.js-registrar-basic-single').select2();

});
@include('enddate')
</script>
@endsection


