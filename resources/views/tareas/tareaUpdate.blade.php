@extends('layouts.milayout')

@section('contenido')

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
            <input type="date" name="fecha_final" id="fecha_final" value="{{ old('fecha_final') ?? $tarea->fecha_final}}" required>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
@endsection