@extends('layouts.inicio')
@section('title','Docente')
@section('init')
<a href="">Inicio</a>
@endsection
@section('class')
<a href="">Crear clase</a>
@endsection
@section('more_class')
<a href="">Mis clases</a>
@endsection
@section('content')
@foreach ($teachers as $teacher)
<h1 style="margin: 10px;">Bienvenido, docente {{$teacher->nombre_docente}}</h1>
@endforeach
