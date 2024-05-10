<?php

use App\Http\Controllers\ClaseController;
use App\Http\Controllers\TareaController;
use App\Models\Tarea;
use Illuminate\Support\Facades\Route;

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
    return view('inicio'); //inicio
});

Route::resource('tarea', TareaController::class);
Route::get('/tarea/{clase}/tareas',[TareaController::class,'verTareas'])->name('tareas.tareaIndex');
Route::get('/tarea/{clase}/crearTarea',[TareaController::class,'CrearTareas'])->name('tareas.tareaCreate');

Route::resource('clase', ClaseController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
