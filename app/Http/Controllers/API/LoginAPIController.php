<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken as PersonalAccessToken;

class LoginAPIController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $validated['email'])->first();//BUSCAMOS LA INFORMACION DEL USUARIO

        if( Auth::attempt($validated) && $usuario->role == 'user' ) { //CHECAMOS QUE SEA UN USUARIO Y NO BOSS O ADMIN
            return response()->json([
                'access_token' => $request->user()->createToken(
                    $validated['email']
                )->plainTextToken,
                'message' => 'Success',
                'user' => $usuario
            ]);
        } else {
            return response()->json([
                'message' => 'Acceso denegado'
            ], 401);
        }
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return ['message' => "Salió de su cuenta de usuario"];
    }

    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'message' => 'Usuario creado exitosamente',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
