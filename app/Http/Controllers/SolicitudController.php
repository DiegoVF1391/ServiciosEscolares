<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

/**
 * Class SolicitudController
 * @package App\Http\Controllers
 */
class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = auth()->user()->id;
        $solicitud = DB::table('solicitudes')
        ->join('departamentos', 'solicitudes.id_departamento', '=', 'departamentos.id_departamento')
        ->select('solicitudes.id_solicitud', 'solicitudes.nombre', 'solicitudes.descripcion', 'solicitudes.estado', 'departamentos.nombre as departamento')
        ->where('solicitudes.id_user_asigna', '=', $id)
        ->orWhere('solicitudes.id_asignado', '=', $id)
        ->paginate(20);

        return view('solicitud.index', compact('solicitud'))
            ->with('i', (request()->input('page', 1) - 1) * $solicitud->perPage());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all();
        $solicitud = new Solicitud();
        return view('solicitud.create', compact('solicitud','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate(Solicitud::$rules);
        $solicitud = Solicitud::create($data);
        
        $usu = Solicitud::find($solicitud->id_solicitud);
        $usu->id_user_asigna = auth()->user()->id;
        $usu->save();

        return redirect()->route('solicitud.index')
            ->with('success', 'Solicitud created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud = Solicitud::find($id);

        return view('solicitud.show', compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitud = Solicitud::find($id);
        $departamentos = Departamento::all();
        return view('solicitud.edit', compact('solicitud','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Solicitud $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        $data = request()->validate([
            'comentarios'     => 'string|string|max:250',
            'estado' => 'string|string|max:50',
            'calificacion'  =>  'integer|min:0|max:10'
        ]);

        $solicitud->update($data);

        if($request->estado =='finalizado'){
            $fechaFin = Solicitud::find($solicitud->id_solicitud);
            $fechaFin->fechaFinalizacion = DB::raw('NOW()');
            $fechaFin->save();
        }

        return redirect()->route('solicitud.index')
            ->with('success', 'la solicitud ha sido retroalimentada');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);
        $solicitud->estado ='pendiente';
        $solicitud->save();

        return redirect()->route('solicitud.index')
            ->with('success', 'Se ha enviado petición para cancelar solicitud');
    }
}
