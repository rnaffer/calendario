@extends('calendar.layout')

@section('content')
<div class="col-lg-4 col-lg-offset-4 form-box">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Editar Tipo de Evento - {{ $type->name }}</h2>
		</div>
		<div class="panel-body">
			{!! Form::model($type, ['route' => ['type-update', $type->id], 'method' => 'PATCH']) !!}
				
				@include('admin._form_type')
				
				<div class="form-group">
					{!! Form::submit('Editar', ['class' => 'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}

			{!! delete_form(['type-delete', $type->id]) !!}

		</div>
	</div>
</div>
@stop