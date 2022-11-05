<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $solicitud->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'readonly']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Departamento') }}
            {{ Form::text('departamento', $solicitud->departamento->nombre, ['class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'readonly']) }}
            {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de asignación') }}
            {{ Form::text('fechaAsignacion', $solicitud->fechaAsignacion, ['class' => 'form-control' . ($errors->has('fechaAsignacion') ? ' is-invalid' : ''), 'readonly']) }}
            {!! $errors->first('fechaAsignacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::textarea('descripcion', $solicitud->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'readonly']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comentarios del solicitante') }}
            {{ Form::textarea('comentarios', $solicitud->comentarios, ['class' => 'form-control' . ($errors->has('comentarios') ? ' is-invalid' : ''), 'readonly']) }}
            {!! $errors->first('comentarios', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comentarios del que atiende') }}
            {{ Form::textarea('comentarios_asignado', $solicitud->comentarios_asignado, ['class' => 'form-control' . ($errors->has('comentarios_asignado') ? ' is-invalid' : ''), 'placeholder' => 'Comentarios']) }}
            {!! $errors->first('comentarios_asignado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div>
            {{Form::label('Solicitud Atendida')}}
            {{Form::checkbox('estado', 'atendida')}}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>