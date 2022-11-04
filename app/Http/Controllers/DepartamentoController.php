<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;
/**
 * Class DepartamentoController
 * @package App\Http\Controllers
 */
class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::paginate();

        /*$departamentos = DB::table('departamentos')
        ->join('users', 'departamentos.id_encargado', '=', 'users.id')
        ->select('departamentos.id_departamento', 'departamentos.nombre', 'users.name')
        ->get()->paginate(20);*/

        return view('departamento.index', compact('departamentos'))
            ->with('i', (request()->input('page', 1) - 1) * $departamentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento = new Departamento();
        return view('departamento.create', compact('departamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Departamento::$rules);

        $departamento = Departamento::create($request->all());
        /*$ = Solicitud::find($solicitud->id_solicitud);
        $usu->id_user_asigna = auth()->user()->id;
        $usu->save();*/

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Departamento::find($id);
        
        //$encargado = DB::table('users')->where('id', '=', '$departamento->id_encargado');
        return view('departamento.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::find($id);
        //$encargados = DB::select('select * from users where role = :role', ['role' => 'boss']);
        
        return view('departamento.edit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        request()->validate(Departamento::$rules);

        $departamento->update($request->all());

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $departamento = Departamento::find($id)->delete();

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento deleted successfully');
    }
}
