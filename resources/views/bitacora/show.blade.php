@extends('layouts.app')

@section('template_title')
    {{ $bitacora->nombre ?? 'Mostrar bitacora' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar bitácora</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bitacora.index') }}">Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Actividad:</strong>
                            {{ $bitacora->actividad }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de registro:</strong>
                            {{ $bitacora->fechaRegistro }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $bitacora->descripcion }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
