<!DOCTYPE HTML>
 <html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

  		<link rel="stylesheet" href="{{ url('css/cssfont/font-awesome.css') }}">
  		<link rel="stylesheet" href="{{ url('css/main.css') }}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					@yield('content1')
				</div>
			</header>

		<!-- Main -->
			<div id="main">
				@if (Session::get('nombres'))
				<div class='global'>
					<a href="{{ url('ver_user') }}" class="icon solid fa-plus-circle fa-3"> Ver perfil de {{ Session::get('nombres') }}</a>
				<br>
				<a href="{{ url('cerrarSesion') }}" class="icon solid fa-plus-circle fa-3"> Cerrar Sesión </a>
				</div>
				@endif
				<section id="one">
					@yield('content2')
				</section>
				
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-facebook"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-google"><span class="label">Github</span></a></li>
					</ul>
					 
				</div>
			</footer>
		
		<!-- Scripts -->
			<script src="{{ url('js/jquery.min.js') }}"></script>
			<script src="{{ url('js/jquery.poptrox.min.js') }}"></script>
			<script src="{{ url('js/browser.min.js') }}"></script>
			<script src="{{ url('js/breakpoints.min.js') }}"></script>
			<script src="{{ url('js/util.js') }}"></script>
			<script src="{{ url('js/main.js') }}"></script>
			@yield('scriptPropio')
			

	</body>
</html>