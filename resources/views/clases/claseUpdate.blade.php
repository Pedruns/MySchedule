<x-mi-layout titulo="Actualizar Clase">

    @include('parciales.formError')
    <h1>Actualizar Clase</h1>
    <form action="{{ route('clase.update', $clase) }}" method="POST">
        @csrf 
        @method('PATCH')
        <fieldset>
            <legend>Nombre</legend>
            <label for="nombre_clase"></label>
            <input type="text" name="nombre_clase" id="Name" value="{{ old('nombre_clase') ?? $clase->nombre_clase}}" required>
            @error('nombre_clase')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
</x-mi-layout>