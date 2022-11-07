@extends('layouts.app')

@section('template_title')
    {{ $encargado->name ?? 'Mostrar encargado' }}
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
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Correo Electrónico:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de usuario:</strong>
                            @if($user->role == 'boss')
                                Encargado
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $departamento->nombre }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
