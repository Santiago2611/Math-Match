@extends("layouts.inicio")
@section("title","Concentrado levels")
@section("content")

<style>
    .card {
        margin: 10px;
        padding: 10px;
    }

    .card b {
        font-size: 2em;
    }
</style>
<div>
    <div class="card">
        <h2>Bienvenido, {{session("username")}}</h2>
        <b>Progreso: {{$progress}}</b>
        <a href="{{url('juegos/concentrado/play')}}">Comenzar</a>
    </div>
</div>

@endsection
