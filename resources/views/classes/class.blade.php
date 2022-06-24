<x-app-layout>

<<<<<<< HEAD
    <div class="container d-flex justify-content-between bg-success mt-4 p-2">
=======
    <style>
        .photo {
            width: 150px;
            margin: 10px;
        }

        .actions i {
            font-size: 1.3em;
            color: #222;
            margin-right: 5px;
        }

        .actions i:hover {
            color: crimson;
        }
    </style>

    <div class="container d-flex justify-content-between mt-4 p-2" style="background: #38a6c2;">
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
        <div>
            <h1>Clase {{$classInfo->nombre_clase}} </h1>
            <h3>Regida por el docente Luis Ejemplo</h3>
        </div>
        <b>{{$classInfo->tipo_clase}}</b>
    </div>
<<<<<<< HEAD
    <div class="container py-2" style="background: lightgray">
        @if (!$inClass)
            <form action="{{ route('join.class', ['class' => $classInfo->id]) }}" method="post"> @csrf
                <button type="submit" class="btn btn-primary p-1"><i class="fas fa-add"></i> Unirse</button>
            </form>
        @else
=======

    <div class="container py-2 border-top d-flex" style="background: #40b8d6;">
        @if (!$inClass)
            @if ($classInfo->tipo_clase == "Publica")
                <form action="{{ route('join.class', ['class' => $classInfo->id]) }}" method="post"> @csrf
                    <button type="submit" class="btn btn-primary"><i class="fas fa-add"></i> Unirse</button>
                </form>
            @else
                @if (!$hasSentJoinRequest)
                    <form action="{{ route('class.joinRequest', ['class' => $classInfo->id]) }}" method="post"> @csrf
                        <button type="submit" class="btn btn-light"><i class="fas fa-envelope"></i> Enviar solicitud</button>
                    </form>
                @else
                    <form action="{{ route('class.cancelJoinRequest', ['class' => $classInfo->id]) }}" method="post"> @csrf
                        <button type="submit" class="btn btn-danger"><i class="fas fa-xmark"></i> Cancelar solicitud</button>
                    </form>
                @endif
            @endif
        @else
            <a href="{{ route('classroom.publicate', $classInfo->id) }}">
                <button class="btn btn-secondary mr-2">Hacer publicación</button>
            </a>
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
            <!-- hay que darle el método post en el form, y añadir la propiedad method('delete')
                , sinó, no funcionará y lo tomará como método get -->
            <form action="{{ route('leave.class', ['class' => $classInfo->id]) }}" method="post"> @csrf
                @method('delete')
<<<<<<< HEAD
                <button type="submit" class="btn btn-danger p-1"><i class="fas fa-xmark"></i> Abandonar clase</button>
            </form>
        @endif
    </div>
=======
                <button type="submit" class="btn btn-danger"><i class="fas fa-xmark"></i> Abandonar clase</button>
            </form>
        @endif
    </div>

    @if (session('info'))
        <div class = "container my-2 alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="container rounded mt-4 py-2" style="background: lightgray;">
        @if ($inClass)
            @foreach ($publications as $publication)
                <div class="card d-flex my-3 p-2 flex-row">
                    <div class="photo">
                        <img src="{{ asset('images/math.png') }}" alt="">
                    </div>
                    <div class="publicationContent w-100 p-1">
                        <div class="d-flex justify-content-between">
                            <h3><b>{{ $publication->name." ".$publication->last }}</b></h3>
                            <div class="actions">
                                <a href="#"><i class="fas fa-trash"></i></a>
                                <a href="#"><i class="fas fa-circle-exclamation"></i></a>
                            </div>
                        </div>
                        <div>
                            <p>{{ $publication->mensaje_publicacion }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <br><h1>Únete para ver publicaciones y demás.</h1>
        @endif
    </div>

>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
</x-app-layout>
