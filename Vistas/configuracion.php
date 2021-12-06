<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../bootstrapCDN.php"; ?>
    <title>Configuración</title>
</head>
<body>
<div class="d-flex justify-content-center text-center">
        <form action="../crud/create.php" class="formulario bg-light" method="post">
	        <h1>Regístrate como estudiante</h1>
	    	<div class="form-group">
	    		<div class="input-group">
	    			<div class="input-group-prepend">
	    				<span class="input-group-text"><i class="fas fa-user"></i></span>
	    		 	</div>
                    <input type="text" value="<?php $_POST['registroNombres'] ?>" class="form-control" name="registroNombres" placeholder="Nombres" required="">
                    <input type="text" value="<?php $_POST['registroApellidos'] ?>" class="form-control" name="registroApellidos" placeholder="Apellidos" required="">
 	    		</div>
	    	</div>
 	    	<div class="form-group">
	    		<div class="input-group"> 
	    			<div class="input-group-prepend">
	    				<span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
	    			</div>
                    <input type="email" value="<?php $_POST['registroEmail'] ?>" class="form-control" name="registroEmail" placeholder="Correo electrónico" required="">
 	    		</div>
	    	</div>
	    	<div class="form-group">
 	    		<div class="input-group">
	    		    <div class="input-group-prepend">
	    		    	<span class="input-group-text"><i class="fas fa-lock"></i></span>
	    		    </div>
	    		    <input type="password" value="<?php $_POST['registroClave'] ?>" class="form-control" onblur="checkPasswordEquals();" name="registroClave" placeholder="Contraseña" required="">
	    	    </div>
	    	</div>
	    	<div class="form-group">
 	    		<div class="input-group"> 
	    			<div class="input-group-prepend">
	    				<span class="input-group-text"><i class="fas fa-lock"></i></span>
	    			</div>
	    		    <input type="password" value="<?php $_POST['registroClave'] ?>" class="form-control" onblur="checkPasswordEquals();"  name="confirmarClave" placeholder="Confirmar contraseña" required="">
	    	    </div>
	    	</div>
			<div class="alert alert-warning" style="display: none;" id="box">Las contraseñas no coinciden</div>
			<div class="form-group">
 	    		<div class="input-group">
	    		    <select name="registroSexo" class="form-control">
                        <p>Sexo...</p>
						<option><?php echo $_POST['registroSexo']; ?></option>
						<option>Masculino</option>
						<option>Femenino</option>
						<option>Otro</option>
					</select>
	    	    </div>
	    	</div>
			<div class="form-group" style="font-size: 1.3em;">
            <p>Fecha de nacimiento</p>
				<label for="fechaNacimiento"><?php $POST['fechaNacimiento']; ?></label>
				<input type="date" class="form-control"  name="fechaNacimiento" required="">
	    	</div>

	    	<button type="submit" name="boton_actualizar" class="btn btn-primary">Actualizar</button><hr>
            <button type="submit" name="Botón_eliminar" class="btn btn-outline-danger">Eliminar</button>
</body>
</html>