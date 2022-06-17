<x-app-layout>

    <div class="container d-flex justify-content-between bg-success mt-4 p-2">
        <div>
            <h1>Clase {{$classInfo->nombre_clase}} </h1>
            <h3>Regida por el docente Luis Ejemplo</h3>
        </div>
        <b>{{$classInfo->tipo_clase}}</b>
    </div>
    <div class="container py-2" style="background: lightgray">
        @if (!$inClass)
            <form action="{{ route('join.class', ['class' => $classInfo->id]) }}" method="post"> @csrf
                <button type="submit" class="btn btn-primary p-1"><i class="fas fa-add"></i> Unirse</button>
            </form>
        @else
            <!-- hay que darle el método post en el form, y añadir la propiedad method('delete')
                , sinó, no funcionará y lo tomará como método get -->
            <form action="{{ route('leave.class', ['class' => $classInfo->id]) }}" method="post"> @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger p-1"><i class="fas fa-xmark"></i> Abandonar clase</button>
            </form>
        @endif
    </div>
</x-app-layout>
