@extends('layouts.app')

@section('template_title')
    Bitacora
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bitacora') }}
                            </span>
                            @if (auth()->user()->role=='user')
                                <div class="float-right">
                                    <a href="{{ route('bitacora.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear nueva') }}
                                    </a>
                                </div>
                            @endif
                             
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
										<th>Actividad</th>
										<th>Descipción</th>
										<th>Fecha</th>
                                        @if (auth()->user()->role=='boss')
                                            <th>Empleado</th>
                                        @endif
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bitacoras as $bitacora)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bitacora->actividad }}</td>
											<td>{{ $bitacora->descripcion }}</td>
                                            <td>{{ $bitacora->fechaRegistro }}</td>
                                            @if (auth()->user()->role=='boss')
                                                <td>{{ $bitacora->name }}</td>
                                            @endif
                                            

                                            <td>
                                                <form action="{{ route('bitacora.destroy',$bitacora->id_bitacora) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bitacora.show',$bitacora->id_bitacora) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    @if (auth()->user()->role=='user')
                                                        <a class="btn btn-sm btn-success" href="{{ route('bitacora.edit',$bitacora->id_bitacora) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-ban"></i> Eliminar</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $bitacora->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
