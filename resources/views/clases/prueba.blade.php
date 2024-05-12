<x-mi-layout titulo="Actualizar Clase">
    <div class="container-fluid py-1 mt-1">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-12">
                    <div class="row g-4 justify-content-center">
                        @php $contador = 0; @endphp
                            @foreach($clases as $clase)
                                    @if($contador % 2 == 0)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <div class="fruite-img">
                                                <img src="{{asset('assets/images/logos/placeholder.jpg')}}" width="415" height="200" class="img-fluid w-100 rounded-top"> 
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{$clase->nombre_clase}}</h4>
                                                    <a href="{{ route('clase.edit', $clase ) }}" class="btn border border-secondary rounded-pill px-3 text-primary">Editar</a>
                                                    <a href="{{ route('tareas.tareaIndex', $clase )}}" class="btn border border-secondary rounded-pill px-3 text-primary">Ver</a>
                                                    <a href="{{route('clase.destroy', $clase)}}" class="btn border border-secondary rounded-pill px-3 text-primary">Eliminar</a> 
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($contador % 2 == 1)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <div class="fruite-img">
                                                <img src="{{asset('assets/images/logos/placeholder.jpg')}}" width="415" height="200" class="img-fluid w-100 rounded-top"> 
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{$clase->nombre_clase}}</h4>
                                                    <a href="{{ route('clase.edit', $clase ) }}" class="btn border border-secondary rounded-pill px-3 text-primary">Editar</a>
                                                    <a href="{{ route('tareas.tareaIndex', $clase )}}" class="btn border border-secondary rounded-pill px-3 text-primary">Ver</a>
                                                    <a href="{{route('clase.destroy', $clase)}}" class="btn border border-secondary rounded-pill px-3 text-primary">Eliminar</a> 
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                            @php $contador++; @endphp
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-mi-layout>