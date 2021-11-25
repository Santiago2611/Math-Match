@extends('layouts.plantilla')
@section('title','Registro')
@section('contenido')
<style>
    .formulario{
    position: relative;
    width: 40%;
    min-width: 350px;
    padding: 35px 60px;
    top: 20px;
}

.formulario input{
    width: 100%;
}

nav i{
    font-size: 0.7em;
}
    </style>
<br>
<br>
 <!-- formulario de ingreso -->
 <div class="d-flex justify-content-center text-center">
    <form action="{{route('datos')}}" class="formulario bg-light" method="post">
        @csrf
        <h1>Regístrate como estudiante</h1>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                 </div>
                <input type="text" class="form-control" name="registroNombres" id="nombres" placeholder="Nombres" required="">
                <input type="text" class="form-control"  name="registroApellidos" id="apellidos" placeholder="Apellidos" required="">
             </div>
        </div>
         <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                </div>
                <input type="email" class="form-control" name="registroEmail" id="email" placeholder="Correo electrónico" required="">
             </div>
        </div>
        <div class="form-group">
             <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" onblur="checkPasswordEquals();" name="registroClave" placeholder="Contraseña" required="">
            </div>
        </div>
        <div class="form-group">
             <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" onblur="checkPasswordEquals();"  name="confirmarClave" placeholder="Confirmar contraseña" required="">
            </div>
        </div>
        <div class="alert alert-warning" style="display: none;" id="box">Las contraseñas no coinciden</div>
        <div class="form-group">
             <div class="input-group">
                <select name="registroSexo" id="sexo" class="form-control">
                    <option>Sexo...</option>
                    <option>Masculino</option>
                    <option>Femenino</option>
                    <option>Otro</option>
                </select>
                <select name="registroGrado" id="grado" class="form-control">
                    <option>Grado que cursas actualmente...</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                </select>
            </div>
        </div>
        <div class="form-group" style="font-size: 1.3em;">
            <label for="fechaNacimiento">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fecha"  name="fechaNacimiento" required="">
        </div>

        <button type="submit"  name="boton_registrar" class="btn btn-primary">Registrar</button><hr>

        <h4>¿Ya tienes cuenta?</h4>
        <h3><a href="ingreso.php">Ingresa</a></h3>
    </form>
</div>

<script>
var menu = document.getElementsByTagName("nav")[0];
var texto = document.getElementsByTagName("b")[0];
var field1 = document.getElementsByName("registroClave")[0];
var field2 = document.getElementsByName("confirmarClave")[0];
const box = document.getElementById("box");

//funciones para despliegue de menú y validación de contraseñas

var checkPasswordEquals = function(){
    var button = document.getElementsByName("boton_registrar")[0];
    if (field1.value != field2.value) {
        box.style.display = "block";
        button.disabled = true;
    } else {
        button.disabled = false;
        box.style.display = "none";
    }
}
</script>
@endsection

