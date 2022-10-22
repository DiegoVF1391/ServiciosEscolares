<?php
use App\Http\Controllers\PersonalController;
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
Route::get('/personal', [App\Http\Controllers\PersonalController::class, 'index'])->name('personals.index');
//Route::get('/personal/agregar', [App\Http\Controllers\PersonalController::class, 'create'])->name('personal.create');
//RUTAS PARA LA BASE DE DATOS
Route::resource('personals', PersonalController::class);