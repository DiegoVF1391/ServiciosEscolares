@extends('layouts.app')

@section('template_title')
    Crear nueva solicitud
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear nueva solicitud</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('solicitud.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('solicitud.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
