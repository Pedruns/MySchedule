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
    @include('parciales.formError')
    <form action="{{ route('tarea.store') }}" method="POST">
        @csrf 
        <fieldset>
            <legend>Nombre</legend>
            <label for="nombre"></label>
            <input type="text" name="nombre" id="Name" value="{{ old('nombre')}}" required>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </fieldset>
        <fieldset>
            <legend>Descripcion</legend>
            <label for="descripcion"></label>
            <textarea name="descripcion" id="descripcion" cols="50" rows="5" value="{{ old('descripcion')}}" required></textarea>
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </fieldset>
        <fieldset>
            <legend>Fecha de cierre</legend>
            <label for="fecha_final"></label>
            <input type="date" name="fecha_final" id="fecha_final" value="{{ old('fecha_fina;')}}" required>
            @error('fecha_final')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </fieldset>
        <fieldset>
            <legend>Tiempo estimado (horas)</legend>
            <label for="tiempo_estimado"></label>
            <input type="number" id="tiempo_estimado" name="tiempo_estimado" value="{{ old('tiempo_estimado')}}" required>
            @error('tiempo_estimado')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </fieldset>
        <fieldset>
            <legend>Estatus</legend>
            <select name="estatus" id="estatus">
                <option value="hacer" @selected(old('estatus')=='hacer')>Hacer</option>
                <option value="haciendo" @selected(old('estatus')=='haciendo')>Haciendo</option>
                <option value="hecho"@selected(old('estatus')=='hecho')>Hecho</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Prioridad</legend>
            <select name="prioridad" id="prioridad">
                <option value="baja" @selected(old('prioridad')=='baja')>Baja</option>
                <option value="media" @selected(old('prioridad')=='media')>Media</option>
                <option value="alta" @selected(old('prioridad')=='alta')>Alta</option>
            </select>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>