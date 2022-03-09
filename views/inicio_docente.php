
<?php include "../bootstrapCDN.php" //Librería bootstrap ?>
<?php 

session_start();
if (empty($_SESSION['nombre'])) {
  echo "<script>window.location='ingreso.php'</script>";
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_ini_estudiante.css">
    <title>Math-Match</title>
      <link rel="shortcut icon" href="../img/math.png">

</head>
<body>

    <header>
      <p style="font-size: 2em;"><b>Bienvenido/a, docente <?php echo $_SESSION['nombre']; ?></b></p>
      <div style="position: absolute; right: 50px;">
        <div class="dropdown-header">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="perfil.php">Mi perfil</a>
    <a class="dropdown-item" href="configuracion.php">Configuración</a>
    <span>Modo oscuro: <input type="checkbox"></span>
    <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
  </div>
</div>
      </div>
    </header>

    <div class="container float-left">
        <ul>
            <li><a href="">Crear clase</a></li>
            <li><a href="">Ver invitaciones enviadas</a></li>
            <li><a href="">Clases creadas</a></li>
        </ul>
    </div>
    
</body>
</html>