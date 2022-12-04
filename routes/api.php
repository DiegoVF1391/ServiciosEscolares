<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ServiciosAPIController;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('servicios', ServiciosAPIController::class);
    /*Route::put('usuarios-editar', [UsuarioAPIController::class, 'edit'])->name('usuarios.editar');
    Route::get('last', [LastAPIController::class, 'last'])->name('last');
    Route::get('access', [LastAPIController::class, 'accedio'])->name('access');*/
});

