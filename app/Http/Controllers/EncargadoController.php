<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Encargado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $id = auth()->user()->id;
        $users = DB::table('users')
        ->join('departamentos', 'users.id_departamento', '=', 'departamentos.id_departamento')
        ->select('users.id','users.name', 'users.email', 'departamentos.nombre as departamento')
        ->where('users.role', '=', 'boss')
        ->paginate(20);
        return view('encargado.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    
        //$encargados = DB::select('select * from users where role = :role', ['role' => 'boss']);
        //return view('encargado.index', compact('encargados'));
            //->with('i', (request()->input('page', 1) - 1) * $encargados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $departamentos = Departamento::all();
        return view('encargado.create', compact('user','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $d = new User();
        $d->name = $request->name;
        $d->email = $request->email;
        $d->password= Hash::make($request->password);
        $d->role = 'boss';
        $d->id_departamento = $request->id_departamento;
        $d->save();
        
        /*return redirect()->route('users.index')
            ->with('success', 'User created successfully.');*/

        return redirect()->route('encargados.index')
            ->with('success', 'Encargado creado de manera éxitosa.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $departamento = Departamento::find($user->id_departamento);
        
        return view('encargado.show', compact('user', 'departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $departamentos = Departamento::all();
        return view('encargado.edit', compact('user','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('encargados.index')
            ->with('success', 'Encargado modificado de manera éxitosa.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('encargados.index')
            ->with('success', 'Encargado eliminado de manera éxitosa.');
    }
}
