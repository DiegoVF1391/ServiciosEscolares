<?php
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\EncargadoController;
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
//Route::get('/personal', [App\Http\Controllers\PersonalController::class, 'index'])->name('personals.index');
//Route::get('/personal/agregar', [App\Http\Controllers\PersonalController::class, 'create'])->name('personal.create');
//Route::get('/encargados', [App\Http\Controllers\EncargadoController::class, 'index'])->name('encargados');

//RUTAS PARA LA BASE DE DATOS
Route::resource('personals', PersonalController::class);
Route::resource('encargados', EncargadoController::class);
Route::resource('departamentos', DepartamentoController::class);