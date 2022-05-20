<x-app-layout>
    <div class="container">
        <div style="margin: 10px;">

            <div class="card">
                <h2>Bienvenido, {{session("username")}}</h2>
                <b>Progreso: {{$progress}}</b>
                <b>show {{session("user_id")}}</b>
                <a href="{{url('juegos/concentrado/play')}}">Comenzar</a>
            </div>

        </div>
    </div>

</x-app-layout>

