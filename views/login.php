<?php include "../bootstrapCDN.php" //Librería bootstrap ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_forms.css">
    <link rel="shortcut icon" href="../images/math.png">
	<style>
		body{
			background-image: url("../images/fondo2.jpg");
			background-size: cover;
		}
	</style>
</head>
<body>

    <!-- formulario de registro-->
    <div class="d-flex justify-content-center text-center">
        <form action="../crud/session.php" class="formulario bg-light" method="post">
	        <h1>Ingresa</h1>
	    	<div class="form-group">
	    		<div class="input-group">
	    			<div class="input-group-prepend">
	    				<span class="input-group-text"><i class="fas fa-user"></i></span>
	    		 	</div>
            	<input type="text" class="form-control" name="ingresoUsuario" placeholder="Correo electrónico" required="">
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

	    	<button type="submit" name="boton_ingreso" class="btn btn-primary">Iniciar Sesión</button><hr>

	    	<h4>Aún no tienes cuenta?</h4>
	    	<h3><a href="registro_estudiante.php">Regístrate</a></h3>
	    </form>
	</div>

</body>
</html>