<?php 

include "../models/Database.php";
include "../layouts/Layouts.php";

$model = new Database();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php Layouts::head("Panel de administrador","../css/styles.css"); ?>
    <style>
      nav{
        background: lightblue;
      }
    </style>
</head>
<body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <h2>Panel de administrador</h2>
        </div>
      </div>
    </nav>

    <div class="container">
      <table class="table">
        <tr class="text-center">
          <th colspan="10"><h2>Docentes</h2></th>
        </tr>
        <tr>
          <th>ID</th>
          <th>NOMBRE COMPLETO</th>
          <th>EMAIL</th>
          <th>ESPECIALIDADES</th>
          <th>FECHA DE REGISTRO</th>
          <th>SEXO</th>
          <th>TELEFONO</th>
          <th colspan="2">ACCIONES</th>
        </tr>

        <?php
        
        $sql = "SELECT * FROM docentes";
        $query = mysqli_query($model->conn,$sql);

        while ($rows = mysqli_fetch_array($query)){ ?>
            <tr>
              <td><?php echo $rows[0]; ?></td>
              <td><?php echo $rows[1]." ".$rows[2]; ?></td>
              <td><?php echo $rows[3]; ?></td>
              <td><?php echo $rows[4]; ?></td>
              <td><?php echo $rows[5]; ?></td>
              <td><?php echo $rows[6]; ?></td>
              <td><?php echo $rows[7]; ?></td>
              <td><a href="#"><i class="fas fa-edit large"></i></a></td>
              <td><a href="../controllers/tc_delete_controller.php?idTc=<?php echo $rows[0] ?>"><i class="fas fa-trash text-danger large"></i></a></td>
            </tr>
          <?php } ?>
        <tr>
          <td colspan="2"><a href="admin_estudiantes.php">Ver estudiantes...</a></td>
          <td colspan="2"><a href="registro_docente.php">Registrar nuevo docente...</a></td>
        </tr>
      </table>
    </div>
    
</body>
</html>