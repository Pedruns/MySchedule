@extends('layouts.milayout')

@section('contenido')
    <a href="/clase/create">Crear nueva clase</a>
    <h1>Lista de clases</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Creador</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clases as $clase)
            <tr>
                <td>{{ $clase->nombre_clase }}</td>
                <td>{{ $clase->user->name }}</td>
                <td> 
                    <a href="{{ route('tareas.tareaIndex', $clase )}}">Ver</a> |
                     <a href="{{ route('clase.edit', $clase ) }}">Editar</a> | 
                    <form action="{{route('clase.destroy', $clase)}}" method="POST">
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