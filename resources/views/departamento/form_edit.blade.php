<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $departamento->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Encargado') }}
            <select name="id_encargado" id="">
                @foreach ($encargados as $d )
                    <option value="{{$d->id}}">{{$d->name}}</option>
                @endforeach
            </select>
            
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>  Modificar</button>
        <a class="btn btn-danger" href="{{ route('departamentos.index') }}"><i class="fa fa-fw fa-sign-out"></i>  Cancelar</a>
    </div>
</div>