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
		@if (isset($hist->end))
			Update Sejarah perpanjangan Domain
		@else
			Tambah Sejarah perpanjangan Domain
		@endif
@endsection

@section('Header')
		@if (isset($hist->end))
			Update Sejarah perpanjangan Domain <small>Mengubah data sejarah perpanjangan domain {{$hist->domain->name}}</small>
		@else
			Tambah Sejarah perpanjangan Domain<small>Menambah data sejarah perpanjangan domain</small>
		@endif
@endsection

@section('content')
		@if (isset($hist->end))
			<form action="{{ url('/renewal_histories', $hist->id ) }}" method="POST"><input name="_method" type="hidden" value="PUT">
		@else
			<form action="{{ url('/renewal_histories') }}" method="POST">
		@endif
		 {{ csrf_field() }}
	<fieldset class="form-group {{ $errors->has('tanggal_perpanjang') ? ' has-error' : '' }}">
		<label for="tanggal_perpanjang">Tanggal perpanjang</label>
		<input type="date" class="form-control" onchange="changedate(this.value)" id="tanggal_perpanjang" name="tanggal_perpanjang" placeholder="Masukan Tanggal perpanjang" @if(isset($hist->end)))
			value="{{ $hist->tanggal_perpanjang->format('Y-m-d') }}"
			@elseif(null!==old('tanggal_perpanjang'))
				 value="{{ old('tanggal_perpanjang') }}"
			@else
				value="{{ date('Y-m-d') }}" 
			@endif 
			>
		@if ($errors->has('tanggal_perpanjang'))
            <span class="help-block">
                <strong>{{ $errors->first('tanggal_perpanjang') }}</strong>
            </span>
        @endif
	</fieldset>


	<fieldset class="form-group {{ $errors->has('end') ? ' has-error' : '' }}">
		<label for="end">Tanggal berakhir</label>
		<input type="date" class="form-control" id="end" name="end" placeholder="Masukan Tanggal berakhir domain" @if(isset($hist->end)))
				value="{{ $hist->end->format('Y-m-d') }}"
			@elseif(null!==old('end'))
				 value="{{ old('end') }}"
			@else
				value="{{ Carbon\carbon::now()->addYear()->format('Y-m-d') }}"
			@endif>
				@if ($errors->has('end'))
            <span class="help-block">
                <strong>{{ $errors->first('end') }}</strong>
            </span>
        @endif
	</fieldset>	

		<fieldset class="form-group {{ $errors->has('biaya') ? ' has-error' : '' }}">
			<label for="name">Biaya perpanjang</label>
			<input type="text" class="form-control" name="biaya" id="biaya" placeholder="Masukan biaya perpanjgan domain"
			@if(isset($hist->biaya)))
				value="{{ $hist->biaya }}"
			@elseif(isset($errors))
				 value="{{ old('biaya') }}"
			@endif>

			@if ($errors->has('biaya'))
	            <span class="help-block">
	                <strong>{{ $errors->first('biaya') }}</strong>
	            </span>
	        @endif
		</fieldset>

	@if (empty($dom->toArray()))
			domain tidak ditemukan! <a href="{{url('domains/create') }}"><strong> Buat domain!</strong></a>
			<br>
		@else
			<fieldset class="form-group {{ $errors->has('domain_id') ? ' has-error' : '' }}">
			<label for="domain_id">Domain:</label>
				<select class="js-domain-basic-single form-control" name="domain_id">
				@php ($q=0)
					@if(isset($hist->domain_id))
						@php ($q=$hist->domain_id)
					@elseif(isset($errors))
						@php ($q=old('domain_id'))
					@endif>
					@foreach ($dom as $do)
						<option value="{{ $do->id }}" @if($q==$do->id)
							selected
						@endif
						>{{$do->name}}</option>
					@endforeach
				</select>
				</fieldset>
		@endif
	
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
});

@include('enddate')

</script>
@endsection

