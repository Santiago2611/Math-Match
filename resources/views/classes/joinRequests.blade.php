<x-app-layout>

    @if (session('info'))
        <div class = "container alert alert-warning mt-2">
            <b>{{session('info')}}</b>
        </div>
    @endif

    <div class="container">
        @if ($requests->count() == 0)
            <h3 class="mt-3">No tienes solicitudes hasta el momento.</h3>
        @else
        <h1>Solicitudes de acceso a tus clases:</h1>
            @foreach ($requests as $req)
                <div class="card my-2 p-2 d-flex flex-row align-items-center justify-content-between" style="background: lightgray; font-size: 1.2em;">
                    <span>
                        <i class="fas fa-triangle-exclamation"></i>  
                        El estudiante <b>{{ $req->name." ".$req->last}}</b> 
                        ha solicitado ingresar a la clase <b>{{ $req->nombre_clase }}</b>
                    </span>
                    <form action="{{ route('teacher.replyJoinRequest') }}" method="post">
                        @csrf
                        <input type="hidden" name="requestId" value="{{ $req->request_id }}">
                        <button type="submit" class="btn btn-primary" name="accepted" value="{{ true }}">Aceptar</button>
                        <button type="submit" class="btn btn-secondary" name="accepted" value="{{ false }}">Denegar</button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>

</x-app-layout>
