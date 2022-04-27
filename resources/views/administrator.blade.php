@extends('layouts.admin')
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
        <th>FECHA DE NACIMIENTO</th>
        <th>CURSO</th>
        <th>EMAIL</th>
        <th>FECHA DE REGISTRO</th>
        <th>SEXO</th>
        <th colspan="2">ACCIONES</th>
      </tr>
      @php
          for ($i = 0)
      @endphp
@endsection
