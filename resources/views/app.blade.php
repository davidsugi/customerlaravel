<!DOCTYPE html>
<html>
<head>
	<title> @yield('title') </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@yield('ext')
</head>
<body>
		<nav class="navbar navbar-inverse">
			<a class="navbar-brand" href="/home">Sugi.com</a>
			<ul class="nav navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="/customers">Customer <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/domains">Domain</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/registrars">Registrar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/histories">Renewal History</a>
				</li>
			</ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    </ul>
		</nav>


	<div class="container">
		@yield('content')
	</div>
</body>
</html>