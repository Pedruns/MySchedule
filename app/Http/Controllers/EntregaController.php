<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Entrega;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntregaController extends Controller
{
    public function __construct()
     {
        $this->middleware('auth');
     }
    /*
     * Display a listing of the resource.
     

     public function __construct()
     {
        $this->middleware('auth')->except('store');
     }
    */
    public function entregas(Tarea $tarea)
    {
        $entregas = $tarea->entregas()->get();
        //$entregas = Entrega::all();
        //dd($entregas);
        return view('tareas.entregas', compact('entregas'), compact('tarea'));
    }

    /*
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
        
        if ($request->file('archivo')->isValid()) {
            $entrega->ubicacion=$request->archivo->store('');
            $entrega->nombre_original = $request->archivo->getClientOriginalName();
            $entrega->mime = $request->file('archivo')->getClientMimeType();
        }

        $entrega->save();
        // Redireccionar

        return back();
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

    public function download(Entrega $entrega)
    {
        return response()
        ->download(storage_path('app/' . $entrega->ubicacion), $entrega->nombre_original);
    }
}
