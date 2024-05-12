<x-mi-layout titulo="Detalle de Tarea">

    <!-- Single Product Start -->
    <div class="container-fluid py-1 mt-1 bg-light">
            <div class="container py-2 ">
                <div class="row g-4 mb-5 ">
                <a href="{{route('tareas.tareaIndex', $clase)}}">Todas las tareas</a>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <h2 class="fw-bold mb-3">Nombre: {{ $tarea->nombre }}</h2>
                                <h6 class="mb-3">Fecha de entrega: {{ $tarea->fecha_final }}</h6>
                                <p class="mb-4">Descripcion: {{ $tarea->descripcion }}</p>
                                
                             </div>
                        </div>
                    </div>


                    <div class="col-lg-5 ms-auto">
                        <div class="bg-white rounded p-5 shadow-lg ">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                    <h4>Añadir Entrega</h4>
                                    <!-- Formulario para entregas -->
                                    <input type="file" id="picRecipe" name="picRecipe">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                </div>
            </div>
        </div>
        <!-- Single Product End -->


</x-mi-layout>