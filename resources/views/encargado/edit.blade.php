@extends('layouts.app')

@section('template_title')
    Modificar datos de encargado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Modificar datos del encargado</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('encargados.update', $encargado) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('encargado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection