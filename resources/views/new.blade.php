@extends('app')

@section('ext')
<link href="../../css/morris/morris.css" rel="stylesheet" type="text/css" />
@endsection

@section('bread')
<li class="active"><a href=""><i class="fa fa-dashboard"></i> </a></li>
	@endsection

	@section('title')
	dashboard
	@endsection

	@section('Header')
	Home<small>Home is where your heart is</small>
	@endsection

	@section('content')
	<div class="row">
		<div class="col-lg-3 col-xs-12">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h3>
						{{ $counts['cust'] }}
					</h3>
					<p>
						Customer
					</p>
				</div>
				<div class="icon">
					<i class="ion ion-person"></i>
				</div>
				<a href="{{ route('customers.index') }}" class="small-box-footer">
					Lihat selengkapnya <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div><!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>
						{{ $counts['dom'] }}
					</h3>
					<p>
						Domain
					</p>
				</div>
				<div class="icon">
					<i class="ion ion-star"></i>
				</div>
				<a href="{{ route('domains.index') }}" class="small-box-footer">
					Lihat selengkapnya <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div><!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>
						{{ $counts['reg'] }}
					</h3>
					<p>
						Registrar
					</p>
				</div>
				<div class="icon">
					<i class="ion ion-ios7-cart-outline"></i>
				</div>
				<a href="{{ route('registrars.index') }}" class="small-box-footer">
					Lihat selengkapnya <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div><!-- ./col -->

	</div>

	<div class="row">
		<div clas="col-md-6 col-lg-offset-3">
			<div class="box box-warning">
				<div class="box-header">
					<h3 class="box-title">Histori perpanjangan domain</h3>
				</div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="domains" style="height: 300px; position: relative;"></div>
                                </div><!-- /.box-body -->
				
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid box-info">
				<div class="box-header">
					<h3 class="box-title">Histori perpanjangan domain</h3>
				</div>
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Pemilik</th>
								<th>registrar</th>
								<th>Domain</th>
								<th>biaya perpanjang</th>
								<th>tanggal berakhir</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($res as $row)
							<tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
				@endforeach --}}
				<td>{{ $row->domain->customer->name }}</td>
				<td>{{ $row->domain->registrar->registrar }}</td>
				<td>{{ $row->domain->name }}</td>
				<td>{{ $row->biaya }}</td>
				<td>{{ $row->endLabel }}</td>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
</div>
</div>





@endsection

@push('script')

 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script type="text/javascript">
	//DONUT CHART
                var donut = new Morris.Donut({
                    element: 'domains',
                    resize: true,
                    colors: ["#b2baff","#87ff8f", "#fffda8", "#ff8787","#3f4242"],
                    data: [
                    	@if($counts['more']>0)
                    		 {label: "More Than One Year", value: {{ $counts['more'] }} },
                    		 @endif
                    	@if($counts['yearly']>0)
                    		 {label: "One Year", value: {{ $counts['yearly'] }} },
                    		 @endif
                    	@if($counts['monthly']>0)
                    		{label: "One Month", value: {{ $counts['monthly'] }} },
                    		@endif
                    	@if ($counts['weekly']>0)
                    		{label: "One Week", value: {{ $counts['weekly'] }} },
                    		@endif
                    	
                    	@if($counts['dead']>0)
                    		 {label: "Dead domain", value: {{ $counts['dead'] }} }
                    	@endif
                        
                        
                       
                      
                    ],
                    hideHover: 'auto'
                });
</script>

@endpush
@include('datatablescr')

