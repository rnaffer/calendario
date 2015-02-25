@extends('calendar.layout')

@section('content')
<div class="col-lg-4 col-lg-offset-4 form-box">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Nuevo Tipo De Evento</h2>
		</div>
		<div class="panel-body">
			{!! Form::open(['route' => 'type-save']) !!}
				
				@include('admin._form_type')
			
				<div class="form-group">
					{!! Form::submit('Crear Tipo', ['class' => 'btn btn-default']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop