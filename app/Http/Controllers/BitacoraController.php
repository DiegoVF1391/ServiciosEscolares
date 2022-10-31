<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class BitacoraController
 * @package App\Http\Controllers
 */
class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $bitacoras = DB::table('bitacoras')
        ->join('users', 'bitacoras.id_personal', '=', 'users.id')
        ->select('bitacoras.id_bitacora', 'bitacoras.actividad', 'bitacoras.descripcion', 'bitacoras.fechaRegistro')
        ->where('bitacoras.id_personal', '=', $id)
        ->paginate(20);

        return view('bitacora.index', compact('bitacoras'))
            ->with('i', (request()->input('page', 1) - 1) * $bitacoras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bitacora = new Bitacora();
        return view('bitacora.create', compact('bitacora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate(Bitacora::$rules);
        $bitacora = Bitacora::create($data);
        
        $usu = Bitacora::find($bitacora->id_bitacora);
        $usu->id_personal = auth()->user()->id;
        $usu->save();

        return redirect()->route('bitacora.index')
            ->with('success', 'La bitácora ha sido creada satisfactoriamente');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bitacora = Bitacora::find($id);

        return view('bitacora.show', compact('bitacora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bitacora = Bitacora::find($id);

        return view('bitacora.edit', compact('bitacora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bitacora $bitacora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bitacora $bitacora)
    {
        request()->validate(Bitacora::$rules);

        $bitacora->update($request->all());

        return redirect()->route('bitacora.index')
            ->with('success', 'La bitácora se ha editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bitacora = Bitacora::find($id)->delete();

        return redirect()->route('bitacora.index')
            ->with('success', 'La bitácora se ha eliminado correctamente');
    }
}
