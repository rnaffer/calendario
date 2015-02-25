<div class="form-group">
	{!! Form::label('title', 'Titulo') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('date', 'Fecha') !!}
	{!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('grade', 'Ponderación') !!}
	{!! Form::input('number', 'grade', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('type_id', 'Tipo') !!}
	<select name="type_id" class="form-control">
		@foreach ($types as $type)
			<option value="{{ $type->id}}">{{ $type->name }}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	{!! Form::label('description', 'Descripción') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control ckeditor']) !!}
</div>