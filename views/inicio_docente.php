<?php 

include "../models/Database.php";
include "../layouts/Layouts.php";
$model = new Database();

session_start();
if (empty($_SESSION['teacherName'])) {
  echo "<script> alert('No has iniciado sesión'); </script>";
  $model->redirect("login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php Layouts::head("Bienvenido, docente","../css/styles.css"); ?>
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

      aside a:hover {
         color: gray;
      }
   </style>
</head>
<body>

   <?php Layouts::teacherUserNav(); ?>
   
</body>
</html>