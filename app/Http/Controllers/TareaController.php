<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /*public function index($clase_id)
    {
        $tareas = Tarea::all();
        *$tareas = Auth::clase()->tareas;
        return view('tareas.tareaIndex', compact('tareas'));

        $tareas = Tarea::where('clase_id', $clase_id)->get();
        return view('tareas.tareaIndex', compact('tareas'));
    }*/

    /**
     * Show the form for creating a new resource.
     */
    public function create($clase_id)
    {
        return view('tareas.tareaCreate', compact('clase_id'));
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
            'clase_id' => 'required|exists:clases,id'
        ]);
        Tarea::create($request->all());
        $clase=Clase::findOrFail($request->clase_id);
        
        return redirect()->route('tareas.tareaIndex', compact('clase'));

        //Guardar
        /*$tarea = new Tarea();
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_final = $request->fecha_final;
        $tarea->tiempo_estimado = $request->tiempo_estimado;
        $tarea->estatus = $request->estatus;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        $request->merge(['clase_id']);*/
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
        ]);
        /*
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_final = $request->fecha_final;
        $tarea->tiempo_estimado = $request->tiempo_estimado;
        $tarea->estatus = $request->estatus;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();*/

        $tarea->update($request->all());
        
        return redirect()->route('tarea.show', $tarea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return back();
    }
    public function verTareas(Clase $clase)
    {
        $tareas=$clase->tareas()->get();
        //dd($tareas);
        return view('tareas.tareaIndex', compact('tareas'), compact('clase'));
    }

    public function CrearTareas($clase_id)
    {
        return view('tareas.tareaCreate', compact('clase_id'));

        /*$tareas=$clase->tareas()->get();
        //dd($tareas);
        return view('tareas.tareaIndex', compact('tareas'), compact('clase'));*/
    }
}
