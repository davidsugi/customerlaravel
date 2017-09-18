<!DOCTYPE html>
<html>
<head>
	<title>
		email reminder
	</title>
	    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>
<body>             
                <!-- Content Header (Page header) -->
                
                <section class="content-header">
                    <h1>
                        Expired Domain list Reminder<small>Melihat data domain yang akan expired</small>
                        {{-- <small>Control panel</small> --}}
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                        <div class="col-xs-12">
                            <div class="box box-info">
                            <div class="box-header">
                            	<h2 class="box-title"> Segera Lakukan perpanjangan domain di bawah ini:</h2>
                            </div>
                                <div class="box-body table-responsive">

	<br>
	<br>
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
				<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
		@foreach ($res as $row)
		<tr>
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
			<td><a class="btn btn-primary" href="{{ action('DomainController@show', [$row->id]) }}" role="button">detail</a></td>
			<td><form method="POST" action="{{ url('renewal_histories/create', [$row->id]) }}"> {{ csrf_field() }}
				<button class="btn btn-success" type="submit">Perpanjang</a>
			</form></td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
</div>
</div>
                </section><!-- /.content -->
            
           <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>

 @include('datatablescr')
</body>
</html>