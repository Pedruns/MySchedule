<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tarea</title>
</head>
<body>
    <a href="/tarea/create">Crear nueva tarea</a>
    <h1>Lista de tareas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha de cierre</th>
                <th>Tiempo estimado (horas)</th>
                <th>Estatus</th>
                <th>Prioridad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tareas as $tarea)
            <tr>
                <td>{{ $tarea->nombre }}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->fecha_final }}</td>
                <td>{{ $tarea->tiempo_estimado }}</td>
                <td>{{ $tarea->estatus }}</td>
                <td>{{ $tarea->prioridad }}</td>
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
</body>
</html>