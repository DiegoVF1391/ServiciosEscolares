@extends('layouts.app')

@section('template_title')
    Retroalimentar solicitud
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Modificar datos de solicitud</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('solicitud.update', $solicitud->id_solicitud) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('solicitud.form_retro')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
