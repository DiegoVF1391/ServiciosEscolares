<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ServiciosAPIController;
use App\Http\Controllers\API\LoginAPIController;
use App\Http\Controllers\API\BitacoraAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [LoginAPIController::class, 'login'])->name('api.login');
Route::post('register', [LoginAPIController::class, 'createUser'])->name('api.register');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('servicios', ServiciosAPIController::class);
    Route::apiResource('bitacoras', BitacoraAPIController::class);
    Route::post('logout', [LoginAPIController::class, 'logout']);
    /*Route::apiResource('usuarios', UsuarioAPIController::class);
    Route::put('usuarios-editar', [UsuarioAPIController::class, 'edit'])->name('usuarios.editar');
    Route::get('last', [LastAPIController::class, 'last'])->name('last');
    Route::get('access', [LastAPIController::class, 'accedio'])->name('access');*/
});


