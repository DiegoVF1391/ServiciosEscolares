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

Route::apiResource('servicios', ServiciosAPIController::class);
Route::apiResource('bitacoras', BitacoraAPIController::class);


/*Route::middleware('auth.admin')->group(function () {
    Route::apiResource('usuarios', UsuarioAPIController::class);
});*/


