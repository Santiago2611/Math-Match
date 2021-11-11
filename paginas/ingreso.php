<?php include "../bootstrapCDN.php" //Librería bootstrap ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_registro.css">
      <link rel="shortcut icon" href="../img/math.png">

</head>
<body>

    <header>
      <button onclick="toggleMenu();" type="button" id="abrir_menu"><i class="fas fa-bars"></i><b> Menú</b></button>
      <a href="registro.php"><button class="btn btn-primary" id="ingresar">Registrarse</button></a>
    </header>

    <nav class="menu hideMenu">
      <ul>
        <a href="index.php"><li>Inicio <i class="fas fa-house-user"></i></li></a>
        <a href="registro.php"><li>Crea tu cuenta <i class="fas fa-pencil-alt"></i></li></a>
        <a href="ingreso.php"><li>Ingresar <i class="fas fa-user"></i></li></a>
        <a href=""><li>Hay un problema <i class="fas fa-bug"></i></li></a>
        <a href=""><li>¡Apoyanos! <i class="fas fa-heart"></i></li></a>
      </ul>
    </nav>

    <!-- formulario de registro-->
    <div class="d-flex justify-content-center text-center">
        <form action="validacion.php" class="formulario bg-light" method="post">
	        <h1>Ingresa</h1>
	    	<div class="form-group">
	    		<div class="input-group">
	    			<div class="input-group-prepend">
	    				<span class="input-group-text"><i class="fas fa-user"></i></span>
	    		 	</div>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="">
 	    		</div>
	    	</div>
 	    	<div class="form-group">
	    		<div class="input-group">
	    			<div class="input-group-prepend">
	    				<span class="input-group-text"><i class="fas fa-lock"></i></span>
	    			</div>
            <input type="password" class="form-control" name="ingresoPassword" placeholder="Contraseña" required="">
 	    		</div>
	    	</div>
        <div class="form-group" style="font-size: 1.3em;">
        <b>Rol: </b>
          <select class="form-select" name="rol">
            <option value="estudiante">Estudiante</option>
            <option value="docente">Docente</option>
        </select>
        </div>

	    	<button type="submit" name="boton_ingreso" class="btn btn-primary">Iniciar Sesión</button><hr>

	    	<h4>Aún no tienes cuenta?</h4>
	    	<h3><a href="registro.php">Regístrate</a></h3>
	    </form>
	</div>

    <script>
    menu = document.getElementsByTagName("nav")[0];
    texto = document.getElementsByTagName("b")[0];

    var toggleMenu = function(){
      if (menu.className == "menu hideMenu") {
        menu.className = "menu";
        texto.textContent = " Cerrar";
      } else {
        menu.className = "menu hideMenu";
        texto.textContent = " Menú";
      }
    }
  </script>

</body>
</html>