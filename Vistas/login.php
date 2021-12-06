

    <!-- formulario de registro -->
    <div class="d-flex justify-content-center text-center">
        <form action="../crud/create.php" class="formulario bg-light py-5" method="post">
	        <h1>INICIO DE SESIÓN</h1>
	    	<div class="form-group">
 	    	<div class="form-group">
	    		<div class="input-group"> 
	    			<div class="input-group-prepend">
	    				<span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
	    			</div>
                    <input type="email" class="form-control" name="ingresoEmail" placeholder="Correo electrónico" required="">
 	    		</div>
	    	</div>
	    	<div class="form-group">
 	    		<div class="input-group">
	    		    <div class="input-group-prepend">
	    		    	<span class="input-group-text"><i class="fas fa-lock"></i></span>
	    		    </div>
	    		    <input type="password" class="form-control" name="ingresoClave" placeholder="Contraseña" required="">
	    	    </div>
	    	</div>

	    	<button type="submit" name="boton_registrar" class="btn btn-primary">Iniciar sesión</button><hr>

	    	<h4>¿Aún no tienes cuenta?</h4>
	    	<h3><a href="index.php?pagina=registro_estudiante">Regístrate</a></h3>
	    </form>
	</div>

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


 