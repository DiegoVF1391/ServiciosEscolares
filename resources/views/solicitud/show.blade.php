@extends('layouts.app')

@section('template_title')
    {{ $solicitud->nombre ?? 'Mostrar solicitud' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar solicitud</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('solicitud.index') }}">Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $solicitud->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de asignación:</strong>
                            {{ $solicitud->fechaAsignacion }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $solicitud->departamento->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $solicitud->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Califición:</strong>
                            {{ $solicitud->calificacion ? $solicitud->calificacion : "Sin calificar" }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $solicitud->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Comentarios:</strong>
                            {{ $solicitud->comentarios }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
