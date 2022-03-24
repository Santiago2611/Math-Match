<?php include "../layouts/Layouts.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php Layouts::head("Inicia sesión","../css/styles.css"); ?>
	<style>
		.position-relative {
			top: 60px;
		}
	</style>
</head>
<body>

	<?php Layouts::header(); ?>
	    <!-- formulario de registro -->
    <div class="d-flex justify-content-center text-center position-relative">
        <form action="../controllers/login_controller.php" class="formulario bg-light p-5" method="post">
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
	    	<h3><a href="registro_estudiante.php">Regístrate</a></h3>
	    </form>
	</div>

</body>
</html>



 