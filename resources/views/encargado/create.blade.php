@extends('layouts.app')

@section('template_title')
    Crear nuevo encargado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear nuevo encargado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('encargados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('encargado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
