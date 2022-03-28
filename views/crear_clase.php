<?php 

include "../layouts/Layouts.php";
session_start();

if (empty($_SESSION['teacherName'])) {
	echo "<script> alert('No has iniciado sesión'); </script>";
	$model->redirect("login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php Layouts::head("Crea una clase","../css/styles.css"); ?>
    <style>
        form {
            width: 40%;
        }

        .position-relative {
			top: 60px;
		}
    </style>
</head>
<body>

    <div class="d-flex justify-content-center text-center position-relative">
        <form action="../controllers/class_controller.php" class="formulario bg-light p-5" method="post">
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
            <p class="text-muted m-0">(La clase quedará a cargo de <?php echo $_SESSION['teacherName']; ?>)</p>

	    </form>
	</div>

</body>
</html>

 