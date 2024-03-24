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
            <select name="estatus" id="estatus">
                <option value="">---</option>
                <option value="hacer" {{ old('estatus') == 'hacer' || $tarea->estatus == 'hacer' ? 'selected' : '' }}>Hacer</option>
                <option value="haciendo" {{ old('estatus') == 'haciendo' || $tarea->estatus == 'haciendo' ? 'selected' : '' }}>Haciendo</option>
                <option value="hecho" {{ old('estatus') == 'hecho' || $tarea->estatus == 'hecho' ? 'selected' : '' }}>Hecho</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Prioridad</legend>
            <select name="prioridad" id="prioridad">
                <option value="">---</option>
                <option value="baja" {{ old('prioridad') == 'baja' || $tarea->prioridad == 'baja' ? 'selected' : '' }}>Baja</option>
                <option value="media" {{ old('prioridad') == 'media' || $tarea->prioridad == 'media' ? 'selected' : '' }}>Media</option>
                <option value="alta" {{ old('prioridad') == 'alta' || $tarea->prioridad == 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>