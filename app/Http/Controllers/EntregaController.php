<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;

class EntregaController extends Controller
{
    /*
     * Display a listing of the resource.
     

     public function __construct()
     {
        $this->middleware('auth')->except('store');
     }
    public function index()
    {
        //
    }

    
     * Show the form for creating a new resource.
     
    public function create()
    {
        //
    }

     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entrega = new Entrega();

        $entrega->user_id = Auth::id();
        $entrega->tarea_id = $request->tarea_id;
        $tarea = Tarea::findOrFail($request->tarea_id);
        $clase = Clase::findOrFail($tarea->clase_id);
        
        if ($request->file('archivo')->isValid() && $request->file('pdf')->isValid()) {
            $entrega->ubicacion=$request->archivo->store('archivos_entregas'),
            $entrega->nombre_original = $request->archivo->getClientOriginalName(),
            $entrega->mime = $request->file('archivo')->getClientMimeType()
        }

        $entrega->save();
        // Redireccionar

        return redirect()->route('tareas.tareaShow', [$clase, $tarea]);
    }

    /**
     * Display the specified resource.
     * 
    public function show(Entrega $entrega)
    {
        //
    }

     * Show the form for editing the specified resource.
    public function edit(Entrega $entrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrega $entrega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrega $entrega)
    {
        //
    }
}
