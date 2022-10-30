<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Solicitud;
use Illuminate\Http\Request;

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
        $solicitud = Solicitud::paginate();
        return view('solicitud.index', compact('solicitud'))
            ->with('i', (request()->input('page', 1) - 1) * $solicitud->perPage());
        // $solicitud = Solicitud::with('departamento')->paginate(3);
        // return view('solicitud.index',['solicitud' => $solicitud]);
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
        // request()->validate(Solicitud::$rules);

        // $solicitud = Solicitud::create($request->all());
        $data = request()->validate(Solicitud::$rules);
        $solicitud = Solicitud::create($data);

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

        return view('solicitud.edit', compact('solicitud'));
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
        request()->validate(Solicitud::$rules);

        $solicitud->update($request->all());

        return redirect()->route('solicitud.index')
            ->with('success', 'Solicitud updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $solicitud = Solicitud::find($id)->delete();

        return redirect()->route('solicitud.index')
            ->with('success', 'Solicitud deleted successfully');
    }
}
