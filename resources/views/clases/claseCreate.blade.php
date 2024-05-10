@extends('layouts.milayout')

@section('contenido')
    <a href="/">salir</a>
    <h1>Crear nueva clase</h1>
    @include('parciales.formError')
    <form action="{{ route('clase.store') }}" method="POST">
        @csrf 
        <fieldset>
            <legend>Nombre</legend>
            <label for="nombre_clase"></label>
            <input type="text" name="nombre_clase" id="Name" value="{{ old('nombre_clase')}}" required>
            @error('nombre_clase')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
@endsection