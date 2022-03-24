<?php 

include "../models/Database.php";
include "../layouts/Layouts.php";
$model = new Database();

session_start();
if (empty($_SESSION['name'])) {
  echo "<script> alert('No has iniciado sesión'); </script>";
  $model->redirect("login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php Layouts::head("Bienvenido","../css/styles.css"); ?>
</head>
<body>

   <h1>Bienvenido, <?php echo $_SESSION['name']; ?></h1>
   
</body>
</html>