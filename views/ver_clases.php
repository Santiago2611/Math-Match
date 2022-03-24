<?php 

include "../models/Database.php";
include "../models/ClassModel.php";
include "../layouts/Layouts.php";
$model = new ClassModel();

session_start();
if (empty($_SESSION['name'])) {
  echo "<script> alert('No has iniciado sesión'); </script>";
  $model->redirect("login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php Layouts::head("Sus clases","../css/styles.css"); ?>
   <style>
      html, body {
          height: 100%;
      }

      body {
         display: flex;
      }

      aside {
         min-width: 150px;
         width: 20%;
         color: lightgray;
      }

      a {
         text-decoration: none;
         width: 100%;
         font-size: 1.5em;
         color: lightgray;
      }

      a:hover {
         color: gray;
      }

      .viewClasses {
         background: #CB4335;
         border-radius: 4px;
         box-shadow: 0px 10px 15px rgb(80,80,80);
      }

      .viewClasses ul {
         list-style: none;
      }

   </style>
</head>
<body>
   
   <?php Layouts::teacherUserNav(); ?>

   <div class="position-relative">
        <h1 class="text-center">Señor(a) <?php echo $_SESSION["name"]; ?>, 
        las clases que usted rige hasta el momento son las siguientes: </h1>
        <?php 

        $id = $_SESSION["id"];
        $sql = "SELECT id_clase, nombre_clase, fecha_creacion_clase, vigente_hasta 
        FROM clases WHERE $id = docente_rige";
        $query = mysqli_query($model->conn, $sql);
        
        while ($rows = mysqli_fetch_array($query)) { ?>

        <div class="d-inline-block viewClasses p-3 m-2">
            <ul class="m-0 p-0">
                <li class="fs-2 fw-bold"><?php echo $rows[1] ?></li>
                <li>Id: <?php echo $rows[0] ?></li>
                <li>Creada el <?php echo $rows[2] ?></li>
                <li>Se termina el <?php echo $rows[3] ?></li>
                <li><a href="#">Ver...</a></li>
            </ul>
        </div>

        <?php } ?>
   </div>
   
</body>
</html>