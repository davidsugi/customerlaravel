<table id="example1" class="table table-bordered table-striped">

		<thead>
				<tr>
				<th>Nomor Domain</th>
				<th>Domain</th>
				<th>tanggal beli</th>
				<th>tanggal berakhir</th>
				<th>Harga Beli</th>
				<th>Harga Perpanjangan</th>
				<th>Customer</th>
				<th>Registrar</th>
				</tr>
			</thead>
			<tbody>
		@foreach ($dom as $row) <tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
			@endforeach --}}
			<td>{{ $row->id }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $row->startLabel }}</td>
			<td>{{ $row->endLabel }}</td>
			<td>{{ $row->fee }}</td>
			<td>{{ $row->renewal_fee }}</td>
			<td>{{ $row->customer->name }}</td>
			<td>{{ $row->registrar->registrar }}</td>
		</tr>
	
		@endforeach
	</tbody>
</table>