@extends('calendar.layout')
@if (Auth::check())
	hay usuario
@endif
@section('content')
<div class="col-md-12 col-lg-10 rightfix">
	<div class="calendar">
		<div class="form">
			<form action="/calendario/admin" method="POST" role="form">
				<legend>Ingresar</legend>
				<div class="form-group">
					<label for="">Email</label>
					<input name="email" type="email" class="form-control" id="" placeholder="Ingrese Email">
				</div>
				<div class="form-group">
					<label for="">Contraseña</label>
					<input name="password" type="password" class="form-control" id="" placeholder="Ingrese contraseña">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>
@stop