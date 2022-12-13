<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\Bitacora;

class BitacoraAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $bitacoras = Bitacora::where('id_personal', '=', $id)->get();

        return response()->json([
            'bitacoras' => $bitacoras
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
            'actividad' => 'required|string|max:100',
            'descripcion' => 'string|max:250'
        ]);

        try {
            $bitacora = Bitacora::create($validated);
            
            $usu = Bitacora::find($bitacora->id_bitacora);
            //$usu->id_personal = auth()->user()->id;
            $usu->save();

            return response()->json([
                'msg' => 'La bitacora fue creada satisfactoriamente'
            ]);
        } catch(\Exception $ex) {
            Log::error("Error API en store: " . $ex->getMessage());

            return response()->json([
                'msg' => 'Error al crear el solicitud'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bitacora = Bitacora::find($id);

        if($bitacora) {
            return response()->json([
                'bitacora' => $bitacora
            ]);
        }
        else
        {
            return response()->json([
                'msg' => 'La bitacora no existe'
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

        $bitacora = Bitacora::find($id);
        if($bitacora){
            $validated = $request->validate([
                'actividad' => 'required|string|max:100',
                'descripcion' => 'required|string|max:250',
            ]);

            $bitacora->update($validated);

            return response()->json([
                'msg' => 'Bitácora actualizada'
            ]);
        }else{
            return response()->json([
                'msg' => 'La bitácora no existe'
            ], 500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bitacora = Bitacora::find($id);

        if($bitacora) {

            $bitacora->delete();

            return response()->json([
                'msg' => 'Bitacora eliminado'
            ]);
        }
        else
        {
            return response()->json([
                'msg' => 'La bitacora no existe'
            ], 500);
        }
    }
}
