
@php
	$href=['customers','domains','registrars','renewal_histories'];
	$name=['Customer','Domain','Registrar','Riwayat Perpanjangan']	
@endphp

@section('bread')
	
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('registrars.index') }}">Registrar</a></li>
	@if ($page==2)
		<li class="active">		
		@if (isset($reg))
			Update Registrar: {{ $reg->registrar }}
		@else
			Tambah Registrar
		@endif</li>
	@elseif( $page==3)
		<li class="active">Detail Domain:{{ $dom->name }}</li>
	@endif

@endsection