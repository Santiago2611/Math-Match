@extends('layouts.plantilla')
@section('title','Registro')
@section('content')

	    <!-- formulario de registro -->
        <header class="masthead text-center text-black">
            <div class="masthead-content">
    <div class="d-flex justify-content-center text-center position-relative">
        <form action="{{route('register.store')}}" class="formulario bg-light p-5 form-register" method="post">

            @csrf
	        <h1>Regístrate como estudiante</h1>
	    	<div class="form-group">
	    		<div class="input-group p-1">
	    			<span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="registroNombres" placeholder="Nombres" required="">
                    <input type="text" class="form-control" name="registroApellidos" placeholder="Apellidos" required="">
 	    		</div>
	    	</div>
 	    	<div class="form-group">
	    		<div class="input-group p-1">
	    			<span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                    <input type="email" class="form-control" name="registroEmail" placeholder="Correo electrónico" required="">
 	    		</div>
	    	</div>
	    	<div class="form-group">
 	    		<div class="input-group p-1">
	    		    <span class="input-group-text"><i class="fas fa-lock"></i></span>
	    		    <input type="password" class="form-control" onblur="checkPasswordEquals();" name="registroClave" placeholder="Contraseña" required="">
	    	    </div>
	    	</div>
	    	<div class="form-group">
 	    		<div class="input-group p-1">
	    			<span class="input-group-text"><i class="fas fa-lock"></i></span>
	    		    <input type="password" class="form-control" onblur="checkPasswordEquals();"  name="confirmarClave" placeholder="Confirmar contraseña" required="">
	    	    </div>
	    	</div>
			<div class="alert alert-warning" style="display: none;" id="box">Las contraseñas no coinciden</div>
			<div class="form-group">
 	    		<div class="input-group p-1">
	    		    <select name="registroSexo" class="form-control">
						<option>Sexo...</option>
						<option>Masculino</option>
						<option>Femenino</option>
						<option>Otro</option>
					</select>
	    		    <select name="registroGrado" class="form-control">
						<option>Grado que cursas actualmente...</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>11</option>
					</select>
	    	    </div>
	    	</div>
			<div class="form-group p-3" style="font-size: 1.3em;">
				<label for="fechaNacimiento">Fecha de nacimiento</label>
				<input type="date" class="form-control"  name="fechaNacimiento" required="">
	    	</div>

	    	<button type="submit" name="boton_registrar" onclick="Registro()" class="btn btn-primary">Registrarse</button><hr>

	    	<h4>¿Ya tienes cuenta?</h4>
	    	<h3><a href="login.php">Ingresa</a></h3>
	    </form>
	</div>
    @section('js')
    <script>
        var texto = document.getElementsByTagName("b")[0];
        var field1 = document.getElementsByName("registroClave")[0];
        var field2 = document.getElementsByName("confirmarClave")[0];
        const box = document.getElementById("box");

        //funcion de validación de contraseñas

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
        <script>
            var Registro = function(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro éxitoso',
                    showConfirmButton: false,
                    timer: 1500
                    })
            }
        </script>
    @endsection

@endsection

