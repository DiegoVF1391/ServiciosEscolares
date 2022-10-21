@extends('layouts.app')

@section('template_title')
    Personal
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Personal') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('personals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Password</th>
										<th>Acceso</th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personals as $personal)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $personal->nombre }}</td>
											<td>{{ $personal->email }}</td>
											<td>{{ $personal->password }}</td>
                                            <td>@if($personal->acceso == true)
                                                    Activo
                                                @endif
                                                @if($personal->acceso == false)
                                                    Inactivo
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('personals.destroy',$personal->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('personals.show',$personal->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('personals.edit',$personal->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $personals->links() !!}
            </div>
        </div>
    </div>
@endsection
