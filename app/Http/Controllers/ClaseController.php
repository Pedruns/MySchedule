<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->middleware('auth')->except('index', 'create');
     }

    public function index()
    {
        //$clases = Clase::all();
        $clases = Auth::user()->mis_clases;
        //return view('clases.claseIndex', compact('clases'));
        return view('clases.claseIndex', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clases.claseCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_clase'=>['required', 'string', 'max:50'],
        ]);

        /*$clase = new Clase();
        $clase->nombre_clase = $request->nombre_clase;
        $clase->save();*/
        $request->merge(['user_id' => Auth::id()]);
        Clase::create($request->all());
        
        return redirect()->route('clase.index');
    }

    /*
     * Display the specified resource.
     
    public function show(Clase $clase)
    {
        return view('tareas.tareaIndex', $clase);
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clase $clase)
    {
        return view('clases.claseUpdate', compact('clase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clase $clase)
    {
        $request->validate([
            'nombre_clase'=>['required', 'string', 'max:50'],
        ]);

        $clase->update($request->all());

        return redirect()->route('clase.index', $clase);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase)
    {
        $clase->delete();
        return redirect()->route('clase.index');
    }

    public function unirmeClase()
    {
        $user = Auth::user();
        $clases = Clase::all();
        dd($clases);
        return view('clases.claseUnir', compact('clases'));
    }

    public function relacionarClaseConUsuario(Request $request)
    {
        $clase = Clase::findOrFail($request->clase_id);
        $user_id = Auth::user()->id;
        //$user_id = $user->id;

        $clase->users()->attach($user_id);

        return redirect()->route('clase.index');
    }
    

}
