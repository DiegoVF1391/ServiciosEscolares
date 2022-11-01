<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $solicitud->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" disabled>
            {{ Form::label('Departamento') }}
            {{ Form::text('departamento', $solicitud->departamento->nombre, ['class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'readonly']) }}
            {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" disabled>
            {{ Form::label('Fecha de asignación') }}
            {{ Form::text('fechaAsignacion', $solicitud->fechaAsignacion, ['class' => 'form-control' . ($errors->has('fechaAsignacion') ? ' is-invalid' : ''), 'readonly']) }}
            {!! $errors->first('fechaAsignacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::textarea('descripcion', $solicitud->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comentarios') }}
            {{ Form::textarea('comentarios', $solicitud->comentarios, ['class' => 'form-control' . ($errors->has('comentarios') ? ' is-invalid' : ''), 'placeholder' => 'Comentarios']) }}
            {!! $errors->first('comentarios', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('calificación') }}
            {{ Form::text('calificacion', $solicitud->calificacion ? $solicitud->calificacion : '', ['class' => 'form-control' . ($errors->has('calificacion') ? ' is-invalid' : ''), 'placeholder' => 'Calificación']) }}
            {!! $errors->first('calificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div>
            {{Form::label('Finalizado')}}
            {{Form::checkbox('estado', 'finalizado')}}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>