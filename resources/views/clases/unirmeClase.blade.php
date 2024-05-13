<x-mi-layout titulo="Unirme a Clase">
    <a href="/clase">cancelar</a>
    <h1>Unirme a una clase</h1>

    @include('parciales.formError')
    <form action="{{ route('clases.relacionarClaseConUsuario') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="clase_id">Clase</label>
            <select name="clase_id" id="clase" class="form-control" multiple required>
                @foreach($clases as $clase)
                    <option value="{{ $clase->id }}">{{ $clase->nombre_clase }} </option>
                @endforeach
            </select>
            @error('clase_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" value="Unirme" class="btn btn-primary">
    </form>
</x-mi-layout>