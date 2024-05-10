@extends('layouts.milayout')

@section('contenido')
    <a href="/tarea">Todas las tareas</a>
    <h1>Tarea ID {{ $tarea->id }}</h1>
    <ul>
        <li>Nombre: {{ $tarea->nombre }}</li>
        <li>Descripcion: {{ $tarea->descripcion }}</li>
        <li>Fecha de entrega: {{ $tarea->fecha_final }}</li>
    </ul>
@endsection