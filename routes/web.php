<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BusquedaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Ruta para obtener todos los usuarios
Route::get('/usuarios', [UsuarioController::class, 'index']);

// Ruta para almacenar un nuevo usuario
Route::post('/usuarios', [UsuarioController::class, 'store']);

Route::get('/busqueda', [BusquedaController::class, 'index']);

Route::get('/usuarios/token', [UsuarioController::class, 'getToken']);