@extends('layouts.inicio')
@section('title','Docente')
@section('init')
<a href="">Inicio</a>
@endsection
@section('class')
<a href="{{route('create.class')}}">Crear clase</a>
@endsection
@section('more_class')
<a href="">Mis clases</a>
@endsection
@section('content')
<div class="d-flex justify-content-center text-center position-relative">
    <form action="{{route('create')}}" class="formulario bg-light p-5" method="post">
        <h1>Nueva clase</h1>
        <div class="form-group">
            <div class="input-group py-1">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" name="nombreClase" placeholder="Nombre de la clase" required="">
             </div>
        </div>
         <div class="form-group">
            <div class="input-group py-1">
                <span class="input-group-text"><i class="fas fa-award"></i></span>
                <input type="text" class="form-control" name="descripcion" placeholder="Descripción (opcional)" >
             </div>
        </div>

        <div class="form-group">
        <label for="tipoClase">Tipo de clase</label>
            <div class="input-group">
            <select name="tipoClase" class="form-control">
                    <option>Pública</option>
                    <option>Privada</option>
                </select>
             </div>
        </div>
        <div class="form-group py-2">
            <label for="culminacion">¿Hasta cuándo estará disponible la clase?</label>
            <input type="date" class="form-control" name="culminacion" required="">
        </div>

        <button type="submit" name="boton_crear_clase" class="btn btn-primary">Crear clase</button>
        <p class="text-muted m-0">(La clase quedará a cargo de {{$teachers->nombre_docente}}</p>

    </form>
</div>
@endsection

