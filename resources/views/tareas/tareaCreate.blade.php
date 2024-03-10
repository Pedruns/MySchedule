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
            <label><input @selected(old('estatus')=='hacer') id="hacer" type="checkbox" name="estatus" value="hacer"> Hacer</label>
            <label><input @selected(old('estatus')=='haciendo') id="haciendo" type="checkbox" name="estatus" value="haciendo"> Haciendo</label>
            <label><input @selected(old('estatus')=='hecho') id="hecho" type="checkbox" name="estatus" value="hecho"> Hecho</label>
        </fieldset>
        <fieldset>
            <legend>Prioridad</legend>
            <label><input @selected(old('prioridad')=='baja') id="baja" type="checkbox" name="prioridad" value="baja"> Baja</label>
            <label><input @selected(old('prioridad')=='media') id="media" type="checkbox" name="prioridad" value="media"> Media</label>
            <label><input @selected(old('prioridad')=='alta') id="alta" type="checkbox" name="prioridad" value="alta"> Alta</label>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>