<x-mi-layout titulo="Clases">
    
    <div class="navbar-collapse justify-content-start px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-start">
        <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="../assets/images/profile/simbolo.png" alt="" width="35" height="35" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                    <a href="{{ route('clases.unirmeClase') }}" class="d-flex align-items-center gap-2 dropdown-item">
                    <p class="mb-0 fs-3">Unirme a Clase</p>
                    </a>
                    <a href="{{ route('clase.create') }}" class="d-flex align-items-center gap-2 dropdown-item">
                    <p class="mb-0 fs-3">Crear Clase</p></a>
                </div>
            </div>
        </li>
        </ul>
    </div>
    <h1>Lista de clases</h1>

    <div class="container-fluid py-1 mt-1">
        <div class="container py-3">
            <div class="row g-4 mb-5">
                <div class="col-lg-12">
                    <div class="row g-4 justify-content-center">
                        @php $contador = 0; @endphp
                            @foreach($clases as $clase)
                                    @if($contador % 2 == 0)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <a href="{{ route('tareas.misTareas', $clase )}}"><img src="{{asset('assets/images/logos/placeholder.jpg')}}" width="415" height="200" class="img-fluid w-100 rounded-top"></a>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{$clase->nombre_clase}}</h4>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('clase.edit', $clase ) }}" class="btn border border-secondary rounded-pill px-3 text-primary">Editar</a>
                                                    <form action="{{route('clase.destroy', $clase)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Eliminar" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($contador % 2 == 1)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <a href="{{ route('tareas.misTareas', $clase )}}"><img src="{{asset('assets/images/logos/placeholder.jpg')}}" width="415" height="200" class="img-fluid w-100 rounded-top"></a>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{$clase->nombre_clase}}</h4>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('clase.edit', $clase ) }}" class="btn border border-secondary rounded-pill px-3 text-primary">Editar</a>
                                                    <form action="{{route('clase.destroy', $clase)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Eliminar" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    </form>
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
    </div>
</x-mi-layout>
