@extends('adminlte::page')

@section('title','Estudiantes')

@section('content_header')
    <h1>Administrador</h1>
@stop

@section('content')
    <div class = "card">
        <div class = "card-header">
            <h1 class="card-title">Panel de administrador</h1>
        </div>
        <div class="card-body">
            <p>Bienvenido al panel de administrador, en el cual tienes disponible diferentes apartados</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>console.log("Hi!");</script>

@stop

