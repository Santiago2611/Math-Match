<x-app-layout>
    <form method="GET" action="{{route('search.class')}}">
        <div class="container my-2">
            <div class="input-group">
                <select name="queryType" class="form-control">
                    <option value="nombre_clase">Por nombre</option>
                    <option value="id">Por código</option>
                </select>
                <input class="form-control w-75" type="text" name="queryStr" placeholder="Busca una clase">
                <button type="submit" class="btn btn-primary input-group-text"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>

    @if ($classrooms->count() > 0)
        <h1 class="d-flex justify-content-center">Clases disponibles para tu grado</h1>
    @else
        <h3 class="d-flex justify-content-center">No se encontraron resultados.</h3>
    @endif

    @foreach ($classrooms as $class)
    <div class="container py-4 mb-3 d-flex flex-row rounded" style="background: lightgray">
        <div class="w-25 mx-4">
            <img src="{{$class->url_images}}" alt="">
        </div>

        <div class="">
            <h1 class="text-black leading-8 font-bold text-center">
                {{$class->nombre_clase." (".$class->tipo_clase.")"}}
            </h1>
            <p style="color: gray">{{$class->descripcion_clase}}</p>
            <p>Grado: <b>{{$class->grado}}</b></p>
            <p>Docente: <b>nombre del docente</b></p>

            <form action="{{route('see.class', $class->id)}}" method="get">
                @if (App\Http\Controllers\ClassroomController::getIfAlreadyInClass($class->id))
                    <button class="btn btn-primary" type="submit">Ir a la clase</button>
                @else
                    <button class="btn btn-secondary" type="submit">Ver más</button>
                @endif
            </form>
        </div>
    </div>
@endforeach
<div class="card-footer">
    {{$classrooms->links()}}
</div>


{{-- <div class="card-footer">
    {{$images->links()}}
</div> --}}
</x-app-layout>

