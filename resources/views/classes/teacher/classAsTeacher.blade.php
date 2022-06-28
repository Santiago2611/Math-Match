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

        #students {
            visibility: hidden;
            overflow: auto;
            max-height: 600px;
            height: 0px;
            transition: all 0.5s ease;
        }

        .modalWindow {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0%;
            z-index: 1;
            background: rgba(0, 0, 0, 0.4);
            display: none;
        }

        .shownModal {
            display: block;
        }

        .downloadFile:hover {
            color: blue;
        }
    </style>

    <div class="container mt-4 p-4" style="background: #38a6c2;">
        <div class="d-flex justify-content-between w-100">
            <div style="font-size: 1.3em;">
                <h1>Clase {{$classInfo->nombre_clase}} </h1>
                <p>ID de la clase: <b>{{$classInfo->id}}</b></p>
            </div>
            <b>{{$classInfo->tipo_clase}}</b>
        </div>
        <span class="d-flex flex-row">
            <button type="button" class="btn btn-secondary mr-2" onclick="toggleStudentsList()">Ver estudiantes <i class="fas fa-chevron-down"></i></button>
            <a href="{{route('teacher.publications.create', ['classId' => $classInfo->id])}}" class="btn btn-primary mr-2"><i class="fas fa-add"></i> Hacer publicación</a>
            <button type="button" class="btn btn-danger" onclick="toggleModal()">
                <i class="fas fa-trash"></i> Finalizar clase
            </button>
        </span>
    </div>

    <div class="container py-2 border-top font-bold leading-4" style="background: #40b8d6;" id="students">
        @if ($students->count() > 0)
            @foreach ($students as $std)
                <div class="m-1 d-flex flex-row align-items-center">
                    <b class="mr-4">{{ $std->name." ".$std->last }}</b>
                    <form action="{{ route('teacher.expelStudent', ['id' => $std->id_uc]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-sm btn-danger">Expulsar</button>
                    </form>
                </div>
            @endforeach
        @else
            <p>Aún no hay estudiantes en tu clase.</p>
        @endif
    </div>

    @if (session('info'))
        <div class = "container my-2 alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="container rounded mt-1 py-2" style="background: lightgray;">
        @if ($publications->count() == 0)
            <br><p>Aún no hay publicaciones.</p>
        @endif
        @foreach ($publications as $publication)
            <div class="card d-flex my-3 p-2 flex-row">
                <div class="photo">
                    <img src="{{ asset('images/math.png') }}" alt="">
                </div>
                <div class="publicationContent w-100 p-1">
                    <div class="d-flex justify-content-between">
                        <h3><b>{{ $publication->name." ".$publication->last }}</b></h3>
                        <form class="actions" action="{{ route('teacher.publications.destroy', $publication->id_publication) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"><i class="fas fa-trash"></i></button>
                        </form>
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
                        <span class="d-flex flex-row">
                            <h6 style="color: darkorange">{{ $comment->username." dice:" }}</h6>
                            <form class="actions" action="{{route('class.replyPublication.destroy', $comment->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"><i class="fas fa-trash ml-4" style="color: gray"></i></button>
                            </form>
                        </span>
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
    </div>

    <!-- Modal -->
    <div class="modalWindow" id="classDeleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Advertencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Estás a punto de eliminar una clase junto con todos sus datos, ¿Seguro que quieres continuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="toggleModal(true)">Cancelar</button>
                <form action="{{ route('teacher.classrooms.destroy', $classInfo->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Eliminar clase</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var target = document.getElementById("students");
        var modal = document.getElementById("classDeleteModal");
        var shown = false;

        let toggleStudentsList = () => {
            if (shown) {
                target.style.height = "0px";
                target.style.visibility = "hidden";
                shown = false;
            } else {
                target.style.height = "200px";
                target.style.visibility = "visible";
                shown = true;
            }
        }

        let toggleModal = (hide = false) => {
            modal.focus();
            modal.setAttribute("class", (hide) ? "modalWindow" : "modalWindow shownModal");
        }
    </script>

</x-app-layout>
