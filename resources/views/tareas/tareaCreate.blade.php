<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea</title>
</head>
<body>
    <a href="/">salir</a>
    <h1>Crear nueva tarea</h1>
    <form action="{{ route('tarea.store') }}" method="POST">
        @csrf
        <h1>Registrar Tarea</h1>
        <fieldset>
            <legend>Nombre</legend>
            <label for="nombre"></label>
            <input type="text" name="nombre" id="Name" required>
        </fieldset>
        <fieldset>
            <legend>Descripcion</legend>
            <label for="descripcion"></label>
            <textarea name="descripcion" id="descripcion" cols="50" rows="5" required></textarea>
        </fieldset>
        <fieldset>
            <legend>Fecha de cierre</legend>
            <label for="fecha_final"></label>
            <input type="date" name="fecha_final" id="fecha_final" required>
        </fieldset>
        <fieldset>
            <legend>Tiempo estimado (horas)/legend>
            <label for="tiempo_estimado"></label>
            <input type="number" id="tiempo_estimado" name="tiempo_estimado" required>
        </fieldset>
        <fieldset>
            <legend>Estatus</legend>
            <label><input id="hacer" type="checkbox" name="estatus" value="hacer"> Hacer</label>
            <label><input id="haciendo" type="checkbox" name="estatus" value="haciendo"> Haciendo</label>
            <label><input id="hecho" type="checkbox" name="estatus" value="hecho"> Hecho</label>
        </fieldset>
        <fieldset>
            <legend>Prioridad</legend>
            <label><input id="baja" type="checkbox" name="prioridad" value="baja"> Baja</label>
            <label><input id="media" type="checkbox" name="prioridad" value="media"> Media</label>
            <label><input id="alta" type="checkbox" name="prioridad" value="alta"> Alta</label>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>