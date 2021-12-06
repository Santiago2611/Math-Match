<?php include "../bootstrapCDN.php" //Librería bootstrap ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_forms.css">
    <link rel="shortcut icon" href="../images/math.png">
    <title>Nuevo docente Math-Match</title>
</head>
<body>

    <!-- formulario de ingreso -->
    <div class="d-flex justify-content-center text-center">
        <form action="../crud/insert_teacher.php" class="formulario bg-light" method="post">
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

</body>
</html>

 