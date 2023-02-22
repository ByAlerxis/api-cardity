<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\RegistroDeAccesosController;
use App\Http\Controllers\TarjetasController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/usuarios',[UsuariosController::class, 'get']);
Route::post('/usuarios', [UsuariosController::class, 'post']);
Route::put('/usuarios/{id}', [UsuariosController::class, 'put']);
Route::put('/usuariosDel/{id}', [UsuariosController::class, 'del']);

Route::get('/tarjetas', [TarjetasController::class, 'get']);
Route::post('/tarjetas', [TarjetasController::class, 'post']);
Route::put('/tarjetas/{id}', [TarjetasController::class, 'put']);
Route::delete('/tarjetasDel/{id}', [TarjetasController::class, 'del']);

Route::get('/areas', [AreasController::class, 'get']);
Route::post('/areas', [AreasController::class, 'post']);
Route::put('/areas/{id}', [AreasController::class, 'put']);
Route::delete('/areasDel/{id}', [AreasController::class, 'del']);

Route::get('/accesos', [RegistroDeAccesosController::class, 'get']);
Route::post('/accesos', [RegistroDeAccesosController::class, 'post']);
Route::put('/accesos/{id}', [RegistroDeAccesosController::class, 'put']);
Route::delete('/accesosDel/{id}', [RegistroDeAccesosController::class, 'del']);