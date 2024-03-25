<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.tareaIndex', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.tareaCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'max:50'],
            'descripcion' => 'required|string|min:10',
            'fecha_final' => 'required|date',
            'tiempo_estimado' => 'required|numeric|min:0',
            'estatus' => 'required', 
            'prioridad' => 'required',
        ]);
        //Guardar
        $tarea = new Tarea();
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_final = $request->fecha_final;
        $tarea->tiempo_estimado = $request->tiempo_estimado;
        $tarea->estatus = $request->estatus;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        
        return redirect()->route('tarea.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.tareaShow', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.tareaUpdate', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'max:50'],
            'descripcion' => 'required|string|min:10',
            'fecha_final' => 'required|date',
            'tiempo_estimado' => 'required|numeric|min:0',
            'estatus' => 'required', 
            'prioridad' => 'required',
        ]);
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_final = $request->fecha_final;
        $tarea->tiempo_estimado = $request->tiempo_estimado;
        $tarea->estatus = $request->estatus;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        
        return redirect()->route('tarea.show', $tarea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tarea.index');
    }
}
