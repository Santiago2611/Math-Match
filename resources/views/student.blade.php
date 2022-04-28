@extends('layouts.inicio')
@section('title','Estudiante')
@section('init')
<a href="">Inicio</a>
@endsection
@section('class')
<a href="">Buscar clases</a>
@endsection
@section('more_class')
<a href="">Mis clases</a>
@endsection
@section('content')
@foreach ($student as $students)
<h1 style="margin: 10px;">Bienvenido, estudiante {{$students->nombres}}</h1>
@endforeach



@endsection
