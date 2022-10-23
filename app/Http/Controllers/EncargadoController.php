<?php

namespace App\Http\Controllers;

use App\Models\Encargado;
use Illuminate\Http\Request;

/**
 * Class EncargadoController
 * @package App\Http\Controllers
 */
class EncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encargados = Encargado::paginate();

        return view('encargado.index', compact('encargados'))
            ->with('i', (request()->input('page', 1) - 1) * $encargados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $encargado = new Encargado();
        return view('encargado.create', compact('encargado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Encargado::$rules);

        $encargado = Encargado::create($request->all());

        return redirect()->route('encargados.index')
            ->with('success', 'Encargado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encargado = Encargado::find($id);

        return view('encargado.show', compact('encargado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encargado = Encargado::find($id);

        return view('encargado.edit', compact('encargado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Encargado $encargado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encargado $encargado)
    {
        request()->validate(Encargado::$rules);

        $encargado->update($request->all());

        return redirect()->route('encargados.index')
            ->with('success', 'Encargado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $encargado = Encargado::find($id)->delete();

        return redirect()->route('encargados.index')
            ->with('success', 'Encargado deleted successfully');
    }
}
