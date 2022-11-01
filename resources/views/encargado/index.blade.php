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
										<th>Email</th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($encargados as $encargado)
                                        <tr>
                                            <td>{{ $encargado->id }}</td>
                                            
											<td>{{ $encargado->name }}</td>
											<td>{{ $encargado->email }}</td>

                                            <td>
                                                <form action="{{ route('encargados.destroy',$encargado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('encargados.show',$encargado->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('encargados.edit',$encargado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
            </div>
        </div>
    </div>
@endsection
