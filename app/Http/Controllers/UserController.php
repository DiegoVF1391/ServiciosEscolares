<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
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
        ->where('users.role', '=', 'user')
        ->paginate(20);

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
        
        //$users = User::paginate();
        //$users = DB::select('select * from users where role = :role', ['role' => 'user']);
        //return view('user.index', compact('users'));
            //->with('i', (request()->input('page', 1) - 1) * $users->perPage());
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
        return view('user.create', compact('user','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = request()->validate(User::$rules);

        //dd($request->name);

        //$users = User::create($request->all());

        $d = new User();
        $d->name = $request->name;
        $d->email = $request->email;
        $d->password= Hash::make($request->password);
        $d->role = 'user';
        $d->id_departamento = $request->id_departamento;
        $d->save();
        
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$id = auth()->user()->id;
        /*$users = DB::table('users')
        ->join('departamentos', 'users.id_departamento', '=', 'departamentos.id_departamento')
        ->select('users.id','users.name', 'users.email', 'departamentos.nombre as departamento')
        ->where('users.role', '=', 'user')
        ->paginate(20);*/
        $user = User::find($id);
        $departamento = Departamento::find($user->id_departamento);

        return view('user.show', compact('user', 'departamento'));
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
        return view('user.edit', compact('user','departamentos'));
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

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}



