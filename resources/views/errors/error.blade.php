
@if ($errors->any())
<div style="margin-top:30px;" class="alert alert-danger alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only">Close</span>
	</button>
	<ul>
	 @foreach ($errors->all() as $error)
	    	<li>{{ $error }}</li>
	 @endforeach
	</ul>

@endif

