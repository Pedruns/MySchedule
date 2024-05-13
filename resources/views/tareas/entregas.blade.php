<x-mi-layout titulo="Tarea">
    <div class="container-fluid testimonial py-1">
        <h1>Lista de entregas</h1>
    </div>   
        <!-- Tastimonial Start -->
        @foreach($entregas as $entrega)
        <div class="container-fluid testimonial py-1">
            <div class="container py-3">
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                        @php
                        $user = App\Models\User::findOrFail($entrega->user_id);
                        @endphp
                        <div class="ms-0 d-block d-block border-bottom border-secondary">
                            <a href="{{route('entrega.download', $entrega->id)}}">
                            <h4 class="text-dark">{{ $entrega->nombre_original }}</h4>
                            </a>
                            <p class="m-0 pb-3">Se entrego el {{$entrega->created_at}} </p>
                        </div>
                        <div class="mb-2 mt-2 pb-1">
                            <p class="mb-0">Entregado por: {{$user->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Tastimonial End -->

</x-mi-layout>