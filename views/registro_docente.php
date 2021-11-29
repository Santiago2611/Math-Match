<?php include "../bootstrapCDN.php" //Librería bootstrap ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_forms.css">
    <link rel="shortcut icon" href="../images/math.png">
    <title>Regístrate</title>
</head>
<body>

    <!-- formulario de ingreso -->
    <div class="d-flex justify-content-center text-center">
        <form action="#" class="formulario bg-light" method="post">
	        <h1>Regístrate como docente</h1>
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
                    <input type="text" class="form-control" name="registroEmail" placeholder="¿En qué áreas de la matemática te especializas?" required="">
 	    		</div>
	    	</div>
            <div class="form-group">
	    		<div class="input-group"> 
	    			<div class="input-group-prepend">
	    				<span class="input-group-text"><i class="fas fa-mobile"></i></span>
	    			</div>
                    <input type="text" class="form-control" name="registroEmail" placeholder="Teléfono o número de celular" required="">
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
	    		    <select name="registroSexo" class="form-control">
						<option>Sexo...</option>
						<option>Masculino</option>
						<option>Femenino</option>
						<option>Otro</option>
					</select>
	    	    </div>
	    	</div>

	    	<button type="submit" name="boton_registrar" class="btn btn-primary">Registrarse</button><hr>

	    	<h4>¿Ya tienes cuenta?</h4>
	    	<h3><a href="login.php">Ingresa</a></h3>
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

</body>
</html>

 