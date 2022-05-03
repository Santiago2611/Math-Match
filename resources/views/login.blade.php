@extends('layouts.plantilla_home')
@section('title','Iniciar sesión')
@section('content')
<header class="masthead text-center text-black">
    <div class="masthead-content">
<div class="d-flex justify-content-center text-center position-relative">
    <form action="{{route('login.check')}}" class="formulario bg-light p-5" method="post">

        @csrf
        <h1>INICIO DE SESIÓN</h1>
        <div class="form-group">
            <div class="input-group p-1">
                <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                <input type="email" class="form-control" name="ingresoEmail" placeholder="Correo electrónico" required="">
             </div>
        </div>
        <div class="form-group">
             <div class="input-group p-1">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="ingresoClave" placeholder="Contraseña" required="">
            </div>
        </div>

        <button type="submit" name="boton_ingreso" class="btn btn-primary">Iniciar sesión</button><hr>

        <h4>¿Aún no tienes cuenta?</h4>
        <h3><a href="{{route('register')}}">Regístrate</a></h3>
    </form>
</div>

@endsection
