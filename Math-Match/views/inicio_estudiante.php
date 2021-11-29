
<?php 

include "../bootstrapCDN.php"; //Librería bootstrap
include "../crud/CRUD.php";
$crud = new CRUD();

session_start();
if (empty($_SESSION['id'])) {
    echo "<script> alert('No has iniciado sesión'); </script>";
    $crud->redirect("login.php");
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
      <p style="font-size: 2em;"><b>Bienvenido/a, estudiante <?php echo $_SESSION['name']; ?></b></p>
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
            <li><a href="">Buscar clases</a></li>
            <li><a href="">Ver solicitudes de clase</a></li>
            <li><a href="">Mi mochila</a></li>
            <li style="border-bottom: none;">Mis clases...<br>Aún no te has unido a ninguna clase</li>
        </ul>
    </div>
    
</body>
</html>