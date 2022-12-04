<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Models\Solicitud;

class ServiciosAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Solicitud::all();

        return response()->json([
            'servicios' => $servicios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:250',
            'id_departamento' => 'required|min:0|not_in:0',
            'id_asignado' => 'integer|min:1',
            'comentarios'     => 'string|string|max:250',
            'estado' => 'string|string|max:50',
            'comentarios_asignado' => 'string|string|max:250'
        ]);

        try {
            /*$solicitud = new Solicitud();
            $solicitud->fill($validated);
            $solicitud->save();*/

            $solicitud = Solicitud::create($validated);
            
            $usu = Solicitud::find($solicitud->id_solicitud);
            //$usu->id_user_asigna = auth()->user()->id;
            $usu->save();

            return response()->json([
                'msg' => 'La solicitud fue creada satisfactoriamente'
            ]);
        } catch(\Exception $ex) {
            Log::error("Error API en store: " . $ex->getMessage());

            return response()->json([
                'msg' => 'Error al crear el solicitud'
            ], 500);
        }

        /*$data = request()->validate(Solicitud::$rules);
        $solicitud = Solicitud::create($data);
        
        $usu = Solicitud::find($solicitud->id_solicitud);
        $usu->id_user_asigna = auth()->user()->id;
        $usu->save();

        return redirect()->route('solicitud.index')
            ->with('success', 'La solicitud fue creada satisfactoriamente.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Solicitud::find($id);

        if($servicio) {
            return response()->json([
                'servicio' => $servicio
            ]);
        }
        else
        {
            return response()->json([
                'msg' => 'El servicio no existe'
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);

        if($solicitud->estado!= 'asignada'){
            $solicitud->estado ='cancelada';
            $solicitud->save();

            return response()->json([
                'msg' => 'Se ha enviado petición para cancelar solicitud'
            ]);
        }

        else
        {
            $solicitud->estado ='pendiente';
            $solicitud->save();

            return response()->json([
                'msg' => 'La solicitud no existe'
            ], 500);
        }
    }
}
