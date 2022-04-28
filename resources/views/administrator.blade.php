@extends('layouts.plantilla_admin')
@section('title','Administrador estudiantes')
@section('content')
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <h2>Panel de administrador</h2>
        <a href="logout.php" class="text-light">Salir</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <table class="table">
      <tr class="text-center">
        <th colspan="9"><h2>Estudiantes</h2></th>
      </tr>
      <tr>
        <th>ID</th>
        <th>NOMBRE COMPLETO</th>
        <th>EMAIL</th>
        <th>CURSO</th>
        <th>SEXO</th>
        <th>FECHA DE NACIMIENTO</th>
        <th>FECHA DE REGISTRO</th>

        <th colspan="2">ACCIONES</th>
      </tr>

      @foreach ($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->nombres." ".$student->apellidos}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->grado}}</td>
            <td>{{$student->sexo}}</td>
            <td>{{$student->fecha_naci}}</td>
            <td>{{$student->created_at}}</td>
            <td><i class="fas fa-edit"></i><i class="fas fa-trash"></i></td>
        </tr>
      @endforeach
    <a href="{{route('register.teacher')}}">Crear docente nuevo</a><br>
    <a href = "">Ver docentes</a>
@endsection
