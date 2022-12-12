<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAPIController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if( Auth::attempt($validated) ) {
            return response()->json([
                'token' => $request->user()->createToken(
                    $validated['email']
                )->plainTextToken,
                'message' => 'Success'
            ]);
        } else {
            return response()->json([
                'message' => 'Acceso denegado'
            ], 401);
        }
    }

    public function logout(){
        $token = request()->bearerToken();
        
        /** @var PersonalAccessToken $model */
        $model = Sanctum::$personalAccessTokenModel;

        $accessToken = $model::findToken($token);
        $accessToken->delete();

        return response()->json(['message' => "Hasta la proxima"], 204);
    }
}
