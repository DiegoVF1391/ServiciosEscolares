@extends('layouts.app')

@section('template_title')
    Retroalimentar bitácora
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Modificar datos de bitácora</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bitacora.update', $bitacora->id_bitacora) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('bitacora.form_retro')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
