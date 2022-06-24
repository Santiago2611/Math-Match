@extends('adminlte::page')

@section('title','Estudiantes')

@section('content_header')
    <h1>Administrador estudiantes</h1>
@stop

@section('content')
    <div class = "card">
        <div class = "card-header">
            <h1 class="card-title">Estudiantes</h1>
        </div>
        <div class="card-body">
            <p>Bienvenido al panel de administrador del estudiante</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>console.log("Hi!");</script>

@stop

