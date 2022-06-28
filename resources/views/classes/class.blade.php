<x-app-layout>

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
        <div>
            <h1>Clase {{$classInfo->nombre_clase}} </h1>
            <h3>Regida por el docente {{$classInfo->name." ".$classInfo->last}}</h3>
        </div>
        <b>{{$classInfo->tipo_clase}}</b>
    </div>

    <div class="container py-2 border-top d-flex" style="background: #40b8d6;">
        @if (!$inClass)
            @if ($classInfo->tipo_clase == "Publica")
                <form action="{{ route('join.class', ['class' => $classInfo->id_class]) }}" method="post"> @csrf
                    <button type="submit" class="btn btn-primary"><i class="fas fa-add"></i> Unirse</button>
                </form>
            @else
                @if (!$hasSentJoinRequest)
                    <form action="{{ route('class.joinRequest', ['class' => $classInfo->id_class]) }}" method="post"> @csrf
                        <button type="submit" class="btn btn-light"><i class="fas fa-envelope"></i> Enviar solicitud</button>
                    </form>
                @else
                    <form action="{{ route('class.cancelJoinRequest', ['class' => $classInfo->id_class]) }}" method="post"> @csrf
                        <button type="submit" class="btn btn-danger"><i class="fas fa-xmark"></i> Cancelar solicitud</button>
                    </form>
                @endif
            @endif
        @else
            <!-- hay que darle el método post en el form, y añadir la propiedad method('delete')
                , sinó, no funcionará y lo tomará como método get -->
            <form action="{{ route('leave.class', ['class' => $classInfo->id_class]) }}" method="post"> @csrf
                @method('delete')
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
            @if ($publications->count() == 0)
                <br><p>Aún no hay publicaciones.</p>
            @endif
            @foreach ($publications as $publication)
                <div class="card d-flex mt-3 p-2 flex-row">
                    <div class="photo">
                        <img src="{{ asset('images/math.png') }}" alt="">
                    </div>
                    <div class="publicationContent w-100 p-1">
                        <div class="d-flex justify-content-between">
                            <h3><b>{{ $publication->name." ".$publication->last }}</b></h3>
                            <div class="actions">
                                <a href="#"><i class="fas fa-circle-exclamation"></i></a>
                            </div>
                        </div>
                        <div>
                            <p>{{ $publication->mensaje_publicacion }}</p>
                        </div>
                        <div>
                            @if ($publication->archivo_adjunto == null)
                                <p>No hay archivos adjuntos.</p>
                            @else
                                <form action="{{ route('classroom.downloadFile') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="filename" value="{{$publication->archivo_adjunto}}">
                                    <button type="submit" class="downloadFile">{{$publication->archivo_adjunto}}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-3 text-sm">
                    @foreach (App\Http\Controllers\PublicationCommentsController::getComments($publication->id_publication) as $comment)
                        <div class="leading-4">
                            <h6 style="color: darkorange">{{ $comment->username." dice:" }}</h6>
                            <p>{{ $comment->message }}</p>
                        </div>
                    @endforeach
                    <div>
                        <form action="{{ route('class.replyPublication.store') }}" method="post" class="d-flex flex-row align-items-center">
                            @csrf
                            <label for="answer" class="form-label">Comentar publicación</label>
                            <input type="hidden" name="publicationId" value="{{ $publication->id_publication }}">
                            <input type="hidden" name="username" value="{{ auth()->user()->name." ".auth()->user()->last }}">
                            <input type="text" name="content" id="answer" class="input-group-text text-left m-2 w-75" placeholder="Responder..." required>
                            <input type="submit" value="Comentar" class="btn btn-primary"> <!-- boton de enviar -->
                        </form>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <br><h1>Únete para ver publicaciones y demás.</h1>
        @endif
    </div>

</x-app-layout>
