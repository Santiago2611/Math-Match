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
        <b>Progreso: x</b>
        <a href="{{route('play.concentrado')}}">Comenzar</a>
    </div>
</div>

@endsection
