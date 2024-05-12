<x-mi-layout titulo="Tarea">
    <div class="container-fluid testimonial py-1">
        <a href="{{route('tareas.tareaCreate',$clase->id)}}">Crear nueva tarea</a>
        <h1>Lista de tareas</h1>
    </div>
    <!--<table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha final</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tareas as $tarea)
            <tr>
                <td>{{ $tarea->nombre }}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->fecha_final }}</td>
                <td> 
                    <a href="{{ route('tareas.tareaShow', [$clase, $tarea])}}">Ver</a> |
                    <a href="{{ route('tareas.tareaUpdate', [$clase->id, $tarea]) }}">Editar</a> | 
                    <form action="{{route('tarea.destroy', $tarea)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>-->

    
        <!-- Tastimonial Start -->
        @foreach($tareas as $tarea)
        <div class="container-fluid testimonial py-1">
            <div class="container py-3">
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">


                            <a href="{{ route('tareas.tareaShow', [$clase, $tarea])}}"><div class="mb-4 d-flex align-items-center flex-nowrap">
                                <div class="rounded">
                                    <img src="{{asset('assets/images/logos/actividad.png')}}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block d-block border-bottom border-secondary">
                                    <h4 class="text-dark">{{ $tarea->nombre }}</h4>
                                    @php
                                        $fechaEntrega = new DateTime($tarea->fecha_final);
                                        $hoy = new DateTime();
                                        $intervalo = $hoy->diff($fechaEntrega);
                                        $dias = (int) $intervalo->format('%r%a');
                                    @endphp
                                    <p class="m-0 pb-3">
                                        @if ($dias > 0)
                                            Entrega en {{ $dias }} días
                                        @elseif ($dias < 0)
                                            Tienes {{ abs($dias) }} días de retraso
                                        @else
                                            Se entrega hoy
                                        @endif
                                    </p>
                                </div>
                            </div></a>

                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                        <div class="mb-2 pb-1">
                            <p class="mb-0">{{ Str::limit ($tarea->descripcion, 300, '...') }}</p>
                        </div>

                        <div class="p-1">
                            <a href="{{ route('tareas.tareaUpdate', [$clase->id, $tarea]) }}" class="btn border border-secondary rounded-pill px-3 text-primary">Editar</a>
                            <a href="{{route('tarea.destroy', $tarea)}}" class="btn border border-secondary rounded-pill px-3 text-primary">Eliminar</a> 
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Tastimonial End -->

</x-mi-layout>