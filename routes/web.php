<?php
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ChartController; 
use App\Http\Controllers\EncargadoController; 
use App\Http\Controllers\SolicitudController; 
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\DepartamentoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//RUTAS PARA LAS VISTAS
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reporte/servicios', [App\Http\Controllers\ChartController::class, 'serviciosAdmin']);
Route::get('reporte-excel', [App\Http\Controllers\ChartController::class, 'exportExcel'])->name('reporteExcel');

//RUTAS PARA LA BASE DE DATOS
Route::resource('users', UserController::class)->middleware('auth.admin'); 
Route::resource('encargados', EncargadoController::class)->middleware('auth.admin'); 
Route::resource('departamentos', DepartamentoController::class)->middleware('auth.admin');
Route::resource('solicitud', SolicitudController::class)->middleware('auth.user');   
Route::resource('bitacora', BitacoraController::class)->middleware('auth.user');  
