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
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title></title>
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet"> 
   <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../css/estilos.css">
   <link rel="stylesheet" href="../css/dark.css" class="theme">
   <link rel="stylesheet" href="../css/styles.css">
   <link rel="stylesheet" href="../css/light.css" class="theme">
</head>
<body>

<div class="contenedor">
      <nav>
         <a class="logotipo" id="logotipo">Bienvenido <?php  echo $_SESSION['name']; ?> </a>
         <div class="enlaces">
            <a href="#">Ver clases</a>
            <a href="#">Mis clases</a>
            <a href="#">Configuración</a>
            <a href="logout.php">Cerrar sesión</a>
         
            <label class="switch">
            <input type="checkbox" class="checkbox">
             <span class="slider round"></span>
            </label>
         </div>
      </nav>

      <section class="grid">
         <div class="card">
            <img src="" alt="">
            <div class="botones"><br><br>
              <a class="boton primario">Ver más</a>
               <a href="#" class="boton primario">Unirse</a>
            </div>
         </div>
         <div class="card">
            <img src="" alt="">
            <div class="botones">
              <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Unirse</a>
            </div>
         </div>
         <div class="card">
            <img src="" alt="">
            <div class="botones">
               <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Unirse</a>
            </div>
         </div>
         <div class="card">
            <img src="" alt="">
            <div class="botones">
               <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Unirse</a>
            </div>
         </div>
         <div class="card">
            <img src="" alt="">
            <div class="botones">
               <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="img/maxresdefault (3).jpg" alt="">
            <div class="botones">
                <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
      </section>
   </div>

   <script src="../../js/main.js"></script>
   
</body>
</html>