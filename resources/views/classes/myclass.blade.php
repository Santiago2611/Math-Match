<x-app-layout>

    @if (sizeof($classrooms) > 0)
        @if (auth()->user()->hasRole('Teacher'))
            <h1 class="text-center">Tus clases: </h1>
        @elseif (auth()->user()->hasRole('Student'))
            <h1 class="text-center">Clases a las que perteneces: </h1>
        @endif

        <div class="container">
            @can('teacher.classrooms.create')
                <a class="btn btn-primary btn-sm m-3" href="{{route('teacher.classrooms.create')}}">
                    <i class="fas"></i>Agregar clase
                </a>
            @endcan
            @foreach ($classrooms as $class)
                <div class="p-3 m-3 rounded" style="background: #CCC;">
                    <div>
                        <h1 class="text-black leading-8 font-bold">
                            {{$class->nombre_clase}}
                        </h1>
                        <p style="color: gray">{{$class->descripcion_clase}}</p>

                        @if (auth()->user()->hasRole('Student'))
                            <form action="{{route('see.class', $class->classroom_id)}}" method="get">
                                <button class="btn btn-primary" type="submit">Ir a la clase</button>
                            </form>
                        @else
                            <form action="{{route('teacher.classrooms.show', $class->id)}}" method="get">
                                <button class="btn btn-primary" type="submit">Ir a la clase</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        
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

