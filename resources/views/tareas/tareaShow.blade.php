<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Tarea</title>
</head>
<body>
    <a href="/tarea">Todas las tareas</a>
    <h1>Tarea ID {{ $tarea->id }}</h1>
    <ul>
        <li>Nombre: {{ $tarea->nombre }}</li>
        <li>Descripcion: {{ $tarea->descripcion }}</li>
        <li>Fecha de entrega: {{ $tarea->fecha_final }}</li>
        <li>Tiempo estimado: {{ $tarea->tiempo_estimado }}</li>
        <li>Estatus: {{ $tarea->estatus }}</li>
        <li>Prioridad: {{ $tarea->prioridad }}</li>
    </ul>
</body>
</html>