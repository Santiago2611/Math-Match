<x-app-layout>

    <style>
        .photo {
            width: 180px;
            margin: 10px;
        }
    </style>

    <div class="container d-flex justify-content-between mt-4 p-2" style="background: #38a6c2;">
        <div>
            <h1>Clase {{$classInfo->nombre_clase}} </h1>
            <h3>Regida por el docente Luis Ejemplo</h3>
        </div>
        <b>{{$classInfo->tipo_clase}}</b>
    </div>

    @if (session('info'))
        <div class = "alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="container py-2 border-top d-flex" style="background: #40b8d6;">
        @if (!$inClass)
            <form action="{{ route('join.class', ['class' => $classInfo->id]) }}" method="post"> @csrf
                <button type="submit" class="btn btn-primary"><i class="fas fa-add"></i> Unirse</button>
            </form>
        @else
            <a href="{{ route('classroom.publicate', $classInfo->id) }}">
                <button class="btn btn-secondary mr-2">Hacer publicación</button>
            </a>
            <!-- hay que darle el método post en el form, y añadir la propiedad method('delete')
                , sinó, no funcionará y lo tomará como método get -->
            <form action="{{ route('leave.class', ['class' => $classInfo->id]) }}" method="post"> @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"><i class="fas fa-xmark"></i> Abandonar clase</button>
            </form>
        @endif
    </div>
    
    <div class="container rounded mt-4 py-2" style="background: lightgray;">
        @if ($inClass)
            <div class="card d-flex my-4 flex-row">
                <div class="photo">
                    <img src="{{ asset('images/fondo.jpg') }}" alt="">
                </div>
                <div class="publicationContent w-100 p-1">
                    <div class="d-flex justify-content-between">
                        <h3>Nombre de quien publica</h3>
                        <div class="actions">
                            <b>acciones...</b>
                        </div>
                    </div>
                    <div>
                        <p>contenido de la publicacion</p>
                    </div>
                </div>
            </div>
        @else
            <br><h1>Únete para ver publicaciones y demás.</h1>
        @endif
    </div>

</x-app-layout>
