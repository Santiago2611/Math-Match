<?php 

include "../models/Database.php";
include "../layouts/Layouts.php";
include "../models/ClassModel.php";
$model = new Database();

session_start();
if (empty($_SESSION['adminName'])) {
  echo "<script> alert('No has iniciado sesión'); </script>";
  $modelo->redirect("login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php Layouts::head("Panel de administrador","../css/styles.css"); ?>
    <title>Panel de administrador</title>
    <style>
      nav{
        background: orange;
      }
    </style>
</head>
<body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <h2>Panel de administrador</h2>
          <a href="logout.php" class="text-light">Salir</a>
        </div>
      </div>
    </nav>

    <div class="container">
      <table class="table">
        <tr class="text-center">
          <th colspan="9"><h2>Estudiantes</h2></th>
        </tr>
        <tr>
          <th>ID</th>
          <th>NOMBRE COMPLETO</th>
          <th>FECHA DE NACIMIENTO</th>
          <th>CURSO</th>
          <th>EMAIL</th>
          <th>FECHA DE REGISTRO</th>
          <th>SEXO</th>
          <th colspan="2">ACCIONES</th>
        </tr>

        <?php
        
        $sql = "SELECT * FROM estudiantes";
        $query = mysqli_query($model->conn,$sql);

        while ($rows = mysqli_fetch_array($query)){ ?>
            <tr>
              <td><?php echo $rows[0]; ?></td>
              <td><?php echo $rows[1]." ".$rows[2]; ?></td>
              <td><?php echo $rows[3]; ?></td>
              <td><?php echo $rows[4]; ?></td>
              <td><?php echo $rows[5]; ?></td>
              <td><?php echo $rows[7]; ?></td>
              <td><?php echo $rows[8]; ?></td>
              <td><a href="#"><i class="fas fa-edit"></i></a></td>
              <td><a href="../controllers/st_delete_controller.php?idSt=<?php echo $rows[0] ?>"><i class="fas fa-trash text-danger"></i></a></td>
            </tr>
          <?php } ?>
        <tr>
          <td colspan="2"><a href="admin_docentes.php">Ver docentes...</a></td>
        </tr>
      </table>
    </div>
    
</body>
</html>