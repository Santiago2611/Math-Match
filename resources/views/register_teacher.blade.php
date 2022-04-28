@extends('layouts.plantilla')
@section('title','Registro docente')
@section('content')
<header class="masthead text-center text-black">
    <div class="masthead-content">
<div class="d-flex justify-content-center text-center position-relative">
    <form action="{{route('registerTeacher.store')}}" class="formulario bg-light p-5" method="post">
        @csrf
        <h1>Registrar docente</h1>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                 </div>
                <input type="text" class="form-control" name="registroNombres" placeholder="Nombres" required="">
                <input type="text" class="form-control" name="registroApellidos" placeholder="Apellidos" required="">
             </div>
        </div>
         <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-award"></i></span>
                </div>
                <input type="text" class="form-control" name="registroEspecialidades" placeholder="Especialidades" required="">
             </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                </div>
                <input type="text" class="form-control" name="registroTelefono" placeholder="Teléfono o número de celular" required="">
             </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                </div>
                <input type="text" class="form-control" name="registroEmail" placeholder="Correo electrónico" required="">
             </div>
        </div>
        <div class="form-group">
             <div class="input-group">
                <select name="registroSexo" class="form-control">
                    <option>Sexo...</option>
                    <option>Masculino</option>
                    <option>Femenino</option>
                    <option>Otro</option>
                </select>
            </div>
        </div>

        <button type="submit" name="boton_registrar_doc" class="btn btn-primary">Registrar</button>

    </form>
</div>
@endsection
