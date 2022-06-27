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
    </style>

    <div class="container mt-4 p-2 py-4" style="background: #38a6c2;">
        <div class="d-flex justify-content-between w-100">
            <div style="font-size: 1.3em;">
                <h1>Clase {{$classInfo->nombre_clase}} </h1>
                <p>ID de la clase: <b>{{$classInfo->id}}</b></p>
            </div>
            <b>{{$classInfo->tipo_clase}}</b>
        </div>
        <button type="button" class="btn btn-secondary" onclick="toggleStudentsList()">Ver estudiantes <i class="fas fa-chevron-down"></i></button>
    </div>

    <div class="container py-2 border-top font-bold leading-4" style="background: #40b8d6;" id="students">
        @if ($students->count() > 0)
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
                        <div class="actions">
                            <a href="#"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                    <div>
                        <p>{{ $publication->mensaje_publicacion }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script type="text/javascript">
        var target = document.getElementById("students");
        var shown = false;

        let toggleStudentsList = () => {
            if (shown) {
                target.style.height = "0px";
                target.style.visibility = "hidden";
                shown = false;
            } else {
                target.style.height = "300px";
                target.style.visibility = "visible";
                shown = true;
            }
        }
    </script>

</x-app-layout>
