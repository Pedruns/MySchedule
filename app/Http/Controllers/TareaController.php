<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


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
    }

    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'max:50'],
            'descripcion' => 'required|string|min:10',
            'fecha_final' => 'required|date',
            'clase_id' => 'required|exists:clases,id'
        ]);

        $tarea->update($request->all());
        $clase=Clase::findOrFail($request->clase_id);
        
        return redirect()->route('tareas.tareaShow', [$clase, $tarea]);
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return back();
    }

    public function verTareas(Clase $clase)
    {
        $tareas=$clase->tareas()->get();
        return view('tareas.tareaIndex', compact('tareas'), compact('clase'));
    }

    public function misTareas(Clase $clase)
    {
        $tareas=$clase->tareas()->get();
        return view('tareas.misTareas', compact('tareas'), compact('clase'));
    }
    
    public function CrearTareas($clase_id)
    {
        return view('tareas.tareaCreate', compact('clase_id'));
    }

    public function detalleTarea(Clase $clase, Tarea $tarea)
    {
        return view('tareas.tareaShow', compact('clase'), compact('tarea'));
        
    }
    
    public function editarTarea($clase_id, Tarea $tarea)
    {
        return view('tareas.tareaUpdate', compact('clase_id'), compact('tarea'));
    }

}
