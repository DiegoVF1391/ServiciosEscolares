@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Mostrar personal' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar user</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}">Regresar</a>
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

                        
                        <!--<div class="form-group">
                            <strong>Acceso:</strong>
                            @if($user->acceso == true)
                                Activo
                            @endif
                            @if($user->acceso == false)
                                Inactivo
                            @endif
                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
