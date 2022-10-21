@extends('layouts.app')

@section('template_title')
    {{ $personal->nombre ?? 'Mostrar personal' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar personal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personals.index') }}">Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $personal->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correo Electrónico:</strong>
                            {{ $personal->email }}
                        </div>
                        <div class="form-group">
                            <strong>Contraseña:</strong>
                            {{ $personal->password }}
                        </div>
                        <div class="form-group">
                            <strong>Acceso:</strong>
                            @if($personal->acceso == true)
                                Activo
                            @endif
                            @if($personal->acceso == false)
                                Inactivo
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
