@extends('app')

@section('content')
<table class="table">
	<thead>
		<tr>
			@foreach ($heads as $head)
				<th> {{ $head }}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach ($res as $row)
		<tr>
			@foreach ($row as $col)
				<td> {{ $col }} </td>
			@endforeach
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
