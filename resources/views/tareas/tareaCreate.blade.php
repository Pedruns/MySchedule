@extends('layouts.milayout')

@section('contenido')
    <a href="/">salir</a>
    <h1>Crear nueva tarea</h1>
    @include('parciales.formError')
    <form action="{{ route('tarea.store') }}" method="POST">
        @csrf 
        <input type="hidden" name="clase_id" value="{{ $clase_id }}">
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
            <input type="date" name="fecha_final" id="fecha_final" value="{{ old('fecha_final')}}" required>
            @error('fecha_final')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
@endsection