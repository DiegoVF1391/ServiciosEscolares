@extends('layouts.app')

@section('template_title')
    {{ $encargado->nombre ?? 'Mostrar encargado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar encargado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('encargados.index') }}">Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $encargado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correo Electrónico:</strong>
                            {{ $encargado->email }}
                        </div>
                        <div class="form-group">
                            <strong>Contraseña:</strong>
                            {{ $encargado->password }}
                        </div>
                        <div class="form-group">
                            <strong>Acceso:</strong>
                            @if($encargado->acceso == 1)
                                Activo
                            @endif
                            @if($encargado->acceso == 0)
                                Inactivo
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
