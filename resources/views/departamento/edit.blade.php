@extends('layouts.app')

@section('template_title')
    Modificar datos de departamento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Modificar datos del departamento</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departamentos.update', $departamento) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('departamento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
