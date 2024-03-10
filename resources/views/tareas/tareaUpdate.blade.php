<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
</head>
<body>
    @include('parciales.formError')
    <h1>Actualizar tarea</h1>
    <form action="{{ route('tarea.update', $tarea) }}" method="POST">
        @csrf 
        @method('PATCH')
        <fieldset>
            <legend>Nombre</legend>
            <label for="nombre"></label>
            <input type="text" name="nombre" id="Name" value="{{ old('nombre') ?? $tarea->nombre}}" required>
        </fieldset>
        <fieldset>
            <legend>Descripcion</legend>
            <label for="descripcion"></label>
            <textarea name="descripcion" id="descripcion" cols="50" rows="5"  required>{{ old('descripcion') ?? $tarea->descripcion}}</textarea>
        </fieldset>
        <fieldset>
            <legend>Fecha de cierre</legend>
            <label for="fecha_final"></label>
            <input type="date" name="fecha_final" id="fecha_final" value="{{ old('fecha_fina;') ?? $tarea->fecha_final}}" required>
        </fieldset>
        <fieldset>
            <legend>Tiempo estimado (horas)</legend>
            <label for="tiempo_estimado"></label>
            <input type="number" id="tiempo_estimado" name="tiempo_estimado" value="{{ old('tiempo_estimado') ?? $tarea->tiempo_estimado}}" required>
        </fieldset>
        <fieldset>
            <legend>Estatus</legend>
            <label><input id="hacer" type="checkbox" name="estatus" value="hacer" @selected(old('estatus')=='hacer' ?? $tarea->estatus =='hacer')> Hacer</label>
            <label><input id="haciendo" type="checkbox" name="estatus" value="haciendo" @selected(old('estatus')=='haciendo' ?? $tarea->estatus =='haciendo')> Haciendo</label>
            <label><input id="hecho" type="checkbox" name="estatus" value="hecho" @selected(old('estatus')=='hecho' ?? $tarea->estatus =='hecho')> Hecho</label>
        </fieldset>
        <fieldset>
            <legend>Prioridad</legend>
            <label><input id="baja" type="checkbox" name="prioridad" value="baja" @selected(old('prioridad')=='baja' ?? $tarea->prioridad =='baja')> Baja</label>
            <label><input id="media" type="checkbox" name="prioridad" value="media" @selected(old('prioridad')=='media' ?? $tarea->prioridad =='media')> Media</label>
            <label><input id="alta" type="checkbox" name="prioridad" value="alta" @selected(old('prioridad')=='alta' ?? $tarea->prioridad =='alta')> Alta</label>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>