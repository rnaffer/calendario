<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calendario de actividades 7mo Sistemas</title>
	<meta name="description" content="Calendario de actividades y horario para la seccion g-001 de ingenieria de sistemas unefa">
	<meta name="kewords" content="calendario, unefa, actividades, calendario de actividades, calendario sugerencias, actividades sugerencias">

	<link rel="icon" type="image/png" href="/img/favicon.png" />

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	@yield('head')
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	{{-- <script src="/js/jquery-1.11.1.min.js"></script> --}}
	{{-- <script src="/js/bootstrap.min.js"></script> --}}
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="navbar">
		<div class="container">
			<div class="navbar-header">
				<img src="/img/escudo.gif" alt="Escudo" class="escudo">
				<h2>UNIVERSIDAD NACIONAL EXPERIMENTAL DE LA FUERZA ARMADA BOLIVARIANA <br>
				7MO SEMESTRE ING SISTEMAS</h2>
			</div>
			@yield('header')
		</div>
	</div>
	<div class="sup-container">
		<div class="container-fluid">
			<div class="row">
				@yield('content')
			</div>
		</div>
	</div>
	<div class="footer">
		<p>reyesnaffer@gmail.com</p>
	</div>
	<script src="/js/main.js" type="text/javascript"></script>
</body>
</html>