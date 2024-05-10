@extends('layouts.milayout')

@section('contenido')
    <a href="{{route('tareas.tareaCreate',$clase->id)}}">Crear nueva tarea</a>
    <h1>Lista de tareas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha final</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tareas as $tarea)
            <tr>
                <td>{{ $tarea->nombre }}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->fecha_final }}</td>
                <td> 
                    <a href="{{ route('tarea.show', $tarea )}}">Ver</a> |
                     <a href="{{ route('tarea.edit', $tarea ) }}">Editar</a> | 
                    <form action="{{route('tarea.destroy', $tarea)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection