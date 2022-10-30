@extends('layouts.app')

@section('template_title')
    Solicitud
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Solicitud') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('solicitud.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Nombre</th>
										<th>Descipción</th>
										<th>Departamento</th>
										<th>Estado</th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitud as $solicitud)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $solicitud->nombre }}</td>
											<td>{{ $solicitud->descripcion }}</td>
                                            <td>{{ $solicitud->departamento->nombre }}</td>
											<td>{{ $solicitud->estado }}</td>

                                            <td>
                                                <form action="{{ route('solicitud.destroy',$solicitud->id_solicitud) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('solicitud.show',$solicitud->id_solicitud) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('solicitud.edit',$solicitud->id_solicitud) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $solicitud->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
