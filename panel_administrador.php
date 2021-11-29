<?php 

include "bootstrapCDN.php"; //Librería bootstrap 
include "crud/CRUD.php";

$crud = new CRUD();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        </div>
      </div>
    </nav>

    <div class="container">
      <table class="table">
        <tr class="text-center">
          <th colspan="8"><h2>Estudiantes</h2></th>
        </tr>
        <tr>
          <th>ID</th>
          <th>NOMBRES</th>
          <th>APELLIDOS</th>
          <th>FECHA DE NACIMIENTO</th>
          <th>CURSO</th>
          <th>EMAIL</th>
          <th>FECHA DE REGISTRO</th>
          <th>SEXO</th>
        </tr>

        <?php
        
        $sql = "SELECT * FROM estudiantes";
        $query = mysqli_query($crud->conn,$sql);

        while ($rows = mysqli_fetch_array($query)){ ?>
            <tr>
              <td><?php echo $rows[0]; ?></td>
              <td><?php echo $rows[1]; ?></td>
              <td><?php echo $rows[2]; ?></td>
              <td><?php echo $rows[3]; ?></td>
              <td><?php echo $rows[4]; ?></td>
              <td><?php echo $rows[5]; ?></td>
              <td><?php echo $rows[7]; ?></td>
              <td><?php echo $rows[8]; ?></td>
            </tr>
          <?php } ?>
      </table>
    </div>
    
</body>
</html>