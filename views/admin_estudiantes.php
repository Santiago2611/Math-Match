<?php 

include "../bootstrapCDN.php"; //Librería bootstrap 
include "../crud/CRUD.php";

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
        $query = mysqli_query($crud->conn,$sql);

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
              <td><a href="../crud/delete.php?idSt=<?php echo $rows[0] ?>"><i class="fas fa-trash text-danger"></i></a></td>
            </tr>
          <?php } ?>
        <tr>
          <td colspan="2"><a href="admin_docentes.php">Ver docentes...</a></td>
        </tr>
      </table>
    </div>
    
</body>
</html>