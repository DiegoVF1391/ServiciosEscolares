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
                        @if ($solicitud->id_asignado!=null)
                            <div class="form-group">
                                <strong>Asignado:</strong>
                                @foreach ($asignado as $a )
                                    {{$a->name}}
                                @endforeach
                            </div>
                            <div class="form-group">
                                <strong>Comentarios del que atiende:</strong>
                                {{ $solicitud->comentarios_asignado }}
                            </div>
                        @endif
                        @if (auth()->user()->role == 'boss')
                            <form method="POST" action="{{ route('solicitud.update', $solicitud->id_solicitud) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class="form-group">
                                    {{ Form::label('Asignar a:  ') }}
                                    <select name="id_asignado" id="">
                                        @foreach ($usus as $u )
                                            <option value="{{$u->id}}">{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button id="btnsave" class="btn btn-success" type="submit"><i class="fa-solid fa-paper-plane"></i> Asignar</button>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
