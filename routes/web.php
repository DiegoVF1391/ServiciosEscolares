<?php
use App\Http\Controllers\PersonalController; 
use App\Http\Controllers\SolicitudController; 
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\AdminController;
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
/**Route::get('/personal', [App\Http\Controllers\PersonalController::class, 'index'])->name('personal');**/
// Route::get('/personal', [App\Http\Controllers\PersonalController::class, 'index'])->name('personal');
//RUTAS PARA LA BASE DE DATOS
Route::resource('personals', PersonalController::class)->middleware('auth.admin');   
Route::resource('solicitud', SolicitudController::class)->middleware('auth.user');   
Route::resource('bitacora', BitacoraController::class)->middleware('auth.user');  
