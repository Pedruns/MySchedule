<?php

use App\Http\Controllers\ClaseController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\TareaController;
use App\Models\Entrega;
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
Route::get('/tarea/{clase}/misTareas',[TareaController::class,'misTareas'])->name('tareas.misTareas');
Route::get('/tarea/{clase}/crearTarea',[TareaController::class,'CrearTareas'])->name('tareas.tareaCreate');
Route::get('/tarea/{clase}/{tarea}/detalle',[TareaController::class,'detalleTarea'])->name('tareas.tareaShow');
Route::get('/tarea/{clase}/{tarea}/editar',[TareaController::class,'editarTarea'])->name('tareas.tareaUpdate');



Route::resource('clase', ClaseController::class);

Route::get('/unirmeClase', [ClaseController::class, 'unirmeClase'])->name('clases.unirmeClase');
Route::get('/misclases', [ClaseController::class, 'misclases'])->name('clases.misclases');
Route::post('/relacionarClaseConUsuario', [ClaseController::class, 'relacionarClaseConUsuario'])->name('clases.relacionarClaseConUsuario');
//Route::get('/clase/unir',[ClaseController::class,'unirmeClase'])->name('clases.claseUnir');

Route::resource('entrega', EntregaController::class);
Route::get('/entrega/{tarea}/estregas',[EntregaController::class,'entregas'])->name('tareas.entregas');
Route::get('/entrega/download/{archivo}', [EntregaController::class, 'download'])->name('entrega.download');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
