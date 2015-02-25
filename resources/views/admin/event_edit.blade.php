@extends('calendar.layout')
@section('head')
	<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
@stop

@section('content')
<div class="col-lg-4 col-lg-offset-4 form-box">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Editar Evento - {{ $event->title }}</h2>
		</div>
		<div class="panel-body">
			{!! Form::model($event, ['route' => ['event-update', $event->id], 'method' => 'PATCH']) !!}

				@include('admin._form_event')

				<div class="form-group">
					{!! Form::submit('Editar', ['class' => 'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}

			{!! delete_form(['event-delete', $event->id]) !!}

		</div>
	</div>
</div>
@stop