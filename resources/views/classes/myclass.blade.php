<x-app-layout>

    @can('teacher.classrooms.create')
        <a class="btn btn-primary btn-sm" href="{{route('teacher.classrooms.create')}}">Agregar clase</a>
    @endcan

    @if (sizeof($classrooms) > 0)
        @if (auth()->user()->hasRole('Teacher'))
            <h1 class="text-center">Tus clases: </h1>
        @elseif (auth()->user()->hasRole('Student'))
            <h1 class="text-center">Clases a las que perteneces: </h1>
        @endif

        @foreach ($classrooms as $class)
            <div class="w-25 p-3 m-3 text-center rounded" style="background: #CCC">
                <div>
                    <h1 class="text-black leading-8 font-bold text-center">
                        {{$class->nombre_clase}}
                    </h1>
                    <p style="color: gray">{{$class->descripcion_clase}}</p>

                    <form action="{{route('see.class', $class->id)}}" method="get">
                        <button class="btn btn-primary" type="submit">Ir a la clase</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="container-fluid text-center mt-3">
            @if (auth()->user()->hasRole('Teacher'))
                <h3 class="">Aún no has creado ninguna clase</h3>
                <a href="{{ route('teacher.classrooms.create') }}">Crear clase</a>
            @elseif (auth()->user()->hasRole('Student'))
                <h3 class="">Aún no perteneces a ningún curso</h3>
                <a href="{{ route('class.show') }}">Ver clases disponibles</a>
            @endif
        </div>
    @endif
</x-app-layout>

