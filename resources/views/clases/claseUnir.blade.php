<x-mi-layout titulo="Unirme a Clase">
    <a href="/clase">cancelar</a>
    <h1>Unirme a una clase</h1>


    <form action="{{ route('clase.relacionarClaseConUsuario') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="clase_id">Clase</label>
            <select name="clase_id" id="clase" class="form-control" multiple>
                @foreach($clases as $clase)
                    <option value="{{ $clase->id }}">{{ $clase->nombre_clase }}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Unirme" class="btn btn-primary">
    </form>
</x-mi-layout>
