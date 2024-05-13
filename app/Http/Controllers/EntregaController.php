<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Entrega;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EntregaController extends Controller
{
    public function __construct()
     {
        $this->middleware('auth');
     }

    public function entregas(Tarea $tarea)
    {
        $entregas = $tarea->entregas()->get();
        //$entregas = Entrega::all();
        //dd($entregas);
        return view('tareas.entregas', compact('entregas'), compact('tarea'));
    }


    public function store(Request $request)
    {
        $entrega = new Entrega();

        $entrega->user_id = Auth::id();
        $entrega->tarea_id = $request->tarea_id;
        
        if ($request->file('archivo')->isValid()) {
            $entrega->ubicacion=$request->archivo->store('','public');
            $entrega->nombre_original = $request->archivo->getClientOriginalName();
            $entrega->mime = $request->file('archivo')->getClientMimeType();
        }

        $entrega->save();
        // Redireccionar

        return back();
    }


    public function download($entregaid)
    {
        $entrega = Entrega::findOrFail($entregaid);
        return response()
        ->download(storage_path('app/public/' . $entrega->ubicacion), $entrega->nombre_original);
    }
}
