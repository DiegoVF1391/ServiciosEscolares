@extends('layouts.app')

@section('template_title')
    encargado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('encargado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('encargados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo encargado') }}
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
										<th>Email</th>
										<th>Password</th>
										<th>Acceso</th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($encargados as $encargado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $encargado->nombre }}</td>
											<td>{{ $encargado->email }}</td>
											<td>{{ $encargado->password }}</td>
                                            <td>@if($encargado->acceso == 1)
                                                    Activo
                                                @endif
                                                @if($encargado->acceso == 0)
                                                    Inactivo
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('encargados.destroy',$encargado) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('encargados.show',$encargado) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('encargados.edit',$encargado) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $encargados->links() !!}
            </div>
        </div>
    </div>
@endsection
