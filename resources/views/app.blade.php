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
{{-- 
<link href="https://fonts.google.com/css.family=Fjalla+One:100,600" rel="stylesheet" type="text/css"> --}}
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Teko:300,400,600,700&amp;lang=en" />
<style type="text/css">
	        html, body {
                font-family: 'Teko';
                font-weight: 20;
                height: 100vh;
                margin: 0;
            }
</style>
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
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
		</nav>


	<div class="container">
		@yield('content')
	</div>

@yield('script')
</body>
</html>