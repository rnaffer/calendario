@extends('calendar.layout')
@section('header')
	@include('admin.admin_user')
@stop

@section('content')
<div class="col-lg-12 dash-box">
					<div class="title"><h2>Panel de Administracion</h2></div>
					<div class="dash-main">
						<table class="table table-striped">
							<h3>EVENTOS</h3><a href="{{ route('event-create') }}" class="btn btn-success">Agregar</a>
							<tr>
								<th>ID</th>
								<th>FECHA</th>
								<th>TITULO</th>
								<th>VALOR</th>
								<th>TIPO</th>
								<th>ACCIÓN</th>
							</tr>

						@foreach ($events as $event)

							<tr>
								<td>{{ $event->id }}</td>
								<td>{{ $event->date }}</td>
								<td>{{ $event->title }}</td>
								<td>{{ $event->grade }}</td>
								<td>{{ $event->name }}</td>
								<td><a href="{{ route('event-edit', [$event->id]) }}" class="btn btn-default">Editar</a></td>
							</tr>
						@endforeach

						</table>
					</div>

					<div class="dash-main">
					<table class="table table-striped">
						<h3>TIPO DE EVENTO</h3><a href="{{ route('type-create') }}" class="btn btn-success">Agregar</a>
						<tr>
							<th>ID</th>
							<th>IMAGEN</th>
							<th>NOMBRE</th>
							<th>ENLACE</th>
							<th>ACCIÓN</th>
						</tr>
						@foreach ($types as $type)

							<tr>
								<td>{{ $type->id }}</td>
								<td><img src="/img/{{ $type->link }}" alt="{{ $type->name }}"></td>
								<td>{{ $type->name }}</td>
								<td>{{ $type->link }}</td>
								<td><a href="{{ route('type-edit', [$type->id]) }}" class="btn btn-default">Editar</a></td>
							</tr>
						@endforeach
						
					</table>
					</div>
					
				</div>
@stop